function initMaps() {
    initTokyoMap();
    initSapporoMap();
    initSendaiMap();
    initKyotoMap();
    initOkinawaMap();
}

function initTokyoMap() {
    // 地図の初期設定
    const tokyoMap = new google.maps.Map(document.getElementById("tokyoMap"), {
        zoom: 11,
        center: { lat: 35.6895, lng: 139.7602 }, // 東京都千代田区の座標
    });

    // スポットのデータ
    const tokyoLocations = [
        { title: '浅草', lat: 35.7128, lng: 139.7988 },
        { title: '東京スカイツリー', lat: 35.7101, lng: 139.8107 },
        { title: '新宿', lat: 35.6938, lng: 139.7034 },
        { title: '原宿・表参道', lat: 35.6691, lng: 139.7093 },
    ];

    // スポットにマーカーを設置
    tokyoLocations.forEach((location) => {
        const marker = new google.maps.Marker({
            position: { lat: location.lat, lng: location.lng },
            map: tokyoMap,
            title: location.title,
        });

        const infoWindow = new google.maps.InfoWindow({
            content: location.title,
        })

        marker.addListener('click', () => {
            infoWindow.open(tokyoMap, marker);
        })
    });
}

function initSapporoMap() {
    const SapporoMap = new google.maps.Map(document.getElementById("SapporoMap"), {
        zoom: 12,
        center: { lat: 43.0686, lng: 141.3507 }, // 札幌の座標
    });

    const SapporoLocations = [
        { title: '大通公園', lat: 43.0585, lng: 141.3366 },
        { title: '札幌時計台', lat: 43.0626, lng: 141.3539 },
        { title: 'すすきの', lat: 43.0537, lng: 141.3527 },
        { title: 'モエレ沼公園', lat: 43.1234, lng: 141.4277 },
        { title: 'サッポロビール園', lat: 43.0714, lng: 141.3695 },
    ];

    SapporoLocations.forEach((location) => {
        const marker = new google.maps.Marker({
            position: { lat: location.lat, lng: location.lng },
            map: SapporoMap,
            title: location.title,
        });

        const infoWindow = new google.maps.InfoWindow({
            content: location.title,
        })

        marker.addListener('click', () => {
            infoWindow.open(SapporoMap, marker);
        })
    });
}

function initSendaiMap() {
    const SendaiMap = new google.maps.Map(document.getElementById("SendaiMap"), {
        zoom: 12,
        center: { lat: 38.2601, lng: 140.8819 }, // 仙台市の座標
    });

    const SendaiLocations = [
        { title: '青葉城址', lat: 38.2522, lng: 140.8564 },
        { title: '定禅寺通り', lat: 38.2663, lng: 140.8718 },
        { title: '仙台市博物館', lat: 38.2561, lng: 140.8570 },
        { title: '仙台うみの杜水族館', lat: 38.2712, lng: 140.9811 },
    ];

    SendaiLocations.forEach((location) => {
        const marker = new google.maps.Marker({
            position: { lat: location.lat, lng: location.lng },
            map: SendaiMap,
            title: location.title,
        });

        const infoWindow = new google.maps.InfoWindow({
            content: location.title,
        })

        marker.addListener('click', () => {
            infoWindow.open(SendaiMap, marker);
        })
    });
}

function initKyotoMap() {
    const KyotoMap = new google.maps.Map(document.getElementById("KyotoMap"), {
        zoom: 11,
        center: { lat: 34.9851, lng: 135.7584 }, // 京都駅の座標
    });

    const KyotoLocations = [
        { title: '金閣寺', lat: 35.0396, lng: 135.7292 },
        { title: '清水寺', lat: 34.9948, lng: 135.7851 },
        { title: '嵐山', lat: 35.0095, lng: 135.6670 },
        { title: '伏見稲荷大社', lat: 34.9683, lng: 135.7793 },
    ];

    KyotoLocations.forEach((location) => {
        const marker = new google.maps.Marker({
            position: { lat: location.lat, lng: location.lng },
            map: KyotoMap,
            title: location.title,
        });

        const infoWindow = new google.maps.InfoWindow({
            content: location.title,
        })

        marker.addListener('click', () => {
            infoWindow.open(KyotoMap, marker);
        })
    });
}

function initOkinawaMap() {
    const OkinawaMap = new google.maps.Map(document.getElementById("OkinawaMap"), {
        zoom: 9,
        center: { lat: 26.4974, lng: 127.8535 }, // 恩納村の座標
    });

    const OkinawaLocations = [
        { title: '首里城', lat: 26.2172, lng: 127.7198 },
        { title: '美ら海水族館', lat: 26.6945, lng: 127.8775 },
        { title: '古宇利島', lat: 26.6959, lng: 128.0248 },
        { title: '波上宮', lat: 26.2208, lng: 127.6714 },
    ];

    OkinawaLocations.forEach((location) => {
        const marker = new google.maps.Marker({
            position: { lat: location.lat, lng: location.lng },
            map: OkinawaMap,
            title: location.title,
        });

        const infoWindow = new google.maps.InfoWindow({
            content: location.title,
        })

        marker.addListener('click', () => {
            infoWindow.open(OkinawaMap, marker);
        })
    });
}