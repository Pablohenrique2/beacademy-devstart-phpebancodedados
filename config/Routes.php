<?php

use App\Controller\IndexController;
use App\Controller\ProductController;
use App\Controller\CategoryController;


function createRouter(string $controllerName, string $methodName)
{
  return ["controller" => $controllerName, 'method' => $methodName];
}
$routes = [
  '/' => createRouter(IndexController::class, "loginAction"),
  '/produto' => createRouter(ProductController::class, 'listAction'),
  '/produto/novo' => createRouter(ProductController::class, 'addAction'),
  '/produto/editar' => createRouter(ProductController::class, 'editAction'),
  '/categorias' => createRouter(CategoryController::class, "listAction"),
  '/categorias/nova' => createRouter(CategoryController::class, "addAction"),
  '/categorias/excluir' => createRouter(CategoryController::class, "removeAction"),
  '/categorias/editar' => createRouter(CategoryController::class, "editarAction"),

];

return $routes;
