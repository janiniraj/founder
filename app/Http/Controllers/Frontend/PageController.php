<?php namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Backend\Page\PageRepository;
use View;
use App\Repositories\Backend\Blog\BlogRepository;

/**
 * Class PageController.
 */
class PageController extends Controller
{
    /**
     * PageController constructor.
     *
     * @param PageRepository $pageRepository
     * @param BlogRepository $blogRepository
     */
    public function __construct(PageRepository $pageRepository, BlogRepository $blogRepository)
    {
        $this->page = $pageRepository;
        $this->blog = $blogRepository;
    }

    /**
     * Home Page
     *
     * @return $this
     */
    public function index()
    {
        $pageData       = $this->page->getPageBySlug('home');
        $content        = $pageData->content;

        $headerView     = View::make('frontend.includes.header');
        $header         = (string) $headerView;
        $content        = str_replace("[[header]]", $header, $content);

        $footerView     = View::make('frontend.includes.footer');
        $footer         = (string) $footerView;
        $content        = str_replace("[[footer]]", $footer, $content);

        return view('frontend.index')->with(['content' => $content]);
    }

    /**
     * Show Page
     *
     * @param $slug
     * @return $this
     */
    public function showPage($slug)
    {
        $pageData       = $this->page->getPageBySlug($slug);
        $content        = $pageData->content;

        if(strpos('[[latestblogs]]', $content))
        {
            $blogs              = $this->blog->getLatestBlogs(null, 4);
            $blogView           = View::make('frontend.includes.latestblog')->with(['blogs' => $blogs]);
            $blogViewContent    = (string)$blogView;
            $content = str_replace("[[latestblogs]]", $blogViewContent, $content);

        }

        return view('frontend.page')->with([
            'pageData' => $pageData,
            'content' => $content
        ]);
    }
}
