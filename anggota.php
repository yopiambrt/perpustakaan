<?php
require('Controller/CAnggota.php');

$Anggota = new CAnggota();

require ('view/display.php');

echo '
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="collapse navbar-collapse" id="navbarNav">
		
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
			</li>
			<li>
				<a class="nav-link" href="anggota.php?target=list" role="button">Data Anggota</a>
			</li>
		</ul>
		<ul class="nav navbar-nav ml-auto">
			<li>
				<a class="nav-link bg-success rounded text-white" href="anggota.php?target=input" role="button">Tambah Data</a>
			</li>
		</ul>
	</div>
</nav>
';

echo "</p>";
if(isset($_GET['target']))
{
	if($_GET['target']=='input')
	{
		$Anggota->inputForm(); 
	}
	else if($_GET['target']=='list')
	{
		$Anggota->cetakdata(); 
	}
	else if($_GET['target']=='edit')
	{
		$Anggota->updateForm();
	}
	else if($_GET['target']=='delete')
	{
		$Anggota->deleteForm($_GET['no']);
	}

}
else{
	$Anggota->cetakdata();
}
?>
