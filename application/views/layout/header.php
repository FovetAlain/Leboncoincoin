  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo base_url();?>"><span class="bleu">LaBonneLoc'</span></a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li id="btnAccueil" class="active"><a href="<?php echo base_url();?>">Accueil</a></li>
      <li id="btnDepot"><a href="<?php echo base_url('Annonces');?>">Déposez une annonce</a></li>
      <?php 
      if(isset($this->session->logged_in) && $this->session->logged_in === true){ ?>
        <li><a href="<?php echo base_url('Compte');?>"><span class="glyphicon glyphicon-user"></span> <?php echo $this->session->prenom; ?></a></li>
        <li><a href="<?php echo base_url('Connexion/logout');?>"><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a></li>
  <?php }else{ ?>
        <li><a href="<?php echo base_url('Inscription');?>" data-toggle="modal" data-target="#modalInscription"><span class="glyphicon glyphicon-user"></span> Inscription</a></li>
        <li><a href="<?php echo base_url('Connexion');?>" data-toggle="modal" data-target="#modalConnexion"><span class="glyphicon glyphicon-user"></span> Connexion</a></li>
<?php } ?>
      
    </ul>
  </div>