<?php

$result = Database::get()->execute('SELECT * FROM member');

print_r($result);