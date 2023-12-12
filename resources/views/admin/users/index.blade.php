@extends('admin.layouts.app')
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
							<a class="btn btn-primary btn-air-primary"  href="{{route('admin.user.add')}}">Add New User</a>
                         
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
                                            <th>Role</th>
                                            <th>Status</th>
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
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <form class="form-bookmark needs-validation modal_form" method="post" id="modal_form" novalidate="">
                        <input type="hidden" name="this_data_id" id="this_data_id">
                        <div class="row">
                            <h5 class="border-style">Employee Information</h5>
                            <div class="form-group col-md-4 m-b-20">
                                <label for="First Name">First Name</label>
                                <input class="form-control" name="first_name" id="first_name" type="text"
                                    autocomplete="off" >
                            </div>
                            <div class="form-group col-md-4 m-b-20">
                                <label for="Middle Name">Middle Name</label>
                                <input class="form-control" name="middle_name" id="middle_name" type="text"
                                    autocomplete="off" >
                            </div>
                            <div class="form-group col-md-4 m-b-20">
                                <label for="Last Name">Last Name</label>
                                <input class="form-control" name="last_name" id="last_name" type="text"
                                    autocomplete="off" >
                            </div>
							<div class="form-group col-md-2 m-b-4 mb-3">
								<label for="Birth Date" class="label-center">Birth Date: </label>
							</div>
                            <div class="form-group col-md-4 m-b-4 mb-3">
                                <div class="input-group">
                                    <input class="form-control " name="birth_date" id="birth_date" type="date"
                                        data-language="en">
                                </div>
                            </div>
							<div class="form-group col-md-2 m-b-4 mb-3">
								<label for="Hire Date" class="label-center">Hire Date: </label>
							</div>
                            <div class="form-group col-md-4 m-b-4 mb-3">
                                <div class="input-group">
                                    <input class="form-control " id="hire_date" name="hire_date" type="date"
                                        data-language="en">
                                </div>
                            </div>
                            <div class="form-group col-md-3 m-b-20">
                                <label for="Driving License">Driving License</label>
                                <input class="form-control" name="driving_license" id="driving_license" type="text"
                                    autocomplete="off" >
                            </div>
                            <div class="form-group col-md-3 m-b-4">
                                <select class="form-select" id="status">
                                    <option value="">Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">In Active</option>
                                </select>
                            </div>
                            <div class="form-check checkbox  checkbox-solid-success mb-0 col-md-3 m-b-20">
                                <input class="form-check-input" id="working" type="checkbox">
                                <label class="form-check-label" for="working">Currently Working</label>
                            </div>

                            <h5 class="border-style">Employee Address</h5>
                            <div class="form-group col-md-12 m-b-20">
                                <label for="Address">Address</label>
                                <input class="form-control" name="address" id="address" type="text"
                                    autocomplete="off" >
                            </div>

							<div class="form-group col-md-4 m-b-4">
                                <select class="form-select" id="state_id">
                                    <option value=""> State</option>
                                    @foreach ($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-4 m-b-4">
                                <select class="form-select" id="city_id">
                                    <option value=""> City</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>



                            <div class="form-group col-md-4 m-b-20">
                                <label for="Pincode">Pincode</label>
                                <input class="form-control" name="pincode" id="pincode" type="text"
                                    autocomplete="off" >
                            </div>

                            <h5 class="border-style">Employee Contact</h5>
                            <div class="form-group col-md-3 m-b-20">
                                <label for="Mobile Number">Mobile Number</label>
                                <input class="form-control" name="mobile_number" id="mobile_number" type="text"
                                    autocomplete="off" >
                            </div>

                            <div class="form-group col-md-3 m-b-20">
                                <label for="Office No">Office No</label>
                                <input class="form-control" name="office_no" id="office_no" type="text"
                                    autocomplete="off" >
                            </div>
                            <div class="form-group col-md-2 m-b-20">
                                <label for="Home Phone No">Home Phone No</label>
                                <input class="form-control" name="home_phone_no" id="home_phone_no" type="text"
                                    autocomplete="off" >
                            </div>
                            <div class="form-group col-md-4 m-b-20">
                                <label for="Email">Email</label>
                                <input class="form-control" name="email" id="email" type="text"
                                    autocomplete="off" >
                            </div>


                            <h5 class="border-style">Employee Position and Branch Access</h5>
                            <div class="form-group col-md-3 m-b-20">
                                <select class="form-select" id="position">
                                    <option value="">Position</option>
                                    <option value="Branch Manager">Branch Manager</option>
                                    <option value="Executive">Executive</option>
                                    <option value="Owner">Owner</option>
                                    <option value="Team Lead">Team Lead</option>
                                    <option value="vertical Head">vertical Head</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4 m-b-20">
								<label class="select2_label" for="Select Branch"> Branch</label>
                                <select class="form-select" id="branch_id" multiple>
                                    @foreach ($branches as $branch)
                                        <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4 m-b-20">
								<label class="select2_label" for="Reporting to person">Reporting to person</label>
                                <select class="form-select" id="reporting_to" multiple>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}">
                                            {{ $employee->first_name . ' ' . $employee->last_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <h5 class="border-style">Employee Login Info</h5>

                            <div class="form-group col-md-3 m-b-20">
                                <label for="Password">Password</label>
                                <input class="form-control" name="password" id="password" type="text"
                                    autocomplete="off" >
                            </div>

                            <div class="form-group col-md-3 m-b-20">
                                <select class="form-select" id="role_id">
                                    <option value=""> Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ explode('_---_', $role->name)[0] }}">
                                            {{ explode('_---_', $role->name)[0] }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <h5 class="border-style">Property Access</h5>
                            <div class="form-group col-md-3 m-b-20 mb-3">
                                <select class="form-select" id="property_for_id">
                                    <option value="">Property For</option>
                                    <option value="Rent">Rent</option>
                                    <option value="Sell">Sell</option>
									<option value="Both">Both</option>
                                </select>
                            </div>

                            <div class="form-group col-md-3 m-b-20 mb-3">
								<label class="select2_label" for="Property Type">Property Type</label>
                                <select class="form-select" id="property_type_id" multiple>
                                    @forelse ($property_configuration_settings as $props)
                                        @if ($props['dropdown_for'] == 'property_construction_type')
                                            <option data-parent_id="{{ $props['parent_id'] }}"
                                                value="{{ $props['id'] }}">{{ $props['name'] }}
                                            </option>
                                            </option>
                                        @endif
                                    @empty
                                    @endforelse
                                </select>
                            </div>

                            <div class="form-group col-md-3 m-b-20 mb-3">
								<label class="select2_label" for="Specific Type">Specific Type</label>
                                <select class="form-select" id="specific_properties" multiple="multiple">
                                    @forelse ($property_configuration_settings as $props)
                                        @if ($props['dropdown_for'] == 'property_specific_type')
                                            <option data-parent_id="{{ $props['parent_id'] }}"
                                                value="{{ $props['id'] }}">{{ $props['name'] }}
                                            </option>
                                            </option>
                                        @endif
                                    @empty
                                    @endforelse
                                </select>
                            </div>

                            <div class="form-group col-md-3 m-b-20 mb-3">
								<label class="select2_label" for="Building Access">Project Access</label>
                                <select class="form-select" id="buildings" multiple="multiple">
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        @if (Auth::user()->can('user-edit') || Auth::user()->can('user-create'))
                            <button class="btn btn-secondary" id="saveUser">Save</button>
                        @endif
                        <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
	@php
	$city_encoded = json_encode($cities);
	$state_encoded = json_encode($states);
	@endphp
@endsection
@push('scripts')
    <script>

		var shouldchangecity = 1;

		var cities = @Json($city_encoded);
		var states = @Json($state_encoded);

		$(document).on('change', '#state_id', function(e) {
			if (shouldchangecity) {
				$('#city_id').select2('destroy');
			citiesar = JSON.parse(cities);
			$('#city_id').html('');
			for (let i = 0; i < citiesar.length; i++) {
				if (citiesar[i]['state_id'] == $("#state_id").val()) {
					$('#city_id').append('<option value="'+citiesar[i]['id']+'">'+citiesar[i]['name']+'</option>')
				}
			}
			$('#city_id').select2();
			}
		})

        var queryString = window.location.search;
        var urlParams = new URLSearchParams(queryString);
        var go_data_id = urlParams.get('data_id')
        var current_user_id = '{{ Auth::user()->id }}';


        function getUser(data) {
			shouldchangecity = 0;
            $('#modal_form').trigger("reset");
            var id = $(data).attr('data-id');
            $.ajax({
                type: "POST",
                url: "{{ route('admin.getUser') }}",
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    dataa = JSON.parse(data).data;
                    role = JSON.parse(data).role
                    if (current_user_id == dataa.id) {
                        $('#role_id').prop('disabled', true)
                    } else {
                        $('#role_id').prop('disabled', false)
                    }
                    $('#this_data_id').val(dataa.id)
                    $('#first_name').val(dataa.first_name)
                    $('#middle_name').val(dataa.middle_name)
                    $('#last_name').val(dataa.last_name)
                    $('#birth_date').val(dataa.birth_date)
                    $('#hire_date').val(dataa.hire_date)
                    $('#driving_license').val(dataa.driving_license)
                    $('#status').val(dataa.status)
                    $('#address').val(dataa.address)
                    $('#pincode').val(dataa.pincode)
                    $('#city_id').val(dataa.city_id).trigger('change');
                    $('#state_id').val(dataa.state_id).trigger('change');
                    $('#mobile_number').val(dataa.mobile_number)
                    $('#office_no').val(dataa.office_no)
                    $('#email').val(dataa.email)
                    $('#home_phone_no').val(dataa.home_phone_no)
                    $('#position').val(dataa.position).trigger('change');
                    $('#property_for_id').val(dataa.property_for_id).trigger('change')
                    $('#working').prop('checked', Number(dataa.working));
					shouldchangecity = 1;
					$('#specific_properties').val([]).trigger('change');
					$('#buildings').val([]).trigger('change');
					$('#branch_id').val([]).trigger('change');
					$('#reporting_to').val([]).trigger('change');
					$('#property_type_id').val([]).trigger('change');
                    try {
                        $('#specific_properties').val(JSON.parse(dataa.specific_properties)).trigger('change');
                    } catch (error) {
                        //
                    }
                    try {
                        $('#buildings').val(JSON.parse(dataa.buildings)).trigger('change');
                    } catch (error) {
                        //
                    }
                    try {
                        $('#branch_id').val(JSON.parse(dataa.branch_id)).trigger('change');
                    } catch (error) {
                        //
                    }
                    try {
                        $('#reporting_to').val(JSON.parse(dataa.reporting_to)).trigger('change');
                    } catch (error) {
                        //
                    }
                    try {
                        $('#property_type_id').val(JSON.parse(dataa.property_type_id)).trigger('change');
                    } catch (error) {
						//
                    }
                    $('#role_id').val(role.split('_---_')[0]).trigger('change');
                    $('#userModal').modal('show');
					triggerChangeinput()
                }
            });
        }


        function deleteUser(data) {

            Swal.fire({
                title: "Are you sure?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: 'Yes',
            }).then(function(isConfirm) {
                if (isConfirm.isConfirmed) {
                    var id = $(data).attr('data-id');
                    $.ajax({
                        type: "POST",
                        url: "{{ route('admin.deleteUser') }}",
                        data: {
                            id: id,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            $('#userTable').DataTable().draw();
                        }
                    });
                }
            })
        }

        $(document).ready(function() {
            $('#userTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.users') }}",
                    data: function(d) {
                        d.go_data_id = go_data_id;
                    },
                },
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
                        data: 'role_id',
                        name: 'role_id'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'Actions',
                        name: 'Actions',
                        orderable: false
                    },
                ]
            });


            $('#modal_form').validate({ // initialize the plugin
                rules: {
                    first_name: {
                        required: true,
                    },
                    middle_name: {
                        required: true,
                    },
                    email: {
                        email: true,
                    },
                    pincode: {
                        digits: true,
                    },
                },
                submitHandler: function(form) { // for demo
                    alert('valid form submitted'); // for demo
                    return false; // for demo
                }
            });

            $(document).on('click', '#saveUser', function(e) {
                e.preventDefault();
                $("#modal_form").validate();
                if (!$("#modal_form").valid()) {
					return
                }
				$(this).prop('disabled',true);
                var id = $('#this_data_id').val()
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.saveUser') }}",
                    data: {
                        id: id,
                        first_name: $('#first_name').val(),
                        middle_name: $('#middle_name').val(),
                        last_name: $('#last_name').val(),
                        birth_date: $('#birth_date').val(),
                        hire_date: $('#hire_date').val(),
                        driving_license: $('#driving_license').val(),
                        status: $('#status').val(),
                        address: $('#address').val(),
                        pincode: $('#pincode').val(),
                        city_id: $('#city_id').val(),
                        state_id: $('#state_id').val(),
                        mobile_number: $('#mobile_number').val(),
                        office_no: $('#office_no').val(),
                        email: $('#email').val(),
                        home_phone_no: $('#home_phone_no').val(),
                        position: $('#position').val(),
                        branch_id: JSON.stringify($('#branch_id').val()),
                        reporting_to: JSON.stringify($('#reporting_to').val()),
                        password: $('#password').val(),
                        role_id: $('#role_id').val(),
                        property_for_id: $('#property_for_id').val(),
                        property_type_id: JSON.stringify($('#property_type_id').val()),
                        specific_properties: JSON.stringify($('#specific_properties').val()),
                        buildings: JSON.stringify($('#buildings').val()),
                        working: Number($('#working').prop('checked')),
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(data) {
                        $('#userTable').DataTable().draw();
                        $('#userModal').modal('hide');
						$('#saveUser').prop('disabled',false);
                    }
                });
            })

        });
    </script>
@endpush
