<?php

namespace App\Services;

use App\Models\Location;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface LocationServiceImpl
{
    public function list(int $limit): LengthAwarePaginator;
    public function create(array $data): Location;
    public function get(Location $location): Location;
    public function update(Location $location, array $data): Location;
    public function destroy(Location $location): void;
}
