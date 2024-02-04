@extends('superadmin.layouts.superapp')
@section('content')
    @php
        $is_dynamic_form = true;
    @endphp
    <div class="page-body" x-data="add_project_form">
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
                            <h5 class="mb-3">Project & Builder Information</h5>
                            <template x-if="id != ''"><strong>Update Project</strong></template>
                            <template x-if="id == ''"><strong>Create Project</strong></template>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-lg-3" style="margin-left: -20px;">
                                    <div class="bromi-form-wizard stepwizard">
                                        <div class="stepwizard-row setup-panel">
                                            <div class="stepwizard-step mb-5" :class="Object.keys(errors).length == 0 ? '' : 'text-danger'" style="text-align:initial"><a
                                                    class="btn btn-primary" href="#project-info">1</a>
                                                <p class="ms-2">Project & Builder Information</p>
                                            </div>
                                            <div
                                                class="stepwizard-step mb-5"
                                                style="text-align:initial">
                                                <a class="btn btn-light" href="#contact-wing">2</a>
                                                <p class="ms-2" :class="Object.keys(errors).length == 0 ? '' : 'text-danger'">Project Type & Basic Info</p>
                                            </div>
                                            <div class="stepwizard-step" style="text-align:initial"><a class="btn btn-light"
                                                    href="#amenities">3</a>
                                                <p class="ms-2" :class="Object.keys(errors).length == 0 ? '' : 'text-danger'">Parking & Amenities</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-9 border-start ps-4">
                                    <form class="form-bookmark needs-validation modal_form">
                                        <div class="setup-content" id="project-info">
                                            <div class="col-xs-12">
                                                <div class="col-md-12">
                                                    <div class="row">
														<input type="hidden" name="this_data_id" id="this_data_id">
														<div>
															<label><b>Builder Information</b></label>
														</div>
                                                        <div class="form-group col-md-3 m-b-4 mb-3">
                                                            <select class="form-select" id="builder_id" :class="errors.hasOwnProperty('builder_id') ? 'is-invalid' : ''">
                                                                <option value=""> Builder Name</option>
                                                                @foreach ($builders as $builder)
                                                                    <option value="{{ $builder->id }}">{{ $builder->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                <span x-text="errors.builder_id"></span>
                                                            </div>
                                                        </div>
														<div class="form-group col-md-6 m-b-4 mb-3">
                                                            <div class="fname" :class="website == '' ? '' : 'focused' ">
                                                                <label for="Project Name">Website</label>
                                                                <div class="fvalue">
                                                                    <input
                                                                        class="form-control"
                                                                        name="website"
                                                                        x-model="website"
                                                                        id="website"
                                                                        type="text"
                                                                        autocomplete="off"
                                                                        :class="errors.hasOwnProperty('website') ? 'is-invalid' : ''"
                                                                    >
                                                                    <div class="invalid-feedback">
                                                                        <span x-text="errors.website"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>                    
														<div>
															<label><b>Project Information</b></label>
														</div>
                                                        <div class="form-group col-md-6 m-b-20">
                                                            <div class="fname" :class="project_name == '' ? '' : 'focused' ">
                                                                <label for="Project Name">Project Name</label>
                                                                <div class="fvalue">
                                                                    <input
                                                                        class="form-control"
                                                                        name="project_name"
                                                                        x-model="project_name"
                                                                        type="text"
                                                                        autocomplete="off"
                                                                        :class="errors.hasOwnProperty('project_name') ? 'is-invalid' : ''"
                                                                    >
                                                                    <div class="invalid-feedback">
                                                                        <span x-text="errors.project_name"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="form-group col-md-6">
                                                                <div class="fname" :class="address == '' ? '' : 'focused' ">
                                                                    <label for="Address">Address</label>
                                                                    <div class="fvalue">
                                                                        <input class="form-control" name="address" x-model="address" type="text" autocomplete="off" :class="errors.hasOwnProperty('address') ? 'is-invalid' : ''">
                                                                        <div class="invalid-feedback">
                                                                            <span x-text="errors.address"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <select class="form-select" id="area_id" :class="errors.hasOwnProperty('locality') ? 'is-invalid' : ''">
                                                                    <option value="">Locality</option>
                                                                    @foreach ($areas as $area)
                                                                        <option data-pincode="{{ $area->pincode }}"
                                                                            data-city_id="{{ $area->city_id }}"
                                                                            data-state_id="{{ $area->state_id }}"
                                                                            value="{{ $area->id }}">
                                                                            {{ $area->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    <span x-text="errors.locality"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="form-group col-md-3">
                                                                <label for="City">State</label>
                                                                <select id="state_id" :class="errors.hasOwnProperty('state') ? 'is-invalid' : ''">
                                                                    <option value="">State</option>
                                                                    @foreach ($states as $state)
                                                                        <option value="{{ $state['id'] }}">{{ $state['name'] }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    <span x-text="errors.state"></span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label for="City">City</label>
                                                                <select id="city_id" :class="errors.hasOwnProperty('city') ? 'is-invalid' : ''">
                                                                    <option value="">City</option>
                                                                    @foreach ($cities as $city)
                                                                        <option value="{{ $city['id'] }}">{{ $city['name'] }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    <span x-text="errors.city"></span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-3" style="margin-top: 30px;">
                                                                <div class="fname" :class="pincode == '' ? '' : 'focused' ">
                                                                    <label for="Pincode">Pincode</label>
                                                                    <div class="fvalue">
                                                                        <input
                                                                            class="form-control"
                                                                            x-model="pincode"
                                                                            name="pincode"
                                                                            id="pincode"
                                                                            :class="errors.hasOwnProperty('pincode') ? 'is-invalid' : ''"
                                                                            type="text" autocomplete="off"
                                                                        >
                                                                        <div class="invalid-feedback">
                                                                            <span x-text="errors.pincode"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-4">
                                                            <div class="form-group col-md-6 m-b-20">
                                                                <div class="fname" :class="location_link == '' ? '' : 'focused' ">
                                                                    <label for="location_link">Location Link</label>
                                                                    <div class="fvalue">
                                                                        <input class="form-control" name="location_link" x-model="location_link" type="text" autocomplete="off" :class="errors.hasOwnProperty('location_link') ? 'is-invalid' : ''">
                                                                        <div class="invalid-feedback">
                                                                            <span x-text="errors.location_link"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="input-group">
                                                                    <div class="form-group col-md-7 m-b-20">
                                                                        <div class="fname" :class="land_size == '' ? '' : 'focused' ">
                                                                            <label for="land Size">Land Size</label>
                                                                            <input class="form-control" type="text" x-model="land_size"
                                                                            autocomplete="off" :class="errors.hasOwnProperty('land_area') ? 'is-invalid' : ''">
                                                                            <div class="invalid-feedback">
                                                                                <span x-text="errors.land_area"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="input-group-append col-md-5 m-b-20">
                                                                        <div class="form-group form_measurement">
                                                                            <select class="form-select form_measurement measure_select" id="land_size_select">
                                                                                <option value="117" selected>Sq.Ft.</option>
                                                                                <option value="118">Sq.Yard</option>
                                                                                <option value="119">Sq.Meter</option>
                                                                                <option value="120">VIGHA</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-4 mt-1">
                                                            <div class="fname" :class="rera_no == '' ? '' : 'focused' ">
                                                                <label for="Rarea No">Rera No</label>
                                                                <div class="fvalue">
                                                                    <input class="form-control" x-model="rera_no" type="text" autocomplete="off" :class="errors.hasOwnProperty('rera_number') ? 'is-invalid' : ''">
                                                                    <div class="invalid-feedback">
                                                                        <span x-text="errors.rera_number"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-4 m-b-20 mt-1">
                                                            <select class="form-select form-design" id="project_status" onchange="setProjectStatusInput(this)" :class="errors.hasOwnProperty('project_status') ? 'is-invalid' : ''">
                                                                <option value="">Project Status</option>
                                                                <option value="142">Ready Possession</option>
                                                                <option value="143">Under Construction</option>
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                <span x-text="errors.project_status"></span>
                                                            </div>
                                                        </div>

														<div
                                                            class="form-group col-md-4 m-b-20"
                                                            style="margin-top:3px;"
                                                            id="project_status_input">
                                                        </div>
                                                        
                                                        <div class="row">
                                                            <div>
                                                                <label><b>Contact Details</b></label>
                                                            </div>
    
                                                            <template x-for="(other_contact, index) in other_contact_details">
                                                                <div class="row">
                                                                    <div class="form-group col-md-2 m-b-20" id="other_contact_1">
                                                                        <div class="fname" :class="other_contact.name == '' ? '' : 'focused' ">
                                                                            <label>Name</label>
                                                                            <div class="fvalue">
                                                                                <input
                                                                                    class="form-control" 
                                                                                    x-model="other_contact.name"
                                                                                    type="text"
                                                                                    :class="errors.hasOwnProperty(`other_contact_details.${index}.name`) ? 'is-invalid' : ''"
                                                                                >
                                                                                <div class="invalid-feedback">
                                                                                    <span x-text="errors[`other_contact_details.${index}.name`]"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-3 m-b-20">
                                                                        <div class="fname" :class="other_contact.mobile == '' ? '' : 'focused' ">
                                                                            <label>Mobile</label>
                                                                            <div class="fvalue">
                                                                                <input class="form-control" 
                                                                                x-model="other_contact.mobile"
                                                                                name="other_contact_mobile" type="text" autocomplete="off" data-bs-original-title="" title="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-3 m-b-20">
                                                                        <div class="fname" :class="other_contact.email == '' ? '' : 'focused' ">
                                                                            <label>Email</label>
                                                                            <div class="fvalue">
                                                                                <input
                                                                                    class="form-control"
                                                                                    x-model="other_contact.email"
                                                                                    name="other_contact_email" type="text" autocomplete="off" data-bs-original-title="" title="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-3 m-b-20">
                                                                        <div class="fname" :class="other_contact.designation == '' ? '' : 'focused' ">
                                                                            <label>Designation</label>
                                                                            <div class="fvalue">
                                                                                <input
                                                                                    class="form-control"
                                                                                    x-model="other_contact.designation"
                                                                                    name="other_contact_designation"
                                                                                    type="text" autocomplete="off" data-bs-original-title="" title="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-1 m-b-4 mb-3" x-show="index > 0">
                                                                        <button class="add_contacts btn btn-danger btn-air-danger" type="button" @click="removeOtherContact(`${index}`)" title="">-</button>
                                                                    </div>
                                                                    <div class="form-group col-md-1 m-b-4 mb-3" x-show="index == 0">
                                                                        <button class="add_contacts btn btn-danger btn-air-danger" type="button" data-bs-original-title="" @click="addOtherContact()" title="">+</button>
                                                                    </div>
                                                                </div>
                                                            </template>
                                                        </div>

                                                        <div class="row mt-3">
                                                            <div class="form-group col-md-3 m-b-20">
                                                                <div class="fname">
                                                                    <label class="select2_label" for="Restricted User">Restricted User</label>
                                                                    <select class="form-select" id="restrictions"
                                                                    multiple="multiple" :class="errors.hasOwnProperty('restricted_user') ? 'is-invalid' : ''">
                                                                        <option value="">Select user</option>
                                                                        <option value="130">Bachelors</option>
                                                                        <option value="131">Hospital</option>
                                                                        <option value="132">Restaurant</option>
                                                                        <option value="133">Company Guest House</option>
                                                                        <option value="134">Night Call Center</option>
                                                                        <option value="135">SPA & Massage Parlor</option>
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        <span x-text="errors.restricted_user"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary nextBtn pull-right"
                                                        type="button">Next</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="setup-content" id="contact-wing">
                                            <div class="col-xs-12">
                                                <div class="col-md-12">
													<div class="row">
                                                        <div class="col-md-12 mb-3">
                                                            <div>
                                                                <label><b>Property Type</b></label>
                                                            </div>
                                                            <div class="m-checkbox-inline custom-radio-ml">
                                                                <div class="form-check form-check-inline radio radio-primary">
                                                                    <input class="form-check-input filled" id="propertytype85" type="radio" name="property_type" data-val="Commercial" value="85" x-model="property_type" @click="changePropertyType()" checked="" data-bs-original-title="" title="">
                                                                    <label class="form-check-label mb-0" for="propertytype85">Commercial</label>
                                                                </div>
                                                                <div class="form-check form-check-inline radio radio-primary">
                                                                    <input class="form-check-input filled" id="propertytype87" type="radio" name="property_type" data-val="Residential" value="87" x-model="property_type" @click="changePropertyType()" data-bs-original-title="" title="">
                                                                    <label class="form-check-label mb-0" for="propertytype87">Residential</label>
                                                                </div>
                                                                <div class="form-check form-check-inline radio radio-primary">
                                                                    <input class="form-check-input filled" type="radio" id="property_type_88" name="property_type_88" x-model="property_type" value="88" @click="changePropertyType()" data-bs-original-title="" title="">
                                                                    <label class="form-check-label mb-0" for="property_type_88">Office &amp; Retail</label>
                                                                </div>
                                                                <div class="form-check form-check-inline radio radio-primary">
                                                                    <input class="form-check-input filled" type="radio" id="property_type_89" name="property_type_89" x-model="property_type" value="89" @click="changePropertyType()" data-bs-original-title="" title="">
                                                                    <label class="form-check-label mb-0" for="property_type_89">Residential &amp; Commercial</label>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <input type="hidden" :class="errors.hasOwnProperty('propery_type') ? 'is-invalid' : ''">
                                                                <div class="invalid-feedback">
                                                                    <span x-text="errors.propery_type"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row" x-show="property_type==85 || property_type==87">
                                                        <div class="col-md-12 mb-2">
                                                            <div>
                                                                <label><b>Category</b></label>
                                                            </div>
                                                            <div class="m-checkbox-inline custom-radio-ml" :class="errors.hasOwnProperty('property_category') ? 'is-invalid' : ''">
                                                                @forelse ($property_configuration_settings as $props)
                                                                    @if ( ($props['dropdown_for'] == 'property_specific_type') && $props['id'] != '262') 
                                                                        <div class="btn-group bromi-checkbox-btn me-1"
                                                                            role="group" 
                                                                            aria-label="Basic radio toggle button group">
                                                                            <input type="radio"
                                                                                data-parent_id="{{ $props['parent_id'] }}"
                                                                                class="btn-check"
                                                                                value="{{ $props['id'] }}"
                                                                                data-val="{{ $props['name'] }}"
                                                                                name="property_category"
                                                                                x-model="property_category"
                                                                                id="category-{{ $props['id'] }}"
                                                                                data-error="#property_category_error"
                                                                                @click="categoryChange"
                                                                                {{ ($props['name'] == "Office") ? "checked" : "" }}
                                                                            >
                                                                            <label
                                                                                class="btn btn-outline-primary btn-pill btn-sm py-1"
                                                                                for="category-{{ $props['id'] }}">{{ $props['name'] }}</label>
                                                                        </div>
                                                                    @endif
                                                                @empty
                                                                @endforelse
                                                            </div>
                                                            <div class="invalid-feedback">
                                                                <span x-text="errors.property_category"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row" x-show="property_type=='88'">
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <h5 class="border-style">Office</h5>
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <div>
                                                                    <label><b>Sub category</b></label>
                                                                </div>
                                                                <div class="m-checkbox-inline custom-radio-ml">
                                                                    <div class="btn-group bromi-checkbox-btn me-1" role="group" aria-label="Basic radio toggle button group">
                                                                        <input type="radio" class="btn-check" value="35" id="extraofficeekind1" x-model="sub_category_single" name="sub_category_single" data-bs-original-title="" title="">
                                                                        <label class="btn btn-outline-primary btn-pill btn-sm py-1" for="extraofficeekind1">office space</label>
                                                                    </div>
    
                                                                    <div class="btn-group bromi-checkbox-btn me-1" role="group" aria-label="Basic radio toggle button group">
                                                                        <input type="radio" class="btn-check" value="36" id="extraofficekind2" x-model="sub_category_single" name="sub_category_single" data-bs-original-title="" title="">
                                                                        <label class="btn btn-outline-primary btn-pill btn-sm py-1" for="extraofficekind2">Co-working</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-2" x-show="sub_category_single != ''">
                                                                <div>
                                                                    <label><b>Tower Details</b></label>
                                                                    <span class="d-none" x-text="nexttickForFirstCondition()"></span>
                                                                </div>
                                                                <div class="form-group col-md-2 m-b-20">
                                                                    <div class="fname" :class="if_office_or_retail.number_of_tower == '' ? '' : 'focused' ">
                                                                        <label>No. of Towers</label>
                                                                        <div class="fvalue">
                                                                            <input
                                                                                class="form-control" name="first_number_of_tower"
                                                                                type="text"
                                                                                id="number_of_tower"
                                                                                x-model="if_office_or_retail.number_of_tower"
                                                                            >
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3 m-b-20">
                                                                    <div class="fname" :class="if_office_or_retail.number_of_floor == '' ? '' : 'focused' ">
                                                                        <label>No. of Floors</label>
                                                                        <div class="fvalue">
                                                                            <input class="form-control" name="first_number_of_floors" type="text" x-model="if_office_or_retail.number_of_floor" autocomplete="off" data-bs-original-title="" title="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3 m-b-20">
                                                                    <div class="fname" :class="if_office_or_retail.number_of_unit == '' ? '' : 'focused' ">
                                                                        <label>Total Units </label>
                                                                        <div class="fvalue">
                                                                            <input class="form-control" x-model="if_office_or_retail.number_of_unit" name="first_total_units" type="text" autocomplete="off" data-bs-original-title="" title="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3 m-b-20">
                                                                    <div class="fname" :class="if_office_or_retail.number_of_unit_each_block == '' ? '' : 'focused' ">
                                                                        <label>No. of Unit each block </label>
                                                                        <div class="fvalue">
                                                                            <input class="form-control" name="first_number_of_unit_each_block" x-model="if_office_or_retail.number_of_unit_each_block" type="text" autocomplete="off" data-bs-original-title="" title="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3 m-b-20">
                                                                    <div class="fname" :class="if_office_or_retail.number_of_lift == '' ? '' : 'focused' ">
                                                                        <label>No. of Lift </label>
                                                                        <div class="fvalue">
                                                                            <input class="form-control" x-model="if_office_or_retail.number_of_lift" name="first_number_of_lift" type="text" autocomplete="off" data-bs-original-title="" title="">
                                                                        </div>
                                                                    </div>
                                                                </div>
    
                                                                <div class="form-group col-md-5 m-b-5">
                                                                    <div class="input-group">
                                                                        <div class="form-group col-md-7 m-b-20">
                                                                            <div class="fname" :class="if_office_or_retail.front_road_width == '' ? '' : 'focused' ">
                                                                                <label class="mb-0">Front Road Width</label>
                                                                                <div class="fvalue">
                                                                                    <input
                                                                                        class="form-control"
                                                                                        name="road_width"
                                                                                        type="text"
                                                                                        x-model="if_office_or_retail.front_road_width"
                                                                                        autocomplete="off"
                                                                                        data-bs-original-title=""
                                                                                        title=""
                                                                                    >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="input-group-append col-md-5 m-b-20">
                                                                            <div class="form-group form_measurement">
                                                                                <select class="form-select form_measurement measure_select" name="road_width_select" id="second_front_road_map_unit_select">
                                                                                    <option selected="selected" value="121">Ft.</option>
                                                                                    <option value="122">Meter</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="m-checkbox-inline">
                                                                    <label><b>Washroom</b></label>
                                                                    <div class="form-check form-check-inline radio radio-primary">
                                                                        <input
                                                                            type="radio"
                                                                            id="private"
                                                                            name="washroom"
                                                                            x-model="if_office_or_retail.washroom"
                                                                            value="private"
                                                                        >
                                                                        <label for="private">Private</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline radio radio-primary">
                                                                        <input
                                                                            type="radio"
                                                                            id="public"
                                                                            name="washroom"
                                                                            value="public"
                                                                            x-model="if_office_or_retail.washroom"
                                                                        >
                                                                        <label for="public">Public</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-check checkbox checkbox-solid-success col-md-6">
                                                                        <input class="form-check-input" id="two_road_corner" x-model="if_office_or_retail.is_two_corner" name="two_road_corner" type="checkbox">
                                                                        <label class="form-check-label" for="two_road_corner">Two road corner.</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div x-show="sub_category_single != ''">
                                                                <template x-for="(tower_detail, index) in if_office_tower_details">
                                                                    <div class="row">
                                                                        <div class="mb-2">
                                                                            <hr>
                                                                            <span x-text="nextTickForTowerDetails()" class="d-none"></span>
                                                                        </div>
                                                                        <div class="form-group col-md-3 m-b-20">
                                                                            <div class="fname" :class="tower_detail.tower_name == '' ? '' : 'focused' ">
                                                                                <label>Tower Name</label>
                                                                                <div class="fvalue">
                                                                                    <input class="form-control" name="tower_name" x-model="tower_detail.tower_name" type="text" autocomplete="off" data-bs-original-title="" title="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-3 m-b-20">
                                                                            <div class="fname" :class="tower_detail.total_floor == '' ? '' : 'focused' ">
                                                                                <label>Total Floors</label>
                                                                                <div class="fvalue">
                                                                                    <input class="form-control" x-model="tower_detail.total_floor" name="total_floors" type="text" autocomplete="off" data-bs-original-title="" title="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-3 m-b-20">
                                                                            <div class="fname" :class="tower_detail.total_unit == '' ? '' : 'focused' ">
                                                                                <label>Total Units</label>
                                                                                <div class="fvalue">
                                                                                    <input class="form-control" x-model="tower_detail.total_unit" name="total_units" type="text" autocomplete="off" data-bs-original-title="" title="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
    
                                                                        <div class="row">
                                                                            <div class="form-group col-md-4 m-b-5">
                                                                                <span>Saleable Area</span>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <div class="fname" :class="tower_detail.saleable == '' ? '' : 'focused' ">
                                                                                        <div class="fvalue">
                                                                                            <input
                                                                                                type="text"
                                                                                                class="form-control"
                                                                                                placeholder="size" data-bs-original-title="" x-model="tower_detail.saleable"
                                                                                            >
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <span class="input-group-text" style="min-height:41px;">To</span>
                                                                                </div>
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <div class="fname" :class="tower_detail.saleable_to == '' ? '' : 'focused' ">
                                                                                        <div class="fvalue">
                                                                                            <input
                                                                                                type="text"
                                                                                                class="form-control"
                                                                                                placeholder="size"
                                                                                                x-model="tower_detail.saleable_to"
                                                                                            >
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <select class="form-select" :id="`second_tower_detail_saleable_from_to_select_${index}`" :class="errors.hasOwnProperty('builder_id') ? 'is-invalid' : ''">
                                                                                        <option value="117" selected>Sq.Ft.</option>
                                                                                        <option value="118">Sq.Yard</option>
                                                                                        <option value="119">Sq.Meter</option>
                                                                                        <option value="120">VIGHA</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
    
                                                                        <div class="row">
                                                                            <div class="form-group col-md-auto mb-3">
                                                                                <a
                                                                                    class="add_constructed_carpet_area" style="color:#0078DB!important"
                                                                                    @click="tower_detail.is_carpet = !tower_detail.is_carpet" href="javascript:void(0)"> + Add Carpet Size
                                                                                </a>
                                                                            </div>

                                                                            <div class="form-group col-md-auto mb-3">
                                                                                <a
                                                                                    class="add_constructed_carpet_area" style="color:#0078DB!important"
                                                                                    @click="tower_detail.is_built_up = !tower_detail.is_built_up" href="javascript:void(0)"> + Add BuiltUp Size
                                                                                </a>
                                                                            </div>
                                                                        </div>
    
                                                                        <div class="row" x-show="tower_detail.is_carpet">
                                                                            <div class="form-group col-md-4 m-b-5">
                                                                                <span>Carpet Area</span>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <div class="fname" :class="tower_detail.carpet == '' ? '' : 'focused' ">
                                                                                        <div class="fvalue">
                                                                                            <input
                                                                                                type="text"
                                                                                                class="form-control"
                                                                                                placeholder="size" data-bs-original-title="" x-model="tower_detail.carpet"
                                                                                            >
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <span class="input-group-text" style="min-height:41px;">To</span>
                                                                                </div>
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <div class="fname" :class="tower_detail.carpet_to == '' ? '' : 'focused' ">
                                                                                        <div class="fvalue">
                                                                                            <input
                                                                                                type="text"
                                                                                                class="form-control"
                                                                                                placeholder="size"
                                                                                                x-model="tower_detail.carpet_to"
                                                                                            >
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <select class="form-select" :id="`second_tower_detail_carpet_from_to_select_${index}`" :class="errors.hasOwnProperty('builder_id') ? 'is-invalid' : ''">
                                                                                        <option value="117" selected>Sq.Ft.</option>
                                                                                        <option value="118">Sq.Yard</option>
                                                                                        <option value="119">Sq.Meter</option>
                                                                                        <option value="120">VIGHA</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="row" x-show="tower_detail.is_built_up">
                                                                            <div class="form-group col-md-4 m-b-5">
                                                                                <span>Builtup Area</span>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <div class="fname" :class="tower_detail.built_up == '' ? '' : 'focused' ">
                                                                                        <div class="fvalue">
                                                                                            <input
                                                                                                type="text"
                                                                                                class="form-control"
                                                                                                placeholder="size" data-bs-original-title="" x-model="tower_detail.built_up"
                                                                                            >
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <span class="input-group-text" style="min-height:41px;">To</span>
                                                                                </div>
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <div class="fname" :class="tower_detail.built_up_to == '' ? '' : 'focused' ">
                                                                                        <div class="fvalue">
                                                                                            <input
                                                                                                type="text"
                                                                                                class="form-control"
                                                                                                placeholder="size"
                                                                                                x-model="tower_detail.built_up_to"
                                                                                            >
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <select class="form-select" :id="`second_tower_detail_built_from_to_select_${index}`" :class="errors.hasOwnProperty('builder_id') ? 'is-invalid' : ''">
                                                                                        <option value="117" selected>Sq.Ft.</option>
                                                                                        <option value="118">Sq.Yard</option>
                                                                                        <option value="119">Sq.Meter</option>
                                                                                        <option value="120">VIGHA</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </template>
    
                                                                <div class="row" x-show="if_office_or_retail.number_of_tower > 1">
                                                                    <div class="form-check checkbox  checkbox-solid-success col-md-6 m-b-20">
                                                                        <input
                                                                            class="form-check-input"
                                                                            id="tower_with_specification"
                                                                            x-model="if_office_tower_details_with_specification"
                                                                            name="tower_with_specification"
                                                                            type="checkbox"
                                                                            @click="towerWithSpecification()"
                                                                        >
                                                                        <label class="form-check-label" for="tower_with_specification">Towers with a different specification.</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                    
                                                            
                                                        </div>
                                                    </div>

                                                    <div class="row" x-show="property_type=='89'">
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <h5 class="border-style">Flat / Penthouse</h5>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-md-12 mb-3">
                                                                    <div>
                                                                        <label><b>Sub category</b></label>
                                                                    </div>
                                                                    <div class="m-checkbox-inline custom-radio-ml">
                                                                        <div class="the_1rk btn-group bromi-checkbox-btn me-1" role="group" aria-label="Basic radio toggle button group" style="">
                                                                            <input type="checkbox" class="btn-check filled" x-model="sub_categories" @click="addWingSubCategory($event,'1 rk')" value="13" id="extraflatkind1" name="excat" data-error="#flat_type_error" autocomplete="off" data-bs-original-title="" title="">
                                                                            <label class="btn btn-outline-primary btn-pill btn-sm py-1" for="extraflatkind1">1 rk</label>
                                                                        </div>
                                                                        <div class="btn-group bromi-checkbox-btn me-1" role="group" aria-label="Basic radio toggle button group">
                                                                            <input type="checkbox" class="btn-check" value="14" id="extraflatkind2" x-model="sub_categories" name="flat_type[]" @click="addWingSubCategory($event,'1 bhk')" data-error="#flat_type_error" autocomplete="off" data-bs-original-title="" title="">
                                                                            <label class="btn btn-outline-primary btn-pill btn-sm py-1" for="extraflatkind2">1bhk</label>
                                                                        </div>
                                                                        <div class="btn-group bromi-checkbox-btn me-1" role="group" aria-label="Basic radio toggle button group">
                                                                            <input type="checkbox" class="btn-check" value="15" x-model="sub_categories" id="extraflatkind3" name="flat_type[]" @click="addWingSubCategory($event,'2 bhk')" data-error="#flat_type_error" autocomplete="off" data-bs-original-title="" title="">
                                                                            <label class="btn btn-outline-primary btn-pill btn-sm py-1" for="extraflatkind3">2bhk</label>
                                                                        </div>
                                                                        <div class="btn-group bromi-checkbox-btn me-1" role="group" aria-label="Basic radio toggle button group">
                                                                            <input type="checkbox" class="btn-check" value="16" x-model="sub_categories" id="extraflatkind4" name="flat_type[]" @click="addWingSubCategory($event,'3 bhk')" data-error="#flat_type_error" autocomplete="off" data-bs-original-title="" title="">
                                                                            <label class="btn btn-outline-primary btn-pill btn-sm py-1" for="extraflatkind4">3bhk</label>
                                                                        </div>
                                                                        <div class="btn-group bromi-checkbox-btn me-1" role="group" aria-label="Basic radio toggle button group">
                                                                            <input type="checkbox" class="btn-check" value="17" x-model="sub_categories" id="extraflatkind5" name="flat_type[]" @click="addWingSubCategory($event,'4 bhk')" data-error="#flat_type_error" autocomplete="off" data-bs-original-title="" title="">
                                                                            <label class="btn btn-outline-primary btn-pill btn-sm py-1" for="extraflatkind5">4bhk</label>
                                                                        </div>
                                                                        <div class="btn-group bromi-checkbox-btn me-1" role="group" aria-label="Basic radio toggle button group">
                                                                            <input type="checkbox" class="btn-check" value="18" x-model="sub_categories" id="extraflatkind6" name="flat_type[]" @click="addWingSubCategory($event,'4+ bhk')" data-error="#flat_type_error" autocomplete="off" data-bs-original-title="" title="">
                                                                            <label class="btn btn-outline-primary btn-pill btn-sm py-1" for="extraflatkind6">4+bhk</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2" x-show="sub_categories.length > 0">
                                                                <div class="col-md-2 mb-3">
                                                                    <div class="fname" :class="is_flat_or_penthouse.number_of_towers == '' ? '' : 'focused' ">
                                                                        <label for="Total Floor">No. Of Tower</label>
                                                                        <div class="fvalue">
                                                                            <input class="form-control" x-model="is_flat_or_penthouse.number_of_towers" type="text" autocomplete="off"
                                                                            data-bs-original-title="" title="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 mb-3">
                                                                    <div class="fname" :class="is_flat_or_penthouse.number_of_floors == '' ? '' : 'focused' ">
                                                                        <label for="Property on floor">No. Of Floors</label>
                                                                        <div class="fvalue">
                                                                            <input class="form-control" x-model="is_flat_or_penthouse.number_of_floors" type="text" autocomplete="off" data-bs-original-title="" title="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 mb-3 the_total_units_in_tower">
                                                                    <div class="fname" :class="is_flat_or_penthouse.total_units == '' ? '' : 'focused' ">
                                                                        <label for="Total Floor">Total Units</label>
                                                                        <div class="fvalue">
                                                                            <input class="form-control" x-model="is_flat_or_penthouse.total_units" type="text" autocomplete="off" data-bs-original-title="" title="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 mb-3 the_total_elevator_in_tower">
                                                                    <div class="fname" :class="is_flat_or_penthouse.number_of_elevator == '' ? '' : 'focused' ">
                                                                        <label for="Total Floor">No. of Elevator in each tower</label>
                                                                        <div class="fvalue">
                                                                            <input class="form-control" x-model="is_flat_or_penthouse.number_of_elevator" type="text" autocomplete="off" data-bs-original-title="" title="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div x-show="sub_categories.length > 0">
                                                                <template x-for="(wing , index) in if_residential_only_wings.wing_details">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-3 m-b-20">
                                                                            <span x-text="nextTickForIfResidentialWings()" class="d-none"></span>
                                                                            <div class="fname" :class="wing.wing_name == '' ? '' : 'focused' ">
                                                                                <label>Wing Name</label>
                                                                                <input
                                                                                    class="form-control"
                                                                                    x-model="wing.wing_name"
                                                                                    type="text"
                                                                                    autocomplete="off"
                                                                                    @focusOut="manageWingNameArray()"
                                                                                >
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-2 m-b-20">
                                                                            <div class="fname" :class="wing.total_total_units == '' ? '' : 'focused' ">
                                                                                <label>Total Units</label>
                                                                                <input class="form-control" x-model="wing.total_total_units" type="text" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-2 m-b-20">
                                                                            <div class="fname" :class="wing.total_floors == '' ? '' : 'focused' ">
                                                                                <label>Total Floor</label>
                                                                                <input class="form-control" x-model="wing.total_floors" type="text" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <div class="fname">
                                                                                <select class="form-select" :id="`extra_sub_category_of_wings_${index}`" multiple="multiple">
                                                                                    <template x-for="category in sub_category_array">
                                                                                        <option :value="category">
                                                                                            <span x-text="category"></span>
                                                                                        </option>
                                                                                    </template>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-1 m-b-4 mb-3" x-show="index > 0">
                                                                            <button class="add_contacts btn btn-danger btn-air-danger" type="button" @click="removeWingDetail(index)" title="">-</button>
                                                                        </div>
                                                                        <div class="form-group col-md-1 m-b-4 mb-3" x-show="index == 0">
                                                                            <button class="add_contacts btn btn-danger btn-air-danger" type="button" data-bs-original-title="" @click="addWingDetail()" title="">+</button>
                                                                        </div>
                                                                    </div>
                                                                </template>
                                                                
                                                                <div class="row">
                                                                    <hr>
                                                                    <div>
                                                                        <label><b>Unit Details</b></label>
                                                                        <span class="d-none" x-text="manageWingNameArray()"></span>
                                                                        <span class="d-none" x-text="nextTickForIfResidentialUnits()"></span>
                                                                    </div>
                                                                </div>
                                                                <template x-for="(unit , index) in if_residential_only_units.unit_details">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-3">
                                                                            <div class="fname" :class="unit.wing == '' ? '' : 'focused' ">
                                                                                <select class="form-select form-design" :id="`second_wing_array_${index}`">
                                                                                    <option value="">Wing</option>
                                                                                    <template x-for="wing_name in wings_name_array">
                                                                                        <option :value="wing_name">
                                                                                            <span x-text="wing_name"></span>
                                                                                        </option>
                                                                                    </template>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-4">
                                                                            <div class="input-group mb-3">
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <div class="fname" :class="unit.saleable == '' ? '' : 'focused' ">
                                                                                        <label class="mb-0">Saleable</label>
                                                                                        <input class="form-control" x-model="unit.saleable" name="saleable_area" type="text" autocomplete="off">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <span class="input-group-text" style="min-height:41px;">To</span>
                                                                                </div>
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <div class="fname" :class="unit.saleable_to == '' ? '' : 'focused' ">
                                                                                        <label class="mb-0">Saleable</label>
                                                                                        <input class="form-control" x-model="unit.saleable_to" name="saleable_area" type="text" autocomplete="off">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <select class="form-select form_measurement measure_select" :id="`second_saleable_area_select_${index}`">
                                                                                        <option value="117" selected>Sq.Ft.</option>
                                                                                        <option value="118">Sq.Yard</option>
                                                                                        <option value="119">Sq.Meter</option>
                                                                                        <option value="120">VIGHA</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="row">
                                                                            <div class="form-group col-md-auto mb-3">
                                                                                <a style="color:#0078DB!important" @click="unit.has_built_up = !unit.has_built_up" href="javascript:void(0)" data-bs-original-title="" title=""> + Add Built Up Area
                                                                                </a>
                                                                            </div>
                                                                            <div class="form-group col-md-auto mb-3">
                                                                                <a style="color:#0078DB!important" @click="unit.has_carpet = !unit.has_carpet" href="javascript:void(0)" data-bs-original-title="" title=""> + Add Carpet Area
                                                                                </a>
                                                                            </div>
                                                                        </div>
    
                                                                        <div class="row mt-2" x-show="unit.has_built_up">
                                                                            <div class="input-group mb-3">
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <div class="fname" :class="unit.built_up == '' ? '' : 'focused' ">
                                                                                        <label class="mb-0">Built up Area</label>
                                                                                        <input class="form-control" x-model="unit.built_up" name="built_up_areass" type="text" autocomplete="off">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <span class="input-group-text" style="min-height:41px;">To</span>
                                                                                </div>
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <div class="fname" :class="unit.built_up_to == '' ? '' : 'focused' ">
                                                                                        <label class="mb-0">Built up Area</label>
                                                                                        <input class="form-control" x-model="unit.built_up_to" name="built_up_areass" type="text" autocomplete="off">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <select class="form-select form_measurement measure_select" :id="`second_built_up_area_select_${index}`">
                                                                                        <option value="117" selected>Sq.Ft.</option>
                                                                                        <option value="118">Sq.Yard</option>
                                                                                        <option value="119">Sq.Meter</option>
                                                                                        <option value="120">VIGHA</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
    
                                                                        <div class="row mt-2" x-show="unit.has_carpet">
                                                                            <div class="input-group mb-3">
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <div class="fname" :class="unit.carpet_area == '' ? '' : 'focused' ">
                                                                                        <label class="mb-0">Carpet Area</label>
                                                                                        <input class="form-control" x-model="unit.carpet_area" name="carpet_area" type="text" autocomplete="off">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <span class="input-group-text" style="min-height:41px;">To</span>
                                                                                </div>
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <div class="fname" :class="unit.carpet_area_to == '' ? '' : 'focused' ">
                                                                                        <label class="mb-0">Carpet Area</label>
                                                                                        <input class="form-control" x-model="unit.carpet_area_to" name="carpet_area" type="text" autocomplete="off">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <select class="form-select form_measurement measure_select" :id="`second_carpet_area_select_${index}`">
                                                                                        <option value="117" selected>Sq.Ft.</option>
                                                                                        <option value="118">Sq.Yard</option>
                                                                                        <option value="119">Sq.Meter</option>
                                                                                        <option value="120">VIGHA</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mt-2">
                                                                            <div class="input-group mb-3">
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <div class="fname" :class="unit.wash_area == '' ? '' : 'focused' ">
                                                                                        <label class="mb-0">Wash Area</label>
                                                                                        <input class="form-control" x-model="unit.wash_area" name="wash_area" type="text" autocomplete="off">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <span class="input-group-text" style="min-height:41px;">To</span>
                                                                                </div>
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <div class="fname" :class="unit.wash_area_to == '' ? '' : 'focused' ">
                                                                                        <label class="mb-0">Wash Area</label>
                                                                                        <input class="form-control" x-model="unit.wash_area_to" name="wash_area" type="text" autocomplete="off">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <select class="form-select form_measurement measure_select" :id="`second_wash_area_select_${index}`">
                                                                                        <option value="117" selected>Sq.Ft.</option>
                                                                                        <option value="118">Sq.Yard</option>
                                                                                        <option value="119">Sq.Meter</option>
                                                                                        <option value="120">VIGHA</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mt-2">
                                                                            <div class="input-group mb-3">
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <div class="fname" :class="unit.balcony == '' ? '' : 'focused' ">
                                                                                        <label class="mb-0">Balcony Area</label>
                                                                                        <input class="form-control" x-model="unit.balcony" name="balcony_area" type="text" autocomplete="off">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <span class="input-group-text" style="min-height:41px;">To</span>
                                                                                </div>
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <div class="fname" :class="unit.balcony_to == '' ? '' : 'focused' ">
                                                                                        <label class="mb-0">Balcony Area</label>
                                                                                        <input class="form-control" x-model="unit.balcony_to" name="balcony_area" type="text" autocomplete="off">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <select class="form-select form_measurement measure_select" :id="`second_balcony_area_select_${index}`">
                                                                                        <option value="117" selected>Sq.Ft.</option>
                                                                                        <option value="118">Sq.Yard</option>
                                                                                        <option value="119">Sq.Meter</option>
                                                                                        <option value="120">VIGHA</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="col-md-4">
                                                                            <div class="input-group">
                                                                                <div class="form-group col-md-7 m-b-20">
                                                                                    <div class="fname" :class="unit.floor_height == '' ? '' : 'focused' ">
                                                                                        <label class="mb-0">Floor Height</label>
                                                                                        <input class="form-control" x-model="unit.floor_height" name="floor_height" type="text" autocomplete="off">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="input-group-append col-md-5 m-b-20">
                                                                                    <div class="form-group form_measurement">
                                                                                        <select class="form-select form_measurement measure_select" :id="`second_floor_height_select_${index}`">
                                                                                            <option selected="selected" value="121">Ft.</option>
                                                                                            <option value="122">Meter</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                
                                                                        <div class="row">
                                                                            <div class="form-check checkbox  checkbox-solid-success col-md-3 m-b-20">
                                                                                <input
                                                                                    class="project_amenity form-check-input" :id="`second_terrace_and_penthouse_checkbox_${index}`"
                                                                                    x-model="unit.has_terrace_and_carpet"
                                                                                    :name="`terrace_and_penthouse_checkbox_${index}`" type="checkbox">
                                                                                <label class="form-check-label" :for="`second_terrace_and_penthouse_checkbox_${index}`">Terrace & Penthouse</label>
                                                                            </div>
        
                                                                            <div class="form-check checkbox  checkbox-solid-success col-md-3 m-b-20">
                                                                                <input
                                                                                    class="project_amenity form-check-input" :id="`second_servant_room_checkbox_${index}`"
                                                                                    x-model="unit.servant_room"
                                                                                    :name="`servant_room_checkbox_${index}`" type="checkbox">
                                                                                <label class="form-check-label" :for="`second_servant_room_checkbox_${index}`">Servant Room</label>
                                                                            </div>
                                                                        </div>
        
                                                                        <div class="row">
                                                                            <div class="col-md-4" x-show="unit.has_terrace_and_carpet">
                                                                                <div class="input-group">
                                                                                    <div class="form-group col-md-7 m-b-20">
                                                                                        <div class="fname" :class="unit.terrace_carpet_area == '' ? '' : 'focused' ">
                                                                                            <label class="mb-0">Terrace carpet</label>
                                                                                            <input class="form-control" x-model="unit.terrace_carpet_area" name="terrace_carpet_area" type="text" autocomplete="off">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="input-group-append col-md-5 m-b-20">
                                                                                        <div class="form-group form_measurement">
                                                                                            <select class="form-select form_measurement measure_select" :id="`second_terrace_carpet_select_${index}`"
                                                                                                name="terrace_carpet_area_measurement">
                                                                                                <option value="117" selected>Sq.Ft.</option>
                                                                                                <option value="118">Sq.Yard</option>
                                                                                                <option value="119">Sq.Meter</option>
                                                                                                <option value="120">VIGHA</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                    
                                                                            <div class="col-md-4" x-show="unit.has_terrace_and_carpet">
                                                                                <div class="input-group">
                                                                                    <div class="form-group col-md-7 m-b-20">
                                                                                        <div class="fname" :class="unit.terrace_saleable_area == '' ? '' : 'focused' ">
                                                                                            <label class="mb-0">Terrace saleable</label>
                                                                                            <input
                                                                                                class="form-control"
                                                                                                name="terrace_super_builtup_area"
                                                                                                type="text"
                                                                                                x-model="unit.terrace_saleable_area"
                                                                                                autocomplete="off"
                                                                                            >
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="input-group-append col-md-5 m-b-20">
                                                                                        <div class="form-group form_measurement">
                                                                                            <select class="form-select form_measurement measure_select" :id="`second_terrace_saleable_select_${index}`"
                                                                                                name="terrace_super_builtup_area_measurement">
                                                                                                <option value="117" selected>Sq.Ft.</option>
                                                                                                <option value="118">Sq.Yard</option>
                                                                                                <option value="119">Sq.Meter</option>
                                                                                                <option value="120">VIGHA</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="form-group col-md-1 m-b-4 mb-3" x-show="index > 0">
                                                                                <button class="add_contacts btn btn-danger btn-air-danger" type="button" @click="removeUnitDetail(index)" title="">-</button>
                                                                            </div>
                                                                            <div class="form-group col-md-1 m-b-4 mb-3" x-show="index == 0">
                                                                                <button class="add_contacts btn btn-danger btn-air-danger" type="button" data-bs-original-title="" @click="addUnitDetail()" title="">+</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </template>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row" x-show="property_type=='88'||property_type=='89'">
                                                        <div class="row mt-3">
                                                            <div class="form-group col-md-12">
                                                                <h5 class="border-style">Retail</h5>
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <div>
                                                                    <label><b>Sub category</b></label>
                                                                </div>

                                                                <div class="m-checkbox-inline custom-radio-ml">
                                                                    <div class="btn-group bromi-checkbox-btn me-1"
                                                                        role="group"
                                                                        aria-label="Basic radio toggle button group">
                                                                        <input type="checkbox" class="btn-check"
                                                                            value="37" id="extraretailkind1"
                                                                            x-model="sub_categories"
                                                                            data-error="#retail_type_error"
                                                                            autocomplete="off">
                                                                        <label
                                                                            class="btn btn-outline-primary btn-pill btn-sm py-1"
                                                                            for="extraretailkind1">Ground floor</label>
                                                                    </div>
                                                                    <div class="btn-group bromi-checkbox-btn me-1"
                                                                        role="group"
                                                                        aria-label="Basic radio toggle button group">
                                                                        <input type="checkbox" class="btn-check"
                                                                            data-error="#retail_type_error" x-model="sub_categories" value="38"
                                                                            id="extraretailkind2"
                                                                            autocomplete="off">
                                                                        <label
                                                                            class="btn btn-outline-primary btn-pill btn-sm py-1"
                                                                            for="extraretailkind2">1st floor</label>
                                                                    </div>
                                                                    <div class="btn-group bromi-checkbox-btn me-1"
                                                                        role="group"
                                                                        aria-label="Basic radio toggle button group">
                                                                        <input type="checkbox" class="btn-check"
                                                                            data-error="#retail_type_error" value="39"
                                                                            id="extraretailkind3" x-model="sub_categories"
                                                                            autocomplete="off">
                                                                        <label
                                                                            class="btn btn-outline-primary btn-pill btn-sm py-1"
                                                                            for="extraretailkind3">2nd floor</label>
                                                                    </div>
                                                                    <div class="btn-group bromi-checkbox-btn me-1"
                                                                        role="group"
                                                                        aria-label="Basic radio toggle button group">
                                                                        <input type="checkbox" class="btn-check" x-model="sub_categories"
                                                                            data-error="#retail_type_error" value="40"
                                                                            id="extraretailkind4"
                                                                            autocomplete="off">
                                                                        <label
                                                                            class="btn btn-outline-primary btn-pill btn-sm py-1"
                                                                            for="extraretailkind4">3rd floor
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div x-show="sub_categories.length > 0">
                                                                <label><b>Unit Details</b></label>

                                                                <template x-for="(tower, index) in if_retail_tower_details">
                                                                    <div class="row mt-2">
                                                                        <div x-show="index > 0">
                                                                            <hr>
                                                                        </div>
                                                                        <div class="form-group col-md-3 m-b-20">
                                                                            <div class="fname" :class="tower.tower_name == '' ? '' : 'focused' ">
                                                                                <span class="d-none" x-text="nextTickForIfRetail()"></span>
                                                                                <label>Tower Name</label>
                                                                                <div class="fvalue">
                                                                                    <input class="form-control" x-model="tower.tower_name" name="tower_name" type="text" autocomplete="off" data-bs-original-title="" title="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
        
                                                                        <div class="form-group col-md-3 m-b-20">
                                                                            <select class="form-select" name="tower_sub_category" :id="`extra_floor_category_${index}`">
                                                                                <option value="">Sub Category</option>
                                                                                <option value="Ground">Ground</option>
                                                                                <option value="First">First</option>
                                                                                <option value="Second">Second</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="input-group mb-3">
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <div class="fname" :class="tower.size_from == '' ? '' : 'focused' ">
                                                                                        <div class="fvalue">
                                                                                            <input
                                                                                                type="text"
                                                                                                class="form-control"
                                                                                                placeholder="size" data-bs-original-title="" x-model="tower.size_from"
                                                                                            >
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <span class="input-group-text" style="min-height:41px;">To</span>
                                                                                </div>
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <div class="fname" :class="tower.size_to == '' ? '' : 'focused' ">
                                                                                        <div class="fvalue">
                                                                                            <input
                                                                                                type="text"
                                                                                                class="form-control"
                                                                                                placeholder="size"
                                                                                                x-model="tower.size_to"
                                                                                            >
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <select class="form-select" :id="`extra_tower_size_from_to_select_${index}`" :class="errors.hasOwnProperty('builder_id') ? 'is-invalid' : ''">
                                                                                        <option value="117" selected>Sq.Ft.</option>
                                                                                        <option value="118">Sq.Yard</option>
                                                                                        <option value="119">Sq.Meter</option>
                                                                                        <option value="120">VIGHA</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="row">
                                                                            <div class="form-group col-md-3 m-b-5">
                                                                                <div class="input-group">
                                                                                    <div class="form-group col-md-7 m-b-20">
                                                                                        <div class="fname" :class="tower.front_opening == '' ? '' : 'focused' ">
                                                                                            <label class="mb-0">Front Opening</label>
                                                                                            <input class="form-control" name="ceiling_height" type="text" 
                                                                                            x-model="tower.front_opening" autocomplete="off"
                                                                                            data-bs-original-title="" title="">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="input-group-append col-md-5 m-b-20">
                                                                                        <div class="form-group form_measurement">
                                                                                            <select class="form-select form_measurement measure_select" name="tower_front_opening_select" :id="`extra_tower_front_opening_select_${index}`">
                                                                                                <option selected="selected" value="121">Ft.</option>
                                                                                                <option value="122">Meter</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 m-b-20">
                                                                                <div class="fname" :class="tower.number_of_each_floor == '' ? '' : 'focused' ">
                                                                                    <label>No. of unit each floor</label>
                                                                                    <div class="fvalue">
                                                                                        <input class="form-control" x-model="tower.number_of_each_floor" name="no_of_unit_each_floor" type="text" autocomplete="off" data-bs-original-title="" title="">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 m-b-5">
                                                                                <div class="input-group">
                                                                                    <div class="form-group col-md-7 m-b-20">
                                                                                        <div class="fname" :class="tower.ceiling_height == '' ? '' : 'focused' ">
                                                                                            <label class="mb-0">Ceiling Height</label>
                                                                                            <input class="form-control" name="ceiling_height" type="text" 
                                                                                            x-model="tower.ceiling_height" autocomplete="off" data-bs-original-title="" title="">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="input-group-append col-md-5 m-b-20">
                                                                                        <div class="form-group form_measurement">
                                                                                            <select class="form-select form_measurement measure_select" name="tower_ceiling_select" :id="`extra_tower_ceiling_select_${index}`">
                                                                                                <option selected="selected" value="121">Ft.</option>
                                                                                                <option value="122">Meter</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </template>
                                                                <div class="row" x-show="if_office_or_retail.number_of_tower > 1">
                                                                    <div class="form-group col-md-3">
                                                                        <button
                                                                            class="btn btn-primary btn-air-primary"
                                                                            type="button"
                                                                            @click="addRetailUnitDetails()"
                                                                        >Add Floors</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3" x-show="property_category == 259">
                                                        <div class="col-md-12 mb-3">
                                                            <div>
                                                                <label><b>Sub category</b></label>
                                                            </div>
                                                            <div class="m-checkbox-inline custom-radio-ml">
                                                                <div class="btn-group bromi-checkbox-btn me-1"
                                                                    role="group"
                                                                    aria-label="Basic radio toggle button group">
                                                                    <input
                                                                        type="radio"
                                                                        class="btn-check"
                                                                        value="1"
                                                                        id="officeekind1"
                                                                        x-model="sub_category_single"
                                                                        name="sub_category_single"
                                                                    >
                                                                    <label
                                                                        class="btn btn-outline-primary btn-pill btn-sm py-1"
                                                                        for="officeekind1"
                                                                    >office space</label>
                                                                </div>

                                                                <div class="btn-group bromi-checkbox-btn me-1"
                                                                    role="group"
                                                                    aria-label="Basic radio toggle button group">
                                                                    <input
                                                                        type="radio"
                                                                        class="btn-check"
                                                                        value="2"
                                                                        id="officekind2"
                                                                        x-model="sub_category_single"
                                                                        name="sub_category_single"
                                                                    >
                                                                    <label class="btn btn-outline-primary btn-pill btn-sm py-1" for="officekind2">Co-working</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3" x-show="property_category == 260">
                                                        <div class="col-md-12 mb-3">
                                                            <div>
                                                                <label><b>Sub category</b></label>
                                                            </div>
                                                            <div class="m-checkbox-inline custom-radio-ml">
                                                                <div class="btn-group bromi-checkbox-btn me-1"
                                                                    role="group"
                                                                    aria-label="Basic radio toggle button group">
                                                                    <input type="checkbox" class="btn-check"
                                                                        value="3" id="retailkind1"
                                                                        x-model="sub_categories"
                                                                        data-error="#retail_type_error"
                                                                        autocomplete="off">
                                                                    <label
                                                                        class="btn btn-outline-primary btn-pill btn-sm py-1"
                                                                        for="retailkind1">Ground floor</label>
                                                                </div>
                                                                <div class="btn-group bromi-checkbox-btn me-1"
                                                                    role="group"
                                                                    aria-label="Basic radio toggle button group">
                                                                    <input type="checkbox" class="btn-check"
                                                                        data-error="#retail_type_error" x-model="sub_categories" value="4"
                                                                        id="retailkind2"
                                                                        autocomplete="off">
                                                                    <label
                                                                        class="btn btn-outline-primary btn-pill btn-sm py-1"
                                                                        for="retailkind2">1st floor</label>
                                                                </div>
                                                                <div class="btn-group bromi-checkbox-btn me-1"
                                                                    role="group"
                                                                    aria-label="Basic radio toggle button group">
                                                                    <input type="checkbox" class="btn-check"
                                                                        data-error="#retail_type_error" value="5"
                                                                        id="retailkind3" x-model="sub_categories"
                                                                        autocomplete="off">
                                                                    <label
                                                                        class="btn btn-outline-primary btn-pill btn-sm py-1"
                                                                        for="retailkind3">2nd floor</label>
                                                                </div>
                                                                <div class="btn-group bromi-checkbox-btn me-1"
                                                                    role="group"
                                                                    aria-label="Basic radio toggle button group">
                                                                    <input type="checkbox" class="btn-check" x-model="sub_categories"
                                                                        data-error="#retail_type_error" value="6"
                                                                        id="retailkind4"
                                                                        autocomplete="off">
                                                                    <label
                                                                        class="btn btn-outline-primary btn-pill btn-sm py-1"
                                                                        for="retailkind4">3rd floor
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3" x-show="property_category == 261">
                                                        <div class="col-md-12 mb-3">
                                                            <div>
                                                                <label><b>Sub category</b></label>
                                                            </div>
                                                            <div class="m-checkbox-inline custom-radio-ml">
                                                                <div class="btn-group bromi-checkbox-btn me-1"
                                                                    role="group"
                                                                    aria-label="Basic radio toggle button group">
                                                                    <input
                                                                        type="radio"
                                                                        class="btn-check"
                                                                        value="7"
                                                                        id="storagekind1"
                                                                        x-model="sub_category_single"
                                                                        name="sub_category_single"
                                                                    >
                                                                    <label
                                                                        class="btn btn-outline-primary btn-pill btn-sm py-1"
                                                                        for="storagekind1">Warehouse</label>
                                                                </div>
                                                                <div class="btn-group bromi-checkbox-btn me-1"
                                                                    role="group"
                                                                    aria-label="Basic radio toggle button group">
                                                                    <input
                                                                        type="radio"
                                                                        class="btn-check"
                                                                        value="8"
                                                                        id="storagekind2"
                                                                        x-model="sub_category_single"
                                                                        name="sub_category_single"
                                                                    >
                                                                    <label
                                                                        class="btn btn-outline-primary btn-pill btn-sm py-1"
                                                                        for="storagekind2">Cold Storage</label>
                                                                </div>
                                                                <div class="btn-group bromi-checkbox-btn me-1"
                                                                    role="group"
                                                                    aria-label="Basic radio toggle button group">
                                                                    <input
                                                                        type="radio"
                                                                        class="btn-check"
                                                                        value="9"
                                                                        id="storagekind3"
                                                                        x-model="sub_category_single"
                                                                        name="sub_category_single"
                                                                    >
                                                                    <label
                                                                        class="btn btn-outline-primary btn-pill btn-sm py-1"
                                                                        for="storagekind3">ind. shed</label>
                                                                </div>
                                                                <div class="btn-group bromi-checkbox-btn me-1"
                                                                    role="group"
                                                                    aria-label="Basic radio toggle button group">
                                                                    <input
                                                                        type="radio"
                                                                        class="btn-check"
                                                                        value="10"
                                                                        id="storagekind4"
                                                                        x-model="sub_category_single"
                                                                        name="sub_category_single"
                                                                    >
                                                                    <label
                                                                        class="btn btn-outline-primary btn-pill btn-sm py-1"
                                                                        for="storagekind4">Plotting</label>
                                                                </div>
                                                            </div>
                                                            <div id="storage_type_error"></div>
                                                        </div>
                                                    </div>

													<div class="row mb-3" x-show="property_category == 254 || property_category == 257">
                                                        <div class="col-md-12 mb-3">
                                                            <div>
                                                                <label><b>Sub category</b></label>
                                                            </div>
                                                            <div class="m-checkbox-inline custom-radio-ml">
                                                                <div class="the_1rk btn-group bromi-checkbox-btn me-1"
                                                                    role="group"
                                                                    aria-label="Basic radio toggle button group">
                                                                    <input type="checkbox" class="btn-check"
                                                                        x-model="sub_categories"
                                                                        @click="addWingSubCategory($event,'1 rk')"
                                                                        value="13" id="flatkind1" name="flat_type[]"
                                                                        data-error="#flat_type_error" autocomplete="off">
                                                                    <label
                                                                        class="btn btn-outline-primary btn-pill btn-sm py-1"
                                                                        for="flatkind1">1 rk</label>
                                                                </div>
                                                                <div class="btn-group bromi-checkbox-btn me-1"
                                                                    role="group"
                                                                    aria-label="Basic radio toggle button group">
                                                                    <input type="checkbox" class="btn-check"
                                                                        value="14" id="flatkind2" x-model="sub_categories" name="flat_type[]"
                                                                        @click="addWingSubCategory($event,'1 bhk')"
                                                                        data-error="#flat_type_error" autocomplete="off">
                                                                    <label
                                                                        class="btn btn-outline-primary btn-pill btn-sm py-1"
                                                                        for="flatkind2">1bhk</label>
                                                                </div>
                                                                <div class="btn-group bromi-checkbox-btn me-1"
                                                                    role="group"
                                                                    aria-label="Basic radio toggle button group">
                                                                    <input type="checkbox" class="btn-check"
                                                                        value="15" x-model="sub_categories" id="flatkind3" name="flat_type[]"
                                                                        @click="addWingSubCategory($event,'2 bhk')"
                                                                        data-error="#flat_type_error" autocomplete="off">
                                                                    <label
                                                                        class="btn btn-outline-primary btn-pill btn-sm py-1"
                                                                        for="flatkind3">2bhk</label>
                                                                </div>
                                                                <div class="btn-group bromi-checkbox-btn me-1"
                                                                    role="group"
                                                                    aria-label="Basic radio toggle button group">
                                                                    <input type="checkbox" class="btn-check"
                                                                        value="16" x-model="sub_categories" id="flatkind4" name="flat_type[]"
                                                                        @click="addWingSubCategory($event,'3 bhk')"
                                                                        data-error="#flat_type_error" autocomplete="off">
                                                                    <label
                                                                        class="btn btn-outline-primary btn-pill btn-sm py-1"
                                                                        for="flatkind4">3bhk</label>
                                                                </div>
                                                                <div class="btn-group bromi-checkbox-btn me-1"
                                                                    role="group"
                                                                    aria-label="Basic radio toggle button group">
                                                                    <input type="checkbox" class="btn-check"
                                                                        value="17" x-model="sub_categories" id="flatkind5" name="flat_type[]"
                                                                        @click="addWingSubCategory($event,'4 bhk')"
                                                                        data-error="#flat_type_error" autocomplete="off">
                                                                    <label
                                                                        class="btn btn-outline-primary btn-pill btn-sm py-1"
                                                                        for="flatkind5">4bhk</label>
                                                                </div>
                                                                <div class="btn-group bromi-checkbox-btn me-1"
                                                                    role="group"
                                                                    aria-label="Basic radio toggle button group">
                                                                    <input type="checkbox" class="btn-check"
                                                                        value="18" x-model="sub_categories" id="flatkind6" name="flat_type[]"
                                                                        @click="addWingSubCategory($event,'4+ bhk')"
                                                                        data-error="#flat_type_error" autocomplete="off">
                                                                    <label
                                                                        class="btn btn-outline-primary btn-pill btn-sm py-1"
                                                                        for="flatkind6">4+bhk</label>
                                                                </div>
                                                            </div>
                                                            <div id="flat_type_error"></div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3 div_vila_type" x-show="property_category =='255'">
                                                        <div class="col-md-12 mb-3">
                                                            <div>
                                                                <label><b>Sub category</b></label>
                                                            </div>
                                                            <div class="m-checkbox-inline custom-radio-ml">
                                                                <div class="btn-group bromi-checkbox-btn me-1" role="group" aria-label="Basic radio toggle button group">
                                                                    <input type="checkbox" class="btn-check" value="21" id="vilakind1" data-val="resedential" x-model="sub_categories" name="vila_type" data-error="#vila_type_error" autocomplete="off" data-bs-original-title="" title="">
                                                                    <label class="btn btn-outline-primary btn-pill btn-sm py-1" for="vilakind1">1 Bed</label>
                                                                </div>
                                                                <div class="btn-group bromi-checkbox-btn me-1" role="group" aria-label="Basic radio toggle button group">
                                                                    <input type="checkbox" class="btn-check" value="22" id="vilakind2" data-val="resedential" x-model="sub_categories" name="vila_type" data-error="#vila_type_error" autocomplete="off" data-bs-original-title="" title="">
                                                                    <label class="btn btn-outline-primary btn-pill btn-sm py-1" for="vilakind2">2 Bed</label>
                                                                </div>
                                                                <div class="btn-group bromi-checkbox-btn me-1" role="group" aria-label="Basic radio toggle button group">
                                                                    <input type="checkbox" data-val="resedential" class="btn-check" value="23" id="vilakind3" x-model="sub_categories" name="vila_type" data-error="#vila_type_error" autocomplete="off" data-bs-original-title="" title="">
                                                                    <label class="btn btn-outline-primary btn-pill btn-sm py-1" for="vilakind3">3 Bed</label>
                                                                </div>
                                                                <div class="btn-group bromi-checkbox-btn me-1" role="group" aria-label="Basic radio toggle button group">
                                                                    <input type="checkbox" data-val="resedential" class="btn-check" value="24" id="vilakind4" x-model="sub_categories" name="vila_type" data-error="#vila_type_error" autocomplete="off" data-bs-original-title="" title="">
                                                                    <label class="btn btn-outline-primary btn-pill btn-sm py-1" for="vilakind4">4 Bed</label>
                                                                </div>
                                                                <div class="btn-group bromi-checkbox-btn me-1" role="group" aria-label="Basic radio toggle button group">
                                                                    <input type="checkbox" class="btn-check" value="25" data-val="resedential" x-model="sub_categories" id="vilakind5" name="vila_type" data-error="#vila_type_error" autocomplete="off" data-bs-original-title="" title="">
                                                                    <label class="btn btn-outline-primary btn-pill btn-sm py-1" for="vilakind5">4+ Bed</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3" x-show="property_category == 262 || property_category == 256">
                                                        <div class="col-md-12 mb-2">
                                                            <div>
                                                                <label><b>Sub category</b></label>
                                                            </div>
                                                            <div class="m-checkbox-inline custom-radio-ml">
                                                                <div class="btn-group bromi-checkbox-btn me-1"
                                                                    role="group"
                                                                    aria-label="Basic radio toggle button group">
                                                                    <input
                                                                        type="radio" 
                                                                        class="btn-check"
                                                                        value="10"
                                                                        id="plotkind1"
                                                                        x-model="sub_category_single"
                                                                        name="sub_category_single"
                                                                    >
                                                                    <label
                                                                        class="btn btn-outline-primary btn-pill btn-sm py-1"
                                                                        for="plotkind1">Commercial Land</label>
                                                                </div>
                                                                <div class="btn-group bromi-checkbox-btn me-1"
                                                                    role="group"
                                                                    aria-label="Basic radio toggle button group">
                                                                    <input 
                                                                        type="radio" 
                                                                        class="btn-check"
                                                                        value="11"
                                                                        id="plotkind2"
                                                                        x-model="sub_category_single"
                                                                        name="sub_category_single"
                                                                    >
                                                                    <label
                                                                        class="btn btn-outline-primary btn-pill btn-sm py-1"
                                                                        for="plotkind2">Agricultural/Farm Land</label>
                                                                </div>
                                                                <div class="btn-group bromi-checkbox-btn me-1"
                                                                    role="group"
                                                                    aria-label="Basic radio toggle button group">
                                                                    <input
                                                                        type="radio"
                                                                        class="btn-check"
                                                                        value="12"
                                                                        id="plotkind3"
                                                                        x-model="sub_category_single"
                                                                        name="sub_category_single"
                                                                    >
                                                                    <label
                                                                        class="btn btn-outline-primary btn-pill btn-sm py-1"
                                                                        for="plotkind3">Industrial Land</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <template x-if="(sub_category_single != '') || (sub_categories.length > 0)">
                                                        <div>
                                                            <div x-show="property_category == 261 && sub_category_single != ''">
                                                                <template x-for="(types, index) in if_ware_cold_ind_plot.types">
                                                                    <div class="col-md-10">
                                                                        <div class="row">
                                                                            <div class="form-group col-md-4 m-b-5">
                                                                                <span>Plot Area</span>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <div class="fname" :class="types.plot_area_from == '' ? '' : 'focused' ">
                                                                                        <div class="fvalue">
                                                                                            <input
                                                                                                type="text"
                                                                                                class="form-control"
                                                                                                placeholder="size" data-bs-original-title="" x-model="types.plot_area_from"
                                                                                            >
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <span class="input-group-text" style="min-height:41px;">To</span>
                                                                                </div>
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <div class="fname" :class="types.plot_area_to == '' ? '' : 'focused' ">
                                                                                        <div class="fvalue">
                                                                                            <input
                                                                                                type="text"
                                                                                                class="form-control"
                                                                                                placeholder="size"
                                                                                                x-model="types.plot_area_to"
                                                                                            >
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <select class="form-select" :id="`carpet_from_to_select_${index}`" :class="errors.hasOwnProperty('builder_id') ? 'is-invalid' : ''">
                                                                                        <option value="117" selected>Sq.Ft.</option>
                                                                                        <option value="118">Sq.Yard</option>
                                                                                        <option value="119">Sq.Meter</option>
                                                                                        <option value="120">VIGHA</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row" x-show="sub_category_single != 10">
                                                                            <div class="form-group col-md-4 m-b-5">
                                                                                <span>Construced Area</span>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <div class="fname" :class="types.construced_area_from == '' ? '' : 'focused' ">
                                                                                        <div class="fvalue">
                                                                                            <input
                                                                                                type="text"
                                                                                                class="form-control"
                                                                                                placeholder="size"
                                                                                                x-model="types.construced_area_from"
                                                                                            >
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <span class="input-group-text" style="min-height:41px;">To</span>
                                                                                </div>
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <div class="fname" :class="types.construced_area_to == '' ? '' : 'focused' ">
                                                                                        <div class="fvalue">
                                                                                            <input
                                                                                                type="text"
                                                                                                class="form-control"
                                                                                                placeholder="size"
                                                                                                x-model="types.construced_area_to"
                                                                                            >
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <select class="form-select" :id="`constructed_from_to_select_${index}`" :class="errors.hasOwnProperty('builder_id') ? 'is-invalid' : ''">
                                                                                        <option value="117" selected>Sq.Ft.</option>
                                                                                        <option value="118">Sq.Yard</option>
                                                                                        <option value="119">Sq.Meter</option>
                                                                                        <option value="120">VIGHA</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="form-group col-md-4 m-b-5">
                                                                                <span>Road width of front side area</span>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <div class="fname" :class="types.road_width_of_front_side_area_from == '' ? '' : 'focused' ">
                                                                                        <div class="fvalue">
                                                                                            <input
                                                                                                type="text"
                                                                                                class="form-control"
                                                                                                placeholder="size"
                                                                                                x-model="types.road_width_of_front_side_area_from"
                                                                                            >
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <span class="input-group-text" style="min-height:41px;">To</span>
                                                                                </div>
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <div class="fname" :class="types.road_width_of_front_side_area_to == '' ? '' : 'focused' ">
                                                                                        <div class="fvalue">
                                                                                            <input
                                                                                                type="text"
                                                                                                class="form-control"
                                                                                                placeholder="size"
                                                                                                x-model="types.road_width_of_front_side_area_to"
                                                                                            >
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <select class="form-select" :id="`road_width_of_front_side_area_from_to_select_${index}`" :class="errors.hasOwnProperty('builder_id') ? 'is-invalid' : ''">
                                                                                        <option value="117" selected>Sq.Ft.</option>
                                                                                        <option value="118">Sq.Yard</option>
                                                                                        <option value="119">Sq.Meter</option>
                                                                                        <option value="120">VIGHA</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="form-group col-md-6 m-b-5">
                                                                                <div class="input-group">
                                                                                    <div class="form-group col-md-7 m-b-20">
                                                                                        <div class="fname" :class="types.ceiling_height == '' ? '' : 'focused' ">
                                                                                            <label class="mb-0">Ceiling Height</label>
                                                                                            <input class="form-control" type="text" 
                                                                                            x-model="types.ceiling_height">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="input-group-append col-md-5 m-b-20">
                                                                                        <div class="form-group form_measurement">
                                                                                            <select class="form-select form_measurement measure_select" :id="`type_ceiling_height_${index}`">
                                                                                                <option selected="selected" value="121">Ft.</option>
                                                                                                <option value="122">Meter</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3 mt-2" x-show="index == 0">
                                                                            <div class="col-md-1">
                                                                                <span class="d-none" x-text="nextTickForWareColdPlot"></span>
                                                                                <button
                                                                                    class="add_contacts btn btn-danger btn-air-danger"
                                                                                    type="button"
                                                                                    @click="addType()"
                                                                                >+</button>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3 mt-2" x-show="index > 0">
                                                                            <div class="col-md-1">
                                                                                <button
                                                                                    class="add_contacts btn btn-danger btn-air-danger"
                                                                                    type="button"
                                                                                    @click="removeType(index)"
                                                                                >-</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </template>
                                                            </div>
        
                                                            <div class="row mt-2 mb-2 col-md-11" x-show="property_category == 261 && sub_category_single != ''">
                                                                <hr class="mb-4">
                                                                <div>
                                                                    <label><b>Facilities</b></label>
                                                                </div>

                                                                <div class="row mt-3 mb-3">
                                                                    <div class="col-md-5">
                                                                        <div class="fname">
                                                                            <label>Field Name</label>
                                                                            <div class="fvalue">
                                                                                <input
                                                                                    class="form-control valid filled"
                                                                                    type="text"
                                                                                    x-model="new_facility_input"
                                                                                >
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <button
                                                                            class="btn mb-3 btn-primary btn-air-primary"
                                                                            type="button"
                                                                            :disabled="new_facility_input == ''"
                                                                            @click="addNewFacility()"
                                                                        >Add Field</button>
                                                                    </div>
                                                                </div>

                                                                <template x-for="(extra_facility, index) in extra_facilities" :key="`extra_facility_${index}`">
                                                                    <div class="row mb-2">
                                                                        <div class="form-check checkbox mb-3 checkbox-solid-success mb-0 col-md-3 m-b-20">
                                                                            <input
                                                                                class="form-check-input"
                                                                                type="checkbox"
                                                                                :id="`extra_facility_${index}`"
                                                                                :checked="extra_facility.detail != ''"
                                                                                x-model="extra_facility.id"
                                                                            >
                                                                            <label
                                                                                class="form-check-label"
                                                                                :for="`extra_facility_${index}`"
                                                                                x-text="extra_facility.name"
                                                                            ></label>
                                                                        </div>
                                                                        <div class="form-group mb-3 col-md-7 m-b-20" style="margin-left:5px;">
                                                                            <div class="fname" :class="extra_facility.detail  == '' ? '' : 'focused' ">
                                                                                <label x-text="extra_facility.name"></label>
                                                                                <div class="fvalue">
                                                                                    <input
                                                                                        class="form-control"
                                                                                        type="text"
                                                                                        x-model="extra_facility.detail"
                                                                                    >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                            <button
                                                                                class="add_contacts btn btn-danger btn-air-danger" type="button"
                                                                                @click="removeExtraFacility(index)"
                                                                            >-</button>
                                                                        </div>
                                                                    </div>
                                                                </template>

                                                                <div class="form-check checkbox mb-3 checkbox-solid-success mb-0 col-md-3 pe-0 m-b-20">
                                                                    <input
                                                                        class="form-check-input extra_industrial_field"
                                                                        type="checkbox"
                                                                        id="pcb"
                                                                        :checked="storage_industrial.pcb_detail != ''"
                                                                        x-model="storage_industrial.pcb"
                                                                    >
                                                                    <label
                                                                        class="form-check-label"
                                                                        for="pcb"
                                                                    >Pollution Control Board</label>
                                                                </div>
                                                                <div class="form-group mb-3 col-md-9 m-b-20">
                                                                    <div class="fname" :class="storage_industrial.pcb_detail == '' ? '' : 'focused' ">
                                                                        <label> Pollution Control Board</label>
                                                                        <div class="fvalue">
                                                                            <input
                                                                                class="form-control"
                                                                                type="text"
                                                                                x-model="storage_industrial.pcb_detail"
                                                                            >
                                                                        </div>
                                                                    </div>
                                                                </div>
        
                                                                <div class="form-check checkbox mb-3 checkbox-solid-success mb-0 col-md-3 pe-0 m-b-20">
                                                                    <input
                                                                        class="form-check-input extra_industrial_field"
                                                                        type="checkbox"
                                                                        id="ec"
                                                                        :checked="storage_industrial.ec_detail != ''"
                                                                        x-model="storage_industrial.ec"
                                                                    >
                                                                    <label
                                                                        class="form-check-label"
                                                                        for="ec"
                                                                    >EC</label>
                                                                </div>
                                                                <div class="form-group mb-3 col-md-9 m-b-20">
                                                                    <div class="fname" :class="storage_industrial.ec_detail == '' ? '' : 'focused' ">
                                                                        <label> EC</label>
                                                                        <div class="fvalue">
                                                                            <input
                                                                                class="form-control"
                                                                                type="text"
                                                                                x-model="storage_industrial.ec_detail"
                                                                            >
                                                                        </div>
                                                                    </div>
                                                                </div>
        
                                                                <div class="form-check checkbox mb-3 checkbox-solid-success mb-0 col-md-3 pe-0 m-b-20">
                                                                    <input
                                                                        class="form-check-input extra_industrial_field"
                                                                        type="checkbox"
                                                                        id="gas"
                                                                        :checked="storage_industrial.gas_detail != ''"
                                                                        x-model="storage_industrial.gas"
                                                                    >
                                                                    <label
                                                                        class="form-check-label"
                                                                        for="gas"
                                                                    >Gas</label>
                                                                </div>
                                                                <div class="form-group mb-3 col-md-9 m-b-20">
                                                                    <div class="fname" :class="storage_industrial.gas_detail == '' ? '' : 'focused' ">
                                                                        <label> Gas</label>
                                                                        <div class="fvalue">
                                                                            <input
                                                                                class="form-control"
                                                                                type="text"
                                                                                x-model="storage_industrial.gas_detail"
                                                                            >
                                                                        </div>
                                                                    </div>
                                                                </div>
        
                                                                <div class="form-check checkbox mb-3 checkbox-solid-success mb-0 col-md-3 pe-0">
                                                                    <input
                                                                        class="form-check-input extra_industrial_field"
                                                                        type="checkbox"
                                                                        id="power"
                                                                        :checked="storage_industrial.power_detail != ''"
                                                                        x-model="storage_industrial.power"
                                                                    >
                                                                    <label class="form-check-label" for="power">Power</label>
                                                                </div>
                                                                <div class="form-group col-md-9 mb-3">
                                                                    <div class="fname" :class="storage_industrial.power_detail == '' ? '' : 'focused' ">
                                                                        <label>Power</label>
                                                                        <div class="fvalue">
                                                                            <input
                                                                                class="form-control"
                                                                                type="text"
                                                                                x-model="storage_industrial.power_detail"
                                                                            >
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="form-check checkbox mb-3 checkbox-solid-success mb-0 col-md-3 pe-0">
                                                                    <input
                                                                        class="form-check-input"
                                                                        type="checkbox"
                                                                        id="water"
                                                                        :checked="storage_industrial.water_detail != ''"
                                                                        x-model="storage_industrial.water"
                                                                    >
                                                                    <label class="form-check-label" for="water">Water</label>
                                                                </div>
                                                                <div class="form-group col-md-9 mb-3">
                                                                    <div class="fname" :class="storage_industrial.water_detail == '' ? '' : 'focused' ">
                                                                        <label>Water</label>
                                                                        <div class="fvalue">
                                                                            <input
                                                                                class="form-control"
                                                                                type="text"
                                                                                x-model="storage_industrial.water_detail"
                                                                            >
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <template x-if="property_category == '254' || property_category == '257'">
                                                                <div class="row mb-2">
                                                                    <div class="col-md-2 mb-3">
                                                                        <div class="fname" :class="is_flat_or_penthouse.number_of_towers == '' ? '' : 'focused' ">
                                                                            <label for="Total Floor">No. Of Tower</label>
                                                                            <div class="fvalue">
                                                                                <input class="form-control" x-model="is_flat_or_penthouse.number_of_towers" type="text" autocomplete="off"
                                                                                data-bs-original-title="" title="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2 mb-3">
                                                                        <div class="fname" :class="is_flat_or_penthouse.number_of_floors == '' ? '' : 'focused' ">
                                                                            <label for="Property on floor">No. Of Floors</label>
                                                                            <div class="fvalue">
                                                                                <input class="form-control" x-model="is_flat_or_penthouse.number_of_floors" type="text" autocomplete="off" data-bs-original-title="" title="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2 mb-3 the_total_units_in_tower">
                                                                        <div class="fname" :class="is_flat_or_penthouse.total_units == '' ? '' : 'focused' ">
                                                                            <label for="Total Floor">Total Units</label>
                                                                            <div class="fvalue">
                                                                                <input class="form-control" x-model="is_flat_or_penthouse.total_units" type="text" autocomplete="off" data-bs-original-title="" title="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 mb-3 the_total_elevator_in_tower">
                                                                        <div class="fname" :class="is_flat_or_penthouse.number_of_elevator == '' ? '' : 'focused' ">
                                                                            <label for="Total Floor">No. of Elevator in each tower</label>
                                                                            <div class="fvalue">
                                                                                <input class="form-control" x-model="is_flat_or_penthouse.number_of_elevator" type="text" autocomplete="off" data-bs-original-title="" title="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </template>
        
                                                            <template x-if="property_category == '259' || property_category == '260'">
                                                                <div class="row mt-2">
                                                                    <div>
                                                                        <label><b>Tower Details</b></label>
                                                                        <span class="d-none" x-text="nexttickForFirstCondition()"></span>
                                                                    </div>
                                                                    <div class="form-group col-md-2 m-b-20">
                                                                        <div class="fname" :class="if_office_or_retail.number_of_tower == '' ? '' : 'focused' ">
                                                                            <label>No. of Towers</label>
                                                                            <div class="fvalue">
                                                                                <input
                                                                                    class="form-control" name="first_number_of_tower"
                                                                                    type="text"
                                                                                    id="number_of_tower"
                                                                                    x-model="if_office_or_retail.number_of_tower"
                                                                                >
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-3 m-b-20">
                                                                        <div class="fname" :class="if_office_or_retail.number_of_floor == '' ? '' : 'focused' ">
                                                                            <label>No. of Floors</label>
                                                                            <div class="fvalue">
                                                                                <input class="form-control" name="first_number_of_floors" type="text" x-model="if_office_or_retail.number_of_floor" autocomplete="off" data-bs-original-title="" title="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-3 m-b-20">
                                                                        <div class="fname" :class="if_office_or_retail.number_of_unit == '' ? '' : 'focused' ">
                                                                            <label>Total Units </label>
                                                                            <div class="fvalue">
                                                                                <input class="form-control" x-model="if_office_or_retail.number_of_unit" name="first_total_units" type="text" autocomplete="off" data-bs-original-title="" title="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-3 m-b-20">
                                                                        <div class="fname" :class="if_office_or_retail.number_of_unit_each_block == '' ? '' : 'focused' ">
                                                                            <label>No. of Unit each block </label>
                                                                            <div class="fvalue">
                                                                                <input class="form-control" name="first_number_of_unit_each_block" x-model="if_office_or_retail.number_of_unit_each_block" type="text" autocomplete="off" data-bs-original-title="" title="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-3 m-b-20">
                                                                        <div class="fname" :class="if_office_or_retail.number_of_lift == '' ? '' : 'focused' ">
                                                                            <label>No. of Lift </label>
                                                                            <div class="fvalue">
                                                                                <input class="form-control" x-model="if_office_or_retail.number_of_lift" name="first_number_of_lift" type="text" autocomplete="off" data-bs-original-title="" title="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
        
                                                                    <div class="form-group col-md-5 m-b-5">
                                                                        <div class="input-group">
                                                                            <div class="form-group col-md-7 m-b-20">
                                                                                <div class="fname" :class="if_office_or_retail.front_road_width == '' ? '' : 'focused' ">
                                                                                    <label class="mb-0">Front Road Width</label>
                                                                                    <div class="fvalue">
                                                                                        <input
                                                                                            class="form-control"
                                                                                            name="road_width"
                                                                                            type="text"
                                                                                            x-model="if_office_or_retail.front_road_width"
                                                                                            autocomplete="off"
                                                                                            data-bs-original-title=""
                                                                                            title=""
                                                                                        >
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="input-group-append col-md-5 m-b-20">
                                                                                <div class="form-group form_measurement">
                                                                                    <select class="form-select form_measurement measure_select" name="road_width_select" id="first_front_road_map_unit_select">
                                                                                        <option selected="selected" value="121">Ft.</option>
                                                                                        <option value="122">Meter</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="m-checkbox-inline">
                                                                        <label><b>Washroom</b></label>
                                                                        <div class="form-check form-check-inline radio radio-primary">
                                                                            <input
                                                                                type="radio"
                                                                                id="private"
                                                                                name="washroom"
                                                                                x-model="if_office_or_retail.washroom"
                                                                                value="private"
                                                                            >
                                                                            <label for="private">Private</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline radio radio-primary">
                                                                            <input
                                                                                type="radio"
                                                                                id="public"
                                                                                name="washroom"
                                                                                value="public"
                                                                                x-model="if_office_or_retail.washroom"
                                                                            >
                                                                            <label for="public">Public</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row" x-show="sub_categories.includes('3')">
                                                                        <div class="form-check checkbox  checkbox-solid-success col-md-6">
                                                                            <input class="form-check-input" id="two_road_corner" x-model="if_office_or_retail.is_two_corner" name="two_road_corner" type="checkbox">
                                                                            <label class="form-check-label" for="two_road_corner">Two road corner.</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </template>
        
                                                            <template x-if="property_category == '259'">
                                                                <template x-for="(tower_detail, index) in if_office_tower_details">
                                                                    <div class="row">
                                                                        <div class="mb-2">
                                                                            <hr>
                                                                            <span x-text="nextTickForTowerDetails()" class="d-none"></span>
                                                                        </div>
                                                                        <div class="form-group col-md-3 m-b-20">
                                                                            <div class="fname" :class="tower_detail.tower_name == '' ? '' : 'focused' ">
                                                                                <label>Tower Name</label>
                                                                                <div class="fvalue">
                                                                                    <input class="form-control" name="tower_name" x-model="tower_detail.tower_name" type="text" autocomplete="off" data-bs-original-title="" title="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-3 m-b-20">
                                                                            <div class="fname" :class="tower_detail.total_floor == '' ? '' : 'focused' ">
                                                                                <label>Total Floors</label>
                                                                                <div class="fvalue">
                                                                                    <input class="form-control" x-model="tower_detail.total_floor" name="total_floors" type="text" autocomplete="off" data-bs-original-title="" title="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-3 m-b-20">
                                                                            <div class="fname" :class="tower_detail.total_unit == '' ? '' : 'focused' ">
                                                                                <label>Total Units</label>
                                                                                <div class="fvalue">
                                                                                    <input class="form-control" x-model="tower_detail.total_unit" name="total_units" type="text" autocomplete="off" data-bs-original-title="" title="">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="form-group col-md-4 m-b-5">
                                                                                <span>Saleable Area</span>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <div class="fname" :class="tower_detail.saleable == '' ? '' : 'focused' ">
                                                                                        <div class="fvalue">
                                                                                            <input
                                                                                                type="text"
                                                                                                class="form-control"
                                                                                                placeholder="size" data-bs-original-title="" x-model="tower_detail.saleable"
                                                                                            >
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <span class="input-group-text" style="min-height:41px;">To</span>
                                                                                </div>
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <div class="fname" :class="tower_detail.saleable_to == '' ? '' : 'focused' ">
                                                                                        <div class="fvalue">
                                                                                            <input
                                                                                                type="text"
                                                                                                class="form-control"
                                                                                                placeholder="size"
                                                                                                x-model="tower_detail.saleable_to"
                                                                                            >
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <select class="form-select" :id="`tower_detail_saleable_from_to_select_${index}`" :class="errors.hasOwnProperty('builder_id') ? 'is-invalid' : ''">
                                                                                        <option value="117" selected>Sq.Ft.</option>
                                                                                        <option value="118">Sq.Yard</option>
                                                                                        <option value="119">Sq.Meter</option>
                                                                                        <option value="120">VIGHA</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="row">
                                                                            <div class="form-group col-md-auto mb-3">
                                                                                <a
                                                                                    class="add_constructed_carpet_area" style="color:#0078DB!important"
                                                                                    @click="tower_detail.is_carpet = !tower_detail.is_carpet" href="javascript:void(0)"> + Add Carpet Size
                                                                                </a>
                                                                            </div>

                                                                            <div class="form-group col-md-auto mb-3">
                                                                                <a
                                                                                    class="add_constructed_carpet_area" style="color:#0078DB!important"
                                                                                    @click="tower_detail.is_built_up = !tower_detail.is_built_up" href="javascript:void(0)"> + Add BuiltUp Size
                                                                                </a>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row" x-show="tower_detail.is_carpet">
                                                                            <div class="form-group col-md-4 m-b-5">
                                                                                <span>Carpet Area</span>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <div class="fname" :class="tower_detail.carpet == '' ? '' : 'focused' ">
                                                                                        <div class="fvalue">
                                                                                            <input
                                                                                                type="text"
                                                                                                class="form-control"
                                                                                                placeholder="size" data-bs-original-title="" x-model="tower_detail.carpet"
                                                                                            >
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <span class="input-group-text" style="min-height:41px;">To</span>
                                                                                </div>
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <div class="fname" :class="tower_detail.carpet_to == '' ? '' : 'focused' ">
                                                                                        <div class="fvalue">
                                                                                            <input
                                                                                                type="text"
                                                                                                class="form-control"
                                                                                                placeholder="size"
                                                                                                x-model="tower_detail.carpet_to"
                                                                                            >
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <select class="form-select" :id="`tower_detail_carpet_from_to_select_${index}`" :class="errors.hasOwnProperty('builder_id') ? 'is-invalid' : ''">
                                                                                        <option value="117" selected>Sq.Ft.</option>
                                                                                        <option value="118">Sq.Yard</option>
                                                                                        <option value="119">Sq.Meter</option>
                                                                                        <option value="120">VIGHA</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row" x-show="tower_detail.is_built_up">
                                                                            <div class="form-group col-md-4 m-b-5">
                                                                                <span>Builtup Area</span>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <div class="fname" :class="tower_detail.built_up == '' ? '' : 'focused' ">
                                                                                        <div class="fvalue">
                                                                                            <input
                                                                                                type="text"
                                                                                                class="form-control"
                                                                                                placeholder="size" data-bs-original-title="" x-model="tower_detail.built_up"
                                                                                            >
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <span class="input-group-text" style="min-height:41px;">To</span>
                                                                                </div>
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <div class="fname" :class="tower_detail.built_up_to == '' ? '' : 'focused' ">
                                                                                        <div class="fvalue">
                                                                                            <input
                                                                                                type="text"
                                                                                                class="form-control"
                                                                                                placeholder="size"
                                                                                                x-model="tower_detail.built_up_to"
                                                                                            >
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <select class="form-select" :id="`tower_detail_built_from_to_select_${index}`" :class="errors.hasOwnProperty('builder_id') ? 'is-invalid' : ''">
                                                                                        <option value="117" selected>Sq.Ft.</option>
                                                                                        <option value="118">Sq.Yard</option>
                                                                                        <option value="119">Sq.Meter</option>
                                                                                        <option value="120">VIGHA</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </template>
                                                            </template>
        
                                                            <template x-if="property_category == '259'">
                                                                <div class="row" x-show="if_office_or_retail.number_of_tower > 1">
                                                                    <div class="form-check checkbox  checkbox-solid-success col-md-6 m-b-20">
                                                                        <input
                                                                            class="form-check-input"
                                                                            id="tower_with_specification"
                                                                            x-model="if_office_tower_details_with_specification"
                                                                            name="tower_with_specification"
                                                                            type="checkbox"
                                                                            @click="towerWithSpecification()"
                                                                        >
                                                                        <label class="form-check-label" for="tower_with_specification">Towers with a different specification.</label>
                                                                    </div>
                                                                </div>
                                                            </template>
        
                                                            <div class="row" x-show="property_category == '260'">
                                                                <div><hr></div>
                                                                <label><b>Unit Details</b></label>
                                                            </div>
                                                            <template x-if="property_category == '260'">
                                                                <template x-for="(tower, index) in if_retail_tower_details">
                                                                    <div class="row mt-2">
                                                                        <div x-show="index > 0">
                                                                            <hr>
                                                                        </div>
                                                                        <div class="form-group col-md-3 m-b-20">
                                                                            <div class="fname" :class="tower.tower_name == '' ? '' : 'focused' ">
                                                                                <span class="d-none" x-text="nextTickForIfRetail()"></span>
                                                                                <label>Tower Name</label>
                                                                                <div class="fvalue">
                                                                                    <input class="form-control" x-model="tower.tower_name" name="tower_name" type="text" autocomplete="off" data-bs-original-title="" title="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
        
                                                                        <div class="form-group col-md-3 m-b-20">
                                                                            <select class="form-select" name="tower_sub_category" aria-hidden="true" :id="`floor_category_${index}`">
                                                                                <option value="">Sub Category</option>
                                                                                <option value="Ground">Ground</option>
                                                                                <option value="First">First</option>
                                                                                <option value="Second">Second</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="input-group mb-3">
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <div class="fname" :class="tower.size_from == '' ? '' : 'focused' ">
                                                                                        <div class="fvalue">
                                                                                            <input
                                                                                                type="text"
                                                                                                class="form-control"
                                                                                                placeholder="size" data-bs-original-title="" x-model="tower.size_from"
                                                                                            >
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <span class="input-group-text" style="min-height:41px;">To</span>
                                                                                </div>
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <div class="fname" :class="tower.size_to == '' ? '' : 'focused' ">
                                                                                        <div class="fvalue">
                                                                                            <input
                                                                                                type="text"
                                                                                                class="form-control"
                                                                                                placeholder="size"
                                                                                                x-model="tower.size_to"
                                                                                            >
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <select class="form-select" :id="`tower_size_from_to_select_${index}`" :class="errors.hasOwnProperty('builder_id') ? 'is-invalid' : ''">
                                                                                        <option value="117" selected>Sq.Ft.</option>
                                                                                        <option value="118">Sq.Yard</option>
                                                                                        <option value="119">Sq.Meter</option>
                                                                                        <option value="120">VIGHA</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="row">
                                                                            <div class="form-group col-md-3 m-b-5">
                                                                                <div class="input-group">
                                                                                    <div class="form-group col-md-7 m-b-20">
                                                                                        <div class="fname" :class="tower.front_opening == '' ? '' : 'focused' ">
                                                                                            <label class="mb-0">Front Opening</label>
                                                                                            <input class="form-control" name="ceiling_height" type="text" 
                                                                                            x-model="tower.front_opening" autocomplete="off"
                                                                                            data-bs-original-title="" title="">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="input-group-append col-md-5 m-b-20">
                                                                                        <div class="form-group form_measurement">
                                                                                            <select class="form-select form_measurement measure_select" name="tower_front_opening_select" :id="`tower_front_opening_select_${index}`">
                                                                                                <option selected="selected" value="121">Ft.</option>
                                                                                                <option value="122">Meter</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 m-b-20">
                                                                                <div class="fname" :class="tower.number_of_each_floor == '' ? '' : 'focused' ">
                                                                                    <label>No. of unit each floor</label>
                                                                                    <div class="fvalue">
                                                                                        <input class="form-control" x-model="tower.number_of_each_floor" name="no_of_unit_each_floor" type="text" autocomplete="off" data-bs-original-title="" title="">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 m-b-5">
                                                                                <div class="input-group">
                                                                                    <div class="form-group col-md-7 m-b-20">
                                                                                        <div class="fname" :class="tower.ceiling_height == '' ? '' : 'focused' ">
                                                                                            <label class="mb-0">Ceiling Height</label>
                                                                                            <input class="form-control" name="ceiling_height" type="text" 
                                                                                            x-model="tower.ceiling_height" autocomplete="off" data-bs-original-title="" title="">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="input-group-append col-md-5 m-b-20">
                                                                                        <div class="form-group form_measurement">
                                                                                            <select class="form-select form_measurement measure_select" name="tower_ceiling_select" :id="`tower_ceiling_select_${index}`">
                                                                                                <option selected="selected" value="121">Ft.</option>
                                                                                                <option value="122">Meter</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row" x-show="if_office_or_retail.number_of_tower > 1">
                                                                            <div class="form-group col-md-3">
                                                                                <button
                                                                                    class="btn btn-primary btn-air-primary"
                                                                                    type="button"
                                                                                    @click="addRetailUnitDetails()"
                                                                                >Add Floors</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </template>
                                                            </template>
        
                                                            <template x-if="property_type == 87 && (property_category != '256') &&  (property_category != '258')">
                                                                <div class="row">
                                                                    <div>
                                                                        <label><b>Wing Details</b></label>
                                                                        <span x-text="nextTickForIfResidentialWings()"></span>
                                                                    </div>
                                                                </div>
                                                            </template>
        
                                                            <div x-show="property_type == 87 && (property_category != '256') &&  (property_category != '258')">
                                                                <template x-for="(wing , index) in if_residential_only_wings.wing_details">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-3 m-b-20">
                                                                            <div class="fname" :class="wing.wing_name == '' ? '' : 'focused' ">
                                                                                <label>Wing Name</label>
                                                                                <input
                                                                                    class="form-control"
                                                                                    x-model="wing.wing_name"
                                                                                    type="text"
                                                                                    autocomplete="off"
                                                                                    @focusOut="manageWingNameArray()"
                                                                                >
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-2 m-b-20">
                                                                            <div class="fname" :class="wing.total_total_units == '' ? '' : 'focused' ">
                                                                                <label>Total Units</label>
                                                                                <input class="form-control" x-model="wing.total_total_units" type="text" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-2 m-b-20">
                                                                            <div class="fname" :class="wing.total_floors == '' ? '' : 'focused' ">
                                                                                <label>Total Floor</label>
                                                                                <input class="form-control" x-model="wing.total_floors" type="text" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <div class="fname">
                                                                                <select class="form-select" :id="`sub_category_of_wings_${index}`" multiple="multiple">
                                                                                    <template x-for="category in sub_category_array">
                                                                                        <option :value="category">
                                                                                            <span x-text="category"></span>
                                                                                        </option>
                                                                                    </template>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-1 m-b-4 mb-3" x-show="index > 0">
                                                                            <button class="add_contacts btn btn-danger btn-air-danger" type="button" @click="removeWingDetail(index)" title="">-</button>
                                                                        </div>
                                                                        <div class="form-group col-md-1 m-b-4 mb-3" x-show="index == 0">
                                                                            <button class="add_contacts btn btn-danger btn-air-danger" type="button" data-bs-original-title="" @click="addWingDetail()" title="">+</button>
                                                                        </div>
                                                                    </div>
                                                                </template>
                                                            </div>
        
                                                            <template x-if="property_type == 87 && (property_category != '256') && (property_category != '258')">
                                                                <div class="row">
                                                                    <hr>
                                                                    <div>
                                                                        <label><b>Unit Details</b></label>
                                                                        <span class="d-none" x-text="manageWingNameArray()"></span>
                                                                        <span x-text="nextTickForIfResidentialUnits()"></span>
                                                                    </div>
                                                                </div>
                                                            </template>
        
                                                            <div x-show="property_type == 87 && (property_category != '256') && (property_category != '258')">
                                                                <template x-for="(unit , index) in if_residential_only_units.unit_details">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-3">
                                                                            <div class="fname" :class="unit.wing == '' ? '' : 'focused' ">
                                                                                <select class="form-select form-design" :id="`wing_array_${index}`">
                                                                                    <option value="">Wing</option>
                                                                                    <template x-for="wing_name in wings_name_array">
                                                                                        <option :value="wing_name">
                                                                                            <span x-text="wing_name"></span>
                                                                                        </option>
                                                                                    </template>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-4">
                                                                            <div class="input-group mb-3">
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <div class="fname" :class="unit.saleable == '' ? '' : 'focused' ">
                                                                                        <label class="mb-0">Saleable</label>
                                                                                        <input class="form-control" x-model="unit.saleable" name="saleable_area" type="text" autocomplete="off">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <span class="input-group-text" style="min-height:41px;">To</span>
                                                                                </div>
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <div class="fname" :class="unit.saleable_to == '' ? '' : 'focused' ">
                                                                                        <label class="mb-0">Saleable</label>
                                                                                        <input class="form-control" x-model="unit.saleable_to" name="saleable_area" type="text" autocomplete="off">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <select class="form-select form_measurement measure_select" :id="`saleable_area_select_${index}`">
                                                                                        <option value="117" selected>Sq.Ft.</option>
                                                                                        <option value="118">Sq.Yard</option>
                                                                                        <option value="119">Sq.Meter</option>
                                                                                        <option value="120">VIGHA</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="row">
                                                                            <div class="form-group col-md-auto mb-3">
                                                                                <a style="color:#0078DB!important" @click="unit.has_built_up = !unit.has_built_up" href="javascript:void(0)" data-bs-original-title="" title=""> + Add Built Up Area
                                                                                </a>
                                                                            </div>
                                                                            <div class="form-group col-md-auto mb-3">
                                                                                <a style="color:#0078DB!important" @click="unit.has_carpet = !unit.has_carpet" href="javascript:void(0)" data-bs-original-title="" title=""> + Add Carpet Area
                                                                                </a>
                                                                            </div>
                                                                        </div>
    
                                                                        <div class="row mt-2" x-show="unit.has_built_up">
                                                                            <div class="input-group mb-3">
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <div class="fname" :class="unit.built_up == '' ? '' : 'focused' ">
                                                                                        <label class="mb-0">Built up Area</label>
                                                                                        <input class="form-control" x-model="unit.built_up" name="built_up_areass" type="text" autocomplete="off">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <span class="input-group-text" style="min-height:41px;">To</span>
                                                                                </div>
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <div class="fname" :class="unit.built_up_to == '' ? '' : 'focused' ">
                                                                                        <label class="mb-0">Built up Area</label>
                                                                                        <input class="form-control" x-model="unit.built_up_to" name="built_up_areass" type="text" autocomplete="off">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <select class="form-select form_measurement measure_select" :id="`built_up_area_select_${index}`">
                                                                                        <option value="117" selected>Sq.Ft.</option>
                                                                                        <option value="118">Sq.Yard</option>
                                                                                        <option value="119">Sq.Meter</option>
                                                                                        <option value="120">VIGHA</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
    
                                                                        <div class="row mt-2" x-show="unit.has_carpet">
                                                                            <div class="input-group mb-3">
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <div class="fname" :class="unit.carpet_area == '' ? '' : 'focused' ">
                                                                                        <label class="mb-0">Carpet Area</label>
                                                                                        <input class="form-control" x-model="unit.carpet_area" name="carpet_area" type="text" autocomplete="off">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <span class="input-group-text" style="min-height:41px;">To</span>
                                                                                </div>
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <div class="fname" :class="unit.carpet_area_to == '' ? '' : 'focused' ">
                                                                                        <label class="mb-0">Carpet Area</label>
                                                                                        <input class="form-control" x-model="unit.carpet_area_to" name="carpet_area" type="text" autocomplete="off">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <select class="form-select form_measurement measure_select" :id="`carpet_area_select_${index}`">
                                                                                        <option value="117" selected>Sq.Ft.</option>
                                                                                        <option value="118">Sq.Yard</option>
                                                                                        <option value="119">Sq.Meter</option>
                                                                                        <option value="120">VIGHA</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mt-2">
                                                                            <div class="input-group mb-3">
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <div class="fname" :class="unit.wash_area == '' ? '' : 'focused' ">
                                                                                        <label class="mb-0">Wash Area</label>
                                                                                        <input class="form-control" x-model="unit.wash_area" name="wash_area" type="text" autocomplete="off">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <span class="input-group-text" style="min-height:41px;">To</span>
                                                                                </div>
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <div class="fname" :class="unit.wash_area_to == '' ? '' : 'focused' ">
                                                                                        <label class="mb-0">Wash Area</label>
                                                                                        <input class="form-control" x-model="unit.wash_area_to" name="wash_area" type="text" autocomplete="off">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <select class="form-select form_measurement measure_select" :id="`wash_area_select_${index}`">
                                                                                        <option value="117" selected>Sq.Ft.</option>
                                                                                        <option value="118">Sq.Yard</option>
                                                                                        <option value="119">Sq.Meter</option>
                                                                                        <option value="120">VIGHA</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mt-2">
                                                                            <div class="input-group mb-3">
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <div class="fname" :class="unit.balcony == '' ? '' : 'focused' ">
                                                                                        <label class="mb-0">Balcony Area</label>
                                                                                        <input class="form-control" x-model="unit.balcony" name="balcony_area" type="text" autocomplete="off">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <span class="input-group-text" style="min-height:41px;">To</span>
                                                                                </div>
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <div class="fname" :class="unit.balcony_to == '' ? '' : 'focused' ">
                                                                                        <label class="mb-0">Balcony Area</label>
                                                                                        <input class="form-control" x-model="unit.balcony_to" name="balcony_area" type="text" autocomplete="off">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group col-md-3 m-b-10">
                                                                                    <select class="form-select form_measurement measure_select" :id="`balcony_area_select_${index}`">
                                                                                        <option value="117" selected>Sq.Ft.</option>
                                                                                        <option value="118">Sq.Yard</option>
                                                                                        <option value="119">Sq.Meter</option>
                                                                                        <option value="120">VIGHA</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <div class="input-group">
                                                                                <div class="form-group col-md-7 m-b-20">
                                                                                    <div class="fname" :class="unit.floor_height == '' ? '' : 'focused' ">
                                                                                        <label class="mb-0">Floor Height</label>
                                                                                        <input class="form-control" x-model="unit.floor_height" name="floor_height" type="text" autocomplete="off">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="input-group-append col-md-5 m-b-20">
                                                                                    <div class="form-group form_measurement">
                                                                                        <select class="form-select form_measurement measure_select" :id="`floor_height_select_${index}`">
                                                                                            <option selected="selected" value="121">Ft.</option>
                                                                                            <option value="122">Meter</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                
                                                                        <div class="row">
                                                                            <div class="form-check checkbox  checkbox-solid-success col-md-3 m-b-20">
                                                                                <input
                                                                                    class="project_amenity form-check-input" :id="`terrace_and_penthouse_checkbox_${index}`"
                                                                                    x-model="unit.has_terrace_and_carpet"
                                                                                    :name="`terrace_and_penthouse_checkbox_${index}`" type="checkbox">
                                                                                <label class="form-check-label" :for="`terrace_and_penthouse_checkbox_${index}`">Terrace & Penthouse</label>
                                                                            </div>
        
                                                                            <div class="form-check checkbox  checkbox-solid-success col-md-3 m-b-20">
                                                                                <input
                                                                                    class="project_amenity form-check-input" :id="`servant_room_checkbox_${index}`"
                                                                                    x-model="unit.servant_room"
                                                                                    :name="`servant_room_checkbox_${index}`" type="checkbox">
                                                                                <label class="form-check-label" :for="`servant_room_checkbox_${index}`">Servant Room</label>
                                                                            </div>
                                                                        </div>
        
                                                                        <div class="row">
                                                                            <div class="col-md-4" x-show="unit.has_terrace_and_carpet">
                                                                                <div class="input-group">
                                                                                    <div class="form-group col-md-7 m-b-20">
                                                                                        <div class="fname" :class="unit.terrace_carpet_area == '' ? '' : 'focused' ">
                                                                                            <label class="mb-0">Terrace carpet</label>
                                                                                            <input class="form-control" x-model="unit.terrace_carpet_area" name="terrace_carpet_area" type="text" autocomplete="off">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="input-group-append col-md-5 m-b-20">
                                                                                        <div class="form-group form_measurement">
                                                                                            <select class="form-select form_measurement measure_select" :id="`terrace_carpet_select_${index}`"
                                                                                                name="terrace_carpet_area_measurement">
                                                                                                <option value="117" selected>Sq.Ft.</option>
                                                                                                <option value="118">Sq.Yard</option>
                                                                                                <option value="119">Sq.Meter</option>
                                                                                                <option value="120">VIGHA</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                    
                                                                            <div class="col-md-4" x-show="unit.has_terrace_and_carpet">
                                                                                <div class="input-group">
                                                                                    <div class="form-group col-md-7 m-b-20">
                                                                                        <div class="fname" :class="unit.terrace_saleable_area == '' ? '' : 'focused' ">
                                                                                            <label class="mb-0">Terrace saleable</label>
                                                                                            <input
                                                                                                class="form-control"
                                                                                                name="terrace_super_builtup_area"
                                                                                                type="text"
                                                                                                x-model="unit.terrace_saleable_area"
                                                                                                autocomplete="off"
                                                                                            >
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="input-group-append col-md-5 m-b-20">
                                                                                        <div class="form-group form_measurement">
                                                                                            <select class="form-select form_measurement measure_select" :id="`terrace_saleable_select_${index}`"
                                                                                                name="terrace_super_builtup_area_measurement">
                                                                                                <option value="117" selected>Sq.Ft.</option>
                                                                                                <option value="118">Sq.Yard</option>
                                                                                                <option value="119">Sq.Meter</option>
                                                                                                <option value="120">VIGHA</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="form-group col-md-1 m-b-4 mb-3" x-show="index > 0">
                                                                                <button class="add_contacts btn btn-danger btn-air-danger" type="button" @click="removeUnitDetail(index)" title="">-</button>
                                                                            </div>
                                                                            <div class="form-group col-md-1 m-b-4 mb-3" x-show="index == 0">
                                                                                <button class="add_contacts btn btn-danger btn-air-danger" type="button" data-bs-original-title="" @click="addUnitDetail()" title="">+</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </template>
                                                                <hr>
                                                            </div>
                                                        </div>
                                                    </template>

                                                    <template x-if="property_category == '262' || property_category == '256' || property_category == '258'">
                                                        <div class="row mt-4">
                                                            <div class="row mt-2">
                                                                <div class="input-group mb-3">
                                                                    <div class="form-group col-md-3 m-b-10">
                                                                        <div class="fname" :class="if_farm_plot_land.total_land_area == '' ? '' : 'focused' ">
                                                                            <span x-text="nexttickForFarm()"></span>
                                                                            <label class="mb-0">Total Land Area</label>
                                                                            <div class="fvalue">
                                                                                <input class="form-control" name="total_land_area" type="text" x-model="if_farm_plot_land.total_land_area" autocomplete="off" data-bs-original-title="" title="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <span class="input-group-text" style="min-height:41px;">To</span>
                                                                    </div>
                                                                    <div class="form-group col-md-3 m-b-10">
                                                                        <div class="fname" :class="if_farm_plot_land.total_land_area_to == '' ? '' : 'focused' ">
                                                                            <span x-text="nexttickForFarm()"></span>
                                                                            <label class="mb-0">Total Land Area</label>
                                                                            <div class="fvalue">
                                                                                <input class="form-control" name="total_land_area" type="text" x-model="if_farm_plot_land.total_land_area_to" autocomplete="off" data-bs-original-title="" title="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-3 m-b-10">
                                                                        <select class="form-select form_measurement measure_select" name="land_area_map_select" id="land_area_select">
                                                                            <option value="117" selected>Sq.Ft.</option>
                                                                            <option value="118">Sq.Yard</option>
                                                                            <option value="119">Sq.Meter</option>
                                                                            <option value="120">VIGHA</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-2">
                                                                <div class="input-group mb-3">
                                                                    <div class="form-group col-md-3 m-b-10">
                                                                        <div class="fname" :class="if_farm_plot_land.total_open_area == '' ? '' : 'focused' ">
                                                                            <label class="mb-0">Total Open Area</label>
                                                                            <div class="fvalue">
                                                                                <input class="form-control" x-model="if_farm_plot_land.total_open_area" name="total_open_area" type="text" autocomplete="off" data-bs-original-title="" title="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <span class="input-group-text" style="min-height:41px;">To</span>
                                                                    </div>
                                                                    <div class="form-group col-md-3 m-b-10">
                                                                        <div class="fname" :class="if_farm_plot_land.total_open_area_to == '' ? '' : 'focused' ">
                                                                            <label class="mb-0">Total Open Area</label>
                                                                            <div class="fvalue">
                                                                                <input class="form-control" x-model="if_farm_plot_land.total_open_area_to" name="total_open_area" type="text" autocomplete="off" data-bs-original-title="" title="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-3 m-b-10">
                                                                        <select class="form-select form_measurement measure_select" name="open_area_map_select" id="open_area_select">
                                                                            <option value="117" selected>Sq.Ft.</option>
                                                                            <option value="118">Sq.Yard</option>
                                                                            <option value="119">Sq.Meter</option>
                                                                            <option value="120">VIGHA</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-3 m-b-20">
                                                                <div class="fname" :class="if_farm_plot_land.total_number_of_plot == '' ? '' : 'focused' ">
                                                                    <label>Total No. of Plots</label>
                                                                    <div class="fvalue">
                                                                        <input class="form-control" x-model="if_farm_plot_land.total_number_of_plot" name="total_no_of_plots" type="text" autocomplete="off" data-bs-original-title="" title="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-2">
                                                                <div class="input-group mb-3">
                                                                    <div class="form-group col-md-3 m-b-10">
                                                                        <div class="fname" :class="if_farm_plot_land.common_area == '' ? '' : 'focused' ">
                                                                            <label class="mb-0">Common Area</label>
                                                                            <div class="fvalue">
                                                                                <input class="form-control" name="common_area" type="text" x-model="if_farm_plot_land.common_area" autocomplete="off" data-bs-original-title="" title="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <span class="input-group-text" style="min-height:41px;">To</span>
                                                                    </div>
                                                                    <div class="form-group col-md-3 m-b-10">
                                                                        <div class="fname" :class="if_farm_plot_land.common_area_to == '' ? '' : 'focused' ">
                                                                            <label class="mb-0">Common Area</label>
                                                                            <div class="fvalue">
                                                                                <input class="form-control" name="common_area" type="text" x-model="if_farm_plot_land.common_area_to" autocomplete="off" data-bs-original-title="" title="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-3 m-b-10">
                                                                        <select class="form-select form_measurement measure_select" name="common_area_map_select" id="common_area_select">
                                                                            <option value="117" selected>Sq.Ft.</option>
                                                                            <option value="118">Sq.Yard</option>
                                                                            <option value="119">Sq.Meter</option>
                                                                            <option value="120">VIGHA</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </template>

                                                    <template x-if="property_category == '262' || property_category == '256' || property_category == '258'">
                                                        <div class="row">
                                                            <div class="form-check checkbox checkbox-solid-success col-md-6 m-b-20">
                                                                <input
                                                                    class="project_amenity form-check-input" id="multiple_phase" name="multiple_phase" x-model="if_farm_plot_land.multiple_theme_phase" type="checkbox" data-bs-original-title="" title="">
                                                                <label class="form-check-label" for="multiple_phase">Project is with multiple theme/phase</label>
                                                            </div>
                                                            <div class="form-check checkbox checkbox-solid-success col-md-6 m-b-20">
                                                                <input
                                                                    class="project_amenity form-check-input"
                                                                    x-model="if_farm_plot_land.plot_with_construcation"
                                                                    id="prots_with_construction"
                                                                    name="prots_with_construction"
                                                                    type="checkbox"
                                                                    data-bs-original-title="" title="">
                                                                <label class="form-check-label" for="prots_with_construction">Plots with construction</label>
                                                            </div>
                                                        </div>
                                                    </template>

                                                    <template x-if="if_farm_plot_land.multiple_theme_phase">
                                                        <div class="row">
                                                            <div class="form-group col-md-3 m-b-20">
                                                                <div class="fname" :class="if_farm_plot_land.phase_name == '' ? '' : 'focused' ">
                                                                    <span class="d-none" x-text="selectOnMultiplePhase()"></span>
                                                                    <label>Phase name</label>
                                                                    <div class="fvalue">
                                                                        <input class="form-control" x-model="if_farm_plot_land.phase_name" name="phase_name" type="text" autocomplete="off" data-bs-original-title="" title="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-2">
                                                                <div class="input-group mb-3">
                                                                    <div class="form-group col-md-3 m-b-10">
                                                                        <div class="fname" :class="if_farm_plot_land.plot_size_from == '' ? '' : 'focused' ">
                                                                            <label class="mb-0">Saleable Plot from</label>
                                                                            <div class="fvalue">
                                                                                <input type="text" name="saleable_plot_from" class="form-control" data-bs-original-title="" x-model="if_farm_plot_land.plot_size_from" title="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <span class="input-group-text" style="min-height:41px;">To</span>
                                                                    </div>
                                                                    <div class="form-group col-md-3 m-b-10">
                                                                        <div class="fname" :class="if_farm_plot_land.plot_size_to == '' ? '' : 'focused' ">
                                                                            <label class="mb-0">Saleable Plot to</label>
                                                                            <div class="fvalue">
                                                                                <input type="text" name="saleable_plot_from" class="form-control" data-bs-original-title="" x-model="if_farm_plot_land.plot_size_to" title="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-3 m-b-10">
                                                                        <select class="form-select form_measurement measure_select" name="common_area_map_select" id="plot_size_from_select">
                                                                            <option value="117" selected>Sq.Ft.</option>
                                                                            <option value="118">Sq.Yard</option>
                                                                            <option value="119">Sq.Meter</option>
                                                                            <option value="120">VIGHA</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-md-auto mb-3">
                                                                    <a
                                                                        class="add_constructed_carpet_area" style="color:#0078DB!important"
                                                                        @click="addCarpetPlotSize()"
                                                                        href="javascript:void(0)"> + Carpet Plot Size
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </template>

                                                    <template x-if="if_farm_plot_land.add_carpet_plot_size">
                                                        <div class="row mt-2">
                                                            <div class="input-group mb-3">
                                                                <div class="form-group col-md-3 m-b-10">
                                                                    <div class="fname" :class="if_farm_plot_land.carpet_plot_size == '' ? '' : 'focused' ">
                                                                        <span x-text="selectOnCarpetPlot()" class="d-none"></span>
                                                                        <label class="mb-0">Carpet Plot Size</label>
                                                                        <div class="fvalue">
                                                                            <input class="form-control" x-model="if_farm_plot_land.carpet_plot_size" name="carpet_plot_size" type="text" autocomplete="off" data-bs-original-title="" title="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <span class="input-group-text" style="min-height:41px;">To</span>
                                                                </div>
                                                                <div class="form-group col-md-3 m-b-10">
                                                                    <div class="fname" :class="if_farm_plot_land.carpet_plot_size_to == '' ? '' : 'focused' ">
                                                                        <span x-text="selectOnCarpetPlot()" class="d-none"></span>
                                                                        <label class="mb-0">Carpet Plot Size</label>
                                                                        <div class="fvalue">
                                                                            <input class="form-control" x-model="if_farm_plot_land.carpet_plot_size_to" name="carpet_plot_size" type="text" autocomplete="off" data-bs-original-title="" title="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3 m-b-10">
                                                                    <select class="form-select" name="carpet_plot_size_select" tabindex="-1" aria-hidden="true" id="carpet_plot_size_select">
                                                                        <option value="117" selected>Sq.Ft.</option>
                                                                        <option value="118">Sq.Yard</option>
                                                                        <option value="119">Sq.Meter</option>
                                                                        <option value="120">VIGHA</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </template>

                                                    <template x-if="if_farm_plot_land.plot_with_construcation">
                                                        <div class="row mt-2">
                                                            <div class="input-group mb-3">
                                                                <div class="form-group col-md-3 m-b-10">
                                                                    <div class="fname" :class="if_farm_plot_land.constructed_saleable_area == '' ? '' : 'focused' ">
                                                                        <span x-text="selectOnConstSaleableArea()" class="d-none"></span>
                                                                        <label class="mb-0">Constructed Saleable Area</label>
                                                                        <div class="fvalue">
                                                                            <input class="form-control" 
                                                                            x-model="if_farm_plot_land.constructed_saleable_area" name="constructed_saleable_area" type="text" autocomplete="off" data-bs-original-title="" title="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <span class="input-group-text" style="min-height:41px;">To</span>
                                                                </div>
                                                                <div class="form-group col-md-3 m-b-10">
                                                                    <div class="fname" :class="if_farm_plot_land.constructed_saleable_area_to == '' ? '' : 'focused' ">
                                                                        <span x-text="selectOnConstSaleableArea()" class="d-none"></span>
                                                                        <label class="mb-0">Constructed Saleable Area</label>
                                                                        <div class="fvalue">
                                                                            <input class="form-control" 
                                                                            x-model="if_farm_plot_land.constructed_saleable_area_to" name="constructed_saleable_area" type="text" autocomplete="off" data-bs-original-title="" title="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3 m-b-10">
                                                                    <select class="form-select" name="constructed_saleable_area_select" tabindex="-1" aria-hidden="true" id="constructed_saleable_area_select">
                                                                        <option value="117" selected>Sq.Ft.</option>
                                                                        <option value="118">Sq.Yard</option>
                                                                        <option value="119">Sq.Meter</option>
                                                                        <option value="120">VIGHA</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-3 m-b-20">
                                                                <div class="fname" :class="if_farm_plot_land.number_of_room == '' ? '' : 'focused' ">
                                                                    <label>No. Of Room</label>
                                                                    <div class="fvalue">
                                                                        <input class="form-control" x-model="if_farm_plot_land.number_of_room" type="text" autocomplete="off">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-3 m-b-20">
                                                                <div class="fname" :class="if_farm_plot_land.number_of_bathroom == '' ? '' : 'focused' ">
                                                                    <label>No. Of Bathroom</label>
                                                                    <div class="fvalue">
                                                                        <input class="form-control" x-model="if_farm_plot_land.number_of_bathroom" type="text" autocomplete="off">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-3 m-b-20">
                                                                <div class="fname" :class="if_farm_plot_land.number_of_balcony == '' ? '' : 'focused' ">
                                                                    <label>No. Of Balcony</label>
                                                                    <div class="fvalue">
                                                                        <input class="form-control" x-model="if_farm_plot_land.number_of_balcony" type="text" autocomplete="off">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-3 m-b-20">
                                                                <div class="fname" :class="if_farm_plot_land.number_of_open_side == '' ? '' : 'focused' ">
                                                                    <label>No. Of Open Side</label>
                                                                    <div class="fvalue">
                                                                        <input class="form-control" x-model="if_farm_plot_land.number_of_open_side" type="text" autocomplete="off">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-3 m-b-20">
                                                                <div class="fname" :class="if_farm_plot_land.number_of_car_park == '' ? '' : 'focused' ">
                                                                    <label>No. Of Car Park</label>
                                                                    <div class="fvalue">
                                                                        <input class="form-control" x-model="if_farm_plot_land.number_of_car_park" type="text" autocomplete="off">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-check checkbox  checkbox-solid-success col-md-3 m-b-20">
                                                                <input
                                                                    class="project_amenity form-check-input" id="servant_room"
                                                                    x-model="if_farm_plot_land.servant_room"
                                                                    name="servant_room" type="checkbox">
                                                                <label class="form-check-label" for="servant_room">Servant Room</label>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-md-auto mb-3">
                                                                    <a
                                                                        style="color:#0078DB!important"
                                                                        @click="addConstCarpetArea()"
                                                                        href="javascript:void(0)"> + Constructed Carpet Area
                                                                    </a>
                                                                </div>
                                                                <div class="form-group col-md-auto mb-3">
                                                                    <a
                                                                        style="color:#0078DB!important"
                                                                        @click="addConstBuiltUpArea()"
                                                                        href="javascript:void(0)"> + Constructed Built up Area
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </template>

                                                    <template x-if="if_farm_plot_land.add_constructed_carpet_area && if_farm_plot_land.plot_with_construcation">
                                                        <div class="row mt-2">
                                                            <div class="input-group mb-3">
                                                                <div class="form-group col-md-3 m-b-10">
                                                                    <span x-text="selectOnConstCarpetArea()" class="d-none"></span>
                                                                    <div class="fname" :class="if_farm_plot_land.constructed_carpet_area == '' ? '' : 'focused' ">
                                                                        <label class="mb-0">Constructed Carpet Area</label>
                                                                        <div class="fvalue">
                                                                            <input class="form-control" 
                                                                            x-model="if_farm_plot_land.constructed_carpet_area" name="constructed_carpet_area" type="text" autocomplete="off" data-bs-original-title="" title="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <span class="input-group-text" style="min-height:41px;">To</span>
                                                                </div>
                                                                <div class="form-group col-md-3 m-b-10">
                                                                    <div class="fname" :class="if_farm_plot_land.constructed_carpet_area_to == '' ? '' : 'focused' ">
                                                                        <label class="mb-0">Constructed Carpet Area</label>
                                                                        <div class="fvalue">
                                                                            <input class="form-control" 
                                                                            x-model="if_farm_plot_land.constructed_carpet_area_to" name="constructed_carpet_area" type="text" autocomplete="off" data-bs-original-title="" title="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3 m-b-10">
                                                                    <select class="form-select" name="constructed_saleable_area_select" tabindex="-1" aria-hidden="true" id="constructed_carpet_area_select">
                                                                        <option value="117" selected>Sq.Ft.</option>
                                                                        <option value="118">Sq.Yard</option>
                                                                        <option value="119">Sq.Meter</option>
                                                                        <option value="120">VIGHA</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </template>

                                                    <template x-if="if_farm_plot_land.add_constructed_built_up_area && if_farm_plot_land.plot_with_construcation">
                                                        <div class="row mt-2">
                                                            <div class="input-group mb-3">
                                                                <div class="form-group col-md-3 m-b-10">
                                                                    <span x-text="selectOnConstSaleableArea()" class="d-none"></span>
                                                                    <div class="fname" :class="if_farm_plot_land.constructed_built_up_area_from == '' ? '' : 'focused' ">
                                                                        <label class="mb-0">Built up from</label>
                                                                        <div class="fvalue">
                                                                            <input type="text" class="form-control" x-model="if_farm_plot_land.constructed_built_up_area_from">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <span class="input-group-text" style="min-height:41px;">To</span>
                                                                </div>
                                                                <div class="form-group col-md-3 m-b-10">
                                                                    <div class="fname" :class="if_farm_plot_land.constructed_built_up_area_to == '' ? '' : 'focused' ">
                                                                        <label class="mb-0">Built up to</label>
                                                                        <div class="fvalue">
                                                                            <input type="text" x-model="if_farm_plot_land.constructed_built_up_area_to" class="form-control"
                                                                            >
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3 m-b-10">
                                                                    <select class="form-select form_measurement measure_select" id="constructed_built_up_to_area_select">
                                                                        <option value="117" selected>Sq.Ft.</option>
                                                                        <option value="118">Sq.Yard</option>
                                                                        <option value="119">Sq.Meter</option>
                                                                        <option value="120">VIGHA</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </template>

                                                    <button class="btn btn-primary nextBtn pull-right"
                                                        type="button">Next</button>
                                                    </div>
                                            </div>
                                        </div>
										
                                        <div class="setup-content" id="amenities">
                                            <div class="col-xs-12">
                                                <div class="col-md-12">
                                                    <div class="row">
														<div>
															<label><b>Parking Details</b></label>
														</div>
                                                        <div class="form-check checkbox checkbox-solid-success mb-0 col-md-4 m-b-20">
                                                            <input
                                                                class="project_amenity form-check-input"
                                                                id="parking_four_wheeler"
                                                                x-model="free_alloted_for_two_wheeler"
                                                                type="checkbox"
                                                            >
                                                            <label class="form-check-label" for="parking_four_wheeler">Free Alloted Parking for Four Wheeler</label>
                                                        </div>
                                                        <div
                                                            class="form-check checkbox  checkbox-solid-success mb-0 col-md-4 m-b-20">
                                                            <input
                                                                class="project_amenity form-check-input"
                                                                id="parking_two_wheeler"
                                                                free_alloted_for_two_wheeler
                                                                x-model="free_alloted_for_four_wheeler"
                                                                type="checkbox"
                                                            >
                                                            <label class="form-check-label" for="parking_two_wheeler">Free Alloted Parking for Two Wheeler</label>
                                                        </div>
                                                        <div
                                                            class="form-check checkbox  checkbox-solid-success mb-0 col-md-4 m-b-20">
                                                            <input class="project_amenity form-check-input"
                                                                id="available_for_purchase" type="checkbox" x-model="available_for_purchase">
                                                            <label class="form-check-label"
                                                                for="available_for_purchase">Available for Purchase</label>
                                                        </div>

                                                        <div class="row" x-show="available_for_purchase">
                                                            <div class="form-group col-md-3 m-b-20">
                                                                <div class="fname" :class="total_number_of_parking == '' ? '' : 'focused' ">
                                                                    <label>No. Of Parking</label>
                                                                    <div class="fvalue">
                                                                        <input class="form-control" min="1" max="10" x-model="total_number_of_parking" name="number_of_parking" type="number" autocomplete="off" data-bs-original-title="" title="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <hr>
                                                        <div>
															<label><b>Basement Parking</b></label>
														</div>
                                                        
                                                        <div class="form-group col-md-3 m-b-20">
                                                            <div class="fname" :class="total_floor_for_parking == '' ? '' : 'focused' ">
                                                                <label>Total floor for parking</label>
                                                                <div class="fvalue">
                                                                    <input
                                                                        class="form-control"
                                                                        x-model="total_floor_for_parking"
                                                                        type="text"
                                                                        :class="errors.hasOwnProperty('total_floor_for_parking') ? 'is-invalid' : ''"
                                                                        id="total_floor_for_parking"
                                                                        @change="addRows()"
                                                                    >
                                                                    <div class="invalid-feedback">
                                                                        <span x-text="errors.total_floor_for_parking"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <template x-for="(parking , index) in parking_details">
                                                            <div class="row mt-3">
                                                                <div class="form-group col-md-2 m-b-20">
                                                                    <div class="fname" :class="parking.floor_number !=null ? 'focused' : '' ">
                                                                        <label>Floor No.</label>
                                                                        <div class="fvalue">
                                                                            <input class="form-control" x-model="parking.floor_number" name="floor_number" type="text" autocomplete="off" data-bs-original-title="" title="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3 m-b-20">
                                                                    <div class="fname" :class="parking.ev_charging_point == '' ? '' : 'focused' ">
                                                                        <label>EV Charging Point</label>
                                                                        <div class="fvalue">
                                                                            <input class="form-control" x-model="parking.ev_charging_point" name="ev_charging_point" type="text" autocomplete="off" data-bs-original-title="" title="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3 m-b-20">
                                                                    <div class="fname" :class="parking.hydraulic_parking == '' ? '' : 'focused' ">
                                                                        <label>Hydraulic Parking</label>
                                                                        <div class="fvalue">
                                                                            <input class="form-control" x-model="parking.hydraulic_parking" name="hydraulic_parking" type="text" autocomplete="off" data-bs-original-title="" title="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <div class="input-group">
                                                                        <div class="form-group col-md-7 m-b-20">
                                                                            <div class="fname" :class="parking.height_of_basement == '' ? '' : 'focused' ">
                                                                                <label class="mb-0">Height of Basement</label>
                                                                                <div class="fvalue">
                                                                                    <input class="form-control" name="height_of_basement" x-model="parking.height_of_basement" type="text" autocomplete="off" data-bs-original-title="" title="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="input-group-append col-md-5 m-b-20">
                                                                            <div class="form-group">
                                                                                <select class="form-select" name="height_of_basement_select" tabindex="-1" aria-hidden="true" :id="`height_basement_select_${index}`">
                                                                                    <option selected="selected" value="121">Ft.</option>
                                                                                    <option value="122">Meter</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </template>
                                                    </div>

                                                    <div class="row">
                                                        <hr>
                                                        <div>
															<label><b>Amenities</b></label>
														</div>
                                                        <div
                                                            class="form-check checkbox  checkbox-solid-success mb-0 col-md-3 m-b-20">
                                                            <input class="project_amenity form-check-input"
                                                                id="amenity_pool" x-model="amenities" type="checkbox" value="swimming_pool">
                                                            <label class="form-check-label" for="amenity_pool">Swimming
                                                                Pool</label>
                                                        </div>
                                                        <div
                                                            class="form-check checkbox  checkbox-solid-success mb-0 col-md-3 m-b-20">
                                                            <input class="project_amenity form-check-input"
                                                                id="amenity_club_house" type="checkbox" x-model="amenities" value="club_house">
                                                            <label class="form-check-label" for="amenity_club_house">Club
                                                                house</label>
                                                        </div>
                                                        <div
                                                            class="form-check checkbox  checkbox-solid-success mb-0 col-md-3 m-b-20">
                                                            <input class="project_amenity form-check-input"
                                                                id="amenity_passenger_lift" type="checkbox" x-model="amenities" value="passenger_lift">
                                                            <label class="form-check-label"
                                                                for="amenity_passenger_lift">Passenger Lift</label>
                                                        </div>
                                                        <div
                                                            class="form-check checkbox  checkbox-solid-success mb-0 col-md-3 m-b-20">
                                                            <input class="project_amenity form-check-input"
                                                                id="amenity_garden" type="checkbox" x-model="amenities" value="garden_and_children_area">
                                                            <label class="form-check-label" for="amenity_garden">Garden & Children Play Area</label>
                                                        </div>
                                                        <div
                                                            class="form-check checkbox  checkbox-solid-success mb-0 col-md-3 m-b-20">
                                                            <input class="project_amenity form-check-input"
                                                                id="amenity_service_lift" type="checkbox" x-model="amenities" value="service_lift">
                                                            <label class="form-check-label"
                                                                for="amenity_service_lift">Service Lift</label>
                                                        </div>
                                                        <div
                                                            class="form-check checkbox  checkbox-solid-success mb-0 col-md-3 m-b-20">
                                                            <input class="project_amenity form-check-input"
                                                                id="amenity_streature_lift" type="checkbox" x-model="amenities" value="streature_lift">
                                                            <label class="form-check-label"
                                                                for="amenity_streature_lift">Streature Lift</label>
                                                        </div>
                                                        <div
                                                            class="form-check checkbox  checkbox-solid-success mb-0 col-md-3 m-b-20">
                                                            <input class="project_amenity form-check-input"
                                                                id="amenity_ac" type="checkbox" x-model="amenities" value="central_ac">
                                                            <label class="form-check-label" for="amenity_ac">Central
                                                                AC</label>
                                                        </div>
                                                        <div
                                                            class="form-check checkbox  checkbox-solid-success mb-0 col-md-3 m-b-20">
                                                            <input class="project_amenity form-check-input"
                                                                id="amenity_gym" type="checkbox" x-model="amenities" value="gym">
                                                            <label class="form-check-label" for="amenity_gym">Gym</label>
                                                        </div>
                                                    </div>
                                                    
                                                    <div>
                                                        <input type="hidden" :class="errors.hasOwnProperty('amenities') ? 'is-invalid' : ''">
                                                        <div class="invalid-feedback">
                                                            <span x-text="errors.amenities"></span>
                                                        </div>
                                                    </div>


                                                    <div class="row">
                                                        <hr>
                                                        <div>
															<label><b>Images/Documents</b></label>
														</div>
														<div id="uploadImageBox" class="row">
                                                            <div class="form-group col-md-4 m-b-4 mt-1">
                                                                <select class="form-select" id="image_category" :class="errors.hasOwnProperty('document_category') ? 'is-invalid' : ''">
                                                                    <option value=""> Category</option>
                                                                    <option value="1">Building Elevation</option>
                                                                    <option value="2">Common Amenities Photos</option>
                                                                    <option value="3">Master Layout Of Building
                                                                    </option>
                                                                    <option value="4">Brochure</option>
                                                                    <option value="5">Cost Sheet</option>
                                                                    <option value="6">Other</option>
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    <span x-text="errors.document_category"></span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-6 m-b-4 mb-3">
                                                                <div class="fname">
                                                                    <div class="fvalue">
                                                                        <input class="form-control" :class="errors.hasOwnProperty('document_image') ? 'is-invalid' : ''" accept="image/*" type="file" id="document_image" name="document_image">
                                                                        <div class="invalid-feedback">
                                                                            <span x-text="errors.document_image"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mt-3">
                                                        <div>
															<label><b>Catlog File</b></label>
														</div>
                                                        <div class="form-group col-md-6 m-b-4 mb-3">
                                                            <div class="fname">
                                                                <div class="fvalue">
                                                                    <input class="form-control" :class="errors.hasOwnProperty('catlog_file') ? 'is-invalid' : ''" accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf" type="file" id="catlog_file" name="catlog_file">
                                                                    <div class="invalid-feedback">
                                                                        <span x-text="errors.catlog_file"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
													<button @click="submitHandle()" class="btn btn-secondary pull-right"
													type="button">Finish!</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @php
            $city_encoded = json_encode($cities);
            $state_encoded = json_encode($states);
            $project_data = isset($id) ? json_encode($id) : null;
        @endphp
    </div>
@endsection
@push('scripts')
    <script src="https://unpkg.com/axios@1.1.2/dist/axios.min.js"></script>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script type="text/javascript">

        document.getElementById('total_floor_for_parking').addEventListener('keypress', event => {
            if (!`${event.target.value}${event.key}`.match(/^[1-9]{0,2}$/)) {
                event.preventDefault();
                event.stopPropagation();
                return false;
            }
        });

        document.addEventListener('alpine:init', () => {

            let data = @json($project_data);

            Alpine.data('add_project_form', () => ({

                init() {
                    if(data) {
                        let project_data = JSON.parse(data);

                        // first section
                        this.id = project_data['id'];
                        $("#builder_id").val(project_data['builder_id']).trigger('change');
                        this.website = project_data['website'] ?? '';

                        this.other_contact_details = JSON.parse(project_data['contact_details']) ?? [{'name' : '','mobile' : '','email' : '','designation' : ''}];

                        this.project_name = project_data['project_name'];
                        this.address = project_data['address'];

                        $("#area_id").val(project_data['area_id']).trigger('change');
                        $("#state_id").val(project_data['state_id']).trigger('change');
                        $("#city_id").val(project_data['city_id']).trigger('change');
                        
                        this.location_link = project_data['location_link'] ?? '';
                        this.pincode = project_data['pincode'] ?? '';
                        this.land_size = project_data['land_area'] ?? '';

                        this.$nextTick(function () {
                            $("#land_size_select").val(project_data['land_size_unit']).trigger('change');
                        });

                        this.rera_no = project_data['rera_number'] ?? '';
                        this.number_of_unit_in_project = project_data['number_of_units_in_project'];

                        $("#project_status").val(project_data['project_status']).trigger('change');

                        if(project_data['project_status'] == 142) {
                            $('#status').val(project_data['project_status_question']).trigger('change');
                        }

                        if(project_data['project_status'] == 143) {
                            this.project_status_question = project_data['project_status_question'];
                        }
                        
                        let restri_data = [];
                        JSON.parse(project_data['restrictions']).forEach((restriction) => {
                            if(restriction != '') {
                                restri_data.push(restriction);
                            } 
                        });
                    
                        $("#restrictions").val(restri_data).trigger('change');
                        $("#restrictions").closest('.fname').addClass('focused');
                    
                        // second section
                        this.sub_categories = [];
                        this.sub_category_single = '';
                        this.property_type = parseInt(project_data['property_type']);
                        $(`#propertytype${this.property_type}`).trigger('click');


                        if(project_data['property_type'] == 88 || project_data['property_type'] == 89) {

                            tower_details_object = JSON.parse(project_data['tower_details']);

                            if(project_data['property_type'] == 88) {
                                this.sub_category_single = project_data['sub_category_single'];
                                this.sub_categories = JSON.parse(project_data['sub_categories']);
                            }

                            if(project_data['property_type'] == 89) {
                                if(JSON.parse(project_data['sub_categories']).length > 0) {
                                    this.sub_categories = JSON.parse(project_data['sub_categories']);
                                } else {
                                    this.sub_category_single = project_data['sub_category_single'];
                                }
                                this.is_flat_or_penthouse = JSON.parse(tower_details_object['if_flat_or_penthouse']);
                            }

                            let array = {
                                14 : '1BHK',
                                15 : '2BHK',
                                16 : '3BHK',
                                17 : '4BHK',
                                18 : '4+BHK',
                            };

                            this.sub_categories.forEach(element => {
                                this.sub_category_array.push(array[element]);
                            });

                            let _this = this;
                            
                            this.if_office_or_retail = JSON.parse(tower_details_object['if_office_or_retail']);
                            this.$nextTick(function () {
                                $("#second_front_road_map_unit_select").val(parseInt(_this.if_office_or_retail.front_road_width_map_unit)).trigger('change');
                                $("#first_front_road_map_unit_select").val(parseInt(_this.if_office_or_retail.front_road_width_map_unit)).trigger('change');
                            });

                            this.if_office_tower_details = JSON.parse(tower_details_object['if_office_tower_details']);
                            this.if_office_tower_details_with_specification = tower_details_object['if_office_tower_details_with_specification'] == 'true' ? true  : false;

                            this.if_office_tower_details.forEach((tower_detail, index) => {
                                _this.$nextTick(function () {
                                    $(`#second_tower_detail_carpet_from_to_select_${index}`).val(tower_detail.carpet_from_to_map_unit).trigger('change');
                                    $(`#second_tower_detail_built_from_to_select_${index}`).val(tower_detail.built_from_to_map_unit).trigger('change');
                                    $(`#second_tower_detail_saleable_from_to_select_${index}`).val(tower_detail.saleable_from_to_map_unit).trigger('change');
                                });
                            });

                            this.if_retail_tower_details = JSON.parse(tower_details_object['if_retail_tower_details']);

                            this.if_retail_tower_details.forEach((tower_detail, index) => {
                                _this.$nextTick(function () {
                                    $(`#floor_category_${index}`).val(tower_detail.sub_category).trigger('change');
                                    $(`#tower_size_from_to_select_${index}`).val(parseInt(tower_detail.size_from_map_unit)).trigger('change');
                                    $(`tower_front_opening_select_${index}`).val(tower_detail.tower_front_opening_map_unit).trigger('change');
                                    $(`tower_ceiling_select_${index}`).val(tower_detail.tower_ceiling_map_unit).trigger('change');

                                    $(`#extra_floor_category_${index}`).val(tower_detail.sub_category).trigger('change');
                                    $(`#extra_tower_size_from_to_select_${index}`).val(parseInt(tower_detail.size_from_map_unit)).trigger('change');
                                    $(`extra_tower_front_opening_select_${index}`).val(tower_detail.tower_front_opening_map_unit).trigger('change');
                                    $(`extra_tower_ceiling_select_${index}`).val(tower_detail.tower_ceiling_map_unit).trigger('change');
                                });
                            });

                            this.if_residential_only_wings.wing_details = JSON.parse(project_data['wing_details']);

                            this.if_residential_only_wings.wing_details.forEach((wing, index) => {
                                _this.$nextTick(function () {
                                    $(`#extra_sub_category_of_wings_${index}`).val(wing.sub_categories).trigger('change');
                                });
                            });

                            this.if_residential_only_units.unit_details = JSON.parse(project_data['unit_details']);

                            this.if_residential_only_units.unit_details.forEach((unit_details, index) => {
                                _this.$nextTick(function () {
                                    $(`#wing_array_${index}`).val(unit_details.wing).trigger('change');
                                    $(`#saleable_area_select_${index}`).val(parseInt(unit_details.saleable_map_unit)).trigger('change');
                                    $(`#built_up_area_select_${index}`).val(parseInt(unit_details.built_up_map_unit)).trigger('change');
                                    $(`#carpet_area_select_${index}`).val(parseInt(unit_details.carpet_area_map_unit)).trigger('change');
                                    $(`#wash_area_select_${index}`).val(parseInt(unit_details.wash_area_map_unit)).trigger('change');
                                    $(`#balcony_area_select_${index}`).val(parseInt(unit_details.balcony_area_map_unit)).trigger('change');
                                    $(`#floor_height_select_${index}`).val(parseInt(unit_details.floor_height_map_unit)).trigger('change');
                                    $(`#terrace_carpet_select_${index}`).val(parseInt(unit_details.terrace_carpet_area_map_unit)).trigger('change');
                                    $(`#terrace_saleable_select_${index}`).val(parseInt(unit_details.terrace_saleable_area_map_unit)).trigger('change');

                                    $(`#second_wing_array_${index}`).val(unit_details.wing).trigger('change');
                                    $(`#second_saleable_area_select_${index}`).val(parseInt(unit_details.saleable_map_unit)).trigger('change');
                                    $(`#second_built_up_area_select_${index}`).val(parseInt(unit_details.built_up_map_unit)).trigger('change');
                                    $(`#second_carpet_area_select_${index}`).val(parseInt(unit_details.carpet_area_map_unit)).trigger('change');
                                    $(`#second_wash_area_select_${index}`).val(parseInt(unit_details.wash_area_map_unit)).trigger('change');
                                    $(`#second_balcony_area_select_${index}`).val(parseInt(unit_details.balcony_area_map_unit)).trigger('change');
                                    $(`#second_floor_height_select_${index}`).val(parseInt(unit_details.floor_height_map_unit)).trigger('change');
                                    $(`#second_terrace_carpet_select_${index}`).val(parseInt(unit_details.terrace_carpet_area_map_unit)).trigger('change');
                                    $(`#second_terrace_saleable_select_${index}`).val(parseInt(unit_details.terrace_saleable_area_map_unit)).trigger('change');
                                });
                            });

                            this.if_residential_only_wings.wing_details.forEach((wing_details, index) => {
                                _this.$nextTick(function () {
                                    $(`#sub_category_of_wings_${index}`).val(wing_details.sub_categories).trigger('change');
                                    $(`#extra_sub_category_of_wings_${index}`).val(wing_details.sub_categories).trigger('change');
                                });
                            });

                        } else {
                            this.property_category = parseInt(project_data['property_category']);
                            $(`#category-${this.property_category}`).trigger('click');

                            if(JSON.parse(project_data['sub_categories']).length > 0) {
                                this.sub_categories = JSON.parse(project_data['sub_categories']);
                            } else {
                                this.sub_category_single = project_data['sub_category_single'];
                            }

                            let array = {
                                14 : '1BHK',
                                15 : '2BHK',
                                16 : '3BHK',
                                17 : '4BHK',
                                18 : '4+BHK',
                            };

                            this.sub_categories.forEach(element => {
                                this.sub_category_array.push(array[element]);
                            });

                            tower_details_object = JSON.parse(project_data['tower_details']);
                            
                            if(this.property_category == 254 || this.property_category == 257) {
                                this.is_flat_or_penthouse = JSON.parse(tower_details_object['if_flat_or_penthouse']);
                            }

                            if(this.property_type == 87) {
                                this.if_residential_only_wings.wing_details = JSON.parse(project_data['wing_details']);
                                this.if_residential_only_units.unit_details = JSON.parse(project_data['unit_details']);
                                let _this = this;

                                this.if_residential_only_units.unit_details.forEach((unit_details, index) => {
                                    _this.$nextTick(function () {
                                        $(`#wing_array_${index}`).val(unit_details.wing).trigger('change');
                                        $(`#saleable_area_select_${index}`).val(parseInt(unit_details.saleable_map_unit)).trigger('change');
                                        $(`#built_up_area_select_${index}`).val(parseInt(unit_details.built_up_map_unit)).trigger('change');
                                        $(`#carpet_area_select_${index}`).val(parseInt(unit_details.carpet_area_map_unit)).trigger('change');
                                        $(`#wash_area_select_${index}`).val(parseInt(unit_details.wash_area_map_unit)).trigger('change');
                                        $(`#balcony_area_select_${index}`).val(parseInt(unit_details.balcony_area_map_unit)).trigger('change');
                                        $(`#floor_height_select_${index}`).val(parseInt(unit_details.floor_height_map_unit)).trigger('change');
                                        $(`#terrace_carpet_select_${index}`).val(parseInt(unit_details.terrace_carpet_area_map_unit)).trigger('change');
                                        $(`#terrace_saleable_select_${index}`).val(parseInt(unit_details.terrace_saleable_area_map_unit)).trigger('change');

                                        $(`#second_wing_array_${index}`).val(unit_details.wing).trigger('change');
                                        $(`#second_saleable_area_select_${index}`).val(parseInt(unit_details.saleable_map_unit)).trigger('change');
                                        $(`#second_built_up_area_select_${index}`).val(parseInt(unit_details.built_up_map_unit)).trigger('change');
                                        $(`#second_carpet_area_select_${index}`).val(parseInt(unit_details.carpet_area_map_unit)).trigger('change');
                                        $(`#second_wash_area_select_${index}`).val(parseInt(unit_details.wash_area_map_unit)).trigger('change');
                                        $(`#second_balcony_area_select_${index}`).val(parseInt(unit_details.balcony_area_map_unit)).trigger('change');
                                        $(`#second_floor_height_select_${index}`).val(parseInt(unit_details.floor_height_map_unit)).trigger('change');
                                        $(`#second_terrace_carpet_select_${index}`).val(parseInt(unit_details.terrace_carpet_area_map_unit)).trigger('change');
                                        $(`#second_terrace_saleable_select_${index}`).val(parseInt(unit_details.terrace_saleable_area_map_unit)).trigger('change');
                                    });
                                });

                                this.if_residential_only_wings.wing_details.forEach((wing_details, index) => {
                                    this.$nextTick(function () {
                                        $(`#sub_category_of_wings_${index}`).val(wing_details.sub_categories).trigger('change');
                                        $(`#extra_sub_category_of_wings_${index}`).val(wing_details.sub_categories).trigger('change');
                                    });
                                });
                            }

                            if(this.property_category == 259) {
                                let _this = this;
                                this.if_office_tower_details = JSON.parse(tower_details_object['if_office_tower_details']);
                                this.if_office_tower_details_with_specification = tower_details_object['if_office_tower_details_with_specification'] == 'true' ? true  : false;


                                this.if_office_tower_details.forEach((tower_detail, index) => {
                                    _this.$nextTick(function () {
                                        $(`#tower_detail_carpet_from_to_select_${index}`).val(tower_detail.carpet_from_to_map_unit).trigger('change');
                                        $(`#tower_detail_built_from_to_select_${index}`).val(tower_detail.built_from_to_map_unit).trigger('change');
                                        $(`#tower_detail_saleable_from_to_select_${index}`).val(tower_detail.saleable_from_to_map_unit).trigger('change');
                                    });
                                });
                            }

                            if(this.property_category == 259 || this.property_category == 260) {
                                let _this = this;
                                this.if_office_or_retail = JSON.parse(tower_details_object['if_office_or_retail']);
                                this.$nextTick(function () {
                                    $("#second_front_road_map_unit_select").val(parseInt(_this.if_office_or_retail.front_road_width_map_unit)).trigger('change');
                                    $("#first_front_road_map_unit_select").val(parseInt(_this.if_office_or_retail.front_road_width_map_unit)).trigger('change');
                                });
                            }

                            if(this.property_category == 260) {
                                this.if_retail_tower_details = JSON.parse(tower_details_object['if_retail_tower_details']);
                                let _this = this;

                                this.if_retail_tower_details.forEach((tower_detail, index) => {
                                    _this.$nextTick(function () {
                                        $(`#floor_category_${index}`).val(tower_detail.sub_category).trigger('change');
                                        $(`#tower_size_from_to_select_${index}`).val(parseInt(tower_detail.size_from_map_unit)).trigger('change');
                                        $(`#tower_front_opening_select_${index}`).val(tower_detail.tower_front_opening_map_unit).trigger('change');
                                        $(`#tower_ceiling_select_${index}`).val(tower_detail.tower_ceiling_map_unit).trigger('change');

                                        $(`#extra_floor_category_${index}`).val(tower_detail.sub_category).trigger('change');
                                        $(`#extra_tower_size_from_to_select_${index}`).val(parseInt(tower_detail.size_from_map_unit)).trigger('change');
                                        $(`#extra_tower_front_opening_select_${index}`).val(tower_detail.tower_front_opening_map_unit).trigger('change');
                                        $(`#extra_tower_ceiling_select_${index}`).val(tower_detail.tower_ceiling_map_unit).trigger('change');
                                    });
                                });
                            }

                            if(this.property_category == 262 || this.property_category == 256 || this.property_category == 258) {
                                this.if_farm_plot_land = JSON.parse(project_data['land_plot_details']);
                                let _this = this;
                                this.$nextTick(function () {
                                    $(`#land_area_select`).val(parseInt(_this.if_farm_plot_land.land_area_map_unit)).trigger('change');
                                    $(`#open_area_select`).val(_this.if_farm_plot_land.open_area_map_unit).trigger('change');
                                    $(`#common_area_select`).val(_this.if_farm_plot_land.common_area_map_unit).trigger('change');
                                    
                                    $(`#plot_size_from_select`).val(_this.if_farm_plot_land.plot_size_from_map_unit).trigger('change');
                                    $(`#plot_size_to_select`).val(_this.if_farm_plot_land.plot_size_to_map_unit).trigger('change');

                                    $(`#carpet_plot_size_select`).val(_this.if_farm_plot_land.carpet_plot_size_map_unit).trigger('change');

                                    $(`#constructed_saleable_area_select`).val(_this.if_farm_plot_land.constructed_saleable_area_map_unit).trigger('change');
                                    
                                    $(`#constructed_carpet_area_select`).val(_this.if_farm_plot_land.constructed_carpet_area_map_unit).trigger('change');

                                    $(`#constructed_built_up_from_area_select`).val(_this.if_farm_plot_land.constructed_built_up_from_map_unit).trigger('change');

                                    $(`#constructed_built_up_to_area_select`).val(_this.if_farm_plot_land.constructed_built_up_to_map_unit).trigger('change');
                                });
                            }

                            if(this.property_category == 261) {
                                this.if_ware_cold_ind_plot.types = JSON.parse(project_data['storage_industrial_details']);
                                this.storage_industrial = JSON.parse( project_data['storage_industrial_facilities']);

                                let _this = this;
                                this.$nextTick(function () {
                                    _this.if_ware_cold_ind_plot.types.forEach((type, index) => {
                                        $(`#carpet_from_to_select_${index}`).val(type.carpet_from_to_unit_map);
                                        $(`#constructed_from_to_select_${index}`).val(type.constructed_from_to_unit_map);
                                        $(`#road_width_of_front_side_area_from_to_select_${index}`).val(type.road_width_of_front_side_area_from_to_unit_map);
                                        $(`#type_ceiling_height_${index}`).val(type.ceiling_height_unit_map);
                                    });

                                    $('#pcb').prop('checked', _this.storage_industrial.pcb_detail != '' ? true : false);
                                    $('#ec').prop('checked', _this.storage_industrial.ec_detail != '' ? true : false);
                                    $('#gas').prop('checked', _this.storage_industrial.gas_detail != '' ? true : false);
                                    $('#power').prop('checked', _this.storage_industrial.power_detail != '' ? true : false);
                                    $('#water').prop('checked', _this.storage_industrial.water_detail != '' ? true : false);
                                });

                                this.extra_facilities = JSON.parse(project_data['extra_facilities']);
                            }
                        }
 
                        // third section

                        let parking_data = JSON.parse(project_data['parking_details']);
                        
                        this.free_alloted_for_four_wheeler = parking_data['free_alloted_for_four_wheeler'] == 'true' ? true : false;
                        this.free_alloted_for_two_wheeler = parking_data['free_alloted_for_two_wheeler'] == 'true' ? true : false;
                        this.available_for_purchase = parking_data['available_for_purchase'] == 'true' ? true : false;
                        
                        this.total_number_of_parking = parking_data['total_number_of_parking'];
                        this.total_floor_for_parking = parking_data['total_floor_for_parking'];

                        this.parking_details = JSON.parse(parking_data['parking_details']);

                        JSON.parse(parking_data['parking_details']).forEach((parking_detail, index) => {
                            this.$nextTick(function () {
                                $(`#height_basement_select_${index}`).val(parseInt(parking_detail.height_of_basement_map_unit)).trigger('change');
                            });
                        });

                        this.nextTickForDynamicAddfloor();

                        this.amenities = JSON.parse(project_data['amenities']);

                        $('#image_category').val(project_data['document_category']).trigger('change');
                    }
                },

                errors : {},

                // first_sections

                id : '',
                website : '',
                other_contact_details : [{
                    'name' : '',
                    'mobile' : '',
                    'email' : '',
                    'designation' : '',
                }],
                project_name : '',
                address : '',
                location_link : '',
                pincode : '',
                land_size : '',
                rera_no : '',
                number_of_unit_in_project : '',  

                project_status_question : '',

                addOtherContact() {
                    this.other_contact_details.push({
                        'name' : '',
                        'mobile' : '',
                        'email' : '',
                        'designation' : '',
                    });
                },

                removeOtherContact(index = null) {
                    this.other_contact_details.splice(index , 1);
                },
                
                // second section

                property_type : 85,
                property_category : '',

                extra_category: '',

                sub_categories : [],
                sub_category_single : '1',

                sub_category_array : [],

                wings_name_array : [],

                is_flat_or_penthouse : {
                    number_of_towers : '',
                    number_of_floors : '',
                    total_units : '',
                    number_of_elevator : '',
                    service_elevator : '',
                },

                if_residential_only_wings : {
                    wing_name : '',
                    total_floors : '',
                    total_total_units : '',
                    sub_categories : [],

                    wing_details : [
                        {
                            wing_name : '',
                            total_floors : '',
                            total_total_units : '',
                            sub_categories : [],
                        }
                    ]
                },

                if_residential_only_units : {
                    wing : '',
                    saleable : '',

                    built_up : '',
                    carpet_area : '',
                    balcony : '',
                    wash_area : '',
                    terrace_carpet_area : '',
                    terrace_saleable_area : '',
                    floor_height : '',
                    servant_room : false,
                    service_lift : false,

                    has_terrace_and_carpet : false,

                    saleable_map_unit : '',
                    built_up_map_unit : '',
                    carpet_area_map_unit : '',
                    balcony_area_map_unit : '',
                    wash_area_map_unit : '',
                    terrace_carpet_area_map_unit : '',
                    terrace_saleable_area_map_unit : '',
                    floor_height_map_unit : '',

                    unit_details : [
                        {
                            wing : '',
                            saleable : '',
                            saleable_to : '',

                            built_up : '',
                            built_up_to : '',
                            carpet_area : '',
                            carpet_area_to : '',
                            balcony : '',
                            balcony_to : '',
                            wash_area : '',
                            wash_area_to : '',
                            terrace_carpet_area : '',
                            terrace_carpet_area_to : '',
                            terrace_saleable_area_to : '',
                            floor_height : '',
                            servant_room : false,
                            service_lift : false,

                            has_terrace_and_carpet : false,
                            has_built_up : false,
                            has_carpet : false,

                            saleable_map_unit : '',
                            built_up_map_unit : '',
                            carpet_area_map_unit : '',
                            balcony_area_map_unit : '',
                            wash_area_map_unit : '',
                            terrace_carpet_area_map_unit : '',
                            terrace_saleable_area_map_unit : '',
                            floor_height_map_unit : '',
                        }
                    ]
                },

                if_office_or_retail : {
                    number_of_tower : '',
                    number_of_floor : '',
                    number_of_unit : '',
                    number_of_unit_each_block : '',
                    number_of_lift : '',
                    service_lift : false,
                    front_road_width : '',
                    front_road_width_map_unit : '',
                    washroom : 'private',
                    is_two_corner : false,
                },

                if_office_tower_details : [
                    {
                        tower_name : '',
                        total_floor : '',
                        total_unit : '',
                        carpet : '',
                        carpet_to : '',
                        built_up : '',
                        built_up_to : '',
                        saleable : '',
                        saleable_to : '',

                        is_carpet : false,
                        is_built_up : false,
                    }
                ],

                if_office_tower_details_with_specification : false,

                if_retail_tower_details : [
                    {
                        tower_name : '',
                        sub_category : '',
                        size_from : '',
                        size_to : '',
                        front_opening : '',
                        number_of_each_floor : '',
                        ceiling_height : '',

                        size_from_map_unit  : '',
                        size_to_map_unit  : '',
                        tower_ceiling_map_unit  : '',
                    }
                ],

                if_farm_plot_land : {
                    total_land_area : '',
                    total_land_area_to : '',
                    total_open_area : '',
                    total_open_area_to : '',
                    total_number_of_plot : '',
                    common_area : '',
                    common_area_to : '',

                    multiple_theme_phase : false,

                    land_area_map_unit : '',
                    open_area_map_unit : '',
                    common_area_map_unit : '',

                    phase_name : '',
                    plot_size_from : '',
                    plot_size_to : '',
                    plot_size_from_map_unit : '',
                    plot_size_to_map_unit : '',

                    add_carpet_plot_size : false,
                    add_constructed_carpet_area : false,
                    add_constructed_built_up_area : false,

                    carpet_plot_size : '',
                    carpet_plot_size_to : '',
                    carpet_plot_size_map_unit : '',

                    plot_with_construcation : false,

                    constructed_saleable_area : '',
                    constructed_saleable_area_to : '',
                    constructed_saleable_area_map_unit : '',

                    constructed_carpet_area : '',
                    constructed_carpet_area_to : '',
                    constructed_carpet_area_map_unit : '',

                    constructed_built_up_area_from : '',
                    constructed_built_up_area_to : '',

                    constructed_built_up_from_map_unit : '',
                    constructed_built_up_to_map_unit : '',

                    number_of_room : '',
                    number_of_bathroom : '',
                    number_of_balcony : '',
                    number_of_open_side : '',

                    servant_room : false,
                    number_of_parking : '',
                },

                if_ware_cold_ind_plot : {
                    types : [
                        {
                            plot_area_from : '',
                            plot_area_to : '',

                            construced_area_from : '',
                            construced_area_to : '',

                            road_width_of_front_side_area_from : '',
                            road_width_of_front_side_area_to : '',

                            ceiling_height : '',
                        }
                    ]
                },

                storage_industrial : {
                    gas : false,
                    gas_detail : '',
                    power : false,
                    power_detail : '',
                    water : false,
                    water_detail : '',
                    other : false,
                    other_detail : '',
                },

                new_facility_input : '',
                extra_facilities : [],

                resetData() {

                    this.wings_name_array = [];
                    
                    this.is_flat_or_penthouse = {
                        number_of_towers : '',
                        number_of_floors : '',
                        total_units : '',
                        number_of_elevator : '',
                        service_elevator : '',
                    };

                    this.if_residential_only_wings = {
                        wing_name : '',
                        total_floors : '',
                        total_total_units : '',
                        sub_categories : [],

                        wing_details : [
                            {
                                wing_name : '',
                                total_floors : '',
                                total_total_units : '',
                                sub_categories : [],
                            }
                        ]
                    };

                    this.if_residential_only_units = {
                        wing : '',
                        saleable : '',

                        built_up : '',
                        carpet_area : '',
                        balcony : '',
                        wash_area : '',
                        terrace_carpet_area : '',
                        terrace_saleable_area : '',
                        floor_height : '',
                        servant_room : false,
                        service_lift : false,

                        has_terrace_and_carpet : false,

                        saleable_map_unit : '',
                        built_up_map_unit : '',
                        carpet_area_map_unit : '',
                        balcony_area_map_unit : '',
                        wash_area_map_unit : '',
                        terrace_carpet_area_map_unit : '',
                        terrace_saleable_area_map_unit : '',
                        floor_height_map_unit : '',

                        unit_details : [
                            {
                                wing : '',
                                saleable : '',
                                saleable_to : '',

                                built_up : '',
                                built_up_to : '',
                                carpet_area : '',
                                carpet_area_to : '',
                                balcony : '',
                                balcony_to : '',
                                wash_area : '',
                                wash_area_to : '',
                                terrace_carpet_area : '',
                                terrace_carpet_area_to : '',
                                terrace_saleable_area_to : '',
                                floor_height : '',
                                servant_room : false,
                                service_lift : false,

                                has_terrace_and_carpet : false,
                                has_built_up : false,
                                has_carpet : false,

                                saleable_map_unit : '',
                                built_up_map_unit : '',
                                carpet_area_map_unit : '',
                                balcony_area_map_unit : '',
                                wash_area_map_unit : '',
                                terrace_carpet_area_map_unit : '',
                                terrace_saleable_area_map_unit : '',
                                floor_height_map_unit : '',
                            }
                        ]
                    };

                    this.if_office_or_retail = {
                        number_of_tower : '',
                        number_of_floor : '',
                        number_of_unit : '',
                        number_of_unit_each_block : '',
                        number_of_lift : '',
                        service_lift : false,
                        front_road_width : '',
                        front_road_width_map_unit : '',
                        washroom : 'private',
                        is_two_corner : false,
                    };

                    this.if_office_tower_details = [
                        {
                            tower_name : '',
                            total_floor : '',
                            total_unit : '',
                            carpet : '',
                            built_up : '',
                            built_up_to : '',
                            saleable : '',
                            saleable_to : '',

                            is_carpet : false,
                            is_built_up : false,
                        }
                    ];

                    this.if_office_tower_details_with_specification = false;

                    this.if_retail_tower_details = [
                        {
                            tower_name : '',
                            sub_category : '',
                            size_from : '',
                            size_to : '',
                            front_opening : '',
                            number_of_each_floor : '',
                            ceiling_height : '',

                            size_from_map_unit  : '',
                            size_to_map_unit  : '',
                            tower_ceiling_map_unit  : '',
                        }
                    ];

                    this.if_farm_plot_land = {
                        total_land_area : '',
                        total_land_area_to : '',
                        total_open_area : '',
                        total_open_area_to : '',
                        total_number_of_plot : '',
                        common_area : '',
                        common_area_to : '',

                        multiple_theme_phase : false,

                        land_area_map_unit : '',
                        open_area_map_unit : '',
                        common_area_map_unit : '',

                        phase_name : '',
                        plot_size_from : '',
                        plot_size_to : '',

                        add_carpet_plot_size : false,
                        add_constructed_carpet_area : false,
                        add_constructed_built_up_area : false,

                        carpet_plot_size : '',
                        carpet_plot_size_to : '',
                        carpet_plot_size_map_unit : '',

                        plot_with_construcation : false,

                        constructed_saleable_area : '',
                        constructed_saleable_area_to : '',
                        constructed_saleable_area_map_unit : '',

                        constructed_carpet_area : '',
                        constructed_carpet_area_to : '',
                        constructed_carpet_area_map_unit : '',

                        constructed_built_up_area_from : '',
                        constructed_built_up_area_to : '',

                        number_of_room : '',
                        number_of_bathroom : '',
                        number_of_balcony : '',
                        number_of_open_side : '',

                        servant_room : false,
                        number_of_parking : '',
                    };

                    this.if_ware_cold_ind_plot = {
                        types : [
                            {
                                plot_area_from : '',
                                plot_area_to : '',

                                construced_area_from : '',
                                construced_area_to : '',

                                road_width_of_front_side_area_from : '',
                                road_width_of_front_side_area_to : '',

                                ceiling_height : '',
                            }
                        ]
                    };

                    this.storage_industrial = {
                        pcb : false,
                        pcb_detail : '',

                        ec : false,
                        ec_detail : '',

                        gas : false,
                        gas_detail : '',

                        power : false,
                        power_detail : '',
                        
                        water : false,
                        water_detail : '',
                    };

                    this.extra_facilities = [];
                    this.new_facility_input = '';
                },

                changePropertyType() {
                    this.property_category = '';
                    this.sub_category_single = '';
                    this.sub_categories = [];
                    this.wings_name_array = [];
                    this.new_facility_input = '';
                    this.resetData();
                },

                categoryChange() {
                    this.sub_categories = [];
                    this.sub_category_single = '';
                    this.resetData();
                },

                addWingSubCategory(event, value) {
                    if(event.target.checked) {
                        this.sub_category_array.push(value);
                    } else {
                        const index = this.sub_category_array.indexOf(value);
                        if (index > -1) {
                            this.sub_category_array.splice(index, 1);
                        }
                    }
                },

                manageWingNameArray() {
                    let _this = this;
                    this.wings_name_array = [];
                    this.if_residential_only_wings.wing_details.forEach(wing => {
                        _this.wings_name_array.push(wing.wing_name);
                    });
                },

                towerWithSpecification() {
                    this.if_office_tower_details = [];

                    if(!this.if_office_tower_details_with_specification) {
                        if(parseInt(this.if_office_or_retail.number_of_tower) > 0) {
                            for (let index = 0; index < this.if_office_or_retail.number_of_tower; index++) {
                                this.if_office_tower_details.push({
                                    tower_name : '',
                                    total_floor : '',
                                    total_unit : '',
                                    carpet : '',
                                    carpet_to : '',
                                    built_up : '',
                                    built_up_to : '',
                                    saleable : '',
                                    saleable_to : '',

                                    is_carpet : false,
                                    is_built_up : false,
                                });
                            }
                        }
                        return;
                    }

                    this.if_office_tower_details.push({
                        tower_name : '',
                        total_floor : '',
                        total_unit : '',
                        carpet : '',
                        carpet_to : '',
                        built_up : '',
                        built_up_to : '',
                        saleable : '',
                        saleable_to : '',

                        is_carpet_built_up : false,
                    });
                },

                addCarpetPlotSize() {
                    this.if_farm_plot_land.add_carpet_plot_size = !this.if_farm_plot_land.add_carpet_plot_size; 
                },

                addConstCarpetArea() {
                    this.if_farm_plot_land.add_constructed_carpet_area = !this.if_farm_plot_land.add_constructed_carpet_area; 
                },

                addConstBuiltUpArea() {
                    this.if_farm_plot_land.add_constructed_built_up_area = !this.if_farm_plot_land.add_constructed_built_up_area; 
                },

                nexttickForFirstCondition() {
                    let _this = this;
                    this.$nextTick(function () {
                        $('#second_front_road_map_unit_select').select2();
                        $('#first_front_road_map_unit_select').select2();
                    });
                    return;
                },

                nextTickForTowerDetails() {
                    this.if_office_tower_details.forEach((element, index) => {
                        this.$nextTick(function () {
                            $(`#tower_detail_carpet_from_to_select_${index}`).select2();
                            $(`#tower_detail_built_from_to_select_${index}`).select2();
                            $(`#tower_detail_saleable_from_to_select_${index}`).select2();

                            $(`#second_tower_detail_carpet_from_to_select_${index}`).select2();
                            $(`#second_tower_detail_built_from_to_select_${index}`).select2();
                            $(`#second_tower_detail_saleable_from_to_select_${index}`).select2();
                        });
                    });
                },

                nextTickForIfResidentialWings() {
                    this.$nextTick(function () {
                        $('#sub_category_of_wings').select2();
                    });

                    this.if_residential_only_wings.wing_details.forEach((element,index)   => {
                        this.$nextTick(function () {
                            $(`#sub_category_of_wings_${index}`).select2({ placeholder: 'Sub Category' });
                            $(`#extra_sub_category_of_wings_${index}`).select2({ placeholder: 'Sub Category' });
                        }); 
                    });
                    return;
                },

                nextTickForIfRetail() {
                    let _this = this;

                    this.if_retail_tower_details.forEach((element,index)   => {
                        this.$nextTick(function () {
                            $(`#floor_category_${index}`).select2();
                            $(`#tower_front_opening_select_${index}`).select2();
                            $(`#ceiling_height_select_${index}`).select2();
                            $(`#tower_size_from_to_select_${index}`).select2();
                            $(`#tower_ceiling_select_${index}`).select2();

                            $(`#extra_floor_category_${index}`).select2();
                            $(`#extra_tower_front_opening_select_${index}`).select2();
                            $(`#extra_ceiling_height_select_${index}`).select2();
                            $(`#extra_tower_size_from_to_select_${index}`).select2();
                            $(`#extra_tower_ceiling_select_${index}`).select2();
                        });
                    });
                    return;
                },

                nexttickForFarm() {
                    this.$nextTick(function () {
                        $('#land_area_select').select2();
                        $('#open_area_select').select2();
                        $('#common_area_select').select2();
                        $('#plot_size_from_select').select2();
                        $('#plot_size_to_select').select2();
                    });
                    return;
                },

                selectOnMultiplePhase() {
                    this.$nextTick(function () {
                        $('#plot_size_from_select').select2();
                        $('#plot_size_to_select').select2();
                    });
                    return;
                },

                selectOnCarpetPlot() {
                    this.$nextTick(function () {
                        $('#carpet_plot_size_select').select2();
                    });
                    return;
                },

                selectOnConstSaleableArea() {
                    this.$nextTick(function () {
                        $('#constructed_saleable_area_select').select2();
                        $('#constructed_built_up_from_area_select').select2();
                        $('#constructed_built_up_to_area_select').select2();
                    });
                    return;
                },

                selectOnConstCarpetArea() {
                    this.$nextTick(function () {
                        $('#constructed_carpet_area_select').select2();
                    });
                    return;
                },

                nextTickForIfResidentialUnits() {
                    let _this = this;
                    this.if_residential_only_units.unit_details.forEach((element, index) => {
                        _this.$nextTick(function () {
                            $(`#wing_array_${index}`).select2();
                            $(`#saleable_area_select_${index}`).select2();
                            $(`#built_up_area_select_${index}`).select2();
                            $(`#carpet_area_select_${index}`).select2();
                            $(`#wash_area_select_${index}`).select2();
                            $(`#balcony_area_select_${index}`).select2();
                            $(`#terrace_carpet_select_${index}`).select2();
                            $(`#terrace_saleable_select_${index}`).select2();
                            $(`#floor_height_select_${index}`).select2();

                            $(`#second_wing_array_${index}`).select2();
                            $(`#second_saleable_area_select_${index}`).select2();
                            $(`#second_built_up_area_select_${index}`).select2();
                            $(`#second_carpet_area_select_${index}`).select2();
                            $(`#second_wash_area_select_${index}`).select2();
                            $(`#second_balcony_area_select_${index}`).select2();
                            $(`#second_terrace_carpet_select_${index}`).select2();
                            $(`#second_terrace_saleable_select_${index}`).select2();
                            $(`#second_floor_height_select_${index}`).select2();
                        });    
                    });
                    return;
                },

                addWingDetail() {
                    this.if_residential_only_wings.wing_details.push({
                        wing_name : '',
                        total_floors : '',
                        total_total_units : '',
                        sub_categories : [],
                    });
                },

                removeWingDetail(index) {
                    this.if_residential_only_wings.wing_details.splice(index,1);
                    this.manageWingNameArray();
                },

                addRetailUnitDetails() {
                    if(this.if_office_or_retail.number_of_tower > 0) {
                        this.if_retail_tower_details = [];
                        for (let index = 0; index < this.if_office_or_retail.number_of_tower; index++) {
                            this.if_retail_tower_details.push({
                                tower_name : '',
                                sub_category : '',
                                size_from : '',
                                size_to : '',
                                front_opening : '',
                                number_of_each_floor : '',
                                ceiling_height : '',

                                size_from_map_unit  : '',
                                size_to_map_unit  : '',
                                tower_ceiling_map_unit  : '',
                            });
                        }
                    }
                },

                addUnitDetail() {
                    this.if_residential_only_units.unit_details.push({                
                        wing : '',
                        saleable : '',
                        saleable_to : '',

                        built_up : '',
                        built_up_to : '',
                        carpet_area : '',
                        carpet_area_to : '',
                        balcony : '',
                        balcony_to : '',
                        wash_area : '',
                        wash_area_to : '',
                        terrace_carpet_area : '',
                        terrace_carpet_area_to : '',
                        terrace_saleable_area_to : '',
                        floor_height : '',
                        servant_room : false,
                        service_lift : false,

                        has_terrace_and_carpet : false,
                        has_built_up : false,
                        has_carpet : false,

                        saleable_map_unit : '',
                        built_up_map_unit : '',
                        carpet_area_map_unit : '',
                        balcony_area_map_unit : '',
                        wash_area_map_unit : '',
                        terrace_carpet_area_map_unit : '',
                        terrace_saleable_area_map_unit : '',
                        floor_height_map_unit : '',
                    });
                },

                removeUnitDetail(index) {
                    this.if_residential_only_units.unit_details.splice(index,1);
                },

                addType() {
                    this.if_ware_cold_ind_plot.types.push({
                        plot_area_from : '',
                        plot_area_to : '',

                        construced_area_from : '',
                        construced_area_to : '',

                        road_width_of_front_side_area_from : '',
                        road_width_of_front_side_area_to : '',

                        ceiling_height : '',
                    });
                },

                removeType(index) {
                    this.if_ware_cold_ind_plot.types.splice(index,1);
                },

                nextTickForWareColdPlot() {
                    let _this = this;
                    this.if_ware_cold_ind_plot.types.forEach((type,index) => {
                        _this.$nextTick(function () {
                            $(`#carpet_from_to_select_${index}`).select2();
                            $(`#carpet_to_select_${index}`).select2();

                            $(`#constructed_from_to_select_${index}`).select2();
                            $(`#constructed_to_select_${index}`).select2();

                            $(`#road_width_of_front_side_area_from_to_select_${index}`).select2();
                            $(`#road_width_of_front_side_area_to_select_${index}`).select2();

                            $(`#type_ceiling_height_${index}`).select2();

                        });
                    });
                },

                // third section
                free_alloted_for_two_wheeler : false,
                free_alloted_for_four_wheeler : false,
                available_for_purchase : false,

                total_number_of_parking : '',
                total_floor_for_parking : '',

                parking_details : [],

                addRows() {

                    this.parking_details = [];

                    for (let index = 0; index < this.total_floor_for_parking; index++) {
                        this.parking_details.push({
                            floor_number : index,
                            ev_charging_point : '',
                            hydraulic_parking : '',
                            height_of_basement : '',
                            height_of_basement_map_unit : '',
                        });

                        this.$nextTick(function () {
                            $(`#height_basement_select_${index}`).select2();
                        });
                    }
                },

                nextTickForDynamicAddfloor() {
                    for (let index = 0; index < this.total_floor_for_parking; index++) {
                        this.$nextTick(function () {
                            $(`#height_basement_select_${index}`).select2();
                        });
                    }
                },

                addNewFacility() {
                    let exist = this.extra_facilities.findIndex(facility => facility.name == this.new_facility_input);

                    if(exist >= 0) {
                        this.new_facility_input = '';    
                        return;
                    }

                    this.extra_facilities.push({
                        'name' : this.new_facility_input,
                        'detail' : '',
                        'id' : '',
                    });
                    this.new_facility_input = '';
                },

                removeExtraFacility(index) {
                    this.extra_facilities.splice(index, 1);
                },

                amenities : [],

                document_category : '',

                // submit section
                submitHandle() {

                    let _this = this;

                    this.if_residential_only_wings.wing_details.forEach((element , index) => {
                        if(this.property_type == 88 || this.property_type == 89)
                        {
                            element.sub_categories = $(`#extra_sub_category_of_wings_${index}`).val();
                        } else
                        {
                            element.sub_categories = $(`#sub_category_of_wings_${index}`).val();
                        }
                    });

                    this.if_office_tower_details.forEach((element , index) => {
                        if(this.property_type == 88 || this.property_type == 89)
                        {
                            element.carpet_from_to_map_unit = $(`#second_tower_detail_carpet_from_to_select_${index}`).val();
                            element.built_from_to_map_unit = $(`#second_tower_detail_built_from_to_select_${index}`).val();
                            element.saleable_from_to_map_unit = $(`#second_tower_detail_saleable_from_to_select_${index}`).val();
                        } else {
                            element.carpet_from_to_map_unit = $(`#tower_detail_carpet_from_to_select_${index}`).val();
                            element.built_from_to_map_unit = $(`#tower_detail_built_from_to_select_${index}`).val();
                            element.saleable_from_to_map_unit = $(`#tower_detail_saleable_from_to_select_${index}`).val();
                        }
                    });

                    this.if_residential_only_units.unit_details.forEach((element , index) => {
                        if(this.property_type == 88 || this.property_type == 89)
                        {
                            element.wing = $(`#second_wing_array_${index}`).val();
                            element.saleable_map_unit = $(`#second_saleable_area_select_${index}`).val();
                            element.built_up_map_unit = $(`#second_built_up_area_select_${index}`).val();
                            element.carpet_area_map_unit = $(`#second_carpet_area_select_${index}`).val();
                            element.balcony_area_map_unit = $(`#second_balcony_area_select_${index}`).val();
                            element.wash_area_map_unit = $(`#second_wash_area_select_${index}`).val();
                            element.terrace_carpet_area_map_unit = $(`#second_terrace_carpet_select_${index}`).val();
                            element.terrace_saleable_area_map_unit = $(`#second_terrace_saleable_select_${index}`).val();
                            element.floor_height_map_unit = $(`#second_floor_height_select_${index}`).val();
                        } else {
                            element.wing = $(`#wing_array_${index}`).val();
                            element.saleable_map_unit = $(`#saleable_area_select_${index}`).val();
                            element.built_up_map_unit = $(`#built_up_area_select_${index}`).val();
                            element.carpet_area_map_unit = $(`#carpet_area_select_${index}`).val();
                            element.balcony_area_map_unit = $(`#balcony_area_select_${index}`).val();
                            element.wash_area_map_unit = $(`#wash_area_select_${index}`).val();
                            element.terrace_carpet_area_map_unit = $(`#terrace_carpet_select_${index}`).val();
                            element.terrace_saleable_area_map_unit = $(`#terrace_saleable_select_${index}`).val();
                            element.floor_height_map_unit = $(`#floor_height_select_${index}`).val();
                        }
                    });

                    if(this.property_type == 88 || this.property_type == 89)
                    {
                        this.if_office_or_retail.front_road_width_map_unit = $('#second_front_road_map_unit_select').val() ?? '';
                    } else {
                        this.if_office_or_retail.front_road_width_map_unit = $('#first_front_road_map_unit_select').val() ?? '';
                    }

                    this.if_retail_tower_details.forEach((element , index) => {
                        if(this.property_type == 88 || this.property_type == 89)
                        {
                            element.sub_category = $(`#extra_floor_category_${index}`).val() ?? '';
                            element.size_from_map_unit = $(`#extra_tower_size_from_to_select_${index}`).val() ?? '';
                            element.tower_front_opening_map_unit = $(`#extra_tower_front_opening_select_${index}`).val() ?? '';
                            element.tower_ceiling_map_unit = $(`#extra_tower_ceiling_select_${index}`).val() ?? '';
                        } else {
                            element.sub_category = $(`#floor_category_${index}`).val() ?? '';
                            element.size_from_map_unit = $(`#tower_size_from_to_select_${index}`).val() ?? '';
                            element.tower_front_opening_map_unit = $(`#tower_front_opening_select_${index}`).val() ?? '';
                            element.tower_ceiling_map_unit = $(`#tower_ceiling_select_${index}`).val() ?? '';
                        }
                    });

                    this.if_farm_plot_land.land_area_map_unit = $('#land_area_select').val() ?? '';
                    this.if_farm_plot_land.open_area_map_unit = $('#open_area_select').val() ?? '';
                    this.if_farm_plot_land.common_area_map_unit = $('#common_area_select').val() ?? '';
                    this.if_farm_plot_land.plot_size_from_map_unit = $('#plot_size_from_select').val() ?? '';
                    this.if_farm_plot_land.plot_size_to_map_unit = $('#plot_size_to_select').val() ?? '';

                    this.if_farm_plot_land.carpet_plot_size_map_unit = $('#carpet_plot_size_select').val() ?? '';

                    this.if_farm_plot_land.constructed_saleable_area_map_unit = $('#constructed_saleable_area_select').val() ?? '';
                    this.if_farm_plot_land.constructed_carpet_area_map_unit = $('#constructed_carpet_area_select').val() ?? '';
                    
                    this.if_farm_plot_land.constructed_built_up_from_map_unit = $('#constructed_built_up_from_area_select').val() ?? '';
                    this.if_farm_plot_land.constructed_built_up_to_map_unit = $('#constructed_built_up_to_area_select').val() ?? '';

                    let form_data = new FormData();

                    form_data.set('id', this.id);
                    form_data.set('builder_id', $('#builder_id').val());
                    form_data.set('website', this.website);

                    form_data.set('other_contact_details', JSON.stringify(this.other_contact_details));

                    form_data.set('project_name', this.project_name);
                    form_data.set('address', this.address);

                    form_data.set('locality', $('#area_id').val() ?? '');
                    form_data.set('state', $('#state_id').val() ?? '');
                    form_data.set('city', $('#city_id').val() ?? '' );

                    form_data.set('location_link', this.location_link);
                    form_data.set('pincode', this.pincode);
                    form_data.set('land_area',  this.land_size);
                    form_data.set('land_size_unit', $('#land_size_select').val() ?? '');

                    form_data.set('number_of_unit_in_project',  this.number_of_unit_in_project);
                    form_data.set('rera_number', this.rera_no);

                    form_data.set('project_status', $('#project_status').val() ?? '');

                    let project_status = $('#project_status').val() ?? '';

                    if(project_status == 143) {
                        form_data.set('project_status_question', this.project_status_question);
                    }

                    if(project_status == 142) {
                        form_data.set('project_status_question', $('#status').val() ?? '');
                    }

                    form_data.set('restricted_user', JSON.stringify($('#restrictions').val()));

                    // second section

                    form_data.set('propery_type', this.property_type);
                    form_data.set('property_category', this.property_category);
                    form_data.set('sub_categories', JSON.stringify(this.sub_categories));
                    form_data.set('sub_category_single', this.sub_category_single);

                    form_data.set('is_flat_or_penthouse', JSON.stringify(this.is_flat_or_penthouse));

                    form_data.set('if_residential_only_wings', JSON.stringify(this.if_residential_only_wings.wing_details));
                    form_data.set('if_residential_only_units', JSON.stringify(this.if_residential_only_units.unit_details));

                    form_data.set('if_office_or_retail', JSON.stringify(this.if_office_or_retail));
                    form_data.set('if_office_tower_details', JSON.stringify(this.if_office_tower_details));

                    form_data.set('if_office_tower_details_with_specification', this.if_office_tower_details_with_specification);

                    form_data.set('if_retail_tower_details', JSON.stringify(this.if_retail_tower_details));
                    form_data.set('if_farm_plot_land', JSON.stringify(this.if_farm_plot_land));

                    this.if_ware_cold_ind_plot.types.forEach((type, index) => {
                        type.carpet_from_to_unit_map = $(`#carpet_from_to_select_${index}`).val() ?? '';
                        type.constructed_from_to_unit_map = $(`#constructed_from_to_select_${index}`).val() ?? '';
                        type.road_width_of_front_side_area_from_to_unit_map = $(`#road_width_of_front_side_area_from_to_select_${index}`).val() ?? '';
                        type.ceiling_height_unit_map = $(`#type_ceiling_height_${index}`).val() ?? '';
                    });

                    form_data.set('if_ware_cold_ind_plot', JSON.stringify(this.if_ware_cold_ind_plot.types));
                    form_data.set('storage_industrial_details', JSON.stringify(this.storage_industrial));
                    form_data.set('extra_facilities', JSON.stringify(this.extra_facilities));

                    // third section

                    form_data.set('total_number_of_parking', this.total_number_of_parking);
                    form_data.set('free_alloted_for_two_wheeler', this.free_alloted_for_two_wheeler);
                    form_data.set('free_alloted_for_four_wheeler', this.free_alloted_for_four_wheeler);
                    form_data.set('available_for_purchase', this.available_for_purchase);

                    form_data.set('total_floor_for_parking', this.total_floor_for_parking);

                    for (let index = 0; index < this.parking_details.length; index++) {
                        if($(`#height_basement_select_${index}`)) {
                            this.parking_details[index]['height_of_basement_map_unit'] = $(`#height_basement_select_${index}`).val() ?? '';
                        }
                    }

                    form_data.set('parking_details', JSON.stringify(this.parking_details));
                    
                    form_data.set('amenities', this.amenities.length > 0 ? JSON.stringify(this.amenities) : '' );
                    
                    form_data.set('document_category', $('#image_category').val() ?? '');
                    let document_image = document.getElementById('document_image');
                    if(document_image && document_image.files.length > 0)
                    {
                        let file = document_image.files[0];
                        form_data.set('document_image', file, file.name);
                    }

                    let catlog_file = document.getElementById('catlog_file');
                    if(catlog_file && catlog_file.files.length > 0)
                    {
                        let file = catlog_file.files[0];
                        form_data.set('catlog_file', file, file.name);
                    }

                    let url = "{{ route('superadmin.saveProject') }}";
                    
                    axios.post(url, form_data, {
                        headers: {
                            "Content-Type": "multipart/form-data",
                        },
                    })
                    .then((res) => {
                        var redirect_url = "{{route('superadmin.projects')}}";
                        window.location.href = redirect_url;
                    })
                    .catch((err) => {
                        if(err.response.status != 500) {
                            _this.errors = err.response.data.errors;
                        }
                    });
                }
            }));
        });

    </script>

    <script src="{{ asset('admins/assets/js/form-wizard/form-wizard-two.js') }}"></script>
    
    <script>

		var shouldchangecity = 1;
		var building_image_show_url = "{{ asset('upload/document_image') }}";

		function enableTouchspin(params) {
                !(function(t, n, s) {
                    "use strict";
                    s("html");
                    s(".touchspin").TouchSpin({
                            buttondown_class: "btn btn-primary btn-square",
                            buttonup_class: "btn btn-primary btn-square",
                            buttondown_txt: '<i class="fa fa-minus"></i>',
                            buttonup_txt: '<i class="fa fa-plus"></i>',
                        }),
                        s(".touchspin-vertical").TouchSpin({
                            verticalbuttons: !0,
                            verticalupclass: "fa fa-angle-up",
                            verticaldownclass: "fa fa-angle-down",
                            buttondown_class: "btn btn-primary btn-square",
                            buttonup_class: "btn btn-primary btn-square",
                        }),
                        s(".touchspin-stop-mousewheel").TouchSpin({
                            mousewheel: !1,
                            buttondown_class: "btn btn-primary btn-square",
                            buttonup_class: "btn btn-primary btn-square",
                            buttondown_txt: '<i class="fa fa-minus"></i>',
                            buttonup_txt: '<i class="fa fa-plus"></i>',
                        }),
                        s(".touchspin-color").each(function(t) {
                            var n = "btn btn-primary btn-square",
                                u = "btn btn-primary btn-square",
                                a = s(this);
                            a.data("bts-button-down-class") &&
                                (n = a.data("bts-button-down-class")),
                                a.data("bts-button-up-class") &&
                                (u = a.data("bts-button-up-class")),
                                a.TouchSpin({
                                    mousewheel: !1,
                                    buttondown_class: n,
                                    buttonup_class: u,
                                    buttondown_txt: '<i class="fa fa-minus"></i>',
                                    buttonup_txt: '<i class="fa fa-plus"></i>',
                                });
                        });
                })(window, document, jQuery);
            }


		$(document).ready(function() {

			var queryString = window.location.search;
			var urlParams = new URLSearchParams(queryString);
			var go_data_id = urlParams.get('data_id')

			var cities = @Json($city_encoded);
			var states = @Json($state_encoded);

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

			$('#projectTable').DataTable({
				processing: true,
				serverSide: true,
				ajax: {
					url: "{{ route('admin.projects') }}",
					data: function(d) {
						d.go_data_id = go_data_id;
					}
				},
				columns: [
					{
						data: 'select_checkbox',
						name: 'select_checkbox',
						orderable: false
					},
				{
						data: 'project_name',
						name: 'project_name'
					},
					{
						data: 'address',
						name: 'address'
					},
					{
						data: 'builder_id',
						name: 'builder_id'
					},
					{
						data: 'property_type',
						name: 'property_type'
					},
					{
						data: 'modified_at',
						name: 'modified_at'
					},
					{
						data: 'Actions',
						name: 'Actions',
						orderable: false
					},
				],
			});
		});

		$(document).on("click", ".open_modal_with_this", function(e) {
			$('#all_contacts').html('')
			$('#all_towers').html('')
			$('#all_unit_types').html('')
			$('#all_contacts').append(generate_contact_detail(makeid(10)));
			$('#all_towers').append(generate_tower_detail(makeid(10)));
			$("#all_towers select").each(function(index) {
				$(this).select2();
			})
			$('#all_unit_types').append(generate_unit_types_detail(makeid(10)));
			$("#all_unit_types select").each(function(index) {
				$(this).select2();
			})
			$('#all_images').html('');
			floatingField()
		})

		$(document).on('change', '.changeTheStatus', function(e) {
			stat = 0;
			if ($(this).prop('checked')) {
				stat = 1;
			}
			$.ajax({
				type: "POST",
				url: "{{ route('admin.changeProjectStatus') }}",
				data: {
					id: $(this).attr('data-id'),
					status: stat,
					_token: '{{ csrf_token() }}'
				},
				success: function(data) {

				}
			});
		})

		$(document).on('change', '[name=penthouse]', function(e) {

			if ($(this).prop('checked')) {
				unique_id = $(this).closest('div').attr('data-contact_id')
				$("[data-contact_id=" + unique_id + "] [name=terrace_carpet_area]").closest('.col-md-3').show()
				$("[data-contact_id=" + unique_id + "] [name=terrace_carpet_area_measurement]").closest('.col-md-3')
					.show()
				$("[data-contact_id=" + unique_id + "] [name=terrace_super_builtup_area]").closest('.col-md-3')
					.show()
				$("[data-contact_id=" + unique_id + "] [name=terrace_super_builtup_area_measurement]").closest(
					'.col-md-3').show()
			} else {
				$("[data-contact_id=" + unique_id + "] [name=terrace_carpet_area]").closest('.col-md-3').hide()
				$("[data-contact_id=" + unique_id + "] [name=terrace_carpet_area_measurement]").closest('.col-md-3')
					.hide()
				$("[data-contact_id=" + unique_id + "] [name=terrace_super_builtup_area]").closest('.col-md-3')
					.hide()
				$("[data-contact_id=" + unique_id + "] [name=terrace_super_builtup_area_measurement]").closest(
					'.col-md-3').hide()
			}
		})

		var allowedselect2s = ['builder_id'];
		$(document).on('keydown', '.select2-search__field', function(e) {
			setTimeout(() => {
				var par = $(this).closest('.select2-dropdown')
				var tar = $(par).find('.select2-results')
				var kar = $(tar).find('.select2-results__options')
				var opt = $(kar).find('li')
				if (opt.length == 1 && $(opt[0]).text() == 'No results found') {
					var idd = $(kar).attr('id')
					idd = idd.replace("select2-", "");
					idd = idd.replace("-results", "");
					if (allowedselect2s.includes(idd)) {
						$("#" + idd + " option[last_added='" + true + "']").each(function(i, e) {
							$('#' + idd + ' option[value="' + $(this).val() + '"]').detach();
						});
						if ($("#" + idd + " option[value='" + $(this).val() + "']").length == 0) {
							var newState = new Option($(this).val(), $(this).val(), true, true);

							vvvv = $.parseHTML('<option last_added="true" value="' + $(this).val() +
								'" selected="">' + $(this).val() + '</option>');
							$("#" + idd).append(vvvv).trigger('change');
						}
					}
				}else if ($(this).val() != '' && $(opt[0])[0] !== undefined && $($(opt[0])[0]).attr('id') != ''){
				var idd = $(kar).attr('id')
				idd = idd.replace("select2-", "");
				idd = idd.replace("-results", "");
				if (allowedselect2s.includes(idd)) {
					$("#"+idd+ " option[last_added='"+true+"']").each(function(i,e){
						$('#'+idd+' option[value="' + $(this).val() + '"]').detach();
					});
					if ($("#"+idd+ " option[value='"+$(this).val()+"']").length == 0) {
						var newState = new Option($(this).val(), $(this).val(), true, true);

						vvvv = $.parseHTML('<option last_added="true" value="'+$(this).val()+'" selected="">'+$(this).val()+'</option>');
						$("#"+idd).append(vvvv).trigger('change');
					}
				}
			}
			}, 50);
		})

		$(document).on('click', '#add_document_image', function(e) {
			var fd = new FormData();
			var files = $('#document_image')[0].files;
			if (files.length == 0 || $('#this_data_id').val() == '') {
				return;
			}
			fd.append('category', $('#image_category').val());
			fd.append('building_id', $('#this_data_id').val());
			for (let i = 0; i < files.length; i++) {
				fd.append('images[]', files[i]);
			}


			fd.append('_token', '{{ csrf_token() }}');
			$.ajax({
				url: "{{ route('admin.saveBuildingImages') }}",
				type: 'post',
				data: fd,
				contentType: false,
				processData: false,
				success: function(response) {
					$('#all_images').html('');
					$('#document_image').val('');
					if (response != '') {
						images = JSON.parse(response);
						for (let i = 0; i < images.length; i++) {
							var category = '';
							if (images[i].category == 1) {
								category = 'Building Elevation';
							} else if (images[i].category == 2) {
								category = 'Common Amenities Photos';
							} else if (images[i].category == 3) {
								category = 'Master Layout Of Building';
							} else if (images[i].category == 4) {
								category = 'Brochure';
							} else if (images[i].category == 5) {
								category = 'Cost Sheet';
							} else if (images[i].category == 6) {
								category = 'Other';
							}

							var src = building_image_show_url + '/' + images[i].image;
							if (src.includes('.pdf')) {
								$('#all_images').append(
									'<div class="col-md-4 m-b-4 mb-3"><a target="_blank" href="' +
									src +
									'"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a><p>' +
									category + '</p></div>')
							} else {
								$('#all_images').append('<div class="col-md-4 m-b-4 mb-3"><img src="' +
									src +
									'" alt="" height="200" width="200"><p>' + category +
									'</p></div>')
							}
						}
					}
				},
			});
		})

		$(document).on('change', '#select_all_checkbox', function(e) {
			if ($(this).prop('checked')) {
				$('.delete_table_row').show();

				$(".table_checkbox").each(function(index) {
					$(this).prop('checked',true)
				})
			}else{
				$('.delete_table_row').hide();
				$(".table_checkbox").each(function(index) {
					$(this).prop('checked',false)
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
			}else{
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
			if (rowss.length>0) {
				Swal.fire({
				title: "Are you sure?",
				icon: "warning",
				showCancelButton: true,
				confirmButtonText: 'Yes',
			}).then(function(isConfirm) {
				if (isConfirm.isConfirmed) {
					$.ajax({
						type: "POST",
						url: "{{ route('builder.deleteProject') }}",
						data: {
							allids: JSON.stringify(rowss),
							_token: '{{ csrf_token() }}'
						},
						success: function(data) {
							$('.delete_table_row').hide();
							$('#projectTable').DataTable().draw();
						}
					});
				}
			})
			}
		}



		var uploadField = document.getElementById("document_image");

		uploadField.onchange = function() {
			if (this.files[0].size > 2097152) {
				uploadField.value = '';
				Swal.fire({
					title: "Maximum file size limit is 2MB",
					icon: "warning",
				})
			};
		};

		function deleteProject(data) {
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
						url: "{{ route('builder.deleteProject') }}",
						data: {
							id: id,
							_token: '{{ csrf_token() }}'
						},
						success: function(data) {
							$('#projectTable').DataTable().draw();
						}
					});
				}
			})

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
			var myvar = '<div data-contact_id= ' + id + ' class="form-group col-md-4 m-b-20">' +
				'<label>Contact Person Name</label>'+
				'       <input class="form-control" name="contact_person_name" type="text"' +
				'            autocomplete="off">' +
				'     </div>' +
				'     <div data-contact_id= ' + id +
				' class="form-group col-md-3 m-b-20">' +
				'<label>Contact Person No.</label>'+
				'       <input class="form-control" name="contact_person_no"' +
				'           type="text"  autocomplete="off">' +
				'   </div>' +
				'     <div data-contact_id= ' + id +
				' class="form-group col-md-4 m-b-20">' +
				'<label>Contact Type</label>'+
				'       <input class="form-control" name="contact_person_type"' +
				'           type="text"  autocomplete="off">' +
				'   </div>' +
				'<div data-contact_id= ' + id +
				' class="form-group col-md-1 m-b-4 mb-3"><button data-contact_id=' + id +
				' class="remove_contacts btn btn-danger btn-air-danger" type="button">-</button>  </div>';
			return myvar;
		}

		$(document).on('click', '#add_contacts', function(e) {
			id = makeid(10);
			$('#all_contacts').append(generate_contact_detail(id));
			floatingField();
		})
		$(document).on('click', '.remove_contacts', function(e) {
			id = $(this).attr('data-contact_id');
			$("[data-contact_id=" + id + "]").each(function(index) {
				$(this).remove();
			});
		})

		$(document).on('change', '#area_id', function(e) {

			if ($(this).find(":selected").attr('data-state_id') !== undefined && $(this).find(":selected").attr(
					'data-state_id') != '') {
				$('#state_id').val($(this).find(":selected").attr('data-state_id')).trigger('change')
			}
			if ($(this).find(":selected").attr('data-city_id') !== undefined && $(this).find(":selected").attr(
					'data-city_id') != '') {
				$('#city_id').val($(this).find(":selected").attr('data-city_id')).trigger('change')
				$('#pincode').val($(this).find(":selected").attr('data-pincode')).trigger('change')
			}
		})

		function generate_tower_detail(id) {

		}

		function generate_unit_types_detail(id) {
			$("#unit_types_template div,#unit_types_template button").each(function(index) {
				$(this).attr('data-contact_id', id)
			});
			var str = $("#unit_types_template").html()
			$("#unit_types_template div,#unit_types_template button").each(function(index) {
				$(this).attr('data-contact_id', '')
			});
			return str;
		}

        add_wings();

        function add_wings() {
            id = makeid(10);
			$('#all_towers').append(generate_tower_detail(id));
			$("#all_towers select").each(function(index) {
				$(this).select2();
			})
			floatingField();
        }

		$(document).on('click', '#add_towers', function(e) {
			id = makeid(10);
			$('#all_towers').append(generate_tower_detail(id));
			$("#all_towers select").each(function(index) {
				$(this).select2();
			})
			floatingField();
		})
		$(document).on('click', '.remove_towers', function(e) {
			id = $(this).attr('data-contact_id');
			$("[data-contact_id=" + id + "]").each(function(index) {
				$(this).remove();
			});
		})

        add_initial_unit();

        function add_initial_unit() {
            id = makeid(10);
			$('#all_unit_types').append(generate_unit_types_detail(id));
			$("#all_unit_types select").each(function(index) {
				$(this).select2();
			})
			floatingField();
        }

		$(document).on('click', '#add_unit_types', function(e) {
			id = makeid(10);
			$('#all_unit_types').append(generate_unit_types_detail(id));
			$("#all_unit_types select").each(function(index) {
				$(this).select2();
			})
			floatingField();
		})
		$(document).on('click', '.remove_unit_types', function(e) {
			id = $(this).attr('data-contact_id');
			$("[data-contact_id=" + id + "]").each(function(index) {
				$(this).remove();
			});
		})

		$('#modal_form').validate({ // initialize the plugin
			rules: {
				project_name: {
					required: true,
				},
				pincode: {
					required: true,
					digits: true,
				},
				email: {
					email: true,
				},
				floor_count: {
					digits: true,
				},
				unit_no: {
					digits: true,
				},
				lift_count: {
					digits: true,
				},
			},
			submitHandler: function(form) { // for demo
				alert('valid form submitted'); // for demo
				return false; // for demo
			}
		});


		$(document).on('click', '#saveProject', function(e) {
			e.preventDefault();
			$("#modal_form").validate();
			if (!$("#modal_form").valid()) {
				return
			}
			$(this).prop('disabled', true);
			var amenities = []
			var contact_details = [];
			var tower_details = [];
			var unit_details = [];
			$(".project_amenity").each(function(index) {
				if ($(this).prop('checked')) {
					amenities.push(1);
				} else {
					amenities.push(0);
				}
			});
			amenities = JSON.stringify(amenities);

			$("#all_contacts [name=contact_person_name]").each(function(index) {
				cona_arr = []
				unique_id = $(this).parent().attr('data-contact_id');
				name = $(this).val();
				no = $("[data-contact_id=" + unique_id + "] input[name=contact_person_no]").val();
				typee = $("[data-contact_id=" + unique_id + "] input[name=contact_person_type]").val();
				cona_arr.push(name)
				cona_arr.push(no)
				cona_arr.push(typee)
				if (filtercona_arr(cona_arr)) {
					contact_details.push(cona_arr);
				}
			});
			contact_details = JSON.stringify(contact_details);

			$("#all_towers [name=tower_name]").each(function(index) {
				cona_arr = []
				unique_id = $(this).parent().attr('data-contact_id');
				name = $(this).val();
				tower_total_units = $("[data-contact_id=" + unique_id + "] [name=tower_total_units]")
					.val();
				total_floor = $("[data-contact_id=" + unique_id + "] [name=total_floor]").val();
				cona_arr.push(name);
				cona_arr.push(tower_total_units);
				cona_arr.push(total_floor);
				if (filtercona_arr(cona_arr)) {
					tower_details.push(cona_arr);
				}
			})

			tower_details = JSON.stringify(tower_details);

			$("#all_unit_types [name=type_plan_name]").each(function(index) {
				cona_arr = []
				unique_id = $(this).parent().attr('data-contact_id');
				type_plan_name = $(this).val();
				requirement_type = $("[data-contact_id=" + unique_id + "] [name=requirement_type]").val();
				configuration = $("[data-contact_id=" + unique_id + "] [name=configuration]").val();
				builtuparea = $("[data-contact_id=" + unique_id +
					"] [name=builtup_area]").val();
				builtup_area_measurement = $("[data-contact_id=" + unique_id +
					"] [name=builtup_area_measurement]").val();
				rera_area = $("[data-contact_id=" + unique_id + "] [name=rera_area]").val();
				rera_area_measurement = $("[data-contact_id=" + unique_id +
					"] [name=rera_area_measurement]").val();
				wash_area = $("[data-contact_id=" + unique_id + "] [name=wash_area]").val();
				wash_area_measurement = $("[data-contact_id=" + unique_id +
					"] [name=wash_area_measurement]").val();
				balcony_area = $("[data-contact_id=" + unique_id + "] [name=balcony_area]").val();
				balcony_area_measurement = $("[data-contact_id=" + unique_id +
					"] [name=balcony_area_measurement]").val();
				carpet_area = $("[data-contact_id=" + unique_id + "] [name=carpet_area]").val();
				carpet_area_measurement = $("[data-contact_id=" + unique_id +
					"] [name=carpet_area_measurement]").val();
				terrace_carpet_area = $("[data-contact_id=" + unique_id + "] [name=terrace_carpet_area]")
					.val();
				terrace_carpet_area_measurement = $("[data-contact_id=" + unique_id +
					"] [name=terrace_carpet_area_measurement]").val();
				terrace_super_builtup_area = $("[data-contact_id=" + unique_id +
					"] [name=terrace_super_builtup_area]").val();
				terrace_super_builtup_area_measurement = $("[data-contact_id=" + unique_id +
					"] [name=terrace_super_builtup_area_measurement]").val();

				cona_arr.push(type_plan_name)
				cona_arr.push(requirement_type)
				cona_arr.push(configuration)
				cona_arr.push(builtuparea)
				cona_arr.push(builtup_area_measurement)
				cona_arr.push(rera_area)
				cona_arr.push(rera_area_measurement)
				cona_arr.push(wash_area)
				cona_arr.push(wash_area_measurement)
				cona_arr.push(balcony_area)
				cona_arr.push(balcony_area_measurement)
				cona_arr.push(carpet_area)
				cona_arr.push(carpet_area_measurement)
				cona_arr.push(terrace_carpet_area)
				cona_arr.push(terrace_carpet_area_measurement)
				cona_arr.push(terrace_super_builtup_area)
				cona_arr.push(terrace_super_builtup_area_measurement)
				if (filtercona_arr(cona_arr)) {
					unit_details.push(cona_arr);
				}
			});
			unit_details = JSON.stringify(unit_details);

			var id = $('#this_data_id').val()
			$.ajax({
				type: "POST",
				url: "{{ route('builder.saveProject') }}",
				data: {
					id: id,
					project_name: $('#project_name').val(),
					builder_id: $('#builder_id').val(),
					area_id: $('#area_id').val(),
					state_id: $('#state_id').val(),
					city_id: $('#city_id').val(),
					address: $('#address').val(),
					pincode: $('#pincode').val(),
					status: Number($('#status').prop('checked')),
					email: $('#email').val(),
					floor_count: $('#floor_count').val(),
					unit_no: $('#unit_no').val(),
					lift_count: $('#lift_count').val(),
					property_type: JSON.stringify($('#property_type').val()),
					project_description: $('#project_description').val(),
					contact_details: contact_details,
					amenities: amenities,
					tower_details: tower_details,
					unit_details: unit_details,
					building_posession: $('#building_posession').val(),
					is_prime: Number($('#prime_project').prop('checked')),
					restrictions: $('#restrictions').val(),
					project_status: $('#project_status').val(),
					building_quality: $('#building_quality').val(),
					_token: '{{ csrf_token() }}'
				},
				success: function(data) {
					var redirect_url = "{{route('builder.projects')}}";
                    window.location.href = redirect_url;
				}
			});
		})

		function floatingField(){
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
		}

		function setProjectStatusInput(value) {
			let input_div = document.getElementById('project_status_input');

			if(value.value !== '') {

                if(value.value != 142) {
                    input_div.innerHTML = `<div class="fname" :class="project_status_question == '' ? '' : 'focused' ">
					<label>Possession Month & Year</label>
                        <div class="fvalue">
                            <input class="form-control" x-model="project_status_question" name="projectStatusInput" type="text" autocomplete="off" :class="errors.hasOwnProperty('project_status_question') ? 'is-invalid' : ''">
                            <div class="invalid-feedback">
                                <span x-text="errors.project_status_question"></span>
                            </div>
                        </div>
                    </div>`;
                } else {
                    input_div.innerHTML = `<div class="form-group col-md-6 m-b-4 mb-3">
                        <select class="form-select" name="status" id="status">
                            <option value="">Age Of Property</option>
                            <option value="0 To 1 Years">0 To 1 Years</option>
                            <option value="1 To 5 Years">1 To 5 Years</option>
                            <option value="5 To 10 Years">5 To 10 Years</option>
                            <option value="10+ Years">10+ Years</option>
                        </select>
                    </div>`;

                    $('#status').select2();
                }

			} else {
				input_div.innerHTML = '';
			}
		}

		showReleventCategory();

		function showReleventCategory(params) {

			var parent_val = $('input[name=property_type]:checked').val();
			$("[name='property_category']").each(function(i, e) {
				if ($(this).attr('data-Parent_id') == parent_val) {
					$(this).parent().show();
				} else {
					$(this).parent().hide();
				}
			});
		}

		function setIndividualfields() {
			hidefields = ['the_constructed_carpet_area', 'the_constructed_salable_area', 'the_constructed_builtup_area',
				'the_salable_plot_area', 'the_carpet_plot_area', 'the_centre_height', 'the_salable_area',
				'the_length_of_plot', 'the_width_of_plot', 'the_carpet_area', 'the_opening_width',
				'the_ceilling_height', 'the_builtup_area', 'the_plot_area', 'the_terrace_area', 'the_construction_area',
				'the_terrace_carpet_area', 'the_terrace_salable_area', 'the_total_units_in_project',
				'the_total_no_of_floor', 'the_total_units_in_tower', 'the_property_on_floors', 'the_no_of_elavators',
				'the_total_no_of_units', 'the_no_of_room', 'the_no_of_bathrooms',
				'the_no_of_balcony', 'the_no_of_floors_allowed', 'the_no_of_side_open', 'the_servent_room',
				'the_service_elavator', 'the_two_wheller_Parking', 'the_constructed_plot_price', 'the_1rk',
				'the_source_refrence', 'the_pre_leased_remarks', 'div_available_from'
			]
			for (let i = 0; i < hidefields.length; i++) {
				$('.' + hidefields[i]).hide();
			}
		}

		function resetallfields() {
                hidefields = ['div_office_type', 'div_vila_type', 'div_retail_type', 'div_flat_type', 'div_plot_type', 'div_storage_type',
                    'div_property_address', 'div_flat_details', 'div_flat_details_2', 'div_flat_details_3',
                    'div_description_section', 'div_survey_details', 'div_tp_details',
                    'div_document_section', 'div_office_setup', 'div_road_width',
                    'div_washroom_type_1', 'div_conference_room', 'div_reception_area', 'div_pantry_type',
                    'div_availability_status', 'div_age_of_property', 'div_Possession_by', 'div_shop_facade_size',
                    'div_floor_allowed_for_construction', 'div_borewell', 'div_property_dimensions', 'div_washroom_type_2',
                    'div_flat_details_4', 'div_flat_details_5', 'div_other_details',
                    'div_flat_details_7', 'div_flat_details_8', 'div_plot_ind_common',
                    'div_area_size_details', 'div_area_size_details_land_plot', 'div_flat_details_vila',
                    'div_checkboxes1', 'div_extra_retail_details', 'div_property_source', 'div_office_furnished',
                    'div_care_taker', 'div_furnished_items', 'div_furnished_items_2', 'the_furnished_status',
                    'div_construction_allowed_for', 'div_retail_furnished', 'div_amenities', 'div_amenities_checks'
                ]
                for (let i = 0; i < hidefields.length; i++) {
                    $('.' + hidefields[i]).hide();
                }

            }

		$(document).on('change', '[name="property_type"]', function(e) {
			$('input[name=property_category]:checked').prop('checked', false).trigger('change')
			setIndividualfields();
			showReleventCategory();
		})

		function addAddAreaButtons(arr, arr2) {
                for (let i = 0; i < arr.length; i++) {
                    if($("#add_area_button_container .add_other_area_details[data-val='"+arr[i]+"']").length==0){
						var str =
							'<div  class="form-group col-md-auto  mb-3"> <a class="add_other_area_details" style="color:#0078DB!important" href="javascript:void(0)" data-val="' +
							arr[i] + '" > + ' + arr2[i] + '</a> </div>';
						$('#add_area_button_container').append(str);
					}

                }
            }

		resetallfields();


		function generate_unit_detail(id, plus = 0) {
                var myvar = '<div class="row"><div  data-unit_id= ' +
                    id + ' class="form-group the_wing col-md-2 m-b-20">' +
                    '<label>Wing</label>' +
                    '            <input class="form-control" name="wing" ' +
                    '                type="text"  autocomplete="off">' +
                    '        </div>' +
                    '<div  data-unit_id= ' + id + ' class="form-group col-md-2 m-b-20">' +
                    '<label>Unit No</label>' +
                    '            <input class="form-control" name="unit_unit_no" ' +
                    '                type="text"  autocomplete="off">' +
                    '        </div>' +
                    '        <div  data-unit_id= ' + id + ' class="form-group col-md-2 m-b-4 mb-3">' +
                    '            <select class="form-select" name="unit_status" id="unit_status">' +
                    '                <option value="">Unit Status</option>' +
                    '                <option value="Available">Available</option>' +
                    '                <option value="Rent Out">Rent Out</option>' +
                    '                <option value="Sold Out">Sold Out</option>' +
                    '            </select>' +
                    '        </div>' +
                    '<div  data-unit_id= ' + id + ' class="the_price_rent form-group col-md-2 m-b-20">' +
                    '<label>Price Rent</label>' +
                    '            <input class="form-control indian_currency_amount" name="price_rent" ' +
                    '                type="text"  autocomplete="off">' +
                    '        </div>' +
                    '<div  data-unit_id= ' + id + ' class="the_price form-group col-md-2 m-b-20">' +
                    '<label>Price</label>' +
                    '            <input class="form-control indian_currency_amount" name="price" ' +
                    '                type="text"  autocomplete="off">' +
                    '        </div>' +
                    '<div class="the_constructed_plot_price row"><div  data-unit_id= ' + id +
                    ' class=" form-group col-md-2 m-b-20">' +
                    '<label class="price_constructed_label"> Construction Price</label>' +
                    '            <input class="form-control indian_currency_amount" data-unit_id= ' + id +
                    ' name="price_constructed" ' +
                    '                type="text"  autocomplete="off">' +
                    '        </div>' +
                    '<div  data-unit_id= ' + id + ' class="col-md-2 m-b-20">' +
                    '<div class=" form-group">' +
                    '<label class="price_plot_label"> Plot Price</label>' +
                    '            <input class="form-control indian_currency_amount" data-unit_id= ' + id +
                    ' name="price_plot" ' +
                    '                type="text"  autocomplete="off">' +
                    '        </div>'+

                    '</div>'+
                    '<div  data-unit_id= ' + id + ' class=" form-group col-md-2 m-b-20">' +
                    '<div class=" form-group">' +
                    '<label>Price</label>' +
                    '            <input class="form-control indian_currency_amount" data-unit_id= ' + id +
                    ' name="price_total" ' +
                    '                type="text"  autocomplete="off">' +
                    '        </div>'+
                    '<small style="display:none"  class="text-secondary ps-1 converted_value"></small>'+
                    '</div></div>' +
                    '        <div  data-unit_id= ' + id + ' class="the_furnished_status form-group col-md-3 m-b-4 mb-3">' +
                    '            <select class="form-select" name="furnished_status" id="furnished_status">' +
                    '                <option value="">Furnished Status</option>' +
                    @forelse ($property_configuration_settings as $props)
                        @if ($props['dropdown_for'] == 'property_furniture_type')
                            '                <option data-val="{{ $props['name'] }}" value="{{ $props['id'] }}">{{ $props['name'] }}</option>' +
                        @endif
                    @empty
                    @endforelse

                '            </select>' +
                '        </div>' +
				'<div data-unit_id= ' + id +
                    ' class="form-group col-md-1 m-b-4 mb-3"><button data-unit_id=' + id +
                    ' class="' + ((plus) ? "add_units" : "remove_units") + ' btn btn-danger btn-air-danger" type="button">' + ((
                        plus) ? "+" : "-") + '</button>  </div>'+
                '</div>';
                return myvar;
            }
		
			function generate_furnished_detail(id) {
                var currentFurnished = $('input[name=property_category]:checked').attr('data-val')
                if ($('input[name=property_category]:checked').attr('data-val') == 'Office') {
                    $("#office_furnished_template div,#office_furnished_template button,#office_furnished_template input").each(
                        function(index) {
                            $(this).attr('data-unit_id', id)
                        });
                    var str = $("#office_furnished_template").html()
                    $("#office_furnished_template div,#office_furnished_template button,#office_furnished_template input").each(
                        function(index) {
                            $(this).attr('data-unit_id', '')
                        });
                } else if ($('input[name=property_category]:checked').attr('data-val') == 'Retail') {
                    $("#retail_furnished_template div,#retail_furnished_template button,#retail_furnished_template input").each(
                        function(index) {
                            $(this).attr('data-unit_id', id)
                        });
                    var str = $("#retail_furnished_template").html()
                    $("#retail_furnished_template div,#retail_furnished_template button,#retail_furnished_template input").each(
                        function(index) {
                            $(this).attr('data-unit_id', '')
                        });
                } else if (currentFurnished != 'Storage/industrial' && currentFurnished != 'Plot') {
                    $("#furnished_types_template div,#furnished_types_template button,#furnished_types_template input").each(
                        function(index) {
                            $(this).attr('data-unit_id', id)
                        });
                    var str = $("#furnished_types_template").html()
                    $("#furnished_types_template div,#furnished_types_template button,#furnished_types_template input").each(
                        function(index) {
                            $(this).attr('data-unit_id', '')
                        });
                }
                return str;
            }
		
			function setFurnishedStatus(TheStatus, id) {
                $('.div_retail_furnished[data-unit_id="' + id + '"]').hide()
                $('.div_office_furnished[data-unit_id="' + id + '"]').hide()
                $('.div_furnished_items[data-unit_id="' + id + '"]').hide()
                $('.div_furnished_items_2[data-unit_id="' + id + '"]').hide()

                if (TheStatus == 'Unfurnished' || TheStatus == '' || TheStatus == undefined) {
                    return;
                }
                if ($('input[name=property_category]:checked').attr('data-val') == 'Retail') {
                    $('.div_retail_furnished[data-unit_id="' + id + '"]').show()
                } else if ($('input[name=property_category]:checked').attr('data-val') == 'Office') {
                    $('.div_office_furnished[data-unit_id="' + id + '"]').show()
                } else {
                    $('.div_furnished_items[data-unit_id="' + id + '"]').show()
                    $('.div_furnished_items_2[data-unit_id="' + id + '"]').show()

                }
            }

		function generate_contact_detail_click(plus = 0) {
                id = makeid(10);
                $('#all_owner_contacts').append(generate_contact_detail(id, plus));
                $("#all_owner_contacts select").each(function(index) {
                    $(this).select2();
                })
                floatingField();
            }

			function generate_unit_detail_click(plus = 0) {
                id = makeid(10);
                $('#all_units').append(generate_unit_detail(id, plus));
                $('#all_units').append(generate_furnished_detail(id));
                setFurnishedStatus('', id);
                $("#all_units .touchspin25").each(function(index) {
                    $(this).addClass('touchspin')
                    $(this).removeClass('touchspin25')
                });
                $("#all_units .remained").each(function(index) {
                    if ($(this).is('input')) {
                        $(this).attr('id', $(this).attr('id') + id)
                        $(this).removeClass('remained')
                    }
                    if ($(this).is('label')) {
                        $(this).attr('for', $(this).attr('for') + id)
                        $(this).removeClass('remained')
                    }
                });
                enableTouchspin();
                $("#all_units select").each(function(index) {
                    $(this).select2();
                })
                setSellRentBoth();
                floatingField();
            }

			function setSellRentBoth() {
                var theFor = $('input[name=property_for]:checked').val()
                if (theFor == 'Rent') {
                    $('.the_price_rent').show()
                    $('.the_price').hide()
                } else if (theFor == 'Sell') {
                    $('.the_price_rent').hide()
                    $('.the_price').show()
                } else {
                    $('.the_price_rent').show()
                    $('.the_price').show()
                }
                $('.the_constructed_plot_price').hide()
                var theFor2 = $('input[name=property_category]:checked').attr('data-val')
                if ((theFor2 == 'Vila/Bunglow') && (theFor == 'Sell' || theFor == 'Both')) {
                    $('.the_constructed_plot_price').show()
                    $('.the_price').hide()
                }
                if (theFor2 == 'Penthouse' && (theFor == 'Sell' || theFor == 'Both')) {
                    $(".price_constructed_label").each(function(i, e) {
                        $(this).html('Flat Price')
                    });
                    $(".price_plot_label").each(function(i, e) {
                        $(this).html('Terrace Price')
                    });
                    $('.the_constructed_plot_price').show()
                    $('.the_price').hide()
                }
                if (theFor2 == 'Farmhouse' && (theFor == 'Sell' || theFor == 'Both')) {
                    $('.the_constructed_plot_price').show()
                    $('.the_price').hide()
                }
                if (theFor2 == 'Storage/industrial' && (theFor == 'Sell' || theFor == 'Both')) {
                    $('.the_constructed_plot_price').show()
                    $('.the_price').hide()
                }
                if (theFor2 == 'Plot' || theFor2 == 'Storage/industrial') {
                    $('.the_furnished_status').hide();
                }
                if (theFor2 == 'Vila/Bunglow' || theFor2 == 'Plot' || theFor2 == 'Farmhouse') {
                    $('.the_wing').hide();
                }
            }

        addInitialTower();

        function addInitialTower(){
            let category_type = 'Office';

            resetallfields();
                setIndividualfields();
                $('#all_units').html('')
                $('#all_owner_contacts').html('')
                $('#add_area_button_container').html('')
                $(".cl-locality").hide();
                if (category_type == 'Flat') {
                    showfields = ['div_flat_type', 'div_flat_details_2', 'div_area_size_details', 'the_builtup_area', ,
                        'the_salable_area', 'div_flat_details', 'the_no_of_bathrooms',
                        'the_no_of_elavators', 'the_property_on_floors', 'the_total_units_in_tower',
                        'the_total_units_in_project', 'the_servent_room', 'the_service_elavator',
                        'div_flat_details_5', 'div_flat_details_4', 'div_property_source', 'the_total_no_of_floor',
                        'the_two_wheller_Parking', 'div_checkboxes1', 'div_flat_details_7', 'div_flat_details_8',
                        'div_care_taker', 'div_availability_status', 'the_furnished_status', 'the_1rk',
                        'div_amenities','cl-locality','terrace',
                    ];
                    addAddAreaButtons(['the_carpet_area'], ['Add Carpet Area']);
                } else if (category_type == 'Vila/Bunglow') {
                    showfields = ['div_flat_details_2', 'div_vila_type', 'div_area_size_details',
                        'the_constructed_salable_area', 'the_salable_plot_area',
                        'div_flat_details', 'the_no_of_bathrooms', 'the_no_of_balcony',
                        'the_total_no_of_units', 'the_no_of_side_open', 'the_no_of_room', 'the_servent_room',
                        'div_flat_details_5', 'div_flat_details_4', 'div_property_source', 'div_checkboxes1',
                        'div_flat_details_7', 'div_flat_details_8', 'div_care_taker', 'div_availability_status',
                        'div_furnished_items', 'div_furnished_items_2',
                        'the_furnished_status', 'div_amenities','cl-locality',
                    ];
                    addAddAreaButtons(['the_carpet_plot_area', 'the_constructed_carpet_area',
                        'the_constructed_builtup_area'
                    ], ['Add Carpet Plot Area', 'Add Constructed Carpet Area', 'Add Constructed Builtup Area']);
                } else if (category_type == 'Plot') {
                    showfields = ['div_flat_details_2', 'div_area_size_details', 'the_salable_area',
                        'div_flat_details', 'the_total_no_of_units', 'the_no_of_side_open', 'the_length_of_plot',
                        'the_width_of_plot', 'the_no_of_floors_allowed', 'div_flat_details_5', ,
                        'div_property_source','div_property_address' ,'div_checkboxes1', 'div_flat_details_7',
                        'div_flat_details_8','div_extra_land_details',
                    ];
                   // $('.div_extra_land_details').show()
                    addAddAreaButtons(['the_carpet_plot_area'], ['Add Carpet Plot Area']);
                } else if (category_type == 'Penthouse') {
                    showfields = ['div_flat_type', 'div_flat_details_2', 'div_area_size_details',
                        'the_salable_area', 'the_terrace_salable_area', 'div_flat_details',
                        'the_no_of_bathrooms',
                        'the_no_of_elavators', 'the_property_on_floors', 'the_total_units_in_tower',
                        'the_total_units_in_project', 'the_servent_room', 'the_service_elavator',
                        'div_flat_details_5', 'div_flat_details_4', 'div_property_source',
                        'the_two_wheller_Parking', 'div_checkboxes1', 'div_flat_details_7', 'div_flat_details_8',
                        'div_care_taker',
                        'div_availability_status', 'div_amenities',
                        'the_furnished_status', 'the_total_no_of_floor', 'the_no_of_balcony','cl-locality',
                    ];
                    addAddAreaButtons(['the_carpet_area', 'the_builtup_area', 'the_terrace_carpet_area'], [
                        'Add Carpet Area', 'Add Builtup Area', 'Add Terrace Carpet Area'
                    ]);
                } else if (category_type == 'Farmhouse') {
                    showfields = ['div_flat_details_2', 'div_area_size_details', , 'the_constructed_salable_area',
                        'the_salable_plot_area', 'div_flat_details', 'the_no_of_bathrooms',
                        'the_total_no_of_units', 'the_servent_room', 'div_property_address',
                        'div_flat_details_5', 'div_flat_details_4', 'div_property_source',
                        'div_checkboxes1', 'div_flat_details_7', 'div_flat_details_8', 'div_care_taker',
                        'div_availability_status', 'div_amenities',
                        'the_furnished_status', 'the_no_of_balcony', 'the_no_of_room', 'the_no_of_side_open','div_extra_land_details'
                    ];
                    addAddAreaButtons(['the_constructed_carpet_area', 'the_constructed_builtup_area',
                        'the_carpet_plot_area'
                    ], ['Add Constructed Carpet Area', 'Add Constructed Builtup Area', 'Add Carpet plot Area']);
                } else if (category_type == 'Office') {
                    showfields = ['div_office_type', 'div_flat_details_2', 'div_area_size_details',
                        'the_salable_area', 'div_flat_details', 'the_property_on_floors',
                        'the_total_units_in_project', 'the_total_no_of_floor', 'the_total_units_in_tower',
                        'div_flat_details_5', 'div_flat_details_4', 'div_property_source', 'the_no_of_elavators',
                        'div_checkboxes1', 'div_flat_details_7', 'div_flat_details_8', 'div_care_taker',
                        'div_availability_status', 'div_office_furnished', 'the_service_elavator',
                        'div_washroom_type_2',
                        'the_furnished_status','cl-locality','the_two_wheller_Parking',
                    ];
                    addAddAreaButtons(['the_carpet_area'], ['Add Carpet Area']);
                } else if (category_type == 'Retail') {
                    showfields = ['div_retail_type', 'div_flat_details_2', 'div_area_size_details',
                        'the_total_units_in_project', 'the_salable_area', 'the_opening_width',
                        'the_ceilling_height', 'div_flat_details', 'the_total_no_of_floor',
                        'the_total_units_in_tower', 'div_flat_details_5', 'div_flat_details_4',
                        'div_property_source', 'the_no_of_elavators', 'div_checkboxes1', 'div_flat_details_7',
                        'div_flat_details_8', 'div_care_taker', 'the_service_elavator',
                        'div_availability_status', 'div_washroom_type_2',
                        'the_furnished_status', 'the_two_wheller_Parking', 'div_extra_retail_details','cl-locality',
                    ];
                    addAddAreaButtons(['the_carpet_area'], ['Add Carpet Area']);
                } else if (category_type == 'Storage/industrial') {
                    showfields = ['div_storage_type', 'div_flat_details_2', 'div_area_size_details',
                        'the_salable_plot_area', 'the_constructed_salable_area',
                        'the_centre_height', 'div_flat_details', 'div_flat_details_5', 'div_flat_details_4',
                        'div_property_source', 'div_checkboxes1', 'div_flat_details_7',
                        'div_flat_details_8', 'div_other_details',
                        'div_availability_status',
                        'the_furnished_status', 'the_two_wheller_Parking', 'div_road_width','cl-locality','div_care_taker'
                    ];
                    addAddAreaButtons(['the_carpet_plot_area', 'the_constructed_carpet_area'], ['Add Carpet plot Area',
                        'Add Constructed Carpet Area'
                    ]);
                } else if (category_type == 'Plot/Land') {
                    showfields = ['div_plot_type', 'div_flat_details', 'div_flat_details_2', 'div_property_address',
                        'div_area_size_details', 'div_borewell',
                        'the_length_of_plot', 'the_width_of_plot', 'div_flat_details_5',
                        'the_no_of_floors_allowed',
                        'div_property_source', 'div_checkboxes1', 'div_construction_allowed_for', 'div_tp_details',
                        'div_flat_details_8', 'div_plot_ind_common', 'div_survey_details', 'div_road_width',
                        'div_document_section',
                    ];
                }
                for (let i = 0; i < showfields.length; i++) {
                    $('.' + showfields[i]).show();
                }
                var id = '{{ isset($current_id) ? $current_id : '' }}';

                if (id == '') {
                    generate_contact_detail_click(1)
                    generate_unit_detail_click(1);
                }
        }

		$(document).on('change', '[name="property_category"]', function(e) {
                var category_type = $(this).attr('data-val');
                resetallfields();
                setIndividualfields();
                $('#all_units').html('')
                $('#all_owner_contacts').html('')
                $('#add_area_button_container').html('')
                $(".cl-locality").hide();
                if (category_type == 'Flat') {
                    showfields = ['div_flat_type', 'div_flat_details_2', 'div_area_size_details', 'the_builtup_area', ,
                        'the_salable_area', 'div_flat_details', 'the_no_of_bathrooms',
                        'the_no_of_elavators', 'the_property_on_floors', 'the_total_units_in_tower',
                        'the_total_units_in_project', 'the_servent_room', 'the_service_elavator',
                        'div_flat_details_5', 'div_flat_details_4', 'div_property_source', 'the_total_no_of_floor',
                        'the_two_wheller_Parking', 'div_checkboxes1', 'div_flat_details_7', 'div_flat_details_8',
                        'div_care_taker', 'div_availability_status', 'the_furnished_status', 'the_1rk',
                        'div_amenities','cl-locality','terrace',
                    ];
                    addAddAreaButtons(['the_carpet_area'], ['Add Carpet Area']);
                } else if (category_type == 'Vila/Bunglow') {
                    showfields = ['div_flat_details_2', 'div_vila_type', 'div_area_size_details',
                        'the_constructed_salable_area', 'the_salable_plot_area',
                        'div_flat_details', 'the_no_of_bathrooms', 'the_no_of_balcony',
                        'the_total_no_of_units', 'the_no_of_side_open', 'the_no_of_room', 'the_servent_room',
                        'div_flat_details_5', 'div_flat_details_4', 'div_property_source', 'div_checkboxes1',
                        'div_flat_details_7', 'div_flat_details_8', 'div_care_taker', 'div_availability_status',
                        'div_furnished_items', 'div_furnished_items_2',
                        'the_furnished_status', 'div_amenities','cl-locality',
                    ];
                    addAddAreaButtons(['the_carpet_plot_area', 'the_constructed_carpet_area',
                        'the_constructed_builtup_area'
                    ], ['Add Carpet Plot Area', 'Add Constructed Carpet Area', 'Add Constructed Builtup Area']);
                } else if (category_type == 'Plot') {
                    showfields = ['div_flat_details_2', 'div_plot_type', 'div_area_size_details', 'the_salable_area',
                        'div_flat_details', 'the_total_no_of_units', 'the_no_of_side_open', 'the_length_of_plot',
                        'the_width_of_plot', 'the_no_of_floors_allowed', 'div_flat_details_5', ,
                        'div_property_source','div_property_address' ,'div_checkboxes1', 'div_flat_details_7',
                        'div_flat_details_8','div_extra_land_details',
                    ];
                   // $('.div_extra_land_details').show()
                    addAddAreaButtons(['the_carpet_plot_area'], ['Add Carpet Plot Area']);
                } else if (category_type == 'Penthouse') {
                    showfields = ['div_flat_type', 'div_flat_details_2', 'div_area_size_details',
                        'the_salable_area', 'the_terrace_salable_area', 'div_flat_details',
                        'the_no_of_bathrooms',
                        'the_no_of_elavators', 'the_property_on_floors', 'the_total_units_in_tower',
                        'the_total_units_in_project', 'the_servent_room', 'the_service_elavator',
                        'div_flat_details_5', 'div_flat_details_4', 'div_property_source',
                        'the_two_wheller_Parking', 'div_checkboxes1', 'div_flat_details_7', 'div_flat_details_8',
                        'div_care_taker',
                        'div_availability_status', 'div_amenities',
                        'the_furnished_status', 'the_total_no_of_floor', 'the_no_of_balcony','cl-locality',
                    ];
                    addAddAreaButtons(['the_carpet_area', 'the_builtup_area', 'the_terrace_carpet_area'], [
                        'Add Carpet Area', 'Add Builtup Area', 'Add Terrace Carpet Area'
                    ]);
                } else if (category_type == 'Farmhouse') {
                    showfields = ['div_flat_details_2', 'div_area_size_details', , 'the_constructed_salable_area',
                        'the_salable_plot_area', 'div_flat_details', 'the_no_of_bathrooms',
                        'the_total_no_of_units', 'the_servent_room', 'div_property_address',
                        'div_flat_details_5', 'div_flat_details_4', 'div_property_source',
                        'div_checkboxes1', 'div_flat_details_7', 'div_flat_details_8', 'div_care_taker',
                        'div_availability_status', 'div_amenities',
                        'the_furnished_status', 'the_no_of_balcony', 'the_no_of_room', 'the_no_of_side_open','div_extra_land_details'
                    ];
                    addAddAreaButtons(['the_constructed_carpet_area', 'the_constructed_builtup_area',
                        'the_carpet_plot_area'
                    ], ['Add Constructed Carpet Area', 'Add Constructed Builtup Area', 'Add Carpet plot Area']);
                } else if (category_type == 'Office') {
                    showfields = ['div_office_type', 'div_flat_details_2', 'div_area_size_details',
                        'the_salable_area', 'div_flat_details', 'the_property_on_floors',
                        'the_total_units_in_project', 'the_total_no_of_floor', 'the_total_units_in_tower',
                        'div_flat_details_5', 'div_flat_details_4', 'div_property_source', 'the_no_of_elavators',
                        'div_checkboxes1', 'div_flat_details_7', 'div_flat_details_8', 'div_care_taker',
                        'div_availability_status', 'div_office_furnished', 'the_service_elavator',
                        'div_washroom_type_2',
                        'the_furnished_status','cl-locality','the_two_wheller_Parking',
                    ];
                    addAddAreaButtons(['the_carpet_area'], ['Add Carpet Area']);
                } else if (category_type == 'Retail') {
                    showfields = ['div_retail_type', 'div_flat_details_2', 'div_area_size_details',
                        'the_total_units_in_project', 'the_salable_area', 'the_opening_width',
                        'the_ceilling_height', 'div_flat_details', 'the_total_no_of_floor',
                        'the_total_units_in_tower', 'div_flat_details_5', 'div_flat_details_4',
                        'div_property_source', 'the_no_of_elavators', 'div_checkboxes1', 'div_flat_details_7',
                        'div_flat_details_8', 'div_care_taker', 'the_service_elavator',
                        'div_availability_status', 'div_washroom_type_2',
                        'the_furnished_status', 'the_two_wheller_Parking', 'div_extra_retail_details','cl-locality',
                    ];
                    addAddAreaButtons(['the_carpet_area'], ['Add Carpet Area']);
                } else if (category_type == 'Storage/industrial') {
                    showfields = ['div_storage_type', 'div_flat_details_2', 'div_area_size_details',
                        'the_salable_plot_area', 'the_constructed_salable_area',
                        'the_centre_height', 'div_flat_details', 'div_flat_details_5', 'div_flat_details_4',
                        'div_property_source', 'div_checkboxes1', 'div_flat_details_7',
                        'div_flat_details_8', 'div_other_details',
                        'div_availability_status',
                        'the_furnished_status', 'the_two_wheller_Parking', 'div_road_width','cl-locality','div_care_taker'
                    ];
                    addAddAreaButtons(['the_carpet_plot_area', 'the_constructed_carpet_area'], ['Add Carpet plot Area',
                        'Add Constructed Carpet Area'
                    ]);
                } else if (category_type == 'Plot/Land') {
                    showfields = ['div_plot_type', 'div_flat_details', 'div_flat_details_2', 'div_property_address',
                        'div_area_size_details', 'div_borewell',
                        'the_length_of_plot', 'the_width_of_plot', 'div_flat_details_5',
                        'the_no_of_floors_allowed',
                        'div_property_source', 'div_checkboxes1', 'div_construction_allowed_for', 'div_tp_details',
                        'div_flat_details_8', 'div_plot_ind_common', 'div_survey_details', 'div_road_width',
                        'div_document_section',
                    ];
                }
                for (let i = 0; i < showfields.length; i++) {
                    $('.' + showfields[i]).show();
                }
                var id = '{{ isset($current_id) ? $current_id : '' }}';

                if (id == '') {
                    generate_contact_detail_click(1)
                    generate_unit_detail_click(1);
                }
            })

	</script>
@endpush
