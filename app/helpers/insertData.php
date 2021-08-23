<?php 

	function addRow($table,$data){

		DB::table($table)->insert($data);

	}
?>