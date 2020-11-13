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
					<a href="{{url('admin/')}}" class="active btn btn-warning"  style="width:100%;margin-bottom:;"><i class="fa fa-home"></i>&nbsp;Dashboard</a>
					</div><hr>
					<div style="width:100%">
					<a href="{{url('admin/clients')}}" class="btn btn-warning"  style="width:100%;margin-bottom:;"><i class="fa fa-user"></i>&nbsp;Clients</a>
					</div><hr>
					<div>
					<a href="{{url('admin/projects')}}" class="btn btn-warning" style="width:100%;margin-bottom:;"><i class="fa fa-flag"></i>&nbsp;Projects</a>
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
        </div>
        <div class="col-md-10">
            <div class="panel panel-primary">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
					<div class="row">
						<div class="col-md-4" style="background:white;color:black;">
							<div style="border:1px solid #f1ecec;padding:5px;border-radius:5px;font-weight:bold;">
								<h4>Total Clients</h4>
								<p style="background:#f6f6f6;width:100%;padding:5px;">{{$countClient}} Clients</p>
								<p ><a class="btn btn-danger" href="{{url('admin/clients')}}"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;View All</a></p>
							</div>
						</div>
						<div class="col-md-4" style="background:white;color:black;">
							<div style="border:1px solid #f1ecec;padding:5px;border-radius:5px;font-weight:bold;">
								<h4>Total Users</h4>
								<p style="background:#f6f6f6;width:100%;padding:5px;">{{$countUser}} Users</p>
								<p ><a class="btn btn-danger" href="{{url('admin/users')}}"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;View All</a></p>
							</div>
						</div>
						<div class="col-md-4" style="background:white;color:black;">
							<div style="border:1px solid #f1ecec;padding:5px;border-radius:5px;font-weight:bold;">
								<h4>Total Man-hours</h4>
								<p style="background:#f6f6f6;width:100%;padding:14px;font-size:20px;margin-top:30px;">{{$t_time}} Hour</p>
							</div>
						</div>
					</div>
					
					<div class="row" style="margin-top:50px;">
						<div class="col-md-12" style="background:white;color:black;">
						<h4 style="background:#f6f6f6;width:100%;padding:10px;">All Clients</h4>
							<table class="table table-striped">
								<thead>
								  <tr>
									<th>#</th>
									<th>Name</th>
									<th>Email</th>
									<th colspan="">Man-hour</th>
								  </tr>
								</thead>
								<tbody><?php $i=1; ?>
								<?php if(count($clients) > 0){ ?>
								@foreach($clients as $client)
								  <tr>
									<td><?php echo $i;
									$i++; ?></td>
									<td>{{$client->name}}</td>
									
									<td>{{$client->email}}</td>
									<td style="width: 330px;">
										<div class="dropdown">
											<button class="btn btn-success dropdown-toggle" type="button" id="menu1" data-toggle="dropdown" style="width: 100%;" title="Click Here To See Logs">View
											<span class="caret"></span></button>
											<ul class="dropdown-menu" role="menu" aria-labelledby="menu1" style="width: 100%;">
											@foreach($projects as $project)
												@if($project->client_id == $client->id)
												<li class="dropdown-header" style="background: antiquewhite;">{{$project->name}}</li>
												<?php $tsec=0; ?>
												@foreach($tasks as $task)
													@if($task->project_id == $project->id)
														<?php $t_sec =0 ; ?>
														@foreach($usertasks as $usr)
															@if($usr->task_id == $task->id)
																
																<?php
																if($usr->end_time != null){
																	$stop = strtotime( $usr->end_time );
																	$start = strtotime( $usr->start_time );
																	 $seconds = ( $stop - $start );
																	
																	$t_sec +=$seconds;
																	
																}
																?>
																
															@endif
														@endforeach
														<li role="presentation"><a role="menuitem" tabindex="-1" href="#">{{$task->name}}
														<span class="pull-right"><?php 
														$tsec +=$t_sec;
														
														$sec = ($t_sec % 60);
																	$minutes = ($t_sec / 60) % 60;
																	$hours = floor($t_sec / (60 * 60)); 
																	echo '<b>'.$hours.'</b>hr <b>'.$minutes.'</b>min<b>'.$sec.'</b>sec';
																	?></span></a>
														</li>
													@endif
												@endforeach
												<div style="border-bottom:1px solid;background: aqua;">
													Total: <b><?php 
													$sec = ($tsec % 60);
													$minutes = ($tsec / 60) % 60;
													$hours = floor($tsec / (60 * 60));
													echo '<b>'.$hours.'</b>hr <b>'.$minutes.'</b>min<b>'.$sec.'</b>sec'; ?></b>
												</div>
												@endif
											@endforeach
											</ul>
										</div>
									</td>
								  </tr>
								@endforeach
								<?php }else {?>
									<tr>
									 <td>Currently there is no Clients to show</td>
									 </tr>
								<?php } ?>						 
								</tbody>
							</table>
						</div>
					</div>
					
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
