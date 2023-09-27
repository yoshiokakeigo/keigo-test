<x-tryce.top-form purpose='月間一覧' overview='month' overview_p='right-28'>
    <form action="{{ route('month.store') }}" method="post" class="pb-10 border-b-2  border-blue-500 mb-10">
        @csrf
        <p class="text-center text-2xl font-bold mb-14">月間作成</p>
        <div class="flex justify-center items-center">
            <div class="flex flex-col justify-center items-center">
                <x-tryce.parts.b-lavel for='month-form' value="月間を作成してください" />
                <input type="date" name="month_name" id="monoth-form" class="w-36 rounded-md mt-2 mb-10">
                <div>
                    <x-tryce.parts.button>追加する</x-tryce.parts.button>
                </div>
            </div>
        </div>
    </form>
    <p class="text-center text-2xl font-bold mb-14">月間一覧</p>
    <table class="border-collapse rounded mx-auto">
        @foreach ($months as $month)
            <tr>
                <td class="p-2">{{ $month->month_name }}</td>
                <td class="p-2"><x-tryce.parts.button-a :href="route('month.edit', ['id' => $month->id])">編集</x-tryce.parts.button-a></td>
            </tr>
        @endforeach
    </table>
</x-tryce.top-form>
