<?php declare(strict_types=1);

namespace App\Http\Controllers\Times;

use App\Events\TimeResetEvent;

class ApiController extends TimesController
{
    /**
     * @return array
     * @throws \Exception
     */
    public function times(): array
    {
        $times = $this->service->getTimes();

        return [
            'prev' => $times->getPrevIntervals(),
            'current' => $times->getCurrentInterval()
        ];
    }

    /**
     * @return array
     */
    public function reset(): array
    {
        event(new TimeResetEvent());

        return ['success' => true];
    }
}
