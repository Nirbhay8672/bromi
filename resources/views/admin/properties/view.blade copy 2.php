@php
    $type = isset($dropdowns[$property->property_category]['name']) ? $dropdowns[$property->property_category]['name'] : '';
@endphp
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
                            <h5 class="mb-3">View Property</h5>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row px-3">
                                <div class="col-sm-12">
                                    <ul class="nav nav-pills sticky-nav-menu-tab mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link mx-1 active" id="v-view-summary-tab"
                                                data-bs-toggle="pill" data-bs-target="#v-view-summary" type="button"
                                                role="tab" aria-controls="v-view-summary"
                                                aria-selected="true">Summary</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link mx-1" id="v-property-information-tab"
                                                data-bs-toggle="pill" data-bs-target="#v-property-information"
                                                type="button" role="tab" aria-controls="v-property-information"
                                                aria-selected="true">Information</button>
                                        </li>

                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link mx-1" id="v-property-price-tab" data-bs-toggle="pill"
                                                data-bs-target="#v-property-price" type="button" role="tab"
                                                aria-controls="v-property-price" aria-selected="true">Unit And
                                                Price</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link mx-1" id="v-property-owner-tab" data-bs-toggle="pill"
                                                data-bs-target="#v-property-owner" type="button" role="tab"
                                                aria-controls="v-property-owner" aria-selected="true">Contact
                                                Details</button>
                                        </li>

                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link mx-1" id="v-enquiry-matching-tab" data-bs-toggle="pill"
                                                data-bs-target="#v-enquiry-matching" type="button" role="tab"
                                                aria-controls="v-enquiry-matching" aria-selected="false">Matching
                                                Enquiry</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link mx-1" id="v-property-viewer-tab" data-bs-toggle="pill"
                                                data-bs-target="#v-property-viewer" type="button" role="tab"
                                                aria-controls="v-property-viewer" aria-selected="false">Enquiry Visits
                                                Logs</button>
                                        </li>
                                        <div class="row" style="display: contents;">
                                            <div class="col-md-1">
                                                <a href={{ URL::to('admin/Properties') }}>
                                                    <button class="nav-link mx-1 active"
                                                        id="v-view-summary-tab">Back</button>
                                                </a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="{{ URL::to('admin/property/edit/' . $property['id']) }}">
                                                    <button class="nav-link mx-1 active"
                                                        id="v-view-summary-tab">Edit</button>
                                                </a>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-2 align-self-center">
                                            <div class="input-group mb-3">
                                                <select class="form-select form-control" id="enquiry_progress_status">
                                                    <option value="">Property Progress</option>
                                                    <option value="active">Active</option>
                                                    <option value="inactive">Inactive</option>
                                                </select>
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary"
                                                        id="save_property_progress_status">Update</button>
                                                </div>
                                            </div>
                                        </div> --}}
										<div class="col-md-2 align-self-center">
											<form action="{{route('admin.updatePropertyStatus')}}" method="get">
												@csrf
												@method('post')
												<div class="input-group mb-3">
													<input type="text" hidden value="{{$property['id']}}" name="id">
													<select class="form-select form-control" id="enquiry_progress_status" name="status">
														<option value="">Property Progress</option>
														<option value="1">Active</option>
														<option value="0">Inactive</option>
													</select>
													<div class="input-group-append">
														<button class="btn btn-primary"
														type="submit">Update</button>
														{{-- <button class="btn btn-primary"
															id="save_enquiry_progress_status">Update</button> --}}
													</div>
												</div>
											</form>
										</div>
                                    </ul>


                                    <div class="tab-content mt-3" id="top-tabContent">
                                        <div class="tab-pane fade show active" id="v-view-summary" role="tabpanel"
                                            aria-labelledby="v-view-summary-tab">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <h5 class="border-style">Information</h5>
                                                        </div>
                                                        <div class="form-group col-4 m-b-10 data_conent_1">
                                                            <h6><b>Property For</b></h6>
                                                        </div>
                                                        <div class="form-group col-8 m-b-10 data_conent_1">
                                                            <div>:
                                                                {{ $property->property_for ? $property->property_for : '-' }}
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-4 m-b-10 data_conent_2">
                                                            <h6><b>Type</b></h6>
                                                        </div>
                                                        <div class="form-group col-8 m-b-10 data_conent_2">
                                                            <div>:
                                                                {{ isset($dropdowns[$property->property_type]['name']) ? $dropdowns[$property->property_type]['name'] : '' }}
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-4 m-b-10 data_conent_3">
                                                            <h6><b>Category</b></h6>
                                                        </div>
                                                        <div class="form-group col-8 m-b-10 data_conent_3">
                                                            <div>:
                                                                {{ isset($dropdowns[$property->property_category]['name']) ? $dropdowns[$property->property_category]['name'] : '' }}
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-4 m-b-10 data_conent_3">
                                                            <h6><b>Sub Category</b></h6>
                                                        </div>
                                                        <div class="form-group col-8 m-b-10 data_conent_3">
                                                            <div>:
                                                                {{ $configuration_name != null ? $configuration_name : '' }}
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-4 m-b-10 data_conent_4">
                                                            <h6><b>Project</b></h6>
                                                        </div>
                                                        <div class="form-group col-8 m-b-10 data_conent_4">
                                                            <div>:
                                                                {{ $property->Projects != null ? $property->Projects->project_name : '' }}
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-4 m-b-10 data_conent_5">
                                                            <h6><b>Projects Address</b></h6>
                                                        </div>
                                                        <div class="form-group col-8 m-b-10 data_conent_5">
                                                            <div>:
                                                                {{ isset($property->Projects->address) ? $property->Projects->address : '-' }}
                                                            </div>
                                                        </div>
														@if ($type == 'Office' || $type == 'Retail' || $type == 'Flat' || $type == 'Penthouse')
                                                            <div class="form-group col-4 m-b-10 data_conent_53">
                                                                <h6><b>Carpet Area</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_53">

                                                                <div>:
                                                                    @if (
                                                                        !empty(explode('_-||-_', $property->carpet_area)[0]) &&
                                                                            !empty($dropdowns[explode('_-||-_', $property->carpet_area)[1]]['name']))
                                                                        {{ explode('_-||-_', $property->carpet_area)[0] . ' ' . $dropdowns[explode('_-||-_', $property->carpet_area)[1]]['name'] }}
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if ($type == 'Office' || $type == 'Retail' || $type == 'Flat' || $type == 'Land/Plot' || $type == 'Penthouse')
                                                            <div class="form-group col-4 m-b-10 data_conent_54">
                                                                <h6><b>Salable Area</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_54">:

                                                                @if (
                                                                    !empty(explode('_-||-_', $property->salable_area)[0]) &&
                                                                        !empty($dropdowns[explode('_-||-_', $property->salable_area)[1]]['name']))
                                                                    {{ explode('_-||-_', $property->salable_area)[0] . ' ' . $dropdowns[explode('_-||-_', $property->salable_area)[1]]['name'] }}
                                                                @endif
                                                            </div>
                                                        @endif
                                                        @if ($type == 'Storage/industrial' || $type == 'Vila/Bunglow' || $type == 'Land/Plot' || $type == 'Farmhouse')
                                                            <div class="form-group col-4 m-b-10 data_conent_55">
                                                                <h6><b>Carpet Plot Area</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_55">:

                                                                @if (
                                                                    !empty(explode('_-||-_', $property->carpet_plot_area)[0]) &&
                                                                        !empty($dropdowns[explode('_-||-_', $property->carpet_plot_area)[1]]['name']))
                                                                    {{ explode('_-||-_', $property->carpet_plot_area)[0] . ' ' . $dropdowns[explode('_-||-_', $property->carpet_plot_area)[1]]['name'] }}
                                                                @endif
                                                            </div>
                                                        @endif
                                                        @if ($type == 'Storage/industrial' || $type == 'Vila/Bunglow' || $type == 'Farmhouse')
                                                            <div class="form-group col-4 m-b-10 data_conent_56">
                                                                <h6><b>Salable Plot Area</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_56">:

                                                                @if (
                                                                    !empty(explode('_-||-_', $property->salable_plot_area)[0]) &&
                                                                        !empty($dropdowns[explode('_-||-_', $property->salable_plot_area)[1]]['name']))
                                                                    {{ explode('_-||-_', $property->salable_plot_area)[0] . ' ' . $dropdowns[explode('_-||-_', $property->salable_plot_area)[1]]['name'] }}
                                                                @endif
                                                            </div>
                                                        @endif
                                                        @if ($type == 'Storage/industrial' || $type == 'Vila/Bunglow' || $type == 'Farmhouse')
                                                            <div class="form-group col-4 m-b-10 data_conent_57">
                                                                <h6><b>Constructed Salable Area</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_57">:

                                                                @if (
                                                                    !empty(explode('_-||-_', $property->constructed_salable_area)[0]) &&
                                                                        !empty($dropdowns[explode('_-||-_', $property->constructed_salable_area)[1]]['name']))
                                                                    {{ explode('_-||-_', $property->constructed_salable_area)[0] . ' ' . $dropdowns[explode('_-||-_', $property->constructed_salable_area)[1]]['name'] }}
                                                                @endif
                                                            </div>
                                                        @endif
                                                        @if ($type == 'Storage/industrial' || $type == 'Vila/Bunglow' || $type == 'Farmhouse')
                                                            <div class="form-group col-4 m-b-10 data_conent_58">
                                                                <h6><b>Constructed Carpet Area</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_58">:

                                                                @if (
                                                                    !empty(explode('_-||-_', $property->constructed_carpet_area)[0]) &&
                                                                        !empty($dropdowns[explode('_-||-_', $property->constructed_carpet_area)[1]]['name']))
                                                                    {{ explode('_-||-_', $property->constructed_carpet_area)[0] . ' ' . $dropdowns[explode('_-||-_', $property->constructed_carpet_area)[1]]['name'] }}
                                                                @endif
                                                            </div>
                                                        @endif
                                                        @if ($type == 'Vila/Bunglow' || $type == 'Farmhouse')
                                                            <div class="form-group col-4 m-b-10 data_conent_59">
                                                                <h6><b>Constructed Builtup Area</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_59">:

                                                                @if (
                                                                    !empty(explode('_-||-_', $property->constructed_builtup_area)[0]) &&
                                                                        !empty($dropdowns[explode('_-||-_', $property->constructed_builtup_area)[1]]['name']))
                                                                    {{ explode('_-||-_', $property->constructed_builtup_area)[0] . ' ' . $dropdowns[explode('_-||-_', $property->constructed_builtup_area)[1]]['name'] }}
                                                                @endif
                                                            </div>
                                                        @endif
                                                        @if ($type == 'Penthouse' || $type == 'Flat')
                                                            <div class="form-group col-4 m-b-10 data_conent_60">
                                                                <h6><b>Builtup Area</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_60">:

                                                                @if (
                                                                    !empty(explode('_-||-_', $property->builtup_area)[0]) &&
                                                                        !empty($dropdowns[explode('_-||-_', $property->builtup_area)[1]]['name']))
                                                                    {{ explode('_-||-_', $property->builtup_area)[0] . ' ' . $dropdowns[explode('_-||-_', $property->builtup_area)[1]]['name'] }}
                                                                @endif
                                                            </div>
                                                        @endif

                                                        @if ($type == 'Penthouse' || ($type == 'Flat' && $property->is_terrace != 0))
                                                            <div class="form-group col-4 m-b-10 data_conent_61">
                                                                <h6><b>Terrace Carpet Area</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_61">:

                                                                @if (
                                                                    !empty(explode('_-||-_', $property->terrace_carpet_area)[0]) &&
                                                                        !empty($dropdowns[explode('_-||-_', $property->terrace_carpet_area)[1]]['name']))
                                                                    {{ explode('_-||-_', $property->terrace_carpet_area)[0] . ' ' . $dropdowns[explode('_-||-_', $property->terrace_carpet_area)[1]]['name'] }}
                                                                @endif
                                                            </div>
                                                        @endif
                                                        @if ($type == 'Penthouse' || ($type == 'Flat' && $property->is_terrace != 0))
                                                            <div class="form-group col-4 m-b-10 data_conent_62">
                                                                <h6><b>Terrace Salable Area</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_62">:

                                                                @if (
                                                                    !empty(explode('_-||-_', $property->terrace_salable_area)[0]) &&
                                                                        !empty($dropdowns[explode('_-||-_', $property->terrace_salable_area)[1]]['name']))
                                                                    {{ explode('_-||-_', $property->terrace_salable_area)[0] . ' ' . $dropdowns[explode('_-||-_', $property->terrace_salable_area)[1]]['name'] }}
                                                                @endif
                                                            </div>
                                                        @endif
                                                        @if ($type == 'Farmhouse' || $type == 'Plot/Land')
                                                            <div class="form-group col-4 m-b-10 data_conent_6">
                                                                <h6><b>District</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_6">
                                                                <div>:
                                                                    {{ isset($property->District->name) ? $property->District->name : '-' }}
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-4 m-b-10 data_conent_7">
                                                                <h6><b>Taluka</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_7">
                                                                <div>:
                                                                    {{ isset($property->Taluka->name) ? $property->Taluka->name : '-' }}
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-4 m-b-10 data_conent_8">
                                                                <h6><b>Village</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_8">
                                                                <div>:
                                                                    {{ isset($property->Village->name) ? $property->Village->name : '-' }}
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-4 m-b-10 data_conent_9">
                                                                <h6><b>Zone</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_9">
                                                                <div>:
                                                                    {{ isset($dropdowns[$property->zone_id]['name']) ? $dropdowns[$property->zone_id]['name'] : '' }}
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if ($type == 'Storage/industrial')
                                                            <div class="form-group col-4 m-b-10 data_conent_10">
                                                                <h6><b>Centre Height</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_10">

                                                                <div>:
                                                                    @if (
                                                                        !empty(explode('_-||-_', $property->storage_centre_height)[0]) &&
                                                                            !empty(explode('_-||-_', $property->storage_centre_height)[1]))
                                                                        {{ explode('_-||-_', $property->storage_centre_height)[0] . ' ' . explode('_-||-_', $property->storage_centre_height)[1] }}
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if ($type == 'Land/Plot' || $type == 'Plot/Land')
                                                            <div class="form-group col-4 m-b-10 data_conent_11">
                                                                <h6><b>Length of Plot</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_11">
                                                                {{-- @dd((explode('_-||-_',$property->length_of_plot)[1])); --}}
                                                                <div>:
                                                                    @if (!empty(explode('_-||-_', $property->length_of_plot)[0]) && !empty(explode('_-||-_', $property->length_of_plot)[1]))
                                                                        {{ explode('_-||-_', $property->length_of_plot)[0] . ' ' . explode('_-||-_', $property->length_of_plot)[1] }}
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-4 m-b-10 data_conent_12">
                                                                <h6><b>Width of Plot</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_12">

                                                                <div>:
                                                                    @if (!empty(explode('_-||-_', $property->width_of_plot)[0]) && !empty(explode('_-||-_', $property->width_of_plot)[1]))
                                                                        {{ explode('_-||-_', $property->width_of_plot)[0] . ' ' . explode('_-||-_', $property->width_of_plot)[1] }}
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if ($type == 'Retail')
                                                            <div class="form-group col-4 m-b-10 data_conent_13">
                                                                <h6><b>Entrance Width</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_13">
                                                                <div>:
                                                                    @if (!empty(explode('_-||-_', $property->entrance_width)[0]) && !empty(explode('_-||-_', $property->entrance_width)[1]))
                                                                        {{ explode('_-||-_', $property->entrance_width)[0] . ' ' . explode('_-||-_', $property->entrance_width)[1] }}
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-4 m-b-10 data_conent_14">
                                                                <h6><b>Ceilling Height</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_14">

                                                                <div>:
                                                                    @if (!empty(explode('_-||-_', $property->ceiling_height)[0]) && !empty(explode('_-||-_', $property->ceiling_height)[1]))
                                                                        {{ explode('_-||-_', $property->ceiling_height)[0] . ' ' . explode('_-||-_', $property->ceiling_height)[1] }}
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if (
                                                            $type == 'Flat' ||
                                                                $type == 'Vila/Bunglow' ||
                                                                $type == 'Land/Plot' ||
                                                                $type == 'Penthouse' ||
                                                                $type == 'Farmhouse' ||
                                                                $type == 'Office' ||
                                                                $type == 'Retail' ||
                                                                $type == 'Storage/industrial' ||
                                                                $type == 'Plot/Land')
                                                            @if ($type == 'Flat' || $type == 'PenthHouse' || $type == 'Office' || $type == 'Retail')
                                                                <div class="form-group col-4 m-b-10 data_conent_15">
                                                                    <h6><b>Total Units in project</b></h6>
                                                                </div>
                                                                <div class="form-group col-8 m-b-10 data_conent_15">
                                                                    <div>:
                                                                        {{ $property->total_units_in_project ? $property->total_units_in_project : '-' }}
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @if ($type == 'Flat' || $type == 'PenthHouse' || $type == 'Office' || $type == 'Retail')
                                                                <div class="form-group col-4 m-b-10 data_conent_16">
                                                                    <h6><b>Total no. of floor</b></h6>
                                                                </div>
                                                                <div class="form-group col-8 m-b-10 data_conent_16">
                                                                    <div>:
                                                                        {{ $property->total_no_of_floor ? $property->total_no_of_floor : '-' }}
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @if ($type == 'Flat' || $type == 'PenthHouse' || $type == 'Office' || $type == 'Retail')
                                                                <div class="form-group col-4 m-b-10 data_conent_17">
                                                                    <h6><b>Total Units in tower</b></h6>
                                                                </div>
                                                                <div class="form-group col-8 m-b-10 data_conent_17">
                                                                    <div>:
                                                                        {{ $property->total_units_in_tower ? $property->total_units_in_tower : '-' }}
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @if ($type == 'Flat' || $type == 'PenthHouse' || $type == 'Office')
                                                                <div class="form-group col-4 m-b-10 data_conent_18">
                                                                    <h6><b>Property On Floor</b></h6>
                                                                </div>
                                                                <div class="form-group col-8 m-b-10 data_conent_18">
                                                                    <div>:
                                                                        {{ $property->property_on_floors ? $property->property_on_floors : '-' }}
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @if ($type == 'Flat' || $type == 'PenthHouse' || $type == 'Office' || $type == 'Retail')
                                                                <div class="form-group col-4 m-b-10 data_conent_19">
                                                                    <h6><b>No Of Elavators</b></h6>
                                                                </div>
                                                                <div class="form-group col-8 m-b-10 data_conent_19">
                                                                    <div>:
                                                                        {{ $property->no_of_elavators ? $property->no_of_elavators : '-' }}
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @if ($type == 'Vila/Bunglow' || $type == 'PenthHouse' || $type == 'Farmhouse')
                                                                <div class="form-group col-4 m-b-10 data_conent_20">
                                                                    <h6><b>No Of Balcony</b></h6>
                                                                </div>
                                                                <div class="form-group col-8 m-b-10 data_conent_20">
                                                                    <div>:
                                                                        {{ $property->no_of_balcony ? $property->no_of_balcony : '-' }}
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @if ($type == 'Vila/Bunglow' || $type == 'Land/Plot' || $type == 'Farmhouse')
                                                                <div class="form-group col-4 m-b-10 data_conent_21">
                                                                    <h6><b>Total No. of units</b></h6>
                                                                </div>
                                                                <div class="form-group col-8 m-b-10 data_conent_21">
                                                                    <div>:
                                                                        {{ $property->total_no_of_units ? $property->total_no_of_units : '-' }}
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @if ($type == 'Farmhouse' || $type == 'Vila/Bunglow')
                                                                <div class="form-group col-4 m-b-10 data_conent_22">
                                                                    <h6><b>No. of room</b></h6>
                                                                </div>
                                                                <div class="form-group col-8 m-b-10 data_conent_22">
                                                                    <div>:
                                                                        {{ $property->no_of_room ? $property->no_of_room : '-' }}
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @if ($type == 'Flat' || $type == 'Vila/Bunglow' || $type == 'PenthHouse' || $type == 'Farmhouse')
                                                                <div class="form-group col-4 m-b-10 data_conent_23">
                                                                    <h6><b>No Of Bathrooms</b></h6>
                                                                </div>
                                                                <div class="form-group col-8 m-b-10 data_conent_23">
                                                                    <div>:
                                                                        {{ $property->no_of_bathrooms ? $property->no_of_bathrooms : '-' }}
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @if ($type == 'Land/Plot' || $type == 'Plot/Land')
                                                                <div class="form-group col-4 m-b-10 data_conent_24">
                                                                    <h6><b>No Of Floors Allowed</b></h6>
                                                                </div>
                                                                <div class="form-group col-8 m-b-10 data_conent_24">
                                                                    <div>:
                                                                        {{ $property->no_of_floors_allowed ? $property->no_of_floors_allowed : '-' }}
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @if ($type == 'Farmhouse' || $type == 'Land/Plot' || $type == 'Vila/Bunglow')
                                                                <div class="form-group col-4 m-b-10 data_conent_25">
                                                                    <h6><b>No Of Side Open</b></h6>
                                                                </div>
                                                                <div class="form-group col-8 m-b-10 data_conent_25">
                                                                    <div>:
                                                                        {{ $property->no_of_side_open ? $property->no_of_side_open : '-' }}
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endif
                                                        @if ($type == 'Retail' || $type == 'Office')
                                                            <div class="form-group col-4 m-b-10 data_conent_26">
                                                                <h6><b>Washroom Type</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_26">
                                                                <div>:
                                                                    @if ($property->washrooms2_type == '1')
                                                                        {{ 'Private Washroom' }}
                                                                    @elseif($property->washrooms2_type == '2')
                                                                        {{ 'Public Washroom' }}
                                                                    @elseif($property->washrooms2_type == '3')
                                                                        {{ 'Not Available' }}
                                                                    @else
                                                                        {{ '-' }}
                                                                    @endif
                                                                    {{-- {{ $property->washrooms2_type ? $property->washrooms2_type : '-' }} --}}
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if ($type == 'Plot/Land' || $type == 'Storage/industrial')
                                                            <div class="form-group col-4 m-b-10 data_conent_27">
                                                                <h6><b>Road width of front side</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_27">

                                                                <div>:
                                                                    @if (
                                                                        !empty(explode('_-||-_', $property->front_road_width)[0]) &&
                                                                            !empty(explode('_-||-_', $property->front_road_width)[1]))
                                                                        {{ explode('_-||-_', $property->front_road_width)[0] . ' ' . explode('_-||-_', $property->front_road_width)[1] }}
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if ($type == 'Plot/Land')
                                                            <div class="form-group col-4 m-b-10 data_conent_28">
                                                                <h6><b>Construction Allowed For</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_28">
                                                                <div>:
                                                                    {{ $property->construction_allowed_for ? $property->construction_allowed_for : '-' }}
                                                                </div>
                                                            </div>
															<div class="form-group col-4 m-b-10 data_conent_28">
                                                                <h6><b>Construction Documents</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_28">
                                                                <div>:
                                                                    {{ $property->construction_documents ? $property->construction_documents : '-' }}
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-4 m-b-10 data_conent_29">
                                                                <h6><b>FSI</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_29">
                                                                <div>:
                                                                    {{ $property->fsi ? $property->fsi : '-' }}
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-4 m-b-10 data_conent_30">
                                                                <h6><b>No. of borewell</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_30">
                                                                <div>:
                                                                    {{ $property->no_of_borewell ? $property->no_of_borewell : '-' }}
                                                                </div>
                                                            </div>
                                                        @endif

                                                        @if ($type == 'Flat' || $type == 'Vila/Bunglow' || $type == 'Penthouse' || $type == 'Farmhouse')
                                                            <div class="form-group col-4 m-b-10 data_conent_31">
                                                                <h6><b>Availability Status</b></h6>

                                                            </div>
                                                            {{-- @dd($property->availability_status); --}}
                                                            <div class="form-group col-8 m-b-10 data_conent_31">
                                                                <div>:
                                                                    {{-- {{ $property->availability_status ? $property->availability_status : '-' }} --}}
                                                                    @if ($property->availability_status == '1')
                                                                        {{ 'Available' }}
                                                                    @elseif ($property->availability_status == '0')
                                                                        {{ 'Under Construction' }}
                                                                    @else
                                                                        {{ '-' }}
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        @endif

                                                        <div class="form-group col-4 m-b-10 data_conent_32">
                                                            <h6><b>Age of property</b></h6>
                                                        </div>
                                                        <div class="form-group col-8 m-b-10 data_conent_32">
                                                            <div>:
                                                                @if ($property->propertyage == '1')
                                                                    {{ '0-1 Years' }}
                                                                @elseif ($property->propertyage == '2')
                                                                    {{ '1-5 Years' }}
                                                                @elseif ($property->propertyage == '3')
                                                                    {{ '5-10 Years' }}
                                                                @elseif ($property->propertyage == '4')
                                                                    {{ '10+ Years' }}
                                                                @else
                                                                    {{ '-' }}
                                                                @endif
                                                                {{-- {{ $property->propertyage ? $property->propertyage : '-' }} --}}
                                                            </div>
                                                        </div>


                                                        <div class="form-group col-4 m-b-10 data_conent_33">
                                                            <h6><b>Available From</b></h6>
                                                        </div>
                                                        <div class="form-group col-8 m-b-10 data_conent_33">
                                                            <div>:
                                                                {{ $property->available_from ? $property->available_from : '-' }}
                                                            </div>
                                                        </div>


                                                        @if ($type == 'Flat' || $type == 'Vila/Bunglow' || $type == 'Penthouse' || $type == 'Farmhouse')
                                                            <?php
                                                            $amenitiesArray = json_decode($property->amenities);
                                                            $valueAtIndex0 = $amenitiesArray[2];
                                                            ?>
                                                            <div class="form-group col-4 m-b-10 data_conent_34">
																<h6><b>Swimming Pool</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_34">
                                                                <div>:
                                                                    {{ !empty($amenitiesArray) && $amenitiesArray[0] === 1 ? 'Yes' : '-' }}
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-4 m-b-10 data_conent_35">
                                                                <h6><b>Club house</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_35">
                                                                <div>:
                                                                    {{ !empty($amenitiesArray) && $amenitiesArray[1] === 1 ? 'Yes' : '-' }}
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-4 m-b-10 data_conent_36">
                                                                <h6><b>Passenger Lift</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_36">
                                                                <div>:
                                                                    {{ !empty($amenitiesArray) && $amenitiesArray[2] === 1 ? 'Yes' : '-' }}
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-4 m-b-10 data_conent_37">
                                                                <h6><b>Garden & Children Play Area</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_37">
                                                                <div>:
                                                                    {{ !empty($amenitiesArray) && $amenitiesArray[3] === 1 ? 'Yes' : '-' }}
                                                                </div>
                                                            </div>


                                                            <div class="form-group col-4 m-b-10 data_conent_38">
                                                                <h6><b>Service Lift</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_38">
                                                                <div>:
                                                                    {{ !empty($amenitiesArray) && $amenitiesArray[4] === 1 ? 'Yes' : '-' }}
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-4 m-b-10 data_conent_39">
                                                                <h6><b>Streature Lift</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_39">
                                                                <div>:
                                                                    {{ !empty($amenitiesArray) && $amenitiesArray[5] === 1 ? 'Yes' : '-' }}
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-4 m-b-10 data_conent_40">
                                                                <h6><b>Central AC</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_40">
                                                                <div>:
                                                                    {{ !empty($amenitiesArray) && $amenitiesArray[6] === 1 ? 'Yes' : '-' }}
                                                                </div>
                                                            </div>

                                                            {{-- <div class="form-group col-4 m-b-10 data_conent_41">
                                                                <h6><b>Gym</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_41">
                                                                <div>:
                                                                    {{ !empty($amenitiesArray) && $amenitiesArray[7] === 1 ? 'Yes' : '-' }}
                                                                </div>
                                                            </div> --}}
                                                        @endif
														{{-- @dd($property->other_industrial_fields)[3]; --}}
                                                        @if (
                                                            $type == 'Storage/industrial' &&
                                                                !empty($property->other_industrial_fields) &&
                                                                !empty(json_decode($property->other_industrial_fields)[3]))
                                                            @foreach (json_decode($property->other_industrial_fields)[3] as $key => $value)
                                                                <div class="form-group col-4 m-b-10 ">
                                                                    <h6><b>{{ $value }}
																	@if (!empty(json_decode($property->other_industrial_fields)[1][$key]))
																		({{ json_decode($property->other_industrial_fields)[1][$key] }})
																	@else
																	@endif

																</b></h6>
                                                                </div>
                                                                <div class="form-group col-8 m-b-10 ">
                                                                    <div>:
                                                                        {{ json_decode($property->other_industrial_fields)[0][$key]  ? 'Yes' : 'No' }}
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                        @if ($type == 'Retail')
                                                            <div class="form-group col-4 m-b-10 data_conent_43">
                                                                <h6><b>Two Road Corner</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_43">
                                                                <div>: {{ $property->two_road_corner ? 'Yes' : 'No' }}
                                                                </div>
                                                            </div>
                                                        @endif

                                                        @if ($type == 'Plot/Land')
                                                            {{-- <div class="form-group col-4 m-b-10 data_conent_44">
                                                                <h6><b>Survey Number</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_44">
                                                                <div>:
                                                                    {{ $property->survey_number ? $property->survey_number : '-' }}
                                                                </div>
                                                            </div> --}}

                                                            <div class="form-group col-4 m-b-10 data_conent_45">
                                                                <h6><b>Survey Plot size</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_45">

                                                                <div>:
                                                                    @if (
                                                                        !empty(explode('_-||-_', $property->survey_plot_size)[0]) &&
                                                                            !empty($dropdowns[explode('_-||-_', $property->survey_plot_size)[1]]['name']))
                                                                        {{ explode('_-||-_', $property->survey_plot_size)[0] . ' ' . $dropdowns[explode('_-||-_', $property->survey_plot_size)[1]]['name'] }}
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            {{-- <div class="form-group col-4 m-b-10 data_conent_46">
                                                                <h6><b>Price</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_46">
                                                                <div>:
                                                                    {{ $property->survey_price ? $property->survey_price : '-' }}
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-4 m-b-10 data_conent_47">
                                                                <h6><b>Tp Number</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_47">
                                                                <div>:
                                                                    {{ $property->tp_number ? $property->tp_number : '-' }}
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-4 m-b-10 data_conent_48">
                                                                <h6><b>Fp Number</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_48">
                                                                <div>:
                                                                    {{ $property->fp_number ? $property->fp_number : '-' }}
                                                                </div>
                                                            </div> --}}

                                                            <div class="form-group col-4 m-b-10 data_conent_49">
                                                                <h6><b>Fp Plot size</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_49">

                                                                <div>:
                                                                    @if (
                                                                        !empty(explode('_-||-_', $property->fp_plot_size)[0]) &&
                                                                            !empty($dropdowns[explode('_-||-_', $property->fp_plot_size)[1]]['name']))
                                                                        {{ explode('_-||-_', $property->fp_plot_size)[0] . ' ' . $dropdowns[explode('_-||-_', $property->fp_plot_size)[1]]['name'] }}
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            {{-- <div class="form-group col-4 m-b-10 data_conent_50">
                                                                <h6><b>Price</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_50">
                                                                <div>:
                                                                    {{ $property->fp_plot_price ? $property->fp_plot_price : '-' }}
                                                                </div>
                                                            </div> --}}
                                                        @endif

                                                        @if ($type == 'Flat' || $type == 'Penthouse' || $type == 'Office' || $type == 'Retail')
                                                            <div class="form-group col-4 m-b-10 data_conent_51">
                                                                <h6><b>Service Elavator</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_51">
                                                                <div>: {{ $property->service_elavator ? 'Yes' : 'No' }}
                                                                </div>
                                                            </div>
                                                        @endif

                                                        @if ($type == 'Flat' || $type == 'Vila/Bunglow' || $type == 'Penthouse' || $type == 'Farmhouse')
                                                            <div class="form-group col-4 m-b-10 data_conent_52">
                                                                <h6><b>Servant Room</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_52">
                                                                <div>: {{ $property->servant_room ? 'Yes' : 'No' }}</div>
                                                            </div>
                                                        @endif


                                                        <div class="form-group col-4 m-b-10 data_conent_63">
                                                            <h6><b>Hot Property</b></h6>
                                                        </div>
                                                        <div class="form-group col-8 m-b-10 data_conent_63">
                                                            <div>: {{ $property->hot_property ? 'Yes' : 'No' }}</div>
                                                        </div>
                                                        <div class="form-group col-4 m-b-10 data_conent_64">
                                                            <h6><b>Favourite</b></h6>
                                                        </div>
                                                        <div class="form-group col-8 m-b-10 data_conent_64">
                                                            <div>: {{ $property->is_favourite ? 'Yes' : 'No' }}</div>
                                                        </div>
                                                    </div>

                                                    {{-- @if ($type !== 'Land/Plot' && $type !== 'Plot/Land' && $type !== 'Storage/industrial')
                                                        <div class="row mt-1">
                                                            <div class="form-group col-md-12">
                                                                <h5 class="border-style">Care Taker Information</h5>
                                                            </div>

                                                            <div class="form-group col-4 m-b-10 data_conent_70">
                                                                <h6><b>Care Taker Name</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_70">
                                                                <div>
                                                                    {{ $property->care_taker_name ? $property->care_taker_name : '-' }}
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-4 m-b-10 data_conent_71">
                                                                <h6><b>Care Taker Number</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_71">
                                                                <div>
                                                                    {{ $property->care_taker_contact ? $property->care_taker_contact : '-' }}
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-4 m-b-10 data_conent_72">
                                                                <h6><b>Key Available At</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_72">
                                                                <div>
                                                                    {{ $property->key_available_at ? $property->key_available_at : '-' }}
                                                                </div>
                                                            </div>

                                                        </div>
                                                    @endif --}}
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <h5 class="border-style">Owner Information</h5>
                                                        </div>
                                                        <div class="form-group col-4 m-b-10 data_conent_65">
                                                            <h6 for="Client Name"><b>Owner</b></h6>
                                                        </div>
                                                        <div class="form-group col-8 m-b-10 data_conent_65">
                                                            <div>:
                                                                {{ isset($dropdowns[$property->owner_is]['name']) ? $dropdowns[$property->owner_is]['name'] : '' }}
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-4 m-b-10 data_conent_66">
                                                            <h6><b>Name</b></h6>
                                                        </div>
                                                        <div class="form-group col-8 m-b-10 data_conent_66">
                                                            <div>:
                                                                {{ $property->owner_name ? $property->owner_name : '-' }}
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-4 m-b-10 data_conent_67">
                                                            <h6><b>Mobile</b></h6>
                                                        </div>
                                                        <div class="form-group col-8 m-b-10 data_conent_67">
                                                            <div>:
                                                                {{ $property->owner_contact ? $property->owner_contact : '-' }}
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-4 m-b-10 data_conent_68">
                                                            <h6><b>NRI</b></h6>
                                                        </div>
                                                        <div class="form-group col-8 m-b-10 data_conent_68">
                                                            <div>:{{ $property->is_nri ? 'Yes' : 'No' }}</div>
                                                        </div>
                                                        <div class="form-group col-4 m-b-10 data_conent_69">
                                                            <h6><b>Email</b></h6>
                                                        </div>
                                                        <div class="form-group col-8 m-b-10 data_conent_69">
                                                            <div>:
                                                                {{ $property->owner_email ? $property->owner_email : '-' }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <h5 class="border-style">Other Details</h5>
                                                        </div>
                                                        @if ($type != 'Land/Plot' && $type != 'Plot/Land')
                                                            <div class="form-group col-4 m-b-10 data_conent_73">
                                                                <h6><b>FourWheeler Parking</b></h6>
                                                            </div>
                                                            <div class="form-group col-8 m-b-10 data_conent_73">
                                                                <div>:
                                                                    {{ $property->fourwheller_parking ? $property->fourwheller_parking : '-' }}
                                                                </div>
                                                            </div>
                                                            @if ($type != 'Vila/Bunglow')
                                                                <div class="form-group col-4 m-b-10 data_conent_74">
                                                                    <h6><b>TwoWheeler Parking </b></h6>
                                                                </div>
                                                                <div class="form-group col-8 m-b-10 data_conent_74">
                                                                    <div>:
                                                                        {{ $property->twowheeler_parking ? $property->twowheeler_parking : '-' }}
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endif
                                                        <div class="form-group col-4 m-b-10 data_conent_75">
                                                            <h6><b>Refrence </b></h6>
                                                        </div>
                                                        <div class="form-group col-8 m-b-10 data_conent_75">
                                                            <div>:
                                                                {{ $property->property_source_refrence ? $property->property_source_refrence : '-' }}
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-4 m-b-10 data_conent_76">
                                                            <h6><b>Priority</b></h6>
                                                        </div>
                                                        <div class="form-group col-8 m-b-10 data_conent_76">
                                                            <div>:
                                                                {{ isset($dropdowns[$property->Property_priority]['name']) ? $dropdowns[$property->Property_priority]['name'] : '-' }}
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-4 m-b-10 data_conent_77">
                                                            <h6><b>Source</b></h6>
                                                        </div>
                                                        <div class="form-group col-8 m-b-10 data_conent_77">
                                                            <div>:
                                                                {{ isset($dropdowns[$property->source_of_property]['name']) ? $dropdowns[$property->source_of_property]['name'] : '-' }}
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-4 m-b-10 data_conent_78">
                                                            <h6><b>Pre-Leased</b></h6>
                                                        </div>
                                                        <div class="form-group col-8 m-b-10 data_conent_78">
                                                            <div>:{{ $property->is_pre_leased ? 'Yes' : 'No' }}</div>
                                                        </div>
                                                        <div class="form-group col-4 m-b-10 data_conent_158">
                                                            <h6><b>Pre-Leased Remarks</b></h6>
                                                        </div>
                                                        <div class="form-group col-8 m-b-10 data_conent_158">
                                                            <div>:
                                                                {{ $property->pre_leased_remarks ? $property->pre_leased_remarks : '-' }}
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-4 m-b-10 data_conent_79">
                                                            <h6><b>Location Link</b></h6>
                                                        </div>
														<div class="form-group col-8 m-b-10 data_conent_79">
															<div>:
																{{-- {{ $property->location_link ? $property->location_link : '-' }} --}}
																<a href="{{ $property->location_link ? $property->location_link : '#' }}" target="_blank">
																	<i class="cursor-pointer color-code-popover" data-bs-trigger="hover focus">  check on map  </i>
																</a>
															</div>
														</div>

														@if ($property->is_terrace === '1')
															<div class="form-group col-4 m-b-10 data_conent_159">
																<h6><b> Terrace</b></h6>
															</div>
															<div class="form-group col-8 m-b-10 data_conent_159">
																<div>:
																	{{ $property->is_terrace === '1' ? 'Yes' : '' }}
																</div>
															</div>
														@endif
                                                    </div>

													@if ($type === "Plot/Land" || $type === "Land/Plot")
														<div class="row mt-4">
															<div class="form-group col-md-12">
																<h5 class="border-style">Unit Details</h5>
															</div>
															<div class="col-md-12">
																<table class="table custom-table-design">
																	<thead>
																		<tr>
																			<th scope="col">Survey No.</th>
																			<th scope="col">FP No.</th>
																			<th scope="col">TP No.</th>
																			<th scope="col">Survey Price</th>
																			<th scope="col">FP Price</th>
																		</tr>
																	</thead>
																	<tbody>
																		<td>{{ isset($property->survey_number) ? $property->survey_number : '-' }}</td>
																		<td>{{ isset($property->fp_number) ? $property->fp_number : '-' }}</td>
																		<td>{{ isset($property->tp_number) ? $property->tp_number : '-' }}</td>
																		<td>{{ isset($property->survey_price) ? $property->survey_price : '-' }}</td>
																		<td>{{ isset($property->fp_plot_price) ? $property->fp_plot_price : '-' }}</td>
																	</tbody>
																</table>
															</div>
														</div>
													@endif



													@if ($type === "Vila/Bunglow" || $type === "Farmhouse" || $type === 'Penthouse' || $type === "Storage/industrial" ||
														$type === "Retail" || $type === "Flat" || $type === "Farmhouse")
														<div class="row mt-4">
															<div class="form-group col-md-12">
																<h5 class="border-style">Unit Details</h5>
															</div>
															<div class="col-md-12">
																<table class="table custom-table-design">
																	<thead>
																		<tr>
																			@if ($type !== 'Vila/Bunglow' && $type !== 'Land/Plot' && $type !== 'Farmhouse')
																				<th scope="col">Wing</th>
																			@endif
																			<th scope="col">Unit</th>
																			{{-- @if (($type === 'Vila/Bunglow' || $type == 'Penthouse' || $type == 'Farmhouse' || $type == 'Storage/industrial') && ($property->property_for == 'Sell' || $property->property_for == 'Both')) --}}
																			<th scope="col">Price</th>
																			<th scope="col">Rent Price</th>
																			{{-- @endif --}}
																			<th scope="col">Status</th>
																		</tr>
																	</thead>
																	<tbody>

																	<tbody>


																		@if (isset(json_decode($property->unit_details)[0]))
																			@forelse (json_decode($property->unit_details) as $value)
																				<tr>
																					@if ($type !== 'Vila/Bunglow' && $type !== 'Land/Plot' && $type !== 'Farmhouse')
																						<td>{{ isset($value[0]) ? strtoupper($value[0]) : '-' }}
																						</td>
																					@endif
																					<td>{{ isset($value[1]) ? $value[1] : '-' }}
																					</td>
																					@if (
																						($type == 'Vila/Bunglow' || $type == 'Penthouse' || $type == 'Farmhouse' || $type == 'Storage/industrial') &&
																							($property->property_for == 'Sell' || $property->property_for == 'Both'))
																						<td>{{ isset($value[7]) ? $value[7] : '-' }}
																						</td>
																					@else
																						<td>{{ isset($value[3]) ? $value[3] : '-' }}
																						</td>
																					@endif
																					<td>{{ !empty(isset($value[4])) ? $value[4] : '-' }}
																					</td>
																					<td>{{ !empty(isset($value[2])) ? $value[2] : '-' }}
																					</td>
																				</tr>
																			@empty
																			@endforelse
																		@endif

																	</tbody>
																	</tbody>
																</table>
															</div>
														</div>
                                                    @endif

													@if ($type === "Vila/Bunglow" || $type === "Farmhouse" || $type === 'Penthouse' || $type === "Storage/industrial" ||
														$type === "Retail" || $type === "Flat" || $type === "Farmhouse")
														<div class="row mt-4">
															<div class="form-group col-md-12">
																<h5 class="border-style">Unit Details</h5>
															</div>
															<div class="col-md-12">
																<table class="table custom-table-design">
																	<thead>
																		<tr>
																			@if ($type !== 'Vila/Bunglow' && $type !== 'Land/Plot' && $type !== 'Farmhouse')
																				<th scope="col">Wing</th>
																			@endif
																			<th scope="col">Unit</th>
																			{{-- @if (($type === 'Vila/Bunglow' || $type == 'Penthouse' || $type == 'Farmhouse' || $type == 'Storage/industrial') && ($property->property_for == 'Sell' || $property->property_for == 'Both')) --}}
																			<th scope="col">Price</th>
																			<th scope="col">Rent Price</th>
																			{{-- @endif --}}
																			<th scope="col">Status</th>
																		</tr>
																	</thead>
																	<tbody>

																	<tbody>


																		@if (isset(json_decode($property->unit_details)[0]))
																			@forelse (json_decode($property->unit_details) as $value)
																				<tr>
																					@if ($type !== 'Vila/Bunglow' && $type !== 'Land/Plot' && $type !== 'Farmhouse')
																						<td>{{ isset($value[0]) ? strtoupper($value[0]) : '-' }}
																						</td>
																					@endif
																					<td>{{ isset($value[1]) ? $value[1] : '-' }}
																					</td>
																					@if (
																						($type == 'Vila/Bunglow' || $type == 'Penthouse' || $type == 'Farmhouse' || $type == 'Storage/industrial') &&
																							($property->property_for == 'Sell' || $property->property_for == 'Both'))
																						<td>{{ isset($value[7]) ? $value[7] : '-' }}
																						</td>
																					@else
																						<td>{{ isset($value[3]) ? $value[3] : '-' }}
																						</td>
																					@endif
																					<td>{{ !empty(isset($value[4])) ? $value[4] : '-' }}
																					</td>
																					<td>{{ !empty(isset($value[2])) ? $value[2] : '-' }}
																					</td>
																				</tr>
																			@empty
																			@endforelse
																		@endif

																	</tbody>
																	</tbody>
																</table>
															</div>
														</div>
                                                    @endif

                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <h5 class="border-style">Other Conatct Details</h5>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <table class="table custom-table-design">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">Name</th>
                                                                        <th scope="col">Contact</th>
                                                                        <th scope="col">Designation</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                <tbody>
                                                                    @if (isset(json_decode($property->other_contact_details)[0]))
                                                                        @forelse (json_decode($property->other_contact_details) as $value)
                                                                            <tr>
                                                                                <td>{{ isset($value[0]) ? $value[0] : '-' }}</td>
                                                                                <td>{{ isset($value[1]) ? $value[1] : '-' }}</td>
                                                                                <td>{{ isset($value[2]) ? $value[2] : '-' }}</td>

                                                                            </tr>
                                                                        @empty
                                                                        @endforelse
                                                                    @endif

                                                                </tbody>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-12">
                                                    <h5 class="border-style">Property Image/document</h5>
                                                    <img src="{{ asset('gallary_image.jpeg') }}" alt=""
                                                        onclick="image()" style="height: 23%;">
                                                </div>

                                                <div class="col-md-12" style="margin-top: -8%;">
                                                    <h5 class="border-style">Matching Enquiry</h5>
                                                    <br>
                                                    <div class="form-group">
                                                        <table class="table table-responsive custom-table-design mb-3">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Client Name</th>
                                                                    <th scope="col">Mobile</th>
                                                                    <th scope="col">For</th>
                                                                    <th scope="col">Budget</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody id="matching_container">
                                                                @forelse ($enquiries as $value)
                                                                    <tr>
                                                                        <td>{{ $value->client_name }}</td>
                                                                        <td>{{ $value->client_mobile }}</td>
                                                                        <td>{{ $value->enquiry_for }}</td>
                                                                        <td>{{ $value->budget_to }}</td>
                                                                    </tr>
                                                                @empty
                                                                @endforelse
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-property-information" role="tabpanel"
                                            aria-labelledby="v-property-information-tab">

                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <h5 class="border-style">Information</h5>
                                                </div>
                                                <div class="form-group col-4 m-b-10 data_conent_80">
                                                    <h6><b>Property For</b></h6>
                                                </div>
                                                <div class="form-group col-8 m-b-10 data_conent_80">
                                                    <div>:
                                                        {{ $property->property_for ? $property->property_for : '-' }}
                                                    </div>
                                                </div>
                                                <div class="form-group col-4 m-b-10 data_conent_81">
                                                    <h6><b>Property Type</b></h6>
                                                </div>
                                                <div class="form-group col-8 m-b-10 data_conent_81">
                                                    <div>:
                                                        {{ isset($dropdowns[$property->property_type]['name']) ? $dropdowns[$property->property_type]['name'] : '' }}
                                                    </div>
                                                </div>

                                                <div class="form-group col-4 m-b-10 data_conent_82">
                                                    <h6><b>Category</b></h6>
                                                </div>
                                                <div class="form-group col-8 m-b-10 data_conent_82">
                                                    <div>:
                                                        {{ isset($dropdowns[$property->property_category]['name']) ? $dropdowns[$property->property_category]['name'] : '' }}
                                                    </div>
                                                </div>
                                                <div class="form-group col-4 m-b-10 data_conent_3">
                                                    <h6><b>Sub Category</b></h6>
                                                </div>
                                                <div class="form-group col-8 m-b-10 data_conent_3">
                                                    <div>:
                                                        {{ $configuration_name != null ? $configuration_name : '' }}
                                                    </div>
                                                </div>
                                                <div class="form-group col-4 m-b-10 data_conent_83">
                                                    <h6><b>Project</b></h6>
                                                </div>
                                                <div class="form-group col-8 m-b-10 data_conent_83">
                                                    <div>:
                                                        {{ $property->Projects != null ? $property->Projects->project_name : '' }}
                                                    </div>
                                                </div>
                                                <div class="form-group col-4 m-b-10 data_conent_84">
                                                    <h6><b>Projects Address</b></h6>
                                                </div>
                                                <div class="form-group col-8 m-b-10 data_conent_84">
                                                    <div>:
                                                        {{ isset($property->Projects->address) ? $property->Projects->address : '-' }}
                                                    </div>
                                                </div>
                                                @if ($type == 'Farmhouse' || $type == 'Plot/Land')
                                                    <div class="form-group col-4 m-b-10 data_conent_85">
                                                        <h6><b>District</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_85">
                                                        <div>:
                                                            {{ isset($property->District->name) ? $property->District->name : '-' }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-4 m-b-10 data_conent_86">
                                                        <h6><b>Taluka</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_86">
                                                        <div>:
                                                            {{ isset($property->Taluka->name) ? $property->Taluka->name : '-' }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-4 m-b-10 data_conent_87">
                                                        <h6><b>Village</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_87">
                                                        <div>:
                                                            {{ isset($property->Village->name) ? $property->Village->name : '-' }}
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-4 m-b-10 data_conent_88">
                                                        <h6><b>Zone</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_88">
                                                        <div>:
                                                            {{ isset($dropdowns[$property->zone_id]['name']) ? $dropdowns[$property->zone_id]['name'] : '' }}
                                                        </div>
                                                    </div>
                                                @endif
                                                @if ($type == 'Storage/industrial')
                                                    <div class="form-group col-4 m-b-10 data_conent_88">
                                                        <h6><b>Centre Height</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_88">

                                                        <div>:
                                                            @if (
                                                                !empty(explode('_-||-_', $property->storage_centre_height)[0]) &&
                                                                    !empty(explode('_-||-_', $property->storage_centre_height)[1]))
                                                                {{ explode('_-||-_', $property->storage_centre_height)[0] . ' ' . explode('_-||-_', $property->storage_centre_height)[1] }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endif
                                                @if ($type == 'Land/Plot' || $type == 'Plot/Land')
                                                    <div class="form-group col-4 m-b-10 data_conent_89">
                                                        <h6><b>Length of Plot</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_89">
                                                        <div>:
                                                            @if (!empty(explode('_-||-_', $property->length_of_plot)[0]) && !empty(explode('_-||-_', $property->length_of_plot)[1]))
                                                                {{ explode('_-||-_', $property->length_of_plot)[0] . ' ' . explode('_-||-_', $property->length_of_plot)[1] }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-4 m-b-10 data_conent_90">
                                                        <h6><b>Width of Plot</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_90">

                                                        <div>:
                                                            @if (!empty(explode('_-||-_', $property->width_of_plot)[0]) && !empty(explode('_-||-_', $property->width_of_plot)[1]))
                                                                {{ explode('_-||-_', $property->width_of_plot)[0] . ' ' . explode('_-||-_', $property->width_of_plot)[1] }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endif
                                                @if ($type == 'Retail')
                                                    <div class="form-group col-4 m-b-10 data_conent_91">
                                                        <h6><b>Entrance Width</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_91">

                                                        <div>:
                                                            @if (!empty(explode('_-||-_', $property->entrance_width)[0]) && !empty(explode('_-||-_', $property->entrance_width)[1]))
                                                                {{ explode('_-||-_', $property->entrance_width)[0] . ' ' . explode('_-||-_', $property->entrance_width)[1] }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-4 m-b-10 data_conent_92">
                                                        <h6><b>Ceilling Height</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_92">

                                                        <div>:
                                                            @if (!empty(explode('_-||-_', $property->ceiling_height)[0]) && !empty(explode('_-||-_', $property->ceiling_height)[1]))
                                                                {{ explode('_-||-_', $property->ceiling_height)[0] . ' ' . explode('_-||-_', $property->ceiling_height)[1] }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endif
                                                @if (
                                                    $type == 'Flat' ||
                                                        $type == 'Vila/Bunglow' ||
                                                        $type == 'Land/Plot' ||
                                                        $type == 'Penthouse' ||
                                                        $type == 'Farmhouse' ||
                                                        $type == 'Office' ||
                                                        $type == 'Retail' ||
                                                        $type == 'Storage/industrial' ||
                                                        $type == 'Plot/Land')
                                                    @if ($type == 'Flat' || $type == 'PenthHouse' || $type == 'Office' || $type == 'Retail')
                                                        <div class="form-group col-4 m-b-10 data_conent_93">
                                                            <h6><b>Total Units in project</b></h6>
                                                        </div>
                                                        <div class="form-group col-8 m-b-10 data_conent_93">
                                                            <div>:
                                                                {{ $property->total_units_in_project ? $property->total_units_in_project : '-' }}
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if ($type == 'Flat' || $type == 'PenthHouse' || $type == 'Office' || $type == 'Retail')
                                                        <div class="form-group col-4 m-b-10 data_conent_94">
                                                            <h6><b>Total no. of floor</b></h6>
                                                        </div>
                                                        <div class="form-group col-8 m-b-10 data_conent_94">
                                                            <div>:
                                                                {{ $property->total_no_of_floor ? $property->total_no_of_floor : '-' }}
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if ($type == 'Flat' || $type == 'PenthHouse' || $type == 'Office' || $type == 'Retail')
                                                        <div class="form-group col-4 m-b-10 data_conent_95">
                                                            <h6><b>Total Units in tower</b></h6>
                                                        </div>
                                                        <div class="form-group col-8 m-b-10 data_conent_95">
                                                            <div>:
                                                                {{ $property->total_units_in_tower ? $property->total_units_in_tower : '-' }}
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if ($type == 'Flat' || $type == 'PenthHouse' || $type == 'Office')
                                                        <div class="form-group col-4 m-b-10 data_conent_96">
                                                            <h6><b>Property On Floor</b></h6>
                                                        </div>
                                                        <div class="form-group col-8 m-b-10 data_conent_96">
                                                            <div>:
                                                                {{ $property->property_on_floors ? $property->property_on_floors : '-' }}
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if ($type == 'Flat' || $type == 'PenthHouse' || $type == 'Office' || $type == 'Retail')
                                                        <div class="form-group col-4 m-b-10 data_conent_97">
                                                            <h6><b>No Of Elavators</b></h6>
                                                        </div>
                                                        <div class="form-group col-8 m-b-10 data_conent_97">
                                                            <div>:
                                                                {{ $property->no_of_elavators ? $property->no_of_elavators : '-' }}
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if ($type == 'Vila/Bunglow' || $type == 'PenthHouse' || $type == 'Farmhouse')
                                                        <div class="form-group col-4 m-b-10 data_conent_98">
                                                            <h6><b>No Of Balcony</b></h6>
                                                        </div>
                                                        <div class="form-group col-8 m-b-10 data_conent_98">
                                                            <div>:
                                                                {{ $property->no_of_balcony ? $property->no_of_balcony : '-' }}
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if ($type == 'Vila/Bunglow' || $type == 'Land/Plot' || $type == 'Farmhouse')
                                                        <div class="form-group col-4 m-b-10 data_conent_99">
                                                            <h6><b>Total No. of units</b></h6>
                                                        </div>
                                                        <div class="form-group col-8 m-b-10 data_conent_99">
                                                            <div>:
                                                                {{ $property->total_no_of_units ? $property->total_no_of_units : '-' }}
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if ($type == 'Farmhouse' || $type == 'Vila/Bunglow')
                                                        <div class="form-group col-4 m-b-10 data_conent_100">
                                                            <h6><b>No. of room</b></h6>
                                                        </div>
                                                        <div class="form-group col-8 m-b-10 data_conent_100">
                                                            <div>:
                                                                {{ $property->no_of_room ? $property->no_of_room : '-' }}
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if ($type == 'Flat' || $type == 'Vila/Bunglow' || $type == 'PenthHouse' || $type == 'Farmhouse')
                                                        <div class="form-group col-4 m-b-10 data_conent_101">
                                                            <h6><b>No Of Bathrooms</b></h6>
                                                        </div>
                                                        <div class="form-group col-8 m-b-10 data_conent_101">
                                                            <div>:
                                                                {{ $property->no_of_bathrooms ? $property->no_of_bathrooms : '-' }}
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if ($type == 'Land/Plot' || $type == 'Plot/Land')
                                                        <div class="form-group col-4 m-b-10 data_conent_102">
                                                            <h6><b>No Of Floors Allowed</b></h6>
                                                        </div>
                                                        <div class="form-group col-8 m-b-10 data_conent_102">
                                                            <div>:
                                                                {{ $property->no_of_floors_allowed ? $property->no_of_floors_allowed : '-' }}
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if ($type == 'Farmhouse' || $type == 'Land/Plot' || $type == 'Vila/Bunglow')
                                                        <div class="form-group col-4 m-b-10 data_conent_103">
                                                            <h6><b>No Of Side Open</b></h6>
                                                        </div>
                                                        <div class="form-group col-8 m-b-10 data_conent_103">
                                                            <div>:
                                                                {{ $property->no_of_side_open ? $property->no_of_side_open : '-' }}
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endif
                                                @if ($type == 'Retail' || $type == 'Office')
                                                    <div class="form-group col-4 m-b-10 data_conent_104">
                                                        <h6><b>Washroom Type</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_104">
                                                        <div>:
                                                            @if ($property->washrooms2_type == '1')
                                                                {{ 'Private Washroom' }}
                                                            @elseif($property->washrooms2_type == '2')
                                                                {{ 'Public Washroom' }}
                                                            @elseif($property->washrooms2_type == '3')
                                                                {{ 'Not Available' }}
                                                            @else
                                                                {{ '-' }}
                                                            @endif
                                                            {{-- {{ $property->washrooms2_type ? $property->washrooms2_type : '-' }} --}}
                                                        </div>
                                                    </div>
                                                @endif
                                                @if ($type == 'Plot/Land' || $type == 'Storage/industrial')
                                                    <div class="form-group col-4 m-b-10 data_conent_105">
                                                        <h6><b>Road width of front side</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_105">

                                                        <div>:
                                                            @if (
                                                                !empty(explode('_-||-_', $property->front_road_width)[0]) &&
                                                                    !empty(explode('_-||-_', $property->front_road_width)[1]))
                                                                {{ explode('_-||-_', $property->front_road_width)[0] . ' ' . explode('_-||-_', $property->front_road_width)[1] }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endif
                                                @if ($type == 'Plot/Land')
                                                    <div class="form-group col-4 m-b-10 data_conent_106">
                                                        <h6><b>Construction Allowed For</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_106">
                                                        <div>:
                                                            {{ $property->construction_allowed_for ? $property->construction_allowed_for : '-' }}
                                                        </div>
                                                    </div>
													<div class="form-group col-4 m-b-10 data_conent_106">
                                                        <h6><b>Construction Documents</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_106">
                                                        <div>:
                                                            {{ $property->construction_documents ? $property->construction_documents : '-' }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-4 m-b-10 data_conent_107">
                                                        <h6><b>FSI</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_107">
                                                        <div>:
                                                            {{ $property->fsi ? $property->fsi : '-' }}
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-4 m-b-10 data_conent_108">
                                                        <h6><b>No. of borewell</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_108">
                                                        <div>:
                                                            {{ $property->no_of_borewell ? $property->no_of_borewell : '-' }}
                                                        </div>
                                                    </div>
                                                @endif

                                                @if ($type == 'Flat' || $type == 'Vila/Bunglow' || $type == 'Penthouse' || $type == 'Farmhouse')
                                                    <div class="form-group col-4 m-b-10 data_conent_109">
                                                        <h6><b>Availability Status</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_109">
                                                        <div>:
                                                            {{-- {{ $property->availability_status ? $property->availability_status : '-' }} --}}
                                                            @if ($property->availability_status == '1')
                                                                {{ 'Available' }}
                                                            @elseif ($property->availability_status == '0')
                                                                {{ 'Under Construction' }}
                                                            @else
                                                                {{ '-' }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endif

                                                <div class="form-group col-4 m-b-10 data_conent_110">
                                                    <h6><b>Age of property</b></h6>
                                                </div>
                                                <div class="form-group col-8 m-b-10 data_conent_110">
                                                    <div>:
                                                        @if ($property->propertyage == '1')
                                                            {{ '0-1 Years' }}
                                                        @elseif ($property->propertyage == '2')
                                                            {{ '1-5 Years' }}
                                                        @elseif ($property->propertyage == '3')
                                                            {{ '5-10 Years' }}
                                                        @elseif ($property->propertyage == '4')
                                                            {{ '10+ Years' }}
                                                        @else
                                                            {{ '-' }}
                                                        @endif

                                                    </div>
                                                </div>


                                                <div class="form-group col-4 m-b-10 data_conent_111">
                                                    <h6><b>Available From</b></h6>
                                                </div>
                                                <div class="form-group col-8 m-b-10 data_conent_111">
                                                    <div>:
                                                        {{ $property->available_from ? $property->available_from : '-' }}
                                                    </div>
                                                </div>

                                                @if ($type == 'Flat' || $type == 'Vila/Bunglow' || $type == 'Penthouse' || $type == 'Farmhouse')
                                                    <div class="form-group col-4 m-b-10 data_conent_112">
                                                        <h6><b>Swimming Pool</b></h6>
                                                    </div>
                                                    {{-- $amenitiesArray = json_decode($property->amenities); --}}
                                                    <?php
                                                    // $amenitiesArray = $property->amenities;
                                                    $amenitiesArray = json_decode($property->amenities);
                                                    $valueAtIndex0 = $amenitiesArray[2];
                                                    // print_r($valueAtIndex0);
                                                    // die();
                                                    ?>
                                                    <div class="form-group col-8 m-b-10 data_conent_112">
                                                        <div>:
                                                            {{ !empty($amenitiesArray) && $amenitiesArray[0] === 1 ? 'Yes' : '-' }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-4 m-b-10 data_conent_113">
                                                        <h6><b>Club house</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_113">
                                                        <div>:
                                                            {{ !empty($amenitiesArray) && $amenitiesArray[1] === 1 ? 'Yes' : '-' }}
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-4 m-b-10 data_conent_114">
                                                        <h6><b>Passenger Lift</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_114">
                                                        <div>:
                                                            {{ !empty($amenitiesArray) && $amenitiesArray[2] === 1 ? 'Yes' : '-' }}
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-4 m-b-10 data_conent_115">
                                                        <h6><b>Garden & Children Play Area</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_115">
                                                        <div>:
                                                            {{ !empty($amenitiesArray) && $amenitiesArray[3] === 1 ? 'Yes' : '-' }}
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-4 m-b-10 data_conent_116">
                                                        <h6><b>Service Lift</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_116">
                                                        <div>:
                                                            {{ !empty($amenitiesArray) && $amenitiesArray[4] === 1 ? 'Yes' : '-' }}
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-4 m-b-10 data_conent_117">
                                                        <h6><b>Streature Lift</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_117">
                                                        <div>:
                                                            {{ !empty($amenitiesArray) && $amenitiesArray[5] === 1 ? 'Yes' : '-' }}
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-4 m-b-10 data_conent_118">
                                                        <h6><b>Central AC</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_118">
                                                        <div>:
                                                            {{ !empty($amenitiesArray) && $amenitiesArray[6] === 1 ? 'Yes' : '-' }}
                                                        </div>
                                                    </div>

                                                    {{-- <div class="form-group col-4 m-b-10 data_conent_119">
                                                        <h6><b>Gym</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_119">
                                                        <div>:
                                                            {{ !empty($amenitiesArray) && $amenitiesArray[7] === 1 ? 'Yes' : '-' }}
                                                        </div>
                                                    </div> --}}
                                                @endif
                                                @if (
                                                    $type == 'Storage/industrial' &&
                                                        !empty($property->other_industrial_fields) &&
                                                        !empty(json_decode($property->other_industrial_fields)[3]))
                                                    @foreach (json_decode($property->other_industrial_fields)[3] as $key => $value)
                                                        <div class="form-group col-4 m-b-10 ">
                                                            <h6><b>{{ $value }}</b></h6>
                                                        </div>
                                                        <div class="form-group col-8 m-b-10 ">

                                                            <div>:
                                                                {{ json_decode($property->other_industrial_fields)[0][$key] ? 'Yes' : 'No' }}
                                                            </div>

                                                        </div>
                                                    @endforeach
                                                @endif
                                                @if ($type == 'Retail')
                                                    <div class="form-group col-4 m-b-10 data_conent_121">
                                                        <h6><b>Two Road Corner</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_121">
                                                        <div>: {{ $property->two_road_corner ? 'Yes' : 'No' }}</div>
                                                    </div>
                                                @endif

                                                @if ($type == 'Plot/Land')
                                                    {{-- <div class="form-group col-4 m-b-10 data_conent_122">
                                                        <h6><b>Survey Number</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_122">
                                                        <div>
                                                            {{ $property->survey_number ? $property->survey_number : '-' }}
                                                        </div>
                                                    </div> --}}

                                                    <div class="form-group col-4 m-b-10 data_conent_123">
                                                        <h6><b>Survey Plot size</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_123">

                                                        <div>:
                                                            @if (
                                                                !empty(explode('_-||-_', $property->survey_plot_size)[0]) &&
                                                                    !empty($dropdowns[explode('_-||-_', $property->survey_plot_size)[1]]['name']))
                                                                {{ explode('_-||-_', $property->survey_plot_size)[0] . ' ' . $dropdowns[explode('_-||-_', $property->survey_plot_size)[1]]['name'] }}
                                                            @endif
                                                        </div>
                                                    </div>

                                                    {{-- <div class="form-group col-4 m-b-10 data_conent_124">
                                                        <h6><b>Price</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_124">
                                                        <div>:
                                                            {{ $property->survey_price ? $property->survey_price : '-' }}
                                                        </div>
                                                    </div> --}}

                                                    {{-- <div class="form-group col-4 m-b-10 data_conent_125">
                                                        <h6><b>Tp Number</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_125">
                                                        <div>:
                                                            {{ $property->tp_number ? $property->tp_number : '-' }}
                                                        </div>
                                                    </div> --}}

                                                    {{-- <div class="form-group col-4 m-b-10 data_conent_126">
                                                        <h6><b>Fp Number</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_126">
                                                        <div>:
                                                            {{ $property->fp_number ? $property->fp_number : '-' }}
                                                        </div>
                                                    </div> --}}

                                                    <div class="form-group col-4 m-b-10 data_conent_127">
                                                        <h6><b>Fp Plot size</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_127">

                                                        <div>:
                                                            @if (
                                                                !empty(explode('_-||-_', $property->fp_plot_size)[0]) &&
                                                                    !empty($dropdowns[explode('_-||-_', $property->fp_plot_size)[1]]['name']))
                                                                {{ explode('_-||-_', $property->fp_plot_size)[0] . ' ' . $dropdowns[explode('_-||-_', $property->fp_plot_size)[1]]['name'] }}
                                                            @endif
                                                        </div>
                                                    </div>

                                                    {{-- <div class="form-group col-4 m-b-10 data_conent_128">
                                                        <h6><b>Price</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_128">
                                                        <div>:
                                                            {{ $property->fp_plot_price ? $property->fp_plot_price : '-' }}
                                                        </div>
                                                    </div> --}}
                                                @endif

                                                @if ($type == 'Flat' || $type == 'Penthouse' || $type == 'Office' || $type == 'Retail')
                                                    <div class="form-group col-4 m-b-10 data_conent_129">
                                                        <h6><b>Service Elavator</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_129">
                                                        <div>: {{ $property->service_elavator ? 'Yes' : 'No' }}</div>
                                                    </div>
                                                @endif

                                                @if ($type == 'Flat' || $type == 'Vila/Bunglow' || $type == 'Penthouse' || $type == 'Farmhouse')
                                                    <div class="form-group col-4 m-b-10 data_conent_130">
                                                        <h6><b>Servant Room</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_130">
                                                        <div>: {{ $property->servant_room ? 'Yes' : 'No' }}</div>
                                                    </div>
                                                @endif

                                                @if ($type == 'Office' || $type == 'Retail' || $type == 'Flat' || $type == 'Penthouse')
                                                    <div class="form-group col-4 m-b-10 data_conent_131">
                                                        <h6><b>Carpet Area</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_131">

                                                        <div>:
                                                            @if (
                                                                !empty(explode('_-||-_', $property->carpet_area)[0]) &&
                                                                    !empty($dropdowns[explode('_-||-_', $property->carpet_area)[1]]['name']))
                                                                {{ explode('_-||-_', $property->carpet_area)[0] . ' ' . $dropdowns[explode('_-||-_', $property->carpet_area)[1]]['name'] }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endif
                                                @if ($type == 'Office' || $type == 'Retail' || $type == 'Flat' || $type == 'Land/Plot' || $type == 'Penthouse')
                                                    <div class="form-group col-4 m-b-10 data_conent_132">
                                                        <h6><b>Salable Area</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_132">:

                                                        @if (
                                                            !empty(explode('_-||-_', $property->salable_area)[0]) &&
                                                                !empty($dropdowns[explode('_-||-_', $property->salable_area)[1]]['name']))
                                                            {{ explode('_-||-_', $property->salable_area)[0] . ' ' . $dropdowns[explode('_-||-_', $property->salable_area)[1]]['name'] }}
                                                        @endif
                                                    </div>
                                                @endif
                                                @if ($type == 'Storage/industrial' || $type == 'Vila/Bunglow' || $type == 'Land/Plot' || $type == 'Farmhouse')
                                                    <div class="form-group col-4 m-b-10 data_conent_133">
                                                        <h6><b>Carpet Plot Area</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_133">:

                                                        @if (
                                                            !empty(explode('_-||-_', $property->carpet_plot_area)[0]) &&
                                                                !empty($dropdowns[explode('_-||-_', $property->carpet_plot_area)[1]]['name']))
                                                            {{ explode('_-||-_', $property->carpet_plot_area)[0] . ' ' . $dropdowns[explode('_-||-_', $property->carpet_plot_area)[1]]['name'] }}
                                                        @endif
                                                    </div>
                                                @endif
                                                @if ($type == 'Storage/industrial' || $type == 'Vila/Bunglow' || $type == 'Farmhouse')
                                                    <div class="form-group col-4 m-b-10 data_conent_134">
                                                        <h6><b>Salable Plot Area</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_134">:

                                                        @if (
                                                            !empty(explode('_-||-_', $property->salable_plot_area)[0]) &&
                                                                !empty($dropdowns[explode('_-||-_', $property->salable_plot_area)[1]]['name']))
                                                            {{ explode('_-||-_', $property->salable_plot_area)[0] . ' ' . $dropdowns[explode('_-||-_', $property->salable_plot_area)[1]]['name'] }}
                                                        @endif
                                                    </div>
                                                @endif
                                                @if ($type == 'Storage/industrial' || $type == 'Vila/Bunglow' || $type == 'Farmhouse')
                                                    <div class="form-group col-4 m-b-10 data_conent_135">
                                                        <h6><b>Constructed Salable Area</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_135">:

                                                        @if (
                                                            !empty(explode('_-||-_', $property->constructed_salable_area)[0]) &&
                                                                !empty($dropdowns[explode('_-||-_', $property->constructed_salable_area)[1]]['name']))
                                                            {{ explode('_-||-_', $property->constructed_salable_area)[0] . ' ' . $dropdowns[explode('_-||-_', $property->constructed_salable_area)[1]]['name'] }}
                                                        @endif
                                                    </div>
                                                @endif
                                                @if ($type == 'Storage/industrial' || $type == 'Vila/Bunglow' || $type == 'Farmhouse')
                                                    <div class="form-group col-4 m-b-10 data_conent_136">
                                                        <h6><b>Constructed Carpet Area</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_136">:

                                                        @if (
                                                            !empty(explode('_-||-_', $property->constructed_carpet_area)[0]) &&
                                                                !empty($dropdowns[explode('_-||-_', $property->constructed_carpet_area)[1]]['name']))
                                                            {{ explode('_-||-_', $property->constructed_carpet_area)[0] . ' ' . $dropdowns[explode('_-||-_', $property->constructed_carpet_area)[1]]['name'] }}
                                                        @endif
                                                    </div>
                                                @endif
                                                @if ($type == 'Vila/Bunglow' || $type == 'Farmhouse')
                                                    <div class="form-group col-4 m-b-10 data_conent_137">
                                                        <h6><b>Constructed Builtup Area</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_137">:

                                                        @if (
                                                            !empty(explode('_-||-_', $property->constructed_builtup_area)[0]) &&
                                                                !empty($dropdowns[explode('_-||-_', $property->constructed_builtup_area)[1]]['name']))
                                                            {{ explode('_-||-_', $property->constructed_builtup_area)[0] . ' ' . $dropdowns[explode('_-||-_', $property->constructed_builtup_area)[1]]['name'] }}
                                                        @endif
                                                    </div>
                                                @endif
                                                @if ($type == 'Penthouse' || $type == 'Flat')
                                                    <div class="form-group col-4 m-b-10 data_conent_138">
                                                        <h6><b>Builtup Area</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_138">:

                                                        @if (
                                                            !empty(explode('_-||-_', $property->builtup_area)[0]) &&
                                                                !empty($dropdowns[explode('_-||-_', $property->builtup_area)[1]]['name']))
                                                            {{ explode('_-||-_', $property->builtup_area)[0] . ' ' . $dropdowns[explode('_-||-_', $property->builtup_area)[1]]['name'] }}
                                                        @endif
                                                    </div>
                                                @endif

                                                @if ($type == 'Penthouse' || ($type == 'Flat' && $property->is_terrace != 0))
                                                    <div class="form-group col-4 m-b-10 data_conent_139">
                                                        <h6><b>Terrace Carpet Area</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_139">:

                                                        @if (
                                                            !empty(explode('_-||-_', $property->terrace_carpet_area)[0]) &&
                                                                !empty($dropdowns[explode('_-||-_', $property->terrace_carpet_area)[1]]['name']))
                                                            {{ explode('_-||-_', $property->terrace_carpet_area)[0] . ' ' . $dropdowns[explode('_-||-_', $property->terrace_carpet_area)[1]]['name'] }}
                                                        @endif
                                                    </div>
                                                @endif

                                                @if ($type == 'Penthouse' || ($type == 'Flat' && $property->is_terrace != 0))
                                                    <div class="form-group col-4 m-b-10 data_conent_140">
                                                        <h6><b>Terrace Salable Area</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_140">:

                                                        @if (
                                                            !empty(explode('_-||-_', $property->terrace_salable_area)[0]) &&
                                                                !empty($dropdowns[explode('_-||-_', $property->terrace_salable_area)[1]]['name']))
                                                            {{ explode('_-||-_', $property->terrace_salable_area)[0] . ' ' . $dropdowns[explode('_-||-_', $property->terrace_salable_area)[1]]['name'] }}
                                                        @endif
                                                    </div>
                                                @endif
                                                <div class="form-group col-4 m-b-10 data_conent_141">
                                                    <h6><b>Hot Property</b></h6>
                                                </div>
                                                <div class="form-group col-8 m-b-10 data_conent_141">
                                                    <div>: {{ $property->hot_property ? 'Yes' : 'No' }}</div>
                                                </div>
                                                <div class="form-group col-4 m-b-10 data_conent_142">
                                                    <h6><b>Favourite</b></h6>
                                                </div>
                                                <div class="form-group col-8 m-b-10 data_conent_142">
                                                    <div>: {{ $property->is_favourite ? 'Yes' : 'No' }}</div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <h5 class="border-style">Other Details</h5>
                                                </div>
                                                @if ($type != 'Land/Plot' && $type != 'Plot/Land')
                                                    <div class="form-group col-4 m-b-10 data_conent_143">
                                                        <h6><b>FourWheeler Parking</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_143">
                                                        <div>:
                                                            {{ $property->fourwheller_parking ? $property->fourwheller_parking : '-' }}
                                                        </div>
                                                    </div>
                                                    @if ($type != 'Vila/Bunglow')
                                                        <div class="form-group col-4 m-b-10 data_conent_144">
                                                            <h6><b>TwoWheeler Parking </b></h6>
                                                        </div>
                                                        <div class="form-group col-8 m-b-10 data_conent_144">
                                                            <div>:
                                                                {{ $property->twowheeler_parking ? $property->twowheeler_parking : '-' }}
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endif
                                                <div class="form-group col-4 m-b-10 data_conent_145">
                                                    <h6><b>Refrence </b></h6>
                                                </div>
                                                <div class="form-group col-8 m-b-10 data_conent_145">
                                                    <div>:
                                                        {{ $property->property_source_refrence ? $property->property_source_refrence : '-' }}
                                                    </div>
                                                </div>
                                                <div class="form-group col-4 m-b-10 data_conent_146">
                                                    <h6><b>Priority</b></h6>
                                                </div>
                                                <div class="form-group col-8 m-b-10 data_conent_146">
                                                    <div>:
                                                        {{ isset($dropdowns[$property->Property_priority]['name']) ? $dropdowns[$property->Property_priority]['name'] : '-' }}
                                                    </div>
                                                </div>
                                                <div class="form-group col-4 m-b-10 data_conent_147">
                                                    <h6><b>Source</b></h6>
                                                </div>
                                                <div class="form-group col-8 m-b-10 data_conent_147">
                                                    <div>:
                                                        {{ isset($dropdowns[$property->source_of_property]['name']) ? $dropdowns[$property->source_of_property]['name'] : '-' }}
                                                    </div>
                                                </div>
                                                <div class="form-group col-4 m-b-10 data_conent_148">
                                                    <h6><b>Pre-Leased</b></h6>
                                                </div>
                                                <div class="form-group col-8 m-b-10 data_conent_148">
                                                    <div>:{{ $property->is_pre_leased ? 'Yes' : 'No' }}</div>
                                                </div>
                                                <div class="form-group col-4 m-b-10 data_conent_149">
                                                    <h6><b>Pre-Leased Remarks</b></h6>
                                                </div>
                                                <div class="form-group col-8 m-b-10 data_conent_149">
                                                    <div>:
                                                        {{ $property->pre_leased_remarks ? $property->pre_leased_remarks : '-' }}
                                                    </div>
                                                </div>
												<div class="form-group col-4 m-b-10 data_conent_79">
													<h6><b>Location Link</b></h6>
												</div>
												<div class="form-group col-8 m-b-10 data_conent_79">
													<div>:
														{{-- {{ $property->location_link ? $property->location_link : '-' }} --}}
														<a href="{{ $property->location_link ? $property->location_link : '#' }}" target="_blank">
															<i class="cursor-pointer color-code-popover" data-bs-trigger="hover focus">  check on map  </i>
														</a>
													</div>
												</div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade " id="v-property-price" role="tabpanel"
                                            aria-labelledby="v-property-price-tab">.
											@if ($type === "Plot/Land" || $type === "Land/Plot")
												<div class="row">
                                                    <div class="form-group col-md-12">
                                                        <h5 class="border-style">Unit Details</h5>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <table class="table custom-table-design">
															<thead>
																<tr>
																	<th scope="col">Survey No.</th>
																	<th scope="col">FP No.</th>
																	<th scope="col">TP No.</th>
																	<th scope="col">Survey Price</th>
																	<th scope="col">FP Price</th>
																</tr>
															</thead>
															<tbody>
																<td>{{ isset($property->survey_number) ? $property->survey_number : '-' }}</td>
																<td>{{ isset($property->fp_number) ? $property->fp_number : '-' }}</td>
																<td>{{ isset($property->tp_number) ? $property->tp_number : '-' }}</td>
																<td>{{ isset($property->survey_price) ? $property->survey_price : '-' }}</td>
																<td>{{ isset($property->fp_plot_price) ? $property->fp_plot_price : '-' }}</td>
															</tbody>
														</table>
                                                    </div>

                                                </div>
                                            @endif
                                        </div>
                                        <div class="tab-pane fade " id="v-property-owner" role="tabpanel"
                                            aria-labelledby="v-property-owner-tab">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <h5 class="border-style">Owner Information</h5>
                                                </div>
                                                <div class="form-group col-4 m-b-10 data_conent_150">
                                                    <h6 for="Client Name"><b>Owner</b></h6>
                                                </div>
                                                <div class="form-group col-8 m-b-10 data_conent_150">
                                                    <div>:
                                                        {{ isset($dropdowns[$property->owner_is]['name']) ? $dropdowns[$property->owner_is]['name'] : '' }}
                                                    </div>
                                                </div>
                                                <div class="form-group col-4 m-b-10 data_conent_151">
                                                    <h6><b>Name</b></h6>
                                                </div>
                                                <div class="form-group col-8 m-b-10 data_conent_151">
                                                    <div>:
                                                       {{ $property->owner_name ? $property->owner_name : '-' }}
                                                    </div>
                                                </div>
                                                <div class="form-group col-4 m-b-10 data_conent_152">
                                                    <h6><b>Mobile</b></h6>
                                                </div>
                                                <div class="form-group col-8 m-b-10 data_conent_152">
                                                    <div>:
                                                        {{ $property->owner_contact ? $property->owner_contact : '-' }}
                                                    </div>
                                                </div>
                                                <div class="form-group col-4 m-b-10 data_conent_153">
                                                    <h6><b>NRI</b></h6>
                                                </div>
                                                <div class="form-group col-8 m-b-10 data_conent_153">
                                                    <div>:{{ $property->is_nri ? 'Yes' : 'No' }}</div>
                                                </div>
                                                <div class="form-group col-4 m-b-10 data_conent_154">
                                                    <h6><b>Email</b></h6>
                                                </div>
                                                <div class="form-group col-8 m-b-10 data_conent_154">
                                                    <div>:{{ $property->owner_email ? $property->owner_email : '-' }}
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <h5 class="border-style">Other Conatct Details</h5>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <table class="table custom-table-design">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Name</th>
                                                                <th scope="col">Contact</th>
																<th scope="col">Designation</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                        <tbody>
                                                            @if (isset(json_decode($property->other_contact_details)[0]))
                                                                @forelse (json_decode($property->other_contact_details) as $value)
                                                                    <tr>
																		<td>{{ isset($value[0]) ? $value[0] : '-' }}</td>
																		<td>{{ isset($value[1]) ? $value[1] : '-' }}</td>
																		<td>{{ isset($value[2]) ? $value[2] : '-' }}</td>
																	</tr>
                                                                @empty
                                                                @endforelse
                                                            @endif

                                                        </tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                {{-- @if ($type !== 'Land/Plot' && $type !== 'Plot/Land' && $type !== 'Storage/industrial')
                                                    <div class="form-group col-md-12">
                                                        <h5 class="border-style">Care Taker Information</h5>
                                                    </div>

                                                    <div class="form-group col-4 m-b-10 data_conent_155">
                                                        <h6><b>Care Taker Name</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_155">
                                                        <div>
                                                            {{ $property->care_taker_name ? $property->care_taker_name : '-' }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-4 m-b-10 data_conent_156">
                                                        <h6><b>Care Taker Number</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_156">
                                                        <div>
                                                            {{ $property->care_taker_contact ? $property->care_taker_contact : '-' }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-4 m-b-10 data_conent_157">
                                                        <h6><b>Key Available At</b></h6>
                                                    </div>
                                                    <div class="form-group col-8 m-b-10 data_conent_157">
                                                        <div>
                                                            {{ $property->key_available_at ? $property->key_available_at : '-' }}
                                                        </div>
                                                    </div>
                                                @endif --}}

                                            </div>
                                        </div>

                                        {{-- multiple image --}}

                                        <div class="modal fade" id="imageModel" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Property Image</h5>
                                                        <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                            aria-label="Close"> </button>
                                                    </div>
                                                    @foreach ($multiple_image as $image)
                                                        <div class="modal-body">
                                                            <div id="banner" class="clearfix">

                                                                @php
                                                                    $path = pathinfo($image->image, PATHINFO_EXTENSION);
                                                                    $array = ['tif', 'tiff', 'bmp', 'jpg', 'jpeg', 'png', 'eps'];
                                                                @endphp
                                                                @if ($path == 'jpg' || $path == 'jpeg' || $path == 'png')
                                                                    <div class="">
                                                                        <img src="{{ asset('/upload/land_images/' . $image->image) }}"
                                                                            alt="" width="500" height="300"
                                                                            style="margin-left: 15%;
                                                                ">
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Property Documents
                                                        </h5>
                                                        <button class="btn-close" type="button" data-bs-dismiss="modal">
                                                        </button>
                                                    </div>
                                                    @foreach ($multiple_image as $image)
                                                        <div class="modal-body">
                                                            <div id="banner">

                                                                @php
                                                                    $path = pathinfo($image->image, PATHINFO_EXTENSION);
                                                                    $array = ['tif', 'tiff', 'bmp', 'jpg', 'jpeg', 'png', 'eps'];
                                                                @endphp
                                                                @if ($path == 'jpg' || $path == 'jpeg' || $path == 'png')
                                                                @else
                                                                    <div class="zoom">
                                                                        <a
                                                                            href="{{ asset('/upload/land_images/' . $image->image) }}">{{ $image->image }}</a>

                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="v-enquiry-matching" role="tabpanel"
                                            aria-labelledby="v-enquiry-matching-tab">
                                            <h5 class="border-style">Matching Enquiry</h5>
                                            <br>
                                            <div class="form-group">
                                                <table class="table table-responsive custom-table-design mb-3">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Client Name</th>
                                                            <th scope="col">Mobile</th>
                                                            <th scope="col">For</th>
                                                            <th scope="col">Budget</th>

                                                        </tr>
                                                    </thead>

                                                    <tbody id="matching_container">

                                                        @forelse ($enquiries as $value)
                                                            <tr>
                                                                <td>{{ $value->client_name }}</td>
                                                                <td>{{ $value->client_mobile }}</td>
                                                                <td>{{ $value->enquiry_for }}</td>
                                                                <td>{{ $value->budget_to }}</td>
                                                            </tr>
                                                        @empty
                                                        @endforelse


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-property-viewer" role="tabpanel"
                                            aria-labelledby="v-property-viewer-tab">
                                            <h5 class="border-style">Property Viewer</h5>
                                            <br>
                                            <div class="form-group">
                                                <table class="table table-responsive custom-table-design mb-3">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Client Name</th>
                                                            <th scope="col">Activity</th>
                                                            <th scope="col">Date</th>

                                                        </tr>
                                                    </thead>

                                                    <tbody>

                                                        @forelse ($visits as $value)
                                                            <tr>
                                                                <td>{{ $value->Enquiry->client_name ? $value->Enquiry->client_name : '-' }}
                                                                </td>
                                                                <td>{{ 'Visit ' . $value->visit_status ? 'Visit ' . $value->visit_status : '-' }}
                                                                </td>
                                                                <td>{{ \Carbon\Carbon::parse($value->visit_date)->format('d-m-Y g:i A') }}
                                                            </tr>
                                                        @empty
                                                        @endforelse


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="propertyModal" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Property</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"> </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-bookmark needs-validation modal_form" method="post" id="modal_form"
                            novalidate="">
                            <input type="hidden" name="this_data_id" id="this_data_id">
                            <div>
                                <div class="row">
                                    <h5 class="border-style">Information</h5>
                                    <div class="form-group col-md-1 m-b-4 mb-3">
                                        <select class="form-select" name="property_for" id="property_for">
                                            <option value="">For</option>
                                            <option value="Rent">Rent</option>
                                            <option value="Sell">Sell</option>
                                            <option value="Both">Both</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2 m-b-4 mb-3">
                                        <select class="form-select" name="property_type" id="property_type">
                                            <option value="">Property Type</option>
                                            @forelse ($dropdowns as $props)
                                                @if ($props['dropdown_for'] == 'property_construction_type' && in_array($props['id'], $prop_type))
                                                    <option data-parent_id="{{ $props['parent_id'] }}"
                                                        value="{{ $props['id'] }}">{{ $props['name'] }}
                                                    </option>
                                                @endif
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2 m-b-4 mb-3">
                                        <select class="form-select" name="specific_type" id="specific_type">
                                            <option value="">Category</option>
                                            @forelse ($dropdowns as $props)
                                                @if ($props['dropdown_for'] == 'property_specific_type' && in_array($props['parent_id'], $prop_type))
                                                    <option data-parent_id="{{ $props['parent_id'] }}"
                                                        value="{{ $props['id'] }}">{{ $props['name'] }}
                                                    </option>
                                                @endif
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group col-md-1 m-b-10">
                                        <label for="Wing">Wing</label>
                                        <input class="form-control" name="property_wing" id="property_wing"
                                            type="text" autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-1 m-b-10">
                                        <label for="Unit No">Unit No</label>
                                        <input class="form-control" name="property_unit_no" id="property_unit_no"
                                            type="text" autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-2 m-b-4 mb-4">
                                        <select class="form-select" name="building_id" id="building_id">
                                            <option value="">Project</option>
                                            @foreach ($projects as $building)
                                                <option data-addr="{{ $building->address }}"
                                                    value="{{ $building->id }}">
                                                    {{ $building->project_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 m-b-4 mb-3">
                                        <label for="Building Addresss">Building Address</label>
                                        <input class="form-control" type="text" value=""
                                            name="show_building_address" id="show_building_address" disabled>
                                    </div>
                                    <div class="form-group col-md-2 m-b-10">
                                        <select class="form-select" id="configuration">
                                            <option value="">Configuration</option>
                                            @forelse (config('constant.property_configuration') as $key=>$props)
                                                <option value="{{ $key }}">{{ $props }}
                                                </option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2 m-b-10">
                                        <select class="form-select" id="property_status">
                                            <option value=""> Status</option>
                                            <option value="Active">Active</option>
                                            <option value="InActive">InActive</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <div class="form-group col-md-7 m-b-10">
                                                <label for="Carpet Area">Carpet Area</label>
                                                <input class="form-control" name="carpet_area" id="carpet_area"
                                                    type="text" autocomplete="off">
                                            </div>
                                            <div class="input-group-append col-md-5 m-b-10">
                                                <div class="form-group form_measurement">
                                                    <select class="form-select measure_select" id="carpet_measurement">
                                                        @forelse ($dropdowns as $props)
                                                            @if ($props['dropdown_for'] == 'property_measurement_type')
                                                                <option @if ($props['id'] == Session::get('default_measurement')) selected @endif
                                                                    data-parent_id="{{ $props['parent_id'] }}"
                                                                    value="{{ $props['id'] }}">{{ $props['name'] }}
                                                                </option>
                                                            @endif
                                                        @empty
                                                        @endforelse
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <div class="form-group col-md-7 m-b-10">
                                                <label for="Super Builtup Area">Salable Area</label>
                                                <input class="form-control" name="super_builtup_area"
                                                    id="super_builtup_area" type="text" autocomplete="off">
                                            </div>
                                            <div class="input-group-append col-md-5 m-b-10">
                                                <div class="form-group form_measurement">
                                                    <select class="form-select measure_select"
                                                        id="super_builtup_measurement">
                                                        @forelse ($dropdowns as $props)
                                                            @if ($props['dropdown_for'] == 'property_measurement_type')
                                                                <option @if ($props['id'] == Session::get('default_measurement')) selected @endif
                                                                    data-parent_id="{{ $props['parent_id'] }}"
                                                                    value="{{ $props['id'] }}">{{ $props['name'] }}
                                                                </option>
                                                            @endif
                                                        @empty
                                                        @endforelse
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <div class="form-group col-md-7 m-b-10">
                                                <label for="Plot Area">Plot Area</label>
                                                <input class="form-control" name="plot_area" id="plot_area"
                                                    type="text" autocomplete="off">
                                            </div>
                                            <div class="input-group-append col-md-5 m-b-10">
                                                <div class="form-group form_measurement">
                                                    <select class="form-select measure_select" id="plot_measurement">
                                                        @forelse ($dropdowns as $props)
                                                            @if ($props['dropdown_for'] == 'property_measurement_type')
                                                                <option @if ($props['id'] == Session::get('default_measurement')) selected @endif
                                                                    data-parent_id="{{ $props['parent_id'] }}"
                                                                    value="{{ $props['id'] }}">{{ $props['name'] }}
                                                                </option>
                                                            @endif
                                                        @empty
                                                        @endforelse
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <div class="form-group col-md-7 m-b-10">
                                                <label for="Terrace">Terrace</label>
                                                <input class="form-control" name="terrace" id="terrace" type="text"
                                                    autocomplete="off">
                                            </div>
                                            <div class="input-group-append col-md-5 m-b-10">
                                                <div class="form-group form_measurement">
                                                    <select class="form-select measure_select" id="terrace_measuremnt">
                                                        @forelse ($dropdowns as $props)
                                                            @if ($props['dropdown_for'] == 'property_measurement_type')
                                                                <option @if ($props['id'] == Session::get('default_measurement')) selected @endif
                                                                    data-parent_id="{{ $props['parent_id'] }}"
                                                                    value="{{ $props['id'] }}">{{ $props['name'] }}
                                                                </option>
                                                            @endif
                                                        @empty
                                                        @endforelse
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-check checkbox  checkbox-solid-success mb-0 col-md-2">
                                        <input class="form-check-input" id="hot_property" type="checkbox">
                                        <label class="form-check-label" for="hot_property">Hot </label>
                                    </div>
                                    <div class="form-check checkbox  checkbox-solid-success mb-0 col-md-2 m-b-10">
                                        <input class="form-check-input" id="share_to_others" type="checkbox">
                                        <label class="form-check-label" for="share_to_others">Share To Others</label>
                                    </div>
                                    <div class="form-check checkbox  checkbox-solid-success mb-0 col-md-2 m-b-10">
                                        <input class="form-check-input" id="is_favourite" type="checkbox">
                                        <label class="form-check-label" for="is_favourite">Favourite</label>
                                    </div>

                                    <h5 class="border-style">Other Details</h5>
                                    <div class="form-group col-md-2 m-b-4">
                                        <select class="form-select" id="furnished_status">
                                            <option value="">Furnished Status</option>
                                            @forelse ($dropdowns as $props)
                                                @if ($props['dropdown_for'] == 'property_furniture_type')
                                                    <option data-parent_id="{{ $props['parent_id'] }}"
                                                        value="{{ $props['id'] }}">{{ $props['name'] }}
                                                    </option>
                                                @endif
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2 m-b-10">
                                        <label for="Four Wheeler Parking">Four Wheeler Parking</label>
                                        <input class="form-control" name="fourwheller_parking" id="fourwheller_parking"
                                            type="text" autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-2 m-b-10">
                                        <label for="Two Wheeler Parking">Two Wheeler Parking</label>
                                        <input class="form-control" name="twowheeler_parking" id="twowheeler_parking"
                                            type="text" autocomplete="off">
                                    </div>

                                    <div class="form-group col-md-2 m-b-10">
                                        <label for="Refrence">Refrence</label>
                                        <input class="form-control" name="if_any_refrence" id="if_any_refrence"
                                            type="text" autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-2 m-b-4">
                                        <select class="form-select" id="Property_priority">
                                            <option value="">Priority</option>
                                            @forelse ($dropdowns as $props)
                                                @if ($props['dropdown_for'] == 'property_priority_type')
                                                    <option data-parent_id="{{ $props['parent_id'] }}"
                                                        value="{{ $props['id'] }}">{{ $props['name'] }}
                                                    </option>
                                                @endif
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2 m-b-4">
                                        <select class="form-select" id="source_of_property">
                                            <option value="">Source</option>
                                            @forelse ($dropdowns as $props)
                                                @if ($props['dropdown_for'] == 'property_source')
                                                    <option data-parent_id="{{ $props['parent_id'] }}"
                                                        value="{{ $props['id'] }}">{{ $props['name'] }}
                                                    </option>
                                                @endif
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-check checkbox  checkbox-solid-success col-md-2 m-b-10">
                                        <input class="form-check-input" id="is_pre_leased" type="checkbox">
                                        <label class="form-check-label" for="is_pre_leased">Pre-leased</label>
                                    </div>
                                    <div class="form-group col-md-8 m-b-10">
                                        <label for="Pre Leased Remarks">Pre-Leased Remarks</label>
                                        <input class="form-control" name="pre_leased_remarks" id="pre_leased_remarks"
                                            type="text" autocomplete="off">
                                    </div>

                                    <h5 class="border-style">Price And Remark</h5>
                                    <div class="form-group col-md-4 m-b-10">
                                        <label for="Price">Price</label>
                                        <input class="form-control" name="price" id="price" type="text"
                                            autocomplete="off">
                                    </div>

                                    <div class="form-group col-md-6 m-b-10">
                                        <label for="Remarks">Remarks</label>
                                        <input class="form-control" name="property_remarks" id="property_remarks"
                                            type="text" autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-6 m-b-10">
                                        <label for="Link">Location Link</label>
                                        <input class="form-control" name="property_link" id="property_link"
                                            type="text" autocomplete="off">
                                    </div>

                                    <h5 class="border-style"> Owner Information</h5>
                                    <div class="form-group col-md-2 m-b-4 mb-3">
                                        <select class="form-select" id="owner_is">
                                            <option value="">Owner is</option>
                                            @forelse ($dropdowns as $props)
                                                @if ($props['dropdown_for'] == 'property_owner_type')
                                                    <option data-parent_id="{{ $props['parent_id'] }}"
                                                        value="{{ $props['id'] }}">{{ $props['name'] }}
                                                    </option>
                                                @endif
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 m-b-10">
                                        <label for="Owner Name">Name</label>
                                        <input class="form-control" name="owner_info_name" id="owner_info_name"
                                            type="text" autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-2 m-b-10">
                                        <label for="Owner Contact Specific No">Contact</label>
                                        <input class="form-control" name="owner_contact_specific_no"
                                            id="owner_contact_specific_no" type="text" autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-3 m-b-10">
                                        <label for="Email">Email</label>
                                        <input class="form-control" name="property_email" id="property_email"
                                            type="text" autocomplete="off">
                                    </div>

                                    <div class="form-check checkbox  checkbox-solid-success mb-0 col-md-1 m-b-10">
                                        <input class="form-check-input" id="is_nri" type="checkbox">
                                        <label class="form-check-label" for="is_nri">NRI</label>
                                    </div>


                                    <h5 class="border-style">Other Contact Details</h5>
                                    <div><button type="button" class="btn mb-3 btn-primary btn-air-primary"
                                            id="add_owner_contacts">Add Contact</button></div>
                                    <div class="row" id="all_owner_contacts">

                                    </div>

                                    <h5 class="border-style">Unit Detail(s)</h5>
                                    <div><button class="btn mb-3 btn-primary btn-air-primary" type="button"
                                            id="add_units">Add Units</button></div>
                                    <div class="row" id="all_units">

                                    </div>

                                    {{-- <h5 class="border-style"> Care Taker Information</h5>
                                    <div class="form-group col-md-4 m-b-10">
                                        <label for="Care Take Name">Care Taker Name</label>
                                        <input class="form-control" name="care_take_name" id="care_take_name"
                                            type="text" autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-4 m-b-10">
                                        <label for="Care Take Contact No">Care Taker Contact No</label>
                                        <input class="form-control" name="care_take_contact_no" id="care_take_contact_no"
                                            type="text" autocomplete="off">
                                    </div> --}}
                                    <div class="form-group col-md-3 m-b-4 mt-1">
                                        <select class="form-select" id="key_arrangement">
                                            <option value=""> Key Available At</option>
                                            <option value="Office">Office</option>
                                            <option value="Owner">Owner</option>
                                            <option value="Caretaker">Care Taker</option>
                                        </select>
                                    </div>

                                    <div style="display: none" class="form-group col-md-3 m-b-10">
                                        <label for="nfd" class="label-center">Reminder Date:</label>
                                    </div>
                                    <div style="display: none" class="form-group col-md-4 m-b-10">
                                        <input class="form-control " id="reminder" name="reminder"
                                            type="datetime-local" placeholder="Reminder Date">
                                    </div>

                                </div>
                            </div>

                            @if (Auth::user()->can('property-edit') || Auth::user()->can('property-create'))
                                <button class="btn btn-secondary" id="saveProperty">Save</button>
                            @endif
                            <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @push('scripts')
        <script>
            function showfile(event) {
                event.preventDefault(); // Prevent the default behavior of the link

                var link = event.target; // Get the clicked <a> tag
                var href = link.getAttribute('value'); // Get the value of the 'href' attribute

                console.log(href); // Output the 'href' value in the browser console or perform further actions

                var newTab = window.open(href, '_blank');
                newTab.opener = null;

            }
            for (let i = 1; i < 159; i++) {
                if ($('.data_conent_' + i).length > 1) {
                    var strr = $($('.data_conent_' + i)[1]).html()
                    strr = strr.replaceAll("<div>", "");
                    strr = strr.replaceAll("</div>", "");
                    strr = strr.replaceAll("-", "");
                    strr = strr.replaceAll(":", "");
                    strr = strr.replaceAll("No", "");
                    strr = strr.trim();
                    if (strr == '') {
                        $('.data_conent_' + i).hide()
                    }
                }
            }

            function getProperty() {
                $('#modal_form').trigger("reset");
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.getProperty') }}",
                    data: {
                        id: '{{ $property->id }}',
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        data = JSON.parse(data);
                        $('#property_for').val(data.property_for).trigger('change');
                        $('#property_type').val(data.property_type).trigger('change');
                        $('#specific_type').val(data.specific_type).trigger('change');
                        $('#building_id').val(data.building_id).trigger('change');
                        $('#is_favourite').prop('checked', Number(data.is_favourite));
                        $('#property_wing').val(data.property_wing);
                        $('#property_unit_no').val(data.property_unit_no);
                        $('#configuration').val(data.configuration).trigger('change');;
                        $('#property_status').val(data.property_status).trigger('change');;
                        $('#carpet_area').val(data.carpet_area);
                        $('#carpet_measurement').val(data.carpet_measurement).trigger('change');;
                        $('#super_builtup_area').val(data.super_builtup_area);
                        $('#super_builtup_measurement').val(data.super_builtup_measurement).trigger('change');;
                        $('#plot_area').val(data.plot_area);
                        $('#plot_measurement').val(data.plot_measurement).trigger('change');;
                        $('#terrace').val(data.terrace);
                        $('#terrace_measuremnt').val(data.terrace_measuremnt).trigger('change');;
                        $('#hot_property').prop('checked', Number(data.hot_property));
                        $('#share_to_others').prop('checked', Number(data.share_to_others));
                        $('#furnished_status').val(data.furnished_status).trigger('change');;
                        $('#fourwheller_parking').val(data.fourwheller_parking);
                        $('#property_link').val(data.property_link);
                        $('#twowheeler_parking').val(data.twowheeler_parking);
                        $('#source_of_property').val(data.source_of_property).trigger('change');;
                        $('#if_any_refrence').val(data.if_any_refrence);
                        $('#is_pre_leased').prop('checked', Number(data.is_pre_leased));
                        $('#pre_leased_remarks').val(data.pre_leased_remarks);
                        $('#price').val(data.price);
                        $('#property_remarks').val(data.property_remarks);
                        $('#owner_is').val(data.owner_is).trigger('change');;
                        $('#property_email').val(data.property_email);
                        $('#owner_info_name').val(data.owner_info_name);
                        $('#owner_contact_specific_no').val(data.owner_contact_specific_no);
                        $('#is_nri').prop('checked', Number(data.is_nri));
                        $('#care_take_name').val(data.care_take_name);
                        $('#care_take_contact_no').val(data.care_take_contact_no);
                        $('#key_arrangement').val(data.key_arrangement).trigger('change');
                        $('#Property_priority').val(data.Property_priority).trigger('change');
                        $('#reminder').val(data.reminder)
                        $('#propertyModal').modal('show');
                        $('#all_owner_contacts').html('')
                        $('#all_units').html('')
                        if (data.owner_details != '') {
                            details = JSON.parse(data.owner_details);
                            if ((details != null) && (details.length > 0)) {
                                for (let i = 0; i < details.length; i++) {
                                    id = makeid(10);
                                    $('#all_owner_contacts').append(generate_contact_detail(id))
                                    $("[data-contact_id=" + id + "] select[name=owner_status]").select2()
                                    $("[data-contact_id=" + id + "] input[name=owner_name]").val(details[i][0]);
                                    $("[data-contact_id=" + id + "] input[name=owner_contact_no]").val(details[i][
                                        1
                                    ]);
                                    $("[data-contact_id=" + id + "] select[name=owner_status]").val(details[i][2])
                                        .trigger('change');
                                }
                            }
                        }
                        if (data.unit_details != '') {
                            details = JSON.parse(data.unit_details);
                            if ((details != null) && (details.length > 0)) {

                                for (let i = 0; i < details.length; i++) {
                                    id = makeid(10);
                                    $('#all_units').append(generate_unit_detail(id))
                                    $("[data-unit_id=" + id + "] select[name=unit_status]").select2()
                                    $("[data-unit_id=" + id + "] select[name=furnished_status]").select2()
                                    $("[data-unit_id=" + id + "] input[name=wing]").val(details[i][0]);
                                    $("[data-unit_id=" + id + "] input[name=unit_unit_no]").val(details[i][1]);
                                    $("[data-unit_id=" + id + "] select[name=unit_status]").val(details[i][2])
                                        .trigger('change');
                                    $("[data-unit_id=" + id + "] input[name=price]").val(details[i][3]);
                                    $("[data-unit_id=" + id + "] select[name=furnished_status]").val(details[i][4])
                                        .trigger('change');
                                }
                            }
                        }
                        $('#show_building_address').val($('#building_id').find(":selected").attr('data-addr'));
                        triggerChangeinput()
                    }
                });
            }

            function image() {
                $('#imageModel').modal('show');

            }

            function makeid(length) {
                var result = '';
                var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                var charactersLength = characters.length;
                for (var i = 0; i < length; i++) {
                    result += characters.charAt(Math.floor(Math.random() * charactersLength));
                }
                return result;
            }

            function generate_contact_detail(id) {
                var myvar = '<div data-contact_id= ' + id + ' class="form-group col-md-3 m-b-10">' +
                    '       <input class="form-control" name="owner_name" type="text"' +
                    '            autocomplete="off" placeholder="Name">' +
                    '     </div>' +
                    '     <div data-contact_id= ' + id +
                    ' class="form-group col-md-3 m-b-10">' +
                    '       <input class="form-control" name="owner_contact_no"' +
                    '           type="text"  autocomplete="off"' +
                    '           placeholder="Contact No.">' +
                    '   </div>' +
                    '       <div data-contact_id= ' + id +
                    ' class="form-group col-md-3 m-b-4 mb-3">' +
                    '    <select class="form-select" name="owner_status">' +
                    '     <option value="">Contact Status</option>' +
                    '    <option value="Contactable">Contactable</option>' +
                    '     <option value="Not Contactable">Not Contactable</option>' +
                    '  </select>  </div>' +
                    '<div data-contact_id= ' + id +
                    ' class="form-group col-md-3 m-b-4 mb-3"><button data-contact_id=' + id +
                    ' class="remove_owner_contacts btn btn-danger btn-air-danger" type="button">-</button>  </div>';
                return myvar;
            }

            function generate_unit_detail(id) {
                var myvar = '<div class="row"><div  data-unit_id= ' + id + ' class="form-group col-md-1 m-b-10">' +
                    '            <input class="form-control" name="wing" ' +
                    '                type="text"  autocomplete="off" placeholder="Wing">' +
                    '        </div>' +
                    '<div  data-unit_id= ' + id + ' class="form-group col-md-1 m-b-10">' +
                    '            <input class="form-control" name="unit_unit_no" ' +
                    '                type="text"  autocomplete="off" placeholder="Unit No.">' +
                    '        </div>' +
                    '        <div  data-unit_id= ' + id + ' class="form-group col-md-2 m-b-4 mb-3">' +
                    '            <select class="form-select" name="unit_status">' +
                    '                <option value="">Unit Status</option>' +
                    '                <option value="Contactable">Available</option>' +
                    '                <option value="Rent Out">Rent Out</option>' +
                    '                <option value="Sold Out">Sold Out</option>' +
                    '            </select>' +
                    '        </div>' +
                    '<div  data-unit_id= ' + id + ' class="form-group col-md-2 m-b-10">' +
                    '            <input class="form-control" name="price indian_currency_amount " ' +
                    '                type="text"  autocomplete="off" placeholder="price">' +
                    '        </div>' +
                    '        <div  data-unit_id= ' + id + ' class="form-group col-md-2 m-b-4 mb-3">' +
                    '            <select class="form-select" name="furnished_status">' +
                    '                <option value="">Furnished Status</option>' +
                    '            </select>' +
                    '        </div>' +
                    '<div data-unit_id= ' + id +
                    ' class="form-group col-md-1 m-b-4 mb-3"><button data-unit_id=' + id +
                    ' class="remove_units btn btn-danger btn-air-danger" type="button">-</button>  </div></div>';
                return myvar;
            }

            $(document).on('click', '#add_owner_contacts', function(e) {
                id = makeid(10);
                $('#all_owner_contacts').append(generate_contact_detail(id));
                $("#all_owner_contacts select").each(function(index) {
                    $(this).select2();
                })
            })
            $(document).on('click', '.remove_owner_contacts', function(e) {
                id = $(this).attr('data-contact_id');
                $("[data-contact_id=" + id + "]").each(function(index) {
                    $(this).remove();
                });
            })

            $(document).on('click', '#add_units', function(e) {
                id = makeid(10);
                $('#all_units').append(generate_unit_detail(id));
                $("#all_units select").each(function(index) {
                    $(this).select2();
                })
            })
            $(document).on('click', '.remove_units', function(e) {
                id = $(this).attr('data-unit_id');
                $("[data-unit_id=" + id + "]").each(function(index) {
                    $(this).remove();
                });
            })
        </script>
    @endpush