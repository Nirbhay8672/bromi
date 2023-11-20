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
                            <h5 class="mb-3">Branches</h5>
                            <button class="btn btn-primary btn-air-primary open_modal_with_this" type="button"
                                data-bs-toggle="modal" data-bs-target="#branchModal">Add New Branch</button>
								<button class="btn btn-primary btn-air-primary delete_table_row" style="display: none" onclick="deleteTableRow()"
									type="button">Delete</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display" id="branchTable">
                                    <thead>
                                        <tr>
											<th>
                                                <div class="form-check form-check-inline checkbox checkbox-dark mb-0 me-0">
                                                    <input class="form-check-input" id="select_all_checkbox" name="selectrows" type="checkbox">
                                                    <label class="form-check-label" for="select_all_checkbox"></label>
                                                </div>
                                            </th>
                                            <th>Branch</th>
                                            <th>City</th>
                                            <th>status</th>
                                            <th>Action</th>
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
        <div class="modal fade" id="branchModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Branch</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"> </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-bookmark needs-validation " method="post" id="modal_form" novalidate="">
                            <div class="row">
								<div class="form-group col-md-8 m-b-20">
									<label for="Branch Name">Branch Name</label>
                                    <input class="form-control" name="branch_name" id="branch_name" type="text"
                                        required="" autocomplete="off" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 m-b-20">
									<label class="mb-0">State</label>
                                    <select class="form-select" id="state_id" required>
                                        <option value="">State</option>
                                        @foreach ($states as $state)
                                            <option value="{{ $state['id'] }}">{{ $state['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4 m-b-20">
									<label class="mb-0">City</label>
                                    <select class="form-select" id="city_id" required>
                                        <option value="">City</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city['id'] }}">{{ $city['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
								<div class="form-group col-md-4 m-b-20">
									<label class="mb-0">Area</label>
                                    <select id="area_id">
                                        <option value=""> Area</option>
                                        @foreach ($areas as $area)
                                            <option value="{{ $area['id'] }}">{{ $area['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" name="this_data_id" id="this_data_id">

								<div class="form-check checkbox  checkbox-solid-success mb-0 col-md-5 m-b-20">
                                    <input class="form-check-input" id="branch_active" type="checkbox">
                                    <label class="form-check-label" for="branch_active">Active</label>
                                </div>
                            </div>
                            <button class="btn btn-secondary" id="saveBranch">Save</button>
                            <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @php
		$city_encoded = json_encode($cities);
		$state_encoded = json_encode($states);
		$area_encoded = json_encode($areas);
		@endphp
    @endsection
    @push('scripts')
        <script>
            $(document).ready(function() {

                $('#branchTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('admin.branches') }}",
                    columns: [
						{
                            data: 'select_checkbox',
                            name: 'select_checkbox',
							orderable: false
                        },
					    {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'city_id',
                            name: 'city_id'
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
            });

            function getBranch(data) {
                $('#modal_form').trigger("reset");
                var id = $(data).attr('data-id');
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.getBranch') }}",
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        data = JSON.parse(data)
                        $('#this_data_id').val(data.id)
                        $('#branch_name').val(data.name)
                        $('#state_id').val(data.state_id).trigger('change');
						$('#area_id').val(data.area_id).trigger('change');
                        $('#city_id').val(data.city_id).trigger('change');
                        $('#branch_active').prop('checked', Number(data.status));
                        $('#branchModal').modal('show');
						triggerChangeinput()
                    }
                });
            }

            function deleteBranch(data) {
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
                            url: "{{ route('admin.deleteBranch') }}",
                            data: {
                                id: id,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(data) {
                                $('#branchTable').DataTable().draw();
                            }
                        });
                    }
                })

            }

            $(document).on('click', '#saveBranch', function(e) {
                e.preventDefault();
                $("#modal_form").validate();
                if (!$("#modal_form").valid()) {
					return
                }
				$(this).prop('disabled',true);
                var id = $('#this_data_id').val()
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.saveBranch') }}",
                    data: {
                        id: id,
                        name: $('#branch_name').val(),
                        state_id: $('#state_id').val(),
                        city_id: $('#city_id').val(),
						area_id: $('#area_id').val(),
                        status: Number($('#branch_active').prop('checked')),
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
						$('#branchTable').DataTable().draw();
                        $('#branchModal').modal('hide');
						$('#saveBranch').prop('disabled',false);
                    }
                });
            })

			$(document).on('change', '#select_all_checkbox', function(e) {
				if ($(this).prop('checked')) {
					$('.delete_table_row').show();

					$(".table_checkbox").each(function(index) {
						$(this).prop('checked',true)
					})
				}else{
					$('.delete_table_row').hide();
					$(".table_checkbox").each(function(index) {
						$(this).prop('checked',false)
					})
				}
			})

			$(document).on('change', '.table_checkbox', function(e) {
				var rowss = [];
				$(".table_checkbox").each(function(index) {
					if ($(this).prop('checked')) {
						rowss.push($(this).attr('data-id'))
					}
				})
				if (rowss.length > 0) {
					$('.delete_table_row').show();
				}else{
					$('.delete_table_row').hide();
				}
			})

			function deleteTableRow(params) {
				var rowss = [];
				$(".table_checkbox").each(function(index) {
					if ($(this).prop('checked')) {
						rowss.push($(this).attr('data-id'))
					}
				})
				if (rowss.length>0) {
					Swal.fire({
                    title: "Are you sure?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                }).then(function(isConfirm) {
                    if (isConfirm.isConfirmed) {
                        $.ajax({
                            type: "POST",
							url: "{{ route('admin.deleteBranch') }}",
                            data: {
								allids: JSON.stringify(rowss),
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(data) {
								$('.delete_table_row').hide();
                                $('#branchTable').DataTable().draw();
                            }
                        });
                    }
                })
				}
			}

            var cities = @Json($city_encoded);
            var states = @Json($state_encoded);
			var areas = @Json($area_encoded);
            var shouldchangecity = 1;
            $(document).on('change', '#state_id', function(e) {
                if (shouldchangecity) {
                    $('#city_id').select2('destroy');
                    $('#city_id').html('');
                    JSON.parse(cities).forEach(city => {
                        if(city.state_id == $("#state_id").val()) {
                            $('#city_id').append(`<option value="${city.id}">${city.name}</option>`);
                        }
                    });
                    $('#city_id').select2();
                }
            })

			$(document).on('change', '#city_id', function(e) {
                if (shouldchangecity) {
                    $('#area_id').select2('destroy');
                    $('#area_id').html('');
                    JSON.parse(areas).forEach(area => {
                        if(area.city_id == $("#city_id").val()) {
                            $('#area_id').append(`<option value="${area.id}">${area.name}</option>`);
                        }
                    });
                    $('#area_id').select2();
                }
            })
        </script>
    @endpush
