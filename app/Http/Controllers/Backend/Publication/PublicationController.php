<?php

namespace App\Http\Controllers\Backend\Publication;

use App\Models\Publication\Publication;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Publication\PublicationRepository;
use App\Http\Requests\Backend\Publication\StoreRequest;
use App\Http\Requests\Backend\Publication\ManageRequest;
use App\Http\Requests\Backend\Publication\EditRequest;
use App\Http\Requests\Backend\Publication\CreateRequest;
use App\Http\Requests\Backend\Publication\DeleteRequest;
use App\Http\Requests\Backend\Publication\UpdateRequest;

/**
 * Class PublicationController.
 */
class PublicationController extends Controller
{
    /**
     * @var PublicationRepository
     */
    protected $publications;

    /**
     * @param PublicationRepository $publications
     */
    public function __construct(PublicationRepository $publications)
    {
        $this->publications = $publications;
    }

    /**
     * @param ManageRequest $request
     *
     * @return mixed
     */
    public function index(ManageRequest $request)
    {
        return view('backend.publications.index')
            ->withPublications($this->publications->getActivePaginated(25, 'id', 'asc'));;
    }

    /**
     * @param CreateRequest $request
     *
     * @return mixed
     */
    public function create(CreateRequest $request)
    {
        return view('backend.publications.create');
    }

    /**
     * @param StoreRequest $request
     *
     * @return mixed
     */
    public function store(StoreRequest $request)
    {
        $this->publications->create($request->all());

        return redirect()->route('admin.publications.index')->withFlashSuccess(trans('alerts.backend.publications.created'));
    }

    /**
     * @param Publication              $publication
     * @param EditRequest $request
     *
     * @return mixed
     */
    public function edit(Publication $publication, EditRequest $request)
    {
        return view('backend.publications.edit')
            ->withPublication($publication);
    }

    /**
     * @param Publication              $publication
     * @param UpdateRequest $request
     *
     * @return mixed
     */
    public function update(Publication $publication, UpdateRequest $request)
    {
        $this->publications->update($publication, $request->all());

        return redirect()->route('admin.publications.index')->withFlashSuccess(trans('alerts.backend.publications.updated'));
    }

    /**
     * @param Publication              $publication
     * @param DeleteRequest $request
     *
     * @return mixed
     */
    public function destroy(Publication $publication, DeleteRequest $request)
    {
        $this->publications->deleteById($publication->id);

        return redirect()->route('admin.publications.index')->withFlashSuccess(trans('alerts.backend.publications.deleted'));
    }
}
