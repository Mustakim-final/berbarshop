<?php

namespace App\Http\Controllers;

use App\Models\AdminBarber;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BarberController extends Controller
{
    public function update()
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('Barber.barberprofile.profile',compact('user'));
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


    public function index()
    {
        $id=Auth::user()->id;
        $user=User::find($id);

       $schedul=AdminBarber::all()->groupBy('b_id');
       //dd($schedul);
        return view('Barber.barberprofile.index',compact('schedul','user'));
    }


    public function myschedulpage()
    {

        $id=Auth::user()->id;
        $user=User::find($id);


        $schedul=DB::table('admin_barbers')->where('b_id',$id)->get();

        return view('Barber.barberprofile.schedul',compact('schedul','user'));
    }


    public function myschedul(Request $request)
    {
        $request->validate([
            'time'=> 'required',
        ]);

        $id=Auth::user()->id;

        $data=array();

        $data['name']=Auth::user()->name;
        $data['time']=$request->time;
        $data['end_time']=$request->end_time;
        $data['date']=$request->date;
        $data['b_id']=$id;
        $data['duration']=60;

        DB::table('admin_barbers')->insert($data);

        return redirect()->back();
    }


    public function myapointment()
    {
        $id = Auth::user()->id;
        $user=User::find($id);
        $date=date("Y-m-d");
        $schedul=DB::table('customers')
                ->join('admin_barbers','customers.schedul_id','admin_barbers.id')
                ->where('customers.date',$date)
                ->get();
        return view('Barber.barberprofile.myapointment',compact('schedul','user'));
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


    //baber schedul

    public function shcedulpage()
    {


        $id=Auth::user()->id;
        $user=User::find($id);
        $schedul=AdminBarber::all()->where('b_id',$id);

        return view('Barber.barberprofile.myschedul',compact('schedul','user'));
    }

    public function shcedulupdatepage($id)
    {
        $myid=Auth::user()->id;
        $userid=Auth::user()->id;
        $user=User::find($userid);
        $schedul=DB::table('admin_barbers')->where('b_id',$myid)->get();
        $single=AdminBarber::find($id);
        //dd($single);
        return view('Barber.barberprofile.updatepage',compact('schedul','single','user'));
    }


    public function shcedulupdate(Request $request,$id)
    {


        $data=array();


        $data['time']=$request->time;
        $data['end_time']=$request->end_time;
        $data['date']=$request->date;

        DB::table('admin_barbers')->where('id',$id)->update($data);

        $notification = array('message' => 'update schedul', 'alert-type' => 'success');
        return redirect()->route('barber.schedulpage')->with($notification);
    }

    public function delete($id)
    {
        DB::table('admin_barbers')->where('id',$id)->delete();
        $notification = array('message' => 'delete', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

}
