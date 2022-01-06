


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
              <h3 style="height:40px; font-size:25px;"><center><u>Ajouter une affectation</u></center></h3>

              <?php echo form_open('Affectation/add_affectation'); ?>
              <form>           
                <?php foreach($selected_personnel as $row) :?><input style="display:none;" class="pers" type="text" name="matricule" value="<?php echo $row->matricule;?>"><?php endforeach;?>
                
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

                  <tr>
  	                  <td>
                        <select class="pers" name="code_soa">
                          <option class="pers" selected></option>
                          <?php foreach($liste_soa as $row): ?>
                            <option value = "<?php echo $row->code_soa; ?> "> 
                              <?php echo $row->code_soa.' / '.$row->soa_libelle; ?>
                            </option>                
                          <?php endforeach; ?>
                        </select>
                      </td>
  	                  <td><input class="pers" type="text" name="id_direction"></td>
  	                  <td><input class="pers" type="text" name="id_service"></td>
                      <td><input class="pers" type="text" name="fonction"></td>
                      <td><input class="pers" type="text" name="lieu"></td>
                      <td><input class="pers" type="date" name="date_affect"></td>
  	                  <td><input class="pers" type="text" name="ref"></td>
                  </tr>

                </table>
              

              <center>
                <button class="btn btn-primary" type="submit">Ajouter</button>
                <?php foreach($selected_personnel as $row) :?><?php echo anchor('Personnel/display_affectation/'.$row->matricule,'Annuler');?><?php endforeach;?>
              </center>
              
              </form>
              <?php echo form_close(); ?>
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