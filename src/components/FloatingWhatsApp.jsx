import React, { useState, useEffect } from 'react';

export default function FloatingWhatsApp() {
  const [showTop, setShowTop] = useState(false);

  useEffect(() => {
    const handleScroll = () => {
      setShowTop(window.scrollY > 300);
    };
    window.addEventListener('scroll', handleScroll);
    return () => window.removeEventListener('scroll', handleScroll);
  }, []);

  const scrollToTop = () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  };

  return (
    <>
      <a
        className="wa-float"
        href="https://wa.me/923322196874"
        target="_blank"
        rel="noopener noreferrer"
        aria-label="Chat on WhatsApp"
      >
        <i className="fab fa-whatsapp"></i>
        <span>Chat on WhatsApp</span>
      </a>

      <button
        id="goToTop"
        className={showTop ? 'show' : ''}
        onClick={scrollToTop}
        aria-label="Go to top"
      >
        <i className="fas fa-arrow-up"></i>
      </button>
    </>
  );
}
