<?php

/**
 * @author Kevin Surya Wahyudi <kevinsuryaw@gmail.com>
 *
 * Copyright © 2018 | All rights reserved.
 */

namespace App\Domains\Core;

use App\Helpers\GUID;
use Illuminate\Database\Eloquent\Model;
use App\Domains\Core\Exceptions\FailedArgumentException;

abstract class Repository implements RepositoryInterface {

    /**
     * @var \Illuminate\Database\Eloquent\Model;
     */
    protected $model = null;

    /**
     * @var $guid
     *
     * Change true if the primary key is using guid
     * Change false if the primary key is auto increment
     */
    private $guid = true;

    /**
     * Constructor function of Repository
     *
     * @param \Illuminate\Database\Eloquent\Model
     *
     * @return void
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setModel(Model $model)
    {
        $this->model = $model;
    }

    public function setNewModel()
    {
        $this->model = $this->newModel();
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

    public function getAllSortBy(string $column, string $type = 'asc', array $columns = ['*'])
    {
        return $this->model->orderBy($column, $type)->get($columns);
    }

    public function getById($id, array $columns = ['*'])
    {
        return $this->model->find($id, $columns);
    }

    public function getAllWhere(array $conditions, array $columns = ['*'])
    {
        if (count($conditions) != 3) {
            throw new FailedArgumentException("Invalid conditions argument value");
        }
        return $this->model->where($conditions[0], $conditions[1], $conditions[2])->get($columns);
    }

    public function getOneWhere(array $conditions, array $columns = ['*'])
    {
        if (count($conditions) != 3) {
            throw new FailedArgumentException("Invalid conditions argument value");
        }
        return $this->model->where($conditions[0], $conditions[1], $conditions[2])->first($columns);
    }

    public function getAllWith(string $relations, array $columns = ['*'])
    {
        return $this->model->with($relations)->get($columns);
    }

    public function getAllWithSortBy(string $relations, string $column, string $type = 'asc', array $columns = ['*'])
    {
        return $this->model->with($relations)->orderBy($column, $type)->get($columns);
    }

    public function getByIdWith($id, string $relations, array $columns = ['*'])
    {
        return $this->model->with($relations)->find($id, $columns);
    }

    public function getAllWithWhere(string $relations, array $conditions, array $columns = ['*'])
    {
        if (count($conditions) != 3) {
            throw new FailedArgumentException("Invalid conditions argument value");
        }
        return $this->model->with($relations)->where($conditions[0], $conditions[1], $conditions[2])->get($columns);
    }

    public function getOneWithWhere(string $relations, array $conditions, array $columns = ['*'])
    {
        if (count($conditions) != 3) {
            throw new FailedArgumentException("Invalid conditions argument value");
        }
        return $this->model->with($relations)->where($conditions[0], $conditions[1], $conditions[2])->first($columns);
    }

    public function has(string $value)
    {
        return $this->model->has($value);
    }

    public function paginate($limit = null, array $columns = ['*'])
    {
        return $this->model->paginate($limit, $columns);
    }

    public function paginateWhere(array $conditions, int $limit = null, array $columns = ['*'])
    {
        if (count($conditions) != 3) {
            throw new FailedArgumentException("Invalid conditions argument value");
        }
        return $this->model->where($conditions[0], $conditions[1], $conditions[2])->paginate($limit, $columns);
    }

    public function paginateSortBy(string $column, string $type = 'asc', int $limit = null, array $columns = ['*'])
    {
        return $this->model->orderBy($column, $type)->paginate($limit, $columns);
    }

    public function simplePaginate($limit = null, array $columns = ['*'])
    {
        return $this->model->simplePaginate($limit, $columns);
    }

    public function simplePaginateWhere(array $conditions, int $limit = null, array $columns = ['*'])
    {
        if (count($conditions) != 3) {
            throw new FailedArgumentException("Invalid conditions argument value");
        }
        return $this->model->where($conditions[0], $conditions[1], $conditions[2])->simplePaginate($limit, $columns);
    }

    public function simplePaginateSortBy(string $column, string $type = 'asc', int $limit = null, array $columns = ['*'])
    {
        return $this->model->orderBy($column, $type)->simplePaginate($limit, $columns);
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

    public function updateWhere(array $conditions, array $data)
    {
        if (count($conditions) != 3) {
            throw new FailedArgumentException("Invalid conditions argument value");
        }
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

    public function deleteWhere(array $conditions)
    {
        if (count($conditions) != 3) {
            throw new FailedArgumentException("Invalid conditions argument value");
        }
        $model = $this->model->where($conditions[0], $conditions[1], $conditions[2]);
        if ($model) {
            $model->delete();
            return true;
        }
        return false;
    }

}
