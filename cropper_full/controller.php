<?php
/**
 * Created by PhpStorm.
 * User: gustavoweb
 * Date: 22/11/18
 * Time: 14:24
 */

$postData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

file_put_contents('uploads/gustavoweb.png', file_get_contents($postData['data']));