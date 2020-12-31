<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Storage; 
class UserController extends Controller
{

    public function uploadAvatar(Request $request)
    {
        if($request->hasFile('image')){
            User::uploadAvatar($request->image);
            // $request->session()->flash('message','Image Uploaded.');
            return redirect()->back()->with('message','Image Uploaded.');
        }
        // $request->session()->flash('error','Image not Uploaded.');
        return redirect()->back()->with('error','Image not Uploaded');
    }
    
    public function index() 
    {
        $data = [
            'name' => 'tuntunss',
            'email' => 'tuntunsss@gmial.com',
            'password' => bcrypt('password')
        ];
        // User::create($data);

        // $user = new User();
        // $user->name = 'susu';
        // $user->email = 'susu@gmail.com';
        // $user->password = bcrypt('password');
        // $user->save();

        // DB::insert('insert into users (name,email,password) value(?,?,?)',[
        //     'su su','susu@gmail.com','password'
        // ]);
        // $users = DB::select('select * from users');
        // dd($users);

        // User::where('id',3)->update(['name' => 'aaaaaaaaaaaaa']);

        $user = User::all();
        return $user;

        // User::where('id', 2)->delete();

        // DB::update('update users set name = ? where id = 1', ['Aye Aye']);

        // DB::delete('delete from users where id = 1');
        // $users = DB::select('select * from users');
        // dd($users);
        return view('welcome');
    }
}
