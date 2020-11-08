@extends('layouts.master')

@section('title', 'Remarks')
@section('content') 
 
                        
                      
<div class="row layout-top-spacing" id="cancel-row">
                              
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
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