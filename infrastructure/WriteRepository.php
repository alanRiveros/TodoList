<?php
namespace Infrastructure;

use Todo\Domain\Model\Task;

class WriteRepository implements iWritePersistence {
    protected $db;

    public function __construct($db){
        $this->db = $db;
    }

    public function getAll(){
        $sql = "select * from list where state = 1 order by id desc";
        $res = $this->db->query($sql, \PDO::FETCH_ASSOC);
        return $res->fetchAll();
    }

    public function create(Task $task){
        $sql = "INSERT INTO list (uuid, title, state) VALUES ('{$task->uuid}', '{$task->title}', '{$task->state}')";
        $res = $this->db->query($sql);
    }

    public function update(){}
    public function delete(){}
}