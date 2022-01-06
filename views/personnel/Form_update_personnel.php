


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
        <center><h3><?php echo $mode_titre; ?></h3></center>

      <?php echo form_open_multipart('Personnel/update'); ?>
      
        <form>

          <div class="row">
              <div  class="col-md-4">
                <table>
                  <th style="height:40px; font-size:25px;" colspan="2"><center><u>Etat civil</u></center></th>
                  
                  <?php foreach($selected_personnel as $row) :?>                
                    <tr><td class="text-right">Nom : </td><td><input required class="pers" type = "text" name = "nom" value="<?php echo $row->nom;?>"/></td></tr>
                    <tr><td class="text-right">Prénoms : </td><td><input required class="pers" type = "text" name = "prenoms" value="<?php echo $row->prenoms;?>"/></td></tr>
                    <tr><td class="text-right">Date de naissance : </td><td><input class="pers" type = "date" name = "date_naissance" value="<?php echo $row->date_naissance;?>"/></td></tr>
                    <tr><td class="text-right">Lieu de naissance : </td><td><input class="pers" type = "text" name = "lieu_naissance" value="<?php echo $row->lieu_naissance;?>"/></td></tr>
                    <tr><td class="text-right">CIN : </td><td><input class="pers" type = "text" name = "cin" value="<?php echo $row->cin;?>"/></td></tr>
                    <tr><td class="text-right">Date CIN : </td><td><input class="pers" type = "date" name = "date_cin" value="<?php echo $row->date_cin;?>"/></td></tr>
                    <tr><td class="text-right">Lieu CIN : </td><td><input class="pers" type = "text" name = "lieu_cin" value="<?php echo $row->lieu_cin;?>"/></td></tr>
                    <tr><td class="text-right">Sexe : </td><td><input class="pers" type = "text" name = "sexe" value="<?php echo $row->sexe;?>"/></td></tr>
                    <tr><td class="text-right">Adresse : </td><td><input class="pers" type = "text" name = "adresse" value="<?php echo $row->adresse;?>"/></td></tr>
                    <tr><td class="text-right">Nom du père : </td><td><input class="pers" type = "text" name = "nom_pere" value="<?php echo $row->nom_pere;?>"/></td></tr>
                    <tr><td class="text-right">Nom de la Mère : </td><td><input class="pers" type = "text" name = "nom_mere" value="<?php echo $row->nom_mere;?>"/></td></tr>
                    <tr><td class="text-right">E-mail : </td><td><input class="pers" type = "text" name = "mail" value="<?php echo $row->mail;?>"/></td></tr>
                    <tr><td class="text-right">Téléphone : </td><td><input class="pers" type = "text" name = "telephone" value="<?php echo $row->telephone;?>"/></td></tr>
                  <?php endforeach;?> 

                </table>
              </div>


              <div  class="col-md-5">
                <table>
                  <th style="height:40px; font-size:25px;" colspan="2"><center><u>Situation administrative</u></center></th>
                  
                  <?php foreach($selected_personnel as $row) :?>                 
                    <tr><td class="text-right">Matricule : </td><td><input readonly required class="pers" type="text" name="matricule" value="<?php echo $row->matricule;?>"></td></tr>
                    <tr><td class="text-right">Date d'entrée : </td><td><input class="pers" type="date" name="date_entree" value="<?php echo $row->date_entree;?>"></td></tr>
                    <tr><td class="text-right">Statut : </td><td><input class="pers" type="text" name="statut" value="<?php echo $row->statut;?>"></td></tr>
                    <tr>
                      <td class="text-right">Corps actuel : </td>
                      <td>
                        <select class="pers" name="corps_actuel">
                          <option selected><?php echo $row->corps_actuel;?></option>
                          <?php foreach($liste_corps as $corps): ?>
                            <option value = "<?php echo $corps->CODE; ?> "> 
                              <?php echo $corps->CODE.' / '.$corps->LIBELLE; ?>
                            </option>                
                          <?php endforeach; ?>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-right">Grade actuel : </td>
                      <td>
                        <select class="pers" name="grade_actuel">
                          <option selected><?php echo $row->grade_actuel;?></option>
                          <?php foreach($liste_grade as $grade): ?>
                            <option value = "<?php echo $grade->CODE; ?> "> 
                              <?php echo $grade->CODE.' / '.$grade->LIBELLE; ?>
                            </option>                
                          <?php endforeach; ?>
                        </select>
                      </td>
                    </tr>
                    <tr><td class="text-right">Imputation budgetaire : </td><td><input class="pers" type="text" name="imputation_budget" value="<?php echo $row->imputation_budget;?>"></td></tr>
                    <tr><td class="text-right">Localité de service : </td>
                      <td>
                        <select class="pers" name="code_soa">
                          <option selected><?php echo $row->code_soa;?></option>
                          <?php foreach($liste_soa as $soa): ?>
                            <option value = "<?php echo $soa->code_soa; ?> "> 
                              <?php echo $soa->code_soa.' / '.$soa->soa_libelle; ?>
                            </option>                
                          <?php endforeach; ?>
                        </select>
                      </td>
                    </tr>
                  <?php endforeach;?> 

                </table>                
              </div>

              <div  class="col-md-3">

                <div class="row">
                  <table>
                    <th style="height:40px; font-size:25px;" colspan="2"><center><u>Fiche de poste</u></center></th>

                    <?php foreach($selected_personnel as $row) :?>                  
                      <tr><td class="text-right">Fonction : </td><td><input required class="pers" type="text" name="fonction" value="<?php echo $row->fonction;?>"></td></tr>
                      <tr><td class="text-right">Direction : </td><td><input required class="pers" type="text" name="id_direction" value="<?php echo $row->id_direction;?>"></td></tr>
                      <tr><td class="text-right">Service : </td><td><input required class="pers" type="text" name="id_service" value="<?php echo $row->id_service;?>"></td></tr>
                    <?php endforeach;?> 

                  </table>
                </div> 

                <hr>

                <div class="row">
                  <table>
                    <th style="height:40px; font-size:25px;" colspan="2"><center><u>Photo d'identité</u></center></th>
                                    
                    <tr>
                      <td class="text-right">Photo : </td><td><input class="pers" type="file" name="photo"></td>
                    </tr>

                    <tr style="display:none;">
                      <td><input class="pers" type="text" name="photo_act" value="<?php echo $row->photo;?>"></td>
                    </tr>
                    
                  </table>
                </div>

              </div>
                                
          </div>
          <br>
          <center>
            <button class="btn btn-primary" type="submit">Enregistrer</button>
            <?php foreach($selected_personnel as $row) :?><?php echo anchor('Personnel/display_personnel_profil/'.$row->matricule,'Annuler');?><?php endforeach;?>
          </center>
        </form>

      <?php echo form_close(); ?>

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