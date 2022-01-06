


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
              <h3 style="height:40px; font-size:25px;"><center><u>Affectations successives</u></center></h3>
              <table class="table table-hover table-responsive table-striped">
                <tr>
                  <td>SOA</td>
                  <td>Direction</td>
                  <td>Service</td>
                  <td>Fonction</td>
                  <td>Lieu</td>
                  <td>Date</td>
                  <td>Référence décision</td>
                </tr>

                <?php foreach($liste_affectations as $row) :?>
                <tr>
	                  <td><?php echo $row->code_soa;?></td>
	                  <td><?php echo $row->id_direction;?></td>
	                  <td><?php echo $row->id_service;?></td>
                    <td><?php echo $row->fonction;?></td>
                    <td><?php echo $row->lieu;?></td>
                    <td><?php echo $row->date_affect;?></td>
	                  <td><?php echo $row->ref;?></td>
                </tr>
                <?php endforeach;?>

              </table>
              <center><?php if($role=='admin_user'){ echo anchor('Affectation/show_add_affectation/'.$row->matricule,'<button class="btn btn-primary" style= "width : 230px; height : 45px; margin-top : 3px;">Ajouter une affectation</button>'); }?></center>
            </div>                               
          </div>

          <div class="row">
              <div class="col-md-12">
              <h3 style="height:40px; font-size:25px;"><center><u>Avancements successifs</u></center></h3>
              <table class="table table-hover table-responsive table-striped">
                <tr>
                  <td>Corps</td>
                  <td>Grade</td>
                  <td>Indice</td>
                  <td>Date</td>
                  <td>Texte de référence</td>
                </tr>

                <?php foreach($liste_avancements as $row) :?>
                  <tr>
                    <td><?php echo $row->corps;?></td>
                    <td><?php echo $row->grade;?></td>
                    <td><?php echo $row->indice;?></td>
                    <td><?php echo $row->date_avance;?></td>
                    <td><?php echo $row->ref;?></td>
                  </tr>
                <?php endforeach;?>

              </table>
              <center><?php if($role=='admin_user'){ echo anchor('Avancement/show_add_avancement/'.$row->matricule,'<button class="btn btn-primary" style= "width : 230px; height : 45px; margin-top : 3px;">Ajouter un avancement</button>'); }?></center>
            </div>                               
          </div>

          <div class="row">
              <div class="col-md-12">
              <h3 style="height:40px; font-size:25px;"><center><u>Cessations d'activités</u></center></h3>
              <table class="table table-hover table-responsive table-striped">
                <tr>
                  <td>Type de cessation</td>
                  <td>Date de début</td>
                  <td>Date de fin</td>
                  <td>Texte ou décision</td>
                </tr>

                <?php foreach($liste_cessations as $row) :?>
                  <tr>
                    <td><?php echo $row->cessation;?></td>
                    <td><?php echo $row->date_debut;?></td>
                    <td><?php echo $row->date_fin;?></td>
                    <td><?php echo $row->ref;?></td>
                  </tr>
                <?php endforeach;?>

              </table>
              <center><?php if($role=='admin_user'){ echo anchor('Cessation/show_add_cessation/'.$row->matricule,'<button class="btn btn-primary" style= "width : 230px; height : 45px; margin-top : 3px;">Ajouter une cessation</button>'); }?></center>
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