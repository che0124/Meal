<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css'])

</head>

<body>
    <div id="app">
        <div class="navbar">
            <div class="nav-brand">
                <a class="nav-link-brand" href="{{ url('/') }}">
                    <img src="http://localhost:8080/Meal/public/images/logo.svg" alt="logo" height="40px"
                        width="100px" />
                </a>
            </div>

            <div class="nav-item-list">
                <!-- 首頁 -->
                <div class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">
                        <div class="nav-link-icon-title">
                            <div class="nav-link-icon">
                                <svg aria-label="首頁" id="homeSVG" fill="currentColor" height="24" role="img"
                                    viewBox="0 0 24 24" width="24">
                                    <title>首頁</title>
                                    <path
                                        d="M9.005 16.545a2.997 2.997 0 0 1 2.997-2.997A2.997 2.997 0 0 1 15 16.545V22h7V11.543L12 2 2 11.543V22h7.005Z"
                                        fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2">
                                    </path>
                                </svg>
                            </div>

                            <div class="nav-link-title">
                                <span class="nav-title">首頁</span>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- 創建飯局 -->
                <div class="nav-item">
                    <a class="nav-link {{ Request::is('posts/create') ? 'active' : '' }}"
                        href="{{ route('posts.create') }}">
                        <div class="nav-link-icon-title">
                            <div class="nav-link-icon">
                                <svg aria-label="新貼文" id="createSVG" fill="currentColor" height="24" role="img"
                                    viewBox="0 0 24 24" width="24">
                                    <title>新貼文</title>
                                    <path
                                        d="M2 12v3.45c0 2.849.698 4.005 1.606 4.944.94.909 2.098 1.608 4.946 1.608h6.896c2.848 0 4.006-.7 4.946-1.608C21.302 19.455 22 18.3 22 15.45V8.552c0-2.849-.698-4.006-1.606-4.945C19.454 2.7 18.296 2 15.448 2H8.552c-2.848 0-4.006.699-4.946 1.607C2.698 4.547 2 5.703 2 8.552Z"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2"></path>
                                    <line fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" x1="6.545" x2="17.455"
                                        y1="12.001" y2="12.001"></line>
                                    <line fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" x1="12.003" x2="12.003"
                                        y1="6.545" y2="17.455"></line>
                                </svg>
                            </div>
                            <div class="nav-link-title">
                                <span class="nav-title">創建飯局</span>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- 驚喜包 -->
                <div class="nav-item">
                    <a class="nav-link {{ Request::is('surprise') ? 'active' : '' }}" href="{{ route('surprise') }}">
                        <div class="nav-link-icon-title">
                            <div class="nav-link-icon">
                                <svg id="surpriseSVG" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2 9C2 8.05719 2 7.58579 2.29289 7.29289C2.58579 7 3.05719 7 4 7H20C20.9428 7 21.4142 7 21.7071 7.29289C22 7.58579 22 8.05719 22 9V11.5833C22 12.2064 22 12.5179 21.866 12.75C21.7783 12.902 21.652 13.0283 21.5 13.116C21.2679 13.25 20.9564 13.25 20.3333 13.25V13.25C19.7103 13.25 19.3987 13.25 19.1667 13.384C19.0146 13.4717 18.8884 13.598 18.8006 13.75C18.6667 13.9821 18.6667 14.2936 18.6667 14.9167V20C18.6667 20.9428 18.6667 21.4142 18.3738 21.7071C18.0809 22 17.6095 22 16.6667 22H7.33333C6.39052 22 5.91912 22 5.62623 21.7071C5.33333 21.4142 5.33333 20.9428 5.33333 20V14.9167C5.33333 14.2936 5.33333 13.9821 5.19936 13.75C5.11159 13.598 4.98535 13.4717 4.83333 13.384C4.60128 13.25 4.28974 13.25 3.66667 13.25V13.25C3.04359 13.25 2.73205 13.25 2.5 13.116C2.34798 13.0283 2.22174 12.902 2.13397 12.75C2 12.5179 2 12.2064 2 11.5833V9Z"
                                        stroke="currentColor" stroke-width="2" />
                                    <path d="M4 13.25H20" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" />
                                    <path d="M12 7L12 21" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" />
                                    <path
                                        d="M12 6L11.1214 5.12144C10.0551 4.05514 8.75521 3.25174 7.3246 2.77487V2.77487C6.18099 2.39366 5 3.24487 5 4.45035V4.63246C5 5.44914 5.52259 6.1742 6.29737 6.43246L8 7"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                    <path
                                        d="M12 6L12.8786 5.12144C13.9449 4.05514 15.2448 3.25174 16.6754 2.77487V2.77487C17.819 2.39366 19 3.24487 19 4.45035V4.63246C19 5.44914 18.4774 6.1742 17.7026 6.43246L16 7"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                </svg>

                            </div>
                            <div class="nav-link-title">
                                <span class="nav-title">驚喜包</span>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- 我要假奔 -->
                <div class="nav-item">
                    <a class="nav-link {{ Request::is('posts') ? 'active' : '' }}" href="{{ route('posts.index') }}">
                        <div class="nav-link-icon-title">
                            <div class="nav-link-icon">
                                <svg id="joinSVG" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="11.5" cy="10.5" r="8.5" stroke="currentColor"
                                        stroke-width="2" />
                                    <path
                                        d="M11 6C10.4747 6 9.95457 6.10346 9.46927 6.30448C8.98396 6.5055 8.54301 6.80014 8.17157 7.17157C7.80014 7.54301 7.5055 7.98396 7.30448 8.46927C7.10346 8.95457 7 9.47471 7 10"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                    <path d="M23 22L18 17" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" />
                                </svg>
                            </div>
                            <div class="nav-link-title">
                                <span class="nav-title">我要假奔</span>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- 通知 -->
                {{-- <div class="nav-item">
                    <a href="#" class="nav-link" id="notifyButton">
                        <div class="nav-link-icon-title">
                            <div class="nav-link-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.84778 7.52342C6.1872 4.38139 8.83969 2 12 2C15.1603 2 17.8128 4.38139 18.1522 7.52342L18.4533 10.3105C18.4832 10.5871 18.4981 10.7255 18.5176 10.8618C18.6507 11.7924 18.9467 12.6922 19.3921 13.52C19.4574 13.6413 19.5275 13.7614 19.6677 14.0018L20.3169 15.1147C21.0299 16.3369 21.3863 16.948 21.1655 17.4222C21.1414 17.4739 21.1129 17.5234 21.0804 17.5703C20.7821 18 20.0746 18 18.6597 18H5.34029C3.92536 18 3.2179 18 2.91957 17.5703C2.88706 17.5234 2.85862 17.4739 2.83455 17.4222C2.61366 16.948 2.97013 16.3369 3.68307 15.1147L4.33228 14.0018C4.47249 13.7614 4.54259 13.6413 4.60787 13.52C5.05327 12.6922 5.3493 11.7924 5.48238 10.8618C5.50188 10.7255 5.51682 10.5871 5.54671 10.3105L5.84778 7.52342Z"
                                        fill="none" stroke="currentColor" stroke-width="2" />
                                    <path
                                        d="M9 18.5C9 18.8283 9.0776 19.1534 9.22836 19.4567C9.37913 19.76 9.6001 20.0356 9.87868 20.2678C10.1573 20.4999 10.488 20.6841 10.8519 20.8097C11.2159 20.9353 11.606 21 12 21C12.394 21 12.7841 20.9353 13.1481 20.8097C13.512 20.6841 13.8427 20.4999 14.1213 20.2678C14.3999 20.0356 14.6209 19.76 14.7716 19.4567C14.9224 19.1534 15 18.8283 15 18.5"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                </svg>

                            </div>

                            <div class="nav-link-title">
                                <span class="nav-title">通知</span>
                            </div>
                        </div>
                    </a>
                </div> --}}
                <!-- 個人檔案 -->
                <div class="nav-item">
                    <a class="nav-link {{ Request::is('users/*') ? 'active' : '' }}"
                        href="{{ route('profiles.show', ['profile' => Auth::user()->id]) }}">
                        <div class="nav-link-icon-title">
                            <div class="nav-link-icon">
                                <svg id="profileSVG" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="12" cy="10" r="3" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" />
                                    <circle cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="2" />
                                    <path
                                        d="M17.8566 19.8659C17.9429 19.805 17.9829 19.6969 17.9538 19.5954C17.5809 18.2982 16.8212 17.1542 15.7814 16.3284C14.6966 15.467 13.3674 15 12 15C10.6326 15 9.30341 15.467 8.21858 16.3284C7.17876 17.1542 6.41914 18.2982 6.04624 19.5954C6.01707 19.6969 6.05708 19.805 6.14335 19.8659V19.8659C9.65447 22.3443 14.3455 22.3443 17.8566 19.8659V19.8659Z"
                                        fill="currentColor" />
                                </svg>

                            </div>

                            <div class="nav-link-title">
                                <span class="nav-title">個人檔案</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- 更多 -->
            <div class="nav-last">
                <div class="nav-item">
                    <a href="#" class="nav-link-last" id="menuButton">
                        <div class="nav-link-icon-title">
                            <div class="nav-link-icon">
                                <div class="nav-link-icon">
                                    <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3 5L23 5" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" />
                                        <path d="M3 13L23 13" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" />
                                        <path d="M3 21L23 21" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" />
                                    </svg>
                                </div>
                            </div>
                            <div class="nav-link-title">
                                <span class="nav-title">更多</span>
                            </div>
                        </div>
                    </a>
                    <!-- 選單 -->
                    <div class="popup-menu" id="popupMenu">
                        <div class="notify-item-container">
                            <div class="menu-item">
                                <a class="menu-link" href="{{ route('turntable') }}">
                                    <span>轉盤</span>
                                </a>
                            </div>
                            <div class="menu-item" id="logout">
                                <span class="nav-title">登出</span>
                                <form action="{{ route('logout') }}" method="POST" style="display: none;"
                                    id="logoutForm">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <main>
        @yield('content')
    </main>
    <script>
        //notify
        document.addEventListener('DOMContentLoaded', () => {
            const notifyButton = document.getElementById('notifyButton');
            const popupNotify = document.getElementById('popupNotify');

            // Event listener for the menu button
            notifyButton.addEventListener('click', function toggleMenu(event) {
                if (popupNotify.style.display === 'block') {
                    popupNotify.style.display = 'none';
                } else {
                    popupNotify.style.display = 'block';
                }
            });

            // Event listener for clicks outside the popup menu to close it
            document.addEventListener('click', (event) => {
                if (!popupNotify.contains(event.target) && !popupNotify.contains(event.target)) {
                    popupNotify.style.display = 'none';
                }
            });
        });

        // menu
        document.addEventListener('DOMContentLoaded', () => {
            const menuButton = document.getElementById('menuButton');
            const popupMenu = document.getElementById('popupMenu');

            // Event listener for the menu button
            menuButton.addEventListener('click', function toggleMenu(event) {
                event.preventDefault(); // Prevent the default anchor behavior

                if (popupMenu.style.display === 'block') {
                    popupMenu.style.display = 'none';
                } else {
                    popupMenu.style.display = 'block';
                }
            });

            // Event listener for clicks outside the popup menu to close it
            document.addEventListener('click', (event) => {
                if (!popupMenu.contains(event.target) && !menuButton.contains(event.target)) {
                    popupMenu.style.display = 'none';
                }
            });
        });

        // submit logout form 
        var logout = document.getElementById('logout');
        logout.addEventListener('click', function() {
            var form = document.getElementById('logoutForm');
            form.submit();
        });
    </script>
    </div>
    @stack('scripts')
</body>

</html>