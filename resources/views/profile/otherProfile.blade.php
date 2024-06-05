<x-login-layout>
<h2>other_profile</h2>
<!-- プロフィール -->
<div>
  <div>
    <img src="{{ asset('storage/'.$user->images) }}">
    <table>
      <tr>
        <th>名前</th>
        <td>{{ $user->username }}</td>
      </tr>
      <tr>
        <th>自己紹介</th>
        <td>{{ $user->bio }}</td>
      </tr>
    </table>
  </div>
  <div>
    @if(Auth::user()->is_following($user->id))
      <a href="{{ route('unfollow',['userId'=>$user->id]) }}" class="btn btn-danger btn-lg">フォロー中</a>
      @else
      <a href="{{ route('follow',['userId'=>$user->id]) }}" class="btn btn-primary btn-lg">フォローしよ</a>
      @endif
  </div>
</div>
<!-- 投稿一覧 -->
<div>
@foreach($posts as $post)
  <ul>
    <li><img src="{{ asset('storage/'.$post->user->images) }}"></li>
    <li>{{$post->user->username}}</li>
    <li>{{$post->post}}</li>
    <li>{{$post->created_at->format('Y-m-d H:i')}}</li>
  </ul>
@endforeach
</div>
</x-login-layout>
