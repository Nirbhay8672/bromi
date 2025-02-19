@extends('builder.layouts.app')
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
                            <h5 class="mb-3">Projects</h5>
                            <div class="col">
                                <a
                                    class="btn custom-icon-theme-button"
                                    href="{{route('builder.project.add')}}"
                                    title="Add Project"
                                >
                                    <i class="fa fa-plus"></i>
                                </a>

                                <button
                                    class="btn text-white delete_table_row ms-3"
                                    style="border-radius: 5px;display: none;background-color:red"
                                    onclick="deleteTableRow()"
                                    type="button"
                                    title="Delete"
                                ><i class="fa fa-trash"></i></button>

                            </div>
                        </div>
                        <div class="card-body">

                            @if(Session::has('success_msg'))
                                <div class="alert alert-success" role="alert" style="border: 2px solid #0F5131;">
                                    {{ Session::get('success_msg') }}
                                </div>
                            @endif

                            <div class="table-responsive">
                                <table class="display" id="projectTable">
                                    <thead>
                                        <tr>
											<th>
                                                <div class="form-check form-check-inline checkbox checkbox-dark mb-0 me-0">
                                                    <input class="form-check-input" id="select_all_checkbox" name="selectrows" type="checkbox">
                                                    <label class="form-check-label" for="select_all_checkbox"></label>
                                                </div>
                                            </th>
                                            <th>Project</th>
                                            <th>Address</th>
                                            <th>Property Type</th>
                                            <th>Remark</th>
                                            <th>Modified On</th>
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
        <div class="modal fade" id="projectModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Project</h5>
                        <button class="btn-close btn-light" type="button" data-bs-dismiss="modal" aria-label="Close"> </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-bookmark needs-validation modal_form" method="post" id="modal_form"
                            novalidate="">
                            <input type="hidden" name="this_data_id" id="this_data_id">
                            <div class="row">
                                <h5 class="border-style">Information</h5>
                                <div class="form-group col-md-6 m-b-20">
                                    <label for="Project Name"> Name</label>
                                    <input class="form-control" name="project_name" id="project_name" type="text"
                                        autocomplete="off">
                                </div>
                                <div class="form-group col-md-3 m-b-4 mb-3">
                                    <select class="form-select" id="builder_id">
                                        <option value=""> Builder</option>
                                        @foreach ($builders as $builder)
                                            <option value="{{ $builder->id }}">{{ $builder->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3 m-b-4 mb-3">
                                    <select class="form-select" id="area_id">
                                        <option value="">Area</option>
                                        @foreach ($areas as $area)
                                            <option data-pincode="{{ $area->pincode }}" data-city_id="{{ $area->city_id }}"
                                                data-state_id="{{ $area->state_id }}" value="{{ $area->id }}">
                                                {{ $area->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6 m-b-20">
                                    <label for="Address">Address</label>
                                    <input class="form-control mt-3" name="address" id="address" type="text"
                                        autocomplete="off">
                                </div>

                                <div class="form-group col-md-3 m-b-4 mb-3">
                                    <label for="City" class="mb-0">State</label>
                                    <select class="form-select" id="state_id">
                                        <option value="">State</option>
                                        @foreach ($states as $state)
                                            <option value="{{ $state['id'] }}">{{ $state['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3 m-b-4 mb-3">
                                    <label for="City" class="mb-0">City</label>
                                    <select class="form-select" id="city_id">
                                        <option value="">City</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city['id'] }}">{{ $city['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3 m-b-20">
                                    <label for="Pincode">Pincode</label>
                                    <input class="form-control" name="pincode" id="pincode" type="text"
                                        autocomplete="off">
                                </div>
                                {{-- <div class="d-flex align-items-center mb-3 col-md-2">
                                    <div class="form-group">
                                        <label class="switch mb-0">
                                            <input type="checkbox" id="status" ><span class="switch-state"></span>
                                        </label>
                                    </div>
                                    <div class="form-group ms-2">
                                        <label for="status" class="mb-1">Active</label>
                                    </div>
                                </div> --}}
                                <div class="form-group col-md-7 m-b-20">
                                    <label for="Email">Email</label>
                                    <input class="form-control" name="email" id="email" type="text"
                                        autocomplete="off">
                                </div>
                                <div class="form-check checkbox checkbox-solid-success mb-0 col-md-3 m-b-20">
                                    <input class="form-check-input" id="prime_project" type="checkbox">
                                    <label class="form-check-label" for="prime_project">Prime </label>
                                </div>

                                <h5 class="border-style"> Other Information</h5>
                                <div class="form-group col-md-4 m-b-20">
                                    <label for="No Of Floor">No of Floor</label>
                                    <input class="form-control" name="floor_count" id="floor_count" type="text"
                                        autocomplete="off">
                                </div>
                                <div class="form-group col-md-4 m-b-20">
                                    <label for="No. of unit">No of Unit</label>
                                    <input class="form-control" name="unit_no" id="unit_no" type="text"
                                        autocomplete="off">
                                </div>
                                <div class="form-group col-md-4 m-b-20">
                                    <label for="No of Lift each block">No of Lift Each Block</label>
                                    <input class="form-control" name="lift_count" id="lift_count" type="text"
                                        autocomplete="off">
                                </div>
                                <div class="form-group col-md-8 m-b-4 mb-3">
                                    <label class="select2_label" for="Property Type">Property Type</label>
                                    <select class="form-select" id="property_type" multiple="multiple">
                                        @forelse ($project_configuration_settings as $props)
                                            @if ($props['dropdown_for'] == 'property_construction_type')
                                                <option data-parent_id="{{ $props['parent_id'] }}"
                                                    value="{{ $props['id'] }}">{{ $props['name'] }}
                                                </option>
                                            @endif
                                        @empty
                                        @endforelse
                                    </select>
                                </div>


                                <h5 class="border-style"> Description</h5>


                                <div class="form-group col-md-2 m-b-20">
                                    <label for="Building Posession"> Posession(Year)</label>
                                    <input class="form-control" name="building_posession" id="building_posession"
                                        type="text" autocomplete="off">
                                </div>
                                <div class="form-group col-md-2 m-b-20 mt-1">
                                    <select class="form-select form-design" id="building_status">
                                        <option value=""> Project Status</option>
                                        @forelse ($project_configuration_settings as $props)
                                            @if ($props['dropdown_for'] == 'building_progress')
                                                <option data-parent_id="{{ $props['parent_id'] }}"
                                                    value="{{ $props['id'] }}">{{ $props['name'] }}
                                                </option>
                                            @endif
                                        @empty
                                        @endforelse
                                    </select>
                                </div>

                                <div class="form-group col-md-2 m-b-20 mt-1">
                                    <select class="form-select" id="building_quality">
                                        <option value="">Quality </option>
                                        <option value="1">Average</option>
                                        <option value="2">Excellent</option>
                                        <option value="3">Good</option>
                                        <option value="4">Poor</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-3 m-b-20">
                                    <label class="select2_label" for="Restricted User">Restricted User</label>
                                    <select class="form-select" id="restrictions" multiple="multiple">
                                        @forelse ($project_configuration_settings as $props)
                                            @if ($props['dropdown_for'] == 'building_restriction')
                                                <option data-parent_id="{{ $props['parent_id'] }}"
                                                    value="{{ $props['id'] }}">{{ $props['name'] }}
                                                </option>
                                            @endif
                                        @empty
                                        @endforelse
                                    </select>
                                </div>

                                <div class="form-group col-md-12 m-b-20">
                                    <label for=" Description"> Description</label>
                                    <input class="form-control" name="project_description" id="project_description"
                                        type="text" autocomplete="off">
                                </div>


                                <h5 class="border-style"> Amenities</h5>
                                <div class="form-check checkbox  checkbox-solid-success mb-0 col-md-3 m-b-20">
                                    <input class="project_amenity form-check-input" id="amenity_pool" type="checkbox">
                                    <label class="form-check-label" for="amenity_pool">Swimming Pool</label>
                                </div>
                                <div class="form-check checkbox  checkbox-solid-success mb-0 col-md-3 m-b-20">
                                    <input class="project_amenity form-check-input" id="amenity_club_house"
                                        type="checkbox">
                                    <label class="form-check-label" for="amenity_club_house">Club house</label>
                                </div>
                                <div class="form-check checkbox  checkbox-solid-success mb-0 col-md-3 m-b-20">
                                    <input class="project_amenity form-check-input" id="amenity_passenger_lift"
                                        type="checkbox">
                                    <label class="form-check-label" for="amenity_passenger_lift">Passenger Lift</label>
                                </div>
                                <div class="form-check checkbox  checkbox-solid-success mb-0 col-md-3 m-b-20">
                                    <input class="project_amenity form-check-input" id="amenity_garden" type="checkbox">
                                    <label class="form-check-label" for="amenity_garden">Garden & Children Play
                                        Area</label>
                                </div>
                                <div class="form-check checkbox  checkbox-solid-success mb-0 col-md-3 m-b-20">
                                    <input class="project_amenity form-check-input" id="amenity_service_lift"
                                        type="checkbox">
                                    <label class="form-check-label" for="amenity_service_lift">Service Lift</label>
                                </div>
                                <div class="form-check checkbox  checkbox-solid-success mb-0 col-md-3 m-b-20">
                                    <input class="project_amenity form-check-input" id="amenity_streature_lift"
                                        type="checkbox">
                                    <label class="form-check-label" for="amenity_streature_lift">Streature Lift</label>
                                </div>
                                <div class="form-check checkbox  checkbox-solid-success mb-0 col-md-3 m-b-20">
                                    <input class="project_amenity form-check-input" id="amenity_ac" type="checkbox">
                                    <label class="form-check-label" for="amenity_ac">Central AC</label>
                                </div>
                                <div class="form-check checkbox  checkbox-solid-success mb-0 col-md-3 m-b-20">
                                    <input class="project_amenity form-check-input" id="amenity_gym" type="checkbox">
                                    <label class="form-check-label" for="amenity_gym">Gym</label>
                                </div>

                                <h5 class="border-style">Contact Details</h5>
                                <div><button type="button" class="btn mb-3 btn-primary btn-air-primary"
                                        id="add_contacts">Add Contact</button></div>
                                <div class="row" id="all_contacts">

                                </div>


                                <h5 class="border-style">Wing Details</h5>

                                <div><button type="button" class="btn mb-3 btn-primary btn-air-primary"
                                        id="add_towers">Add Wing</button></div>
                                <div class="row" id="all_towers">

                                </div>

                                <h5 class="border-style">Unit Types</h5>
                                <div><button type="button" class="btn mb-3 btn-primary btn-air-primary"
                                        id="add_unit_types">Add Unit Type</button></div>
                                <div class="row" id="all_unit_types">

                                </div>


                                <h5 class="border-style">Images/Documents</h5>
                                <div id="uploadImageBox" class="row">
                                    <div class="form-group col-md-4 m-b-4 mt-1">
                                        <select class="form-select" id="image_category">
                                            <option value=""> Category</option>
                                            <option value="1">Building Elevation</option>
                                            <option value="2">Common Amenities Photos</option>
                                            <option value="3">Master Layout Of Building</option>
                                            <option value="4">Brochure</option>
                                            <option value="5">Cost Sheet</option>
                                            <option value="6">Other</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 m-b-4 mb-3"><input class="form-control"
                                            type="file" id="building_images" name="building_images" multiple></div>
                                    <div class="form-group col-md-2 m-b-4 mb-3"><button type="button"
                                            class="btn mb-2 btn-primary btn-air-primary" id="add_images">Upload</button>
                                    </div>
                                </div>
                                <div class="row" id="all_images">

                                </div>


                            </div>

                            @if (Auth::user()->can('project-edit') || Auth::user()->can('project-create'))
                                <button class="btn btn-secondary" id="saveProject">Save</button>
                            @endif
                            <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="unit_types_template" class="hidden" style="display: none">
            <div class="form-group col-md-6 m-b-20">
                <label>Type/Plan Name</label>
                <input class="form-control" name="type_plan_name" type="text" autocomplete="off">
            </div>

            <div class="form-group col-md-3 m-b-4">
                <select class="form-select" name="requirement_type">
                    <option value="">Requirement Type</option>
                    @forelse ($project_configuration_settings as $props)
                        @if ($props['dropdown_for'] == 'property_construction_type')
                            <option data-parent_id="{{ $props['parent_id'] }}" value="{{ $props['id'] }}">
                                {{ $props['name'] }}
                            </option>
                        @endif
                    @empty
                    @endforelse
                </select>
            </div>
            <div class="form-group col-md-3 m-b-4">
                <select class="form-select" name="configuration">
                    <option value="">Configuration</option>
					@forelse (config('constant.property_configuration') as $key=>$props)
					<option
						value="{{ $key }}">{{ $props }}
					</option>
					@empty
					@endforelse
                </select>
            </div>


            <div class="col-md-3">
                <div class="input-group">
                    <div class="form-group col-md-7 m-b-20">
                        <label class="mb-0">Super Built up Area</label>
                        <input class="form-control" name="builtup_area" type="text" autocomplete="off">
                    </div>
                    <div class="input-group-append col-md-5 m-b-20">
                        <div class="form-group form_measurement">
                            <select class="form-select form_measurement measure_select" name="builtup_area_measurement">
                                @forelse ($project_configuration_settings as $props)
                                    @if ($props['dropdown_for'] == 'property_measurement_type')
                                        <option @if ($props['id'] == Session::get('default_measurement')) selected @endif
                                            data-parent_id="{{ $props['parent_id'] }}" value="{{ $props['id'] }}">
                                            {{ $props['name'] }}
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
                        <label class="mb-0">Built up Area</label>
                        <input class="form-control" name="rera_area" type="text" autocomplete="off">
                    </div>
                    <div class="input-group-append col-md-5 m-b-20">
                        <div class="form-group form_measurement">
                            <select class="form-select form_measurement measure_select" name="rera_area_measurement">
                                @forelse ($project_configuration_settings as $props)
                                    @if ($props['dropdown_for'] == 'property_measurement_type')
                                        <option @if ($props['id'] == Session::get('default_measurement')) selected @endif
                                            data-parent_id="{{ $props['parent_id'] }}" value="{{ $props['id'] }}">
                                            {{ $props['name'] }}
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
                        <label class="mb-0">carpet Area</label>
                        <input class="form-control" name="carpet_area" type="text" autocomplete="off">
                    </div>
                    <div class="input-group-append col-md-5 m-b-20">
                        <div class="form-group form_measurement">
                            <select class="form-select form_measurement measure_select" name="carpet_area_measurement">
                                @forelse ($project_configuration_settings as $props)
                                    @if ($props['dropdown_for'] == 'property_measurement_type')
                                        <option @if ($props['id'] == Session::get('default_measurement')) selected @endif
                                            data-parent_id="{{ $props['parent_id'] }}" value="{{ $props['id'] }}">
                                            {{ $props['name'] }}
                                        </option>
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
                        <label class="mb-0">Wash Area</label>
                        <input class="form-control" name="wash_area" type="text" autocomplete="off">
                    </div>
                    <div class="input-group-append col-md-5 m-b-20">
                        <div class="form-group form_measurement">
                            <select class="form-select form_measurement measure_select" name="wash_area_measurement">
                                @forelse ($project_configuration_settings as $props)
                                    @if ($props['dropdown_for'] == 'property_measurement_type')
                                        <option @if ($props['id'] == Session::get('default_measurement')) selected @endif
                                            data-parent_id="{{ $props['parent_id'] }}" value="{{ $props['id'] }}">
                                            {{ $props['name'] }}
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
                        <label class="mb-0">Balcony Area</label>
                        <input class="form-control" name="balcony_area" type="text" autocomplete="off">
                    </div>
                    <div class="input-group-append col-md-5 m-b-20">
                        <div class="form-group form_measurement">
                            <select class="form-select form_measurement measure_select" name="balcony_area_measurement">
                                @forelse ($project_configuration_settings as $props)
                                    @if ($props['dropdown_for'] == 'property_measurement_type')
                                        <option @if ($props['id'] == Session::get('default_measurement')) selected @endif
                                            data-parent_id="{{ $props['parent_id'] }}" value="{{ $props['id'] }}">
                                            {{ $props['name'] }}
                                        </option>
                                    @endif
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-check checkbox  checkbox-solid-success col-md-2 m-b-20">
                <input class="project_amenity form-check-input" id="penthouse" name="penthouse"
                    type="checkbox">
                <label class="form-check-label" for="penthouse">Penthouse</label>
            </div>

            <div class="col-md-3" style="display:none">
                <div class="input-group">
                    <div class="form-group col-md-7 m-b-20">
                        <label class="mb-0">Terrace carpet Area</label>
                        <input class="form-control" name="terrace_carpet_area" type="text" autocomplete="off">
                    </div>
                    <div class="input-group-append col-md-5 m-b-20">
                        <div class="form-group form_measurement">
                            <select class="form-select form_measurement measure_select"
                                name="terrace_carpet_area_measurement">
                                @forelse ($project_configuration_settings as $props)
                                    @if ($props['dropdown_for'] == 'property_measurement_type')
                                        <option @if ($props['id'] == Session::get('default_measurement')) selected @endif
                                            data-parent_id="{{ $props['parent_id'] }}" value="{{ $props['id'] }}">
                                            {{ $props['name'] }}
                                        </option>
                                        </option>
                                    @endif
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>
                </div>
            </div>

			<div class="col-md-3" style="display:none">
                <div class="input-group">
                    <div class="form-group col-md-7 m-b-20">
                        <label class="mb-0">Terrace salable Area</label>
                        <input class="form-control" name="terrace_super_builtup_area" type="text" autocomplete="off">
                    </div>
                    <div class="input-group-append col-md-5 m-b-20">
                        <div class="form-group form_measurement">
                            <select class="form-select form_measurement measure_select"
                                name="terrace_super_builtup_area_measurement">
                                @forelse ($project_configuration_settings as $props)
                                    @if ($props['dropdown_for'] == 'property_measurement_type')
                                        <option @if ($props['id'] == Session::get('default_measurement')) selected @endif
                                            data-parent_id="{{ $props['parent_id'] }}" value="{{ $props['id'] }}">
                                            {{ $props['name'] }}
                                        </option>
                                        </option>
                                    @endif
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1 m-b-20">
                <button class="remove_unit_types btn btn-danger btn-air-danger" type="button">-</button>
            </div>
            <div>
                <hr>
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
            var building_image_show_url = "{{ asset('upload/building_images') }}";
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
                        url: "{{ route('builder.projects') }}",
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
                            data: "project_name",
                            name: 'project_name',
                            render : function ( data, type, row, meta ) {
                                let project_data = row;
                                
                                if(project_data.is_indirectly_store > 0) {
                                    return `<span style="cursor: pointer;" title="View after fill all data">${data}</span>`;
                                } else {
                                    var url = '{{ route("builder.viewProject", ":id") }}';
                                    url = url.replace(':id', project_data.id);
                                    return `<a href="${url}">${data}</a>`;    
                                }
                                
                            }
                        },
                        {
                            data: 'address',
                            name: 'address'
                        },
                        {
                            data: 'property_type',
                            name: 'property_type'
                        },
                        {
                            data: 'remark',
                            name: 'remark'
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

            function getProject(data) {
                shouldchangecity = 0
                $('#modal_form').trigger("reset");
                var id = $(data).attr('data-id');
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.getProject') }}",
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        data = JSON.parse(data);
                        $('#this_data_id').val(data.id);
                        $('#project_name').val(data.project_name);
                        $('#prime_project').prop('checked', Number(data.is_prime));
                        $('#builder_id').val(data.builder_id).trigger('change');
                        $('#area_id').val(data.area_id).trigger('change');
                        $('#state_id').val(data.state_id).trigger('change');
                        $('#city_id').val(data.city_id).trigger('change');
                        $('#address').val(data.address);
                        $('#pincode').val(data.pincode);
                        $('#status').prop('checked', Number(data.status));
                        $('#email').val(data.email);
                        $('#floor_count').val(data.floor_count);
                        $('#unit_no').val(data.unit_no);
                        $('#lift_count').val(data.lift_count);
                        $('#building_quality').val(data.building_quality).trigger('change');;
                        $('#building_status').val(data.building_status).trigger('change');;
                        $('#restrictions').val(JSON.parse(data.restrictions)).trigger('change');;
                        $('#building_posession').val(data.building_posession)
                        $('#property_type').val(JSON.parse(data.property_type)).trigger('change');
                        $('#project_description').val(data.project_description);
                        shouldchangecity = 1
                        $(".project_amenity").each(function(index) {
                            var amenities = JSON.parse(data.amenities)
                            if ((amenities != null) && (amenities.length > 0)) {
                                $(this).prop('checked', Number(amenities[index]));
                            }
                        });
                        $('#all_contacts').html('');
                        $('#all_towers').html('');
                        $('#all_unit_types').html('')

                        $('#all_images').html('');
                        if (data.images != '') {
                            for (let i = 0; i < data.images.length; i++) {
                                var category = '';
                                if (data.images[i].category == 1) {
                                    category = 'Building Elevation';
                                } else if (data.images[i].category == 2) {
                                    category = 'Common Amenities Photos';
                                } else if (data.images[i].category == 3) {
                                    category = 'Master Layout Of Building';
                                } else if (data.images[i].category == 4) {
                                    category = 'Brochure';
                                } else if (data.images[i].category == 5) {
                                    category = 'Cost Sheet';
                                } else if (data.images[i].category == 6) {
                                    category = 'Other';
                                }

                                var src = building_image_show_url + '/' + data.images[i].image;
                                if (src.includes('.pdf')) {
                                    $('#all_images').append(
                                        '<div class="col-md-4 m-b-4 mb-3"><a target="_blank" href="' + src +
                                        '"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a><p>' +
                                        category + '</p></div>')
                                } else {
                                    $('#all_images').append('<div class="col-md-4 m-b-4 mb-3"><img src="' + src +
                                        '" alt="" height="200" width="200"><p>' + category + '</p></div>')
                                }
                            }

                        }

                        if (data.contact_details != '') {
                            details = JSON.parse(data.contact_details);
                            if ((details != null) && (details.length > 0)) {
                                for (let i = 0; i < details.length; i++) {
                                    id = makeid(10);
                                    $('#all_contacts').append(generate_contact_detail(id))
                                    $("[data-contact_id=" + id + "] input[name=contact_person_name]").val(details[i]
                                        [
                                            0
                                        ]);
                                    $("[data-contact_id=" + id + "] input[name=contact_person_no]").val(details[i][
                                        1]);
                                    $("[data-contact_id=" + id + "] input[name=contact_person_type]").val(details[i]
                                        [2]);
                                }

                            }
                        }

                        if (data.tower_details != '') {
                            details = JSON.parse(data.tower_details);
                            if ((details != null) && (details.length > 0)) {
                                for (let i = 0; i < details.length; i++) {
                                    id = makeid(10);
                                    $('#all_towers').append(generate_tower_detail(id))
                                    $("[data-contact_id=" + id + "] [name=tower_name]").val(details[i][
                                        0
                                    ]);
                                    $("[data-contact_id=" + id + "] [name=tower_total_units]").val(details[i][1]);
                                    $("[data-contact_id=" + id + "] [name=total_floor]").val(details[i][2]).trigger(
                                        'change');
                                }
                                floatingField()
                            }
                        }

                        if (data.unit_details != '') {
                            details = JSON.parse(data.unit_details);
                            if ((details != null) && (details.length > 0)) {
                                for (let i = 0; i < details.length; i++) {
                                    unique_id = makeid(10);
                                    $('#all_unit_types').append(generate_unit_types_detail(unique_id));
                                    $("#all_unit_types select").each(function(index) {
                                        $(this).select2();
                                    })
                                    $("[data-contact_id=" + unique_id + "] [name=type_plan_name]").val(details[i][
                                        0]);
                                    $("[data-contact_id=" + unique_id + "] [name=requirement_type]").val(details[i][
                                        1
                                    ]).trigger('change');
                                    $("[data-contact_id=" + unique_id + "] [name=configuration]").val(details[i][2])
                                        .trigger('change');
                                    $("[data-contact_id=" + unique_id + "] [name=builtup_area]").val(details[i][3]);
                                    $("[data-contact_id=" + unique_id + "] [name=builtup_area_measurement]").val(
                                        details[i][4]).trigger('change');
                                    $("[data-contact_id=" + unique_id + "] [name=rera_area]").val(details[i][5]);
                                    $("[data-contact_id=" + unique_id + "] [name=rera_area_measurement]").val(
                                        details[i]
                                        [6]).trigger('change');
                                    $("[data-contact_id=" + unique_id + "] [name=wash_area]").val(details[i][7]);
                                    $("[data-contact_id=" + unique_id + "] [name=wash_area_measurement]").val(
                                        details[i]
                                        [8]).trigger('change');
                                    $("[data-contact_id=" + unique_id + "] [name=balcony_area]").val(details[i][9]);
                                    $("[data-contact_id=" + unique_id + "] [name=balcony_area_measurement]").val(
                                        details[i][10]).trigger('change');
                                    $("[data-contact_id=" + unique_id + "] [name=carpet_area]").val(details[i][11]);
                                    $("[data-contact_id=" + unique_id + "] [name=carpet_area_measurement]").val(
                                        details[
                                            i][12]).trigger('change');
                                    $("[data-contact_id=" + unique_id + "] [name=terrace_carpet_area]").val(details[
                                        i][
                                        13
                                    ]);
                                    $("[data-contact_id=" + unique_id + "] [name=terrace_carpet_area_measurement]")
                                        .val(
                                            details[i][14]).trigger('change');
                                    $("[data-contact_id=" + unique_id + "] [name=terrace_super_builtup_area]").val(
                                        details[i][15]);
                                    $("[data-contact_id=" + unique_id +
                                            "] [name=terrace_super_builtup_area_measurement]").val(details[i][16])
                                        .trigger('change');
										$("[data-contact_id=" + unique_id + "] [name=penthouse]").prop('checked',true)
                                    if (details[i][13] == '') {
										$("[data-contact_id=" + unique_id + "] [name=penthouse]").prop('checked',false)
										$("[data-contact_id=" + unique_id + "] [name=terrace_carpet_area]").closest(
                                        '.col-md-3').hide()
                                    $("[data-contact_id=" + unique_id + "] [name=terrace_carpet_area_measurement]")
                                        .closest('.col-md-3').hide()
                                    $("[data-contact_id=" + unique_id + "] [name=terrace_super_builtup_area]")
                                        .closest('.col-md-3').hide()
                                    $("[data-contact_id=" + unique_id +
                                            "] [name=terrace_super_builtup_area_measurement]").closest('.col-md-3')
                                        .hide()
									}
                                }
                            }
                        }

                        $('#projectModal').modal('show');
                        triggerChangeinput()
                        floatingField();
                    }
                });
            }

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

            $(document).on('click', '#add_images', function(e) {
                var fd = new FormData();
                var files = $('#building_images')[0].files;
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
                        $('#building_images').val('');
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
                var myvar = '<div data-contact_id= ' + id + ' class="form-group col-md-3 m-b-20">' +
                    '<label>Wing</label>'+
                    '       <input class="form-control" name="tower_name" type="text"' +
                    '            autocomplete="off">' +
                    '     </div>' +
                    '     <div data-contact_id= ' + id +
                    ' class="form-group col-md-3 m-b-20">' +
                    '<label>Total Units</label>'+
                    '       <input class="form-control" name="tower_total_units"' +
                    '           type="text"  autocomplete="off">' +
                    '   </div>' +
                    ' <div data-contact_id= ' + id +
                    ' class="form-group col-md-3 m-b-20">' +
                    '<label>Total Floor</label>'+
                    '       <input class="form-control" name="total_floor"' +
                    '           type="text"  autocomplete="off">' +
                    '   </div>' +
                    '<div data-contact_id= ' + id +
                    ' class="form-group col-md-2 m-b-4 mb-3"><button data-contact_id=' + id +
                    ' class="remove_towers btn btn-danger btn-air-danger" type="button">-</button>  </div>';
                return myvar;

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
                        building_status: $('#building_status').val(),
                        building_quality: $('#building_quality').val(),
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        $('#projectTable').DataTable().draw();
                        $('#projectModal').modal('hide');
                        $('#saveProject').prop('disabled', false);
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
        </script>
    @endpush
