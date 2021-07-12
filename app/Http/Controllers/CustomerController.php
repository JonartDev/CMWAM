<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB,Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Puregold;
use App\Models\MSPG;
use App\Models\LCC;
use App\Models\Shoemart;
use App\Models\Smma;

class CustomerController extends Controller
{
    public function puregold(){
        if(!session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/');
        }
        $list = DB::table('puregold')->get();
        return view('pages.customers.puregold', compact('list'));
    }
    public function puregolds(){
        $list = Puregold::all();
         return DataTables::of($list)
         ->addColumn('Status', function (Puregold $branch){                       
            if(Carbon::now()->between($branch->Receiving_date,$branch->End_warranty)){
                if(Carbon::parse($branch->End_warranty) <= Carbon::now()->addMonths(6)){
                    return ('EXPIRING'); 
                }else{ 
                return ('ACTIVE');}
            }else if(Carbon::parse($branch->End_warranty) >= Carbon::now()){
                return ('ACTIVE');
            }else{
                return ('EXPIRED'); 
            }           
        })
         ->make(true);         
     }

    public function mspg(){
        if(!session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/');
        }
        $list = DB::table('MSPG')->get();
        return view('pages.customers.mspg', compact('list'));        
    }public function mspgs(){
        $list = MSPG::all();
         return DataTables::of($list)
         ->addColumn('Status', function (MSPG $branch){            
            if(Carbon::now()->between($branch->Start,$branch->End)){
                if(Carbon::parse($branch->End) <= Carbon::now()->addMonths(6)){
                    return ('EXPIRING'); 
                }else{
                return ('ACTIVE');}
            }else if(Carbon::parse($branch->End_warranty) >= Carbon::now()){
                return ('ACTIVE');
            }else{
                return ('EXPIRED'); 
            }                  
        })
         ->make(true);         
     }

     public function lcc(){
        if(!session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/');
        }
        $list = DB::table('lcc')->get();
        return view('pages.customers.lcc', compact('list'));
    }
    public function lccs(){
        $list = lcc::all();
         return DataTables::of($list)
         ->addColumn('Status', function (LCC $branch){                       
            if(Carbon::now()->between($branch->Receiving_date,$branch->End_warranty)){
                if(Carbon::parse($branch->End_warranty) <= Carbon::now()->addMonths(6)){
                    return ('EXPIRING'); 
                }else{ 
                return ('ACTIVE');}
            }else if(Carbon::parse($branch->End_warranty) >= Carbon::now()){
                return ('ACTIVE');
            }else{
                return ('EXPIRED'); 
            }           
        })
         ->make(true);         
     }

    public function shoemart(){
        if(!session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/');
        }
        $list = DB::table('shoemart')->get();
        return view('pages.customers.shoemart', compact('list'));
    }
    public function shoemarts(){
        $list = Shoemart::all();
         return DataTables::of($list)
         ->addColumn('Status', function (Shoemart $branch){                       
            if(Carbon::now()->between($branch->Receiving_date,$branch->End_warranty)){
                if(Carbon::parse($branch->End_warranty) <= Carbon::now()->addMonths(6)){
                    return ('EXPIRING'); 
                }else{ 
                return ('ACTIVE');}
            }else if(Carbon::parse($branch->End_warranty) >= Carbon::now()){
                return ('ACTIVE');
            }else{
                return ('EXPIRED'); 
            }           
        })
         ->make(true);         
     }
     public function smma(){
        if(!session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/');
        }
        $list = DB::table('smma')->get();
        return view('pages.customers.smma', compact('list'));
    }
    public function smmas(){
        $list = Smma::all();
         return DataTables::of($list)
         ->addColumn('Status', function (Smma $branch){                       
            if(Carbon::now()->between($branch->Start_date,$branch->End_date)){
                if(Carbon::parse($branch->End_date) <= Carbon::now()->addMonths(6)){
                    return ('EXPIRING'); 
                }else{ 
                return ('ACTIVE');}
            }else if(Carbon::parse($branch->End_date) >= Carbon::now()){
                return ('ACTIVE');
            }else{
                return ('EXPIRED'); 
            }           
        })
         ->make(true);         
     }
}
