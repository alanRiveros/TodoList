<?php

use Broadway\CommandHandling\SimpleCommandHandler;
use Todo\Application\Commands\CreateTask;

class TaskHandler extends SimpleCommandHandler
{

    public function handleCreateCommand(CreateTask $command)
    {
        // todo: implement handler
    }
}