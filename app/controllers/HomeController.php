<?php

class HomeController extends BaseController {

    /**
     * Pin Model
     * @var Pin
     */
    protected $pin;

    /**
     * Inject the models.
     * @param Pin $pin
     */
    public function __construct(Pin $pin)
    {
        parent::__construct();

        $this->pin = $pin;
    }

    public function getIndex()
    {
        $pins = $this->pin->where('published', 1)->orderBy('created_at', 'DESC')->paginate(10);

        return View::make('site/home/index', compact('pins'));
    } 

}