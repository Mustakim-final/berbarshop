<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $id=Auth::user()->id;
        $user=User::find($id);
        return view('Users.useradmin',compact('user'));
    }


    public function adminhome()
    {

        return view('admin.useradmin');
    }

    public function berbarhome()
    {
        $id=Auth::user()->id;
        $user=User::find($id);
        return view('Barber.useradmin',compact('user'));
    }




    public function barberindex()
    {
        $barber=DB::table('users')->get();
        return view('admin.abarber.regbarbers',compact('barber'));
    }

    public function barberconfirm($id)
    {
        $user=DB::table('users')->where('id',$id)->update(['isBarber'=>2]);

        return redirect()->back();

    }

    public function barberunconfirm($id)
    {
        $user=DB::table('users')->where('id',$id)->update(['isBarber'=>0]);

        return redirect()->back();

    }


}
