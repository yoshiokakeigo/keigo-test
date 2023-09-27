<x-tryce.top-form purpose='カリキュラム一覧' overview='item' overview_p='right-64'>
    <form action="{{ route('curriculum.store') }}" method="post" class="pb-10 border-b-2  border-blue-500 mb-10">
        @csrf
        <p class="text-center text-2xl font-bold mb-14">カリキュラム作成</p>
        <div class="flex justify-center items-center">
            <div class="flex flex-col justify-center items-center">
                <div class="flex gap-20">
                    <div class="flex flex-col">
                        <x-tryce.parts.b-lavel for='currriculum-form' value="カリキュラム名を入力してください" />
                        <input type="text" name="name" id="currriculum-form" class="w-64 rounded-md mt-2 mb-10">
                    </div>
                    <div class="flex flex-col">
                        <x-tryce.parts.b-lavel for='currriculum-number-form' value="単元を入力してください">
                            ※数字のみ</x-tryce.parts.b-lavel>
                        <input type="number" name="unit_index" id="currriculum-number-form"
                            class="w-20 rounded-md mt-2 mb-10" min="0" max="100">
                    </div>
                </div>
                <x-tryce.parts.button>追加する</x-tryce.parts.button>
            </div>
        </div>
    </form>
    <p class="text-center text-2xl font-bold mb-14">カリキュラム一覧</p>
    <div style="display:grid;" class="grid-cols-3">
        @foreach ($curriculums as $curriculum)
            <div class="border-b-2 border-dotted border-blue-500 py-2 mx-2">
                <p class="text-center"><a
                        href="{{ route('curriculum.edit', ['id' => $curriculum->id]) }}">{{ $curriculum->name }}<span
                            class="text-red-500 font-bold ml-4">{{ $curriculum->unit_index }}</span></a>
                </p>
            </div>
        @endforeach
    </div>
</x-tryce.top-form>
