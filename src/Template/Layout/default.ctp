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
        <?= $this->request->params['action'] ?>
    </title>
    <?= $this->Html->meta('favicon.ico', '/webroot/favicon.ico', array ('type' => 'icon' )) ?>


    <?= $this->Html->css('bootstrap.min') ?>
    <?= $this->Html->css('bootstrap-theme.min') ?>

    <?= $this->Html->script('jquery-3.3.1.min') ?>
    <?= $this->Html->script('bootstrap.min') ?>
    <?= $this->Html->script('basic_script') ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

</head>
<body>
  <!---Navbar fantôme pour remplir l'espace creux de la navbar fixed--->
    <nav class="navbar navbar-inverse" >
      <div clas="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand">Spo'tato</a>
      </div>
      <ul class="nav navbar-nav">
        <li <?=($this->request->params['action']=="accueil"?'class="active"':'')?>><?= $this->html->link("Accueil",['controller' => 'Accounts','action' => 'Accueil'])?> </li>
        <li <?=($this->request->params['action']=="classements"?'class="active"':'')?>><?= $this->html->link("Classements",['controller' => 'Accounts','action' => 'Classements'])?></li>
        <li <?=($this->request->params['action']=="connexion"?'class="active"':'')?>><?= $this->html->link("Connexion",['controller' => 'Accounts','action' => 'Connexion'])?></li>
        <li <?=($this->request->params['action']=="monCompte"?'class="active"':'')?>><?= $this->html->link("Mon compte",['controller' => 'Accounts','action' => 'MonCompte'])?></li>
        <li <?=($this->request->params['action']=="objetsConnectes"?'class="active"':'')?>><?= $this->html->link("Objets connectés",['controller' => 'Accounts','action' => 'ObjetsConnectes'])?></li>
        <li <?=($this->request->params['action']=="seances"?'class="active"':'')?>><?= $this->html->link("Séances",['controller' => 'Accounts','action' => 'seances'])?></li>
      </ul>
    </div></nav>
    <!---navbar fixed--->
    <nav class="navbar navbar-inverse navbar-fixed-top" >
      <div clas="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand">Spo'tato</a>
        </div>
        <ul class="nav navbar-nav">
          <li <?=($this->request->params['action']=="accueil"?'class="active"':'')?>><?= $this->html->link("Accueil",['controller' => 'Accounts','action' => 'Accueil'])?> </li>
          <li <?=($this->request->params['action']=="classements"?'class="active"':'')?>><?= $this->html->link("Classements",['controller' => 'Accounts','action' => 'Classements'])?></li>
          <li <?=($this->request->params['action']=="connexion"?'class="active"':'')?>><?= $this->html->link("Connexion",['controller' => 'Accounts','action' => 'Connexion'])?></li>
          <li <?=($this->request->params['action']=="monCompte"?'class="active"':'')?>><?= $this->html->link("Mon compte",['controller' => 'Accounts','action' => 'MonCompte'])?></li>
          <li <?=($this->request->params['action']=="objetsConnectes"?'class="active"':'')?>><?= $this->html->link("Objets connectés",['controller' => 'Accounts','action' => 'ObjetsConnectes'])?></li>
          <li <?=($this->request->params['action']=="seances"?'class="active"':'')?>><?= $this->html->link("Séances",['controller' => 'Accounts','action' => 'seances'])?></li>
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
