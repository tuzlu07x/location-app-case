<?php

use App\Http\Controllers\LocationController;
use App\Http\Resources\LocationResource;
use App\Models\Location;
use App\Services\LocationServiceImpl;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Mockery;

uses(RefreshDatabase::class);

/** @var LocationServiceImpl&\Mockery\MockInterface $mockService */
$mockService = Mockery::mock(LocationServiceImpl::class);
$controller = new LocationController($mockService);

beforeEach(function () use ($mockService, &$controller) {
    $this->mockService = $mockService;
    $this->controller = $controller;
});

afterEach(function () {
    Mockery::close();
});

test('index method returns collection of locations', function () {
    $items = Location::factory()->count(3)->make();
    $locations = new LengthAwarePaginator(
        $items,
        $items->count(),
        10,
        1
    );
    $this->mockService->shouldReceive('list')->with(10)->andReturn($locations);

    $request = Request::create('/api/locations', 'GET');
    $response = $this->controller->index($request);

    expect($response)->toBeInstanceOf(\Illuminate\Http\Resources\Json\AnonymousResourceCollection::class);
});

it('store method creates new location', function () {
    $locationData = Location::factory()->make()->toArray();

    $this->mock(LocationServiceImpl::class, function ($mock) use ($locationData) {
        $mock->shouldReceive('create')
            ->once()
            ->with($locationData)
            ->andReturn(new Location($locationData));
    });

    $headers = ['X-API-KEY' => config('api.key')];

    $response = $this->postJson('/api/locations', $locationData, $headers);

    $response->assertStatus(200)
        ->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'latitude',
                'longitude',
                'created_at',
                'updated_at'
            ]
        ]);
});



test('show method returns specific location', function () {
    $location = Location::factory()->create();
    $headers = ['X-API-KEY' => config('api.key')];
    $response = $this->getJson('/api/locations/' . $location->id, $headers);

    $response->assertStatus(200)
        ->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'latitude',
                'longitude',
                'created_at',
                'updated_at'
            ]
        ]);
});

test('update method updates location', function () {
    $location = Location::factory()->create();
    $updateData = ['name' => 'Updated Name'];
    $headers = ['X-API-KEY' => config('api.key')];

    $this->mockService->shouldReceive('update')
        ->with($location, $updateData)
        ->andReturn($location);

    $response = $this->putJson("/api/locations/{$location->id}", $updateData, $headers);

    $response->assertStatus(200)
        ->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'latitude',
                'longitude',
                'created_at',
                'updated_at'
            ]
        ]);
});
test('destroy method deletes location', function () {
    $location = Location::factory()->create();
    $headers = ['X-API-KEY' => config('api.key')];

    $this->mockService->shouldReceive('destroy')
        ->with($location)
        ->andReturn($location);

    $response = $this->deleteJson("/api/locations/{$location->id}", [], $headers);

    $this->mockService->shouldReceive('destroy')
        ->with($location)
        ->once();

    $response = $this->controller->destroy($location);

    expect($response)->toBeInstanceOf(LocationResource::class);
});
