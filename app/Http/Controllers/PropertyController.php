<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchPropertiesRequest;
use App\Models\Property;

class PropertyController extends Controller
{
    public function index(SearchPropertiesRequest $request)
    {
        $query = Property::query();
        if ($price = $request->validated('price')) {
            $query->where('price', '<=', $price);
        }
        if ($surface = $request->validated('surface')) {
            $query->where('surface', '>=', $surface);
        }
        if ($rooms = $request->validated('rooms')) {
            $query->where('rooms', '>=', $rooms);
        }
        if ($title = $request->validated('title')) {
            $query->where('title', 'like', "%{$title}%");
        }
        return view('property.index', [
            'properties' => $query->paginate(16),
            'input' => $request->validated(),
        ]);
    }

    public function show(string $slug, Property $property)
    {
        $expectedSlug = $property->getSlug();
        if($slug != $expectedSlug){
            return to_route('property.show', ['slug' => $expectedSlug, 'property' => $property]);
        }

        return view('property.show', [
            'property' => $property,
        ]);
    }
}
