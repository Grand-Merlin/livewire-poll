<?php

namespace App\Livewire;

use Livewire\Component;

class Polls extends Component
{
    protected $listeneres = [
        'poolCreated' => 'render'
    ];
    public function render()
    {
        $polls = \App\Models\Poll::with('options.votes')->latest()->get();
        //['polls'=>$polls] permet d'injecter les données dans la vue
        return view('livewire.polls', ['polls'=>$polls]);
    }
    public function vote($optionId){
        $option = \App\Models\Option::findorfail($optionId);
        $option->votes()->create();
    }
}
