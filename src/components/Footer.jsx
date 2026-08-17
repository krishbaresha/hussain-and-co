import React from 'react';
import { Link } from 'react-router-dom';

export default function Footer() {
  const currentYear = new Date().getFullYear();

  return (
    <footer className="site-footer-full">
      <div className="footer-inner">
        <div className="footer-brand">
          <img
            src="/images/hussain-and-cologo.svg"
            alt="Hussain & Co."
            style={{ height: '44px', width: 'auto', filter: 'brightness(0) invert(1)', opacity: 0.9, marginBottom: '14px', display: 'block' }}
          />
          <p>Professional tax consulting and legal services in Karachi and Hyderabad, Pakistan.</p>
          <div className="footer-social" style={{ marginTop: '20px' }}>
            <a href="https://www.facebook.com/hussainnco" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
              <i className="fab fa-facebook-f"></i>
            </a>
            <a href="https://www.linkedin.com/company/hussainnco/" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
              <i className="fab fa-linkedin-in"></i>
            </a>
            <a href="https://www.instagram.com/hussainnco" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
              <i className="fab fa-instagram"></i>
            </a>
            <a href="https://wa.me/923322196874" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp">
              <i className="fab fa-whatsapp"></i>
            </a>
          </div>
        </div>

        <div className="footer-links">
          <h4>Services</h4>
          <ul>
            <li><Link to="/fbr-digital-invoicing-system">FBR Digital Invoicing</Link></li>
            <li><Link to="/services-form?service=business-ntn">Business NTN</Link></li>
            <li><Link to="/services-form?service=individual-ntn">Individual NTN</Link></li>
            <li><Link to="/services-form?service=return-filing">Return Filing</Link></li>
            <li><Link to="/services-form?service=gst-registration">GST Registration</Link></li>
            <li><Link to="/services-form?service=company-registration">Company Registration</Link></li>
          </ul>
        </div>

        <div className="footer-links">
          <h4>Company</h4>
          <ul>
            <li><Link to="/#about">About Us</Link></li>
            <li><Link to="/#contact">Contact</Link></li>
            <li><Link to="/blogs">Blogs</Link></li>
            <li><Link to="/careers">Careers</Link></li>
            <li><Link to="/request-call">Request a Call</Link></li>
          </ul>
        </div>

        <div className="footer-links">
          <h4>Contact</h4>
          <ul>
            <li><a href="mailto:info@hussainnco.com">info@hussainnco.com</a></li>
            <li><a href="tel:+923012627325">+92 301 2627325</a></li>
            <li><a href="tel:+923322196874">+92 332 2196874</a></li>
          </ul>
        </div>
      </div>

      <div className="footer-bottom">
        <span>&copy; {currentYear} Hussain and Co. All rights reserved.</span>
        <span>Tax &amp; Legal Experts, Pakistan</span>
      </div>
    </footer>
  );
}
