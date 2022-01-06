


<div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
    </div>

    <div class="col-sm-8 text-left"> 
     	<div id="logo" style="background-color: white;opacity: 0.6; animation: fondu 15s ease-in-out infinite both; float:center; height:510px;padding: 10px;">                           
	        <p>Bienvenue sur la page d'accueil, et cliquer le bouton ci-dessous pour faire une recherche par matricule, par nom ou par direction.</p>
	      	<a href="Pages/Accueils/recherchePerso5.php?Matricule=&amp;nom=">
	        	<button> Commencer la recherche </button>
	    	</a>                       
		</div>
    </div>

    <div class="col-sm-2 sidenav">

      <div class="well">
        <p>ADS</p>
      </div>
      <div class="well">
        <p>ADS</p>
      </div>
    </div>

 </div>



          <div class="row">
            <div class="col-md-12">
              <h3 style="height:40px; font-size:25px;"><center><u>Conjoint(e)</u></center></h3>
              <table class="table table-hover table-responsive table-striped">
                <th>
                  <td>Nom</td>
                  <td>Prénoms</td>
                  <td>Date de naissance</td>
                  <td>Père</td>
                  <td>Mère</td>
                  <td>Emploi</td>
                </th>

                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>

              </table>
            </div>
          </div>



           <div class="row">
            <div class="col-md-12">
              <h3 style="height:40px; font-size:25px;"><center><u>Diplomes et formations</u></center></h3>
              <table class="table table-hover table-responsive table-striped">
                <th>
                  <td>Diplomes</td>
                  <td>Spécialité</td>
                  <td>Institut</td>
                  <td>Date d'obtention</td>
                </th>

                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>

              </table>
            </div>
          </div>



ALTER TABLE personnel ADD COLUMN nom_conjoint VARCHAR(255);
ALTER TABLE personnel ADD COLUMN prenom_conjoint VARCHAR(255);
ALTER TABLE personnel ADD COLUMN date_naiss_conjoint VARCHAR(255);
ALTER TABLE personnel ADD COLUMN mere_conjoint VARCHAR(255);
ALTER TABLE personnel ADD COLUMN pere_conjoint VARCHAR(255);
ALTER TABLE personnel ADD COLUMN emploi_conjoint VARCHAR(255);
             

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

UPDATE personnel
SET photo = CONCAT(photo,'.jpg');
