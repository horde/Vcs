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

use Horde\Log\LoggerInterface;
use Psr\Log\NullLogger;

/**
 * Public facade to programmatically use git
 *
 * @author   Ralf Lang <ralf.lang@ralf-lang.de>
 * @copyright 2008-2022 Horde LLC
 */
class GitClient implements GitClientInterface
{
    /**
     * Constructor.
     *
     * @param GitClientConfig $config Settings for the client
     * @param LoggerInterface $logger PSR-3 Logger, defaults to null logger
     */
    public function __construct(private GitClientConfig $config, private LoggerInterface $logger = new NullLogger())
    {
    }

    /**
     * Configure a local repository to use in further commands
     *
     * @param string $localRepository
     * @return void
     */
    public function selectLocalRepository(string $localRepository): self
    {
        return $this;
    }

    public function cloneRemoteRepository(string $remoteUri)
    {
        // TODO: Credential handling
    }
}
