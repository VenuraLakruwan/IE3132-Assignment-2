<section class="page-header">
  <div class="container">
    <h1>Contact</h1>
    <p>For urgent operational issues on an active deployment, use the
    monitoring desk line, not this form.</p>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="grid-2">
      <div>
        <h2>Send a message</h2>
        <form class="contact-form" id="contactForm">
          <div class="field">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
          </div>
          <div class="field">
            <label for="company">Company</label>
            <input type="text" id="company" name="company">
          </div>
          <div class="field">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
          </div>
          <div class="field">
            <label for="message">Message</label>
            <textarea id="message" name="message" rows="5" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Send message</button>
          <p class="form-note" id="formStatus">
            This form is not connected to a mail server in this environment.
          </p>
        </form>
      </div>
      <div>
        <h2>Offices</h2>
        <table class="data-table">
          <thead><tr><th>Location</th><th>Focus</th></tr></thead>
          <tbody>
            <tr><td>Malabe HQ</td><td>Engineering &amp; leadership</td></tr>
            <tr><td>Colombo Port Office</td><td>Terminal systems</td></tr>
            <tr><td>Northern Ops Center</td><td>Grid monitoring</td></tr>
          </tbody>
        </table>
        <p class="muted" style="margin-top:24px;">
          General enquiries: ops@phantomtechsolutions.example<br>
          Monitoring desk (24/7): +94 11 234 5678
        </p>
      </div>
    </div>
  </div>
</section>
