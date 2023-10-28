<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Food;

use App\Models\Foodchef;

use App\Models\Cart;

use App\Models\Order;

class HomeController extends Controller
{
    //
    public function index(){
        //VALIDATION: if user is signed in, take them to redirects public function
        if(Auth::id()){
            return redirect('redirects');
        }else
    
        $data = Food::all();

        $data2 = Foodchef::all();

        return view('home', compact("data", "data2"));
    }

    public function redirects(){
        //to allow user to also see fetched data
        $data = Food::all();

        $data2 = Foodchef::all();   //fetch all chef

        $user_type = Auth::user()->user_type;

        if($user_type == 1){
            return view('admin.adminhome');
        }else{

            $user_id = Auth::id(); // get userid
            
            //$count = 
            $count = cart::where('user_id', $user_id)->count();

            //compact('data') to allow user also see fetched data
            return view('home', compact('data', 'data2', 'count'));
        }
    }

    //ADD TO CART OPTION 1
    public function addcart(Request $request, $foodid){
        if(Auth::id()){
            //If userid is authenticated(if user is logged in) allow user to addcart
            $user_id = Auth::id();

            //$foodid = $id 
            //request quantity field input
            $quantity = $request->quantity;

            //instantiate class of Cart
            $cart = new Cart;

            //retrieve form input field data
            $cart->user_id = $user_id;
            $cart->food_id = $foodid;
            $cart->quantity = $quantity;

            //send to database
            $cart->save();

            //header
            return redirect()->back()->with('success', 'Item added to cart successfully.');
        }else{
            //else redirect user to login to be able to add to cart
            return redirect('/login');
        }
    }

    //ADD TO CART OPTION 2 remove d s addcart to work
    public function addcarts(Request $request, $foodid) {
        //If authentication is checked 
        if (Auth::check()) {
         //& user_id present = Authenticated logged in id
            $user_id = Auth::id();

            //request quantity field input
            $quantity = $request->quantity;

            //instantiate class of Cart
            $cart = new Cart;

            //retrieve form input field data
            $cart->user_id = $user_id;
            $cart->food_id = $foodid; // Assign the retrieved foodid from the route
            $cart->quantity = $quantity;

            //send to database
            $cart->save();

            //header
            return redirect()->back()->with('success', 'Item added to cart successfully.');
        } else {
            //else redirect user to login to be able to add to cart
            return redirect('/login');
        }
    }

    //FETCH 
    public function showcart(Request $request, $id){

        //count all items in cart where user is signed in
        $count = Cart::where('user_id', $id)->count();

        //VALIDATION: id logged in user id == $id in showcart parameter, show d user fetched product
        if(Auth::id()==$id){
            //fetch product
            $data = Cart::where('user_id', $id)->join('food', 'carts.food_id', '=', 'food.id')->get();

            //remove product
            $data2 = Cart::select('*')->where('user_id', '=', $id)->get();

            return view('showcart', compact('count', 'data', 'data2'));

        }else{
            return redirect()->back();
        }
    }

    public function remove($id){
        $data = Cart::find($id);

        $data->delete();

        if($data){
            return redirect()->back()->with('success', 'product removed successfully');
        }else{
            return redirect()->back()->with('error', 'product not found');
        }
    }

    //
    public function orderconfirm(Request $request){

        // Iterate through the submitted food items
        foreach($request->foodname as $key=>$foodname){

            // Create a new Order instance for each food item
            $data = new Order;

             // Set the fields for the Order
            $data->foodname = $foodname;

            $data->price = $request->price[$key];

            $data->quantity = $request->quantity[$key];

            $data->name = $request->name;

            $data->phone = $request->phone;

            $data->address = $request->address;

            $data->save();
        }

        if($data){
            return redirect()->back()->with('success', 'order confirmed successfully');
        }else{
            return redirect()->back()->with('error', 'unable to confirm order');
        }
        
    }
}
