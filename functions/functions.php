<?php 

  function calculateTotal() {
    $array_hours = handleForm();
    $begin_time = $array_hours["begin_hours"] * 60 + $array_hours["begin_minutes"];
    $end_time = $array_hours["end_hours"] * 60 + $array_hours["end_minutes"];
    $diff= $end_time - $begin_time;
    return $diff;
  }

  function totalHours() {
    return floor(calculateTotal() / 60);
  }

  function totalMinutes() {
    return (calculateTotal() % 60);
  }

  function beginTime() {
    $array_time = handleForm();
    return gmdate(
      "h:i",
      strtotime(
        $array_time["begin_hours"] + 1 . ":" . $array_time["begin_minutes"]
      )
    );
  }

  function endTime() {
    $array_time = handleForm();
    return gmdate(
      "h:i",
      strtotime(
        $array_time["end_hours"] + 1 . ":" . $array_time["end_minutes"]
      )
    );
  }

  function calculateExpPrice() {
    if (roundTime(beginTime()) >= "08:00" && totalHours() <= "10:00") {
      echo "hoi";
    }
  }

  function roundTime() {
    return ceil(gmdate("h.i", calculateTotal()));
  }


  function handleForm() {
    if (!empty($_GET)) {
      $array = array();
      $array["begin_hours"] = $_GET["begin_hours"];
      $array["begin_minutes"] = $_GET["begin_minutes"];
      $array["end_hours"] = $_GET["end_hours"];
      $array["end_minutes"] = $_GET["end_minutes"];
      return $array;
    }
  }

  function calculateExpLow() {
    $begin_time = beginTime();
    if ($begin_time < gmdate("h:i", "18:00")) {
      return 1.5;
    }
  }

  function calculatePrice() {
    $total_minutes = (int)totalMinutes();
    $total_hours = (int)totalHours();
    switch(true) {
      case $total_hours > 6:
        return 5;
        break;
      
      case $total_hours <= 6 && $total_hours >= 1:
        return 3;
        break;

      case $total_minutes <= 60:
        return 2.50;
        break;

      case $total_minutes <= 15:
        return 1;
        break;
    }
  }

  function echoCalculation() {
    return totalHours() * calculatePrice() * calculateExpLow();
  }

?>