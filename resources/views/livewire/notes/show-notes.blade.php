<!-- resources/views/livewire/notes/show-notes.blade.php -->

<?php

use Livewire\Volt\Component;
use Illuminate\Support\Facades\Auth;

new class extends Component {
    public function with()
    {

        return [
            'notes' => Auth::user()
                ->notes()
                ->orderBy('send_date', 'asc')
                ->get(),
        ];
    }
};
?>

<div>


    <div class="space-y-2">
        <div class="text-center">
            <x-button teal icon-right="plus" class="mt-6" href="{{route('notes.create')}}" wire:navigate>Create Note</x-button>
        </div>
        @if($notes->isNotEmpty())
        <div class="grid grid-cols-2 gap-4 mt-12">
            @foreach ($notes as $note)
            <x-card wire:key="{{ $note->id}}">
                <div class="flex justify-between">
                    <a href="#" class="text-xl font-bold hover:underline hover:text-teal-500">
                        {{$note->title}}
                    </a>
                    <div class="text-xs text-gray-500">{{\Carbon\Carbon::parse($note->send_date)->format("M-d-Y")}}</div>
                </div>
                <div class="flex items-end justify-between mt-4 space-x-1">
                    <p class="text-xs"><span class="font-semibold">{{$note->recipient}}</span></p>
                    <div>
                        <x-button circle icon="eye"></x-button>
                        <x-button circle icon="trash"></x-button>
                    </div>
                </div>
            </x-card>
            @endforeach
        </div>
    </div>
    @else
    <p>No notes available.</p>
    @endif


</div>