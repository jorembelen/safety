@extends('layouts.master')

@section('title', 'Remarks')
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
                                            <h4>Remarks</h4>
                                        </div>
                                    </div>
                                </div>
                        <div class="table-responsive mb-4 mt-4">
                        <table id="zero-config" class="table table-hover non-hover" style="width:100%">
                                <thead>
                                <tr>
                                                <th>Invest. ID</th>
                                                <th>Notif. ID</th>
                                                <th>Remarks</th>
                                                <th>Notes</th>
                                                <th>Created by</th>
                                                <th>Created At</th>
                                                <!-- <th>Action</th> -->
                                            </tr>
                                            </thead>
    
    
                                            <tbody>
                                                @foreach ($remarks as $remark)
                                            <tr>
                                                <td>{{ $remark->incident_id }}</td>
                                                <td>{{ $remark->report_id }}</td>
                                                <td>{{ $remark->status }}</td>
                                                <td>{{ $remark->note }}</td>
                                                <td>{{ $remark->user->name }}</td>
                                                <td>{{ $remark->created_at }}</td>
                                                <!-- <td></td> -->
                                            </tr>
                                           
                                            @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

@endsection