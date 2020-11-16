@extends('layouts.master')

@section('title', 'Notification')
@section('content') 
 
                        
                      
<div class="row layout-top-spacing" id="cancel-row">
                              
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                <div class="widget-header">
                        @if(auth()->user()->role != 'manager')
                                    <a href="{{ route('incidents.create') }}" type="button"class="btn btn-primary mb-2 float-right">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                        Create
                                    </a>
                        @endif
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Notifications List</h4>
                                        </div>
                                    </div>
                                </div>
                        <div class="table-responsive mb-4 mt-4">
                            <table id="zero-config" class="table table-hover" style="width:100%">
                                <thead>
                                <tr>
                                                <th>ID</th>
                                                <th>Incident Type</th>
                                                <th>Safety Officer</th>
                                                <th>Project Name</th>
                                                <th>WPS</th>
                                                <th>Severity</th>
                                                <th>Status</th>
                                                <th>Date & Time of Incident</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
    
    
                                            <tbody>
                                                @foreach ($incidents as $incident)
                                            <tr>
                                                <td>{!! $incident->id !!}</td>
                                                <td>
                                                <a href="{{ route('incidents.show', $incident->id) }}">{{ $incident->type }}</a>
                                                </td>
                                                <td>{{ $incident->officer->badge }} - {{ $incident->officer->name }} ({{ $incident->officer->designation }})</td>
                                                <td>{{ $incident->locations->name }}</td>
                                                <td>{{ $incident->wps }}</td>
                                                <td>{{ $incident->severity }}</td>
                                                <td>
                                                        @if($incident->status == 0)
                                                        <a class="bs-tooltip" title="Click to add Investigation Report!" href="/report/{{$incident->id}}"><span class="badge badge-danger">Awaiting</span></a>
                                                        @else
                                                        <a class="bs-tooltip" title="Click to view Investigation Report!" href="/show-report/{{$incident->id}}"><span class="badge badge-info">Closed</span></a>
                                                        @endif


                                                </td>
                                                <td>{{ date('M-d-Y h:i a', strtotime($incident->date)) }}</td>
                                                <td class="text-center">
                                                    <div class="dropdown custom-dropdown">
                                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                                        </a>

                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1" style="will-change: transform;">
                                                            <a class="dropdown-item" href="{{ route('incidents.show', $incident->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg> 
                                                            View</a>
                                                            <a class="dropdown-item" href="{{ route('print.notification', $incident->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer action-print" data-toggle="tooltip" data-placement="top" data-original-title="Reply"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
                                                            Print</a>
                                                            @if(auth()->user()->role != 'manager')
                                                            <a class="dropdown-item" href="{{ route('incidents.edit', $incident->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> 
                                                            Edit</a>
                                                            @endif
                                                            @if(auth()->user()->role == 'admin')
                                                            <a role="button" class="dropdown-item" data-toggle="modal" data-target="#deleteModal{{$incident->id}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                             Delete</a> @endif
                                                        </div>
                                                    </div>
                                                </td>
                                           
                                            </tr>
                                           
                                            @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                @foreach ($incidents as $incident)
                    @include('incidents.delete_modal')
                @endforeach
@endsection