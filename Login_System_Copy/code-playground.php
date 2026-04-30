<!DOCTYPE html>
<html lang="hi"> 
<head> 
  <meta charset="UTF-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <title>Code Playground - SP&TA</title> 
  <link rel="stylesheet" href="style.css"> 
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css"> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@300;400;500;600&display=swap" rel="stylesheet">

  <style>
    /* CODE PLAYGROUND PHOTO WALA DESIGN */
    .playground-info-section {
      background: linear-gradient(135deg, #7c5cbf 0%, #6b4fa3 100%);
      border-radius: 15px;
      padding: 40px;
      margin: 30px 0;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    }

    .playground-info-section h3 {
      color: #ffffff;
      font-size: 1.8rem;
      margin-bottom: 25px;
      text-align: center;
      font-weight: 600;
    }

    .playground-description {
      color: #ffffff;
      text-align: center;
      margin-bottom: 30px;
      font-size: 1rem;
      opacity: 0.9;
    }

    .interactive-code-playground {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .html-code-editor textarea {
      width: 100%;
      min-height: 300px;
      background: #ffffff;
      color: #333333;
      border: 2px solid #e0e0e0;
      border-radius: 10px;
      padding: 20px;
      font-family: 'Fira Code', 'Courier New', monospace;
      font-size: 14px;
      resize: vertical;
      box-sizing: border-box;
    }

    .html-code-editor textarea:focus {
      outline: none;
      border-color: #6b4fa3;
      box-shadow: 0 0 10px rgba(107, 79, 163, 0.3);
    }

    .html-code-editor textarea::placeholder {
      color: #999999;
      font-style: italic;
    }

    .execute-btn {
      background: #2d2d2d;
      color: white;
      border: none;
      padding: 15px 40px;
      font-size: 1.1rem;
      font-weight: 600;
      border-radius: 8px;
      cursor: pointer;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
      align-self: flex-start;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .execute-btn:hover {
      background: #1a1a1a;
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
    }

    .output-preview-container {
      width: 100%;
      min-height: 400px;
      background: white;
      border: 2px solid #e0e0e0;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .output-preview-container iframe {
      width: 100%;
      min-height: 400px;
      border: none;
    }

    /* Skill badges - photo jaisa */
    .skill-badges {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      margin-bottom: 30px;
      justify-content: center;
    }

    .skill-badge {
      background: #ff8c00;
      color: white;
      padding: 8px 16px;
      border-radius: 20px;
      font-size: 0.9rem;
      font-weight: 600;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    }
  </style>
</head> 
<body> 
  <aside class="sidebar"> 
    <div class="profile-section"> 
      <div class="circle-border"> 
        <img src="logo3.png" alt="ITI Logo" id="profilePhoto" style="cursor: pointer;"> 
      </div> 
      <div class="profile-name">
        ITI kubernagar 
      </div> 
      <div class="profile-info">
        Software Programming &amp; Testing Assistant 
      </div> 
    </div> 

    <!-- BACK TO HOME BUTTON -->
      <ul class="nav-menu" style="margin-top: 20px;">
        <li class="nav-item"> 
          <a href="index.php" class="nav-link" style="display: flex; justify-content: space-between; align-items: center; text-decoration: none; color: inherit; background-color: rgba(255,255,255,0.05);"> 
            <span>🏠 Back to page</span> 
            <span class="arrow">◂</span> 
          </a> 
        </li> 
      </ul>


    <nav class="sidebar-nav"> 
      <div class="nav-title">
        📜 Web Technologies
      </div> 
      <ul class="nav-menu" id="sidebarMenu"> 
        <li class="nav-item"> 
          <button class="nav-link category-btn" data-category="html"> 
            <span>🌐 HTML Programs</span> 
            <span class="arrow">▸</span> 
          </button> 
          <ul class="submenu" id="html-submenu" style="display:none;"></ul> 
        </li> 
        <li class="nav-item"> 
          <button class="nav-link category-btn" data-category="css"> 
            <span>🎨 CSS Programs</span> 
            <span class="arrow">▸</span> 
          </button> 
          <ul class="submenu" id="css-submenu" style="display:none;"></ul> 
        </li> 
        <li class="nav-item"> 
          <button class="nav-link category-btn" data-category="js"> 
            <span>⚡ JavaScript Programs</span> 
            <span class="arrow">▸</span> 
          </button> 
          <ul class="submenu" id="js-submenu" style="display:none;"></ul> 
        </li> 
      </ul>

      <!-- CAREER OPPORTUNITIES SECTION -->
      <div class="nav-title" style="margin-top: 20px;">
         🚀 Career Options
      </div>
      <ul class="nav-menu">
        <li class="nav-item"> 
          <a href="career-opportunities.html" class="nav-link" style="display: flex; justify-content: space-between; align-items: center; text-decoration: none; color: inherit;"> 
            <span>💼 Future Opportunities</span> 
            <span class="arrow">▸</span> 
          </a> 
        </li> 
      </ul>

      <!-- CODE PLAYGROUND SECTION -->
      <div class="nav-title" style="margin-top: 20px;">
        💫 Code Playground
      </div>
      <ul class="nav-menu">
        <li class="nav-item"> 
          <a href="code-playground.html" class="nav-link" style="display: flex; justify-content: space-between; align-items: center; text-decoration: none; color: inherit;"> 
            <span>⚡ Interactive Editor</span> 
            <span class="arrow">▸</span> 
          </a> 
        </li> 
      </ul>
    </nav> 
  </aside> 

  <section class="main-content" id="mainContent"> 
    <div class="content-wrapper"> 
      <h2>💫 CODE PLAYGROUND</h2> 

      <div class="trade-info"> 
      
        <!-- CODE PLAYGROUND SECTION -->
        <div class="playground-info-section">
          <h3>💫 Code Playground</h3>

          <div class="interactive-code-playground">
            <div class="html-code-editor">
              <textarea id="htmlCodeInput" placeholder="Enter HTML code here..."></textarea>
            </div>

            <button onclick="executeCode()" class="execute-btn">RUN CODE</button>

            <div class="output-preview-container">
              <iframe id="outputPreviewFrame"></iframe>
            </div>
          </div>
        </div>

        <!-- FEATURES SECTION -->
        <div class="info-section"> 
          <h3>✨ Playground Features</h3> 
          <div class="subjects-grid"> 
            <div class="subject-card"> 
              <h4>🚀 Live Preview</h4> 
              <ul> 
                <li>Write HTML code instantly</li> 
                <li>See output in real-time</li> 
                <li>Test your code easily</li> 
              </ul> 
            </div> 
            <div class="subject-card"> 
              <h4>⚡ Quick Testing</h4> 
              <ul> 
                <li>Run code with one click</li> 
                <li>Ctrl+Enter shortcut</li> 
                <li>No setup needed</li> 
              </ul> 
            </div> 
            <div class="subject-card"> 
              <h4>📝 Practice Coding</h4> 
              <ul> 
                <li>Perfect for beginners</li> 
                <li>Learn by doing</li> 
                <li>Experiment freely</li> 
              </ul> 
            </div> 
            <div class="subject-card"> 
              <h4>🎨 Simple Interface</h4> 
              <ul> 
                <li>Clean code editor</li> 
                <li>Easy to understand</li> 
                <li>Mobile friendly</li> 
              </ul> 
            </div> 
          </div> 
        </div>

      </div>
    </div>

    <footer class="footer"> 
      <p>| © ITI Software Programming &amp; Testing Assistant |</p> 
    </footer> 
  </section> 

  <script src="app.js"></script>

  <script>
    // CODE PLAYGROUND JAVASCRIPT
    function executeCode() {
        const outputPreviewFrame = document.getElementById('outputPreviewFrame');
        const htmlCodeInput = document.getElementById('htmlCodeInput').value;

      
        try {
            const iframeDoc = outputPreviewFrame.contentDocument || outputPreviewFrame.contentWindow.document;
            iframeDoc.open();
            iframeDoc.write(htmlCodeInput);
            iframeDoc.close();
            console.log('Code executed successfully!');
        } catch (error) {
            console.error('Error running code:', error);
            outputPreviewFrame.srcdoc = htmlCodeInput;
        }
    }

    // Ctrl+Enter keyboard shortcut
    document.addEventListener('DOMContentLoaded', function() {
        const textarea = document.getElementById('htmlCodeInput');
        if (textarea) {
            textarea.addEventListener('keydown', function(e) {
                if (e.ctrlKey && e.key === 'Enter') {
                    executeCode();
                }
            });
        }
    });
  </script>
</body>
</html>