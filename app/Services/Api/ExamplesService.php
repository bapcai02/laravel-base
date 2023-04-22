<?php

namespace App\Services\Api;

use App\Services\Contracts\ExamplesServiceInterface;
use App\Repositories\Contracts\ExampleRepository;

class ExamplesService implements ExamplesServiceInterface
{
    /**
     * Parameter
     *
     * @var ExampleRepository
     */
    protected $repository;

    /**
     * ExamplesService constructor.
     *
     * @param ExampleRepository $repository
     */
    public function __construct(ExampleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index($request)
    {
        $relationship = [];
        $orderBy = ['id' => "ASC"];
        $limit = $request->get('limit', 10);
        $search = $request->get('query', '');
        $offset = 0;
        $pageSize = 20;


        // Get the first record
        $data = $this->repository->firstByWhere(['id' => 1], $relationship);

        return $data['data'];
    }

    public function store($request)
    {
        $value = [];
        $value['name'] = $request->name;
        $data = $this->repository->store($value);
        return $data;
    }
}
