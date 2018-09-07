<?php
namespace Todo\Application\Services;

use Todo\Application\Interfaces\iWriteListService;

class WriteListService implements iWriteService
{
    public function createTask();

    public function deleteTask();

    public function markDoneTask();
}
