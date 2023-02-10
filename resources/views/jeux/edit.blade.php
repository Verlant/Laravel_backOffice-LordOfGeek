<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-300 leading-tight">
            {{ __('Update game') }} n°{{$id}}
        </h1>
    </x-slot>
    <!--  p-4  max-w-7xl mx-auto -->
    <div class="max-w-7xl w-10/12 mx-auto mt-6 py-6 px-4 sm:px-6 lg:px-8 bg-white dark:bg-gray-800 rounded shadow">
        <form action="{{ route('jeux.update', $jeu->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="flex flex-col">
                <label for="titre-jeu" class="text-gray-800 dark:text-gray-300 mb-1 font-bold">
                    {{__('Title')}}
                </label>
                <input type="text" name="titre-jeu" id="titre-jeu" value="{{$jeu->titre}}" class="rounded border-gray-200 dark:border-gray-400">
                @error("titre-jeu")
                <div class="text-red-500">{{$message}}</div>
                @enderror
                <div class="flex gap-1 items-center mt-4">
                    <label for="categorie_id-jeu" class="text-gray-800 dark:text-gray-300 mb-1 font-bold self-center">
                        {{__('Category')}} :
                    </label>
                    <select name="categorie_id-jeu" id="categorie-jeu" class="rounded border-gray-200 dark:border-gray-400">
                        <option value="{{$jeu->categorie->id}}">{{$jeu->categorie->libelle}}</option>
                        @foreach ($categories as $categorie)
                        <option value="{{$categorie->id}}">{{$categorie->libelle}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-4 flex justify-end">
                    <x-buttons.submit></x-buttons.submit>
                    <x-buttons.reset></x-buttons.reset>
                    <x-buttons.back :href="route('jeux.index')"></x-buttons.back>
                </div>
            </div>
        </form>
    </div>
    <div class="max-w-7xl w-10/12 mx-auto mt-6 py-6 px-4 sm:px-6 lg:px-8 bg-white dark:bg-gray-800 rounded shadow">
        <h2 class="text-gray-800 dark:text-gray-300 mb-1 font-bold">
            {{__('List of tags')}}
        </h2>
        <div class="flex flex-wrap">
            @foreach ($tags as $tag)
            <x-buttons.tag :href="route('tags.show', $tag->id)" class="btn-orange">{{ $tag->nom }}</x-buttons.tag>
            @endforeach
        </div>
        <form action="{{ route('jeux.attach', $jeu->id) }}" method="POST" class="mt-2">
            @method('POST')
            @csrf
            <label for="nouveau_tag-jeu" class="text-gray-800 dark:text-gray-300 mb-1 font-semibold">
                {{__('New tag')}}
            </label>
            <input type="text" name="nouveau_tag-jeu" class="rounded border-gray-200 dark:border-gray-400">
            @error("nouveau_tag-jeu")
            <div class="text-red-500">{{$message}}</div>
            @enderror
            <x-buttons.reset></x-buttons.reset>
            <x-buttons.submit></x-buttons.submit>
        </form>
    </div>
</x-app-layout>