<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Puregold extends Model
{
    use HasFactory;
    protected $table = 'puregold';

    // protected $fillable = [
    //     "Customer_name",
    //     "Item_description", 
    //     "Serial", 
    //     "Receiving_date", 
    //     "End_warranty", 
    //     "Specifications", 
    //     "Status"
    // ];

}
