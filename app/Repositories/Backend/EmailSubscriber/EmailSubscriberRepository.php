<?php

namespace App\Repositories\Backend\EmailSubscriber;

use App\Repositories\BaseRepository;
use App\Exceptions\GeneralException;
use App\Models\EmailSubscriber\EmailSubscriber;
use Illuminate\Database\Eloquent\Model;
use DB;

/**
 * Class EmailSubscriberRepository.
 */
class EmailSubscriberRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = EmailSubscriber::class;

    /**
     * @return string
     */
    public function model()
    {
        return EmailSubscriber::class;
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
        DB::transaction(function () use ($input) {
            $EmailSubscribers           = self::MODEL;
            $EmailSubscribers           = new $EmailSubscribers();
            $EmailSubscribers->email    = $input['email'];

            if ($EmailSubscribers->save()) {
                return true;
            }
            throw new GeneralException(trans('exceptions.backend.email_subscribers.create_error'));
        });
    }

    /**
     * @param Model $EmailSubscribers
     * @param  $input
     *
     * @throws GeneralException
     *
     * return bool
     */
     
    public function update(Model $EmailSubscribers, array $input)
    {
        $EmailSubscribers->email = $input['email'];

        DB::transaction(function () use ($EmailSubscribers, $input) {
        	if ($EmailSubscribers->save()) {
                return true;
            }

            throw new GeneralException(
                trans('exceptions.backend.email_subscribers.update_error')
            );
        });
    }

    /**
     * @param Model $quote
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function forceDelete(Model $quote)
    {
        DB::transaction(function () use ($quote) {

            if ($quote->delete()) {
                // event(new EmailSubscriberDeleted($category));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.email_subscribers.delete_error'));
        });
    }

    /**
     * Get Latest EmailSubscribers
     *
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getLatestEmailSubscribers($limit = 3)
    {
        return $this->model->orderBy('id', 'DESC')->limit($limit)->get();
    }

    public function getRecordByEmail($email)
    {
        return $this->model->where('email', $email)->count();
    }
}