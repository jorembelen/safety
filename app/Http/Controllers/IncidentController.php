<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\IncidentStoreRequest;
use App\Http\Requests\IncidentUpdateRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Incident;
use App\Models\Report;
use App\Models\Location;
use App\Models\Employee;
use App\User;
use Auth;
use Validator;
use App\Notifications\AdminNotification;
use App\Notifications\UserNotification;

class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
     
        $incidents = Incident::whereuser_id(Auth::user()->id)->latest()->get();
        // $incidents = $source->where('$user->->user->role', '==', 'admin')->get();
        
        return view('incidents.index', compact('incidents'));
    }
    
    public function adminIndex()
    {
        
        $incidents = Incident::all();
        // dd($incidents);

        return view('incidents.index', compact('incidents'));
    }
    
    public function export()
    {
        
        $incidents = Incident::all();

        return view('reports.notification', compact('incidents'));
    }

    public function awaiting()
    {
        $incidents = Incident::wherestatus('0')->whereuser_id(auth()->user()->id)->get();

        return view('incidents.index', compact('incidents'));
    }

    public function awaitingAdmin()
    {
        $incidents = Incident::wherestatus('0')->get();

        return view('incidents.index', compact('incidents'));
    }


    public function printNotification($id)
    {
        $incidents = Incident::findOrFail($id);

        return view('reports.print_remarks', compact('incidents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

        $officers = Employee::all();
        $locations = Location::all();

        return view('incidents.create')
        ->with('officers', $officers)
        ->with('locations', $locations);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncidentStoreRequest $request)
    {
        $greetings = "";
        date_default_timezone_set('Asia/Riyadh');
        
        /* This sets the $time variable to the current hour in the 24 hour clock format */
        $time = date("H");

        /* Set the $timezone variable to become the current timezone */
        $timezone = date("e");

        /* If the time is less than 1200 hours, show good morning */
        if ($time < "12") {
            $greetings = "Good Morning!";
        } else

        /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
        if ($time >= "12" && $time < "17") {
            $greetings = "Good Afternoon!";
        } else

        /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
        if ($time >= "17" && $time < "19") {
            $greetings = "Good Evening!";
        } else

        /* Finally, show good night if the time is greater than or equal to 1900 hours */
        if ($time >= "19") {
            $greetings = "Good Night!";
        }

        $validator = $request->getValidatorInstance();

        $incidents = new Incident;
        
        $data = $request->all();

        
        if($request->hasfile('docs')){
            $doc = $request->file('docs');
            
            // get the name of the image
            $name = $doc->hashName();
            // $name = $doc->getClientOriginalName();
            // $name = time() .$name;
            // $name = str_replace(' ','-',$name);
            $doc->move('files/documents',$name);
            $data['docs'] = $name;
        }
        
        if($request->filled('cause')){
            $data['cause'] = implode(', ' , $request->cause); 
        }
        
        if($request->filled('injury_sustain')){
            $data['injury_sustain'] = implode(', ' , $request->injury_sustain); 
        }
        
        if($request->filled('injury_location')){
            $data['injury_location'] = implode(', ' , $request->injury_location); 
        }
        
        if($request->filled('equipment')){
            $data['equipment'] = implode(', ' , $request->equipment); 
        }
        

        if($request->sel_involved == 'Employee')
        {
            $data['involved'] = implode(', ', $request->employee); 
        }else{
            $data['involved'] = $request->contractor;
        }

        
        $output = $incidents->create($data); 

        Alert::toast('Notification Report Added Successfully!', 'success');
        
        $url = 'http://192.168.156.161:8000/incidents/' .$output->id;
        $sender = 'Created by: ' .auth()->user()->name;
        $project = $output->location;
        $op = \DB::table('locations')->where('id', $project)->first();
        $location = 'Project: ' .$op->name;
        $title = 'Type of Incident: ' .$output->type;
        $user = User::where('id', '=', auth()->user()->id)->get();
        $admin = User::whererole('admin')->get();
  
            $adminDetails = [
                'greeting' => $greetings,
                'body' => ' New Notification Report was added to your site.',
                'officer' =>  $sender,
                'project' =>  $title,
                'location' =>  $location,
                'actionText' => 'Go to Site',
                'actionURL' => url($url),
                'thanks' => 'Please go to site to view notification details!',
                'detail_id' => $output->id,
            ];

            $userDetails = [
                'greeting' => $greetings,
                'body' => 'Your Notification Report was successfully created!',
                'project' =>  $title,
                'location' =>  $location,
                'actionText' => 'Go to Site',
                'actionURL' => url($url),
                'thanks' => 'Please go to site to view incident details!',
                'info_id' => $output->id,
            ];
            
            // \Notification::send($user, new UserNotification($userDetails));
            // \Notification::send($admin, new AdminNotification($adminDetails));

            return redirect('/incidents');
            
            
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\IncidentController  $incidentController
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $incidents = Incident::findOrFail($id);

        $employees = $incidents->employee->badge .' - '. $incidents->employee->name .''.($incidents->employee->designation);

        // dd($incidents->involved->employee->name);

        $photos = explode('|', $incidents->images);

        // return $photos;

        return view('incidents.view')
        ->with('incidents' , $incidents)
        ->with('employees' , $employees)
        ->with('photos' , $photos);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IncidentController  $incidentController
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $incidents = Incident::findOrFail($id);

        $officers = Employee::all();
        $locations = Location::all();
        
        return view('incidents.edit', compact('officers', 'locations', 'incidents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IncidentController  $incidentController
     * @return \Illuminate\Http\Response
     */
    public function update(IncidentUpdateRequest $request, $id)
    {
        $incidents = Incident::findOrFail($id);
        
        $data = $request->all();

        // dd($data);
        if($request->hasfile('docs')){
            $doc = $request->file('docs');
            // get the name of the image
            $name = $doc->hashName();
            // $name = $doc->getClientOriginalName();
            // $name = time() .$name;
            // $name = str_replace(' ','-',$name);
            $doc->move('files/documents',$name);
            $data['docs'] = $name;
            // Delete old image from file
            if($incidents->docs != '') {
                unlink(public_path('/files/documents/') . $incidents->docs);
            }
            // $reports['docs'] = $name;
        }
        
        if($request->filled('cause')){
            $data['cause'] = implode(', ' , $request->cause); 
        }
        
        if($request->filled('injury_sustain')){
            $data['injury_sustain'] = implode(', ' , $request->injury_sustain); 
        }
        
        if($request->filled('injury_location')){
            $data['injury_location'] = implode(', ' , $request->injury_location); 
        }
        
        if($request->filled('equipment')){
            $data['equipment'] = implode(', ' , $request->equipment); 
        }

        if($request->sel_involved == 'Employee')
        {
            $data['involved'] = implode(', ', $request->employee); 
        }else{
            $data['involved'] = $request->contractor;
        }
        
            // dd($data);
            $incidents->update($data); 
            
            // $doc->move('storage/documents',$name);

        Alert::toast('Report Updated Successfully!', 'success');
            
        return redirect('/incidents');
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IncidentController  $incidentController
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $incidents = Incident::findOrFail($id);

        if($incidents->reports()->count()) {

            Alert::error('Error', 'Sorry, this data has an existing investigation report!');
            return back();
            
        } 

        //   Delete old image from file
          if($incidents->docs) {
            unlink(public_path('/files/documents/') . $incidents->docs);

        }
        $incidents->delete();

        Alert::success('Success', 'Report Has Been Deleted Successfully');

        return redirect('/incidents');

    }


}
