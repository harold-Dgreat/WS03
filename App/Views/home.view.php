<?php
$listings = $listings ?? [];

loadPartial('head');
loadPartial('navbar');
loadPartial('showcase-search');
?>

<section class="top-banner">
    <div class="container mx-auto max-w-6xl px-4">
        <h2>Available Opportunities</h2>
        <p>
            Explore job openings from different categories and companies.
        </p>
    </div>
</section>

<section class="jobs-section">
    <div class="container mx-auto max-w-6xl px-4">
        <div class="jobs-section-header">
            <span class="jobs-section-badge">Latest Jobs</span>
            <h2 class="jobs-section-title">Recent Listings</h2>
            <p class="jobs-section-subtitle">
                Here are some of the recently posted job opportunities.
            </p>
        </div>

        <div class="jobs-grid">
            <?php foreach ($listings as $listing) : ?>
                <article class="job-card">
                    <div class="job-card-content">
                        <div class="job-card-top">
                            <span class="job-card-category">
                                <?= htmlspecialchars_decode($listing->company ?? 'Company') ?>
                            </span>

                            <span class="job-badge">Local</span>
                        </div>

                        <div class="job-preview-icon">
                            <i class="fa fa-briefcase"></i>
                        </div>

                        <h3 class="job-card-title">
                            <?= htmlspecialchars($listing->title ?? 'Untitled Job') ?>
                        </h3>

                        <p class="job-card-description">
                            <?= htmlspecialchars($listing->description ?? 'No description available.') ?>
                        </p>

                        <div class="job-card-meta">
                            <div class="job-meta-row">
                                <span class="job-meta-label">Salary</span>
                                <span class="job-salary">
                                    <?= formatSalary($listing->salary ?? '') ?>
                                </span>
                            </div>

                            <div class="job-meta-row">
                                <span class="job-meta-label">Location</span>
                                <span class="job-location">
                                    <?= htmlspecialchars($listing->city ?? 'Unknown') ?>,
                                    <?= htmlspecialchars($listing->state ?? 'Unknown') ?>
                                </span>
                            </div>

                            <div class="job-meta-row">
                                <span class="job-meta-label">Type</span>
                                <span class="job-location">Local</span>
                            </div>

                            <div class="job-meta-row job-tags-row">
                                <span class="job-meta-label">Tags</span>

                                <div class="job-tags">
                                    <?php $tags = explode(',', $listing->tags ?? ''); ?>

                                    <?php foreach ($tags as $tag) : ?>
                                        <?php if (trim($tag) !== '') : ?>
                                            <span class="job-tag">
                                                <?= htmlspecialchars(trim($tag)) ?>
                                            </span>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>

                        <a href="/WS03/Public/listings/<?= htmlspecialchars($listing->id ?? '') ?>" class="job-details-btn">
                            View Details
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

        <div class="jobs-footer-link-wrap">
            <a href="/WS03/Public/listings" class="jobs-footer-link">
                <span>Show All Jobs</span>
                <i class="fa fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<section class="container mx-auto max-w-6xl px-4 mb-16 cta-banner-section">
    <div class="cta-banner">
        <div>
            <h2>Post a Job Opening</h2>
            <p>Share your job listing and reach more applicants.</p>
        </div>
        <a href="/WS03/Public/listings/create" class="btn btn-primary">
            <i class="fa fa-edit"></i>
            Post a Job
        </a>
    </div>
</section>
<?php
loadPartial('footer');
?>