<div class="container">
    <div class="modal fade in" id="createUser">
    <div class="modal-dialog">
    <div class="modal-content" style="width:500px;">
        <div class="modal-header" style="background-color:#455357; color:white;">
            <h1 class="modal-title">CREATE NEW USER</h1>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" style="background-color:white;color:black;">         
            <form action="{{ route('auth.save')}}" method="post">                
                    @csrf
                <div class="form-group h4">
                    <label>Name</label>
                    <input type="text" style="font-size: 14px; height:40px;" width="707" colspan="3" class="form-control" name="name" placeholder="Enter full name" value="{{ old('name')}}" autocomplete="off">
                    <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                </div>
                <div class="form-group h4">
                    <label>Email</label>
                    <input type="text" style="font-size: 14px; height:40px;" class="form-control" name="email" placeholder="Enter Email address" value="{{ old('email')}}" autocomplete="off">
                    <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                </div>
                <div class="form-group h4">
                    <label>Password</label>
                    <input type="password" style="font-size: 14px; height:40px;" class="form-control" name="password" placeholder="Enter password">
                    <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                </div>
                <div class="form-group h4">
                    <label>User Level</label>
                        <select name="userlevel" style="font-size: 14px; height:40px;" class="form-control">
                            <option value="Admin">Admin</option>
                            <option value="User" selected='selected'>User</option>
                        </select>
                    </div><br>
                    <input type="hidden" class="form-control" name="status" value="Active">
                    <div class="col-md-12 mb-4">
                    <!-- <button type="submit" style="background-color:#7b8d93" class="btn btn-dark float-right">SAVE</button><br>   -->   
                    <center><button type="submit" class="btn btn-xs btn-dark submit"style="width:150px; height:40px; font-size:14px;">
                    SAVE</button></center>                             
            </form>
            </div>
    </div>
    </div>
</div>
