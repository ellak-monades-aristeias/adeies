<?php
function echo_msg() {
  if (isset($_GET['msg']))
    echo '<div class="alert alert-danger">'.$_GET['msg'].'</div>';
}
?>