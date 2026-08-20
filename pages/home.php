<?php
$homeServiceCopy = [
    'consulting' => ['INTERNATIONAL CONSULTING', 'Strategy. Market Entry. Projects. Partnerships.', 'Explore Consulting'],
    'education' => ['EDUCATION & TRAINING', 'Study Abroad. Corporate Training. AI. GIS. Executive Development.', 'Explore Education'],
    'business' => ['BUSINESS & INVESTMENT', 'Company Setup. Investment. Expansion. Global Growth.', 'Explore Business'],
    'digital' => ['DIGITAL & AI SOLUTIONS', 'Web. AI. ERP. CRM. Automation. Data. Digital Transformation.', 'Explore Digital'],
];
$homePricingCopy = [
    'consulting' => ['INTERNATIONAL CONSULTING', ['Project & Market Assessment', 'Strategy & Business Development', 'Market Entry Support', 'Partnership Development'], 'Explore Consulting'],
    'education' => ['EDUCATION & TRAINING', ['Study Abroad Guidance', 'Corporate Training Programs', 'AI · GIS · Leadership · HR', 'Executive Development'], 'Explore Education'],
    'business' => ['BUSINESS SETUP & INVESTMENT', ['Company Setup Advisory', 'Market Entry Support', 'Investment Advisory', 'International Expansion'], 'Explore Business'],
    'digital' => ['DIGITAL & AI SOLUTIONS', ['Web & Digital Solutions', 'AI & Automation', 'ERP · CRM · Cloud Solutions', 'Digital Transformation'], 'Explore Digital'],
];
?>
<section class="hero home-hero" style="--hero-art: url('<?= h(asset_url('backgrounds/01 (2).png')) ?>')">
    <div class="container hero-grid">
        <div class="hero-copy reveal">
            <span class="eyebrow">From Egypt to the World</span>
            <h1>SMART SOLUTIONS.<br>GLOBAL OPPORTUNITIES.<br><span>ONE TRUSTED PLATFORM.</span></h1>
            <p>Smart Global Group connects businesses, investors, institutions, professionals and students with integrated solutions across consulting, education, investment and digital transformation.</p>
            <div class="hero-actions">
                <a class="button button-navy" href="#solutions">Explore Our Solutions <?= icon('arrow') ?></a>
                <a class="button button-light" href="<?= h(page_url('contact')) ?>">Free Assessment <?= icon('arrow') ?></a>
            </div>
            <div class="hero-proof">
                <span><?= icon('building') ?><strong>Egypt Headquarters</strong></span>
                <span><?= icon('globe') ?><strong>7 Global Markets</strong></span>
                <span><?= icon('spark') ?><strong>4 Core Sectors</strong></span>
                <span><?= icon('users') ?><strong>1 Integrated Platform</strong></span>
            </div>
        </div>
        <div class="hero-visual reveal" data-delay="1">
            <img src="<?= h(asset_url('Photos/Gemini_Generated_Image_gsu1legsu1legsu1.jpg')) ?>" alt="Smart Global network connecting Egypt with seven global locations">
        </div>
    </div>
</section>
<section class="service-overview section" id="solutions">
    <div class="container">
        <h2 class="sr-only">Our Solutions</h2>
        <div class="service-grid">
            <?php foreach ($services as $slug => $item): $homeCopy = $homeServiceCopy[$slug]; ?>
                <article class="service-card reveal">
                    <div class="service-card-top">
                        <span class="service-number"><?= h($item['number']) ?></span>
                        <span class="service-icon"><?= icon($slug === 'consulting' ? 'briefcase' : ($slug === 'education' ? 'book' : ($slug === 'business' ? 'building' : 'spark'))) ?></span>
                    </div>
                    <h3><?= h($homeCopy[0]) ?></h3>
                    <p><?= h($homeCopy[1]) ?></p>
                    <a href="<?= h(page_url($slug)) ?>"><?= h($homeCopy[2]) ?> <?= icon('arrow') ?></a>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="why-section">
    <div class="container why-grid">
        <div class="why-intro reveal">
            <span class="eyebrow eyebrow-light">Why Smart Global?</span>
            <h2>ONE PLATFORM. LIMITLESS POSSIBILITIES.</h2>
            <p>Instead of coordinating several different providers, access strategy, international business development, education, company setup, investment support and technology through one Smart Global ecosystem.</p>
            <a class="button button-outline-light" href="<?= h(page_url('about')) ?>">Discover the Advantage <?= icon('arrow') ?></a>
        </div>
        <div class="benefit-grid">
            <article class="benefit reveal"><?= icon('globe') ?><h3>GLOBAL EXPERTISE</h3><p>Local knowledge with international standards.</p></article>
            <article class="benefit reveal"><?= icon('spark') ?><h3>INTEGRATED SOLUTIONS</h3><p>All your needs. One trusted partner.</p></article>
            <article class="benefit reveal"><?= icon('shield') ?><h3>SMART APPROACH</h3><p>AI, technology and data driven solutions.</p></article>
            <article class="benefit reveal"><?= icon('users') ?><h3>PROVEN IMPACT</h3><p>Measurable results. Sustainable growth.</p></article>
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
            <article class="glass-card reveal"><span><?= icon('globe') ?></span><small>Our Vision</small><h3>A smarter world connected by opportunity.</h3><p>To be the leading global platform that empowers businesses, people and communities to grow through knowledge, innovation and international collaboration.</p></article>
            <article class="glass-card reveal"><span><?= icon('spark') ?></span><small>Our Mission</small><h3>We create pathways to global success.</h3><p>We deliver integrated solutions in consulting, education, investment and digital transformation to help our clients build, expand and transform with confidence.</p></article>
            <article class="glass-card reveal"><span><?= icon('shield') ?></span><small>Our Promises</small><h3>We promise more than services.</h3><ul class="promise-list"><li><?= icon('check') ?>Global expertise with local understanding</li><li><?= icon('check') ?>Transparent pricing and clear communication</li><li><?= icon('check') ?>High quality, measurable results</li><li><?= icon('check') ?>Long-term partnerships, not short-term deals</li><li><?= icon('check') ?>Your success is our commitment</li></ul></article>
        </div>
    </div>
</section>

<section class="pricing-preview section">
    <div class="container">
        <div class="section-heading centered reveal">
            <span class="eyebrow">Smart Solutions. Smart Prices.</span>
            <h2>Start Your Global Journey Today</h2>
            <p>Choose the solution that fits your goal. Affordable. Transparent. Global.</p>
        </div>
        <?= currency_selector() ?>
        <div class="pricing-layout">
            <div class="price-grid">
                <?php foreach ($services as $slug => $item): $program = $item['programs'][0]; $pricingCopy = $homePricingCopy[$slug]; ?>
                    <article class="price-card reveal">
                        <span class="price-icon"><?= icon($slug === 'consulting' ? 'globe' : ($slug === 'education' ? 'book' : ($slug === 'business' ? 'building' : 'spark'))) ?></span>
                        <h3><?= h($pricingCopy[0]) ?></h3>
                        <p class="price-starting">Starting From</p>
                        <div class="price-values"><?= currency_price($program[2], $program[3], $program[4]) ?></div>
                        <ul><?php foreach ($pricingCopy[1] as $feature): ?><li><?= icon('check') ?><?= h($feature) ?></li><?php endforeach; ?></ul>
                        <a class="button button-outline" href="<?= h(page_url($slug)) ?>"><?= h($pricingCopy[2]) ?> <?= icon('arrow') ?></a>
                    </article>
                <?php endforeach; ?>
            </div>
            <article class="featured-package reveal">
                <span class="best-value">Best Value</span>
                <h3>SMART GLOBAL 360</h3>
                <p class="featured-subtitle">Global Business Launch</p>
                <div class="featured-services"><span><?= icon('briefcase') ?>Consulting</span><b>+</b><span><?= icon('building') ?>Business Setup</span><b>+</b><span><?= icon('chart') ?>Digital Presence</span><b>+</b><span><?= icon('users') ?>Training</span></div>
                <p>Everything you need to launch and grow your business globally.</p>
                <div class="featured-price"><?= currency_price('89,000', '1,490,000', '1,774') ?></div>
                <a class="button button-gold" href="<?= h(page_url('packages')) ?>">Explore All Packages <?= icon('arrow') ?></a>
            </article>
        </div>
        <div class="value-strip home-value-strip reveal">
            <div class="value-item"><?= icon('tag') ?><span><strong>Competitive Prices</strong><small>Best value in the market</small></span></div>
            <div class="value-item"><?= icon('shield') ?><span><strong>No Hidden Fees</strong><small>Transparent &amp; clear</small></span></div>
            <div class="value-item"><?= icon('users') ?><span><strong>Expert Support</strong><small>We are always with you</small></span></div>
            <div class="value-item"><?= icon('globe') ?><span><strong>Global Network</strong><small>7 strategic markets</small></span></div>
            <div class="value-item"><?= icon('clock') ?><span><strong>Flexible Payment</strong><small>Plans that fit you</small></span></div>
        </div>
    </div>
</section>

<section class="home-presence section" style="--presence-layout: url('<?= h(asset_url('backgrounds/01 (1).png')) ?>')">
    <div class="container presence-preview-grid">
        <div class="presence-copy reveal">
            <span class="eyebrow eyebrow-light">Global Presence</span>
            <h2>LOCAL EXPERTISE.<br>GLOBAL CONNECTIONS.</h2>
            <p>Headquartered in Egypt, we operate across seven strategic markets to serve you better.</p>
            <a class="button button-gold" href="<?= h(page_url('presence')) ?>">View All Locations <?= icon('arrow') ?></a>
        </div>
        <img class="presence-map reveal" src="<?= h(asset_url('Photos/Gemini_Generated_Image_ylw09kylw09kylw0.jpg')) ?>" alt="Map of Smart Global offices in Egypt, Rwanda, the UK, USA, Indonesia, Malaysia, and Singapore">
    </div>
</section>
