<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incident;
use App\Models\RootCause;
use App\User;
use App\Notifications\UserNotification;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect('/dashboard');
    }

    public function dashboard()
    {
        $totalA =  count(Incident::wheretype('Fatality')->get());
        $totalB =  count(Incident::wheretype('Lost Time Injury')->get());
        $totalC =  count(Incident::wheretype('Dangerous Occurence')->get());
        $totalD =  count(Incident::wheretype('First Aid')->get());
        $totalE =  count(Incident::wheretype('Property Damage')->get());
        $totalF =  count(Incident::wheretype('MTC')->get());
        $totalG =  count(Incident::wheretype('RWC')->get());
        $totalH =  count(Incident::wheretype('MVI')->get());
        $totalI =  count(Incident::wherestatus('0')->get());
        $totalJ =  count(Incident::wheretype('Near Miss')->get());
        $totalK =  count(Incident::wherestatus('0')->where('user_id', '=', auth()->user()->id)->get());
        $totalL =  count(RootCause::wherestatus('0')->get());
        $totalM =  count(RootCause::wherestatus('0')->where('user_id', '=', auth()->user()->id)->get());

        // dd($totalM);
        $data = [$totalA, $totalB, $totalC, $totalD, $totalE, $totalF, $totalG, $totalH, $totalI, $totalJ, $totalK, $totalL, $totalM];

        return view('admin.dashboard', compact('data'));
    }

    public function sendNotification()
    {
        $user = User::first();
  
        $details = [
            'greeting' => 'Greetings!',
            'body' => 'New Notifiation Report was added to your site.',
            'actionText' => 'Go to Site',
            'actionURL' => url('http://192.168.156.161:8000/admin/notification#!'),
            'thanks' => 'Please check your data!',
            'detail_id' => 101
        ];
        
        // dd($details);
        \Notification::send($user, new UserNotification($details));
        // $user->notify(new UserNotification($details));
   
        Alert::toast('Email notification sent!', 'success');
    }
}
