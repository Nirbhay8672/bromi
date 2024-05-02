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
                            <h5 class="mb-3">Plans </h5>
                            <button
                                class="btn custom-icon-theme-button open_modal_with_this tooltip-btn"
                                type="button"
                                data-bs-toggle="modal"
                                data-bs-target="#planModal"
                                data-tooltip="Add Plan"
                            ><i class="fa fa-plus"></i></button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display" id="planTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Extra User Price</th>
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
    <div class="modal fade" id="planModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Plan</h5>
                    <button class="btn-close btn-light" type="button" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <form class="form-bookmark needs-validation modal_form" method="post" id="modal_form" novalidate="">
                        <input type="hidden" name="this_data_id" id="this_data_id">
                        <div class="row">

                            <div class="form-group col-md-4 m-b-20">
                                <div class="fname">
                                    <input
                                        class="form-control"
                                        name="name"
                                        id="plan_name"
                                        type="text" 
                                        placeholder="Name"
                                        required=""
                                        autocomplete="off"
                                    >
                                </div>
                            </div>

                            <div class="form-group col-md-4 m-b-20">
                                <div class="fname">
                                    <input
                                        class="form-control"
                                        name="price"
                                        id="plan_price"
                                        type="text"
                                        placeholder="Price"
                                        required=""
                                        autocomplete="off"
                                    >
                                </div>
                            </div>

                            <div class="form-group col-md-4 m-b-20">
                                <div class="fname">
                                    <input
                                        class="form-control"
                                        name="user_limit"
                                        id="user_limit"
                                        type="text"
                                        placeholder="User Limit"
                                        required=""
                                        autocomplete="off"
                                    >
                                </div>
                            </div>
                            
                            <div class="form-group col-md-4 m-b-20">
                                <div class="fname">
                                    <input
                                        class="form-control"
                                        name="extra_user_price"
                                        id="extra_user_price"
                                        type="text"
                                        placeholder="Extra User Price"
                                        required=""
                                        autocomplete="off"
                                    >
                                </div>
                            </div>

                            <div class="col-md-5 m-b-20">
                                <button onclick=addFeature() class="btn btn-pill btn-primary" type="button">Add
                                    Feature</button>
                            </div>

                            <div class="" id="feature-container">
                            </div>
                        </div>
                        <button class="btn btn-secondary" id="savePlan">Save</button>
                        <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function getPlan(data) {
            $('#modal_form').trigger("reset");
            var id = $(data).attr('data-id');
            $.ajax({
                type: "POST",
                url: "{{ route('superadmin.getPlan') }}",
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    dataa = JSON.parse(data);
                    featurestring = '';
                    if (dataa.details != '') {
                        featurestring = JSON.parse(dataa.details)
                    }
                    $('#this_data_id').val(dataa.id);
                    $('#plan_name').val(dataa.name);
                    $('#plan_price').val(dataa.price);
                    $('#user_limit').val(dataa.user_limit);
                    $('#extra_user_price').val(dataa.extra_user_price);
                    if (featurestring != '') {
                        features = featurestring.split('_---_')
                        $('#feature-container').html('');
                        features.forEach(element => {

                            inp = `<div class="row">
                                    <div class="form-group col-md-4 m-b-20">
                                        <div class="fname">
                                            <input
                                                class="form-control"
                                                name="features[]"
                                                id="user_limit"
                                                type="text"
                                                placeholder="Feature"
                                                required=""
                                                value="${element}"
                                                autocomplete="off"
                                            >
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <button
                                            onclick="deletethis(this)"
                                            class="btn btn-danger"
                                            type="button"
                                        ><i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div>`;
                            $('#feature-container').append(inp)
                        });
                    }
                    $('#planModal').modal('show');
                }
            });
        }

        function deletethis(params) {
            $(params).parent().parent().remove();
        }

        function addFeature() {

            inp = `<div class="row">
                <div class="form-group col-md-4 m-b-20">
                    <div class="fname">
                        <input
                            class="form-control"
                            name="features[]"
                            id="user_limit"
                            type="text"
                            placeholder="Feature"
                            required=""
                            autocomplete="off"
                        >
                    </div>
                </div>
                <div class="col-2">
                    <button
                        onclick="deletethis(this)"
                        class="btn btn-danger"
                        type="button"
                    ><i class="fa fa-trash"></i>
                    </button>
                </div>
            </div>`;
            
            $('#feature-container').append(inp)
        }

        function deletePlan(data) {
            var id = $(data).attr('data-id');
            $.ajax({
                type: "POST",
                url: "{{ route('superadmin.deletePlan') }}",
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    $('#planTable').DataTable().draw();
                }
            });
        }

        $(document).ready(function() {
            $('#planTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('superadmin.plans') }}",
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },
                    {
                        data: 'extra_user_price',
                        name: 'Extra User Price'
                    },
                    {
                        data: 'Actions',
                        name: 'Actions'
                    },
                ]
            });

            $(document).on('click', '#savePlan', function(e) {
                e.preventDefault();
                var id = $('#this_data_id').val()
                var features = [];
                $('input[name="features[]"]').each(function() {
                    features.push($(this).val());
                });
                $.ajax({
                    type: "POST",
                    url: "{{ route('superadmin.savePlan') }}",
                    data: {
                        id: id,
                        name: $('#plan_name').val(),
                        price: $('#plan_price').val(),
                        user_limit: $('#user_limit').val(),
                        extra_user_price: $('#extra_user_price').val(),
                        features: features,
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(data) {
                        $('#planTable').DataTable().draw();
                        $('#planModal').modal('hide');
                    }
                });
            })

        });
    </script>
@endpush
