<?php

$method = $_SERVER['REQUEST_METHOD'];

$path = parse_url(
    $_SERVER['REQUEST_URI'],
    PHP_URL_PATH
);

if ($path === '/api/products' && $method === 'GET') {
    $controller->index();
    exit;
}

if ($path === '/api/products/register' && $method === 'POST') {
    $controller->store();
    exit;
}

if (preg_match('#^/api/products/([1-9][0-9]*)$#', $path, $matches)) {

    $id = (int) $matches[1];

    if ($method === 'GET') {
        $controller->show($id);
        exit;
    }

    if ($method === 'PUT') {
        $controller->update($id);
        exit;
    }

    if ($method === 'DELETE') {
        $controller->destroy($id);
        exit;
    }
}

// User routes

if ($path === '/api/users' && $method === 'GET') {
    $usercontroller->index();
    exit;
}

if ($path === '/api/users/register' && $method === 'POST') {
    $usercontroller->store();
    exit;
}

if (preg_match('#^/api/users/([1-9][0-9]*)$#', $path, $matches)) {

    $id = (int) $matches[1];

    if ($method === 'GET') {
        $usercontroller->show($id);
        exit;
    }

    if ($method === 'PUT') {
        $usercontroller->update($id);
        exit;
    }

    if ($method === 'DELETE') {
        $usercontroller->destroy($id);
        exit;
    }
}


http_response_code(404);

echo json_encode([
    'error' => 'Endpoint no encontrado'
]);