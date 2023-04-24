<?php

namespace Gkalmoukis\Repositories;

use Illuminate\Support\Facades\DB; 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

abstract class BaseEloquentRepository
{
    protected $db;

    public function __construct(
        protected Model $model
    ) {
        $this->db = new DB();
    }


    public function all(array $relations = []) 
    {
        return $this->model
            ->with($relations)
            ->get();
    }

    public function allPaginated(array $relations = []) : LengthAwarePaginator 
    {
        return $this->model
            ->with($relations)
            ->paginate();
    }

    public function store(array $attributes)
    {
        return $this->model
            ->create($attributes);
    }

    public function modify($id, array $attributes)
    {
        return $this->model
            ->findOrFail($id)
            ->update($attributes);
    }

    public function delete($id)
    {
        return $this->model
            ->findOrFail($id)
            ->delete();
    }

    public function byId($id, $relations = [])
    {
        return $this->model
            ->with($relations)
            ->findOrFail($id);
    }
}