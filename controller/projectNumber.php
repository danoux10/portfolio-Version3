<?php
include_once '../config/database.php';
global $bdd;

$element = null;

if (array_key_exists('element', $_GET)) {
  $school_query = $bdd->query("SELECT type,count(*) from projets where type = 'school'");
  $portfolio_query = $bdd->query("SELECT type,count(*) from projets where type = 'portfolio'");
  $other_query = $bdd->query("SELECT type,count(*) from projets where type = 'other'");
  $game_query = $bdd->query("SELECT type,count(*) from projets where type = 'game'");
  $all_query = $bdd->query("SELECT type,count(*) from projets group by type");

  foreach ($school_query as $dataSchool){
    $schoolName = $dataSchool['type'];
    $countSchool = $dataSchool['count(*)'];
  }

  foreach ($portfolio_query as $dataPortfolio){
    $portfolioName = $dataPortfolio['type'];
    $countPortfolio = $dataPortfolio['count(*)'];
  }

  foreach ($other_query as $dataOther){
    $otherName = $dataOther['type'];
    $countOther = $dataOther['count(*)'];
  }

  foreach ($game_query as $dataGame){
    $gameName = $dataGame['type'];
    $countGame = $dataGame['count(*)'];
  }

  foreach ($all_query as $dataAll){
    $count[] = $dataAll['count(*)'];
  }
  $allName = 'all';
  $countAll = array_sum($count);

  $school = ['count'=>$countSchool];
  $portfolio = ['count'=>$countPortfolio];
  $other = ['count'=>$countOther];
  $game = ['count'=>$countGame];
  $all = ['count'=>$countAll];

  $result = [
    'school'=>$school,
    'portfolio'=>$portfolio,
    'other'=>$other,
    'game'=>$game,
    'all'=>$all,
  ];
  echo json_encode($result);
}