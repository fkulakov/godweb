<?php declare(strict_types=1);

namespace App\Listeners;

use App\Jobs\TimeResetJob;
use Illuminate\Bus\Dispatcher;

class TimesListener
{
    /**
     * @var Dispatcher
     */
    private $dispatcher;

    /**
     * TimesListener constructor.
     *
     * @param Dispatcher $dispatcher
     */
    public function __construct(Dispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function handle(): void
    {
        $this->dispatcher->dispatch(new TimeResetJob());
    }
}
