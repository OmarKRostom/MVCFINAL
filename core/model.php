<?php
	class model {
		function countPages($table) {
			return DB::getInstance()->countrows($table);
		}
	}
?>