<nav class="nav nav-tabs navbar-expand-md" style="color:black;background-color:transparent;">
    <div class="navbar-collapse collapse justify-content-between align-items-center w-100" >
        <ul class="nav w-60" style="font-size:16px;background-color:transparent;">                
            <li class="nav-item" style="width: 150px;" >
                <a id="PUREGOLD" class="nav-links btn btn-outline me-2 " style="font-size:20px;border-radius: 50px 20px;"href="{{ url('/admin/customer#puregoldTable')}}">PUREGOLD</a>      
            </li>
            <li class="nav-item" style="width: 150px;">
                <a id="MSPG" class="nav-links btn btn-outline me-2 "style="font-size:20px;border-radius: 50px 20px;" href="{{ url('/admin/customer#mspgTable')}}">MSPG</a>
            </li>
            <li class="nav-item" style="width: 150px;">
                <a id="LCC" class="nav-links btn btn-outline me-2 " style="font-size:20px;border-radius: 50px 20px;"href="{{ url('/admin/customer#lccTable')}}">LCC</a>
            </li>
            <li class="nav-item" style="width: 150px;">
                <a id="SHOEMART" class="nav-links btn btn-outline me-2 " style="font-size:20px;border-radius: 50px 20px;"href="{{ url('/admin/customer#shoemartTable') }}">SHOEMART</a>
            </li>
            <li class="nav-item" style="width: 150px;">
                <a id="SMMA" class="nav-links btn btn-outline me-2" style="font-size:20px;border-radius: 50px 20px;"href="{{ url('/admin/customer#smmaTable') }}">SM-MA</a>
            </li>
        </ul>      
    </div>
</nav> 

<!-- <button class="btn btn-outline-light me-2 {{ Request::is('admin/home') ? 'active' : '' }}" href="{{ url('/admin/home') }}" style="color:white;font-size:50px;">PUREGOLD</button> -->