<form class="form-bookmark needs-validation modal_form" method="post" id="modal_form" novalidate="">
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
                    @forelse ($property_configuration_settings as $props)
                        @if ($props['dropdown_for'] == 'property_construction_type' && in_array($props['id'],$prop_type))
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
                    @forelse ($property_configuration_settings as $props)
                        @if ($props['dropdown_for'] == 'property_specific_type' && in_array($props['parent_id'],$prop_type))
                            <option data-parent_id="{{ $props['parent_id'] }}"
                                value="{{ $props['id'] }}">{{ $props['name'] }}
                            </option>
                        @endif
                    @empty
                    @endforelse
                </select>
            </div>
            <div class="form-group col-md-1 ps-0 m-b-20">
                <label for="Wing">Wing</label>
                <input class="form-control" name="property_wing" id="property_wing"
                    type="text" autocomplete="off" >
            </div>
            <div class="form-group col-md-1 ps-0 m-b-20">
                <label for="Unit No">Unit No</label>
                <input class="form-control" name="property_unit_no" id="property_unit_no"
                    type="text" autocomplete="off" >
            </div>
            <div class="form-group col-md-2 m-b-4 mb-4">
                <select class="form-select" name="building_id" id="building_id">
                    <option value="">Project</option>
                    @foreach ($projects as $building)
                        <option data-addr="{{ $building->address }}" value="{{ $building->id }}">
                            {{ $building->project_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3 m-b-4 mb-3">
                <label for="Building Addresss">Building Address</label>
                <input class="form-control" type="text" value=""
                    name="show_building_address" id="show_building_address" disabled>
            </div>
            <div class="form-group col-md-2 m-b-20">
                <select class="form-select" id="configuration">
                    <option value="">Configuration</option>
                    @forelse ($property_configuration_settings as $props)
                        @if ($props['dropdown_for'] == 'property_plan_type' && in_array($props['parent_id'],$prop_type))
                            <option data-parent_id="{{ $props['parent_id'] }}"
                                value="{{ $props['id'] }}">{{ $props['name'] }}
                            </option>
                        @endif
                    @empty
                    @endforelse
                </select>
            </div>
            <div class="form-group col-md-2 m-b-20">
                <select class="form-select" id="property_status">
                    <option value=""> Status</option>
                    <option value="Active">Active</option>
                    <option value="InActive">InActive</option>
                </select>
            </div>
            <div class="col-md-3">
                <div class="input-group">
                    <div class="form-group col-md-7 m-b-20">
                        <label for="Carpet Area">Carpet Area</label>
                        <input class="form-control" name="carpet_area" id="carpet_area"
                            type="text" autocomplete="off" >
                    </div>
                    <div class="input-group-append col-md-5 m-b-20">
                        <div class="form-group form_measurement">
                            <select class="form-select measure_select" id="carpet_measurement">
                                @forelse ($property_configuration_settings as $props)
                                    @if ($props['dropdown_for'] == 'property_measurement_type')
                                        <option @if( $props['id'] == Session::get('default_measurement')) selected @endif data-parent_id="{{ $props['parent_id'] }}"
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
                    <div class="form-group col-md-7 m-b-20">
                        <label for="Super Builtup Area">Salable Area</label>
                        <input class="form-control" name="super_builtup_area"
                            id="super_builtup_area" type="text" autocomplete="off">
                    </div>
                    <div class="input-group-append col-md-5 m-b-20">
                        <div class="form-group form_measurement">
                        <select class="form-select measure_select" id="super_builtup_measurement">
                            @forelse ($property_configuration_settings as $props)
                                @if ($props['dropdown_for'] == 'property_measurement_type')
                                    <option @if( $props['id'] == Session::get('default_measurement')) selected @endif data-parent_id="{{ $props['parent_id'] }}"
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
                    <div class="form-group col-md-7 m-b-20">
                        <label for="Plot Area">Plot Area</label>
                        <input class="form-control" name="plot_area" id="plot_area"
                            type="text" autocomplete="off" >
                    </div>
                    <div class="input-group-append col-md-5 m-b-20">
                        <div class="form-group form_measurement">
                            <select class="form-select measure_select" id="plot_measurement">
                                @forelse ($property_configuration_settings as $props)
                                    @if ($props['dropdown_for'] == 'property_measurement_type')
                                        <option @if( $props['id'] == Session::get('default_measurement')) selected @endif data-parent_id="{{ $props['parent_id'] }}"
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
                    <div class="form-group col-md-7 m-b-20">
                        <label for="Terrace">Terrace</label>
                        <input class="form-control" name="terrace" id="terrace" type="text"
                            autocomplete="off" >
                    </div>
                    <div class="input-group-append col-md-5 m-b-20">
                        <div class="form-group form_measurement">
                            <select class="form-select measure_select" id="terrace_measuremnt">
                                @forelse ($property_configuration_settings as $props)
                                    @if ($props['dropdown_for'] == 'property_measurement_type')
                                        <option @if( $props['id'] == Session::get('default_measurement')) selected @endif data-parent_id="{{ $props['parent_id'] }}"
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
            <div class="form-check checkbox  checkbox-solid-success mb-0 col-md-2 m-b-20">
                <input class="form-check-input" id="share_to_others" type="checkbox">
                <label class="form-check-label" for="share_to_others">Share To Others</label>
            </div>
            <div class="form-check checkbox  checkbox-solid-success mb-0 col-md-2 m-b-20">
                <input class="form-check-input" id="is_favourite" type="checkbox">
                <label class="form-check-label" for="is_favourite">Favourite</label>
            </div>

            <h5 class="border-style">Other Details</h5>
            <div class="form-group col-md-2 m-b-4">
                <select class="form-select" id="furnished_status">
                    <option value="">Furnished Status</option>
                    @forelse ($property_configuration_settings as $props)
                        @if ($props['dropdown_for'] == 'property_furniture_type')
                            <option data-parent_id="{{ $props['parent_id'] }}"
                                value="{{ $props['id'] }}">{{ $props['name'] }}
                            </option>
                        @endif
                    @empty
                    @endforelse
                </select>
            </div>
            <div class="form-group col-md-2 m-b-20">
                <label for="Four Wheeler Parking">Four Wheeler Parking</label>
                <input class="form-control" name="fourwheller_parking" id="fourwheller_parking"
                    type="text" autocomplete="off" >
            </div>
            <div class="form-group col-md-2 m-b-20">
                <label for="Two Wheeler Parking">Two Wheeler Parking</label>
                <input class="form-control" name="twowheeler_parking" id="twowheeler_parking"
                    type="text" autocomplete="off" >
            </div>

            <div class="form-group col-md-2 m-b-20">
                <label for="Refrence">Refrence</label>
                <input class="form-control" name="if_any_refrence" id="if_any_refrence"
                    type="text" autocomplete="off" >
            </div>
            <div class="form-group col-md-2 m-b-4">
                <select class="form-select" id="Property_priority">
                    <option value="">Priority</option>
                    @forelse ($property_configuration_settings as $props)
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
                    @forelse ($property_configuration_settings as $props)
                        @if ($props['dropdown_for'] == 'property_source')
                            <option data-parent_id="{{ $props['parent_id'] }}"
                                value="{{ $props['id'] }}">{{ $props['name'] }}
                            </option>
                        @endif
                    @empty
                    @endforelse
                </select>
            </div>
            <div class="form-check checkbox  checkbox-solid-success col-md-2 m-b-20">
                <input class="form-check-input" id="is_pre_leased" type="checkbox">
                <label class="form-check-label" for="is_pre_leased">Pre-leased</label>
            </div>
            <div class="form-group col-md-8 m-b-20">
                <label for="Pre Leased Remarks">Pre-Leased Remarks</label>
                <input class="form-control" name="pre_leased_remarks" id="pre_leased_remarks"
                    type="text" autocomplete="off" >
            </div>

            <h5 class="border-style">Price And Remark</h5>
            <div class="form-group col-md-4 m-b-20">
                <label for="Price">Price</label>
                <input class="form-control indian_currency_amount" name="price" id="price" type="text"
                    autocomplete="off" >
            </div>

            <div class="form-group col-md-6 m-b-20">
                <label for="Remarks">Remarks</label>
                <input class="form-control" name="property_remarks" id="property_remarks"
                    type="text" autocomplete="off" >
            </div>
            <div class="form-group col-md-6 m-b-20">
                <label for="Link">Location Link</label>
                <input class="form-control" name="property_link" id="property_link"
                    type="text" autocomplete="off" >
            </div>

            <h5 class="border-style"> Owner Information</h5>
            <div class="form-group col-md-2 m-b-4 mb-3">
                <select class="form-select" id="owner_is">
                    <option value="">Owner is</option>
                    @forelse ($property_configuration_settings as $props)
                        @if ($props['dropdown_for'] == 'property_owner_type')
                            <option data-parent_id="{{ $props['parent_id'] }}"
                                value="{{ $props['id'] }}">{{ $props['name'] }}
                            </option>
                        @endif
                    @empty
                    @endforelse
                </select>
            </div>
            <div class="form-group col-md-3 m-b-20">
                <label for="Owner Name">Name</label>
                <input class="form-control" name="owner_info_name"
                    id="owner_info_name" type="text" autocomplete="off" >
            </div>
            <div class="form-group col-md-2 m-b-20">
                <label for="Owner Contact Specific No">Contact</label>
                <input class="form-control" name="owner_contact_specific_no"
                    id="owner_contact_specific_no" type="text" autocomplete="off"
                    >
            </div>
            <div class="form-group col-md-3 m-b-20">
                <label for="Email">Email</label>
                <input class="form-control" name="property_email" id="property_email"
                type="text" autocomplete="off" >
            </div>

            <div class="form-check checkbox  checkbox-solid-success mb-0 col-md-1 m-b-20">
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

            <h5 class="border-style"> Care Taker Information</h5>
            <div class="form-group col-md-4 m-b-20">
                <label for="Care Take Name">Care Taker Name</label>
                <input class="form-control" name="care_take_name" id="care_take_name"
                    type="text" autocomplete="off" >
            </div>
            <div class="form-group col-md-4 m-b-20">
                <label for="Care Take Contact No">Care Taker Contact No</label>
                <input class="form-control" name="care_take_contact_no" id="care_take_contact_no"
                    type="text" autocomplete="off" >
            </div>
            <div class="form-group col-md-3 m-b-4 mt-1">
                <select class="form-select" id="key_arrangement">
                    <option value=""> Key Available At</option>
                    <option value="Office">Office</option>
                    <option value="Owner">Owner</option>
                    <option value="Caretaker">Care Taker</option>
                </select>
            </div>

            <div style="display: none" class="form-group col-md-3 m-b-20">
                <label for="nfd" class="label-center">Reminder Date:</label>
            </div>
            <div style="display: none" class="form-group col-md-4 m-b-20">
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
@if(!isset($is_dynamic_form))
<script>
    $('#all_owner_contacts').html('')
    $('#all_units').html('')
    $('#all_owner_contacts').append(generate_contact_detail(makeid(10)));
    $('#all_units').append(generate_unit_detail(makeid(10)));
    floatingField()
</script>
@endif
