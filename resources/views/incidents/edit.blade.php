@extends('layouts.master')

@section('title', 'Notification Report Update')
@section('content') 
 
<div class="row">
<div class="col-lg-12 layout-spacing mt-4">
                            <div class="statbox widget box box-shadow">
                                <a href="/incidents#!" type="button"class="btn btn-primary mb-2 float-right">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                    Back
                                </a>  
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Update Notification Report</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                <form class="form-horizontal" method="POST" action="{{ route('incidents.update', $incidents->id) }}" enctype="multipart/form-data">
                                @csrf
                                {{ method_field('PUT') }}
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                    <div id="circle-basic" class="">
                                        <h3>First</h3>
                                        <section>

                                        <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="safety_officer_id">Safety Officer<span class="text-danger"> *</span></label>
                                                <select name="employee_id" class="form-control selectpicker" data-live-search="true" required>
                                                            <option value="{{ $incidents->officer->id }}">{{$incidents->officer->badge}} - {{$incidents->officer->name}} ({{$incidents->officer->designation}})</option>
                                                            @foreach( $officers as $officer)
                                                            <option value="{{$officer->id}}">{{$officer->badge}} - {{$officer->name}} ({{$officer->designation}})</option>
                                                            @endforeach
                                                        </select>
                                                        @if($errors->has('employee_id'))
                                                            <span class="help-block text-danger">{{ $errors->first('employee_id') }}</span>
                                                        @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="location">Site Location<span class="text-danger"> *</span></label>
                                                <select name="location" class="form-control selectpicker" data-live-search="true" required>
                                                <option value="{{ $incidents->location }}">{{ $incidents->locations->loc_name }}</option>
                                                            @foreach( $locations as $location)
                                                            <option value="{{$location->id}}">{{$location->loc_name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @if($errors->has('location'))
                                                            <span class="help-block text-danger">{{ $errors->first('location') }}</span>
                                                        @endif
                                                </div>
                                            </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="type">Type Of Incident<span class="text-danger"> *</span></label>
                                                <select name="type" class="form-control selectpicker" data-live-search="true" required>
                                                        <option value="{{ $incidents->type }}">{{ $incidents->type }}</option>
                                                        <option value="Fatality" @if (old('type') == 'Fatality') selected="selected" @endif>Fatality</option>
                                                        <option value="Lost Time Injury" @if (old('type') == 'Lost Time Injury') selected="selected" @endif>Lost Time Injury</option>
                                                        <option value="Dangerous Occurence" @if (old('type') == 'Dangerous Occurence') selected="selected" @endif>Dangerous Occurence</option>
                                                        <option value="First Aid" @if (old('type') == 'First Aid') selected="selected" @endif>First Aid</option>
                                                        <option value="First Aid - GOSI" @if (old('type') == 'First Aid - GOSI') selected="selected" @endif>First Aid - GOSI</option>
                                                        <option value="Property Damage" @if (old('type') == 'Property Damage') selected="selected" @endif>Property Damage</option>
                                                        <option value="MTC" @if (old('type') == 'MTC') selected="selected" @endif>MTC</option>
                                                        <option value="RWC" @if (old('type') == 'RWC') selected="selected" @endif>RWC</option>
                                                        <option value="MVI" @if (old('type') == 'MVI') selected="selected" @endif>MVI</option>
                                                        <option value="Near Miss" @if (old('type') == 'Near Miss') selected="selected" @endif>Near Miss</option>
                                                    </select>
                                                    @if($errors->has('type'))
                                                        <span class="help-block text-danger">{{ $errors->first('type') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="type">Incident Category<span class="text-danger"> *</span></label>
                                                <select name="inc_category" class="form-control selectpicker" required>
                                                    <option value="{{ $incidents->inc_category }}">{{ $incidents->inc_category }}</option>
                                                        <option value="Dangerous Occurence" @if (old('inc_category') == 'Dangerous Occurence') selected="selected" @endif>Dangerous Occurence</option>
                                                        <option value="Near Miss" @if (old('inc_category') == 'Near Miss') selected="selected" @endif>Near Miss</option>
                                                    </select>
                                                    @if($errors->has('inc_category'))
                                                        <span class="help-block text-danger">{{ $errors->first('inc_category') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="type">Insurance<span class="text-danger"> *</span></label>
                                                <select name="insurance" class="form-control selectpicker" required>
                                                        <option value="{{ $incidents->insurance }}">{{ $incidents->insurance }}</option>
                                                        <option value="GOSI" @if (old('insurance') == 'GOSI') selected="selected" @endif>GOSI</option>
                                                        <option value="Non GOSI" @if (old('insurance') == 'Non GOSI') selected="selected" @endif>Non GOSI</option>
                                                    </select>
                                                    @if($errors->has('insurance'))
                                                        <span class="help-block text-danger">{{ $errors->first('insurance') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                            <div class="form-group">
                                            <label for="sel_involved">Persons Involved<span class="text-danger"> *</span></label>
                                                <select name="sel_involved" class="form-control selectpicker" id="frst_aid" required>
                                                                <option value="{{ $incidents->sel_involved }}">{{ $incidents->sel_involved }}</option>
                                                                <option value="Employee" @if (old('sel_involved') == 'Employee') selected="selected" @endif>Employee</option>
                                                                <option value="NonEmployee" @if (old('sel_involved') == 'NonEmployee') selected="selected" @endif>Non Employee</option>
                                                        </select>
                                                        @if($errors->has('involve'))
                                                            <span class="help-block text-danger">{{ $errors->first('involve') }}</span>
                                                        @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                            <div class="form-group frm-aider-div" id="vidEmployee" style="display:none">
                                                <label for="employee">Employees Details<span class="text-danger"> @if($incidents->sel_involved == 'Employee'){{ $incidents->involved }} @endif</span></label>
                                                <select name="employee[]" class="form-control tagging"  multiple>
                                                <option value="{{ $incidents->involved }}">{{ $incidents->involved }}</option>
                                                    @foreach( $officers as $officer)
                                                    <option value="{{$officer->badge}} - {{$officer->name}}" @if (old('employee') == '{{$officer->badge}}  {{$officer->name}}' ) selected="selected" @endif>{{$officer->badge}} - {{$officer->name}} ({{$officer->designation}})</option>
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
                                                <textarea type="text" class="form-control" name="contractor" placeholder="Specify data here...">@if($incidents->sel_involved == 'NonEmployee'){{ $incidents->involved }}@endif</textarea>
                                                        @if($errors->has('contractor'))
                                                            <span class="help-block text-danger">{{ $errors->first('contractor') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                            <label for="inj_location">Injury Location (Select one or more if necessary):<span class="text-danger"> {{ $incidents->injury_location }}</span></label>
                                                <select name="injury_location[]" class="form-control tagging"  multiple>
                                                    <option value="Head"  @if (old('injury_location') == 'Head') selected="selected" @endif>Head</option>
                                                    <option value="Face"  @if (old('injury_location') == 'Face') selected="selected" @endif>Face</option>
                                                    <option value="Neck">Neck</option>
                                                    <option value="Back">Back</option>
                                                    <option value="Nose/Ears">Nose/Ears</option>
                                                    <option value="Chest">Chest</option>
                                                    <option value="Leg">Leg</option>
                                                    <option value="Abdomen">Abdomen</option>
                                                    <option value="Stomach">Stomach</option>
                                                    <option value="Shoulder">Shoulder</option>
                                                    <option value="Hand">Hand</option>
                                                    <option value="Arm">Arm</option>
                                                    <option value="Wrist">Wrist</option>
                                                    <option value="Elbow">Elbow</option>
                                                    <option value="Fingers/Thumb">Fingers/Thumb</option>
                                                    <option value="Eyes">Eyes</option>
                                                    <option value="Hip">Hip</option>
                                                    <option value="Ankle/Foot">Ankle/Foot</option>
                                                    <option value="Knee">Knee</option>
                                                    <option value="Toes">Toes</option>
                                                    <option value="None">None</option>
                                                </select>
                                                        @if($errors->has('injury_location'))
                                                            <span class="help-block text-danger">{{ $errors->first('injury_location') }}</span>
                                                        @endif
                                                </div>
                                            </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                            <label for="inj_sustain">Type of Injury Sustained (Select one or more if necessary):<span class="text-danger"> {{ $incidents->injury_sustain }}</span></label>
                                            <select name="injury_sustain[]" class="form-control tagging"  multiple>
                                                <option value="Fracture">Fracture</option>
                                                <option value="Loss of Sight">Loss of Sight</option>
                                                <option value="Dislocation">Dislocation</option>
                                                <option value="Abrasion">Abrasion</option>
                                                <option value="Cut/Laceration">Cut/Laceration</option>
                                                <option value="Loss of Consciousness">Loss of Consciousness</option>
                                                <option value="Crush Injury">Crush Injury</option>
                                                <option value="Suffocation">Suffocation</option>
                                                <option value="Scalping">Scalping</option>
                                                <option value="Heat">Heat</option>
                                                <option value="Cold">Cold</option>
                                                <option value="Burn">Burn</option>
                                                <option value="Bruising">Bruising</option>
                                                <option value="Amputation">Amputation</option>
                                                <option value="None">None</option>
                                            </select>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                            <div class="form-group">
                                            <label for="cause">Immediate Cause(s) (Select one or more if necessary):<span class="text-danger"> {{ $incidents->cause }}</span></label>
                                            <select name="cause[]" class="form-control tagging"  multiple>
                                                <option value="Safety Rule Violated">Safety Rule Violated</option>
                                                <option value="Lack of Task Skill">Lack of Task Skill</option>
                                                <option value="Lack of Supervision">Lack of Supervision</option>
                                                <option value="Improper Lifting (MH)">Improper Lifting (MH)</option>
                                                <option value="Not Paying Attention">Not Paying Attention</option>
                                                <option value="Human Error">Human Error</option>
                                                <option value="Inadequate PPE">Inadequate PPE</option>
                                                <option value="Animals">Animals</option>
                                                <option value="Heat Stress">Heat Stress</option>
                                                <option value="Hit by Static Machinery">Hit by Static Machinery</option>
                                                <option value="Stress">Stress</option>
                                                <option value="Lack of Resources">Lack of Resources</option>
                                                <option value="Method Deviation">Method Deviation</option>
                                                <option value="Poor Weather Conditions">Poor Weather Conditions</option>
                                                <option value="Lack of Task Knowledge">Lack of Task Knowledge</option>
                                                <option value="Lack of Communication">Lack of Communication</option>
                                                <option value="Incorrect Tools/Equip">Incorrect Tools/Equip</option>
                                                <option value="Defective Tools">Defective Tools</option>
                                                <option value="Violence">Violence</option>
                                                <option value="STF Above Ground">STF Above Ground</option>
                                                <option value="Grinding/Welding">Grinding/Welding</option>
                                                <option value="Heavy Equipment">Heavy Equipment</option>
                                                <option value="Fatigue">Fatigue</option>
                                                <option value="Drugs/Alcohol Related">Drugs/Alcohol Related</option>
                                                <option value="Poor Housekeeping">Poor Housekeeping</option>
                                                <option value="Inadequate Lighting">Inadequate Lighting</option>
                                                <option value="Poor Team Work">Poor Team Work</option>
                                                <option value="No Risk Assessment">No Risk Assessment</option>
                                                <option value="Defective Equipment">Defective Equipment</option>
                                                <option value="Unprotected Excavation">Unprotected Excavation</option>
                                                <option value="Horseplay">Horseplay</option>
                                                <option value="STF on the Same Level">STF on the Same Level</option>
                                                <option value="Knives/Sharps">Knives/Sharps</option>
                                                <option value="Splashes from C.P.O.L.">Splashes from C.P.O.L.</option>
                                                <option value="Vandalism">Vandalism</option>
                                                <option value="Inadequate Visibility">Inadequate Visibility</option>
                                                <option value="Employee Morale">Employee Morale</option>
                                                <option value="Employee Attitude">Employee Attitude</option>
                                                <option value="Behaviour Problem">Behaviour Problem</option>
                                                <option value="Poor Ground Conditions">Poor Ground Conditions</option>
                                                <option value="Improper Lifting (crane)">Improper Lifting (crane)</option>
                                                <option value="Unprotected Edge">Unprotected Edge</option>
                                                <option value="Improper/Poor Slinging">Improper/Poor Slinging</option>
                                                <option value="Manual Handling">Manual Handling</option>
                                                <option value="Hit by Vehicle">Hit by Vehicle</option>
                                                <option value="None">None</option>
                                            </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-8">
                                            <div class="form-group">
                                            <label for="equipment">Equipment(s) Involved (Select one or more if necessary)<span class="text-danger"> {{ $incidents->equipment }}</span></label>
                                            <select name="equipment[]" class="form-control tagging"  multiple>
                                                <option value="Light Vehicle">Light Vehicle</option>
                                                <option value="Heavy Vehicle">Heavy Vehicle</option>
                                                <option value="Plant Equipment">Plant Equipment</option>
                                                <option value="Static Plant Equipment">Static Plant Equipment</option>
                                                <option value="Building">Building</option>
                                                <option value="Structure">Structure</option>
                                                <option value="Scaffold">Scaffold</option>
                                                <option value="Escavation">Excavation</option>
                                                <option value="None">None</option>
                                            </select>
                                                </div>
                                            </div>


                                            <!-- End Row -->
                                    </div>


                                        </section>
                                        <h3>Second</h3>
                                        <section>
                                            
                                            <div class="row">
                                            
                                            <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="description">Description of the Event<span class="text-danger"> *</span></label>
                                                <textarea class="form-control" name="description" id="field-7" placeholder="Write your description here ..." required>{{ $incidents->description }}</textarea>
                                                    @if($errors->has('description'))
                                                        <span class="help-block text-danger">{{ $errors->first('description') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                <label for="action">Immediate Action(s) Taken to Prevent Reoccurance (If any)<span class="text-danger"> *</span></label>
                                                    <textarea class="form-control" name="action" placeholder="Write your immediate action here ..." required>{{ $incidents->action }}</textarea>
                                                    @if($errors->has('action'))
                                                        <span class="help-block text-danger">{{ $errors->first('action') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                            <div class="form-group">
                                            <label for="wps">WPS<span class="text-danger"> *</span></label>
                                                <select name="wps" class="form-control selectpicker" required>
                                                    <option value="{{ $incidents->wps }}">{{ $incidents->wps }}</option>
                                                    <option value="None" @if (old('wps') == 'None') selected="selected" @endif>None</option>
                                                    <option value="1" @if (old('wps') == '1') selected="selected" @endif>1</option>
                                                    <option value="2" @if (old('wps') == '2') selected="selected" @endif>2</option>
                                                    <option value="3" @if (old('wps') == '3') selected="selected" @endif>3</option>
                                                    <option value="4" @if (old('wps') == '4') selected="selected" @endif>4</option>
                                                    <option value="5" @if (old('wps') == '5') selected="selected" @endif>5</option>
                                                </select>
                                                    @if($errors->has('wps'))
                                                        <span class="help-block text-danger">{{ $errors->first('wps') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                            <div class="form-group">
                                            <label for="severity">Severity<span class="text-danger"> *</span></label>
                                                <select name="severity" class="form-control selectpicker"  required>
                                                    <option value="{{ $incidents->severity }}">{{ $incidents->severity }}</option>
                                                    <option value="None" @if (old('severity') == 'None') selected="selected" @endif>None</option>
                                                    <option value="1" @if (old('severity') == '1') selected="selected" @endif>1</option>
                                                    <option value="2" @if (old('severity') == '2') selected="selected" @endif>2</option>
                                                    <option value="3" @if (old('severity') == '3') selected="selected" @endif>3</option>
                                                    <option value="4" @if (old('severity') == '4') selected="selected" @endif>4</option>
                                                    <option value="5" @if (old('severity') == '5') selected="selected" @endif>5</option>
                                                </select>
                                                    @if($errors->has('severity'))
                                                        <span class="help-block text-danger">{{ $errors->first('severity') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <label for="date">Date and Time of Incident<span class="text-danger"> *</span></label>
                                                <input type="text" value="{{ $incidents->date }}" id="dateTimeFlatpickr" name="date" class="form-control flatpickr flatpickr-input active" placeholder="Select Date and Time.." required>
                                                        @if($errors->has('date'))
                                                            <span class="help-block text-danger">{{ $errors->first('date') }}</span>
                                                        @endif
                                                    </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <label for="docs">Attached Documents (word/pdf)<span class="text-danger"> {{ $incidents->docs }}</span></label>
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


