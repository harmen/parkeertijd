<?php include "../functions/functions.php" ?>
<html>
  <head>
    <title>Parkeertijd</title>
  </head>

  <body>
    <form action="<?php handleForm(); ?>"" method="get">
      <table>
        <tr>
          <th></th>
          <th>Uur</th>
          <th>Minuten</th>
        </tr>
        <tr>
          <td>Begintijd</td>
          <td><input name="begin_hours" type="number" value="0" ></td>
          <td><input name="begin_minutes" type="number" value="0" ></td>
        </tr> 
        <tr>
          <td>Eindtijd</td>
          <td><input name="end_hours" type="number" value="0" ></td>
          <td><input name="end_minutes" type="number" value="0" ></td>
        </tr>
      </table>
      <input type="submit" value="Bereken">
    </form>
    <?php if(!empty($_GET)) { ?>
      <p>Parkeertijd uren: <?php echo totalHours(); ?></p>
      <p>Parkeertijd minuten: <?php echo totalMinutes(); ?></p>
      <p>Parkeertarief:  <?php echo calculatePrice(); ?></p>
      <br>
      <?php echo totalHours(); ?>
      <p><b>Te betalen<b></p>
      <p>Duur tarief: <?php if(calculateExpLow() == 1.5) { $exp = echoCalculation(); echo $exp; } ?></p>
      <p>Normaal tarief: <?php if(calculateExpLow() != 1.5) { $low = echoCalculation(); echo $low; } else { echo 0; }  ?></p>
      <p>Totaal: 
        <?php if(calculateExpLow() == 1.5  && calculateExpLow() != 1.5) 
        { echo $exp * $low; } 
        elseif(calculateExpLow() != 1.5) 
        { echo $low; } 
        elseif(calculateExpLow() == 1.5) 
        { echo $exp; } 
        ?></p>
    <?php } ?>
  </body>
</html>