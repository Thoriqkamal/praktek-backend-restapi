<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/[{name}]', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/' route");

        // Render index view
        return $container->get('renderer')->render($response, 'index.phtml', $args);
    });

    //Membuat produk
    $app->post("/items/", function (Request $request, Response $response){

        $new_items = $request->getParsedBody();
    
        $sql = "INSERT INTO items (name, price, quantity, production_time, start, end) VALUE (:name, :price, :quantity, :production_time, :start, :end)";
        $stmt = $this->db->prepare($sql);
    
        $data = [
            ":name" => $new_items["name"],
            ":price" => $new_items["price"],
            ":quantity" => $new_items["quantity"],
            ":production_time" => $new_items["production_time"],
            ":start" => $new_items["start"],
            ":end" => $new_items["end"]
        ];
    
        if($stmt->execute($data))
           return $response->withJson(["status" => "success", "data" => "1"], 200);
        
        return $response->withJson(["status" => "failed", "data" => "0"], 200);
    });

    //Menampilkan data semua produk
    $app->get("/items/", function (Request $request, Response $response){
        $sql = "SELECT * FROM items";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $response->withJson(["status" => "success", "data" => $result], 200);
    });

    //Menampilkan data salah satu produk
    $app->get("/items/{id}", function (Request $request, Response $response, $args){
        $id = $args["id"];
        $sql = "SELECT * FROM items WHERE id_item=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([":id" => $id]);
        $result = $stmt->fetch();
        return $response->withJson(["status" => "success", "data" => $result], 200);
    });

    //Menghapus data salah satu produk
    $app->delete("/items/{id}", function (Request $request, Response $response, $args){
        $id = $args["id"];
        $sql = "DELETE FROM items WHERE id_item=:id";
        $stmt = $this->db->prepare($sql);
        
        $data = [
            ":id" => $id
        ];
    
        if($stmt->execute($data))
           return $response->withJson(["status" => "success", "data" => "1"], 200);
        
        return $response->withJson(["status" => "failed", "data" => "0"], 200);
    });
};
