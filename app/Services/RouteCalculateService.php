<?php

namespace App\Services;

use App\Helpers\DistanceCalculator;
use App\Models\Location;
use App\Traits\RouteTrait;
use Illuminate\Support\Collection;

class RouteCalculateService
{
    use RouteTrait;

    private function getNeighbors(Collection $locations, array $current): Collection
    {
        return $locations->filter(function ($location) use ($current) {
            $distance = DistanceCalculator::calculate(
                $current['lat'],
                $current['lon'],
                $location['lat'],
                $location['lon']
            );
            return $distance <= 150000;
        });
    }

    private function gScore(): array
    {
        $gScore = $this->mergeStartAndEndLocation()->mapWithKeys(fn($loc) => [$loc['name'] => INF])->toArray();
        return $gScore;
    }

    private function fStore(): array
    {
        $fScore = $this->mergeStartAndEndLocation()->mapWithKeys(fn($loc) => [$loc['name'] => INF])->toArray();
        return $fScore;
    }

    private function aStarAlgorithm(): array
    {
        $start = $this->getStartAndEndLocation()['startLocation'];
        $end = $this->getStartAndEndLocation()['endLocation'];
        $openSet = collect([$start]);
        $cameFrom = [];

        $gScore = $this->gScore();
        $gScore[$start['name']] = 0;
        $fScore = $this->fStore();
        $fScore[$start['name']] = DistanceCalculator::calculate($start['lat'], $start['lon'], $end['lat'], $end['lon']);

        while ($openSet->isNotEmpty()) {
            $current = $openSet->sortBy(fn($loc) => $fScore[$loc['name']])->first();

            if ($current['name'] === $end['name']) return $this->reconstructPath($cameFrom, $current);

            $openSet = $openSet->reject(fn($loc) => $loc['name'] === $current['name']);

            $neighbors = $this->getNeighbors($this->mergeStartAndEndLocation(), $current);
            foreach ($neighbors as $neighbor) {
                $tentativeGScore = $gScore[$current['name']] + DistanceCalculator::calculate($current['lat'], $current['lon'], $neighbor['lat'], $neighbor['lon']);

                if ($tentativeGScore < $gScore[$neighbor['name']]) {
                    $cameFrom[$neighbor['name']] = $current;
                    $gScore[$neighbor['name']] = $tentativeGScore;
                    $fScore[$neighbor['name']] = $tentativeGScore + DistanceCalculator::calculate($neighbor['lat'], $neighbor['lon'], $end['lat'], $end['lon']);

                    if (!$openSet->contains(fn($loc) => $loc['name'] === $neighbor['name'])) {
                        $openSet->push($neighbor);
                    }
                }
            }
        }

        return [];
    }

    private function reconstructPath(array $cameFrom, array $current): array
    {
        $path = [$current];
        while (isset($cameFrom[$current['name']])) {
            $current = $cameFrom[$current['name']];
            array_unshift($path, $current);
        }
        return $path;
    }

    public function findRoute(): array
    {
        return $this->findOptimalPath();
    }

    private function findOptimalPath(): array
    {
        $optimalPath = $this->aStarAlgorithm();

        return [
            'path' => $optimalPath,
            'distance' => DistanceCalculator::calculateTotalPathDistance(collect($optimalPath))
        ];
    }

    private function mergeStartAndEndLocation(): Collection
    {
        return collect([$this->getStartAndEndLocation()['startLocation']])
            ->merge($this->locations->map(fn($location) => [
                'lat' => (float)$location->latitude,
                'lon' => (float)$location->longitude,
                'name' => $location->name
            ]))
            ->push($this->getStartAndEndLocation()['endLocation']);
    }

    private function getStartAndEndLocation(): Collection
    {
        return collect([
            'startLocation' => ['lat' => $this->startLatitude, 'lon' => $this->startLongitude, 'name' => 'Start'],
            'endLocation' => ['lat' => $this->endLatitude, 'lon' => $this->endLongitude, 'name' => 'End']
        ]);
    }
}
