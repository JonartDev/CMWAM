@extends('layouts.app')
@section('content')
<div class="panel-body table-responsive "><br>
                @if(Session::get('success'))
                    <div class="alert alert-success" style="font-size:14px;">
                        {{ Session::get('success')}}
                    </div>
                @endif
                @if(Session::get('fail'))
                    <div class="alert alert-danger" style="font-size:14px;">
                        {{ Session::get('fail')}}                 
                    </div>
                @endif
    <div class="animate fadeInDown two">
        <div class="col-md-12 mb-4">
            <button id="impScale" type="button" class="btn btn-light float-right" data-toggle="modal" data-target="#createUser" style="width:180px; height:50px; font-weight:bold; font-size:16px; border-radius:50px 20px !important;">
            ADD NEW USER</button> 
        </div>
        <table id="userTable" class="table table-stripe ">
                <thead>
                    <tr>
                        <th>FULLNAME</th>
                        <th>USERNAME</th>
                        <th>EMAIL</th>
                        <th>LEVEL</th>
                        <th>STATUS</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody> 
                        @foreach($list as $user)                       
                        <tr>
                            <th>{{$user->name}}</th>
                            <th>{{$user->name}}</th>
                            <th>{{$user->email}}</th>
                            <th>{{$user->userlevel}}</th>
                            <th>@if($user->status == 'Active')
                                <p style="color:green; font-weight:bold;"> Active</p>
                            @else
                                <p style="color:blue; font-weight:bold;"> Inactive</p>
                           @endif
                           </th>
                            <th class="text-center">
                                <button id="impScale" type="submit" class="m-r-15 text-muted userEdit" data-toggle="modal" data-target="#updateUser" 
                                    data_id="{{$user->id }}"
                                    data_name="{{$user->name }}" 
                                    data_email="{{$user->email }}"
                                    data_status="{{$user->status}}"
                                    data_ulevel="{{$user->userlevel }}">
                                    <i class="fa fa-edit pr-3" style="color:#2196f3; "></i>EDIT                
                                </button>                                                             
                            </th>
                        </tr>
                        @endforeach
                </tbody>
        </table><br>
        
    </div>
</div> 
<script>
    $(document).ready( function () {
    $('#userTable').DataTable({
        "dom": '<"top"i>rt<"bottom"flp><"clear">',
        "language": {
            "emptyTable": " ",
            "processing": "<img style='width:100px; height:100px;' src='/loader.gif' />"
        },
    });
} );
</script>

  @include('pages.updateuser')
  @include('pages.createuser')
  
@endsection
    