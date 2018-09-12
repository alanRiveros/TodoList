<?php

namespace Infrastructure;

interface iWriteListPersistence {
    public function create();
    public function update();
    public function delete();
}