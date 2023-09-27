<x-tryce.top-form purpose="ユーザー一覧" overview="User" overview_p="right-64">
    <section class="relative -top-10 z-20 mx-72 opacity-95">
        <p class="text-gray-700 mb-10">ユーザーを選択してください</p>
        <div style="display:grid;" class="grid-cols-3">
            @foreach ($users as $user)
                <div class="border-b-2 border-dotted border-blue-500 py-2 mx-2">
                    <p class="text-center font-bold"><a
                            href="{{ route('personal.show', ['id' => $user->id]) }}">{{ $user->name }}</a>
                    </p>
                </div>
            @endforeach
        </div>
    </section>
</x-tryce.top-form>
