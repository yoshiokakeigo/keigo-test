<x-tryce.top-form purpose='チーム一覧' overview='team'>
    <form action="{{ route('team.store') }}" method="post" class="pb-10 border-b-2  border-blue-500 mb-10">
        @csrf
        <p class="text-center text-2xl font-bold mb-14">チーム作成</p>
        <div class="flex justify-center items-center">
            <div class="flex flex-col justify-center items-center">
                <x-tryce.parts.b-lavel for='team-form' value="チーム名を入力してください" />
                <input type="text" name="team_name" id="team-form" placeholder="チーム名入力"
                    class="w-64 rounded-md mt-2 mb-10">
                <div>
                    <x-tryce.parts.button>追加する</x-tryce.parts.button>
                </div>
            </div>
        </div>
    </form>
    <p class="text-center text-2xl font-bold mb-14">チーム一覧</p>
    <table class="border-collapse rounded mx-auto">
        @foreach ($teams as $team)
            <tr>
                <td class="p-2">{{ $team->team_name }}</td>
                <td class="p-2"><x-tryce.parts.button-a :href="route('team.edit', ['id' => $team->id])">編集</x-tryce.parts.button-a></td>
            </tr>
        @endforeach
    </table>
</x-tryce.top-form>
