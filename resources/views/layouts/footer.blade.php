<!DOCTYPE html>
<html lang="ja">
<head>
    <link rel="stylesheet" href="/css/footer.css">
</head>
<body>

<footer class="footer">
    <div class="footer-content">
        <!-- サイト情報やサポートなどのリンク部分 -->
        <div class="footer-links">
            <a href="{{ route('extras.siteInfo') }}" class="footer-link">サイト情報</a>
            <a href="{{ route('extras.siteInfo') }}" class="footer-link">サポート</a>
            <a href="{{ route('extras.FAQ') }}" class="footer-link">FAQ</a>
            <a href="{{ route('extras.contact') }}" class="footer-link">お問い合わせ</a>
        </div>

        <!-- ロゴ部分 -->
        <div class="footer-logo">
            <img src="/image/Tabi Notes.jpg">
            <div class="footer_text">Tabi Notes</div>
        </div>

        <!-- SNS -->
        <div class="sns">
        <button class="x-twitter" aria-label="x-Twitter">
            <svg xmlns="http://www.w3.org/2000/svg" height="29" width="29" viewBox="0 0 512 512">
                <path fill="currentcolor" d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/>
            </svg>
        </button>

        <button class="instagram" aria-label="Instagram">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="29" height="29">
                <path fill="#ffffff" d="M12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6zm0-2a5 5 0 1 1 0 10 5 5 0 0 1 0-10zm6.5-.25a1.25 1.25 0 0 1-2.5 0 1.25 1.25 0 0 1 2.5 0zM12 4c-2.474 0-2.878.007-4.029.058-.784.037-1.31.142-1.798.332-.434.168-.747.369-1.08.703a2.89 2.89 0 0 0-.704 1.08c-.19.49-.295 1.015-.331 1.798C4.006 9.075 4 9.461 4 12c0 2.474.007 2.878.058 4.029.037.783.142 1.31.331 1.797.17.435.37.748.702 1.08.337.336.65.537 1.08.703.494.191 1.02.297 1.8.333C9.075 19.994 9.461 20 12 20c2.474 0 2.878-.007 4.029-.058.782-.037 1.309-.142 1.797-.331.433-.169.748-.37 1.08-.702.337-.337.538-.65.704-1.08.19-.493.296-1.02.332-1.8.052-1.104.058-1.49.058-4.029 0-2.474-.007-2.878-.058-4.029-.037-.782-.142-1.31-.332-1.798a2.911 2.911 0 0 0-.703-1.08 2.884 2.884 0 0 0-1.08-.704c-.49-.19-1.016-.295-1.798-.331C14.925 4.006 14.539 4 12 4zm0-2c2.717 0 3.056.01 4.122.06 1.065.05 1.79.217 2.428.465.66.254 1.216.598 1.772 1.153a4.908 4.908 0 0 1 1.153 1.772c.247.637.415 1.363.465 2.428.047 1.066.06 1.405.06 4.122 0 2.717-.01 3.056-.06 4.122-.05 1.065-.218 1.79-.465 2.428a4.883 4.883 0 0 1-1.153 1.772 4.915 4.915 0 0 1-1.772 1.153c-.637.247-1.363.415-2.428.465-1.066.047-1.405.06-4.122.06-2.717 0-3.056-.01-4.122-.06-1.065-.05-1.79-.218-2.428-.465a4.89 4.89 0 0 1-1.772-1.153 4.904 4.904 0 0 1-1.153-1.772c-.248-.637-.415-1.363-.465-2.428C2.013 15.056 2 14.717 2 12c0-2.717.01-3.056.06-4.122.05-1.066.217-1.79.465-2.428a4.88 4.88 0 0 1 1.153-1.772A4.897 4.897 0 0 1 5.45 2.525c.638-.248 1.362-.415 2.428-.465C8.944 2.013 9.283 2 12 2z"/>
            </svg>
        </button>

        <button class="facebook" aria-label="Facebook">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="39" height="29">
                <path fill="#ffffff" d="M12 2C6.477 2 2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.879V14.89h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.989C18.343 21.129 22 16.99 22 12c0-5.523-4.477-10-10-10z"/>
            </svg>
        </button>

        <button class="youtube" aria-label="YouTube">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="29" height="29">
                <path fill="#da1725" d="M21.543 6.498C22 8.28 22 12 22 12s0 3.72-.457 5.502c-.254.985-.997 1.76-1.938 2.022C17.896 20 12 20 12 20s-5.893 0-7.605-.476c-.945-.266-1.687-1.04-1.938-2.022C2 15.72 2 12 2 12s0-3.72.457-5.502c.254-.985.997-1.76 1.938-2.022C6.107 4 12 4 12 4s5.896 0 7.605.476c.945.266 1.687 1.04 1.938 2.022zM10 15.5l6-3.5-6-3.5v7z"/>
            </svg>
        </button>
        </div>

        <!-- 利用規約などのリンク部分 -->
        <div class="footer-terms">
            <a href="{{ route('extras.userAgreement') }}" class="terms-link">利用規約</a><a class="slash">|</a>
            <a href="{{ route('extras.privacyPolicy') }}" class="terms-link">プライバシー規約</a><a class="slash">|</a>
            <a href="{{ route('extras.sitemap') }}" class="terms-link">サイトマップ</a>
        </div>

        <!-- 著作権表示部分 -->
        <div class="footer-copyright">
            &copy; 2023 Tabi Notes, All rights reserved.
        </div>
    </div>
</footer>

</body>
</html>