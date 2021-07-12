@extends('layouts.app')
@section('content')
<script src="{{ asset('js/home.js') }}"></script>
<div class="container pt-5 ">   
    <div class="row ">         
        <div class="animate fadeInDown two">
            <div class="container-fluid mx-auto ">   
                <!-- <div class="col-sm-3">
                        <div class="card bg-card" style="min-height: 120px">
                        <div class="card-header text-center pt-5" style="min-height: 60px; background-color: #7c8e93; color: white;font-family:arial;font-size:24px;font-weight: bold">
                           CUSTOMERS
                            </div>
                            <div class="card-body text-center" style="background-color:#cfd8dc; color:black;">
                                <p class="card-text" style="font-family:arial;font-size:20px;font-weight: bold">
                                {{DB::table('puregold')->count();}}            
                                </p>
                            </div>
                        </div>
                </div> -->
                <div class="col-sm-3 ">
                        <div class="card bg-card" style="min-height: 120px">
                        <div class="card-header text-center pt-5" style="min-height: 60px; background-color: #7c8e93; color: white;font-family:arial;font-size:24px;font-weight: bold">
                            ACTIVE
                                <!-- <i class="fas fa-hourglass" style="font-size:30px;float:right;line-height:px;"></i>       -->
                            </div>
                            <div class="card-body text-center" style="background-color:#cfd8dc; color:black;">
                                <p class="card-text" style="font-family:arial;font-size:20px;font-weight:bold; color:green;">
                                {{DB::table('puregold')
                                    ->where('End_warranty','<=',Carbon\Carbon::now())->count();                               
                                }}
                                </p>
                            </div>
                        </div>
                </div>
                <div class="col-sm-3">
                        <div class="card bg-card" style="min-height: 120px">
                        <div class="card-header text-center pt-5" style="min-height: 60px; background-color: #7c8e93; color: white;font-family:arial;font-size:24px;font-weight: bold">
                                EXPIRED
                                <!-- <i class="fas fa-hourglass" style="font-size:30px;float:right;line-height:px;"></i>       -->
                            </div>
                            <div class="card-body text-center" style="background-color:#cfd8dc; color:black;">
                                <p class="card-text" style="font-family:arial;font-size:20px;font-weight:bold; color:blue;">
                                {{DB::table('puregold')  
                                    ->where('End_warranty','>=',Carbon\Carbon::now())->count();                              
                                }}
                                </p>
                            </div>
                        </div>
                </div>
                <div class="col-sm-3">
                        <div class="card bg-card" style="min-height: 120px">
                        <div class="card-header text-center pt-5" style="min-height: 60px; background-color: #7c8e93; color: white;font-family:arial;font-size:24px;font-weight: bold">
                                EXPIRING
                                <!-- <i class="fas fa-hourglass" style="font-size:30px;float:right;line-height:px;"></i>       -->
                            </div>
                            <div class="card-body text-center" style="background-color:#cfd8dc; color:black;">
                                <p class="card-text" style="font-family:arial;font-size:20px;font-weight: bold; color:red;">            
                                {{$expiring}}                            
                                </p>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="panel-body table-responsive "><br>
    <div class="animate fadeInDown two">
        <h1 class="text-center">USER ACTIVITY LOGS</h1>
        <table id="datatableH" class="table user_logs table-striped" style="width:100%; border:0px;">
            <thead>
                <tr>
                    <th>EMAIL</th>
                    <th>NAME</th>
                    <th>DATE AND TIME</th>
                    <th>ACTIVITY</th>
                </tr>
            </thead>            
        </table>
    </div>
    </div>

@endsection