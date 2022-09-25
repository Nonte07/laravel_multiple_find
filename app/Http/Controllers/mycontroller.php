<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Psy\Command\WhereamiCommand;

class mycontroller extends Controller
{
    public function th()
    {
        $data['userdata'] =  DB::table('c1')->get();
        return view('welcome', $data);
    }
    public function formsubmit(Request $req)
    {
        $data = array();
        $data['email'] = $req->email;
        $data['password'] = $req->pass;
        $img_name = $req->file('img')->store('photo');
        $data['image'] = $img_name;
        DB::table('c1')->insert($data);
        return redirect()->back()->with('success', 'your message,here');
    }
    public function deletedata($id)
    {
        DB::table('c1')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'your message,here');
    }
    public function editdata($id)
    {
        $data['user'] =  DB::table('c1')->where('id', $id)->first();
        return view('edit', $data);
    }
    public function updated(Request $req)
    {
        $data = array();
        $data['email'] = $req->email;
        $data['password'] = $req->pass;
        DB::table('c1')->where('id', $req->id)->update($data);
        return redirect('/');
    }
    public function filteer()
    {
        $data = array();
        $query = DB::table('c1');
        if (isset($_GET['filterr'])) {
            $email = $_GET['filterr'];
            $password = $_GET['filterr'];
            $query = DB::table('c1')->where('email', 'like', '%' . $email . '%')->orWhere('password', 'like', '%' . $password . '%');;
        }
        $query = $query->get();
        $data['userdata'] = $query;
        return view('welcome', $data);
    }
}
