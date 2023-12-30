<!DOCTYPE html>
<html lang="en">
<html>
<head>
<style>
h1 {
  text-align: center;
  font-size: 35px;
}

.container {
  margin: 0 auto;
  padding: 4rem;
  width: 35rem;
}

.accordion {
  .accordion-item {
    border-bottom: 1px solid lightgray;
    }
  }

button {
    position: relative;
    text-align: left;
    width: 100%;
    padding: 1em 0;
    font-size: 1rem;
    border: none;
    background: none;
    &:hover, &:focus {
      cursor: pointer;
      &::after {
        cursor: pointer;
      }
    }
    .accordion-title {
      padding: 1m 1.5em 1em 0;
      font-weight: bold;
    }
    .icon {
      position: absolute;
      right: 0;
      width: 22px;
      height: 22px;
      &::before {
 
        position: absolute;
        content: '';
        top: 9px;
        left: 5px;
        width: 10px;
        height: 2px;
        background: currentColor;
      }
      &::after {
        position: absolute;
        content: '';
        top: 5px;
        left: 9px;
        width: 2px;
        height: 10px;
        background: currentColor;
      }
    }
  }
  button[aria-expanded='true'] {
    .icon {
      &::after {
        width: 0;
      }
    }
    + .accordion-content {
      opacity: 1;
      max-height: 9em;
    }
  }
  .accordion-content {
    opacity: 0;
    max-height: 0;
    overflow: hidden;
</style>
</head>
<body>
  
<div class="container">
  <h1>Privacy Policy</h1>
  <p1> Welcome to our online enrollment system. Before you proceed, please read and understand our Privacy and Policy.</p1>
  <div class="accordion">
    <div class="accordion-item">
      <button id="accordion-button-1" aria-expanded="false"><span class="accordion-title">1. Information Collection</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>We collect personal information necessary for enrollment, including but not limited to: <br> <br>
- Full Name <br>
- Date of Birth <br>
- Address <br>
- Email Address <br>
- Phone Number <br>
- Educational History
</p>
      </div>
    </div>
    <div class="accordion-item">
      <button id="accordion-button-2" aria-expanded="false"><span class="accordion-title">2. Use of Information</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>Your information is used solely for enrollment purposes. We do not share or sell your data to third parties for marketing purposes.</p>
      </div>
    </div>
    <div class="accordion-item">
      <button id="accordion-button-3" aria-expanded="false"><span class="accordion-title">3. Data Security</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>We employ industry-standard security measures to protect your information from unauthorized access, disclosure, alteration, and destruction.</p>
      </div>
    </div>
<div class="accordion-item">
      <button id="accordion-button-4" aria-expanded="false"><span class="accordion-title">4. Third-Party Services </span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>In some cases, we may use third-party services for enrollment. These services are bound by confidentiality agreements to protect your data.</p>
      </div>
    </div>
<div class="accordion-item">
      <button id="accordion-button-5" aria-expanded="false"><span class="accordion-title">5. Cookies and Tracking:</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>We may use cookies to enhance your experience. You can choose to disable cookies in your browser settings, but this may affect the functionality of our system.</p>
      </div>
    </div>
<div class="accordion-item">
      <button id="accordion-button-6" aria-expanded="false"><span class="accordion-title">6. Data Retention </span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>Your information is retained for the duration necessary to fulfill the enrollment process. Afterward, it is securely archived or permanently deleted.</p>
      </div>
    </div>
 <div class="accordion-item">
      <button id="accordion-button-7" aria-expanded="false"><span class="accordion-title">7. User Control </span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>You have the right to review, update, or delete your personal information. Contact us through email for any requests.
</p>
      </div>
    </div>
 <div class="accordion-item">
      <button id="accordion-button-8" aria-expanded="false"><span class="accordion-title">8. Changes to Policy </span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>We reserve the right to update our policy. Changes will be communicated through our website or other appropriate channels.</p>
      </div>
    </div>
 <div class="accordion-item">
      <button id="accordion-button-9" aria-expanded="false"><span class="accordion-title">9. Compliance with Laws </span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>We comply with all relevant data protection laws and regulations.</p>
      </div>
    </div>
  <div class="accordion-item">
      <button id="accordion-button-10" aria-expanded="false"><span class="accordion-title">10. User Agreement </span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>By using our online enrollment system, you agree to the terms outlined in this Privacy and Policy.</p>
      </div>
    </div>
    <p>If you have any questions or concerns, contact us through email. <br> <br> Thank you for entrusting us with your information. We are committed to ensuring the privacy and security of your data.
    </p>
  </div>
</div>
  
<script>
const items = document.querySelectorAll(".accordion button");

function toggleAccordion() {
  const itemToggle = this.getAttribute('aria-expanded');
  
  for (i = 0; i < items.length; i++) {
    items[i].setAttribute('aria-expanded', 'false');
  }
  
  if (itemToggle == 'false') {
    this.setAttribute('aria-expanded', 'true');
  }
}

items.forEach(item => item.addEventListener('click', toggleAccordion));
</script>
  </body>
</html>
