<?php

namespace App\Http\Controllers;

use App\Models\AdminBarber;
use App\Models\User;
use App\Rules\CheckDate;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class CustomerController extends Controller
{

    public function index()
    {
        // $barber=DB::table('admin_barbers')
        //         ->join('users','admin_barbers.b_id','users.id')
        //         ->select('users.name as name',DB::raw('GROUP_CONCAT(admin_barbers.time) as time'),DB::raw('count(admin_barbers.b_id) as total'))
        //         ->groupBy('users.name')
        //         ->get();

        $schedul=AdminBarber::all()->where('barber',2)->groupBy('b_id');

    //    $barber=DB::table('admin_barbers')
    //              ->join('users','admin_barbers.b_id','users.id')
    //              ->select('users.name','admin_barbers.b_id','admin_barbers.time')
    //              ->groupBy('b_id','time','users.name')->get();
        //dd($barber);
        $id=Auth::user()->id;
        $user=User::find($id);

        return view('Users.auser.index',compact('schedul','user'));
    }

    public function apointmentpage($id)
    {
        $barber = DB::table('admin_barbers')->where('b_id', $id)->get();
        $schedul = DB::table('admin_barbers')->where('b_id', $id)->where('duration', 60)->get();
        $id=Auth::user()->id;
        $user=User::find($id);

        return view('Users.auser.apointment',compact('barber','schedul','user'));
    }

    public function post(Request $request,$id)
    {

        //dd($id);

        $validate=$request->validate([
            'schedul_id' => ['required'],
            'date'=>['required','date',new CheckDate]
        ]);

        $customer_name = Auth::user()->name;
        $customer_id = Auth::user()->id;
        $schedul_id = $request->schedul_id;
        $schedul_time = DB::table('admin_barbers')->where('id', $schedul_id)->get();

        $date = date("Y-m-d");



        $data = array();

        $data['customer_name'] = $customer_name;
        $data['customer_id'] = $customer_id;
        $data['b_id'] = $id;
        $data['schedul_id'] = $schedul_id;
        // $data['s_time']=$schedul_time->s_time;
        // $data['e_time']=$schedul_time->e_time;
        $data['date'] = $request->date;

        DB::table('customers')->insert($data);
        $notification = array('message' => 'apointment submit', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }


    public function apointment()
    {
        $id = Auth::user()->id;
        $user=User::find($id);
        $apointment = DB::table('customers')
            ->join('admin_barbers', 'customers.schedul_id', 'admin_barbers.id')
            ->where('customers.customer_id', $id)
            ->where('customers.confirm', 1)
            ->select('admin_barbers.*', 'customers.date', 'customers.schedul_id')
            ->get();
        //dd($apointment);
        return view('Users.auser.myindex',compact('apointment','user'));
    }


    public function delete($id)
    {
        DB::table('customers')->where('schedul_id', $id)->delete();

        DB::table('admin_barbers')->where('id', $id)->update(['duration' => 60]);
        $notification = array('message' => 'apointment delete', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function apointmentupdate($id,$b_id)
    {
        $barber = DB::table('admin_barbers')->where('b_id', $b_id)->get();
        $schedul = DB::table('admin_barbers')->where('b_id', $b_id)->where('duration', 60)->get();
        $myschedul=DB::table('customers')->where('schedul_id', $id)->first();
        $id=Auth::user()->id;
        $user=User::find($id);

        //dd($barber);
        return view('Users.auser.apointmentupdate',compact('schedul','barber','user','myschedul'));
    }

    public function apointmentupdatepost(Request $request,$id)
    {
        DB::table('admin_barbers')->where('id', $id)->update(['duration' => 60]);

        $data = array();


        $data['schedul_id'] = $request->schedul_id;
        $data['confirm'] = 0;

        DB::table('customers')->where('schedul_id',$id)->update($data);
        $notification = array('message' => 'apointment update', 'alert-type' => 'success');
        return redirect()->route('customer.apointment')->with($notification);

    }

    public function update()
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('Users.auser.profile', compact('user'));
    }

    public function updateprofile(Request $request)
    {
        $id = Auth::user()->id;
        $data = array();
        $data['name'] = $request->name;
        $data['address'] = $request->address;

        $image = $request->file('image');
        if ($image) {
            $image_name = Str::random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $data['image'] = $image_url;
                DB::table('users')->where('id',$id)->update($data);
                $notification = array('message' => 'profile update with image', 'alert-type' => 'success');
                return redirect()->back()->with($notification);
            }
        }
        DB::table('users')->where('id',$id)->update($data);
        $notification = array('message' => 'profile update without image', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
