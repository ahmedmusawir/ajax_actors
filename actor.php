<?php
require 'functions.php';
connect();

  $actor_id = $_GET['actor_id'];
  $info = get_info_by_id($actor_id);

include '_views/actors.tmpl.php'; 

?>


