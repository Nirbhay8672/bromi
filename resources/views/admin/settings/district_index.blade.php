@extends('admin.layouts.app')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">

                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h5 class="mb-3">List of District</h5>
                            <button class="btn btn-primary btn-air-primary open_modal_with_this" type="button" data-bs-toggle="modal" data-bs-target="#stateModal">Add New District</button>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <select name="" id="change_search_link" class="form-control">
                                        <option value="{{ route('admin.districts') }}">Districts</option>
                                        <option value="{{ route('admin.talukas') }}">Talukas</option>
                                        <option value="{{ route('admin.villages') }}">Villages</option>
                                    </select>
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
                        <h5 class="modal-title" id="exampleModalLabel">Add New District</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"> </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-bookmark needs-validation modal_form" method="post" id="modal_form"
                            novalidate="">
                            <div class="form-row">
                                <div class="form-group col-md-12 m-b-20">
									<label for="State">District</label>
                                    <input class="form-control" name="district_name" id="district_name" type="text"
                                        required="" autocomplete="off" >
                                </div>
                                <input type="hidden" name="this_data_id" id="this_data_id">
                            </div>
                            <button class="btn btn-secondary" id="saveDistrict">Save</button>
                            <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {

            $("#change_search_link").select2();
                
            $(document).on('change', '#change_search_link', function(e) {
                window.location.href = $(this).val();
            })

            $('#stateTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.districts') }}",
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
                url: "{{ route('admin.get_district') }}",
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    data = JSON.parse(data)
                    $('#this_data_id').val(data.id)
                    $('#district_name').val(data.name).trigger('change');
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
                        url: "{{ route('admin.destroy-district') }}",
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

        $(document).on('click', '#saveDistrict', function(e) {
            e.preventDefault();
            $("#modal_form").validate();
            if (!$("#modal_form").valid()) {
                return
            }
            var id = $('#this_data_id').val()
            $.ajax({
                type: "POST",
                url: "{{ route('admin.save_district') }}",
                data: {
                    id: id,
                    name: $('#district_name').val(),
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    $('#stateTable').DataTable().draw();
                    $('#stateModal').modal('hide');
                }
            });
        })

    </script>
@endpush
