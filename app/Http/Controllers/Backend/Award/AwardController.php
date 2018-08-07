<?php

namespace App\Http\Controllers\Backend\Award;

use App\Models\Award\Award;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Award\AwardRepository;
use App\Http\Requests\Backend\Award\StoreRequest;
use App\Http\Requests\Backend\Award\ManageRequest;
use App\Http\Requests\Backend\Award\EditRequest;
use App\Http\Requests\Backend\Award\CreateRequest;
use App\Http\Requests\Backend\Award\DeleteRequest;
use App\Http\Requests\Backend\Award\UpdateRequest;

/**
 * Class AwardController.
 */
class AwardController extends Controller
{
    /**
     * @var AwardRepository
     */
    protected $awards;

    /**
     * @param AwardRepository $awards
     */
    public function __construct(AwardRepository $awards)
    {
        $this->awards = $awards;
    }

    /**
     * @param ManageRequest $request
     *
     * @return mixed
     */
    public function index(ManageRequest $request)
    {
        return view('backend.awards.index')
            ->withAwards($this->awards->getActivePaginated(25, 'id', 'asc'));;
    }

    /**
     * @param CreateRequest $request
     *
     * @return mixed
     */
    public function create(CreateRequest $request)
    {
        return view('backend.awards.create');
    }

    /**
     * @param StoreRequest $request
     *
     * @return mixed
     */
    public function store(StoreRequest $request)
    {
        $this->awards->create($request->all());

        return redirect()->route('admin.awards.index')->withFlashSuccess(trans('alerts.backend.awards.created'));
    }

    /**
     * @param Award              $award
     * @param EditRequest $request
     *
     * @return mixed
     */
    public function edit(Award $award, EditRequest $request)
    {
        return view('backend.awards.edit')
            ->withAward($award);
    }

    /**
     * @param Award              $award
     * @param UpdateRequest $request
     *
     * @return mixed
     */
    public function update(Award $award, UpdateRequest $request)
    {
        $this->awards->update($award, $request->all());

        return redirect()->route('admin.awards.index')->withFlashSuccess(trans('alerts.backend.awards.updated'));
    }

    /**
     * @param Award              $award
     * @param DeleteRequest $request
     *
     * @return mixed
     */
    public function destroy(Award $award, DeleteRequest $request)
    {
        $this->awards->deleteById($award->id);

        return redirect()->route('admin.awards.index')->withFlashSuccess(trans('alerts.backend.awards.deleted'));
    }
}
