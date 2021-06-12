<?php
header("content-type:application/pdf");
header("content-disposition:inline;filename:merit.pdf");
readfile("merit.pdf");
?>