import React from 'react';
import { Link } from 'react-router-dom';
import SEO from '../components/SEO';
import { blogPosts } from '../data/blogData';
import '../styles/blogs.css';

export default function Blogs() {
  return (
    <>
      <SEO
        title="Blogs | Hussain & Co."
        description="Read insightful blog posts from Hussain & Co. on tax consulting, tax filing, and expert tips to help you navigate the world of taxation in Pakistan."
        canonical="https://www.hussainnco.com/blogs"
        keywords="Hussain & Co., Tax Consultant, Tax Filing, Tax Tips, Tax Services, Taxation Pakistan"
      />

      {/* HERO */}
      <section className="blog-hero">
        <div className="section-inner">
          <div className="hero-badge"><i className="fas fa-newspaper" style={{ fontSize: '0.7rem' }}></i> From Our Consultants</div>
          <h1>Tax &amp; Legal <em>Insights</em></h1>
          <p>Practical guides on tax filing, FBR compliance, and legal registration in Pakistan — written by the Hussain &amp; Co. team.</p>
        </div>
      </section>

      {/* LISTING */}
      <section className="blog-listing">
        <div className="section-inner">
          <div className="section-label">Latest Articles</div>
          <h2 className="section-title">Blog Posts</h2>
          <div className="post-grid">
            {blogPosts.map((post) => (
              <Link to={`/blogs/posts/${post.slug}`} key={post.id} className="post-card">
                <img src={post.thumbnail || post.image} alt={post.title} />
                <div className="content">
                  <div className="date">{post.date}</div>
                  <h2>{post.title}</h2>
                  <p className="excerpt">{post.excerpt}</p>
                  <span className="btn-emerald">Read Full Article <i className="fas fa-arrow-right"></i></span>
                </div>
              </Link>
            ))}
          </div>
        </div>
      </section>
    </>
  );
}
