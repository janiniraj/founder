<?php

namespace App\Http\Controllers\Backend\Speech;

use App\Models\Speech\Speech;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Speech\SpeechRepository;
use App\Http\Requests\Backend\Speech\StoreRequest;
use App\Http\Requests\Backend\Speech\ManageRequest;
use App\Http\Requests\Backend\Speech\EditRequest;
use App\Http\Requests\Backend\Speech\CreateRequest;
use App\Http\Requests\Backend\Speech\DeleteRequest;
use App\Http\Requests\Backend\Speech\UpdateRequest;

/**
 * Class SpeechController.
 */
class SpeechController extends Controller
{
    /**
     * @var SpeechRepository
     */
    protected $speeches;

    /**
     * @param SpeechRepository $speeches
     */
    public function __construct(SpeechRepository $speeches)
    {
        $this->speeches = $speeches;
    }

    /**
     * @param ManageRequest $request
     *
     * @return mixed
     */
    public function index(ManageRequest $request)
    {
        return view('backend.speeches.index')
            ->withSpeeches($this->speeches->getActivePaginated(25, 'id', 'asc'));;
    }

    /**
     * @param CreateRequest $request
     *
     * @return mixed
     */
    public function create(CreateRequest $request)
    {
        return view('backend.speeches.create');
    }

    /**
     * @param StoreRequest $request
     *
     * @return mixed
     */
    public function store(StoreRequest $request)
    {
        $this->speeches->create($request->all());

        return redirect()->route('admin.speeches.index')->withFlashSuccess(trans('alerts.backend.speeches.created'));
    }

    /**
     * @param Speech              $speech
     * @param EditRequest $request
     *
     * @return mixed
     */
    public function edit(Speech $speech, EditRequest $request)
    {
        return view('backend.speeches.edit')
            ->withSpeech($speech);
    }

    /**
     * @param Speech              $speech
     * @param UpdateRequest $request
     *
     * @return mixed
     */
    public function update(Speech $speech, UpdateRequest $request)
    {
        $this->speeches->update($speech, $request->all());

        return redirect()->route('admin.speeches.index')->withFlashSuccess(trans('alerts.backend.speeches.updated'));
    }

    /**
     * @param Speech              $speech
     * @param DeleteRequest $request
     *
     * @return mixed
     */
    public function destroy(Speech $speech, DeleteRequest $request)
    {
        $this->speeches->deleteById($speech->id);

        return redirect()->route('admin.speeches.index')->withFlashSuccess(trans('alerts.backend.speeches.deleted'));
    }
}
