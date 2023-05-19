<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\AddProperty;
use App\Models\Broker;
use App\Models\Comment;

class HomeController extends Controller
{
    const LOCAL_STORAGE_FOLDER = 'public/images/';
    private $a_property;
    private $a_broker;
    private $comment;
    

    public function __construct(AddProperty $a_property, Broker $a_broker, Comment $comment){
        $this->a_property = $a_property;
        $this->a_broker = $a_broker;
        $this->comment = $comment;
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $all_properties = $this->a_property->latest()->paginate(2);
        $all_comments = $this->comment->latest()->get();
        // $all_brokers = $this->a_broker->latest()->get();
        return view('index')
            ->with('all_properties', $all_properties)
            ->with('all_comments', $all_comments);
    }

    public function create(){
        $all_brokers = $this->a_broker->latest()->get();
        return view('properties.create')->with('all_brokers', $all_brokers);
    }

    public function store(Request $request){
        $request->validate([
            'broker_id' => 'required',
            'property_name' => 'required|min:1|max:50',
            'property_description' => 'required|min:1|max:1000',
            'property_location' => 'required|min:1|max:50',
            'property_price' => 'required',
            'property_type' => 'required|min:1|max:50',
            'property_image' => 'required|mimes:jpeg,jpg,png,gif|max:1048'
        ]);

        $this->a_property->broker_id = $request->broker_id;
        $this->a_property->name = $request->property_name;
        $this->a_property->description = $request->property_description;
        $this->a_property->location = $request->property_location;
        $this->a_property->price = $request->property_price;
        $this->a_property->typeOfProperty = $request->property_type;
        $this->a_property->image = $this->saveImage($request);
        $this->a_property->save();

        return redirect()->route('index');
    }

    private function saveImage($request){
        $image_name = time() . ".". $request->property_image->extension();
        $request->property_image->storeAs(self::LOCAL_STORAGE_FOLDER, $image_name);
        return $image_name;
    }

    // public function getAllComments(){
    //     $all_comments = $this->comment->latest()-get();
    //     return view('users.index')->with('all_comments', $all_comments);
    // }
    
    public function destroy($id){
        $property = $this->a_property->findOrFail($id);
        $this->deleteImage($property->image);
        $property->delete();
        return redirect()->route('index');
    }

    private function deleteImage($image_name){
        $image_path = self::LOCAL_STORAGE_FOLDER . $image_name;

        if (Storage::disk('local')->exists($image_path)) {
            Storage::disk('local')->delete($image_path);
        }
    }
}
