<?php
// check if date compared with specific format is correct
function validateDate ($givenDate, $givenFormat)
{
    $newDate = DateTime::createFromFormat($givenFormat, $givenDate);
    return $newDate && $newDate -> format($givenFormat) == $givenDate;
}

function safeInput($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>