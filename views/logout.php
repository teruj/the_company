<?php
session_start();
session_unset();
session_destroy();
header("location: ../views");// back to index
exit;