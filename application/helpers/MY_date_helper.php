<?php
/*
 * Date helpers
*/

function pretty_date($datestring) {
 $date = new DateTime($datestring);
 return $date->format('Y-m-d');
}
