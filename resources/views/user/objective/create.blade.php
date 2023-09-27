<x-master title="objective_create">
    <article>
        <div class="relative z-10 mt-10">
            <div class="bg-img-module bg-cover bg-no-repeat">
                <p class="absolute top-36 left-1/3 text-3xl">目標入力画面</p>
                <p class="absolute -top-10 right-56 text-gray-200 app-text-size">form</p>
            </div>
        </div>
    </article>
    {{-- 日付が被っていた場合のエラー文 --}}
    <form action="{{ route('objective.store') }}" method="post" class="relative -top-20 z-20 opacity-90 mx-36">
        @csrf
        @if (session('duplication_month'))
            <x-tryce.parts.alert>{{ session('duplication_month') }}</x-tryce.parts.alert>
        @endif
        <div class="flex">
            <div>
                {{-- 日付を入力欄 --}}
                <x-tryce.parts.b-lavel for="form-month" value="1、日付を入力してください" />
                <select name="month" id="form-month" class="rounded-md bg-gray-100 mt-5">
                    @foreach ($month as $month)
                        <option value="{{ $month->id }}">{{ $month->month_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-16">
                {{-- チーム選択欄 --}}
                <x-tryce.parts.b-lavel for="form-team" value="2、チームを選択してください" />
                <select name="team" id="form-team" class="rounded-md bg-gray-100 mt-5">
                    @foreach ($team as $team)
                        <option value="{{ $team->id }}" @if ($team->id === (int) old('team')) selected @endif>
                            {{ $team->team_name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                {{-- 現状の課題選択欄 --}}
                <x-tryce.parts.b-lavel for="form-now" value="3、現状の課題を選択してください" />
                <x-tryce.parts.select :assignment="$assignment" post_name="now" id="form-now"></x-tryce.parts.select>
            </div>
        </div>
        {{-- MINの課題選択欄&コメント --}}
        <div class="flex gap-28 mb-10">
            <div class="flex flex-col">
                <x-tryce.parts.b-lavel for="form-min" value="4、MIN目標の課題を選択してください" />
                <x-tryce.parts.select :assignment="$assignment" post_name="min" id="form-min"></x-tryce.parts.select>
            </div>
            <div class="flex flex-col gap-3 flex-grow">
                <x-tryce.parts.b-lavel for="form-minComent" value="MIN目標を達成したい根拠を入力してください" />
                @if ($errors->has('assignment_min_text'))
                    <p class="text-red-500">{{ $errors->first('assignment_min_text') }}</p>
                @endif
                <textarea name="assignment_min_text" rows="5"
                    class="focus:ring-blue-400 focus:border-blue-400 mt-1 block sm:text-sm border border-gray-300 rounded-md bg-gray-100"
                    placeholder="MIN目標を達成したい根拠" id="form-minComent">{{ old('assignment_min_text') }}</textarea>
            </div>
        </div>
        {{-- MAXの課題選択欄&コメント --}}
        <div class="flex gap-28 mb-10">
            <div class="flex flex-col">
                <x-tryce.parts.b-lavel for="form-max" value="5、MAX目標の課題を選択してください" />
                <x-tryce.parts.select :assignment="$assignment" post_name="max" id="form-max"></x-tryce.parts.select>
            </div>
            <div class="flex flex-col gap-3 flex-grow">
                <x-tryce.parts.b-lavel for="form-maxComent" value="MAX目標を達成したい根拠を入力してください" />
                @if ($errors->has('assignment_max_text'))
                    <p class="text-red-500">{{ $errors->first('assignment_max_text') }}</p>
                @endif
                <textarea name="assignment_max_text" rows="5"
                    class="focus:ring-blue-400 focus:border-blue-400 mt-1 block sm:text-sm border border-gray-300 rounded-md bg-gray-100"
                    placeholder="MAXも苦行を達成したい根拠" for="form-maxComent">{{ old('assignment_max_text') }}</textarea>
            </div>
        </div>
        {{-- 目標に対しての起こりうる未達成要素を入力してください。 --}}
        <x-tryce.parts.b-lavel for="form-actived" value="6、目標に対して起こりうる未達成要素を入力してください" />
        @if ($errors->has('not_actived_text'))
            <p class="text-red-500">{{ $errors->first('not_actived_text') }}</p>
        @endif
        <textarea name="not_actived_text" rows="4"
            class="focus:ring-blue-400 focus:border-blue-400 block w-full sm:text-sm border border-gray-300 rounded-md p-2 bg-gray-100 mb-10 mt-5"
            placeholder="起こりうる未達成要素" for="form-actived">{{ old('not_actived_text') }}</textarea>
        {{-- 未達成要素に対する対策コメント --}}
        <x-tryce.parts.b-lavel for="form-measures" value="7、未達成要素に対策コメントを入力してください" />
        @if ($errors->has('measures_text'))
            <p class="text-red-500">{{ $errors->first('measures_text') }}</p>
        @endif
        <textarea name="measures_text" rows="4"
            class="focus:ring-blue-400 focus:border-blue-400 block w-full sm:text-sm border border-gray-300 rounded-md p-2 bg-gray-100 mb-10 mt-5"
            placeholder="未達成要素に対する対策" for="form-measures">{{ old('measures_text') }}</textarea>
        {{-- 達成するための具体的な戦略コメント --}}
        <x-tryce.parts.b-lavel for="form-specific" value="8、具体的な戦略コメントを入力してください" />
        @if ($errors->has('specific_text'))
            <p class="text-red-500">{{ $errors->first('specific_text') }}</p>
        @endif
        <textarea name="specific_text" rows="4"
            class="focus:ring-blue-400 focus:border-blue-400 block w-full sm:text-sm border border-gray-300 rounded-md p-2 bg-gray-100 mb-10 mt-5"
            placeholder="具体的な戦略コメント" id="form-specific">{{ old('specific_text') }}</textarea>
        @php
            $user = Auth::user();
        @endphp
        <input type="hidden" name="user_id" value="{{ $user->id }}">
        <div class="flex justify-center items-center gap-10">
            <x-tryce.parts.button>投稿する</x-tryce.parts.button>
            <x-tryce.parts.button-a :href="route('objective.show', ['id' => $user->id])" theme="secondary">キャンセル</x-tryce.parts.button-a>
        </div>
    </form>
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
</x-master>
