<?php

namespace App\Helpers;

use Illuminate\Support\Collection;

class DistanceCalculator
{
    private const EARTH_RADIUS = 6371000;

    public static function calculate(float $lat1, float $lon1, float $lat2, float $lon2): float
    {
        $latFrom = deg2rad($lat1);
        $lonFrom = deg2rad($lon1);
        $latTo = deg2rad($lat2);
        $lonTo = deg2rad($lon2);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(
            pow(sin($latDelta / 2), 2) + cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)
        ));

        return $angle * self::EARTH_RADIUS;
    }

    public static function calculateTotalPathDistance(Collection $path): float
    {
        return $path->zip($path->slice(1))->reduce(function ($carry, $pair) {
            if (!isset($pair[0], $pair[1])) {
                return $carry;
            }
            return $carry + self::calculate(
                $pair[0]['lat'],
                $pair[0]['lon'],
                $pair[1]['lat'],
                $pair[1]['lon']
            );
        }, 0);
    }
}
