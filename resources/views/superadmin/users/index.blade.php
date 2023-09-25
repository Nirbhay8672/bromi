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
                            <button class="btn btn-pill btn-primary btn-air-primary open_modal_with_this" type="button"
                                data-bs-toggle="modal" data-bs-target="#userModal">Add New User</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display" id="userTable">
                                    <thead>
                                        <tr>
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
                            <div class="form-group col-md-3 m-b-20">
                                <input class="form-control" name="first_name" id="first_name" type="text"
                                    autocomplete="off" placeholder="Name">
                            </div>

                            <div class="form-group col-md-3 m-b-20">
                                <input class="form-control" name="last_name" id="last_name" type="text"
                                    autocomplete="off" placeholder="Last Name">
                            </div>


                            <div class="form-group col-md-4 m-b-20">
                                <input class="form-control" name="email" id="email" type="text" autocomplete="off"
                                    placeholder="Email">
                            </div>


                            <div class="form-group col-md-3 m-b-20">
                                <input class="form-control" name="password" id="password" type="text" autocomplete="off"
                                    placeholder="Password">
                            </div>
                        </div>

                        <button class="btn btn-secondary" id="saveUser">Save</button>
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
                    dataa = JSON.parse(data);
                    $('#this_data_id').val(dataa.id)
                    $('#first_name').val(dataa.first_name)
                    $('#last_name').val(dataa.last_name)
                    $('#email').val(dataa.email)
                    $('#userModal').modal('show');
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
