@extends('dashboard.app')
@section('content')
{{-- <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Role Management</h2>
        </div>
        <div class="pull-right">
        @can('role-create')
            <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
            @endcan
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th width="280px">Action</th>
    </tr>
    
    @foreach ($roles as $key => $role)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $role->name }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
            @can('role-edit')
                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
            @endcan
            @can('role-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            @endcan
        </td>
    </tr>
    @endforeach
</table>
{!! $roles->render() !!} --}}

<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Hello, <span>Welcome to Role</span></h1>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/dash">Dashboard</a></li>
                                <li class="breadcrumb-item active">Users</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
            </div>
            <!-- /# row -->
            
            <section id="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        @can('role-create')
                        <a class="btn btn-primary" href="{{ route('roles.create') }}"> Create New Role</a>
                        @endcan
                        <div class="card">
                            <div class="bootstrap-data-table-panel">
                                <div class="table-responsive">
                                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th width="280px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($roles as $key => $role)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $role->name }}</td>
                                                <td>
                                                    
                                                    <div class="dropdown text-sans-serif"><i class="tp-btn-light sharp" type="button" id="order-dropdown-0" data-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></span></i>
                                                        <div class="dropdown-menu dropdown-menu-right border py-0" aria-labelledby="order-dropdown-0">
                                                            @can('role-list')
                                                            <div class="py-2"><a class="dropdown-item" href="{{ route('roles.show',$role->id) }}">View</a>
                                                                @endcan


                                                                <div class="dropdown-divider"></div>

                                                                @can('role-edit')
                                                                <a class="dropdown-item" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                                                                @endcan

                                                                <div class="dropdown-divider"></div>
                                                                @can('role-delete')
                                                                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                                {!! Form::close() !!}
                                                            
                                                                @endcan
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
       
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer">
                            <p>2023 © Admin Board. - <a href="#">Ikibina</a></p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<!-- jquery vendor -->
<script src="/dashboard/lib/jquery.min.js"></script>
<script src="/dashboard/lib/jquery.nanoscroller.min.js"></script>
<!-- nano scroller -->
<script src="/dashboard/lib/menubar/sidebar.js"></script>
<script src="/dashboard/lib/preloader/pace.min.js"></script>
<!-- sidebar -->

<!-- bootstrap -->

<script src="js/lib/bootstrap.min.js"></script><script src="js/scripts.js"></script>
<!-- scripit init-->
<script src="/dashboard/js/lib/data-table/datatables.min.js"></script>
<script src="/dashboard/js/lib/data-table/dataTables.buttons.min.js"></script>
<script src="/dashboard/js/lib/data-table/buttons.flash.min.js"></script>
<script src="/dashboard/js/lib/data-table/jszip.min.js"></script>
<script src="/dashboard/js/lib/data-table/pdfmake.min.js"></script>
<script src="/dashboard/js/lib/data-table/vfs_fonts.js"></script>
<script src="/dashboard/js/lib/data-table/buttons.html5.min.js"></script>
<script src="/dashboard/js/lib/data-table/buttons.print.min.js"></script>
<script src="/dashboard/js/lib/data-table/datatables-init.js"></script>
@endsection

