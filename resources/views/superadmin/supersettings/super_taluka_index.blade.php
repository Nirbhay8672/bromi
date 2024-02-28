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
                        <h5 class="mb-3">List of Talukas</h5>

                        <button class="btn custom-icon-theme-button open_modal_with_this" type="button"
                                data-bs-toggle="modal" data-bs-target="#talukaModal"><i class="fa fa-plus"></i></button>

                        <button class="btn delete_table_row ms-3" style="display: none;background-color:red;border-radius:5px;color:white;"
                                onclick="deleteTableRow()" type="button"><i class="fa fa-trash"></i></button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="talukaTable">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="form-check form-check-inline checkbox checkbox-dark mb-0 me-0">
                                                <input class="form-check-input" id="select_all_checkbox" name="selectrows" type="checkbox">
                                                <label class="form-check-label" for="select_all_checkbox"></label>
                                            </div>
                                        </th>
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
    <div class="modal fade" id="talukaModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Taluka</h5>
                    <button class="btn-close bg-light" type="button" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <form class="form-bookmark needs-validation modal_form" method="post" id="modal_form" novalidate="">
                        <div class="form-row">
                            <div class="form-group col-md-7 d-inline-block m-b-20">
                                <label>Taluka</label>
                                <input class="form-control" name="taluka_name" id="taluka_name" type="text" required="" autocomplete="off">
                            </div>
                            <div class="form-group col-md-4 d-inline-block m-b-4 mt-1">
                                <label class="mb-0">District</label>
                                <select class="form-select" id="district_id" required="">
                                    <option value="">District</option>
                                    @forelse ($districts as $district)
                                    <option value="{{ $district->id }}">{{ $district->name }}
                                        @empty
                                        @endforelse
                                </select>
                            </div>
                            <input type="hidden" name="this_data_id" id="this_data_id">
                        </div>
                        <div class="text-center">
                            <button class="btn custom-theme-button" id="saveTaluka">Save</button>
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
        $(document).ready(function() {
            $('#talukaTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('superadmin.settings.taluka') }}",
                columns: [{
                        data: 'select_checkbox',
                        name: 'select_checkbox',
                        orderable: false
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'district_id',
                        name: 'district_id',
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
                }],
            });
        });

        function getCity(data) {
            $('#modal_form').trigger("reset");
            var id = $(data).attr('data-id');
            $.ajax({
                type: "POST",
                url: "{{ route('superadmin.settings.talukaDetails') }}",
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    data = JSON.parse(data)
                    $('#this_data_id').val(data.id)
                    $('#taluka_name').val(data.name).trigger('change');
                    $('#district_id').val(data.district_id).trigger('change');
                    $('#talukaModal').modal('show');
                    triggerChangeinput()
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
                            url: "{{ route('superadmin.settings.deletetaluka') }}",
                            data: {
                                allids: JSON.stringify(rowss),
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(data) {
                                $('#talukaTable').DataTable().draw();
                            }
                        });
                    }
                })
            }
        }


        function deleteTaluka(data) {
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
                        url: "{{ route('superadmin.settings.deletetaluka') }}",
                        data: {
                            id: id,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            $('#talukaTable').DataTable().draw();
                        }
                    });
                }
            })
        }

        $(document).on('click', '#saveTaluka', function(e) {
            e.preventDefault();
            $("#modal_form").validate();
            if (!$("#modal_form").valid()) {
                return
            }
            $(this).prop('disabled', true);
            var id = $('#this_data_id').val()
            $.ajax({
                type: "POST",
                url: "{{ route('superadmin.settings.savetaluka') }}",
                data: {
                    id: id,
                    name: $('#taluka_name').val(),
                    district_id: $('#district_id').val(),
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    $('#talukaTable').DataTable().draw();
                    $('#talukaModal').modal('hide');
                    $('#saveTaluka').prop('disabled', false);
                }
            });
        })
    </script>
    @endpush
