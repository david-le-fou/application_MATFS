
<!-- Highlights - jumbotron -->
<div class="row content">

	<div class="col-sm-1 sidenav">
      
    </div>

	<div class="col-sm-10 text-left"> 
		
			<div class="row">

				<div class="col-sm-10 col-sm-offset-1">

					<div class ="jumbotron">
						<p><?php echo $titre;?></p>

						<table class="table table-hover table-responsive table-striped">
							<thead >
								<tr>
									<th class = text-center> Matricule </th>	
									<th class = text-center> Nom </th>
									<th class = text-center> Prénoms </th>
									<th class = text-center> Direction </th>
									<th class = text-center> Service </th>
									<th class = text-center> Fonction </th>
								</tr>
							</thead>
						<?php foreach($liste_personnel as $pers): ?>
							<tr>
								<td class = text-center><?php echo $pers->matricule; ?></td>
								<td class = text-center><?php echo $pers->nom; ?></td>
								<td class = text-center><?php echo $pers->prenoms; ?></td>
								<td class = text-center><?php echo $pers->id_direction; ?></td>
								<td class = text-center><?php echo $pers->id_service; ?></td>
								<td class = text-center><?php echo $pers->fonction; ?></td>

								<?php if(isset($role)) { ?>
									<td><?php echo anchor('Personnel/display_personnel_profil/'.$pers->matricule, '<button type="button" class="btn btn-primary">Profil</button>');?></td>
								<?php } ?>
							</tr>
						<?php endforeach; ?>
						</table>
						
					</div>

				</div>
				
			</div> <!-- /row  -->
	</div>

	<div class="col-sm-1 sidenav">
      
    </div>

</div>
<!-- /Highlights -->
