<?php

namespace App\Http\Controllers;

use App\Http\Requests\RouteRequest;
use App\Models\Location;
use App\Services\RouteCalculateService;
use Illuminate\Http\JsonResponse;

class RouteController extends Controller
{
    public function __construct(private readonly RouteCalculateService $routeCalculateService) {}

    public function index(RouteRequest $request): JsonResponse
    {
        $data = $request->validated();
        $locations = Location::select('name', 'latitude', 'longitude')
            ->whereBetween('latitude', [$data['start_lat'] - 5, $data['end_lat'] + 5])
            ->whereBetween('longitude', [$data['start_lon'] - 5, $data['end_lon'] + 5])
            ->orderByRaw('(ABS(latitude - ?) + ABS(longitude - ?))', [
                $data['start_lat'],
                $data['start_lon']
            ])
            ->cursor();

        $this->routeCalculateService->setStartCoordinates($data['start_lat'], $data['start_lon']);
        $this->routeCalculateService->setEndCoordinates($data['end_lat'], $data['end_lon']);
        $this->routeCalculateService->setLocations($locations);
        $route = $this->routeCalculateService->findRoute();
        return response()->json($route);
    }
}
