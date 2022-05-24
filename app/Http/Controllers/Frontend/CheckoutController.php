<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(){
        $old_cart_item = Cart::where('user_id', Auth::id())->get();
        foreach($old_cart_item as $item){
            if(!Product::where('id', $item->prod_id)->where('qty','>=',$item->prod_qty)->exists()){
                $removeItem = Cart::where('user_id',Auth::id())->where('prod_id', $item->prod_id)->first();
                $removeItem->delete();
            }
        }
        $cart_item = Cart::where('user_id', Auth::id())->get();

        return view('frontend.checkout', compact('cart_item'));
    }
    public function placeorder(Request $request){
        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->adress1 = $request->input('adress1');
        $order->adress2 = $request->input('adress2');

        //calculate total price
        $total = 0;
        $cartitems_total = Cart::where('user_id', Auth::id())->get();
        foreach($cartitems_total as $prod){
            $total +=$prod->products->selling_price;
        }
        $order->total_price = $total; 
        $order->tracking_no = 'sharm'.rand(1111,9999);
        $order->save();

        $cart_item = Cart::where('user_id', Auth::id())->get();
        foreach($cart_item as $item){
            OrderItem::create([
                'order_id' => $order->id,
                'prod_id' => $item->prod_id,
                'qty' => $item->prod_qty,
                'price' =>$item->products->selling_price,
            ]);
            $prod = Product::where('id', $item->prod_id)->first();
            $prod->qty = $prod->qty - $item->prod_qty;
            $prod->update();
        }
        if(Auth::user()->address1 == NULL){
            $user = User::where('id', Auth::id())->first();
            $user = new user();
            $user->name = $request->input('fname');
            $user->lname = $request->input('lname');
            $user->phone = $request->input('phone');
            $user->adress1 = $request->input('adress1');
            $user->adress2 = $request->input('adress2');
            $user->update();
        }
        $cart_item = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cart_item);
        return redirect('/')->with('status',"Order placed succesfully");

    }    
}
