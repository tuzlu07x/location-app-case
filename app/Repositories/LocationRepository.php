<?php

namespace App\Repositories;

use App\Models\Location;
use Prettus\Repository\Eloquent\BaseRepository;

class LocationRepository extends BaseRepository implements LocationRepositoryImpl
{
    public function model(): string
    {
        return Location::class;
    }
}
