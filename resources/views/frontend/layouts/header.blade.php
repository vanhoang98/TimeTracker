<div class="l-header">
    <div class="l-header__inner">
        <div class="h-logo">
            <h1>
                <a href="/">
                    <div class="h-logo__img">
                        <img src="{{ asset('images/cmn-pct-logo02.png') }}" alt="" loading="lazy">
                    </div>
                </a>
            </h1>
        </div>

        <div class="l-header__nav">
            <ul>
                <li><a href="">ダッシュボード</a></li>
                <li><a href="">プロジェクト</a></li>
                <li class="active-nav"><a href="">タイムシート</a></li>
                <li><a href="">マイページ</a></li>
                <li><a href="">分析</a></li>
            </ul>
        </div>
        
        <div class="l-header__list-icon">
            <ul>
                <li class="zoom-trigger icon-cmn">
                    <a href="">
                    <img src="{{ asset('images/icon-zoom-out.png') }}" alt="" loading="lazy">
                    </a>
                </li>

                <li class="notifi-trgger icon-cmn">
                    <a href="">
                    <img src="{{ asset('images/icon-notification.png') }}" alt="" loading="lazy">
                    </a>
                </li>
                
                <li class="dropdown-user-detail">
                    <a href="">
                    <div class="dropdown-user-detail">
                        <div class="user-img icon-cmn">
                        <img src="{{ asset('images/icon-user.png') }}" alt="">
                        </div>
                        <div class="user-name"><p>{{ Auth::user()->name }}</p></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="user-name" style="color: white">Log out</button>
                        </form>
                    </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
