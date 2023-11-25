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
                            <h5 class="mb-3">List of Cities</h5>
                            <button class="btn btn-primary btn-air-primary open_modal_with_this" type="button"
                                data-bs-toggle="modal" data-bs-target="#cityModal">Add New City</button>
								<button class="btn btn-primary btn-air-primary" type="button"
                                    data-bs-toggle="modal" data-bs-target="#importmodal"> Import Cities</button>
									<button class="btn btn-primary btn-air-primary delete_table_row" style="display: none" onclick="deleteTableRow()"
									type="button">Delete</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display" id="cityTable">
                                    <thead>
                                        <tr>
											<th>
                                                <div class="form-check form-check-inline checkbox checkbox-dark mb-0 me-0">
                                                    <input class="form-check-input" id="select_all_checkbox" name="selectrows" type="checkbox">
                                                    <label class="form-check-label" for="select_all_checkbox"></label>
                                                </div>
                                            </th>
                                            <th>City</th>
											<th>State</th>
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
        <div class="modal fade" id="cityModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New City</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"> </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-bookmark needs-validation modal_form" method="post" id="modal_form"
                            novalidate="">
                            <div class="form-row">
                                <div class="form-group col-md-7 d-inline-block m-b-20">
                                    <label for="City">City</label>
                                    <input
                                        class="form-control"
                                        name="city_name"
                                        id="city_name"
                                        type="text"
                                        required
                                    >
                                </div>
                                <div class="form-group col-md-4 d-inline-block m-b-4 mt-1">
                                    <label class="mb-0">State</label>
                                    <select class="form-select" id="state_id" required>
                                        <option value="">State</option>
                                        @forelse ($states as $state)
                                            <option value="{{ $state->id }}">{{ $state->name }}
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                                <input type="hidden" name="this_data_id" id="this_data_id">
                            </div>
                            <button class="btn btn-secondary" id="saveCity">Save</button>
                            <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
		<div class="modal fade" id="importmodal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import Cities</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"> </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-bookmark needs-validation" method="post" id="import_form" novalidate="">
							<div class="form-row">
							<div class="form-group col-md-5 d-inline-block m-b-20">
                                <label class="mb-0">State</label>
                                <select id="import_state_id" required>
									<option value=""> State</option>
									@foreach ($states as $state)
										<option value="{{ $state['id'] }}">{{ $state['name'] }}</option>
									@endforeach
								</select>
                                </div>

							</div>
                            <button class="btn btn-secondary" type="button" id="importCity">Import</button>
                            <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#cityTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('admin.settings.city') }}",
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
                            data: 'state_id',
                            name: 'state_id'
                        },
                        {
                            data: 'Actions',
                            name: 'Actions',
                            orderable: false
                        },
                    ],
					columnDefs: [{
                            "width": "3%",
                            "targets": 0
                        }
                    ],
                });
            });

            function getCity(data) {
                $('#modal_form').trigger("reset");
                var id = $(data).attr('data-id');
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.settings.getcity') }}",
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        data = JSON.parse(data)
                        $('#this_data_id').val(data.id)
                        $('#city_name').val(data.name).trigger('change');
						$('#state_id').val(data.state_id).trigger('change');
                        $('#cityModal').modal('show');
						triggerChangeinput()
                    }
                });
            }


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
                            url: "{{ route('admin.settings.destroycity') }}",
                            data: {
								allids: JSON.stringify(rowss),
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(data) {
								$('.delete_table_row').hide();
                                $('#cityTable').DataTable().draw();
                            }
                        });
                    }
                })
				}
			}


            function deleteCity(data) {
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
                            url: "{{ route('admin.settings.destroycity') }}",
                            data: {
                                id: id,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(data) {
                                $('#cityTable').DataTable().draw();
                            }
                        });
                    }
                })
            }

            $(document).on('click', '#saveCity', function(e) {
                e.preventDefault();
                $("#modal_form").validate();
                if (!$("#modal_form").valid()) {
					return
                }
				$(this).prop('disabled',true);
                var id = $('#this_data_id').val()
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.settings.savecity') }}",
                    data: {
                        id: id,
                        name: $('#city_name').val(),
						state_id: $('#state_id').val(),
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        $('#cityTable').DataTable().draw();
                        $('#cityModal').modal('hide');
						$('#saveCity').prop('disabled',false);
                    }
                });
            })

			$(document).on('click', '#importCity', function(e) {
                e.preventDefault();
                $("#import_form").validate();
                if (!$("#import_form").valid()) {
					return
                }
				$.ajax({
                    type: "POST",
                    url: "{{ route('admin.importcity') }}",
                    data: {
                        state_id: $('#import_state_id').val(),
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        $('#cityTable').DataTable().draw();
                        $('#importmodal').modal('hide');
						$('#import_form')[0].reset();
                    }
                });
			})

        </script>
    @endpush
