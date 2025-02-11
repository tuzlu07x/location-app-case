<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocationCreateRequest;
use App\Http\Requests\LocationUpdateRequest;
use App\Http\Resources\LocationResource;
use App\Models\Location;
use App\Services\LocationServiceImpl;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class LocationController extends Controller
{
    public function __construct(private readonly LocationServiceImpl $locationService) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $locations = $this->locationService->list($request->limit ?? 10);
        return LocationResource::collection($locations);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LocationCreateRequest $request): LocationResource
    {
        $data = $request->validated();
        $location = $this->locationService->create($data);
        return LocationResource::make($location);
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location): LocationResource
    {
        return LocationResource::make($this->locationService->get($location));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LocationUpdateRequest $request, Location $location): LocationResource
    {
        $data = $request->validated();
        $location = $this->locationService->update($location, $data);
        return LocationResource::make($location);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location): \Illuminate\Http\JsonResponse
    {
        $this->locationService->destroy($location);

        return response()->json([
            'success' => true,
            'message' => 'Location deleted successfully.',
        ], 200);
    }
}
