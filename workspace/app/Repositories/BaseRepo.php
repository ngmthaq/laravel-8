<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

abstract class BaseRepo implements BaseRepoInterface
{
    protected Model $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel(): string;

    public function setModel()
    {
        $this->model = app()->make($this->getModel());
    }

    public function getAll(array $relations = [], string $orderBy = 'id', string $orderDir = 'asc')
    {
        return $this->model->with($relations)->orderBy($orderBy, $orderDir)->get();
    }

    public function getAllWithPaginate(int $paginateNumber, array $relations = [], string $orderBy = 'id', string $orderDir = 'asc')
    {
        return $this->model->with($relations)->orderBy($orderBy, $orderDir)->paginate($paginateNumber)->withQueryString();
    }

    public function find(int $id, array $relations = [])
    {
        return $this->model->with($relations)->findOrFail($id);
    }

    public function findByWhere(array $where, array $relations = [], string $orderBy = 'id', string $order = 'asc')
    {
        return $this->model->with($relations)->where($where)->orderBy($orderBy, $order)->get();
    }

    public function findByWhereNotIn(string $condition, array $attributes, array $relations = [])
    {
        return $this->model->with($relations)->whereNotIn($condition, $attributes)->get();
    }

    public function findByWhereIn(string $condition, array $attributes, array $relations = [])
    {
        return $this->model->with($relations)->whereIn($condition, $attributes)->get();
    }

    public function findByWhereLike(array $where, array $relations = [])
    {
        $builder = $this->model->with($relations);
        foreach ($where as $condition) {
            $query = 'UPPER(' . $condition[0] . ') LIKE \'%' . Str::upper($condition[1]) . '%\'';
            $builder = $builder->whereRaw($query);
        }

        return $builder->get();
    }

    public function findByWhereBetween(string $condition, array $attributes, array $relations = [])
    {
        return $this->model->with($relations)->whereBetween($condition, $attributes)->get();
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function update(int $id, array $attributes)
    {
        $result = $this->model->findOrFail($id);
        $result->update($attributes);

        return $result;
    }

    public function delete(int $id)
    {
        $result = $this->model->findOrFail($id);

        return $result->delete();
    }
}
