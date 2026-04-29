<?php
loadPartial('head');
loadPartial('navbar');

$jobs = [
    [
        'category' => 'Engineering',
        'badge' => 'Local',
        'badgeClass' => '',
        'icon' => 'fa-code',
        'title' => 'Software Engineer',
        'description' => 'We are seeking a skilled software engineer to develop high-quality software solutions.',
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
        'description' => 'We are looking for a Marketing Specialist to create and manage marketing campaigns.',
        'salary' => '$70,000',
        'location' => 'San Francisco',
        'tags' => ['Marketing', 'Advertising'],
    ],
    [
        'category' => 'Development',
        'badge' => 'Local',
        'badgeClass' => '',
        'icon' => 'fa-globe',
        'title' => 'Web Developer',
        'description' => 'Join our team as a Web Developer and create amazing web applications.',
        'salary' => '$75,000',
        'location' => 'Los Angeles',
        'tags' => ['Web Development', 'Programming'],
    ],
    [
        'category' => 'Analytics',
        'badge' => 'Remote',
        'badgeClass' => 'remote',
        'icon' => 'fa-chart-line',
        'title' => 'Data Analyst',
        'description' => 'We are hiring a Data Analyst to analyze and interpret data for insights.',
        'salary' => '$65,000',
        'location' => 'Chicago',
        'tags' => ['Data Analysis', 'Statistics'],
    ],
    [
        'category' => 'Design',
        'badge' => 'Local',
        'badgeClass' => '',
        'icon' => 'fa-pen-nib',
        'title' => 'Graphic Designer',
        'description' => 'Join our creative team as a Graphic Designer and bring ideas to life.',
        'salary' => '$60,000',
        'location' => 'Miami',
        'tags' => ['Graphic Design', 'Creative'],
    ],
    [
        'category' => 'Data Science',
        'badge' => 'Remote',
        'badgeClass' => 'remote',
        'icon' => 'fa-database',
        'title' => 'Data Scientist',
        'description' => "We're looking for a Data Scientist to analyze complex data and generate insights.",
        'salary' => '$90,000',
        'location' => 'Seattle',
        'tags' => ['Data Science', 'Machine Learning'],
    ],
];
?>

<section class="jobs-section">
    <div class="container mx-auto max-w-6xl px-4">
        <div class="jobs-section-header">
            <span class="jobs-section-badge">All Opportunities</span>

            <h1 class="jobs-section-title">Browse All Jobs</h1>

            <p class="jobs-section-subtitle">
                Explore available openings across engineering, design, marketing, and data roles.
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