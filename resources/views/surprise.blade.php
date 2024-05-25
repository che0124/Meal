@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="page-title" style="margin-top: 60px;">驚喜包</h1>
    <head>
        <title>驚喜包轉盤</title>
        <style>
            * {
                margin: 0;
                padding: 0;
            }

            html,
            body {
                height: 100%;
            }

            ul {
                list-style: none;
            }

            @keyframes white-to-yellow {
                0% {
                    background: #fff;
                }

                100% {
                    background: #d7a945;
                }
            }

            @keyframes heartbeat {
                0% {
                    transform: scale(1);
                }

                25% {
                    transform: scale(0.8);
                }

                50% {
                    transform: scale(1.2);
                }

                75% {
                    transform: scale(0.9);
                }

                100% {
                    transform: scale(1);
                }
            }

            .turntable-wrap {
                position: relative;
                overflow: hidden;
                margin: 50px;
                width: 340px;
                height: 340px;
                border: 7px solid #b2a98d;
                border-radius: 50%;
                box-shadow: 0 0 20px #b2a98d;
            }

            .turntable-wrap .light {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: #e0ddd1;
                animation: rotate 5s linear infinite;
            }

            .turntable-wrap .light span {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                margin: 0 auto;
                width: 10px;
                height: 100%;
                border-radius: 50%;
                transform-origin: center center;
            }

            .turntable-wrap .light span:before {
                content: '';
                position: absolute;
                top: 5px;
                left: 0;
                right: 0;
                margin: 0 auto;
                width: 10px;
                height: 10px;
                border-radius: 50%;
            }

            .turntable-wrap .light span:nth-of-type(even):before {
                background: #fff;
                animation: white-to-yellow 1s linear infinite;
            }

            .turntable-wrap .light span:nth-of-type(odd):before {
                background: #d7a945;
                animation: white-to-yellow 1s linear reverse infinite;
            }

            .turntable-wrap .turntable {
                position: absolute;
                margin: 20px;
                width: 300px;
                height: 300px;
                border-radius: 50%;
                background: #fff;
            }

            .turntable-wrap .turntable .bg {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: #fff;
                border: 1px solid #dfd8be;
                border-radius: 50%;
                transform: rotate(72deg);
            }

            .turntable-wrap .turntable .bg li {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                margin: 0 auto;
                width: 1px;
                height: 100%;
                background: #dfd8be;
                transform-origin: center center;
                /*transform: rotate(36deg);*/
            }

            .turntable-wrap .turntable .gift {
                position: relative;
                width: 100%;
                height: 100%;
                transform: rotate(63deg);
            }

            .turntable-wrap .turntable .gift li {
                position: absolute;
                top: 5%;
                left: 5%;
                width: 45%;
                height: 45%;
                transform-origin: right bottom;
            }

            .turntable-wrap .turntable .gift li span {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                display: block;
                width: 50px;
                height: 70px;
                margin: auto;
                background: yellow;
                transform: rotate(-60deg);
                text-align: center;
                line-height: 80px;
                border-radius: 5px;
                background: #f23c3c;
                color: #fff;
                font-size: 24px;
            }

            .turntable-wrap .turntable .gift li:not(.no-gift) span:before {
                content: '';
                position: absolute;
                top: 15px;
                left: 0;
                width: 50px;
                height: 1px;
                background: #fff;
            }

            .turntable-wrap .turntable .gift li.no-gift span {
                background: #fff;
                line-height: 70px;
                color: #bfa74f;
                font-size: 12px;
            }

            .turntable-wrap .pointer {
                box-sizing: border-box;
                position: absolute;
                top: 50%;
                left: 0;
                right: 0;
                margin: -23px auto;
                width: 46px;
                height: 46px;
                border-radius: 50%;
                background: #fff;
                border: 5px solid #fff;
                box-shadow: 0 0 0 5px #b9a046;
                text-align: center;
                line-height: 16px;
                color: #b9a046;
                font-size: 14px;
                font-weight: 700;
                cursor: pointer;
            }

            .turntable-wrap .pointer:before {
                content: '';
                position: absolute;
                top: -58px;
                left: 0;
                right: 0;
                margin: 0 auto;
                width: 0;
                border-style: solid;
                border-color: transparent transparent #b9a046 transparent;
                border-width: 25px 10px 25px 10px;
            }
        </style>
    </head>

    <body>
        <div class="turntable-wrap">
            <div class="light" id="turntable_light"></div>
            <div class="turntable" id="turntable">
                <ul class="bg" id="turntable_bg"></ul>
                <ul class="gift" id="turntable_gift"></ul>
            </div>
            <div class="pointer disabled" id="turntable_pointer">點擊開始</div>
        </div>

        <script>
            let turntable = {
                itemNum: 10, // 轉盤平均分幾塊

                lightNum: 18, // 燈
                light: null, // 燈容器

                turntable: null, // 轉盤

                bg: null, // 轉盤背景

                gift: null, // 中獎結果圖

                pointer: null, // 指針

                lottery: [], // 中獎

                typeMap: { 1: '1', 2: '2', 3: '3', 4: '4', 5: '5', 6: '6', 7: '7', 8: '8', 9: '9', 10: '10' },
                typeClassMap: { 1: 'no-gift', 2: 'no-gift', 3: 'no-gift', 4: 'no-gift', 5: 'no-gift', 6: 'no-gift', 7: 'no-gift', 8: 'no-gift', 9: 'no-gift', 10: 'no-gift' },

                isGoing: false, // 遊戲是否開始

                init() {
                    if (!this.lottery.length) {
                        this.pointer.style.display = 'none';
                        throw new Error('請設置中獎結果數據');
                    }

                    // 燈初始化
                    let lightFragment = document.createDocumentFragment();
                    for (let i = 0; i < this.lightNum; i++) {
                        let lightItem = document.createElement('span');
                        let deg = (360 / this.lightNum) * i
                        lightItem.style.transform = `rotate(${deg}deg)`;
                        lightFragment.appendChild(lightItem);
                    }
                    this.light.appendChild(lightFragment);

                    // 初始化轉盤背景、中獎圖
                    let bgFragment = document.createDocumentFragment();
                    let bgItemWidth = this.bg.offsetWidth / this.num;
                    let giftFragment = document.createDocumentFragment();
                    for (let i = 0; i < this.itemNum; i++) {
                        let bgItem = document.createElement('li');
                        let deg = (360 / this.itemNum) * i
                        bgItem.style.transform = `rotate(${deg}deg)`;
                        bgFragment.appendChild(bgItem);

                        let giftItem = document.createElement('li');
                        giftItem.style.transform = `rotate(${deg}deg)`;
                        giftItem.className = this.typeClassMap[this.lottery[i].type];
                        let span = document.createElement('span');
                        span.innerHTML = this.typeMap[this.lottery[i].type];
                        giftItem.appendChild(span);
                        giftFragment.appendChild(giftItem)
                    }
                    this.bg.appendChild(bgFragment);
                    this.gift.appendChild(giftFragment);


                    this.pointer.onclick = this.gameStart.bind(this)
                },

                gameStart() {
                    if (this.isGoing) {
                        return
                    }
                    this.isGoing = true;

                    // 隨機中獎結果
                    // 1-100隨機數
                    let randomRate = ~~(Math.random() * 100) // ~~ == Math.floor()
                    // 中獎概率範圍
                    let num = 0
                    this.lottery.forEach(item => {
                        item.min = num;
                        num += item.rate;
                        item.max = num;
                    })

                    let res = this.lottery.filter(item => {
                        return randomRate >= item.min && randomRate < item.max;
                    })[0];


                    // 轉五圈，轉1圈用時1s
                    let rotateItemDeg = (res.location - 1) * (360 / this.lottery.length);
                    let rotate = rotateItemDeg + 5 * 360;
                    let rotateSpeed = (rotateItemDeg / 360 * 1 + 5).toFixed(2);
                    // 重置轉盤
                    this.turntable.removeAttribute('style');
                    // 旋轉動畫
                    setTimeout(() => {
                        this.turntable.style.transform = `rotate(${rotate}deg)`;
                        this.turntable.style.transition = `transform ${rotateSpeed}s ease-out`;
                    }, 10)

                    // 顯示結果
                    setTimeout(() => {
                        this.isGoing = false;
                        console.log('結果：', randomRate, res, this.typeMap[res.type]);
                    }, rotateSpeed * 1000);
                }
            }

            let lottery = [
                {
                    location: 1, // 位置
                    type: 1, // 中獎
                    rate: 10,
                },
                {
                    location: 2,
                    type: 2, // 未中獎
                    rate: 10
                },
                { location: 3, type: 3, rate: 10 },
                { location: 4, type: 4, rate: 10 },
                { location: 5, type: 5, rate: 10 },
                { location: 6, type: 6, rate: 10 },
                { location: 7, type: 7, rate: 10 },
                { location: 8, type: 8, rate: 10 },
                { location: 9, type: 9, rate: 10 },
                { location: 10, type: 10, rate: 10 }
            ];

            turntable.turntable = document.querySelector('#turntable');
            turntable.light = document.querySelector('#turntable_light');
            turntable.bg = document.querySelector('#turntable_bg');
            turntable.gift = document.querySelector('#turntable_gift');
            turntable.pointer = document.querySelector('#turntable_pointer');
            turntable.lottery = lottery;
            turntable.init();
        </script>
    </body>
</div>
@endsection