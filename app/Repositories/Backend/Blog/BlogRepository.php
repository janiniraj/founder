<?php

namespace App\Repositories\Backend\Blog;

use App\Repositories\BaseRepository;
use App\Exceptions\GeneralException;
use App\Models\Blog\Blog;
use Illuminate\Database\Eloquent\Model;
use App\Http\Utilities\FileUploads;
use DB;

/**
 * Class BlogRepository.
 */
class BlogRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Blog::class;

    /**
     * @return string
     */
    public function model()
    {
        return Blog::class;
    }

    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getActivePaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc')
    {
        return $this->model
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param array $input
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function create(array $input)
    {
        if ($this->model->where('slug', $input['slug'])->first()) {
            throw new GeneralException(trans('exceptions.backend.blogs.already_exists'));
        }

        $fileUpload = new FileUploads();
        $fileUpload->setBasePath('blogs');

        $input['image'] = $fileUpload->upload($input['image']);

        DB::transaction(function () use ($input) {
            $Blogs = self::MODEL;
            $Blogs = new $Blogs();
            $Blogs->name = $input['name'];
            $Blogs->slug = $input['slug'];
            $Blogs->content = $input['content'];
            $Blogs->excerpt = $input['excerpt'];
            $Blogs->meta = $input['meta'];
            $Blogs->image = $input['image'];

            if ($Blogs->save()) {

                // event(new BlogCreated($Blogs));
                return true;
            }
            throw new GeneralException(trans('exceptions.backend.blogs.create_error'));
        });
    }

    /**
     * @param Model $Blogs
     * @param  $input
     *
     * @throws GeneralException
     *
     * return bool
     */
     
    public function update(Model $Blogs, array $input)
    {
        if ($this->model->where('slug', $input['slug'])->where('id', '!=', $Blogs->id)->first()) {
            throw new GeneralException(trans('exceptions.backend.blogs.already_exists'));
        }

        if(isset($input['image']) && $input['image'])
        {
            $fileUpload = new FileUploads();
            $fileUpload->setBasePath('blogs');

            $Blogs->image = $fileUpload->upload($input['image']);
        }

        $Blogs->name = $input['name'];
        $Blogs->slug = $input['slug'];
        $Blogs->content = $input['content'];
        $Blogs->excerpt = $input['excerpt'];
        $Blogs->meta = $input['meta'];

        DB::transaction(function () use ($Blogs, $input) {
        	if ($Blogs->save()) {
                // event(new BlogUpdated($Blogs));

                return true;
            }

            throw new GeneralException(
                trans('exceptions.backend.blogs.update_error')
            );
        });
    }

    /**
     * @param Model $blog
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function forceDelete(Model $blog)
    {
        DB::transaction(function () use ($blog) {

            if ($blog->delete()) {
                // event(new BlogDeleted($category));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.blogs.delete_error'));
        });
    }

    /**
     * Get Blog By Slug
     *
     * @param $slug
     * @return Model|null|object|static
     */
    public function getBlogBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }

    /**
     * Get Latest Blogs
     *
     * @param null $notIncludeSlug
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getLatestBlogs($notIncludeSlug = NULL, $limit = 3)
    {
        $query = $this->model;

        if($notIncludeSlug)
        {
            $query = $query->where('slug', '!=', $notIncludeSlug);
        }

        return $query->orderBy('id', 'DESC')->limit($limit)->get();
    }
}