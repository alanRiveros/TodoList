<?php
namespace Infrastructure;

class ListRepository implements iListPersistence {
    protected $db;

    public function __construct($db){
        $this->db = $db;
    }

    public function getAll(){
        $sql = "select * from list where state = 1 order by id desc";
        $res = $this->db->query($sql, \PDO::FETCH_ASSOC);
        return $res->fetchAll();
    }

    public function getOne($id){
        // Todo implement getOne method
    }
}