<?php
require 'vendor/autoload.php';

$client = new MongoDB\Client("mongodb+srv://igor:zxzf164j8pM8mkUw@users.zbafgje.mongodb.net/Users?retryWrites=true&w=majority");

$db = $client->selectDatabase('Users');

print_r($db->listCollections());
