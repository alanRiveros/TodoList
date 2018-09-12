<?php
namespace Todo\Application\CommandHandlers;

use Broadway\CommandHandling\SimpleCommandHandler;
use Todo\Application\Commands\CreateTask;
use Infrastructure\iWriteListPerasistence;

class TaskHandler extends SimpleCommandHandler
{
    public $repo;

    public function __construct(iWriteListPersistence $writeRepo){
        $this->repo = $writeRepo;
    }

    public function handleCreateTaskCommand(CreateTaskCommand $command)
    {
        $this->repo->create($command->getTask());
    }
}