</main>

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
            <img src="<?= h(asset_url('All Logo/logo.jpeg')) ?>" alt="Smart Global Group">
            <p>Smart Global Group is an international solutions platform headquartered in Egypt, connecting businesses, leaders, students, and institutions with practical solutions and trusted global opportunities.</p>
            <div class="footer-location"><?= icon('pin') ?><span><strong>Headquarters</strong> Egypt - Giza Offices - Pyramids Member</span></div>
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
                    <li><span class="mini-flag" aria-hidden="true"></span><?= h($location[0] . ($location[1] ? ' (' . $location[1] . ')' : '')) ?></li>
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
                <a href="#" aria-label="LinkedIn">in</a><a href="#" aria-label="Facebook">f</a><a href="#" aria-label="Instagram">◎</a><a href="#" aria-label="YouTube">▶</a><a href="#" aria-label="WhatsApp">wa</a>
            </div>
        </section>
    </div>

    <div class="container footer-contact-row">
        <a href="tel:+201221640202"><?= icon('phone') ?><span><small>Phone</small>+20 122 164 0202</span></a>
        <a href="mailto:info@smartglobalgroup.com"><?= icon('mail') ?><span><small>Email</small>info@smartglobalgroup.com</span></a>
        <span><?= icon('pin') ?><span><small>Egypt Offices</small>Pyramids Member</span></span>
        <span><?= icon('globe') ?><span><small>Working Hours</small>Sun - Thu / 9:00 - 6:00</span></span>
    </div>

    <div class="container footer-bottom">
        <span>© <?= date('Y') ?> Smart Global Group. All rights reserved.</span>
        <strong>From Egypt to the World</strong>
    </div>
</footer>

<script src="<?= h(asset_url('assets/js/app.js')) ?>" defer></script>
</body>
</html>
