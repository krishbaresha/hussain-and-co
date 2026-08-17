import React from 'react';
import { Link } from 'react-router-dom';
import SEO from '../components/SEO';

export default function NotFound() {
  return (
    <>
      <SEO title="404 - Page Not Found | Hussain & Co." />
      <div style={{
        minHeight: '70vh',
        display: 'flex',
        alignItems: 'center',
        justifyContent: 'center',
        padding: '60px 24px',
        textAlign: 'center'
      }}>
        <div style={{
          maxWidth: '560px',
          padding: '48px 36px',
          background: 'var(--white)',
          borderRadius: 'var(--radius)',
          border: '1px solid var(--border)',
          boxShadow: 'var(--shadow-md)'
        }}>
          <div style={{
            fontFamily: "'Playfair Display', serif",
            fontSize: '5rem',
            fontWeight: 900,
            color: 'var(--navy)',
            lineHeight: 1
          }}>404</div>
          <h1 style={{
            fontSize: '1.5rem',
            fontWeight: 700,
            color: 'var(--navy)',
            margin: '16px 0 8px'
          }}>Oops! Page Not Found</h1>
          <p style={{
            fontSize: '0.95rem',
            color: 'var(--text-mid)',
            lineHeight: 1.7,
            marginBottom: '28px'
          }}>
            It seems the page you are looking for does not exist or has been moved. Please check the URL or return to our homepage.
          </p>
          <Link to="/" className="btn-primary" style={{ display: 'inline-flex' }}>
            <i className="fas fa-home"></i> Return Home
          </Link>
        </div>
      </div>
    </>
  );
}
