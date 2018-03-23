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


      <?= $this->Html->css('bootstrap.min'); ?>
      <?= $this->Html->css('bootstrap-theme.min'); ?>
      <?= $this->Html->css('perso'); ?>

      <?= $this->Html->script('jquery-3.3.1.min'); ?>
      <?= $this->Html->script('bootstrap.min'); ?>
      <?= $this->Html->script('fonctions'); ?>

      <?= $this->fetch('meta'); ?>
      <?= $this->fetch('css'); ?>
      <?= $this->fetch('script'); ?>
      <?php $adresse=$this->request->webroot;
      $adresse=str_replace('\\', "/",$adresse);
      ?>
  </head>
  <body onload=<?="\"changeImg('".$adresse."')\""?> >
      <!---navbar fixed--->
      <nav class="navbar navbar-inverse navbar-fixed-top" >
        <div clas="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand">App Sport</a>
          </div>
          <ul class="nav navbar-nav">
            <li <?=($this->request->params['action']=="accueil"?'class="active"':'')?>><?= $this->html->link("Accueil",['controller' => 'Accounts','action' => 'Accueil'])?> </li>
            <li <?=($this->request->params['action']=="classements"?'class="active"':'')?>><?= $this->html->link("Classements",['controller' => 'Accounts','action' => 'Classements'])?></li>
            <li <?=($this->request->params['action']=="competitions"?'class="active"':'')?>><?= $this->html->link("Compétitions",['controller' => 'Accounts','action' => 'competitions'])?></li>
            <li <?=($this->request->params['action']=="connexion"?'class="active"':'')?>><?= $this->html->link("Connexion",['controller' => 'Accounts','action' => 'Connexion'])?></li>
            <li <?=($this->request->params['action']=="monCompte"?'class="active"':'')?>><?= $this->html->link("Mon compte",['controller' => 'Accounts','action' => 'MonCompte'])?></li>
            <li <?=($this->request->params['action']=="objetsConnectes"?'class="active"':'')?>><?= $this->html->link("Objets connectés",['controller' => 'Accounts','action' => 'ObjetsConnectes'])?></li>
            <li <?=($this->request->params['action']=="seances"?'class="active"':'')?>><?= $this->html->link("Séances",['controller' => 'Accounts','action' => 'seances'])?></li>
            <li <?=($this->request->params['action']=="Contact"?'class="active"':'')?>><?= $this->html->link("Contact",['controller' => 'Accounts','action' => 'Contact'])?></li>
            <li <?=($this->request->params['action']=="Equipe"?'class="active"':'')?>><?= $this->html->link("Equipe",['controller' => 'Accounts','action' => 'Equipe'])?></li>
            <li <?=($this->request->params['action']=="faq"?'class="active"':'')?>><?= $this->html->link("FAQ",['controller' => 'Accounts','action' => 'faq'])?></li>
        </div>
      </nav>
      <div id="imgMarginLeft" class="col-xs-1 col-sm-2 affix"></div>
      <div class="col-xs-1 col-sm-2"></div>
      <div id="waitForMargin" class="container clearfix col-xs-10 col-sm-8">
          <?= $this->Flash->render() ?>
          <?= $this->fetch('content') ?>
      </div>
      <div id="imgMarginRight" class="col-xs-1 col-sm-2 affix"></div>
      <div class="col-xs-1 col-sm-2"></div>

      <div class="margeFooter col-xs-10 col-xs-offset-1"></div>
      <footer class="footer text-center col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
        <p>App Sport - Kourganoff/Jacquin/Bonifacio/Akherraz - Options : CE</p>
      </footer>
  </body>
</html>
