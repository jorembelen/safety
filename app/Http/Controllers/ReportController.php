<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReportStoreRequest;
use App\Http\Requests\ReportUpdateRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Intervention\Image\Facades\Image;
use App\Models\Incident;
use App\Models\Location;
use App\Models\Report;
use App\Models\Employee;
use App\Models\RootCause;
use App\Models\Remark;
use App\User;
use Auth;
use DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = Report::whereuser_id(Auth::user()->id)->get();

        return view('report.index', compact('reports'));
    }

    public function adminIndex()
    {
        $reports = Report::all();

        return view('report.index', compact('reports'));
    }

    public function printReport($id)
    {
        $reports = Report::findOrFail($id);

        $output = $reports->name();

        $photos = explode('|', $reports->proof);
        $images = explode('|', $reports->inc_img);

        return view('reports.print', compact('reports', 'output', 'images', 'photos'));
    }

    public function review()
    {
        $reports = Report::all();
        $remarks = Remark::where('report_id')->get()->toArray();

        foreach($remarks as $remark)
        {
            $data = $remark;
        }
        // dd($remarks);
        return view('manager.index', compact('reports', 'data'));
    }

    public function remarksDetail($id)
    {
        $remarks = Remark::where('report_id', $id)->get();

        return view('manager.view', compact('remarks'));
    }


    public function remarks(Request $request)
    {

        $remarks = Remark::create($request->all());

        $id = $request->report_id;
        $status = '1';

        DB::update('update reports set remarks = ? where id = ?', [$status, $id]);
        
        Alert::toast('Remarks Successfully Added!', 'success');
        
        // }

        
        return redirect('/admin/review');
    }

    public function incidentReport($id)
    {
        $id;
        $data = Incident::where('id', '=', $id)->first();
      
        $officer = $data->employee_id;
        $location = $data->location;

        $officers = Employee::all();
        $locations = Location::all();
        
        return view('report.create', compact('officers', 'locations', 'id', 'officer', 'location'));
    }

    public function incident($id)
    {
        $reports = Report::findOrFail($id);

        // dd($reports);
        return view('report.index', compact('reports'));
    }


    public function reportAll()
    {
        $reports = Report::with('rootcause')->get();

        foreach($reports as $data)
        {
            $output = $data->name();
        }
        
        return view('reports.investigation', compact('reports', 'output'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReportStoreRequest $request)
    {
        // $this->validate();

        $reports = $request->all();

        // dd($reports);
        $images=array();
        if($files=$request->file('proof')){
            foreach($files as $file){

                    // for saving original image
                $ImageUpload = Image::make($file);
                $originalPath = 'storage/image/';
                $name = $file->hashName();
                $ImageUpload->save($originalPath .$name);
                
                // for saving thumnail image
                $thumbnailPath = 'storage/thumbnail/';
                $ImageUpload->resize(300,200);
                $ImageUpload = $ImageUpload->save($thumbnailPath .$name);
                
                // for saving to database
                $images[]=$name;
                $reports['proof'] = implode("|",$images);
            }
        }
        $incidents=array();
        if($imgs=$request->file('inc_img')){
            foreach($imgs as $img){
                    // for saving original image
                $Upload = Image::make($img);
                $path = 'storage/image/';
                $title = $img->hashName();
                $Upload->save($path .$title);
                
                // for saving thumnail image
                $resizePath = 'storage/thumbnail/';
                $Upload->resize(300,200);
                $Upload = $Upload->save($resizePath .$title);

                // for saving to database
                $incidents[]=$title;
                $reports['inc_img'] = implode("|",$incidents);
            }
        }


        if($request->hasfile('docs')){
            $doc = $request->file('docs');
            // get the name of the image
            $filename = $doc->hashName();
            $doc->move('storage/documents',$filename);
            $reports['docs'] = $filename;
        }

            if (Report::where('incident_id', '=', $request->incident_id)->exists()) 

            {
                Alert::error('Error', 'Notification ID already exists!');
                return back();

            } else {

            $datas = Report::create($reports);

            $count = count($request->root_name);
       
            for ($i=0; $i < $count; $i++) { 
            $output = new RootCause();
            $output->incident_id = $datas->incident_id;
            $output->user_id = auth()->user()->id;
            $output->root_name = $request->root_name[$i];
            $output->rec_name = $request->rec_name[$i];
            $output->rec_type = $request->rec_type[$i];
            $output->type = $request->root_description[$i];

            $datas->rootcause()->save($output);


        $id = $request->incident_id;
        $status = '1';

        DB::update('update incidents set status = ? where id = ?', [$status, $id]);

            }
        }

        Alert::toast('Data Added Successfully!', 'success');

        return redirect('/incidents');
    }

   


    public function showReport($id)
    {
        
        $reports = Report::where('incident_id', '=', $id)->get();

        return view('report.index', compact('reports'));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $reports = new Report();

        $reports = Report::findOrFail($id);

        $output = $reports->name();
        
        $photos = explode('|', $reports->proof);
        $images = explode('|', $reports->inc_img);
        
        return view('report.view', compact('reports', 'photos', 'images', 'output'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reports = Report::findOrFail($id);

        $officers = Employee::all();
        $locations = Location::all();
        // dd($reports);
        return view('report.edit', compact('reports', 'officers', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReportUpdateRequest $request, $id)
    {
        $reportUpdate = Report::findOrFail($id);

        $reports = $request->all();
        
        $photos = explode('|', $reportUpdate->proof);
        $incImages = explode('|', $reportUpdate->inc_img);
        

        // dd($photos);
        $images=array();
        if($files=$request->file('proof')){
    
            foreach($files as $file){
                
                foreach($photos as $photo){
                    $path1 = 'storage/image/';
                    $path2 = 'storage/thumbnail/';
                    // Delete old image from file
                    if($reportUpdate->proof != '') {
                        \File::delete($path1 .$photo);
                        \File::delete($path2 .$photo);
                    }
                }
                
                // for saving original image
                $ImageUpload = Image::make($file);
                $originalPath = 'storage/image/';
                $name = $file->hashName();
                $ImageUpload->save($originalPath .$name);
                
                // for saving thumnail image
                $thumbnailPath = 'storage/thumbnail/';
                $ImageUpload->resize(300,200);
                $ImageUpload = $ImageUpload->save($thumbnailPath .$name);

                $images[]=$name;
                $reports['proof'] = implode("|",$images);
            }
        }

        $incidents=array();
        if($imgs=$request->file('inc_img')){
            foreach($imgs as $img){
                
                foreach($incImages as $imgFile){
                    $path3 = 'storage/image/';
                    $path4 = 'storage/thumbnail/';
                    // Delete old image from file
                    if($reportUpdate->inc_img != '') {
                        \File::delete($path3 . $imgFile);
                        \File::delete($path4 . $imgFile);
                    }
                }
                // for saving original image
                $Upload = Image::make($img);
                $path = 'storage/image/';
                $title = $img->hashName();
                $Upload->save($path .$title);
                
                // for saving thumnail image
                $resizePath = 'storage/thumbnail/';
                $Upload->resize(300,200);
                $Upload = $Upload->save($resizePath .$title);

                // for saving to database
                $incidents[]=$title;
                $reports['inc_img'] = implode("|",$incidents);
            }
        }

        if($request->hasfile('docs')){
            $doc = $request->file('docs');

            // Delete old image from file
            if($reportUpdate->docs != '') {
                unlink(public_path('/storage/documents/') . $reportUpdate->docs);
            }

            // get the name of the image
            $filename = $doc->hashName();
            $doc->move('storage/documents',$filename);
            $reports['docs'] = $filename;
        }

            $reportUpdate->update($reports);
    
            Alert::toast('Data Updated Successfully!', 'success');

            return redirect('/reports');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $incidents = Report::all();

        $reports = Report::findOrFail($id);

        
        // Delete old image from file
        if($reports->docs) {
          unlink(public_path('/storage/documents/') . $reports->docs);
        }

        $photos1 = explode('|', $reports->proof);
        $photos2 = explode('|', $reports->inc_img);

        if($reports->proof) {
        foreach($photos1 as $img1){
            $path1 = 'storage/image/';
            $path2 = 'storage/thumbnail/';
            \File::delete($path1 . $img1);
            \File::delete($path2 . $img1);
          }
        }
        if($reports->inc_img) {
        foreach($photos2 as $img2){
            $path3 = 'storage/image/';
            $path4 = 'storage/thumbnail/';
            \File::delete( $path3 . $img2);
            \File::delete( $path4 . $img2);
          }
        }
        
        foreach($incidents as $incident){
            $id = $incident->incident_id;
        }
        $status = '0';

        DB::update('update incidents set status = ? where id = ?', [$status, $id]);

        $reports->delete();

        Alert::success('Success', 'Report Has Been Deleted Successfully');

        return redirect('/reports');
    }
}
