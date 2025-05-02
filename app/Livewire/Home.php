<?php

namespace App\Livewire;

use App\Services\TestService;
use Livewire\Component;

class Home extends Component
{
    public $title;
    public $description;
    public $editid;
    public $records = [];
    protected $rules = [
        'title' => 'required',
        'description' => 'required',
    ];

    protected TestService $testService;

    public function boot(TestService $testService)
    {
        $this->testService = $testService;
    }

    public function render()
    {
        return view('livewire.home')->layout('layouts.app', ['title' => 'home']);
    }

    public function save()
    {
        $this->validate();

        $data = [
            'title' => $this->title,
            'description' => $this->description,
        ];

        if ($this->editid) {
            $this->testService->update($this->editid, $data);
            $this->dispatch('show-success-toast', message: 'Data updated successfully!');
            $this->editid = null;
        } else {
            $this->testService->save($data);
            $this->dispatch('show-success-toast', message: 'Data saved successfully!');
        }

        $this->reset(['title', 'description']);
        $this->records = $this->testService->getAll();
    }

    public function mount()
    {
        $this->records = $this->testService->getAll();
    }

    public function delete($id)
    {
        $this->testService->delete($id);
        $this->records = $this->testService->getAll();
        $this->dispatch('show-success-toast', message: 'Data deleted successfully!');
    }

    public function edit($id)
    {
        $record = $this->testService->find($id);
        $this->title = $record->title;
        $this->description = $record->description;
        $this->editid = $id;
    }
}