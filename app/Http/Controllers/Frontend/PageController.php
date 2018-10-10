<?php namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Backend\Page\PageRepository;
use View;
use App\Repositories\Backend\Blog\BlogRepository;
use App\Repositories\Backend\News\NewsRepository;
use App\Repositories\Backend\Award\AwardRepository;
use App\Repositories\Backend\Quote\QuoteRepository;
use App\Repositories\Backend\Publication\PublicationRepository;
use App\Repositories\Backend\Speech\SpeechRepository;
use Illuminate\Http\Request;
use App\Repositories\Backend\EmailSubscriber\EmailSubscriberRepository;
use Response;

/**
 * Class PageController.
 */
class PageController extends Controller
{
    /**
     * PageController constructor.
     * @param PageRepository $pageRepository
     * @param BlogRepository $blogRepository
     * @param NewsRepository $newsRepository
     * @param AwardRepository $awardRepository
     * @param QuoteRepository $quoteRepository
     * @param PublicationRepository $publicationRepository
     * @param SpeechRepository $speechRepository
     */
    public function __construct(PageRepository $pageRepository, BlogRepository $blogRepository, NewsRepository $newsRepository, AwardRepository $awardRepository, QuoteRepository $quoteRepository, PublicationRepository $publicationRepository, SpeechRepository $speechRepository, EmailSubscriberRepository $emailSubscriberRepository)
    {
        $this->page         = $pageRepository;
        $this->blog         = $blogRepository;
        $this->news         = $newsRepository;
        $this->awards       = $awardRepository;
        $this->quotes       = $quoteRepository;
        $this->publication  = $publicationRepository;
        $this->speech       = $speechRepository;

        $this->emailSubscriberRepository = $emailSubscriberRepository;
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

        $news           = $this->news->getLatestNews(null, 3);

        $latestNewsView = View::make('frontend.includes.latestnews')->with(['latestnews' => $news]);
        $latestNews     = (string) $latestNewsView;
        $content        = str_replace("[[latestnews]]", $latestNews, $content);

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

        if(strpos($content, '[[latestblogs]]') !== false)
        {
            $blogs              = $this->blog->getLatestBlogs(null, 4);
            $blogView           = View::make('frontend.includes.latestblog')->with(['blogs' => $blogs]);
            $blogViewContent    = (string)$blogView;
            $content = str_replace("[[latestblogs]]", $blogViewContent, $content);
        }

        if(strpos($content, '[[latestawards]]') !== false)
        {
            $awards              = $this->awards->getLatestAwards(7);
            $awardView           = View::make('frontend.includes.latestawards')->with(['awards' => $awards]);
            $awardViewContent    = (string)$awardView;
            $content = str_replace("[[latestawards]]", $awardViewContent, $content);
        }

        if(strpos($content, '[[latestquotes]]') !== false)
        {
            $quotes              = $this->quotes->getLatestQuotes(2);
            $quoteView           = View::make('frontend.includes.latestquotes')->with(['quotes' => $quotes]);
            $quoteViewContent    = (string)$quoteView;
            $content = str_replace("[[latestquotes]]", $quoteViewContent, $content);
        }

        if(strpos($content, '[[mediapublications]]') !== false)
        {
            $publications              = $this->publication->getLatestpublications(6);
            $publicationView           = View::make('frontend.includes.mediapublications')->with(['publications' => $publications]);
            $publicationViewContent    = (string)$publicationView;
            $content = str_replace("[[mediapublications]]", $publicationViewContent, $content);
        }

        if(strpos($content, '[[mediaspeeches]]') !== false)
        {
            $speeches              = $this->speech->getLatestSpeeches(null, 4);
            $speechView            = View::make('frontend.includes.mediaspeeches')->with(['speeches' => $speeches]);
            $speechViewContent     = (string)$speechView;
            $content = str_replace("[[mediaspeeches]]", $speechViewContent, $content);
        }

        if(strpos($content, '[[mediablogs]]') !== false)
        {
            $blogs              = $this->blog->getLatestBlogs(null, 4);
            $blogView           = View::make('frontend.includes.mediablogs')->with(['blogs' => $blogs]);
            $blogViewContent    = (string)$blogView;
            $content = str_replace("[[mediablogs]]", $blogViewContent, $content);
        }

        return view('frontend.page')->with([
            'pageData' => $pageData,
            'content' => $content
        ]);
    }

    /**
     * @return $this
     */
    public function awards()
    {
        $awards = $this->awards->all();

        return view('frontend.recognition-awards')->with([
            'awards' => $awards
        ]);
    }

    /**
     * @param int $limit
     * @return $this
     */
    public function quotes($limit = 1)
    {
        $quotes = $this->quotes->getActivePaginated($limit);

        return view('frontend.recognition-quotes')->with([
            'quotes' => $quotes
        ]);
    }

    /**
     * @return $this
     */
    public function publications()
    {
        $publications = $this->publication->all();

        return view('frontend.publications')->with([
            'publications' => $publications
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function emailSubscription(Request $request)
    {
        $postData = $request->all();

        if($this->emailSubscriberRepository->getRecordByEmail($postData['email']))
        {
            return response()->json(['success' => true, "message" => 'You have already subscribed.']);
        }
        else
        {
            $this->emailSubscriberRepository->create($postData);

            return response()->json(['success' => true, "message" => 'We will be in touch with you shortly.']);
        }
    }
}
