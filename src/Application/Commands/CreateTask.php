<?php
namespace Todo\Application\Commands;

class CreateTask
{
    private $message;
    public function __construct($message)
    {
        $this->message = $message;
    }
    public function getMessage()
    {
        return $this->message;
    }
}