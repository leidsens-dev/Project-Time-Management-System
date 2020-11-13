@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
	 <div class="col-md-2">
            <div class="panel panel-primary" style="position:;">
                <div class="panel-heading"><i class="fa fa-bars"></i>&nbsp;Menu</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
					<a href="{{url('admin/')}}" class="btn btn-warning"  style="width:100%;margin-bottom:;"><i class="fa fa-home"></i>&nbsp;Dashboard</a>
					</div><hr>
					<div style="width:100%">
					<a href="{{url('admin/clients')}}" class="btn btn-warning"  style="width:100%;margin-bottom:;"><i class="fa fa-user"></i>&nbsp;Clients</a>
					</div><hr>
					<div>
					<a href="{{url('admin/projects')}}" class="btn btn-warning" style="width:100%;margin-bottom:;"><i class="fa fa-flag"></i>&nbsp;Projects</a>
					</div>
					<div><hr>
					<a href="{{url('admin/tasks')}}" class="active btn btn-warning" style="width:100%;margin-bottom:;"><i class="fa fa-tag"></i>&nbsp;Tasks</a>
					</div>
					<hr>
					<div>
					<a href="{{url('admin/users')}}" class="btn btn-warning" style="width:100%;margin-bottom:;"><i class="fa fa-users"></i>&nbsp;Users</a>
					</div>
					
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="panel panel-primary">
                <div class="panel-heading">Admin > Tasks</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

					
					  <h2>Tasks</h2>
					  <a class="btn btn-success pull-right"  style="width:30%;margin-bottom:;" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp; ADD NEW TASK</a>
						
						<!-- Modal -->
						  <div class="modal fade" id="myModal" role="dialog">
							<div class="modal-dialog modal-lg">
							
							  <!-- Modal content-->
							  <div class="modal-content">
								<div class="modal-header">
								  <button type="button" class="close" data-dismiss="modal">&times;</button>
								  <h4 class="modal-title">Add New Task Here</h4>
								</div>
								<div class="modal-body">
									
									<form class="form-horizontal" method="post" action="{{url('admin/tasks')}}">
										{{ csrf_field() }}
									  <div class="form-group">
										<label class="control-label col-sm-2" for="name">Task Title:</label>
										<div class="col-sm-10">
										<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
										  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
										  </div>
										</div>
									  </div>
									  <div class="form-group">
										<label class="control-label col-sm-2" for="project">Project:</label>
										<div class="col-sm-10">
											<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-tasks fa-fw"></i></span>
											<select class="form-control" id="project" name="project">
												<option>Select Project</option>
												@foreach($projects as $pro)
													<option value="{{$pro->id}}">{{$pro->name}}</option>
												@endforeach
											</select>
											</div>
										</div>
									  </div>
									  <div class="form-group">
										<label class="control-label col-sm-2" for="state">State:</label>
										<div class="col-sm-4">
											<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-bookmark-o fa-fw"></i></span>
											<select class="form-control" id="state" name="state">
												<option>Select State</option>
												<option value="developing">Developing</option>
												<option value="testing">Testing</option>
												<option value="finish">Finish</option>
												
											</select>
											</div>
										</div>
										<label class="control-label col-sm-2" for="weight">Weight:</label>
										<div class="col-sm-4">
											<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-balance-scale fa-fw"></i></span>
											<select class="form-control" id="weight" name="weight">
												<option>Select Weight</option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
											</select>
											</div>
										</div>
									  </div>
									  <div class="form-group">
										<label class="control-label col-sm-2" for="due">Due Date:</label>
										<div class="col-sm-4">
											<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
											<input type="text" class="form-control" id="due" name="due" placeholder="Enter Date">
											</div>
										</div>
										<label class="control-label col-sm-2" for="priority">Priority:</label>
										<div class="col-sm-4">
											<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-flag fa-fw"></i></span>
											<select class="form-control" id="priority" name="priority">
												<option>Select priority</option>
												<option value="low">Low</option>
												<option value="normal">Normal</option>
												<option value="medium">Medium</option>
												<option value="high">High</option>
												<option value="highest">Highest</option>
											</select>
											</div>
										</div>
									  </div>
									  <div class="form-group">
										<label class="control-label col-sm-2" for="desc">Task Description:</label>
										<div class="col-sm-10">
										<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-sticky-note fa-fw"></i></span>
										  <textarea class="form-control" id="desc" name="desc" placeholder="Enter Task Description" rows="5"></textarea>
										  </div>
										</div>
									  </div>
									  <div class="form-group"> 
										<div class="col-sm-offset-2 col-sm-10">
										  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
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
						
					  <table class="table table-striped">
						<thead>
						  <tr>
							<th>#</th>
							<th>Name</th>
							<th>Project</th>
							<th>Weight</th>
							<th>Priority</th>
							<th>State</th>
							<th>Description</th>
							<th>Due Date</th>
							<th>Action</th>
						  </tr>
						</thead>
						<tbody><?php $i=1; ?>
						<?php if(count($tasks) > 0){ ?>
						@foreach($tasks as $task)
						  <tr>
							<td><?php echo $i;
							$i++; ?></td>
							<td>{{$task->name}}</td>
							@foreach($projects as $prj)
								@if($prj->id == $task->project_id)
									<td>{{$prj->name}}</td>
								@endif
							@endforeach
							
							<td>{{$task->weight}}</td>
							<td>{{$task->priority}}</td>
							<td>{{$task->state}}</td>
							<td>{{$task->description}}</td>
							<td>{{$task->due_date}}</td>
							<td><a href="{{url('admin/deltasks/'.$task->id)}}"><i class="fa fa-times-circle-o" aria-hidden="true" style="font-size: 25px;" title="Delete Task"></i></a></td>
						  </tr>
						@endforeach
						<?php }else {?>
							<tr>
							 <td>Currently there is no Tasks to show</td>
							 </tr>
						<?php } ?>						 
						</tbody>
					  </table>
				
					
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
