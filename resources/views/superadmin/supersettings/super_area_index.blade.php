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
                            <h5 class="mb-3">List of Locality</h5>
                            <button class="btn btn-primary btn-air-primary open_modal_with_this" type="button"
                                data-bs-toggle="modal" data-bs-target="#areaModal">Add New Locality</button>

                            <button class="btn btn-primary btn-air-primary delete_table_row" style="display: none"
                                onclick="deleteTableRow()" type="button">Delete</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display" id="areaTable">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="form-check form-check-inline checkbox checkbox-dark mb-0 me-0">
                                                    <input class="form-check-input" id="select_all_checkbox"
                                                        name="selectrows" type="checkbox">
                                                    <label class="form-check-label" for="select_all_checkbox"></label>
                                                </div>
                                            </th>

                                            <th>Locality</th>
                                            <th>City</th>
                                            <th>Pincode</th>
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
        <div class="modal fade" id="areaModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Locality</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"> </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-bookmark needs-validation " method="post" id="modal_form" novalidate="">
                            <div class="form-row">
                                <div class="form-group col-md-5 d-inline-block m-b-20">
                                    <label class="mb-0">State</label>
                                    <select id="state_id">
                                        <option value=""> State</option>
                                        @foreach ($states as $state)
                                            <option value="{{ $state['id'] }}">{{ $state['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-5 d-inline-block m-b-20">
                                    <label class="mb-0">City</label>
                                    <select id="city_id">
                                        <option value=""> City</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city['id'] }}">{{ $city['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" name="this_data_id" id="this_data_id">
                                <div class="form-group col-md-5 d-inline-block m-b-20">
                                    <label for="area_name">Locality Name</label>
                                    <input class="form-control" name="test_name" id="area_name" type="text"
                                        required="" autocomplete="off">
                                </div>
                                <div class="form-group col-md-3 d-inline-block m-b-20">
                                    <label for="pincode">Pincode</label>
                                    <input class="form-control" name="pincode" id="pincode" type="text"
                                        autocomplete="off">
                                </div>



                            </div>
                            <button class="btn btn-secondary" type="button" id="saveArea">Save</button>
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

            $(document).ready(function() {

                var cities = @Json($city_encoded);
                var states = @Json($state_encoded);

				$("select").each(function(index) {
					$(this).select2()
				})

                $(document).on('change', '#state_id', function(e) {
                    if (shouldchangecity) {
                        $('#city_id').select2('destroy');
                        citiesar = JSON.parse(cities);
                        $('#city_id').html('');
                        for (let i = 0; i < citiesar.length; i++) {
                            if (citiesar[i]['state_id'] == $("#state_id").val()) {
                                $('#city_id').append('<option value="' + citiesar[i]['id'] + '">' + citiesar[i][
                                    'name'
                                ] + '</option>')
                            }
                        }
                        $('#city_id').select2();
                    }
                })

                var queryString = window.location.search;
                var urlParams = new URLSearchParams(queryString);
                var go_data_id = urlParams.get('data_id')


                $('#areaTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ordering: true,
                    ajax: {
                        url: "{{ route('superadmin.settings.area') }}",
                        data: function(d) {
                            d.go_data_id = go_data_id;
                        },
                    },
                    columns: [{
                            data: 'select_checkbox',
                            name: 'select_checkbox',
                            orderable: false
                        }, {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'city',
                            name: 'city'
                        },
                        {
                            data: 'pincode',
                            name: 'pincode'
                        },
                        {
                            data: 'state',
                            name: 'state'
                        },
                        {
                            data: 'Actions',
                            name: 'Actions',
                            orderable: false
                        },
                    ]
                });
            });

            function getArea(data) {
                $('#modal_form').trigger("reset");
                var id = $(data).attr('data-id');
                $.ajax({
                    type: "POST",
                    url: "{{ route('superadmin.settings.getarea') }}",
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        data = JSON.parse(data)
                        $('#this_data_id').val(data.id)
                        $('#area_name').val(data.name)
                        $('#pincode').val(data.pincode)
                        $('#city_id').val(data.super_city_id).trigger('change');
                        $('#state_id').val(data.state_id).trigger('change');
                            $('#areaModal').modal('show');

                    }
                });
            }


            $(document).on('change', '#select_all_checkbox', function(e) {
                if ($(this).prop('checked')) {
                    $('.delete_table_row').show();

                    $(".table_checkbox").each(function(index) {
                        $(this).prop('checked', true)
                    })
                } else {
                    $('.delete_table_row').hide();
                    $(".table_checkbox").each(function(index) {
                        $(this).prop('checked', false)
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
                } else {
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
                if (rowss.length > 0) {
                    Swal.fire({
                        title: "Are you sure?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: 'Yes',
                    }).then(function(isConfirm) {
                        if (isConfirm.isConfirmed) {
                            $.ajax({
                                type: "POST",
                                url: "{{ route('superadmin.settings.deletearea') }}",
                                data: {
                                    allids: JSON.stringify(rowss),
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function(data) {
                                    $('.delete_table_row').hide();
                                    $('#areaTable').DataTable().draw();
                                }
                            });
                        }
                    })
                }
            }


            function deleteArea(data) {
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
                            url: "{{ route('superadmin.settings.deletearea') }}",
                            data: {
                                id: id,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(data) {
                                $('#areaTable').DataTable().draw();
                            }
                        });
                    }
                })

            }

            $(document).on('click', '#saveArea', function(e) {
                e.preventDefault();
                $("#modal_form").validate();
                if (!$("#modal_form").valid()) {
                    return
                }
                $(this).prop('disabled', true);
                var id = $('#this_data_id').val()
                $.ajax({
                    type: "POST",
                    url: "{{ route('superadmin.settings.savearea') }}",
                    data: {
                        id: id,
                        name: $('#area_name').val(),
                        super_city_id: $('#city_id').val(),
                        pincode: $('#pincode').val(),
                        state_id: $('#state_id').val(),
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        $('#areaTable').DataTable().draw();
                        $('#areaModal').modal('hide');
                        $('#saveArea').prop('disabled', false);
                    }
                });
            })
        </script>
    @endpush
