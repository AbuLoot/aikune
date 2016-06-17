<?php require VIEW_ROOT . '/admin/templates/header.php'; ?>

      <h2>Edit section</h2>

      <?php require VIEW_ROOT . '/templates/alerts.php'; ?>

      <form action="<?= BASE_URL ?>/admin/section/edit.php" method="POST" enctype='multipart/form-data'>
        <input type="hidden" class="form-control" name="id" value="<?= $item['id'] ?>">
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" name="title" id="title" value="<?= $item['title'] ?>">
        </div>
        <div class="form-group">
          <label for="text">Text</label>
          <textarea class="form-control" name="text" id="text" rows="10"><?= $item['text'] ?></textarea>
        </div>
        <div class="form-group">
          <label for="status">Status</label>
          <input type="number" class="form-control" name="status" id="status" value="<?= $item['status'] ?>">
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
      </form>

<?php require VIEW_ROOT . '/admin/templates/footer.php'; ?>
