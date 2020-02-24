<?php

  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../db/Database.php';
  include_once '../model/Category.php';

  $database = new Database();
  $db = $database->connect();

  $category = new Category($db);
  //GET id
  $category->id = isset($_GET['id']) ? $_GET['id'] : die();

  $category->read_single();

  // Create array
  $category_arr = array(
    'id' => $category->id,
    'name' => $category->name
  );

  // Make JSON
  print_r(json_encode($category_arr));