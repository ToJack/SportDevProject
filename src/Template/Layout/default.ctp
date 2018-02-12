<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-10 medium-12 columns">
            <li class="name large-2 medium-4 columns">
              <h1><a href="accueil"><?= "Accueil"?></a></h1>
            </li>
            <li class="name large-2 medium-4 columns">
              <h1><a href="classements"><?= "Classements"?></a></h1>
            </li>
            <li class="name large-2 medium-4 columns">
              <h1><a href="connexion"><?= "Connexion"?></a></h1>
            </li>
            <li class="name large-2 medium-4 columns">
              <h1><a href="mon_compte"><?= "Mon compte"?></a></h1>
            </li>
            <li class="name large-2 medium-4 columns">
              <h1><a href="objets_connectes"><?= "Objets connectés"?></a></h1>
            </li>
            <li class="name large-2 medium-4 columns">
              <h1><a href="sceances"><?= "Scéances"?></a></h1>
            </li>
        </ul>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
