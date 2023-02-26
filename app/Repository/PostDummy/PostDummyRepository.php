<?php

namespace App\Repository\PostDummy;

use App\Request\ApiRequest;

class PostDummyRepository implements PostDummyRepositoryInterface
{
    const LIMIT = 30;

    public function __construct(private ApiRequest $request)
    {}

    public function index(int $page): mixed
    {
        return $this->request->request('/posts?limit=' . self::LIMIT . '&skip=' . ($page-1) * 30);
    }

    public function show(int $id)
    {
        return $this->request->request('/posts/' . $id);
    }

    public function update(int $id, array $data)
    {
        return $this->request->update('/posts/' . $id, $data);
    }
}
