<?php
$visi_modeliai['visi_modeliai']=$this->modelis->gautiInfo();
$modeliai=array();
$i=0;
foreach($visi_modeliai as $modelis){
	if($modelis->$id == $_POST["markes_id"]){
		$modeliai[$i]=$modelis->modelis;
		$i++;
	}

}
echo json_encode($modeliai);

?>