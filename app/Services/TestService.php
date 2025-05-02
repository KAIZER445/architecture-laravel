<?php

namespace App\Services;

use App\Interfaces\TestInterface;

class TestService
{
    protected $testRepository;

    public function __construct(TestInterface $testRepository)
    {
        $this->testRepository = $testRepository;
    }

    public function save(array $data)
    {

        return $this->testRepository->save($data);
    }

    public function getAll()
    {
        return $this->testRepository->getAll();
    }

    public function delete(int $id)
    {
        return $this->testRepository->delete($id);
    }

    public function find(int $id)
    {
        return $this->testRepository->find($id);
    }

    public function update(int $id, array $data)
    {
        return $this->testRepository->update($id, $data);
    }
}