<?php declare(strict_types=1);

namespace App\Http\Controllers\Times;

use App\Services\Times\TimesService;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class TimesController extends BaseController
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var TimesService
     */
    protected $service;

    /**
     * Controller constructor.
     * @param Request $request
     * @param TimesService $timesService
     */
    public function __construct(Request $request, TimesService $timesService)
    {
        $this->request = $request;
        $this->service = $timesService;
    }
}
