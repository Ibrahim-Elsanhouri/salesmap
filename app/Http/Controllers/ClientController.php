<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance; 
use Alert; 
use Auth; 
use App\Helpers\UserSystemInfoHelper;
class ClientController extends Controller
{
    //
    public function sendmap(Request $request){
 //dd($request->lat , $request->long); 
 $param = array("latlng"=>"$request->lat,$request->long");     
//dd($request->header('User-Agent')); 
$response = \GoogleMaps::load('geocoding')
->setParamByKey('latlng',$param['latlng'])
->get('results.formatted_address');

    $address = $response['results'][0]['formatted_address'];

    $attendance = new Attendance(); 
    $attendance->lat = $request->lat; 
    $attendance->long = $request->long; 
    $attendance->users_id = Auth::id(); 
    $attendance->address = $address; 

    $attendance->device = $request->header('User-Agent'); 

    $attendance->save();


Alert::success('تم تسجيل حضور في العنوان🌍 ', $address);
return back(); 


}
public function helper(Request $request){
    dd($request);
    $getip = UserSystemInfoHelper::get_ip();
    $getbrowser = UserSystemInfoHelper::get_browsers();
    $getdevice = UserSystemInfoHelper::get_device();
    $getos = UserSystemInfoHelper::get_os();
    //dd($getip , $getbrowser , $getdevice , $getos); 
}
}
