<?php

namespace App\Domains\Core;

use App\Helpers\GUID;
use Illuminate\Database\Eloquent\Model;

abstract class Repository implements RepositoryInterface {

    protected $model = null;
    private $guid = true;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setModel()
    {
        $this->model = $this->model();
    }

    public function count()
    {
        return $this->model->count();
    }

    public function getLastInserted(array $columns = ['*'])
    {
        return $this->model->orderBy('created_at', 'asc')->first($columns);
    }

    public function getAll(array $columns = ['*'])
    {
        return $this->model->all($columns);
    }

    public function getAllSortBy($column, $type, array $columns = ['*'])
    {
        return $this->model->orderBy($column, $type)->get($columns);
    }

    public function getById($id, array $columns = ['*'])
    {
        return $this->model->find($id, $columns);
    }

    public function getAllBy(array $conditions, array $columns = ['*'])
    {
        return $this->model->where($conditions[0], $conditions[1], $conditions[2])->get($columns);
    }

    public function getOneBy(array $conditions, array $columns = ['*'])
    {
        return $this->model->where($conditions[0], $conditions[1], $conditions[2])->first($columns);
    }

    public function getAllWith($relations, array $columns = ['*'])
    {
        return $this->model->with($relations)->get($columns);
    }

    public function getAllWithSortBy($relations, $column, $type, array $columns = ['*'])
    {
        return $this->model->with($relations)->orderBy($column, $type)->get($columns);
    }

    public function getByIdWith($id, $relations, array $columns = ['*'])
    {
        return $this->model->with($relations)->find($id, $columns);
    }

    public function getAllWithBy($relations, array $conditions, array $columns = ['*'])
    {
        return $this->model->with($relations)->where($conditions[0], $conditions[1], $conditions[2])->get($columns);
    }

    public function getOneWithBy($relations, array $conditions, array $columns = ['*'])
    {
        return $this->model->with($relations)->where($conditions[0], $conditions[1], $conditions[2])->first($columns);
    }

    public function paginate($limit = 1, array $columns = ['*'])
    {
        return $this->model->paginate(1, $columns);
    }

    public function simplePaginate($limit = 1, array $columns = ['*'])
    {
        return $this->model->simplePaginate(1, $columns);
    }

    public function insert(array $data)
    {
        $model = $this->newModel();
        if ($this->guid) {
            $model->id = GUID::generate();
        }
        $model = $this->fill($data, $model);
        $model->save();
        return $model;
    }

    public function update($id, array $data)
    {
        $model = $this->model->find($id);
        if ($model) {
            $model = $this->fill($data, $model);
            $model->save();
            return $model;
        }
        return null;
    }

    public function updateBy(array $conditions, array $data)
    {
        $model = $this->model->where($conditions[0], $conditions[1], $conditions[2])->get();
        foreach ($model as $m) {
            $m = $this->fill($data, $m);
            $m->save();
        }
        return $model;
    }

    public function delete($id)
    {
        $model = $this->model->find($id);
        if ($model) {
            $model->delete();
            return true;
        }
        return false;
    }

    public function deleteBy(array $conditions)
    {
        $model = $this->model->where($conditions[0], $conditions[1], $conditions[2]);
        if ($model) {
            $model->delete();
            return true;
        }
        return false;
    }

}
