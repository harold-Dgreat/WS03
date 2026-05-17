<?php

/** @var object $listing */

?>

<?php loadPartial('head'); ?>
<?php loadPartial('navbar'); ?>

<section class="create-page">
    <div class="create-wrap">
        <div class="form-shell">

            <div class="form-hero">
                <div class="form-hero-content">
                    <span class="form-badge">Employer Portal</span>
                    <h1>Edit Job Listing</h1>
                    <p>Update the details of your job listing and reach the right candidates faster.</p>
                </div>
            </div>

            <form method="POST" action="/WS03/Public/listings/<?= $listing->id ?>" class="job-form">
                <!-- METHOD SPOOFING -->
                <input type="hidden" name="_method" value="PUT">

                <div class="form-section">

                    <div class="section-heading">
                        <span class="section-step">01</span>
                        <div>
                            <h2>Job Information</h2>
                            <p>Provide the core details about the position you are offering.</p>
                            <?= loadPartial('errors', ['errors' => $errors ?? []]) ?>
                        </div>
                    </div>

                    <div class="form-grid">

                        <div class="form-group full">
                            <label for="title">Job Title</label>
                            <input type="text" id="title" name="title" class="form-input"
                                   value="<?= htmlspecialchars($listing->title ?? '') ?>" />
                        </div>

                        <div class="form-group full">
                            <label for="description">Job Description</label>
                            <textarea id="description" name="description" rows="5" class="form-input"><?= htmlspecialchars($listing->description ?? '') ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="salary">Annual Salary</label>
                            <input type="text" id="salary" name="salary" class="form-input"
                                   value="<?= htmlspecialchars($listing->salary ?? '') ?>" />
                        </div>

                        <div class="form-group">
                            <label for="requirements">Requirements</label>
                            <input type="text" id="requirements" name="requirements" class="form-input"
                                   value="<?= htmlspecialchars($listing->requirements ?? '') ?>" />
                        </div>

                        <div class="form-group full">
                            <label for="benefits">Benefits</label>
                            <input type="text" id="benefits" name="benefits" class="form-input"
                                   value="<?= htmlspecialchars($listing->benefits ?? '') ?>" />
                        </div>

                        <div class="form-group full">
                            <label for="tags">Tags</label>
                            <input type="text" id="tags" name="tags" class="form-input"
                                   value="<?= htmlspecialchars($listing->tags ?? '') ?>" />
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
                            <input type="text" id="company" name="company" class="form-input"
                                   value="<?= htmlspecialchars($listing->company ?? '') ?>" />
                        </div>

                        <div class="form-group full">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" class="form-input"
                                   value="<?= htmlspecialchars($listing->address ?? '') ?>" />
                        </div>

                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" id="city" name="city" class="form-input"
                                   value="<?= htmlspecialchars($listing->city ?? '') ?>" />
                        </div>

                        <div class="form-group">
                            <label for="state">State / Province</label>
                            <input type="text" id="state" name="state" class="form-input"
                                   value="<?= htmlspecialchars($listing->state ?? '') ?>" />
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" name="phone" class="form-input"
                                   value="<?= htmlspecialchars($listing->phone ?? '') ?>" />
                        </div>

                        <div class="form-group">
                            <label for="email">Application Email</label>
                            <input type="email" id="email" name="email" class="form-input"
                                   value="<?= htmlspecialchars($listing->email ?? '') ?>" />
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
                            <i class="fa fa-floppy-disk"></i> Save Job
                        </button>

                        <a href="/WS03/Public/listings/<?= $listing->id ?>" class="btn btn-secondary action-btn-secondary">
                            <i class="fa fa-xmark"></i> Cancel
                        </a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</section>

<?php loadPartial('footer'); ?>