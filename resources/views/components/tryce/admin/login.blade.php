<header>
    <div class="flex mx-20 h-20 justify-center items-center">
        <a href="{{ route('dashboard') }}">
            <img src="/images/image 1.png" class="h-11">
        </a>
        <div class="ml-auto flex justify-center items-center">
            <a href="{{ route('dashboard') }}">
                <img src="/images/Group 14.png" class="h-11">
            </a>
            <div
                class="h-20 flex justify-center text-center items-center bg-gradient-to-r from-blue-600 to-green-400 px-6 ml-10">
                <p class="text-white">
                    管理者様
                </p>
                <div x-data="{ dropdown: false }" class="p-2">
                    <button @click="dropdown = true" class="h-8"><img src="/images/Group 1.png" alt=""
                            class="h-4"></button>
                    <ul @click.away="dropdown = false" x-transition.opacity.duration.150ms x-show="dropdown"
                        class="absolute w-32 border px-1 py-2 bg-gray-50 rounded-md right-36  z-10">
                        <li class="p-2">
                            <a href="{{ route('admin.logout') }}">ログアウト</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
