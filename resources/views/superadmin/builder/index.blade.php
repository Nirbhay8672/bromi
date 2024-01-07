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
                        <h5 class="mb-3">Builders </h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="builderTable">
                                <thead>
                                    <tr>
                                        <th>Builder Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Total Projects</th>
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
</div>
@endsection
@push('scripts')
<script>

    $(document).ready(function() {
        $('#builderTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('superadmin.builders') }}",
            columns: [{
                    data: 'builder_name',
                    name: 'builder_name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'mobile_number',
                    name: 'mobile_number'
                },
                {
                    data: 'projects_count',
                    name: 'projects_count'
                },
            ]
        });
    });

</script>
@endpush
