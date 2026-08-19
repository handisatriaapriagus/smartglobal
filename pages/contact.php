<?php
$selectedService = isset($services[(string) ($_GET['service'] ?? '')]) ? (string) $_GET['service'] : '';
$selectedProgram = trim((string) ($_GET['program'] ?? ''));
?>
<section class="assessment-section" style="--assessment-bg: url('<?= h(asset_url('backgrounds/10.png')) ?>')">
    <div class="container assessment-grid">
        <div class="assessment-intro reveal">
            <div class="breadcrumbs"><a href="<?= h(page_url()) ?>">Home</a><span>/</span><span>Contact Us</span></div>
            <span class="eyebrow">Let's Build Your Next Success Story</span>
            <h1>Request Your<br>Free Assessment</h1>
            <p>Tell us about your goals and challenges. Our experts will review your request and provide the best solution tailored to your needs.</p>
            <div class="assessment-benefits">
                <span><?= icon('users') ?><strong>One-to-one expert call</strong></span><span><?= icon('chart') ?><strong>Practical roadmap</strong></span><span><?= icon('globe') ?><strong>Tailored local insight</strong></span><span><?= icon('clock') ?><strong>Fast response</strong></span>
            </div>
            <div class="guarantee-card"><strong>100% No Obligation</strong><p>Just smart solutions. No pressure. Your consultation is private and focused on value.</p></div>
            <div class="trust-row"><span><b>1000+</b> clients</span><span><b>20+</b> sectors</span><span><b>10+</b> years</span><span><b>7</b> offices</span></div>
        </div>

        <form class="assessment-form reveal" method="post" action="<?= h(page_url('contact')) ?>" id="assessment-form">
            <input type="hidden" name="csrf_token" value="<?= h($csrfToken) ?>">
            <input type="hidden" name="form_kind" value="assessment">
            <input type="hidden" name="return_page" value="contact">
            <input class="honeypot" name="website" type="text" tabindex="-1" autocomplete="off" aria-hidden="true">
            <div class="form-title"><span><?= icon('spark') ?></span><div><h2>Tell Us About Your Request</h2><p>Fill out the form and we will get back to you shortly.</p></div></div>
            <?php if ($flash): ?><div class="form-feedback <?= h($flash['type']) ?>" id="form-feedback" role="status"><?= h($flash['message']) ?></div><?php endif; ?>
            <fieldset><legend><b>1.</b> Select the solution you are interested in</legend><div class="service-options"><?php foreach ($services as $slug => $item): ?><label><input type="checkbox" name="services[]" value="<?= h($slug) ?>" <?= $selectedService === $slug ? 'checked' : '' ?>><span><b><?= h($item['number']) ?></b><?= h($item['eyebrow']) ?></span></label><?php endforeach; ?></div></fieldset>
            <fieldset><legend><b>2.</b> Tell us about you</legend><div class="form-grid"><label>Full name *<input name="name" type="text" autocomplete="name" maxlength="120" required></label><label>Company / Organization<input name="company" type="text" autocomplete="organization" maxlength="160"></label><label>Email address *<input name="email" type="email" autocomplete="email" maxlength="190" required></label><label>Phone / WhatsApp *<input name="phone" type="tel" autocomplete="tel" maxlength="60" required></label><label>Country<input name="country" type="text" autocomplete="country-name" maxlength="100"></label><label>Estimated budget<select name="budget"><option value="">Select a range</option><option>Under USD 500</option><option>USD 500 - 1,500</option><option>USD 1,500 - 5,000</option><option>Above USD 5,000</option></select></label></div></fieldset>
            <fieldset><legend><b>3.</b> Describe your request</legend><label>Project or program details<textarea name="message" rows="5" maxlength="3000" placeholder="Tell us about your goals, preferred market, timeline, or any challenges."><?= h($selectedProgram !== '' ? 'I am interested in the ' . $selectedProgram . ' program.' : '') ?></textarea></label></fieldset>
            <label class="privacy-check"><input type="checkbox" name="privacy" value="1" required><span>I have read and accept the <a href="<?= h(page_url('privacy')) ?>">Privacy Policy</a> and agree to be contacted about my request.</span></label>
            <button class="button button-navy button-full" type="submit">Submit Request <?= icon('arrow') ?></button>
            <small class="secure-note"><?= icon('shield') ?>Your information is secure and will never be shared.</small>
        </form>
    </div>
</section>
