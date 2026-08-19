<section class="hero home-hero" style="--hero-art: url('<?= h(asset_url('backgrounds/01 (2).png')) ?>')">
    <div class="container hero-grid">
        <div class="hero-copy reveal">
            <span class="eyebrow">Global Vision. Smart Solutions. Lasting Impact.</span>
            <h1>Smart Solutions.<br><span>Global Opportunities.</span><br>One Trusted Platform.</h1>
            <p>Smart Global Group connects businesses, investors, students, professionals, and institutions with integrated solutions across consulting, education, business setup, and digital transformation.</p>
            <div class="hero-actions">
                <a class="button button-navy" href="#solutions">Explore Our Solutions <?= icon('arrow') ?></a>
                <a class="button button-light" href="<?= h(page_url('contact')) ?>">Free Assessment <?= icon('arrow') ?></a>
            </div>
            <div class="hero-proof">
                <span><?= icon('globe') ?><strong>Egypt HQ</strong></span>
                <span><?= icon('building') ?><strong>7 global offices</strong></span>
                <span><?= icon('users') ?><strong>1,000+ clients</strong></span>
            </div>
        </div>
        <div class="hero-visual reveal" data-delay="1">
            <img src="<?= h(asset_url('Photos/Gemini_Generated_Image_gsu1legsu1legsu1.jpg')) ?>" alt="Smart Global network connecting Egypt with seven global locations">
            <div class="hero-location-stack" aria-label="Global locations">
                <?php foreach ($locations as $location): ?>
                    <span><i></i><?= h($location[0]) ?></span>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<section class="service-overview section" id="solutions">
    <div class="container">
        <div class="section-heading centered reveal">
            <span class="eyebrow">Explore Our Solutions</span>
            <h2>One Platform. Limitless Possibilities.</h2>
            <p>Four integrated solution areas designed to move your ambitions from idea to measurable global impact.</p>
        </div>
        <div class="service-grid">
            <?php foreach ($services as $slug => $item): ?>
                <article class="service-card reveal">
                    <div class="service-card-top">
                        <span class="service-number"><?= h($item['number']) ?></span>
                        <span class="service-icon"><?= icon($slug === 'consulting' ? 'briefcase' : ($slug === 'education' ? 'book' : ($slug === 'business' ? 'building' : 'spark'))) ?></span>
                    </div>
                    <h3><?= h($item['eyebrow']) ?></h3>
                    <p><?= h($item['summary']) ?></p>
                    <a href="<?= h(page_url($slug)) ?>">Explore solution <?= icon('arrow') ?></a>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="why-section">
    <div class="container why-grid">
        <div class="why-intro reveal">
            <span class="eyebrow eyebrow-light">Why Smart Global?</span>
            <h2>One Platform. Limitless Possibilities.</h2>
            <p>Instead of coordinating multiple providers, you gain one accountable global partner with local execution power.</p>
            <a class="button button-outline-light" href="<?= h(page_url('about')) ?>">Discover Smart Global <?= icon('arrow') ?></a>
        </div>
        <div class="benefit-grid">
            <article class="benefit reveal"><?= icon('globe') ?><h3>Global Expertise</h3><p>Local knowledge with international standards.</p></article>
            <article class="benefit reveal"><?= icon('spark') ?><h3>Integrated Solutions</h3><p>One team across strategy, execution, and growth.</p></article>
            <article class="benefit reveal"><?= icon('shield') ?><h3>Smart Approach</h3><p>Clear processes, practical plans, measurable value.</p></article>
            <article class="benefit reveal"><?= icon('users') ?><h3>Trusted Impact</h3><p>Long-term relationships built across global markets.</p></article>
        </div>
    </div>
</section>

<section class="purpose-section section" style="--purpose-art: url('<?= h(asset_url('backgrounds/3.png')) ?>')">
    <div class="container">
        <div class="section-heading centered reveal">
            <span class="eyebrow">Our Purpose. Your Growth. Global Impact.</span>
            <h2>Vision. Mission. Our Promises.</h2>
        </div>
        <div class="purpose-grid">
            <article class="glass-card reveal"><span><?= icon('globe') ?></span><small>Our Vision</small><h3>A smarter world connected by opportunity.</h3><p>Be the leading global platform that connects businesses, people, and communities to grow through knowledge, innovation, and international collaboration.</p></article>
            <article class="glass-card reveal"><span><?= icon('spark') ?></span><small>Our Mission</small><h3>We create pathways to global success.</h3><p>Deliver integrated solutions in consulting, education, investment, and digital transformation to help our clients build, expand, and transform with confidence.</p></article>
            <article class="glass-card reveal"><span><?= icon('shield') ?></span><small>Our Promise</small><h3>We promise more than service.</h3><p>Global expertise with local understanding, transparent value, high quality, tailored solutions, and long-term partnerships.</p></article>
        </div>
    </div>
</section>

<section class="pricing-preview section">
    <div class="container">
        <div class="section-heading split reveal">
            <div><span class="eyebrow">Smart Solutions. Smart Prices.</span><h2>Start Your Global Journey Today</h2></div>
            <p>Choose the solution that fits your goal. Transparent scope, flexible plans, and expert support from start to finish.</p>
        </div>
        <?= currency_selector() ?>
        <div class="price-grid">
            <?php foreach ($services as $slug => $item): $program = $item['programs'][0]; ?>
                <article class="price-card reveal">
                    <span class="price-icon"><?= icon($slug === 'consulting' ? 'briefcase' : ($slug === 'education' ? 'book' : ($slug === 'business' ? 'building' : 'spark'))) ?></span>
                    <h3><?= h($item['eyebrow']) ?></h3>
                    <p><?= h($program[1]) ?></p>
                    <div class="price-values"><?= currency_price($program[2], $program[3], $program[4]) ?></div>
                    <ul><?php foreach (array_slice($item['features'], 0, 4) as $feature): ?><li><?= icon('check') ?><?= h($feature) ?></li><?php endforeach; ?></ul>
                    <a class="button button-outline" href="<?= h(page_url($slug)) ?>">Explore <?= h(explode(' ', $item['eyebrow'])[0]) ?> <?= icon('arrow') ?></a>
                </article>
            <?php endforeach; ?>
        </div>
        <div class="value-strip reveal"><span><?= icon('shield') ?>No hidden fees</span><span><?= icon('users') ?>Expert support</span><span><?= icon('globe') ?>Global network</span><span><?= icon('chart') ?>Flexible payment</span></div>
    </div>
</section>

<section class="home-presence section" style="--presence-layout: url('<?= h(asset_url('backgrounds/01 (1).png')) ?>')">
    <div class="container presence-preview-grid">
        <div class="presence-copy reveal">
            <span class="eyebrow eyebrow-light">Global Presence</span>
            <h2>Local Expertise.<br>Global Connections.</h2>
            <p>Our seven-office network combines regional insight with one connected global standard.</p>
            <div class="location-chips"><?php foreach ($locations as $location): ?><span><?= h($location[0]) ?></span><?php endforeach; ?></div>
            <a class="button button-gold" href="<?= h(page_url('presence')) ?>">View All Locations <?= icon('arrow') ?></a>
        </div>
        <img class="presence-map reveal" src="<?= h(asset_url('Photos/Gemini_Generated_Image_ylw09kylw09kylw0.jpg')) ?>" alt="Map of Smart Global offices in Egypt, Rwanda, the UK, USA, Indonesia, Malaysia, and Singapore">
    </div>
</section>
