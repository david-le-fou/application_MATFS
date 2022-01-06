


<div class="row content" style="margin:0px;">
    <div class="col-sm-2 sidenav">
      
    </div>

    <div class="col-sm-8"> 
      <div id="logo" style="background-color: white;opacity: 0.95; animation: fondu 15s ease-in-out infinite both; float:center; height:550px;padding: 10px;">                           
        <center><h3><?php echo $mode_titre; ?></h3></center>

      <?php echo form_open_multipart('Personnel/add'); ?>
      
        <form>

          <div class="row">
              <div  class="col-md-4">
                <table>
                  <th style="height:40px; font-size:25px;" colspan="2"><center><u>Etat civil</u></center></th>
                                  
                  <tr><td class="text-right">Nom : </td><td><input required class="pers" type = "text" name = "nom"/></td></tr>
                  <tr><td class="text-right">Prénoms : </td><td><input required class="pers" type = "text" name = "prenoms"/></td></tr>
                  <tr><td class="text-right">Date de naissance : </td><td><input class="pers" type = "date" name = "date_naissance"/></td></tr>
                  <tr><td class="text-right">Lieu de naissance : </td><td><input class="pers" type = "text" name = "lieu_naissance"/></td></tr>
                  <tr><td class="text-right">CIN : </td><td><input class="pers" type = "text" name = "cin"/></td></tr>
                  <tr><td class="text-right">Date CIN : </td><td><input class="pers" type = "date" name = "date_cin"/></td></tr>
                  <tr><td class="text-right">Lieu CIN : </td><td><input class="pers" type = "text" name = "lieu_cin"/></td></tr>
                  <tr><td class="text-right">Sexe : </td><td><input class="pers" type = "text" name = "sexe"/></td></tr>
                  <tr><td class="text-right">Adresse : </td><td><input class="pers" type = "text" name = "adresse"/></td></tr>
                  <tr><td class="text-right">Nom du père : </td><td><input class="pers" type = "text" name = "nom_pere"/></td></tr>
                  <tr><td class="text-right">Nom de la Mère : </td><td><input class="pers" type = "text" name = "nom_mere"/></td></tr>
                  <tr><td class="text-right">E-mail : </td><td><input class="pers" type = "text" name = "mail"/></td></tr>
                  <tr><td class="text-right">Téléphone : </td><td><input class="pers" type = "text" name = "telephone"/></td></tr>

                </table>
              </div>


              <div  class="col-md-5">
                <table>
                  <th style="height:40px; font-size:25px;" colspan="2"><center><u>Situation administrative</u></center></th>
                                  
                  <tr><td class="text-right">Matricule : </td><td><input required class="pers" type="text" name="matricule"></td></tr>
                  <tr><td class="text-right">Date d'entrée : </td><td><input class="pers" type="date" name="date_entree"></td></tr>
                  <tr><td class="text-right">Statut : </td><td><input class="pers" type="text" name="statut"></td></tr>
                  <tr>
                    <td class="text-right">Corps actuel : </td>
                    <td>
                      <select class="pers" name="corps_actuel">
                        <option class="pers" selected></option>
                        <?php foreach($liste_corps as $row): ?>
                          <option value = "<?php echo $row->CODE; ?> "> 
                            <?php echo $row->CODE.' / '.$row->LIBELLE; ?>
                          </option>                
                        <?php endforeach; ?>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-right">Grade actuel : </td>
                    <td>
                      <select class="pers" name="grade_actuel">
                        <option class="pers" selected></option>
                        <?php foreach($liste_grade as $row): ?>
                          <option value = "<?php echo $row->CODE; ?> "> 
                            <?php echo $row->CODE.' / '.$row->LIBELLE; ?>
                          </option>                
                        <?php endforeach; ?>
                      </select>                     
                    </td>
                  </tr>
                  <tr><td class="text-right">Imputation budgetaire : </td><td><input class="pers" type="text" name="imputation_budget"></td></tr>
                  <tr>
                    <td class="text-right">Localité de service : </td>
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
                  </tr>

                </table>                
              </div>

              <div  class="col-md-3">

                <div class="row">
                  <table>
                    <th style="height:40px; font-size:25px;" colspan="2"><center><u>Fiche de poste</u></center></th>
                                    
                    <tr><td class="text-right">Fonction : </td><td><input required class="pers" type="text" name="fonction"></td></tr>
                    <tr><td class="text-right">Direction : </td><td><input required class="pers" type="text" name="id_direction"></td></tr>
                    <tr><td class="text-right">Service : </td><td><input required class="pers" type="text" name="id_service"></td></tr>
                  </table>
                </div> 

                <hr>

                <div class="row">
                  <table>
                    <th style="height:40px; font-size:25px;" colspan="2"><center><u>Photo d'identité</u></center></th>
                                    
                    <tr><td class="text-right">Photo : </td><td><input class="pers" type="file" name="photo"></td></tr>
                    
                  </table>
                </div>

              </div>
                                
          </div>
          <br>
          <center><button class="btn btn-primary" type="submit">Enregistrer</button></center>
        </form>

      <?php echo form_close(); ?>

      </div>
  </div>

    <div class="col-sm-2 sidenav">
      <div class="well">
          
    
      </div>
    </div>

 </div>