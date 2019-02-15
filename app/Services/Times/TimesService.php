<?php declare(strict_types=1);

namespace App\Services\Times;

use App\Entities\Times;
use App\Services\Times\Providers\Provider;

class TimesService
{
    /**
     * @var Provider
     */
    private $provider;

    /**
     * TimesService constructor.
     *
     * @param Provider $provider
     */
    public function __construct(Provider $provider)
    {
        $this->provider = $provider;
    }

    /**
     * @return Times
     * @throws \Exception
     */
    public function getTimes(): Times
    {
        return $this->provider->getTimes();
    }

    public function resetTimes(): void
    {
        $this->provider->reset();
    }
}