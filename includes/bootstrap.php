<?php

declare(strict_types=1);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

date_default_timezone_set('Asia/Jakarta');

require_once __DIR__ . '/storage.php';

header('X-Content-Type-Options: nosniff');
header('Referrer-Policy: strict-origin-when-cross-origin');

function h(?string $value): string
{
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}

function app_base_path(): string
{
    $directory = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '/index.php'));

    return $directory === '/' || $directory === '.' ? '' : rtrim($directory, '/');
}

function page_url(string $page = 'home', array $params = []): string
{
    $query = $page === 'home' ? $params : ['page' => $page] + $params;
    $suffix = $query === [] ? '' : '?' . http_build_query($query);

    return app_base_path() . '/index.php' . $suffix;
}

function asset_url(string $path): string
{
    $parts = array_map('rawurlencode', explode('/', str_replace('\\', '/', $path)));

    return app_base_path() . '/' . implode('/', $parts);
}

function icon(string $name, string $class = ''): string
{
    $paths = [
        'arrow' => '<path d="M5 12h14M13 6l6 6-6 6"/>',
        'globe' => '<circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3c3 3 4.5 6 4.5 9S15 18 12 21c-3-3-4.5-6-4.5-9S9 6 12 3z"/>',
        'briefcase' => '<rect x="3" y="7" width="18" height="13" rx="2"/><path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2M3 12h18M10 12v2h4v-2"/>',
        'book' => '<path d="M4 5.5A2.5 2.5 0 0 1 6.5 3H11v17H6.5A2.5 2.5 0 0 0 4 22zM20 5.5A2.5 2.5 0 0 0 17.5 3H13v17h4.5A2.5 2.5 0 0 1 20 22z"/>',
        'building' => '<path d="M3 21h18M5 21V8l7-4 7 4v13M9 21v-5h6v5M8 10h.01M12 10h.01M16 10h.01M8 13h.01M12 13h.01M16 13h.01"/>',
        'spark' => '<path d="m12 3 1.4 4.1L17.5 8.5l-4.1 1.4L12 14l-1.4-4.1-4.1-1.4 4.1-1.4zM18.5 14l.8 2.2 2.2.8-2.2.8-.8 2.2-.8-2.2-2.2-.8 2.2-.8zM6 14l1 2.8 2.8 1L7 18.8 6 21.5l-1-2.7-2.8-1 2.8-1z"/>',
        'shield' => '<path d="M12 3 4.5 6v5.3c0 4.6 3 8.2 7.5 9.7 4.5-1.5 7.5-5.1 7.5-9.7V6z"/><path d="m8.5 12 2.2 2.2 4.8-5"/>',
        'check' => '<path d="m5 12 4 4L19 6"/>',
        'mail' => '<rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/>',
        'phone' => '<path d="M7 3H4.5A1.5 1.5 0 0 0 3 4.5C3 13.6 10.4 21 19.5 21a1.5 1.5 0 0 0 1.5-1.5V17l-4-1-1.4 2a15.6 15.6 0 0 1-9.6-9.6L8 7z"/>',
        'pin' => '<path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0z"/><circle cx="12" cy="10" r="2.5"/>',
        'chart' => '<path d="M4 20V10M10 20V4M16 20v-7M22 20H2"/>',
        'users' => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/>',
        'clock' => '<circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/>',
        'menu' => '<path d="M4 7h16M4 12h16M4 17h16"/>',
        'close' => '<path d="m6 6 12 12M18 6 6 18"/>',
    ];
    $path = $paths[$name] ?? $paths['spark'];

    return '<svg class="icon ' . h($class) . '" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">' . $path . '</svg>';
}

function currency_selector(): string
{
    return '<div class="currency-toolbar reveal" data-currency-switcher>'
        . '<div class="currency-toolbar-copy"><span>Display currency</span><small data-currency-status>Detecting your regional currency...</small></div>'
        . '<div class="currency-options" role="group" aria-label="Choose display currency">'
        . '<button type="button" data-currency="IDR" aria-pressed="false">IDR</button>'
        . '<button type="button" data-currency="USD" aria-pressed="false">USD</button>'
        . '<button type="button" data-currency="EGP" aria-pressed="false">EGP</button>'
        . '</div></div>';
}

function currency_price(string $egp, string $idr, string $usd, bool $from = false): string
{
    return '<span class="currency-price" data-currency-price data-egp="' . h($egp) . '" data-idr="' . h($idr) . '" data-usd="' . h($usd) . '">'
        . '<small><span data-currency-code>USD</span>' . ($from ? ' from' : '') . '</small>'
        . '<strong data-currency-amount>' . h($usd) . '</strong>'
        . '</span>';
}

$routes = [
    'home' => ['title' => 'Global Solutions', 'description' => 'Global consulting, education, business setup, and digital AI solutions.'],
    'about' => ['title' => 'About Us', 'description' => 'Meet Smart Global Group and discover our mission, values, and global team.'],
    'consulting' => ['title' => 'International Project Consulting', 'description' => 'Turn international opportunities into executable projects.'],
    'education' => ['title' => 'Training & Education Solutions', 'description' => 'Global training and education pathways without borders.'],
    'business' => ['title' => 'Business Setup & Investment', 'description' => 'Launch, expand, and invest globally with confidence.'],
    'digital' => ['title' => 'Digital & AI Solutions', 'description' => 'Enterprise-level digital technology at practical prices.'],
    'packages' => ['title' => 'Packages', 'description' => 'Transparent programs and flexible payment options for global growth.'],
    'presence' => ['title' => 'Global Presence', 'description' => 'Local expertise across seven strategic global locations.'],
    'insights' => ['title' => 'Insights', 'description' => 'Practical perspectives for stronger global decisions.'],
    'contact' => ['title' => 'Request an Assessment', 'description' => 'Tell us where you want to grow and receive a tailored roadmap.'],
    'privacy' => ['title' => 'Privacy & Refund Policy', 'description' => 'Clear privacy, cancellation, and refund information.'],
    'terms' => ['title' => 'Terms & Conditions', 'description' => 'Transparent terms for trusted professional engagements.'],
    'careers' => ['title' => 'Careers', 'description' => 'Build your career and make a global impact with Smart Global Group.'],
    'partners' => ['title' => 'Partners', 'description' => 'Join a worldwide success ecosystem of corporate and finance partners.'],
];

$services = [
    'consulting' => [
        'number' => '01',
        'eyebrow' => 'International Project Consulting',
        'title' => 'Turning Opportunities into Executable Projects',
        'summary' => 'From concept and market entry to launch and scale, our experts transform international opportunities into structured, measurable, and investment-ready projects.',
        'background' => 'backgrounds/6.png',
        'hero' => 'Photos/Gemini_Generated_Image_d3one0d3one0d3on.jpg',
        'accent' => 'gold',
        'stats' => [['10+', 'Years experience'], ['7', 'Global offices'], ['1000+', 'Clients served'], ['500+', 'Successful projects']],
        'features' => ['Market & opportunity assessment', 'Feasibility and business planning', 'Government and regulatory support', 'Partner and investor matching', 'Risk management and due diligence', 'Implementation roadmaps'],
        'programs' => [
            ['Smart Start', 'Perfect for entrepreneurs entering a new market.', '15,000', '2,500,000', '299'],
            ['Global Growth', 'For companies ready to develop international operations.', '35,000', '5,500,000', '698'],
            ['Global Executive', 'For investors, corporations, and complex international projects.', '75,000', '11,900,000', '1,495'],
        ],
    ],
    'education' => [
        'number' => '02',
        'eyebrow' => 'Training & Education Solutions',
        'title' => 'Learn Globally. Grow Without Borders.',
        'summary' => 'Smart Global connects students, professionals, institutions, and employers through trusted education and professional-development opportunities worldwide.',
        'background' => 'backgrounds/7 (2).png',
        'hero' => 'Photos/Gemini_Generated_Image_z1q61mz1q61mz1q6.jpg',
        'accent' => 'gold',
        'stats' => [['100+', 'Partner institutions'], ['20+', 'Countries'], ['Thousands', 'Students supported'], ['Expert', 'Career guidance']],
        'features' => ['University and school placement', 'Scholarship guidance', 'Professional qualifications', 'Executive and corporate training', 'Language and pathway programs', 'Visa and pre-departure support'],
        'gallery' => ['Photos/Gemini_Generated_Image_7plxuk7plxuk7plx.jpg', 'Photos/Gemini_Generated_Image_h32ykih32ykih32y.jpg', 'Photos/Gemini_Generated_Image_ixn7j2ixn7j2ixn7.jpg'],
        'programs' => [
            ['Education Abroad', 'University, high school, scholarship, and pathway support.', '7,500', '1,250,000', '149'],
            ['Professional Training', 'Career-focused courses and internationally recognized certifications.', '15,000', '2,500,000', '299'],
            ['Smart Global Academy', 'Custom programs for schools, companies, and professional groups.', '35,000', '5,500,000', '698'],
        ],
    ],
    'business' => [
        'number' => '03',
        'eyebrow' => 'Business Setup & Investment',
        'title' => 'Launch Globally. Operate Smarter.',
        'summary' => 'From company formation to market entry and investment support, we provide end-to-end solutions that help you start, grow, and succeed in global markets.',
        'background' => 'backgrounds/8.png',
        'hero' => 'Photos/Gemini_Generated_Image_lxoqeflxoqeflxoq.jpg',
        'accent' => 'gold',
        'stats' => [['7', 'Global markets'], ['50+', 'Corporate partners'], ['1000+', 'Clients served'], ['360°', 'Market support']],
        'features' => ['Company formation and licensing', 'Banking and tax coordination', 'Market-entry strategy', 'Local partner introductions', 'Investment and relocation support', 'Operational launch assistance'],
        'gallery' => ['Photos/Gemini_Generated_Image_d1iqlhd1iqlhd1iq.jpg', 'Photos/Gemini_Generated_Image_qtwhgrqtwhgrqtwh.jpg'],
        'programs' => [
            ['Market Entry', 'Build a compliant route into your selected market.', '15,000', '2,500,000', '299'],
            ['Global Launch', 'Complete company setup and launch coordination.', '35,000', '5,500,000', '698'],
            ['Investor 360', 'A complete investor and international expansion package.', '75,000', '11,900,000', '1,495'],
        ],
    ],
    'digital' => [
        'number' => '04',
        'eyebrow' => 'Digital & AI Solutions',
        'title' => 'Digital Technology Without Enterprise-Level Prices.',
        'summary' => 'Smart, scalable, and affordable digital solutions for startups, SMEs, corporations, and international organizations.',
        'background' => 'backgrounds/9.png',
        'hero' => 'Photos/Gemini_Generated_Image_yexag8yexag8yexa.jpg',
        'accent' => 'violet',
        'stats' => [['Secure', 'Reliable systems'], ['AI-ready', 'Automation'], ['Mobile-first', 'Experiences'], ['24/7', 'Technical support']],
        'features' => ['Websites and e-commerce', 'Business systems and CRM', 'AI assistants and automation', 'Data dashboards and analytics', 'Branding and digital marketing', 'Cloud, security, and integrations'],
        'programs' => [
            ['Digital Start', 'A modern digital foundation for a growing business.', '15,000', '2,500,000', '299'],
            ['Smart Business', 'Integrated systems, commerce, automation, and growth.', '35,000', '5,500,000', '698'],
            ['AI Business Pro', 'Advanced AI, dashboards, and enterprise workflows.', '75,000', '11,900,000', '1,495'],
            ['Digital Transformation 360', 'A complete digital transformation program.', '150,000', '23,900,000', '2,990'],
        ],
    ],
];

$locations = [
    ['Egypt', 'HQ', 'Cairo', 'North Africa and Middle East headquarters'],
    ['Rwanda', '', 'Kigali', 'East Africa development and market access'],
    ['United Kingdom', '', 'London', 'European education and business gateway'],
    ['United States', '', 'New York', 'North American market partnerships'],
    ['Indonesia', '', 'Jakarta', 'Southeast Asia education and digital hub'],
    ['Malaysia', '', 'Kuala Lumpur', 'ASEAN investment and corporate services'],
    ['Singapore', '', 'Singapore', 'Regional strategy and innovation gateway'],
];

$insights = [
    ['Global Consulting', 'How to validate an international market before committing capital.', 'Photos/Gemini_Generated_Image_qtwhgrqtwhgrqtwh.jpg', '6 min read'],
    ['Education & Training', 'Building career-ready skills for a borderless employment market.', 'Photos/Gemini_Generated_Image_3u0xmj3u0xmj3u0x.jpg', '5 min read'],
    ['Business Setup', 'The practical checklist behind a confident global launch.', 'Photos/Gemini_Generated_Image_d1iqlhd1iqlhd1iq.jpg', '8 min read'],
    ['Digital & AI', 'Where useful AI automation creates measurable business value.', 'Photos/Gemini_Generated_Image_yexag8yexag8yexa.jpg', '7 min read'],
];

$page = strtolower((string) ($_GET['page'] ?? 'home'));
if (!isset($routes[$page])) {
    http_response_code(404);
    $page = 'home';
}

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(24));
}
$csrfToken = $_SESSION['csrf_token'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postedToken = (string) ($_POST['csrf_token'] ?? '');
    $kind = (string) ($_POST['form_kind'] ?? '');
    $returnPage = (string) ($_POST['return_page'] ?? $page);
    $returnPage = isset($routes[$returnPage]) ? $returnPage : 'home';

    if (!hash_equals($csrfToken, $postedToken)) {
        $_SESSION['flash'] = ['type' => 'error', 'message' => 'Your session expired. Please refresh and try again.'];
    } elseif ((string) ($_POST['website'] ?? '') !== '') {
        $_SESSION['flash'] = ['type' => 'success', 'message' => 'Thank you. Your request has been received.'];
    } elseif ($kind === 'newsletter') {
        $email = filter_var(trim((string) ($_POST['email'] ?? '')), FILTER_VALIDATE_EMAIL);
        if ($email === false) {
            $_SESSION['flash'] = ['type' => 'error', 'message' => 'Please enter a valid email address.'];
        } else {
            persist_record('newsletter', ['email' => $email, 'created_at' => date(DATE_ATOM)]);
            $_SESSION['flash'] = ['type' => 'success', 'message' => 'Welcome to Smart Insights. Please watch your inbox.'];
        }
    } elseif ($kind === 'assessment') {
        $name = trim((string) ($_POST['name'] ?? ''));
        $email = filter_var(trim((string) ($_POST['email'] ?? '')), FILTER_VALIDATE_EMAIL);
        $phone = trim((string) ($_POST['phone'] ?? ''));
        $country = trim((string) ($_POST['country'] ?? ''));
        $message = trim((string) ($_POST['message'] ?? ''));
        $selectedServices = array_values(array_intersect(array_keys($services), (array) ($_POST['services'] ?? [])));

        if ($name === '' || $email === false || $phone === '' || $selectedServices === []) {
            $_SESSION['flash'] = ['type' => 'error', 'message' => 'Please complete your name, email, phone, and at least one service.'];
        } elseif (!isset($_POST['privacy'])) {
            $_SESSION['flash'] = ['type' => 'error', 'message' => 'Please accept the privacy policy before submitting.'];
        } else {
            persist_record('assessment', [
                'name' => mb_substr($name, 0, 120),
                'email' => (string) $email,
                'phone' => mb_substr($phone, 0, 60),
                'company' => mb_substr(trim((string) ($_POST['company'] ?? '')), 0, 160),
                'country' => mb_substr($country, 0, 100),
                'services' => $selectedServices,
                'budget' => mb_substr(trim((string) ($_POST['budget'] ?? '')), 0, 80),
                'message' => mb_substr($message, 0, 3000),
                'created_at' => date(DATE_ATOM),
            ]);
            $_SESSION['flash'] = ['type' => 'success', 'message' => 'Thank you. Your free assessment request has been received. Our team will contact you shortly.'];
        }
    }

    header('Location: ' . page_url($returnPage, ['submitted' => '1']) . '#form-feedback');
    exit;
}

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
