<section class="service-hero service-hero-<?= h($page) ?>" style="--service-bg: url('<?= h(asset_url($service['background'])) ?>'); --service-hero: url('<?= h(asset_url($service['hero'])) ?>')">
    <div class="container service-hero-grid">
        <div class="service-hero-copy reveal">
            <div class="breadcrumbs breadcrumbs-light"><a href="<?= h(page_url()) ?>">Home</a><span>/</span><a href="#">Solutions</a><span>/</span><span><?= h($service['eyebrow']) ?></span></div>
            <span class="service-label"><b><?= h($service['number']) ?></b><?= h($service['eyebrow']) ?></span>
            <h1><?= h($service['title']) ?></h1>
            <p><?= h($service['summary']) ?></p>
            <div class="hero-actions">
                <a class="button button-gold" href="#programs">View Programs <?= icon('arrow') ?></a>
                <a class="button button-outline-light" href="<?= h(page_url('contact', ['service' => $page])) ?>">Free Assessment</a>
            </div>
        </div>
        <div class="service-hero-visual reveal"><div class="service-hero-frame"><img src="<?= h(asset_url($service['hero'])) ?>" alt="<?= h($service['eyebrow']) ?>"></div></div>
    </div>
</section>
<section class="metric-bar metric-bar-dark">
    <div class="container metrics">
        <?php foreach ($service['stats'] as $stat): ?><div><strong><?= h($stat[0]) ?></strong><span><?= h($stat[1]) ?></span></div><?php endforeach; ?>
    </div>
</section>

<section class="section service-details">
    <div class="container service-detail-grid">
        <div class="service-detail-copy reveal">
            <span class="eyebrow">What We Deliver</span>
            <h2>From Ambition to an Actionable Roadmap</h2>
            <p>Every engagement is tailored to the market, the opportunity, and the outcome you want to create. You receive a structured plan, the right specialists, and practical support through delivery.</p>
            <div class="check-grid">
                <?php foreach ($service['features'] as $feature): ?><span><?= icon('check') ?><?= h($feature) ?></span><?php endforeach; ?>
            </div>
        </div>
        <aside class="service-process reveal">
            <span class="eyebrow">Our Approach</span>
            <ol><li><b>01</b><span><strong>Discover</strong>Understand goals, context, and constraints.</span></li><li><b>02</b><span><strong>Design</strong>Build the right scope and success roadmap.</span></li><li><b>03</b><span><strong>Deliver</strong>Execute with local and global specialists.</span></li><li><b>04</b><span><strong>Develop</strong>Measure, refine, and scale the impact.</span></li></ol>
        </aside>
    </div>
</section>

<?php if (!empty($service['gallery'])): ?>
<section class="service-gallery section-compact">
    <div class="container gallery-grid gallery-count-<?= count($service['gallery']) ?>">
        <?php foreach ($service['gallery'] as $index => $image): ?><figure class="reveal"><img src="<?= h(asset_url($image)) ?>" alt="<?= h($service['eyebrow']) ?> program <?= $index + 1 ?>"><figcaption><?= h($service['features'][$index] ?? $service['eyebrow']) ?></figcaption></figure><?php endforeach; ?>
    </div>
</section>
<?php endif; ?>

<section class="section programs-section" id="programs">
    <div class="container">
        <div class="section-heading centered reveal"><span class="eyebrow">Our Programs</span><h2>Choose the Right Level of Support</h2><p>Transparent starting prices with scope confirmed after your free assessment.</p></div>
        <div class="program-grid program-count-<?= count($service['programs']) ?>">
            <?php foreach ($service['programs'] as $index => $program): ?>
                <article class="program-card <?= $index === 1 ? 'featured' : '' ?> reveal">
                    <?php if ($index === 1): ?><span class="best-value">Best Value</span><?php endif; ?>
                    <span class="program-index">0<?= $index + 1 ?></span>
                    <h3><?= h($program[0]) ?></h3><p><?= h($program[1]) ?></p>
                    <div class="program-prices"><span><small>EGP from</small><?= h($program[2]) ?></span><span><small>IDR from</small><?= h($program[3]) ?></span><span><small>USD from</small><?= h($program[4]) ?></span></div>
                    <ul><?php foreach (array_slice($service['features'], 0, 5) as $feature): ?><li><?= icon('check') ?><?= h($feature) ?></li><?php endforeach; ?></ul>
                    <a class="button <?= $index === 1 ? 'button-gold' : 'button-navy' ?>" href="<?= h(page_url('contact', ['service' => $page, 'program' => $program[0]])) ?>">Request This Program <?= icon('arrow') ?></a>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="service-assurance">
    <div class="container value-strip"><span><?= icon('shield') ?>Secure & reliable</span><span><?= icon('chart') ?>Performance focused</span><span><?= icon('users') ?>Dedicated specialists</span><span><?= icon('globe') ?>Global delivery</span></div>
</section>
