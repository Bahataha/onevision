<?php

namespace App\Http\Controllers;

use App\Services\PostDummyService;
use App\Services\PostService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct(private PostDummyService $service, private PostService $postService)
    {}

    public function index(Request $request): Factory|View|Application
    {
        return view('posts.index', ['posts' => $this->service->getContentWithPagination($request)]);
    }

    public function edit(int $id): Factory|View|Application
    {
        return view('posts.form', [
            'post' => $this->service->getContent($id),
            'author' => $this->postService->getAuthor($id)
        ]);
    }

    public function update(Request $request, int $id)
    {
        if(is_null($this->postService->getAuthor($id))) {
            $this->postService->create($id);
        }
        $this->service->updateContent($id, $request->only('title', 'body'));

        return view('posts.show', [
            'post' => $this->service->getContent($id),
            'author' => $this->postService->getAuthor($id)
        ])->with(['success' => 'Success']);
    }

    public function show(int $id): Factory|View|Application
    {
        return view('posts.show', [
            'post' => $this->service->getContent($id),
            'author' => $this->postService->getAuthor($id)
        ]);
    }
}
