# Hussain & Co. — Tax Consultants & Legal Services

Official website of **Hussain & Co.**, Pakistan's trusted tax consulting and legal services firm led by **Muhammad Mansoor Aslam** (CEO & Lead Tax Consultant) with offices in Karachi and Hyderabad.

Built as a modern, high-performance, 100% static **React (Vite) Single Page Application** designed for zero-cost deployment on **Vercel**.

---

## 🌟 Key Features

- **🚀 Ultra-Fast Single Page App (SPA)**: Zero-reload client-side routing powered by React Router.
- **🎨 100% Pixel-Perfect Design**: Custom CSS design system with typography, color tokens, and smooth micro-interactions.
- **💼 FBR Digital Invoicing System**: Dedicated interactive landing page with SVG real-time flow diagram and FAQ accordion.
- **📝 Dynamic Multi-Service Registration**: Dynamic form handling 10+ distinct tax, GST, NTN, and corporate legal services (`/services-form?service=...`).
- **📱 Instant WhatsApp Consultation**: One-click consultation request form connecting directly to official WhatsApp support (`/request-call`).
- **📰 Tax & Legal Insights (Blogs)**: Comprehensive guide articles with author badges and dynamic breadcrumbs.
- **💼 Careers Portal**: Job opportunity highlights and application submission.
- **🔗 Backward Compatibility**: Fully supports legacy `.php` and `.html` URL endpoints (e.g., `/services-form.php?service=individual-ntn`) with zero 404 errors.
- **🌐 SEO & Schema.org**: JSON-LD Structured Data, Open Graph tags, Twitter cards, and dynamic meta management.

---

## 🛠️ Tech Stack

- **Frontend**: React 18
- **Bundler & Dev Server**: Vite 5
- **Routing**: React Router v6
- **Styling**: Vanilla CSS (Custom Design Tokens)
- **Deployment**: Vercel (Configured with `vercel.json` SPA rewrites)
- **Icons**: FontAwesome 6
- **Typography**: Google Fonts (Playfair Display & DM Sans)

---

## 📁 Project Structure

```
hussain-and-co/
├── public/                    # Static assets (images, logos, robots.txt, sitemap)
│   ├── images/
│   ├── uploads/
│   ├── robots.txt
│   └── sitemap_index.xml
├── src/
│   ├── components/            # Reusable UI components
│   │   ├── Navbar.jsx
│   │   ├── Footer.jsx
│   │   ├── FloatingWhatsApp.jsx
│   │   └── SEO.jsx
│   ├── data/                  # Static datasets
│   │   ├── servicesData.js    # 10 Services configuration & form fields
│   │   └── blogData.js        # Blog posts & content
│   ├── pages/                 # Route pages
│   │   ├── Home.jsx
│   │   ├── Careers.jsx
│   │   ├── FBRInvoicing.jsx
│   │   ├── ServicesForm.jsx
│   │   ├── RequestCall.jsx
│   │   ├── Blogs.jsx
│   │   ├── BlogPost.jsx
│   │   └── NotFound.jsx
│   ├── styles/                # CSS Stylesheets
│   │   ├── globals.css
│   │   ├── home.css
│   │   ├── careers.css
│   │   ├── fbr.css
│   │   ├── services-form.css
│   │   ├── request-call.css
│   │   └── blogs.css
│   ├── App.jsx                # Router & App root
│   └── main.jsx               # React entrypoint
├── index.html                 # Vite HTML template
├── package.json
├── vite.config.js             # Vite configuration
└── vercel.json                # Vercel SPA rewrite rules
```

---

## 🚀 Getting Started

### Prerequisites
- Node.js (v18 or higher)
- npm or yarn

### Installation
1. Clone the repository:
   ```bash
   git clone https://github.com/krishbaresha/hussain-and-co.git
   cd hussain-and-co
   ```

2. Install dependencies:
   ```bash
   npm install
   ```

3. Start development server:
   ```bash
   npm run dev
   ```
   Open `http://localhost:3333` in your browser.

4. Build for production:
   ```bash
   npm run build
   ```

---

## 🌐 Deploy to Vercel

1. Import this repository into [Vercel](https://vercel.com).
2. Framework Preset: **Vite** (Auto-detected).
3. Click **Deploy**.
4. Configure your custom domain in **Project Settings > Domains**.

---

## 📄 License & Ownership
Copyright © Hussain & Co. All rights reserved.
