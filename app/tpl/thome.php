<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$this->title?></title>
	<link rel="stylesheet" type="text/css" href="<?=CSS?>bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?=CSS?>style.css">
</head>
<body>

	<h1><?= $this->page; ?></h1>
	<table class="table table-hover">
		<?php for($i=0;$i<count($this->dataTable);$i++){ ?>
			<tr>
			<?php foreach($this->dataTable[$i] as $key=>$value) :?>
				
	        		<td><?= $value; ?></td>
	    	
	    	<?php endforeach; ?>
	    	</tr>
	    <?php } ?>
	</table>
</body>