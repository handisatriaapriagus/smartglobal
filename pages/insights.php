<section class="insights-hero">
    <div class="container insights-hero-grid">
        <div class="reveal"><div class="breadcrumbs"><a href="<?= h(page_url()) ?>">Home</a><span>/</span><span>Insights</span></div><span class="eyebrow">Insights</span><h1>Smart Insights.<br>Stronger Decisions.</h1><p>Expert perspectives, market intelligence, and practical knowledge across key sectors to help you stay ahead.</p><div class="insight-topics"><span><?= icon('briefcase') ?>Expert analysis</span><span><?= icon('chart') ?>Market intelligence</span><span><?= icon('spark') ?>Actionable insights</span><span><?= icon('globe') ?>Global perspective</span></div></div>
        <div class="insights-orbit reveal"><img src="<?= h(asset_url('Photos/Gemini_Generated_Image_ovz5wiovz5wiovz5.jpg')) ?>" alt="Global insight and opportunity network"><blockquote>Knowledge is power.<br>Insight is advantage.</blockquote></div>
    </div>
</section>
<section class="section insight-directory">
    <div class="container">
        <div class="section-heading centered reveal"><span class="eyebrow">Insights by Sector</span><h2>Explore Ideas That Move Ambition Forward</h2></div>
        <div class="insight-grid">
            <?php foreach ($insights as $index => $article): ?>
                <article class="insight-card reveal"><a class="insight-image" href="#article-<?= $index + 1 ?>"><img src="<?= h(asset_url($article[2])) ?>" alt="<?= h($article[0]) ?> insight"></a><div><span><?= h($article[0]) ?></span><h2><a href="#article-<?= $index + 1 ?>"><?= h($article[1]) ?></a></h2><p>Practical guidance from Smart Global specialists, shaped by real international projects and regional market experience.</p><small><?= icon('clock') ?><?= h($article[3]) ?></small></div></article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="newsletter-banner">
    <div class="container newsletter-banner-inner"><div><?= icon('mail') ?><span><small>Join Our Free E-Insights News Monthly</small><strong>Get the latest updates, reports, and expert perspectives delivered to your inbox.</strong></span></div><form method="post" action="<?= h(page_url('insights')) ?>"><input type="hidden" name="csrf_token" value="<?= h($csrfToken) ?>"><input type="hidden" name="form_kind" value="newsletter"><input type="hidden" name="return_page" value="insights"><input class="honeypot" name="website" type="text" tabindex="-1" autocomplete="off"><input name="email" type="email" placeholder="Enter your email address" required><button class="button button-gold" type="submit">Subscribe <?= icon('arrow') ?></button></form></div>
</section>
