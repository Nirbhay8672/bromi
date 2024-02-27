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
                            <h5 class="mb-3">Coupons </h5>
                            <button class="btn custom-icon-theme-button open_modal_with_this" type="button"
                                data-bs-toggle="modal" data-bs-target="#couponModal"><i class="fa fa-plus"></i></button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display" id="couponTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Code</th>
                                            <th>Amount Off</th>
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
    <div class="modal fade" id="couponModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Coupon</h5>
                    <button class="btn-close bg-light" type="button" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <form class="form-bookmark needs-validation modal_form" method="post" id="modal_form" novalidate="">
                        <input type="hidden" name="this_data_id" id="this_data_id">
                        <div class="row">
                            <div class="form-group col-md-5 m-b-20">
                                <div class="fname">
                                    <input class="form-control" name="coupon_name" id="coupon_name" type="text"
                                    placeholder="Coupon Name" required="" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group col-md-5 m-b-20">
                                <div class="fname">
                                    <input class="form-control" name="coupon_code" id="coupon_code" type="text"
                                        placeholder="Coupon Code" required="" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group col-md-5 m-b-20">
                                <div class="fname">
                                    <input class="form-control" name="amount_off" id="amount_off" type="text"
                                        placeholder="Amount Off" required="" autocomplete="off">
                                </div>
                            </div>
							<div class="form-check checkbox  checkbox-solid-success mb-0 col-md-3 m-b-20">
								<input class="form-check-input" id="status" type="checkbox">
								<label class="form-check-label" for="status">Active</label>
							</div>
                        </div>
                        <div class="text-center">
                            <button class="btn custom-theme-button" id="saveCoupon">Save</button>
                            <button class="btn btn-primary ms-3" style="border-radius: 5px;" type="button" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function getCoupon(data) {
            $('#modal_form').trigger("reset");
            var id = $(data).attr('data-id');
            $.ajax({
                type: "POST",
                url: "{{ route('superadmin.getCoupon') }}",
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    dataa = JSON.parse(data);
                    $('#this_data_id').val(dataa.id);
                    $('#coupon_name').val(dataa.name);
                    $('#coupon_code').val(dataa.code);
                    $('#amount_off').val(dataa.amount_off);
					$('#status').prop('checked', Number(dataa.status));
                    $('#couponModal').modal('show');
                }
            });
        }

        function deleteCoupon(data) {
            var id = $(data).attr('data-id');
            $.ajax({
                type: "POST",
                url: "{{ route('superadmin.deleteCoupon') }}",
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    $('#couponTable').DataTable().draw();
                }
            });
        }

        $(document).ready(function() {
            $('#couponTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('superadmin.coupons') }}",
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'code',
                        name: 'code'
                    },
                    {
                        data: 'amount_off',
                        name: 'amount_off'
                    },
                    {
                        data: 'Actions',
                        name: 'Actions'
                    },
                ]
            });

            $(document).on('click', '#saveCoupon', function(e) {
                e.preventDefault();
                var id = $('#this_data_id').val()
                var features = [];
                $.ajax({
                    type: "POST",
                    url: "{{ route('superadmin.saveCoupon') }}",
                    data: {
                        id: id,
                        name: $('#coupon_name').val(),
                        code: $('#coupon_code').val(),
                        amount_off: $('#amount_off').val(),
						status: Number($('#status').prop('checked')),
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(data) {
                        $('#couponTable').DataTable().draw();
                        $('#couponModal').modal('hide');
                    }
                });
            })

        });
    </script>
@endpush
