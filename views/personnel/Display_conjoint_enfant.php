


<div class="row content" style="margin:0px;">

  <div class="col-sm-2 sidenav">
      <div class="well">
        <?php foreach($selected_personnel as $row) :?>
          <img style="width:100%; align:center;" class = "img-responsive" src = "<?php echo base_url('assets/images/profil_pics/'.$row->photo); ?>"/>
        <?php endforeach;?>      
      </div>

      <div class="well">
        <?php foreach($selected_personnel as $row) :?>
          <img style="width:100%; align:center;" class = "img-responsive" src = "<?php echo base_url('assets/images/qrcode/'.$row->matricule.'.png'); ?>"/>
        <?php endforeach;?>      
      </div>
  </div>
    

    <div class="col-sm-8"> 
      <div id="logo" style="background-color: white;opacity: 0.95; animation: fondu 15s ease-in-out infinite both; float:center; height:550px;padding: 10px;">                           

          <div class="row">
              <div class="col-md-12">
              <h3 style="height:40px; font-size:25px;"><center><u>Conjoint(e)</u></center></h3>
              <table class="table table-hover table-responsive table-striped">
                <tr>
                  <td>Nom</td>
                  <td>Prénoms</td>
                  <td>Date de naissance</td>
                  <td>Père</td>
                  <td>Mère</td>
                  <td>Emploi</td>
                </tr>

                <tr>
	                <?php foreach($selected_personnel as $row) :?>
	                  <td><?php echo $row->nom_conjoint;?></td>
	                  <td><?php echo $row->prenom_conjoint;?></td>
	                  <td><?php echo $row->date_naiss_conjoint;?></td>
	                  <td><?php echo $row->mere_conjoint;?></td>
	                  <td><?php echo $row->pere_conjoint;?></td>
	                  <td><?php echo $row->emploi_conjoint;?></td>
	                <?php endforeach;?>
                </tr>

              </table>
              <center><?php if($role=='admin_user'){ echo anchor('Personnel/show_update_conjoint/'.$row->matricule,'<button class="btn btn-primary" style= "width : 230px; height : 45px; margin-top : 3px;">Modifier</button>'); }?></center>
            </div>                               
          </div>

          <div class="row">
              <div class="col-md-12">
              <h3 style="height:40px; font-size:25px;"><center><u>Enfants</u></center></h3>
              <table class="table table-hover table-responsive table-striped">
                <b><tr>
                  <td>Nom</td>
                  <td>Prénoms</td>
                  <td>Date de naissance</td>
                  <td>Sexe</td>
                </tr></b>

                <?php foreach($liste_enfants as $row) :?>
                <tr>
                    <td><?php echo $row->nom_enfant;?></td>
                    <td><?php echo $row->prenom_enfant;?></td>
                    <td><?php echo $row->date_enfant;?></td>
                    <td><?php echo $row->sexe_enfant;?></td>
                </tr>
                <?php endforeach;?>

              </table>
              <center><?php if($role=='admin_user'){ echo anchor('Enfant/show_add_enfant/'.$row->matricule,'<button class="btn btn-primary" style= "width : 230px; height : 45px; margin-top : 3px;">Ajouter un enfant</button>'); }?></center>
            </div>                               
          </div>

      </div>
  </div>

    <div class="col-sm-2 sidenav">

      <?php foreach($selected_personnel as $row) :?> 
        <?php echo anchor('Personnel/display_personnel_profil/'.$row->matricule,'<button class="btn btn-secondary" style= "width : 230px; height : 45px; margin-top : 3px;">Etat civil / Situation administrative</button>');?>
        <?php echo anchor('Personnel/display_diplome/'.$row->matricule,'<button class="btn btn-secondary" style= "width : 230px; height : 45px; margin-top : 3px;">Diplomes et formations</button>');?>
        <?php echo anchor('Personnel/display_conjoint_enfant/'.$row->matricule,'<button class="btn btn-secondary" style= "width : 230px; height : 45px; margin-top : 3px;">Conjoint et enfants</button>');?>
        <?php echo anchor('Personnel/display_affectation/'.$row->matricule,'<button class="btn btn-secondary" style= "width : 230px; height : 45px; margin-top : 3px;">Affectations et avancements</button>');?>
        <?php echo anchor('Personnel/display_distinction/'.$row->matricule,'<button class="btn btn-secondary" style= "width : 230px; height : 45px; margin-top : 3px;">Distinctions et sanctions</button>');?>
      <?php endforeach;?>

    </div>

 </div>