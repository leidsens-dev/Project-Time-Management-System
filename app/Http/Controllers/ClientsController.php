<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Client;
use App\Project;
use App\Task;
use App\Credential;

class ClientsController extends BaseController {

	// Go to clients index page
	public function index()
	{	
		$clients=Client::all();
		//return View::make('ins/clients/index')->with("pTitle", "Clients");
		return view('admin.client.home',compact('clients'));
	}

    // Get all clients for the given user
    public function getAllUserClients($withWeight = false){
        $clients = Client::with('projects')->where('user_id',Auth::id())->get();

        if (count($clients) === 0) {
            return $this->setStatusCode(400)->makeResponse('Could not find clients');
        }

        // Get each project total weight if needed
        if($withWeight == true){
            if($clients) {
                foreach ($clients as $client) {
                    if($client->projects){
                        foreach($client->projects as $project){
                            $weight = Project::find($project->id)->tasks()->where('state','!=','complete')->sum('weight');
                            $project["weight"] = $weight;
                        }
                    }
                }
            }
        }
        return $this->setStatusCode(200)->makeResponse('Clients retrieved successfully',$clients->toArray());
    }

	
	
	public function create(Request $request){
        
		$a = microtime(true);
		//echo $a;die;
		$client = array(
			'name' => $request->get('name'),
			'user_id' => Auth::id(),
			'point_of_contact' => $request->get('cont_name'),
			'phone_number' => $request->get('phone'),
			'email' => $request->get('email'),
			'client_token' => $a,
		);

        Client::create($client);
        $id = \DB::getPdo()->lastInsertId();
		
		return back();
    }
	
	
    // Insert a new client into the database
    public function storeClient(){

        if (  strlen(trim(Input::get('name'))) == 0) {
            return $this->setStatusCode(400)->makeResponse('Name field is required');
        }

        Input::merge(array('user_id' => Auth::id()));
        Client::create(Input::all());
        $id = \DB::getPdo()->lastInsertId();

        return $this->setStatusCode(200)->makeResponse('Client created successfully', Client::find($id));
    }

    // Update the given client
    public function updateClient($id){
        if (count(Input::all()) <= 1) {
            return $this->setStatusCode(406)->makeResponse('No information provided to update client');
        }

        if( strlen(trim(Input::get('name'))) === 0 ){
            return $this->setStatusCode(406)->makeResponse('The client name is required');
        }

        if (!Client::find($id)) {
            return $this->setStatusCode(404)->makeResponse('Client not found');
        }

        $input = Input::all();
        unset($input['_method']);

        Client::find($id)->update($input);

        return $this->setStatusCode(200)->makeResponse('The client has been updated');
    }

    // Remove the given client and all tasks, projects and credentials attached to it
    public function removeClient($id){
        if (!Client::find($id)) {
            return $this->setStatusCode(400)->makeResponse('Could not find the client');
        }

        $client 	= 	Client::find($id);

        // delete all related tasks and credentials
        foreach ($client->projects as $p) {
            Task::where('project_id', $p->id)->delete();
            Credential::where('project_id', $p->id)->delete();
            $p->members()->detach();
        }
		Usertask::where("client_id", $id)->delete();
        // delete projects
        Project::where("client_id", $id)->delete();
        $client->delete();
        //return $this->setStatusCode(200)->makeResponse('Client deleted successfully');
		return back()->with('status','Client deleted successfully');
    }
	
	public function updateClientToken(Request $request)
	{
		$client_id = $request->get('client_id');
		$token_key = $request->get('token_key');
		
		Client::where('id', $client_id)->update(array('client_token' => $token_key));
		return back()->with('status','Url updated successfully');
	}
}