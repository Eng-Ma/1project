<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\PurchaseTransaction;
use App\Models\Store;
use Illuminate\Http\Client\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        $stores = Store::orderBy('id', 'desc')->limit(4)->get();
        $products = Product::orderBy('id', 'desc')->limit(6)->get();
        return view('website.index', [
            'stores' => $stores,
            'products' => $products,
        ]);
    }

    public function stores()
    {
        $stores = Store::orderBy('id', 'desc')->limit(4)->get();
        return view('website.stores', [
            'stores' => $stores,
        ]);
    }
    public function products($id)
    {
        $store = Store::findOrFail($id);
        $products = $store->products()->when(request()->has('search'), function ($query) {
            $query->where('name', 'like', '%' . request()->search . '%');
        })->orderBy('id', 'desc')->get();
        return view('website.products', [
            'products' => $products,
        ]);
    }

    public function purchase(\Illuminate\Http\Request $request, $id) {
        $product = Product::findOrFail($id);
        $purchase = new PurchaseTransaction();
        $purchase->product_id = $id;
        $purchase->store_id = $product->store->id;
        $purchase->price = $request->price;
        $purchase->save();
        return back();
    }
}
