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
                            <h5 class="mb-3">List of States</h5>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <select name="" id="change_location_link" class="form-control">
                                        <option value="{{ route('admin.settings.state') }}">States</option>
                                        <option value="{{ route('admin.settings.city') }}">Cities</option>
                                        <option value="{{ route('admin.areas') }}">Localities</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <button
                                        class="btn custom-icon-theme-button"
                                        type="button"
                                        data-bs-toggle="modal"
                                        data-bs-target="#stateModal"
                                        title="Add State"
                                    ><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="display" id="stateTable">
                                    <thead>
                                        <tr>
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
        <div class="modal fade" id="stateModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New State</h5>
                        <button class="btn-close btn-light" type="button" data-bs-dismiss="modal" aria-label="Close"> </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-bookmark needs-validation modal_form" method="post" id="modal_form"
                            novalidate="">
                            <div class="form-row mb-2">
                                <div>
                                    <div class="form-group col-md-12 mb-1">
                                        <label for="State">State</label>
                                        <input
                                            class="form-control"
                                            name="state_name"
                                            id="state_name"
                                            type="text"
                                            required=""
                                            autocomplete="off"
                                        >
                                    </div>
                                    <label id="state_name-error" class="error" for="state_name"></label>
                                </div>
                                <input type="hidden" name="this_data_id" id="this_data_id">
                            </div>
                            <div class="text-center">
                                <button class="btn custom-theme-button" id="saveState">Save</button>
                                <button class="btn btn-secondary ms-3" style="border-radius: 5px;" type="button" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="importmodal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import States</h5>
                        <button class="btn-close btn-light" type="button" data-bs-dismiss="modal" aria-label="Close"> </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-bookmark needs-validation " method="post" id="import_form" novalidate="">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12 m-b-20">
                                    <input class="form-control" type="file" accept=".csv" name="import_file"
                                        id="import_file">
                                </div>
                            </div>
                            <button class="btn btn-secondary" id="importFile">Save</button>
                            <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @push('scripts')
        <script>
            $(document).ready(function() {

                $("#change_location_link").select2();
                
                $(document).on('change', '#change_location_link', function(e) {
                    window.location.href = $(this).val();
                })
                
                $('#stateTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('admin.settings.state') }}",
                    columns: [{
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'Actions',
                            name: 'Actions',
                            orderable: false
                        },
                    ]
                });
            });

            function getState(data) {
                $('#modal_form').trigger("reset");
                var id = $(data).attr('data-id');
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.settings.getstate') }}",
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        data = JSON.parse(data)
                        $('#this_data_id').val(data.id)
                        $('#state_name').val(data.name).trigger('change');
                        $('#stateModal').modal('show');
						triggerChangeinput()
                    }
                });
            }

            function deleteState(data) {
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
                            url: "{{ route('admin.settings.destroystate') }}",
                            data: {
                                id: id,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(data) {
                                $('#stateTable').DataTable().draw();
                            }
                        });
                    }
                })

            }

            $(document).on('click', '#saveState', function(e) {
                e.preventDefault();
				$("#modal_form").validate();

                console.log($("#modal_form").validate());

                if (!$("#modal_form").valid()) {
					return
                }
				$(this).prop('disabled',true);
                var id = $('#this_data_id').val()
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.settings.savestate') }}",
                    data: {
                        id: id,
                        name: $('#state_name').val(),
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        $('#stateTable').DataTable().draw();
                        $('#stateModal').modal('hide');
						$('#saveState').prop('disabled',false);
                    }
                });
            })

            $(document).on('click', '#importFile', function(e) {
                e.preventDefault();
                var formData = new FormData();
                var files = $('#import_file')[0].files[0];
                if (files == '') {
                    return;
                }
                formData.append('csv_file', files);
                formData.append('_token', '{{ csrf_token() }}');
                $.ajax({
                    type: "POST",
                    processData: false,
                    contentType: false,
                    url: "{{ route('admin.settings.importstate') }}",
                    data: formData,
                    success: function(data) {
                        $('#stateTable').DataTable().draw();
                        $('#importmodal').modal('hide');
                        $('#import_form')[0].reset();
                    }
                });
            })
        </script>
    @endpush
