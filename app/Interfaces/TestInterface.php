<?php

namespace App\Interfaces;

interface TestInterface
{

    public function save($data);

    public function getAll();

    public function delete($id);

    public function find($id);

    public function update($id, $data);
}
