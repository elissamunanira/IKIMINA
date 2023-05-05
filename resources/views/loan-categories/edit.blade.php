@extends('dashboard.app')
@section('content')
<form method="POST" action="/loan-categories/{{ $loanCategory->id }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $loanCategory->name }}">
    </div>
    <div class="form-group">
        <label for="principal">principal</label>
        <input type="text" class="form-control" id="principal" name="principal" value="{{ $loanCategory->principal }}">
    </div>
    <div class="form-group">
        <label for="interest_rate">Interest_rate</label>
        <input type="text" class="form-control" id="interest_rate" name="interest_rate" value="{{ $loanCategory->interest_rate }}">
    </div>
    <div class="form-group">
        <label for="period">Duration/Period</label>
        <input type="text" class="form-control" id="duration" name="duration" value="{{ $loanCategory->duration }}">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection