<?php
  header('Content-Type: text/css; charset=utf-8');
  include_once( 'show.php' );
?>

/* 以下は通常のcss */
diary{
    background-color: rgba(<?php echo $color_red;?>,<?php echo $color_green;?>,<?php echo $color_blue;?>,0.2);
    color: rgb(<?php echo $color_red;?>,<?php echo $color_green;?>,<?php echo $color_blue;?>);
    width: 80%;
    height: 20%;
    border-radius: 50px;
}