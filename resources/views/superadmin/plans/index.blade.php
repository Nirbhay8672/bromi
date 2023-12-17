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
                            <button class="btn btn-pill btn-primary btn-air-primary open_modal_with_this" type="button"
                                data-bs-toggle="modal" data-bs-target="#planModal">Add New Plan</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display" id="planTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Price</th>
<<<<<<< HEAD
                                            <th>User Limit</th>
=======
>>>>>>> 9e5dc74 (Initial server setup)
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
<<<<<<< HEAD
=======

>>>>>>> 9e5dc74 (Initial server setup)
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="planModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Plan</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <form class="form-bookmark needs-validation modal_form" method="post" id="modal_form" novalidate="">
                        <input type="hidden" name="this_data_id" id="this_data_id">
<<<<<<< HEAD
                        <div class="row mt-3">
                            <div class="form-group col-md-6 mb-1">
                                <div class="fname focused">
                                    <label for="plan_name">Plan Name</label>
                                    <div class="fvalue">
                                        <input
                                            class="form-control"
                                            name="name"
                                            id="plan_name"
                                            type="text"
                                            required=""
                                            autocomplete="off"
                                        >
                                    </div>
                                    <span class="text-danger" id="error_plan_name"></span>
                                </div>
                            </div>
                            <div class="form-group col-md-6 mb-1">
                                <div class="fname focused">
                                    <label for="plan_price">Price</label>
                                    <div class="fvalue">
                                        <input
                                            class="form-control"
                                            name="price"
                                            id="plan_price"
                                            type="text"
                                            required=""
                                            autocomplete="off"
                                        >
                                    </div>
                                    <span class="text-danger" id="error_plan_price"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="form-group col-md-6 mb-1">
                                <div class="fname focused">
                                    <label for="user_limit">User Limit</label>
                                    <div class="fvalue">
                                        <input
                                            class="form-control"
                                            name="user_limit"
                                            id="user_limit"
                                            type="text"
                                            required=""
                                            autocomplete="off"
                                        >
                                    </div>
                                    <span class="text-danger" id="error_plan_user_limit"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 mt-3 m-b-20">
                            <button onclick=addFeature() class="btn btn-pill btn-primary" type="button">Add Feature</button>
                        </div>
                        <div class="mb-4" id="feature-container">
=======
                        <div class="row">
                            <div class="form-group col-md-5 m-b-20">
                                <input class="form-control" name="name" id="plan_name" type="text" placeholder="Name"
                                    required="" autocomplete="off">
                            </div>
                            <div class="form-group col-md-5 m-b-20">
                                <input class="form-control" name="price" id="plan_price" type="text"
                                    placeholder="Price" required="" autocomplete="off">
                            </div>
                            <div class="col-md-5 m-b-20">
                                <button onclick=addFeature() class="btn btn-pill btn-primary" type="button">Add
                                    Feature</button>
                            </div>
                            <div class="" id="feature-container">

                            </div>
>>>>>>> 9e5dc74 (Initial server setup)
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
<<<<<<< HEAD
                    $('#user_limit').val(dataa.user_limit);
=======
>>>>>>> 9e5dc74 (Initial server setup)
                    if (featurestring != '') {
                        features = featurestring.split('_---_')
                        $('#feature-container').html('');
                        features.forEach(element => {
<<<<<<< HEAD
                            inp = `<div class="row mt-2"><div class="form-group col-md-6 mb-1">
                                <div class="fname">
                                    <div class="fvalue">
                                        <input
                                            class="form-control"
                                            name="features[]"
                                            type="text"
                                            required=""
                                            value="${element}"
                                            autocomplete="off"
                                        >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <button onclick=deletethis(this) class="btn btn-danger" type="button">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div></div>`;
                            $('#feature-container').append(inp);
=======
                            inp = '<div class="row"> <div class="col-md-6 m-b-20">' +
                                '<input class="form-control" name="features[]" value="' + element +
                                '" type="text"   placeholder="Feature" required=""  autocomplete="off">' +
                                '<button  onclick=deletethis(this) class="btn-sm btn-pill btn-danger" type="button"><i class="fa fa-trash"></i></button>' +
                                '</div> </div>';
                            $('#feature-container').append(inp)
>>>>>>> 9e5dc74 (Initial server setup)
                        });
                    }
                    $('#planModal').modal('show');
                }
            });
        }

        function deletethis(params) {
<<<<<<< HEAD
            $(params).parent().parent().remove();
        }

        function addFeature() {
            inp = `<div class="row mt-2"><div class="form-group col-md-6 mb-1">
                <div class="fname">
                    <div class="fvalue">
                        <input
                            class="form-control"
                            name="features[]"
                            type="text"
                            required=""
                            value=""
                            autocomplete="off"
                        >
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <button onclick=deletethis(this) class="btn btn-danger" type="button">
                    <i class="fa fa-trash"></i>
                </button>
            </div></div>`;
=======
            $(params).parent().remove();
        }

        function addFeature() {
            inp = '<div class="form-group col-md-6 m-b-20">' +
                '<input class="form-control" name="features[]"  type="text" placeholder="Feature" required=""  autocomplete="off">' +
                '<button  onclick=deletethis(this) class="btn btn-pill btn-danger" type="button">Delete</button>' +
                '</div>';
>>>>>>> 9e5dc74 (Initial server setup)
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
<<<<<<< HEAD
                        data: 'user_limit',
                        name: 'user_limit'
                    },
                    {
=======
>>>>>>> 9e5dc74 (Initial server setup)
                        data: 'Actions',
                        name: 'Actions'
                    },
                ]
            });

            $(document).on('click', '#savePlan', function(e) {
                e.preventDefault();
<<<<<<< HEAD
                
                let name = $('#plan_name').val();
                let price = $('#plan_price').val();
                let limit = $('#user_limit').val();

                $('#error_plan_name').text("");
                $('#error_plan_price').text("");
                $('#error_plan_user_limit').text("");

                let valid = true;

                if(name == '') {
                    $('#error_plan_name').text("Plan name is required.");
                    valid = false;
                }

                if(price == '') {
                    $('#error_plan_price').text("Price is required.");
                    valid = false;
                }

                if(limit == '') {
                    $('#error_plan_user_limit').text("User limit is required.");
                    valid = false;
                }

                if(!valid) {
                    return;
                }

=======
>>>>>>> 9e5dc74 (Initial server setup)
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
<<<<<<< HEAD
                        user_limit: $('#user_limit').val(),
=======
>>>>>>> 9e5dc74 (Initial server setup)
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
