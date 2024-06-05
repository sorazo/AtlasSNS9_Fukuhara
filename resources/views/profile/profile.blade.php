<x-login-layout>
<h2>profile編集</h2>
<div>
  <form action="profile/update" method="post" enctype="multipart/form-data">
    @csrf
    <div>
      <label>お名前</label>
      <input type="text" name="username" value="{{ Auth::user()->username }}">
    </div>
    <div>
      <label>メールアドレス</label>
      <input type="mail" name="mail" value="{{ Auth::user()->mail }}">
    </div>
    <div>
      <label>パスワード</label>
      <input type="password" name="password">
    </div>
    <div>
      <label>パスワード確認</label>
      <input type="password" name="password_confirmation">
    </div>
    <div>
      <label>自己紹介</label>
      <input type="text" name="bio" value="{{ Auth::user()->bio }}">
    </div>
    <div>
      <label>アイコン画像</label>
      <input type="file" name="image">
    </div>
    <button type="submit">更新</button>
  </form>
</div>

</x-login-layout>
