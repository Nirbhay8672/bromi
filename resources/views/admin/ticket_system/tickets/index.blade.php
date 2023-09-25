@extends('admin.layouts.app')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h5 class="mb-3">Query 
                                <a class="btn btn-pill btn-primary" style="float: right" type="button" href="{{route('admin.create')}}">Add New request</a>
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" style="background-color: rgba(223, 223, 223, 0.804)">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Title</th>
                                            <th>Status</th>
                                            <th>Last Update</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tickets as $ticket)
                                        <tr>
                                            <td>
                                                {{ $ticket->category->name }}
                                            </td>
                                            <td>
                                                <a>
                                                    #{{ $ticket->ticket_id }} - {{ $ticket->title }}
                                                </a>
                                            </td>
                                            <td>
                                                @if ($ticket->status === 'Open')
                                                    <span class="label label-success">{{ $ticket->status }}</span>
                                                @else
                                                    <span class="label label-danger">{{ $ticket->status }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $ticket->updated_at }}</td>
                                            <td class="w3-bar" style="padding-left: 6%;">
                                                @if($ticket->status === 'Open') 
                                                    <a href="{{ url('admin/tickets/'. $ticket->ticket_id) }}" id="demo"   class="btn btn-primary extra-fields-customer">Comment</a>
                                                   <!--  <form action="{{ url('admin/close_ticket/' . $ticket->ticket_id) }}" method="POST">-->
                                                   <!--    {!! csrf_field() !!}-->
                                                   <!--    <button type="submit" class="btn btn-danger" style="float: right">Close</button>-->
                                                   <!--</form>-->
                                               @endif
                                           </td>
                                        </tr>
                                        @endforeach
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
