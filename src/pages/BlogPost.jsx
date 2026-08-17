import React from 'react';
import { useParams, Link, Navigate } from 'react-router-dom';
import SEO from '../components/SEO';
import { blogPosts } from '../data/blogData';
import '../styles/blogs.css';

export default function BlogPost() {
  const { slug } = useParams();
  const post = blogPosts.find((p) => p.slug === slug);

  if (!post) {
    return <Navigate to="/blogs" replace />;
  }

  return (
    <>
      <SEO
        title={`${post.title} | Hussain & Co.`}
        description={post.excerpt}
        canonical={`https://www.hussainnco.com/blogs/posts/${post.slug}`}
      />

      {/* BREADCRUMB */}
      <div className="breadcrumb-bar">
        <div className="section-inner">
          <div className="breadcrumb-list">
            <Link to="/">Home</Link>
            <i className="fas fa-chevron-right" style={{ fontSize: '0.6rem' }}></i>
            <Link to="/blogs">Blogs</Link>
            <i className="fas fa-chevron-right" style={{ fontSize: '0.6rem' }}></i>
            <span className="current">{post.title}</span>
          </div>
        </div>
      </div>

      <article className="single-post">
        <h1>{post.title}</h1>
        <p className="date">Published on {post.date}</p>

        {post.image && (
          <div className="single-post-image-container">
            <img src={post.image} alt={post.title} />
          </div>
        )}

        <div
          className="single-post-content"
          dangerouslySetInnerHTML={{ __html: post.content }}
        />

        <div className="single-post-author-strip">
          <div className="single-post-author-avatar">MA</div>
          <div>
            <div style={{ fontWeight: 600, color: 'var(--navy)', fontSize: '0.92rem' }}>
              {post.author} — {post.authorRole}
            </div>
            <div style={{ fontSize: '0.8rem', color: 'var(--text-light)' }}>
              10+ years in Pakistani tax &amp; compliance
            </div>
          </div>
        </div>
      </article>
    </>
  );
}
