<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-300 leading-tight">
            {{ __('List of all tags') }}
        </h1>
    </x-slot>

    <div class="px-1 sm:pl-8 sm:pt-4 pt-2 max-w-7xl mx-auto">
        <table class="w-4/5">
            <thead>
                <td class="sm:p-2 text-sm font-semibold text-gray-600 dark:text-gray-400 text-center">{{ __('ID') }}</td>
                <td class="sm:p-2 text-sm font-semibold text-gray-600 dark:text-gray-400 text-center">{{ __('NAME') }}</td>
                <td class="sm:p-2 text-sm font-semibold text-gray-600 dark:text-gray-400 flex justify-between items-center max-w-xs">ACTIONS<x-buttons.create :href="route('tags.create')"></x-buttons.create></td>
                <!-- <td class="sm:p-2 text-sm font-semibold"></td> -->
            </thead>
            <tbody>
                @foreach($tags as $tag)
                <tr>
                    <td class="sm:p-2 text-sm font-medium text-gray-800 dark:text-gray-200 text-center">{{$tag->id}}</td>
                    <td class="sm:p-2 text-sm font-medium text-gray-800 dark:text-gray-200 text-center">{{$tag->nom}}</td>
                    <td class="flex flex-col sm:flex-row justify-between sm:p-3 text-sm font-medium max-w-xs">
                        <x-buttons.edit :href="route('tags.edit', $tag->id)"></x-buttons.edit>
                        <x-buttons.show :href="route('tags.show', $tag->id)"></x-buttons.show>
                        <x-buttons.destroy :action="route('tags.destroy', $tag->id)"></x-buttons.destroy>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>