@extends('superadmin.layouts.superapp')
@section('content')
<style>
    td {
        height: 37px !important;
    }
</style>
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
                        <h5 class="mb-3">Query</h5>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <div id="builderTable_wrapper" class="dataTables_wrapper no-footer">
                            <table class="display dataTable no-footer" id="builderTable" role="grid" aria-describedby="builderTable_info" style="width: 1296px;">
                                <thead>
                                    <tr role="row">
                                        <th>Category</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Last Updated</th>
                                        <th>Actions</th>
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
                                               <span class="label label-success p-1" style="border-radius: 5px;">{{ $ticket->status }}</span>
                                           @else
                                               <span class="label label-danger p-1" style="border-radius: 5px;">{{ $ticket->status }}</span>
                                           @endif
                                       </td>
                                       <td>{{ $ticket->updated_at }}</td>
                                       <td class="w3-bar">
                                            @if($ticket->status === 'Open')
                                            <form action="{{ url('superadmin/close_ticket/' . $ticket->ticket_id) }}" method="POST">
                                                {!! csrf_field() !!}
                                                <div class="text-center">
                                                    <a href="{{ url('superadmin/tickets/'. $ticket->ticket_id) }}" id="demo" class="btn btn-primary">Comment</a>
                                                    <button type="submit" class="btn btn-sm" style="background-color: red;color:white">Close</button>
                                                </div>
                                            </form>
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
