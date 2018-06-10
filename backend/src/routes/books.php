<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

//$app = new \Slim\App;

$app->get('/api/books', function(Request $req, Response $res) {
    $bookDAO = new BookDAO();
    $books = $bookDAO->findAll();
    return $res->withJson($books);
});

$app->get('/api/books/{id}', function(Request $req, Response $res, array $params) {
    $bookDAO = new BookDAO();
    $id = $params['id'];
    $book = $bookDAO->findOneById($id);
    return $res->withJson($book);
});

$app->post('/api/books', function(Request $req, Response $res) {
    $book = new Book();
    $book->name = $req->getParam('name');
    $book->author = $req->getParam('author');
    $book->year_published = $req->getParam('year_published');

    $bookDAO = new BookDAO();
    $insertedBook = $bookDAO->save($book);

    return $res->withJson($insertedBook);
});

$app->put('/api/books/{id}', function(Request $req, Response $res, array $params) {
    $book = new Book();
    $book->id = $params['id'];
    $book->name = $req->getParam('name');
    $book->author = $req->getParam('author');
    $book->year_published = $req->getParam('year_published');

    $bookDAO = new BookDAO();
    $bookUpdated = $bookDAO->update($book);

    $updatedBook = $bookUpdated === true ? $book : new Book();
    return $res->withJson($updatedBook);
});

$app->delete('/api/books/{id}', function(Request $req, Response $res, array $params) {
    $book = new Book();
    $book->id = $params['id'];

    $bookDAO = new BookDAO();
    $bookDeleted = $bookDAO->remove($book);

    $deletedBook = $bookDeleted === true ? $book : new Book();
    return $res->withJson($deletedBook);
});