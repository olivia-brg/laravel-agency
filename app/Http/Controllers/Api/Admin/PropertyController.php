<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Requests\Admin\PropertyFormRequest;
use App\Http\Resources\PropertyResource;
use App\Models\Property;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class PropertyController
{
    /**
     * Display a listing of properties.
     */
    public function index(): AnonymousResourceCollection
    {
        $properties = Property::with('options')
            ->latest()
            ->paginate(20);

        return PropertyResource::collection($properties);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request): JsonResponse
    {
        $property = Property::create($request->validated());

        if ($request->has('options')) {
            $property->options()->sync($request->validated('options'));
        }

        return (new PropertyResource($property->load('options')))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }


    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        return new PropertyResource($property->load('options'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request, Property $property): PropertyResource
    {
        $property->update($request->validated());

        if ($request->has('options')) {
            $property->options()->sync($request->validated('options'));
        }

        return new PropertyResource($property->load('options'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property): JsonResponse
    {
        $property->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
