<?php
namespace Todo\Application\Commands;

class CreateTaskCommand
{
    private $task;
    
    public function __construct($task)
    {
        $this->task = $task;
    }
    public function getTask()
    {
        return $this->task;
    }
}