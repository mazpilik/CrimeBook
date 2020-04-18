<?php
function unsetAlertMessage(){
  $_SESSION['alertMessage'] = array(
    'isMessage' => false
  );
}