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

// 現在地の取得ボタン
document.getElementById('getCurrentLocation').addEventListener('click', function() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
        alert("機能はお使いのブラウザには対応しておりません。");
    }
});

function showPosition(position) {
    const latitude = position.coords.latitude;
    const longitude = position.coords.longitude;

    // 緯度経度から該当する県を特定するロジックを実装
    // ここで、特定の県のSVG要素に対してハイライトのスタイルを適用
    highlightPrefecture(latitude, longitude);
}

function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            alert("ユーザーの位置情報のリクエストを拒否しました。");
            break;
        case error.POSITION_UNAVAILABLE:
            alert("この位置情報は利用できません。");
            break;
        case error.TIMEOUT:
            alert("ユーザーの位置情報を取得するリクエストがタイムアウトしました。");
            break;
        case error.UNKNOWN_ERROR:
            alert("An unknown error occurred.");
            break;
    }
}
function highlightPrefecture(lat, lng) {
    let prefectureId = null;

    const hokkaidoLatRange = { min: 41.21, max: 45.33};
    const hokkaidoLngRange = { min: 139.20, max: 148.53};
    if (lat >= hokkaidoLatRange.min && lat <= hokkaidoLatRange.max &&
        lng >= hokkaidoLngRange.min && lng <= hokkaidoLngRange.max) {
        prefectureId = 'hokkaido';
    }
    const aomoriLatRange = { min: 41.3322, max: 40.1304};
    const aomoriLngRange = { min: 139.2949, max: 141.41};
    if (lat >= aomoriLatRange.min && lat <= aomoriLatRange.max &&
        lng >= aomoriLngRange.min && lng <= aomoriLngRange.max) {
        prefectureId = 'aomori';
    }
    const iwateLatRange = { min: 38.4452, max: 40.2702};
    const iwateLngRange = { min: 140.3911, max: 142.0421};
    if (lat >= iwateLatRange.min && lat <= iwateLatRange.max &&
        lng >= iwateLngRange.min && lng <= iwateLngRange.max) {
        prefectureId = 'iwate';
    }

    // 神奈川県の緯度と経度の範囲を定義
    const kanagawaLatRange = { min: 35, max: 36 };
    const kanagawaLngRange = { min: 139, max: 140 };

    // 現在の緯度と経度が神奈川県の範囲内にあるか確認
    if (lat >= kanagawaLatRange.min && lat <= kanagawaLatRange.max &&
        lng >= kanagawaLngRange.min && lng <= kanagawaLngRange.max) {
        prefectureId = 'kanagawa';
    }

    // 特定した県のSVG要素にハイライト用のクラスを適用
    if (prefectureId) {
        const prefectureElement = document.getElementById(prefectureId);
        if (prefectureElement) {
            prefectureElement.classList.add('highlight');
        }
    }
    // var prefectureId;
    // if (lat > 40) {
    //     prefectureId = 'hokkaido';
    // } else if (lat < 34) {
    //     prefectureId = 'okinawa';
    // } else if (lat < 35, lng < 139) {
    //     prefectureId = 'kanagawa'; // 仮の例
    // } else {
    //     prefectureId = 'shiga';
    // }
    // // 緯度経度から県を特定し、該当するSVG要素のIDを取得
    // prefectureElement = document.getElementById(prefectureId);
    // if (prefectureElement) {
    //     prefectureElement.classList.add('highlight');
    // }
}