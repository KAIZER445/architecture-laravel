<?php

namespace App\Repositories;
use App\Interfaces\TestInterface;
use App\Models\Test;

class TestRepository implements TestInterface
{
    public function __construct() {}

    public function save($data) {
        return Test::create($data);
    }

    public function getAll() {
        return Test::all();
    }

    public function delete($id) {
        return Test::destroy($id);
    }

    public function find($id) {
        $record = Test::find($id);
        return $record ?? null;
    }

    public function update($id, $data)
    {
        $record = Test::findOrFail($id);
        $record->update($data);
        return $record;
    }
}