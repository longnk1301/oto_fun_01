<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Repositories\Eloquents\SearchingRepository;

class PostsController extends Controller
{
    protected $searchRepository;

    public function __construct(SearchingRepository $searchRepository)
    {
        $this->searchRepository = $searchRepository;
    }

    public function searchPost(Request $request)
    {
        $data = $request->all();
        $posts = $this->searchRepository->searchPost($data);

        return view('search.search_posts', compact('posts', 'request'));
    }
}
