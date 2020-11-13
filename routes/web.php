<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//use Illuminate\Session;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return View::make('index')->with('pTitle', "A project management system for artisans");
});

Route::get('/', function () {
    return View::make('index')->with('pTitle', "A project management system for artisans");
});

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/projects', 'HomeController@getProject')->name('Project');
Route::post('/tasks', 'HomeController@userTask');
Route::post('/task_pause', 'HomeController@pauseTask');
Route::get('/task_timeout/{id}', 'HomeController@timeOut');
Route::get('/deltask/{id}', 'UsersController@removeUserTask');
Route::get('/settings', 'Auth\LoginController@logout');
Route::post('ajax_add_task', 'UsersController@ajax_add_task');

Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin']], function () {
    //Route::post('toggledeliver/{orderId}', 'OrderController@toggledeliver')->name('toggle.deliver');

    Route::get('/', function () {
		$clients= \DB::table('clients')->get();
		$project_ids = [];

       /* foreach($clients as $client){
			
			$project_ids[] = \DB::table('projects')->select('id')->where('client_id',$client->id)->get();
            //$project_ids[] = $project->project_id;
        }
		
		$task_id = [];
		foreach($project_id as $pro_id){
			$task_id[] = \DB::table('tasks')->select('id')->where('project_id',$pro_id->id)->get();
		}*/
		
		$countClient = \DB::table('clients')->count();
		$countUser = \DB::table('users')->count();
		
		$projects= \DB::table('projects')->get();
		$tasks = \DB::table('tasks')->get();
		$usertasks = \DB::table('user_tasks')->get();
		//print_r($usertasks);die;
		
		$tk_arr=array();
		foreach($tasks as $tk){
			$hours=0;
			foreach($usertasks as $utk){
				if($tk->id == $utk->task_id){
					if($utk->end_time != null){
					$stop = strtotime( $utk->end_time );
					$start = strtotime( $utk->start_time );
					$hours += ( $stop - $start );
					}
					
				}
				//$t_hr = 
				
			}
			array_push($tk_arr,[$tk->id,$tk->name=>$hours]);
		}
		//print_r($tk_arr);die;
		$total_time = 0;
		foreach($usertasks as $usr){
			if($usr->end_time == null){
				$total_time=  $total_time + 0;
			}else{
			$stop = strtotime( $usr->end_time );
			$start = strtotime( $usr->start_time );
			 $hours = ( $stop - $start );
			//$time = $usr->end_time - $usr->start_time;
			$total_time= $total_time + $hours;
			//echo $hours.'<br>';
			}
		}
		$sec = ($total_time%60);
		$time =($total_time/60) % 60;
		$hrs = floor($total_time / (60 * 60));
		//echo $total_time;die;
		$t_time = $hrs.'.'.$time;
		
        return view('admin.home',compact('clients','countClient','countUser','projects','tasks','usertasks','t_time','tk_arr'));
    })->name('admin.home');

    Route::post('product/image-upload/{productId}','ProductsController@uploadImages');
    Route::resource('projects','ProjectsController');
    Route::resource('clients','ClientsController');
	Route::resource('tasks','TasksController');
	Route::resource('users','UsersController');
	Route::post('tasks','TasksController@create');
	Route::post('projects','ProjectsController@create');
	Route::post('clients','ClientsController@create');
	Route::post('invite', 'ProjectsController@invite');
	Route::post('projects/{id}','ProjectsController@show');
	Route::post('project_update','ProjectsController@updateProject');
	Route::post('credential', 'CredentialsController@storeCredential');
	//storeCredential
	Route::post('task_update','TasksController@updateTask');
	Route::get('userss/{id}', 'UsersController@getUser');
	
	Route::get('delcredentials/{id}', 'CredentialsController@removeCredential');
	Route::get('projects/{id}/{member_id}', 'ProjectsController@removeMember' );
	Route::get('delclients/{id}', 'ClientsController@removeClient');
	
	Route::post('accessUrl', 'ClientsController@updateClientToken');

	Route::get('downloads/{id}/{dt}', 'UsersController@getCSV');

    Route::get('orders/{type?}', 'OrderController@Orders');

});


Route::get('client/{token_key}/{id}',function ($token, $id){
	
	$countClient = \DB::table('clients')->where([['id',$id],['client_token',$token]])->count();
	if($countClient > 0){
		
		$clients = \DB::table('clients')->where([['id',$id],['client_token',$token]])->get();
		$userdata = array(
				'username' => $clients[0]->name,
				'email' => $clients[0]->email,
				'tempClientToken' => $clients[0]->client_token,
				'tempClientId' => $id
				);
		//Session::set('tempClientName', $clients[0]->name);
		//Session::set('tempClientToken', $clients[0]->client_token);
		//$tempClientName = $this->session->set_userdata('tempClientName', $clients[0]->name);
		//$tempClientToken = $this->session->set_userdata('tempClientToken', $userdata);
		
		$projects= \DB::table('projects')->where('client_id',$id)->get();
		
		return view('clients.home',compact('projects','clients','userdata'));
	
	}

});

Route::get('client/{token_key}/{id}/{project_id}',function ($token, $id, $project_id){
	
	$countClient = \DB::table('clients')->where([['id',$id],['client_token',$token]])->count();
	if($countClient > 0){
		//use StartSession();
		
		$clients = \DB::table('clients')->where([['id',$id],['client_token',$token]])->get();
		$userdata = array(
				'username' => $clients[0]->name,
				'email' => $clients[0]->email,
				'tempClientToken' => $clients[0]->client_token,
				'tempClientId' => $id
				);
				
		$project = \DB::table('projects')->where([['id', $project_id],['client_id', $id]])->get();
		
		
		$tasks = \DB::table('tasks')->where('project_id',$project_id)->get();
		
		$userTask = \DB::table('user_tasks')->where([['project_id',$project_id],['client_id', $id]])->get();
		
		
		$total_time = 0;
		foreach($userTask as $usr){
			if($usr->end_time == null){
				$total_time=  $total_time + 0;
			}else{
			$stop = strtotime( $usr->end_time );
			$start = strtotime( $usr->start_time );
			$hours = ( $stop - $start );
			//$time = $usr->end_time - $usr->start_time;
			$total_time= $total_time + $hours;
			//echo $hours.'<br>';
			}
		}
		$total_time; 
		$sec = ($total_time%60);
		$time =($total_time/60) % 60;
		$hrs = floor($total_time / (60 * 60));
		//echo $total_time;die;
		$t_time = $hrs.' Hour '.$time.' Minutes';
		
		return view('clients.show',compact('project','clients','userdata','tasks','t_time'));
	
	}

});

