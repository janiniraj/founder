<?php

namespace App\Repositories\Backend\News;

use App\Repositories\BaseRepository;
use App\Exceptions\GeneralException;
use App\Models\News\News;
use Illuminate\Database\Eloquent\Model;
use App\Http\Utilities\FileUploads;
use DB;

/**
 * Class NewsRepository.
 */
class NewsRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = News::class;

    /**
     * @return string
     */
    public function model()
    {
        return News::class;
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
        $fileUpload = new FileUploads();
        $fileUpload->setBasePath('news');

        $input['image'] = $fileUpload->upload($input['image']);

        DB::transaction(function () use ($input) {
            $News = self::MODEL;
            $News = new $News();
            $News->name = $input['name'];
            $News->slug = $input['slug'];
            $News->content = $input['content'];
            $News->excerpt = $input['excerpt'];
            $News->image = $input['image'];

            if ($News->save()) {

                // event(new NewsCreated($News));
                return true;
            }
            throw new GeneralException(trans('exceptions.backend.news.create_error'));
        });
    }

    /**
     * @param Model $News
     * @param  $input
     *
     * @throws GeneralException
     *
     * return bool
     */
     
    public function update(Model $News, array $input)
    {
        if(isset($input['image']) && $input['image'])
        {
            $fileUpload = new FileUploads();
            $fileUpload->setBasePath('news');

            $News->image = $fileUpload->upload($input['image']);
        }

        $News->name = $input['name'];
        $News->slug = $input['slug'];
        $News->content = $input['content'];
        $News->excerpt = $input['excerpt'];

        DB::transaction(function () use ($News, $input) {
        	if ($News->save()) {
                // event(new NewsUpdated($News));

                return true;
            }

            throw new GeneralException(
                trans('exceptions.backend.news.update_error')
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
                // event(new NewsDeleted($category));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.news.delete_error'));
        });
    }

    /**
     * Get News By Slug
     *
     * @param $slug
     * @return Model|null|object|static
     */
    public function getNewsBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }

    /**
     * Get Latest News
     *
     * @param null $notIncludeSlug
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getLatestNews($notIncludeSlug = NULL, $limit = 3)
    {
        $query = $this->model;

        if($notIncludeSlug)
        {
            $query = $query->where('slug', '!=', $notIncludeSlug);
        }

        return $query->orderBy('id', 'DESC')->limit($limit)->get();
    }
}