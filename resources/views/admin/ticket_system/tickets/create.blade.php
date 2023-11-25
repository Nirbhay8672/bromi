@extends('admin.layouts.app')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="card-header pb-0">
                        <h5 class="mb-3">Open New Ticket</h5>
                         
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="    padding-left: 20%;
                padding-right: 18%;">
                    <div class="card">
                      
                       
                        
                                <div class="form-group" style="
                                            margin-left: 21%;
                                            margin-top: 2%;
                                        ">
                                   
                        
                        
                                            @if (session('status'))
                                                <div class="alert alert-success">
                                                    {{ session('status') }}
                                                </div>
                                            @endif
                        
                                           
                                   
                        
                        
                                                                    
                                            <form class="form-horizontal" role="form" method="POST" action="https://updates.mrweb.co.in/bromi/public/admin/new-ticket" style="
                                                                    padding-left: 4%;
                                                                ">
                                                {!! csrf_field() !!}
                        
                                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                                    <label for="title" class="col-md-4 control-label">Title</label>
                        
                                                    <div class="col-md-6">
                                                        <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">
                        
                                                        @if ($errors->has('title'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('title') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                        
                                                <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                                    <label for="category" class="col-md-4 control-label">Category</label>
                        
                                                    <div class="col-md-6">
                                                        <select id="category" type="category" class="form-control" name="category">
                                                            <option value="">Select Category</option>
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                            @endforeach
                                                        </select>
                        
                                                        @if ($errors->has('category'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('category') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                        
                                                <div class="form-group{{ $errors->has('priority') ? ' has-error' : '' }}">
                                                    <label for="priority" class="col-md-4 control-label">Priority</label>
                        
                                                    <div class="col-md-6">
                                                        <select id="priority" type="" class="form-control" name="priority">
                                                            <option value="">Select Priority</option>
                                                            <option value="low">Low</option>
                                                            <option value="medium">Medium</option>
                                                            <option value="high">High</option>
                                                        </select>
                        
                                                        @if ($errors->has('priority'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('priority') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                        
                                                <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                                                    <label for="message" class="col-md-4 control-label">Message</label>
                        
                                                    <div class="col-md-6">
                                                        <textarea rows="10" id="message" class="form-control" name="message"></textarea>
                        
                                                        @if ($errors->has('message'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('message') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                        <br>
                                                <div class="form-group">
                                                    <div class="col-md-6 col-md-offset-4">
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="fa fa-btn fa-ticket"></i> Open Ticket
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                       
                                </div>
                            
                    </div>

                </div>
            </div>
        </div>
    </div>
 
@endsection
@push('scripts')
    
@endpush









