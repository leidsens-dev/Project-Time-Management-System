<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Credential;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
//use Auth;

class CredentialsController extends BaseController {

	// Get all credentials for the given project
	public function getProjectCredentials($id){
		if( count(Credential::where('project_id',$id)->get()) === 0 ){
			if (!Input::get('password')) {
				return $this->setStatusCode(404)->makeResponse('No credentials found for this project');
			}
		}

		return $this->setStatusCode(200)->makeResponse('Found credentials for this project', Credential::where('project_id',$id)->get() );
	}

	// Insert a new credential into the database
	/*public function storeCredential(){
		if (!Input::all()) {
			return $this->setStatusCode(406)->makeResponse('No information provided to create credential');
		}

		if (!Input::get('name')) {
			return $this->setStatusCode(406)->makeResponse('The name seems to be empty');
		}

		if (!Input::get('username')) {
			return $this->setStatusCode(406)->makeResponse('The username seems to be empty');
		}

		if (!Input::get('user_id')) {
			return $this->setStatusCode(406)->makeResponse('No user id is being passed');
		}

		if (!Input::get('project_id')) {
			return $this->setStatusCode(406)->makeResponse('No project id is being passed');
		}

		if (!Input::get('password')) {
			return $this->setStatusCode(406)->makeResponse('The password seems to be empty');
		}

		Credential::create(Input::all());
		$id = \DB::getPdo()->lastInsertId();

		return $this->setStatusCode(200)->makeResponse('Credential created successfully', Credential::find($id));
	}*/

	
	public function storeCredential(Request $request){
		if (!$request->all()) {
			//return $this->setStatusCode(406)->makeResponse('No information provided to create credential');
			return back()->with('status','No information provided to create credential');
		}

		if (!$request->get('name')) {
			//return $this->setStatusCode(406)->makeResponse('The name seems to be empty');
			return back()->with('status','The name seems to be empty');
		}

		if (!$request->get('username')) {
			//return $this->setStatusCode(406)->makeResponse('The username seems to be empty');
			return back()->with('status','The username seems to be empty');
		}

		/*if (!$request->get('user_id')) {
			//return $this->setStatusCode(406)->makeResponse('No user id is being passed');
			return back->with('status','No user id is being passed');
		}*/

		if (!$request->get('pro_id')) {
			//return $this->setStatusCode(406)->makeResponse('No project id is being passed');
			return back()->with('status','No project id is being passed');
		}

		if (!$request->get('password')) {
			//return $this->setStatusCode(406)->makeResponse('The password seems to be empty');
			return back()->with('status','The password seems to be empty');
		}
		
		$cred = array(
			'user_id' => Auth::user()->id,
			'project_id' => $request->get('pro_id'),
			'name' => $request->get('name'),
			'type' => $request->get('type'),
			'hostname' => $request->get('hostname'),
			'username' => $request->get('username'),
			'password' => $request->get('password'),
			'port' => $request->get('port')
		);

		Credential::create($cred);
		$id = \DB::getPdo()->lastInsertId();

		//return $this->setStatusCode(200)->makeResponse('Credential created successfully', Credential::find($id));
		return back()->with('status','Credential created successfully');
		//return redirect('admin/projects')->with
	}

	
	
	// Update the given credential
	public function updateCredential($id){
		if (!Credential::find($id)) {
			return $this->setStatusCode(400)->makeResponse('Could not find the credential');
		}

		if ( Input::get('name') === "") {
			return $this->setStatusCode(406)->makeResponse('The credential needs a name');
		}

		if ( Input::get('username') === "") {
			return $this->setStatusCode(406)->makeResponse('The credential needs a username');
		}

		if ( Input::get('password') === "") {
			return $this->setStatusCode(406)->makeResponse('The credential needs a password');
		}

		$input = Input::all();
		unset($input['_method']);

		Credential::find($id)->update($input);
		return $this->setStatusCode(200)->makeResponse('The credential has been updated');
	}

	// Remove the given credential from the database
	public function removeCredential($id){
		if (!Credential::find($id)) {
			//return $this->setStatusCode(400)->makeResponse('Could not find the credentials');
		}

		Credential::find($id)->delete();
		//return $this->setStatusCode(200)->makeResponse('Credentials deleted successfully');
		return back()->with('status','Credential deleted successfully');
	}
}