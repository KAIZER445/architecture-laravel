<?php

namespace App\Livewire;

use App\Interfaces\TestInterface;
use Illuminate\Support\Facades\App;
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

    protected $testInterfaceClass;

    public function boot(TestInterface $test)
    {
        $this->testInterfaceClass = get_class($test);
    }

    protected function getTestService(): TestInterface
    {
        return App::make($this->testInterfaceClass);
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
            $this->getTestService()->update($this->editid, $data);
            $this->dispatch('show-success-toast', message: 'Data updated successfully!');
            $this->editid = null;
        } else {
            $this->getTestService()->save($data);
            $this->dispatch('show-success-toast', message: 'Data saved successfully!');
        }
    
        $this->reset(['title', 'description']);
        $this->records = $this->getTestService()->getAll();
    }

    public function mount()
    {
        $this->records = $this->getTestService()->getAll();
    }

    public function delete($id)
    {
        $this->getTestService()->delete($id);
        $this->records = $this->getTestService()->getAll();
        $this->dispatch('show-success-toast', message: 'Data deleted successfully!');
    }

    public function edit($id)
    {
        $record = $this->getTestService()->find($id);
        $this->title = $record->title;
        $this->description = $record->description;
        $this->editid = $id;
    }
}