<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\UserLogs;
use App\Models\Puregold;
use App\Models\Test;
use Illuminate\Support\Facades\Hash;
use DB,Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;


class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function userOnly(){        
        $list = DB::table('admins')->get();
        return view('/userOnly', compact('list'));
    }
      
    public function index(){         
        // dd(auth()->user()->id); 
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/admin/home');
        }
        return view('/auth/login');
    }
    public function home()
    {
        $list = DB::table('user_logs')->get();

        $puregold = Puregold::query()->get();
        $expiring=0;
        foreach ($puregold as $data) {
            if(Carbon::now()->between($data->Receiving_date,$data->End_warranty)){
                if(Carbon::parse($data->End_warranty) <= Carbon::now()->addMonths(6)){
                    $expiring+=1;
                }
            }
        }  
    
         return view('/pages/home', compact('list','expiring'));   
    }public function homes(){
        $list = UserLogs::all();
         return DataTables::of($list)
         ->make(true);
    }
    
    public function users()
    {           
        if(!session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/');
        }

        $list = DB::table('admins')->get();
         return view('/pages/users', compact('list'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        return view('/auth/register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:admins',
            'password'=>'required|min:5|max:12'
        ]);

        $UserName=Admin::where('id','=',session('LoggedUser'))->first()->name;
        $UserMail=Admin::where('id','=',session('LoggedUser'))->first()->email;        
        $current_date_time = Carbon::now()->toDateTimeString();
        
        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password =Hash::make($request->password);
        $admin->userlevel = $request->userlevel;
        $admin->status = $request->status;
        $save= $admin->save();

        if($save){            
                $logs=DB::table('user_logs')->insert([
                    'Name' => $UserName,
                    'Email' => $UserMail,
                    'Activity' => 'Created new user '.$admin->name,
                    'created_at' => $current_date_time,
                ]);
            return back()->with('success','New user was created successfuly');
        }else{
            return back()->with('fail','something went wrong, please try again');
        }
    }   

    public function check(Request $request){

        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12'
        ]);

        $userinfo= Admin::where('email','=',$request->email)->first();
        $current_date_time = Carbon::now()->toDateTimeString();
        if(!$userinfo){
            return back()->with('fail','We do not recognize your email address.');
        }else{
            //check password
            if($userinfo->status == 'Inactive'){                
                return back()->with('fail','User '.$userinfo->email.' is inactive.');
            }
            else if(Hash::check($request->password, $userinfo -> password)){
                $request->session()->put('LoggedUser',$userinfo->id);

                // Activity Logs      
                $logs=DB::table('user_logs')->insert([
                    'Name' => $userinfo->name,
                    'Email' => $userinfo->email,
                    'Activity' => 'Logged in',
                    'created_at' => $current_date_time,
                ]);
                if($userinfo->userlevel == 'Admin'){                    
                    return redirect('admin/customer');
                }else{                                    
                    return redirect('userOnly');
                }

            }else{
                return back()->with('fail','Incorrect password!');
            }
        }
        
    }


    public function dashboard(){
        if(!session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/');
        }
        $list = DB::table('MSPG')->get();
        // $date = " December 2020";
        // $month = strtok($date,' ');
        // $year = substr($date, -4);
        // dd($year);

        return view('pages.customer', compact('list'));   

    }
     public function fileImport(Request $request) 
    {
        Excel::import(new PuregoldImport, $request->file('file')->store('temp'));
        return back();
    }


    public function dashboard1(){
        $data=['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.dashboard', $data);
     }  
    
    public function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/');
        }
    }
    
    // public function edit($id){
    //     $row = DB::table('admins')
    //         ->where('id',$id)
    //         ->first();
    //     $data = [
    //         'Info'=>$row,
    //         'Title'=>'Edit'
    //     ];
    //     return view('pages.updateuser', $data);
    // }
    public function update(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email'
        ]);      

        $UserName=Admin::where('id','=',session('LoggedUser'))->first()->name;
        $UserMail=Admin::where('id','=',session('LoggedUser'))->first()->email;   
        $admin=new Admin;    
        $current_date_time = Carbon::now()->toDateTimeString();

        $updating = DB::table('admins')
        ->where('id',$request ->input('cid'))
        ->update([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'status'=>$request->input('status'),
            'userlevel'=>$request->input('userlevel')
        ]);
        
        if($updating){            
            $logs=DB::table('user_logs')->insert([
                'Name' => $UserName,
                'Email' => $UserMail,
                'Activity' => 'Update User '.$admin->name = $request->name,
                'created_at' => $current_date_time,
            ]);
        return back()->with('success','User was updated successfully');
        }else{
            return back()->with('fail','something went wrong, please try again');
        }

    }
}
