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
        $schedul=AdminBarber::all()->groupBy('b_id');
        //dd($schedul);
        return view('admin.abarber.schedulshow',compact('schedul'));
    }
}
