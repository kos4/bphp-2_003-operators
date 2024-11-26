#!/usr/bin/php
<?php
$nameData = [];
fwrite(STDOUT, 'Введите фамилию: ');
$nameData['lastName'] = trim(fgets(STDIN));
fwrite(STDOUT, 'Введите имя: ');
$nameData['name'] = trim(fgets(STDIN));
fwrite(STDOUT, 'Введите отчество: ');
$nameData['surName'] = trim(fgets(STDIN));

$nameData = array_map(function($item) {
  $firstLetter = mb_strtoupper(mb_substr($item, 0, 1));
  $otherLetters = mb_strtolower(mb_substr($item, 1));
  return $firstLetter . $otherLetters;
}, $nameData);

$fullName = implode(' ', $nameData);
$surnameAndInitials = $nameData['lastName'] . ' ' . mb_substr($nameData['name'], 0, 1) . '. ' . mb_substr($nameData['surName'], 0, 1) . '. ';
$fio = array_reduce($nameData, function($acc, $item) {
  return $acc . mb_substr($item, 0, 1);
}, '');

echo <<<END
Полное имя: '{$fullName}'
Фамилия и инициалы: '{$surnameAndInitials}'
Аббревиатура: '{$fio}'
END. PHP_EOL;
