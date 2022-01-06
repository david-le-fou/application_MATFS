


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
              <div class="col-md-10 col-md-offset-1">
              <h3 style="height:40px; font-size:25px;"><center><u>Ajouter un enfant</u></center></h3>

              <?php echo form_open('Sanction/add_sanction'); ?>
              <form>           
                <?php foreach($selected_personnel as $row) :?><input style="display:none;" class="pers" type="text" name="matricule" value="<?php echo $row->matricule;?>"><?php endforeach;?>
                
                <table class="table table-hover table-responsive table-striped">

                  <tr>
                    <td>Sanction</td>
                    <td>Date d'effet</td>
                    <td>Texte ou décision</td>
                  </tr>

                  <tr>
  	                  <td><input class="pers" type="text" name="sanction"></td>
  	                  <td><input class="pers" type="date" name="date_effet"></td>
                      <td><input class="pers" type="text" name="ref"></td>
  	               </tr>

                </table>
              

              <center><button class="btn btn-primary" type="submit">Ajouter</button></center>
              
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