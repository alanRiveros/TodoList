<?php

namespace Infrastructure;

interface iListPersistence {
    public function getAll();
    public function getOne($id);
}