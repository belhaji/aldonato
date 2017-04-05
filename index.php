<?php


include 'config/bootstrap.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

use Epark\Models\Parking;
use Epark\Models\User;
use Epark\Middleware\Authentication as EparkAuth;

$app = new \Slim\App(['settings' => ['displayErrorDetails' => true]]);


$app->group('/api', function () {

    $this->map(['GET'], '/test', function ($req, $res, $args) {
        $donationsNews = \Aldonato\Models\RequestsNews::all()->first();
        return $res->withStatus(200)->withJson($donationsNews->request()->get());
    });

    $this->map(['GET'], '/accounts', function ($req, $res, $args) {
        $accounts = \Aldonato\Models\Account::all();
        return $res->withStatus(200)->withJson($accounts);
    });

    $this->map(['POST'], '/accounts', function ($req, $res, $args) {
        $json = $req->getBody();
        $data = json_decode($json, true);
        $account = new \Aldonato\Models\Account();
        $account->fill($data);
        if ($account->save())
            return $res->withStatus(200)->withJson($account);
        else
            return $res->withStatus(400)->withJson(["msg" => "cannot create the account"]);
    });

    $this->map(['GET'], '/accounts/{id}', function ($req, $res, $args) {
        $account = \Aldonato\Models\Account::find($args['id']);
        if ($account)
            return $res->withStatus(200)->withJson($account);
        else
            return $res->withStatus(404)->withJson(['msg' => 'no account founds']);
    });

    $this->map(['PUT'], '/accounts/{id}', function ($req, $res, $args) {
        $json = $req->getBody();
        $data = json_decode($json, true);
        $account = \Aldonato\Models\Account::find($args['id']);
        if ($account) {
            $account->update($data);
            if ($account->save()) {
                return $res->withStatus(200)->withJson($account);
            } else {
                return $res->withStatus(400)->withJson(['msg' => 'cannot save the account']);
            }
        } else {
            return $res->withStatus(404)->withJson(['msg' => 'no account founds']);
        }

    });


    $this->map(['GET'], '/accounts/{id}/donations', function ($req, $res, $args) {
        $account = \Aldonato\Models\Account::find($args['id']);
        if ($account) {
            $donations = $account->donations()->get();
            return $res->withStatus(200)->withJson($donations);
        } else
            return $res->withStatus(404)->withJson(['msg' => 'no station founds']);
    });

    $this->map(['GET'], '/accounts/{id}/requests', function ($req, $res, $args) {
        $account = \Aldonato\Models\Account::find($args['id']);
        if ($account) {
            $requests = $account->requests()->get();
            return $res->withStatus(200)->withJson($requests);
        } else
            return $res->withStatus(404)->withJson(['msg' => 'no station founds']);
    });

    $this->map(['GET'], '/requests', function ($req, $res, $args) {
        $requests = \Aldonato\Models\Request::all();
        return $res->withStatus(200)->withJson($requests);
    });

    $this->map(['POST'], '/requests', function ($req, $res, $args) {
        $json = $req->getBody();
        $data = json_decode($json, true);
        $request = new \Aldonato\Models\Request();
        $request->fill($data);
        if ($request->save())
            return $res->withStatus(200)->withJson($request);
        else
            return $res->withStatus(400)->withJson(["msg" => "cannot create the request"]);
    });

    $this->map(['GET'], '/requests/{id}', function ($req, $res, $args) {
        $request = \Aldonato\Models\Request::find($args['id']);
        if ($request)
            return $res->withStatus(200)->withJson($request);
        else
            return $res->withStatus(404)->withJson(['msg' => 'no request founds']);
    });

    $this->map(['PUT'], '/requests/{id}', function ($req, $res, $args) {
        $json = $req->getBody();
        $data = json_decode($json, true);
        $request = \Aldonato\Models\Request::find($args['id']);
        if ($request) {
            $request->update($data);
            if ($request->save()) {
                return $res->withStatus(200)->withJson($request);
            } else {
                return $res->withStatus(400)->withJson(['msg' => 'cannot save the request']);
            }
        } else {
            return $res->withStatus(404)->withJson(['msg' => 'no account founds']);
        }

    });


    $this->map(['GET'], '/requests/{id}/donations', function ($req, $res, $args) {
        $request = \Aldonato\Models\Request::find($args['id']);
        if ($request) {
            $donations = $request->donations()->get();
            return $res->withStatus(200)->withJson($donations);
        } else
            return $res->withStatus(404)->withJson(['msg' => 'no request founds']);
    });


    $this->map(['GET'], '/donations/news', function ($req, $res, $args) {
        $news = \Aldonato\Models\DonationsNews::with(['Request', 'Donation']);
        if ($news)
            return $res->withStatus(200)->withJson($news);
        else
            return $res->withStatus(404)->withJson(['msg' => 'no request founds']);
    });




});


$app->run();

