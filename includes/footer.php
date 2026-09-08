</main>

<?php require __DIR__ . '/footer-assets.php'; ?>

<section class="pre-footer-cta" aria-label="Free assessment call to action">
    <div class="container pre-footer-inner">
        <div class="cta-icon"><?= icon('phone') ?></div>
        <div>
            <span>Ready to Grow Globally?</span>
            <p>Tell us your goal and we'll build your Smart Global roadmap.</p>
        </div>
        <a class="button button-gold" href="<?= h(page_url('contact')) ?>">Request Free Assessment <?= icon('arrow') ?></a>
    </div>
</section>

<footer class="site-footer">
    <div class="container footer-grid">
        <section class="footer-brand">
            <img src="<?= h(asset_url('All Logo/logo-transparent.png')) ?>" alt="Smart Global Group" width="1254" height="1254">
            <p>Smart Global Group is an international solutions platform headquartered in Egypt, connecting businesses, leaders, students, and institutions with practical solutions and trusted global opportunities.</p>
            <div class="footer-location"><?= icon('pin') ?><span><strong>Headquarters</strong>Regus Offices – Business lounge - Global Premium Member<br>Global Regus Membership Number: xxx736702</span></div>
        </section>

        <section>
            <h2>Solutions</h2>
            <ul>
                <?php foreach ($services as $slug => $item): ?>
                    <li><a href="<?= h(page_url($slug)) ?>"><?= h($item['eyebrow']) ?></a></li>
                <?php endforeach; ?>
                <li><a href="<?= h(page_url('partners')) ?>">Corporate Training & Partners</a></li>
            </ul>
        </section>

        <section>
            <h2>Company</h2>
            <ul>
                <li><a href="<?= h(page_url('about')) ?>">About Us</a></li>
                <li><a href="<?= h(page_url('careers')) ?>">Careers</a></li>
                <li><a href="<?= h(page_url('insights')) ?>">Insights & News</a></li>
                <li><a href="<?= h(page_url('partners')) ?>">Partners</a></li>
                <li><a href="<?= h(page_url('privacy')) ?>">Privacy Policy</a></li>
                <li><a href="<?= h(page_url('terms')) ?>">Terms & Conditions</a></li>
            </ul>
        </section>

        <section>
            <h2>Global Presence</h2>
            <ul class="location-list">
                <?php foreach ($locations as $location): ?>
                    <li><?= $footerFlags[$location[0]] ?? '' ?><?= h($location[0] . ($location[1] ? ' (' . $location[1] . ')' : '')) ?></li>
                <?php endforeach; ?>
            </ul>
            <a class="footer-inline-link" href="<?= h(page_url('presence')) ?>">View all locations <?= icon('arrow') ?></a>
        </section>

        <section class="footer-connect">
            <h2>Stay Connected</h2>
            <p>Subscribe to our newsletter for insights, opportunities, and updates.</p>
            <?php if ($flash && $page !== 'contact'): ?>
                <div class="form-feedback <?= h($flash['type']) ?>" id="form-feedback" role="status"><?= h($flash['message']) ?></div>
            <?php endif; ?>
            <form class="newsletter-signup" method="post" action="<?= h(page_url($page)) ?>">
                <input type="hidden" name="csrf_token" value="<?= h($csrfToken) ?>">
                <input type="hidden" name="form_kind" value="newsletter">
                <input type="hidden" name="return_page" value="<?= h($page) ?>">
                <div class="newsletter-form"><label class="sr-only" for="newsletter-email">Email address</label><input id="newsletter-email" name="email" type="email" placeholder="Enter your email" autocomplete="email" required><button type="submit" aria-label="Subscribe"><?= icon('arrow') ?></button></div>
                <input class="honeypot" name="website" type="text" tabindex="-1" autocomplete="off" aria-hidden="true">
                <label class="consent-line"><input type="checkbox" required> <span>I agree to receive marketing communications.</span></label>
            </form>
            <div class="socials" aria-label="Social media links">
                <a class="social-link social-link--linkedin" href="https://www.linkedin.com/company/smartglobalgroup/" target="_blank" rel="noopener noreferrer" aria-label="Smart Global Group on LinkedIn"><?= $footerSocialIcons['linkedin'] ?></a>
                <a class="social-link social-link--instagram" href="https://www.instagram.com/smartglobalgroup" target="_blank" rel="noopener noreferrer" aria-label="Smart Global Group on Instagram"><?= $footerSocialIcons['instagram'] ?></a>
                <a class="social-link social-link--facebook" href="https://www.facebook.com/smartglobalgroup" target="_blank" rel="noopener noreferrer" aria-label="Smart Global Group on Facebook"><?= $footerSocialIcons['facebook'] ?></a>
                <a class="social-link social-link--whatsapp" href="https://wa.me/201222640202" target="_blank" rel="noopener noreferrer" aria-label="Contact Smart Global Group on WhatsApp"><?= $footerSocialIcons['whatsapp'] ?></a>
            </div>
        </section>
    </div>

    <div class="container footer-contact-row">
        <div class="footer-contact-item footer-contact-phones"><?= icon('phone') ?><div><small>Phone / WhatsApp</small>
            <a href="https://wa.me/201555534883" target="_blank" rel="noopener noreferrer">Management: +20 15555 34883</a>
            <a href="https://wa.me/201222640202" target="_blank" rel="noopener noreferrer">Customer Service: +20 1222 64 0202</a>
            <a href="https://wa.me/16452042022" target="_blank" rel="noopener noreferrer">Global Customer Service: +1 645 204 20 22</a>
        </div></div>
        <div class="footer-contact-details">
            <a class="footer-contact-item" href="mailto:info@smartglobalplatform.com"><?= icon('mail') ?><span><small>Email</small>info@smartglobalplatform.com</span></a>
            <div class="footer-contact-item"><?= icon('globe') ?><span><small>Operational Hour</small>9:00 AM - 6:00 PM | EGYPT Time</span></div>
        </div>
        <div class="footer-contact-offices">
            <div class="footer-office-column">
                <div class="footer-office"><small>EGYPT Offices</small><p>Business Address: Regus – New Capital Cairo – Pioneer Plaza – Business Complex</p><p>Customer Address: Regus – Ewalks Mall New Cairo - Business Sector</p><p>Company Name: Smart Business Platform Global for training and software Design</p><p>Commercial Registration Number: 298467</p></div>
                <div class="footer-office"><small>Rwanda Office</small><p>Regus Offices Partners - Business Lounge</p><p>Company Name: Dar International Group LTD</p><p>Company Code: 121636682</p></div>
            </div>
            <div class="footer-office-column">
                <div class="footer-office"><small>Indonesia Offices</small><p>Business Address: Regus - Jakarta, JB Tower</p><p>Customer Address: Prosperity Tower SCBD – South Jakarta</p><p>Company Name: PT Global Bisnis Hub Group</p><p>Business Identification Number: 25022 602 86958</p></div>
                <div class="footer-office"><small>Malaysia Member Office</small><p>Signature by Regus - Kuala Lumpur, Q Sentral</p></div>
                <div class="footer-office"><small>USA Regional Regus Member Office</small><p>Regus - Colorado Springs - Downtown Alamo Corporate Center</p><p>Global Customer Service: +1 645 204 20 22</p></div>
            </div>
        </div>
    </div>

    <div class="container footer-bottom">
        <span>© <?= date('Y') ?> Smart Global Group. All rights reserved.</span>
        <strong>From Egypt to the World</strong>
    </div>
</footer>

<script src="<?= h(asset_url('assets/js/app.js')) ?>" defer></script>
</body>
</html>
