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
                            @include('admin.properties.change_menu')

                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="display" id="propertyTable">
                                    <thead>
                                        <tr>
                                            <th>Project Name</th>
                                            <th>Property info</th>
                                            <th>Units</th>
                                            <th>Price</th>
                                            <th>Remarks</th>
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
                    ajax: {
                        url: "{{ route('admin.shared.properties') }}",
                        data: function(d) {
                            //

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
                            data: 'units',
                            name: 'units'
                        },
                        {
                            data: 'price',
                            name: 'price'
                        },
                        {
                            data: 'remarks',
                            name: 'remarks'
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
                            "width": "5%",
                            "targets": 2
                        },
                        {
                            "width": "10%",
                            "targets": 3
                        },
                        {
                            "width": "15%",
                            "targets": 4
                        },
                        {
                            "width": "15%",
                            "targets": 5
                        },
                    ],
                });
            });
        </script>
    @endpush
