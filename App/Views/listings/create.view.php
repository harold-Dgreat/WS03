<?php loadPartial('head'); ?>
<?php loadPartial('navbar'); ?>

<section class="create-page">
  <div class="create-wrap">
    <div class="form-shell">
      <div class="form-hero">
        <div class="form-hero-content">
          <span class="form-badge">Employer Portal</span>
          <h1>Create Job Listing</h1>
          <p>Post a new opportunity and reach the right candidates faster.</p>
        </div>
      </div>
      <form method="POST" class="job-form">
        <div class="form-section">
          <div class="section-heading">
            <span class="section-step">01</span>
            <div>
              <h2>Job Information</h2>
              <p>Provide the core details about the position you are offering.</p>
            </div>
          </div>

          <div class="form-grid">
            <div class="form-group full">
              <label for="title">Job Title</label>
              <input type="text" id="title" name="title" placeholder="Frontend Developer" class="form-input" />
            </div>

            <div class="form-group full">
              <label for="description">Job Description</label>
              <textarea id="description" name="description" rows="5" placeholder="Describe the role, responsibilities, and expectations..." class="form-input"></textarea>
            </div>

            <div class="form-group">
              <label for="salary">Annual Salary</label>
              <input type="text" id="salary" name="salary" placeholder="₱500,000" class="form-input" />
            </div>

            <div class="form-group">
              <label for="requirements">Requirements</label>
              <input type="text" id="requirements" name="requirements" placeholder="React, Tailwind, PHP" class="form-input" />
            </div>

            <div class="form-group full">
              <label for="benefits">Benefits</label>
              <input type="text" id="benefits" name="benefits" placeholder="Health insurance, remote work, bonuses" class="form-input" />
            </div>
          </div>
        </div>

        <div class="form-section">
          <div class="section-heading">
            <span class="section-step">02</span>
            <div>
              <h2>Company Information & Location</h2>
              <p>Add the company details applicants need before applying.</p>
            </div>
          </div>

          <div class="form-grid">
            <div class="form-group full">
              <label for="company">Company Name</label>
              <input type="text" id="company" name="company" placeholder="Prosple Inc." class="form-input" />
            </div>

            <div class="form-group full">
              <label for="address">Address</label>
              <input type="text" id="address" name="address" placeholder="123 Business Ave" class="form-input" />
            </div>

            <div class="form-group">
              <label for="city">City</label>
              <input type="text" id="city" name="city" placeholder="Manila" class="form-input" />
            </div>

            <div class="form-group">
              <label for="state">State / Province</label>
              <input type="text" id="state" name="state" placeholder="Metro Manila" class="form-input" />
            </div>

            <div class="form-group">
              <label for="phone">Phone</label>
              <input type="text" id="phone" name="phone" placeholder="+63 912 345 6789" class="form-input" />
            </div>

            <div class="form-group">
              <label for="email">Application Email</label>
              <input type="email" id="email" name="email" placeholder="jobs@company.com" class="form-input" />
            </div>
          </div>
        </div>

        <div class="form-actions-bar">
          <div class="form-actions-text">
            <strong>Ready to publish?</strong>
            <span>Review the details and save your job listing.</span>
          </div>

          <div class="action-row">
            <button type="submit" class="btn btn-primary action-btn-primary">
              <i class="fa fa-floppy-disk"></i>
              Save Job
            </button>

            <a href="/WS03/Public/" class="btn btn-secondary action-btn-secondary">
              <i class="fa fa-xmark"></i>
              Cancel
            </a>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>

<?php loadPartial('footer'); ?>