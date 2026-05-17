<?php

/** @var object $listing */

use Framework\Authorization;

loadPartial('head');
loadPartial('navbar');
loadPartial('showcase-search');
?>

<section class="container mx-auto p-4 mt-4">
    <div class="rounded-lg shadow-md bg-white p-3">

        <?php loadPartial('message'); ?>

        <div class="flex justify-between items-center">
            <a class="block p-4 text-blue-700" href="/WS03/Public/listings">
                <i class="fa fa-arrow-alt-circle-left"></i>
                Back To Listings
            </a>

            <?php if (Framework\Authorization::isOwner($listing->user_id)) : ?>
                <div class="flex space-x-4 ml-4">

                    <!-- Edit Button -->

                    <a
                        href="/WS03/Public/listings/edit/<?= $listing->id ?>"
                        style="padding:10px 16px; background:#2563eb; color:white; border-radius:6px; text-decoration:none;">
                        Edit
                    </a>

                    <!-- Delete Form -->
                    <form
                        method="POST"
                        action="/WS03/Public/listings/<?= $listing->id ?>">

                        <input type="hidden" name="_method" value="DELETE">

                        <button
                            type="submit"
                            style="padding:10px 16px; background:#dc2626; color:white; border:none; border-radius:6px;">

                            Delete
                        </button>
                    </form>
                    <!-- End Delete Form -->

                </div>
            <?php endif; ?>
        </div>

        <div class="p-4">

            <h2 class="text-xl font-semibold">
                <?= htmlspecialchars($listing->title ?? 'Untitled Job') ?>
            </h2>

            <p class="text-gray-700 text-lg mt-2">
                <?= htmlspecialchars($listing->description ?? 'No description available.') ?>
            </p>

            <ul class="my-4 bg-gray-100 p-4">

                <li class="mb-2">
                    <strong>Salary:</strong>

                    <?= formatSalary($listing->salary ?? '') ?>
                </li>

                <li class="mb-2">

                    <strong>Location:</strong>

                    <?= htmlspecialchars($listing->city ?? 'Unknown') ?>,
                    <?= htmlspecialchars($listing->state ?? 'Unknown') ?>

                    <span class="text-xs bg-blue-500 text-white rounded-full px-2 py-1 ml-2">
                        Local
                    </span>
                </li>

                <li class="job-tags">

                    <?php $tags = explode(',', $listing->tags ?? ''); ?>

                    <?php foreach ($tags as $tag) : ?>

                        <?php if (trim($tag) !== '') : ?>

                            <span class="job-tag">
                                <?= htmlspecialchars(trim($tag)) ?>
                            </span>

                        <?php endif; ?>

                    <?php endforeach; ?>

                </li>

            </ul>
        </div>
    </div>
</section>

<section class="container mx-auto p-4">

    <h2 class="text-xl font-semibold mb-4">
        Job Details
    </h2>

    <div class="rounded-lg shadow-md bg-white p-4">

        <h3 class="text-lg font-semibold mb-2 text-blue-500">
            Job Requirements
        </h3>

        <p>
            <?= htmlspecialchars($listing->requirements ?? 'No requirements listed.') ?>
        </p>

        <h3 class="text-lg font-semibold mt-4 mb-2 text-blue-500">
            Benefits
        </h3>

        <p>
            <?= htmlspecialchars($listing->benefits ?? 'No benefits listed.') ?>
        </p>

    </div>

    <p class="my-5">
        Put "Job Application" as the subject of your email and attach your resume.
    </p>

    <a
        href="mailto:<?= htmlspecialchars($listing->email ?? '') ?>"
        class="block w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium cursor-pointer text-indigo-700 bg-indigo-100 hover:bg-indigo-200">

        Apply Now
    </a>

</section>

<?php
loadPartial('footer');
?>