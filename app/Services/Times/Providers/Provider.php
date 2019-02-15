<?php

namespace App\Services\Times\Providers;

use App\Entities\Times;

interface Provider
{
    /**
     * Provider constructor.
     */
    public function __construct();

    /**
     * @return array
     */
    public function getTimes(): Times;

    public function reset(): void;
}
