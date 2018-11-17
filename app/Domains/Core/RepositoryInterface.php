<?php

namespace App\Domains\Core;

use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface {

    /**
     * Function new model to create new instance of model
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function newModel();

    /**
     * Function get model
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getModel();

    /**
     * Function set model to change current model instance with other instance
     *
     * @param \Illuminate\Database\Eloquent\Model
     * @return void
     */
    public function setModel(Model $model);

    /**
     * Function set new model to change current model instance with spesific instance from newMode() function
     *
     * @return void
     */
    public function setNewModel();

    /**
     * Function count to count of records data from database
     *
     * @return int count of records data
     */
    public function count();

    /**
     * Function get last inserted to get last inserted data
     *
     * @param array $columns to retrieve spesific column with the objects
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getLastInserted(array $columns = ['*']);

    /**
     * Function get all of records data from database
     *
     * @param array $columns to retrieve spesific column with the objects
     *
     * @return mixed collections from \Illuminate\Database\Eloquent\Model
     */
    public function getAll(array $columns = ['*']);

    /**
     * Function get all of records data from database with spesific sort value
     *
     * @param string $column to sorting by spesific column
     * @param string $type sorting in ascending or descending, the default value is ascending
     * @param array $columns to retrieve spesific column with the objects
     *
     * @return mixed collections from \Illuminate\Database\Eloquent\Model
     */
    public function getAllSortBy(string $column, string $type = 'asc', array $columns = ['*']);

    /**
     * Function get record data by id from database
     *
     * @param $id primary key
     * @param array $columns to retrieve spesific column with the objects
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getById($id, array $columns = ['*']);

    /**
     * Function get all of records data from database with spesific conditions
     *
     * @param array $conditions conditions value, must be 3 data in the array. Ex. ['category_id', '=', '1'] ['name', 'like', '%S%']
     * @param array $columns to retrieve spesific column with the objects
     *
     * @return mixed collections from \Illuminate\Database\Eloquent\Model
     */
    public function getAllBy(array $conditions, array $columns = ['*']);

    /**
     * Function get one record data from database with spesific conditions
     *
     * @param array $conditions conditions value, must be 3 data in the array. Ex. ['category_id', '=', '1'] ['name', 'like', '%S%']
     * @param array $columns to retrieve spesific column with the objects
     *
     * @return mixed collections from \Illuminate\Database\Eloquent\Model
     */
    public function getOneBy(array $conditions, array $columns = ['*']);

    /**
     * Function get all of records data from database with the relationship
     *
     * @param string $relations relations name
     * @param array $columns to retrieve spesific column with the objects
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getAllWith(string $relations, array $columns = ['*']);

    /**
     * Function get all of records data from database with spesific sort value and the relationship
     *
     * @param string $relations relations name
     * @param string $column to sorting by spesific column
     * @param string $type sorting in ascending or descending, the default value is ascending
     * @param array $columns to retrieve spesific column with the objects
     *
     * @return mixed collections from \Illuminate\Database\Eloquent\Model
     */
    public function getAllWithSortBy(string $relations, string $column, $type = 'asc', array $columns = ['*']);

    /**
     * Function get record data by id from database with the relationship
     *
     * @param $id primary key
     * @param string $relations relations name
     * @param array $columns to retrieve spesific column with the objects
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getByIdWith($id, string $relations, array $columns = ['*']);

    /**
     * Function get all of records data from database with spesific conditions and the relationship
     *
     * @param string $relations relations name
     * @param array $conditions conditions value, must be 3 data in the array. Ex. ['category_id', '=', '1'] ['name', 'like', '%S%']
     * @param array $columns to retrieve spesific column with the objects
     *
     * @return mixed collections from \Illuminate\Database\Eloquent\Model
     */
    public function getAllWithBy(string $relations, array $conditions, array $columns = ['*']);

    /**
     * Function get one record data from database with spesific conditions and the relationship
     *
     * @param string $relations relations name
     * @param array $conditions conditions value, must be 3 data in the array. Ex. ['category_id', '=', '1'] ['name', 'like', '%S%']
     * @param array $columns to retrieve spesific column with the objects
     *
     * @return mixed collections from \Illuminate\Database\Eloquent\Model
     */
    public function getOneWithBy(string $relations, array $conditions, array $columns = ['*']);

    /**
     * Function to check the eloquent model has the relations
     *
     * @param string $relations relations name
     *
     * @return void
     */
    public function has(string $relations);

    /**
     * Function to paginate data with paginate() function from eloquent model
     *
     * @param int $limit of results to return per page
     * @param array $columns to retrieve spesific column with the objects
     *
     * @return mixed collections from \Illuminate\Database\Eloquent\Model
     */
    public function paginate(int $limit = null, array $columns = ['*']);

    /**
     * Function to paginate data with simplePaginate() function from eloquent model
     *
     * @param int $limit of results to return per page
     * @param array $columns to retrieve spesific column with the objects
     *
     * @return mixed collections from \Illuminate\Database\Eloquent\Model
     */
    public function simplePaginate(int $limit = null, array $columns = ['*']);

    /**
     * Function to insert new data to database
     *
     * @param array $data array contains data that will be inserted
     *
     * @return \Illuminate\Database\Eloquent\Model new inserted data
     */
    public function insert(array $data);

    /**
     * Function to fill the data from \Illuminate\Database\Eloquent\Model object would be inserted or updated
     *
     * @param array $data array contains data that will be inserted or updated
     * @param \Illuminate\Database\Eloquent\Model $model current model that would be inserted or updated
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function fill(array $data, Model $model);

    /**
     * Function to update data by id
     *
     * @param $id primary key
     * @param array $data array contains data that will be updated
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update($id, array $data);

    /**
     * Function to update all data with spesific conditions
     *
     * @param array $conditions conditions value, must be 3 data in the array. Ex. ['category_id', '=', '1'] ['name', 'like', '%S%']
     * @param array $data array contains data that will be updated
     *
     * @return mixed collections from \Illuminate\Database\Eloquent\Model
     */
    public function updateBy(array $conditions, array $data);

    /**
     * Function to delete data by id
     *
     * @param $id primary key
     *
     * @return boolean
     */
    public function delete($id);

    /**
     * Function to delete data with spesific conditions
     *
     * @param array $conditions conditions value, must be 3 data in the array. Ex. ['category_id', '=', '1'] ['name', 'like', '%S%']
     *
     * @return boolean
     */
    public function deleteBy(array $conditions);

}
