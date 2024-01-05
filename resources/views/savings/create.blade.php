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
                    <a class="btn btn-primary" href="/import">Import File</a>
                    <center><h4 class="card-title"><strong>Add New Saving record</strong></h4></center>
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">

                                    @if(Session::get('Success'))
                                        <div class="alert alert-success">
                                            {{Session::get('Success')}}
                                            @php 
                                            Session::forget('Success')
                                            @endphp
                                        </div>
                                        @endif
                                        <form method="POST" action="{{ route('savings.store') }}">
                                            @csrf
                                            {{-- <div class="form-group col-lg-8">
                                                <label for="user_id">Member<span class="text-danger">*</span></label>
                                                <select name="user_id" class="form-control">
                                                    <option value="">--- Select Member ---</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->firstname }} {{ $user->lastname }} </option>
                                                    @endforeach
                                                </select>
                                            </div> --}}
                                            

                                            <div class="form-group col-lg-8">
                                                <label for="user_id">Member<span class="text-danger">*</span></label>
                                                <input type="text" id="memberSearch" class="form-control" placeholder="Search for a member">
                                                <div id="memberList">
                                                    <input type="hidden" id="selectedUserId" name="user_id">
                                                </div>
                                            </div>

                                            <script>
                                                const users = {!! json_encode($users) !!};

                                                const memberSearchInput = document.getElementById('memberSearch');
                                                const memberListContainer = document.getElementById('memberList');
                                                const selectedUserIdInput = document.getElementById('selectedUserId');

                                                memberSearchInput.addEventListener('input', updateMemberList);

                                                function updateMemberList() {
                                                    const searchQuery = memberSearchInput.value.toLowerCase();

                                                    const filteredUsers = users.filter(user =>
                                                        user.firstname.toLowerCase().includes(searchQuery) ||
                                                        user.lastname.toLowerCase().includes(searchQuery)
                                                    );

                                                    const memberListHTML = filteredUsers.map(user =>
                                                        `<div class="member-item" data-user-id="${user.id}">
                                                            ${user.firstname} ${user.lastname}
                                                        </div>`
                                                    ).join('');

                                                    memberListContainer.innerHTML = memberListHTML;

                                                    // Attach click event listener to the dynamically created items
                                                    const memberItems = memberListContainer.querySelectorAll('.member-item');
                                                    memberItems.forEach(item => {
                                                        item.addEventListener('click', () => {
                                                            const userId = item.getAttribute('data-user-id');
                                                            selectedUserIdInput.value = userId; // Update the hidden input field
                                                            memberSearchInput.value = `${user.firstname} ${user.lastname}`; // Update the search input
                                                            memberListContainer.innerHTML = ''; // Clear the search results
                                                        });
                                                    });
                                                }
                                            </script>

                                            <div class="form-group col-lg-8">
                                                <label for="amount">Amount<span class="text-danger">*</span></label>
                                                <input type="number" name="amount" class="form-control" required>
                                            </div>
                                            <div class="form-group col-lg-8">
                                                <label for="month">Month<span class="text-danger">*</span></label>
                                                <input type="date" name="month" class="form-control" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
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