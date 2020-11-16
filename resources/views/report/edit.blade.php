@extends('layouts.master')

@section('title', 'Investigation Report Update')
@section('content') 
 
<div class="row">
<div class="col-lg-12 layout-spacing mt-4">
                            <div class="statbox widget box box-shadow">
                            @if(auth()->user()->role != 'user')
                            <a href="/reports#!" type="button"class="btn btn-primary mb-2 float-right">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                            Back
                            </a> 
                            @else
                            <a href="/admin/investigation#!" type="button"class="btn btn-primary mb-2 float-right">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                Back
                            </a> 
                            @endif  
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Update Investigation Report</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                <form class="form-horizontal" method="POST" action="{{ route('reports.update', $reports->id) }}" enctype="multipart/form-data">
                                @csrf
                                {{ method_field('PUT') }}
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <input type="hidden" name="incident_id" value="{{ $reports->incident_id }}">
                                <input type="hidden" name="employee_id" value="{{ $reports->employee_id }}">
                                <input type="hidden" name="location_id" value="{{ $reports->location_id }}">
                                    <div id="circle-basic" class="">
                                        <h3>First</h3>
                                        <section>

                                        <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="mgr_name">Line Managers Name<span class="text-danger"> *</span></label>
                                                    <select name="mgr_name" class="form-control basic">
                                                                <option value="{{ $reports->mgr_name }}"> {{ $reports->manager->badge }} - {{ $reports->manager->name }} ({{ $reports->manager->designation }})</option>
                                                                @foreach( $officers as $officer)
                                                                <option value="{{$officer->id}}">{{$officer->badge}} - {{$officer->name}} ({{$officer->designation}})</option>
                                                                @endforeach
                                                            </select>
                                                            @if($errors->has('mgr_name'))
                                                                <span class="help-block text-danger">{{ $errors->first('mgr_name') }}</span>
                                                            @endif
                                                    </div>
                                                </div>
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                <label for="sup_name">Supervisors Name<span class="text-danger"> *</span></label>
                                                <select name="sup_name" class="form-control basic"  required>
                                                <option value="{{ $reports->sup_name }}"> {{ $reports->supervisor->badge }} - {{ $reports->supervisor->name }} ({{ $reports->supervisor->designation }})</option>
                                                            @foreach( $officers as $officer)
                                                            <option value="{{$officer->id}}">{{$officer->badge}} - {{$officer->name}} ({{$officer->designation}})</option>
                                                            @endforeach
                                                        </select>
                                                        @if($errors->has('sup_name'))
                                                            <span class="help-block text-danger">{{ $errors->first('sup_name') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inc_loc">Place of the Incident/Injury<span class="text-danger"> *</span></label>
                                                            <input type="text" class="form-control" value="{{ $reports->inc_loc }}" name="inc_loc" placeholder="Place of the Incident/Injury" required>
                                                            @if($errors->has('inc_loc'))
                                                                <span class="help-block text-danger">{{ $errors->first('inc_loc') }}</span>
                                                            @endif
                                                    </div>
                                            </div>
                                            <div class="col-md-3">
                                            <div class="form-group">
                                            <label for="nature">Nature of the Incident/Injury<span class="text-danger"> *</span></label>
                                                    <select name="nature" class="form-control selectpicker">
                                                            <option value="{{ $reports->nature }}">{{ $reports->nature }}</option>
                                                            <option value="Occupational" @if (old('nature') == 'Occupational') selected="selected" @endif>Occupational</option>
                                                            <option value="Road Traffic" @if (old('nature') == 'Road Traffic') selected="selected" @endif>Road Traffic</option>
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                            <div class="form-group">
                                                <label for="other">Specify</label>
                                                <input value="{{ $reports->other }}" name="other" class="form-control" type="text" placeholder="Please specify . . .">
                                            </div>
                                            </div>
                                            <div class="col-md-12">
                                            <div class="form-group">
                                            <label for="description">Brief Description of the Incident/Injury<span class="text-danger"> *</span></label>
                                                <textarea class="form-control" name="description" placeholder="Write your Brief Description of the Incident/Injury here ...">{{ $reports->description }}</textarea required>
                                                @if($errors->has('description'))
                                                    <span class="help-block text-danger">{{ $errors->first('description') }}</span>
                                                @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                <label for="details">Details of the Injury (Specify affected body parts)<span class="text-danger"> *</span></label>
                                                <textarea class="form-control" name="details" placeholder="Write your Details of the Injury here ...">{{ $reports->details }}</textarea required>
                                                @if($errors->has('details'))
                                                    <span class="help-block text-danger">{{ $errors->first('details') }}</span>
                                                @endif
                                                </div>
                                            </div>
                                          

                                            <!-- End Row -->
                                    </div>


                                        </section>
                                        <h3>Second</h3>
                                        <section>
                                            
                                            <div class="row">
                                            <div class="col-md-4">
                                            <div class="form-group">
                                            <label for="aid">First Aid Given?<span class="text-danger"> *</span></label>
                                                <select name="aid" class="form-control selectpicker" id="frst_aid" required>
                                                                <option value="{{ $reports->aid }}">{{ $reports->aid }}</option>
                                                                <option value="Yes" @if (old('aid') == 'Yes') selected="selected" @endif>Yes</option>
                                                                <option value="No" @if (old('aid') == 'No') selected="selected" @endif>No</option>
                                                        </select>
                                                        @if($errors->has('aid'))
                                                            <span class="help-block text-danger">{{ $errors->first('aid') }}</span>
                                                        @endif
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                            <div class="form-group frm-aider-div" id="vidYes" style="display:none">
                                                <label for="aider">Name of First Aider<span class="text-danger"> </span></label>
                                                <select name="aider" class="form-control basic" >
                                                <option value="{{ $reports->aider }}"> {{ $reports->nurse->badge }} - {{ $reports->nurse->name }} ({{ $reports->nurse->designation }})</option>
                                                            @foreach( $officers as $officer)
                                                            <option value="{{$officer->id}}">{{$officer->badge}} - {{$officer->name}} ({{$officer->designation}})</option>
                                                            @endforeach
                                                        </select>
                                                        @if($errors->has('aider'))
                                                            <span class="help-block text-danger">{{ $errors->first('aider') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label for="hosp">Hospitalized?<span class="text-danger"> *</span></label>
                                                        <select name="hosp" class="form-control selectpicker" id="frm_hosp" required>
                                                                        <option value="{{ $reports->hosp }}">{{ $reports->hosp }}</option>
                                                                        <option value="Yes" @if (old('hosp') == 'Yes') selected="selected" @endif>Yes</option>
                                                                        <option value="No" @if (old('hosp') == 'No') selected="selected" @endif>No</option>
                                                                </select>
                                                                @if($errors->has('hosp'))
                                                                    <span class="help-block text-danger">{{ $errors->first('hosp') }}</span>
                                                                @endif
                                                        </div>
                                                    </div>
                                                <div class="col-md-8">
                                               <div class="form-group frm-hosp-div" id="hospYes" style="display:none">
                                                    <label for="hospital">Name of Hospital where patient was treated/transferred<span class="text-danger"> *</span></label>
                                                        <input type="text" class="form-control" value="{{ $reports->hospital }}" name="hospital" placeholder="Name of hospital">
                                                        @if($errors->has('hospital'))
                                                            <span class="help-block text-danger">{{ $errors->first('hospital') }}</span>
                                                        @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                               <div class="form-group frm-hosp-div" id="hosp1Yes" style="display:none">
                                                    <label for="hos_addr">Address/Location of the hospital<span class="text-danger"> *</span></label>
                                                        <input type="text" class="form-control" value="{{ $reports->hos_addr }}" name="hos_addr" placeholder="Address of hospital">
                                                        @if($errors->has('hos_addr'))
                                                            <span class="help-block text-danger">{{ $errors->first('hos_addr') }}</span>
                                                        @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label for="med_leave">Medical leave given by administering Hospital/Clinic or Doctor?<span class="text-danger"> *</span></label>
                                                <select name="med_leave" class="form-control selectpicker" id="med_leave" required>
                                                                <option value="{{ $reports->med_leave }}">{{ $reports->med_leave }}</option>
                                                                <option value="Yes" @if (old('med_leave') == 'Yes') selected="selected" @endif>Yes</option>
                                                                <option value="No" @if (old('med_leave') == 'No') selected="selected" @endif>No</option>
                                                        </select>
                                                        @if($errors->has('med_leave'))
                                                            <span class="help-block text-danger">{{ $errors->first('med_leave') }}</span>
                                                        @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group frm-leave-div" id="divYes" style="display:none">
                                                    <label for="leave_days">Number of Days<span class="text-danger"> *</span></label>
                                                        <input type="text" class="form-control" value="{{ $reports->leave_days }}" name="leave_days" placeholder="Number of Days">
                                                        @if($errors->has('leave_days'))
                                                            <span class="help-block text-danger">{{ $errors->first('leave_days') }}</span>
                                                        @endif
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label for="prop_dam">Property damage?<span class="text-danger"> *</span></label>
                                                <select name="prop_dam" class="form-control selectpicker" id="frm_duration" required>
                                                                <option value="{{ $reports->prop_dam }}">{{ $reports->prop_dam }}</option>
                                                                <option value="Yes" @if (old('prop_dam') == 'Yes') selected="selected" @endif>Yes</option>
                                                                <option value="No" @if (old('prop_dam') == 'No') selected="selected" @endif>No</option>
                                                        </select>
                                                        @if($errors->has('prop_dam'))
                                                            <span class="help-block text-danger">{{ $errors->first('prop_dam') }}</span>
                                                        @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-duration-div" id="divFrmYes" style="display:none">
                                                    <label for="est_dam">Est. percentage of damage<span class="text-danger"> </span></label>
                                                        <input type="text" class="form-control" value="{{ $reports->est_dam }}" name="est_dam" placeholder="Estimated percentage of damage">
                                                        @if($errors->has('est_dam'))
                                                            <span class="help-block text-danger">{{ $errors->first('est_dam') }}</span>
                                                        @endif
                                                </div>
                                            </div>
                                       
                                            <div class="col-md-6">
                                            <div class="form-group form-duration-div" id="divFrm1Yes" style="display:none">
                                                    <label for="est_amt">Est. Cost of damaged (SAR)<span class="text-danger"> </span></label>
                                                        <input type="text" class="form-control" value="{{ $reports->est_amt }}" name="est_amt" placeholder="Estimated Cost of damaged (SAR)">
                                                        @if($errors->has('est_amt'))
                                                            <span class="help-block text-danger">{{ $errors->first('est_amt') }}</span>
                                                        @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group form-duration-div" id="divFrm2Yes" style="display:none">
                                                    <label for="property">Type / Function of the property<span class="text-danger"> </span></label>
                                                        <input type="text" class="form-control" value="{{ $reports->property }}" name="property" placeholder="Type / Function of the property">
                                                        @if($errors->has('property'))
                                                            <span class="help-block text-danger">{{ $errors->first('property') }}</span>
                                                        @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group form-duration-div" id="divFrm3Yes" style="display:none">
                                                    <label for="prop_loc">Location of affected property <span class="text-danger"> </span></label>
                                                        <input type="text" class="form-control" value="{{ $reports->prop_loc }}" name="prop_loc" placeholder="Location of affected property">
                                                        @if($errors->has('prop_loc'))
                                                            <span class="help-block text-danger">{{ $errors->first('prop_loc') }}</span>
                                                        @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group form-duration-div" id="divFrm4Yes" style="display:none">
                                                    <label for="prop_manuf">Name of Manufacturer<span class="text-danger"> </span></label>
                                                        <input type="text" class="form-control" value="{{ $reports->prop_manuf }}" name="prop_manuf" placeholder="Type / Function of the property">
                                                        @if($errors->has('prop_manuf'))
                                                            <span class="help-block text-danger">{{ $errors->first('prop_manuf') }}</span>
                                                        @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group form-duration-div" id="divFrm5Yes" style="display:none">
                                                    <label for="prop_model">Model of the Property <span class="text-danger"> </span></label>
                                                        <input type="text" class="form-control" value="{{ $reports->prop_model }}" name="prop_model" placeholder="Model of the Property">
                                                        @if($errors->has('prop_model'))
                                                            <span class="help-block text-danger">{{ $errors->first('prop_model') }}</span>
                                                        @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group form-duration-div" id="divFrm6Yes" style="display:none">
                                                    <label for="prop_plate">Plate Number<span class="text-danger"> </span></label>
                                                        <input type="text" class="form-control" value="{{ $reports->prop_plate }}" name="prop_plate" placeholder="Plate Number">
                                                        @if($errors->has('prop_plate'))
                                                            <span class="help-block text-danger">{{ $errors->first('prop_plate') }}</span>
                                                        @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group form-duration-div" id="divFrm7Yes" style="display:none">
                                                    <label for="prop_reg">Vehicle Registration Number <span class="text-danger"> </span></label>
                                                        <input type="text" class="form-control" value="{{ $reports->prop_reg }}" name="prop_reg" placeholder="Vehicle Registration Number">
                                                        @if($errors->has('prop_reg'))
                                                            <span class="help-block text-danger">{{ $errors->first('prop_reg') }}</span>
                                                        @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group form-duration-div" id="divFrm8Yes" style="display:none">
                                                    <label for="prop_rte">Company Fleet Number<span class="text-danger"> </span></label>
                                                        <input type="text" class="form-control" value="{{ $reports->prop_rte }}" name="prop_rte" placeholder="Company Fleet Number">
                                                        @if($errors->has('prop_rte'))
                                                            <span class="help-block text-danger">{{ $errors->first('prop_rte') }}</span>
                                                        @endif
                                                </div>
                                            </div>

                                            <!-- End Row -->
                                            </div>

                                        </section>
                                        <h3>Third</h3>
                                        <section>
                                        <div class="row">
                                      
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                    <label for="toolbox">Was Pre- Task / Toolbox meeting conducted <span class="text-danger"> *</span></label>
                                                    <select name="toolbox" class="form-control selectpicker" required>
                                                                <option value="{{ $reports->toolbox }}">{{ $reports->toolbox }}</option>
                                                                <option value="Yes" @if (old('toolbox') == 'Yes') selected="selected" @endif>Yes</option>
                                                                <option value="No" @if (old('toolbox') == 'No') selected="selected" @endif>No</option>
                                                        </select>
                                                        @if($errors->has('toolbox'))
                                                            <span class="help-block text-danger">{{ $errors->first('toolbox') }}</span>
                                                        @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                            <div class="form-group">
                                                    <label for="ppe">Was the person using  required Personal Protective Equipment (PPE) <span class="text-danger"> *</span></label>
                                                    <select name="ppe" class="form-control selectpicker" id="frm_ppe" required>
                                                                <option value="{{ $reports->ppe }}">{{ $reports->ppe }}</option>
                                                                <option value="Yes" @if (old('ppe') == 'Yes') selected="selected" @endif>Yes</option>
                                                                <option value="No" @if (old('ppe') == 'No') selected="selected" @endif>No</option>
                                                        </select>
                                                        @if($errors->has('ppe'))
                                                            <span class="help-block text-danger">{{ $errors->first('ppe') }}</span>
                                                        @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                            <div class="form-group frm-ppe-div" id="divPpeYes" style="display:none">
                                                    <label for="ppe_equip">Specify the Personal Protective Equipment (PPE)  <span class="text-danger"> </span></label>
                                                        <input type="text" class="form-control" value="{{ $reports->ppe_equip }}" name="ppe_equip" placeholder="Enter data here . . .">
                                                        @if($errors->has('ppe_equip'))
                                                            <span class="help-block text-danger">{{ $errors->first('ppe_equip') }}</span>
                                                        @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                            <div class="form-group">
                                                    <label for="emp_doing">What was the injured person/employee doing at the time of the incident?  <span class="text-danger"> </span></label>
                                                        <input type="text" class="form-control" value="{{ $reports->emp_doing }}" name="emp_doing" placeholder="Enter data here . . ." required>
                                                        @if($errors->has('emp_doing'))
                                                            <span class="help-block text-danger">{{ $errors->first('emp_doing') }}</span>
                                                        @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                            <div class="form-group">
                                                    <label for="emp_machine">What was the machine/equipment doing at the time of the incident?  <span class="text-danger"> </span></label>
                                                        <input type="text" class="form-control" value="{{ $reports->emp_machine }}" name="emp_machine" placeholder="Enter data here . . ." required>
                                                        @if($errors->has('emp_machine'))
                                                            <span class="help-block text-danger">{{ $errors->first('emp_machine') }}</span>
                                                        @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                            <div class="form-group">
                                                    <label for="emp_material">What was the material(s) / substance(s) doing at the time of the incident  <span class="text-danger"> </span></label>
                                                        <input type="text" class="form-control" value="{{ $reports->emp_material }}" name="emp_material" placeholder="Enter data here . . ." required>
                                                        @if($errors->has('emp_material'))
                                                            <span class="help-block text-danger">{{ $errors->first('emp_material') }}</span>
                                                        @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="imm_cause">Immediate Cause(s) of the Incident/injury:<span class="text-danger"> *</span></label>
                                                <textarea class="form-control" name="imm_cause" placeholder="Write your data here ..." required>{{ $reports->imm_cause }}</textarea>
                                                @if($errors->has('imm_cause'))
                                                    <span class="help-block text-danger">{{ $errors->first('imm_cause') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                           
                                            
                                        <div class="col-md-3">
                                                <div class="form-group">
                                                <label for="witness">Were there any witnesses?<span class="text-danger"> </span></label>
                                                <select name="witness" class="form-control selectpicker" id="witness_frm" required>
                                                                <option value="{{ $reports->witness }}">{{ $reports->witness }}</option>
                                                                <option value="Yes" @if (old('witness') == 'Yes') selected="selected" @endif>Yes</option>
                                                                <option value="No" @if (old('witness') == 'No') selected="selected" @endif>No</option>
                                                        </select>
                                                        @if($errors->has('witness'))
                                                            <span class="help-block text-danger">{{ $errors->first('witness') }}</span>
                                                        @endif
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                            <div class="form-group frm-div" id="selectYes" style="display:none">
                                                <label for="wit_type">Type of witness(es)<span class="text-danger"> </span></label>
                                                <select name="wit_type" class="form-control">
                                                                <option value="{{ $reports->wit_type }}">{{ $reports->wit_type }}</option>
                                                                <option value="Employee" @if (old('wit_type') == 'Employee') selected="selected" @endif>Employee</option>
                                                                <option value="Public" @if (old('wit_type') == 'Public') selected="selected" @endif>Public</option>
                                                        </select>
                                                        @if($errors->has('wit_type'))
                                                            <span class="help-block text-danger">{{ $errors->first('wit_type') }}</span>
                                                        @endif
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                             <div class="form-group frm-div" id="select1Yes" style="display:none">
                                                <label for="wit_details">Witness Details:<span class="text-danger"> *</span></label>
                                                <textarea class="form-control" name="wit_details" placeholder="Write your data here ...">{{ $reports->wit_details }}</textarea>
                                                @if($errors->has('wit_details'))
                                                    <span class="help-block text-danger">{{ $errors->first('wit_details') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                            <div class="col-md-12">
                                             <div class="form-group frm-div" id="select2Yes" style="display:none">
                                                <label for="wit_statement">Witness Statement:<span class="text-danger"> *</span></label>
                                                <textarea class="form-control" name="wit_statement" placeholder="Write your data here ...">{{ $reports->wit_statement }}</textarea>
                                                @if($errors->has('wit_statement'))
                                                    <span class="help-block text-danger">{{ $errors->first('wit_statement') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- End Row -->
                                        </div>


                                        </section>
                                        <h3>Fourth</h3>
                                        <section>
                                        <div class="row">
                                      

                                                <div class="col-md-5">
                                                <div class="form-group">
                                                <label for="safety">Safety Awareness Training Date<span class="text-danger"> </span></label>
                                                        <input type="text" id="basicFlatpickr" class="form-control" value="{{ $reports->safety }}" name="safety" placeholder="Safety Awareness Training Date" required>
                                                        @if($errors->has('safety'))
                                                            <span class="help-block text-danger">{{ $errors->first('safety') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                <div class="form-group">
                                                <label for="proof_training">Proof of Training<span class="text-danger"> </span></label>
                                                        <input type="text" class="form-control" value="{{ $reports->proof_training }}" name="proof_training" placeholder="Proof of Training" required>
                                                        @if($errors->has('proof_training'))
                                                            <span class="help-block text-danger">{{ $errors->first('proof_training') }}</span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                <div class="form-group custom-file-container" data-upload-id="myFirstImage">
                                                            <label>Update Proof of Training Image(s) (Attach image) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                                            <label class="custom-file-container__custom-file" >
                                                                <input type="file" class=" form-controlcustom-file-container__custom-file__custom-file-input" name="proof[]" multiple>
                                                               
                                                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                            </label>
                                                            <div class="custom-file-container__image-preview"></div>
                                                    </div>
                                            </div>
                                                <div class="col-md-6">
                                                <div class="form-group custom-file-container" data-upload-id="mySecondImage">
                                                            <label>Update Incident Image(s) (Attach image) <a href="#" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                                            <label class="custom-file-container__custom-file" >
                                                                <input type="file" class=" form-controlcustom-file-container__custom-file__custom-file-input" name="inc_img[]"   multiple>
                                                               
                                                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                            </label>
                                                            <div class="custom-file-container__image-preview"></div>
                                                    </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <label for="docs">Attached Documents (word/pdf)<span class="text-danger"> </span></label>
                                                        <input type="file" class="form-control-file"  name="docs">
                                                        @if($errors->has('docs'))
                                                            <span class="help-block text-danger">{{ $errors->first('docs') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                        <!-- End Row -->
                                        </div>

                                        <div class="modal-footer">
                                            <a href="/reports#!" type="button" class="btn btn-danger waves-effect">Cancel</a>
                                            <button type="submit" class="btn btn-info waves-effect waves-light">Update</button>
                                        </div>

                                        </section>
                                        </form>
                                    </div>


                                </div>
                            </div>
                        </div>

</div>





@endsection


