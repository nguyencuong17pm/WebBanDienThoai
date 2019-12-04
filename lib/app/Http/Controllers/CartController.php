<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customers;
use App\Models\Bills;
use App\Models\Bill_Details;
use Cart;
use Mail;
class CartController extends Controller
{
    public function getAddCart($id)
    {
    	$product = Product::find($id);
    	Cart::add(['id' => $id, 'name' => $product->prod_name, 'quantity' => 1, 'price' => $product->prod_gia, 'attributes' => ['img' => $product->prod_img]]);
    	return redirect('cart/show');
    }

    public function getShowCart()
    {
    	$data['total'] = Cart::getTotal();
    	$data['items'] = Cart::getContent();
    	return view('frontend.cart', $data);
    }

    public function getCartDelete($id)
    {
    	if($id == 'all'){
    		Cart::clear();
    	}else{
    		Cart::remove($id);
    	}
    	return back();
    }

    public function getUpdateCart(Request $request)
    {
    	Cart::update($request->id,$request->quantity);
    }

    public function postComtplete(Request $request)
    {
    	$data['info'] = $request->all();
    	$email = $request->email;
    	$data['cart'] = Cart::getContent();
    	$data['total'] = Cart::getTotal();
        $cartInfor = Cart::getContent();
        try{
            $cus = new Customers;
            $cus->cus_name = $request->name;
            $cus->cus_email = $request->email;
            $cus->cus_phone = $request->phone;
            $cus->cus_diachi = $request->add;
            $cus->save();

            $bill = new Bills;
            $bill->cus_id = $cus->cus_id;
            $bill->save();

            if(count($cartInfor) > 0){
                foreach($cartInfor as $key=>$item){
                    $bd = new Bill_Details;
                    $bd->bill_id = $bill->bill_id;
                    $bd->prod_id = $item->id;
                    $bd->bd_tensp = $item->name;
                    $bd->bd_qty = $item->quantity;
                    $bd->bd_gia = $item->price;
                    $bd->save();
                }
            Mail::send('frontend.email', $data, function($message) use ($email){
                $message->from('www.baokhiemshop.com@gmail.com', 'Bảo Khiêm');
                $message->to($email, $email);
                $message->cc('thai887624147@gmail.com', 'Quốc Thái');
                $message->subject('Xác nhận hóa đơn mua hàng tại Bảo Khiêm Shop');
            });
            Cart::clear();
            }
            
        }
        Catch(Exception $e){

        }
    	
    	return redirect('cart/complete');
    }

    public function getComplete()
    {
    	return view('frontend.complete');
    }
}
