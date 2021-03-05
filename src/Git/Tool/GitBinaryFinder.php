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

namespace Horde\Vcs\Git\Tool;

/**
 * Assemble a git client from necessary parts
 *
 * @author   Ralf Lang <ralf.lang@ralf-lang.de>
 * @copyright 2008-2022 Horde LLC
 */
class GitBinaryFinder
{
    /**
     * Default locations to look for the git client
     * 
     * @var string[]
     */
    private array $defaultLocations = [
        '/usr/bin/git',
        '/bin/git',
        '/usr/local/bin/git'
    ];

    /**
     * Run the finder
     *
     * @return string
     */
    public function __invoke(): string
    {
                
    }

    public function find(): string
    {

    }

    public function runWhich(): string
    {

    }
}
