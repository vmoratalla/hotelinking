<div class='botoncupon'>Código</div><div>Canjeado</div>
<?php
$cupones=$usuario->listar_cupones();
foreach ($cupones as $cupon) {
    if (!$cupon['canjeado']) {
        echo "<a href='#' data-idcupon='" . $cupon['id_cupon'] . "' data-codigocupon='" . $cupon['codigo'] . "' name='canjearcupon'><div class='botoncupon'>";
        echo $cupon['codigo'];
        echo "</div><div class='canjeado'>No</div></a>";
    } else {
        echo "<div class='botoncupon'>";
        echo $cupon['codigo'];
        echo "</div><div class='canjeado'>Sí</div>";
    }
}
?>