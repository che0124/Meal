@extends('layouts.app')

@section('content')

<body>
    <style>
        .container_s {
            position:absolute;
            margin-left: 220px;
            background-color: black;
            /* background-image: url(http://localhost:8080/Meal/public/images/clipart2544596.svg); */
            opacity: 0.3;
        }

        .surprise-container {
            display: flex;
            flex-direction: column;
            text-align: center;
            /* background-color: pink; */
            position:relative;
        }

        .surprise-item {
            margin-top: 20px;
            /* background-color:green; */
        }

        #randomButton {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            background-color: #A67B5B;
            color: white;
        }


        #randomButton:hover {
            background-color: #7A5230;
            /* cursor: pointer; */
        }

        #randomRestaurant {
            margin-top: 20px;
            font-size: 18px;
            color: #333;
        }
    </style>
    <div class="surprise-container">
        <div class="container_s"></div>
        <div class="container">


            <div class="surprise-item">
                <h1 class="page-title">驚喜包</h1>
                <!-- 在模板中添加一个按钮 -->
                <button id="randomButton">驚喜按鈕</button>
            </div>
            <div class="surprise-item">
                <div id="random"></div>
            </div>
        </div>
    </div>

    <!-- 输出隨機選擇的餐廳 -->
    @php
    // 将集合转换为数组
    $postsArray = $posts->toArray();
    // 如果集合不为空
    $randomPost = [
    'restaurant' => 'No restaurants found',
    'date' => '',
    'time' => 'No time found'
    ];
    if (!empty($postsArray)) {
    // 随机选择一个项目
    $randomIndex = array_rand($postsArray);
    $randomPost = $postsArray[$randomIndex];
    }
    @endphp

    <!-- JavaScript 代码 -->
    <script>
        // 将 PHP 变量传递到 JavaScript 中
        var postsArray = @json($postsArray);
        var randomPost = @json($randomPost);


        // 定义一个函数用于获取随机数据并更新页面显示
        function getRandom() {
            // 如果 postsArray 不为空，则重新随机选择一个项目
            if (postsArray.length > 0) {
                var randomIndex = Math.floor(Math.random() * postsArray.length);
                randomPost = postsArray[randomIndex];
            } else {
                randomPost = {
                    restaurant: 'No restaurants found',
                    date: '',
                    time: 'No time found'
                };
            }

            // 将随机选择的餐厅显示在页面上
            document.getElementById('random').innerHTML = '<div style="text-align: center; font-size: 32px;">' + randomPost
                .restaurant + '<br>' + randomPost.date + '<br>' + randomPost.time + '<br></div>';
        }

        // 当按钮被点击时触发事件
        document.getElementById('randomButton').addEventListener('click', function() {
            // 调用函数获取随机数据并更新页面显示
            getRandom();
        });
    </script>


    </div>
</body>
@endsection

@push('scripts')
<script>
    window.onload = function() {
        var surpriseSVG = document.getElementById('surpriseSVG');
        if (surpriseSVG) {
            // Clear existing content
            surpriseSVG.innerHTML = '';

            // Add new SVG content
            surpriseSVG.innerHTML = `
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M11.1 7.19043H4C3.05719 7.19043 2.58579 7.19043 2.29289 7.48332C2 7.77622 2 8.24762 2 9.19043V11.0234C2 11.9662 2 12.4377 2.29289 12.7305C2.5452 12.9829 2.92998 13.0178 3.63447 13.0227H11.1V7.19043ZM5.33333 14.8227V20.1904C5.33333 21.1332 5.33333 21.6046 5.62623 21.8975C5.91912 22.1904 6.39052 22.1904 7.33333 22.1904H11.1V14.8227H5.33333ZM12.9 22.1904H16.6667C17.6095 22.1904 18.0809 22.1904 18.3738 21.8975C18.6667 21.6046 18.6667 21.1332 18.6667 20.1904V14.8227H12.9V22.1904ZM20.7724 13.0227C21.0648 13.0198 21.2388 13.0069 21.3827 12.9473C21.6277 12.8458 21.8224 12.6511 21.9239 12.4061C22 12.2223 22 11.9894 22 11.5234V9.19043C22 8.24762 22 7.77622 21.7071 7.48332C21.4142 7.19043 20.9428 7.19043 20 7.19043H12.9V13.0227H20.7724Z"
                    fill="currentColor" />
                    <path
                    d="M16.2645 6.12593L17.8184 5.69084C18.517 5.49523 19 4.85846 19 4.13298C19 3.06172 17.9776 2.28627 16.946 2.57512L16.6334 2.66265C15.2274 3.05634 13.9216 3.74582 12.8036 4.68496L12 5.36V6.2H15.7253C15.9076 6.2 16.089 6.17508 16.2645 6.12593Z"
                    fill="currentColor" />
                    <path
                    d="M7.73546 6.12593L6.18158 5.69084C5.48297 5.49523 5 4.85846 5 4.13298C5 3.06172 6.0224 2.28627 7.05398 2.57512L7.3666 2.66265C8.77264 3.05634 10.0784 3.74582 11.1964 4.68496L12 5.36V6.2H8.27472C8.09243 6.2 7.91099 6.17508 7.73546 6.12593Z"
                    fill="currentColor" />
                    </svg>`;

            var navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(function(link) {
                link.addEventListener('click', function() {
                    surpriseSVG.innerHTML = `
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
                            </svg>`;
                });
            });
        }
    };
</script>