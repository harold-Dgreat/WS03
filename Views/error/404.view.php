<?php loadPartial('head'); ?>
<?php loadPartial('navbar'); ?>

<section class="error-page error-page-404">
    <div class="error-grid-bg"></div>

    <div class="error-orb error-orb-one"></div>
    <div class="error-orb error-orb-two"></div>
    <div class="error-orb error-orb-three"></div>

    <div class="error-wrap">
        <div class="error-card error-card-404">
            <div class="error-card-scan"></div>

            <div class="error-floating-chip error-chip-one">
                <i class="fa fa-link-slash"></i>
                Broken Route
            </div>

            <div class="error-floating-chip error-chip-two">
                <i class="fa fa-triangle-exclamation"></i>
                Page Missing
            </div>

            <div class="error-icon-wrap">
                <div class="error-ring error-ring-one"></div>
                <div class="error-ring error-ring-two"></div>
                <div class="error-ring error-ring-three"></div>

                <div class="error-icon-core error-icon-404">
                    <span>404</span>
                </div>
            </div>

            <span class="error-badge">
                <i class="fa fa-bug"></i>
                Route Not Found
            </span>

            <h1 class="error-title error-glitch" data-text="Page Not Found">
                Page Not Found
            </h1>

            <p class="error-text">
                The page you are trying to open does not exist, was moved, or the URL is incorrect.
            </p>

            <div class="error-actions">
                <a href="/WS03/Public/" class="btn error-btn-primary">
                    <i class="fa fa-house"></i>
                    Back to Home
                </a>

                <a href="/WS03/Public/listings" class="btn error-btn-secondary">
                    <i class="fa fa-briefcase"></i>
                    Browse Jobs
                </a>
            </div>
        </div>
    </div>
</section>

<?php loadPartial('footer'); ?>