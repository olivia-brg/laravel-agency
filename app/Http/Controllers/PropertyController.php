<?php

namespace App\Http\Controllers;

use App\Models\Property;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::paginate(2);
        return view('property.index', compact('properties'));
    }

    public function show(string $slug, Property $property)
    {
    }
}
