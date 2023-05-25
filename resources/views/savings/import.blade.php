@extends('dashboard.app')
@section('content')


<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Hello, <span>Welcome to Saving Management Field</span></h1>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/dash">Dashboard</a></li>
                                <li class="breadcrumb-item active">Savings</li>
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
                    <center><h4 class="card-title"><strong>Add New Saving record</strong></h4></center>
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">
                                    <h1>Import File</h1>

                                        @if(session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif

                                        <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div>
                                                <label for="file">Select File:</label>
                                                <input type="file" name="file" id="file">
                                            </div>
                                            <div>
                                                <button class = "btn btn-primary" type="submit">Import</button>
                                            </div>
                                        </form>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection