<?php
$linea = fgets(STDIN);
$datos = explode(" ", trim($linea));

?>
<table border="solid 1px">
<?php for($i=0;$i<$datos[0]; $i++) { ?>
    <tr>
    <?php for($j=0; $j<$datos[1]; $j++) { ?>
    <td></td>
    <?php } ?>
</tr>
<?php } ?>
</table>