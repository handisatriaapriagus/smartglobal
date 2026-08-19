<section class="simple-hero packages-hero">
    <div class="container simple-hero-inner reveal">
        <div><span class="eyebrow eyebrow-light">Transparent Programs & Flexible Plans</span><h1>Solutions Built Around Your Goal</h1><p>Explore practical starting packages across our four solution areas, then tailor the scope with a Smart Global advisor.</p></div>
        <a class="button button-gold" href="<?= h(page_url('contact')) ?>">Talk to an Advisor <?= icon('arrow') ?></a>
    </div>
</section>
<section class="section package-directory">
    <div class="container">
        <div class="package-tabs" role="tablist" aria-label="Solution packages">
            <?php foreach ($services as $slug => $item): ?><button type="button" role="tab" aria-selected="<?= $slug === 'consulting' ? 'true' : 'false' ?>" data-package-tab="<?= h($slug) ?>"><b><?= h($item['number']) ?></b><?= h($item['eyebrow']) ?></button><?php endforeach; ?>
        </div>
        <?php foreach ($services as $slug => $item): ?>
            <section class="package-panel" data-package-panel="<?= h($slug) ?>" <?= $slug === 'consulting' ? '' : 'hidden' ?>>
                <div class="section-heading split"><div><span class="eyebrow"><?= h($item['number']) ?> Solution</span><h2><?= h($item['eyebrow']) ?></h2></div><p><?= h($item['summary']) ?></p></div>
                <div class="program-grid program-count-<?= count($item['programs']) ?>">
                    <?php foreach ($item['programs'] as $index => $program): ?>
                        <article class="program-card <?= $index === 1 ? 'featured' : '' ?>">
                            <?php if ($index === 1): ?><span class="best-value">Most Popular</span><?php endif; ?>
                            <span class="program-index">0<?= $index + 1 ?></span><h3><?= h($program[0]) ?></h3><p><?= h($program[1]) ?></p>
                            <div class="program-prices"><span><small>EGP</small><?= h($program[2]) ?></span><span><small>IDR</small><?= h($program[3]) ?></span><span><small>USD</small><?= h($program[4]) ?></span></div>
                            <ul><?php foreach (array_slice($item['features'], 0, 4) as $feature): ?><li><?= icon('check') ?><?= h($feature) ?></li><?php endforeach; ?></ul>
                            <a class="button <?= $index === 1 ? 'button-gold' : 'button-navy' ?>" href="<?= h(page_url('contact', ['service' => $slug, 'program' => $program[0]])) ?>">Select Package <?= icon('arrow') ?></a>
                        </article>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endforeach; ?>
    </div>
</section>

<section class="education-programs section">
    <div class="container">
        <div class="section-heading centered reveal"><span class="eyebrow">Our Educational Programs</span><h2>Build Skills. Open Global Pathways.</h2></div>
        <div class="education-card-grid">
            <article><img src="<?= h(asset_url('Photos/Gemini_Generated_Image_h32ykih32ykih32y.jpg')) ?>" alt="High school students learning together"><span>High School</span><h3>International Diploma & Foundation</h3><p>Pathway counseling, placement support, and study-readiness programs.</p></article>
            <article><img src="<?= h(asset_url('Photos/Gemini_Generated_Image_7plxuk7plxuk7plx.jpg')) ?>" alt="International university graduates"><span>Universities</span><h3>University Admissions</h3><p>Undergraduate, postgraduate, scholarship, and application support.</p></article>
            <article><img src="<?= h(asset_url('Photos/Gemini_Generated_Image_ixn7j2ixn7j2ixn7.jpg')) ?>" alt="Students developing digital skills"><span>Professional</span><h3>Business & Technology</h3><p>Career-ready professional training and executive development.</p></article>
            <article><img src="<?= h(asset_url('Photos/Gemini_Generated_Image_3u0xmj3u0xmj3u0x.jpg')) ?>" alt="Medical professionals collaborating"><span>Specialist</span><h3>Medical & Technical Programs</h3><p>Focused development programs with experienced industry practitioners.</p></article>
        </div>
    </div>
</section>

<section class="payment-section section-compact">
    <div class="container payment-grid">
        <div><span class="eyebrow eyebrow-light">Flexible Payment Solutions</span><h2>Plan Today. Pay Your Way.</h2><p>Installment support and multiple local and international payment options are available for eligible programs.</p></div>
        <div class="payment-marks"><span>VISA</span><span>mastercard.</span><span>PayPal</span><span>Fawry</span><span>valU</span><span>Paymob</span></div>
    </div>
</section>
