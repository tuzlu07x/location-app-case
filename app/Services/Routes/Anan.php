    
<?php


use App\Helpers\DistanceCalculator;
use App\Models\Location;
use Illuminate\Support\Collection;
use App\Traits\RouteTrait;


class Anan
{
    use RouteTrait;

    public function __construct(protected Collection $locations) {}

    public function getOptimizedRoute(): array
    {
        return $this->findOptimalPath();
    }

    private function findOptimalPath(): array
    {
        $startLocation = $this->getStartAndEndLocation()['startLocation'];
        $endLocation = $this->getStartAndEndLocation()['endLocation'];

        return [
            'path' => $this->aStarAlgorithm($startLocation, $endLocation),
            'distance' => DistanceCalculator::calculateTotalPathDistance(collect($this->aStarAlgorithm($startLocation, $endLocation)))
        ];
    }

    private function getNearbyLocations(): Collection
    {
        return Location::select('name', 'latitude', 'longitude')->get();
    }

    private function mergeStartAndEndLocation(): Collection
    {
        return collect([$this->getStartAndEndLocation()['startLocation']])
            ->merge($this->getNearbyLocations()->map(fn($location) => [
                'lat' => (float)$location->latitude,
                'lon' => (float)$location->longitude,
                'name' => $location->name
            ]))
            ->push($this->getStartAndEndLocation()['endLocation']);
    }

    private function getNeighbors(Collection $locations, array $current): Collection
    {
        return $locations->filter(fn($location) => DistanceCalculator::calculate(
            $current['lat'],
            $current['lon'],
            $location['lat'],
            $location['lon']
        ) <= 150000);
    }

    private function aStarAlgorithm(array $start, array $end): array
    {
        $openSet = collect([$start]);
        $cameFrom = [];
        $gScore = $this->mergeStartAndEndLocation()->mapWithKeys(fn($loc) => [$loc['name'] => INF])->toArray();
        $gScore[$start['name']] = 0;
        $fScore = $this->mergeStartAndEndLocation()->mapWithKeys(fn($loc) => [$loc['name'] => INF])->toArray();
        $fScore[$start['name']] = DistanceCalculator::calculate($start['lat'], $start['lon'], $end['lat'], $end['lon']);

        while ($openSet->isNotEmpty()) {
            $current = $openSet->sortBy(fn($loc) => $fScore[$loc['name']])->first();
            if ($current['name'] === $end['name']) return $this->reconstructPath($cameFrom, $current);
            $openSet = $openSet->reject(fn($loc) => $loc['name'] === $current['name']);
            $neighbors = $this->getNeighbors($this->mergeStartAndEndLocation(), $current);

            foreach ($neighbors as $neighbor) {
                $tentativeGScore = $gScore[$current['name']] + DistanceCalculator::calculate(
                    $current['lat'],
                    $current['lon'],
                    $neighbor['lat'],
                    $neighbor['lon']
                );

                if ($tentativeGScore < $gScore[$neighbor['name']]) {
                    $cameFrom[$neighbor['name']] = $current;
                    $gScore[$neighbor['name']] = $tentativeGScore;
                    $fScore[$neighbor['name']] = $tentativeGScore + DistanceCalculator::calculate(
                        $neighbor['lat'],
                        $neighbor['lon'],
                        $end['lat'],
                        $end['lon']
                    );

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
}
