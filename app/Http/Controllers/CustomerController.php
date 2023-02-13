<?php

namespace App\Http\Controllers;

use App\Models\AdminBarber;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class CustomerController extends Controller
{

    public function index()
    {
        // $barber=DB::table('admin_barbers')
        //         ->join('users','admin_barbers.b_id','users.id')
        //         ->select('users.name as name',DB::raw('GROUP_CONCAT(admin_barbers.time) as time'),DB::raw('count(admin_barbers.b_id) as total'))
        //         ->groupBy('users.name')
        //         ->get();

       $schedul=AdminBarber::all()->groupBy('b_id');

    //    $barber=DB::table('admin_barbers')
    //              ->join('users','admin_barbers.b_id','users.id')
    //              ->select('users.name','admin_barbers.b_id','admin_barbers.time')
    //              ->groupBy('b_id','time','users.name')->get();
        //dd($barber);

        return view('Users.auser.index',compact('schedul'));
    }
}
