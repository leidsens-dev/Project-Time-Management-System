@extends('layouts.clientapp')

@section('content')
<div class="container">
    <div class="row">
	 <?php /*<div class="col-md-2">
            <div class="panel panel-primary" style="position:;">
                <div class="panel-heading"><i class="fa fa-bars"></i>&nbsp;Menu</div>

                <div class="panel-body">
                    

                    <div>
					<a href="{{url('admin/')}}" class="btn btn-warning"  style="width:100%;margin-bottom:;"><i class="fa fa-home"></i>&nbsp;Dashboard</a>
					</div><hr>
					<div style="width:100%">
					<a href="{{url('admin/clients')}}" class="btn btn-warning"  style="width:100%;margin-bottom:;"><i class="fa fa-user"></i>&nbsp;Clients</a>
					</div><hr>
					<div>
					<a href="{{url('admin/projects')}}" class="active btn btn-warning" style="width:100%;margin-bottom:;"><i class="fa fa-flag"></i>&nbsp;Projects</a>
					</div>
					<div><hr>
					<a href="{{url('admin/tasks')}}" class="btn btn-warning" style="width:100%;margin-bottom:;"><i class="fa fa-tag"></i>&nbsp;Tasks</a>
					</div>
					<hr>
					<div>
					<a href="{{url('admin/users')}}" class="btn btn-warning" style="width:100%;margin-bottom:;"><i class="fa fa-users"></i>&nbsp;Users</a>
					</div>
					
                </div>
            </div>
        </div>*/?>
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><i class="fa fa-bars"></i> <span>Projects > </span>{{$project[0]->name}}</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
					
					  
					  <!--<a class="btn btn-success pull-right"  style="width:30%;margin-bottom:;" data-toggle="modal" data-target="#myModal">+ ADD NEW PROJECT</a>-->
						
						<!-- Modal -->
						  <?php /*<div class="modal fade" id="myModal" role="dialog">
							<div class="modal-dialog modal-md">
							
							  <!-- Modal content-->
							  <div class="modal-content">
								<div class="modal-header">
								  <button type="button" class="close" data-dismiss="modal">&times;</button>
								  <h4 class="modal-title">Update Project</h4>
								</div>
								<div class="modal-body">
									
									<form class="form-horizontal" method="post" action="{{url('admin/project_update')}}">
										{{ csrf_field() }}
									  <input type="hidden" name="pro_id" value="{{$project->id}}">
										<div class="col-xs-12 no-side-padding">
											<label>Name:</label>
											<input name="name" type="text" class="form-control first" value="{{$project->name}}">
										</div>
										<div class="col-xs-12 no-side-padding">
											<label>Production Url:</label>
											<input name="production" type="text" class="form-control" value="{{ $project->production }}">
										</div>
										<div class="col-xs-12 no-side-padding">
											<label>Development Url:</label>
											<input name="dev" type="text" class="form-control" value="{{ $project->dev }}">
										</div>
										<div class="col-xs-12 no-side-padding">
											<label>Github (or other):</label>
											<input name="github" type="text" class="form-control" value="{{ $project->github }}">
										</div>
										
										<br>
										<div class="col-xs-6 no-side-padding"><br>
										<input type="submit" class="btn btn-success form-control" name="submit" value="Update">
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
						  </div><!--End-->*/?>
						  
						  
						  
						  <!-- Task Modal -->
						  <?php /*<div class="modal fade" id="taskModal" role="dialog">
							<div class="modal-dialog modal-md">
							
							  <!-- Modal content-->
							  <div class="modal-content">
								<div class="modal-header">
								  <button type="button" class="close" data-dismiss="modal">&times;</button>
								  <h4 class="modal-title">Update Task</h4>
								</div>
								<div class="modal-body">
								<form method="post" action="{{url('admin/task_update')}}">
									{{csrf_field()}}
								<input type="hidden" name="t_id" value="" id="t_id">
									<div class="col-xs-12 no-side-padding">
										<label>Name:</label>
										<input name="name" id="name" type="text" class="form-control" value="">
									</div>
									<div class="col-xs-4 no-side-padding">
										<label>Weight:</label>
										<select name="weight" class="form-control">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
										</select>
									</div>
									<div class="col-xs-4">
										<label>Priority:</label>
										<select name="priority" class="form-control">
											<option value="low">low</option>
											<option value="normal">normal</option>
											<option value="medium">medium</option>
											<option value="high">high</option>
											<option value="highest">highest</option>
										</select>
									</div>
									<div class="col-xs-4 no-side-padding">
										<label>State:</label>
										<select name="state" class="form-control">
											
											<option value="developing" selected>Developing</option>
											<option value="testing">Testing</option>
											<option value="finish">Finish</option>
										</select>
									</div>
									<div class="col-xs-12 no-side-padding">
									<label>Description:</label>
									<textarea name="description" rows="5" class="form-control"></textarea>
									<br>
									</div>
									<div class="col-xs-4 no-side-padding">
									<input type="submit" name="submit" value="Update" class="btn btn-success">
									</div>
									<span class="count pull-right"></span>
									
								</form>
								</div>
								<div class="modal-footer">
								  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
								</div>
							  </div>
							  
							</div>
						  </div><!--End-->*/?>
						
						
	<div class="row">
        <div class="col-xs-12 page-title-section">
            <h1 class="pull-left">{{ $project[0]->name }} <!--<a class="btn btn-success"  data-toggle="modal" data-target="#myModal" alt="Update"><i class="fa fa-pencil-square-o" aria-hidden="true" title="Update Project"></i></a>--></h1>
            <div class="clearfix"></div>
            <div class="col-sm-12 col-md-12 no-side-padding">
                <p><span style="color:black;font-size:18px;">Description:</span> <br>{{$project[0]->description}}</p>
            </div>
			<div class="col-sm-12 col-md-6 no-side-padding pull-left">
				<span class="label label-success" style="font-size:16px;"><i class="ion-ios-time-outline"></i> Total Man-hour : <span clas="pull-right">{{ $t_time }}</span></span>
			</div>
            <div class="col-sm-12 col-md-6 no-side-padding pull-right">
				<a href="{{ $project[0]->production }} " target="_blank" class="pull-right"><span class="label label-primary" style="font-size:14px;"><i class="ion-ios-world-outline"></i> Production</span></a>
				<a href="{{ $project[0]->dev }}" target="_blank" class="pull-right"><span class="label label-warning" style="font-size:14px;"><i class="ion-ios-world-outline"></i> Development</span></a>
				<a href="{{ $project[0]->github }}" target="_blank" class="pull-right"><span class="label label-success" style="font-size:14px;"><i class="ion-fork-repo"></i> Version Control</span></a>
            </div>
            <div class="clearfix"></div>
            <p>
                <hr>
                <span class="dim">Progress</span>
                <span>
                    <span class="dim">| Low</span> <span style="border-radius:50%;padiing:5px;background:#00BCD4;color:#00BCD4">oo</span>
                    <span class="dim">Normal</span> <span style="border-radius:50%;padiing:5px;background:#2196F3;color:#2196F3">oo</span>
                    <span class="dim">Medium</span> <span style="border-radius:50%;padiing:5px;background:#e167ff;color:#e167ff">oo</span>
                    <span class="dim">High</span> <span style="border-radius:50%;padiing:5px;background:#FF9800;color:#FF9800">oo</span>
                    <span class="dim">Highest</span> <span style="border-radius:50%;padiing:5px;background:#ff4559;color:#ff4559">oo</span>
                </span>
            </p>
            <div class="col-xs-11 no-padding-left">
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="70"
                         aria-valuemin="0" aria-valuemax="100" style="width:70%">
                    </div>
                </div>
            </div>
            <div class="col-xs-1 no-margin-right">
                <div class="pull-right"><span class="weight"></span></div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
	

	<div class="row">
        <div class="col-xs-12">
            <div class="main-section">
                <div class="pull-right">
                    <!--<button onclick="showTaskCreateForm()" style="position: relative; z-index: 10" class="btn btn-primary"><span class="ion-plus-circled"></span> New Task</button>-->
                </div>
                <ul class="nav nav-tabs">
				  <li class="active"><a data-toggle="tab" href="#home">Tasks</a></li>
				  <!--<li><a data-toggle="tab" href="#menu1">Credentials</a></li>
				  <li><a data-toggle="tab" href="#menu2">Members</a></li>-->
				</ul>

				<div class="tab-content">
				  <div id="home" class="tab-pane fade in active">
					<h3>All Tasks</h3>
					<table class="table table-striped">
						<thead>
						<tr>
							<th>In Progress ()</th>
							<th>Testing ()</th>
							<th>Completed ()</th>
						</tr>
						</thead>
						<tbody>
						<?php if(count($tasks) >0){ ?>
						@foreach($tasks as $task)
						<?php 
							$low='<span style="border-radius:50%;padiing:5px;background:#00BCD4;color:#00BCD4">oo</span>';
							$normal='<span style="border-radius:50%;padiing:5px;background:#2196F3;color:#2196F3">oo</span>';
							$medium='<span style="border-radius:50%;padiing:5px;background:#e167ff;color:#e167ff">oo</span>';
							$high='<span style="border-radius:50%;padiing:5px;background:#FF9800;color:#FF9800">oo</span>';
						?>
						<tr>
							<td>
							<?php if($task->state == "developing"){ 
								echo '<div style=" width: 75%; border: 2px solid #428055;padding: 10px;background: grey;color: white;box-shadow: 3px 3px 2px solid #AAA;">';
								echo "W.".$task->weight;
								echo "<br>".$task->name;
								echo "<br>";
								if($task->priority=='low'){ echo $low; }elseif($task->priority=='normal'){echo $normal;}elseif($task->priority=='medium'){echo $medium;}else{echo $high;} 
								echo '<a class="btn" id="tk" data-toggle="modal" data-target="#taskModal" data-id="'.$task->id.'" data-name-id="'.$task->name.'"><span style="padding-right: 8px;padding-left: 8px;font-size: 15px;border-radius: 20px;font-weight: bolder;margin-left: 10px;background: aquamarine;color: black;">...</span></a>';
								echo "</div>";
								}
							?>
							</span>
							</td>
							<td>
							<?php if($task->state == 'testing'){
								echo '<div style=" width: 75%; border: 2px solid #428055;padding: 10px;background: grey;color: white;box-shadow: 3px 3px 2px solid #AAA;">';
								echo "W.".$task->weight;
								echo "<br>".$task->name;
								echo "<br>";
								if($task->priority=='low'){ echo $low; }elseif($task->priority=='normal'){echo $normal;}elseif($task->priority=='medium'){echo $medium;}else{echo $high;} 
								echo '<a class="btn" id="tk" data-toggle="modal" data-target="#taskModal" data-id="'.$task->id.'" data-name-id="'.$task->name.'"><span style="padding-right: 8px;padding-left: 8px;font-size: 15px;border-radius: 20px;font-weight: bolder;margin-left: 10px;background: aquamarine;color: black;">...</span></a>';
								echo "</div>";
								}
							?>
							
							</td>
							<td>
							<?php if($task->state == 'finish'){ 
								echo '<div style=" width: 75%; border: 2px solid #428055;padding: 10px;background: grey;color: white;box-shadow: 3px 3px 2px solid #AAA;">';
								echo "W.".$task->weight;
								echo "<br>".$task->name;
								echo "<br>";
								if($task->priority=='low'){ echo $low; }elseif($task->priority=='normal'){echo $normal;}elseif($task->priority=='medium'){echo $medium;}else{echo $high;} 
								echo '<a class="btn" id="tk" data-toggle="modal" data-target="#taskModal" data-id="'.$task->id.'" data-name-id="'.$task->name.'"><span style="padding-right: 8px;padding-left: 8px;font-size: 15px;border-radius: 20px;font-weight: bolder;margin-left: 10px;background: aquamarine;color: black;">...</span></a>';
								echo "</div>";
								echo "<i class='ion-flag'></i></span>";
								}
							?>
							
							
							</td>
						</tr>
						@endforeach
						<?php }
						 ?>
						</tbody>
					</table>
				  </div>
				  <?php /*<div id="menu1" class="tab-pane fade"><br>
					<form class="credential-form new-credential" id="myForm" method="post" action="{{url('admin/credential')}}">
					{{csrf_field()}}
						<div class="form-group">
							<label>FTP/SSH</label> <input  type="radio" name="type" value="1" checked>
							<label>Other</label> <input  type="radio" name="type" value="0">
						</div>
						<input type="hidden" value="{{ $project->id }}" name="pro_id">
						<div class="form-group">
							<label>Name</label>
							<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
							<input class="form-control" type="text" name="name" placeholder="Name" required>
							</div>
						</div>
						<div class="form-group">
							<label>Username</label>
							<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
							<input class="form-control" type="text" name="username" placeholder="Username" required>
							</div>
						</div>
						<div class="form-group">
							<label>Password</label>
							<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
							<input class="form-control" type="text" name="password" placeholder="Password" required>
							</div>
						</div>
						<div class="form-group type-new" id="other" >
							<div class="col-xs-6 no-padding-left">
								<label>Hostname</label>
								<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-server fa-fw"></i></span>
								<input class="form-control other" type="text" name="hostname" placeholder="Hostname">
								</div>
							</div>
							<div class="col-xs-6 no-padding-right">
								<label>Port</label>
								<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-plug fa-fw"></i></span>
								<input class="form-control other" type="text" name="port" placeholder="Port">
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="form-group">
							<button class="btn btn-primary">Save</button>
						</div>
					</form>
					<hr>
					<p>
						<table class="table table-striped">
							<thead><tr><th>Name</th><th>Username</th><th>Password</th><th>Hostname</th><th>Port</th><th>Actions</th></tr></thead>
							<tbody>
							<?php if($credentials == 'No credentials found for this project'){ echo '<tr><td>'.$credentials.'</td></tr>';}else{ ?>
							@foreach($credentials as $credential)
								<tr >
									<td>{{$credential->name}}</td>
									<td>{{$credential->username}}</td>
									<td>{{$credential->password}}</td>
									<td>{{$credential->hostname}}</td>
									<td>{{$credential->port}}</td>
									<td style="font-size: 1.5em">
										
										<a href="{{url('admin/delcredentials/'.$credential->id)}}"><i class="fa fa-times-circle-o" aria-hidden="true" title="Delete Credential"></i></a>
									</td>
								</tr>
							@endforeach
							<?php } ?>
							</tbody>
						</table>
					</p>
				  </div>
				  <div id="menu2" class="tab-pane fade">
					<div class="col-xs-12 col-md-5"><br><br>
						<section>
							<form class="form-horizontal" method="post" action="{{url('admin/invite')}}">
							{{csrf_field()}}
							
								<input type="hidden" name="ps_id" value="{{$project->id}}">
								<div class="form-group">
									<label class="control-label col-sm-2" for="name">Email:</label>
									<div class="col-sm-10">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
									 <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
									 </div>
									 </div>
								</div>
								<div class="form-group"> 
									<div class="col-sm-offset-2 col-sm-10">
									  <button type="submit" class="btn btn-primary" name="submit">Invite Member</button>
									</div>
								</div>
							</form>
						</section>
					</div>
					<div class="col-xs-12 col-md-7">
						
						<hr>
						<table class="table table-striped">
							<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Actions</th>
							</tr>
							</thead>
							<tbody>
							<!--<tr>
								<td>1</td>
								<td></td>
								<td><i class="ion-flag"></i></td>
							</tr>-->
							<?php if(count($members) >0){ ?>
							<?php $index=1; ?>
							@foreach($members as $member)
							<tr >
								<td>{{ $index ++ }}</td>
								<td style="color:Black;font-weight:bolder;text-decoration:none;">{{$member->name}}</td>
								<td style="font-size: 1.5em">
									<!--<a ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>-->
									<a href="{{url('admin/projects/'.$project->id.'/'.$member->id)}}"><i class="fa fa-times-circle-o" aria-hidden="true" title="Delete Member"></i></a>
								</td>
							</tr>
							@endforeach
							<?php } ?>
							</tbody>
						</table>
						<p></p>
					</div>
				  </div>*/?>
				</div>
            </div>
        </div>
    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
	$('#myForm input[type=radio]').on('change', function() {
		var sel=0;
	   sel = $('input[name=type]:checked', '#myForm').val(); 
	   if(sel==1){
		   $('#other').show();
	   }else{
		   $('#other').hide();
	   }
	});
	
	$(document).on("click", "#tk", function () {
		//alert('hi');
		var myBookId = $(this).data('id');
		var myNameId = $(this).data('name-id');
		$(".modal-body #t_id").val( myBookId );
		$(".modal-body #name").val( myNameId );
	});
});

</script>
@endsection
