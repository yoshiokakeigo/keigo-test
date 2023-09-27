<x-tryce.top-form purpose="個人ページ" overview="User" overview_p="right-64">
    <div class="p-20 bg-gray-100">
        <div class="flex justify-center items-center border-b-2 border-blue-500 text-2xl p-10">
            <p class="border-blue-500 border-r-4 mr-4 px-2">ユーザー名</p>
            <p class="mr-40">{{ $content->getuser->name }}</p>
            <p>日付：</p>
            <p>{{ $content->created_at->format('20y/m/d') }}</p>
        </div>
        <table class="my-5 w-full mb-0" style="border-spacing: 0px 25px;   border-collapse: separate;">
            <x-tryce.parts.user_table value='現状の課題'>
                {{ $content->progress }}</x-tryce.parts.user_table>
            <x-tryce.parts.user_table value='現状の課題'>
                {{ $content->problem }}</x-tryce.parts.user_table>
            <x-tryce.parts.user_table value='悩みに対しての助言'>
                {{ $content->advice }}</x-tryce.parts.user_table>
            <x-tryce.parts.user_table value='来月の目標'>
                {{ $content->next_month_goal }}</x-tryce.parts.user_table>
            <x-tryce.parts.user_table value='その他のメモ'>
                {{ $content->else_memo }}</x-tryce.parts.user_table>
            <div class="back-monument h-72 absolute w-screen right-2 bottom-64 opacity-60"
                style="margin-right: calc(50% - 50vw); margin-left: calc(50% - 50vw); background-image: url('/images/Vector 6.png');">
            </div>
        </table>
    </div>
    <div class="ml-3 flex justify-center content-center mt-16 gap-10 items-center">
        <x-tryce.parts.button-a :href="route('personal.content.edit', ['id' => $content->id])">編集する</x-tryce.parts.button-a>
        <x-tryce.parts.button-a :href="route('personal.index')" theme="secondary">戻る</x-tryce.parts.button-a>
        <form action="{{ route('personal.content.destroy', ['id' => $content->id]) }}" method="post"
            onclick="return confirm('削除してもよろしいですか?');">
            @method('DELETE')
            @csrf
            <input type="image" name="submit" src="/images/rubbish.image1.png" class="big-hover h-5">
        </form>
    </div>
    <style>
        .big-hover {
            transition-duration: .4s;
        }

        .big-hover:hover {
            transform: scale(1.5);
        }
    </style>
</x-tryce.top-form>
