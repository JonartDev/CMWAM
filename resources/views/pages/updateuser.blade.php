<div class="container">
    <div class="modal fade in" id="updateUser">
    <div class="modal-dialog">
    <div class="modal-content" style="width:500px;">
        <div class="modal-header" style="background-color:#455357; color:white;">
            <h1 class="modal-title">UPDATE USER</h1>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" style="background-color:white;color:black;">                        
            <form action="{{ route('auth.update')}}" method="post">                
                @csrf
                <input type="hidden" name="cid" id="cid">
                <div class="form-group h4">
                    <label>Name</label>
                    <input type="text" width="707"  style="font-size: 14px; height:40px;" colspan="3" class="form-control" name="name" id="name" placeholder="Enter full name" autocomplete="off">
                    <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                </div>
                <div class="form-group h4">
                    <label>Email</label>
                    <input type="text" readonly style="font-size:14px; height:40px;" class="form-control" name="email" id="email" placeholder="Enter Email address"  autocomplete="off">
                    <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                </div>
                <div class="form-group h4">
                    <label>Status</label>
                        <select name="status" style="font-size: 14px; height:40px;" class="form-control" id="stat">
                            <option value="Active" selected='selected'>Active</option>
                            <option value="Inactive" >Inactive</option>
                        </select>
                </div>
                <div class="form-group h4">
                    <label>User Level</label>
                        <select name="userlevel" style="font-size: 14px; height:40px;" class="form-control" id="ulevel">
                            <option value="Admin">Admin</option>
                            <option value="User" selected='selected'>User</option>
                        </select>
                </div><br>
                <div class="col-md-12 mb-4">
                    <!-- <button type="submit" style="background-color:#7b8d93" class="btn btn-dark float-right">SAVE</button><br>   -->   
                    <center><button type="submit" class="btn btn-xs btn-dark submit" style="width:150px; height:40px; font-size:14px;">
                    SAVE UPDATE</button></center>    
                </div>                         
            </form>  
        </div>
    </div>
    </div>
    </div>
</div>
@include('layouts.updateJS')