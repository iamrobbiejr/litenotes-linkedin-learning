<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $note->trashed()? __('Note') : __('Trashed Note') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if(session('success'))
            <div class="bg-gray-500 mx-auto text-white p-3">
                {{session('success')}}
            </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(!$note->trashed())
                <div class="flex ml-4">
                    <p class="opacity-75">
                        <strong>Created:</strong> {{$note->created_at->diffForHumans()}}
                    </p>
                    <p class="opacity-75 ml-4">
                        <strong>Updated:</strong> {{$note->updated_at->diffForHumans()}}
                    </p>
                </div>
                <a href="{{route('notes.edit', $note)}}"
                   class="inline-flex items-center px-4 py-2 bg-gray-500 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    Edit Note</a>
                <form action="{{route('notes.destroy', $note)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <x-primary-button onclick="return confirm('Are you sure you want to delete?')" class="mt-6">
                        Move to Trash
                    </x-primary-button>
                </form>
            @else
                <div class="flex ml-4">
                    <p class="opacity-75">
                        <strong>Deleted:</strong> {{$note->deleted_at->diffForHumans()}}
                    </p>
                </div>
                <form action="{{route('trash.update', $note)}}" method="post">
                    @csrf
                    @method('PUT')
                    <x-primary-button class="mt-6">
                        Restore
                    </x-primary-button>
                </form>
                <form action="{{route('trash.destroy', $note)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <x-primary-button onclick="return confirm('Are you sure you want to delete?')" class="mt-6">
                        Delete
                    </x-primary-button>
                </form>
            @endif

            <div class="bg-white mt-4 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h1 class="text-xl font-semibold">
                        {{$note->title}}</h1>
                    <p class="text-sm">
                        {{$note->text}}
                    </p>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
