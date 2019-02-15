<?php declare(strict_types=1);

namespace App\Services\Times\Providers;

use App\Entities\Times;

class FileProvider implements Provider
{
    private const TIMES_FILE_NAME = 'times';
    private const TIMES_HISTORY_LIMIT = 10;

    /**
     * @var int[]
     */
    private $history;

    /**
     * FileProvider constructor.
     */
    public function __construct()
    {
        if (!is_readable($this->getTimesFilePath())) {
            $this->reset();
        } else {
            $this->history = $this->getHistory();
        }
    }

    /**
     * @return Times
     * @throws \Exception
     */
    public function getTimes(): Times
    {
        return new Times($this->history);
    }

    public function reset(): void
    {
        $this->history[] = time();
        $lines = count($this->history);

        if ($lines >= self::TIMES_HISTORY_LIMIT) {
            $this->history = array_slice($this->history, $lines - self::TIMES_HISTORY_LIMIT, $lines);
        }

        file_put_contents($this->getTimesFilePath(), implode(PHP_EOL, $this->history));
        $this->history = $this->getHistory();
    }

    /**
     * @return string
     */
    private function getTimesFilePath(): string
    {
        return app()->storagePath() . DIRECTORY_SEPARATOR . self::TIMES_FILE_NAME;
    }

    /**
     * @return array
     */
    private function getHistory(): array
    {
        $result = file($this->getTimesFilePath());
        if (false === $result) {
            $result = [];
        } else {
            $result = array_map('intval', $result);
        }

        return $result;
    }

}