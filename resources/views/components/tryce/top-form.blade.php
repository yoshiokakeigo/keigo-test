@props([
    'purpose' => '',
    'overview' => '',
    'overview_p' => 'right-56',
])
<x-adminMaster title="team_edit">
    <article>
        <div class="relative z-10 mt-10">
            <div class="bg-img-module bg-cover bg-no-repeat">
                <p class="absolute top-36 left-1/3 text-3xl">{{ $purpose }}</p>
                <p class="absolute -top-10 {{ $overview_p }} text-gray-200 app-text-size">{{ $overview }}</p>
            </div>
        </div>
    </article>
    <section class="relative -top-20 z-20 opacity-90 mx-36">
        {{ $slot }}
    </section>
    <style>
        .bg-img-module {
            background-image: url('/images/Group 32.png');
            width: 800px;
            height: 400px;
        }

        .app-text-size {
            font-size: 200px;
            font-weight: lighter;
        }
    </style>
</x-adminMaster>
