<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Contracts\BaseRepositoryInterface;

class BaseRepository implements BaseRepositoryInterface
{
    /**
     * @var Model $model
     */
    protected $model;

    /**
     * BaseRepository Constructor
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get model by id
     *
     * @param int $id
     * @return Model
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * Get model by field
     *
     * @param string $field
     * @param string $value
     * @return Model
     */
    public function findBy($field, $value)
    {
        return $this->model->where($field, '=', $value)->first();
    }

    /**
     * Get all models by field
     *
     * @param string $field
     * @param string $value
     * @return Collection
     */
    public function findAllBy($field, $value)
    {
        return $this->model->where($field, '=', $value)->get();
    }

    /**
     * Get model by field (like)
     *
     * @param string $field
     * @param string $value
     * @return Model
     */
    public function search($field, $value)
    {
        return $this->model->where($field, 'like', '%'.$value.'%')->first();
    }

    /**
     * Get all models by field (like)
     *
     * @param string $field
     * @param string $value
     * @return Collection
     */
    public function searchAll($field, $value)
    {
        return $this->model->where($field, 'like', '%'.$value.'%')->get();
    }

    /**
     * Get all models by field (paginated)
     *
     * @param string $field
     * @param string $value
     * @param int $perPage
     * @return Collection
     */
    public function searchAllPaginated($field, $value, $perPage)
    {
        return $this->model->where($field, 'like', '%'.$value.'%')->paginate($perPage);
    }

    /**
     * Check value of model's field
     *
     * @param int $id
     * @param string $field
     * @param string $value
     * @return bool
     */
    public function check($id, $field, $value)
    {
        return (!empty($this->model->where('id', $id)
            ->where($field, $value)->first()))?
            true : false;
    }

    /**
     * Get all models
     *
     * @return Collection
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Get all models (latest first)
     *
     * @param int $limit
     * @return Collection
     */
    public function latest($limit = 8)
    {
        return $this->model->latest()->take($limit)->get();
    }

    /**
     * Get all models (paginated)
     *
     * @param int $perPage
     * @return Collection
     */
    public function paginated($perPage)
    {
        return $this->model->paginate($perPage);
    }

    /**
     * Create new model
     *
     * @param array $data
     * @return Model
     */
    public function create($data)
    {
        return $this->model->create($data);
    }

    /**
     * Update model
     *
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update($id, $data)
    {
        return $this->model->find($id)->update($data);
    }

    /**
     * Delete model
     *
     * @param int $id
     * @return bool
     */
    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }

    /**
     * Get the validation rules of model
     *
     * @return array
     */
    public function rules()
    {
        return $this->model->rules ?? [];
    }
}
