<x-tryce.top-form purpose='カリキュラム編集' overview='item' overview_p='right-64'>
    <form action="{{ route('curriculum.update', ['id' => $curriculum->id]) }}" method="post">
        @method('PUT')
        @csrf
        <p class="text-center text-2xl font-bold mb-14">カリキュラム名編集</p>
        <div class="flex justify-center items-center">
            <div class="flex flex-col justify-center items-center">
                <div class="flex gap-20">
                    <div class="flex flex-col">
                        <x-tryce.parts.b-lavel for='currriculum-form' value="カリキュラム名を入力してください" />
                        <input type="text" name="name" id="currriculum-form" class="w-64 rounded-md mt-2 mb-10"
                            value="{{ $curriculum->name }}">
                    </div>
                    <div class="flex flex-col">
                        <x-tryce.parts.b-lavel for='currriculum-number-form' value="単元を入力してください">
                            ※数字のみ</x-tryce.parts.b-lavel>
                        <input type="number" name="unit_index" id="currriculum-number-form"
                            class="w-20 rounded-md mt-2 mb-10" min="0" max="100"
                            value="{{ $curriculum->unit_index }}">
                    </div>
                </div>
                <div class="flex gap-10">
                    <x-tryce.parts.button>編集する</x-tryce.parts.button>
                    <x-tryce.parts.button-a :href="route('curriculum.index')" theme="secondary">キャンセル</x-tryce.parts.button-a>
                </div>
            </div>
        </div>
    </form>
</x-tryce.top-form>
