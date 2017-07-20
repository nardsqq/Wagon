<?php 
	Breadcrumbs::register('admin', function($breadcrumbs) {
	    $breadcrumbs->push('Admin Dashboard', secure_url('admin'));
	});
?>