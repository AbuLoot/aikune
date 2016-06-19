<?php require VIEW_ROOT . '/admin/templates/header.php'; ?>

      <?php if (empty($apps)) : ?>
        <p>Нет заявок на данный момент</p>
      <?php else: ?>
        <h3>Заявки</h3>
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Имя</th>
              <th>Номер</th>
              <th>Функции</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($apps as $app) : ?>
              <tr>
                <td><?= $i++ ?></td>
                <td><?= $app['name'] ?></td>
                <td><?= $app['phone'] ?></td>
                <td><a href="<?= BASE_URL ?>/admin/apps/delete.php?id=<?= $app['id'] ?>">Удалить</a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      <?php endif; ?>

<?php require VIEW_ROOT . '/admin/templates/footer.php'; ?>
