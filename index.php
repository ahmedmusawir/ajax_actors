<?php 

require 'functions.php';
  connect();

if ( isXHR() && isset($_POST['q'])){

  $letter = $_POST['q'];
  $actors = get_actors_by_last_name($letter);
  echo json_encode($actors); return;
}

if (isset($_POST['q'])){

  $letter = $_POST['q'];
  $actors = get_actors_by_last_name($letter);
}

if ( isXHR() && isset($_POST['actor_id'])){

  $actor_id = $_POST['actor_id'];
  $info = get_info_by_id($actor_id);
  echo json_encode($info); return;
}

include '_views/index.tmpl.php';
?>
   
