<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PropertyController extends Controller
{
    public function index()
    {
        //$properties = DB::select("SELECT * FROM properties");
        $properties = Property::all();

        return view('property.index')->with('properties', $properties);
    }

    public function show($url)
    {
        //$property = DB::select("SELECT * FROM properties WHERE url = ?", [$url]);
        $property = Property::where('url', $url)->get();
        

        if (!empty($property)) {
            return view('property.show')->with('property', $property);
            
        } else {
            return redirect()->action([PropertyController::class, 'index']);
        }

    }

    public function create()
    {
        return view('property.create');
    }

    public function store(Request $request)
    {
        $propertySlug = $this->setUrl($request->title);

        // $property = [
        //     $request->title,
        //     $propertySlug,
        //     $request->description,
        //     $request->rental_price,
        //     $request->sale_price
        // ];

        // DB::insert("INSERT INTO properties (title, url, description, rental_price, sale_price ) VALUES
        //             (?, ?, ?, ?, ?)", $property);

        $property = new Property;
        $property->title = $request->title;
        $property->url = $propertySlug;
        $property->description = $request->description;
        $property->rental_price = $request->rental_price;
        $property->sale_price = $request->sale_price;
        $property->save();

        return redirect()->action([PropertyController::class, 'index']);
    }

    public function edit($url)
    {
        //$property = DB::select("SELECT * FROM properties WHERE url = ?", [$url]);
        $property = Property::where('url', $url)->get();
        

        if (!empty($property)) {
            return view('property.edit')->with('property', $property);
            
        } else {
            return redirect()->action([PropertyController::class, 'index']);
        }


    }

    public function update(Request $request, $id)
    {
        $propertySlug = $this->setUrl($request->title);

        // $property = [
        //     $request->title,
        //     $propertySlug,
        //     $request->description,
        //     $request->rental_price,
        //     $request->sale_price,
        //     $id
        // ];

        // DB::update("UPDATE properties SET title = ?, url = ?, description = ?, rental_price = ?, sale_price = ? 
        //     WHERE id = ?", $property);

        $property = Property::find($id);
        
        $property->title = $request->title;
        $property->url = $propertySlug;
        $property->description = $request->description;
        $property->rental_price = $request->rental_price;
        $property->sale_price = $request->sale_price;

        $property->save();

        return redirect()->action([PropertyController::class, 'index']);
    }
    
    public function destroy($url)
    {
        //$property = DB::select("SELECT * FROM properties WHERE url = ?", [$url]);
        $property = Property::where('url', $url)->get();
        if(!empty($property)){
            DB::delete("DELETE FROM properties WHERE url = ?", [$url]);
        }
        return redirect()->action([PropertyController::class, 'index']);
    }   

    private function setUrl($title)
    {
        $propertySlug = Str::slug($title);
        //$properties = DB::select("SELECT * FROM properties");
        $properties = Property::all();

        $t = 0;
        foreach ($properties as $property) {
            if (Str::slug($property->title) === $propertySlug) {
                $t++;
            }
        }

        if ($t > 0) {
            $propertySlug = $propertySlug . '-' . $t;
        }

        return $propertySlug;
    }
}
