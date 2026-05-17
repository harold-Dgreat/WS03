  <?php if (isset($errors)) : ?>
      <?php foreach ($errors as $error) : ?>
          <div class="error-message"><?= htmlspecialchars($error) ?></div>
      <?php endforeach; ?>
  <?php endif; ?>