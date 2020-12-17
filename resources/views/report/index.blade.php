@extends('layouts.master')

@section('title', 'Investigations List')
@section('content') 
 
                        
                      
<div class="row layout-top-spacing" id="cancel-row">
                              
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <a href="{{ \URL::previous() }}" type="button"class="btn btn-primary mb-2 float-right">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                                Back
                                            </a>
                                            <h4>Investigations List</h4>
                                        </div>
                                    </div>
                                </div>
                        <div class="table-responsive mb-4 mt-4">
                        <table id="zero-config" class="table table-hover non-hover" style="width:100%">
                                <thead>
                                <tr>
                                                <th>ID</th>
                                                <th>Notification ID</th>
                                                <th>Incident Type</th>
                                                <th>Description</th>
                                                <th>Line Manager</th>
                                                <th>Place of Incident</th>
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
                                                <td>{{ $report->manager->badge }} - {{ $report->manager->name }} ({{ $report->manager->designation }})</td>
                                                <td>{{ $report->inc_loc }}</td>
                                                <td class="text-center">
                                                    <div class="dropdown custom-dropdown">
                                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                                        </a>

                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1" style="will-change: transform;">
                                                            <a class="dropdown-item" href="{{ route('reports.show', $report->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg> 
                                                            View</a>
                                                            <a class="dropdown-item" href="{{ route('recommendations.show', $report->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-help-circle"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                                                            Recommendation</a>
                                                            @if(auth()->user()->role == 'user' || auth()->user()->role == 'super_admin' || auth()->user()->role == 'admin')
                                                            <a class="dropdown-item" href="{{ route('reports.edit', $report->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> 
                                                            Edit</a>
                                                            <a target="_blank" class="dropdown-item" href="{{ route('print.report', $report->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer action-print" data-toggle="tooltip" data-placement="top" data-original-title="Reply"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
                                                            Print</a>
                                                            @endif
                                                            @if(auth()->user()->role == 'admin' || auth()->user()->role == 'super_admin')
                                                            <a role="button" class="dropdown-item" data-toggle="modal" data-target="#deleteModal{{$report->id}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                             Delete</a>@endif
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

                @foreach ($reports as $report)
                    @include('report.delete')
                @endforeach

@endsection