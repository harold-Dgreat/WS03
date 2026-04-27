<?php loadPartial('head'); ?>
<?php loadPartial('navbar'); ?>

<section class="error-page error-page-403">
    <div class="error-grid-bg"></div>

    <div class="error-orb error-orb-one"></div>
    <div class="error-orb error-orb-two"></div>
    <div class="error-orb error-orb-three"></div>

    <div class="error-wrap">
        <div class="error-card error-card-403">
            <div class="error-card-scan"></div>

            <div class="error-floating-chip error-chip-one">
                <i class="fa fa-lock"></i>
                Restricted
            </div>

            <div class="error-floating-chip error-chip-two">
                <i class="fa fa-shield-halved"></i>
                Permission Required
            </div>

            <div class="error-icon-wrap">
                <div class="error-ring error-ring-one"></div>
                <div class="error-ring error-ring-two"></div>
                <div class="error-ring error-ring-three"></div>

                <div class="error-icon-core error-icon-403">
                    <i class="fa fa-lock"></i>
                </div>
            </div>

            <span class="error-badge error-badge-403">
                <i class="fa fa-ban"></i>
                Error 403
            </span>

            <h1 class="error-title error-glitch" data-text="Access Denied">
                Access Denied
            </h1>

            <p class="error-text">
                You do not have permission to access this page. It may be restricted,
                require authentication, or need additional privileges.
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