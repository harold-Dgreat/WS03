<?php loadPartial('head'); ?>
<?php loadPartial('navbar'); ?>

<section>
    <div class="container mx-auto p-4 mt-4">
        <div class="text-center text-3xl mb-4 font-bold border-gray-300 p-3">
            <?= $status ?? 'Error' ?>
        </div>

        <div class="text-center text-lg">
            <?= $message ?? 'An error occurred.' ?>

            <a class="block text-center" href="/WS03/Public/listings">
                Go back to Listings
            </a>
        </div>
    </div>
</section>

<?php loadPartial('footer'); ?>