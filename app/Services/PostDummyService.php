<?php

namespace App\Services;

use App\Repository\PostDummy\PostDummyRepository;
use App\Repository\PostDummy\PostDummyRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;


class PostDummyService
{
    public function __construct(private PostDummyRepositoryInterface $postRepository)
    {}

    public function getContentWithPagination(Request $request): LengthAwarePaginator
    {
        $page = $request->page;
        if($page == null){
            $page = 1;
        }
        $data = $this->postRepository->index($page);

        return new LengthAwarePaginator($data['posts'], $data['total'], PostDummyRepository::LIMIT, $page, ['path' => url('')]);
    }

    public function getContent(int $id)
    {
        return $this->postRepository->show($id);
    }

    public function updateContent(int $id, array $data)
    {
        return $this->postRepository->update($id, $data);
    }
}
