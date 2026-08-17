import React, { useState } from 'react';
import { Link } from 'react-router-dom';
import SEO from '../components/SEO';
import '../styles/request-call.css';

export default function RequestCall() {
  const [fullName, setFullName] = useState('');
  const [cnic, setCnic] = useState('');
  const [service, setService] = useState('Income Tax Return Filing');
  const [isSubmitted, setIsSubmitted] = useState(false);

  const handleSubmit = (e) => {
    e.preventDefault();
    const cnicText = cnic.trim() ? cnic : 'Not Provided';
    const message = `Hello, I am ${fullName}. My CNIC is ${cnicText}. I am interested in the ${service} service. Could you please provide more details?`;
    const whatsappUrl = `https://wa.me/923322196874?text=${encodeURIComponent(message)}`;
    
    window.open(whatsappUrl, '_blank');
    setIsSubmitted(true);
  };

  return (
    <>
      <SEO
        title="Request a Call – Hussain & Co."
        description="Fill out the form to request a WhatsApp call with Hussain & Co. for expert tax consulting, tax filing, legal advisory, and more services."
        canonical="https://www.hussainnco.com/request-call"
      />

      <div className="rc-page-wrap">
        <div className="rc-page-grid">
          {/* LEFT PANEL */}
          <div className="rc-left-panel">
            <div>
              <div className="rc-panel-label">Free Consultation</div>
              <h1 className="rc-panel-title">Request a <em>WhatsApp</em> Call</h1>
              <p className="rc-panel-desc">Fill in the quick form and we'll connect with you on WhatsApp to discuss your needs — no obligations.</p>
            </div>

            <div className="rc-panel-steps">
              <div className="rc-step">
                <div className="rc-step-num">1</div>
                <div className="rc-step-text">
                  <strong>Fill the form</strong>
                  <span>Provide your name and required service.</span>
                </div>
              </div>
              <div className="rc-step">
                <div className="rc-step-num">2</div>
                <div className="rc-step-text">
                  <strong>Connect on WhatsApp</strong>
                  <span>You'll be directed to our official WhatsApp chat.</span>
                </div>
              </div>
              <div className="rc-step">
                <div className="rc-step-num">3</div>
                <div className="rc-step-text">
                  <strong>Get expert advice</strong>
                  <span>Our consultant answers your questions and guides you.</span>
                </div>
              </div>
            </div>

            <div className="rc-panel-contact">
              <div className="rc-panel-contact-item">
                <i className="fas fa-phone-alt"></i>
                <a href="tel:+923012627325">+92 301 2627325</a>
              </div>
              <div className="rc-panel-contact-item">
                <i className="fas fa-envelope"></i>
                <a href="mailto:info@hussainnco.com">info@hussainnco.com</a>
              </div>
            </div>
          </div>

          {/* RIGHT PANEL */}
          <div className="rc-right-panel">
            {isSubmitted ? (
              <div className="rc-success-state">
                <div className="rc-success-icon">
                  <i className="fas fa-check"></i>
                </div>
                <h2>Request Initiated!</h2>
                <p>We're ready to assist you. If your WhatsApp window didn't open automatically, click the button below:</p>

                <div className="rc-detail-card">
                  <div className="rc-detail-row">
                    <span>Name</span>
                    <span>{fullName}</span>
                  </div>
                  <div className="rc-detail-row">
                    <span>Service</span>
                    <span>{service}</span>
                  </div>
                </div>

                <a
                  href={`https://wa.me/923322196874?text=${encodeURIComponent(`Hello, I am ${fullName}. I am interested in ${service}.`)}`}
                  target="_blank"
                  rel="noopener noreferrer"
                  className="btn-rc-wa"
                >
                  <i className="fab fa-whatsapp"></i> Open WhatsApp Chat
                </a>

                <button
                  type="button"
                  className="btn-rc-reset"
                  onClick={() => setIsSubmitted(false)}
                >
                  Submit Another Request
                </button>
              </div>
            ) : (
              <>
                <h2 className="rc-form-heading">Your Details</h2>
                <p className="rc-form-subheading">Takes less than a minute. No spam, guaranteed.</p>

                <form onSubmit={handleSubmit}>
                  <div className="rc-form-group">
                    <label>Full Name *</label>
                    <input
                      type="text"
                      required
                      placeholder="e.g. Muhammad Ali"
                      value={fullName}
                      onChange={(e) => setFullName(e.target.value)}
                    />
                  </div>

                  <div className="rc-form-group">
                    <label>CNIC Number (Optional)</label>
                    <input
                      type="text"
                      placeholder="42101-XXXXXXX-X"
                      value={cnic}
                      onChange={(e) => setCnic(e.target.value)}
                    />
                    <div className="rc-form-hint">Helps us look up your tax profile in advance.</div>
                  </div>

                  <div className="rc-form-group">
                    <label>Service Needed *</label>
                    <div className="rc-select-wrap">
                      <select
                        required
                        value={service}
                        onChange={(e) => setService(e.target.value)}
                      >
                        <option value="Income Tax Return Filing">Income Tax Return Filing</option>
                        <option value="Business NTN Registration">Business NTN Registration</option>
                        <option value="Individual NTN Registration">Individual NTN Registration</option>
                        <option value="GST Registration & Filing">GST Registration &amp; Filing</option>
                        <option value="Company Registration">Company Registration</option>
                        <option value="PSEB Registration">PSEB Registration</option>
                        <option value="Trademark & Copyright">Trademark &amp; Copyright</option>
                        <option value="FBR Digital Invoicing Integration">FBR Digital Invoicing Integration</option>
                        <option value="Other Legal/Tax Advisory">Other Legal / Tax Advisory</option>
                      </select>
                    </div>
                  </div>

                  <button type="submit" className="btn-rc-submit">
                    <i className="fab fa-whatsapp"></i> Request Call on WhatsApp
                  </button>
                </form>
              </>
            )}
          </div>
        </div>
      </div>
    </>
  );
}
