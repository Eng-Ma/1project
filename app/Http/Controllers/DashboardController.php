<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\PurchaseTransaction;
use App\Models\Store;
use Illuminate\Http\Request;
class DashboardController extends Controller
{
    public function index()
    {
        $stores = Store::withTrashed()->orderBy('id', 'desc')->limit(5)->get();
        $products = Product::withTrashed()->orderBy('id', 'desc')->limit(5)->get();
        return view('dashboard.index', [
            'stores' => $stores,
            'products' => $products,
        ]);
    }

    public function stores()
    {
        $stores = Store::withTrashed()->orderBy('id', 'desc')->get();
        return view('dashboard.stores.index', [
            'stores' => $stores,
        ]);
    }

    public function products()
    {
        $products = Product::withTrashed()->orderBy('id', 'desc')->get();
        foreach ($products as $product) {
            $product->purchaseCount = PurchaseTransaction::where('product_id', $product->id)->count();
        }
        return view('dashboard.products.index', [
            'products' => $products,
        ]);
    }

    public function paymentTransactions()
    {
        $transactions = PurchaseTransaction::orderBy('id', 'desc')->get();
        return view('dashboard.payment-transactions.index', [
            'transactions' => $transactions
        ]);
    }

    public function createStore()
    {
        return view('dashboard.stores.create');
    }

    public function createProduct()
    {
        $stores = Store::all();
        return view('dashboard.products.create', [
            'stores' => $stores,
        ]);
    }

    public function storeStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'logo' => 'required',
        ], [
            'name.required' => 'الاسم مطلوب',
            'address.required' => 'العنوان مطلوب',
            'logo.required' => 'الشعار مطلوب',
        ]);
        $store = new Store();
        $store->name = $request->name;
        $store->address = $request->address;
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('uploads/stores'), $logoName);
            $store->logo = $logoName;
        }
        $store->save();
        return redirect('stores');
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'base_price' => 'required',
            'discount_price' => 'required',
            'image' => 'required',
            'store_id' => 'required|exists:stores,id',
        ]);
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->base_price = $request->base_price;
        $product->discount_price = $request->discount_price;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products'), $imageName);
            $product->image = $imageName;
        }
        $product->is_base_price = (bool) $request->is_base_price;
        $product->store_id = $request->store_id;
        $product->save();
        return redirect('products');
    }

    public function editStore($id)
    {
        $store = Store::find($id);
        return view('dashboard.stores.edit', [
            'store' => $store,
        ]);
    }

    public function editProduct($id)
    {
        $product = Product::find($id);
        $stores = Store::all();
        return view('dashboard.products.edit', [
            'product' => $product,
            'stores' => $stores,
        ]);
    }

    public function updateStore(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
        ]);
        $store = Store::find($id);
        $store->name = $request->name;
        $store->address = $request->address;
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . rand(10000, 10000000) .'.'. $extension;
            $destinationPath = base_path() . '/public/uploads/stores';
            $file->move($destinationPath, $fileName);
            $store->logo = $fileName;
        }
        $store->save();
        return redirect('stores');
    }

    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'base_price' => 'required',
            'discount_price' => 'required',
            'store_id' => 'required|exists:stores,id',
        ]);
        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->base_price = $request->base_price;
        $product->discount_price = $request->discount_price;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products'), $imageName);
            $product->image = $imageName;
        }
        $product->is_base_price = (bool) $request->is_base_price;
        $product->store_id = $request->store_id;
        $product->save();
        return redirect('products');
    }

    public function deleteStore($id)
    {
        $store = Store::withTrashed()->find($id);
        if ($store->deleted_at != null) {
            $store->deleted_at = null;
            $store->save();
        } else {
            $store->delete();
        }
        return back();
    }

    public function deleteProduct($id)
    {
        $product = Product::withTrashed()->find($id);
        if ($product->deleted_at != null) {
            $product->deleted_at = null;
            $product->save();
        } else {
            $product->delete();
        }
        return back();
    }
}
