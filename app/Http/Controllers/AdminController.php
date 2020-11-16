<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\User;
use Validator;
use App\Models\Location;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('email', '!=', 'jorembelen@gmail.com')->get();

        return view('admin.index', compact('users'));
    }

    public function profile($id)
    {
        $users = User::findOrFail($id);

        // dd($users);
        return view('admin.profile', compact('users'));
    }

    public function backup()
    {
       \Artisan::call('backup:run', ['--only-db' => true]);

        Alert::success('Success', 'Backup Has Been Created Successfully');
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            Alert::error('Error', 'Sorry, there\'s a problem while creating User.');
            return back()->withErrors($validator);
        }

        $adminUser = new User;
        $adminUser->name = $request->input('name');
        $adminUser->username = $request->input('username');
        $adminUser->email = $request->input('email');
        $adminUser->password = bcrypt($request->input('password'));
        $adminUser->save();

        Alert::toast('User Has Been Created Successfully', 'success');

        return redirect('/admin/users#!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|unique:users,username,'  .  $id . ',id',
            'email' => 'required|unique:users,email,'  .  $id . ',id',
            'password' => 'confirmed',
        ]);

        if ($validator->fails()) {
            Alert::error('Error', 'Sorry, there\'s a problem while updating User.');
            return redirect('/admin/users#!')->withErrors($validator);
        }

        $user = User::findOrFail($id);
        
        if(trim($request->password) == '') {

            $input = $request->except('password');
        }else{

        $input = $request->all();
                 
        $input['password'] = bcrypt($request->password);
    }
        $user->update($input);

        Alert::toast('User Has Been Updated Successfully!', 'success');

        return redirect('/admin/users#!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if(auth()->user()->id == $id) {

            Alert::error('Error', 'Sorry, you cannot delete your own account!.');
            return redirect()->back();

        } else {
            $path1 = 'images/uploads/profiles/';
            $path2 = 'images/uploads/profiles-thumb/';
            \File::delete( $path1 .$user->profile_pic);
            \File::delete( $path2 .$user->profile_pic);

            $user->delete();

            Alert::success('Success', 'User Has Been Deleted Successfully');
        }

        return redirect('/admin/users#!');
    }
}
