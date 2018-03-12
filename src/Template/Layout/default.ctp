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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>


    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('bootstrap-theme.min.css') ?>

    <?= $this->Html->script('bootstrap.min.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="navbar navbar-inverse" >
      <div clas="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand">Spo'tato</a>
        </div>
        <ul class="nav navbar-nav">
          <li <?=($this->request->here=="/SportDevProject/accounts/accueil"?'class="active"':'')?>><?= $this->html->link("Accueil",['controller' => 'Accounts','action' => 'Accueil'])?> </li>
          <li <?=($this->request->here=="/SportDevProject/accounts/classements"?'class="active"':'')?>><?= $this->html->link("Classements",['controller' => 'Accounts','action' => 'Classements'])?></li>
          <li <?=($this->request->here=="/SportDevProject/accounts/connexion"?'class="active"':'')?>><?= $this->html->link("Connexion",['controller' => 'Accounts','action' => 'Connexion'])?></li>
          <li <?=($this->request->here=="/SportDevProject/accounts/mon-compte"?'class="active"':'')?>><?= $this->html->link("Mon compte",['controller' => 'Accounts','action' => 'MonCompte'])?></li>
          <li <?=($this->request->here=="/SportDevProject/accounts/objets-connectes"?'class="active"':'')?>><?= $this->html->link("Objets connectés",['controller' => 'Accounts','action' => 'ObjetsConnectes'])?></li>
          <li <?=($this->request->here=="/SportDevProject/accounts/sceances"?'class="active"':'')?>><?= $this->html->link("Scéances",['controller' => 'Accounts','action' => 'Sceances'])?></li>
        </ul>
      </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix col-xs-12">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
