<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use DB;
use Cart;

class CartController extends Controller
{

	public function add(Request $request){
			$id = $request->id;
			$product = DB::table('products')->where('id', $id)->first();

			if ($product) {
				$push = array(
					'id' => $product->id,
					'name' => $product->title,
					'price' => $product->price,
					'qty' => 1,
					'weight' => 1,
					'image' => $product->thumb,
					'path' => $product->path,
					'description' => $product->description
				);
				if(Cart::add($push)){
					echo Cart::count();
				}else{
					echo "0";
				}
			}else{
				echo "0";
			}

	}

	public function delete(Request $request){
		$rowID = $request->id;
		
		Cart::remove($rowID);
		echo "Product removed from cart!";

	}

	public function cart(){
		return view('frontend.cart-summery');
	}
}
