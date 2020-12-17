@extends('layouts.master')

@section('title', 'Notification Report')
@section('content') 
 
<div class="row">
<div class="col-lg-12 layout-spacing mt-4">
                            <div class="statbox widget box box-shadow">
                                <a href="{{ \URL::previous() }}" type="button"class="btn btn-primary mb-2 float-right">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                    Back
                                </a>  
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Create Notification Report</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                        @include('includes.errors')
                                <form class="form-horizontal" method="POST" action="{{ route('incidents.store') }}" enctype="multipart/form-data" id="inc-Create">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                    <div id="circle-basic" class="">
                                        <h3>First</h3>
                                        <section>
                                        <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="employee_id">Safety Officer<span class="text-danger"> * </span></label>
                                            <select name="employee_id" class="form-control basic" data-live-search="true"  >
                                                        <option value="">Select</option>
                                                        @foreach( $officers as $officer)
                                                        <option value="{{$officer->id}}"  @if (old('employee_id') == $officer->id ) selected="selected" @endif>{{$officer->badge}} - {{$officer->name}} ({{$officer->designation}}) </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                              
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="location">Site Location<span class="text-danger"> *</span></label>
                                                <select name="location" class="form-control basic" data-live-search="true" >
                                                    @if (auth()->user()->role == 'admin' || auth()->user()->role == 'super_admin')
                                                        <option value="">Select</option>
                                                        @foreach( $locations as $location)
                                                        <option value="{{$location->id}}" @if (old('location') == $location->id ) selected="selected" @endif>{{$location->name}} - {{$location->loc_name}}</option>
                                                        @endforeach
                                                    @else
                                                        <option value="{{ auth()->user()->location_id }}">{{ auth()->user()->locations->name }}</option>   
                                                    @endif
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                            <div class="form-group">
                                                <label for="type">Type Of Incident<span class="text-danger"> *</span></label>
                                                <select name="type" class="form-control " >
                                                    <option value="">Select</option>
                                                        <option value="Fatality" @if (old('type') == 'Fatality') selected="selected" @endif>Fatality</option>
                                                        <option value="Lost Time Injury" @if (old('type') == 'Lost Time Injury') selected="selected" @endif>Lost Time Injury</option>
                                                        <option value="First Aid" @if (old('type') == 'First Aid') selected="selected" @endif>First Aid</option>
                                                        <option value="Property Damage" @if (old('type') == 'Property Damage') selected="selected" @endif>Property Damage</option>
                                                        <option value="MTC" @if (old('type') == 'MTC') selected="selected" @endif>MTC</option>
                                                        <option value="RWC" @if (old('type') == 'RWC') selected="selected" @endif>RWC</option>
                                                        <option value="MVI" @if (old('type') == 'MVI') selected="selected" @endif>MVI</option>
                                                        <option value="Dangerous Occurence" @if (old('type') == 'Dangerous Occurence') selected="selected" @endif>Dangerous Occurence</option>
                                                        <option value="Near Miss" @if (old('type') == 'Near Miss') selected="selected" @endif>Near Miss</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="type">Incident Category<span class="text-danger"> *</span></label>
                                                <select name="inc_category" class="form-control " >
                                                    <option value="">Select</option>
                                                        <option value="Work Related" @if (old('inc_category') == 'Work Related') selected="selected" @endif>Work Related</option>
                                                        <option value="Non Work Related" @if (old('inc_category') == 'Non Work Related') selected="selected" @endif>Non Work Related</option>
                                                    </select>
                                                    @if($errors->has('inc_category'))
                                                        <span class="help-block text-danger">{{ $errors->first('inc_category') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="type">Insurance Type<span class="text-danger"> *</span></label>
                                                <select name="insurance" class="form-control " >
                                                    <option value="">Select</option>
                                                        <option value="GOSI" @if (old('insurance') == 'GOSI') selected="selected" @endif>GOSI</option>
                                                        <option value="Non GOSI" @if (old('insurance') == 'Non GOSI') selected="selected" @endif>Non GOSI</option>
                                                    </select>
                                                    @if($errors->has('insurance'))
                                                        <span class="help-block text-danger">{{ $errors->first('insurance') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-2 mb-2">
                                            <div class="form-group">
                                            <label for="sel_involved">Persons Involved<span class="text-danger"> *</span></label>
                                                <select name="sel_involved" class="form-control " id="frst_aid" >
                                                                <option value="">Select</option>
                                                                <option value="Employee" @if (old('sel_involved') == 'Employee') selected="selected" @endif>Employee</option>
                                                                <option value="NonEmployee" @if (old('sel_involved') == 'NonEmployee') selected="selected" @endif>Non Employee</option>
                                                        </select>
                                                        @if($errors->has('sel_involved'))
                                                            <span class="help-block text-danger">{{ $errors->first('sel_involved') }}</span>
                                                        @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                            <div class="form-group frm-aider-div" id="vidEmployee" style="display:none">
                                                <label for="employee">Employees Details<span class="text-danger"> </span></label>
                                                <select name="employee[]" class="form-control tagging"  multiple>
                                                    @foreach( $officers as $officer)
                                                    <option value="{{$officer->badge}} - {{$officer->name}}" @if (old('employee') == '{{$officer->badge}} - {{$officer->name}}' ) selected="selected" @endif>{{$officer->badge}} - {{$officer->name}} ({{$officer->designation}})</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('employee'))
                                                <span class="help-block text-danger">{{ $errors->first('employee') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group frm-aider-div" id="vidNonEmployee" style="display:none">
                                                <label for="contractor">For Non Employee<span class="text-danger"> </span></label>
                                                <textarea type="text" class="form-control" name="contractor" placeholder="Specify data here...">{{ old('contractor') }}</textarea>
                                                        @if($errors->has('contractor'))
                                                            <span class="help-block text-danger">{{ $errors->first('contractor') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                        

                                        <div class="col-md-12">
                                            <div class="form-group">
                                            <label for="injury_location">Injury Location (Select one or more if necessary):<span class="text-danger"> * </span></label>
                                                <select name="injury_location[]" class="form-control tagging" multiple >
                                                    <option value="Head"  @if (old('injury_location') == 'Head') selected="selected" @endif>Head</option>
                                                    <option value="Face"  @if (old('injury_location') == 'Face') selected="selected" @endif>Face</option>
                                                    <option value="Neck" @if (old('injury_location') == 'Neck') selected="selected" @endif>Neck</option>
                                                    <option value="Back" @if (old('injury_location') == 'Back') selected="selected" @endif>Back</option>
                                                    <option value="Nose/Ears" @if (old('injury_location') == 'Nose/Ears') selected="selected" @endif>Nose/Ears</option>
                                                    <option value="Chest" @if (old('injury_location') == 'Chest') selected="selected" @endif>Chest</option>
                                                    <option value="Leg" @if (old('injury_location') == 'Leg') selected="selected" @endif>Leg</option>
                                                    <option value="Abdomen" @if (old('injury_location') == 'Abdomen') selected="selected" @endif>Abdomen</option>
                                                    <option value="Stomach" @if (old('injury_location') == 'Stomach') selected="selected" @endif>Stomach</option>
                                                    <option value="Shoulder" @if (old('injury_location') == 'Shoulder') selected="selected" @endif>Shoulder</option>
                                                    <option value="Hand" @if (old('injury_location') == 'Hand') selected="selected" @endif>Hand</option>
                                                    <option value="Arm" @if (old('injury_location') == 'Arm') selected="selected" @endif>Arm</option>
                                                    <option value="Wrist" @if (old('injury_location') == 'Wrist') selected="selected" @endif>Wrist</option>
                                                    <option value="Elbow" @if (old('injury_location') == 'Elbow') selected="selected" @endif>Elbow</option>
                                                    <option value="Fingers/Thumb" @if (old('injury_location') == 'Fingers/Thumb') selected="selected" @endif>Fingers/Thumb</option>
                                                    <option value="Eyes" @if (old('injury_location') == 'Eyes') selected="selected" @endif>Eyes</option>
                                                    <option value="Hip" @if (old('injury_location') == 'Hip') selected="selected" @endif>Hip</option>
                                                    <option value="Ankle/Foot" @if (old('injury_location') == 'Ankle/Foot') selected="selected" @endif>Ankle/Foot</option>
                                                    <option value="Knee" @if (old('injury_location') == 'Knee') selected="selected" @endif>Knee</option>
                                                    <option value="Toes" @if (old('injury_location') == 'Toes') selected="selected" @endif>Toes</option>
                                                    <option value="None" @if (old('injury_location') == 'None') selected="selected" @endif>None</option>
                                                </select>
                                                        @if($errors->has('injury_location'))
                                                            <span class="help-block text-danger">{{ $errors->first('injury_location') }}</span>
                                                        @endif
                                                </div>
                                            </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            <label for="injury_sustain">Type of Injury Sustained (Select one or more if necessary):<span class="text-danger"> *</span></label>
                                            <select name="injury_sustain[]" class="form-control tagging"  multiple >
                                                <option value="Fracture" @if (old('injury_sustain') == 'Fracture') selected="selected" @endif>Fracture</option>
                                                <option value="Loss of Sight" @if (old('injury_sustain') == 'Loss of Sight') selected="selected" @endif>Loss of Sight</option>
                                                <option value="Dislocation" @if (old('injury_sustain') == 'Dislocation') selected="selected" @endif>Dislocation</option>
                                                <option value="Abrasion" @if (old('injury_sustain') == 'Abrasion') selected="selected" @endif>Abrasion</option>
                                                <option value="Cut/Laceration" @if (old('injury_sustain') == 'Cut/Laceration') selected="selected" @endif>Cut/Laceration</option>
                                                <option value="Loss of Consciousness" @if (old('injury_sustain') == 'Loss of Consciousness') selected="selected" @endif>Loss of Consciousness</option>
                                                <option value="Crush Injury" @if (old('injury_sustain') == 'Crush Injury') selected="selected" @endif>Crush Injury</option>
                                                <option value="Suffocation" @if (old('injury_sustain') == 'Suffocation') selected="selected" @endif>Suffocation</option>
                                                <option value="Scalping" @if (old('injury_sustain') == 'Scalping') selected="selected" @endif>Scalping</option>
                                                <option value="Heat" @if (old('injury_sustain') == 'Heat') selected="selected" @endif>Heat</option>
                                                <option value="Cold" @if (old('injury_sustain') == 'Cold') selected="selected" @endif>Cold</option>
                                                <option value="Burn" @if (old('injury_sustain') == 'Burn') selected="selected" @endif>Burn</option>
                                                <option value="Bruising" @if (old('injury_sustain') == 'Bruising') selected="selected" @endif>Bruising</option>
                                                <option value="Amputation" @if (old('injury_sustain') == 'Amputation') selected="selected" @endif>Amputation</option>
                                                <option value="None" @if (old('injury_sustain') == 'None') selected="selected" @endif>None</option>
                                            </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                            <div class="form-group">
                                            <label for="cause">Immediate Cause(s) (Select one or more if necessary):<span class="text-danger"> *</span></label>
                                            <select name="cause[]" class="form-control tagging"  multiple >
                                                <option value="Safety Rule Violated" @if (old('cause') == 'Safety Rule Violated') selected="selected" @endif>Safety Rule Violated</option>
                                                <option value="Lack of Task Skill" @if (old('cause') == 'Lack of Task Skill') selected="selected" @endif>Lack of Task Skill</option>
                                                <option value="Lack of Supervision" @if (old('cause') == 'Lack of Supervision') selected="selected" @endif>Lack of Supervision</option>
                                                <option value="Improper Lifting (MH)" @if (old('cause') == 'Improper Lifting (MH)') selected="selected" @endif>Improper Lifting (MH)</option>
                                                <option value="Not Paying Attention" @if (old('cause') == 'Not Paying Attention') selected="selected" @endif>Not Paying Attention</option>
                                                <option value="Human Error" @if (old('cause') == 'Human Error') selected="selected" @endif>Human Error</option>
                                                <option value="Inadequate PPE" @if (old('cause') == 'Inadequate PPE') selected="selected" @endif>Inadequate PPE</option>
                                                <option value="Animals" @if (old('cause') == 'Animals') selected="selected" @endif>Animals</option>
                                                <option value="Heat Stress" @if (old('cause') == 'Heat Stress') selected="selected" @endif>Heat Stress</option>
                                                <option value="Hit by Static Machinery" @if (old('cause') == 'Hit by Static Machinery') selected="selected" @endif>Hit by Static Machinery</option>
                                                <option value="Stress" @if (old('cause') == 'Stress') selected="selected" @endif>Stress</option>
                                                <option value="Lack of Resources" @if (old('cause') == 'Lack of Resources') selected="selected" @endif>Lack of Resources</option>
                                                <option value="Method Deviation" @if (old('cause') == 'Method Deviation') selected="selected" @endif>Method Deviation</option>
                                                <option value="Poor Weather Conditions" @if (old('cause') == 'Poor Weather Conditions') selected="selected" @endif>Poor Weather Conditions</option>
                                                <option value="Lack of Task Knowledge" @if (old('cause') == 'Lack of Task Knowledge') selected="selected" @endif>Lack of Task Knowledge</option>
                                                <option value="Lack of Communication" @if (old('cause') == 'Lack of Communication') selected="selected" @endif>Lack of Communication</option>
                                                <option value="Incorrect Tools/Equip" @if (old('cause') == 'Incorrect Tools/Equip') selected="selected" @endif>Incorrect Tools/Equip</option>
                                                <option value="Defective Tools" @if (old('cause') == 'Defective Tools') selected="selected" @endif>Defective Tools</option>
                                                <option value="Violence" @if (old('cause') == 'Violence') selected="selected" @endif>Violence</option>
                                                <option value="STF Above Ground" @if (old('cause') == 'STF Above Ground') selected="selected" @endif>STF Above Ground</option>
                                                <option value="Grinding/Welding" @if (old('cause') == 'Grinding/Welding') selected="selected" @endif>Grinding/Welding</option>
                                                <option value="Heavy Equipment" @if (old('cause') == 'Heavy Equipment') selected="selected" @endif>Heavy Equipment</option>
                                                <option value="Fatigue" @if (old('cause') == 'Fatigue') selected="selected" @endif>Fatigue</option>
                                                <option value="Drugs/Alcohol Related" @if (old('cause') == 'Drugs/Alcohol Related') selected="selected" @endif>Drugs/Alcohol Related</option>
                                                <option value="Poor Housekeeping" @if (old('cause') == 'Poor Housekeeping') selected="selected" @endif>Poor Housekeeping</option>
                                                <option value="Inadequate Lighting" @if (old('cause') == 'Inadequate Lighting') selected="selected" @endif>Inadequate Lighting</option>
                                                <option value="Poor Team Work" @if (old('cause') == 'Poor Team Work') selected="selected" @endif>Poor Team Work</option>
                                                <option value="No Risk Assessment" @if (old('cause') == 'No Risk Assessment') selected="selected" @endif>No Risk Assessment</option>
                                                <option value="Defective Equipment" @if (old('cause') == 'Defective Equipment') selected="selected" @endif>Defective Equipment</option>
                                                <option value="Unprotected Excavation" @if (old('cause') == 'Unprotected Excavation') selected="selected" @endif>Unprotected Excavation</option>
                                                <option value="Horseplay" @if (old('cause') == 'Horseplay') selected="selected" @endif>Horseplay</option>
                                                <option value="STF on the Same Level" @if (old('cause') == 'STF on the Same Level') selected="selected" @endif>STF on the Same Level</option>
                                                <option value="Knives/Sharps" @if (old('cause') == 'Knives/Sharps') selected="selected" @endif>Knives/Sharps</option>
                                                <option value="Splashes from C.P.O.L." @if (old('cause') == 'Splashes from C.P.O.L.') selected="selected" @endif>Splashes from C.P.O.L.</option>
                                                <option value="Vandalism" @if (old('cause') == 'Vandalism') selected="selected" @endif>Vandalism</option>
                                                <option value="Inadequate Visibility" @if (old('cause') == 'Inadequate Visibility') selected="selected" @endif>Inadequate Visibility</option>
                                                <option value="Employee Morale" @if (old('cause') == 'Employee Morale') selected="selected" @endif>Employee Morale</option>
                                                <option value="Employee Attitude" @if (old('cause') == 'Employee Attitude') selected="selected" @endif>Employee Attitude</option>
                                                <option value="Behaviour Problem" @if (old('cause') == 'Behaviour Problem') selected="selected" @endif>Behaviour Problem</option>
                                                <option value="Poor Ground Conditions" @if (old('cause') == 'Poor Ground Conditions') selected="selected" @endif>Poor Ground Conditions</option>
                                                <option value="Improper Lifting (crane)" @if (old('cause') == 'Improper Lifting (crane)') selected="selected" @endif>Improper Lifting (crane)</option>
                                                <option value="Unprotected Edge" @if (old('cause') == 'Unprotected Edge') selected="selected" @endif>Unprotected Edge</option>
                                                <option value="Improper/Poor Slinging" @if (old('cause') == 'Improper/Poor Slinging') selected="selected" @endif>Improper/Poor Slinging</option>
                                                <option value="Manual Handling" @if (old('cause') == 'Manual Handling') selected="selected" @endif>Manual Handling</option>
                                                <option value="Hit by Vehicle" @if (old('cause') == 'Hit by Vehicle') selected="selected" @endif>Hit by Vehicle</option>
                                                <option value="None" @if (old('cause') == 'None') selected="selected" @endif>None</option>
                                            </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12">
                                            <div class="form-group">
                                            <label for="equipment">Equipment(s) Involved (Select one or more if necessary)<span class="text-danger"> *</span></label>
                                            <select name="equipment[]" class="form-control tagging"  multiple >
                                                <option value="Light Vehicle" @if (old('equipment') == 'Light Vehicle') selected="selected" @endif>Light Vehicle</option>
                                                <option value="Heavy Vehicle" @if (old('equipment') == 'Heavy Vehicle') selected="selected" @endif>Heavy Vehicle</option>
                                                <option value="Plant Equipment" @if (old('equipment') == 'Plant Equipment') selected="selected" @endif>Plant Equipment</option>
                                                <option value="Static Plant Equipment" @if (old('equipment') == 'Static Plant Equipment') selected="selected" @endif>Static Plant Equipment</option>
                                                <option value="Building" @if (old('equipment') == 'Building') selected="selected" @endif>Building</option>
                                                <option value="Structure" @if (old('equipment') == 'Structure') selected="selected" @endif>Structure</option>
                                                <option value="Scaffold" @if (old('equipment') == 'Scaffold') selected="selected" @endif>Scaffold</option>
                                                <option value="Excavation" @if (old('equipment') == 'Excavation') selected="selected" @endif>Excavation</option>
                                                <option value="None" @if (old('equipment') == 'None') selected="selected" @endif>None</option>
                                            </select>
                                                </div>
                                            </div>


                                            <!-- End Row -->
                                            <button type="submit" class="btn btn-warning waves-effect waves-light bs-tooltip" title="Click to check the required field!">Check</button>
                                    </div>

                                        </section>
                                        <h3>Second</h3>
                                        <section>
                                            
                                            <div class="row">
                                            
                                            <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="description">Description of the Event<span class="text-danger"> *</span></label>
                                                <textarea class="form-control" name="description" id="field-7" placeholder="Write your description here ..." >{{ old('description') }}</textarea>
                                                    @if($errors->has('description'))
                                                        <span class="help-block text-danger">{{ $errors->first('description') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                <label for="action">Immediate Action(s) Taken to Prevent Reoccurance (If any)<span class="text-danger"> *</span></label>
                                                    <textarea class="form-control" name="action" placeholder="Write your immediate action here ..." >{{ old('action') }}</textarea>
                                                    @if($errors->has('action'))
                                                        <span class="help-block text-danger">{{ $errors->first('action') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                            <div class="form-group">
                                            <label for="wps">WPS<span class="text-danger"> *</span></label>
                                                <select name="wps" class="form-control selectpicker" >
                                                    <option value="">Select</option>
                                                    <option value="None">None</option>
                                                    <option value="1" @if (old('wps') == '1') selected="selected" @endif>1</option>
                                                    <option value="2" @if (old('wps') == '2') selected="selected" @endif>2</option>
                                                    <option value="3" @if (old('wps') == '3') selected="selected" @endif>3</option>
                                                    <option value="4" @if (old('wps') == '4') selected="selected" @endif>4</option>
                                                    <option value="5" @if (old('wps') == '5') selected="selected" @endif>5</option>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                            <div class="form-group">
                                            <label for="severity">Severity<span class="text-danger"> *</span></label>
                                                <select name="severity" class="form-control selectpicker"  >
                                                    <option value="">Select</option>
                                                    <option value="None">None</option>
                                                    <option value="1" @if (old('severity') == '1') selected="selected" @endif>1</option>
                                                    <option value="2" @if (old('severity') == '2') selected="selected" @endif>2</option>
                                                    <option value="3" @if (old('severity') == '3') selected="selected" @endif>3</option>
                                                    <option value="4" @if (old('severity') == '4') selected="selected" @endif>4</option>
                                                    <option value="5" @if (old('severity') == '5') selected="selected" @endif>5</option>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <label for="date">Date and Time of Incident<span class="text-danger"> * </span></label>
                                                <input type="date" value="{{ old('date') }}" id="dateTimeFlatpickr" name="date" class="form-control flatpickr flatpickr-input active" placeholder="Select Date and Time.." aria-="true">
                                                       
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
                                                            <a href="/incidents#!" type="button" class="btn btn-danger waves-effect">Cancel</a>
                                                            <button type="submit" class="btn btn-info waves-effect waves-light">Submit</button>
                                                        </div>
                                                </form>
                                </section>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
                
            </div>



@endsection


