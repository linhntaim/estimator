<?php

/**
 * Base
 */

namespace App\Console\Commands;

use App\Support\Commands\Command;

class TryCommand extends Command
{
    protected function handling(): int
    {
        // TODO:
        $this->info('hello, try');

        // TODO
        return $this->exitSuccess();
    }
}