<?php

namespace App\Traits;

use App\Models\Location;
use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;

trait RouteTrait
{
    protected float $startLatitude;
    protected float $startLongitude;
    protected float $endLatitude;
    protected float $endLongitude;
    private LazyCollection $locations;

    public function setStartCoordinates(float $latitude, float $longitude): void
    {
        $this->startLatitude = $latitude;
        $this->startLongitude = $longitude;
    }

    public function setEndCoordinates(float $latitude, float $longitude): void
    {
        $this->endLatitude = $latitude;
        $this->endLongitude = $longitude;
    }

    protected function getNearbyLocations(): Collection
    {
        return Location::select('name', 'latitude', 'longitude')->get();
    }

    public function setLocations(LazyCollection $locations): void
    {
        $this->locations = $locations;
    }

    protected function getStartAndEndLocation(): Collection
    {
        return collect([
            'startLocation' => ['lat' => $this->startLatitude, 'lon' => $this->startLongitude, 'name' => 'Start'],
            'endLocation' => ['lat' => $this->endLatitude, 'lon' => $this->endLongitude, 'name' => 'End']
        ]);
    }
}
