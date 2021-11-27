<?php

namespace App\Repositories\Contracts;

use App\Repositories\Contracts\BaseRepositoryInterface;

interface PharmacyRepositoryInterface extends BaseRepositoryInterface {
    /**
     * Attach model/s to this model.
     * 
     * @param int $modelId
     * @param string $relation
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function attach($modelId, $relation, $id, $data);

    /**
     * Dettach model/s from this model.
     * 
     * @param int $modelId
     * @param string $relation
     * @param int $id
     * @return bool
     */
    public function detach($modelId, $relation, $id);
}