<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddProperty;

class HomesController extends Controller
{
    private $homeProperty;

    public function __construct(AddProperty $homeProperty){
        $this->homeProperty = $homeProperty;
    }

    public function index(){
        $c_forSale = $this->homeProperty->where('typeOfProperty', 'For Sale')->count();
        $c_forRent = $this->homeProperty->where('typeOfProperty', 'For Rent')->count();
        $all_properties = $this->homeProperty->latest()->paginate(2);
        return view('admin.properties.index')
            ->with('all_properties', $all_properties)
            ->with('c_forSale', $c_forSale)
            ->with('c_forRent', $c_forRent);
    }
}
