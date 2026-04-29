<?php
loadPartial('head');
loadPartial('navbar');
loadPartial('showcase');

$jobs = [
    [
        'category' => 'Engineering',
        'badge' => 'Local',
        'badgeClass' => '',
        'icon' => 'fa-code',
        'title' => 'Software Engineer',
        'description' => 'Develop software solutions and work with a team to build reliable applications.',
        'salary' => '$80,000',
        'location' => 'New York',
        'tags' => ['Development', 'Coding'],
    ],
    [
        'category' => 'Marketing',
        'badge' => 'Remote',
        'badgeClass' => 'remote',
        'icon' => 'fa-bullhorn',
        'title' => 'Marketing Specialist',
        'description' => 'Help manage campaigns and support promotional activities for the company.',
        'salary' => '$70,000',
        'location' => 'San Francisco',
        'tags' => ['Marketing', 'Advertising'],
    ],
    [
        'category' => 'Web',
        'badge' => 'Local',
        'badgeClass' => '',
        'icon' => 'fa-globe',
        'title' => 'Web Developer',
        'description' => 'Create and maintain websites and web applications for business needs.',
        'salary' => '$75,000',
        'location' => 'Los Angeles',
        'tags' => ['Web', 'Programming'],
    ],
    [
        'category' => 'Analytics',
        'badge' => 'Remote',
        'badgeClass' => 'remote',
        'icon' => 'fa-chart-line',
        'title' => 'Data Analyst',
        'description' => 'Interpret data and prepare reports that help guide business decisions.',
        'salary' => '$65,000',
        'location' => 'Chicago',
        'tags' => ['Data', 'Reports'],
    ],
    [
        'category' => 'Design',
        'badge' => 'Local',
        'badgeClass' => '',
        'icon' => 'fa-pen-nib',
        'title' => 'Graphic Designer',
        'description' => 'Design creative materials for branding, marketing, and communication.',
        'salary' => '$60,000',
        'location' => 'Miami',
        'tags' => ['Design', 'Creative'],
    ],
    [
        'category' => 'Data Science',
        'badge' => 'Remote',
        'badgeClass' => 'remote',
        'icon' => 'fa-database',
        'title' => 'Data Scientist',
        'description' => 'Analyze complex data sets and provide useful insights for company growth.',
        'salary' => '$90,000',
        'location' => 'Seattle',
        'tags' => ['Data', 'Analysis'],
    ],
];
?>

<section class="top-banner">
    <div class="top-banner-grid"></div>
    <div class="top-banner-orb top-banner-orb-one"></div>
    <div class="top-banner-orb top-banner-orb-two"></div>

    <div class="container mx-auto max-w-6xl px-4">
        <div class="top-banner-card">
            <div class="top-banner-wave"></div>
            <div class="top-banner-cursor-glow"></div>
            <div class="top-banner-shine"></div>

            <span class="top-banner-badge">
                <i class="fa fa-briefcase"></i>
                Job Marketplace
            </span>

            <h2>Explore Job Opportunities</h2>

            <p>
                Find available roles from different companies and take the next step in your career.
            </p>
        </div>
    </div>
</section>

<section class="jobs-section">
    <div class="container mx-auto max-w-6xl px-4">
        <div class="jobs-section-header">
            <span class="jobs-section-badge">Recent Listings</span>

            <h2 class="jobs-section-title">Available Jobs</h2>

            <p class="jobs-section-subtitle">
                Browse some of the latest job openings available on the platform.
            </p>
        </div>

        <div class="jobs-grid">
            <?php foreach ($jobs as $job): ?>
                <article class="job-card">
                    <div class="job-card-inner">
                        <div class="job-card-face job-card-front">
                            <div class="job-card-top">
                                <span class="job-card-category">
                                    <?= $job['category'] ?>
                                </span>

                                <span class="job-badge <?= $job['badgeClass'] ?>">
                                    <?= $job['badge'] ?>
                                </span>
                            </div>

                            <div class="job-preview-icon">
                                <i class="fa <?= $job['icon'] ?>"></i>
                            </div>

                            <h3 class="job-card-title">
                                <?= $job['title'] ?>
                            </h3>

                            <p class="job-card-description">
                                <?= $job['description'] ?>
                            </p>

                            <div class="job-preview-footer">
                                <span class="job-salary">
                                    <?= $job['salary'] ?>
                                </span>

                                <span class="job-flip-hint">
                                    Hover for details
                                </span>
                            </div>
                        </div>

                        <div class="job-card-face job-card-back">
                            <div class="job-card-back-header">
                                <span class="job-card-category">
                                    <?= $job['category'] ?>
                                </span>

                                <h3 class="job-card-title">
                                    <?= $job['title'] ?>
                                </h3>
                            </div>

                            <div class="job-card-meta">
                                <div class="job-meta-row">
                                    <span class="job-meta-label">Salary</span>
                                    <span class="job-salary"><?= $job['salary'] ?></span>
                                </div>

                                <div class="job-meta-row">
                                    <span class="job-meta-label">Location</span>
                                    <span class="job-location"><?= $job['location'] ?></span>
                                </div>

                                <div class="job-meta-row">
                                    <span class="job-meta-label">Type</span>
                                    <span class="job-location"><?= $job['badge'] ?></span>
                                </div>

                                <div class="job-meta-row job-tags-row">
                                    <span class="job-meta-label">Tags</span>

                                    <div class="job-tags">
                                        <?php foreach ($job['tags'] as $tag): ?>
                                            <span class="job-tag"><?= $tag ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>

                            <a href="/WS03/Public/listings/details" class="job-details-btn">
                                View Details
                            </a>
                        </div>
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

<section class="cta-section employer-cta-section">
    <div class="container mx-auto max-w-6xl px-4">
        <div class="cta-banner employer-cta-banner">
            <div class="cta-pattern"></div>
            <div class="cta-cursor-glow"></div>

            <div class="cta-content">
                <span class="cta-badge">
                    <i class="fa fa-bolt"></i>
                    Employer Launchpad
                </span>

                <h2>Ready to Hire Your Next Great Candidate?</h2>

                <p>
                    Create a standout job post, showcase your opportunity, and reach motivated
                    applicants faster with a polished listing.
                </p>

                <div class="cta-benefits">
                    <span><i class="fa fa-check"></i> Fast posting</span>
                    <span><i class="fa fa-users"></i> Wider reach</span>
                    <span><i class="fa fa-chart-line"></i> Better matches</span>
                </div>
            </div>

            <div class="cta-actions">
                <a href="/WS03/Public/listings/create" class="btn btn-primary cta-main-btn">
                    <i class="fa fa-edit"></i>
                    Post a Job
                </a>

                <span class="cta-action-note">
                    Takes less than 5 minutes
                </span>
            </div>
        </div>
    </div>
</section>

<script>
    document.querySelectorAll('.top-banner-card').forEach((card) => {
        card.addEventListener('mousemove', (event) => {
            const rect = card.getBoundingClientRect();

            const x = ((event.clientX - rect.left) / rect.width) * 100;
            const y = ((event.clientY - rect.top) / rect.height) * 100;

            card.style.setProperty('--mouse-x', `${x}%`);
            card.style.setProperty('--mouse-y', `${y}%`);
            card.style.setProperty('--mouse-x-number', x.toFixed(2));
            card.style.setProperty('--mouse-y-number', y.toFixed(2));
        });

        card.addEventListener('mouseenter', () => {
            card.classList.add('is-hovering');
        });

        card.addEventListener('mouseleave', () => {
            card.classList.remove('is-hovering');

            card.style.setProperty('--mouse-x', '50%');
            card.style.setProperty('--mouse-y', '50%');
            card.style.setProperty('--mouse-x-number', '50');
            card.style.setProperty('--mouse-y-number', '50');
        });
    });
</script>

<?php
loadPartial('footer');
?>