<?php

namespace App\Http\Controllers\Backend\News;

use App\Models\News\News;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\News\NewsRepository;
use App\Http\Requests\Backend\News\StoreRequest;
use App\Http\Requests\Backend\News\ManageRequest;
use App\Http\Requests\Backend\News\EditRequest;
use App\Http\Requests\Backend\News\CreateRequest;
use App\Http\Requests\Backend\News\DeleteRequest;
use App\Http\Requests\Backend\News\UpdateRequest;

/**
 * Class NewsController.
 */
class NewsController extends Controller
{
    /**
     * @var NewsRepository
     */
    protected $newsRepository;

    /**
     * NewsController constructor.
     * @param NewsRepository $newsRepository
     */
    public function __construct(NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    /**
     * @param ManageRequest $request
     *
     * @return mixed
     */
    public function index(ManageRequest $request)
    {
        return view('backend.news.index')
            ->withNews($this->newsRepository->getActivePaginated(25, 'id', 'asc'));
    }

    /**
     * @param CreateRequest $request
     *
     * @return mixed
     */
    public function create(CreateRequest $request)
    {
        return view('backend.news.create');
    }

    /**
     * @param StoreRequest $request
     *
     * @return mixed
     */
    public function store(StoreRequest $request)
    {
        $this->newsRepository->create($request->all());

        return redirect()->route('admin.news.index')->withFlashSuccess(trans('alerts.backend.news.created'));
    }

    /**
     * @param News              $news
     * @param EditRequest $request
     *
     * @return mixed
     */
    public function edit(News $news, EditRequest $request)
    {
        return view('backend.news.edit')
            ->withNews($news);
    }

    /**
     * @param News              $news
     * @param UpdateRequest $request
     *
     * @return mixed
     */
    public function update(News $news, UpdateRequest $request)
    {
        $this->newsRepository->update($news, $request->all());

        return redirect()->route('admin.news.index')->withFlashSuccess(trans('alerts.backend.news.updated'));
    }

    /**
     * @param News              $news
     * @param DeleteRequest $request
     *
     * @return mixed
     */
    public function destroy(News $news, DeleteRequest $request)
    {
        $this->newsRepository->deleteById($news->id);

        return redirect()->route('admin.news.index')->withFlashSuccess(trans('alerts.backend.news.deleted'));
    }
}
