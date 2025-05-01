<?php

namespace App\Livewire;

use App\Interfaces\TestInterface;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class Home extends Component
{
    public $title;
    public $description;

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

        $this->getTestService()->save($data);

        $this->reset(['title', 'description']);
        $this->dispatch('show-success-toast', message: 'Data saved successfully!');
    }
}