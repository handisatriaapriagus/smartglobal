<section class="presence-hero">
    <div class="container presence-hero-grid">
        <div class="reveal"><div class="breadcrumbs breadcrumbs-light"><a href="<?= h(page_url()) ?>">Home</a><span>/</span><span>Global Presence</span></div><span class="eyebrow eyebrow-light">Global Presence</span><h1>Local Expertise.<br>Global Connections.</h1><p>Seven strategically located offices connect clients across Africa, Europe, Asia, and North America through one trusted global platform.</p><div class="hero-proof hero-proof-light"><span><?= icon('globe') ?><strong>7 global offices</strong></span><span><?= icon('users') ?><strong>50+ corporate partners</strong></span><span><?= icon('chart') ?><strong>1,000+ clients</strong></span></div></div>
        <div class="presence-hero-map reveal"><img src="<?= h(asset_url('Photos/Gemini_Generated_Image_ovz5wiovz5wiovz5.jpg')) ?>" alt="Global business network connecting regional locations"><div class="presence-badge"><strong>7</strong><span>Global Offices</span><b>1 Goal</b></div></div>
    </div>
</section>
<section class="section offices-section">
    <div class="container">
        <div class="section-heading centered reveal"><span class="eyebrow">Our Global Offices</span><h2>Where Global Standards Meet Local Insight</h2></div>
        <img class="global-map-full reveal" src="<?= h(asset_url('Photos/Gemini_Generated_Image_ylw09kylw09kylw0.jpg')) ?>" alt="Smart Global local offices map">
        <div class="office-grid">
            <?php foreach ($locations as $index => $location): ?>
                <article class="office-card reveal"><span class="office-pin"><?= icon('pin') ?></span><small>0<?= $index + 1 ?></small><h3><?= h($location[0]) ?> <?= h($location[1]) ?></h3><strong><?= h($location[2]) ?></strong><p><?= h($location[3]) ?></p><a href="<?= h(page_url('contact', ['office' => $location[0]])) ?>">Connect here <?= icon('arrow') ?></a></article>
            <?php endforeach; ?>
        </div>
        <div class="global-stats reveal"><div><strong>7</strong><span>Global offices</span></div><div><strong>50+</strong><span>Corporate partners</span></div><div><strong>1000+</strong><span>Clients worldwide</span></div><div><strong>500+</strong><span>Successful projects</span></div><div><strong>1</strong><span>Client commitment</span></div></div>
    </div>
</section>

<section class="connect-office">
    <div class="container connect-office-inner"><div><span class="eyebrow eyebrow-light">We Are Close, Wherever You Are.</span><h2>Choose your closest office or let us route your request.</h2></div><a class="button button-gold" href="<?= h(page_url('contact')) ?>">Connect With Us <?= icon('arrow') ?></a></div>
</section>
