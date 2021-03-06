<?php require VIEW_ROOT . '/admin/templates/header.php'; ?>

      <h2>Добавление раздела</h2>

      <?php require VIEW_ROOT . '/templates/alerts.php'; ?>

      <form action="<?= BASE_URL ?>/admin/section/add.php" method="POST" enctype='multipart/form-data'>
        <div class="form-group">
          <label for="title">Название</label>
          <input type="text" class="form-control" name="title" id="title">
        </div>
        <div class="form-group">
          <label for="text">Текст</label>
          <textarea class="form-control" name="text" id="text" rows="10"></textarea>
        </div>
        <div class="form-group">
          <label for="status">Статус</label>
          <input type="number" class="form-control" name="status" id="status" value="1">
        </div>
        <button type="submit" class="btn btn-primary">Добавить</button>
      </form>

<?php require VIEW_ROOT . '/admin/templates/footer.php'; ?>
