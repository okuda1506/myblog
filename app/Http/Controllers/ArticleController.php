<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Services\MicroCmsService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class ArticleController extends Controller
{
    private MicroCmsService $microCms;

    public function __construct(MicroCmsService $microCms)
    {
        $this->microCms = $microCms;
    }

    /**
     * 記事一覧を取得
     * @return View
     */
    public function list()
    {
        $categories = $this->microCms->getContents('categories');
        $tags = $this->microCms->getContents('tags');
        $articles = $this->microCms->getContents('articles');

        // 各カテゴリの記事を取得(動いたらHelperへ移す)
        // 下記メソッドはlist()では不要（カテゴリ別でページ作成した際は使えそう）
        //        $code_articles = $this->microCms->getArticlesByCategory($articles, "CODE");
        //        $tech_articles = $this->microCms->getArticlesByCategory($articles, "TECH");
        //        $life_articles = $this->microCms->getArticlesByCategory($articles, "LIFE");
        //        $cafe_articles = $this->microCms->getArticlesByCategory($articles, "CAFE");

//        dump($categories);
//        exit;

        return view('articles.list', [
            'categories' => $categories,
            'tags' => $tags,
            'articles' => $articles,
        ]);

    }

    /**
     * カテゴリ別記事一覧を取得
     * @return View
     */
    public function listByCategory(string $categoryName, string $tag)
    {
        $categories = $this->microCms->getContents('categories');
        $tags = $this->microCms->getContents('tags');
        $articles = $this->microCms->getContents('articles');
        $articlesByCategory = $this->microCms->getArticlesByCategory($articles, $categoryName, $tag);

//        dump($articlesByCategory);
//        exit;

        return view('articles.list_category', [
            'categories' => $categories,
            'categoryName' => $categoryName,
            'tags' => $tags,
            'articles' => $articlesByCategory,
        ]);

    }

    /**
     * 記事詳細を取得
     * @param Request $request
     * @param string $id
     * @return View
     */
    public function detail(Request $request, string $id)
    {
        $article = $this->microCms->getSingleContent('articles', $id);

        return view('articles.detail', [
            'article' => $article,
//            'request' => $request,
            'update_date' => date('Y/m/d',  strtotime($article->updatedAt)),
        ]);
    }

//    public function getArticleHelper($articles)
//    {
//
//    }
}
