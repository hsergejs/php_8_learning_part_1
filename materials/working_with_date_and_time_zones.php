<?php
include_once("../helperConstants/helperConstants.php");


$textToDisplay = <<<'TEXT'

we can work in milliseconds:
$currentTime = time();
echo $currentTime;
echo 'time in 5 days ' . $currentTime + 5 * 24 * 60 * 60; (5 days * 24 hours * 60 minutes * 60 seconds + current time)
echo 'time 1 day before ' . $currentTime - 1 * 24 * 60 * 60 (1 day * 24 hours * 60 minutes * 60 seconds - current time)

now we need to format it:

links to PHP docs
Date Formats - https://www.php.net/manual/en/datetime.format.php
Time Zones - https://www.php.net/manual/en/timezones.php
Relative Formats - https://www.php.net/manual/en/datetime.formats.php#datetime.formats.relative

echo date('m/d/Y G:i');
echo date('m/d/Y G:i',  $currentTime + 5 * 24 * 60 * 60); with timestamp 5 days in future


by default timezone setup by server, but we can overwrite it at a runtime:

date_default_timezone_set('UTC'); - setting default timezone
date_default_timezone_get(); - get current timezone

recommended to set timezone to UTC, then it's easier to work with multiple timezones
using mktime() - get timestamp based on arguments passed

echo date('m/d/Y G:i', mktime(0,0,0,4,10, null)); - 00:00:00 time 4th month 10th day with the same as current year


getting timestamp from string:
echo strtotime('2021-01-18 07:00:00');
and to format it
date('m/d/Y G:i', strtotime('2021-01-18 07:00:00'));
we can also have words as representation: date('m/d/Y G:i', strtotime('tomorrow'));

we can get array data of the date using date_parse():
$date = date('m/d/Y G:i', strtotime('2021-01-18 07:00:00'));

<pre>
    print_r(date_parse($date));
</pre>

TEXT;

echo nl2br($textToDisplay);