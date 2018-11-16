<?php

namespace App\Domains\Core;

use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface {

    public function newModel();
    public function getModel();
    public function setModel();
    public function count();
    public function getLastInserted(array $columns = ['*']);
    public function getAll(array $columns = ['*']);
    public function getAllSortBy($column, $type, array $columns = ['*']);
    public function getById($id, array $columns = ['*']);
    public function getAllBy(array $conditions, array $columns = ['*']);
    public function getOneBy(array $conditions, array $columns = ['*']);
    public function getAllWith($relations, array $columns = ['*']);
    public function getAllWithSortBy($relations, $column, $type, array $columns = ['*']);
    public function getByIdWith($id, $relations, array $columns = ['*']);
    public function getAllWithBy($relations, array $conditions, array $columns = ['*']);
    public function getOneWithBy($relations, array $conditions, array $columns = ['*']);
    public function paginate($limit = 1, array $columns = ['*']);
    public function simplePaginate($limit = 1, array $columns = ['*']);
    public function insert(array $data);
    public function fill(array $data, $model);
    public function update($id, array $data);
    public function updateBy(array $conditions, array $data);
    public function delete($id);
    public function deleteBy(array $conditions);

}
