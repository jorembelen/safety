@extends('layouts.master')

@section('title', 'HSE Web App')
@section('content') 
 
<div class="layout-px-spacing">

    <div class="page-header">
        <div class="page-title">
            <h3></h3>
        </div>
    </div>

    <div class="row layout-top-spacing">
    @if(auth()->user()->role == 'super_admin' || auth()->user()->role == 'admin' || auth()->user()->role == 'gm'
    || auth()->user()->role == 'hsem' || auth()->user()->role == 'member')

        <div class="col-xl-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Incident Type</h6>
                    <canvas id="chartjsBar"></canvas>
                </div>
            </div>
        </div>
            <div class="col-xl-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        
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
                                        @if($data[8] != '0')
                                        <a href="/admin/awaiting"><p class="task-hight-priority"><span>View Details</span></p></a>
                                        @else
                                        <p class="task-hight-priority"><span>No Pending!</span></p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="widget widget-five">
                            <div class="widget-content">
                
                                <div class="header">
                                    <div class="header-body">
                                        <h6>Notifications</h6>
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

                    </div>
                </div>
            </div>

            <div class="col-xl-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Incident Type - WPS</h6>
                        <canvas id="chartjsArea"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Root Cause</h6>
                        <canvas id="chartjsLine"></canvas>
                    </div>
                </div>
            </div>
            @endif
@if(auth()->user()->role == 'user' || auth()->user()->role == 'site_member')
            <div class="col-xl-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="widget widget-five">
                            <div class="widget-content">
                
                                <div class="header">
                                    <div class="header-body">
                                        <h6>Notifications</h6>
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

                    </div>
                </div>
            </div>
            <div class="col-xl-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="widget widget-five">
                            <div class="widget-content">
                
                                <div class="header">
                                    <div class="header-body">
                                        <h6>Notifications</h6>
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

                    </div>
                </div>
            </div>
@endif
    </div>
</div>

@include('includes.scripts')

{{-- For Category & WPS --}}
<script>
    var sCol = {
    chart: {
        height: 350,
        type: 'bar',
        toolbar: {
          show: false,
        }
    },
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'  
        },
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
    },
    series: [{
        name: 'WPS-3',
        data: ['{{ $fatality[0] }}', '{{ $lostTimeInjury[0] }}', '{{ $dangerousOccurence[0] }}', '{{ $firstAid[0] }}', '{{ $propertyDamage[0] }}', '{{ $mtc[0] }}', '{{ $rwc[0] }}', '{{ $mvi[0] }}']
    }, {
        name: 'WPS-4',
        data: ['{{ $fatality[1] }}', '{{ $lostTimeInjury[1] }}', '{{ $dangerousOccurence[1] }}','{{ $firstAid[1] }}', '{{ $propertyDamage[1] }}', '{{ $mtc[1] }}', '{{ $rwc[1] }}', '{{ $mvi[1] }}']
    }, {
        name: 'WPS-5',
        data: ['{{ $fatality[2] }}', '{{ $lostTimeInjury[2] }}', '{{ $dangerousOccurence[2] }}', '{{ $firstAid[2] }}', '{{ $propertyDamage[2] }}', '{{ $mtc[2] }}', '{{ $rwc[2] }}', '{{ $mvi[2] }}']
    }],
    xaxis: {
        categories: [ 
            'Fatality', 'Lost Time Injury', 'Dangerous Occurence', 'First Aid', 'Property Damage', 
            'MTC', 'RWC', 'MVI'
        ],
    },
    yaxis: {
        title: {
            // text: '$ (thousands)'
        }
    },
    fill: {
        opacity: 1

    },
    tooltip: {
        y: {
            formatter: function (val) {
                return val 
            }
        }
    }
}

var chart = new ApexCharts(
    document.querySelector("#s-col"),
    sCol
);

chart.render();
</script>
{{-- End --}}



{{-- For Root Cause --}}
<script>
    var sBar = {
    chart: {
        height: 250,
        type: 'line',
        toolbar: {
          show: false,
        }
    },
    plotOptions: {
        bar: {
            horizontal: true,
        }
    },
    dataLabels: {
        enabled: false
    },
    series: [{
        data: [
            '{{$cause[0]}}', '{{$cause[1]}}', '{{$cause[2]}}', '{{$cause[3]}}'
            ]
    }],
    xaxis: {
        categories: [
            'People', 'Process & Procedure', 'Equipment', 'Workplace'
        ],
    }
}

var chart = new ApexCharts(
    document.querySelector("#s-bar"),
    sBar
);

chart.render();
</script>
{{-- End --}}


<script>
    var sBar = {
    chart: {
        height: 250,
        type: 'area',
        toolbar: {
          show: false,
        }
    },
    plotOptions: {
        bar: {
            horizontal: true,
        }
    },
    dataLabels: {
        enabled: false
    },
    series: [{
        data: [
            '{{$userArr[1]}}', '{{$userArr[2]}}', '{{$userArr[3]}}', '{{$userArr[4]}}', '{{$userArr[5]}}', '{{$userArr[6]}}',
            '{{$userArr[7]}}', '{{$userArr[8]}}', '{{$userArr[9]}}', '{{$userArr[10]}}', '{{$userArr[11]}}', '{{$userArr[12]}}'
            ]
    }],
    xaxis: {
        categories: [
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'
        ],
    }
}

var chart = new ApexCharts(
    document.querySelector("#s-bar-Monthly"),
    sBar
);

chart.render();
</script>

<script>
    var donutChart = {
    chart: {
        height: 350,
        type: 'donut',
        toolbar: {
          show: false,
        }
    },
    series: ['{{$cause[0]}}', '{{$cause[1]}}', '{{$cause[2]}}', '{{$cause[3]}}'],
    responsive: [{
        breakpoint: 480,
        options: {
            chart: {
                width: 200
            },
            legend: {
                position: 'bottom'
            }
        }
    }]
}

var donut = new ApexCharts(
    document.querySelector("#donut-chart"),
    donutChart
);

donut.render();
</script>


{{-- For Incident Category --}}
<script>
    var sBar = {
    chart: {
        height: 350,
        type: 'bar',
        toolbar: {
          show: false,
        }
    },
    plotOptions: {
        bar: {
            horizontal: true,
        }
    },
    dataLabels: {
        enabled: false
    },
    series: [{
        data: ['{{$data[0]}}', '{{$data[1]}}', '{{$data[2]}}', '{{$data[3]}}', '{{$data[4]}}', '{{$data[5]}}', '{{$data[6]}}', '{{$data[7]}}', '{{$data[9]}}']
    }],
    xaxis: {
        categories: [
            'Fatality', 'Lost Time Injury', 'Dangerous Occurence', 'First Aid', 'Property Damage', 
            'MTC', 'RWC', 'MVI', 'Near Miss'
        ],
    }
}

    var chart = new ApexCharts(
        document.querySelector("#category-bar"),
        sBar
    );

    chart.render();
</script>
{{-- End --}}

<script>
$(function() {
  'use strict';

  // Bar chart - Incident Type
  if($('#chartjsBar').length) {
    new Chart($("#chartjsBar"), {
      type: 'bar',
      data: {
        labels: [ 
            'Fatality', 'Lost Time Injury', 'Dangerous Occurence', 'First Aid', 'Property Damage', 
            'MTC', 'RWC', 'MVI', 'Near Miss'
        ],
        datasets: [
          {
            label: "Total",
            backgroundColor: ["#43A047","#7ee5e5","#66d1d1","#FF0000","#0F2343","#CC6699", "#99FFFF", "#4DD0E1", "#E67A77"],
            data: [
                '{{$data[0]}}', '{{$data[1]}}', '{{$data[2]}}', '{{$data[3]}}', '{{$data[4]}}', '{{$data[5]}}', '{{$data[6]}}', '{{$data[7]}}', '{{$data[9]}}'
            ]
          }
        ]
      },
      options: {
        legend: { display: false },
      }
    });
  }

   // Bar chart - Incident Type (WPS)
  if($('#chartjsGroupedBar').length) {
    new Chart($('#chartjsGroupedBar'), {
      type: 'bar',
      data: {
        labels: [
            'Fatality', 'Lost Time Injury', 'Dangerous Occurence', 'First Aid', 'Property Damage', 
            'MTC', 'RWC', 'MVI'
        ],
        datasets: [
          {
            label: "WPS-3",
            backgroundColor: "#f77eb9",
            data: [
                '{{ $fatality[0] }}', '{{ $lostTimeInjury[0] }}', '{{ $dangerousOccurence[0] }}', '{{ $firstAid[0] }}', '{{ $propertyDamage[0] }}', '{{ $mtc[0] }}', '{{ $rwc[0] }}', '{{ $mvi[0] }}'
            ]
          }, {
            label: "WPS-4",
            backgroundColor: "#7ee5e5",
            data: [
                '{{ $fatality[1] }}', '{{ $lostTimeInjury[1] }}', '{{ $dangerousOccurence[1] }}','{{ $firstAid[1] }}', '{{ $propertyDamage[1] }}', '{{ $mtc[1] }}', '{{ $rwc[1] }}', '{{ $mvi[1] }}'
            ]
          }, {
            label: "WPS-5",
            backgroundColor: "#FF0000",
            data: [
                '{{ $fatality[2] }}', '{{ $lostTimeInjury[2] }}', '{{ $dangerousOccurence[2] }}', '{{ $firstAid[2] }}', '{{ $propertyDamage[2] }}', '{{ $mtc[2] }}', '{{ $rwc[2] }}', '{{ $mvi[2] }}'
                ]
          }
        ]
      }
    });
  }

//   RootCause
  if($('#chartjsLine').length) {
    new Chart($('#chartjsLine'), {
      type: 'line',
      data: {
        labels: [
            'People', 'Process & Procedure', 'Equipment', 'Workplace'
        ],
        datasets: [{ 
            data: [
                '{{$cause[0]}}', '{{$cause[1]}}', '{{$cause[2]}}', '{{$cause[3]}}'
            ],
            label: "Root Cause",
            borderColor: "#F13C6E",
            backgroundColor: "rgba(0,0,0,0)",
            fill: false
          }
        ]
      }
    });
  }

  if($('#chartjsDoughnut').length) {
    new Chart($('#chartjsDoughnut'), {
      type: 'doughnut',
      height: 50,
      data: {
        labels: [
            'People', 'Process & Procedure', 'Equipment', 'Workplace'
        ],
        datasets: [
          {
            label: "Population (millions)",
            backgroundColor: ["#7ee5e5","#f77eb9","#4d8af0", "#FFEB3B", "#FFCCBC"],
            data: [
                '{{$cause[0]}}', '{{$cause[1]}}', '{{$cause[2]}}', '{{$cause[3]}}'
            ]
          }
        ]
      }
    });
  }

  if($('#chartjsArea').length) {
    new Chart($('#chartjsArea'), {
      type: 'line',
      data: {
        labels: [
            'Fatality', 'Lost Time Injury', 'Dangerous Occurence', 'First Aid', 'Property Damage', 
            'MTC', 'RWC', 'MVI'
        ],
        datasets: [
            { 
            data: [
                '{{ $fatality[0] }}', '{{ $lostTimeInjury[0] }}', '{{ $dangerousOccurence[0] }}', '{{ $firstAid[0] }}', '{{ $propertyDamage[0] }}', '{{ $mtc[0] }}', '{{ $rwc[0] }}', '{{ $mvi[0] }}'
            ],
            label: "WPS-3",
            borderColor: "#7ee5e5",
            backgroundColor: "#c2fdfd",
            fill: false
          }, { 
            data: [
                '{{ $fatality[1] }}', '{{ $lostTimeInjury[1] }}', '{{ $dangerousOccurence[1] }}','{{ $firstAid[1] }}', '{{ $propertyDamage[1] }}', '{{ $mtc[1] }}', '{{ $rwc[1] }}', '{{ $mvi[1] }}'
            ],
            label: "WPS-4",
            borderColor: "#1565C0",
            backgroundColor: "#1565C0",
            fill: false
          }, { 
            data: [
                '{{ $fatality[2] }}', '{{ $lostTimeInjury[2] }}', '{{ $dangerousOccurence[2] }}', '{{ $firstAid[2] }}', '{{ $propertyDamage[2] }}', '{{ $mtc[2] }}', '{{ $rwc[2] }}', '{{ $mvi[2] }}'
            ],
            label: "WPS-5",
            borderColor: "#FF0000",
            backgroundColor: "#FF0000",
            fill: false
          }
        ]
      }
    });
  }


});
</script>
@endsection

                          