<?php require VIEW_ROOT . '/admin/templates/header.php'; ?>

      <p class="text-right"><a class="btn btn-success" href="<?= BASE_URL ?>/admin/section/add.php">Add section</a></p>

      <?php if (empty($section)) : ?>
        <p>No data at the moment</p>
      <?php else: ?>
        <h3>Section</h3>
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Status</th>
              <th>Functions</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($section as $item) : ?>
              <tr>
                <td><?= $i++ ?></td>
                <td><?= $item['title'] ?></td>
                <td><?= ($item['status'] == 1) ? 'Активен' : 'Неактивен' ?></td>
                <td><a href="<?= BASE_URL ?>/admin/section/edit.php?id=<?= $item['id'] ?>">Edit</a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      <?php endif; ?>

<?php require VIEW_ROOT . '/admin/templates/footer.php'; ?>
