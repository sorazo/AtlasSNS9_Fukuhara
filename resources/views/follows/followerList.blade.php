<x-login-layout>
<!-- アイコン一覧 -->
  <div>
    <h2>フォローワーリスト</h2>
    <ul>
      @foreach($users_id as $user_id)
      <li><a href="{{ route('other.profile',['userId'=>$user_id->id]) }}"><img src="{{ asset('storage/'.$user_id->images) }}"></a></li>
      @endforeach
    </ul>
  </div>
  <!-- 投稿一覧 -->
  <div>
    @foreach($followLists as $followList)
    <ul>
      <li><a href="{{ route('other.profile',['userId'=>$followList->user_id]) }}"><img src="{{ asset('storage/'.$followList->user->images) }}"></a></li>
      <li>{{$followList->user->username}}</li>
      <li>{{$followList->post}}</li>
      <li>{{$followList->created_at->format('Y-m-d H:i')}}</li>
    </ul>
    @endforeach
  </div>

</x-login-layout>
