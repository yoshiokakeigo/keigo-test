<x-master title="Home">
    <article>
        <div class="relative z-10 mt-10">
            <div class="bg-img-module bg-cover bg-no-repeat mb-10">
                <p class="absolute top-36 left-1/3 text-3xl">目標確認画面</p>
                <p class="absolute right-48 text-gray-200 app-text-size">curriculum</p>
            </div>
            <p class="absolute-position absolute1"><x-tryce.parts.button-a
                    :href="route('objective.index')">みんなの投稿を見る</x-tryce.parts.button-a></p>
            <p class="absolute-position absolute2"><x-tryce.parts.button-a
                    :href="route('objective.create')">投稿する</x-tryce.parts.button-a></p>
        </div>
    </article>
    <section class="relative z-20 opacity-90 mx-20">
        <x-tryce.parts.graph :user_information="$user_information" :curriculum="$curriculum" />
        <div class="p-8" x-data="{ month_show: 0 }">
            <div>
                <ul class='flex cursor-pointer'>
                    @foreach ($user_information as $months)
                        <li class='py-2 px-3 bg-gray-100 rounded-t-lg border-t-4 box-border-top text-sm'
                            @click="month_show = {{ $months->month->id }}"
                            :class="{ 'text-gray-500 !bg-gray-300 !border-gray-300': month_show !== {{ $months->month->id }} }">
                            {{ $months->month->month_name }}
                        </li>
                    @endforeach
                </ul>
            </div>
            @foreach ($user_information as $months)
                @foreach ($objective as $objectives)
                    <div x-show="month_show === {{ $months->month->id }}">
                        <div class="bg-gray-100">
                            @if ($objectives->month_id == $months->month->id)
                                {{-- もし振り返り課題が瀬亭されていた場合達成できたかどうか判定 --}}
                                @if (isset($objectives->assignments[3]))
                                    @if ($objectives->assignments[3]->unit_index >= $objectives->assignments[1]->unit_index)
                                        <p class="text-red-600 text-lg">min目標達成おめでとう!</p>
                                    @else
                                        <p class="text-red-600 text-lg">もう少し頑張って！</p>
                                    @endif
                                @endif
                                <p class="text-3xl px-5 border-b-2 border-blue-500 pt-10 pb-5">
                                    {{ $objectives->user->name }}
                                </p>
                                <table class="my-5 w-full py-10"
                                    style="border-spacing: 0px 25px;   border-collapse: separate;">
                                    <x-tryce.parts.user_table value='現状'>
                                        {{ $objectives->assignments[0]->name }}</x-tryce.parts.user_table>
                                    <x-tryce.parts.user_table value='MIN目標'>
                                        {{ $objectives->assignments[1]->name }}</x-tryce.parts.user_table>
                                    <x-tryce.parts.user_table value='MIN目標の根拠'>
                                        {{ $objectives->assignment_min_text }}</x-tryce.parts.user_table>
                                    <x-tryce.parts.user_table value='MAX目標'>
                                        {{ $objectives->assignments[2]->name }}</x-tryce.parts.user_table>
                                    <x-tryce.parts.user_table value='MAX目標の根拠'>
                                        {{ $objectives->assignment_max_text }}</x-tryce.parts.user_table>
                                    <x-tryce.parts.user_table value='起こりうる未達成要素'>
                                        {{ $objectives->measures_text }}</x-tryce.parts.user_table>
                                    <x-tryce.parts.user_table value='対策'>
                                        {{ $objectives->not_actived_text }}</x-tryce.parts.user_table>
                                    <x-tryce.parts.user_table value='目標に向けての戦略'>
                                        {{ $objectives->specific_text }}</x-tryce.parts.user_table>
                                    <td>
                                        <x-tryce.parts.options :form_edit="route('objective.edit', ['id' => $objectives->id])"
                                            :form_action="route('objective.destroy', ['id' => $objectives->id])"></x-tryce.parts.options>
                                    </td>
                                </table>
                                <div class="back-monument h-72 absolute w-screen right-2 bottom-52 opacity-60"
                                    style="margin-right: calc(50% - 50vw); margin-left: calc(50% - 50vw);">
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </section>

    <style>
        .bg-img-module {
            background-image: url('/images/Group 32.png');
            width: 800px;
            height: 400px;
        }

        .app-text-size {
            font-size: 120px;
        }

        .absolute-position {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        .absolute1 {
            bottom: 20%;
        }

        .absolute2 {
            bottom: 2%;
        }

        .box-border-top {
            border-color: #1CC9D4;
        }

        .back-monument {
            background-image: url('/images/Vector 6.png');
        }
    </style>
</x-master>
