<x-adminMaster title="curriculum_index">
    <article>
        <div class="relative z-10 mt-10">
            <div class="bg-img-module bg-cover bg-no-repeat">
                <p class="absolute top-36 left-1/3 text-3xl">目標共有画面</p>
                <p class="absolute -top-10 right-56 text-gray-200 app-text-size">share</p>
            </div>
        </div>
    </article>
    <section class="relative -top-40 z-20 mx-20 opacity-95">
        {{ $month->links('vendor.pagination.tailwind') }}
        <div class="p-8" x-data="{ month_show: 0 }">
            <div style='border-bottom: 2px solid #1CC9D4'>
                <ul class='flex cursor-pointer'>
                    @foreach ($month as $months)
                        <li class='py-2 px-2 w-11/12 bg-gray-50 rounded-t-lg border-t-4 box-border-top text-sm text-center'
                            style="max-width: 120px" @click="month_show = {{ $months->id }}"
                            :class="{ 'text-gray-500 bg-gray-300 !border-gray-300': month_show !== {{ $months->id }} }">
                            {{ $months->month_name }}
                        </li>
                    @endforeach
                </ul>
            </div>
            @foreach ($month as $months)
                <div x-show="month_show === {{ $months->id }}">
                    <div class="p-8" x-data="{ open: 1 }">
                        <div style='border-bottom: 2px solid #1CC9D4' class="mb-10">
                            <ul class='flex cursor-pointer'>
                                @foreach ($team as $teams)
                                    <li class='py-2 px-6 bg-gray-50 rounded-t-lg  border-t-4 box-border-top'
                                        @click="open = {{ $teams->id }}"
                                        :class="{ 'text-gray-500 bg-gray-300 !border-gray-300': open !== {{ $teams->id }} }">
                                        {{ $teams->team_name }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        @foreach ($team as $teams)
                            <div x-show="open === {{ $teams->id }}">
                                {{-- 振り返り課題欄 --}}
                                <table class="w-full text-center border-collapse mb-16">
                                    <tr>
                                        <x-tryce.parts.border-th-s color="bg-indigo-300" />
                                        <x-tryce.parts.border-th-b color="bg-indigo-300" value="今月の目標を達成できたか" />
                                        <x-tryce.parts.border-th-b color="bg-indigo-300" value="今月の振り返り" />
                                    </tr>
                                    @foreach ($objective as $objectives)
                                        @if ($objectives->team->id == $teams->id && $objectives->month->id == $months->id)
                                            @if (isset($objectives->assignments[3]))
                                                <tr>
                                                    <x-tryce.parts.border-td>
                                                        {{ $objectives->user->name }}
                                                    </x-tryce.parts.border-td>
                                                    <x-tryce.parts.border-td>
                                                        @if ($objectives->assignments[3]->unit_index >= $objectives->assignments[2]->unit_index)
                                                            MAX達成
                                                        @elseif(
                                                            $objectives->assignments[3]->unit_index >= $objectives->assignments[1]->unit_index &&
                                                                $objectives->assignments[3]->unit_index < $objectives->assignments[2]->unit_index)
                                                            MIN達成
                                                        @else
                                                            未達成
                                                        @endif
                                                    </x-tryce.parts.border-td>
                                                    <x-tryce.parts.border-td width="w-2/5">
                                                        {{ $objectives->review_text }}
                                                    </x-tryce.parts.border-td>
                                                </tr>
                                            @endif
                                        @endif
                                    @endforeach
                                </table>
                                {{-- 課題の現状 --}}
                                <table class="w-full text-center border-collapse mb-16">
                                    <tr>
                                        <x-tryce.parts.border-th-s color="bg-green-300" />
                                        <x-tryce.parts.border-th-b color="bg-green-300" value="現状" />
                                    </tr>
                                    @foreach ($objective as $objectives)
                                        @if ($objectives->team->id == $teams->id && $objectives->month->id == $months->id)
                                            <tr>
                                                <x-tryce.parts.border-td>
                                                    {{ $objectives->user->name }}
                                                </x-tryce.parts.border-td>
                                                <x-tryce.parts.border-td>
                                                    {{ $objectives->assignments[0]->name }}
                                                </x-tryce.parts.border-td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </table>
                                {{-- min&maxの課題 --}}
                                <table class="w-full text-center border-collapse mb-16">
                                    <tr>
                                        <x-tryce.parts.border-th-s color="bg-yellow-200" />
                                        <x-tryce.parts.border-th-b color="bg-yellow-200" value="MIN目標" />
                                        <x-tryce.parts.border-th-b color="bg-yellow-200" value="MAX目標" />
                                    </tr>
                                    @foreach ($objective as $objectives)
                                        @if ($objectives->team->id == $teams->id && $objectives->month->id == $months->id)
                                            <tr>
                                                <x-tryce.parts.border-td>
                                                    {{ $objectives->user->name }}
                                                </x-tryce.parts.border-td>
                                                <x-tryce.parts.border-td>
                                                    {{ $objectives->assignments[1]->name }}
                                                </x-tryce.parts.border-td>
                                                <x-tryce.parts.border-td width="w-2/5">
                                                    {{ $objectives->assignments[2]->name }}
                                                </x-tryce.parts.border-td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </table>
                                {{-- 目標に対しての根拠 --}}
                                <table class="w-full text-center border-collapse mb-16">
                                    <tr>
                                        <x-tryce.parts.border-th-s color="bg-red-200" />
                                        <x-tryce.parts.border-th-b color="bg-red-200" value="MIN目標の根拠" />
                                        <x-tryce.parts.border-th-b color="bg-red-200" value="MAX目標の根拠" />
                                    </tr>
                                    @foreach ($objective as $objectives)
                                        @if ($objectives->team->id == $teams->id && $objectives->month->id == $months->id)
                                            <tr>
                                                <x-tryce.parts.border-td>
                                                    {{ $objectives->user->name }}
                                                </x-tryce.parts.border-td>
                                                <x-tryce.parts.border-td>
                                                    {{ $objectives->assignment_min_text }}
                                                </x-tryce.parts.border-td>
                                                <x-tryce.parts.border-td width="w-2/5">
                                                    {{ $objectives->assignment_max_text }}
                                                </x-tryce.parts.border-td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </table>
                                {{-- 未達成要素＆対策欄 --}}
                                <table class="w-full text-center border-collapse mb-16">
                                    <tr>
                                        <x-tryce.parts.border-th-s color="bg-blue-200" />
                                        <x-tryce.parts.border-th-b color="bg-blue-200" value="起こりうる未達成要素" />
                                        <x-tryce.parts.border-th-b color="bg-blue-200" value="対策" />
                                    </tr>
                                    @foreach ($objective as $objectives)
                                        @if ($objectives->team->id == $teams->id && $objectives->month->id == $months->id)
                                            <tr>
                                                <x-tryce.parts.border-td>
                                                    {{ $objectives->user->name }}
                                                </x-tryce.parts.border-td>
                                                <x-tryce.parts.border-td>
                                                    {{ $objectives->not_actived_text }}
                                                </x-tryce.parts.border-td>
                                                <x-tryce.parts.border-td width="w-2/5">
                                                    {{ $objectives->measures_text }}
                                                </x-tryce.parts.border-td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </table>
                                {{-- 具体的な戦略コメント＆計画 --}}
                                <table class="w-full text-center border-collapse mb-16">
                                    <tr>
                                        <x-tryce.parts.border-th-s color="bg-pink-200" />
                                        <x-tryce.parts.border-th-b color="bg-pink-200" value="目標に向けての具体的な戦略" />
                                    </tr>
                                    @foreach ($objective as $objectives)
                                        @if ($objectives->team->id == $teams->id && $objectives->month->id == $months->id)
                                            <tr>
                                                <x-tryce.parts.border-td>
                                                    {{ $objectives->user->name }}
                                                </x-tryce.parts.border-td>
                                                <x-tryce.parts.border-td>
                                                    {{ $objectives->specific_text }}
                                                </x-tryce.parts.border-td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </table>
                                <table class="w-full text-center border-collapse">
                                    <tr>
                                        <x-tryce.parts.border-th-b color="bg-yellow-500" value="目標に向けての具体的な戦略" />
                                    </tr>
                                    <tr>
                                        <td class="focus:ring-blue-400 focus:border-blue-400 block w-full sm:text-sm border border-black p-2 mb-5"
                                            style="background-color:#FFE3C2; min-height:100px">
                                            {{ $teams->team_rule }}
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        @endforeach
                    </div>
                </div>
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
            font-size: 200px;
            font-weight: lighter;
        }

        .box-border-top {
            border-color: #1CC9D4;
        }
    </style>
</x-adminMaster>
