<?php
$styleplaceholder=TD."/asset/css/index.css";
include 'header.php';
?>
<div class="index-baner">
    <picture>
        <source media="(max-width : 600px)" srcset="<?php echo TD; ?>/asset/imgs/index-imgs/mobile-baner.jpg">
        <img src="<?php echo TD; ?>/asset/imgs/index-imgs/desktop-baner.jpg">
    </picture>
</div>
<div class="index-category-links">
    <a href="">
        <img src="<?php echo TD; ?>/asset/imgs/index-imgs/football.png">
        <p>فوتبال</p>
    </a>
    <a href="">
        <img src="<?php echo TD; ?>/asset/imgs/index-imgs/basketbal.png">
        <p>بسکتبال</p>
    </a>
    <a href="">
        <img src="<?php echo TD; ?>/asset/imgs/index-imgs/volleyball.png">
        <p>والیبال</p>
    </a>
</div>
<div class="last-news">
    <h3>آخرین اخبار</h3>
    <div class="last-news-content">
        <a href="">
            <img src="<?php echo TD; ?>/asset/imgs/index-imgs/news1.jpg">
            <p>توافق استقلا و پرسپولیس</p>
        </a>
        <a href="">
            <img src="<?php echo TD; ?>/asset/imgs/index-imgs/news2.jpg">
            <p>توافق استقلا و پرسپولیس</p>
        </a>
        <a href="">
            <img src="<?php echo TD; ?>/asset/imgs/index-imgs/news3.jpg">
            <p>توافق استقلا و پرسپولیس</p>
        </a>
        <a href="">
            <img src="<?php echo TD; ?>/asset/imgs/index-imgs/news4.jpg">
            <p>توافق استقلا و پرسپولیس</p>
        </a>
    </div>
</div>
<hr>
<div class="index-tow-col">
    <div class="analyse">
        <h3>تحلیل بازی استقلال و پرسپولیس</h3>
        <p>
            به گزارش "ورزش سه"، پنجره تابستانی 2022 با چند انتقال بزرگ شروع شد؛ ارلینگ هالند به منچسترسیتی رفت، سادیو مانه راهی بایرن مونیخ شد و روملو لوکاکو هم به اینتر برگشت تا فصل ناامیدکننده‌اش در استمفوردبریج را در سن سیرو جبران کند. در چند روز اخیر هم انتقال های قابل توجهی صورت گرفت که مهمترین آنها مربوط به یوونتوس بود که آنخل دی ماریا و پل پوگبا را به خدمت گرفته است.
        </p>
        <img  src="<?php echo TD; ?>/asset/imgs/index-imgs/derbi.jpg">
    </div>
    <div class="result">
        <h3>نتایج بازی های امروز</h3>
        <ul>
        <li>استقال 0 - 4 پرپولیس</li>
        <li>ترکتور 6 - 0 سپاهان</li>
        <li>بارسلونا 0 - 4 رئال مادرید</li>
        <li>بایر مونیخ 0 - 4 لیورپول</li>
        </ul>
    </div>
</div>
<?php
include 'footer.php';
?>
