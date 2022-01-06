


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
              <div  class="col-md-4">
                <table>
                  <th style="height:40px; font-size:25px;" colspan="2"><center><u>Etat civil</u></center></th>
                <?php foreach($selected_personnel as $row) :?>
                                  
                  <tr><td class="text-right">Nom : </td><td><strong><?php echo $row->nom; ?></strong></td></tr>
                  <tr><td class="text-right">Prénoms : </td><td><strong><?php echo $row->prenoms; ?></strong></td></tr>
                  <tr><td class="text-right">Date de naissance : </td><td><strong><?php echo $row->date_naissance; ?></strong></td></tr>
                  <tr><td class="text-right">Lieu de naissance : </td><td><strong><?php echo $row->lieu_naissance; ?></strong></td></tr>
                  <tr><td class="text-right">CIN : </td><td><strong><?php echo $row->cin; ?></strong></td></tr>
                  <tr><td class="text-right">Date CIN : </td><td><strong><?php echo $row->date_cin; ?></strong></td></tr>
                  <tr><td class="text-right">Lieu CIN : </td><td><strong><?php echo $row->lieu_cin; ?></strong></td></tr>
                  <tr><td class="text-right">Sexe : </td><td><strong><?php echo $row->sexe; ?></strong></td></tr>
                  <tr><td class="text-right">Adresse : </td><td><strong><?php echo $row->adresse; ?></strong></td></tr>
                  <tr><td class="text-right">Nom du père : </td><td><strong><?php echo $row->nom_pere; ?></strong></td></tr>
                  <tr><td class="text-right">Nom de la Mère : </td><td><strong><?php echo $row->nom_mere; ?></strong></td></tr>
                  <tr><td class="text-right">E-mail : </td><td><strong><?php echo $row->mail; ?></strong></td></tr>
                  <tr><td class="text-right">Téléphone : </td><td><strong><?php echo $row->telephone; ?></strong></td></tr>

                <?php endforeach;?>
                </table>
              </div>


              <div  class="col-md-5">
                <table>
                  <th style="height:40px; font-size:25px;" colspan="2"><center><u>Situation administrative</u></center></th>
                <?php foreach($selected_personnel as $row) :?>
                                  
                  <tr><td class="text-right">Matricule : </td><td><strong><?php echo $row->matricule; ?></strong></td></tr>
                  <tr><td class="text-right">Date d'entrée : </td><td><strong><?php echo $row->date_entree; ?></strong></td></tr>
                  <tr><td class="text-right">Statut : </td><td><strong><?php echo $row->statut; ?></strong></td></tr>
                  <tr><td class="text-right">Corps actuel : </td><td><strong><?php echo $row->corps_actuel; ?></strong></td></tr>
                  <tr><td class="text-right">Grade actuel : </td><td><strong><?php echo $row->grade_actuel; ?></strong></td></tr>
                  <tr><td class="text-right">Imputation budgetaire : </td><td><strong><?php echo $row->imputation_budget; ?></strong></td></tr>
                  <tr><td class="text-right">Localité de service : </td><td><strong><?php echo $row->code_soa; ?></strong></td></tr>

                <?php endforeach;?>
                </table>                
              </div>

              <div  class="col-md-3">
                <table>
                  <th style="height:40px; font-size:25px;" colspan="2"><center><u>Fiche de poste</u></center></th>
                <?php foreach($selected_personnel as $row) :?>
                                  
                  <tr><td class="text-right">Fonction : </td><td><strong><?php echo $row->fonction; ?></strong></td></tr>
                  <tr><td class="text-right">Direction : </td><td><strong><?php echo $row->id_direction; ?></strong></td></tr>
                  <tr><td class="text-right">Service : </td><td><strong><?php echo $row->id_service; ?></strong></td></tr>

                <?php endforeach;?>
                </table>                 
              </div>
                                
          </div>

          <br>
          <br>
          
            <center><?php if($role=='admin_user'){ echo anchor('Personnel/show_update/'.$row->matricule,'<button class="btn btn-primary" style= "width : 230px; height : 45px; margin-top : 3px;">Modifier les coordonnées</button>'); }?></center>

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