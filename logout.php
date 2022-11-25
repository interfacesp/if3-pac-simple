<?php

/**
 *  Ce script a pour but d'oublier la session, la personne actuellement connectée. 
 *  Autrement dit, on détruit la session
 */
session_start();
session_destroy();
header("location:index.php");