<?php

namespace App\Repositories\Backend\Quote;

use App\Repositories\BaseRepository;
use App\Exceptions\GeneralException;
use App\Models\Quote\Quote;
use Illuminate\Database\Eloquent\Model;
use App\Http\Utilities\FileUploads;
use DB;

/**
 * Class QuoteRepository.
 */
class QuoteRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Quote::class;

    /**
     * @return string
     */
    public function model()
    {
        return Quote::class;
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
        $fileUpload->setBasePath('quotes');

        $input['image'] = $fileUpload->upload($input['image']);

        DB::transaction(function () use ($input) {
            $Quotes = self::MODEL;
            $Quotes = new $Quotes();
            $Quotes->name = $input['name'];
            $Quotes->content = $input['content'];
            $Quotes->position = $input['position'];
            $Quotes->image = $input['image'];

            if ($Quotes->save()) {

                // event(new QuoteCreated($Quotes));
                return true;
            }
            throw new GeneralException(trans('exceptions.backend.quotes.create_error'));
        });
    }

    /**
     * @param Model $Quotes
     * @param  $input
     *
     * @throws GeneralException
     *
     * return bool
     */
     
    public function update(Model $Quotes, array $input)
    {
        if($input['image'])
        {
            $fileUpload = new FileUploads();
            $fileUpload->setBasePath('quotes');

            $Quotes->image = $fileUpload->upload($input['image']);
        }

        $Quotes->name = $input['name'];
        $Quotes->content = $input['content'];
        $Quotes->position = $input['position'];

        DB::transaction(function () use ($Quotes, $input) {
        	if ($Quotes->save()) {
                // event(new QuoteUpdated($Quotes));

                return true;
            }

            throw new GeneralException(
                trans('exceptions.backend.quotes.update_error')
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
                // event(new QuoteDeleted($category));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.quotes.delete_error'));
        });
    }
}