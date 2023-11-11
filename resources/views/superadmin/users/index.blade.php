@extends('superadmin.layouts.superapp')
@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">

            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5 class="mb-3">Users </h5>
                        <button class="btn btn-pill btn-primary btn-air-primary open_modal_with_this" type="button" data-bs-toggle="modal" data-bs-target="#userModal" onclick="resetData()">Add New User</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="userTable">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Plan</th>
                                        <th>Users</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="userModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body">
                <form class="form-bookmark needs-validation modal_form" method="post" id="modal_form" novalidate="">
                    <input type="hidden" name="this_data_id" id="this_data_id">
                    <div class="row">
                        <div class="form-group col-md-4 m-b-20">
                            <div class="fname">
                                <input class="form-control" name="first_name" id="first_name" type="text" autocomplete="off" placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group col-md-4 m-b-20">
                            <div class="fname">
                                <input class="form-control" name="last_name" id="last_name" type="text" autocomplete="off" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="form-group col-md-4 m-b-20">
                            <div class="fname">
                                <input class="form-control" name="email" id="email" style="text-transform: none !important;" type="text" autocomplete="off" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group col-md-4 m-b-20">
                            <div class="fname">
                                <input class="form-control" name="password" id="password" type="text" autocomplete="off" placeholder="Password">
                            </div>
                        </div>
                    </div>

                    <div class="row" id="total-card">
                        <div class="col-sm-4">
                            <div class="card bg-white" style="border-style: groove;">
                                <div class="card-body shadow-none">
                                    <h6 class="text-center">Total Property</h6>
                                    <h5 class="text-center mt-3" id="total_property"></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card bg-white" style="border-style: groove;">
                                <div class="card-body shadow-none">
                                    <h6 class="text-center">Total Project</h6>
                                    <h5 class="text-center mt-3" id="total_project">25</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card bg-white" style="border-style: groove;">
                                <div class="card-body shadow-none">
                                    <h6 class="text-center">Total Inquiry</h6>
                                    <h5 class="text-center mt-3" id="total_enquiry">45</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3" id="user_table">
                        <h4 class="text-center">Sub Users</h4>
                        <div class="col p-2">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                    </tr>
                                </thead>
                                <tbody id="user_data">

                                </tbody>
                            </table>
                        </div>

                        <div class="row mt-3 mb-3">
                            <div class="col" id="login_as_user">
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-secondary me-3" id="saveUser">Save</button>
                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    function userActivate(user, status) {
        $.ajax({
            type: "POST",
            url: "{{ route('superadmin.changeUserStatus') }}",
            data: {
                id: $(user).attr('data-id'),
                status: status,
                _token: '{{ csrf_token() }}'
            },
            success: function(data) {
                $('#userTable').DataTable().draw();
            }
        });
    }

    $(document).ready(function() {
        $('#userTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('superadmin.users') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'first_name',
                    name: 'first_name'
                },
                {
                    data: 'last_name',
                    name: 'last_name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'mobile_number',
                    name: 'mobile_number'
                },
                {
                    data: 'plan',
                    name: 'plan'
                },
                {
                    data: 'users',
                    name: 'users'
                },
                {
                    data: 'Actions',
                    name: 'Actions'
                },
            ]
        });

    });


    $('#modal_form').validate({ // initialize the plugin
        rules: {
            first_name: {
                required: true,
            },
            email: {
                required: true,
                email: true,
            }
        },
        submitHandler: function(form) { // for demo
            alert('valid form submitted'); // for demo
            return false; // for demo
        }
    });


    function resetData() {
        document.getElementById('total-card').classList.add('d-none');
        document.getElementById('user_table').classList.add('d-none');
    }

    function getUser(data) {
        $('#modal_form').trigger("reset");
        var id = $(data).attr('data-id');
        $.ajax({
            type: "POST",
            url: "{{ route('superadmin.getUser') }}",
            data: {
                id: id,
                _token: '{{ csrf_token() }}'
            },
            success: function(data) {

                document.getElementById('total-card').classList.remove('d-none');

                $('#this_data_id').val(data.main_user.id)
                $('#first_name').val(data.main_user.first_name)
                $('#last_name').val(data.main_user.last_name)
                $('#email').val(data.main_user.email)
                $('#userModal').modal('show');

                let table = document.getElementById('user_table');
                let table_data = document.getElementById('user_data');
                let total_property = document.getElementById('total_property');
                let total_project = document.getElementById('total_project');
                let total_inquiry = document.getElementById('total_enquiry');

                let routeUrl = `{{ route('login_as_user', ['id' => ':id']) }}`.replace(':id', data.main_user.id);

                var anchorTag = document.createElement('a');
                anchorTag.href = routeUrl;
                anchorTag.className = "btn btn-primary";
                anchorTag.innerText = 'Login As User';

                let login = document.getElementById('login_as_user');
                login.innerHTML = '';
                login.appendChild(anchorTag);

                total_property.innerHTML = data.total_property;
                total_project.innerHTML = data.total_project;
                total_inquiry.innerHTML = data.total_enquiry;

                if (data.sub_user.length > 0) {
                    table.classList.remove('d-none');
                    table_data.innerHTML = '';

                    data.sub_user.forEach((user) => {
                        table_data.innerHTML += `<tr>
                                <td>${user.first_name}</td>
                                <td>${user.last_name}</td>
                                <td>${user.email}</td>
                                <td>${user.mobile_number}</td>
                            </tr>`;
                    });

                } else {
                    table.classList.add('d-none');
                    table_data.innerHTML = '';
                }
            }
        });
    }


    $(document).on('click', '#saveUser', function(e) {
        e.preventDefault();
        $("#modal_form").validate();
        if (!$("#modal_form").valid()) {
            return
        }
        var id = $('#this_data_id').val()
        $.ajax({
            type: "POST",
            url: "{{ route('superadmin.saveUser') }}",
            data: {
                id: id,
                first_name: $('#first_name').val(),
                last_name: $('#last_name').val(),
                email: $('#email').val(),
                password: $('#password').val(),
                _token: '{{ csrf_token() }}',
            },
            success: function(data) {
                $('#userTable').DataTable().draw();
                $('#userModal').modal('hide');
            }
        });
    })
</script>
@endpush
