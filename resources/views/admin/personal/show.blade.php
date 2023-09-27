<x-tryce.top-form purpose="個人ページ" overview="User" overview_p="right-64">
    <div class="p-16 border-b-2 border-blue-500 mb-16">
        <div class="flex justify-center items-center mb-10">
            <p class="border-blue-500 border-r-4 mr-4 px-2 text-lg font-bold">ユーザー名</p>
            <p class="mr-20 text-lg font-bold">{{ $personal->name }}</p>
            <x-tryce.parts.button-a :href="route('personal.content.create', ['id' => $personal->id])">新規投稿</x-tryce.parts.button-a>
            <div class="ml-3">
                <x-tryce.parts.button-a :href="route('personal.index')" theme="secondary">戻る</x-tryce.parts.button-a>
            </div>
        </div>
        <x-tryce.parts.graph :user_information="$user_information" :curriculum="$curriculum" />
    </div>
    <div class="grid-cols-4 gap-10" style="display:grid">
        @foreach ($personal->getPersonal as $content)
            <div class="flex flex-col justify-center items-center">
                <a href="{{ route('personal.content.show', ['id' => $content->id]) }}" class="mb-3">
                    <img src="/images/istockphoto-1175215972-612x612 2.png" alt="">
                    <a href="{{ route('personal.content.show', ['id' => $content->id]) }}">
                        <p>投稿日：{{ $content->created_at->format('20y/m/d') }}
                    </a>
                    </p>
            </div>
        @endforeach
    </div>
</x-tryce.top-form>
