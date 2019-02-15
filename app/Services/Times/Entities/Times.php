<?php declare(strict_types=1);

namespace App\Entities;

class Times
{
    private const FORMAT = '%d д. %h ч. %i мин. %s сек.';

    /**
     * @var int[]
     */
    private $timestamps;

    /**
     * @var \DateTime
     */
    private $prevStartDateTime;

    /**
     * @var \DateTime
     */
    private $prevEndDateTime;

    /**
     * @var \DateTime
     */
    private $currentDateTime;

    /**
     * @var \DateInterval
     */
    private $prevDateInterval;

    /**
     * @var \DateInterval
     */
    private $currentDateInterval;

    /**
     * Times constructor.
     * @param array $timestamps
     * @throws \Exception
     */
    public function __construct(array $timestamps)
    {
        $this->timestamps = $timestamps;
    }

    /**
     * @return string|null
     * @throws \Exception
     */
    public function getPrevIntervals(): array
    {
        $result = [];

        foreach ($this->timestamps as $currentKey => $timestamp) {
            $prevKey = $currentKey - 1;
            if (array_key_exists($prevKey, $this->timestamps)) {
                $prevDateTime = (new \DateTime())->setTimestamp($this->timestamps[$prevKey]);
                $nextDateTime = (new \DateTime())->setTimestamp($this->timestamps[$currentKey]);
                $result[] = $prevDateTime->diff($nextDateTime)->format(self::FORMAT);
            }
        }

        return $result;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getCurrentInterval(): string
    {
        $lastTimestampKey = count($this->timestamps) - 1;
        $lastTimestamp = $this->timestamps[$lastTimestampKey];
        $lastDateTime = (new \DateTime())->setTimestamp($lastTimestamp);

        return $lastDateTime->diff(new \DateTime())->format(self::FORMAT);
    }
}