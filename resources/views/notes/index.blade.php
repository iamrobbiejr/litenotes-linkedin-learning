<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ request()->routeIs('notes.index') ?__('Notes') : __('Trash') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if(session('success'))
            <div class="bg-gray-500 mx-auto text-white p-3">
                {{session('success')}}
            </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(request()->routeIs('notes.index'))
                <a href="{{route('notes.create')}}" class="btn btn-link btn-primary btn-sm">+ New Note</a>
            @endif
            @forelse($notes as $note)
                <div class="bg-white mt-4 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <a
                            @if(request()->routeIs('notes.index'))
                                href="{{route('notes.show', $note)}}"
                            @else
                                href="{{route('trash.show', $note)}}"
                            @endif
                        >
                            <h1 class="text-xl font-semibold">
                                {{$note->title}}</h1>
                        </a>
                        <p class="text-sm">
                            {{Str::limit($note->text, 200)}}
                        </p>
                        <span class="block opacity-75 mt-3">
                            {{$note->updated_at->diffForHumans()}}
                        </span>
                    </div>
                </div>
            @empty
                @if(request()->routeIs('notes.index'))
                    <p>You have no notes yet.</p>
                @else
                    <p>You have no trash.</p>
                @endif

            @endforelse

            {{$notes->links()}}
        </div>
    </div>
</x-app-layout>
