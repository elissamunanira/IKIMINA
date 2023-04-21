@extends('dashboard.app')
@section('content')

<form method="POST" action="{{ route('savings.store') }}">
    @csrf
    <div class="form-group">
        <label for="user_id">User ID:</label>
        <input type="text" name="user_id" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="amount">Amount:</label>
        <input type="number" name="amount" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="month">Month:</label>
        <input type="date" name="month" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection