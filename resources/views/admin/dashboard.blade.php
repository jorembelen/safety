@extends('layouts.master')

@section('title', 'Dashboard')
@section('content') 
 
<div class="layout-px-spacing">

<div class="page-header">
    <div class="page-title">
        <h3>Dashboard</h3>
    </div>
    
</div>

<div class="row layout-top-spacing">

@if(auth()->user()->role != 'user')
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
        <div class="widget-four">
            <div class="widget-heading">
                <!-- <h5 class="">Summary</h5> -->
            </div>
            <div class="widget-content">
                <div class="vistorsBrowser">
                    <div class="browser-list">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chrome"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="4"></circle><line x1="21.17" y1="8" x2="12" y2="8"></line><line x1="3.95" y1="6.06" x2="8.54" y2="14"></line><line x1="10.88" y1="21.94" x2="15.46" y2="14"></line></svg>
                        </div>
                        <div class="w-browser-details">
                            <div class="w-browser-info">
                                <h6>Fatality</h6>
                                <p class="browser-count">{{$data[0]}}</p>
                            </div>
                            <div class="w-browser-stats">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-primary" role="progressbar" style="width: {{$data[0]}}%" aria-valuenow="{{$data[0]}}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="browser-list">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-compass"><circle cx="12" cy="12" r="10"></circle><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon></svg>
                        </div>
                        <div class="w-browser-details">
                            
                            <div class="w-browser-info">
                            <h6>Lost Time Injury</h6>
                                <p class="browser-count">{{$data[1]}}</p>
                            </div>

                            <div class="w-browser-stats">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: {{$data[1]}}%" aria-valuenow="{{$data[1]}}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="browser-list">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                        </div>
                        <div class="w-browser-details">
                            
                            <div class="w-browser-info">
                            <h6>Dangerous Occurence</h6>
                                <p class="browser-count">{{$data[2]}}</p>
                            </div>

                            <div class="w-browser-stats">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: {{$data[2]}}%" aria-valuenow="{{$data[2]}}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="browser-list">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>   
                        </div>
                        <div class="w-browser-details">
                            
                            <div class="w-browser-info">
                            <h6>First Aid</h6>
                                <p class="browser-count">{{$data[3]}}</p>
                            </div>

                            <div class="w-browser-stats">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: {{$data[3]}}%" aria-valuenow="{{$data[3]}}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- <div class="browser-list">
                        <div class="w-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
                    </div>
                        <div class="w-browser-details">
                            
                            <div class="w-browser-info">
                            <h6>First Aid - GOSI</h6>
                                <p class="browser-count">{{$data[8]}}</p>
                            </div>

                            <div class="w-browser-stats">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: {{$data[8]}}%" aria-valuenow="{{$data[8]}}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                        </div>

                    </div> -->
                    
                    <div class="browser-list">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        </div>
                        <div class="w-browser-details">
                            <div class="w-browser-info">
                                <h6>Property Damage</h6>
                                <p class="browser-count">{{$data[4]}}</p>
                            </div>
                            <div class="w-browser-stats">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-primary" role="progressbar" style="width: {{$data[4]}}%" aria-valuenow="{{$data[4]}}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
        <div class="widget-four">
            <div class="widget-heading">
                <!-- <h5 class="">Summary</h5> -->
            </div>
            <div class="widget-content">
                <div class="vistorsBrowser">

                   

                    <div class="browser-list">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-target"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg> 
                        </div>
                        <div class="w-browser-details">
                            
                            <div class="w-browser-info">
                            <h6>MTC</h6>
                                <p class="browser-count">{{$data[5]}}</p>
                            </div>

                            <div class="w-browser-stats">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: {{$data[5]}}%" aria-valuenow="{{$data[5]}}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="browser-list">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-slack"><path d="M14.5 10c-.83 0-1.5-.67-1.5-1.5v-5c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5v5c0 .83-.67 1.5-1.5 1.5z"></path><path d="M20.5 10H19V8.5c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"></path><path d="M9.5 14c.83 0 1.5.67 1.5 1.5v5c0 .83-.67 1.5-1.5 1.5S8 21.33 8 20.5v-5c0-.83.67-1.5 1.5-1.5z"></path><path d="M3.5 14H5v1.5c0 .83-.67 1.5-1.5 1.5S2 16.33 2 15.5 2.67 14 3.5 14z"></path><path d="M14 14.5c0-.83.67-1.5 1.5-1.5h5c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5h-5c-.83 0-1.5-.67-1.5-1.5z"></path><path d="M15.5 19H14v1.5c0 .83.67 1.5 1.5 1.5s1.5-.67 1.5-1.5-.67-1.5-1.5-1.5z"></path><path d="M10 9.5C10 8.67 9.33 8 8.5 8h-5C2.67 8 2 8.67 2 9.5S2.67 11 3.5 11h5c.83 0 1.5-.67 1.5-1.5z"></path><path d="M8.5 5H10V3.5C10 2.67 9.33 2 8.5 2S7 2.67 7 3.5 7.67 5 8.5 5z"></path></svg>
                        </div>
                        <div class="w-browser-details">
                            
                        <div class="w-browser-info">
                            <h6>RWC</h6>
                                <p class="browser-count">{{$data[6]}}</p>
                            </div>

                            <div class="w-browser-stats">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: {{$data[6]}}%" aria-valuenow="{{$data[6]}}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="browser-list">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-framer"><path d="M5 16V9h14V2H5l14 14h-7m-7 0l7 7v-7m-7 0h7"></path></svg>
                        </div>
                        <div class="w-browser-details">
                            
                        <div class="w-browser-info">
                            <h6>MVI</h6>
                                <p class="browser-count">{{$data[7]}}</p>
                            </div>

                            <div class="w-browser-stats">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: {{$data[7]}}%" aria-valuenow="{{$data[7]}}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="browser-list">
                        <div class="w-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-command"><path d="M18 3a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3 3 3 0 0 0 3-3 3 3 0 0 0-3-3H6a3 3 0 0 0-3 3 3 3 0 0 0 3 3 3 3 0 0 0 3-3V6a3 3 0 0 0-3-3 3 3 0 0 0-3 3 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 3 3 0 0 0-3-3z"></path></svg>
                        </div>
                        <div class="w-browser-details">
                            
                        <div class="w-browser-info">
                            <h6>Near Miss</h6>
                                <p class="browser-count">{{$data[9]}}</p>
                            </div>

                            <div class="w-browser-stats">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: {{$data[9]}}%" aria-valuenow="{{$data[9]}}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                        </div>

                    </div>
                    
                </div>


                
                
            </div>
        </div>
    </div>
    

    <div class="widget widget-five">
                <div class="widget-content">

                    <div class="header">
                        <div class="header-body">
                            <h6>Notifications</h6>
                        </div>
                    </div>

                    <div class="w-content">
                        <div class="">                                            
                            <p class="task-left">{{$data[8]}}</p>
                            <p class="task-completed"><span>Awaiting</span></p>
                            @if($data[10] != '0')
                            <a href="/admin/awaiting"><p class="task-hight-priority"><span>View Details</span></p></a>
                            @else
                            <p class="task-hight-priority"><span>No Pending!</span></p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
    <div class="widget widget-five">
                <div class="widget-content">

                    <div class="header">
                        <div class="header-body">
                            <h6>Recommendations</h6>
                        </div>
                    </div>

                    <div class="w-content">
                        <div class="">                                            
                            <p class="task-left">{{$data[11]}}</p>
                            <p class="task-completed"><span>On Going</span></p>
                            @if($data[11] != '0')
                            <a href="/recommendations"><p class="task-hight-priority"><span>View Details</span></p></a>
                            @else
                            <p class="task-hight-priority"><span>No Pending!</span></p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if(auth()->user()->role == 'user')
            <div class="widget widget-five">
                        <div class="widget-content">

                            <div class="header">
                                <div class="header-body">
                                    <h6>Notifications Report</h6>
                                </div>
                            </div>

                            <div class="w-content">
                                <div class="">                                            
                                    <p class="task-left">{{$data[10]}}</p>
                                    <p class="task-completed"><span>Awaiting</span></p>
                                    @if($data[10] != '0')
                                    <a href="/awaiting"><p class="task-hight-priority"><span>View Details</span></p></a>
                                    @else
                                    <p class="task-hight-priority"><span>No Pending!</span></p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget widget-five">
                <div class="widget-content">

                    <div class="header">
                        <div class="header-body">
                            <h6>Recommendations</h6>
                        </div>
                    </div>

                    <div class="w-content">
                        <div class="">                                            
                            <p class="task-left">{{$data[12]}}</p>
                            <p class="task-completed"><span>On Going</span></p>
                            @if($data[11] != '0')
                            <a href="/user-recommendations"><p class="task-hight-priority"><span>View Details</span></p></a>
                            @else
                            <p class="task-hight-priority"><span>No Pending!</span></p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            
            @endif
            
</div>
@endsection

                          