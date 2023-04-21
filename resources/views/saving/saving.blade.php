@extends('dashboard.app')

@section('content')
    <div class="container">
        <h1>Savings records for {{ $user->name }}</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($savings as $saving)
                    <tr>
                        <td>{{ $saving->month }}</td>
                        <td>{{ $saving->amount }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection