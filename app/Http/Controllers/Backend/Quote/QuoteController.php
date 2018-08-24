<?php

namespace App\Http\Controllers\Backend\Quote;

use App\Models\Quote\Quote;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Quote\QuoteRepository;
use App\Http\Requests\Backend\Quote\StoreRequest;
use App\Http\Requests\Backend\Quote\ManageRequest;
use App\Http\Requests\Backend\Quote\EditRequest;
use App\Http\Requests\Backend\Quote\CreateRequest;
use App\Http\Requests\Backend\Quote\DeleteRequest;
use App\Http\Requests\Backend\Quote\UpdateRequest;

/**
 * Class QuoteController.
 */
class QuoteController extends Controller
{
    /**
     * @var QuoteRepository
     */
    protected $quotes;

    /**
     * @param QuoteRepository $quotes
     */
    public function __construct(QuoteRepository $quotes)
    {
        $this->quotes = $quotes;
    }

    /**
     * @param ManageRequest $request
     *
     * @return mixed
     */
    public function index(ManageRequest $request)
    {
        return view('backend.quotes.index')
            ->withQuotes($this->quotes->getActivePaginated(25, 'id', 'asc'));;
    }

    /**
     * @param CreateRequest $request
     *
     * @return mixed
     */
    public function create(CreateRequest $request)
    {
        return view('backend.quotes.create');
    }

    /**
     * @param StoreRequest $request
     *
     * @return mixed
     */
    public function store(StoreRequest $request)
    {
        $this->quotes->create($request->all());

        return redirect()->route('admin.quotes.index')->withFlashSuccess(trans('alerts.backend.quotes.created'));
    }

    /**
     * @param Quote              $quote
     * @param EditRequest $request
     *
     * @return mixed
     */
    public function edit(Quote $quote, EditRequest $request)
    {
        return view('backend.quotes.edit')
            ->withQuote($quote);
    }

    /**
     * @param Quote              $quote
     * @param UpdateRequest $request
     *
     * @return mixed
     */
    public function update(Quote $quote, UpdateRequest $request)
    {
        $this->quotes->update($quote, $request->all());

        return redirect()->route('admin.quotes.index')->withFlashSuccess(trans('alerts.backend.quotes.updated'));
    }

    /**
     * @param Quote              $quote
     * @param DeleteRequest $request
     *
     * @return mixed
     */
    public function destroy(Quote $quote, DeleteRequest $request)
    {
        $this->quotes->deleteById($quote->id);

        return redirect()->route('admin.quotes.index')->withFlashSuccess(trans('alerts.backend.quotes.deleted'));
    }
}
