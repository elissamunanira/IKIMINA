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
                                <li class="breadcrumb-item active">Roles</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
            </div>
            <!-- /# row -->
            <section id="main-content">
                <div class="row">
                    <div class="container">
                        <h2>Member's Savings </h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Members Name</th>
                                    {{-- <th>Total savings</th> --}}
                                    <th>Total savings</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                {{-- @foreach ($totalSavings as $saving) --}}
                                <tr>
                                    <td>{{ $user->firstname }} {{ $user->lastname }}</td>
                                    {{-- <td>{{ $saving->month}}</td> --}}
                                    <td>{{ $totalSavings}} RWF</td>
                                </tr>
                                {{-- @endforeach --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection