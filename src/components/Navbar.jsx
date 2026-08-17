import React, { useState, useEffect } from 'react';
import { Link, useLocation } from 'react-router-dom';

export default function Navbar() {
  const [isOpen, setIsOpen] = useState(false);
  const [isScrolled, setIsScrolled] = useState(false);
  const location = useLocation();

  useEffect(() => {
    const handleScroll = () => {
      setIsScrolled(window.scrollY > 20);
    };
    window.addEventListener('scroll', handleScroll);
    return () => window.removeEventListener('scroll', handleScroll);
  }, []);

  // Close mobile nav on route change
  useEffect(() => {
    setIsOpen(false);
  }, [location.pathname]);

  return (
    <>
      <header className={`site-header ${isScrolled ? 'scrolled' : ''}`}>
        <div className="header-inner">
          <Link className="logo-wrap" to="/">
            <img src="/images/hussain-and-cologo.svg" alt="Hussain & Co. Logo" />
          </Link>
          <nav className="main-nav">
            <Link to="/" className={location.pathname === '/' && !location.hash ? 'active' : ''}>Home</Link>
            <Link to="/#services">Services</Link>
            <Link to="/#about">About</Link>
            <Link to="/#contact">Contact</Link>
            <Link to="/blogs" className={location.pathname.startsWith('/blogs') ? 'active' : ''}>Blogs</Link>
            <Link to="/careers" className={location.pathname === '/careers' ? 'active' : ''}>Careers</Link>
            <Link to="/request-call" className="nav-cta">Request a Call</Link>
          </nav>
          <button
            className={`hamburger ${isOpen ? 'open' : ''}`}
            onClick={() => setIsOpen(!isOpen)}
            aria-label="Menu"
          >
            <span></span>
            <span></span>
            <span></span>
          </button>
        </div>
      </header>

      <div className={`mobile-nav ${isOpen ? 'open' : ''}`}>
        <Link to="/" onClick={() => setIsOpen(false)}>Home</Link>
        <Link to="/#services" onClick={() => setIsOpen(false)}>Services</Link>
        <Link to="/#about" onClick={() => setIsOpen(false)}>About Us</Link>
        <Link to="/#contact" onClick={() => setIsOpen(false)}>Contact</Link>
        <Link to="/blogs" onClick={() => setIsOpen(false)}>Blogs</Link>
        <Link to="/careers" onClick={() => setIsOpen(false)}>Careers</Link>
        <Link to="/request-call" className="nav-cta" onClick={() => setIsOpen(false)}>Request a Call</Link>
      </div>
    </>
  );
}
