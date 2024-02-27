@extends('dashboard.app')

@section('content')
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Hello, <span>Welcome to loan Management Field</span></h1>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/dash">Dashboard</a></li>
                                <li class="breadcrumb-item active">loans</li>
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
                        {{-- <a class="btn btn-primary" href="/dash">Back</a> --}}
                        <div class="card">
                            <div class="card-body">
                                <div class="bootstrap-data-table-panel">
                                <div class="table-responsive">
                                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Date Requested</th>
                                            <th>Amount requested</th>
                                            <th>Total Amount to be paid</th>
                                            <th>Remaining amount</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($loans as $loan)
                                            <tr>
                                                
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $loan->user->firstname }} {{ $loan->user->lastname }}</td>
                                                <td>{{ $loan->loan_category }}</td>
                                                <td>{{ $loan->created_at }}</td>
                                                <td>{{ $loan->loan_amount }} RWF</td>
                                                <td>{{ $loan->total_amount }} RWF</td>
                                                <td>{{ $loan->total_amount-$loan->paid_amount }} RWF</td>
                                                <td>
                                                    @if ($loan->paid_amount == $loan->total_amount) 
                                                    <span class="badge rounded-pill bg-success">PAID</span>
                                                    @else
                                                    <form method="POST" action="{{ route('loan.update', ['id' => $loan->id]) }}">
                                                        @csrf
                                                        @method('PUT')
                                                            <select id="status_{{ $loan->id }}" class="form-control @error('status') isapproved-invalid @enderror" name="status" required>

                                                                <option value="pending" @if($loan->status === 'pending') selected @endif>{{ __('Pending') }}</option>
                                                                <option value="approved" @if($loan->status === 'approved') selected @endif>{{ __('Approved') }}</option>
                                                                <option value="rejected" @if($loan->status === 'rejected') selected @endif>{{ __('Rejected') }}</option>
                                                                <option value="paid" @if($loan->status === 'paid') selected @endif>{{ __('Paid') }}</option>
                                                            </select>
                                                    
                                                            @error('status')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        
                                                            <script>
                                                                document.getElementById('status_{{ $loan->id }}').addEventListener('change', function() {
                                                                    const selectedOption = this.value;
                                                                    const loanId = {{ $loan->id }};
                                                            
                                                                    // Send an AJAX request to update the status in the database
                                                                    fetch('{{ route('loan.update', ['id' => $loan->id]) }}', {
                                                                        method: 'PUT',
                                                                        headers: {
                                                                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                                                            'Content-Type': 'application/json',
                                                                        },
                                                                        body: JSON.stringify({ status: selectedOption, id: loanId }),
                                                                    })
                                                                    .then(response => response.json())
                                                                    .then(data => {
                                                                        console.log('Loan status updated:', data.status);
                                                                        // You can update the page to reflect the updated status if needed
                                                                    })
                                                                    .catch(error => {
                                                                        console.error('Error updating loan status:', error);
                                                                    });
                                                                });
                                                            </script>
                                                    </form>
                                                    
                                                    @endif

                                                </td>
                                                <td> 
                                                    <div class="dropdown text-sans-serif"><i class="tp-btn-light sharp" type="button" id="order-dropdown-0" data-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></span></i>
                                                        <div class="dropdown-menu dropdown-menu-right border py-0" aria-labelledby="order-dropdown-0">
                                                        <a class="dropdown-item" href="{{ route('loan.edit',$loan->id) }}">Action</a>
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
                </div>
            </section>
        </div>
    </div>
</div>
@endsection