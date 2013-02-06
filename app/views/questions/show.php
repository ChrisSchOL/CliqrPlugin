<?
$body_id = "cliqr-show";
$id = $question->getVoteID();

$poll_url = $controller->poll_url($cid);
$short_url = $shortener->shorten($poll_url);
?>

<div class="question state-<?= htmlReady($question->getState()) ?>">

  <h2><?= htmlReady($question->getQuestion()) ?></h2>

  <?= $this->render_partial('questions/_show_controls', compact('id')) ?>

  <img class="qr" src="<?= $controller->url_for('qr', $cid) ?>">

  <div class="appeal vote">
    <a class="short" alt="Vote:" href="<?= $poll_url ?>"><?= $short_url ?></a>
    <a class="qr" href="<?= $controller->url_for('qr', $cid) ?>"></a>
  </div>
  <div class="appeal start">
    <form action="<?= $controller->url_for('questions/start', $id) ?>" method="POST">
      <?= CSRFProtection::tokenTag() ?>
      <?= \STUDIP\Button::create($question->isNew() ? _("Frage starten") : _("Frage erneut starten"), '') ?>
    </form>
    <span class="loader">
      loading&hellip;
    </span>
  </div>

</div>



<script>
// bootstrap shown question
cliqr.model.$currentQuestion = <?= json_encode($question->toJSON()) ?>;
</script>
