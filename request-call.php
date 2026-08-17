<?php
$fullName = '';
$cnic = '';
$service = '';
$whatsappUrl = '';
$isSubmitted = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = htmlspecialchars($_POST['full_name']);
    $cnic = !empty($_POST['cnic']) ? htmlspecialchars($_POST['cnic']) : "Not Provided";
    $service = htmlspecialchars($_POST['service']);
    $isSubmitted = true;

    $baseUrl = "https://wa.me/923322196874";
    $message = "Hello, I am $fullName. My CNIC is $cnic. I am interested in the $service service. Could you please provide more details?";
    $encodedMessage = urlencode($message);
    $whatsappUrl = $baseUrl . "?text=" . $encodedMessage;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Request a Call – Hussain & Co.</title>
<meta name="description" content="Fill out the form to request a WhatsApp call with Hussain & Co. for expert tax consulting, tax filing, legal advisory, and more services.">
<meta name="author" content="Muhammad Mansoor Aslam – Hussain & Co.">
<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
<meta name="geo.region" content="PK-SD">
<meta name="geo.placename" content="Karachi, Hyderabad, Pakistan">
<meta name="language" content="English">

<!-- FIXED: canonical/og:url previously pointed to the wrong slug (/request-whatsapp-call,
     no www) instead of this page's real URL — that mismatch can stop Google from indexing
     this page correctly. -->
<link rel="canonical" href="https://www.hussainnco.com/request-call">
<meta property="og:title" content="Request a WhatsApp Call - Hussain & Co.">
<meta property="og:description" content="Fill out the form to request a WhatsApp call with Hussain & Co. for expert tax consulting, tax filing, legal advisory, and more services.">
<meta property="og:image" content="https://www.hussainnco.com/images/tax-return-financial-form-concept.webp">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:url" content="https://www.hussainnco.com/request-call">
<meta property="og:type" content="website">
<meta property="og:site_name" content="Hussain & Co.">
<meta property="og:locale" content="en_PK">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Request a WhatsApp Call - Hussain & Co.">
<meta name="twitter:description" content="Fill out the form to request a WhatsApp call with Hussain & Co. for expert tax consulting, tax filing, legal advisory, and more services.">
<meta name="twitter:image" content="https://www.hussainnco.com/images/tax-return-financial-form-concept.webp">
<meta name="twitter:site" content="@hussainnco">

<link rel="icon" href="images/hussain-and-co-logo.png" type="image/png">
<link rel="apple-touch-icon" href="images/hussain-and-co-logo.png">
<meta name="theme-color" content="#04335d">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Request a WhatsApp Call - Hussain & Co.",
  "url": "https://www.hussainnco.com/request-call",
  "isPartOf": { "@id": "https://www.hussainnco.com/#website" },
  "publisher": { "@id": "https://www.hussainnco.com/#organization" }
}
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
  font-size: 0.95rem; font-weight: 700;
  color: var(--navy);
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

/* MAIN LAYOUT */
.page-wrap {
  flex: 1;
  display: flex; align-items: center; justify-content: center;
  padding: 48px 24px;
}
.page-grid {
  width: 100%; max-width: 960px;
  display: grid; grid-template-columns: 1fr 1fr;
  gap: 0; border-radius: var(--radius);
  overflow: hidden; box-shadow: var(--shadow-md);
  background: var(--white);
}

/* LEFT PANEL */
.left-panel {
  background: var(--navy);
  padding: 48px 40px;
  display: flex; flex-direction: column; gap: 32px;
  position: relative; overflow: hidden;
}
.left-panel::before {
  content: '';
  position: absolute; top: -60px; right: -60px;
  width: 240px; height: 240px;
  background: rgba(255,255,255,0.04); border-radius: 50%;
}
.left-panel::after {
  content: '';
  position: absolute; bottom: -40px; left: -40px;
  width: 180px; height: 180px;
  background: rgba(15,175,96,0.08); border-radius: 50%;
}
.panel-label {
  font-size: 0.72rem; letter-spacing: 0.1em; text-transform: uppercase;
  color: rgba(255,255,255,0.5); font-weight: 600;
}
.panel-title {
  font-family: 'Playfair Display', serif;
  font-size: 1.8rem; font-weight: 700;
  color: var(--white); line-height: 1.25;
}
.panel-title em { font-style: normal; color: #6ee7b7; }
.panel-desc {
  font-size: 0.9rem; color: rgba(255,255,255,0.68); line-height: 1.75;
}

.panel-steps { display: flex; flex-direction: column; gap: 20px; position: relative; z-index: 1; }
.step {
  display: flex; align-items: flex-start; gap: 16px;
}
.step-num {
  width: 32px; height: 32px; border-radius: 50%;
  background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2);
  color: rgba(255,255,255,0.8);
  font-size: 0.8rem; font-weight: 700;
  display: flex; align-items: center; justify-content: center;
  flex-shrink: 0;
}
.step-text strong { display: block; font-size: 0.88rem; color: var(--white); margin-bottom: 2px; }
.step-text span { font-size: 0.8rem; color: rgba(255,255,255,0.55); }

.panel-contact { display: flex; flex-direction: column; gap: 12px; position: relative; z-index: 1; padding-top: 8px; border-top: 1px solid rgba(255,255,255,0.1); }
.panel-contact-item { display: flex; align-items: center; gap: 10px; }
.panel-contact-item i { color: #6ee7b7; font-size: 0.85rem; width: 16px; }
.panel-contact-item a { font-size: 0.85rem; color: rgba(255,255,255,0.7); text-decoration: none; }
.panel-contact-item a:hover { color: var(--white); }

/* RIGHT PANEL - FORM */
.right-panel { padding: 48px 40px; display: flex; flex-direction: column; }
.form-heading {
  font-family: 'Playfair Display', serif;
  font-size: 1.4rem; font-weight: 700; color: var(--navy);
  margin-bottom: 8px;
}
.form-subheading { font-size: 0.88rem; color: var(--text-light); margin-bottom: 32px; }

.form-group { display: flex; flex-direction: column; gap: 6px; margin-bottom: 22px; }
.form-group label {
  font-size: 0.78rem; font-weight: 600;
  color: var(--text-mid); letter-spacing: 0.04em; text-transform: uppercase;
}
.form-group input, .form-group select {
  font-family: 'DM Sans', sans-serif;
  font-size: 0.92rem; color: var(--text-dark);
  background: var(--off-white);
  border: 1.5px solid var(--border);
  border-radius: var(--radius-sm);
  padding: 13px 16px; outline: none;
  transition: all var(--transition);
  appearance: none; -webkit-appearance: none;
}
.form-group input:focus, .form-group select:focus {
  border-color: var(--emerald); background: var(--white);
  box-shadow: 0 0 0 3px rgba(15,175,96,0.1);
}
.select-wrap { position: relative; }
.select-wrap::after {
  content: '\f078';
  font-family: 'Font Awesome 6 Free'; font-weight: 900;
  font-size: 0.7rem; color: var(--text-light);
  position: absolute; right: 14px; top: 50%; transform: translateY(-50%);
  pointer-events: none;
}
.form-group input::placeholder { color: var(--text-light); }
.form-hint { font-size: 0.75rem; color: var(--text-light); margin-top: 4px; }

.btn-submit {
  width: 100%; padding: 15px;
  background: var(--navy); color: var(--white);
  font-family: 'DM Sans', sans-serif; font-size: 0.95rem; font-weight: 600;
  border: none; border-radius: var(--radius-sm); cursor: pointer;
  transition: all var(--transition);
  display: flex; align-items: center; justify-content: center; gap: 10px;
  margin-top: 8px;
}
.btn-submit:hover { background: var(--navy-dark); transform: translateY(-1px); box-shadow: var(--shadow-md); }

/* SUCCESS STATE */
.success-state { display: flex; flex-direction: column; align-items: center; text-align: center; gap: 24px; padding: 20px 0; }
.success-icon {
  width: 72px; height: 72px; border-radius: 50%;
  background: var(--emerald-light);
  display: flex; align-items: center; justify-content: center;
  color: var(--emerald); font-size: 2rem;
}
.success-state h2 {
  font-family: 'Playfair Display', serif;
  font-size: 1.4rem; font-weight: 700; color: var(--navy);
}
.success-state p { font-size: 0.9rem; color: var(--text-mid); line-height: 1.7; max-width: 320px; }

.detail-card {
  background: var(--off-white); border-radius: var(--radius-sm);
  padding: 20px; width: 100%; text-align: left;
}
.detail-row { display: flex; justify-content: space-between; align-items: center; padding: 8px 0; }
.detail-row:not(:last-child) { border-bottom: 1px solid var(--border); }
.detail-row span:first-child { font-size: 0.8rem; color: var(--text-light); font-weight: 500; }
.detail-row span:last-child { font-size: 0.88rem; color: var(--text-dark); font-weight: 600; }

.btn-wa {
  display: flex; align-items: center; justify-content: center; gap: 10px;
  width: 100%; padding: 15px;
  background: var(--wa-green); color: var(--white);
  font-family: 'DM Sans', sans-serif; font-size: 0.95rem; font-weight: 600;
  border-radius: var(--radius-sm); text-decoration: none;
  transition: all var(--transition);
}
.btn-wa:hover { background: var(--wa-dark); transform: translateY(-1px); box-shadow: 0 8px 24px rgba(37,211,102,0.35); }

.btn-reset {
  background: none; border: 1.5px solid var(--border);
  color: var(--text-mid); padding: 13px;
  font-family: 'DM Sans', sans-serif; font-size: 0.88rem; font-weight: 500;
  border-radius: var(--radius-sm); cursor: pointer;
  width: 100%; transition: all var(--transition);
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
@media (max-width: 768px) {
  .page-grid { grid-template-columns: 1fr; }
  .left-panel { padding: 36px 28px; }
  .right-panel { padding: 36px 28px; }
  .panel-title { font-size: 1.5rem; }
  .page-wrap { padding: 24px 16px; align-items: flex-start; }
}
@media (max-width: 480px) {
  .left-panel { padding: 28px 20px; }
  .right-panel { padding: 28px 20px; }
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
  <div class="page-grid">
    <!-- LEFT PANEL -->
    <div class="left-panel">
      <div>
        <div class="panel-label">Free Consultation</div>
        <h1 class="panel-title">Request a <em>WhatsApp</em> Call</h1>
        <p class="panel-desc">Fill in the quick form and we'll connect with you on WhatsApp to discuss your needs — no obligations.</p>
      </div>

      <div class="panel-steps">
        <div class="step">
          <div class="step-num">1</div>
          <div class="step-text">
            <strong>Fill the form</strong>
            <span>Enter your name and select a service</span>
          </div>
        </div>
        <div class="step">
          <div class="step-num">2</div>
          <div class="step-text">
            <strong>Click WhatsApp</strong>
            <span>Opens a pre-filled WhatsApp message</span>
          </div>
        </div>
        <div class="step">
          <div class="step-num">3</div>
          <div class="step-text">
            <strong>We respond promptly</strong>
            <span>Our team will follow up within hours</span>
          </div>
        </div>
      </div>

      <div class="panel-contact">
        <div class="panel-contact-item">
          <i class="fas fa-phone-alt"></i>
          <a href="tel:+923322196874">+92 332 2196874</a>
        </div>
        <div class="panel-contact-item">
          <i class="fas fa-envelope"></i>
          <a href="mailto:info@hussainnco.com">info@hussainnco.com</a>
        </div>
        <div class="panel-contact-item">
          <i class="fas fa-clock"></i>
          <a href="#">Mon – Sat, 9:00 AM – 6:00 PM</a>
        </div>
      </div>
    </div>

    <!-- RIGHT PANEL -->
    <div class="right-panel">
      <?php if (!$isSubmitted): ?>
        <h2 class="form-heading">Your Details</h2>
        <p class="form-subheading">Takes less than a minute to fill out</p>

        <form action="" method="POST">
          <div class="form-group">
            <label for="full_name">Full Name <span style="color:#e53e3e">*</span></label>
            <input type="text" id="full_name" name="full_name" placeholder="e.g. Ali Hassan" required>
          </div>

          <div class="form-group">
            <label for="cnic">CNIC Number <span style="color:var(--text-light); font-weight:400; text-transform:none;">(Optional)</span></label>
            <input type="text" id="cnic" name="cnic" placeholder="42345-6789012-3">
            <span class="form-hint">Your CNIC helps us serve you faster — it's kept confidential.</span>
          </div>

          <div class="form-group">
            <label for="service">Select Service <span style="color:#e53e3e">*</span></label>
            <div class="select-wrap">
              <select id="service" name="service" required>
                <option value="" disabled selected>Choose a service…</option>
                <option value="Return Filing">Return Filing</option>
                <option value="Tax Consulting">Tax Consulting</option>
                <option value="Legal Advisory">Legal Advisory</option>
                <option value="Corporate Filing">Corporate Filing</option>
                <option value="PSEB Registration">PSEB Registration</option>
                <option value="NTN Registration">NTN Registration</option>
                <option value="GST Registration">GST Registration</option>
                <option value="Company Registration">Company Registration</option>
                <option value="Trademark Registration">Trademark Registration</option>
                <option value="Copyright Registration">Copyright Registration</option>
                <option value="Other">Other</option>
              </select>
            </div>
          </div>

          <button type="submit" class="btn-submit">
            <i class="fab fa-whatsapp"></i> Continue to WhatsApp
          </button>
        </form>

      <?php else: ?>
        <div class="success-state">
          <div class="success-icon"><i class="fas fa-check"></i></div>
          <h2>You're All Set!</h2>
          <p>Thank you, <strong><?= $fullName ?></strong>. Your request has been prepared. Click the button below to contact us on WhatsApp.</p>

          <div class="detail-card">
            <div class="detail-row">
              <span>Name</span>
              <span><?= $fullName ?></span>
            </div>
            <div class="detail-row">
              <span>CNIC</span>
              <span><?= $cnic ?></span>
            </div>
            <div class="detail-row">
              <span>Service</span>
              <span><?= $service ?></span>
            </div>
          </div>

          <a href="<?= $whatsappUrl ?>" class="btn-wa" target="_blank" rel="noopener noreferrer">
            <i class="fab fa-whatsapp" style="font-size:1.2rem;"></i>
            Open WhatsApp Chat
          </a>

          <button class="btn-reset" onclick="window.location.href=window.location.pathname">
            ← Submit Another Request
          </button>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>

<footer class="site-footer">
  &copy; <?= date('Y') ?> <a href="/">Hussain &amp; Co.</a> · All rights reserved · Tax &amp; Legal Services, Pakistan
</footer>

</body>
</html>