<div id="divError"  style="display: @if(Session::get('serial') || count($errors) > 0  || 
        $message = Session::get('success') || Session::get('fail') || Session::get('empty') || Session::get('pos_serial_number'))
            block;
        @else 
            none;                
        @endif">    
    @if(count($errors) > 0)
        <div class="alert alert-danger" style="font-size:14px;">
            Upload Validation Error <br><br>   
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>            
        </div>
    @endif
    @if($message = Session::get('success'))
        <div class="alert alert-success alert-block" style="font-size:14px;">
        <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>{{ $message}}</strong>             
        </div>
    @endif 
    @if(Session::get('fail'))
        <div class="alert alert-danger" style="font-size:14px;">
            {{ Session::get('fail')}}                 
        </div>
    @endif 
    @if(Session::get('empty'))
        <div class="alert alert-danger" role="alert">
                @foreach (Session::get('empty') as $error )
                    -Serial #: {{$error}} has invalid date. Import data failed<br>
                @endforeach
        </div>
    @endif   
    @if(Session::get('serial'))
        <div class="alert alert-danger" role="alert">
                @foreach (Session::get('serial') as $error )
                    -Serial #: {{$error}} is duplicate. Import data failed<br>
                @endforeach
        </div>
    @endif 
    @if(Session::get('pos_serial_number'))
        <div class="alert alert-danger" role="alert">
                @foreach (Session::get('pos_serial_number') as $error )
                    -Serial #: {{$error}} is duplicate. Import data failed<br>
                @endforeach
        </div>
    @endif  
</div>