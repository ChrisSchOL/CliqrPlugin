  <div class="controls">

  <!-- STOP -->
    <? if ($question->isActive()) : ?>
      <form action="<?= $controller->url_for('questions/stop', $id) ?>" method="POST">
        <?= CSRFProtection::tokenTag() ?>
        <?= \STUDIP\Button::create(_("Stoppen"), '') ?>
      </form>
    <? endif ?>

  <!-- EDIT -->
    <? if (!$question->isActive()) : ?>
    <?= \STUDIP\LinkButton::create(_("�ndern"),  $controller->url_for('questions') . '#edit-' . $id) ?>
    <? endif ?>

  <!-- DELETE -->
    <form class="questions-destroy"
          action="<?= $controller->url_for('questions/destroy', $id) ?>"
          method="POST"
          data-confirm="<?= ("Wollen Sie die Frage wirklich l�schen?") ?>">
      <?= \STUDIP\Button::create(_("L�schen")) ?>
    </form>

  <!-- FULLSCREEN -->
    <?= \STUDIP\Button::create(_("Vollbild"), 'fullscreen', array('class' => 'fullscreen')) ?>


  </div>
