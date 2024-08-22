<div>
    @forelse ($polls as $poll)
        <div class="mb-4">
            <h3 class="mb-4 text-xl">
                {{$poll->title}}
            </h3>
            {{-- Nous avons recupere les sondage et les options dans le controlleur --}}
            @foreach ($poll->options as $option)
                <div class="mb-2">
                    <button class="btn" wire:click='vote({{$option->id}})'>Voter</button>
                    {{$option->name}} ({{$option->votes->count()}})
                </div>
            @endforeach
        </div>
    @empty
        <div class="text-gray-500">
            Pas de sondage actuellement
        </div>
    @endforelse
</div>
