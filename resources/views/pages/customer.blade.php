@extends('layouts.app')
@section('content')
<br>
@include('pages.error')
@include('inc.customerNavbar')
<div class="animate fadeInDown two">                       
               
@include('pages.customers.puregold')
@include('pages.customers.mspg')      
@include('pages.customers.lcc') 
@include('pages.customers.shoemart')    
@include('pages.customers.smma')       
</div> 

@include('pages.import.importMSPG')
@include('pages.import.importPuregold')
@include('pages.import.importLCC')
@include('pages.import.importShoemart')
@include('pages.import.importSmma')

@endsection

