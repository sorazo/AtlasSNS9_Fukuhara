<x-login-layout>
<h2>top</h2>
<!-- 投稿フォーム -->
<div class="post_create">
  <img src="{{ asset('storage/'.Auth::user()->images) }}">
  <form action="post/store" method="post">
    @csrf
    <div class="post_content">
      <textarea class="content" placeholder="今日は何をした？" name="content"></textarea>
    </div>
    <div class="post_button">
      <button type="submit"
      class="action"><img src="{{ asset('images/post.png') }}"></button>
    </div>
  </form>
</div>
<!-- 投稿一覧 -->
<div class="post_store">
  @foreach($posts as $post)
  <ul>
    <li><img src="{{ asset('storage/'.$post->user->images) }}"></li>
    <li>{{$post->user->username}}</li>
    <li>{{$post->post}}</li>
    <li>{{$post->created_at->format('Y-m-d H:i')}}</li>
    @if($post->user_id == Auth::user()->id)
    <li data-bs-toggle="modal" data-bs-target="#editModal{{ $post->id }}"><img src="{{ asset('/images/edit.png') }}"></li>
    <li><a href="post/{{ $post->id }}/destroy" onclick="return confirm('本当にいいんですね…？')">削除</a></li>
    @endif
  </ul>

  <!-- モーダル -->
  <div class="modal fade" id="editModal{{ $post->id }}" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <form action="post/update" method="post">
            @csrf
            <textarea class="post_update" name="update_content">{{ $post->post }}</textarea>
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <div class="modal-footer">
              <button type="submit"><img src="{{ asset('/images/edit.png') }}"></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>

</x-login-layout>
