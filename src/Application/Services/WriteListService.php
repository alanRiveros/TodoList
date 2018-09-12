<?php
namespace Todo\Application\Services;

use Todo\Application\Commands\CreateTaskCommand;
use Todo\Domain\Model\Task;

class WriteListService
{
    public $commandBus;

    public function __construct($commandBus){
        $this->commandBus = $commandBus;
    }

    public function createTask(){
        $task = new Task();
        $task->uuid = 'bbbbbbbb-12345678-cccccccc';
        $task->title = 'hola carola';
        $task->state = 1;
        // crear comando
        // enviarlo al bus
        // 
        $command = new createTaskCommand($task);
        $this->commandBus->dispatch($command);
    }

    public function deleteTask(){

    }

    public function markDoneTask(){

    }
}
