<?php

use App\Http\Controllers\LocationController;
use App\Http\Requests\LocationCreateRequest;
use App\Http\Requests\LocationUpdateRequest;
use App\Http\Resources\LocationResource;
use App\Models\Location;
use App\Services\LocationServiceImpl;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Pagination\LengthAwarePaginator;
use Mockery;

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

it('list() should return paginated locations', function () {
    $items = collect([
        new Location(['name' => 'Location 1']),
        new Location(['name' => 'Location 2'])
    ]);

    $locations = new LengthAwarePaginator(
        $items,
        $items->count(),
        10,
        1
    );

    $this->mockService
        ->shouldReceive('list')
        ->with(10)
        ->andReturn($locations);

    $request = new Request();

    $response = $this->controller->index($request);

    expect($response)->toBeInstanceOf(AnonymousResourceCollection::class);
    expect($response->count())->toBe(2);
});

it('store() should return location', function () {
    $data = [
        'name' => 'Test Location',
        'latitude' => 1.0,
        'longitude' => 1.0,
        'marker_color' => '000000'
    ];

    $request = Mockery::mock(LocationCreateRequest::class);
    $request->shouldReceive('validated')
        ->once()
        ->andReturn($data);

    $location = new Location($data);
    $this->mockService
        ->shouldReceive('create')
        ->once()
        ->with($data)
        ->andReturn($location);

    $response = $this->controller->store($request);
    expect($response)->toBeInstanceOf(LocationResource::class);
});

it('show() should return location', function () {
    $location = new Location(['name' => 'Test Location']);

    $this->mockService
        ->shouldReceive('get')
        ->with($location)
        ->andReturn($location);

    $response = $this->controller->show($location);
    expect($response)->toBeInstanceOf(LocationResource::class);
});

it('update() should update and return the location', function () {
    $data = [
        'name' => 'Updated Location',
        'latitude' => 1.0,
        'longitude' => 1.0,
        'marker_color' => '000000'
    ];

    $location = new Location(['id' => 1, 'name' => 'Old Location']);
    $updatedLocation = new Location(['id' => 1, 'name' => 'Updated Location']);

    $request = Mockery::mock(LocationUpdateRequest::class);
    $request->shouldReceive('validated')
        ->once()
        ->andReturn($data);

    $this->mockService
        ->shouldReceive('update')
        ->once()
        ->with($location, $data)
        ->andReturn($updatedLocation);

    $response = $this->controller->update($request, $location);
    expect($response)->toBeInstanceOf(LocationResource::class);
});

it('destroy() should delete location', function () {
    $location = new Location(['id' => 1, 'name' => 'Test Location']);

    $this->mockService
        ->shouldReceive('destroy')
        ->with($location)
        ->once()
        ->andReturn();

    $response = $this->controller->destroy($location);

    expect($response)->toBeInstanceOf(LocationResource::class);
});
