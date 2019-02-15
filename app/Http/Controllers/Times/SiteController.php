<?php declare(strict_types=1);

namespace App\Http\Controllers\Times;

class SiteController extends TimesController
{
    /**
     * @return \Illuminate\View\View
     * @throws \Exception
     */
    public function index(): \Illuminate\View\View
    {
        return view('times/index');
    }
}