<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
?>

<!doctype html>
<html lang="hi">

<head>


  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SP&TA Programming</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap"
    rel="stylesheet"> <!-- SYNTAX HIGHLIGHTING LIBRARIES  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@300;400;500;600&amp;display=swap"
    rel="stylesheet">
  <!-- Font Awesome for close icon -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script> <!-- CODE FONT --> <!-- INITIALIZE HIGHLIGHT.JS -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      if (typeof hljs !== 'undefined') {
        hljs.highlightAll();
      }
    });
  </script>
</head>

<body>

  <!-- Sidebar Overlay -->
  <div id="sidebarOverlay" class="sidebar-overlay" onclick="closeSidebar()"></div>

  <!-- ☰ Hamburger Toggle Button — always visible, fixed top-left -->
  <button id="sidebarToggle" class="sidebar-toggle-btn" onclick="toggleSidebar()" aria-label="Open Navigation Menu">
    ☰
  </button>

  <!-- Header title shown in the top bar -->
  <div class="page-header-title">
    <span style="margin-right:10px; font-size:1.2em;">💻</span> SP&amp;TA Learning Material
  </div>

  <aside class="sidebar" id="mainSidebar">
    <!-- Close Button -->
    <button class="sidebar-close-btn" id="sidebarCloseBtn" onclick="closeSidebar()" aria-label="Close Sidebar">
      <i class="fas fa-times"></i>
    </button>
    <div class="profile-section">
      <div class="circle-border">
        <img src="logo3.png " alt="ITI SP&amp;TA" id="profilePhoto" onclick="toggleSidebar()" title="Click to open menu" style="cursor: pointer;">
      </div>
      <div class="profile-name">
        ITI Kubernagar
      </div>
      <div class="profile-info">
        Software Programming &amp; Testing Assistant
      </div>


      <!-- NAVIGATION BUTTONS WITH ENHANCED DESIGN -->
      <div class="profile-nav-buttons"
        style="margin-top: 20px; display: flex; flex-direction: column; gap: 15px; padding: 0 5px;">
        <a href="homepage.html" class="profile-nav-btn"
          style="display: flex; align-items: center; justify-content: center; padding: 15px 24px; background: linear-gradient(135deg, rgb(33, 92, 151) 0%, rgb(25, 70, 115) 100%); border: none; border-radius: 12px; text-decoration: none; color: #fff; font-size: 1rem; font-weight: 600; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); width: 100%; box-shadow: 0 4px 15px rgba(33, 92, 151, 0.3), inset 0 1px 0 rgba(255, 255, 255, 0.1); position: relative; overflow: hidden;">
          <span
            style="position: relative; z-index: 2; display: flex; align-items: center; gap: 10px; letter-spacing: 0.5px;">
            <span style="font-size: 1.3em; filter: drop-shadow(0 2px 4px rgba(0,0,0,0.2));">🏠</span>
            <span>Home Page</span>
          </span>
          <span
            style="position: absolute; top: 0; left: -100%; width: 100%; height: 100%; background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent); transition: left 0.6s ease;"></span>
        </a>


      </div>
    </div>


    <nav class="sidebar-nav">
      <div class="nav-title">
        📜 Web Technologies
      </div>
      <ul class="nav-menu" id="sidebarMenu">
        <li class="nav-item"> <button class="nav-link category-btn" data-category="html"> <span>🌐 HTML Programs</span>
            <span class="arrow">▸</span> </button>
          <ul class="submenu" id="html-submenu" style="display:none;"></ul>
        </li>
        <li class="nav-item"> <button class="nav-link category-btn" data-category="css"> <span>🎨 CSS Programs</span>
            <span class="arrow">▸</span> </button>
          <ul class="submenu" id="css-submenu" style="display:none;"></ul>
        </li>
        <li class="nav-item"> <button class="nav-link category-btn" data-category="js"> <span>⚡ JavaScript
              Programs</span> <span class="arrow">▸</span> </button>
          <ul class="submenu" id="js-submenu" style="display:none;"></ul>
        </li>
      </ul>


      <div class="nav-title" style="margin-top: 20px;">
        💫 Code Playground
      </div>
      <ul class="nav-menu">
        <li class="nav-item">
          <a href="code-playground.html" class="nav-link">
            <span>⚡ Interactive Editor</span>
            <span class="arrow">▸</span>
          </a>
        </li>
      </ul>


      <div class="nav-title" style="margin-top: 20px;">
        🚀 Career Growth
      </div>
      <ul class="nav-menu">
        <li class="nav-item">
          <a href="career-opportunities.html" class="nav-link">
            <span>💼 Future Opportunities</span>
            <span class="arrow">▸</span>
          </a>
        </li>
      </ul>
      <!-- END CAREER OPPORTUNITIES SECTION -->
    </nav>
  </aside>
  <section class="main-content" id="mainContent">
    <div class="content-wrapper">
      <h2>SP&amp;TA TRADE LEARNING MATERIAL</h2>
      <div class="trade-info">
        <div class="info-section">
          <h3>📚 Course Overview</h3>
          <p><strong>Trade name: </strong>(Software programming and testing Assistant)<br> <strong>Certificate
              Level:</strong> Gujarat Council for Vocational Training (GCVT)<br> <strong>Trade Code:</strong> 953<br>
            <strong>Category:</strong> Engineering &amp; Technology
          </p>
        </div>
        <div class="info-section">
          <h3>🎯 Course Objectives</h3>
          <ul>

            <li>Acquire practical knowledge of database management and web technologies</li>
            <li>Provide industry-ready technical skills</li>
            <li>Learn in Various development and programming skills</li>
            <li>Gain proficiency in various programming languages</li>
            <li>Learn software testing methodologies and quality assurance</li>


          </ul>
        </div>
        <div class="info-section">
          <h3>💻 Subjects &amp; Technologies Covered</h3>
          <div class="subjects-grid">
            <div class="subject-card">
              <h4>Web Technologies</h4>
              <ul>
                <li>HTML5 &amp; Semantic Markup</li>
                <li>CSS3 &amp; Responsive Design</li>
                <li>JavaScript Programming</li>
                <li>Javascript Latest Version ES2023</li>
              </ul>
            </div>
            <div class="subject-card">
              <h4>Programming Fundamentals</h4>
              <ul>
                <li>Variables &amp; Data Types</li>
                <li>Control Structures</li>
                <li>Functions &amp; Objects</li>
                <li>Arrays</li>
              </ul>
            </div>
            <div class="subject-card">
              <h4>Software Testing</h4>
              <ul>
                <li>Manual Testing Methods</li>
                <li>Test Case Design</li>
                <li>Bug Reporting &amp; Tracking</li>
              </ul>
            </div>
            <div class="subject-card">
              <h4>Database &amp; Tools</h4>
              <ul>
                <li>Database Concepts</li>
                <li>SQL Basics</li>
                <li>(MS Access)</li>
              </ul>
            </div>
          </div>
        </div>

        <!-- SKILL DEVELOPMENT -->
        <div class="info-section">
          <h3>🎓 Skill Development Focus </h3>
          <div class="skills-list">

            <span class="skill-tag">Problem Solving</span>
            <span class="skill-tag">Logical Thinking</span>
            <span class="skill-tag">Code Debugging</span>
            <span class="skill-tag">Team Collaboration</span>
            <span class="skill-tag">Project Management</span>
            <span class="skill-tag">Communication Skills</span>
            <span class="skill-tag">Continuous Learning</span>
            <span class="skill-tag">Quality Assurance</span>
          </div>

          <footer class="footer">
            <p>| © ITI Software Programming &amp; Testing Assistant |</p>
          </footer>
  </section>
  <script src="app.js"></script>

  <!-- Sidebar Toggle Script -->
  <script>
    const sidebar  = document.getElementById('mainSidebar');
    const overlay  = document.getElementById('sidebarOverlay');

    function toggleSidebar() {
      const isOpen = sidebar.classList.toggle('sidebar-open');
      overlay.classList.toggle('overlay-active', isOpen);
      document.body.classList.toggle('sidebar-pushed', isOpen);
    }

    function closeSidebar() {
      sidebar.classList.remove('sidebar-open');
      overlay.classList.remove('overlay-active');
      document.body.classList.remove('sidebar-pushed');
    }

    // Close sidebar on Escape key
    document.addEventListener('keydown', e => {
      if (e.key === 'Escape') closeSidebar();
    });
  </script>
</body>

</html>