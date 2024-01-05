<?php
    session_start(); // should be available before using other session functions
    session_destroy(); // clears the session
    header("Location: ../../index.php"); // redirect to index.php/ homepage