<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PropertyController extends Controller
{
    //show all
    public function index(){
        $property = Property::all();
        return response()->json(['property'=>$property]);
    }
    //show one
    public function show($id){
        $property = Property::where('id',$id)->get();
        return response()->json(['property'=>$property]);
    }
    //property ekleme bitmedi devam ediyorum endpointe foto işini konuş
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'city' => 'required',
            'adress' => 'required',
            'price' => 'required',
            'house_type' => 'required',
            'house_subtype' => 'required',
            'for_sale_rent'=> 'required'
        ]);
        if($validator->fails()){

            return $errors = $validator->errors();
        }
        // eğer fotoraf burda oalcaksa if kulaan !!!! 'required|image|mimes:png,jpg,jpeg|max:2048'
        $property = new Property([
            'name' => $request->name,
            'city' => $request->city,
            'adress' => $request->adress,
            'price' => $request->price,
            'house_type' => $request->house_type,
            'house_subtype' => $request->house_subtype,
            'for_sale_rent' => $request->for_sale_rent,
        ]);
        $property->save();
    }
    //update bitmedi
    public function update(){

    }
    //delete blog
    public function destroy($id){
        $property = Property::find($id);
        $property->delete();
        return response()->json(['success'=>'deleted Successfully']);

    }

    //fetchlemek için lazim ola bilir
    public function editpropery($id){
        $property = Property::find($id);
        return response()->json($property);
     }

}
