<section class="legal-hero terms-hero" style="--legal-bg: url('<?= h(asset_url('backgrounds/10.png')) ?>')">
    <div class="container"><div class="breadcrumbs breadcrumbs-light"><a href="<?= h(page_url()) ?>">Home</a><span>/</span><span>Terms & Conditions</span></div><span class="eyebrow eyebrow-light">Terms & Conditions</span><h1>Trust. Transparency.<br>Professional Commitment.</h1><p>These terms explain the principles that govern our website, consultations, and professional engagements.</p></div>
</section>
<section class="section terms-content">
    <div class="container">
        <div class="terms-intro reveal"><article><span><?= icon('building') ?></span><div><small>Governing Law</small><p>These terms are governed by the applicable laws of the Arab Republic of Egypt, unless a signed service agreement states otherwise.</p></div></article><article><span><?= icon('globe') ?></span><div><small>International Standards</small><p>We operate with a commitment to recognized professional, ethical, privacy, and anti-corruption standards.</p></div></article></div>
        <div class="section-heading centered"><span class="eyebrow">Our Terms & Conditions</span><h2>Clear Expectations Build Strong Partnerships</h2></div>
        <div class="terms-grid">
            <?php
            $terms = [
                ['Agreement of Terms', 'Using this website or engaging our services means you accept the applicable written terms and policies.'],
                ['Our Services', 'The exact service scope, outputs, timeline, fees, and responsibilities are defined in a proposal or agreement.'],
                ['Payment Terms', 'Invoices are payable by the stated due date. Third-party and government charges may be billed separately.'],
                ['Project Terms', 'Timelines depend on timely access, decisions, documents, and cooperation from the client and relevant partners.'],
                ['Refund & Cancellation', 'Cancellation and refund rights follow the signed agreement and the policy published on this website.'],
                ['Intellectual Property', 'Ownership and permitted use of project materials are defined in the service agreement after payment.'],
                ['Confidentiality', 'Both parties must protect confidential information and use it only for the intended professional purpose.'],
                ['Limitation of Liability', 'Liability is limited to the extent permitted by law and the value agreed for the relevant service.'],
                ['Force Majeure', 'Neither party is liable for delays caused by events reasonably outside its control.'],
                ['No Guarantee', 'We provide informed professional support but cannot guarantee third-party, authority, investment, or market outcomes.'],
                ['Personal Data', 'Personal information is processed according to our Privacy Policy and applicable data-protection requirements.'],
                ['Updates', 'These terms may be updated. The published effective version applies unless a signed agreement says otherwise.'],
            ];
            foreach ($terms as $index => $term): ?>
                <article class="term-card reveal"><span><?= str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) ?></span><h3><?= h($term[0]) ?></h3><p><?= h($term[1]) ?></p></article>
            <?php endforeach; ?>
        </div>
        <div class="commitment-panel reveal"><div><?= icon('shield') ?></div><div><span class="eyebrow">Our Commitment</span><h2>Professional standards at every step.</h2><p>Smart Global Group is committed to providing clear communication, dependable delivery, and transparent commercial relationships.</p></div><div class="commitment-values"><span>Integrity & transparency</span><span>Professional excellence</span><span>Legal compliance</span><span>Global standards</span></div></div>
    </div>
</section>
