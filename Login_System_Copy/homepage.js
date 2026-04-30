// ITI Kubernagar Website JavaScript

// ─── APPLICATION DATA ─────────────────────────────────────────────────────────
const applicationData = {
    courses: {
        engineering: [
            { name: "Electrician", duration: "2 Years", description: "Master electrical wiring, installation, and maintenance for industrial and domestic systems.", icon: "fas fa-bolt" },
            { name: "Fitter", duration: "2 Years", description: "Learn precision fitting, assembly, and machinery maintenance skills.", icon: "fas fa-tools" },
            { name: "Turner", duration: "2 Years", description: "Specialized training in lathe machine operations and metal turning.", icon: "fas fa-cogs" },
            { name: "Welder", duration: "2 Years", description: "Comprehensive welding techniques for various metals and industrial applications.", icon: "fas fa-fire" },
            { name: "Mechanic Refrigeration & Air-Conditioner (RAC)", duration: "2 Years", description: "Trains students in installation, servicing, and repair of refrigeration and air-conditioning systems.", icon: "fas fa-snowflake" },
            { name: "Mechanic Diesel", duration: "1 Year", description: "Focuses on maintenance and repair of diesel engines and vehicles.", icon: "fas fa-truck" },
            { name: "Mechanic Motor Vehicle", duration: "2 Years", description: "Teaches automobile repair, servicing, and maintenance skills.", icon: "fas fa-car" },
            { name: "Draughtsman Civil", duration: "2 Years", description: "Technical drawing and design for civil engineering projects.", icon: "fas fa-drafting-compass" },
            { name: "Draughtsman Mechanical", duration: "2 Years", description: "Mechanical design, CAD, and technical documentation skills.", icon: "fas fa-pencil-ruler" }
        ],
        non_engineering: [
            {
                name: "COPA (Computer Operator & Programming Assistant)",
                duration: "1 Year",
                description: "Learn computer operations, programming basics, and office automation.",
                icon: "fas fa-desktop"
            },
            {
                name: "Data Entry Operator",
                duration: "1 Year",
                description: "Professional data management, typing, MS Office, and computer operations for corporate and government sectors.",
                icon: "fas fa-keyboard"
            },
            {
                name: "Desktop Publishing Operator",
                duration: "1 Year",
                description: "Master graphic design, page layout, digital printing, and Adobe Creative Suite for publishing and media careers.",
                icon: "fas fa-palette"
            },
            {
                name: "Dress Making",
                duration: "1 Year",
                description: "Fabric knowledge, pattern making, stitching, and garment construction skills for fashion and textile industry careers.",
                icon: "fas fa-cut"
            },
            {
                name: "Fashion Design & Technology",
                duration: "2 Years",
                description: "Fashion illustration, apparel design, textile knowledge, and garment technology for the fashion industry.",
                icon: "fas fa-tshirt"
            },
            {
                name: "Health Sanitary Inspector",
                duration: "2 Years",
                description: "Public health management, hygiene inspection, environmental safety, and sanitation systems for government and municipal careers.",
                icon: "fas fa-heartbeat"
            },
            {
                name: "Software Programming & Testing Assistant (SP&TA)",
                duration: "2 Years",
                description: "Join our cutting-edge IT trade to master modern software development, debugging, and QA methodologies.",
                icon: "fas fa-laptop-code"
            }
        ]
    },
    testimonials: [
        { name: "Rahul Patel", trade: "Electrician", year: "2023", text: "ITI Kubernagar gave me practical skills that landed me a job at GETCO within 3 months of graduation.", rating: 5 },
        { name: "Priya Shah",  trade: "COPA",        year: "2022", text: "The computer training here is excellent. I'm now working as a data entry operator in a private firm.", rating: 5 },
        { name: "Arjun Kumar", trade: "Fitter",      year: "2023", text: "Best decision of my life. The hands-on training and industry exposure prepared me for real-world challenges.", rating: 5 }
    ]
};

// ─── TRADE DETAILS DATA ───────────────────────────────────────────────────────
// To add a new trade: duplicate a block below. The key MUST match the course name in applicationData.
const tradeDetails = {
    "Electrician": {
        icon: "fas fa-bolt",
        duration: "2 Years",
        certification: "NCVT",
        eligibility: "10th Pass (Science & Maths preferred)",
        salaryRange: "₹12,000 – ₹35,000/month",
        description: "The Electrician trade provides comprehensive training in electrical installations, wiring, and maintenance of electrical equipment for domestic and industrial applications.",
        syllabus: {
            "Year 1": ["Workshop Calculation & Science", "Engineering Drawing", "Trade Theory – Electrical Fundamentals", "Trade Practical – Basic Wiring & Circuits", "Employability Skills & Communication"],
            "Year 2": ["Advanced Electrical Theory", "Trade Practical – Industrial Installations", "Workshop Technology & Safety", "Engineering Drawing – Electrical Diagrams", "Project Work & Apprenticeship"]
        },
        careers: ["Electrical Technician", "Industrial Electrician", "Maintenance Engineer", "Line Electrician (GETCO/UGVCL)", "Self-Employed Contractor"],
        placements: ["GETCO", "UGVCL", "Indian Railways", "L&T", "Tata Power", "Government PWD Dept."],
        futurePaths: "Can pursue NCVT diploma, B.E. Electrical via lateral entry, or start independent electrical contracting business."
    },
    "Fitter": {
        icon: "fas fa-tools",
        duration: "2 Years",
        certification: "NCVT",
        eligibility: "10th Pass (Science & Maths preferred)",
        salaryRange: "₹10,000 – ₹30,000/month",
        description: "The Fitter trade builds expertise in precision fitting, assembly, and maintenance of machines and mechanical components using hand tools, measuring instruments, and precision work.",
        syllabus: {
            "Year 1": ["Workshop Calculation & Science", "Engineering Drawing", "Trade Theory – Fitting & Metrology", "Trade Practical – Bench Work & Filing", "Employability Skills"],
            "Year 2": ["Advanced Fitting Theory", "Trade Practical – Machine Assembly & Maintenance", "Workshop Technology", "Engineering Drawing – Assembly Drawings", "Project Work & Industrial Visit"]
        },
        careers: ["Machine Operator", "Fitter Technician", "Maintenance Fitter", "Production Technician", "Quality Inspector"],
        placements: ["Tata Motors", "Maruti Suzuki", "Indian Railways", "ISRO", "DRDO", "Defense Ordnance Factories"],
        futurePaths: "Can advance to Production Supervisor, pursue B.E. Mechanical via lateral entry, or work in shipbuilding and aerospace industries."
    },
    "Turner": {
        icon: "fas fa-cogs",
        duration: "2 Years",
        certification: "NCVT",
        eligibility: "10th Pass (Science & Maths preferred)",
        salaryRange: "₹12,000 – ₹32,000/month",
        description: "The Turner trade focuses on lathe machine operations for manufacturing precise cylindrical components including cutting, turning, boring, and threading on various metals.",
        syllabus: {
            "Year 1": ["Workshop Calculation & Science", "Engineering Drawing – 2D Profiles", "Trade Theory – Lathe Machine Basics", "Trade Practical – Turning & Facing", "Employability Skills"],
            "Year 2": ["Advanced Turning Theory – CNC Basics", "Trade Practical – Threading & Boring", "Workshop Technology – Precision Measurement", "Engineering Drawing – Component Drawings", "Project Work"]
        },
        careers: ["Lathe Operator", "CNC Machine Operator", "Tool Room Technician", "Precision Engineering Technician", "Production Supervisor"],
        placements: ["ISRO", "Indian Railways", "HAL", "Tata Steel", "Defense Ordnance", "Auto Component Manufacturers"],
        futurePaths: "Specialize in CNC Programming, pursue Diploma in Mechanical Engineering, or work in high-precision manufacturing sectors like aerospace and defense."
    },
    "Welder": {
        icon: "fas fa-fire",
        duration: "2 Years",
        certification: "NCVT",
        eligibility: "10th Pass",
        salaryRange: "₹12,000 – ₹40,000/month (overseas demand high)",
        description: "The Welder trade provides training in various techniques including Arc, Gas, TIG, and MIG welding. High international demand in construction, shipbuilding, and oil & gas sectors.",
        syllabus: {
            "Year 1": ["Workshop Calculation & Science", "Engineering Drawing – Weld Symbols", "Trade Theory – Arc & Gas Welding", "Trade Practical – Basic Joint Welding", "Safety & Employability Skills"],
            "Year 2": ["Advanced Welding Theory – TIG/MIG", "Trade Practical – Pipe & Structural Welding", "Workshop Technology", "Engineering Drawing – Fabrication Drawings", "Project Work & Certification Prep"]
        },
        careers: ["Structural Welder", "Pipe Welder", "Fabrication Technician", "Quality Inspector", "Self-employed Welder"],
        placements: ["L&T", "ONGC", "Indian Railways", "BHEL", "Shipbuilding Companies", "Gulf & International Projects"],
        futurePaths: "Pursue AWS / ASME welding certifications for international opportunities in UAE, Saudi Arabia, Germany. Excellent overseas career potential."
    },
    "Mechanic Motor Vehicle": {
        icon: "fas fa-car",
        duration: "2 Years",
        certification: "NCVT",
        eligibility: "10th Pass",
        salaryRange: "₹10,000 – ₹35,000/month",
        description: "The MMV trade covers complete automobile servicing, repair, and maintenance for two-wheelers, cars, trucks, and buses including modern diagnostics and EV basics.",
        syllabus: {
            "Year 1": ["Workshop Calculation & Science", "Engineering Drawing – Auto Components", "Trade Theory – Engine & Transmission", "Trade Practical – Engine Dismantling/Assembly", "Employability Skills"],
            "Year 2": ["Advanced Auto Theory – Electronics & EV Basics", "Trade Practical – Electrical Systems & AC", "Workshop Technology – Modern Diagnostics", "Engineering Drawing – Hydraulic Systems", "Project Work & Garage Practice"]
        },
        careers: ["Auto Service Technician", "Service Advisor", "Garage Owner", "Fleet Maintenance Technician", "EV Technician"],
        placements: ["Maruti Suzuki", "Tata Motors", "Hero MotoCorp", "Mahindra", "State Transport Corporations", "Private Garages"],
        futurePaths: "Specialize in EV servicing, become a certified service technician at dealerships, or start own automobile workshop."
    },
    "Mechanic Diesel": {
        icon: "fas fa-truck",
        duration: "1 Year",
        certification: "NCVT",
        eligibility: "10th Pass",
        salaryRange: "₹10,000 – ₹28,000/month",
        description: "The Mechanic Diesel trade provides focused training on diesel engines used in trucks, buses, agricultural machinery, and industrial equipment including fuel systems and engine overhaul.",
        syllabus: {
            "Year 1": ["Workshop Calculation & Science", "Engineering Drawing – Engine Diagrams", "Trade Theory – Diesel Engine Systems", "Trade Practical – Fuel Injection & Overhaul", "Employability & Safety Skills"]
        },
        careers: ["Diesel Engine Mechanic", "Agricultural Equipment Technician", "Transport Fleet Mechanic", "Generator Maintenance Technician", "Industrial Equipment Repair"],
        placements: ["State Transport Corporations", "Indian Army Workshops", "Mining Companies", "Agricultural Equipment Dealers", "ONGC", "Private Transport Firms"],
        futurePaths: "Advance to MMV trade, specialize in heavy commercial vehicles, or work with power generation and agriculture sectors."
    }
};

// ─── MODAL FUNCTIONS ─────────────────────────────────────────────────────────
function openTradeModal(tradeName) {
    const detail = tradeDetails[tradeName];
    const modal  = document.getElementById('tradeModal');
    const body   = document.getElementById('tradeModalBody');
    if (!modal || !body) return;

    if (!detail) {
        body.innerHTML = `<p style="color:#94a3b8;text-align:center;padding:40px;">Details coming soon for <strong>${tradeName}</strong>.</p>`;
    } else {
        // Build syllabus HTML
        const syllabusHtml = Object.entries(detail.syllabus).map(([year, subjects]) => `
            <div class="td-year-block">
                <div class="td-year-title"><i class="fas fa-calendar-alt"></i> ${year}</div>
                <ul class="td-subject-list">
                    ${subjects.map(s => `<li><i class="fas fa-check-circle"></i> ${s}</li>`).join('')}
                </ul>
            </div>
        `).join('');

        body.innerHTML = `
            <!-- Header Banner -->
            <div class="td-banner">
                <div class="td-banner-icon"><i class="${detail.icon}"></i></div>
                <div class="td-banner-info">
                    <h2>${tradeName}</h2>
                    <div class="td-badges">
                        <span class="td-badge"><i class="far fa-clock"></i> ${detail.duration}</span>
                        <span class="td-badge"><i class="fas fa-certificate"></i> ${detail.certification}</span>
                        <span class="td-badge"><i class="fas fa-graduation-cap"></i> ${detail.eligibility}</span>
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="td-section">
                <p class="td-desc">${detail.description}</p>
            </div>

            <!-- Syllabus -->
            <div class="td-section">
                <h3 class="td-section-title"><i class="fas fa-book-open"></i> Syllabus / Subjects</h3>
                <div class="td-years-grid">${syllabusHtml}</div>
            </div>

            <!-- Career + Placement side by side -->
            <div class="td-two-col">
                <div class="td-section">
                    <h3 class="td-section-title"><i class="fas fa-briefcase"></i> Career Opportunities</h3>
                    <ul class="td-list">
                        ${detail.careers.map(c => `<li><i class="fas fa-arrow-right"></i> ${c}</li>`).join('')}
                    </ul>
                </div>
                <div class="td-section">
                    <h3 class="td-section-title"><i class="fas fa-building"></i> Placement Partners</h3>
                    <ul class="td-list">
                        ${detail.placements.map(p => `<li><i class="fas fa-arrow-right"></i> ${p}</li>`).join('')}
                    </ul>
                </div>
            </div>

            <!-- Salary + Future -->
            <div class="td-two-col">
                <div class="td-info-box">
                    <div class="td-info-icon"><i class="fas fa-rupee-sign"></i></div>
                    <div>
                        <div class="td-info-label">Average Salary Range</div>
                        <div class="td-info-value">${detail.salaryRange}</div>
                    </div>
                </div>
                <div class="td-info-box">
                    <div class="td-info-icon"><i class="fas fa-road"></i></div>
                    <div>
                        <div class="td-info-label">Future Career Paths</div>
                        <div class="td-info-value">${detail.futurePaths}</div>
                    </div>
                </div>
            </div>

            <!-- Apply CTA -->
            <div class="td-cta">
                <a href="#inquiry" class="td-cta-btn" onclick="closeTradeModal()">
                    <i class="fas fa-paper-plane"></i> Apply for ${tradeName}
                </a>
            </div>
        `;
    }

    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeTradeModal() {
    const modal = document.getElementById('tradeModal');
    if (modal) {
        modal.classList.remove('active');
        document.body.style.overflow = '';
    }
}

// Close modal on backdrop click
document.addEventListener('click', function (e) {
    if (e.target && e.target.id === 'tradeModal') {
        closeTradeModal();
    }
});

// Close modal on Escape key
document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') closeTradeModal();
});

// Expose globally
window.openTradeModal  = openTradeModal;
window.closeTradeModal = closeTradeModal;

// ─── INITIALIZE ───────────────────────────────────────────────────────────────
document.addEventListener('DOMContentLoaded', function () {
    initializeNavigation();
    generateDynamicContent();
    initializeScrollEffects();
    initializeFormHandling();
});

// ─── NAVIGATION ───────────────────────────────────────────────────────────────
function initializeNavigation() {
    const mobileMenuToggle = document.getElementById('mobileMenuToggle');
    const nav = document.getElementById('nav');
    const navLinks = document.querySelectorAll('.nav-link');

    if (mobileMenuToggle) {
        mobileMenuToggle.addEventListener('click', function () {
            nav.classList.toggle('active');
            this.classList.toggle('active');
        });
    }

    navLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href && href.startsWith('#')) {
                e.preventDefault();
                scrollToSection(href.substring(1));
                if (nav) nav.classList.remove('active');
                if (mobileMenuToggle) mobileMenuToggle.classList.remove('active');
                navLinks.forEach(l => l.classList.remove('active'));
                this.classList.add('active');
            }
        });
    });

    const floatingCTA = document.querySelector('.floating-cta');
    if (floatingCTA) {
        floatingCTA.addEventListener('click', function (e) {
            e.preventDefault();
            scrollToSection('inquiry');
        });
    }

    const tabButtons = document.querySelectorAll('.tab-btn');
    const engineeringGrid    = document.getElementById('engineeringCourses');
    const nonEngineeringGrid = document.getElementById('nonEngineeringCourses');

    tabButtons.forEach(btn => {
        btn.addEventListener('click', function () {
            const target = this.getAttribute('data-target');
            tabButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            if (target === 'engineering') {
                if (engineeringGrid)    { engineeringGrid.style.display = 'grid'; setTimeout(() => engineeringGrid.style.opacity = '1', 10); }
                if (nonEngineeringGrid) { nonEngineeringGrid.style.opacity = '0'; setTimeout(() => nonEngineeringGrid.style.display = 'none', 300); }
            } else if (target === 'non-engineering') {
                if (nonEngineeringGrid) { nonEngineeringGrid.style.display = 'grid'; setTimeout(() => nonEngineeringGrid.style.opacity = '1', 10); }
                if (engineeringGrid)    { engineeringGrid.style.opacity = '0'; setTimeout(() => engineeringGrid.style.display = 'none', 300); }
            }
        });
    });
}

function scrollToSection(sectionId) {
    const element = document.getElementById(sectionId);
    if (element) {
        const headerHeight   = document.querySelector('.header').offsetHeight;
        const offsetPosition = element.offsetTop - headerHeight - 20;
        window.scrollTo({ top: offsetPosition, behavior: 'smooth' });
    }
}

// ─── DYNAMIC CONTENT ──────────────────────────────────────────────────────────
function generateDynamicContent() {
    generateCourses();
    populateTradeDropdown();
    generateTestimonials();
}

function populateTradeDropdown() {
    const tradeSelect = document.getElementById('tradeSelection');
    if (!tradeSelect) return;
    tradeSelect.innerHTML = '<option value="" disabled selected>Choose your preferred trade</option>';

    const engGroup = document.createElement('optgroup');
    engGroup.label = '🔧 Engineering Trades';
    applicationData.courses.engineering.forEach(course => {
        const option = document.createElement('option');
        option.value = course.name;
        option.textContent = course.name;
        engGroup.appendChild(option);
    });
    tradeSelect.appendChild(engGroup);

    const nonEngGroup = document.createElement('optgroup');
    nonEngGroup.label = '💻 Non-Engineering Trades';
    applicationData.courses.non_engineering.forEach(course => {
        const option = document.createElement('option');
        option.value = course.name;
        option.textContent = course.name;
        nonEngGroup.appendChild(option);
    });
    tradeSelect.appendChild(nonEngGroup);
}

function generateCourses() {
    const enggEl    = document.getElementById('engineeringCourses');
    const nonEnggEl = document.getElementById('nonEngineeringCourses');

    // URL map: trade name → page filename
    const tradePageMap = {
        // Engineering trades
        "Electrician":              "electrician.html",
        "Fitter":                   "fitter.html",
        "Turner":                   "turner.html",
        "Welder":                   "welder.html",
        "Mechanic Refrigeration & Air-Conditioner (RAC)": "rac.html",
        "Mechanic Diesel":          "mechanic-diesel.html",
        "Mechanic Motor Vehicle":   "mechanic-motor-vehicle.html",
        "Draughtsman Civil":        "draughtsman-civil.html",
        "Draughtsman Mechanical":   "draughtsman-mechanical.html",
        // Non-engineering trades
        "COPA (Computer Operator & Programming Assistant)": "copa.html",
        "Data Entry Operator":              "data-entry-operator.html",
        "Desktop Publishing Operator":      "desktop-publishing-operator.html",
        "Dress Making":                     "dress-making.html",
        "Fashion Design & Technology":      "fashion-design-technology.html",
        "Health Sanitary Inspector":        "health-sanitary-inspector.html",
        "Software Programming & Testing Assistant (SP&TA)": "spta.html"
    };



    const buildCard = (course, index) => {
        const detailPage = tradePageMap[course.name];
        const detailBtn  = detailPage
            ? `<a href="${detailPage}" class="btn-view-details"><i class="fas fa-info-circle"></i> View Trade Details</a>`
            : `<button class="btn-view-details" onclick="openTradeModal('${course.name.replace(/'/g, "\\'")}')"><i class="fas fa-info-circle"></i> View Trade Details</button>`;

        const sptaLearningBtn = course.name === "Software Programming & Testing Assistant (SP&TA)"
            ? `<a href="index.php" class="btn-learning-material"><i class="fas fa-book-reader"></i> SPTA Learning Material</a>`
            : "";

        const extraClass = course.name === "Software Programming & Testing Assistant (SP&TA)" ? " spta-card" : "";

        return `
        <div class="course-card${extraClass}" style="animation-delay:${index * 0.1}s">
            <div class="course-img"><i class="${course.icon}"></i></div>
            <div class="course-body">
                <h3>${course.name}</h3>
                <div class="course-meta">
                    <span><i class="far fa-clock"></i> ${course.duration}</span>
                    <span><i class="fas fa-certificate"></i> NCVT</span>
                </div>
                <p>${course.description}</p>
                <a href="#inquiry" class="btn-link">Apply Now <i class="fas fa-arrow-right"></i></a>
                ${detailBtn}
                ${sptaLearningBtn}
            </div>
        </div>
    `};


    if (enggEl)    enggEl.innerHTML    = applicationData.courses.engineering.map(buildCard).join('');
    if (nonEnggEl) nonEnggEl.innerHTML = applicationData.courses.non_engineering.map(buildCard).join('');
}

function generateTestimonials() {
    const container = document.getElementById('testimonials');
    if (!container) return;
    container.innerHTML = applicationData.testimonials.map(t => `
        <div class="testimonial-card">
            <div class="testimonial-header">
                <div class="testimonial-avatar"><i class="fas fa-user"></i></div>
                <div class="testimonial-info"><h4>${t.name}</h4><p>${t.trade} - ${t.year}</p></div>
            </div>
            <div class="testimonial-rating">${'<i class="fas fa-star"></i>'.repeat(t.rating)}</div>
            <p class="testimonial-text">"${t.text}"</p>
        </div>
    `).join('');
}

// ─── SCROLL EFFECTS ───────────────────────────────────────────────────────────
function initializeScrollEffects() {
    const header    = document.querySelector('.header');
    const backToTop = document.querySelector('.back-to-top');

    window.addEventListener('scroll', function () {
        if (window.scrollY > 50) header?.classList.add('scrolled');
        else header?.classList.remove('scrolled');

        if (backToTop) {
            if (window.scrollY > 300) backToTop.classList.add('show');
            else backToTop.classList.remove('show');
        }
        updateActiveNavOnScroll();
    });

    if (backToTop) {
        backToTop.addEventListener('click', function (e) {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }
}

function updateActiveNavOnScroll() {
    const sections  = document.querySelectorAll('section[id]');
    const navLinks  = document.querySelectorAll('.nav-link');
    const scrollY   = window.pageYOffset;
    const headerH   = document.querySelector('.header')?.offsetHeight || 0;

    sections.forEach(section => {
        const top = section.offsetTop - headerH - 100;
        const id  = section.getAttribute('id');
        if (scrollY > top && scrollY <= top + section.offsetHeight) {
            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === `#${id}`) link.classList.add('active');
            });
        }
    });
}

// ─── FORM HANDLING ────────────────────────────────────────────────────────────
function initializeFormHandling() {
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const submitBtn = this.querySelector('.btn-submit');
            if (submitBtn) { submitBtn.disabled = true; submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...'; }
            setTimeout(() => {
                alert('Thank you for your inquiry! Our counselor will contact you within 24 hours.');
                this.reset();
                if (submitBtn) { submitBtn.disabled = false; submitBtn.innerHTML = '<span class="btn-text">Submit Inquiry</span><i class="fas fa-paper-plane"></i>'; }
            }, 1500);
        });
    }

    document.querySelectorAll('.form-input').forEach(input => {
        input.addEventListener('focus',  function () { this.parentElement.classList.add('focused'); });
        input.addEventListener('blur',   function () {
            this.parentElement.classList.remove('focused');
            this.parentElement.classList.toggle('has-value', !!this.value);
        });
    });
}

// ─── COUNTER ANIMATION ────────────────────────────────────────────────────────
function animateCounters() {
    document.querySelectorAll('.counter').forEach(counter => {
        const target = parseInt(counter.textContent);
        const step   = target / (2000 / 16);
        let current  = 0;
        const update = () => {
            current += step;
            if (current < target) { counter.textContent = Math.floor(current) + '+'; requestAnimationFrame(update); }
            else counter.textContent = target + '+';
        };
        new IntersectionObserver((entries, obs) => {
            entries.forEach(e => { if (e.isIntersecting) { update(); obs.unobserve(e.target); } });
        }).observe(counter);
    });
}
if (document.querySelector('.counter')) animateCounters();

// ─── FADE-IN ──────────────────────────────────────────────────────────────────
function fadeInElements() {
    const obs = new IntersectionObserver((entries) => {
        entries.forEach(e => {
            if (e.isIntersecting) { e.target.style.opacity = '1'; e.target.style.transform = 'translateY(0)'; obs.unobserve(e.target); }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.fade-in').forEach(el => {
        el.style.opacity   = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        obs.observe(el);
    });
}
if (document.querySelector('.fade-in')) fadeInElements();

window.scrollToSection = scrollToSection;