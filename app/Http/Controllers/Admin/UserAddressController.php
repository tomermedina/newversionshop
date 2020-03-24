<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\UserAddress;
class UserAddressController extends Controller
{
    //
   public function createOrEditUserAddress(Request $request)
   {
     // code...
     $return = "";
     if(!isset($request->addressId)){
       $credentials = [
         'user_id' => $request->userId ,
         'address_details' => $request->addressDetails ,
         'notes' => $request->notes ,
         'primary_flag' => ''
       ];
       $return = UserAddress::create($credentials);
     }else {
       $credentials = [
         'user_id' => $request->userId ,
         'address_details' => $request->addressDetails ,
         'notes' => $request->notes ,
       ];
       $return = UserAddress::where('id' , $request->addressId)->update($credentials);
     }


     return json_encode($return);
   }
   public function deleteUserAddress($id)
   {
     // code...
      $return = UserAddress::where('id' , $id)->delete();
       return json_encode($return);
   }
   public function setDefaultAddress($userId ,$addressId)
   {
     // code...
     $return = UserAddress::where('user_id' , $userId)->update(['primary_flag' => ' ']);
     $return = UserAddress::where('user_id' , $userId)->where('id' ,$addressId )->update(['primary_flag' => '1']);
     return $return;
   }
}