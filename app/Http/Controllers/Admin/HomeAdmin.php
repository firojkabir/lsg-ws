<?php
/**
 * @Author: Jobayer Mojumder
 * @Date:   2017-09-17 12:56:14
 * @Last Modified by:   jobayermojumder
 * @Last Modified time: 2018-05-31 12:36:32
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use DB;
use File;
use Image;

class HomeAdmin extends Controller
{

    public function index()
    {
        if (Auth::check()) {
            redirect('admin');
        } else {
            redirect('logout');
        }
    }

    /*--------------------------------- Slider Function ------------------------*/

    public function slider()
    {
        $results = DB::table('home_slider')->orderby('rank', 'asc')->paginate(10);
        return view('admin.home.slider', ['results' => $results]);
    }

    public function sliderAdd(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('admin.home.sliderAdd');
        } elseif ($request->isMethod('post')) {
            $request->validate([
                'rank' => 'required|integer',
                'title' => 'required|string|max:255',
                'image' => 'required|mimes:jpeg,bmp,png,jpg,gif',
                'status' => 'required|integer',
            ]);
            try {
                $postdata['rank'] = $request->input('rank');
                $postdata['title'] = $request->input('title');
                $postdata['morelink'] = $request->input('morelink');
                $postdata['morelinkweb'] = $request->input('morelinkweb');
                $postdata['details'] = $request->input('details');
                $postdata['status'] = $request->input('status');

                if (Input::hasFile('image')) {

                    $image = $request->file('image');
                    $imagename = time() . '_' . $image->getClientOriginalname();
                    $thumb = 'thumb_' . $imagename;
                    $path = 'assets/home/slider';
                    $img = Image::make($image->getRealPath())->resize(150, 150);
                    $img->save($path . '/' . $thumb);
                    $image->move($path, $imagename);
                    $postdata['image'] = $imagename;
                    $postdata['thumb'] = $thumb;
                    $postdata['image_path'] = 'assets/home/slider/';
                }
                $result = DB::table('home_slider')->insert($postdata);
                $request->session()->flash('msg', 'Slider Successfully added!');
                return redirect()->route('a_slider');
            } catch (Exception $e) {
                $request->session()->flash('emsg', $e->errorInfo[2]);
                return redirect()->route('a_sliderAdd');
            }
        }
    }

    public function sliderEdit(Request $request, $id)
    {
        if ($request->isMethod('get')) {
            $result = DB::table('home_slider')->where('id', $id)->first();
            return view('admin.home.sliderEdit', ['slider' => $result]);
        } else {

            $request->validate([
                'rank' => 'required|integer',
                'title' => 'required|string|max:255',
                'status' => 'required|integer',
            ]);

            try {
                $postdata['rank'] = $request->input('rank');
                $postdata['title'] = $request->input('title');
                $postdata['morelink'] = $request->input('morelink');
                $postdata['morelinkweb'] = $request->input('morelinkweb');
                $postdata['details'] = $request->input('details');
                $postdata['status'] = $request->input('status');

                $postdata['image_path'] = 'assets/home/slider/';

                if (Input::hasFile('image')) {

                    $image = $request->file('image');
                    $imagename = time() . '_' . $image->getClientOriginalname();
                    $thumb = 'thumb_' . $imagename;
                    $path = 'assets/home/slider';
                    $img = Image::make($image->getRealPath())->resize(150, 150);
                    $img->save($path . '/' . $thumb);
                    $image->move($path, $imagename);
                    $postdata['image'] = $imagename;
                    $postdata['thumb'] = $thumb;

                    if ($request->input('old_image')) {
                        $delete1 = $postdata['image_path'] . $request->input('old_image');
                        $delete2 = $postdata['image_path'] . 'thumb_' . $request->input('old_image');
                        if (File::exists($delete1)) {
                            unlink($delete1);
                        }
                        if (File::exists($delete2)) {
                            unlink($delete2);
                        }
                    }
                } elseif ($request->input('del_image')) {

                    if ($request->input('old_image')) {
                        $delete1 = $postdata['image_path'] . $request->input('old_image');
                        $delete2 = $postdata['image_path'] . 'thumb_' . $request->input('old_image');
                        if (File::exists($delete1)) {
                            unlink($delete1);
                        }
                        if (File::exists($delete2)) {
                            unlink($delete2);
                        }
                    }
                    $postdata['image'] = '';
                    $postdata['thumb'] = '';
                }

                $result = DB::table('home_slider')->where('id', $id)->update($postdata);
                $request->session()->flash('msg', 'Slider Successfully updated!');
                return redirect()->route('a_slider');

            } catch (Exception $e) {
                $request->session()->flash('emsg', $e->errorInfo[2]);
                return redirect()->route('a_sliderEdit', ['id' => $id]);

            }
        }
    }

    public function sliderDelete(Request $request, $id)
    {
        try {
            $result = DB::table('home_slider')->select('image', 'thumb', 'image_path')->where('id', $id)->first();
            $delete = DB::table('home_slider')->where('id', $id)->delete();

            $image = $result->image_path . $result->image;
            $thumb = $result->image_path . $result->thumb;

            if ($result->image) {
                unlink($image);
            }
            if ($result->thumb) {
                unlink($thumb);
            }
            $request->session()->flash('msg', 'Slider Successfully Deleted!');
            return redirect()->route('a_slider');
        } catch (Exception $e) {
            $request->session()->flash('emsg', $e->errorInfo[2]);
            return redirect()->route('a_slider');
        }
    }
    /*{Slider status change ( with hstatus)}*/

    public function sliderStatus(Request $request, $id, $value, $status)
    {
        if ($value) {
            $postdata[$status] = 0;
            $result = DB::table('home_slider')->where('id', $id)->update($postdata);
        } else {
            $postdata[$status] = 1;
            $result = DB::table('home_slider')->where('id', $id)->update($postdata);
        }
        if ($result) {
            $request->session()->flash('msg', $status . ' Successfully Changed!');
            return redirect()->route('a_slider');
        } else {
            $request->session()->flash('emsg', $status . ' Change was Un-Successful!');
            return redirect()->route('a_slider');
        }
    }


    /*--------------------------------- Category Function start ------------------------*/

    public function category()
    {
        $results = DB::table('category')->orderby('name', 'asc')->paginate(10);
        return view('admin.home.category', ['results' => $results]);
    }

    public function categoryAdd(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('admin.home.categoryAdd');
        } elseif ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|string|max:255',
                'status' => 'required|integer',
            ]);
            try {
                $postdata['name'] = $request->input('name');
                $postdata['status'] = $request->input('status');

                $result = DB::table('category')->insert($postdata);
                $request->session()->flash('msg', 'Category Successfully added!');
                return redirect()->route('a_category');
            } catch (Exception $e) {
                $request->session()->flash('emsg', $e->errorInfo[2]);
                return redirect()->route('a_categoryAdd');
            }
        }
    }

    public function categoryEdit(Request $request, $id)
    {
        if ($request->isMethod('get')) {
            $result = DB::table('category')->where('id', $id)->first();
            return view('admin.home.categoryEdit', ['result' => $result]);
        } else {

            $request->validate([
                'name' => 'required|string|max:255',
                'status' => 'required|integer',
            ]);

            try {
                $postdata['name'] = $request->input('name');
                $postdata['status'] = $request->input('status');

                $result = DB::table('category')->where('id', $id)->update($postdata);
                $request->session()->flash('msg', 'Category Successfully updated!');
                return redirect()->route('a_category');

            } catch (Exception $e) {
                $request->session()->flash('emsg', $e->errorInfo[2]);
                return redirect()->route('a_categoryEdit', ['id' => $id]);

            }
        }
    }

    public function categoryDelete(Request $request, $id)
    {
        try {
            $delete = DB::table('category')->where('id', $id)->delete();

            $request->session()->flash('msg', 'Category Successfully Deleted!');
            return redirect()->route('a_category');
        } catch (Exception $e) {
            $request->session()->flash('emsg', $e->errorInfo[2]);
            return redirect()->route('a_category');
        }
    }


    public function categoryStatus(Request $request, $id, $value, $status)
    {
        if ($value) {
            $postdata[$status] = 0;
            $result = DB::table('category')->where('id', $id)->update($postdata);
        } else {
            $postdata[$status] = 1;
            $result = DB::table('category')->where('id', $id)->update($postdata);
        }
        if ($result) {
            $request->session()->flash('msg', $status . ' Successfully Changed!');
            return redirect()->route('a_category');
        } else {
            $request->session()->flash('emsg', $status . ' Change was Un-Successful!');
            return redirect()->route('a_category');
        }
    }

    /*--------------------------------- Category Function end ------------------------*/


    /*--------------------------------- Products Function start ------------------------*/

    public function products()
    {
        $results = DB::table('products')
        ->join('category', 'products.category_id', '=', 'category.id')
        ->select('products.*', 'category.name')
        ->orderby('products.created_at', 'DESC')
        ->paginate(10);
        return view('admin.home.products', ['results' => $results]);
    }

    public function productsStatus(Request $request, $id, $value, $status)
    {
        if ($value) {
            $postdata[$status] = 0;
            $result = DB::table('products')->where('id', $id)->update($postdata);
        } else {
            $postdata[$status] = 1;
            $result = DB::table('products')->where('id', $id)->update($postdata);
        }
        if ($result) {
            $request->session()->flash('msg', $status . ' Successfully Changed!');
            return redirect()->route('a_products');
        } else {
            $request->session()->flash('emsg', $status . ' Change was Un-Successful!');
            return redirect()->route('a_products');
        }
    }

    /*--------------------------------- Products Function end ------------------------*/

    
    /*---------------------------- client View  -----------------------------*/

    public function clientlist()
    {
        $client = DB::table('clients')->paginate(10);
        return view('admin.client.clientlist', ['client' => $client]);
    }



    /*---------------------- client status change ---------------*/

    public function clientStatus(Request $request, $id, $value)
    {
        if ($value) {
            $result = $this->statusChange('clients', $id, '0');
        } else {
            $result = $this->statusChange('clients', $id, '1');
        }
        if ($result) {
            $request->session()->flash('msg', 'Status Successfully Changed!');
            return redirect()->route('a_clientlist');
        } else {
            $request->session()->flash('msg', 'Status Change was Un-Successful!');
            return redirect()->route('a_clientlist');
        }
    }

    /*---------------------- status change main function ---------------*/

    public function statusChange($table, $id, $value)
    {
        $postdata['status'] = $value;
        $result = DB::table($table)->where('id', $id)->update($postdata);
        if ($result) {
            return '1';
        } else {
            return '0';
        }
    }


    
}
