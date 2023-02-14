<?php

namespace App\Http\Controllers;

use App\Models\AdminBarber;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminBarberController extends Controller
{
    public function index()
    {
        $barber=DB::table('users')->where('isBarber',2)->get();
        //dd($barber);
        return view('admin.abarber.index',compact('barber'));
    }


    public function setschedul($id)
    {

        $barber=User::find($id);
        $schedul=DB::table('admin_barbers')->where('b_id',$id)->get();
        //dd($barber);
       return view('admin.abarber.schedul',compact('barber','schedul'));
    }


    public function post(Request $request,$id)
    {
        $request->validate([
            'time'=> 'required',
        ]);

        $barber=User::find($id);

        $data=array();

        $data['name']=$barber->name;
        $data['time']=$request->time;
        $data['end_time']=$request->end_time;
        $data['date']=$request->date;
        $data['b_id']=$id;
        $data['duration']=60;

        DB::table('admin_barbers')->insert($data);

        return redirect()->back();

    }

    public function show()
    {
        //$schedul=AdminBarber::all()->groupBy('b_id');
        $schedul=AdminBarber::all()->where('barber',2)->groupBy('b_id');
        //dd($schedul);
        return view('admin.abarber.schedulshow',compact('schedul'));
    }


    public function currentbook()
    {
        $date=date("Y-m-d");
        $schedul=DB::table('customers')
                ->join('admin_barbers','customers.schedul_id','admin_barbers.id')
                ->where('customers.date',$date)
                ->get();
        return view('admin.customer.currentbook',compact('schedul'));
    }


    public function oldbook()
    {
        $date=date("Y-m-d");
        $schedul=DB::table('customers')
                ->join('admin_barbers','customers.schedul_id','admin_barbers.id')
                ->whereNot('customers.date',$date)
                ->get();
        return view('admin.customer.oldbook',compact('schedul'));
    }


    public function confirm($id)
    {
        DB::table('admin_barbers')->where('id',$id)->update(['duration'=>59]);
        DB::table('customers')->where('schedul_id',$id)->update(['confirm'=>1]);
        $notification=array('message'=>'Confirm','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function cancel($id)
    {
        DB::table('admin_barbers')->where('id',$id)->update(['duration'=>60]);
        DB::table('customers')->where('schedul_id',$id)->update(['confirm'=>0]);
        $notification=array('message'=>'Cancel','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function reschedul()
    {
        $barber=DB::table('admin_barbers')->where('duration',59)->get();

        return view('admin.abarber.bookingreschedul',compact('barber'));
    }
}
