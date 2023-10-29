<?php
session_start();

session_destroy();
header("Location: index.html?loggedOut=true"); // Add ?loggedOut=true to the URL
exit;