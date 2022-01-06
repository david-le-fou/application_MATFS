


<div class="row content">
    <div class="col-sm-2 sidenav">
      
    </div>

    <div class="col-sm-8 text-left"> 
      <div id="logo" style="background-color: white;opacity: 0.9; animation: fondu 15s ease-in-out infinite both; float:center; height:510px;padding: 10px;">                           

        <div class = "col-md-6 col-md-offset-3" id = "connexion">

          <div class = "page-header">
            <h1>EPA <small>Easy Personnel Administrator</small></h1>
          </div>

          <div class ="jumbotron">
            
            <div class ="container">
              <?php if(isset($user_name)){ ?>
                <p class = "text-center"><?php echo anchor('Personnel', "Annuaire du personnel"); ?></p>

                <?php echo form_open('Personnel/search_direction'); ?> 
                <form>
                  <div class = "form-group">
                    <select class="form-control" name="direction">
                      <option selected>Par direction</option>
                      <?php foreach($toutes_les_dir as $row): ?>
                       <option id = "<?php echo $row->id_direction; ?> "> 
                          <?php echo $row->id_direction; ?>
                        </option>                
                      <?php endforeach; ?>
                    </select>
                    <button type="submit" class="btn btn-primary">Rechercher</button>
                  </div>
                </form>
                <?php echo form_close(); ?>

                <?php echo form_open('Personnel/search_service'); ?> 
                <form>
                  <div class = "form-group">
                    <select class="form-control" name="service">
                      <option selected>Par service</option>
                      <?php foreach($tous_les_servi as $row): ?>
                       <option id = "<?php echo $row->id_service; ?> "> 
                          <?php echo $row->id_service; ?>
                        </option>                
                      <?php endforeach; ?>
                    </select>
                    <button type="submit" class="btn btn-primary">Rechercher</button>
                  </div>
                </form>
                <?php echo form_close(); ?>      
                

                <p class = "text-center"><?php echo anchor('Authentification/logout', "Déconnexion."); ?></p>
              <?php } else { ?>
              <p class = "text-center"><strong>Consultez votre profil</strong></p>
                <?php echo form_open('Personnel/display_personnel_profil_search_code'); ?> 
                  <form class = "form-inline" role = "form">
                    <div class = "form-group">
                      <label class = "sr-only" for="text">Matricule</label>
                      <input type = "text" class = "form-control" name="matri" placeholder="Entrez votre code d'accès">
                    </div>
                    <button type = "submit" name = "connecter" id = "connecter" class = "btn btn-primary">Consulter</button>
                  </form>
                <?php echo form_close(); ?>

                <br>
                <br>
                <p class = "text-center"><?php echo anchor('Authentification', "<strong>Identifiez-vous.</strong>"); ?></p>
              <?php } ?>
            </div>

          </div>

      </div>
    </div>
  </div>

    <div class="col-sm-2 sidenav">

      
    </div>

 </div>