@extends('superadmin.layouts.superapp')
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
                            <h5 class="mb-3">Leads </h5>
                            <button
                                    class="btn custom-icon-theme-button tooltip-btn"
                                    type="button"
                                    data-bs-toggle="modal"
                                    data-bs-target="#leadModal"
                                    data-tooltip="Add Lead"
                                    onclick="resetData()"
                                ><i class="fa fa-plus"></i></button>
                        </div>
                        <div class="card-body">
                            <div class="table table-responsive">
                                <table class="display" id="enquiryTable">
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>Date</th>
                                            <th>Request</th>
                                            <th>Status</th>
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
    </div>

    <div class="modal fade" id="progressModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Lead Status</h5>
                    <button class="btn-close btn-light" type="button" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <input type="text" class="d-none" name="this_progress_data_id" id="this_progress_data_id">
                    <div class="row mb-1">
                        <div class="form-group col-md-6 m-b-20">
                            <div class="fname">
                                <select name="" id="status" class="form-select" style="border:1px solid black;border-radius:5px;">
                                    <option value="Pending">Pending</option>
                                    <option value="Read">Read</option>
                                    <option value="In-progress">In-progress</option>
                                    <option value="Closed">Closed</option>
                                </select>
                                <span class="text-danger invalid-error d-none" id="status_error">Status is required.</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 m-b-20">
                            <div class="fname">
                                <input value="{{date('Y-m-d')}}" class="form-control" name="followup_date" id="followup_date" type="date" autocomplete="off">
                                <span class="text-danger invalid-error d-none" id="followup_date_error">Follow up date is required.</span>
                            </div>
                        </div>
                        <div class="form-group col-md-6 m-b-20">
                            <div class="fname">
                                <input value="{{date('H:i')}}" class="form-control" name="time" id="time" type="time" autocomplete="off">
                                <span class="text-danger invalid-error d-none" id="time_error">Time is required.</span>
                            </div>
                        </div>
                        <div class="form-group m-b-20">
                            <div class="fname">
                                <textarea name="progress_enquiry" class="form-control" id="progress_enquiry" cols="10" rows="5" placeholder="Enquiry"></textarea>
                                <span class="text-danger invalid-error d-none" id="progress_enquiry_error">Enquiry is required.</span>
                            </div>
                        </div>

                        <div class="text-center mt-3">  
                            <button class="btn custom-theme-button" type="button" onclick="saveProgress()">Save</button>
                            <button class="btn btn-secondary ms-3" style="border-radius: 5px;" type="button" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="leadModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Lead View / Edit</h5>
                    <button class="btn-close btn-light" type="button" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <form class="form-bookmark needs-validation modal_form" method="post" id="modal_form" novalidate="">
                        <input type="text" class="d-none" name="this_data_id" id="this_data_id">
                        <div class="row">
                            <div class="form-group col-md-4 m-b-20">
                                <div class="fname">
                                    <input class="form-control" name="first_name" id="first_name" type="text" autocomplete="off" placeholder="First Name">
                                    <span class="text-danger invalid-error d-none" id="first_name_error">First name is required.</span>
                                </div>
                            </div>
                            <div class="form-group col-md-4 m-b-20">
                                <div class="fname">
                                    <input class="form-control" name="last_name" id="last_name" type="text" autocomplete="off" placeholder="Last Name">
                                    <span class="text-danger invalid-error d-none" id="last_name_error">Last Name is required.</span>
                                </div>
                            </div>
                            <div class="form-group col-md-4 m-b-20">
                                <div class="fname">
                                    <input class="form-control" name="mobile" id="mobile" type="text" autocomplete="off" placeholder="Phone Number">
                                    <span class="text-danger invalid-error d-none" id="mobile_error">Phone Number is required.</span>
                                    <span class="text-danger invalid-error d-none" id="mobile_length_error">Phone Number is invalid.</span>
                                </div>
                            </div>
                            <div class="form-group col-md-4 m-b-20">
                                <div class="fname">
                                    <input placeholder="Email" class="form-control" name="email" id="email"
                                        style="text-transform: none !important;" type="text" autocomplete="off">
                                        <span class="text-danger invalid-error d-none" id="email_error">Email is required.</span>
                                </div>
                            </div>
                            <div class="form-group col-md-4 m-b-20">
                                <div class="fname">
                                    <input placeholder="Company" class="form-control" name="company" id="company" type="text"
                                        autocomplete="off">
                                        <span class="text-danger invalid-error d-none" id="company_error">Company is required.</span>
                                </div>
                            </div>
                            <div class="form-group col-md-4 m-b-20">
                                <div class="fname">
                                    <select name="lead_type" id="lead_type" class="form-control">
                                        <option value="">Lead Type</option>
                                        <option value="Hot">Hot</option>
                                        <option value="Warm">Warm</option>
                                        <option value="Cold">Cold</option>
                                    </select>
                                    <span class="text-danger invalid-error d-none" id="lead_type_error">Lead Type is required.</span>
                                </div>
                            </div>
                            <div class="form-group col-md-4 m-b-20">
                                <div class="fname">
                                    <select name="plan_interested_in" id="plan_interested_in" class="form-control">
                                        <option value="">Plan interested</option>
                                        @foreach($plans as $plan)
                                            <option value="{{ $plan->id }}">{{ $plan->name }} - {{ $plan->price }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger invalid-error d-none" id="plan_interested_in_error">Plan interested in is required.</span>
                                </div>
                            </div>
                            <div class="form-group m-b-20">
                                <div class="fname">
                                    <textarea name="enquiry" class="form-control" id="enquiry" cols="10" rows="5" placeholder="Enquiry"></textarea>
                                    <span class="text-danger invalid-error d-none" id="enquiry_error">Enquiry is required.</span>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-3">  
                            <button class="btn custom-theme-button" type="button" id="saveLead">Save</button>
                            <button class="btn btn-secondary ms-3" style="border-radius: 5px;" type="button" data-bs-dismiss="modal">Cancel</button>
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
            $('#enquiryTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('superadmin.adminEnquiries') }}",
                columns: [
                    { data: 'user_name', name: 'user_name' },
                    { data: 'last_name', name: 'last_name' },
                    { data: 'mobile', name: 'mobile' },
                    { data: 'email', name: 'email' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'enquiry', name: 'enquiry' },
                    { data: 'status', name: 'status' },
                    { data: 'Actions', name: 'Actions' },
                ],
                columnDefs: [
                    { targets: 6, width: '150px' },
                    { targets: 4, width: '100px' },
                    { targets: 6, className: 'text-center' },
                    { targets: 7, className: 'text-center' },
                ]
            });
        });

        function resetData() {
            $('.invalid-error').addClass('d-none');
            $('#modal_form').trigger("reset");
            $('#exampleModalLabel').text('ADD NEW LEAD');
        }

        function getBromiEnq(data) {
            $('#modal_form').trigger("reset");
            $('#exampleModalLabel').text('Edit LEAD');
            var id = $(data).attr('data-id');
            $.ajax({
                type: "POST",
                url: "{{ route('superadmin.showEnquiry') }}",
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    $('#first_name').val(data.brom_enq.user_name);
                    $('#last_name').val(data.brom_enq.last_name);
                    $('#mobile').val(data.brom_enq.mobile);
                    $('#email').val(data.brom_enq.email);
                    $('#company').val(data.brom_enq.company);
                    $('#lead_type').val(data.brom_enq.lead_type).trigger('change');
                    $('#plan_interested_in').val(data.brom_enq.plan_interested_in).trigger('change');
                    $('#enquiry').val(data.brom_enq.enquiry);
                    $('#this_data_id').val(data.brom_enq.id);
                    $('#leadModal').modal('show');
                    $('#saveEnq').addClass('d-none');
                }
            });
        }

        function updateStatusForm(data) {
            var id = $(data).attr('data-id');
            $.ajax({
                type: "POST",
                url: "{{ route('superadmin.showEnquiry') }}",
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    $('#followup_date').val(data.brom_enq.next_follow_up_date);
                    $('#time').val(data.brom_enq.next_follow_up_time);
                    $('#progress_enquiry').val(data.brom_enq.enquiry);
                    $('#this_progress_data_id').val(data.brom_enq.id);
                    $('#status').val(data.brom_enq.status).trigger('change');
                    $('#progressModal').modal('show');
                }
            });
        }

        function saveProgress(){
            let all_error = document.querySelectorAll('.invalid-error');

            all_error.forEach(element => {
                element.classList.add('d-none');
            });

            let valid = true;

            if($('#status').val() == '') {
                document.getElementById('status_error').classList.remove('d-none');
                valid = false;
            }

            if($('#followup_date').val() == '') {
                document.getElementById('followup_date_error').classList.remove('d-none');
                valid = false;
            }

            if($('#time').val() == '') {
                document.getElementById('time_error').classList.remove('d-none');
                valid = false;
            }

            if($('#progress_enquiry').val() == '') {
                document.getElementById('progress_enquiry_error').classList.remove('d-none');
                valid = false;
            }

            if (!valid) {
                return;
            }

            var id = $('#this_progress_data_id').val();

            $.ajax({
                type: "POST",
                url: "{{ route('superadmin.saveProgress') }}",
                data: {
                    id: id,
                    status: $('#status').val(),
                    followup_date: $('#followup_date').val(),
                    time: $('#time').val(),
                    enquiry: $('#progress_enquiry').val(),
                    _token: '{{ csrf_token() }}',
                },
                success: function(data) {
                    $('#enquiryTable').DataTable().draw();
                    $('#progressModal').modal('hide');
                },
                error:function(error) {
                    console.log(error);
                }
            });
        }

        $(document).on('click', '#saveLead', function(e) {
            e.preventDefault();

            let all_error = document.querySelectorAll('.invalid-error');

            all_error.forEach(element => {
                element.classList.add('d-none');
            });
            
            let valid = true;
            
            if($('#first_name').val() == '') {
                document.getElementById('first_name_error').classList.remove('d-none');
                valid = false;
            }
            
            if($('#last_name').val() == '') {
                document.getElementById('last_name_error').classList.remove('d-none');
                valid = false;
            }
            
            if($('#mobile').val() == '') {
                document.getElementById('mobile_error').classList.remove('d-none');
                valid = false;
            }

            if($('#mobile').val() != '') {
                if($('#mobile').val().length != 10 || isNaN($('#mobile').val())) {
                    document.getElementById('mobile_length_error').classList.remove('d-none');
                    valid = false;
                }
            }

            if($('#email').val() == '') {
                document.getElementById('email_error').classList.remove('d-none');
                valid = false;
            }

            if($('#company').val() == '') {
                document.getElementById('company_error').classList.remove('d-none');
                valid = false;
            }
            
            if($('#lead_type').val() == '') {
                document.getElementById('lead_type_error').classList.remove('d-none');
                valid = false;
            }
            
            if($('#plan_interested_in').val() == '') {
                document.getElementById('plan_interested_in_error').classList.remove('d-none');
                valid = false;
            }
            
            if($('#enquiry').val() == '') {
                document.getElementById('enquiry_error').classList.remove('d-none');
                valid = false;
            }
            
            if (!valid) {
                return;
            }

            var id = $('#this_data_id').val();

            $.ajax({
                type: "POST",
                url: "{{ route('superadmin.saveEnquiry') }}",
                data: {
                    id: id,
                    user_name: $('#first_name').val(),
                    last_name: $('#last_name').val(),
                    mobile: $('#mobile').val(),
                    email: $('#email').val(),
                    company: $('#company').val(),
                    lead_type: $('#lead_type').val(),
                    followup_date: $('#followup_date').val(),
                    time: $('#time').val(),
                    plan_interested_in: $('#plan_interested_in').val(),
                    mobile_code: $('#mobile_code').val(),
                    enquiry: $('#enquiry').val(),
                    _token: '{{ csrf_token() }}',
                },
                success: function(data) {
                    $('#enquiryTable').DataTable().draw();
                    $('#leadModal').modal('hide');
                },
                error:function(error) {
                    console.log(error);
                    if (error.responseJSON) {
                        var errorMessage = 'Something went wrong! May be duplicate email.';
                        $('#em_err').remove();
                        $('#email').after('<span class="text-danger" id="em_err">' + errorMessage + '</span>');
                    }
                }
            });
        })

    </script>
@endpush
