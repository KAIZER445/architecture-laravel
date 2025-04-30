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
}
