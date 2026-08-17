import React, { useEffect } from 'react';
import { BrowserRouter as Router, Routes, Route, useLocation } from 'react-router-dom';
import Navbar from './components/Navbar';
import Footer from './components/Footer';
import FloatingWhatsApp from './components/FloatingWhatsApp';
import Home from './pages/Home';
import Careers from './pages/Careers';
import FBRInvoicing from './pages/FBRInvoicing';
import ServicesForm from './pages/ServicesForm';
import RequestCall from './pages/RequestCall';
import Blogs from './pages/Blogs';
import BlogPost from './pages/BlogPost';
import NotFound from './pages/NotFound';

function ScrollToTop() {
  const { pathname, search, hash } = useLocation();

  useEffect(() => {
    if (hash) {
      setTimeout(() => {
        const element = document.querySelector(hash);
        if (element) {
          element.scrollIntoView({ behavior: 'smooth' });
        }
      }, 60);
    } else {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }
  }, [pathname, search, hash]);

  return null;
}

export default function App() {
  return (
    <Router>
      <ScrollToTop />
      <Navbar />
      <Routes>
        <Route path="/" element={<Home />} />
        <Route path="/index.html" element={<Home />} />
        <Route path="/index.php" element={<Home />} />
        <Route path="/careers" element={<Careers />} />
        <Route path="/careers.html" element={<Careers />} />
        <Route path="/fbr-digital-invoicing-system" element={<FBRInvoicing />} />
        <Route path="/fbr-digital-invoicing-system.html" element={<FBRInvoicing />} />
        <Route path="/services-form" element={<ServicesForm />} />
        <Route path="/services-form.php" element={<ServicesForm />} />
        <Route path="/request-call" element={<RequestCall />} />
        <Route path="/request-call.php" element={<RequestCall />} />
        <Route path="/blogs" element={<Blogs />} />
        <Route path="/blogs/blogs.html" element={<Blogs />} />
        <Route path="/blogs/posts/:slug" element={<BlogPost />} />
        <Route path="*" element={<NotFound />} />
      </Routes>
      <Footer />
      <FloatingWhatsApp />
    </Router>
  );
}
