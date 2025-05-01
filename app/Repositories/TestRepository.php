<?php

namespace App\Repositories;
use App\Interfaces\TestInterface;

use App\Models\Test;

class TestRepository implements TestInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

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
        if($record) {
            return $record;
        }else {
            return null;
        }
    }

    public function update($id, $data)
    {
        $record = Test::findOrFail($id);
        $record->update($data);
        return $record;
    }
}
