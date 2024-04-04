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
            <div class="row"> 
                <div class="col"> 
                    <div class="card o-hidden">
                        <div class="card-body bg-light-green">
                            <div class="media static-widget my-3">
                                <div class="media-body text-center">
                                    <h1 class="font-roboto">{{ $total_active_users }}</h1>
                                    <h3 class="mb-0">Total Active User</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col"> 
                    <div class="card o-hidden">
                        <div class="card-body bg-light-orange">
                            <div class="media static-widget my-3">
                                <div class="media-body text-center">
                                    <h1 class="font-roboto">{{ $total_ex_users }}</h1>
                                    <h3 class="mb-0">Total users</h3>
                                    <small>Package expire in next month / next week</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col"> 
                    <div class="card o-hidden">
                        <div class="card-body bg-info">
                            <div class="media static-widget my-3">
                                <div class="media-body text-center">
                                    <h1 class="font-roboto">{{ $total_builder }}</h1>
                                    <h3 class="mb-0">Total Builders</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="col">
                    <div class="card o-hidden">
                        <div class="card-body bg-light-purpel">
                            <div class="media static-widget my-3">
                                <div class="media-body text-center">
                                    <h1 class="font-roboto">{{ $total_members }}</h1>
                                    <h3 class="mb-0">Total Members</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
