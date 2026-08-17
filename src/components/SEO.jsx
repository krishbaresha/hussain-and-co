import { useEffect } from 'react';

export default function SEO({ title, description, canonical, keywords }) {
  useEffect(() => {
    if (title) {
      document.title = title;
    }
    if (description) {
      let metaDesc = document.querySelector('meta[name="description"]');
      if (!metaDesc) {
        metaDesc = document.createElement('meta');
        metaDesc.name = 'description';
        document.head.appendChild(metaDesc);
      }
      metaDesc.content = description;
    }
    if (keywords) {
      let metaKw = document.querySelector('meta[name="keywords"]');
      if (!metaKw) {
        metaKw = document.createElement('meta');
        metaKw.name = 'keywords';
        document.head.appendChild(metaKw);
      }
      metaKw.content = keywords;
    }
    if (canonical) {
      let linkCan = document.querySelector('link[rel="canonical"]');
      if (!linkCan) {
        linkCan = document.createElement('link');
        linkCan.rel = 'canonical';
        document.head.appendChild(linkCan);
      }
      linkCan.href = canonical;
    }
  }, [title, description, canonical, keywords]);

  return null;
}
