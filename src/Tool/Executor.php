<?php
/**
 * Copyright 2008-2022 Horde LLC (http://www.horde.org/)
 *
 * See the enclosed file LICENSE for license information (LGPL). If you
 * did not receive this file, see http://www.horde.org/licenses/lgpl21.
 *
 * @author   Ralf Lang <ralf.lang@ralf-lang.de>
 * @license  http://www.horde.org/licenses/lgpl21 LGPL
 */
declare(strict_types=1);

namespace Horde\Vcs\Tool;

use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

/**
 * Run a command in shell context
 *
 * TODO: Figure where we can put this for reuse without creating an ever-growing blob
 *
 * @author   Ralf Lang <ralf.lang@ralf-lang.de>
 * @copyright 2008-2022 Horde LLC
 */
class Executor
{
    public function __construct(private LoggerInterface $logger = new NullLogger())
    {
    }
    /**
     * Run the command
     *
     * @param non-empty-string $cmd The complete command to run including all parameters
     * @param class-string<Exception>|'' $throwOnNonZero An exception to be thrown on non-zero return codes
     *
     *
     * @return ExecutionResult
     */
    public function __invoke(string $cmd, string $throwOnNonZero = ''): ExecutionResult
    {
        exec($cmd, $outputArr = [], $returnCode = 0);
        if ($throwOnNonZero && $returnCode) {
            throw new $throwOnNonZero('Command returned non-null value: ' . $cmd .  "\n"  . array_shift($outputArr), $returnCode);
        }
        return new ExecutionResult($outputArr, $returnCode);
    }
}
