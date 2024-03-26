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
                            <h5 class="mb-3">Requests </h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display" id="requestTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Request</th>
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
    <div class="modal fade" id="requestModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Request View </h5>
                    <button class="btn-close btn-light" type="button" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <form class="form-bookmark needs-validation modal_form" method="post" id="modal_form" novalidate="">
                        <div class="row">
                            <div class="form-group col-md-4 m-b-20">
                                <div class="fname">
                                    <textarea name="enquiry" id="enquiry" cols="100" rows="10"></textarea>
                                </div>
                            </div>
                            
                        </div>

                        <button class="btn btn-secondary me-3" id="saveEnq">Save</button>
                        <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function userActivate(enq) {
            $.ajax({
                type: "POST",
                url: "{{ route('superadmin.changeEnquiryStatus') }}",
                data: {
                    id: $(enq).attr('data-id'),
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    $('#requestTable').DataTable().draw();
                }
            });
        }

        $(document).ready(function() {
            $('#requestTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('superadmin.adminEnquiries') }}",
                columns: [{
                        data: 'user_name',
                        name: 'user_name'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'enquiry',
                        name: 'enquiry'
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
        });

        function resetData() {
            $('#saveEnq').removeClass('d-none');
            $('#exampleModalLabel').text('ADD NEW REQUEST');
        }

        function getBromiEnq(data) {
            $('#modal_form').trigger("reset");
            var id = $(data).attr('data-id');
            $.ajax({
                type: "POST",
                url: "{{ route('superadmin.showEnquiry') }}",
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    $('#enquiry').val(data.brom_enq.enquiry);
                    $('#requestModal').modal('show');
                    $('#saveEnq').addClass('d-none');
                }
            });
        }

    </script>
@endpush
