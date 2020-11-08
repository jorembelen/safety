@extends('layouts.app')

@section('title', 'Print Report')

<style>
.inv {
height:60px;    
}

.ref { 
    font-size: 10px;
    }

h3 {
    padding: 10px;
}
.channels {
    float: left;
    margin-left: 5em;
}
.logo-align {
    float: right;
    margin-right: 5em;
}


</style>

@section('content') 

        <div class="row text-center">
            <div class="col-md-12">
                <div class="card-box">
                        <div class="channels">
                            <img src="/admin/assets/img/rcl_logo.png" height="50">  
                        </div> 
                        <div class="logo-align">
                            <img src="/admin/assets/img/logo.png" height="80">
                        </div>  
                        <h3 class="text-center">
                            <strong> Incident and Injury Investigation Report</strong>
                        </h3>
                </div>
            <div>
        <div>
<br>
<div class="container">
<h6 class="ref text-left">RCL-HSE-FM-01.2 - Version 1.0 Rev. Nov 2020</h6> 
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-left" width="16%">Name of Employee</td>
                                                    <td class="align-middle text-center" width="40%"><strong>{{ $reports->incident->involved }}</strong></td>
                                                    <td class="align-middle text-left" width="14%">Actual Severity</td>
                                                    <td class="align-middle text-center" width="3%"><strong>{{ $reports->incident->severity }}</strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-left" width="23%">Safety Awareness Training Date</td>
                                                    <td class="align-middle text-center" width="12%"><strong>{{ date('M-d-Y', strtotime($reports->safety)) }}</strong></td>
                                                    <td class="align-middle text-left" width="14%">Proof of Training</td>
                                                    <td class="align-middle text-center"><strong>{{ $reports->proof_training }}</strong></td>
                                                    <td class="align-middle text-left" width="16%">Worst Potential Severity</td>
                                                    <td class="align-middle text-center"><strong>{{ $reports->incident->wps }}</strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-left" width="16%">Name of Line Manager</td>
                                                    <td class="align-middle text-center" width="37%"><strong>{{ $reports->manager->name }}</strong></td>
                                                    <td class="align-middle text-left" width="15%">Badge No.</td>
                                                    <td class="align-middle text-center"><strong>{{ $reports->manager->badge }}</strong></td>
                                                    <td class="align-middle text-left" width="12%">Profession/Designation</td>
                                                    <td class="align-middle text-center"><strong>{{ $reports->manager->designation }}</strong></td>
                                                </tr>
                                                <tr>
                                                <td class="align-middle text-left" width="16%">Name of Supervisor</td>
                                                    <td class="align-middle text-center" width="37%"><strong>{{ $reports->supervisor->name }}</strong></td>
                                                    <td class="align-middle text-left" width="15%">Badge No.</td>
                                                    <td class="align-middle text-center" width="10%"><strong>{{ $reports->supervisor->badge }}</strong></td>
                                                    <td class="align-middle text-left" width="12%">Category</td>
                                                    <td class="align-middle text-center"><strong>{{ $reports->incident->inc_category }}</strong></td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-left" width="16%">Division/Department</td>
                                                    <td class="align-middle text-center"><strong>{{ $reports->location->division }}</strong></td>
                                                    <td class="align-middle text-left" width="15%">Project Name</td>
                                                    <td class="align-middle text-center"><strong>{{ $reports->location->name }}</strong></td>
                                                    <td class="align-middle text-left" width="12%">Location</td>
                                                    <td class="align-middle text-center"><strong>{{ $reports->location->loc_name }}</strong></td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-left" width="20%">Place of the Incident/Injury</td>
                                                    <td class="align-middle text-center"><strong>{{ $reports->inc_loc }}</strong></td>
                                                    <td class="align-middle text-left" width="15%">Date of Incident</td>
                                                    <td class="align-middle text-center"><strong>{{ date('M-d-Y', strtotime($reports->incident->date)) }}</strong></td>
                                                    <td class="align-middle text-left" width="12%">Time of Incident</td>
                                                    <td class="align-middle text-center"><strong>{{ date('h:i a', strtotime($reports->incident->date)) }}</strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-left" width="23%">Nature of the Incident/Injury</td>
                                                    <td class="align-middle text-center" width="14%"><strong>{{ $reports->nature }}</strong></td>
                                                    <td class="align-middle text-left" width="18%">Other, Please specify:</td>
                                                    <td class="align-middle text-center"><strong>{{ $reports->other }}</strong></td>
                                                </tr> 
                                            </tbody>
                                        </table>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle" width="15%">Brief Description of the Incident/Injury</td>
                                                    <td class="align-middle text-justify"><strong>{{ $reports->description }}</strong></td>
                                                </tr>   
                                                </tr>
                                                    <td class="align-middle" width="15%">Details of the Injury (Specify affected body parts)</td>
                                                    <td class="align-middle text-justify"><strong>{{ $reports->details }}</strong></td>
                                                </tr>   
                                            </tbody>
                                        </table>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-left" width="15%">First Aid Given?</td>
                                                    <td class="align-middle text-center" width="10%"><strong>{{ $reports->aid }}</strong></td>
                                                    <td class="align-middle text-left" width="15%">Name of First Aider</td>
                                                    <td class="align-middle text-center"><strong>{{ $reports->nurse->badge }} - {{ $reports->nurse->name }}</strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-left" width="25%">Name of Hospital where patient was treated/transferred</td>
                                                    <td class="align-middle text-center" width="25%"><strong>{{ $reports->hospital }}</strong></td>
                                                    <td class="align-middle text-left" width="15%">Address/Location of the Hospital</td>
                                                    <td class="align-middle text-center"><strong>{{ $reports->hos_addr }}</strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-left" width="43%">Medical leave given by administering Hospital/Clinic or Doctor</td>
                                                    <td class="align-middle text-center" width="8%"><strong>{{ $reports->med_leave }}</strong></td>
                                                    <td class="align-middle text-left" width="15%">Number of Days</td>
                                                    <td class="align-middle text-center" width="8%"><strong>{{ $reports->leave_days }}</strong></td>
                                                    <td class="align-middle text-left" width="12%">Hospitalization</td>
                                                    <td class="align-middle text-center"><strong>{{ $reports->hosp }}</strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-left" width="15%">Property Damage</td>
                                                    <td class="align-middle text-center" width="8%"><strong>{{ $reports->prop_dam }}</strong></td>
                                                    <td class="align-middle text-left" width="25%">Estimated percentage of damage</td>
                                                    <td class="align-middle text-center" width="8%"><strong>{{ $reports->est_dam }}</strong></td>
                                                    <td class="align-middle text-left" width="25%">Estimated Cost of damaged (SAR)</td>
                                                    <td class="align-middle text-center"><strong>{{ $reports->est_amt }}</strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="text-left"><h6><strong>Property Details</strong></h6></div>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-left" width="8%">Type/Function of the property</td>
                                                    <td class="align-middle text-center" width="15%"><strong>{{ $reports->property }}</strong></td>
                                                    <td class="align-middle text-left" width="8%">Location of affected property</td>
                                                    <td class="align-middle text-center" width="15%"><strong>{{ $reports->property }}</strong></td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-left" width="12%">Model of the property</td>
                                                    <td class="align-middle text-center" width="8%"><strong>{{ $reports->prop_model }}</strong></td>
                                                    <td class="align-middle text-left" width="12%">Plate Number</td>
                                                    <td class="align-middle text-center" width="8%"><strong>{{ $reports->prop_plate }}</strong></td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-left" width="12%">Vehicle Registration Number</td>
                                                    <td class="align-middle text-center" width="8%"><strong>{{ $reports->prop_reg }}</strong></td>
                                                    <td class="align-middle text-left" width="12%">Company Fleet Number</td>
                                                    <td class="align-middle text-center" width="8%"><strong>{{ $reports->prop_rte }}</strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-left" width="22%">Was Pre-Task/Toolbox meeting conducted</td>
                                                    <td class="align-middle text-center" width="5%"><strong>{{ $reports->toolbox }}</strong></td>
                                                    <td class="align-middle text-left" width="30%">Was the person using required Personal Protective Equipment (PPE)</td>
                                                    <td class="align-middle text-center" width="5%"><strong>{{ $reports->ppe }}</strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-left" width="50%">Specify the Personal Protective Equipment (PPE)</td>
                                                    <td class="align-middle text-center"><strong>{{ $reports->ppe_equip }}</strong></td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-left" width="35%">What was the injured person/employee doing at the time of the incident?</td>
                                                    <td class="align-middle text-center"><strong>{{ $reports->emp_doing }}</strong></td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-left" width="35%">What was the machine/equipment doing at the time of the incident?</td>
                                                    <td class="align-middle text-center"><strong>{{ $reports->emp_machine }}</strong></td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-left" width="35%">What was the material(s)/substance(s) doing at the time of the incident?</td>
                                                    <td class="align-middle text-center"><strong>{{ $reports->emp_material }}</strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-left" width="15%">Immediate cause(s) of the incident/injury</td>
                                                    <td class="align-middle text-justify"><strong>{{ $reports->imm_cause }}</strong></td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-left" width="15%">Root cause(s) of the incident/injury</td>
                                                    <td class="align-middle text-left">
                                                    @foreach($output as  $item)
                                                    <li><strong>{{ $loop->iteration }}. {!! $item->type !!}: {!! $item->root_name !!}</strong></li>
                                                    @endforeach
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-left" width="15%">Corrective Action to prevent reoccurence</td>
                                                    <td class="align-middle text-left">
                                                    @foreach($output as  $item)
                                                    <li><strong>{{ $loop->iteration }}. {!! $item->rec_type !!}: {!! $item->rec_name !!} (Status: 
                                                    @if($item->status == 0)
                                                        On Going 
                                                        @else
                                                        Done
                                                    @endif
                                                        )</strong></li>
                                                    @endforeach
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-left" width="20%">Were there any witnesses?</td>
                                                    <td class="align-middl text-center" width="15%"><strong>{{ $reports->witness }}</strong></td>
                                                    <td class="align-middle text-left" width="15%">Type of witness(es)</td>
                                                    <td class="align-middle text-center"><strong>{{ $reports->wit_type }}</strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-left" width="20%">Witness Details</td>
                                                    <td class="align-middle text-center"><strong>{{ $reports->wit_details }}</strong></td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-left" width="15%">Witness Statement</td>
                                                    <td class="text-justify"><strong>{{ $reports->wit_statement }}</strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-sm table-bordered">
                                            <thead>
                                                <tr>
                                                    <th width="40%">Initial Investigation Conducted by:</th>
                                                    <th width="40%">Noted by:</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="inv">
                                                    <td class="align-middle text-center"><strong>{{ $reports->officer->badge }} - {{ $reports->officer->name }}</strong></td>
                                                    <td class="align-middle" width="12%"><strong></strong></td>
                                                    <td class="align-middle text-center"><strong>{{ date('M-d-Y', strtotime($reports->incident->date)) }}</strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-sm table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Additional Details:</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                @if(!empty($reports->proof))
                                                @foreach ($photos as $photo)
                                                    <td>
                                                        <img src="{{url('../')}}/storage/thumbnail/{{ $photo ? $photo : 'no_image.jpg' }}" class="img-fluid img-thumbnail" alt="" width="150%" height="150%">
                                                    </td>
                                                    @endforeach
                                            @endif  
                                            </tr> 
                                            <tr>
                                                @if(!empty($reports->inc_img))
                                                @foreach ($images as $image)
                                                    <td>
                                                        <img src="{{url('../')}}/storage/thumbnail/{{ $image ? $image : 'no_image.jpg' }}" class="img-fluid img-thumbnail" alt="" width="70%" height="70%">
                                                    </td>
                                                    @endforeach
                                            @endif   
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-sm table-bordered">
                                            <thead>
                                                <tr>
                                                    <th width="40%">Investigation Report Verified by:</th>
                                                    <th width="40%">Noted by:</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="inv">
                                                    <td class="align-middle"><strong></strong></td>
                                                    <td class="align-middle" width="12%"><strong></strong></td>
                                                    <td class="align-middle text-center"><strong>{{ date('M-d-Y', strtotime($reports->created_at)) }}</strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        
                                        </div>

                                        <div class="text-center d-print-none">
                                            <a href="javascript:window.print()">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer action-print" data-toggle="tooltip" data-placement="top" data-original-title="Reply"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
                                            </a>
                                        </div>
</div>

<script>
    function myFunction() {
        window.print();
    }
</script>


@endsection