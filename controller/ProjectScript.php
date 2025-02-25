<?php
include_once '../config/database.php';
global $bdd;

$task = null;
$element = null;

if (array_key_exists('task', $_GET)) {
  $task = $_GET['task'];

}

if (array_key_exists('element', $_GET)) {
  $element = $_GET['element'];
}

$select = $bdd->prepare("select * from projets where type=? ");
$select_all = $bdd->prepare("select * from projets order by date asc");

function getData($getData)
{
  $captureRoad = '../sources/captureProjets/';
  $captureExt = '.PNG';

  $githubRoad = 'https://github.com/danoux10/';

  $linkStart = 'http://';
  $linkEnd = '.danybarbe.ovh';
  $datas = [];
  foreach ($getData as $data) {
    $name = $data['name'];
    $date = $data['date'];
    $capture = $captureRoad . $data['capture'] . $captureExt;
    $tech = $data['tech'];
    $location = $data['localisation'];
    $lien = $data['lien'];
    $git = $data['github'];
    $description = $data['description'];

    if ($location == 1) {
      $link = $linkStart . $lien . $linkEnd;
    } else {
      $link = $lien;
    }

    if ($git) {
      $github = $githubRoad . $git;
    } else {
      $github = null;
    }


    $datas[] = [
      'name' => $name,
      'date' => $date,
      'capture' => $capture,
      'techs' => $tech,
      'lien' => $link,
      'github' => $github,
      'description' => $description];
  }
  $result = [
    'datas' => $datas
  ];
  echo json_encode($result);
}

if ($task != 'all') {
  $select->execute([$task]);
  getData($select);
}

if ($task === 'all') {
  $select_all->execute();
  getData($select_all);
}

if ($element === 'type') {
  $getType = $bdd->prepare('select type, count(*) from projets group by type ');
  $getType->execute();
  $typeName = [];
  $count = [];
  $id = [];
  $i = 0;
  foreach ($getType as $dataType) {
    $id[] = $i++;
    $typeName[] = $dataType['type'];
    $count[] = $dataType['count(*)'];
  }
  $total = array_sum($count);
  $resultType = ['id' => $id, 'typeName' => $typeName, 'count' => $count, 'total' => $total];

  echo json_encode($resultType);
}