<?php
header("content-type:application/pdf");
header("content-disposition:inline;filename:employee.pdf");
readfile("employee.pdf");
?>
