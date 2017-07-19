<?php 
	Breadcrumbs::register('admin', function($breadcrumbs) {
	    $breadcrumbs->push('Admin', secure_url('admin'));
	});
?>