<?php
include_once("../helperConstants/helperConstants.php");


$textToDisplay = <<<'TEXT'
syntax:
include '';
require '';

include - will result in a warning, but will run script if file is missing
require - will result in an error and stop script execution if file is missing

if include/require 'file.php' - for the location will rely on setup paths in ini.php - by the standard in the same folder where
stated file located

include_one ''; - will include file only if it hasn't been included already 
require_once ''; - will include file only if it hasn't been included already

include can return a value:
$result = include 'file.php' - 1 on success and false on failure;

use cases:
handy to use as partials with html;
we can modify content of the partial using ob_start(); as buffer which will contain string which we can work with!
ob_start();
include '../partials/nav.php';
$nav = ob_get_clean();
$nav = str_replace('About', 'About us', $nav);
echo $nav;

TEXT;

echo nl2br($textToDisplay);