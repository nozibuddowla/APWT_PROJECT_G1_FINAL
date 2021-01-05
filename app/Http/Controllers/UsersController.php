<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Http\Request;
use Socialite;
use Auth;
use Str;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $req)
    {
        return view('users.login');
    }
    public function verifyLogin(Request $req)
    {
        $req->validate([
            'login' => 'required',
            'password'=> 'required'
        ]);

        $user = Users::where('login', $req->login)
                    ->where('password', $req->password)
                    ->first();
        
        if($user){
            $req->session()->put('profile',$user);
            if($user->role =='admin'){
                return redirect()->route('users.admin.home');
            }
            if($user->role =='hotelManager'){
                return redirect()->route('products.employee.home');
            }
            else{
                echo "something wrong";
            }
        }
        else{
            $req->session()->flash('msg','Wrong username or password.');
            $req->session()->flash('type','danger');            
            return redirect()->back();
        }
    }

    public function adminHome()
    {   $allUsers=Users::all();
        return view('users.adminHome')->with('allUsers',$allUsers);
       // return view('products.employeeHome')->with('allProducts',$allProducts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('users.usersCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'companyName' => 'required',
            'login' => 'required|unique:users,login',
            'contactno' => 'required',
            'role' => 'required',
            'password'=> 'required'
        ]);

        $user = new Users();
        $user->name         = $req->name;
        $user->companyName  = $req->companyName;
        $user->login     = $req->login;
        $user->password     = $req->password;
        $user->contactno    = $req->contactno;
        $user->role         = $req->role;
        $user->save();
       
        $req->session()->flash('msg','User added successfully.');
        $req->session()->flash('type','success');            
        return redirect()->route('users.admin.home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $user = Users::find($id);
        return view('users.usersEdit', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $req->validate([
            'name' => 'required',
            'companyName' => 'required',
            'login' => 'required',
            'contactno' => 'required',
            'role' => 'required',
            'password'=> 'required'
        ]);

        $user = Users::find($id);
        $user->name         = $req->name;
        $user->companyName  = $req->companyName;
        $user->login     = $req->login;
        $user->password     = $req->password;
        $user->contactno    = $req->contactno;
        $user->role         = $req->role;
        $user->save();

        $req->session()->flash('msg','User updated successfully.');
        $req->session()->flash('type','success');            
        return redirect()->route('users.admin.home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $req)
    {
        Users::find($id)->delete();
        $req->session()->flash('msg','User deleted successfully.');
        $req->session()->flash('type','success');            
        return redirect()->route('users.admin.home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function search(Request $req)
    {   $key = $req->get('key');
        if($req->ajax()){
            $allUsers=Users::where('name','like', '%'.$key.'%')->get();

            echo json_encode($allUsers);    
        }
    }

    public function github(){
        //user req to github
        return Socialite::driver('github')->redirect();
    }
    public function githubRedirect(){
        $user =  Socialite::driver('github')->user();
        //dd($user);
        //$check = "github";
        session()->put('profile',$user);

        //session()->put('checkGit',$check);

        return redirect('/employeeHome');

        
    }
}
