<?php

namespace App\Repositories\Backend\Publication;

use App\Repositories\BaseRepository;
use App\Exceptions\GeneralException;
use App\Models\Publication\Publication;
use Illuminate\Database\Eloquent\Model;
use App\Http\Utilities\FileUploads;
use DB;

/**
 * Class PublicationRepository.
 */
class PublicationRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Publication::class;

    /**
     * @return string
     */
    public function model()
    {
        return Publication::class;
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
        $fileUpload->setBasePath('publications');

        $input['image'] = $fileUpload->upload($input['image']);

        DB::transaction(function () use ($input) {
            $Publications = self::MODEL;
            $Publications = new $Publications();
            $Publications->name = $input['name'];
            $Publications->year = $input['year'];
            $Publications->content = $input['content'];
            $Publications->url = $input['url'];
            $Publications->image = $input['image'];

            if ($Publications->save()) {

                // event(new PublicationCreated($Publications));
                return true;
            }
            throw new GeneralException(trans('exceptions.backend.publications.create_error'));
        });
    }

    /**
     * @param Model $Publications
     * @param  $input
     *
     * @throws GeneralException
     *
     * return bool
     */
     
    public function update(Model $Publications, array $input)
    {
        if(isset($input['image']) && $input['image'])
        {
            $fileUpload = new FileUploads();
            $fileUpload->setBasePath('publications');

            $Publications->image = $fileUpload->upload($input['image']);
        }

        $Publications->name = $input['name'];
        $Publications->year = $input['year'];
        $Publications->content = $input['content'];
        $Publications->url = $input['url'];

        DB::transaction(function () use ($Publications, $input) {
        	if ($Publications->save()) {
                // event(new PublicationUpdated($Publications));

                return true;
            }

            throw new GeneralException(
                trans('exceptions.backend.publications.update_error')
            );
        });
    }

    /**
     * @param Model $publication
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function forceDelete(Model $publication)
    {
        DB::transaction(function () use ($publication) {

            if ($publication->delete()) {
                // event(new PublicationDeleted($category));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.publications.delete_error'));
        });
    }

    /**
     * Get Publication By Slug
     *
     * @param $slug
     * @return Model|null|object|static
     */
    public function getPublicationBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }

    /**
     * Get Latest Publications
     *
     * @param null $notIncludeSlug
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getLatestPublications($notIncludeSlug = NULL, $limit = 3)
    {
        $query = $this->model;

        if($notIncludeSlug)
        {
            $query = $query->where('slug', '!=', $notIncludeSlug);
        }

        return $query->orderBy('id', 'DESC')->limit($limit)->get();
    }
}