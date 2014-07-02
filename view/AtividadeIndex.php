
<?php

$this->calendario = new Calendario();
?>

<div id="calendarioBotao">
    <a class="proximo" href="?controle=atividade&acao=Index&<?=$this->calendario->proximo($this->calendario->getMes(), $this->calendario->getAno())?>"> Proximo</a>
    <a class="anterior" href="?controle=atividade&acao=Index&<?=$this->calendario->anterior($this->calendario->getMes(), $this->calendario->getAno())?>"> Anterior</a>
</div>
<?php

if($this->calendario->getMesUser() == "" && $this->calendario->getAnoUser() == ""){
    $this->calendario->MostreCalendario($this->calendario->getMes(),$this->calendario->getAno());
} else {
    $this->calendario->MostreCalendario($this->calendario->getMesUser(),$this->calendario->getAnoUser());
}



?>


