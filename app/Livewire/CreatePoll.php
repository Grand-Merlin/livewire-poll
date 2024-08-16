<?php

namespace App\Livewire;

use Livewire\Component;

class CreatePoll extends Component
{
    // les variables public dans un componement livewire est accessible dans la vue correspondante
    public $title;
    public $options = ['premier'];

    public function render()
    {
        return view('livewire.create-poll');
    }

    public function addOption()
    {
        // les crochet vide permettent d'ajouter un nouvel element
        $this->options[] = '';
    }

    // cette methode agit comme un constructeur
    // public function mount() 
    // {

    // }
}
