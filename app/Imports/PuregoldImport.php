<?php

namespace App\Imports;

use App\Models\Puregold;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class PuregoldImport implements ToModel, WithHeadingRow, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // return new Puregold([
        //     'Customer_name'     => $row[0],
        //     'Item_description'    => $row[1],
        //     'Serial' => Hash::make($row[2]),
        //     'Receiving date' => Hash::make($row[3]),
        //     'End_warranty' => Hash::make($row[4]),
        //     'Specifications' => Hash::make($row[5])
        // ]);
    }
    public function startRow(): int{
        return 2;
    }
}
