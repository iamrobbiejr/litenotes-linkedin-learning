<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Note') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white mt-4 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">


                    <form action="{{route('notes.update', $note)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <x-text-input field="title"
                                      :value="@old('title', $note->title)"
                                      autocomplete="off"
                                      class="w-full" type="text"
                                      name="title" id="title"
                                      placeholder="Title"></x-text-input>

                        <x-textarea field="text"
                                    :value="@old('text',$note->text)"
                                    class="w-full mt-2" name="text"
                                    placeholder="Start typing here..." id="text"
                                    cols="30" rows="10">
                        </x-textarea>

                        <x-primary-button class="mt-6">Update Note</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
