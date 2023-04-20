<?php

namespace App\Repositories\Traits;

trait RepositoryTraits
{
    /**
     * Function initQuery
     *
     * @param $model
     * @param $filters
     * @return mixed
     */
    abstract public function initQuery($model, $filters);

    /**
     * Function firstByWhere
     *
     * @param $where
     * @param array $relationship
     * @param string $columns
     * @return \Illuminate\Database\Eloquent\Model |null
     */
    public function firstByWhere($where, $relationship = [], $columns = "*")
    {
        $this->applyCriteria();
        $this->applyScope();
        $this->applyConditions($where);

        $model = $this->model;

        $model = $this->buildRelationShip($model, $relationship);
        $model = $model->first($columns);
        $this->resetModel();

        if ($model) {
            return $this->parserResult($model);
        }

        return null;
    }


    /**
     * Function firstById
     *
     * @param $id
     * @param array $relationship
     * @return \Illuminate\Database\Eloquent\Model |null
     */
    public function firstById($id, $relationship = [])
    {
        $this->applyCriteria();
        $this->applyScope();

        $model = $this->model;

        $model = $this->buildRelationShip($model, $relationship);
        $model = $model->find($id);

        $this->resetModel();

        if ($model) {
            return $this->parserResult($model);
        }

        return null;
    }

    /**
     * Function multiDelete
     *
     * @param $ids
     * @param $relationship
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Support\Collection|mixed|null
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function multiDelete($ids, $relationship = [])
    {
        $this->applyCriteria();
        $this->applyScope();

        $model = $this->model;

        $model = $this->buildRelationShip($model, $relationship);
        $model = $model->whereIn('id', $ids)->delete();

        $this->resetModel();

        if ($model) {
            return $this->parserResult($model);
        }

        return null;
    }

    /*
     * Private
     */
    /**
     * Function buildOrderBy
     *
     * @param $model
     * @param array $orderBy
     * @return \Illuminate\Database\Eloquent\Model
     */
    private function buildOrderBy($model, $orderBy = [])
    {
        if (!empty($orderBy)) {
            foreach ($orderBy as $column => $direction) {
                $model = $model->orderBy($column, $direction);
            }
        }

        return $model;
    }

    /**
     * Function buildLimit
     *
     * @param $model
     * @param int $limit
     * @param int $offset
     * @return \Illuminate\Database\Eloquent\Model
     */
    private function buildLimit($model, $limit = 10, $offset = 0)
    {
        return $model->limit($limit)->offset($offset);
    }

    /**
     * Function buildRelationShip
     *
     * @param $model
     * @param array $relationship
     * @return \Illuminate\Database\Eloquent\Model
     */
    private function buildRelationShip($model, $relationship = [])
    {
        if (!empty($relationship)) {
            $model = $model->with($relationship);
        }

        return $model;
    }

    /**
     * Function isValidKey
     *
     * @param $array
     * @param $key
     * @return bool
     */
    private function isValidKey($array, $key)
    {
        return array_key_exists($key, $array) && !is_null($array[$key]);
    }
}
