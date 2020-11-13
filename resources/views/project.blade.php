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
					<a href="{{url('home')}}" class="btn btn-warning" style="width:100%;margin-bottom:;"><i class="fa fa-tag"></i>&nbsp;Tasks</a>
					</div><hr>
					<div>
					<a href="{{url('projects')}}" class="active btn btn-warning" style="width:100%;margin-bottom:;"><i class="fa fa-flag"></i>&nbsp;Projects</a>
					</div>
					
					<hr>
					</div>
				</div>
			</div>
		</div>
		
	
        <div class="col-md-10 ">
            <div class="panel panel-primary">
                <div class="panel-heading">Projects</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                   
					<h3>Projects</h3>
					<table class="table table-striped">
						<thead>
						  <tr>
							<th>#</th>
							<th>Name</th>
							<th>Client</th>
							<th style="width: 500px;">Description</th>
							<!--<th>Created</th>-->
							<!--<th>Action</th>-->
						  </tr>
						</thead>
						<tbody><?php $i=1; ?>
						<?php if(count($projects) > 0){ ?>
						@foreach($projects as $project)
						  <tr>
							<td><?php echo $i;
							$i++; ?></td>
							<td>{{$project[0]->name}}</td>
							@foreach($clients as $clt)
								@if($clt->id == $project[0]->client_id)
									<td>{{$clt->name}}</td>
								@endif
							@endforeach
							<td align="justify">{{$project[0]->description}}</td>
							<!--<td>{{$project[0]->created_at}}</td>-->
							<!--<td><a href="{{url('projects/'.$project[0]->id)}}"><button class="btn btn-info">View</button><button class="btn btn-danger"></a>&nbsp;<i class="fa fa-delete"></i> Delete</button></td>-->
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
@endsection
