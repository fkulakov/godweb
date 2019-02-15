<?php declare(strict_types=1);

namespace App\Jobs;

use App\Services\Times\TimesService;

class TimeResetJob extends Job
{

    /**
     * @param TimesService $service
     */
    public function handle(TimesService $service): void
    {
        $service->resetTimes();
    }
}
