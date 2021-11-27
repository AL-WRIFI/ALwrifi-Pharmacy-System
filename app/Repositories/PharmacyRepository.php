<?php

namespace App\Repositories;

use App\Models\Pharmacy;
use App\Repositories\BaseRepository;
use App\Repositories\Contracts\PharmacyRepositoryInterface;

class PharmacyRepository extends BaseRepository implements PharmacyRepositoryInterface
{
    /**
     * @var Model $model
     */
    protected $model;

    /**
     * PharmacyRepository Constructor
     *
     * @param Model $model
     */
    public function __construct(Pharmacy $model)
    {
        $this->model = $model;
    }

    /**
     * Attach model/s to this model.
     * 
     * @param int $modelId
     * @param string $relation
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function attach($modelId, $relation, $id, $data)
    {
        return $this->model->find($modelId)
            ->$relation()->attach([
                $id => $data
            ]
        );
    }

    /**
     * Dettach model/s from this model.
     * 
     * @param int $modelId
     * @param string $relation
     * @param int $id
     * @return bool
     */
    public function detach($modelId, $relation, $id)
    {
        return $this->model->find($modelId)
            ->$relation()->detach($id);
    }
}