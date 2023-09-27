<x-adminMaster title="adomindahuboard">
    <div class="p-4">
        <div class="bg-img-module bg-cover bg-no-repeat">
            <p class="absolute top-60 left-1/4 text-3xl">社内記事編集画面</p>
            <p class="absolute right-1/4 text-gray-200 app-text-size">article</p>
        </div>
        <h2 class="text-3xl text-center font-extrabold">社内記事編集画面</h2>
        <form class="w-10/12 m-auto" action="{{ route('dashboard.update', ['id' => $article->id]) }}" method="post"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="my-20">
                <p>タイトルを入力してください<span class="text-red-600">※必須</span></p>
                <textarea name="title" rows="3"
                    class="bg-gray-100 focus:ring-blue-400 focus:border-blue-400 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md p-2"
                    placeholder="タイトルを入力">{{ $article->title }}</textarea>
            </div>
            <div class="my-20">
                <p>本文を入力してください<span class="text-red-600">※必須</span></p>
                <textarea name="content" rows="3"
                    class="h-40 bg-gray-100 focus:ring-blue-400 focus:border-blue-400 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md p-2"
                    placeholder="本文を入力">{{ $article->content }}</textarea>
            </div>
            <x-tryce.images :images="$article->images" />
            <div class="flex flex-wrap justify-center gap-10 mt-10 mb-20">
                <x-tryce.parts.button>編集</x-tryce.parts.button>
                <x-tryce.parts.button-a :href="route('dashboard')" theme="secondary">キャンセル</x-tryce.parts.button-a>
            </div>
        </form>
    </div>
</x-adminMaster>

<style>
    .bg-img-module {
        background-image: url('/images/Group 32.png');
        width: 800px;
        height: 400px;
    }

    .app-text-size {
        font-size: 120px;
    }

    .absolute-position {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
    }

    .absolute1 {
        bottom: 20%;
    }

    .absolute2 {
        bottom: 2%;
    }
</style>
