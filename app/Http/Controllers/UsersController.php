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
use App\User;
use App\Usertask;

class UsersController extends BaseController {

	// Go to clients index page
	public function index()
	{	
		$users=User::all();
		//return View::make('ins/clients/index')->with("pTitle", "Clients");
		return view('admin.user.home',compact('users'));
	}

    // Get all tasks for the given user
    public function getUser($id){
        $user_sel = Usertask::where('user_id',$id)->get();

		return view('admin.user.index',compact('user_sel','id'));
    }

	public function getCSV($id, $dt){
		
		if($dt==1){
			$month = 'January';
			$date1 = date('Y').'-01-01';
			$date2 = date('Y').'-01-30';
			
		}else if($dt==2){
			$month = 'February';
			$date1 = date('Y').'-02-01';
			$date2 = date('Y').'-02-30';
		}else if($dt==3){
			$month = 'March';
			$date1 = date('Y').'-03-01';
			$date2 = date('Y').'-03-30';
		}else if($dt==4){
			$month = 'April';
			$date1 = date('Y').'-04-01';
			$date2 = date('Y').'-04-30';
		}else if($dt==5){
			$month = 'May';
			$date1 = date('Y').'-05-01';
			$date2 = date('Y').'-05-30';
		}else if($dt==6){
			$month = 'June';
			$date1 = date('Y').'-06-01';
			$date2 = date('Y').'-06-30';
		}else if($dt==7){
			$month = 'July';
			$date1 = date('Y').'-07-01';
			$date2 = date('Y').'-07-30';
		}else if($dt==8){
			$month = 'August';
			$date1 = date('Y').'-08-01';
			$date2 = date('Y').'-08-30';
		}else if($dt==9){
			$month = 'September';
			$date1 = date('Y').'-09-01';
			$date2 = date('Y').'-09-30';
		}else if($dt==10){
			$month = 'October';
			$date1 = date('Y').'-10-01';
			$date2 = date('Y').'-10-30';
		}else if($dt==11){
			$month = 'November';
			$date1 = date('Y').'-11-01';
			$date2 = date('Y').'-11-30';
		}else if($dt==12){
			$month = 'December';
			$date1 = date('Y').'-12-01';
			$date2 = date('Y').'-12-30';
		}
		
		
		$table = 'user_tasks';
		$filename = tempnam(sys_get_temp_dir(), "csv");

		$conn = mysqli_connect("localhost", "root", "");
		$rg = mysqli_select_db($conn,"tms_db");

		$file = fopen($filename,"w");

		$fieldArray = array('Client','Project','Work Type','Start Time','End Time','Date');
		
		fputcsv($file,$fieldArray);

		// Write data rows
		$result = mysqli_query($conn,"select clients.name as Client,projects.name as Project,tasks.name as Task,user_tasks.start_time,user_tasks.end_time,user_tasks.date from $table inner join clients on clients.id=user_tasks.client_id inner join projects on projects.id=user_tasks.project_id inner join tasks on tasks.id=user_tasks.task_id where user_tasks.user_id='".$id."' and date between '" . $date1 . "' AND  '" . $date2 . "'");
		
		/*$i=0;
		while($row = mysqli_fetch_row($result)){
			$arr_res[$i++] = $row;
		}
		//print_r($arr_res);die;
		$nm = '';
		$hours=0;
		$flag = 0;
		foreach($arr_res as $res){
			if($flag == 0){
				$stop = strtotime( $arr_res->end_time );
				$start = strtotime( $arr_res->start_time );
				$hours += ( $stop - $start );
				$nm = $res->Task;
				$flag =1;
			}
			if($res->Task == $nm){
				$nm = $res->Task;
			}
		}
		
		$tk_arr=array();
		foreach($tasks as $tk){
			$hours=0;
			foreach($usertasks as $utk){
				if($tk->id == $utk->task_id){
					$stop = strtotime( $utk->end_time );
					$start = strtotime( $utk->start_time );
					$hours += ( $stop - $start );
					
				}
				//$t_hr = 
				
			}
			array_push($tk_arr,[$tk->id,$tk->name=>$hours]);
		}*/
		
		
		if(mysqli_num_rows($result) > 0){
		for ($i = 0; $i < mysqli_num_rows($result); $i++) {
			$dataArray[$i] = mysqli_fetch_row($result);
		}

		//print_r($dataArray);die;
		foreach ($dataArray as $line) {
			fputcsv($file,$line);
		}
		}

		fclose($file);
		
		$user_id = \DB::table('users')->where('id',$id)->pluck('name');
		
		header("Content-Type: application/csv");
		header("Content-Disposition: attachment;Filename='".$user_id."'-'".$month."'.csv");

		// send file to browser
		readfile($filename);
		unlink($filename);
		
	}
	
	public function ajax_add_task(Request $request)
	{

		$project_id = $request->get('project_id'); 
		//echo $project_id;die;
		$task_ids = Task::where('project_id',$project_id)->get();
	
		$ajax_task ='';
		$ajax_view ='';
		$count = count($task_ids); 
		if($count > 0)
		{
			$ajax_view .= '<option>Select WorkType</option>';
			foreach($task_ids as $list)
			{
				//$ajax_task .= '<input type="text" name="task_hidden" value="'. $list->task_name.'">';
				$ajax_view .= '<option value="'.$list->id.'">'.$list->name.'</option>';
			}
		}
		//echo json_encode($ajax_view); //die;
		echo $ajax_view;

		
	}
	
	public function removeUserTask($id){
		
		//Usertasks::delete($id);
		$utask = Usertask::find($id);    
		$utask->delete();
		return back();
	}
	

}