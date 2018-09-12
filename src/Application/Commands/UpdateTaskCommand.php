<?php
namespace Todo\Application\Commands;

class UpdateTaskCommand
{
    private $message;
    public function __construct($message)
    {
        $this->message = $message;
    }
    public function update()
    {
        return $this->message;
    }
}