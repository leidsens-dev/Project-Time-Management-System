@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
	 <div class="col-md-2">
            <div class="panel panel-primary" style="position:;">
                <div class="panel-heading"><i class="fa fa-bars"></i>&nbsp;Menu</div>

                <div class="panel-body">
                   
                    <div>
					<a href="{{url('admin/')}}" class="btn btn-warning"  style="width:100%;margin-bottom:;"><i class="fa fa-home"></i>&nbsp;Dashboard</a>
					</div><hr>
					<div style="width:100%">
					<a href="{{url('admin/clients')}}" class="active btn btn-warning"  style="width:100%;margin-bottom:;"><i class="fa fa-user"></i>&nbsp;Clients</a>
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
                <div class="panel-heading">Admin > Clients</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

					<h2>Clients</h2>
					  <a class="btn btn-success pull-right"  style="width:30%;margin-bottom:;" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> ADD NEW CLIENT</a>
						
						<!-- Modal -->
						  <div class="modal fade" id="myModal" role="dialog">
							<div class="modal-dialog modal-lg">
							
							  <!-- Modal content-->
							  <div class="modal-content">
								<div class="modal-header">
								  <button type="button" class="close" data-dismiss="modal">&times;</button>
								  <h4 class="modal-title">Add New Clients Here</h4>
								</div>
								<div class="modal-body">
									
									<form class="form-horizontal" method="post" action="{{url('admin/clients')}}">
									{{ csrf_field() }}
									  <div class="form-group">
										<label class="control-label col-sm-2" for="name">Client Name:</label>
										<div class="col-sm-10">
										<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-black-tie fa-fw"></i></span>
										  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
										  </div>
										</div>
									  </div>
									  <div class="form-group">
										<label class="control-label col-sm-2" for="cont_name">Point of Contact:</label>
										<div class="col-sm-10">
										<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
											<input type="text" class="form-control" id="cont_name" name="cont_name" placeholder="Enter Contact Person Name">
											</div>
										</div>
									  </div>
									  <div class="form-group">
										<label class="control-label col-sm-2" for="phone">Contact No.:</label>
										<div class="col-sm-10">
										<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
											<input type="numeric" class="form-control" id="phone" name="phone" placeholder="Enter Contact Number">
											</div>
										</div>
									  </div>
									  <div class="form-group">
										<label class="control-label col-sm-2" for="email">Client Email:</label>
										
										<div class="col-sm-10">
										<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
										  <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address">
										  </div>
										</div>
									  </div>
									  <div class="form-group"> 
										<div class="col-sm-offset-2 col-sm-10">
										  <button type="submit" class="btn btn-primary" name="submit">Insert Client</button>
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
					
					<table class="table table-striped col-md-12 col-sm-12">
						<thead>
						  <tr>
							<th>#</th>
							<th>Name</th>
							<th>Contact Person</th>
							<th>Phone Number</th>
							<th>Email</th>
							<th>Token</th>
							<th>Action</th>
						  </tr>
						</thead>
						<tbody><?php $i=1; ?>
						<?php if(count($clients) > 0){ ?>
						@foreach($clients as $client)
						  <tr>
							<td><?php echo $i;
							$i++; ?></td>
							<td>{{$client->name}}</td>
							<td>{{$client->point_of_contact}}</td>
							<td>{{$client->phone_number}}</td>
							<td>{{$client->email}}</td>
							<td>{{$client->client_token}}</td>
							<td><a href="{{url('admin/delclients/'.$client->id)}}"><i class="fa fa-times-circle-o" aria-hidden="true" style="font-size: 20px;" title="Delete Client"></i></a>&nbsp;&nbsp;&nbsp;<a href="#" data-id="{{ $client->id }}" data-toggle="modal" data-target="#accessModal" class="createUrl"><i class="fa fa-connectdevelop" aria-hidden="true" style="font-size: 20px;" title="Generate Access URL"></i></a></td>
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

<div class="modal fade" id="accessModal" role="dialog">
	<div class="modal-dialog modal-md">
	
	  <!-- Modal content-->
	  <div class="modal-content">
		<div class="modal-header">
		  
		  <h4 class="modal-title">Access URL Generator</h4>
		</div>
		<div class="modal-body">
			<div class="col-xs-12 no-side-padding">
					<label>Access Url:</label>
					<div style="border:1px solid;padding:3px;" id="accessData"></div>
			</div>
			<form class="form-horizontal" method="post" action="{{url('admin/accessUrl')}}">
				{{ csrf_field() }}
			  <input type="hidden" name="client_id" id="client_id" value="">
				<input type="hidden" name="token_key" id="token_key" value="">
			
				
				
				<br>
				<div class="col-xs-6 no-side-padding"><br>
				<input type="submit" class="btn btn-success form-control" name="submit" value="OK">
				</div>
				<span class="count pull-right"></span>
				<div class="clearfix"></div>
				
			</form>
			
		</div>
		<div class="modal-footer">
		  <button type="submit" class="btn btn-danger" data-dismiss="modal">Close</button>
		</div>
	  </div>
	  
	</div>
  </div><!--End-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
$(document).on("click", ".createUrl", function () {
     var myBookId = $(this).data('id');
	// alert(myBookId);
	 $(".modal-body #client_id").val( myBookId );

	 var token = Date.now() * 1000;
	
	 $(".modal-body #token_key").val( token );
	// var od = {{url("admin/accessUrl")}};
	//var go = <?php echo url("admin/accessUrl"); ?>;
	 var acc_url = 'http://192.168.1.210/arijit/tms/public/client/'+token+'/'+myBookId;
	 $(".modal-body #accessData").html( acc_url );
    
});
});
</script>
@endsection
