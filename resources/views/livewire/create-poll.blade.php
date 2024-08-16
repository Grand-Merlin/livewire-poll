<div>
    <form>
        <label>Poll title</label>
        <input type="text" wire:model.live="title"/>
        Titre actuel: {{$title}}

        <div class="mt-4 mb-4">
            {{-- prevent empeche le boutton d'envoyer un formulair, qui est le comportement par defaut d'un boutton html --}}
            {{-- addOption est la methode dans le "controlleur" de livewire --}}
            <button class="btn" wire:click.prevent="addOption">Ajouter l'option</button>
        </div>

        <div >
            @foreach ($options as $index=>$option)
                <div class="mb-4">
                    {{$index}} - {{$option}}
                </div>
            @endforeach
        </div>
    </form>
</div>
