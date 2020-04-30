<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

// print_r($users);
?>

<h1>Clients</h1>
<ul>
    <?php foreach ($users as $user=>$payment) : ?>
        <li>
            <?= Html::encode($user) . ': '; ?>
            <?= Html::encode($payment); ?>
        </li>
    <?php endforeach; ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination]); ?>