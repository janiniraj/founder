<?php

namespace App\Repositories\Backend\Award;

use App\Repositories\BaseRepository;
use App\Exceptions\GeneralException;
use App\Models\Award\Award;
use Illuminate\Database\Eloquent\Model;
use App\Http\Utilities\FileUploads;
use DB;

/**
 * Class AwardRepository.
 */
class AwardRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Award::class;

    /**
     * @return string
     */
    public function model()
    {
        return Award::class;
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
        $fileUpload->setBasePath('awards');

        $input['image'] = $fileUpload->upload($input['image']);

        DB::transaction(function () use ($input) {
            $Awards = self::MODEL;
            $Awards = new $Awards();
            $Awards->name = $input['name'];
            $Awards->year = $input['year'];
            $Awards->image = $input['image'];

            if ($Awards->save()) {

                // event(new AwardCreated($Awards));
                return true;
            }
            throw new GeneralException(trans('exceptions.backend.awards.create_error'));
        });
    }

    /**
     * @param Model $Awards
     * @param  $input
     *
     * @throws GeneralException
     *
     * return bool
     */
     
    public function update(Model $Awards, array $input)
    {
        if($input['image'])
        {
            $fileUpload = new FileUploads();
            $fileUpload->setBasePath('awards');

            $Awards->image = $fileUpload->upload($input['image']);
        }

        $Awards->name = $input['name'];
        $Awards->year = $input['year'];

        DB::transaction(function () use ($Awards, $input) {
        	if ($Awards->save()) {
                // event(new AwardUpdated($Awards));

                return true;
            }

            throw new GeneralException(
                trans('exceptions.backend.awards.update_error')
            );
        });
    }

    /**
     * @param Model $award
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function forceDelete(Model $award)
    {
        DB::transaction(function () use ($award) {

            if ($award->delete()) {
                // event(new AwardDeleted($category));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.awards.delete_error'));
        });
    }

    /**
     * Get Award By Slug
     *
     * @param $slug
     * @return Model|null|object|static
     */
    public function getAwardBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }
}