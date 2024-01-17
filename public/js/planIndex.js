function address() {
    //テストのためクリックされてから取得開始
    navigator.geolocation.getCurrentPosition(test2); //test2関数の中で、現在地の緯度経度が変数positionに格納されて、関数を実行する。
    function test2(position) {
        var lat = position.coords.latitude; //緯度
        var lng = position.coords.longitude; //経度
        var url =
            'https://geoapi.heartrails.com/api/json?method=searchByGeoLocation&x=' +
            lng +
            '&y=' +
            lat;
        fetch(url)
            .then(function (data) {
                return data.json(); // 読み込むデータをJSONに設定
            })
            .then(function (json) {
                var location = json.response.location[0];
                document.getElementById('prefecture').textContent = location.prefecture;
                document.getElementById('city').textContent = location.city;
                document.getElementById('address').textContent = location.town;
                highlightPrefecture(location.prefecture);
            });
    }
}
// 都道府県をハイライトする関数
function highlightPrefecture(prefectureX) {
    // 都道府県名を英語のIDに変換するマッピング
    const prefectureIdMapping = {
        "北海道": "hokkaido",
        "青森県": "aomori",
        "岩手県": "iwate",
        "秋田県": "akita",
        "宮城県": "miyagi",
        "山形県": "yamagata",
        "福島県": "福島県fukushima",
        "栃木県": "tochigi",
        "群馬県": "gunma",
        "茨城県": "ibaraki",
        "新潟県": "niigata",
        "新潟県": "niigata_sado",
        "埼玉県": "saitama",
        "千葉県": "chiba",
        "東京都": "tokyo",
        "神奈川県": "kanagawa",
        "長野県": "nagano",
        "山梨県": "yamanashi",
        "富山県": "toyama",
        "岐阜県": "gifu",
        "石川県": "ishikawa",
        "静岡県": "shizuoka",
        "愛知県": "aichi",
        "三重県": "mie",
        "福井県": "fukui",
        "滋賀県": "shiga",
        "京都府": "kyoto",
        "奈良県": "nara",
        "大阪府": "ohsaka",
        "和歌山県": "wakayama",
        "滋賀県": "shiga_biwako",
        "兵庫県": "hyougo",
        "兵庫県": "hyougo_awaji",
        "鳥取県": "tottori",
        "岡山県": "okayama",
        "島根県": "shimane",
        "広島県": "hiroshima",
        "山口県": "yamaguchi",
        "愛媛県": "ehime",
        "高知県": "kohchi",
        "香川県": "kagawa",
        "徳島県": "tokushima",
        "福岡県": "fukuoka",
        "大分県": "ohita",
        "佐賀県": "saga",
        "長崎県": "nagasaki",
        "熊本県": "kumamoto",
        "長崎県": "nagasaki_3",
        "長崎県": "nagasaki_2",
        "宮崎県": "miyazaki",
        "鹿児島県": "kagoshima",
        "沖縄県": "okinawa",
    };

    const prefectureId = prefectureIdMapping[prefectureX];
    if (prefectureId) {
        const prefectureElement = document.getElementById(prefectureId);
        if (prefectureElement) {
            // 他の都道府県のハイライトをクリア
            document.querySelectorAll('path').forEach(function(pref) {
                pref.classList.remove('highlight');
            });

            // 該当する都道府県をハイライト
            prefectureElement.classList.add('highlight');
        }
    }
}

// 各都道府県のクリックイベントを追加
document.querySelectorAll('path').forEach(function(pref) {
    pref.addEventListener('click', function(event) {
        // 英語表記と漢字表記のマッピング
        const prefectureMapping = {
            "hokkaido": "北海道",
            "aomori": "青森県",
            "iwate": "岩手県",
            "akita": "秋田県",
            "miyagi": "宮城県",
            "yamagata": "山形県",
            "fukushima": "福島県",
            "tochigi": "栃木県",
            "gunma": "群馬県",
            "ibaraki": "茨城県",
            "niigata": "新潟県",
            "niigata_sado": "新潟県",
            "saitama": "埼玉県",
            "chiba": "千葉県",
            "tokyo": "東京都",
            "kanagawa": "神奈川県",
            "nagano": "長野県",
            "yamanashi": "山梨県",
            "toyama": "富山県",
            "gifu": "岐阜県",
            "ishikawa": "石川県",
            "shizuoka": "静岡県",
            "aichi": "愛知県",
            "mie": "三重県",
            "fukui": "福井県",
            "shiga": "滋賀県",
            "kyoto": "京都府",
            "nara": "奈良県",
            "ohsaka": "大阪府",
            "wakayama": "和歌山県",
            "shiga_biwako": "滋賀県",
            "hyougo": "兵庫県",
            "hyougo_awaji": "兵庫県",
            "tottori": "鳥取県",
            "okayama": "岡山県",
            "shimane": "島根県",
            "hiroshima": "広島県",
            "yamaguchi": "山口県",
            "ehime": "愛媛県",
            "kohchi": "高知県",
            "kagawa": "香川県",
            "tokushima": "徳島県",
            "fukuoka": "福岡県",
            "ohita": "大分県",
            "saga": "佐賀県",
            "nagasaki": "長崎県",
            "kumamoto": "熊本県",
            "nagasaki_3": "長崎県",
            "nagasaki_2": "長崎県",
            "miyazaki": "宮崎県",
            "kagoshima": "鹿児島県",
            "okinawa": "沖縄県",
        };

        // クリックされたpathタグのidを取得
        let englishName = event.target.id;

        // マッピングオブジェクトを使用して対応する漢字表記を取得
        let prefectureName = prefectureMapping[englishName];

        // 漢字表記をURLエンコード
        let encodedPrefecture = encodeURIComponent(prefectureName);

        // エンコードされたURLを元に、showPlansメソッドのルートにリダイレクト
        window.location.href = '/prefecture/' + encodedPrefecture;
    });
});

// // 現在地の取得ボタン
// document.getElementById('getCurrentLocation').addEventListener('click', function() {
//     if (navigator.geolocation) {
//         navigator.geolocation.getCurrentPosition(showPosition, showError);
//     } else {
//         alert("機能はお使いのブラウザには対応しておりません。");
//     }
// });

// function showPosition(position) {
//     const latitude = position.coords.latitude;
//     const longitude = position.coords.longitude;

//     // 緯度経度から該当する県を特定するロジックを実装
//     // ここで、特定の県のSVG要素に対してハイライトのスタイルを適用
//     highlightPrefecture(latitude, longitude);
// }

// function showError(error) {
//     switch(error.code) {
//         case error.PERMISSION_DENIED:
//             alert("ユーザーの位置情報のリクエストを拒否しました。");
//             break;
//         case error.POSITION_UNAVAILABLE:
//             alert("この位置情報は利用できません。");
//             break;
//         case error.TIMEOUT:
//             alert("ユーザーの位置情報を取得するリクエストがタイムアウトしました。");
//             break;
//         case error.UNKNOWN_ERROR:
//             alert("An unknown error occurred.");
//             break;
//     }
// }
// function highlightPrefecture(lat, lng) {
//     let prefectureId = null;

//     const hokkaidoLatRange = { min: 41.21, max: 45.33};
//     const hokkaidoLngRange = { min: 139.20, max: 148.53};
//     if (lat >= hokkaidoLatRange.min && lat <= hokkaidoLatRange.max &&
//         lng >= hokkaidoLngRange.min && lng <= hokkaidoLngRange.max) {
//         prefectureId = 'hokkaido';
//     }
//     const aomoriLatRange = { min: 41.3322, max: 40.1304};
//     const aomoriLngRange = { min: 139.2949, max: 141.41};
//     if (lat >= aomoriLatRange.min && lat <= aomoriLatRange.max &&
//         lng >= aomoriLngRange.min && lng <= aomoriLngRange.max) {
//         prefectureId = 'aomori';
//     }
//     const iwateLatRange = { min: 38.4452, max: 40.2702};
//     const iwateLngRange = { min: 140.3911, max: 142.0421};
//     if (lat >= iwateLatRange.min && lat <= iwateLatRange.max &&
//         lng >= iwateLngRange.min && lng <= iwateLngRange.max) {
//         prefectureId = 'iwate';
//     }
//     const akitaLatRange = { min: 38.5223, max: 40.3040};
//     const akitaLngRange = { min: 139.4130, max: 140.5943};
//     if (lat >= akitaLatRange.min && lat <= akitaLatRange.max &&
//         lng >= akitaLngRange.min && lng <= akitaLngRange.max) {
//         prefectureId = 'akita';
//     }
//     const miyagiLatRange = { min: 37.5857, max: 39.001};
//     const miyagiLngRange = { min: 140.1630, max: 141.4038};
//     if (lat >= miyagiLatRange.min && lat <= miyagiLatRange.max &&
//         lng >= miyagiLngRange.min && lng <= miyagiLngRange.max) {
//         prefectureId = 'miyagi';
//     }
//     const yamagataLatRange = { min: 37.4402, max: 39.1256};
//     const yamagataLngRange = { min: 139.3112, max: 140.3848};
//     if (lat >= yamagataLatRange.min && lat <= yamagataLatRange.max &&
//         lng >= yamagataLngRange.min && lng <= yamagataLngRange.max) {
//         prefectureId = 'yamagata';
//     }
//     const fukushimaLatRange = { min: 36.4729, max: 37.5836};
//     const fukushimaLngRange = { min: 139.0953, max: 141.0237};
//     if (lat >= fukushimaLatRange.min && lat <= fukushimaLatRange.max &&
//         lng >= fukushimaLngRange.min && lng <= fukushimaLngRange.max) {
//         prefectureId = 'fukushima';
//     }
//     const tochigiLatRange = { min: 36.1159, max: 37.0918};
//     const tochigiLngRange = { min: 139.1935, max: 140.1733};
//     if (lat >= tochigiLatRange.min && lat <= tochigiLatRange.max &&
//         lng >= tochigiLngRange.min && lng <= tochigiLngRange.max) {
//         prefectureId = 'tochigi';
//     }
//     const gunmaLatRange = { min: 35.5906, max: 37.0331};
//     const gunmaLngRange = { min: 138.2349, max: 139.4011};
//     if (lat >= gunmaLatRange.min && lat <= gunmaLatRange.max &&
//         lng >= gunmaLngRange.min && lng <= gunmaLngRange.max) {
//         prefectureId = 'gunma';
//     }
//     const ibarakiLatRange = { min: 35.4421, max: 36.5643};
//     const ibarakiLngRange = { min: 139.4115, max: 140.5106};
//     if (lat >= ibarakiLatRange.min && lat <= ibarakiLatRange.max &&
//         lng >= ibarakiLngRange.min && lng <= ibarakiLngRange.max) {
//         prefectureId = 'ibaraki';
//     }
//     const niigataLatRange = { min: 36.4411, max: 38.3312};
//     const niigataLngRange = { min: 137.3806, max: 139.54};
//     if (lat >= niigataLatRange.min && lat <= niigataLatRange.max &&
//         lng >= niigataLngRange.min && lng <= niigataLngRange.max) {
//         prefectureId = 'niigata';
//     }
//     const saitamaLatRange = { min: 35.4513, max: 36.17};
//     const saitamaLngRange = { min: 138.4241, max: 139.5401};
//     if (lat >= saitamaLatRange.min && lat <= saitamaLatRange.max &&
//         lng >= saitamaLngRange.min && lng <= saitamaLngRange.max) {
//         prefectureId = 'saitama';
//     }
//     const chibaLatRange = { min: 34.5353, max: 36.0614};
//     const chibaLngRange = { min: 139.4421, max: 140.5254};
//     if (lat >= chibaLatRange.min && lat <= chibaLatRange.max &&
//         lng >= chibaLngRange.min && lng <= chibaLngRange.max) {
//         prefectureId = 'chiba';
//     }
//     const tokyoLatRange = { min: 20.2531, max: 35.5354};
//     const tokyoLngRange = { min: 136.0411, max: 153.5912};
//     if (lat >= tokyoLatRange.min && lat <= tokyoLatRange.max &&
//         lng >= tokyoLngRange.min && lng <= tokyoLngRange.max) {
//         prefectureId = 'tokyo';
//     }
//     // 神奈川県の緯度と経度の範囲を定義
//     const kanagawaLatRange = { min: 35, max: 36 };
//     const kanagawaLngRange = { min: 139, max: 140 };

//     // 現在の緯度と経度が神奈川県の範囲内にあるか確認
//     if (lat >= kanagawaLatRange.min && lat <= kanagawaLatRange.max &&
//         lng >= kanagawaLngRange.min && lng <= kanagawaLngRange.max) {
//         prefectureId = 'kanagawa';
//     }
//     const naganoLatRange = { min: 35.1155, max: 37.0149};
//     const naganoLngRange = { min: 137.1929, max: 138.4422};
//     if (lat >= naganoLatRange.min && lat <= naganoLatRange.max &&
//         lng >= naganoLngRange.min && lng <= naganoLngRange.max) {
//         prefectureId = 'nagano';
//     }
//     const yamanashiLatRange = { min: 35.1006, max: 35.5818};
//     const yamanashiLngRange = { min: 138.1049, max: 139.0804};
//     if (lat >= yamanashiLatRange.min && lat <= yamanashiLatRange.max &&
//         lng >= yamanashiLngRange.min && lng <= yamanashiLngRange.max) {
//         prefectureId = 'yamanashi';
//     }
//     const toyamaLatRange = { min: 36.1628, max: 36.5857};
//     const toyamaLngRange = { min: 136.4606, max: 137.4548};
//     if (lat >= toyamaLatRange.min && lat <= toyamaLatRange.max &&
//         lng >= toyamaLngRange.min && lng <= toyamaLngRange.max) {
//         prefectureId = 'toyama';
//     }
//     const gifuLatRange = { min: 35.0802, max: 36.2754};
//     const gifuLngRange = { min: 136.1635, max: 137.3911};
//     if (lat >= gifuLatRange.min && lat <= gifuLatRange.max &&
//         lng >= gifuLngRange.min && lng <= gifuLngRange.max) {
//         prefectureId = 'gifu';
//     }
//     const ishikawaLatRange = { min: 36.0401, max: 37.5128};
//     const ishikawaLngRange = { min: 136.1435, max: 137.2155};
//     if (lat >= ishikawaLatRange.min && lat <= ishikawaLatRange.max &&
//         lng >= ishikawaLngRange.min && lng <= ishikawaLngRange.max) {
//         prefectureId = 'ishikawa';
//     }
//     const shizuokaLatRange = { min: 34.3425, max: 35.3845};
//     const shizuokaLngRange = { min: 137.2827, max: 139.1036};
//     if (lat >= shizuokaLatRange.min && lat <= shizuokaLatRange.max &&
//         lng >= shizuokaLngRange.min && lng <= shizuokaLngRange.max) {
//         prefectureId = 'shizuoka';
//     }
//     const aichiLatRange = { min: 34.3425, max: 35.2530};
//     const aichiLngRange = { min: 136.4015, max: 137.5017};
//     if (lat >= aichiLatRange.min && lat <= aichiLatRange.max &&
//         lng >= aichiLngRange.min && lng <= aichiLngRange.max) {
//         prefectureId = 'aichi';
//     }
//     const mieLatRange = { min: 33.4322, max: 35.1528};
//     const mieLngRange = { min: 135.5112, max: 136.5924};
//     if (lat >= mieLatRange.min && lat <= mieLatRange.max &&
//         lng >= mieLngRange.min && lng <= mieLngRange.max) {
//         prefectureId = 'mie';
//     }
//     const fukuiLatRange = { min: 35.2036, max: 36.1748};
//     const fukuiLngRange = { min: 135.2658, max: 136.4956};
//     if (lat >= fukuiLatRange.min && lat <= fukuiLatRange.max &&
//         lng >= fukuiLngRange.min && lng <= fukuiLngRange.max) {
//         prefectureId = 'fukui';
//     }
//     const shigaLatRange = { min: 34.4727, max: 35.4213};
//     const shigaLngRange = { min: 135.4550, max: 136.2719};
//     if (lat >= shigaLatRange.min && lat <= shigaLatRange.max &&
//         lng >= shigaLngRange.min && lng <= shigaLngRange.max) {
//         prefectureId = 'shiga';
//     }
//     const kyotoLatRange = { min: 34.4221, max: 35.4645};
//     const kyotoLngRange = { min: 134.5113, max: 136.032};
//     if (lat >= kyotoLatRange.min && lat <= kyotoLatRange.max &&
//         lng >= kyotoLngRange.min && lng <= kyotoLngRange.max) {
//         prefectureId = 'kyoto';
//     }
//     const naraLatRange = { min: 33.5132, max: 34.4653};
//     const naraLngRange = { min: 135.3223, max: 136.1348};
//     if (lat >= naraLatRange.min && lat <= naraLatRange.max &&
//         lng >= naraLngRange.min && lng <= naraLngRange.max) {
//         prefectureId = 'nara';
//     }
//     const ohsakaLatRange = { min: 34.1619, max: 35.0305};
//     const ohsakaLngRange = { min: 135.0531, max: 135.4448};
//     if (lat >= ohsakaLatRange.min && lat <= ohsakaLatRange.max &&
//         lng >= ohsakaLngRange.min && lng <= ohsakaLngRange.max) {
//         prefectureId = 'ohsaka';
//     }
//     const wakayamaLatRange = { min: 33.2557, max: 34.2304};
//     const wakayamaLngRange = { min: 134.5955, max: 136.0048};
//     if (lat >= wakayamaLatRange.min && lat <= wakayamaLatRange.max &&
//         lng >= wakayamaLngRange.min && lng <= wakayamaLngRange.max) {
//         prefectureId = 'wakayama';
//     }
//     const hyogoLatRange = { min: 34.0919, max: 35.4029};
//     const hyogoLngRange = { min: 134.1509, max: 135.2807};
//     if (lat >= hyogoLatRange.min && lat <= hyogoLatRange.max &&
//         lng >= hyogoLngRange.min && lng <= hyogoLngRange.max) {
//         prefectureId = 'hyogo';
//     }
//     const tottoriLatRange = { min: 35.0327, max: 35.3652};
//     const tottoriLngRange = { min: 133.0809, max: 134.3055};
//     if (lat >= tottoriLatRange.min && lat <= tottoriLatRange.max &&
//         lng >= tottoriLngRange.min && lng <= tottoriLngRange.max) {
//         prefectureId = 'tottori';
//     }
//     const okayamaLatRange = { min: 34.1754, max: 35.211};
//     const okayamaLngRange = { min: 133.16, max: 134.2447};
//     if (lat >= okayamaLatRange.min && lat <= okayamaLatRange.max &&
//         lng >= okayamaLngRange.min && lng <= okayamaLngRange.max) {
//         prefectureId = 'okayama';
//     }
//     const shimaneLatRange = { min: 34.1809, max: 37.1452};
//     const shimaneLngRange = { min: 131.4004, max: 133.2326};
//     if (lat >= shimaneLatRange.min && lat <= shimaneLatRange.max &&
//         lng >= shimaneLngRange.min && lng <= shimaneLngRange.max) {
//         prefectureId = 'shimane';
//     }
//     const hiroshimaLatRange = { min: 34.014, max: 35.062};
//     const hiroshimaLngRange = { min: 132.0211, max: 133.2815};
//     if (lat >= hiroshimaLatRange.min && lat <= hiroshimaLatRange.max &&
//         lng >= hiroshimaLngRange.min && lng <= hiroshimaLngRange.max) {
//         prefectureId = 'hiroshima';
//     }
//     const yamaguchiLatRange = { min: 33.4246, max: 34.4758};
//     const yamaguchiLngRange = { min: 130.4629, max: 132.2931};
//     if (lat >= yamaguchiLatRange.min && lat <= yamaguchiLatRange.max &&
//         lng >= yamaguchiLngRange.min && lng <= yamaguchiLngRange.max) {
//         prefectureId = 'yamaguchi';
//     }
//     const ehimeLatRange = { min: 32.5305, max: 34.1806};
//     const ehimeLngRange = { min: 132.0044, max: 133.4135};
//     if (lat >= ehimeLatRange.min && lat <= ehimeLatRange.max &&
//         lng >= ehimeLngRange.min && lng <= ehimeLngRange.max) {
//         prefectureId = 'ehime';
//     }
//     const kohchiLatRange = { min: 32.4209, max: 33.53};
//     const kohchiLngRange = { min: 132.2847, max: 134.1853};
//     if (lat >= kohchiLatRange.min && lat <= kohchiLatRange.max &&
//         lng >= kohchiLngRange.min && lng <= kohchiLngRange.max) {
//         prefectureId = 'kohchi';
//     }
//     const kagawaLatRange = { min: 34.0044, max: 34.3353};
//     const kagawaLngRange = { min: 133.2648, max: 134.2651};
//     if (lat >= kagawaLatRange.min && lat <= kagawaLatRange.max &&
//         lng >= kagawaLngRange.min && lng <= kagawaLngRange.max) {
//         prefectureId = 'kagawa';
//     }
//     const tokushimaLatRange = { min: 33.3219, max: 34.1507};
//     const tokushimaLngRange = { min: 133.3939, max: 134.4920};
//     if (lat >= tokushimaLatRange.min && lat <= tokushimaLatRange.max &&
//         lng >= tokushimaLngRange.min && lng <= tokushimaLngRange.max) {
//         prefectureId = 'tokushima';
//     }
//     const fukuokaLatRange = { min: 33.0002, max: 34.15};
//     const fukuokaLngRange = { min: 129.5854, max: 131.1125};
//     if (lat >= fukuokaLatRange.min && lat <= fukuokaLatRange.max &&
//         lng >= fukuokaLngRange.min && lng <= fukuokaLngRange.max) {
//         prefectureId = 'fukuoka';
//     }
//     const ohitaLatRange = { min: 32.4252, max: 33.4426};
//     const ohitaLngRange = { min: 130.4929, max: 132.1038};
//     if (lat >= ohitaLatRange.min && lat <= ohitaLatRange.max &&
//         lng >= ohitaLngRange.min && lng <= ohitaLngRange.max) {
//         prefectureId = 'ohita';
//     }
//     const sagaLatRange = { min: 32.5702, max: 33.3709};
//     const sagaLngRange = { min: 129.4413, max: 130.3233};
//     if (lat >= sagaLatRange.min && lat <= sagaLatRange.max &&
//         lng >= sagaLngRange.min && lng <= sagaLngRange.max) {
//         prefectureId = 'saga';
//     }
//     const nagasakiLatRange = { min: 32.5802, max: 34.4343};
//     const nagasakiLngRange = { min: 128.0616, max: 130.2325};
//     if (lat >= nagasakiLatRange.min && lat <= nagasakiLatRange.max &&
//         lng >= nagasakiLngRange.min && lng <= nagasakiLngRange.max) {
//         prefectureId = 'nagasaki';
//     }
//     const kumamotoLatRange = { min: 32.0541, max: 33.1143};
//     const kumamotoLngRange = { min: 129.562, max: 131.1946};
//     if (lat >= kumamotoLatRange.min && lat <= kumamotoLatRange.max &&
//         lng >= kumamotoLngRange.min && lng <= kumamotoLngRange.max) {
//         prefectureId = 'kumamoto';
//     }
//     const miyazakiLatRange = { min: 31.2123, max: 32.502};
//     const miyazakiLngRange = { min: 130.4212, max: 131.5309};
//     if (lat >= miyazakiLatRange.min && lat <= miyazakiLatRange.max &&
//         lng >= miyazakiLngRange.min && lng <= miyazakiLngRange.max) {
//         prefectureId = 'miyazaki';
//     }
//     const kagoshimaLatRange = { min: 27.0107, max: 32.1838};
//     const kagoshimaLngRange = { min: 128.2343, max: 131.122};
//     if (lat >= kagoshimaLatRange.min && lat <= kagoshimaLatRange.max &&
//         lng >= kagoshimaLngRange.min && lng <= kagoshimaLngRange.max) {
//         prefectureId = 'kagoshima';
//     }
//     const okinawaLatRange = { min: 24.0244, max: 27.5309};
//     const okinawaLngRange = { min: 122.5557, max: 131.1956};
//     if (lat >= okinawaLatRange.min && lat <= okinawaLatRange.max &&
//         lng >= okinawaLngRange.min && lng <= okinawaLngRange.max) {
//         prefectureId = 'okinawa';
//     }

//     // 特定した県のSVG要素にハイライト用のクラスを適用
//     if (prefectureId) {
//         const prefectureElement = document.getElementById(prefectureId);
//         if (prefectureElement) {
//             prefectureElement.classList.add('highlight');
//         }
//     }
// }