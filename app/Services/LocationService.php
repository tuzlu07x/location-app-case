<?php

namespace App\Services;

use App\Models\Location;
use App\Repositories\LocationRepositoryImpl;
use Illuminate\Pagination\LengthAwarePaginator;

class LocationService implements LocationServiceImpl
{
    public function __construct(private readonly LocationRepositoryImpl $locationRepository) {}

    public function list(int $limit): LengthAwarePaginator
    {
        return $this->locationRepository->paginate($limit);
    }

    public function create(array $data): Location
    {
        return $this->locationRepository->create($data);
    }

    public function get(Location $location): Location
    {
        return $location;
    }

    public function update(Location $location, array $data): Location
    {
        return $this->locationRepository->update($data, $location->id);
    }

    public function destroy(Location $location): void
    {
        $location = $this->locationRepository->delete($location->id);
        if (empty($location)) throw new \Exception('Location not found');
    }
}
