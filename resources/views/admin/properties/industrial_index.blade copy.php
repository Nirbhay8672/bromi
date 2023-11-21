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
                            <h5 class="mb-3">Industrial Properties</h5>
                            <div class="row">
                                @include('admin.properties.change_menu')
                                <div class="col-md-8">
											<a class="btn btn-primary btn-air-primary"  href="{{route('admin.property.add')}}">Add
												Property</a>
                                    <button class="btn btn-primary btn-air-primary" type="button" data-bs-toggle="modal"
                                        data-bs-target="#filtermodal">Filter</button>
                                        <button style="display:none" class="btn btn-danger" id="resetfilter">Clear Filter</button>
                                        <button class="btn btn-primary btn-air-primary" onclick="importProperties()"
                                        type="button">Import</button>
										<button class="btn btn-primary btn-air-primary delete_table_row" style="display: none" onclick="deleteTableRow()"
									type="button">Delete</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display" id="propertyTable">
                                    <thead>
                                        <tr>
											<th>
                                                <div class="form-check form-check-inline checkbox checkbox-dark mb-0 me-0">
                                                    <input class="form-check-input" id="select_all_checkbox" name="selectrows" type="checkbox">
                                                    <label class="form-check-label" for="select_all_checkbox"></label>
                                                </div>
                                            </th>
                                            <th>Project</th>
                                            <th>Property For</th>
                                            <th>Units</th>
                                            <th>Price</th>
                                            <th>Contact</th>
                                            <th>Remarks</th>
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
        <div class="modal fade" id="industrialpropertyModal" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Industrial Property</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"> </button>
                    </div>
                    <div class="modal-body">
                        @include('admin.properties.add_industrial_property')
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
                                        <select class="form-select" id="filter_building_id">
                                            <option value=""> Project</option>
                                            @foreach ($projects as $project)
                                                <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 m-b-4 mb-3">
                                        <select class="form-select" id="filter_property_for">
											<option value="">Property For</option>
                                            <option value="Rent">Rent</option>
                                            <option value="Sell">Sell</option>
											<option value="Both">Both</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3 m-b-4 mb-3">
                                        <select class="form-select" id="filter_specific_type">
                                            <option value="">Category</option>
                                            @forelse ($property_configuration_settings as $props)
                                                @if ($props['dropdown_for'] == 'property_specific_type'  && in_array($props['parent_id'],$prop_type))
                                                    <option data-parent_id="{{ $props['parent_id'] }}"
                                                        value="{{ $props['id'] }}">{{ $props['name'] }}
                                                    </option>
                                                    </option>
                                                @endif
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3 m-b-4 mb-3">
                                        <select class="form-select" id="filter_configuration">
                                            <option value="">Configuration</option>
											@forelse (config('constant.property_configuration') as $key=>$props)
											<option
												value="{{ $key }}">{{ $props }}
											</option>
											@empty
											@endforelse
                                        </select>
                                    </div>


									<div class="form-group col-md-3 m-b-4 mb-3">
                                        <select class="form-select" id="filter_zone">
                                            <option value="">Zone</option>
                                            @forelse ($property_configuration_settings as $props)
                                                @if ($props['dropdown_for'] == 'property_zone')
                                                    <option data-parent_id="{{ $props['parent_id'] }}"
                                                        value="{{ $props['id'] }}">{{ $props['name'] }}
                                                    </option>
                                                    </option>
                                                @endif
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3 m-b-4 mb-3">
                                        <select class="form-select" id="filter_property_status">
                                            <option value=""> Status</option>
                                            <option value="Available">Available</option>
                                            <option value="SoldOut">Sold Out</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3 m-b-4 mt-1">
                                        <select class="form-select" id="filter_source_of_property">
                                            <option value="">Source Of Property</option>
                                            @forelse ($property_configuration_settings as $props)
                                                @if ($props['dropdown_for'] == 'property_source')
                                                    <option data-parent_id="{{ $props['parent_id'] }}"
                                                        value="{{ $props['id'] }}">{{ $props['name'] }}
                                                    </option>
                                                    </option>
                                                @endif
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 m-b-4 mb-3">
                                        <select class="form-select" id="filter_area_id">
                                            <option value=""> Area</option>
                                            @foreach ($areas as $area)
                                                <option value="{{ $area->id }}">{{ $area->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <hr class="color-hr">

                                    <div class="form-group col-md-4 m-b-20">
										<label for="From Area">From Area</label>
                                        <input class="form-control" name="filter_from_area" id="filter_from_area"
                                            type="text" autocomplete="off" >
                                    </div>
                                    <div class="form-group col-md-4 m-b-20">
										<label for="To Area">To Area</label>
                                        <input class="form-control" name="filter_to_area" id="filter_to_area"
                                            type="text" autocomplete="off" >
                                    </div>
                                    <div class="form-group col-md-2 m-b-4 mb-3">
										<select class="form-select form_measurement measure_select" id="filter_measurement">
											<option value="">Measurement</option>
                                            @forelse ($property_configuration_settings as $props)
                                                @if ($props['dropdown_for'] == 'property_measurement_type')
                                                    <option  data-parent_id="{{ $props['parent_id'] }}"
                                                        value="{{ $props['id'] }}">{{ $props['name'] }}
                                                    </option>
                                                    </option>
                                                @endif
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 m-b-20">
										<label for="From Price">From Price</label>
                                        <input class="form-control indian_currency_amount" name="filter_from_price" id="filter_from_price"
                                            type="text" autocomplete="off" >
                                    </div>
                                    <div class="form-group col-md-4 m-b-20">
										<label for="To Price">To Price</label>
                                        <input class="form-control indian_currency_amount" name="filter_to_price" id="filter_to_price"
                                            type="text" autocomplete="off" >
                                    </div>



                                </div>
                            </div>
                            <button class="btn btn-secondary" id="filtersearch">Filter</button>
                            <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
		<div class="modal fade" id="importmodal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import Property</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"> </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-bookmark needs-validation " method="post" id="import_form" novalidate="">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-5 m-b-20">
									<label for="Choose File">File</label>
                                    <input class="form-control" type="file" accept=".xlsx" name="import_file"
                                        id="import_file">
                                </div>
								<br>
								<div class="form-group col-md-5 m-b-10">
                                    <a href="{{route('admin.importindustrialpropertyTemplate')}}">Download Sample file</a>
                                </div>

								<br>
                            </div>
                            <button class="btn btn-secondary" id="importFile">Save</button>
                            <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
		{{-- @php
		$city_encoded = json_encode($cities);
		$state_encoded = json_encode($states);
		@endphp --}}
    @endsection
    @push('scripts')
    @include('admin.properties.industrial_property_javascript',['cities'=>$cities,'states'=>$states])
        <script>
			var shouldchangecity = 1;

            $(document).ready(function() {
                $('#propertyTable').DataTable({
                    processing: true,
                    serverSide: true,
					@if(!Auth::user()->can('search-industrial-property'))
					searching:false,
					@endif
                    ordering: true,
                    ajax: {
                        url: "{{ route('admin.industrial.properties') }}",
                        data: function(d) {
                            d.filter_building_id = $('#filter_building_id').val()
                            d.filter_property_for = $('#filter_property_for').val()
                            d.filter_specific_type = $('#filter_specific_type').val()
                            d.filter_configuration = $('#filter_configuration').val()
                            d.filter_zone = $('#filter_zone').val()
                            d.filter_property_status = $('#filter_property_status').val()
                            d.filter_source_of_property = $('#filter_source_of_property').val()
                            d.filter_area_id = $('#filter_area_id').val()
                            d.filter_from_area = $('#filter_from_area').val()
                            d.filter_to_area = $('#filter_to_area').val()
                            d.filter_measurement = $('#filter_measurement').val()
                            d.filter_from_price = $('#filter_from_price').val()
                            d.filter_to_price = $('#filter_to_price').val()
                        },
                    },
                    columns: [
						{
                            data: 'select_checkbox',
                            name: 'select_checkbox',
							orderable: false
                        },
						{
                            data: 'project_id',
                            name: 'project_id',
                        },
                        {
                            data: 'property_for',
                            name: 'property_for'
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
                            data: 'contact_details',
                            name: 'contact_details'
                        },
                        {
                            data: 'remarks',
                            name: 'remarks'
                        },
                        {
                            data: 'actions',
                            name: 'actions',
                            orderable: false
                        },
                    ]
                });
            });


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

			function importProperties(params) {
				$('#importmodal').modal('show');
			}

			$(document).on('click', '#importFile', function(e) {
                e.preventDefault();
                var formData = new FormData();
                var files = $('#import_file')[0].files[0];
                if (files == '') {
                    return;
                }
                formData.append('csv_file', files);
                formData.append('_token', '{{ csrf_token() }}');
                $.ajax({
                    type: "POST",
                    processData: false,
                    contentType: false,
                    url: "{{ route('admin.importIndustrialproperty') }}",
                    data: formData,
                    success: function(data) {
                        $('#propertyTable').DataTable().draw();
                        $('#importmodal').modal('hide');
                        $('#import_form')[0].reset();
                    }
                });
            })

            $(document).on('change', '#filter_property_type', function(e) {
                var parent_value = $(this).val();
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



            $(document).on('click', '.showNumberNow', function(e) {
                numb = $(this).attr('data-val');
                $(this).replaceWith('<a href="tel:'+numb+'">'+numb+'</a>');
            })

            function getProperty(data) {
				shouldchangecity = 0
                $('#modal_form').trigger("reset");
                var id = $(data).attr('data-id');
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.industrial.getProperty') }}",
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        data = JSON.parse(data);
                        $('#this_data_id').val(data.id);
                        $('#property_for').val(data.property_for).trigger('change');;
                        $('#building_id').val(data.building_id).trigger('change');;
                        $('#address').val(data.address);
                        $('#area_id').val(data.area_id).trigger('change');
                        $('#city_id').val(data.city_id).trigger('change');
                        $('#state_id').val(data.state_id).trigger('change');
                        $('#specific_type').val(data.specific_type).trigger('change');;
                        $('#configuration').val(data.configuration).trigger('change');;
                        $('#zone').val(data.zone).trigger('change');;
                        $('#property_wing').val(data.property_wing);
                        $('#property_unit_no').val(data.property_unit_no);
                        $('#property_status').val(data.property_status).trigger('change');;
                        $('#plot_area').val(data.plot_area);
                        $('#plot_measurement').val(data.plot_measurement).trigger('change');;
                        $('#construction_area').val(data.construction_area);
                        $('#construction_measurement').val(data.construction_measurement).trigger('change');;
                        $('#hot_property').prop('checked', Number(data.hot_property));
                        $('#is_pre_leased').prop('checked', Number(data.pre_leased));
                        $('#property_description').val(data.Property_description);
                        $('#commision').val(data.commission);
                        $('#source_of_property').val(data.source_of_property).trigger('change');;
                        $('#price').val(data.price);
                        $('#price_remarks').val(data.price_remarks);
                        $('#property_remarks').val(data.remarks);
                        $('#gpcb').prop('checked', Number(data.gpcb));
                        $('#gpcb_remarks').val(data.gpcb_remarks);
                        $('#ec_noc').prop('checked', Number(data.ec_noc));
                        $('#ec_noc_remark').val(data.ec_noc_remarks);
                        $('#bail').prop('checked', Number(data.bail));
                        $('#bail_remark').val(data.bail_remarks);
                        $('#gujrat_gas').prop('checked', Number(data.gujrat_gas));
                        $('#gujrat_gas_remark').val(data.gujrat_gas_remarks);
                        $('#discharge').prop('checked', Number(data.discharge));
                        $('#discharge_remark').val(data.discharge_remarks);
                        $('#power').prop('checked', Number(data.power));
                        $('#power_remark').val(data.power_remarks);
                        $('#water').prop('checked', Number(data.water));
                        $('#water_remark').val(data.water_remarks);
                        $('#machinery').prop('checked', Number(data.machinery));
                        $('#machinery_remark').val(data.machinery_remarks);
                        $('#etl_necpt').prop('checked', Number(data.etl_necpt));
                        $('#etl_necpt_remark').val(data.etl_necpt_remarks);
						shouldchangecity = 1
                        $('#all_owner_contacts').html('')
                        if (data.owner_details != '') {
                            details = JSON.parse(data.owner_details);
                            for (let i = 0; i < details.length; i++) {
                                id = makeid(10);
                                $('#all_owner_contacts').append(generate_contact_detail2(id))
                                floatingField();
								$("[data-contact_id=" + id + "] select[name=owner_status]").select2()
                                $("[data-contact_id=" + id + "] input[name=owner_name]").val(details[i][0]);
                                $("[data-contact_id=" + id + "] input[name=owner_contact_no]").val(details[i][1]);
                                $("[data-contact_id=" + id + "] select[name=owner_status]").val(details[i][2]).trigger('change');
                            }
                        }
                        $('#industrialpropertyModal').modal('show');
						triggerChangeinput()
                    }
                });
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

			$(document).on("click", ".open_modal_with_this", function (e) {
				$('#all_owner_contacts').html('')
				$('#all_owner_contacts').append(generate_contact_detail2(makeid(10)));
				$("#all_owner_contacts select").each(function(index) {
					$(this).select2();
				})
                floatingField();
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
