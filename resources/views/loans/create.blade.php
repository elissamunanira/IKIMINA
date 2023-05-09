@extends('dashboard.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Loan Request') }}</div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('loan.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="category"class="col-md-4 col-form-label text-md-right">Loan Category:</label>
                                <div class="col-md-6">
                                    <select id = "loan_category" name="category" class="form-control">
                                        <option value="">--- Select Category ---</option>
                                        @foreach ($loan_categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }} </option>">
                                        @endforeach
                                    </select>
                                </div>
                            </div> 

                            <div class="form-group row">
                                <label for="loan_amount"class="col-md-4 col-form-label text-md-right">Loan Amount</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" id="loan_amount" name="loan_amount" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="interest_amount"class="col-md-4 col-form-label text-md-right">Interest Amount</label>
                                <div class="col-md-6">
                                    <input class="form-control" id="interest_amount" name="interest_amount" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="total_amount"class="col-md-4 col-form-label text-md-right">Total Amount to be Paid Back</label>
                                <div class="col-md-6">
                                    <input class="form-control" id="total_amount" name="total_amount" readonly>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>$(document).ready(function() {
    $('#loan_category, #loan_amount').on('change', function() {
        var loan_category = $('#loan_category').val();
        var amount = $('#loan_amount').val();
        
        $.ajax({
        url: '{!!URL::to('/calculate_interest')!!}',
        type: 'POST',
        data: { loan_category: loan_category, loan_amount: loan_amount },
          dataType: 'json',
        success: function(data) {
            $('#interest_amount').val(response.interest_amount);
            $('#total_amount').val(response.total_amount);
        }
        });
    });
    });
    </script>
@endsection
