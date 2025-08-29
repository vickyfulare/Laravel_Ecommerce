<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    //
    function index()
    {
        $data = Product::all();
        return view('product',["products"=>$data]);
    }
    
     public function addProduct(Request $request)
    {
        // ✅ Validate form data
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|string|max:255',
            'gallery' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string|max:500',
        ]);

        // ✅ Upload Image
        $imagePath = null;
        if ($request->hasFile('gallery')) {
            $image = $request->file('gallery');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('storage'), $imageName);
            $imagePath = '' . $imageName;
        }

        // ✅ Save Product
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->gallery = $imagePath;
        $product->description = $request->description;
        $product->save();

        // ✅ Redirect back with success message
        return redirect()->back()->with('success', 'Product Added Successfully!');
    }

    function detail($id)
    {
        $data = Product::find($id);
        return view('detail',['product'=>$data]);
    }

    function allProducts()
    {
        $data= Product::all();
        return view('allproducts',['products'=>$data]);
    }


    function search(Request $req)
    {
        $data = Product::where('name','like','%'.$req->input('query').'%')->get();
        return view('search',['products'=>$data]);
    }

    function addToCart(Request $req)
    {
        if($req->session()->has('user'))
        {
            $cart = new Cart;
            $cart->user_id=$req->session()->get('user')['id'];
            $cart->product_id=$req->product_id;
            $cart->save();  
            return redirect('/all-products');
        }
        else{
            return redirect('/login');
        }
    }

    public static function cartItem()
{
    $userId = Session::get('user')['id'] ?? null;
    return $userId ? Cart::where('user_id', $userId)->count() : 0;
}

  function cartList()
  {
    $userId = Session::get('user')['id'];
    $data = DB::table('cart')
    ->join('products','cart.product_id','products.id')
    ->select('products.*')
    ->where('cart.user_id',$userId)
    ->get();
    return view('cartlist',['products'=>$data]);
  }

  public function removeCart($id)
{
    $userId = Session::get('user')['id'];
    DB::table('cart')
        ->where('product_id', $id)
        ->where('user_id', $userId)
        ->delete();

    return redirect('/cartlist')->with('success', 'Product removed from cart successfully!');
}

   function orderNow()
   {
      $userId = Session::get('user')['id'];
      $total = DB::table('cart')
      ->join('products','cart.product_id','products.id')
      ->where('cart.user_id',$userId)
      ->sum('products.price');
      return view('ordernow',['total'=>$total]);
   }

   function orderPlace(Request $req)
   {
    
      $userId = Session::get('user')['id'];
      $allCart = Cart::where('user_id',$userId)->get();
      foreach($allCart as $cart)
      {
        $order = new Order;
        $order->product_id=$cart['product_id'];
        $order->user_id=$cart['user_id'];
        $order->address=$req->address;
        $order->status="Pending";
        $order->payment=$req->payment;
        $order->payment_status="Pending";
        $order->save();    
    }
    Cart::where('user_id',$userId)->delete();
    return redirect('/');
   }


   function myOrders()
   {
      $userId = Session::get('user')['id'];
      $orders = DB::table('orders')
      ->join('products','orders.product_id','products.id')
      ->where('orders.user_id',$userId)
      ->get();
     return view('myorders',['orders'=>$orders]);
     
   }

}