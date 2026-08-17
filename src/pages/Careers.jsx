import React, { useState } from 'react';
import SEO from '../components/SEO';
import '../styles/careers.css';

export default function Careers() {
  const [formData, setFormData] = useState({
    name: '',
    email: '',
    phone: '',
    city: '',
    position: 'Tax Consultant / Associate',
    experience: '1-3 Years',
    message: ''
  });
  const [isSubmitted, setIsSubmitted] = useState(false);

  const handleInputChange = (e) => {
    setFormData({ ...formData, [e.target.name]: e.target.value });
  };

  const handleFormSubmit = (e) => {
    e.preventDefault();
    const whatsappMsg = `Hello, I would like to submit a job application for Hussain & Co.
Name: ${formData.name}
Email: ${formData.email}
Phone: ${formData.phone}
City: ${formData.city}
Position: ${formData.position}
Experience: ${formData.experience}
Message: ${formData.message}`;

    const waUrl = `https://wa.me/923322196874?text=${encodeURIComponent(whatsappMsg)}`;
    window.open(waUrl, '_blank');
    setIsSubmitted(true);
  };

  return (
    <>
      <SEO
        title="Careers at Hussain & Co. | Join Our Tax & Legal Team in Karachi"
        description="Explore career opportunities at Hussain & Co. Join our expert tax consulting and legal advisory team in Karachi and Hyderabad."
        canonical="https://www.hussainnco.com/careers"
        keywords="Careers Hussain Co, Tax Consultant Jobs Karachi, Legal Jobs Pakistan, Accounting Jobs Karachi, Tax Filing Jobs Pakistan, Hussain and Co Jobs"
      />

      {/* HERO */}
      <section className="careers-hero">
        <div className="careers-hero-inner">
          <div className="careers-hero-eyebrow">Build Your Career With Us</div>
          <h1>Join Pakistan's Trusted <em>Tax &amp; Legal</em> Team</h1>
          <p>At Hussain &amp; Co., we believe in empowering our people with deep industry expertise, continuous learning, and direct mentorship from seasoned tax professionals.</p>
          <div className="careers-hero-stats">
            <div className="careers-hero-stat">
              <div className="num">2500+</div>
              <div className="lbl">Clients Advised</div>
            </div>
            <div className="careers-hero-stat">
              <div className="num">10+</div>
              <div className="lbl">Years of Excellence</div>
            </div>
            <div className="careers-hero-stat">
              <div className="num">2</div>
              <div className="lbl">Offices (KHI &amp; HYD)</div>
            </div>
          </div>
        </div>
      </section>

      {/* WHY JOIN */}
      <section className="why-section">
        <div className="section-inner">
          <div style={{ textAlign: 'center', maxWidth: '640px', margin: '0 auto' }}>
            <div className="section-label">Why Work With Us</div>
            <h2 className="section-title">A Workplace Built for Growth</h2>
            <p className="section-subtitle">We offer a supportive environment where your contributions make a tangible impact on businesses across Pakistan.</p>
          </div>

          <div className="why-grid">
            <div className="why-card">
              <div className="why-icon"><i className="fas fa-chart-line"></i></div>
              <h3>Professional Growth</h3>
              <p>Gain hands-on exposure to corporate tax, FBR digital integrations, sales tax filings, and legal compliance.</p>
            </div>
            <div className="why-card">
              <div className="why-icon"><i className="fas fa-users"></i></div>
              <h3>Diverse Clientele</h3>
              <p>Work with emerging startups, high-net-worth individuals, Tier-1 retailers, and established corporations.</p>
            </div>
            <div className="why-card">
              <div className="why-icon"><i className="fas fa-user-graduate"></i></div>
              <h3>Direct Mentorship</h3>
              <p>Learn directly from our CEO Muhammad Mansoor Aslam and senior consultants with over a decade of domain expertise.</p>
            </div>
            <div className="why-card">
              <div className="why-icon"><i className="fas fa-balance-scale"></i></div>
              <h3>Dynamic Environment</h3>
              <p>Be part of a modern, fast-paced team at the forefront of Pakistan's digital tax transformation.</p>
            </div>
          </div>
        </div>
      </section>

      {/* OPENINGS & APPLICATION FORM */}
      <section className="apply-section" id="apply">
        <div className="section-inner">
          <div className="apply-grid">
            <div className="apply-info">
              <div>
                <div className="section-label">Join Our Talent Pool</div>
                <h2 className="apply-info-title">Send Your Application</h2>
                <p className="apply-info-sub">While specific positions may fill quickly, we are always eager to meet talented tax consultants, corporate lawyers, and accountants.</p>
              </div>

              <div className="contact-block">
                <h4>Careers Inquiries</h4>
                <div className="contact-row">
                  <i className="fas fa-envelope"></i>
                  <div className="contact-row-text">
                    <a href="mailto:info@hussainnco.com">info@hussainnco.com</a>
                  </div>
                </div>
                <div className="contact-row">
                  <i className="fab fa-whatsapp"></i>
                  <div className="contact-row-text">
                    <a href="https://wa.me/923322196874" target="_blank" rel="noopener noreferrer">+92 332 2196874</a>
                  </div>
                </div>
              </div>

              <div className="process-block">
                <h4>Hiring Process</h4>
                <div className="process-step">
                  <div className="process-num">1</div>
                  <div className="process-text">
                    <strong>Submit Profile</strong>
                    <span>Send your details via the form.</span>
                  </div>
                </div>
                <div className="process-step">
                  <div className="process-num">2</div>
                  <div className="process-text">
                    <strong>Initial Review</strong>
                    <span>Our team reviews your qualifications.</span>
                  </div>
                </div>
                <div className="process-step">
                  <div className="process-num">3</div>
                  <div className="process-text">
                    <strong>Discussion</strong>
                    <span>Shortlisted candidates are invited for an interview.</span>
                  </div>
                </div>
              </div>
            </div>

            <div className="apply-form-card">
              <h3 className="form-title">Submit Your Application</h3>
              <p className="form-subtitle">Fill in your details below to connect directly with our hiring team.</p>

              {isSubmitted ? (
                <div className="form-status success">
                  <i className="fas fa-check-circle" style={{ fontSize: '1.5rem', marginBottom: '8px', display: 'block' }}></i>
                  Application submitted! If you haven't opened WhatsApp yet, you can reach out directly via +92 332 2196874.
                </div>
              ) : (
                <form onSubmit={handleFormSubmit}>
                  <div className="form-section-title">Personal Information</div>
                  <div className="form-row">
                    <div className="form-group">
                      <label>Full Name <span className="req">*</span></label>
                      <input
                        type="text"
                        name="name"
                        value={formData.name}
                        onChange={handleInputChange}
                        placeholder="e.g. Ahmed Raza"
                        required
                      />
                    </div>
                    <div className="form-group">
                      <label>Email Address <span className="req">*</span></label>
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

                  <div className="form-row">
                    <div className="form-group">
                      <label>Contact Number <span className="req">*</span></label>
                      <input
                        type="tel"
                        name="phone"
                        value={formData.phone}
                        onChange={handleInputChange}
                        placeholder="+92 300 0000000"
                        required
                      />
                    </div>
                    <div className="form-group">
                      <label>City <span className="req">*</span></label>
                      <input
                        type="text"
                        name="city"
                        value={formData.city}
                        onChange={handleInputChange}
                        placeholder="Karachi / Hyderabad"
                        required
                      />
                    </div>
                  </div>

                  <div className="form-section-title">Professional Background</div>
                  <div className="form-row">
                    <div className="form-group">
                      <label>Position of Interest <span className="req">*</span></label>
                      <select
                        name="position"
                        value={formData.position}
                        onChange={handleInputChange}
                      >
                        <option value="Tax Consultant / Associate">Tax Consultant / Associate</option>
                        <option value="Legal & Corporate Compliance Associate">Legal &amp; Corporate Compliance Associate</option>
                        <option value="Accounts & Bookkeeping Specialist">Accounts &amp; Bookkeeping Specialist</option>
                        <option value="Client Relationship Officer">Client Relationship Officer</option>
                        <option value="Internship (Taxation / Law)">Internship (Taxation / Law)</option>
                      </select>
                    </div>
                    <div className="form-group">
                      <label>Experience Level <span className="req">*</span></label>
                      <select
                        name="experience"
                        value={formData.experience}
                        onChange={handleInputChange}
                      >
                        <option value="Fresh Graduate / Entry Level">Fresh Graduate / Entry Level</option>
                        <option value="1-3 Years">1-3 Years</option>
                        <option value="3-5 Years">3-5 Years</option>
                        <option value="5+ Years">5+ Years</option>
                      </select>
                    </div>
                  </div>

                  <div className="form-group">
                    <label>Cover Letter / Additional Information</label>
                    <textarea
                      name="message"
                      value={formData.message}
                      onChange={handleInputChange}
                      placeholder="Briefly describe your background, qualifications (CA/ACCA/LLB/B.Com), and why you want to join Hussain & Co…"
                    ></textarea>
                  </div>

                  <button type="submit" className="btn-primary" style={{ width: '100%', justifyContent: 'center' }}>
                    <i className="fab fa-whatsapp"></i> Submit via WhatsApp
                  </button>
                </form>
              )}
            </div>
          </div>
        </div>
      </section>
    </>
  );
}
