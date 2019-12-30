<a href="#">
    <strong id="following" class="stat">
        {{ count($user->followings)}}
    </strong>
    フォロー中
</a>
<a href="">
    <strong id="followers" class="stat">
        {{count($user->followers)}}
    </strong>
    フォローワー
</a>
<a href="">
    <strong id="statuses" class="stat">
        {{$user->statuses()->count()}}
    </strong>
    投稿
</a>
