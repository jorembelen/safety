@extends('layouts.master')

@section('title', 'Summary')
@section('content') 
 
                        
                      
<div class="row layout-top-spacing" id="cancel-row">
                              
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Summary</h4>
                                        </div>
                                    </div>
                                </div>
                        <div class="table-responsive mb-4 mt-4">
                        <table id="zero-config" class="table table-hover non-hover" style="width:100%">
                                <thead>
                                <tr>
                                                <th>Invest. ID</th>
                                                <th>Notif. ID</th>
                                                <th>Incident Type</th>
                                                <th>Description</th>
                                                <th>Project Location</th>
                                                <th>WPS</th>
                                                <th>Severity</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
    
    
                                            <tbody>
                                                @foreach ($reports as $report)
                                            <tr>
                                            <td>{{ $report->id }}</td>
                                                <td>{{ $report->incident_id }}</td>
                                                <td>{{ $report->incident->type }}</td>
                                                <td>{{ Str::limit($report->description, 200) }}</td>
                                                <td>{{ $report->location->loc_name }}</td>
                                                <td>{{ $report->incident->wps }}</td>
                                                <td>{{ $report->incident->severity }}</td>
                                                <td class="text-center">
                                                    <div class="dropdown custom-dropdown">
                                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                                        </a>

                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1" style="will-change: transform;">
                                                            <a class="dropdown-item" href="{{ route('reports.show', $report->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg> 
                                                            View</a>
                                                    @if($report->remarks != 0)
                                                        @if(auth()->user()->role != 'user')
                                                            <a class="dropdown-item" role="button" href="{{ route('remarks.view', $report->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bookmark"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path></svg>
                                                            View Remarks</a>
                                                        @endif
                                                    @endif
                                                        <!-- @if(auth()->user()->role == 'admin')
                                                            <a class="dropdown-item" href="{{ route('recommendations.show', $report->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-help-circle"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                                                            Recommendation</a>
                                                        @endif -->
                                                        <!-- @if(auth()->user()->role != 'manager')
                                                            <a class="dropdown-item" href="{{ route('reports.edit', $report->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> 
                                                            Edit</a>
                                                        @endif
                                                            @if(auth()->user()->role == 'admin')
                                                            <a role="button" class="dropdown-item" data-toggle="modal" data-target="#deleteModal{{$report->id}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                             Delete</a>@endif -->
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

@endsection