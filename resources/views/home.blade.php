@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
		<div class="col-md-2 ">
            <div class="panel panel-primary" style="position:;">
                <div class="panel-heading"><i class="fa fa-bars"></i>&nbsp;Menu</div>
				<div class="panel-body">
					<div style="width:100%">
					<div>
					<a href="{{url('home')}}" class="active btn btn-warning" style="width:100%;margin-bottom:;"><i class="fa fa-tag"></i>&nbsp;Tasks</a>
					</div><hr>
					<div>
					<a href="{{url('projects')}}" class="btn btn-warning" style="width:100%;margin-bottom:;"><i class="fa fa-flag"></i>&nbsp;Projects</a>
					</div>
					
					<hr>
					</div>
				</div>
			</div>
		</div>
		
	
        <div class="col-md-10 ">
            <div class="panel panel-primary">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

					<!-- Modal -->
						  <div class="modal fade" id="myModal" role="dialog">
							<div class="modal-dialog modal-sm">
							
							  <!-- Modal content-->
							  <div class="modal-content">
								<div class="modal-header">
								  <button type="button" class="close" data-dismiss="modal">&times;</button>
								  <h4 class="modal-title">Timer Paused</h4>
								</div>
								<div class="modal-body">
									
									<form class="form-horizontal" method="post" action="{{url('task_pause')}}">
										{{ csrf_field() }}
										<input type="hidden" name="c_id" id="c_id" value="">
										<input type="hidden" name="p_id" id="p_id" value="">
									  <input type="hidden" name="t_id" id="t_id" value="">
									  <input type="hidden" name="task_id" id="task_id" value="">
										<div class="col-xs-12 no-side-padding">
											<label>Paused At:</label>
											<input name="p_at" id="p_at" type="hidden" class="form-control first" value="">
											<div id="shw_t"></div>
											<div>Please Click on Resume to start your task time log and continue...You can close it if you do not want to resume!</div>
										</div>
										
										
										<br>
										<div class="col-xs-6 no-side-padding"><br>
										<input type="submit" class="btn btn-success form-control" name="submit" value="Resume">
										</div>
										<span class="count pull-right"></span>
										<div class="clearfix"></div>
										
									</form>
									
								</div>
								<div class="modal-footer">
								  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
								</div>
							  </div>
							  
							</div>
						  </div><!--End-->
					
					
					<!-- Time Log Modal -->
				  <div class="modal fade" id="timeModal" role="dialog">
					<div class="modal-dialog modal-lg">
					
					  <!-- Modal content-->
					  <div class="modal-content">
						<div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal">&times;</button>
						  <h4 class="modal-title">Add New Time Log</h4>
						</div>
						<div class="modal-body">
						
						<form class="form-horizontal" method="post" action="{{url('tasks')}}">
						{{ csrf_field() }}
					  <div class="form-group">
						
						<div class="col-sm-12"><label for="client">Client:</label>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
								<select class="form-control" id="client" name="client" required>
									<option>Select client</option>
									@foreach($clients as $cli)
										<option value="{{$cli->id}}">{{$cli->name}}</option>
									@endforeach
								</select>
							</div>
						</div>
					  </div>
					  <div class="form-group">
						
						<div class="col-sm-12"> <label for="project">Project:</label>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-flag fa-fw"></i></span>
								<select class="form-control" id="project_sel" name="project" onchange="selTask(this.id);">
									<option>Select Project</option>
									@foreach($project as $pro)
										<option value="{{$pro[0]->id}}">{{$pro[0]->name}}</option>
									@endforeach
								</select>
							</div>
						</div>
					  </div>
					  <div class="form-group">
						
						<div class="col-sm-6"> <label for="start">StartTime:</label>
						<div class="input-group">
							<span class="input-group-addon" id="start" onclick="getTime(this.id);"><i class="fa fa-clock-o fa-fw"></i></span>
							<input type="text" class="form-control" id="instart" name="start" placeholder="H:M:S" required></div>
							<!--<span class="btn btn-primary" style="color:blue; background;height:25px" id="start" onclick="getTime(this.id);"></span>-->
							
						</div>
						
						<div class="col-sm-6"> <label for="end">EndTime:</label>
						<div class="input-group">
							<span class="input-group-addon" id="end" onclick="getTime(this.id);"><i class="fa fa-clock-o fa-fw"></i></span>
							<input type="text" class="form-control" id="inend" name="end" placeholder="H:M:S"></div>
							<!--<span class="btn btn-danger" style="color:blue; background:;height:25px" id="end" onclick="getTime(this.id);"></span>-->
							
						</div>
					  </div>
					  <div class="form-group">
						<br>
						<div class="col-sm-6"> <label  for="date">Date:</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
							<input type="text" class="form-control" id="date" name="date" placeholder="Enter Date" value="{{date('Y-m-d')}}">
							</div>
						</div>
						
						<div >
							<input type="hidden" name="task_name" id="task_name" value="" />
						</div>
						
						<div class="col-sm-6"> <label for="task">Work Type:</label>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-tasks fa-fw"></i></span>
								<select class="form-control" id="task_sel" name="task" required>
									<option>Select WorkType</option>
									@foreach($tasks as $task)
										<option value="{{$task->id}}">{{$task->name}}</option>
									@endforeach
								</select>
							</div>
						</div>
					  </div>
					  <div class="form-group">
						
						<div class="col-sm-12"><label for="desc">Description:</label>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
								<textarea class="form-control" id="desc" name="desc" placeholder="Enter Description" rows="5"></textarea>
							</div>
						</div>
					  </div>
					  <div class="form-group"> 
						<div class=" col-sm-10">
						  <button type="submit" class="btn btn-success" name="submit">Submit</button>
						</div>
					  </div>
					</form>
						
						</div>
						<div class="modal-footer">
						  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						</div>
					  </div>
					  
					</div>
				  </div><!--End-->
                   
				   <h3>Tasks History
				   <button class="btn btn-success pull-right" data-toggle="modal" data-target="#timeModal"> Add New Time Log </button></h3>
				   <hr>
				   
					<p>
						<table class="table table-striped">
							<thead><tr><th>Client</th><th>Date</th><th>StartTime</th><th>EndTime</th><th>WorkType</th><th>Description</th><th>Actions</th></tr></thead>
							<tbody>
							
							@foreach($userTask as $tsk)
								<tr >
								@foreach($clients as $cli)
								@if($cli->id == $tsk->client_id)
									<td>{{$cli->name}}</td>
								@endif
								@endforeach
									<td>{{$tsk->date}}</td>
									<td>{{$tsk->start_time}}</td>
									<td>{{$tsk->end_time}}</td>
								@foreach($tasks as $task)
								@if($task->id == $tsk->task_id)
									<td>{{$task->name}}</td>
								@endif
								@endforeach
									<td>{{$tsk->description}}</td>
									<td>
										@if($tsk->end_time == null)
											<a><i class="fa fa-pause" aria-hidden="true" onclick="pause_t(this.id)" id="{{$tsk->id}}" data-toggle="modal" data-target="#myModal" data-id="{{$tsk->client_id}}" data-p-id="{{$task->project_id}}" data-ts-id="{{$tsk->task_id}}" style="font-size: 25px;" title="Pause Task"></i></a>
											&nbsp;&nbsp;<a href="{{url('task_timeout/'.$tsk->id)}}"><i class="fa fa-stop-circle" style="font-size:25px;color:red" title="Stop/Complete Task"></i></a>
										@endif
										&nbsp;&nbsp;<a href="{{url('deltask/'.$tsk->id)}}"><i class="fa fa-times-circle-o" aria-hidden="true" style="font-size: 25px;" title="Delete Task"></i></a>
									</td>
								</tr>
							@endforeach
							</tbody>
						</table>
					</p>
					
					<hr>
					<br>
					<?php /* ?><h4>Add New Time Log</h4>
					<div style="padding:20px;">
					<form class="form-horizontal" method="post" action="{{url('tasks')}}">
						{{ csrf_field() }}
					  <div class="form-group">
						
						<div class="col-sm-12"><label for="client">Client:</label>
						<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
							<select class="form-control" id="client" name="client">
								<option>Select client</option>
								@foreach($clients as $cli)
									<option value="{{$cli->id}}">{{$cli->name}}</option>
								@endforeach
							</select>
							</div>
						</div>
					  </div>
					  <div class="form-group">
						
						<div class="col-sm-12"> <label for="project">Project:</label>
						<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-flag fa-fw"></i></span>
							<select class="form-control" id="project" name="project">
								<option>Select Project</option>
								@foreach($project as $pro)
									<option value="{{$pro[0]->id}}">{{$pro[0]->name}}</option>
								@endforeach
							</select>
							</div>
						</div>
					  </div>
					  <div class="form-group">
						
						<div class="col-sm-6"> <label for="start">StartTime:</label><br>
						<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-clock-o fa-fw"></i></span>
							<input type="text" class="form-control" id="instart" name="start" placeholder="Enter StartTime"></div>
							<span class="btn btn-primary" style="color:blue; background;height:25px" id="start" onclick="getTime(this.id);"></span>
							
						</div>
						
						<div class="col-sm-6"> <label for="end">EndTime:</label><br>
						<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-clock-o fa-fw"></i></span>
							<input type="text" class="form-control" id="inend" name="end" placeholder="Enter EndTime"></div>
							<span class="btn btn-danger" style="color:blue; background:;height:25px" id="end" onclick="getTime(this.id);"></span>
							
						</div>
					  </div>
					  <div class="form-group">
						<br>
						<div class="col-sm-6"> <label  for="date">Date:</label>
						<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
							<input type="text" class="form-control" id="date" name="date" placeholder="Enter Date" value="{{date('Y-m-d')}}">
							</div>
						</div>
						
						<div >
							<input type="hidden" name="task_name" id="task_name" value="" />
						</div>
						
						<div class="col-sm-6"> <label for="task">Work Type:</label>
						<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-tasks fa-fw"></i></span>
							<select class="form-control" id="task" name="task">
								<option>Select task</option>
								@foreach($tasks as $task)
									<option value="{{$task->id}}">{{$task->name}}</option>
								@endforeach
							</select>
							</div>
						</div>
					  </div>
					  <div class="form-group">
						
						<div class="col-sm-12"><label for="desc">Description:</label>
						<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
						  <textarea class="form-control" id="desc" name="desc" placeholder="Enter Description" rows="5"></textarea>
						  </div>
						</div>
					  </div>
					  <div class="form-group"> 
						<div class=" col-sm-10">
						  <button type="submit" class="btn btn-success" name="submit">Submit</button>
						</div>
					  </div>
					</form>
					</div><?php */ ?>
				  
				  
                </div>
            </div>
        </div>
	<script>
		//$(document).ready(function(){
		function selTask(id){
			//$("#project_sel").on("change", function(){
			//alert('hi');
				var selected = $('#'+id).val();
				console.log(selected);
				//$("#employee_id").html("You selected: " + selected);
				ajax_get_task_selected(selected);
			//});
		}
		//});
		
		
			
		function ajax_get_task_selected(opts)
		{
			console.log(opts);
			$.ajax({
				type: 'POST',
				data: {project_id: opts},
				url: '{{url('/')}}/ajax_add_task',
				//dataType: 'json',
				//cache: false,
				
				success: function(ajax_view){
					//var datas = $.parseJSON(ajax_view);
					console.log(ajax_view);
					//$('#task_hidden').html(data[0]);
					$('#task_sel').html(ajax_view);
					//var sel_task = document.getElementById('task_sel');
					//var task= sel_task.options[sel_task.selectedIndex].text;
					//$('#task_name').val(task);
				}
			});
		}
	</script>
    <script>
	
	
	function getTime(id){
		var d = new Date(); // for now
		var hr=d.getHours(); // => 9
		var mn=d.getMinutes(); // =>  30
		var sc=d.getSeconds(); // => 51
		var time_at = hr+':'+mn+':'+sc;
		
		$('#in'+id).val( time_at );
	}
	
	function pause_t(id){
		var d = new Date(); // for now
		var hr=d.getHours(); // => 9
		var mn=d.getMinutes(); // =>  30
		var sc=d.getSeconds(); // => 51
		
		var paused_at = hr+':'+mn+':'+sc;
		
		var c_id = $("#"+id).data('id');
		var p_id = $("#"+id).data('p-id');
		var task_id = $('#'+id).data('ts-id');
		$(".modal-body #p_at").val( paused_at );
		$(".modal-body #t_id").val( id );
		$(".modal-body #c_id").val( c_id );
		$(".modal-body #p_id").val( p_id );
		$(".modal-body #task_id").val( task_id );
		$(".modal-body #shw_t").html( paused_at );
		
	}
	
	
	/*$(document).ready(function(e) {
				
		var project_id = $("#project option:first").val();

		$.ajax({
			type: 'POST',
			data: {project_id: project_id},
			url: "admin/ajax_add_task",
			//dataType: 'json',
			//cache: false,
			success: function(data){
				console.log(data);
				
				$('#task').html(data);
				var sel_task = document.getElementById('task');
				var task= sel_task.options[sel_task.selectedIndex].text;
				$('#task_name').val(task);
			}
		});
				  
	});*/
				
	
	
	</script>
	<script type="text/javascript">
	/*$(document).ready(function(){
		$('#instart').timepicker({ 'timeFormat': 'H:i:s' });
		$('#inend').timepicker({ 'timeFormat': 'H:i:s' });
	});*/
	
	</script>
</div>
@endsection
