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
    <?php echo roundTime(); ?>
    <?php if(!empty($_GET)) { ?>
      <p>Parkeertijd uren: <?php echo totalHours(); ?></p>
      <p>Parkeertijd minuten: <?php echo totalMinutes(); ?></p>
      <p>Parkeertarief:  <?php echo calculatePrice(); ?></p>
      <br>
      <p><b>Te betalen<b></p>
      <p>Duur tarief: <?php if (totalHours() >= 1) { echoCalculation(); } else { calculatePrice(); }   ?></p>
      <p>Normaal tarief: </p>
      <p>Totaal: </p>
    <?php } ?>
  </body>
</html>