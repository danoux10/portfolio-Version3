<?php
include_once '../config/database.php';
global $bdd;

$task = null;

if (array_key_exists('task', $_GET)) {
  $task = $_GET['task'];
}


function getData($query)
{
  $captureRoad = '../sources/captureProjets/';
  $captureExt = '.PNG';

  $githubRoad = 'https://github.com/danoux10/';

  $linkEnd = '.danybarbe.ovh';

  $getData = [];
  foreach ($query as $data) {
    $name = $data['name'];
    $date = $data['date'];
    $capture = $captureRoad . $data['capture'] . $captureExt;
    $tech = $data['tech'];
    $location = $data['localisation'];
    $lien = $data['lien'];
    $git = $data['github'];
    $description = $data['description'];

    if ($location == 0) {
      $link = $lien;
    } else {
      $link = $lien . $linkEnd;
    }

    if ($git) {
      $github = $githubRoad . $git;
    } else {
      $github = null;
    }


    $getData[] = [
      'name' => $name,
      'date' => $date,
      'capture' => $capture,
      'techs' => $tech,
      'lien' => $link,
      'github' => $github,
      'description' => $description];
  }
  $result = [
    'getData' => $getData
  ];
  echo json_encode($result);
}

if($task === 'all'){
  $select_all = $bdd->prepare("select * from projets order by date asc");
  $select_all->execute();
  getData($select_all);
}

if($task != 'all'){
  $select = $bdd->prepare("select * from projets where type=? ");
  $select->execute([$task]);
  getData($select);
}