<?php

namespace App\Repositories\Backend\Page;

use App\Repositories\BaseRepository;
use App\Exceptions\GeneralException;
use App\Models\Page\Page;
use Illuminate\Database\Eloquent\Model;
use App\Http\Utilities\FileUploads;
use DB;

/**
 * Class PageRepository.
 */
class PageRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Page::class;

    /**
     * @return string
     */
    public function model()
    {
        return Page::class;
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
            throw new GeneralException(trans('exceptions.backend.pages.already_exists'));
        }

        DB::transaction(function () use ($input) {
            $Pages = self::MODEL;
            $Pages = new $Pages();
            $Pages->name = $input['name'];
            $Pages->slug = $input['slug'];
            $Pages->content = $input['content'];

            if ($Pages->save()) {

                // event(new PageCreated($Pages));
                return true;
            }
            throw new GeneralException(trans('exceptions.backend.pages.create_error'));
        });
    }

    /**
     * @param Model $permission
     * @param  $input
     *
     * @throws GeneralException
     *
     * return bool
     */
     
    public function update(Model $Pages, array $input)
    {
        if ($this->model->where('slug', $input['slug'])->where('id', '!=', $Pages->id)->first()) {
            throw new GeneralException(trans('exceptions.backend.pages.already_exists'));
        }
        $Pages->name = $input['name'];
        $Pages->slug = $input['slug'];
        $Pages->content = $input['content'];

        DB::transaction(function () use ($Pages, $input) {
        	if ($Pages->save()) {
                // event(new PageUpdated($Pages));

                return true;
            }

            throw new GeneralException(
                trans('exceptions.backend.pages.update_error')
            );
        });
    }

    /**
     * @param Model $category
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function forceDelete(Model $category)
    {
        DB::transaction(function () use ($category) {

            if ($category->delete()) {
                // event(new PageDeleted($category));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.pages.delete_error'));
        });
    }

    /**
     * Get Page By Slug
     *
     * @param $slug
     * @return Model|null|object|static
     */
    public function getPageBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }
}