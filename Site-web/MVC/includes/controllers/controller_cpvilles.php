<?php

	include_once '/includes/models/model_cpvilles.php';

	$listeCpVilles = Cpville::getListe();

	include_once '/include/views/view_listecpville.php'

?>