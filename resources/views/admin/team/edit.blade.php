<x-tryce.top-form purpose='チーム名変更' overview='team'>
    <form action="{{ route('team.update', ['id' => $team->id]) }}" method="post">
        @method('PUT')
        @csrf
        <p class="text-center text-2xl font-bold mb-14">チーム名編集</p>
        <div class="flex justify-center items-center">
            <div class="flex flex-col justify-center items-center">
                <x-tryce.parts.b-lavel for='team-form' value="チーム名を入力してください" />
                <input type="text" name="team_name" id="team-form" value="{{ $team->team_name }}" placeholder="チーム名入力"
                    class="w-64 rounded-md mt-2 mb-10">
                <div class="flex gap-10">
                    <x-tryce.parts.button>編集する</x-tryce.parts.button>
                    <x-tryce.parts.button-a :href="route('team.index')" theme="secondary">キャンセル</x-tryce.parts.button-a>
                </div>
            </div>
        </div>
    </form>
</x-tryce.top-form>
