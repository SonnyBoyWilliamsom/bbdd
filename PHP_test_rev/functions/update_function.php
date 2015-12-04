<?php
function update_rates($link) {

  // Fetch all the rates.
  $result = mysqli_query($link, "SELECT * FROM rates");
  $rows = mysqli_num_rows($result);

  // Loop through the rates and update them.
  while ($row = mysqli_fetch_array($result)) {
    // Make a new random deviation.
    $deviation = rand(-1000,1000) / 100 * 0.85;

    // Rates less than 0 are not possible. So we make a positive deviation.
    if (($row['c_rate'] + $deviation) < 0) {
      $deviation = rand(0,1000) / 100 * 0.85;
    }

    // New rate.
    $new_rate = $row['c_rate'] + $deviation;

    // Make the query.
    $query = "UPDATE rates SET " .
    "c_rate = " . $new_rate . ", " .
    "l_rate = " . $row['c_rate'] .
    " WHERE cid = '" . $row['cid'] . "'";
    
    
    mysqli_query($link,$query);
  }

  // Free the result.
  mysqli_free_result($result);

  // Close the DB connection.
  mysqli_close($link);
}
