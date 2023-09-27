<x-master title="adominCreate">
    @if ($errors->any()) {{--  エラーがあれば出力する --}}
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif

    <div class="login-bg-img relative min-h-screen">
        <div class="wrapper-container m-auto bg-white bg-opacity-30 py-8 px-6 rounded-lg absolute shadow-2xl">
            <div class="my-8">
                <img class="m-auto h-16" src="/images/image 1.png" alt="Tryce tech企業ロゴ">
                <h2 class="font-bold text-center">
                    社内システム<br>
                    管理者ログイン画面
                </h2>
            </div>
            <form class="text-white relative" method="POST" action="{{ route('admin.login') }}"> {{--  routeはここと同じ --}}
                @csrf
                <div class="flex flex-col">
                    <label class="text-xl mt-4" for="email">Email</label>
                    <input class="mt-1 box-none under-line w-auto input-box"type="text" id="email"
                        name="email">
                    <label class="text-xl mt-4" for="password">Password</label>
                    <input class="mt-1 box-none under-line w-auto input-box" type="password" id="password"
                        name="password">
                </div>
                <div class="flex justify-center mt-6">
                    <button
                        class="button-size bg-white bg-opacity-50 text-xs tracking-widest rounded-md py-2 px-4 mt-1  hover:bg-gray-900 hover:bg-opacity-50"
                        type="submit">SIGN IN</button>
                </div>
            </form>
        </div>
    </div>
</x-master>

<style>
    .login-bg-img {
        background: url("../images/m001530_k00023295_1920-1200.jpg")no-repeat center / cover;
        height: 39rem;
    }

    .box-none {
        background: transparent;
        border: none;
    }

    .under-line {
        border-radius: 0px;
        border-bottom: solid 2px white;
    }

    .wrapper-container {
        width: 28rem;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .button-size {
        transition: 150ms;
    }
</style>
