<?php

require_once('../inc/config.inc.php');
error_log('Logout: User loged out.');
header("Location: ".LOCATION_LOGIN);
exit;