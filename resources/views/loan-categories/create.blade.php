@extends('dashboard.app')
@section('content')
<form action="{{ route('loan_categories.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control">
    </div>
    <div class="form-group">
        <label for="principal">Principal</label>
        <input type="number" name="principal" id="principal"placeholder="Set max amount to borrow" class="form-control">
    </div>
    <div class="form-group">
        <label for="interest_rate">Interest Rate</label>
        <input type="number" name="interest_rate" id="interest_rate" class="form-control">
    </div>
    <div class="form-group">
        <label for="duration">Duration</label>
        <input type="number" name="duration" id="duration" placeholder="Set duration in months"class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>

@endsection






