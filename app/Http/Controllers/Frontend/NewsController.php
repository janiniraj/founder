<?php namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Backend\News\NewsRepository;
use View;

/**
 * Class NewsController.
 */
class NewsController extends Controller
{
    /**
     * PageController constructor.
     *
     * @param NewsRepository $newsRepository
     */
    public function __construct(NewsRepository $newsRepository)
    {
        $this->news = $newsRepository;
    }

    /**
     * Show News
     *
     * @param $slug
     * @return $this
     */
    public function show($slug)
    {
        $newsData       = $this->news->getNewsBySlug($slug);
        $content        = $newsData->content;

        $latestNews  = $this->news->getLatestNews($slug, 3);

        return view('frontend.news')->with([
            'newsData'      => $newsData,
            'content'       => $content,
            'latestNews'    => $latestNews
        ]);
    }
}
