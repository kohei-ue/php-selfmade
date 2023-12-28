<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/css/extra.css">
    <title>はじめての方へ</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/9292378248.js" crossorigin="anonymous"></script>
</head>
<body>
    @include('layouts.header')
    <main>
        <ol class="breadcrumb" id="breadComer">
            <li><a href="{{ route('travels.index') }}">ホーム</a></li>
            <li><a href="{{ route('travels.planIndex') }}">プラン一覧</a></li>
            <li><a href="">はじめての方へ</a></li>
        </ol>
        <div class="AllComer">こちらのページでは人気のある目的地や都道府県をご紹介をしたり旅行の計画を立てる際に役立つヒントやアドバイスを提供しています。プラン作りの参考にどうぞ。</div>
        <div class="popular-destinations">
            <h1>人気の目的地</h1>
            <section id="tokyo">
                <div class="imgs">
                    <img src="/image/tokyo.jpg" alt="浅草">
                    <div id="tokyoMap" style="height: 300px; width: 95%; margin: 10px 0;"></div> <!-- 地図を表示するためのコンテナ -->
                    <img src="/image/tokyo2.png" alt="スカイツリー">
                </div>

                <div class="info">
                    <h2>東京<span>：多面的な魅力の都市</span></h2>

                    <h3>歴史的背景</h3>
                    <p>
                    東京は、かつて「江戸」と呼ばれ、400年以上の歴史を持つ都市です。徳川家康によって1603年に開かれた江戸時代から、現代に至るまで、日本の政治・経済・文化の中心地として発展し続けています。
                    </p>

                    <h3>文化とライフスタイル</h3>
                    <p>
                        伝統的な文化と最先端のトレンドが融合する東京は、訪れる人々に多様な体験を提供します。浅草の雷門や皇居、明治神宮などの歴史的な観光地から、青山や原宿のファッションストリート、秋葉原の電気街まで、その顔は多岐にわたります。
                    </p>

                    <h3>おススメの場所</h3>
                    <ul>
                        <li>浅草：日本の伝統を感じることができる地区。</li>
                        <li>東京スカイツリー：地上634メートルの高さを誇るタワー。</li>
                        <li>新宿：ビジネス街としても知られる新宿は、ショッピング、エンターテイメント、ナイトライフが楽しめます。</li>
                        <li>原宿・表参道：最新のファッションやカフェ文化を体験できるスポット。</li>
                    </ul>

                    <h3>おススメの料理</h3>
                    <ul>
                        <li>寿司：築地や銀座の寿司は世界的にも有名。新鮮な魚介類を使用したにぎり寿司は、一つ一つが職人の技と味の妙を感じさせます。</li>
                        <li>ラーメン：数多くのラーメン店が存在し、様々な地域のラーメンが楽しめます。醤油、味噌、塩、豚骨など、さまざまなスタイルがあり、独自のアレンジを加えた店も多いです。</li>
                        <li>和菓子：老舗の和菓子店で、日本の伝統的な味を堪能しましょう。</li>
                    </ul>

                    <h3>イベントとフェスティバル</h3>
                    <ul>
                        <li>東京さくら祭り：春に開催される桜の祭典。上野恩賜公園や隅田公園など、市内の主要な桜スポットで花見が楽しめます。夜にはライトアップされ、幻想的な雰囲気を楽しむことができます。</li>
                        <li>隅田川花火大会：夏の風物詩として知られる花火大会。隅田川沿いで開催され、数千発の花火が夜空を彩ります。多くの人々が浴衣を着て参加し、夏の夜を楽しみます。</li>
                        <li>東京国際映画祭：秋に開催されるアジア最大級の映画祭。世界中から集まった映画作品が上映され、映画の魅力を多くの人々に伝えます。レッドカーペットイベントも有名です。</li>
                        <li>東京モーターショー：2年に一度開催される国際的な自動車展示会。最新の自動車技術やコンセプトカーが披露され、自動車業界の最先端を知ることができます。</li>
                    </ul>
                </div>
            </section>

            <section id="sapporo">
                <div class="imgs">
                    <img src="/image/sapporo.webp" alt="大通公園">
                    <div id="SapporoMap" style="height: 300px; width: 95%; margin: 10px 0;"></div>
                    <img src="/image/sapporo2.jpg" alt="札幌時計台">
                </div>

                <div class="info">
                    <h2>札幌<span>：魅力溢れる北の大地</span></h2>

                    <h3>歴史的背景</h3>
                    <p>
                    札幌は北海道の政治、経済、文化の中心地であり、日本国内外から多くの観光客を引き付ける都市です。開拓時代から発展を遂げ、現在では多様な文化が融合する活気ある都市となっています。
                    </p>

                    <h3>文化とライフスタイル</h3>
                    <p>
                    札幌は自然と都市生活が調和した独特の雰囲気を持っています。美しい公園、モダンな建築、活気あるショッピングエリアと飲食店が特徴です。充実した都市生活と四季折々の自然景観が楽しめ、特に冬の雪祭りは国際的に有名です。
                    </p>

                    <h3>おススメの場所</h3>
                    <ul>
                        <li>大通公園：四季折々の自然が楽しめる公園。冬の雪祭りは特に有名。</li>
                        <li>札幌時計台：札幌のシンボルとして知られる歴史的建築物。</li>
                        <li>すすきの：北海道最大の繁華街で、多くのレストラン、バー、エンターテイメント施設があります。</li>
                        <li>モエレ沼公園：世界的な彫刻家イサム・ノグチがデザインした公園。モダンな造形と自然が調和した空間で、四季折々の自然美を楽しむことができます。</li>
                        <li>サッポロビール園：博物館と併設されているサッポロビールの施設。ビールの歴史を学べるのに加えてサッポロビールの飲み比べやジンギスカンも味わえます。</li>
                    </ul>

                    <h3>おススメの料理</h3>
                    <ul>
                        <li>ジンギスカン：北海道名物の羊肉を使った料理。サッポロビール園などで提供されるジンギスカンは、ジューシーで柔らかな肉質が特徴。新鮮な羊肉を炭火で焼き、特製のタレで味わいます。</li>
                        <li>海鮮丼：新鮮な海の幸を堪能できる丼ぶり。</li>
                        <li>スープカレー：スパイスの効いたスープベースに野菜や肉が入ったカレー。具材には地元の新鮮な野菜や北海道産の肉が使用され、さまざまなバリエーションが楽しめます。</li>
                    </ul>

                    <h3>イベントとフェスティバル</h3>
                    <ul>
                        <li>さっぽろ雪まつり：毎年2月に開催される、国際的に有名な雪と氷の祭典。大通公園など札幌市内の複数の会場で、巨大な雪の彫刻や氷のアートが展示されます。</li>
                        <li>YOSAKOIソーラン祭り：6月に開催される、エネルギッシュなダンスフェスティバル。YOSAKOIの踊りと北海道のソーラン節が融合したパフォーマンスが市内各所で披露されます。</li>
                        <li>札幌オータムフェスト：9月下旬から10月にかけて大通公園で開催される、北海道の食文化を祝うイベント。地元の食材を使った料理や地酒が楽しめます。</li>
                    </ul>
                </div>
            </section>

            <section id="sendai">
                <div class="imgs">
                    <img src="/image/sendai.jpg" alt="伊達政宗像">
                    <div id="SendaiMap" style="height: 300px; width: 95%; margin: 10px 0;"></div>
                    <img src="/image/sendai2.jpg" alt="定禅寺通り">
                </div>

                <div class="info">
                    <h2>仙台<span>：歴史とモダニティの融合</span></h2>

                    <h3>歴史的背景</h3>
                    <p>
                    仙台は東北地方最大の都市で、伊達政宗によって創設された歴史的な背景と現代的な活気が共存する東北最大の都市です。城下町としての歴史を持ち、現在でも伊達家の影響が見られる場所が多くあります。
                    </p>

                    <h3>文化とライフスタイル</h3>
                    <p>
                    仙台は「杜の都」とも呼ばれ、豊かな自然と歴史的な建築が調和しています。多くの文化施設、美術館、伝統的な祭りが市民生活に色を添えています。
                    </p>

                    <h3>おススメの場所</h3>
                    <ul>
                        <li>青葉城址：伊達政宗が築いた城の跡地。</li>
                        <li>定禅寺通り：仙台の中心街に位置する美しい並木道。</li>
                        <li>仙台市博物館：地域の歴史や文化を学べる博物館。</li>
                        <li>仙台うみの杜水族館：仙台にある大規模な水族館。地元の海洋生物をはじめ、世界各地の海の生き物を観察することができます。</li>
                    </ul>

                    <h3>おススメの料理</h3>
                    <ul>
                        <li>牛タン：炭火で焼いた香ばしい牛のタンは仙台の代表的なグルメ。肉の厚さ、柔らかさ、そして独特の味付けが特徴。仙台市内の多くの専門店で、さまざまな牛タン料理を楽しむことができます。</li>
                        <li>せんだい味噌：地元特有の味噌を使った料理。</li>
                        <li>ずんだ餅：枝豆を使った伝統的な和菓子。</li>
                    </ul>

                    <h3>イベントとフェスティバル</h3>
                    <ul>
                        <li>仙台七夕まつり：日本三大七夕祭りの一つとして知られ、毎年8月に開催されます。市内が色鮮やかな七夕飾りで飾られ、伝統的な七夕の行事や様々な催しが行われます。</li>
                        <li>仙台光のページェント：12月のクリスマスシーズンに定禅寺通りで開催される、美しいイルミネーションイベント。寒い冬の夜を彩る光のアートワークが市民に親しまれています。</li>
                        <li>ジャズフェスティバル：音楽の街・仙台で開催されるジャズの祭典。国内外の著名なジャズミュージシャンが参加し、市内各所でコンサートが開催されます。</li>
                    </ul>
                </div>
            </section>

            <section id="kyoto">
                <div class="imgs">
                    <img src="/image/kyoto.jpg" alt="八坂通り">
                    <div id="KyotoMap" style="height: 300px; width: 95%; margin: 10px 0;"></div>
                    <img src="/image/kyoto2.webp" alt="清水寺">
                </div>

                <div class="info">
                    <h2>京都<span>：古都京都の文化財</span></h2>

                    <h3>歴史的背景</h3>
                    <p>
                    京都は千年以上にわたる日本の古都であり、多くの歴史的建築物、寺院、神社が存在します。平安時代からの歴史を持ち、日本文化と伝統の中心地として知られています。
                    </p>

                    <h3>文化とライフスタイル</h3>
                    <p>
                    伝統的な芸能や工芸品、茶道や華道など、日本の文化が色濃く反映されています。街中には古い町屋が残り、訪れる人々に古き良き日本の風情を感じさせます。
                    </p>

                    <h3>おススメの場所</h3>
                    <ul>
                        <li>金閣寺：金箔で覆われた壮麗な寺院。</li>
                        <li>清水寺：大舞台からの眺望が有名な古刹。</li>
                        <li>嵐山：竹林の小径や渡月橋が魅力的な自然豊かなエリア。</li>
                        <li>伏見稲荷大社：千本鳥居で有名な神社。</li>
                    </ul>

                    <h3>おススメの料理</h3>
                    <ul>
                        <li>京料理：精巧な盛り付けと繊細な味わいが特徴の伝統的な日本料理。</li>
                        <li>抹茶スイーツ：京都産の抹茶を使用した様々なスイーツ。</li>
                        <li>湯豆腐：シンプルながら奥深い味わいの豆腐料理。</li>
                    </ul>

                    <h3>イベントとフェスティバル</h3>
                    <ul>
                        <li>祇園祭：7月に行われる日本三大祭の一つ。豪華な山鉾が市中を練り歩きます。</li>
                        <li>紅葉シーズン：特に11月は多くの寺院や庭園で紅葉が楽しめ、夜間のライトアップも美しい。</li>
                        <li>ジャズフェスティバル：音楽の街・仙台で開催されるジャズの祭典。国内外の著名なジャズミュージシャンが参加し、市内各所でコンサートが開催されます。</li>
                    </ul>
                </div>
            </section>

            <section id="okinawa">
                <div class="imgs">
                    <img src="/image/okinawa.webp" alt="首里城">
                    <div id="OkinawaMap" style="height: 300px; width: 95%; margin: 10px 0;"></div>
                    <img src="/image/okinawa2.jpg" alt="美ら海水族館">
                </div>

                <div class="info">
                    <h2>沖縄<span>：イチャリバ チョーデー</span></h2>

                    <h3>歴史的背景</h3>
                    <p>
                    沖縄はかつて琉球王国として独自の文化を発展させた地域で、中国や東南アジアとの貿易による影響が見られます。第二次世界大戦の激戦地としても知られ、歴史的な遺跡が多く残ります。
                    </p>

                    <h3>文化とライフスタイル</h3>
                    <p>
                    独自の言語や伝統芸能、工芸品があり、リゾート地としても人気。美しい海と自然が魅力です。
                    </p>

                    <h3>おススメの場所</h3>
                    <ul>
                        <li>首里城：琉球王国時代の王城。色鮮やかな建築が特徴。</li>
                        <li>美ら海水族館：巨大な水槽が有名な水族館。</li>
                        <li>古宇利島：美しい海に囲まれた小島で、リラックスした時間が過ごせます。</li>
                        <li>波上宮：海に面した美しい神社。</li>
                    </ul>

                    <h3>おススメの料理</h3>
                    <ul>
                        <li>ゴーヤチャンプルー：苦味のあるゴーヤを使った沖縄の家庭料理。</li>
                        <li>沖縄そば：独特のコシのある麺とあっさりしたスープが特徴。</li>
                        <li>タコライス：メキシカン風タコスの具をご飯にのせた、沖縄生まれのファストフード。</li>
                    </ul>

                    <h3>イベントとフェスティバル</h3>
                    <ul>
                        <li>海の日海開き祭：7月の海の日に行われる、夏の海開きを祝うイベント。海岸での様々なアクティビティが楽しめます。</li>
                        <li>琉球王国祭り首里：10月末に首里城公園で行われる、琉球の伝統と文化を祝う祭り。伝統的な衣装や踊りが披露されます。</li>
                        <li>ジャズフェスティバル：音楽の街・仙台で開催されるジャズの祭典。国内外の著名なジャズミュージシャンが参加し、市内各所でコンサートが開催されます。</li>
                    </ul>
                </div>
            </section>

            <h1>プランの作り方</h1>
            <h2 id="lets-planMake">☆彡<span>プランを作成する際に重要なポイントや気を付ける点を解説していきます。</span></h2>
            <section id="planMake">
                <div class="imgs_make">
                    <img src="/image/planMake.jpg" alt="プランメイク1">
                    <img src="/image/planMake2.jpg" alt="プランメイク2">
                    <img src="/image/planMake3.png" alt="プランメイク3">
                    <img src="/image/planMake4.gif" alt="プランメイク4">
                </div>

                <div class="info">
                    <h3>プラン名</h3>
                    <ul>
                        <li>ポイント: プラン名は魅力的かつ記憶に残るものにしましょう。目的地の特色やプランのユニークな点を反映させると良いです。</li>
                        <li>注意点: 過度に長いまたは抽象的な名前は避け、簡潔で具体的な表現を心掛けましょう。また、プラン名が内容を正確に反映しているかを確認し、誤解を招くような誇大表現は避けることが大切です。</li>
                    </ul>

                    <h3>都道府県</h3>
                    <ul>
                        <li>ポイント: 訪れる都道府県を選ぶ際は、その地域の特色や見どころを考慮に入れましょう。観光スポットだけでなく、地元の文化やイベントもリサーチすると良いです。</li>
                        <li>注意点: 旅行の時期によっては、観光地の混雑や天候に影響されることがあるので、季節や気候を考慮することが重要です。また、地元の祭りやイベントの日程も確認し、それらをプランに組み入れるか検討すると、より充実した旅行体験が可能です。</li>
                    </ul>

                    <h3>滞在日数</h3>
                    <ul>
                        <li>ポイント: 訪れるスポットの数や種類に応じて、リアルな滞在日数を設定しましょう。移動時間も考慮に入れることが重要です。</li>
                        <li>注意点: 詰め込み過ぎると疲れるので、自分のペースに合わせて無理のないスケジュールを立てましょう。加えて、移動やアクティビティの間に十分な休憩時間を確保することで、旅行中の疲労を軽減できます。</li>
                    </ul>

                    <h3>予算</h3>
                    <ul>
                        <li>ポイント: 交通費、宿泊費、食事費などの基本的な経費を見積もり、余裕を持った予算設定をしましょう。</li>
                        <li>注意点: 予期せぬ出費に備え、少し余裕を持った予算計画を立てることが大切です。現地の物価や為替レートの変動を考慮して、予算を適宜調整する柔軟性も持ち合わせると良いでしょう。</li>
                    </ul>

                    <h3>主に利用する移動手段</h3>
                    <ul>
                        <li>ポイント: 目的地の地理やアクセス方法に応じて、最適な移動手段を選びましょう。公共交通機関とレンタカーの利用をバランスよく検討すると良いです。</li>
                        <li>注意点: 地方によっては公共交通機関が限られている場合があるので、事前に確認しておくことが重要です。また、レンタカーを利用する場合は、運転ルールや駐車場の利用可能性なども調べておくと安心です。</li>
                    </ul>

                    <h3>主に訪れるスポット</h3>
                    <ul>
                        <li>ポイント: 旅の目的に合わせて、見逃せない観光スポットや体験を選びましょう。定番の観光地だけでなく、あまり知られていない隠れた名所も探してみると良いです。</li>
                        <li>注意点: スポット間の移動時間や営業時間を事前に確認して、効率的なルートを考えましょう。また、混雑を避けるために早朝や平日の訪問を検討するなど、混雑状況に応じた対策も計画に含めると良いでしょう</li>
                    </ul>

                    <h3>プランの紹介文</h3>
                    <ul>
                        <li>ポイント: プランの魅力が伝わるように、具体的で情緒ある言葉を使って紹介文を書きましょう。写真や地図などのビジュアルを用いるとより分かりやすくなります。</li>
                        <li>注意点: 誇張しすぎず、実際の体験に基づいたリアルな情報を提供することが信頼性を高めます。加えて、文中に誤解を招く表現や不正確な情報がないかを確認し、客観性と正確性を保つことが重要です。</li>
                    </ul>
                </div>
            </section>
        </div>
        <button class="to_pageTop" id="to_pageTop" aria-label="scrollTop" style="display: none;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                <path fill="#ffffff" d="m12.9 5.1 10.7 10.7c.5.5.5 1.4 0 1.9l-1.2 1.2c-.5.5-1.3.5-1.9 0L12 10.4l-8.5 8.5c-.5.5-1.3.5-1.9 0L.4 17.7c-.5-.5-.5-1.4 0-1.9L11.1 5.1c.5-.5 1.3-.5 1.8 0z"/>
            </svg>
        </button>
    </main>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCMrNuv649uGGPyBJbXkHhl5ZdzgOpM-3E&callback=initMaps&libraries=&v=weekly" async></script>
    <script src="/js/newComer.js"></script>
    <script src="/js/toPageTop.js"></script>
</body>
    @include('layouts.footer')
</html>