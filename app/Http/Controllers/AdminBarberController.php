<?php

namespace App\Http\Controllers;

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

        //dd($barber);
       return view('admin.abarber.schedul',compact('barber'));
    }


    public function post(Request $request,$id)
    {
        $request->validate([
            'time'=> 'required',
        ]);

        $data=array();

        $data['time']=$request->time;
        $data['date']=$request->date;
        $data['b_id']=$id;

        DB::table('admin_barbers')->insert($data);

        return redirect()->back();

    }
}
