@extends('superadmin.layouts.superapp')
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
                        <h5 class="mb-3">List of Village</h5>

                        <button class="btn custom-icon-theme-button open_modal_with_this" type="button"
                                data-bs-toggle="modal" data-bs-target="#villageModal"><i class="fa fa-plus"></i></button>

                        <button class="btn delete_table_row ms-3" style="display: none;background-color:red;border-radius:5px;color:white;"
                                onclick="deleteTableRow()" type="button"><i class="fa fa-trash"></i></button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="villageTable">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="form-check form-check-inline checkbox checkbox-dark mb-0 me-0">
                                                <input class="form-check-input" id="select_all_checkbox" name="selectrows" type="checkbox">
                                                <label class="form-check-label" for="select_all_checkbox"></label>
                                            </div>
                                        </th>

                                        <th>Village</th>
                                        <th>Taluka</th>
                                        <th>District</th>
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
    <div class="modal fade" id="villageModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Village</h5>
                    <button class="btn-close bg-light" type="button" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <form class="form-bookmark needs-validation " method="post" id="modal_form" novalidate="">
                        <div class="form-row">
                            <div class="form-group col-md-5 d-inline-block m-b-20">
                                <label class="mb-0">District</label>
                                <select id="district_id">
                                    <option value="">District</option>
                                    @foreach ($districts as $distrct)
                                    <option value="{{ $distrct['id'] }}">{{ $distrct['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-5 d-inline-block m-b-20">
                                <label class="mb-0">Taluka</label>
                                <select id="taluka_id">
                                    <option value="">Taluka</option>
                                    @foreach ($talukas as $taluka)
                                    <option value="{{ $taluka['id'] }}">{{ $taluka['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="this_data_id" id="this_data_id">
                            <div class="form-group col-md-5 d-inline-block m-b-20">
                                <div class="fname" id="village_name_lable">
                                    <label for="village_name">Village Name</label>

                                    <div class="fvalue"><input class="form-control" name="village_name" id="village_name" type="text" required="" autocomplete="off" data-bs-original-title="" title=""></div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn custom-theme-button" id="saveVillage">Save</button>
                            <button class="btn btn-primary ms-3" style="border-radius: 5px;" type="button" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @php
    $taluka_encoded = json_encode($talukas);
    $distrct_encoded = json_encode($districts);
    @endphp

    @endsection
    @push('scripts')
    <script>
        var shouldchangecity = 1;

        $(document).ready(function() {

            var cities = @Json($taluka_encoded);
            var states = @Json($distrct_encoded);

            $("select").each(function(index) {
                $(this).select2()
            })

            $(document).on('change', '#district_id', function(e) {
                if (shouldchangecity) {
                    $('#taluka_id').select2('destroy');
                    citiesar = JSON.parse(cities);
                    $('#taluka_id').html('');
                    for (let i = 0; i < citiesar.length; i++) {
                        if (citiesar[i]['district_id'] == $("#district_id").val()) {
                            $('#taluka_id').append('<option value="' + citiesar[i]['id'] + '">' + citiesar[i][
                                'name'
                            ] + '</option>')
                        }
                    }
                    $('#taluka_id').select2();
                }
            })

            var queryString = window.location.search;
            var urlParams = new URLSearchParams(queryString);
            var go_data_id = urlParams.get('data_id')


            $('#villageTable').DataTable({
                processing: true,
                serverSide: true,
                ordering: true,
                ajax: {
                    url: "{{ route('superadmin.settings.village') }}",
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
                        data: 'taluka',
                        name: 'taluka'
                    },
                    {
                        data: 'district',
                        name: 'district'
                    },
                    {
                        data: 'Actions',
                        name: 'Actions',
                        orderable: false
                    },
                ]
            });
        });

        function getVillage(data) {
            $('#modal_form').trigger("reset");
            var id = $(data).attr('data-id');
            $.ajax({
                type: "POST",
                url: "{{ route('superadmin.settings.getvillage') }}",
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    data = JSON.parse(data)
                    $('#this_data_id').val(data.id)
                    $('#village_name').val(data.name)
                    $('#taluka_id').val(data.super_taluka_id).trigger('change');
                    $('#district_id').val(data.district_id).trigger('change');

                    document.getElementById('village_name_lable').classList.add('focused');
                    $('#villageModal').modal('show');
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
                                $('#villageTable').DataTable().draw();
                            }
                        });
                    }
                })
            }
        }


        function deleteVillage(data) {
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
                        url: "{{ route('superadmin.settings.deletevillage') }}",
                        data: {
                            id: id,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            $('#villageTable').DataTable().draw();
                        }
                    });
                }
            })

        }

        $(document).on('click', '#saveVillage', function(e) {
            e.preventDefault();
            $("#modal_form").validate();
            if (!$("#modal_form").valid()) {
                return
            }
            var id = $('#this_data_id').val()
            $.ajax({
                type: "POST",
                url: "{{ route('superadmin.settings.saveVillage') }}",
                data: {
                    id: id,
                    name: $('#village_name').val(),
                    super_taluka_id: $('#taluka_id').val(),
                    district_id: $('#district_id').val(),
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    $('#villageTable').DataTable().draw();
                    $('#villageModal').modal('hide');
                    $('#saveVillage').prop('disabled', false);
                }
            });
        })
    </script>
    @endpush
