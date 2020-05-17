<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Notify;
use Auth;
use App\JobAd;
use DB;
use Redirect;
use Session;
use Notification;
use Carbon\Carbon;

class NotificationController extends Controller
{
    //
        public function tickets()
    {
        
        $jobs = JobAd::take(5)->get(); 
        $tickets = Ticket::where('user_id', Auth::user()->id)->get();
        //dd($tickets);
        $user = Auth::user();
        $data = array('job group 1','job group 2', 'jbs');
        foreach ($tickets as $key => $value) {
            # code...
            $details = [
                    'title' => $value->type,
                    'body' => 'You have received a response for your ticket. Please check on the ticket page',
            ];

            $user->notify(new \App\Notifications\Tickets($details));
        }

        return view('tickets.ticket', compact('jobs','tickets'));
    }

    public function send(Request $request)
    {
    	Ticket::create([
    		'type' => $request->type,
    		'user_id' => Auth::user()->id,
    		'description' => $request->description,
    		'status' => 0
    	]);


        $redirectMessage = [
            'title' => 'Ticket Sent!',
            'content' => 'Your ticket has been sent successfully. Kindly click on raised tickets to check on your ticket status and response from summit.',
        ];
        Session::flash('redirectMessage', $redirectMessage);

      return redirect()->back();
    }

       public function admintickets()
    {
        
        $tickets = Ticket::all();

        return view('tickets.adminticket', compact('tickets'));
    }

    public function response(Request $request)
    {

        Ticket::where('id', $request->ticket_id)->update([
            'response' => $request->response,
            'status' => $request->status
        ]);


      return redirect()->back();
    }

    public function staffNotification($id){
       
       $notification = Notify::where('id','=',$id)->first();
        
       $ans = json_decode($notification->data,true);
        if(is_array($ans)){
            $type=$ans['type'];
            $task = $ans['taskid']; 
        }
        
        if ($type === "job"){
        $notification->read_at = Carbon::now();
        $notification->update();

        return redirect()->route('jobAds.show',$task);
        }

    }
}
