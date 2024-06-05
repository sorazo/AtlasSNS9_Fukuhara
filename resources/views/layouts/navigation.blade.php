        <div id="head">
            <h1><a href="top"><img src="{{ asset('images/atlas.png') }}"></a></h1>
            <div id="head_auth">
                <div id="">
                    <p>{{ Auth::user()->username }}さん</p>
                </div>
                <div class="accordion" id="accordionExample">
                    <div>
                        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne"></button>
                        <ul id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <li><a href="/top">ホーム</a></li>
                            <li><a href="/profile">プロフィール</a></li>
                            <li><a href="/logout">ログアウト</a></li>
                        </ul>
                    </div>
                </div>
                <img src="{{ asset('storage/'.Auth::user()->images) }}">
            </div>
        </div>
