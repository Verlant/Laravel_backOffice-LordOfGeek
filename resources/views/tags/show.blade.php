<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-300 leading-tight">
            {{ __('Tag details') }} n°{{$tag->id}}
        </h1>
    </x-slot>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="p-5 text-gray-800 dark:text-gray-100 font-bold text-3xl text-center sm:text-left first-letter:capitalize">
            {{$tag->nom}}
        </h2>
        <h3 class="p-5 text-gray-400 dark:text-gray-400 font-medium text-2xl text-center sm:text-left first-letter:capitalize">
            {{__('List of games in this tag')}}
        </h3>
        <ul class="px-5">
            @foreach ($jeux as $jeu)
            <li class="p-1 text-gray-700 dark:text-gray-200">-
                <a href="{{ route('jeux.show', $jeu->id) }}" class="underline">
                    {{$jeu->titre}}
                </a>
            </li>
            @endforeach
        </ul>
        <div class="flex justify-center sm:justify-end mt-4">
            <x-buttons.edit :href="route('tags.edit', $tag->id)"></x-buttons.edit>
            <x-buttons.destroy :action="route('tags.destroy', $tag->id)"></x-buttons.destroy>
        </div>
    </div>
</x-app-layout>