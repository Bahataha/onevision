<?php

namespace App\Repository\PostDummy;

interface PostDummyRepositoryInterface
{
    public function index(int $page);

    public function show(int $id);

    public function update(int $id, array $data);
}
