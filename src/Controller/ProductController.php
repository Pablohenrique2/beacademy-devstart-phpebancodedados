<?php

declare(strict_types=1);

namespace App\Controller;

use App\Connection\Connection;
use LDAP\Result;

class ProductController extends AbstractController
{
  public function listAction(): void
  {
    $con = Connection::getConnection();
    $query = "SELECT * FROM tb_product";
    $result = $con->prepare($query);
    $result->execute();

    parent::render("product/list", $result);
  }


  public function addAction(): void
  {
    $con = Connection::getConnection();
    if ($_POST) {
      $name = $_POST['name'];
      $description = $_POST['description'];
      $photo = $_POST['photo'];
      $value = $_POST['value'];
      $category = $_POST['category'];
      $quantity  = $_POST['quantity'];
      $createAt = date('Y-m-d H:i:s');
      $result = $con->prepare(
        "INSERT INTO tb_product (name,description,photo,value,category_id,quantity,create_at)
      values('{$name}','{$description}','{$photo}','{$value}','{$category}','{$quantity}','{$createAt}')"
      );
      $result->execute();
      echo "cadastro realizado com sucesso";
    }
    $result = $con->prepare("SELECT * FROM tb_category");
    $result->execute();
    parent::render("product/add", $result);
  }


  public function editAction(): void
  {
    parent::render("product/edit");
  }
}
