<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('admin.dashboard');
        } else {
            return Redirect::to('admin-login')->send();
        }
    }

    //Order-admin
    public function manage_orders()
    {
        $this->AuthLogin();
        $all_order = DB::table('tbl_order')
            ->join('tbl_customers', 'tbl_order.customer_id', '=', 'tbl_customers.customer_id')
            ->join('tbl_shipping', 'tbl_order.shipping_id', '=', 'tbl_shipping.shipping_id')
            ->select('tbl_order.*', 'tbl_customers.*', 'tbl_shipping.shipping_name')
            ->orderBy('tbl_order.order_id', 'desc')->get();

        $manager_order = view('admin.manage_order')->with('all_order', $all_order);
        // echo '<pre>';
        // print_r($all_order);
        // echo '</pre>';
        return view('admin_layout')->with('admin.manage_order', $manager_order);
    }
    public function view_orders($orderId)
    {
        $this->AuthLogin();
        $customer_detail = DB::table('tbl_order')->where('tbl_order.order_id', $orderId)
            ->join('tbl_customers', 'tbl_order.customer_id', '=', 'tbl_customers.customer_id')
            ->select('tbl_order.*', 'tbl_customers.*')
            ->get();
        $order_shipping = DB::table('tbl_order')->where('tbl_order.order_id', $orderId)
            ->join('tbl_shipping', 'tbl_order.shipping_id', '=', 'tbl_shipping.shipping_id')
            ->select('tbl_order.*', 'tbl_shipping.*')
            ->get();
        $order_detail = DB::table('tbl_order')->where('tbl_order.order_id', $orderId)
            ->join('tbl_customers', 'tbl_order.customer_id', '=', 'tbl_customers.customer_id')
            ->join('tbl_shipping', 'tbl_order.shipping_id', '=', 'tbl_shipping.shipping_id')
            ->join('tbl_order_details', 'tbl_order.order_id', '=', 'tbl_order_details.order_id')
            ->select('tbl_order.*', 'tbl_customers.*', 'tbl_shipping.*', 'tbl_order_details.*')
            ->get();

        $manager_order = view('admin.view_order')->with('customer_detail', $customer_detail)->with('order_detail', $order_detail)->with('order_shipping', $order_shipping);
        return view('admin_layout')->with('admin.view_order', $manager_order);
    }
    public function delete_order($orderId)
    {
        $this->AuthLogin();
       
        return Redirect::to('manage-order');
    }
}
