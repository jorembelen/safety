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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $officers = Employee::all();
        $locations = Location::all();

        return view('incidents.create', compact('officers', 'locations', 'id'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncidentStoreRequest $request)
    {
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
            $doc->move('storage/documents',$name);
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

        //    dd($data);

            $incidents->create($data); 
            
            // $doc->move('storage/documents',$name);

            Alert::toast('Notification Report Added Successfully!', 'success');
        // }
            
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
            $doc->move('storage/documents',$name);
            $data['docs'] = $name;
            // Delete old image from file
            if($incidents->docs != '') {
                unlink(public_path('/storage/documents/') . $incidents->docs);
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
            unlink(public_path('/storage/documents/') . $incidents->docs);

        }
        $incidents->delete();

        Alert::success('Success', 'Report Has Been Deleted Successfully');

        return redirect('/incidents');

    }


}
