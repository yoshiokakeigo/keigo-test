<x-tryce.top-form purpose='月間変更' overview='month' overview_p='right-28'>
    <form action="{{ route('month.update', ['id' => $month->id]) }}" method="post">
        @method('PUT')
        @csrf
        <p class="text-center text-2xl font-bold mb-14">月間編集</p>
        <div class="flex justify-center items-center">
            <div class="flex flex-col justify-center items-center">
                <x-tryce.parts.b-lavel for='month-form' value="月間を編集してください" />
                <input type="date" name="month_name" id="month-form" value="{{ $month->month_name }}"
                    class="w-36 rounded-md mt-2 mb-10">
                <div class="flex gap-10">
                    <x-tryce.parts.button>編集する</x-tryce.parts.button>
                    <x-tryce.parts.button-a :href="route('month.index')" theme="secondary">キャンセル</x-tryce.parts.button-a>
                </div>
            </div>
        </div>
    </form>
</x-tryce.top-form>
