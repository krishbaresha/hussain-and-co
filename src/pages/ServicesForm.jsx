import React, { useState, useEffect } from 'react';
import { useSearchParams, Link } from 'react-router-dom';
import SEO from '../components/SEO';
import { servicesData } from '../data/servicesData';
import '../styles/services-form.css';

export default function ServicesForm() {
  const [searchParams, setSearchParams] = useSearchParams();
  const serviceKey = searchParams.get('service') || 'business-ntn';
  const currentService = servicesData[serviceKey] || servicesData['business-ntn'];

  const [formData, setFormData] = useState({});
  const [isSubmitted, setIsSubmitted] = useState(false);

  // Reset form data when service changes
  useEffect(() => {
    setFormData({});
    setIsSubmitted(false);
  }, [serviceKey]);

  const handleInputChange = (e) => {
    setFormData({ ...formData, [e.target.name]: e.target.value });
  };

  const handleFormSubmit = (e) => {
    e.preventDefault();

    let detailsString = Object.entries(formData)
      .map(([key, val]) => `${key.replace(/_/g, ' ').toUpperCase()}: ${val}`)
      .join('\n');

    const whatsappMessage = `*New Service Application: ${currentService.title}*\n\n${detailsString}`;
    const waUrl = `https://wa.me/923322196874?text=${encodeURIComponent(whatsappMessage)}`;

    window.open(waUrl, '_blank');
    setIsSubmitted(true);
  };

  return (
    <>
      <SEO
        title={`${currentService.title} – Apply Online | Hussain & Co.`}
        description={`${currentService.desc} Apply online in minutes — trusted by 2,500+ clients in Karachi & Hyderabad.`}
        canonical={`https://www.hussainnco.com/services-form?service=${serviceKey}`}
      />

      <div className="services-page-wrap">
        {/* SIDEBAR */}
        <aside className="services-sidebar">
          <div className="service-card-info">
            <div className="service-icon-wrap">
              <i className={currentService.icon}></i>
            </div>
            <h2>{currentService.title}</h2>
            <p>{currentService.desc}</p>
          </div>

          <div className="trust-card">
            <h4>Why Hussain &amp; Co.</h4>
            <div className="trust-item">
              <i className="fas fa-check-circle"></i>
              <span>2500+ Satisfied Clients</span>
            </div>
            <div className="trust-item">
              <i className="fas fa-check-circle"></i>
              <span>10+ Years Experience</span>
            </div>
            <div className="trust-item">
              <i className="fas fa-check-circle"></i>
              <span>Offices in Karachi &amp; Hyderabad</span>
            </div>
            <div className="trust-item">
              <i className="fas fa-check-circle"></i>
              <span>Fast &amp; Accurate Processing</span>
            </div>
          </div>

          <div className="other-services">
            <h4>All Services</h4>
            <ul>
              {Object.entries(servicesData).map(([key, item]) => (
                <li key={key}>
                  <Link
                    to={`/services-form?service=${key}`}
                    className={key === serviceKey ? 'active' : ''}
                  >
                    <i className={item.icon}></i>
                    <span>{item.title}</span>
                  </Link>
                </li>
              ))}
            </ul>
          </div>
        </aside>

        {/* MAIN FORM */}
        <main className="form-area">
          <div className="form-header">
            <div className="form-breadcrumb">
              <Link to="/">Home</Link>
              <i className="fas fa-chevron-right"></i>
              <Link to="/#services">Services</Link>
              <i className="fas fa-chevron-right"></i>
              <span>{currentService.title}</span>
            </div>
            <h1>Apply for {currentService.title}</h1>
            <p>Please complete the details below. Our team will review your application and contact you promptly.</p>
          </div>

          {isSubmitted ? (
            <div className="services-success-overlay">
              <div className="services-success-icon">
                <i className="fas fa-check"></i>
              </div>
              <h2>Application Submitted!</h2>
              <p>Thank you for submitting your request for <strong>{currentService.title}</strong>. If your WhatsApp did not open automatically, click the button below to connect with us immediately.</p>
              <a
                href="https://wa.me/923322196874"
                target="_blank"
                rel="noopener noreferrer"
                className="btn-wa-service"
              >
                <i className="fab fa-whatsapp"></i> Chat with Us on WhatsApp
              </a>
              <button
                type="button"
                className="btn-reset-service"
                onClick={() => setIsSubmitted(false)}
              >
                Submit Another Request
              </button>
            </div>
          ) : (
            <form onSubmit={handleFormSubmit}>
              <div className="services-form-grid">
                {currentService.fields.map((field) => (
                  <div
                    key={field.name}
                    className={`services-form-group ${field.type === 'textarea' ? 'full' : ''}`}
                  >
                    <label>
                      {field.label} {field.required && <span className="required-star">*</span>}
                    </label>
                    {field.type === 'textarea' ? (
                      <textarea
                        name={field.name}
                        placeholder={field.placeholder}
                        required={field.required}
                        value={formData[field.name] || ''}
                        onChange={handleInputChange}
                      ></textarea>
                    ) : (
                      <input
                        type={field.type}
                        name={field.name}
                        placeholder={field.placeholder}
                        required={field.required}
                        value={formData[field.name] || ''}
                        onChange={handleInputChange}
                      />
                    )}
                  </div>
                ))}
              </div>

              <div className="services-form-footer">
                <div className="services-form-note">
                  <i className="fas fa-lock"></i> Your information is kept completely confidential.
                </div>
                <button type="submit" className="btn-services-submit">
                  <i className="fab fa-whatsapp"></i> Submit Request
                </button>
              </div>
            </form>
          )}
        </main>
      </div>
    </>
  );
}
