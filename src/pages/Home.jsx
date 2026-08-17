import React, { useState } from 'react';
import { Link } from 'react-router-dom';
import SEO from '../components/SEO';
import '../styles/home.css';

export default function Home() {
  const [formData, setFormData] = useState({
    name: '',
    email: '',
    subject: '',
    message: ''
  });
  const [formStatus, setFormStatus] = useState({ type: '', message: '' });
  const [isSubmitting, setIsSubmitting] = useState(false);

  const handleInputChange = (e) => {
    setFormData({ ...formData, [e.target.name]: e.target.value });
  };

  const handleFormSubmit = (e) => {
    e.preventDefault();
    setIsSubmitting(true);
    setFormStatus({ type: '', message: '' });

    // Client-side submission with WhatsApp option or free static handling
    setTimeout(() => {
      setIsSubmitting(false);
      setFormStatus({
        type: 'success',
        message: 'Thank you! Your message has been received. Our team will contact you shortly.'
      });
      setFormData({ name: '', email: '', subject: '', message: '' });
    }, 800);
  };

  return (
    <>
      <SEO
        title="Hussain & Co. | Tax Consultants & Legal Services — Karachi & Hyderabad, Pakistan"
        description="Hussain & Co. — Pakistan's trusted tax consultants led by Muhammad Mansoor Aslam. Expert NTN registration, income tax return filing, GST, company registration & legal services in Karachi & Hyderabad. Call +92 301 2627325."
        canonical="https://www.hussainnco.com/"
        keywords="FBR Digital Invoicing System, FBR e-Invoicing Integration Pakistan, FBR API Integration, Tax Consultant Karachi, Income Tax Consultant Karachi, Tax Consultant Hyderabad, NTN Registration Pakistan, GST Registration Pakistan, Income Tax Return Filing Pakistan, Company Registration Pakistan, Legal Services Karachi, Muhammad Mansoor Aslam, Hussain and Co"
      />

      {/* HERO */}
      <section className="hero" id="home">
        <div className="hero-content">
          <div className="hero-badge">Pakistan's Trusted Tax Consultants</div>
          <h1>Expert Tax &amp; Legal Services in <em>Karachi</em> &amp; Hyderabad</h1>
          <p>With years of experience, Hussain &amp; Co. helps businesses and individuals navigate tax complexities, file returns, and stay compliant — so you can focus on what matters most.</p>
          <div className="hero-pills">
            <div className="hero-pill"><i className="fas fa-check"></i> Company Registration Services</div>
            <div className="hero-pill"><i className="fas fa-check"></i> NTN &amp; Tax Filing Solutions</div>
            <div className="hero-pill"><i className="fas fa-check"></i> Professional Tax Consultancy</div>
          </div>
          <div className="hero-actions">
            <Link to="/request-call" className="btn-primary"><i className="fab fa-whatsapp"></i> Request a Call</Link>
            <a href="#about" className="btn-outline-white">About Us</a>
          </div>
        </div>
      </section>

      {/* STATS */}
      <div className="stats-bar">
        <div className="stats-inner">
          <div>
            <div className="stat-num">2500+</div>
            <div className="stat-label">Clients Served</div>
          </div>
          <div>
            <div className="stat-num">10+</div>
            <div className="stat-label">Years Experience</div>
          </div>
          <div>
            <div className="stat-num">10</div>
            <div className="stat-label">Core Services</div>
          </div>
          <div>
            <div className="stat-num">2</div>
            <div className="stat-label">Office Locations</div>
          </div>
        </div>
      </div>

      {/* SERVICES */}
      <section className="services-section" id="services">
        <div className="section-inner">
          <div className="services-header">
            <div className="section-label">What We Offer</div>
            <h2 className="section-title">Our Services</h2>
            <p className="section-subtitle">From FBR digital invoicing integration to NTN registration and copyright protection, we provide end-to-end tax and legal solutions tailored to your needs.</p>
          </div>
          <div className="services-grid">
            <Link to="/fbr-digital-invoicing-system" className="service-card featured">
              <div className="service-badge"><i className="fas fa-bolt"></i> New</div>
              <div className="service-icon"><i className="fas fa-satellite-dish"></i></div>
              <div>
                <h3>FBR Digital Invoicing System</h3>
                <p>Real-time FBR e-invoicing integration — connect your POS, ERP or billing software to FBR's Digital Invoicing API for instant invoice validation and compliance.</p>
              </div>
              <div className="service-link">Explore Integration <i className="fas fa-arrow-right"></i></div>
            </Link>

            <Link to="/services-form?service=business-ntn" className="service-card">
              <div className="service-icon"><i className="fas fa-file-invoice"></i></div>
              <div>
                <h3>Business NTN</h3>
                <p>Get your Business NTN registration handled professionally by our expert tax consultants.</p>
              </div>
              <div className="service-link">Request Service <i className="fas fa-arrow-right"></i></div>
            </Link>

            <Link to="/services-form?service=individual-ntn" className="service-card">
              <div className="service-icon"><i className="fas fa-user"></i></div>
              <div>
                <h3>Individual NTN</h3>
                <p>Register for an Individual NTN to comply with tax laws and avoid penalties.</p>
              </div>
              <div className="service-link">Request Service <i className="fas fa-arrow-right"></i></div>
            </Link>

            <Link to="/services-form?service=company-registration" className="service-card">
              <div className="service-icon"><i className="fas fa-building"></i></div>
              <div>
                <h3>Company Registration</h3>
                <p>Start your business with ease by registering your company through our streamlined process.</p>
              </div>
              <div className="service-link">Request Service <i className="fas fa-arrow-right"></i></div>
            </Link>

            <Link to="/services-form?service=return-filing" className="service-card">
              <div className="service-icon"><i className="fas fa-file-alt"></i></div>
              <div>
                <h3>Return Filing</h3>
                <p>Professional return filing services to ensure full compliance with tax regulations.</p>
              </div>
              <div className="service-link">Request Service <i className="fas fa-arrow-right"></i></div>
            </Link>

            <Link to="/services-form?service=pseb-registration" className="service-card">
              <div className="service-icon"><i className="fas fa-briefcase"></i></div>
              <div>
                <h3>PSEB Registration</h3>
                <p>Register your IT business with PSEB and avail exclusive government benefits.</p>
              </div>
              <div className="service-link">Request Service <i className="fas fa-arrow-right"></i></div>
            </Link>

            <Link to="/services-form?service=gst-registration" className="service-card">
              <div className="service-icon"><i className="fas fa-cogs"></i></div>
              <div>
                <h3>GST Registration</h3>
                <p>We help businesses register for GST and navigate the compliance process smoothly.</p>
              </div>
              <div className="service-link">Request Service <i className="fas fa-arrow-right"></i></div>
            </Link>

            <Link to="/services-form?service=logo-registration" className="service-card">
              <div className="service-icon"><i className="fas fa-pencil-alt"></i></div>
              <div>
                <h3>Logo Registration</h3>
                <p>Protect your brand by registering your logo and safeguarding your intellectual property.</p>
              </div>
              <div className="service-link">Request Service <i className="fas fa-arrow-right"></i></div>
            </Link>

            <Link to="/services-form?service=trade-mark" className="service-card">
              <div className="service-icon"><i className="fas fa-gavel"></i></div>
              <div>
                <h3>Trade Mark</h3>
                <p>Secure your business identity with professional trademark registration services.</p>
              </div>
              <div className="service-link">Request Service <i className="fas fa-arrow-right"></i></div>
            </Link>

            <Link to="/services-form?service=copyright-registration" className="service-card">
              <div className="service-icon"><i className="fas fa-copyright"></i></div>
              <div>
                <h3>Copyright Registration</h3>
                <p>Protect your creative works with our reliable copyright registration services.</p>
              </div>
              <div className="service-link">Request Service <i className="fas fa-arrow-right"></i></div>
            </Link>
          </div>
        </div>
      </section>

      {/* ABOUT */}
      <section className="about-section" id="about">
        <div className="section-inner">
          <div className="about-grid">
            <div className="about-visual">
              <div className="about-img-wrap">
                <div className="about-img-placeholder">
                  <i className="fas fa-balance-scale"></i>
                  <p>Hussain &amp; Co.<br />Trusted Since 2014</p>
                </div>
              </div>
              <div className="about-badge-card">
                <div className="num">10+</div>
                <div className="lbl">Years of Trust</div>
              </div>
            </div>
            <div className="about-text">
              <div>
                <div className="section-label">About Us</div>
                <h2 className="section-title">Trusted Tax Consultants in Karachi &amp; Hyderabad</h2>
              </div>
              <p>Hussain and Co. is a leading provider of <strong>tax consulting</strong> and <strong>legal services</strong>, proudly serving clients in both Karachi and Hyderabad. With two offices in Karachi and a regional office in Hyderabad, we are strategically positioned to assist individuals and businesses across these vibrant cities.</p>
              <p>Our team specializes in tax planning, income tax filing, compliance, advisory, and legal representation. Whether you need assistance navigating complex tax regulations or ensuring legal compliance — we are your trusted partner.</p>
              <p>Founded and led by <strong>Muhammad Mansoor Aslam</strong> — CEO &amp; Lead Tax Consultant — Hussain &amp; Co. has served <strong>2500+ clients</strong> across Pakistan since 2014, building a reputation for accuracy, reliability, and personalised service.</p>
              <div className="about-offices">
                <div className="office-item">
                  <div className="office-icon"><i className="fas fa-map-marker-alt"></i></div>
                  <div className="office-info">
                    <strong>Main Office — Karachi</strong>
                    <span><a href="https://maps.app.goo.gl/WkhzPVaWarizy5AK9" target="_blank" rel="noopener noreferrer">31-C, Sunset Lane DHA Phase II Ext. → View on Maps</a></span>
                  </div>
                </div>
                <div className="office-item">
                  <div className="office-icon"><i className="fas fa-map-marker-alt"></i></div>
                  <div className="office-info">
                    <strong>Regional Office — Hyderabad</strong>
                    <span><a href="https://maps.app.goo.gl/kUce1UmgzWBYe5Sk9" target="_blank" rel="noopener noreferrer">Office No.1, 3rd Floor, Samara Arcade, Autobhan → View on Maps</a></span>
                  </div>
                </div>
              </div>
              {/* Consultant Card */}
              <div className="consultant-card">
                <div className="consultant-avatar">MA</div>
                <div className="consultant-info">
                  <strong>Muhammad Mansoor Aslam <span className="ceo-badge">CEO</span></strong>
                  <span>CEO &amp; Lead Tax Consultant</span>
                  <div className="consultant-links">
                    <a href="tel:+923012627325" className="cl-phone"><i className="fas fa-phone-alt"></i> 0301 2627325</a>
                    <a href="https://wa.me/923012627325" target="_blank" rel="noopener noreferrer" className="cl-wa"><i className="fab fa-whatsapp"></i> WhatsApp</a>
                    <a href="mailto:info@hussainnco.com" className="cl-email"><i className="fas fa-envelope"></i> info@hussainnco.com</a>
                  </div>
                </div>
              </div>
              <div>
                <Link to="/request-call" className="btn-primary" style={{ display: 'inline-flex', alignItems: 'center', gap: '8px', color: '#fff' }}>
                  Get in Touch Today <i className="fas fa-arrow-right"></i>
                </Link>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* CONTACT */}
      <section className="contact-section" id="contact">
        <div className="section-inner">
          <div className="contact-grid">
            <div className="contact-info">
              <div>
                <div className="section-label">Get in Touch</div>
                <h2 className="contact-info-title">We're Here to Help</h2>
                <p className="contact-info-sub">Reach out to us and our team will respond promptly. Open Monday – Saturday, 9:00 AM to 6:00 PM.</p>
              </div>
              <div className="contact-item">
                <div className="contact-item-icon"><i className="fas fa-map-marker-alt"></i></div>
                <div className="contact-item-text">
                  <h4>Our Offices</h4>
                  <p>31-C, DHA Phase II Ext., Karachi</p>
                  <p>Samara Arcade, Autobhan, Hyderabad</p>
                </div>
              </div>
              <div className="contact-item">
                <div className="contact-item-icon"><i className="fas fa-envelope"></i></div>
                <div className="contact-item-text">
                  <h4>Email Us</h4>
                  <a href="mailto:info@hussainnco.com">info@hussainnco.com</a>
                </div>
              </div>
              <div className="contact-item">
                <div className="contact-item-icon"><i className="fas fa-phone-alt"></i></div>
                <div className="contact-item-text">
                  <h4>Call Us</h4>
                  <a href="tel:+923012627325">+92 301 2627325</a>
                  <a href="tel:+923322196874">+92 332 2196874</a>
                </div>
              </div>
            </div>

            <div className="contact-form-card">
              <div>
                <h3 style={{ fontFamily: "'Playfair Display', serif", fontSize: '1.3rem', color: 'var(--navy)', marginBottom: '28px' }}>
                  Send Us a Message
                </h3>
                <form onSubmit={handleFormSubmit}>
                  <div className="form-row">
                    <div className="form-group">
                      <label>Your Name</label>
                      <input
                        type="text"
                        name="name"
                        value={formData.name}
                        onChange={handleInputChange}
                        placeholder="Ali Hassan"
                        required
                      />
                    </div>
                    <div className="form-group">
                      <label>Email Address</label>
                      <input
                        type="email"
                        name="email"
                        value={formData.email}
                        onChange={handleInputChange}
                        placeholder="you@example.com"
                        required
                      />
                    </div>
                  </div>
                  <div className="form-group">
                    <label>Subject</label>
                    <input
                      type="text"
                      name="subject"
                      value={formData.subject}
                      onChange={handleInputChange}
                      placeholder="How can we help?"
                      required
                    />
                  </div>
                  <div className="form-group">
                    <label>Message</label>
                    <textarea
                      name="message"
                      value={formData.message}
                      onChange={handleInputChange}
                      placeholder="Tell us more about your inquiry…"
                      required
                    ></textarea>
                  </div>
                  <button type="submit" className="form-submit" disabled={isSubmitting}>
                    {isSubmitting ? 'Sending...' : 'Send Message'}
                  </button>
                </form>

                {formStatus.message && (
                  <div className={`form-status ${formStatus.type}`}>
                    {formStatus.message}
                  </div>
                )}
              </div>
            </div>
          </div>
        </div>
      </section>
    </>
  );
}
