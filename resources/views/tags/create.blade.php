<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-300 leading-tight">
            {{ __('Create tag') }}
        </h1>
    </x-slot>
    <!--  p-4  max-w-7xl mx-auto -->
    <div class="max-w-7xl w-10/12 mx-auto mt-6 py-6 px-4 sm:px-6 lg:px-8 bg-white dark:bg-gray-800 rounded shadow">
        <form action="{{ route('tags.store') }}" method="POST">
            @method('POST')
            @csrf
            <div class="flex flex-col">
                <label for="nouveau-nom-tag" class="text-gray-800 dark:text-gray-300 mb-1 font-bold">{{__('Name')}}</label>
                <input type="text" name="nouveau-nom-tag" id="nouveau-nom-tag" placeholder="Nom de la nouvelle étiquette" class="rounded border-gray-200 dark:border-gray-400">
                @error("nouveau-nom-tag")
                <div class="text-red-500">{{$message}}</div>
                @enderror
                <div class="mt-4">
                    <x-buttons.submit></x-buttons.submit>
                    <x-buttons.reset></x-buttons.reset>
                    <x-buttons.back :href="route('tags.index')"></x-buttons.back>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>