<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;

class CouponsController extends Controller
{
    public function getaddCoupon(){
        return view('admin.coupons.add_coupon');
    }
    public function addCoupon(Request $request){
        $coupon = new Coupon;
        $coupon->coupon_code=$request->coupon_code;
        $coupon->amount=$request->amount;
        $coupon->amount_type=$request->amount_type;
        $coupon->expiry_date=$request->expiry_date;
        $coupon->status=$request->status;
        $coupon->save();
        return redirect()->route('view.Coupons')->with('flush_success','coupon added successfully');

    }
    public function viewCoupons(){
        $coupons=Coupon::get();
        return view('admin.coupons.view_coupons')->with(compact('coupons'));
    }
}
