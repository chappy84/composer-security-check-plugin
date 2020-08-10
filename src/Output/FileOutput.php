<?php

namespace FancyGuy\Composer\SecurityCheck\Output;

use FancyGuy\Composer\SecurityCheck\Exception\RuntimeException;
use Symfony\Component\Console\Formatter\OutputFormatterInterface;
use Symfony\Component\Console\Output\StreamOutput;

class FileOutput extends StreamOutput
{
    /**
     * @param string                        $filePath  Full path to the file to append to
     * @param int                           $verbosity The verbosity level (one of the VERBOSITY constants in OutputInterface)
     * @param bool|null                     $decorated Whether to decorate messages (null for auto-guessing)
     * @param OutputFormatterInterface|null $formatter Output formatter instance (null to use default OutputFormatter)
     *
     * @see Symfony\Component\Console\Output\StreamOutput::__construct
     */
    public function __construct(string $filePath, int $verbosity = self::VERBOSITY_NORMAL, bool $decorated = null, OutputFormatterInterface $formatter = null)
    {
        if (false === ($writeStream = fopen($filePath, 'a', false))) {
            throw new RuntimeException(sprintf('Could not open write stream to: %s', $filePath));
        }
        parent::__construct($writeStream, $verbosity, $decorated, $formatter);
    }

    /**
     * @throws RuntimeException Unable to close output file stream handle
     */
    public function __destruct()
    {
        if (!fclose($this->getStream())) {
            throw new RuntimeException('Unable to close write stream handle');
        }
    }
}