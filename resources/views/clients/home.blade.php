@extends('layouts.clientapp')

@section('content')
<div class="container">
    <div class="row">
	 <?php /* <div class="col-md-2">
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
                <div class="panel-heading">Projects</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
					
					
					
					  <h2>Projects</h2>
					  <!--<a class="btn btn-warning pull-right"  style="width:20%;margin-bottom:;" data-toggle="modal" data-target="#inModal">Invite Member</a>-->
					  
					  <!-- Modal -->
						  <div class="modal fade" id="inModal" role="dialog">
							<div class="modal-dialog modal-md">
							
							  <!-- Modal content-->
							  <div class="modal-content">
								<div class="modal-header">
								  <button type="button" class="close" data-dismiss="modal">&times;</button>
								  <h4 class="modal-title">Invite Member to your project</h4>
								</div>
								<div class="modal-body">
								
								  <form class="form-horizontal" method="post" action="{{url('admin/invite')}}">
									  {{ csrf_field() }}
									<div class="form-group">
										<label class="control-label col-sm-2" for="p_id">Project Title:</label>
										<div class="col-sm-10">
											<select class="form-control" id="ps_id" name="ps_id">
												<option>Select Project</option>
												@foreach($projects as $project)
													<option value="{{$project->id}}">{{$project->name}}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" for="name">Email:</label>
										<div class="col-sm-10">
										  <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
										</div>
									</div>
									<div class="form-group"> 
										<div class="col-sm-offset-2 col-sm-10">
										  <button type="submit" class="btn btn-primary" name="submit">Invite</button>
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
					  
					  <!--<a class="btn btn-success pull-right"  style="width:30%;margin-bottom:;" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp; ADD NEW PROJECT</a>-->
						
						<!-- Modal -->
						  <div class="modal fade" id="myModal" role="dialog">
							<div class="modal-dialog modal-lg">
							
							  <!-- Modal content-->
							  <div class="modal-content">
								<div class="modal-header">
								  <button type="button" class="close" data-dismiss="modal">&times;</button>
								  <h4 class="modal-title">Add New Project Here</h4>
								</div>
								<div class="modal-body">
									
									<form class="form-horizontal" method="post" action="{{url('admin/projects')}}">
										{{ csrf_field() }}
									  <div class="form-group">
										<label class="control-label col-sm-2" for="name">Project Title:</label>
										<div class="col-sm-10">
										<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
										  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
										  </div>
										</div>
									  </div>
									  <div class="form-group">
										<label class="control-label col-sm-2" for="client">Client:</label>
										<div class="col-sm-10">
											<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
											<select class="form-control" id="client" name="client">
												<option>Select Client</option>
												@foreach($clients as $cli)
													<option value="{{$cli->id}}">{{$cli->name}}</option>
												@endforeach
											</select>
											</div>
										</div>
									  </div>
									  <div class="form-group">
										<label class="control-label col-sm-2" for="desc">Project Description:</label>
										<div class="col-sm-10">
										<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-sticky-note fa-fw"></i></span>
										  <textarea class="form-control" id="desc" name="desc" placeholder="Enter Project Description" rows="5"></textarea>
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
							<!--<th>Client</th>-->
							<th>Production</th>
							<th>Development</th>
							<th>Version Control</th>
							<th>Created</th>
							<th>Action</th>
						  </tr>
						</thead>
						<tbody><?php $i=1; ?>
						<?php if(count($projects) > 0){ ?>
						@foreach($projects as $project)
						  <tr>
							<td><?php echo $i;
							$i++; ?></td>
							<td>{{$project->name}}</td>
							
							<td><a target="_blank" href="{{$project->production}}">View</a></td>
							<td><a target="_blank" href="{{$project->dev}}">View</a></td>
							<td><a target="_blank" href="{{$project->github}}">View</a></td>
							<td>{{$project->created_at}}</td>
							<td><a href="{{url('client/'.$userdata['tempClientToken'].'/'.$userdata['tempClientId'].'/'.$project->id)}}"><i class="fa fa-eye" aria-hidden="true" style="font-size: 20px;" title="View Project"></i></a>&nbsp;&nbsp;&nbsp;<!--<a href="{{url('admin/delprojects/'.$project->id)}}"><i class="fa fa-times-circle-o" aria-hidden="true" style="font-size: 20px;" title="Delete Project"></i></a>--></td>
						  </tr>
						@endforeach
						<?php }else {?>
							<tr>
							 <td>Currently there is no projects to show</td>
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
