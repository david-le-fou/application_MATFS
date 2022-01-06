
<?php If($context=='list'): ?>
	<?php $this->load->view('personnel/Content',$liste_personnel); ?>
<?php Elseif($context == 'edit' && $mode == 'add'): ?>
	<?php $this->load->view('personnel/Form_add_personnel'); ?>
<?php Elseif($context == 'edit' && $mode == 'update'): ?>
	<?php $this->load->view('personnel/Form_update_personnel'); ?>
<?php Elseif($context == 'search'): ?>
	<?php $this->load->view('personnel/Search_result'); ?>
<?php Else: ?>
	<p class = "text-center" style = "color:white; font-size:50px;"><strong>Il n'y a pas de personnel à afficher.</strong></p>
<?php Endif; ?>