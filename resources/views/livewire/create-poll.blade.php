<div>
    <form wire:submit.prevent="createPoll">
        <label>Poll title</label>
        {{-- .live est pour avoir les validation en direct --}}
        <input type="text" wire:model.live="title"/>
        {{-- Titre actuel: {{$title}} --}}
        @error('title')
            <div class="text-red-500">{{$message}}</div>
        @enderror

        <div class="mt-4 mb-4">
            {{-- prevent empeche le boutton d'envoyer un formulair, qui est le comportement par defaut d'un boutton html --}}
            {{-- addOption est la methode dans le "controlleur" de livewire --}}
            <button class="btn" wire:click.prevent="addOption">Ajouter l'option</button>
        </div>

        <div >
            @foreach ($options as $index=>$option)
                <div class="mb-4">
                    {{-- {{$index}} - {{$option}} --}}
                    <label>Option {{$index + 1}}</label>
                    <div class="flex gap-2">
                        <input type="text" wire:model.live="options.{{$index}}"/>
                        <button class="btn" wire:click.prevent="removeOption({{$index}})">Supprimer</button>
                    </div>
                    @error('options.'.$index)
                            <div class="text-red-500">{{$message}}</div>
                    @enderror
                </div>
            @endforeach
        </div>
        <button type="submit" class="btn">Creer le sondage</button>
    </form>
</div>
