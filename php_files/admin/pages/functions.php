<?php
function echo_msg() {
  if (isset($_GET['msg']))
    echo '<div class="alert alert-'.$_GET['type'].'">'.$_GET['msg'].'</div>';
}
?>