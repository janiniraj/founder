<?php namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Backend\Blog\BlogRepository;
use View;

/**
 * Class BlogController.
 */
class BlogController extends Controller
{
    /**
     * PageController constructor.
     *
     * @param BlogRepository $blogRepository
     */
    public function __construct(BlogRepository $blogRepository)
    {
        $this->blog = $blogRepository;
    }

    /**
     * Blog Page
     *
     * @return $this
     */
    public function index()
    {
        $blogData       = $this->blog->paginate();

        return view('frontend.blog')->with(['blogData' => $blogData]);
    }

    /**
     * Show Blog
     *
     * @param $slug
     * @return $this
     */
    public function showBlog($slug)
    {
        $blogData       = $this->blog->getBlogBySlug($slug);
        $content        = $blogData->content;

        $latestBlog  = $this->blog->getLatestBlogs($slug);

        return view('frontend.blog')->with([
            'blogData'      => $blogData,
            'content'       => $content,
            'latestBlog'    => $latestBlog
        ]);
    }
}
