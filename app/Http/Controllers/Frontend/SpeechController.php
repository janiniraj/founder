<?php namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Backend\Speech\SpeechRepository;
use View;

/**
 * Class SpeechController.
 */
class SpeechController extends Controller
{
    /**
     * SpeechController constructor.
     * @param SpeechRepository $speechRepository
     */
    public function __construct(SpeechRepository $speechRepository)
    {
        $this->speech = $speechRepository;
    }

    /**
     * Speech Page
     *
     * @param int $limit
     * @return $this
     */
    public function index($limit = 10)
    {
        $speeches       = $this->speech->getActivePaginated($limit);

        return view('frontend.speeches')->with(['speeches' => $speeches]);
    }

    /**
     * Show Speech
     *
     * @param $slug
     * @return $this
     */
    public function show($slug)
    {
        $speechData       = $this->speech->getSpeechBySlug($slug);
        $content        = $speechData->content;

        $latestSpeech  = $this->speech->getLatestSpeeches($slug);

        return view('frontend.speech')->with([
            'speechData'      => $speechData,
            'content'         => $content,
            'latestSpeech'    => $latestSpeech
        ]);
    }
}
