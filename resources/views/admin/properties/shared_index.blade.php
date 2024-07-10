@extends('admin.layouts.app')
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
                            <h5 class="mb-3">Shared Properties</h5>
                            <div class="row">
                            @include('admin.properties.change_menu')
                            <div class="col">
                                <button class="btn ms-3 custom-icon-theme-button tooltip-btn" type="button"
                                    data-bs-toggle="modal" data-bs-target="#filtermodal" data-tooltip="Filter"><i
                                        class="fa fa-filter"></i></button>

                                <button class="btn ms-3 custom-icon-theme-button"
                                    style="background-color: #FF0000 !important;display: none; " type="button"
                                    data-tooltip="Clear Filter" id="resetfilter"><i class="fa fa-refresh"></i></button>
                            </div>
                            </div>

                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="display" id="propertyTable">
                                    <thead>
                                        <tr>
                                            <th>Project Name</th>
                                            <th>Property info</th>
                                            <th>Price</th>
                                            <th>Contact</th>
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
        <div class="modal fade" id="filtermodal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
                        <button class="btn-close btn-light" type="button" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-bookmark needs-validation " method="post" id="filter_form" novalidate="">
                            @csrf
                            <div>
                                <div class="row">
                                    <div class="form-group col-md-2 m-b-4 mb-3">
                                        <select class="form-select" id="filter_property_for">
                                            <option value="">Property For</option>
                                            <option value="Rent">Rent</option>
                                            <option value="Sell">Sell</option>
                                            <option value="Both">Both</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2 m-b-4 mb-3">
                                        <select class="form-select" id="filter_property_type">
                                            <option value="">Property Type</option>
                                            @forelse ($property_configuration_settings as $props)
                                                @if ($props['dropdown_for'] == 'property_construction_type' && in_array($props['id'], $prop_type))
                                                    <option data-parent_id="{{ $props['parent_id'] }}"
                                                        value="{{ $props['id'] }}">{{ $props['name'] }}
                                                    </option>
                                                @endif
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                    {{-- Villa --}}
                                    <div class="form-group col-md-2 m-b-4 mb-3">
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


                                    <div class="form-group col-md-2 m-b-4 mb-3">
                                        <select class="form-select" id="filter_configuration">
                                            <option value="">Sub Category</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-2 m-b-4 mb-3">
                                        <label class="select2_label" for="Select Project"> Project</label>
                                        <select class="form-select" id="filter_building_id" multiple>
                                            @foreach ($projects as $building)
                                                <option value="{{ $building->id }}">{{ $building->project_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2 m-b-4 mb-3">
                                        <label class="select2_label" for="Select Area"> Locality</label>
                                        <select class="form-select" id="filter_area_id" multiple>
                                            @foreach ($areas as $area)
                                                <option value="{{ $area->id }}">{{ $area->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-2 m-b-4 mb-3">
                                        <div>
                                            <label for="From Price">From Price</label>
                                            <input class="form-control indian_currency_amount" name="filter_from_price"
                                                id="filter_from_price" type="text" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2 mb-3">
                                        <div>
                                            <label for="To Price">To Price</label>
                                            <input class="form-control indian_currency_amount" name="filter_to_price"
                                                id="filter_to_price" type="text" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2 m-b-20">
                                        <label for="From Area">From Area</label>
                                        <input class="form-control" name="filter_from_area" id="filter_from_area"
                                            type="text" autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-2 m-b-20">
                                        <label for="To Area">To Area</label>
                                        <input class="form-control" name="filter_to_area" id="filter_to_area"
                                            type="text" autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-2 m-b-4 mb-3">
                                        <label for="From Date">From Date</label>
                                        <div class="input-group">
                                            <input class="form-control " id="filter_from_date" type="date"
                                                data-language="en">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2 m-b-4 mb-3">
                                        <label for="To Date">To Date</label>
                                        <div class="input-group">
                                            <input class="form-control " id="filter_to_date" type="date"
                                                data-language="en">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn custom-theme-button" id="filtersearch">Filter</button>
                                <button class="btn btn-primary ms-3" style="border-radius: 5px;" type="button"
                                    data-bs-dismiss="modal">Cancel</button>
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

                $(document).on('click', '.showNumberNow', function(e) {
                    numb = $(this).attr('data-val');
                    $(this).replaceWith('<a href="tel:' + numb + '">' + numb + '</a>');
                })

                $('#propertyTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ordering: true,
                    @if (!Auth::user()->can('search-property'))
                        searching: false,
                    @endif
                    ajax: {
                        url: "{{ route('admin.shared.properties') }}",
                        data: function(d) {
                            d.filter_property_for = $('#filter_property_for').val();
                            d.filter_property_type = $('#filter_property_type').val();
                            d.filter_specific_type = $('#filter_specific_type').val();
                            d.filter_configuration = $('#filter_configuration').val();
                            d.filter_building_id = $('#filter_building_id').val();
                            d.filter_area_id = $('#filter_area_id').val();
                            d.filter_availability_status = $('#filter_availability_status').val();
                            d.filter_owner_is = $('#filter_owner_is').val();
                            d.filter_Property_priority = $('#filter_Property_priority').val();
                            d.filter_property_status = $('#filter_property_status').val();
                            d.filter_from_date = $('#filter_from_date').val();
                            d.filter_to_date = $('#filter_to_date').val();
                            d.filter_from_price = $('#filter_from_price').val();
                            d.filter_to_price = $('#filter_to_price').val();
                            d.filter_from_area = $('#filter_from_area').val();
                            d.filter_to_area = $('#filter_to_area').val();
                            d.filter_measurement = $('#filter_measurement').val();
                            d.filter_is_preleased = Number($('#filter_is_preleased').prop('checked'));
                            d.search_enq = search_enq;
                            d.match_property_type = Number($('#match_property_type').prop('checked'));
                            d.match_specific_type = Number($('#match_specific_type').prop('checked'));
                            d.match_specific_sub_type = Number($('#match_specific_sub_type').prop(
                                'checked'));
                            d.match_enquiry_for = Number($('#match_enquiry_for').prop('checked'));
                            d.match_budget_from_type = Number($('#match_budget_from_type').prop('checked'));
                            d.match_enquiry_size = Number($('#match_enquiry_size').prop('checked'));
                            d.match_inquiry_source = Number($('#match_inquiry_source').prop('checked'));
                            // d.match_building = Number($('#match_building').prop('checked'));
                            d.filter_by = filter_by;
                            d.location = window.location.href;
                        },
                    },
                    columns: [{
                            data: 'project_name',
                            name: 'project_name'
                        },
                        {
                            data: 'super_builtup_area',
                            name: 'super_builtup_area'
                        },
                        {
                            data: 'price',
                            name: 'price'
                        },
                        {
                            data: 'contact_name',
                            name: 'contact_name'
                        }
                    ],
                    columnDefs: [{
                            "width": "18%",
                            "targets": 0
                        },
                        {
                            "width": "18%",
                            "targets": 1
                        },
                        {
                            "width": "10%",
                            "targets": 2
                        },
                        {
                            "width": "15%",
                            "targets": 3
                        },
                    ],
                });
            });
        </script>
    @endpush
