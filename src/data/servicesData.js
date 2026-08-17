export const servicesData = {
  'fbr-digital-invoicing': {
    title: 'FBR Digital Invoicing System Integration',
    icon: 'fas fa-satellite-dish',
    desc: "Connect your POS, ERP or billing software to FBR's Digital Invoicing system for real-time, API-validated e-invoicing.",
    fields: [
      { label: 'Business Name', type: 'text', name: 'business_name', placeholder: 'e.g. Al-Noor Traders', required: true },
      { label: 'NTN / STRN', type: 'text', name: 'ntn_strn', placeholder: 'e.g. 1234567-8', required: true },
      { label: 'Business Sector', type: 'text', name: 'business_sector', placeholder: 'e.g. Retail, Restaurant, Manufacturing, Wholesale', required: true },
      { label: 'Current POS / ERP / Billing Software', type: 'text', name: 'current_system', placeholder: 'e.g. QuickBooks, custom POS, none yet', required: false },
      { label: 'Contact Number', type: 'tel', name: 'contact_number', placeholder: '+92 300 0000000', required: true },
      { label: 'Email Address', type: 'email', name: 'email', placeholder: 'you@example.com', required: true },
    ]
  },
  'business-ntn': {
    title: 'Business NTN Registration',
    icon: 'fas fa-file-invoice',
    desc: 'Get your Business NTN registered quickly and correctly by our expert consultants.',
    fields: [
      { label: 'Business Name', type: 'text', name: 'business_name', placeholder: 'e.g. Al-Noor Traders', required: true },
      { label: 'Owner Name', type: 'text', name: 'owner_name', placeholder: 'e.g. Ahmed Ali', required: true },
      { label: 'Contact Number', type: 'tel', name: 'contact_number', placeholder: '+92 300 0000000', required: true },
      { label: 'Email Address', type: 'email', name: 'email', placeholder: 'you@example.com', required: false },
    ]
  },
  'individual-ntn': {
    title: 'Individual NTN Registration',
    icon: 'fas fa-user',
    desc: 'Register for your Individual NTN to comply with tax laws and build financial credibility.',
    fields: [
      { label: 'Full Name', type: 'text', name: 'full_name', placeholder: 'e.g. Sara Khan', required: true },
      { label: 'CNIC Number', type: 'text', name: 'cnic', placeholder: '42201-1234567-8', required: true },
      { label: 'Contact Number', type: 'tel', name: 'contact_number', placeholder: '+92 300 0000000', required: true },
      { label: 'Email Address', type: 'email', name: 'email', placeholder: 'you@example.com', required: true },
    ]
  },
  'company-registration': {
    title: 'Company Registration',
    icon: 'fas fa-building',
    desc: 'Start your business the right way with our streamlined company registration process.',
    fields: [
      { label: 'Company Name', type: 'text', name: 'company_name', placeholder: 'e.g. TechVentures Pvt. Ltd.', required: true },
      { label: 'Business Type', type: 'text', name: 'business_type', placeholder: 'e.g. Private Limited, Sole Proprietor', required: true },
      { label: 'Contact Number', type: 'tel', name: 'contact_number', placeholder: '+92 300 0000000', required: true },
      { label: 'Email Address', type: 'email', name: 'email', placeholder: 'you@example.com', required: true },
    ]
  },
  'return-filing': {
    title: 'Tax Return Filing',
    icon: 'fas fa-file-alt',
    desc: 'Professional and accurate tax return filing to ensure full regulatory compliance.',
    fields: [
      { label: 'Taxpayer Name', type: 'text', name: 'taxpayer_name', placeholder: 'e.g. Omar Farooq', required: true },
      { label: 'Tax Year', type: 'number', name: 'tax_year', placeholder: 'e.g. 2024', required: true },
      { label: 'CNIC / NTN', type: 'text', name: 'cnic_ntn', placeholder: '42201-1234567-8 or NTN', required: true },
      { label: 'Contact Number', type: 'tel', name: 'contact_number', placeholder: '+92 300 0000000', required: true },
    ]
  },
  'gst-registration': {
    title: 'GST Registration',
    icon: 'fas fa-cogs',
    desc: 'Get your business registered for GST and navigate the compliance process with ease.',
    fields: [
      { label: 'Business Name', type: 'text', name: 'business_name', placeholder: 'e.g. Al-Noor Traders', required: true },
      { label: 'Owner Name', type: 'text', name: 'owner_name', placeholder: 'e.g. Ahmed Ali', required: true },
      { label: 'Contact Number', type: 'tel', name: 'contact_number', placeholder: '+92 300 0000000', required: true },
      { label: 'Email Address', type: 'email', name: 'email', placeholder: 'you@example.com', required: true },
    ]
  },
  'logo-registration': {
    title: 'Logo Registration',
    icon: 'fas fa-pencil-alt',
    desc: 'Protect your brand identity with official logo registration.',
    fields: [
      { label: 'Business Name', type: 'text', name: 'business_name', placeholder: 'e.g. My Brand Co.', required: true },
      { label: 'Logo Description', type: 'textarea', name: 'logo_description', placeholder: 'Briefly describe your logo design…', required: true },
      { label: 'Contact Number', type: 'tel', name: 'contact_number', placeholder: '+92 300 0000000', required: true },
      { label: 'Email Address', type: 'email', name: 'email', placeholder: 'you@example.com', required: true },
    ]
  },
  'pseb-registration': {
    title: 'PSEB Registration',
    icon: 'fas fa-briefcase',
    desc: 'Register your IT business with PSEB and access exclusive government benefits.',
    fields: [
      { label: 'Business Name', type: 'text', name: 'business_name', placeholder: 'e.g. CodeCraft Studio', required: true },
      { label: 'PSEB Category', type: 'text', name: 'pseb_category', placeholder: 'e.g. Software, BPO, IT Services', required: true },
      { label: 'Contact Number', type: 'tel', name: 'contact_number', placeholder: '+92 300 0000000', required: true },
      { label: 'Email Address', type: 'email', name: 'email', placeholder: 'you@example.com', required: true },
    ]
  },
  'copyright-registration': {
    title: 'Copyright Registration',
    icon: 'fas fa-copyright',
    desc: 'Protect your creative works with official copyright registration services.',
    fields: [
      { label: 'Work Title', type: 'text', name: 'work_title', placeholder: 'e.g. My Novel / Software App', required: true },
      { label: 'Author Name', type: 'text', name: 'author_name', placeholder: 'e.g. Fatima Malik', required: true },
      { label: 'Contact Number', type: 'tel', name: 'contact_number', placeholder: '+92 300 0000000', required: true },
      { label: 'Email Address', type: 'email', name: 'email', placeholder: 'you@example.com', required: true },
    ]
  },
  'trade-mark': {
    title: 'Trade Mark Registration',
    icon: 'fas fa-gavel',
    desc: 'Secure your business identity with professional trademark registration.',
    fields: [
      { label: 'Business Name', type: 'text', name: 'business_name', placeholder: 'e.g. My Brand Co.', required: true },
      { label: 'Trademark Description', type: 'textarea', name: 'trademark_description', placeholder: 'Describe the trademark you wish to register…', required: true },
      { label: 'Contact Number', type: 'tel', name: 'contact_number', placeholder: '+92 300 0000000', required: true },
      { label: 'Email Address', type: 'email', name: 'email', placeholder: 'you@example.com', required: true },
    ]
  }
};
