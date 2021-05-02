<?php

$formData = [
    'grant_type' => 'password',
    'client_id' => 2,
    'client_secret' => 'AxZF5MKdrzGqQpYqgcOpjA9gzKTdw6pxlrT26oRZ',
    'username' => 'miguel.vazquez@noktos.com.mx',
    'password' => 'Noktos2021',
    'scope' => '*',
];

echo http_build_query($formData);