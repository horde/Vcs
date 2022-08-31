<?php
/**
 * Copyright 2010-2022 Horde LLC (http://www.horde.org/)
 *
 * See the enclosed file LICENSE for license information (LGPL). If you
 * did not receive this file, see http://www.horde.org/licenses/lgpl21.
 *
 * @author   Ralf Lang <ralf.lang@ralf-lang.de>
 * @license  http://www.horde.org/licenses/lgpl21 LGPL
 */
declare(strict_types=1);

namespace Horde\Vcs\Git;

use Horde\Log\LoggerInterface;
use Horde\Vcs\Git\Tool\GitBinaryFinder;
use Psr\Log\NullLogger;

/**
 * Assemble a git client from necessary parts
 *
 * @author   Ralf Lang <ralf.lang@ralf-lang.de>
 * @copyright 2010-2022 Horde LLC
 */
class GitClientFactory
{
    /**
     * Constructor.
     *
     * @param string $gitPath The path to the git client binary. Leave empty for auto-detection.
     */
    public function __construct(
        protected GitClientConfig $config = new GitClientConfig(),
        protected LoggerInterface $logger = new NullLogger(),
        protected string $gitBinary = '',
        protected string $repoPath = ''
    ) {
    }

    public function createClientConfig(): GitClientConfig
    {
        $config = clone($this->config);
        // If gitBinary is given, use it. Otherwise check if the config already has it. If not, detect.
        if ($this->gitBinPath) {
            $this->config->gitBinPath = $this->gitBinPath;
        }
        if ($this->config->gitBinPath === '') {
            $findGit = new GitBinaryFinder();
            $this->config->gitBinPath = $findGit();
        }
        // If the config already has a git repo path, keep it. Otherwise check
        return $config;
    }

    public function createClient(): GitClient
    {
        return new GitClient($this->createClientConfig(), $this->logger);
    }
}
