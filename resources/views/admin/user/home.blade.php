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
					<a href="{{url('admin/tasks')}}" class="btn btn-warning" style="width:100%;margin-bottom:;"><i class="fa fa-tag"></i>&nbsp;Tasks</a>
					</div>
					<hr>
					<div>
					<a href="{{url('admin/users')}}" class="active btn btn-warning" style="width:100%;margin-bottom:;"><i class="fa fa-users"></i>&nbsp;Users</a>
					</div>
					
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="panel panel-primary">
                <div class="panel-heading">Admin > Users</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

					<h2>Users</h2>
					  
						
						
					
					<table class="table table-striped">
						<thead>
						  <tr>
							<th>#</th>
							<th>Name</th>
							
							<th>Phone Number</th>
							<th>Email</th>
							<th>Action</th>
						  </tr>
						</thead>
						<tbody><?php $i=1; ?>
						<?php if(count($users) > 0){ ?>
						@foreach($users as $user)
						  <tr>
							<td><?php echo $i;
							$i++; ?></td>
							<td>{{$user->name}}</td>
							
							<td></td>
							<td>{{$user->email}}</td>
							<td><a href="{{url('admin/userss/'.$user->id)}}" ><i class="fa fa-eye" aria-hidden="true" style="font-size:25px;" title="View User"></i></a></td>
						  </tr>
						@endforeach
						<?php }else {?>
							<tr>
							 <td>Currently there is no Users to show</td>
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
