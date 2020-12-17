@extends('layouts.master')

@section('title', 'Notification Details ')
@section('content') 


 <div class="col-lg-12 layout-spacing mt-4">  
<div class="bio layout-spacing ">
                            <div class="widget-content widget-content-area">
                                <a href="{{ \URL::previous() }}" type="button"class="btn btn-primary mb-2 float-right">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                    Back
                                </a> 
                                <h5 class="">Safety Officer: </h5> <h4>{{ $incidents->officer->badge }} - {{ $incidents->officer->name }} ({{ $incidents->officer->designation }})</h4>
                               
                               
                                <div class="bio-skill-box">
                                    <br>
                                    <div class="row">
                                        
                                        <div class="col-12 col-xl-3 col-lg-12 mb-xl-5 mb-5 ">
                                            
                                            <div class="d-flex b-skills">
                                                <div>
                                                </div>
                                                <div class="">
                                                    <h5>Incident Type</h5>
                                                    <p>{{ $incidents->type }}</p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-12 col-xl-2 col-lg-12 mb-xl-5 mb-5 ">
                                            
                                            <div class="d-flex b-skills">
                                                <div>
                                                </div>
                                                <div class="">
                                                    <h5>Incident Category</h5>
                                                    <p>{{ $incidents->inc_category }}</p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-12 col-xl-2 col-lg-12 mb-xl-5 mb-5 ">
                                            
                                            <div class="d-flex b-skills">
                                                <div>
                                                </div>
                                                <div class="">
                                                    <h5>Insurance</h5>
                                                    <p>{{ $incidents->insurance }}</p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-12 col-xl-5 col-lg-12 mb-xl-5 mb-5 ">
                                            
                                            <div class="d-flex b-skills">
                                                <div>
                                                </div>
                                                <div class="">
                                                    <h5>Person Involved</h5>
                                                    <p>
                                                    {{ $incidents->involved }}
                                                    </p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-12 col-xl-3 col-lg-12 mb-xl-5 mb-5 ">
                                            
                                            <div class="d-flex b-skills">
                                                <div>
                                                </div>
                                                <div class="">
                                                    <h5>Injured Body Location</h5>
                                                    <p>{{ $incidents->injury_location }}</p>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-12 col-xl-3 col-lg-12 mb-xl-5 mb-5 ">
                                            
                                            <div class="d-flex b-skills">
                                                <div>
                                                </div>
                                                <div class="">
                                                    <h5>Injury Sustain</h5>
                                                    <p>{{ $incidents->injury_sustain }}</p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-12 col-xl-3 col-lg-12 mb-xl-5 mb-5 ">
                                            
                                            <div class="d-flex b-skills">
                                                <div>
                                                </div>
                                                <div class="">
                                                    <h5>Immediate Causes</h5>
                                                    <p>{{ $incidents->cause }}</p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-12 col-xl-3 col-lg-12 mb-xl-5 mb-5 ">
                                            
                                            <div class="d-flex b-skills">
                                                <div>
                                                </div>
                                                <div class="">
                                                    <h5>Equipment(s) Involved</h5>
                                                    <p>{{ $incidents->equipment }}</p>
                                                </div>
                                            </div>

                                        </div>
                                    
                                        <div class="col-12 col-xl-6 col-lg-12 mb-xl-5 mb-5 ">
                                            
                                            <div class="d-flex b-skills">
                                                <div>
                                                </div>
                                                <div class="">
                                                    <h5>Description</h5>
                                                    <p>{{ $incidents->description }}</p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-12 col-xl-6 col-lg-12 mb-xl-5 mb-5 ">
                                            
                                            <div class="d-flex b-skills">
                                                <div>
                                                </div>
                                                <div class="">
                                                    <h5>Immediate Action(s)</h5>
                                                    <p>{{ $incidents->action }}</p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-12 col-xl-2 col-lg-12 mb-xl-5 mb-5 ">
                                            
                                            <div class="d-flex b-skills">
                                                <div>
                                                </div>
                                                <div class="">
                                                    <h5>WPS</h5>
                                                    <p>{{ $incidents->wps }}</p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-12 col-xl-2 col-lg-12 mb-xl-5 mb-5 ">
                                            
                                            <div class="d-flex b-skills">
                                                <div>
                                                </div>
                                                <div class="">
                                                    <h5>Severity</h5>
                                                    <p>{{ $incidents->severity }}</p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-12 col-xl-6 col-lg-12 mb-xl-5 mb-5 ">
                                            
                                            <div>
                                                <div>
                                                </div>
                                                <div class="">
                                                @if(!empty($incidents->docs))
                                                    <a class="bs-tooltip" title="Click to download this attachment!" href="{{ url('/files/documents/'.$incidents->docs) }}" target="_blank" rel="noopener noreferrer">
                                                    <button class="btn btn-danger mb-2 mr-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                                    Attachment</button>
                                                    </a>
                                                @else
                                                <h3>No Attached File!</h3>
                                                @endif
                                                </div>
                                            </div>

                                        </div>
                                            
                                       

                                        <!-- End row -->
                                    </div>
                                    
                                    <h8 >Submitted by: <strong>{{ $incidents->user->name }} - ({{ date('M-d-Y h:i a', strtotime($incidents->created_at)) }})</strong></h8>
                                </div>

                            </div>                                
                        </div>

                    </div>
                    </div>

@endsection