
<h2>Mes anciennes commandes</h2>
<ul class="history-list">
<?php foreach($orders as $o): ?>
    <li>Commande #<?= $o->id ?> - <?= $o->total_price ?> € - le <?= $o->created_at ?> (<?= $o->status ?>)</li>
<?php endforeach; ?>
</ul>
