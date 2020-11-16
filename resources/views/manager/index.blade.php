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
                                                <th>Project Name</th>
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
                                                <td>{{ $report->location->name }}</td>
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