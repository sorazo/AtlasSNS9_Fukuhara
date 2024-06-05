<x-login-layout>
<h2>search</h2>
<!-- 検索フォーム -->
<div>
  <div>
    <form action="search">
      @csrf
      <input type="text" name="keyword" placeholder="ユーザー名">
      <button type="submit"><img src="{{asset('storage/search.png')}}"></button>
    </form>
  </div>
  @if(!empty($search))
  <div>
    <p>検索ワード：{{$search}}</p>
  </div>
  @endif
</div>
<!-- ユーザー一覧 -->
<div class="post_store">
  @foreach($users as $user)
    @if($user->id !== Auth::user()->id)
    <ul>
      <li><img src="{{ asset('storage/'.$user->images) }}"></li>
      <li>{{$user->username}}</li>
      @if(Auth::user()->is_following($user->id))
      <li><a href="{{ route('unfollow',['userId'=>$user->id]) }}" class="btn btn-danger btn-lg">フォロー中</a>
      @else
      <li><a href="{{ route('follow',['userId'=>$user->id]) }}" class="btn btn-primary btn-lg">フォローしよ</a></li>
      @endif
    </ul>
    @endif
  @endforeach
</div>

</x-login-layout>
