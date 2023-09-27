@auth
    <x-master title="article_show">
        <x-tryce.articleShow :article="$article" />
    </x-master>
@endauth
@if (auth('admin')->user())
    @auth('admin')
        <x-adminMaster title="adomindahuboard">
            <x-tryce.articleShow :article="$article" />
        </x-adminMaster>
    @endauth
@else
    @guest
        <x-master title="article_show">
            <x-tryce.articleShow :article="$article" />
        </x-master>
    @endguest
@endif
