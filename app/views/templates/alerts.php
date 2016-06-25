
      <?php if (isset($_SESSION['notifications'])) : ?>
        <!-- ERROR -->
        <div class="alert alert-danger">
          <?php foreach ($_SESSION['notifications'] as $key => $notifications) : ?>
            <ul>
              <?php foreach ($notifications as $notification) : ?>
                <li><?= $key . ' - ' . $notification ?></li>
              <?php endforeach; ?>
            </ul>
          <?php endforeach; ?>
        </div>
        <?php unset($_SESSION['notifications']); ?>
      <?php endif; ?>

      <?php if (isset($_SESSION['success'])) : ?>
        <!-- SUCCESS -->
        <div class="alert alert-success">
          <p>Спасибо, Вам скоро позвонят!</p>
        </div>
      <?php endif; ?>
