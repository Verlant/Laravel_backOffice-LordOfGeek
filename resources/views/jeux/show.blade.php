<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-300 leading-tight">
            {{ __('Game details') }} n°{{$jeu->id}}
        </h1>
    </x-slot>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="p-5 text-gray-800 dark:text-gray-100 font-bold text-3xl text-center sm:text-left first-letter:capitalize">
            {{__('Title')}} : {{$jeu->titre}}
        </h2>
        <h3 class="p-5 text-gray-800 dark:text-gray-100 font-bold text-3xl text-center sm:text-left first-letter:capitalize">
            {{__('Wording')}} : {{$categorie->libelle}}
        </h3>

        <p class="px-5  text-gray-600 dark:text-gray-200">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet nemo ducimus, nam qui ad numquam aliquam voluptatibus
            praesentium suscipit,porro dolore saepe. Voluptate quo fuga minima. Suscipit eum distinctio quibusdam.
            Asperiores expedita, id suscipit rem dolores quis voluptate qui placeat sit quam blanditiis tempora iusto eligendi
            repudiandae consequatur odio nesciunt voluptatibus fugiat nostrum ratione aliquam iure! Numquam soluta mollitia libero?
            Magnam amet sed quisquam ratione ab nesciunt iusto recusandae veritatis at, veniam perspiciatis excepturi doloribus
            esse mollitia hic non perferendis maxime minima magni in eum. Illo, ipsam! Facilis, laudantium quasi.
            Assumenda, sit amet sequi excepturi repellat mollitia molestias ipsum, itaque delectus deserunt quidem quaerat ipsam
            corrupti. Iusto nulla ex sunt quod earum. Harum recusandae ducimus, autem obcaecati id cumque quaerat!
            Eligendi, magni suscipit? Labore at, non iusto unde officia vero nemo perferendis! Nostrum voluptatibus, vel ratione
            sed tempora atque facilis explicabo eos quos, similique voluptate sapiente obcaecati minus, cum nobis.
        </p>

        <div class="flex justify-center sm:justify-end mt-4">
            <x-buttons.edit :href="route('jeux.edit', $jeu->id, $jeu->titre)"></x-buttons.edit>
            <x-buttons.destroy :action="route('jeux.destroy', $jeu->id)"></x-buttons.destroy>
        </div>
        <div>
            @foreach ($tags as $tag)
            <x-buttons.tag :href="route('tags.show', $tag->id)" class="btn-orange">{{ $tag->nom }}</x-buttons.tag>
            @endforeach
        </div>
    </div>
</x-app-layout>