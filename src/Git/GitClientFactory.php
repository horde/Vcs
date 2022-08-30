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
    public function __construct(private string $gitBinary = '')
    {
    }

    public function createClient(): GitClient
    {
        return new GitClient($this->gitBinary);
    }
}