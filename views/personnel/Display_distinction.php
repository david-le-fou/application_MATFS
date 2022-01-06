


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
              <h3 style="height:40px; font-size:25px;"><center><u>Distinctions honorifiques</u></center></h3>
              <table class="table table-hover table-responsive table-striped">
                <tr>
                  <td>Honneur</td>
                  <td>Texte ou décision</td>
                  <td>Année</td>
                  <td>Décoration</td>
                </tr>

                <?php foreach($liste_distinctions as $row) :?>
                <tr>
	                  <td><?php echo $row->honneur;?></td>
	                  <td><?php echo $row->ref;?></td>
                    <td><?php echo $row->annee;?></td>
	                  <td><?php echo $row->decoration;?></td>
                </tr>
                <?php endforeach;?>

              </table>
              <center><?php if($role=='admin_user'){ echo anchor('Distinction/show_add_distinction/'.$row->matricule,'<button class="btn btn-primary" style= "width : 230px; height : 45px; margin-top : 3px;">Ajouter une distinction</button>'); }?></center>
            </div>                               
          </div>

          <div class="row">
              <div class="col-md-10 col-md-offset-1">
              <h3 style="height:40px; font-size:25px;"><center><u>Sanctions</u></center></h3>
              <table class="table table-hover table-responsive table-striped">
                <tr>
                  <td>Sanction</td>
                  <td>Date d'effet</td>
                  <td>Texte ou décision</td>
                </tr>

                <?php foreach($liste_sanctions as $row) :?>
                <tr>
                    <td><?php echo $row->sanction;?></td>
                    <td><?php echo $row->date_effet;?></td>
                    <td><?php echo $row->ref;?></td>
                </tr>
                <?php endforeach;?>

              </table>
              <center><?php if($role=='admin_user'){ echo anchor('Sanction/show_add_sanction/'.$row->matricule,'<button class="btn btn-primary" style= "width : 230px; height : 45px; margin-top : 3px;">Ajouter une sanction</button>'); }?></center>
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