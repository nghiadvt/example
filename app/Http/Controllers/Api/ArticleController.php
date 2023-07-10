<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Services\ArticleService;

class ArticleController extends Controller
{
    protected $articleService;

    public function __construct(ArticleService $articleService){
        return $this->articleService=$articleService;
    }

    /**
     * Get articles.
     * @param Request $request The request object.
     * @return mixed The response.
    */
    public function index(Request $request)
    {
        return $this->articleService->get($request->all());
    }

    /**
     * Store a new article.
     *
     * @param Request $request The request object.
     * @return mixed The response.
     */
    public function store(Request $request)
    {
        return $this->articleService->store($request->only('title', 'content', 'status'));
    }

    /**
     * Show an article.
     *
     * @param Article $article The article object.
     * @return void
     */
    public function show(Article $article)
    {
        return $this->articleService->show($article);
    }

    /**
     * Update an article.
     *
     * @param Request $request The request object.
     * @param int $id The ID of the article.
     * @return void
     */
    public function update(Request $request, $id)
    {
        return $this->articleService->update($request->only('title', 'content', 'status'),$id);
    }

    /**
     * Delete an article.
     *
     * @param int $id The ID of the article.
     * @return void
     */
    public function destroy($id)
    {
        return $this->articleService->delete($id);
    }
}
