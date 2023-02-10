<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-300 leading-tight">
            {{ __('Update categorie') }} n°{{$id}}
        </h1>
    </x-slot>
    <!--  p-4  max-w-7xl mx-auto -->
    <div class="max-w-7xl w-10/12 mx-auto mt-6 py-6 px-4 sm:px-6 lg:px-8 bg-white dark:bg-gray-800 rounded shadow">
        <form action="{{ route('categories.update', $categorie->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="flex flex-col">
                <label for="libelle-categorie" class="text-gray-800 dark:text-gray-300 mb-1 font-bold">{{__('Title')}}</label>
                <input type="text" name="libelle-categorie" id="libelle-categorie" placeholder="{{$categorie->libelle}}" class="rounded border-gray-200 dark:border-gray-400">
                @error("libelle-categorie")
                <div class="text-red-500">{{$message}}</div>
                @enderror
                <div class="mt-4">
                    <x-buttons.submit></x-buttons.submit>
                    <x-buttons.reset></x-buttons.reset>
                    <x-buttons.back :href="route('categories.index')"></x-buttons.back>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>