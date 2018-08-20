<?php

namespace App\Repositories\Backend\Speech;

use App\Repositories\BaseRepository;
use App\Exceptions\GeneralException;
use App\Models\Speech\Speech;
use Illuminate\Database\Eloquent\Model;
use App\Http\Utilities\FileUploads;
use DB;

/**
 * Class SpeechRepository.
 */
class SpeechRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Speech::class;

    /**
     * @return string
     */
    public function model()
    {
        return Speech::class;
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
            throw new GeneralException(trans('exceptions.backend.speeches.already_exists'));
        }

        DB::transaction(function () use ($input) {
            $Speechs = self::MODEL;
            $Speechs = new $Speechs();
            $Speechs->name = $input['name'];
            $Speechs->slug = $input['slug'];
            $Speechs->content = $input['content'];
            $Speechs->excerpt = $input['excerpt'];

            if ($Speechs->save()) {

                // event(new SpeechCreated($Speechs));
                return true;
            }
            throw new GeneralException(trans('exceptions.backend.speeches.create_error'));
        });
    }

    /**
     * @param Model $Speechs
     * @param  $input
     *
     * @throws GeneralException
     *
     * return bool
     */
     
    public function update(Model $Speechs, array $input)
    {
        if ($this->model->where('slug', $input['slug'])->where('id', '!=', $Speechs->id)->first()) {
            throw new GeneralException(trans('exceptions.backend.speeches.already_exists'));
        }

        $Speechs->name = $input['name'];
        $Speechs->slug = $input['slug'];
        $Speechs->content = $input['content'];
        $Speechs->excerpt = $input['excerpt'];

        DB::transaction(function () use ($Speechs, $input) {
        	if ($Speechs->save()) {
                // event(new SpeechUpdated($Speechs));

                return true;
            }

            throw new GeneralException(
                trans('exceptions.backend.speeches.update_error')
            );
        });
    }

    /**
     * @param Model $speech
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function forceDelete(Model $speech)
    {
        DB::transaction(function () use ($speech) {

            if ($speech->delete()) {
                // event(new SpeechDeleted($category));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.speeches.delete_error'));
        });
    }

    /**
     * Get Speech By Slug
     *
     * @param $slug
     * @return Model|null|object|static
     */
    public function getSpeechBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }

    /**
     * Get Latest Speechs
     *
     * @param null $notIncludeSlug
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getLatestSpeechs($notIncludeSlug = NULL)
    {
        $query = $this->model;

        if($notIncludeSlug)
        {
            $query = $query->where('slug', '!=', $notIncludeSlug);
        }

        return $query->orderBy('id', 'DESC')->limit(3)->get();
    }
}