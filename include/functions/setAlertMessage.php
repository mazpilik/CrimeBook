<?php
/**
 * set a message in session
 */
function setAlertMessage($message, $type){
  $_SESSION['alertMessage'] = array(
    'isMessage' => true,
    'message' => $message,
    'type' => $type
  );
}