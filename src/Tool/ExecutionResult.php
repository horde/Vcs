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

namespace Horde\Vcs\Tools;

/**
 * The results of an executed command
 * 
 * TODO: Figure where we can put this for reuse without creating an ever-growing blob
 *
 * @author   Ralf Lang <ralf.lang@ralf-lang.de>
 * @copyright 2008-2022 Horde LLC
 */
class ExecutionResult
{    
    public function __construct(private string $output = '', private int $code = 0)
    {
    }
}
