<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IDEASERV</title>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/userlogs.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('bootstrap-3.1.1/css/bootstrap.min.css') }}">      
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet" type="text/css" />
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon" />
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link rel="stylesheet" href="{{ asset('bootstrap-3.1.1/css/bootstrap.min.css') }}"> 
    
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</head>
<body style="background-color:#455357; color:white;">        
    @include('inc.header')
    <ul class="nav">
        <ul class="nav mr-auto"></ul>
        <a href="{{ route('auth.logout')}}"><b>Logout</b>&nbsp;&nbsp;<i class="fa fa-sign-out pr-5" aria-hidden="true" style="text-align:right;"></i></a>
    </ul>
    <div class="py-2">
                <br>
    <div class="container">
    
    <h1 class="text-center fa fa-wrench" style="font-size:50px;">UNDER DEVELOPMENT</h1><br><br><br>
        <div class="row justify-content-center">
            <center>
                <p style="color: gray">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Please enter valid serial number to start search</p>
                <input type="search" name="" id="">
            </center>
        </div>
    </div>
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-5" id="warranty" style="">
                <div class="card bg-light">
                    <div class="card-header" style="background-color: #455357; color: white;font-family:arial;font-size:130%;font-weight: bold">
                        WARRANTY INFORMATION
                    </div>
                    <div class="card-body" style="color:black;">
                        <form id="mspg-warranty" style="">
                            <div class="form-group row">
                                <label for="mspg-Status" class="col-md-3 col-form-label text-md-right">Status</label>
                                <div class="col-md-8">
                                    <input id="mspg-Status" type="text" name="mspg-Status" size="35" readonly="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="mspg-Start" class="col-md-3 col-form-label text-md-right">Start</label>
                                <div class="col-md-8">
                                    <input id="mspg-Start" type="text" name="mspg-Start" size="35" readonly="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="mspg-End" class="col-md-3 col-form-label text-md-right">End</label>
                                <div class="col-md-8">
                                    <input id="mspg-End" type="text" name="mspg-End" size="35" readonly="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="mspg-Serial_no" class="col-md-3 col-form-label text-md-right">Serial No.</label>
                                <div class="col-md-8">
                                    <input id="mspg-Serial_no" type="text" name="mspg-Serial_no" size="35" readonly="">
                                </div>
                            </div>
                        </form>
                    </div> 
                </div>
            </div>
            <div class="col-md-7" id="info" style="color:black;">
                <div class="card bg-light">
                    <div class="card-header" style="background-color: #455357; color: white;font-family:arial;font-size:130%;font-weight: bold">
                        CUSTOMER INFORMATION
                    </div>
                    <div class="card-body">
                        <form id="mspg-customer" style="display:none; color:black;">
                            <div class="form-group row">
                                <label for="mspg-Company_Name" class="col-md-4 col-form-label text-md-right">Company Name</label>
                                <div class="col-md-8">
                                    <input id="mspg-Company_Name" type="text" name="mspg-Company_Name" size="50" readonly="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="mspg-Branch_Name" class="col-md-4 col-form-label text-md-right">Branch Name</label>
                                <div class="col-md-8">
                                    <input id="mspg-Branch_Name" type="text" name="mspg-Branch_Name" size="50" readonly="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="mspg-Store_name" class="col-md-4 col-form-label text-md-right">Store Name</label>
                                <div class="col-md-8">
                                    <input id="mspg-Store_name" type="text" name="mspg-Store_name" size="50" readonly="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="mspg-Handling_Branch" class="col-md-4 col-form-label text-md-right">Handling Branch</label>
                                <div class="col-md-8">
                                    <input id="mspg-Handling_Branch" type="text" name="mspg-Handling_Branch" size="50" readonly="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="mspg-Brand" class="col-md-4 col-form-label text-md-right">Brand</label>
                                <div class="col-md-8">
                                    <input id="mspg-Brand" type="text" name="mspg-Brand" size="50" readonly="">
                                </div>
                            </div>
                        </form>
                            <!--Puregold-->
                        <form id="pg-customer" style="">
                            <div class="form-group row">
                                <label for="pg-Customer_Name" class="col-md-4 col-form-label text-md-right">Customer Name</label>
                                <div class="col-md-8">
                                    <input id="pg-Customer_Name" type="text" name="pg-Customer_Name" size="50" readonly="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pg-Item_Description" class="col-md-4 col-form-label text-md-right">Item Description</label>
                                <div class="col-md-8">
                                    <input id="pg-Item_Description" type="text" name="pg-Item_Description" size="50" readonly="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pg-Specifications" class="col-md-4 col-form-label text-md-right">Specifications</label>
                                <div class="col-md-8">
                                    <input id="pg-Specifications" type="text" name="pg-Specifications" size="50" readonly="">
                                </div>
                            </div>
                        </form>
                        <!--sm-->
                        <form id="sm-customer" style="display:none">
                            <div class="form-group row">
                                <label for="sm-Customer_Name" class="col-md-4 col-form-label text-md-right">Customer Name</label>
                                <div class="col-md-8">
                                    <input id="sm-Customer_Name" type="text" name="sm-Customer_Name" size="50" readonly="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sm-Item_Description" class="col-md-4 col-form-label text-md-right">Item Description</label>
                                <div class="col-md-8">
                                    <input id="sm-Item_Description" type="text" name="sm-Item_Description" size="50" readonly="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sm-Keyboard_touchscreen" class="col-md-4 col-form-label text-md-right">Keyboard/Touchscreen</label>
                                <div class="col-md-8">
                                    <input id="sm-Keyboard_touchscreen" type="text" name="sm-Keyboard_touchscreen" size="50" readonly="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sm-Specifications" class="col-md-4 col-form-label text-md-right">Specifications</label>
                                <div class="col-md-8">
                                    <input id="sm-Specifications" type="text" name="sm-Specifications" size="50" readonly="">
                                </div>
                            </div>
                        </form>
                        <!--smma-->
                        <form id="smma-customer" style="display:none">
                            <div class="form-group row">
                                <label for="smma-Company_Name" class="col-md-4 col-form-label text-md-right">Company Name</label>
                                <div class="col-md-8">
                                    <input id="smma-Company_Name" type="text" name="smma-Company_Name" size="50" readonly="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="smma-Location" class="col-md-4 col-form-label text-md-right">Location</label>
                                <div class="col-md-8">
                                    <input id="smma-Location" type="text" name="smma-Location" size="50" readonly="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="smma-Handling_Branch" class="col-md-4 col-form-label text-md-right">Handling Branch</label>
                                <div class="col-md-8">
                                    <input id="smma-Handling_Branch" type="text" name="smma-Handling_Branch" size="50" readonly="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="smma-Model" class="col-md-4 col-form-label text-md-right">Model</label>
                                <div class="col-md-8">
                                    <input id="smma-Model" type="text" name="smma-Model" size="50" readonly="">
                                </div>
                            </div>
                        </form>
                    </div> 
                </div>
            </div>
        </div>
    </div>
            </div>

</body>
</html>
