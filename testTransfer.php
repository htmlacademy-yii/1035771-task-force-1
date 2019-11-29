<?php

use app\logic\TransferFormat;

require_once 'vendor/autoload.php';

$load = new TransferFormat('data\categories.csv');

$load->transfer('data\categories.csv');
