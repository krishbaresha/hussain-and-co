<?php
$services = [
    'fbr-digital-invoicing' => [
        'title' => 'FBR Digital Invoicing System Integration',
        'icon' => 'fas fa-satellite-dish',
        'desc' => 'Connect your POS, ERP or billing software to FBR\'s Digital Invoicing system for real-time, API-validated e-invoicing.',
        'fields' => [
            ['label' => 'Business Name', 'type' => 'text', 'name' => 'business_name', 'placeholder' => 'e.g. Al-Noor Traders', 'required' => true],
            ['label' => 'NTN / STRN', 'type' => 'text', 'name' => 'ntn_strn', 'placeholder' => 'e.g. 1234567-8', 'required' => true],
            ['label' => 'Business Sector', 'type' => 'text', 'name' => 'business_sector', 'placeholder' => 'e.g. Retail, Restaurant, Manufacturing, Wholesale', 'required' => true],
            ['label' => 'Current POS / ERP / Billing Software', 'type' => 'text', 'name' => 'current_system', 'placeholder' => 'e.g. QuickBooks, custom POS, none yet', 'required' => false],
            ['label' => 'Contact Number', 'type' => 'tel', 'name' => 'contact_number', 'placeholder' => '+92 300 0000000', 'required' => true],
            ['label' => 'Email Address', 'type' => 'email', 'name' => 'email', 'placeholder' => 'you@example.com', 'required' => true],
        ],
    ],
    'business-ntn' => [
        'title' => 'Business NTN Registration',
        'icon' => 'fas fa-file-invoice',
        'desc' => 'Get your Business NTN registered quickly and correctly by our expert consultants.',
        'fields' => [
            ['label' => 'Business Name', 'type' => 'text', 'name' => 'business_name', 'placeholder' => 'e.g. Al-Noor Traders', 'required' => true],
            ['label' => 'Owner Name', 'type' => 'text', 'name' => 'owner_name', 'placeholder' => 'e.g. Ahmed Ali', 'required' => true],
            ['label' => 'Contact Number', 'type' => 'tel', 'name' => 'contact_number', 'placeholder' => '+92 300 0000000', 'required' => true],
            ['label' => 'Email Address', 'type' => 'email', 'name' => 'email', 'placeholder' => 'you@example.com'],
        ],
    ],
    'individual-ntn' => [
        'title' => 'Individual NTN Registration',
        'icon' => 'fas fa-user',
        'desc' => 'Register for your Individual NTN to comply with tax laws and build financial credibility.',
        'fields' => [
            ['label' => 'Full Name', 'type' => 'text', 'name' => 'full_name', 'placeholder' => 'e.g. Sara Khan', 'required' => true],
            ['label' => 'CNIC Number', 'type' => 'text', 'name' => 'cnic', 'placeholder' => '42201-1234567-8', 'required' => true],
            ['label' => 'Contact Number', 'type' => 'tel', 'name' => 'contact_number', 'placeholder' => '+92 300 0000000', 'required' => true],
            ['label' => 'Email Address', 'type' => 'email', 'name' => 'email', 'placeholder' => 'you@example.com', 'required' => true],
        ],
    ],
    'company-registration' => [
        'title' => 'Company Registration',
        'icon' => 'fas fa-building',
        'desc' => 'Start your business the right way with our streamlined company registration process.',
        'fields' => [
            ['label' => 'Company Name', 'type' => 'text', 'name' => 'company_name', 'placeholder' => 'e.g. TechVentures Pvt. Ltd.', 'required' => true],
            ['label' => 'Business Type', 'type' => 'text', 'name' => 'business_type', 'placeholder' => 'e.g. Private Limited, Sole Proprietor', 'required' => true],
            ['label' => 'Contact Number', 'type' => 'tel', 'name' => 'contact_number', 'placeholder' => '+92 300 0000000', 'required' => true],
            ['label' => 'Email Address', 'type' => 'email', 'name' => 'email', 'placeholder' => 'you@example.com', 'required' => true],
        ],
    ],
    'return-filing' => [
        'title' => 'Tax Return Filing',
        'icon' => 'fas fa-file-alt',
        'desc' => 'Professional and accurate tax return filing to ensure full regulatory compliance.',
        'fields' => [
            ['label' => 'Taxpayer Name', 'type' => 'text', 'name' => 'taxpayer_name', 'placeholder' => 'e.g. Omar Farooq', 'required' => true],
            ['label' => 'Tax Year', 'type' => 'number', 'name' => 'tax_year', 'placeholder' => 'e.g. 2024', 'required' => true],
            ['label' => 'CNIC / NTN', 'type' => 'text', 'name' => 'cnic_ntn', 'placeholder' => '42201-1234567-8 or NTN', 'required' => true],
            ['label' => 'Contact Number', 'type' => 'tel', 'name' => 'contact_number', 'placeholder' => '+92 300 0000000', 'required' => true],
        ],
    ],
    'gst-registration' => [
        'title' => 'GST Registration',
        'icon' => 'fas fa-cogs',
        'desc' => 'Get your business registered for GST and navigate the compliance process with ease.',
        'fields' => [
            ['label' => 'Business Name', 'type' => 'text', 'name' => 'business_name', 'placeholder' => 'e.g. Al-Noor Traders', 'required' => true],
            ['label' => 'Owner Name', 'type' => 'text', 'name' => 'owner_name', 'placeholder' => 'e.g. Ahmed Ali', 'required' => true],
            ['label' => 'Contact Number', 'type' => 'tel', 'name' => 'contact_number', 'placeholder' => '+92 300 0000000', 'required' => true],
            ['label' => 'Email Address', 'type' => 'email', 'name' => 'email', 'placeholder' => 'you@example.com', 'required' => true],
        ],
    ],
    'logo-registration' => [
        'title' => 'Logo Registration',
        'icon' => 'fas fa-pencil-alt',
        'desc' => 'Protect your brand identity with official logo registration.',
        'fields' => [
            ['label' => 'Business Name', 'type' => 'text', 'name' => 'business_name', 'placeholder' => 'e.g. My Brand Co.', 'required' => true],
            ['label' => 'Logo Description', 'type' => 'textarea', 'name' => 'logo_description', 'placeholder' => 'Briefly describe your logo design…', 'required' => true],
            ['label' => 'Contact Number', 'type' => 'tel', 'name' => 'contact_number', 'placeholder' => '+92 300 0000000', 'required' => true],
            ['label' => 'Email Address', 'type' => 'email', 'name' => 'email', 'placeholder' => 'you@example.com', 'required' => true],
        ],
    ],
    'pseb-registration' => [
        'title' => 'PSEB Registration',
        'icon' => 'fas fa-briefcase',
        'desc' => 'Register your IT business with PSEB and access exclusive government benefits.',
        'fields' => [
            ['label' => 'Business Name', 'type' => 'text', 'name' => 'business_name', 'placeholder' => 'e.g. CodeCraft Studio', 'required' => true],
            ['label' => 'PSEB Category', 'type' => 'text', 'name' => 'pseb_category', 'placeholder' => 'e.g. Software, BPO, IT Services', 'required' => true],
            ['label' => 'Contact Number', 'type' => 'tel', 'name' => 'contact_number', 'placeholder' => '+92 300 0000000', 'required' => true],
            ['label' => 'Email Address', 'type' => 'email', 'name' => 'email', 'placeholder' => 'you@example.com', 'required' => true],
        ],
    ],
    'copyright-registration' => [
        'title' => 'Copyright Registration',
        'icon' => 'fas fa-copyright',
        'desc' => 'Protect your creative works with official copyright registration services.',
        'fields' => [
            ['label' => 'Work Title', 'type' => 'text', 'name' => 'work_title', 'placeholder' => 'e.g. My Novel / Software App', 'required' => true],
            ['label' => 'Author Name', 'type' => 'text', 'name' => 'author_name', 'placeholder' => 'e.g. Fatima Malik', 'required' => true],
            ['label' => 'Contact Number', 'type' => 'tel', 'name' => 'contact_number', 'placeholder' => '+92 300 0000000', 'required' => true],
            ['label' => 'Email Address', 'type' => 'email', 'name' => 'email', 'placeholder' => 'you@example.com', 'required' => true],
        ],
    ],
    'trade-mark' => [
        'title' => 'Trade Mark Registration',
        'icon' => 'fas fa-gavel',
        'desc' => 'Secure your business identity with professional trademark registration.',
        'fields' => [
            ['label' => 'Business Name', 'type' => 'text', 'name' => 'business_name', 'placeholder' => 'e.g. My Brand Co.', 'required' => true],
            ['label' => 'Trademark Description', 'type' => 'textarea', 'name' => 'trademark_description', 'placeholder' => 'Describe the trademark you wish to register…', 'required' => true],
            ['label' => 'Contact Number', 'type' => 'tel', 'name' => 'contact_number', 'placeholder' => '+92 300 0000000', 'required' => true],
            ['label' => 'Email Address', 'type' => 'email', 'name' => 'email', 'placeholder' => 'you@example.com', 'required' => true],
        ],
    ],
];

$service = $_GET['service'] ?? 'business-ntn';

if (!array_key_exists($service, $services)) {
    header('Location: /');
    exit();
}

$currentService = $services[$service];

// ── SEO: unique-per-service meta so pages don't share duplicate titles/descriptions ──
$pageTitle       = $currentService['title'] . ' – Apply Online | Hussain & Co.';
$metaDescription = $currentService['desc'] . ' Apply online in minutes — trusted by 2,500+ clients in Karachi & Hyderabad. Call +92 301 2627325.';
$metaKeywords    = $currentService['title'] . ', ' . $currentService['title'] . ' Pakistan, ' . $currentService['title'] . ' Karachi, ' . $currentService['title'] . ' Hyderabad, Hussain and Co, tax consultant Pakistan';
$canonicalUrl    = 'https://www.hussainnco.com/services-form?service=' . $service;
$ogImage         = ($service === 'fbr-digital-invoicing')
    ? 'https://www.hussainnco.com/images/Digital%20Invoice%20OG%20image.webp'
    : 'https://www.hussainnco.com/images/tax-return-financial-form-concept.webp';

// ── SEO: structured data (Service + Breadcrumb), built as an array so JSON is always valid ──
$serviceSchema = [
    '@type'       => 'Service',
    '@id'         => $canonicalUrl . '#service',
    'name'        => $currentService['title'],
    'description' => $currentService['desc'],
    'url'         => $canonicalUrl,
    'image'       => $ogImage,
    'areaServed'  => [
        ['@type' => 'City', 'name' => 'Karachi'],
        ['@type' => 'City', 'name' => 'Hyderabad'],
        ['@type' => 'Country', 'name' => 'Pakistan'],
    ],
    'provider' => [
        '@type'     => 'LegalService',
        '@id'       => 'https://www.hussainnco.com/#organization',
        'name'      => 'Hussain & Co.',
        'telephone' => '+923012627325',
        'url'       => 'https://www.hussainnco.com/',
    ],
];
// Link the FBR request form back to its full landing page so search engines see
// them as one connected topic rather than two competing pages.
if ($service === 'fbr-digital-invoicing') {
    $serviceSchema['isPartOf'] = ['@id' => 'https://www.hussainnco.com/fbr-digital-invoicing-system#service'];
}

$breadcrumbSchema = [
    '@type'           => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => 'https://www.hussainnco.com/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => 'https://www.hussainnco.com/#services'],
        ['@type' => 'ListItem', 'position' => 3, 'name' => $currentService['title'], 'item' => $canonicalUrl],
    ],
];

$schemaGraph = [
    '@context' => 'https://schema.org',
    '@graph'   => [$serviceSchema, $breadcrumbSchema],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- ═══ PRIMARY SEO META TAGS ═══ -->
<title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $metaDescription; ?>">
<meta name="keywords" content="<?php echo $metaKeywords; ?>">
<meta name="author" content="Muhammad Mansoor Aslam – Hussain & Co.">
<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
<meta name="geo.region" content="PK-SD">
<meta name="geo.placename" content="Karachi, Hyderabad, Pakistan">
<meta name="language" content="English">
<link rel="canonical" href="<?php echo $canonicalUrl; ?>" />

<!-- ═══ FAVICON (was missing on this page) ═══ -->
<link rel="icon" href="images/hussain-and-co-logo.png" type="image/png">
<link rel="apple-touch-icon" href="images/hussain-and-co-logo.png">
<meta name="theme-color" content="#04335d">

<!-- ═══ OPEN GRAPH (Facebook / LinkedIn / WhatsApp) ═══ -->
<meta property="og:title" content="<?php echo $pageTitle; ?>" />
<meta property="og:description" content="<?php echo $metaDescription; ?>" />
<meta property="og:image" content="<?php echo $ogImage; ?>" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
<meta property="og:image:alt" content="<?php echo $currentService['title']; ?> – Hussain & Co." />
<meta property="og:url" content="<?php echo $canonicalUrl; ?>" />
<meta property="og:type" content="website" />
<meta property="og:site_name" content="Hussain & Co." />
<meta property="og:locale" content="en_PK" />

<!-- ═══ TWITTER / X CARD ═══ -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo $pageTitle; ?>">
<meta name="twitter:description" content="<?php echo $metaDescription; ?>">
<meta name="twitter:image" content="<?php echo $ogImage; ?>">
<meta name="twitter:site" content="@hussainnco">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- ═══ SCHEMA.ORG STRUCTURED DATA (Service + Breadcrumb) ═══ -->
<script type="application/ld+json">
<?php echo json_encode($schemaGraph, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
</script>

<style>
:root {
  --navy: #04335d;
  --navy-dark: #022845;
  --emerald: #0faf60;
  --emerald-dark: #0a8a4c;
  --emerald-light: #e6f9f0;
  --off-white: #f8f7f4;
  --white: #ffffff;
  --text-dark: #1a1a2e;
  --text-mid: #4a5568;
  --text-light: #718096;
  --border: #e8e4dd;
  --wa-green: #25d366;
  --wa-dark: #128c7e;
  --error: #dc2626;
  --error-bg: #fef2f2;
  --shadow-sm: 0 2px 8px rgba(4,51,93,0.08);
  --shadow-md: 0 8px 32px rgba(4,51,93,0.12);
  --radius: 14px;
  --radius-sm: 8px;
  --transition: 0.28s cubic-bezier(0.4,0,0.2,1);
}
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
html { font-size: 16px; }
body {
  font-family: 'DM Sans', sans-serif;
  background: var(--off-white);
  color: var(--text-dark);
  min-height: 100vh;
  display: flex; flex-direction: column;
}

/* HEADER */
.site-header {
  background: var(--white);
  border-bottom: 1px solid var(--border);
  padding: 0 24px;
}
.header-inner {
  max-width: 1100px; margin: 0 auto;
  height: 68px;
  display: flex; align-items: center; justify-content: space-between;
}
.logo-wrap {
  display: flex; align-items: center; gap: 10px;
  text-decoration: none;
}
.logo-mark {
  width: 38px; height: 38px;
  background: var(--navy); border-radius: 9px;
  display: flex; align-items: center; justify-content: center;
  color: var(--white);
  font-family: 'Playfair Display', serif;
  font-size: 1rem; font-weight: 700;
}
.logo-text strong {
  display: block;
  font-family: 'Playfair Display', serif;
  font-size: 0.95rem; font-weight: 700; color: var(--navy);
}
.logo-text span { font-size: 0.68rem; color: var(--text-light); letter-spacing: 0.06em; text-transform: uppercase; }
.header-back {
  display: flex; align-items: center; gap: 8px;
  font-size: 0.85rem; font-weight: 500; color: var(--text-mid);
  text-decoration: none; padding: 8px 14px;
  border: 1px solid var(--border); border-radius: var(--radius-sm);
  transition: all var(--transition);
}
.header-back:hover { color: var(--navy); border-color: var(--navy); background: var(--off-white); }

/* PAGE LAYOUT */
.page-wrap {
  flex: 1;
  max-width: 1100px; margin: 0 auto;
  width: 100%; padding: 48px 24px;
  display: grid; grid-template-columns: 340px 1fr; gap: 32px;
  align-items: start;
}

/* SIDEBAR */
.sidebar {
  display: flex; flex-direction: column; gap: 20px; position: sticky; top: 88px;
}

.service-card {
  background: var(--white); border: 1px solid var(--border);
  border-radius: var(--radius); padding: 28px;
  box-shadow: var(--shadow-sm);
}
.service-icon-wrap {
  width: 56px; height: 56px;
  background: var(--emerald-light); border-radius: 12px;
  display: flex; align-items: center; justify-content: center;
  color: var(--emerald); font-size: 1.4rem;
  margin-bottom: 16px;
}
.service-card h2 {
  font-family: 'Playfair Display', serif;
  font-size: 1.2rem; font-weight: 700; color: var(--navy);
  margin-bottom: 10px;
}
.service-card p { font-size: 0.88rem; color: var(--text-mid); line-height: 1.7; }

.trust-card {
  background: var(--navy); border-radius: var(--radius); padding: 24px;
}
.trust-card h4 {
  font-size: 0.78rem; font-weight: 600; letter-spacing: 0.08em; text-transform: uppercase;
  color: rgba(255,255,255,0.5); margin-bottom: 16px;
}
.trust-item {
  display: flex; align-items: center; gap: 10px;
  margin-bottom: 12px;
}
.trust-item:last-child { margin-bottom: 0; }
.trust-item i { color: #6ee7b7; font-size: 0.85rem; width: 16px; }
.trust-item span { font-size: 0.85rem; color: rgba(255,255,255,0.75); }

.other-services {
  background: var(--white); border: 1px solid var(--border);
  border-radius: var(--radius); padding: 24px;
}
.other-services h4 {
  font-size: 0.75rem; font-weight: 600; letter-spacing: 0.08em; text-transform: uppercase;
  color: var(--text-light); margin-bottom: 16px;
}
.other-services ul { list-style: none; display: flex; flex-direction: column; gap: 4px; }
.other-services a {
  display: flex; align-items: center; gap: 8px;
  font-size: 0.85rem; color: var(--text-mid);
  text-decoration: none; padding: 8px 10px; border-radius: var(--radius-sm);
  transition: all var(--transition);
}
.other-services a:hover { background: var(--off-white); color: var(--navy); }
.other-services a.active { background: var(--emerald-light); color: var(--emerald); font-weight: 500; }
.other-services a i { font-size: 0.8rem; width: 14px; }

/* MAIN FORM */
.form-area {
  background: var(--white); border: 1px solid var(--border);
  border-radius: var(--radius); padding: 40px;
  box-shadow: var(--shadow-sm);
}

.form-header { margin-bottom: 32px; }
.form-breadcrumb {
  display: flex; align-items: center; gap: 8px;
  font-size: 0.78rem; color: var(--text-light);
  margin-bottom: 16px;
}
.form-breadcrumb a { color: var(--text-light); text-decoration: none; }
.form-breadcrumb a:hover { color: var(--navy); }
.form-breadcrumb i { font-size: 0.6rem; }

.form-header h1 {
  font-family: 'Playfair Display', serif;
  font-size: 1.6rem; font-weight: 700; color: var(--navy);
  margin-bottom: 8px;
}
.form-header p { font-size: 0.9rem; color: var(--text-mid); }

.progress-bar {
  height: 3px; background: var(--border);
  border-radius: 3px; margin-bottom: 36px; overflow: hidden;
}
.progress-fill {
  height: 100%; background: var(--emerald);
  border-radius: 3px; width: 0%;
  transition: width 0.6s cubic-bezier(0.4,0,0.2,1);
}

.form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
.form-group { display: flex; flex-direction: column; gap: 6px; }
.form-group.full { grid-column: 1 / -1; }
.form-group label {
  font-size: 0.78rem; font-weight: 600;
  color: var(--text-mid); letter-spacing: 0.04em; text-transform: uppercase;
}
.required-star { color: #e53e3e; margin-left: 2px; }
.form-group input, .form-group textarea {
  font-family: 'DM Sans', sans-serif;
  font-size: 0.92rem; color: var(--text-dark);
  background: var(--off-white);
  border: 1.5px solid var(--border);
  border-radius: var(--radius-sm);
  padding: 13px 16px; outline: none;
  transition: all var(--transition); width: 100%;
}
.form-group input:focus, .form-group textarea:focus {
  border-color: var(--emerald); background: var(--white);
  box-shadow: 0 0 0 3px rgba(15,175,96,0.1);
}
.form-group input.error, .form-group textarea.error {
  border-color: var(--error); background: var(--error-bg);
}
.form-group textarea { resize: vertical; min-height: 110px; }
.form-group input::placeholder, .form-group textarea::placeholder { color: var(--text-light); }

.error-msg {
  font-size: 0.75rem; color: var(--error);
  display: flex; align-items: center; gap: 4px;
}
.error-msg i { font-size: 0.7rem; }

.form-footer {
  margin-top: 32px;
  display: flex; align-items: center; justify-content: space-between;
  flex-wrap: wrap; gap: 16px;
}
.form-note { font-size: 0.78rem; color: var(--text-light); display: flex; align-items: center; gap: 6px; }
.form-note i { color: var(--emerald); }

.btn-submit {
  display: flex; align-items: center; gap: 10px;
  background: var(--navy); color: var(--white);
  font-family: 'DM Sans', sans-serif; font-size: 0.95rem; font-weight: 600;
  padding: 14px 28px; border: none; border-radius: var(--radius-sm);
  cursor: pointer; transition: all var(--transition);
}
.btn-submit:hover { background: var(--navy-dark); transform: translateY(-1px); box-shadow: var(--shadow-md); }

/* SUCCESS */
.success-overlay {
  display: none;
  flex-direction: column; align-items: center; text-align: center; gap: 24px;
  padding: 40px 20px;
}
.success-overlay.show { display: flex; }
.success-icon-wrap {
  width: 80px; height: 80px; border-radius: 50%;
  background: var(--emerald-light);
  display: flex; align-items: center; justify-content: center;
  color: var(--emerald); font-size: 2.2rem;
}
.success-overlay h2 {
  font-family: 'Playfair Display', serif;
  font-size: 1.6rem; color: var(--navy);
}
.success-overlay p { font-size: 0.9rem; color: var(--text-mid); line-height: 1.7; max-width: 380px; }
.btn-wa {
  display: flex; align-items: center; justify-content: center; gap: 10px;
  padding: 15px 32px;
  background: var(--wa-green); color: var(--white);
  font-family: 'DM Sans', sans-serif; font-size: 0.95rem; font-weight: 600;
  border-radius: var(--radius-sm); text-decoration: none;
  transition: all var(--transition);
}
.btn-wa:hover { background: var(--wa-dark); transform: translateY(-1px); box-shadow: 0 8px 24px rgba(37,211,102,0.35); }
.btn-wa i { font-size: 1.2rem; }
.btn-reset {
  background: none; border: 1.5px solid var(--border);
  color: var(--text-mid); padding: 13px 24px;
  font-family: 'DM Sans', sans-serif; font-size: 0.88rem; font-weight: 500;
  border-radius: var(--radius-sm); cursor: pointer;
  transition: all var(--transition);
}
.btn-reset:hover { border-color: var(--navy); color: var(--navy); }

/* FOOTER */
.site-footer {
  background: var(--white); border-top: 1px solid var(--border);
  padding: 20px 24px; text-align: center;
  font-size: 0.8rem; color: var(--text-light);
}
.site-footer a { color: var(--text-mid); text-decoration: none; }
.site-footer a:hover { color: var(--navy); }

/* RESPONSIVE */
@media (max-width: 960px) {
  .page-wrap { grid-template-columns: 1fr; }
  .sidebar { position: static; }
  .other-services { display: none; }
}
@media (max-width: 640px) {
  .form-area { padding: 24px 20px; }
  .form-grid { grid-template-columns: 1fr; }
  .form-footer { flex-direction: column; }
  .btn-submit { width: 100%; justify-content: center; }
  .page-wrap { padding: 24px 16px; }
}
@media (max-width: 480px) {
  .form-header h1 { font-size: 1.3rem; }
}
</style>
</head>
<body>

<header class="site-header">
  <div class="header-inner">
    <a href="/" class="logo-wrap">
      <img src="images/hussain-and-cologo.svg" alt="Hussain & Co." style="height:44px; width:auto; display:block;">
    </a>
    <a href="/" class="header-back"><i class="fas fa-arrow-left"></i> Back to Home</a>
  </div>
</header>

<div class="page-wrap">
  <!-- SIDEBAR -->
  <aside class="sidebar">
    <div class="service-card">
      <div class="service-icon-wrap">
        <i class="<?php echo $currentService['icon']; ?>"></i>
      </div>
      <h2><?php echo $currentService['title']; ?></h2>
      <p><?php echo $currentService['desc']; ?></p>
    </div>

    <div class="trust-card">
      <h4>Why Choose Us</h4>
      <div class="trust-item"><i class="fas fa-check"></i><span>Expert tax professionals</span></div>
      <div class="trust-item"><i class="fas fa-check"></i><span>10+ years of experience</span></div>
      <div class="trust-item"><i class="fas fa-check"></i><span>Fast & reliable service</span></div>
      <div class="trust-item"><i class="fas fa-check"></i><span>2500+ satisfied clients</span></div>
      <div class="trust-item"><i class="fas fa-check"></i><span>WhatsApp support available</span></div>
    </div>

    <div class="other-services">
      <h4>Other Services</h4>
      <ul>
        <?php foreach ($services as $slug => $svc): ?>
        <li>
          <a href="?service=<?php echo $slug; ?>" class="<?php echo $slug === $service ? 'active' : ''; ?>">
            <i class="<?php echo $svc['icon']; ?>"></i>
            <?php echo $svc['title']; ?>
          </a>
        </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </aside>

  <!-- FORM -->
  <main class="form-area">
    <div id="form-wrapper">
      <div class="form-header">
        <div class="form-breadcrumb">
          <a href="/">Home</a>
          <i class="fas fa-chevron-right"></i>
          <a href="/#services">Services</a>
          <i class="fas fa-chevron-right"></i>
          <?php if ($service === 'fbr-digital-invoicing'): ?>
          <a href="/fbr-digital-invoicing-system">FBR Digital Invoicing System</a>
          <i class="fas fa-chevron-right"></i>
          <span>Apply</span>
          <?php else: ?>
          <span><?php echo $currentService['title']; ?></span>
          <?php endif; ?>
        </div>
        <h1><?php echo $currentService['title']; ?></h1>
        <p>Fill in your details below and we'll get back to you promptly.</p>
      </div>

      <div class="progress-bar">
        <div class="progress-fill" id="progress-fill"></div>
      </div>

      <form id="service-form">
        <input type="hidden" name="service" value="<?php echo $service; ?>">
        <div class="form-grid">
          <?php foreach ($currentService['fields'] as $field): ?>
            <?php $isTextarea = $field['type'] === 'textarea'; ?>
            <div class="form-group <?php echo $isTextarea ? 'full' : ''; ?>">
              <label for="<?php echo $field['name']; ?>">
                <?php echo $field['label']; ?>
                <?php if (!empty($field['required'])): ?><span class="required-star">*</span><?php endif; ?>
              </label>
              <?php if ($isTextarea): ?>
                <textarea
                  name="<?php echo $field['name']; ?>"
                  id="<?php echo $field['name']; ?>"
                  placeholder="<?php echo $field['placeholder'] ?? ''; ?>"
                  <?php echo !empty($field['required']) ? 'required' : ''; ?>
                ></textarea>
              <?php else: ?>
                <input
                  type="<?php echo $field['type']; ?>"
                  name="<?php echo $field['name']; ?>"
                  id="<?php echo $field['name']; ?>"
                  placeholder="<?php echo $field['placeholder'] ?? ''; ?>"
                  <?php echo !empty($field['required']) ? 'required' : ''; ?>
                >
              <?php endif; ?>
              <div class="error-msg" id="error-<?php echo $field['name']; ?>" style="display:none;">
                <i class="fas fa-exclamation-circle"></i> <span>This field is required</span>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

        <div class="form-footer">
          <div class="form-note">
            <i class="fas fa-lock"></i>
            Your information is kept private and confidential
          </div>
          <button type="submit" class="btn-submit">
            Submit Request <i class="fas fa-arrow-right"></i>
          </button>
        </div>
      </form>
    </div>

    <!-- SUCCESS -->
    <div class="success-overlay" id="confirmation-message">
      <div class="success-icon-wrap"><i class="fas fa-check"></i></div>
      <h2>Form Submitted!</h2>
      <p>Thank you for choosing Hussain &amp; Co. Your details have been received. Click below to contact us directly on WhatsApp.</p>
      <a id="whatsapp-button" class="btn-wa" href="#" target="_blank" rel="noopener noreferrer">
        <i class="fab fa-whatsapp"></i> Open WhatsApp Chat
      </a>
      <button class="btn-reset" onclick="resetForm()">← Submit Another Request</button>
    </div>
  </main>
</div>

<footer class="site-footer">
  &copy; <?= date('Y') ?> <a href="/">Hussain &amp; Co.</a> · All rights reserved · Tax &amp; Legal Services, Pakistan
</footer>

<script>
function resetForm() {
  document.getElementById('form-wrapper').style.display = 'block';
  document.getElementById('confirmation-message').classList.remove('show');
  document.getElementById('service-form').reset();
  document.getElementById('progress-fill').style.width = '0%';
}

$(document).ready(function() {
  // Progress bar
  const fields = $('input[required], textarea[required]');
  function updateProgress() {
    let filled = 0;
    fields.each(function() { if ($(this).val().trim() !== '') filled++; });
    $('#progress-fill').css('width', (filled / fields.length * 100) + '%');
  }
  $('input, textarea').on('input', updateProgress);

  // Blur validation
  $('input[required], textarea[required]').on('blur', function() {
    const name = $(this).attr('name');
    const errEl = $('#error-' + name);
    if ($(this).val().trim() === '') {
      $(this).addClass('error');
      errEl.show();
    } else {
      $(this).removeClass('error');
      errEl.hide();
    }
  });

  // Submit
  $('#service-form').submit(function(e) {
    e.preventDefault();

    let formValid = true;
    $('input[required], textarea[required]').each(function() {
      const name = $(this).attr('name');
      const errEl = $('#error-' + name);
      if ($(this).val().trim() === '') {
        formValid = false;
        $(this).addClass('error');
        errEl.show();
      } else {
        $(this).removeClass('error');
        errEl.hide();
      }
    });

    if (!formValid) {
      $('input.error, textarea.error').first().focus();
      return;
    }

    const formData = $(this).serialize();
    $.ajax({
      type: 'POST',
      url: 'process-form.php',
      data: formData,
      dataType: 'json',
      success: function(response) {
        if (response.status === 'success') {
          document.getElementById('form-wrapper').style.display = 'none';
          document.getElementById('confirmation-message').classList.add('show');
          const userName = $('input[name="full_name"]').val()
            || $('input[name="owner_name"]').val()
            || $('input[name="taxpayer_name"]').val()
            || $('input[name="company_name"]').val()
            || $('input[name="author_name"]').val()
            || $('input[name="business_name"]').val()
            || 'Customer';
          const serviceTitle = '<?php echo addslashes($currentService['title']); ?>';
          const msg = 'Hello, I am ' + userName + ', and I have completed the form for ' + serviceTitle + '. Could you please confirm receipt and provide next steps?';
          $('#whatsapp-button').attr('href', 'https://wa.me/923322196874?text=' + encodeURIComponent(msg));
        } else {
          alert('Error: ' + (response.message || 'Something went wrong. Please try again.'));
        }
      },
      error: function() {
        alert('Network error. Please check your connection and try again.');
      }
    });
  });
});
</script>
</body>
</html>