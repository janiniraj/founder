<?php

namespace App\Http\Controllers\Backend\Blog;

use App\Models\Blog\Blog;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Blog\BlogRepository;
use App\Http\Requests\Backend\Blog\StoreRequest;
use App\Http\Requests\Backend\Blog\ManageRequest;
use App\Http\Requests\Backend\Blog\EditRequest;
use App\Http\Requests\Backend\Blog\CreateRequest;
use App\Http\Requests\Backend\Blog\DeleteRequest;
use App\Http\Requests\Backend\Blog\UpdateRequest;

/**
 * Class BlogController.
 */
class BlogController extends Controller
{
    /**
     * @var BlogRepository
     */
    protected $blogs;

    /**
     * @param BlogRepository $blogs
     */
    public function __construct(BlogRepository $blogs)
    {
        $this->blogs = $blogs;
    }

    /**
     * @param ManageRequest $request
     *
     * @return mixed
     */
    public function index(ManageRequest $request)
    {
        return view('backend.blogs.index')
            ->withBlogs($this->blogs->getActivePaginated(25, 'id', 'asc'));;
    }

    /**
     * @param CreateRequest $request
     *
     * @return mixed
     */
    public function create(CreateRequest $request)
    {
        return view('backend.blogs.create');
    }

    /**
     * @param StoreRequest $request
     *
     * @return mixed
     */
    public function store(StoreRequest $request)
    {
        $this->blogs->create($request->all());

        return redirect()->route('admin.blogs.index')->withFlashSuccess(trans('alerts.backend.blogs.created'));
    }

    /**
     * @param Blog              $blog
     * @param EditRequest $request
     *
     * @return mixed
     */
    public function edit(Blog $blog, EditRequest $request)
    {
        return view('backend.blogs.edit')
            ->withBlog($blog);
    }

    /**
     * @param Blog              $blog
     * @param UpdateRequest $request
     *
     * @return mixed
     */
    public function update(Blog $blog, UpdateRequest $request)
    {
        $this->blogs->update($blog, $request->all());

        return redirect()->route('admin.blogs.index')->withFlashSuccess(trans('alerts.backend.blogs.updated'));
    }

    /**
     * @param Blog              $blog
     * @param DeleteRequest $request
     *
     * @return mixed
     */
    public function destroy(Blog $blog, DeleteRequest $request)
    {
        $this->blogs->deleteById($blog->id);

        return redirect()->route('admin.blogs.index')->withFlashSuccess(trans('alerts.backend.blogs.deleted'));
    }
}
