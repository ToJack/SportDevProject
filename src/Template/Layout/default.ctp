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
        <?= $this->request->params['action'] ?>
    </title>
    <?= $this->Html->meta('favicon.ico', '/webroot/favicon.ico', array('type' => 'icon')) ?>


    <?= $this->Html->css('bootstrap.min'); ?>
    <?= $this->Html->css('bootstrap-theme.min'); ?>
    <?= $this->Html->css('perso'); ?>

    <?= $this->Html->script('jquery-3.3.1.min'); ?>
    <?= $this->Html->script('bootstrap.min'); ?>
    <?= $this->Html->script('fonctions'); ?>

    <?= $this->fetch('meta'); ?>
    <?= $this->fetch('css'); ?>
    <?= $this->fetch('script'); ?>
    <?php $adresse = $this->request->webroot;
    $adresse = str_replace('\\', "/", $adresse);
    ?>
</head>
<body onload=<?= "\"changeImg('" . $adresse . "')\"" ?>>
<!--navbar fixed-->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand">App Sport</a>
        </div>
        <ul class="nav navbar-nav">
            <!--accueil -->
            <li <?= ($this->request->params['action'] == "accueil" ? 'class="active"' : '') ?>><?= $this->Html->link("Accueil", ['controller' => 'Accounts', 'action' => 'Accueil']) ?> </li>
            <!--connexion -->
            <?php if (!$authUser) echo "<li " . ($this->request->params['action'] == "login" ? 'class="active"' : '') . ">" . $this->Html->link("Connexion", ['controller' => 'Accounts', 'action' => 'login']) . " </li>"; ?>
            <!--classements -->
            <li <?= ($this->request->params['action'] == "classements" ? 'class="active"' : '') ?>><?= $this->Html->link("Classements", ['controller' => 'Accounts', 'action' => 'Classements']) ?></li>
            <!--competitions -->
            <?php if ($authUser) echo "<li " . ($this->request->params['action'] == "competitions" ? 'class="active"' : '') . ">" . $this->Html->link("Compétitions", ['controller' => 'Accounts', 'action' => 'competitions']) . " </li>"; ?>
            <!--Mon compte -->
            <?php if ($authUser) echo "<li " . ($this->request->params['action'] == "monCompte" ? 'class="active"' : '') . ">" . $this->Html->link("Mon compte", ['controller' => 'Accounts', 'action' => 'MonCompte']) . " </li>"; ?>
            <!--Mes objets co -->
            <?php if ($authUser) echo "<li " . ($this->request->params['action'] == "objetsConnectes" ? 'class="active"' : '') . ">" . $this->Html->link("Mes objets connectés", ['controller' => 'Accounts', 'action' => 'ObjetsConnectes']) . " </li>"; ?>
            <!--Mes seances -->
            <?php if ($authUser) echo "<li " . ($this->request->params['action'] == "seances" ? 'class="active"' : '') . ">" . $this->Html->link("Séances", ['controller' => 'Accounts', 'action' => 'seances']) . " </li>"; ?>
            <!--Déconnexion -->
            <?php if ($authUser) echo "<li class='pull-right'>" . $this->Html->link("Déconnexion", ['controller' => 'Accounts', 'action' => 'logout']) . " </li>"; ?>
        </ul>
    </div>
</nav>


<div id="imgMarginLeft" class="col-xs-1 col-sm-2 affix"></div>
<div class="col-xs-1 col-sm-2"></div>
<div id="waitForMarginContenu" class="container clearfix col-xs-10 col-sm-8">
    <h3><?= $this->Flash->render() ?></h3>
    <?= $this->fetch('content') ?>
</div>
<div id="imgMarginRight" class="col-xs-1 col-sm-2 affix"></div>
<div class="col-xs-1 col-sm-2"></div>

<div class="margeFooter col-xs-10 col-xs-offset-1"></div>
<!--Footer-->
<footer id='waitForMarginFooter' class="footer col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
    <!--Footer Links-->
    <div class="container-fluid text-center">
        <div class="row">
            <!--First column-->
            <div class="col-xs-8 ">
                <h5 class="text-uppercase titre-footer">APP Sport</h5>
                <p class='text-footer'>Ce site à été crée dans le cadre d'un projet de 4ème année de la majeure OCRES à
                    l'ECE
                    Paris.</p>
                <p class='text-footer'>Développeurs Web : Kourganoff / Jacquin / Bonifacio / Akherraz</p>
                <p class='text-footer'>Options : CE</p>
            </div>
            <!--Second column-->
            <div class="col-xs-4 border-left">
                <h5 class="text-uppercase titre-footer">Liens</h5>
                <ul class="list-unstyled text-footer">
                    <li><?= $this->Html->link("Contact", ['controller' => 'Accounts', 'action' => 'contact']) ?></li>
                    <li><?= $this->Html->link("Equipe", ['controller' => 'Accounts', 'action' => 'equipe']) ?></li>
                    <li><?= $this->Html->link("FAQ", ['controller' => 'Accounts', 'action' => 'faq']) ?></li>
                    <li><?= $this->Html->link("Mentions légales", ['controller' => 'Accounts', 'action' => 'mentionsLegales']) ?></li>
                    <li><?= $this->Html->link("Versioning","/versions.log") ?></li>
                    <li><?= $this->Html->link('Site online', 'http://rescord.fr/SportDevProject' )?></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!--/.Footer-->
</body>
</html>
