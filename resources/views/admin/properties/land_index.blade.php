@extends('admin.layouts.app')
@section('content')
    @php
        $is_dynamic_form = true;
    @endphp
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
                            <h5 class="mb-3">Land Properties</h5>
                            <div class="row">
                                @include('admin.properties.change_menu')
                                <div class="col-md-8">
                                    <a class="btn btn-primary btn-air-primary" href="{{ route('admin.property.add') }}">Add
                                        Property</a>
                                    <button class="btn btn-primary btn-air-primary" type="button" data-bs-toggle="modal"
                                        data-bs-target="#filtermodal">Filter</button>
                                    <button style="display:none" class="btn btn-primary btn-air-primary"
                                        id="resetfilter">Clear
                                        Filter</button>
                                    <button class="btn btn-primary btn-air-primary delete_table_row" style="display: none"
                                        onclick="deleteTableRow()" type="button">Delete</button>
                                </div>
                            </div>
                            
                        </div>

                        <div class="card-body">
                                <div class="table-responsive">
                                    <table class="display" id="propertyTable">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div
                                                        class="form-check form-check-inline checkbox checkbox-dark mb-0 me-0">
                                                        <input class="form-check-input" id="select_all_checkbox"
                                                            name="selectrows" type="checkbox">
                                                        <label class="form-check-label" for="select_all_checkbox"></label>
                                                    </div>
                                                </th>
                                                <th>Project / Village</th>
                                                <th>Property Info</th>
                                                <th>Unit</th>
                                                <th>Price</th>
                                                <th>Details</th>
                                                <th>Remarks</th>
                                                <th>Contacts</th>
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
            <div class="modal fade" id="landpropertyModal" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Land Property</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"> </button>
                        </div>
                        <div class="modal-body">
                            @include('admin.properties.add_land_property_form')
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="filtermodal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"> </button>
                        </div>
                        <div class="modal-body">
                            <form class="form-bookmark needs-validation " method="post" id="filter_form" novalidate="">
                                @csrf
                                <div>
                                    <div class="row">
                                        <div class="form-group col-md-3 m-b-4 mb-3">
                                            <select class="form-select" id="filter_property_for">
                                                <option value="">Property For</option>
                                                <option value="Rent">Rent</option>
                                                <option value="Sell">Sell</option>
                                                <option value="Both">Both</option>
                                            </select>
                                        </div>
                                    {{-- @dd($property_configuration_settings); --}}

                                        <div class="form-group col-md-3 m-b-4 mb-3">
                                            <select class="form-select" id="filter_property_type">
                                                <option value="">Property Type</option>
                                                @forelse ($property_configuration_settings as $props)
                                                    @if ($props['dropdown_for'] == 'property_construction_type' && in_array($props['id'], $prop_type))
                                                        <option data-parent_id="{{ $props['parent_id'] }}"
                                                            value="{{ $props['id'] }}">{{ $props['name'] }}
                                                        </option>
                                                        {{-- @dd($props['name']); --}}
                                                    @endif
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                        {{-- Villa --}}
                                        <div class="form-group col-md-3 m-b-4 mb-3">
                                            <select class="form-select" id="filter_specific_type">
                                                <option value="">Category</option>
                                                @forelse ($property_configuration_settings as $props)
                                                    @if ($props['dropdown_for'] == 'property_specific_type' && in_array($props['parent_id'], $prop_type))
                                                        <option data-parent_id="{{ $props['parent_id'] }}"
                                                            value="{{ $props['id'] }}">{{ $props['name'] }}</option>
                                                    @endif
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                        {{-- Sub Category --}}
                                        <div class="form-group col-md-3 m-b-4 mb-3">
                                            <select class="form-select" id="filter_configuration">
                                                <option value="">Sub Category</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4 m-b-4 mb-3">
                                            <select class="form-select" id="filter_district_id">
                                                <option value=""> District</option>
                                                @foreach ($districts as $disctrict)
                                                    <option value="{{ $disctrict->id }}">{{ $disctrict->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4 m-b-4 mb-3">
                                            <select class="form-select" id="filter_taluka_id">
                                                <option value=""> Taluka</option>
                                                @foreach ($talukas as $taluka)
                                                    <option data-parent_id="{{ $taluka->district_id }}"
                                                        value="{{ $taluka->id }}">{{ $taluka->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4 m-b-4 mb-3">
                                            <select class="form-select" id="filter_village_id">
                                                <option value=""> Village</option>
                                                @foreach ($villages as $village)
                                                    <option data-parent_id="{{ $village->taluka_id }}"
                                                        value="{{ $village->id }}">{{ $village->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {{-- <div class="form-group col-md-3 m-b-4 mb-3">
                                            <select class="form-select" id="filter_status">
                                                <option value=""> Status</option>
                                                <option value="1">Available</option>
                                                <option value="2">Sold Out</option>
                                            </select>
                                        </div> --}}

                                    </div>
                                </div>
                                <button class="btn btn-secondary" id="filtersearch">Filter</button>
                                <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
        @push('scripts')
            @include('admin.properties.land_form_javascript')
            <script>
                $(document).on('change', '#filter_property_type', function(e) {
                    var parent_value = $(this).val();
                    console.log("type changed", parent_value);
                    $("#filter_specific_type option , #filter_configuration option").each(function() {
                        if (parent_value !== '') {
                            if ($(this).attr('value') != '') {
                                if ($(this).attr('data-parent_id') == '' || $(this).attr('data-parent_id') !=
                                    parent_value) {
                                    $(this).hide();
                                } else {
                                    $(this).show();
                                }
                            }
                        } else {
                            $(this).show();
                        }
                    });
                });

                // category to sub category on change filter
                $('#filter_specific_type').on('change', function() {
                    let selectedCategory = this.options[this.selectedIndex].text.trim();
                    let url = "{{ route('admin.getPropertyConfiguration') }}";

                    try {
                        var xhr = new XMLHttpRequest();
                        xhr.open("GET", `${url}?selectedCategory=${encodeURIComponent(selectedCategory)}`, true);

                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === XMLHttpRequest.DONE) {
                                if (xhr.status === 200) {
                                    var data = JSON.parse(xhr.responseText);
                                    console.log("Subcat Filter data == ", data);

                                    var subCategorySelect = document.getElementById('filter_configuration');
                                    subCategorySelect.innerHTML = '<option value="">Sub Category</option>';

                                    for (var key in data) {
                                        if (data.hasOwnProperty(key)) {
                                            var option = document.createElement('option');
                                            option.value = key;
                                            option.text = data[key];
                                            option.dataset.category = data[key];
                                            subCategorySelect.appendChild(option);
                                        }
                                    }
                                } else {
                                    console.error("An error occurred:", xhr.statusText);
                                }
                            }
                        };

                        xhr.send();
                    } catch (error) {
                        console.error("An error occurred:", error);
                    }
                });

                var land_image_show_url = "{{ asset('upload/land_images') }}";

                $(document).ready(function() {
                    $('#propertyTable').DataTable({
                        processing: true,
                        serverSide: true,
                        @if (!Auth::user()->can('search-land-property'))
                            searching: false,
                        @endif
                        ordering: true,
                        ajax: {
                            url: "{{ route('admin.land.properties') }}",
                            data: function(d) {
                                d.filter_property_for = $('#filter_property_for').val();
                                d.filter_property_type = $('#filter_property_type').val();
                                d.filter_specific_type = $('#filter_specific_type').val();
                                d.filter_district_id = $('#filter_district_id').val();
                                d.filter_configuration = $('#filter_configuration').val();
                                d.filter_taluka_id = $('#filter_taluka_id').val();
                                d.filter_village_id = $('#filter_village_id').val();
                                // d.filter_status = $('#filter_status').val();
                            },
                        },
                        columns: [{
                                data: 'select_checkbox',
                                name: 'select_checkbox',
                                orderable: false
                            },
                            {
                                data: 'project_id',
                                name: 'project_id'
                            },
                            {
                                data: 'property_category',
                                name: 'property_category'
                            },
                            {
                                data: 'unit_details',
                                name: 'unit_details'
                            },
                            {
                                data: 'price',
                                name: 'price'
                            },
                            {
                                data: 'details',
                                name: 'details'
                            },
                            {
                                data: 'remarks',
                                name: 'remarks'
                            },
                            {
                                data: 'contact_details',
                                name: 'contact_details'
                            },
                            {
                                data: 'actions',
                                name: 'actions',
                                orderable: false
                            },
                        ]
                    });
                });

                $(document).on('click', '.showNumberNow', function(e) {
                    numb = $(this).attr('data-val');
                    $(this).replaceWith('<a href="tel:' + numb + '">' + numb + '</a>');
                })

                $(document).on('click', '#filtersearch', function(e) {
                    e.preventDefault();
                    search_enq = '';
                    $('#resetfilter').show();
                    $('#propertyTable').DataTable().draw();
                    $('#filtermodal').modal('hide');
                });

                $(document).on('click', '#resetfilter', function(e) {
                    e.preventDefault();
                    $(this).hide();
                    $('#filter_form').trigger("reset");
                    $('#propertyTable').DataTable().draw();
                    $('#filtermodal').modal('hide');
                    triggerResetFilter()
                });

                function getProperty(data) {
                    $('#modal_form').trigger("reset");
                    var id = $(data).attr('data-id');
                    $.ajax({
                        type: "POST",
                        url: "{{ route('admin.land.getProperty') }}",
                        data: {
                            id: id,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            data = JSON.parse(data);
                            $('#this_data_id').val(data.id);
                            $('#specific_type').val(data.specific_type).trigger('change');
                            $('#district_id').val(data.district_id).trigger('change');
                            $('#taluka_id').val(data.taluka_id).trigger('change');
                            $('#village_id').val(data.village_id).trigger('change');
                            $('#zone').val(data.zone).trigger('change');
                            $('#fsi').val(data.fsi)
                            $('#configuration').val(data.configuration).trigger('change');
                            $('#survey_number').val(data.survey_number)
                            $('#plot_size').val(data.plot_size)
                            $('#plot_measurement').val(data.plot_measurement).trigger('change');
                            $('#price').val(data.price)
                            $('#tp_number').val(data.tp_number)
                            $('#fp_number').val(data.fp_number)
                            $('#plot2_size').val(data.plot2_size)
                            $('#plot2_measurement').val(data.plot2_measurement).trigger('change');
                            $('#price2').val(data.price2)
                            $('#address').val(data.address)
                            $('#remarks').val(data.remarks)
                            $('#status').val(data.status).trigger('change')
                            $('#location_url').val(data.location_url)
                            $('#property_source').val(data.property_source).trigger('change');
                            $('#refrence').val(data.refrence)
                            $('#owner_name').val(data.owner_name)
                            $('#owner_contact_no').val(data.owner_contact_no)
                            $('#owner_status').val(data.owner_status)
                            $('#all_owner_contacts').html('')
                            if (data.owner_details != '') {
                                details = JSON.parse(data.owner_details);
                                for (let i = 0; i < details.length; i++) {
                                    id = makeid(10);
                                    $('#all_owner_contacts').append(generate_contact_detail3(id))
                                    floatingField()
                                    $("[data-contact_id=" + id + "] select[name=owner_status]").select2()
                                    $("[data-contact_id=" + id + "] input[name=owner_name]").val(details[i][0]);
                                    $("[data-contact_id=" + id + "] input[name=owner_contact_no]").val(details[i][1]);
                                    $("[data-contact_id=" + id + "] select[name=owner_status]").val(details[i][2])
                                        .trigger('change');
                                }
                            }
                            $('#all_images').html('');
                            if (data.images != '') {
                                for (let i = 0; i < data.images.length; i++) {
                                    var src = land_image_show_url + '/' + data.images[i].image;
                                    $('#all_images').append('<div class="col-md-4 m-b-4 mb-3"><img src="' + src +
                                        '" alt="" height="200" width="200"></div>')
                                }

                            }
                            $('#landpropertyModal').modal('show');
                            triggerChangeinput()
                            floatingField()
                        }
                    });
                }

                $(document).on("click", ".open_modal_with_this", function(e) {
                    $('#all_owner_contacts').html('')
                    $('#all_images').html('');
                    $('#all_owner_contacts').append(generate_contact_detail3(makeid(10)));
                    $("#all_owner_contacts select").each(function(index) {
                        $(this).select2();
                    })
                    floatingField();
                })

                function deleteProperty(data) {
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
                                url: "{{ route('admin.deleteProperty') }}",
                                data: {
                                    id: id,
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function(data) {
                                    $('#propertyTable').DataTable().draw();
                                }
                            });
                        }
                    })

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
                                    url: "{{ route('admin.deleteProperty') }}",
                                    data: {
                                        allids: JSON.stringify(rowss),
                                        _token: '{{ csrf_token() }}'
                                    },
                                    success: function(data) {
                                        $('.delete_table_row').hide();
                                        $('#propertyTable').DataTable().draw();
                                    }
                                });
                            }
                        })
                    }
                }

                function floatingField() {
                    //changed by Subhash
                    $("form input").each(function(index) {
                        if ($(this).attr('type') == 'text' || $(this).attr('type') == 'email') {
                            var inputhtml = $(this).clone()
                            var parentId = $(this).parent();
                            if (parentId.find('label').length > 0) {
                                $(this).remove();
                                var currenthtml = $(parentId).html()
                                $(parentId).html('<div class="fname">' + currenthtml + '<div class="fvalue">' + inputhtml[0]
                                    .outerHTML + '</div>' + '</div>')
                            }
                        }
                    })

                    $("form select").each(function(index) {
                        var attrs = $(this).attr('multiple');
                        if (typeof attrs === 'undefined' || attrs === false) {
                            $(this).find('option:first').attr('selected', 'selected')
                            // $(this).find('option:first').attr('disabled', 'disabled')
                        }
                        $(this).select2();
                    })
                }
            </script>
        @endpush
