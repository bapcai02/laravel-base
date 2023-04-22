<?php

namespace App\Repositories\Contracts;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ExampleRepository.
 *
 * @package namespace App\Repositories\Contracts;
 */
interface ExampleRepository extends RepositoryInterface
{
    public function store($values);

    public function firstByWhere($where, $relationship = [], $columns = "*");

    public function getByFilters($filters = [], $relationship = [], $limit = 10, $offset = 0, $orderBy = []);

    public function getAllByFilters($filters = [], $relationship = [], $orderBy = []);

    public function firstByFilters($filters = [], $relationship = [], $orderBy = []);
}
