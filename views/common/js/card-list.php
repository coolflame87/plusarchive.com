<?php

/*
 * This file is part of the plusarchive.com
 *
 * (c) Tomoki Morita <tmsongbooks215@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * @var yii\web\View $this
 */

$this->registerJs(<<<'JS'
$(document).on('ready pjax:success', function() {
    var $card = $('.card-container').masonry({ transitionDuration: 0 });
    $(window).load(function() {
        $card.masonry('layout');
    });
});
JS
);
