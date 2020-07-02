<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use DB;
use File;
use Image;
use Cart;

class Product extends Controller
{
	public function my_products(){
		$id = Auth::guard('client')->id();
		$data['results'] = DB::table('products')->where('user_id', $id)->get();
		return view('frontend.include.profile.my_products', $data);
	}


	public function add(Request $request){
		if ($request->isMethod('get')) {
			$data['categories'] = DB::table('category')->where('status', '1')->get();
			return view('frontend.include.profile.add_product', $data);
		} elseif ($request->isMethod('post')) {
			$request->validate([
				'title' => 'required|string|max:255',
				'price' => 'required',
				'category' => 'required',
				'description' => 'required',
				'image' => 'required|mimes:jpeg,bmp,png,jpg,gif',
				'image1' => 'mimes:jpeg,bmp,png,jpg,gif',
				'image2' => 'mimes:jpeg,bmp,png,jpg,gif',
			]);
			try {
				$postdata['title'] = $request->input('title');
				$postdata['price'] = $request->input('price');
				$postdata['category_id'] = $request->input('category');
				$postdata['description'] = $request->input('description');
				$postdata['user_id'] = Auth::guard('client')->id();

				if (Input::hasFile('image')) {

					$image = $request->file('image');
					$imagename = time() . '_' . $image->getClientOriginalname();
					$thumb = 'thumb_' . $imagename;
					$path = 'public/assets/product';
					$img = Image::make($image->getRealPath())->resize(160, 160);
					$img->save($path . '/' . $thumb);
					$image->move($path, $imagename);
					$postdata['image'] = $imagename;
					$postdata['thumb'] = $thumb;
					$postdata['path'] = 'assets/product/';
				}


				if (Input::hasFile('image1')) {
					$image1 = $request->file('image1');
					$imagename1 = time() . '_' . $image1->getClientOriginalname();
					$path = 'public/assets/product';
					$image1->move($path, $imagename1);
					$postdata['image1'] = $imagename1;
				}

				if (Input::hasFile('image2')) {
					$image2 = $request->file('image2');
					$imagename2 = time() . '_' . $image2->getClientOriginalname();
					$path = 'public/assets/product';
					$image2->move($path, $imagename2);
					$postdata['image2'] = $imagename2;
				}

				$result = DB::table('products')->insert($postdata);
				$request->session()->flash('smsg', 'Product successfully added!');
				return redirect('/my_products');
			} catch (Exception $e) {
				$request->session()->flash('emsg', $e->errorInfo[2]);
				return redirect('/add_product');
			}
		}
	}

	public function edit(Request $request, $id)
	{
		if ($request->isMethod('get')) {
			$data['categories'] = DB::table('category')->where('status', '1')->get();
			$data['result'] = DB::table('products')->where('id', $id)->first();

			if ($data['result']) {
				return view('frontend.include.profile.edit_product', $data);
			}else{
				return redirect()->back();
			}
		} else {

			$request->validate([
				'title' => 'required|string|max:255',
				'price' => 'required',
				'category' => 'required',
				'description' => 'required',
				'image' => 'mimes:jpeg,bmp,png,jpg,gif',
				'image1' => 'mimes:jpeg,bmp,png,jpg,gif',
				'image2' => 'mimes:jpeg,bmp,png,jpg,gif',
			]);

			try {
				$postdata['title'] = $request->input('title');
				$postdata['price'] = $request->input('price');
				$postdata['category_id'] = $request->input('category');
				$postdata['description'] = $request->input('description');

				$postdata['path'] = 'assets/product/';

				if (Input::hasFile('image')) {

					$image = $request->file('image');
					$imagename = time() . '_' . $image->getClientOriginalname();
					$thumb = 'thumb_' . $imagename;
					$path = 'public/assets/product';
					$img = Image::make($image->getRealPath())->resize(150, 150);
					$img->save($path . '/' . $thumb);
					$image->move($path, $imagename);
					$postdata['image'] = $imagename;
					$postdata['thumb'] = $thumb;

					if ($request->input('old_image')) {
						$delete1 = $postdata['path'] . $request->input('old_image');
						$delete2 = $postdata['path'] . 'thumb_' . $request->input('old_image');
						if (File::exists($delete1)) {
							unlink($delete1);
						}
						if (File::exists($delete2)) {
							unlink($delete2);
						}
					}
				}

				if (Input::hasFile('image1')) {

					$image1 = $request->file('image1');
					$imagename1 = time() . '_' . $image1->getClientOriginalname();
					$path = 'public/assets/product';
					$image1->move($path, $imagename1);
					$postdata['image1'] = $imagename1;

					if ($request->input('old_image1')) {
						$delete = $postdata['path'] . $request->input('old_image1');
						if (File::exists($delete)) {
							unlink($delete);
						}
					}
				}

				if (Input::hasFile('image2')) {

					$image2 = $request->file('image2');
					$imagename2 = time() . '_' . $image2->getClientOriginalname();
					$path = 'public/assets/product';
					$image2->move($path, $imagename2);
					$postdata['image2'] = $imagename2;

					if ($request->input('old_image2')) {
						$delete = $postdata['path'] . $request->input('old_image2');
						if (File::exists($delete)) {
							unlink($delete);
						}
					}
				}


				$result = DB::table('products')->where('id', $id)->update($postdata);
				$request->session()->flash('smsg', 'Product successfully updated!');
				return redirect('/my_products');

			} catch (Exception $e) {
				$request->session()->flash('emsg', $e->errorInfo[2]);
				return redirect('edit_product/'.$id);

			}
		}
	}

	public function confirm_order(Request $request){
		if (Auth::guard('client')->check()) {
			try {
				$postdata['total'] = Cart::subtotal();
				$postdata['client_id'] = Auth::guard('client')->user()->id;
				$postdata['product'] = '';

				foreach (Cart::content() as $row) {
					$postdata['product'] .= $row->name.', ';				
				}

				$result = DB::table('orders')->insert($postdata);
				$request->session()->flash('smsg', 'Order successfully submitted!');
				Cart::destroy();
				return redirect('/my_order');

			} catch (Exception $e) {
				$request->session()->flash('emsg', 'Something wrong!');
				return redirect('/cart-summery');
			}
		}else{
			$request->session()->flash('emsg', 'To complete your order you have to login first!');
			return redirect('/login');
		}


	}

}
