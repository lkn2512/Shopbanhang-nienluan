<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function save_cart(Request $request)
    {
        $productId = $request->product_id_hidden;
        $quantity = $request->quantity;
        $product_info = DB::table('tbl_product')->where('product_id', $productId)->first();
        // Cart::add('293ad', 'Product 1', 1, 9.99);
        // Cart::destroy();
        $data['id'] = $product_info->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;
        $data['size'] = '123';
        $data['options']['image'] = $product_info->product_image;
        Cart::add($data);
        return Redirect::to('/show-cart');
    }
    public function show_cart()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_name', 'asc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderBy('brand_name', 'asc')->get();

        return view('pages.cart.show_cart')->with('category', $cate_product)->with('brand', $brand_product);
    }
    public function delete_cart($rowId)
    {
        Cart::remove($rowId);
        return Redirect::to('/show-cart');
    }
    public function update_cart(Request $request)
    {
        $rowId = $request->rowId_cart;
        $quantity = $request->cart_quantity;
        Cart::update($rowId, $quantity);
        return Redirect::to('/show-cart');
    }
}
