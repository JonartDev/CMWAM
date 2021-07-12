<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;
use App\Imports\PuregoldImport;
use App\Imports\MSPGImport;
use App\Imports\LCCImport;
use App\Imports\ShoemartImport;
use App\Imports\SmmaImport;
use Carbon\Carbon;
use Exception;

class ImportExcelController extends Controller
{
    function index()
    {
        $data=DB::table('puregold')->get();
        return view('pages.customer', compact('data'));
    }
    public function importPuregold(Request $request)
    {
        $this->validate($request,[
            'select_file' => 'required|mimes:xls,xlsx'
        ]);
        $path= $request->file('select_file');

        $data= Excel::toArray(new PuregoldImport, $path);
        // dd($data);    
        $error=0;
        $serialerror=0;
        $itemswitherror = [];
        $serialDup = []; 
        try{
            if ($data){ 
                foreach($data[0] as $key => $value){
                    // dd(Carbon::parse(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value['end_warranty']))->format('d-M-y'));
                    $serial = DB::table('puregold')->where('Serial', $value['serial'])->first();
                    if(!$serial){
                        if($value['receiving_date']!=""){ 
                            if($value['end_warranty']!="#REF!"){    
                            $insert_data[]=array(
                                'Customer_name' => $value['customer_name'],
                                'Item_description' => $value['item_description'],
                                'Serial' => $value['serial'],
                                'Receiving_date' => Carbon::parse(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value['receiving_date']))->format('d-M-y'),
                                'End_warranty' =>Carbon::parse(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value['end_warranty']))->format('d-M-y'),
                                'Specification' => $value['specification']
                            );
                            }else{
                                $error=1;
                                array_push($itemswitherror, $value['serial']);
                            }
                        }else {
                            $error=1;
                            array_push($itemswitherror, $value['serial']);
                        }
                    }else{
                        $serialerror=1;
                        array_push($serialDup, $value['serial']);
                    }
                }   
                if(!empty($insert_data)){
                    DB::table('puregold')->insert($insert_data);
                }
            }
            if ($serialerror>0) {
                if ($error>0) {
                    return redirect('/admin/customer#puregoldTable')->with('serial',$serialDup)->with('empty',$itemswitherror);
                }else{
                    return redirect('/admin/customer#puregoldTable')->with('serial',$serialDup);
                }
            } 
            if ($error > 0) {                
                return redirect('/admin/customer#puregoldTable')->with('empty',$itemswitherror);
            }else{
                return redirect('/admin/customer#puregoldTable')->with('success', 'Excel Data Imported successfully.');
            }
        }catch (Exception $e) {
            report($e);   
            return back()->with('fail',$e->getMessage());
        }        
    }

    public function importMSPG(Request $request)
    {
        $this->validate($request,[
            'select_file' => 'required|mimes:xls,xlsx'
        ]);
        $path= $request->file('select_file');

        $data= Excel::toArray(new MSPGImport, $path);
        // dd($data);        
        $error=0;
        $serialerror=0;
        $itemswitherror = [];
        $serialDup = [];        
        try{
            if ($data){ 
                foreach($data[0] as $key => $value){
                    // dd(Carbon::parse(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value['end_warranty']))->format('d-M-y'));
                    $serial = DB::table('MSPG')->where('Serial_Number', $value['serial_number'])->first();
                    if(!$serial){                        
                        if($value['start']!=""){ 
                            if($value['end=']!="#REF!"){  
                            $insert_data[]=array(
                                'Company' => $value['company'],
                                'Branch_Name' => $value['branch_name'],
                                'Handling_Branch' => $value['handling_branch'],
                                'Store_Name' => $value['store_name'],
                                'Brand' => $value['brand'],
                                'Serial_Number' => $value['serial_number'],
                                'Start' => Carbon::parse(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value['start']))->format('d-M-y'),
                                'End' =>Carbon::parse(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value['end']))->format('d-M-y')
                            );
                            }else{
                            $error=1;
                            array_push($itemswitherror, $value['serial_number']);
                            }
                        }else{
                            $error=1;
                            array_push($itemswitherror, $value['serial_number']);
                            }
                    }else{
                    $serialerror=1;
                    array_push($serialDup, $value['serial_number']);
                    }                    
                }
                if(!empty($insert_data)){
                    DB::table('MSPG')->insert($insert_data);
                }
            }
            if ($serialerror>0) {
                if ($error>0) {
                    return redirect('/admin/customer#mspgTable')->with('serial',$serialDup)->with('empty',$itemswitherror);
                }else{
                    return redirect('/admin/customer#mspgTable')->with('serial',$serialDup);
                }
            } 
            if ($error > 0) {                
                return redirect('/admin/customer#mspgTable')->with('empty',$itemswitherror);
            }else{
                return redirect('/admin/customer#mspgTable')->with('success', 'Excel Data Imported successfully.');
            }
        }catch (Exception $e) {
            report($e);   
            return back()->with('fail',$e->getMessage());
        }        
    }

    public function importLCC(Request $request)
    {
        $this->validate($request,[
            'select_file' => 'required|mimes:xls,xlsx'
        ]);
        $path= $request->file('select_file');

        $data= Excel::toArray(new LCCImport, $path);
        // dd($data);
        $error=0;
        $serialerror=0;
        $itemswitherror = [];
        $serialDup = [];

        try{
            if ($data){ 
                foreach($data[0] as $key => $value){
                    $serial = DB::table('lcc')->where('Serial', $value['serial'])->first();
                    if(!$serial){
                        if($value['receiving_date']!=""){ 
                            if($value['end_warranty']!="#REF!"){    
                                $insert_data[]=array(
                                    'Customer_name' => $value['customer_name'],
                                    'Item_description' => $value['item_description'],
                                    'Serial' => $value['serial'],
                                    'Receiving_date' => Carbon::parse(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value['receiving_date']))->format('d-M-y'),
                                    'End_warranty' =>Carbon::parse(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value['end_warranty']))->format('d-M-y'),
                                    'Specification' => $value['specification']
                                );
                            }else{
                                $error=1;
                                array_push($itemswitherror, $value['serial']);
                            }
                        }else {
                            $error=1;
                            array_push($itemswitherror, $value['serial']);
                        }
                    }else{
                        $serialerror=1;
                        array_push($serialDup, $value['serial']);
                    }                    
                }
                if(!empty($insert_data)){
                    DB::table('lcc')->insert($insert_data);
                }
            }
            if ($serialerror>0) {
                if ($error>0) {
                    return redirect('/admin/customer#lccTable')->with('serial',$serialDup)->with('empty',$itemswitherror);
                }else{
                    return redirect('/admin/customer#lccTable')->with('serial',$serialDup);
                }
            }
            if ($error > 0) {                
                return redirect('/admin/customer#lccTable')->with('empty',$itemswitherror);
            }else{
                return redirect('/admin/customer#lccTable')->with('success', 'Excel Data Imported successfully.');
            }
        }catch(Exception $e){
            report($e);   
            return redirect('/admin/customer#lccTable')->with('fail',$e->getMessage());
        }        
    }

    public function importShoemart(Request $request)
    {
        $this->validate($request,[
            'select_file' => 'required|mimes:xls,xlsx'
        ]);
        $path= $request->file('select_file');

        $data= Excel::toArray(new ShoemartImport, $path);
        // dd($data[0]);
        $error=0;
        $serialerror=0;
        $itemswitherror = [];
        $serialDup = [];

        try{
            if ($data){ 
                foreach($data[0] as $key => $value){
                    $serial = DB::table('shoemart')->where('Serial', $value['serial'])->first();
                    if(!$serial){
                        if($value['receiving_date']!=""){ 
                            if($value['end_warranty']!="#REF!"){    
                                $insert_data[]=array(
                                    'Customer_name' => $value['customer_name'],
                                    'Pos_model' => $value['pos_model'],
                                    'Serial' => $value['serial'],
                                    'Receiving_date' => Carbon::parse(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value['receiving_date']))->format('d-M-y'),
                                    'End_warranty' =>Carbon::parse(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value['end_warranty']))->format('d-M-y'),
                                    'KB_Touchscreen' => $value['kbtouchscreen'],
                                    'Specification' => $value['specification']
                                );
                            }else{
                                $error=1;
                                array_push($itemswitherror, $value['serial']);
                            }
                        }else {
                            $error=1;
                            array_push($itemswitherror, $value['serial']);
                        }
                    }else{
                        $serialerror=1;
                        array_push($serialDup, $value['serial']);
                    }                    
                }
                if(!empty($insert_data)){
                    DB::table('shoemart')->insert($insert_data);
                }
            }
            if ($serialerror>0) {
                if ($error>0) {
                    return redirect('/admin/customer#shoemartTable')->with('serial',$serialDup)->with('empty',$itemswitherror);
                }else{
                    return redirect('/admin/customer#shoemartTable')->with('serial',$serialDup);
                }
            }
            if ($error > 0) {                
                return redirect('/admin/customer#shoemartTable')->with('empty',$itemswitherror);
            }else{
                return redirect('/admin/customer#shoemartTable')->with('success', 'Excel Data Imported successfully.');
            }
        }catch(Exception $e){
            report($e);   
            return redirect('/admin/customer#shoemartTable')->with('fail',$e->getMessage());
        }        
    }

    public function importSmma(Request $request)
    {
        $this->validate($request,[
            'select_file' => 'required|mimes:xls,xlsx'
        ]);
        $path= $request->file('select_file');

        $data= Excel::toArray(new SmmaImport, $path);
        // dd($data[0]);   
        $error=0;
        $serialerror=0;
        $itemswitherror = [];
        $serialDup = [];
        try{
            if ($data){ 
                foreach($data[0] as $key => $value){ 
                    $serial = DB::table('smma')->where('Serial_number', $value['pos_serial_number'])->first(); 
                    // dd($serial);                              
                    if(!$serial){
                        if($value['ma_start_date']!=""){    
                                $insert_data[]=array(
                                    'Company_name' => $value['company_name'],
                                    'Location' => $value['location'],
                                    'Model' => $value['model'],
                                    'Serial_number' => $value['pos_serial_number'],
                                    'Start_date' =>$value['ma_start_date']
                                );
                        }else {
                            $error=1;
                            array_push($itemswitherror, $value['pos_serial_number']);                              
                        }
                    }else{               
                        $serialerror=1;
                        array_push($serialDup, $value['pos_serial_number']);
                    }                    
                }
                if(!empty($insert_data)){
                    DB::table('smma')->insert($insert_data);
                }
            }
            if ($serialerror>0) {
                if ($error>0) {
                    return redirect('/admin/customer#smmaTable')->with('pos_serial_number',$serialDup)->with('empty',$itemswitherror);
                }else{
                    return redirect('/admin/customer#smmaTable')->with('pos_serial_number',$serialDup);
                }
            }
            if ($error > 0) {                
                return redirect('/admin/customer#smmaTable')->with('empty',$itemswitherror);
            }else{
                return redirect('/admin/customer#smmaTable')->with('success', 'Excel Data Imported successfully.');
            }
        }catch(Exception $e){
            report($e);   
            return redirect('/admin/customer#smmaTable')->with('fail',$e->getMessage());
        }        
    }
}
