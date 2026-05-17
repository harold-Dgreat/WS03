<?php
$listings = $listings ?? [];

loadPartial('head');
loadPartial('navbar');
?>

<section class="top-banner">
    <div class="container mx-auto max-w-6xl px-4">
        <h2>All Job Listings</h2>
        <p>
            Browse available job opportunities from different categories and companies.
        </p>
    </div>
</section>

<section class="jobs-section">
    <div class="container mx-auto max-w-6xl px-4">
        <div class="jobs-section-header">
            <span class="jobs-section-badge">
                <?php if (isset($keywords)): ?>
                    Search Results for: <?=
                                        htmlspecialchars($keywords) ?>
                <?php else : ?>
                    All Jobs
                <?php endif; ?>
            </span>
            <h2 class="jobs-section-title">Available Opportunities</h2>
            <p class="jobs-section-subtitle">
                Find the right job based on your skills, location, and preferred work setup.
            </p>
            <?php loadPartial('message'); ?>
        </div>

        <div class="jobs-grid">
            <?php foreach ($listings as $listing) : ?>
                <article class="job-card">
                    <div class="job-card-content">
                        <!-- Top row: Company and badge -->
                        <div class="job-card-top">
                            <span class="job-card-category">
                                <?= htmlspecialchars_decode($listing->company ?? 'Company') ?>
                            </span>
                            <span class="job-badge">Local</span>
                        </div>

                        <!-- Job icon -->
                        <div class="job-preview-icon">
                            <i class="fa fa-briefcase"></i>
                        </div>

                        <!-- Job title -->
                        <h3 class="job-card-title">
                            <?= htmlspecialchars($listing->title ?? 'Untitled Job') ?>
                        </h3>

                        <!-- Job description, limited to 150 characters -->
                        <p class="job-card-description">
                            <?= htmlspecialchars(strlen($listing->description ?? '') > 150
                                ? substr($listing->description, 0, 147) . '...'
                                : $listing->description ?? 'No description available.') ?>
                        </p>

                        <!-- Job meta details -->
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
                                    <?php
                                    $tags = explode(',', $listing->tags ?? '');
                                    foreach ($tags as $tag) :
                                        $tag = trim($tag);
                                        if ($tag !== '') :
                                    ?>
                                            <span class="job-tag"><?= htmlspecialchars($tag) ?></span>
                                    <?php
                                        endif;
                                    endforeach;
                                    ?>
                                </div>
                            </div>
                        </div>

                        <!-- View Details button -->
                        <a href="/WS03/Public/listings/<?= htmlspecialchars($listing->id ?? '') ?>" class="job-details-btn">
                            View Details
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

        <div class="back-link-wrap">
            <a href="/WS03/Public/" class="back-link">
                <i class="fa fa-arrow-left"></i>
                <span>Back to Home</span>
            </a>
        </div>
    </div>
</section>

<?php
loadPartial('footer');
?>