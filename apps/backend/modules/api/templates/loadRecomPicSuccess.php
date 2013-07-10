{"baseURL":"http://hsun","pictures":[<?php $count = count($pictures); for ($i =0; $i < $count - 1; $i++):?>
<?php echo '{"id":"'.$pictures[$i]->getId().'", "src":"'.$pictures[$i]->getSrc().'"},'?>
<?php endfor;?>
<?php if($count > 0){?>
<?php echo '{"id":"'.$pictures[$count - 1]->getId().'","src":"'.$pictures[$count - 1]->getSrc().'"}';?>
<?php }?>
]}
