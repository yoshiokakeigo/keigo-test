<x-tryce.top-form purpose="投稿ページ" overview="User" overview_p="right-64">
    <div class="flex justify-center items-center border-b-2 border-blue-500 text-2xl p-10 mb-5">
        <p class="border-blue-500 border-r-4 mr-4 px-2">ユーザー名</p>
        <p>{{ $personal->name }}</p>
    </div>
    <form action="{{ route('personal.content.store') }}" method="post">
        @csrf
        <div class="flex flex-col gap-10 p-10">
            <div class="flex gap-10">
                <div class="flex flex-col flex-grow">
                    <label for="form-now" class="mb-3">達成状況</label>
                    <input type="text" name='progress'placeholder='達成状況' id="form-now"
                        class="border-gray-300 rounded-md p-2" value="{{ old('text') }}">
                </div>
                <div class="flex flex-col flex-grow">
                    <label for="form-worries" class="mb-3">現状の悩み</label>
                    <textarea name="problem" rows="5" id="form-worries"
                        class="focus:ring-blue-400 focus:border-blue-400 block w-full sm:text-sm border border-gray-300 rounded-md p-2"
                        placeholder="現状の悩み">{{ old('problem') }}</textarea>
                </div>
            </div>
            <div>
                <label for="form-advice">悩みに対しての助言</label>
                <textarea name="advice" rows="5" id="form-advice"
                    class="focus:ring-blue-400 focus:border-blue-400 mt-3 block w-full sm:text-sm border border-gray-300 rounded-md p-2"
                    placeholder="悩みに対しての助言">{{ old('advice') }}</textarea>
            </div>
            <div>
                <label for="form-next">来月の目標</label>
                <textarea name="next_month_goal" rows="5" id="form-next"
                    class="focus:ring-blue-400 focus:border-blue-400 mt-3 block w-full sm:text-sm border border-gray-300 rounded-md p-2"
                    placeholder="来月の目標">{{ old('next_month_goal') }}</textarea>
            </div>
            <div>
                <label for="form-memo">その他メモ<span class="text-red-500 ml-3">※投稿者名を必ず記名してください</span></label>
                <textarea name="else_memo" rows="5" id="form-memo"
                    class="focus:ring-blue-400 focus:border-blue-400 mt-3 block w-full sm:text-sm border border-gray-300 rounded-md p-2"
                    placeholder="その他メモ[投稿者名を必ず記名してください]">{{ old('else_memo') }}</textarea>
                <div class="flex flex-wrap justify-end">
                </div>
            </div>
            <input type="hidden" name="user_id" value="{{ $personal->id }}">
            <div class="flex items-center justify-center gap-10">
                <x-tryce.parts.button>投稿</x-tryce.parts.button>
                <x-tryce.parts.button-a :href="route('personal.show', ['id' => $personal->id])" theme="secondary">キャンセル</x-tryce.parts.button-a>
            </div>
        </div>
    </form>
</x-tryce.top-form>
