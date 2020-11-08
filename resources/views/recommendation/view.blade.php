@extends('layouts.master')

@section('title', 'Recommendations List')
@section('content') 
 
                        
                      
<div class="row layout-top-spacing" id="cancel-row">
                              
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Recommendations List</h4>
                                        </div>
                                    </div>
                                </div>
                        <div class="table-responsive mb-4 mt-4">
                        <table id="zero-config" class="table table-hover non-hover" style="width:100%">
                                <thead>
                                <tr>
                                                <th>SN</th>
                                                <th>Notification ID</th>
                                                <th>Investigation ID</th>
                                                <th>Root Cause</th>
                                                <th>Type</th>
                                                <th>recommendation</th>
                                                <th>Type</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
    
    
                                            <tbody>
                                                @foreach ($cause as $item)
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->incident_id }}</td>
                                                <td>{{ $item->report_id }}</td>
                                                <td>{{ $item->root_name }}</td>
                                                <td>{{ $item->type }}</td>
                                                <td>{{ $item->rec_name }}</td>
                                                <td>{{ $item->rec_type }}</td>
                                                <td>
                                                    @if($item->status == 0)
                                                    <span class="badge badge-danger">On Going</span>
                                                    @else
                                                    <span class="badge badge-info">Done</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <div class="dropdown custom-dropdown">
                                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                                        </a>

                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1" style="will-change: transform;">
                                                            <a class="dropdown-item" role="button" data-toggle="modal" data-target="#edit{{$item->id}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> 
                                                            Edit</a>
                                                            @if(auth()->user()->role == 'admin')
                                                            <a role="button" class="dropdown-item" data-toggle="modal" data-target="#deleteModal{{$item->id}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
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

                @foreach ($cause as $item)
                    @include('recommendation.edit_delete')
                @endforeach
@endsection