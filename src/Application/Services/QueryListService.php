<?php
namespace Todo\Application\Services;

use \Infrastructure\iListPersistence;

class QueryListService {

    protected $repo;

    public function __construct(iListPersistence $listRepo){
        $this->repo = $listRepo;
    }
    public function listAll(){
        return $this->repo->getAll();
    }
}