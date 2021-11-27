<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

interface BaseRepositoryInterface
{
    /**
     * Get model by id
     *
     * @param int $id
     * @return Model
     */
    public function find($id);

    /**
     * Get model by field
     *
     * @param string $field
     * @param string $value
     * @return Model
     */
    public function findBy($field, $value);

    /**
     * Get all models by field
     *
     * @param string $field
     * @param string $value
     * @return Collection
     */
    public function findAllBy($field, $value);

    /**
     * Get model by field (like)
     *
     * @param string $field
     * @param string $value
     * @return Model
     */
    public function search($field, $value);

    /**
     * Get all models by field (like)
     *
     * @param string $field
     * @param string $value
     * @return Collection
     */
    public function searchAll($field, $value);

    /**
     * Get all models by field (paginated)
     *
     * @param string $field
     * @param string $value
     * @param int $perPage
     * @return Collection
     */
    public function searchAllPaginated($field, $value, $perPage);

    /**
     * Check value of model's field
     *
     * @param int $id
     * @param string $field
     * @param string $value
     * @return Model
     */
    public function check($id, $field, $value);

    /**
     * Get all models
     *
     * @return Collection
     */
    public function all();

    /**
     * Get all models (latest first)
     *
     * @return Collection
     */
    public function latest();

    /**
     * Get all models (paginated)
     *
     * @param int $perPage
     * @return Collection
     */
    public function paginated($perPage);

    /**
     * Create new model
     *
     * @param array $data
     * @return Model
     */
    public function create($data);

    /**
     * Update model
     *
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update($id, $data);

    /**
     * Delete model
     *
     * @param int $id
     * @return bool
     */
    public function delete($id);

    /**
     * Get the validation rules of model
     *
     * @return array
     */
    public function rules();
}
