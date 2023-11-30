<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/css/sticky.css">
    <title>Tabi Notes</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="/js/luxy.js" charset="utf-8"></script>
</head>
<body>
    <!-- @include('layouts.header') -->
    <main>
    <div id="luxy">
        <div class="contents-block outer-block">

          <section class="mv-block outer-block">
            <div class="mv-area">
              <h1 class="mv-ttl">luxy.js demo page</h1>
              <div class="mv-side">
                <div class="luxy-el skater" data-speed-y="40" data-offset="0">
                  <img src="/image/skater.png" alt="">
                </div>
              </div>
            </div>
            <div class="luxy-el leaves leaves01" data-speed-y="-10" data-offset="0" data-horizontal='1' data-speed-x="-10">
              <img src="/image/leaves01.png" alt="">
            </div>
            <div class="luxy-el leaves leaves02" data-speed-y="-10" data-offset="0" data-horizontal='1' data-speed-x="10">
              <img src="/image/leaves02.png" alt="">
            </div>
            <div class="luxy-el leaves-b leaves-b01" data-speed-y="-90" data-offset="0" data-horizontal='1' data-speed-x="-30">
              <img src="/image/leaves-blur01.png" alt="">
            </div>
            <div class="luxy-el leaves-b leaves-b02" data-speed-y="-90" data-offset="0" data-horizontal='1' data-speed-x="30">
              <img src="/image/leaves-blur02.png" alt="">
            </div>
            <div class="luxy-el leaves-b leaves-b03" data-speed-y="-60" data-offset="0" data-horizontal='1' data-speed-x="-30">
              <img src="/image/leaves-blur03.png" alt="">
            </div>
            <div class="luxy-el leaves-b leaves-b04" data-speed-y="-60" data-offset="0" data-horizontal='1' data-speed-x="30">
              <img src="/image/leaves-blur04.png" alt="">
            </div>
          </section><!-- /outer-block-->

          <!-- <section class="other-block outer-block">
            <div class="inner-block">
              <h2 class="c-ttl01">プラグインで慣性スクロールと<br class="sp">パララックスを<br class="sp">実装するデモサイト</h2>
              <div class="cont-wrap">
                <div class="txt-area">
                  <h3 class="ttl">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vulputate sagittis purus. </h3>
                  <p class="txt">
                    Praesent sit amet tincidunt dolor, vitae convallis dui. Mauris sit amet dapibus elit. Nam a faucibus augue, a tincidunt massa. Proin pellentesque auctor eleifend. Ut suscipit non sapien id porta. Praesent eget scelerisque lacus. Sed ullamcorper, sapien non molestie vestibulum, lacus sem fermentum arcu, eget aliquam est purus ut justo. Pellentesque tempor gravida accumsan. Etiam quam libero, tristique quis faucibus sit amet, blandit ac diam. Nulla et lorem tristique, euismod dolor sed, lacinia quam. Nulla molestie pretium fringilla. Aenean quis neque a lorem consectetur ultricies. Curabitur ullamcorper purus id libero finibus cursus.
                  </p>
                </div>
                <div class="img-area">
                  <div class="luxy-el skater01" data-speed-y="-20" data-offset="700">
                    <img src="/image/skater01.png" alt="">
                  </div>
                  <div class="luxy-el skater02" data-speed-y="-5" data-offset="100">
                    <img src="/image/skater02.png" alt="">
                  </div>
                </div>
              </div>
              <div class="long-wrap">
                <div class="img-area">
                  <div class="luxy-el long01" data-speed-y="-5" data-offset="300">
                    <img src="/image/long01.png" alt="">
                  </div>
                  <div class="luxy-el long02" data-speed-y="-15" data-offset="600">
                    <img src="/image/long02.png" alt="">
                  </div>
                  <div class="luxy-el long03" data-speed-y="-15" data-offset="600">
                    <img src="/image/long03.png" alt="">
                  </div>
                </div>
              </div>
            </div>

          </section> -->


        </div><!-- /contents-block -->
        @include('layouts.footer')
      </div>
    </main>
    <script>
    luxy.init({
			wrapper: '#luxy',
			targets : '.luxy-el',
			wrapperSpeed:  0.08
		});
    </script>
</body>
</html>