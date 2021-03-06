<?php require VIEW_ROOT . '/admin/templates/header.php'; ?>

      <p class="text-right"><a class="btn btn-success" href="<?= BASE_URL ?>/admin/section/add.php">Добавить раздел</a></p>

      <?php if (empty($section)) : ?>
        <p>Нет разделов в данный момент</p>
      <?php else: ?>
        <h3>Разделы</h3>
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Название</th>
              <th>Статус</th>
              <th>Функции</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($section as $item) : ?>
              <tr>
                <td><?= $i++ ?></td>
                <td><?= $item['title'] ?></td>
                <td><?= ($item['status'] == 1) ? 'Активен' : 'Неактивен' ?></td>
                <td><a href="<?= BASE_URL ?>/admin/section/edit.php?id=<?= $item['id'] ?>">Редактировать</a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      <?php endif; ?>

<?php require VIEW_ROOT . '/admin/templates/footer.php'; ?>
