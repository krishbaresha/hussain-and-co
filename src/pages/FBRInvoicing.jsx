import React from 'react';
import { Link } from 'react-router-dom';
import SEO from '../components/SEO';
import '../styles/fbr.css';

export default function FBRInvoicing() {
  return (
    <>
      <SEO
        title="FBR Digital Invoicing System Integration | Hussain & Co."
        description="Real-time FBR Digital Invoicing (e-invoicing) API integration for POS, ERP and billing systems — IRIS registration, licensed integrator setup, sandbox testing and ongoing compliance support."
        canonical="https://www.hussainnco.com/fbr-digital-invoicing-system"
        keywords="FBR Digital Invoicing System, FBR e-Invoicing Integration Pakistan, FBR API Integration, POS Integration Pakistan, Tier-1 Retailer Invoicing"
      />

      {/* BREADCRUMB */}
      <div className="breadcrumb-bar">
        <div className="section-inner">
          <div className="breadcrumb-list">
            <Link to="/">Home</Link>
            <i className="fas fa-chevron-right" style={{ fontSize: '0.6rem' }}></i>
            <Link to="/#services">Services</Link>
            <i className="fas fa-chevron-right" style={{ fontSize: '0.6rem' }}></i>
            <span className="current">FBR Digital Invoicing System</span>
          </div>
        </div>
      </div>

      {/* HERO */}
      <section className="hero-fbr">
        <div className="section-inner">
          <div>
            <div className="hero-badge"><i className="fas fa-bolt" style={{ fontSize: '0.7rem' }}></i> Real-Time FBR Compliance</div>
            <h1>FBR Digital Invoicing System <em>Integration</em></h1>
            <p className="hero-tldr">The FBR Digital Invoicing System connects your POS, ERP or billing software to the Federal Board of Revenue through a secure API — every invoice is validated in real time and returned with a unique FBR Invoice Reference Number and QR code. Hussain &amp; Co. handles the registration, integration and testing so you go live without disrupting your business.</p>
            <div className="hero-pills">
              <div className="hero-pill"><i className="fas fa-check"></i> POS &amp; ERP Compatible</div>
              <div className="hero-pill"><i className="fas fa-check"></i> Sandbox &amp; Live Testing</div>
              <div className="hero-pill"><i className="fas fa-check"></i> IRIS Registration Included</div>
            </div>
            <div className="hero-actions">
              <Link to="/services-form?service=fbr-digital-invoicing" className="btn-primary">
                <i className="fas fa-satellite-dish"></i> Request FBR Integration
              </Link>
              <Link to="/request-call" className="btn-outline-white">
                <i className="fab fa-whatsapp"></i> Speak With an Expert
              </Link>
            </div>
          </div>

          <div className="flow-wrap">
            <div className="flow-caption">Real-Time Invoice Lifecycle</div>
            <svg className="flow-svg" viewBox="0 0 400 240" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect x="20" y="20" width="100" height="60" rx="8" fill="rgba(255,255,255,0.1)" stroke="rgba(255,255,255,0.2)" />
              <text x="70" y="48" textAnchor="middle" className="flow-node-label">Your POS/ERP</text>
              <text x="70" y="64" textAnchor="middle" className="flow-node-sub">Billing Software</text>

              <rect x="280" y="20" width="100" height="60" rx="8" fill="rgba(15,175,96,0.15)" stroke="#0faf60" />
              <text x="330" y="48" textAnchor="middle" className="flow-node-label">FBR Gateway</text>
              <text x="330" y="64" textAnchor="middle" className="flow-node-sub">Real-Time API</text>

              <path d="M120 50 H280" className="flow-line" />
              <path d="M120 50 H280" className="flow-pulse" />

              <rect x="150" y="150" width="100" height="60" rx="8" fill="rgba(200,155,60,0.15)" stroke="#c89b3c" />
              <text x="200" y="178" textAnchor="middle" className="flow-node-label">Valid Invoice</text>
              <text x="200" y="194" textAnchor="middle" className="flow-node-sub">IRN + QR Code</text>

              <path d="M330 80 V180 H250" className="flow-line" />
              <path d="M150 180 H70 V80" className="flow-line" />
            </svg>
          </div>
        </div>
      </section>

      {/* STATS */}
      <div className="stats-bar">
        <div className="stats-inner">
          <div>
            <div className="stat-num">100%</div>
            <div className="stat-label">Real-Time Verification</div>
          </div>
          <div>
            <div className="stat-num">0 ms</div>
            <div className="stat-label">Billing Disruption</div>
          </div>
          <div>
            <div className="stat-num">500+</div>
            <div className="stat-label">Integrations Done</div>
          </div>
          <div>
            <div className="stat-num">24/7</div>
            <div className="stat-label">FBR Compliance Support</div>
          </div>
        </div>
      </div>

      {/* AUDIENCE */}
      <section className="section-white">
        <div className="section-inner">
          <div style={{ textAlign: 'center', maxWidth: '720px', margin: '0 auto' }}>
            <div className="section-label">Who Needs Integration</div>
            <h2 className="section-title">Mandatory FBR Compliance for Modern Businesses</h2>
            <p className="section-lede">The Federal Board of Revenue is actively rolling out mandatory digital invoicing across multiple business sectors across Pakistan.</p>
          </div>

          <div className="audience-grid">
            <div className="audience-card">
              <i className="fas fa-store"></i>
              <h3>Tier-1 Retailers &amp; POS</h3>
              <p>Retail stores, apparel outlets, departmental stores, and supermarket chains requiring integrated POS receipt generation.</p>
            </div>
            <div className="audience-card">
              <i className="fas fa-industry"></i>
              <h3>Manufacturers &amp; Wholesalers</h3>
              <p>B2B distributors and manufacturers producing bulk supplies and structured e-invoices with GST calculations.</p>
            </div>
            <div className="audience-card">
              <i className="fas fa-utensils"></i>
              <h3>Restaurants &amp; Service Providers</h3>
              <p>Hospitality, food chains, software houses, and corporate consultancies operating automated billing platforms.</p>
            </div>
          </div>

          <div className="risk-box">
            <i className="fas fa-shield-alt"></i>
            <div>
              <h3>Avoid Penalties &amp; Non-Compliance Audits</h3>
              <p>Non-integrated businesses face severe penalties and suspension of input tax adjustments under the Sales Tax Act, 1990. Getting integrated protects your cashflow and maintains legal standing on the Active Taxpayers List.</p>
            </div>
          </div>
        </div>
      </section>

      {/* PROCESS */}
      <section className="section-off">
        <div className="section-inner">
          <div>
            <div className="section-label">How We Work</div>
            <h2 className="section-title">Step-by-Step Integration Roadmap</h2>
            <p className="section-lede">Our experienced team handles the entire technical and regulatory journey from start to finish.</p>
          </div>

          <div className="process-list">
            <div className="process-step">
              <div className="step-num">1</div>
              <div className="step-body">
                <h3>Technical Assessment &amp; IRIS Credentials</h3>
                <p>We review your existing ERP/POS architecture and configure your FBR IRIS digital invoicing API credentials and tokens.</p>
              </div>
            </div>
            <div className="process-step">
              <div className="step-num">2</div>
              <div className="step-body">
                <h3>API Connector Setup &amp; Sandbox Testing</h3>
                <p>We configure the JSON payload structure and test sample invoices in the official FBR sandbox environment to ensure flawless response validation.</p>
              </div>
            </div>
            <div className="process-step">
              <div className="step-num">3</div>
              <div className="step-body">
                <h3>QR Code &amp; IRN Layout Finalization</h3>
                <p>We adapt your invoice receipt template to render the official QR code and FBR Invoice Reference Number as required by law.</p>
              </div>
            </div>
            <div className="process-step">
              <div className="step-num">4</div>
              <div className="step-body">
                <h3>Live Production Deployment &amp; Ongoing Support</h3>
                <p>We transition your setup to live production and provide continuous compliance monitoring and technical assistance.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* FAQS */}
      <section className="section-white">
        <div className="section-inner">
          <div>
            <div className="section-label">Frequently Asked Questions</div>
            <h2 className="section-title">Everything You Need to Know</h2>
          </div>

          <div className="faq-list">
            <details className="faq-item">
              <summary>What is the FBR Digital Invoicing System?</summary>
              <p>The FBR Digital Invoicing System connects a business's POS, ERP, or billing software directly to the Federal Board of Revenue through a secure API. Every invoice is validated in real time and assigned a unique Invoice Reference Number (IRN) and QR code.</p>
            </details>

            <details className="faq-item">
              <summary>Can my existing POS or custom billing software be integrated?</summary>
              <p>Yes. Whether you use QuickBooks, SAP, Oracle, custom PHP/Node POS, or desktop software, we can connect your system either directly or via certified middleware.</p>
            </details>

            <details className="faq-item">
              <summary>How long does the entire integration take?</summary>
              <p>For most single-location businesses, full setup and testing takes between 1 to 2 weeks. Multi-branch chains are deployed in coordinated phases.</p>
            </details>
          </div>

          <div className="author-strip">
            <div className="author-avatar">MA</div>
            <div>
              <div className="name">Muhammad Mansoor Aslam — CEO &amp; Lead Tax Consultant</div>
              <div className="meta">Supervised 500+ corporate tax &amp; FBR e-invoicing implementations in Pakistan.</div>
            </div>
          </div>
        </div>
      </section>

      {/* CTA BAND */}
      <section className="cta-band">
        <div className="section-inner">
          <h2>Ready to Make Your Invoicing 100% FBR Compliant?</h2>
          <p>Get in touch with Hussain &amp; Co. today for a free integration assessment.</p>
          <div className="cta-actions">
            <Link to="/services-form?service=fbr-digital-invoicing" className="btn-primary">
              Apply for Integration <i className="fas fa-arrow-right"></i>
            </Link>
            <Link to="/request-call" className="btn-outline-white">
              <i className="fab fa-whatsapp"></i> Request WhatsApp Call
            </Link>
          </div>
        </div>
      </section>
    </>
  );
}
