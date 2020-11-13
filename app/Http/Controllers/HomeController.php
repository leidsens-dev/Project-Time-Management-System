<?php

namespace App\Http\Controllers;

//use Auth;
use App\Projectuser;
use App\User;
use App\Usertask;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Client;
use App\Project;
use App\Task;
use App\Credential;
use App\Helpers\Helpers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$clients=Client::all();
		
		$projectuser = Projectuser::select('project_id')->where('user_id',Auth::user()->id)->get();
		//echo $projectuser;die;
		$project = [];
		foreach($projectuser as $pro_id)
		{
			$project[]=Project::where('id',$pro_id->project_id)->get();
		}
		//print_r($project);die;
		
		$projects=Project::all();
				
		$tasks = Task::all();
		
		$userTask = \DB::table('user_tasks')->where('user_id',Auth::user()->id)->get();
		
		return view('home',compact('projects','clients','tasks','userTask','project'));
		
        //return view('home');
    }
	
	public function getProject()
	{
		$projectuser = Projectuser::where('user_id',Auth::user()->id)->pluck('project_id');
		//print_r($projectuser);die;
		$projects = array();
		foreach($projectuser as $id){
			array_push($projects, Project::where('id',$id)->get());
		}
		//print_r($projects);die;
		//$projects=Project::all();
		//return View::make('ins/clients/index')->with("pTitle", "Clients");
		$clients=Client::all();
		return view('project',compact('projects','clients'));
	}
	
	public function userTask(Request $request){
		$input = array(
			'user_id' => Auth::user()->id,
			'client_id' => $request->get('client'),
			'project_id' => $request->get('project'),
			'task_id' => $request->get('task'),
			'start_time' => $request->get('start'),
			'end_time' => $request->get('end'),
			'description' => $request->get('desc'),
			'date' => $request->get('date')
		);
		
		//$insert_id = Usertask::create('user_tasks')->insertGetId($input);
		$insert_id = Usertask::create($input);
		return back();
	}
	
	public function pauseTask(Request $request){
		date_default_timezone_set('Asia/Kolkata');
		//echo date("H:i:s");die;
		$input = array(
			'user_id' => Auth::user()->id,
			'client_id' => $request->get('c_id'),
			'project_id' => $request->get('p_id'),
			'task_id' => $request->get('task_id'),
			'start_time' => date('H:i:s'),
			
			'date' => date('Y-m-d')
		);
		
		$upd = array(
			'end_time' => $request->get('p_at')
		);
		
		Usertask::where('id',$request->get('t_id'))->update($upd);
		//$insert_id = Usertask::create('user_tasks')->insertGetId($input);
		$insert_id = Usertask::create($input);
		return back();
	}
	
	public function timeOut($id){
		date_default_timezone_set('Asia/Kolkata');
		$upd = array(
			'end_time' => date('H:i:s')
		);
		
		Usertask::where('id',$id)->update($upd);
		return back();
	}
}
