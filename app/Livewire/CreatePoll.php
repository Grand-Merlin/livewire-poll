<?php

namespace App\Livewire;

use App\Models\Poll;
use Livewire\Component;
use Livewire\Attributes\Validate;


class CreatePoll extends Component
{
    // les variables public dans un componement livewire est accessible dans la vue correspondante
    #[Validate('required|min:3|max:255')]
    public $title;
    #[Validate('required|array|min:1|max:10')]
    // #[Validate('required|min:1|max:255')]
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

    public function removeOption($index)
    {
        unset($this->options[$index]);
        //reindexer les valeurs
        $this->options = array_values($this->options);
    }

    public function createPoll()
    {
        //appel de la validation
        $this->validate();
        /* #region V1 */
        // $poll = Poll::create([
        //     'title' => $this->title
        // ]);

        // foreach ($this->options as $optionName) {
        //     $poll->options()->create(['name' => $optionName]);
        // }
        /* #endregion */

        /* #region V2 avec moin de variable et plus de methode laravel */
        Poll::create([
            'title' => $this->title
        ])->options()->createMany(
            collect($this->options)
                ->map(fn($option) => ['name' => $option])
                ->all()
        );
        // apres soumission, on px reset les champs title et option
        $this->reset(['title', 'options']);
        /* #endregion */
    }

    // cette methode agit comme un constructeur
    // public function mount() 
    // {

    // }
}
