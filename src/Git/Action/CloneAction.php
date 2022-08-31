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

namespace Horde\Vcs\Git;

use Horde\Vcs\Tool\ExecutionResult;
use Horde\Vcs\Tool\Executor;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class CloneAction
{
    public function __construct(private ?LoggerInterface $logger, private bool $pretend = false)
    {
        $this->logger = $logger ?? new NullLogger();
    }
       /**
         * Clone a remote repo (primitive)
         *
         * @param string $uri      The remote repo to clone
         * @param string $localDir The local target dir
         * @param string $branch   Optional: Checkout a specific branch
         */
    public function clone(string $uri, string $localDir, string $branch = ''): ExecutionResult
    {
        $options = '';
        if ($branch) {
            $options .= '-b ' . $branch;
        }
        $cmd = sprintf(
            '%s %s clone %s %s',
            $this->gitBin,
            $options,
            $uri,
            $localDir
        );
        $this->logger->debug($cmd, ['class' => self::class]);
    }
}
