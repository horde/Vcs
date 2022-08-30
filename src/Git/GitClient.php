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

/**
 * Public facade to programmatically use git
 *
 * @author   Ralf Lang <ralf.lang@ralf-lang.de>
 * @copyright 2008-2022 Horde LLC
 */
class GitClient implements GitClientInterface
{
    public function __construct(private string $gitBinary, private string $localRepository = '')
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

    }
}
