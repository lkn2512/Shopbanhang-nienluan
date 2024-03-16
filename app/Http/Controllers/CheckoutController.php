<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function login_checkout()
    {
        // $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_id', 'desc')->get();
        // $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderBy('brand_id', 'desc')->get();

        return view('pages.checkout.login-checkout');
    }
    public function register_checkout()
    {
        // $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_id', 'desc')->get();
        // $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderBy('brand_id', 'desc')->get();

        return view('pages.checkout.register-checkout');
    }
    public function add_customer(Request $request)
    {
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_password'] = md5($request->customer_pass);
        $customer_id = DB::table('tbl_customers')->insertGetId($data);

        Session::put('customer_id', $customer_id);
        Session::put('customer_name', $request->customer_name);
        return Redirect::to('/login-checkout');
    }
    public function checkout()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderBy('brand_id', 'desc')->get();
        return view('pages.checkout.show_checkout')->with('category', $cate_product)->with('brand', $brand_product);
    }
    public function save_checkout_customer(Request $request)
    {
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_notes'] = $request->shipping_message;
        $data['shipping_payment'] = $request->payment_option;
        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);

        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = $shipping_id;
        $order_data['order_total'] = Cart::subtotal();
        $order_data['order_status'] = 'Đang chờ';
        $order_id = DB::table('tbl_order')->insertGetId($order_data);

        //insert order_detail
        $content = Cart::content();
        foreach ($content as $value_content) {
            $order_detail = array();
            $order_detail['order_id'] = $order_id;
            $order_detail['product_id'] = $value_content->id;
            $order_detail['product_name'] = $value_content->name;
            $order_detail['product_price'] = $value_content->price;
            $order_detail['product_sales_quantity'] = $value_content->qty;
            $order_detail['product_image'] = $value_content->options->image;
            DB::table('tbl_order_details')->insert($order_detail);
        }
        if ($data['shipping_payment'] == 1 || $data['shipping_payment'] == 2 || $data['shipping_payment'] == 3) {
            Cart::destroy();
            $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_name', 'asc')->get();
            $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderBy('brand_name', 'asc')->get();
            return view('pages.checkout.handcash')->with('category', $cate_product)->with('brand', $brand_product);
        }
    }
    public function payment()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderBy('brand_id', 'desc')->get();
        return view('pages.checkout.payment')->with('category', $cate_product)->with('brand', $brand_product);
    }
    public function logout_checkout()
    {
        Session::flush();
        return Redirect::to('/login-checkout');
    }
    public function login_customer(Request $request)
    {
        $email = $request->email_account;
        $password = md5($request->pass_account);
        $result = DB::table('tbl_customers')->where('customer_email', $email)->where('customer_password', $password)->first();

        if ($result) {
            Session::put('customer_id', $result->customer_id);
            Session::put('customer_name', $result->customer_name);
            return Redirect::to('/');
        } else {
            Session::put('message', "Tài khoản hoặc mật khẩu không chính xác!");
            return Redirect::to('/login-checkout');
        }
    }
}
