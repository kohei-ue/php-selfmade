$(document).ready(function() {

    // トップページのスライド
    var images = [
        { url: '/image/header.jpg', name: '金沢 医王山県立自然公園'},
        { url: '/image/header2.jpg', name: '伊豆・伊東 城ケ崎海岸'},
        { url: '/image/header3.jpg', name: '伊豆 大室山'},
        { url: '/image/header4.jpg', name: '群馬 草津温泉'},
        { url: '/image/hikone_castle.jpg', name: '滋賀 彦根城'},
        { url: '/image/yokohama_ronin.jpg', name: '横浜 横浜駅西口'}
    ];
    var currentImageIndex = 0;

    setInterval(function() {
        currentImageIndex = (currentImageIndex + 1) % images.length;
        $('.top-img img').fadeOut(400, function() {
            $(this).attr('src', images[currentImageIndex].url).fadeIn(400);
            $('.top-img .image-name').text(images[currentImageIndex].name); // 名前を更新させる
        });
    }, 4000); // 4秒おきに画像を変更


    // 現在の日付を取得
    var today = new Date();
    var weekdays = ['日', '月', '火', '水', '木', '金', '土'];
    var dayOfWeek = weekdays[today.getDay()];

    var year = today.getFullYear();
    var month = ('0' + (today.getMonth() + 1)).slice(-2);
    var day = ('0' + today.getDate()).slice(-2);
    var date = year + '年' + month + '月' + day + '日 (' + dayOfWeek + ')';

    $('#weather-info h4').text(date);


    // 天気API
    var apiKey = 'a62976d6ad5d59b872689ab87287a6b0';
    var cities = ['Sapporo', 'Sendai', 'Tokyo', 'Osaka', 'Fukuoka'];
    var cityNames = {
        'Sapporo': '札幌',
        'Sendai': '仙台',
        'Tokyo': '東京',
        'Osaka': '大阪',
        'Fukuoka': '福岡'
    };

    function fetchWeather(city) {
        var apiUrl = 'http://api.openweathermap.org/data/2.5/weather?q=' + city + '&appid=' + apiKey + '&units=metric&lang=ja';

        $.get(apiUrl, function(data) {
            var weather = data.weather[0].description;
            var iconCode = data.weather[0].icon;
            var temp = data.main.temp;
            var color = temp > 25 ? 'red' : temp < 10 ? 'blue' : 'black';

            var iconUrl = 'http://openweathermap.org/img/w/' + iconCode + '.png';
            var cityName = cityNames[city];
            $('#weather-info').append('<div class="weather-city"><p>'+ cityName + '<br><img src="' + iconUrl + '" alt="' + weather + '">' + weather + '<br>' + ' <span style="color: ' + color + ';">' + temp + '°C</span></p></div>');
        });
    }

    cities.forEach(function(city) {
        fetchWeather(city);
    });
});

$(document).scroll(function() {
    var scrollPosition = $(this).scrollTop() + $(window).height();
    $('.section-container').each(function() {
        var sectionTop = $(this).offset().top;
        var sectionBottom = sectionTop + $(this).outerHeight();
        var triggerPositionEnter = sectionTop + $(this).outerHeight() / 4; // セクションの上部が1/4だけ表示されたらトリガー
        var triggerPositionLeave = sectionBottom; // セクションが画面から完全に出たらトリガー

        // 要素が画面内に入った場合のアニメーション
        if (scrollPosition > triggerPositionEnter && $(this).scrollTop() < sectionBottom) {
            // $(this).css({
            //     'transform': 'translateY(0)',
            //     'opacity': '1'
            // });
            $(this).css({
                'transform': 'rotate(0deg) scale(1)',
                'opacity': '1',
                'transition': 'all 0.7s ease-out'
            });
            $(this).find('.section-img').css({
                'transform': 'rotateY(360deg) scale(1.1)',
                'transition': 'transform 1s ease-in-out'
            });
            $(this).find('.section-content').css({
                'transform': 'rotateX(360deg) scale(1.1)',
                'transition': 'transform 1s ease-in-out'
            });
        }
        // 要素が画面外に出た場合の初期状態へのリセット
        else if (scrollPosition < triggerPositionEnter || $(this).scrollTop() > triggerPositionLeave) {
            // $(this).css({
            //     'transform': 'translateY(50px)',
            //     'opacity': '0'
            // });
            $(this).css({
                'transform': 'rotate(10deg) scale(0.9)',
                'opacity': '0',
                'transition': 'all 0.5s ease-in'
            });
            $(this).find('.section-img').css({
                'transform': 'rotateY(-360deg) scale(0.9)',
                'transition': 'transform 0.7s ease-in-out'
            });
            $(this).find('.section-content').css({
                'transform': 'rotateX(-360deg) scale(0.9)',
                'transition': 'transform 0.7s ease-in-out'
            });
        }
    });
});
