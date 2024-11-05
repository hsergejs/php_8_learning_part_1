<?php
include_once("../helperConstants/helperConstants.php");


$textToDisplay = <<<'TEXT'

https://www.php.net/manual/en/function.clearstatcache.php - Docs for clearstatcache & list of affected functions
https://www.php.net/manual/en/function.fopen.php - Docs for fopen & modes
https://www.php.net/manual/en/ref.filesystem.php - Filesystem functions




$dir = scandir(__DIR__); - will list all files and directories in the given path, here we use magic constant to specify current dir

var_dump($dir); - will return array including path ./../materials/ etc.

now we can loop through and find required file or smth similar

is_file($dir[3]); - will check if it's file

is_dir($dir[2]); - will check if it's directory


mkdir('dir name', permissions, create recursively or not); - will create directory if it's not exists
e.g. mkdir('foo/bar', recursive: true); - will create foo and sub directory bar; e.g. foo/bar

rmdir('dir name'); - will delete directory, must be empty directory, or we will get a warning; can't be used recursively

file_exists('filename'); - check if file exists

filesize('filename'); - get file size, result of this function is cached (there are some other functions work the same)
e.g. size not changing as it was memorize last result, so we need to use

clearstatcache(); - will reset cache

file_put_contents('file name', 'content to put'); - write to a file


open file and read line by line

$file = fopen('filename', 'r'); - open file with mode (read only - 'r', read write etc); return recourse data type

bad idea is to supress warning if file not found, which is returned in this case, rather use error handling,
best practice approach bellow:

if(!file_exists('foo.txt')){
    echo 'File not found';

    return;

}

$file = fopen('foo.txt', 'r');

and now we read line by line

while(($line = fgets($file)) !== FALSE){ - note on strict comparison, as in text there might be word FALSE and it will give unexpected results
    echo $line . '</br>';
}

fclose($file); - we need to close opened file, to free up resources


fwrite(); - writes to a file

fgetcsv(); - read from csv file; the difference from fgets, it returns array of values separated by default by a comma line by line
example:
a,b,c - will return array 1
d,e,f - array 2 
etc - array etc


another way of reading file content is by using:

file_get_contents(); - this will store file content in to a variable, we can specify offset and length for this function

$content = file_get_contents('foo.txt'); - will get full file content in to the memory

we can also get contents of the remote file, but it's not the best approach, better to use curl library


file_put_contents('foo.txt', 'some content'); - basically do fopen(), fwrite() and fclose() in one go 
if file not exists it will create it, if exists overwrite it

file_put_contents('foo.txt', ' adding some content', FILE_APPEND); - by using 3rd argument we can append content


unlink('foo.txt'); - this will also delete file

copy('foo.txt', 'bar.txt'); - this will create bar file which is identical copy of the foo file
if file exists it will overwrite it

rename('foo.txt', 'bar.txt'); - if we need  to move a file instead of creating a copy, this will delete foo.txt 
and create a copy of foo with file name bar; work for both files and dirs


pathinfo('foo.txt'); - will return an array of the details for the file


TEXT;

echo nl2br($textToDisplay);