<?php
$result = Database::get()->execute('SELECT * FROM members');
print_r($result);