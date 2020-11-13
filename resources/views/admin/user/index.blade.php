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
                <div class="panel-heading">Admin > Users > {{$id}}</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

					<h2>Monthly Manhours Statements for the year <b>{{date('Y')}}</b></h2><hr>
					
					<div class="row">
						<div class="col-md-4" style="background:white;color:black;">
							<div style="border:1px solid #f1ecec;padding:5px;border-radius:5px;font-weight:bold;">
								<h4>January</h4>
								<p style="background:#f6f6f6;width:100%;padding:5px;"></p>
								<p ><a class="btn btn-primary" href="{{url('admin/downloads/'.$id.'/1')}}" title="Time Log Details for January"><i class="fa fa-download" aria-hidden="true"></i>&nbsp;Download</a></p>
							</div>
						</div>
						<div class="col-md-4" style="background:white;color:black;">
							<div style="border:1px solid #f1ecec;padding:5px;border-radius:5px;font-weight:bold;">
								<h4>February</h4>
								<p style="background:#f6f6f6;width:100%;padding:5px;"></p>
								<p ><a class="btn btn-primary" href="{{url('admin/downloads/'.$id.'/2')}}" title="Time Log Details for February"><i class="fa fa-download" aria-hidden="true"></i>&nbsp;Download</a></p>
							</div>
						</div>
						<div class="col-md-4" style="background:white;color:black;">
							<div style="border:1px solid #f1ecec;padding:5px;border-radius:5px;font-weight:bold;">
								<h4>March</h4>
								<p style="background:#f6f6f6;width:100%;padding:5px;"></p>
								<p ><a class="btn btn-primary" href="{{url('admin/downloads/'.$id.'/3')}}" title="Time Log Details for March"><i class="fa fa-download" aria-hidden="true"></i>&nbsp;Download</a></p>
							</div>
						</div>
						<div class="col-md-4" style="background:white;color:black;">
							<div style="border:1px solid #f1ecec;padding:5px;border-radius:5px;font-weight:bold;">
								<h4>April</h4>
								<p style="background:#f6f6f6;width:100%;padding:5px;"></p>
								<p ><a class="btn btn-primary" href="{{url('admin/downloads/'.$id.'/4')}}" title="Time Log Details for April"><i class="fa fa-download" aria-hidden="true"></i>&nbsp;Download</a></p>
							</div>
						</div>
						<div class="col-md-4" style="background:white;color:black;">
							<div style="border:1px solid #f1ecec;padding:5px;border-radius:5px;font-weight:bold;">
								<h4>May</h4>
								<p style="background:#f6f6f6;width:100%;padding:5px;"></p>
								<p ><a class="btn btn-primary" href="{{url('admin/downloads/'.$id.'/5')}}" title="Time Log Details for May"><i class="fa fa-download" aria-hidden="true"></i>&nbsp;Download</a></p>
							</div>
						</div>
						<div class="col-md-4" style="background:white;color:black;">
							<div style="border:1px solid #f1ecec;padding:5px;border-radius:5px;font-weight:bold;">
								<h4>June</h4>
								<p style="background:#f6f6f6;width:100%;padding:5px;"></p>
								<p ><a class="btn btn-primary" href="{{url('admin/downloads/'.$id.'/6')}}" title="Time Log Details for June"><i class="fa fa-download" aria-hidden="true"></i>&nbsp;Download</a></p>
							</div>
						</div>
						<div class="col-md-4" style="background:white;color:black;">
							<div style="border:1px solid #f1ecec;padding:5px;border-radius:5px;font-weight:bold;">
								<h4>July</h4>
								<p style="background:#f6f6f6;width:100%;padding:5px;"></p>
								<p ><a class="btn btn-primary" href="{{url('admin/downloads/'.$id.'/7')}}" title="Time Log Details for July"><i class="fa fa-download" aria-hidden="true"></i>&nbsp;Download</a></p>
							</div>
						</div>
						<div class="col-md-4" style="background:white;color:black;">
							<div style="border:1px solid #f1ecec;padding:5px;border-radius:5px;font-weight:bold;">
								<h4>August</h4>
								<p style="background:#f6f6f6;width:100%;padding:5px;"></p>
								<p ><a class="btn btn-primary" href="{{url('admin/downloads/'.$id.'/8')}}" title="Time Log Details for August"><i class="fa fa-download" aria-hidden="true"></i>&nbsp;Download</a></p>
							</div>
						</div>
						<div class="col-md-4" style="background:white;color:black;">
							<div style="border:1px solid #f1ecec;padding:5px;border-radius:5px;font-weight:bold;">
								<h4>September</h4>
								<p style="background:#f6f6f6;width:100%;padding:5px;"></p>
								<p ><a class="btn btn-primary" href="{{url('admin/downloads/'.$id.'/9')}}" title="Time Log Details for September"><i class="fa fa-download" aria-hidden="true"></i>&nbsp;Download</a></p>
							</div>
						</div>
						<div class="col-md-4" style="background:white;color:black;">
							<div style="border:1px solid #f1ecec;padding:5px;border-radius:5px;font-weight:bold;">
								<h4>October</h4>
								<p style="background:#f6f6f6;width:100%;padding:5px;"></p>
								<p ><a class="btn btn-primary" href="{{url('admin/downloads/'.$id.'/10')}}" title="Time Log Details for October"><i class="fa fa-download" aria-hidden="true"></i>&nbsp;Download</a></p>
							</div>
						</div>
						<div class="col-md-4" style="background:white;color:black;">
							<div style="border:1px solid #f1ecec;padding:5px;border-radius:5px;font-weight:bold;">
								<h4>November</h4>
								<p style="background:#f6f6f6;width:100%;padding:5px;"></p>
								<p ><a class="btn btn-primary" href="{{url('admin/downloads/'.$id.'/11')}}" title="Time Log Details for November"><i class="fa fa-download" aria-hidden="true"></i>&nbsp;Download</a></p>
							</div>
						</div>
						<div class="col-md-4" style="background:white;color:black;">
							<div style="border:1px solid #f1ecec;padding:5px;border-radius:5px;font-weight:bold;">
								<h4>December</h4>
								<p style="background:#f6f6f6;width:100%;padding:5px;"></p>
								<p ><a class="btn btn-primary" href="{{url('admin/downloads/'.$id.'/12')}}" title="Time Log Details for December"><i class="fa fa-download" aria-hidden="true"></i>&nbsp;Download</a></p>
							</div>
						</div>
					</div>
						
					
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
