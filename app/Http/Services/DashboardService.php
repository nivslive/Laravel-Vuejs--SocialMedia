<?php

namespace App\Http\Services;
use App\Http\Repositories\DashboardRepository;
class DashboardService extends Service {

    private DashboardRepository $repository;

    public function __construct() {
        $this->repository = new DashboardRepository;
    }

    public function collectAndsplice($collection, $limit = 5) {
        $collection = collect($collection->toArray());
        return $collection->sortByDesc('subjectsMessages')->splice(0, $limit);
    }

    public function all($limit = 5) {
        return $this->repository->all();
    }
}
