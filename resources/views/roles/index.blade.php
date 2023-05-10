@extends('dashboard.app')
@section('content')

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
                                                <th>#</th>
                                                <th>created at</th>
                                                <th>Name</th>
                                                <th width="280px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($roles as $key => $role)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $role->created_at }}</td>
                                                <td>{{ $role->name }}</td>
                                                <td>
                                                    
                                                    <div class="dropdown text-sans-serif"><i class="tp-btn-light sharp" type="button" id="order-dropdown-0" data-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></span></i>
                                                        <div class="dropdown-menu dropdown-menu-right border py-0" aria-labelledby="order-dropdown-0">
                                                            @can('role-list')
                                                            <div class="py-2"><a class="dropdown-item" href="{{ route('roles.show',$role->id) }}">View</a>
                                                                @endcan


                                                                <div class="dropdown-divider"></div>


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
            </section>
        </div>
    </div>
</div>
@endsection

