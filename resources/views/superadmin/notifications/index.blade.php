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
                            <h5 class="mb-3">Notifications </h5>
                            <button class="btn btn-pill btn-primary btn-air-primary open_modal_with_this" type="button"
                                data-bs-toggle="modal" data-bs-target="#notificationModal">Add New Notification</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display" id="notificationTable">
                                    <thead>
                                        <tr>
                                            <th>Notification</th>
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
    <div class="modal fade" id="notificationModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Notification</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <form class="form-bookmark needs-validation modal_form" method="post" id="modal_form" novalidate="">
                        <input type="hidden" name="this_data_id" id="this_data_id">
                        <div class="row">
                            <div class="form-group col-md-10 m-b-20">
                                <input class="form-control" name="notification" id="notification" type="text"
                                    placeholder="Notification" required="" autocomplete="off">
                            </div>

							<div class="form-check checkbox  checkbox-solid-success mb-0 col-md-3 m-b-20">
								<input class="form-check-input" id="status" type="checkbox">
								<label class="form-check-label" for="status">Active</label>
							</div>
                        </div>
                        <button class="btn btn-secondary" id="saveNotification">Save</button>
                        <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function getNotification(data) {
            $('#modal_form').trigger("reset");
            var id = $(data).attr('data-id');
            $.ajax({
                type: "POST",
                url: "{{ route('superadmin.getNotification') }}",
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    dataa = JSON.parse(data);
                    $('#this_data_id').val(dataa.id);
                    $('#notification').val(dataa.message);
					$('#status').prop('checked', Number(dataa.status));
                    $('#notificationModal').modal('show');
                }
            });
        }

        function deleteNotification(data) {
            var id = $(data).attr('data-id');
            $.ajax({
                type: "POST",
                url: "{{ route('superadmin.deleteNotification') }}",
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    $('#notificationTable').DataTable().draw();
                }
            });
        }

        $(document).ready(function() {
            $('#notificationTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('superadmin.notifications') }}",
                columns: [{
                        data: 'message',
                        name: 'message'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'Actions',
                        name: 'Actions'
                    },
                ]
            });

            $(document).on('click', '#saveNotification', function(e) {
                e.preventDefault();
                var id = $('#this_data_id').val()
                var features = [];
                $.ajax({
                    type: "POST",
                    url: "{{ route('superadmin.saveNotification') }}",
                    data: {
                        id: id,
                        message: $('#notification').val(),
						status: Number($('#status').prop('checked')),
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(data) {
                        $('#notificationTable').DataTable().draw();
                        $('#notificationModal').modal('hide');
                    }
                });
            })

        });
    </script>
@endpush
