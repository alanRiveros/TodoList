<?php
namespace Todo\Application\Commands;

class DeleteTaskCommand
{
    private $message;
    public function __construct($message)
    {
        $this->message = $message;
    }
    public function delete()
    {
        return $this->message;
    }
}