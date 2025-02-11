<?php

use App\Models\Location;
use App\Repositories\LocationRepositoryImpl;
use App\Services\LocationService;
use Illuminate\Pagination\LengthAwarePaginator;
use Mockery;

/** @var Mockery\MockInterface|LocationRepositoryImpl $mockRepository */
$mockRepository = Mockery::mock(LocationRepositoryImpl::class);

$service = new LocationService($mockRepository);

beforeEach(function () use ($mockRepository, &$service) {
    $this->mockRepository = $mockRepository;
    $this->service = $service;
});

afterEach(function () {
    Mockery::close();
});

it('list() should return paginated locations', function () {
    $paginator = Mockery::mock(LengthAwarePaginator::class);

    $this->mockRepository->shouldReceive('paginate')
        ->with(10)
        ->andReturn($paginator);
    expect($this->service->list(10))->toBe($paginator);
});

it('create() should return location', function () {
    $data = ['name' => 'Test Location'];
    $location = new Location($data);

    $this->mockRepository->shouldReceive('create')
        ->with($data)
        ->andReturn($location);
    expect($this->service->create($data))->toBe($location);
});

it('get() should return location', function () {
    $location = new Location();
    expect($this->service->get($location))->toBe($location);
});

test('update() should update and return the location', function () {
    $data = ['name' => 'Updated Location'];

    $location = new Location(['id' => 1, 'name' => 'Old Location']);
    $updatedLocation = new Location(['id' => 1, 'name' => 'Updated Location']);

    $this->mockRepository
        ->shouldReceive('update')
        ->once()
        ->with($data, $location->id)
        ->andReturn($updatedLocation);

    $result = $this->service->update($location, $data);
    expect($result->name)->toBe('Updated Location');
});

it('destroy() should delete location', function () {
    $location = new Location(['id' => 1, 'name' => 'Test Location']);

    $this->mockRepository->shouldReceive('delete')
        ->with($location->id)
        ->andReturn($location);

    $this->service->destroy($location);

    $this->mockRepository->shouldHaveReceived('delete')
        ->once()
        ->with($location->id);

    $this->expectNotToPerformAssertions();
});
