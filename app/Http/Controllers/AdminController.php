<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Food;

use App\Models\Reservation;

use App\Models\Foodchef;

use App\Models\Order;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // METHOD TO FETCH ALL USERS FROM DATABASE
    public function user(){
        $data = user::all();
        return view('admin.users', compact('data'));
    }

    // DELETE USER METHOD USING FORM(POST)
    public function destroy($id){
        $user = User::find($id);
        if($user){
            $user = User::destroy($id);
            return redirect()->back()->with('success', 'User deleted successfully');
        }else{
            return redirect()->back()->with('error', 'User not found');
        }
    }

    //DELETE USER METHOD USING GET
    public function deleteuser($id){
        $data = User::find($id);
        if($data){
            $data->delete();
            return redirect()->back()->with('success', 'User deleted successfully');
            //return redirect()->route('admin.users')->with('success', 'User deleted successfully');
        }else{
            // Handle the case where the user doesn't exist
            return redirect()->back()->with('error', 'User not found');
            //return redirect()->route('admin.users')->with('error', 'User not found');
        }
        //dd($data);
    }

    //ADD NEW MENU
    public function addmenu(){

        return view("admin.addfood");
    }

    //ADD NEW CHEF
    public function addchef(){

        return view("admin.addchef");
    }

    //FETCH ALL FOOD METHOD
    public function foodmenu(){
        $data = food::all(); 
        return view('admin.foodmenu', compact('data'));
    }

    // DELETE FOOD METHOD USING FORM(POST)
    public function deletemenu($id){
        $data = Food::find($id);

        $data->delete();

        if($data){
            return redirect()->back()->with('success', 'Food deleted successfully');
        }else{
            return redirect()->back()->with('error', 'Food not found');
        }
    }

    // DELETE CHEF METHOD USING FORM(POST)
    public function deletechef($id){
        $data2 = Foodchef::find($id);

        $data2->delete();

        if($data2){
            return redirect()->back()->with('success', 'Chef deleted successfully');
        }else{
            return redirect()->back()->with('error', 'Chef not found');
        }
    }

     // DELETE CHEF METHOD USING FORM(POST)
     public function deletereservation($id){
        $data = Reservation::find($id);

        $data->delete();

        if($data){
            return redirect()->back()->with('success', 'Reservation deleted successfully');
        }else{
            return redirect()->back()->with('error', 'Reservation not found');
        }
    }

    //OPTION 1 UPLOAD FOOD FILE
    public function uploadfood(Request $request){
        //var = new tablename
        $data = new food;

        //$var = $request->name='image'(name as in input field)
        $image = $request->image;

        // $var = time().'.'. $data->getClientOriginalExtension();
        $imagename = time().'.'.$image->getClientOriginalExtension();

        //$request->image->move('foldername', $imagename);
        $request->image->move('uploads',$imagename);

        //data->image(name as on database table)->$imagename
        $data->image = $imagename;

        //$data->title(name as on database table) = $request->title(name as in input field)
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->desc;
        $data->save();

        if ($data) {
            return redirect()->route('admin.foodmenu')->with('success', 'Food uploaded successfully');
        } else {
            return redirect()->route('admin.foodmenu')->with('error', 'Food not uploaded');
        }

    }
    
    //OPTION 2 UPLOAD FOOD FILE
    // public function uploadfood(Request $request) {
    //     // Create a new instance of the Food model
    //     $food = new Food;
    
    //     // Check if an image file was provided in the request
    //     if ($request->hasFile('image')){
    //         // Get the image file from the request
    //         $image = $request->file('image');
    
    //         // Generate a unique filename for the image
    //         $imagename = time() . '.' . $image->getClientOriginalExtension();
    
    //         // Move the uploaded image to the 'uploads' folder
    //         $image->move('uploads', $imagename);
    
    //         // Set the image filename in the model
    //         $food->image = $imagename;
    //     }
    
    //     // Set other fields from the form data
    //     $food->title = $request->input('title');
    //     $food->price = $request->input('price');
    //     $food->description = $request->input('desc');
    
    //     // Save the food model to the database
    //     $food->save();
    
    //     if ($food) {
    //         return redirect()->route('admin.foodmenu')->with('success', 'Food uploaded successfully');
    //     } else {
    //         return redirect()->route('admin.foodmenu')->with('error', 'Food not uploaded');
    //     }
    // }


     // EDIT FOOD FILE
     public function update(Request $request, $id) {
        // Find the food item by its ID
        $data = Food::find($id);
    
        if ($request->hasFile('image')) {
            // Process the image upload and save the data
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('uploads', $imagename);
    
            // Update the 'image' field in the database
            $data->image = $imagename;
        }
    
        // Update other fields
        $data->title = $request->input('title');
        $data->price = $request->input('price');
        $data->description = $request->input('desc');
    
        $data->save();
    
        if ($data) {
            return redirect()->route('admin.foodmenu')->with('success', 'Food edited successfully');
        } else {
            return redirect()->route('admin.foodmenu')->with('error', 'Food not edited');
        }
    }
    
      // EDIT CHEF FILE
      public function updatechef(Request $request, $id) {
        // Find the foodchef item by its ID
        $data2 = Foodchef::find($id);
    
        if ($request->hasFile('image')) {
            // Process the image upload and save the data
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('uploads', $imagename);
    
            // Update the 'image' field in the database
            $data2->image = $imagename;
        }
    
        // Update other fields
        $data2->name = $request->input('name');
        $data2->specialty = $request->input('specialty');
    
        $data2->save();
    
        if ($data2) {
            return redirect()->back()->with('success', 'Chef edited successfully');
        } else {
            return redirect()->back()->with('error', 'Chef not edited');
        }
    }
    
     //EDIT FOOD METHOD USING FORM (PUT)
     public function editmenu($id){
        $data = Food::findOrFail($id);

        return view('admin.editmenu', compact('data'));
    }

    //EDIT CHEF METHOD USING FORM (PUT)
    public function editchef($id){
        $data2 = Foodchef::findOrFail($id);
    
        return view('admin.editchef', compact('data2'));
    }
    
    //
     public function reservation(Request $request){
        // Create a new instance of the Food model
        $reserve = new Reservation;
    
        // Set other fields from the form data
        $reserve->name = $request->name;
        $reserve->email = $request->email;
        $reserve->phone = $request->phone;
        $reserve->guest = $request->guest;
        $reserve->date = $request->date;
        $reserve->time = $request->time;
        $reserve->message = $request->message;

    
        // Save the food model to the database
        $reserve->save();
    
        if($reserve) {
            return redirect()->route('reservation')->with('success', 'reservation made successfully');
        } else {
            return redirect()->route('reservation')->with('error', 'reservation not made');
        }
    }

    //FETCH ALL RESERVATION
    public function viewreservation(){
        //VALIDATION: if logged in user id is authenticated, allow user viewreservation data else redirect to login
        if(Auth::id()){
            $data = Reservation::all();
            return view('admin.adminreservation', compact('data'));
        }else{
            return redirect('login');
        }
    }

    //FETCH ALL CHEF
    public function viewchef(){
        $data2 = Foodchef::all();
        
        return view('admin.adminchef', compact('data2'));
    }


    public function uploadchef(Request $request){
        // Create a new instance of the Food model
        $data = new Foodchef;
    
        // Check if an image file was provided in the request
        if ($request->hasFile('image')){
            // Get the image file from the request
            $image = $request->file('image');
    
            // Generate a unique filename for the image
            $imagename = time() . '.' . $image->getClientOriginalExtension();
    
            // Move the uploaded image to the 'uploads' folder
            $image->move('uploads', $imagename);
    
            // Set the image filename in the model
            $data->image = $imagename;
        }
    
        // Set other fields from the form data
        $data->name = $request->input('name');
        $data->specialty = $request->input('specialty');
    
        // Save the food model to the database
        $data->save();
    
        if ($data) {
            return redirect()->back()->with('success', 'Chef uploaded successfully');
        } else {
            return redirect()->back()->with('error', 'Chef not uploaded');
        }
    }

    //FETCH ORDER METHOD
    public function orders(){

        $data = Order::all(); 

        return view('admin.orders', compact('data'));
    }

    //SEARCH METHOD
    public function search(Request $resquest){
        //retieve name field in form
        $search = $resquest->search;

        //$data=search by name or search by foodname
        $data=order::where('name', 'Like', '%' . $search . '%')->orWhere('foodname', 'Like', '%' . $search . '%')->get();

        return view('admin.orders', compact('data'));
    }
}





