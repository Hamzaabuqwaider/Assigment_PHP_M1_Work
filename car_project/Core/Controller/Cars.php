<?php

namespace Core\Controller;

use Core\Database\DB;

/**
 * Manage the todo list cars
 */
class Cars
{
    protected $db;
    protected $http_code = 200;
    protected $request_body;

    protected $response_schema = array(
        "success" => true, // to privde the response status
        "message_code" => "",
        "body" => array()
    );


    public function __construct()
    {
        $this->db = new DB();
        $this->request_body = json_decode(file_get_contents("php://input", true));
    }

    public function render()
    {
        header("Content-Type: application/json");
        http_response_code($this->http_code);
        echo json_encode($this->response_schema);
    }

    public function index()
    {
        $cars = array();
        try {
            $result = $this->db->submit_query("SELECT * FROM cars_info");

            if (!$result) {
                $this->http_code = 500;
                throw new \Exception("server_error");
            }

            if ($result->num_rows == 0) {
                $this->http_code = 404;
                throw new \Exception("cars_not_found");
            }

            while ($row = $result->fetch_object()) {
                $cars[] = $row;
            }
            $this->response_schema['body'] = $cars;
            $this->response_schema['message_code'] = "cars_collected";
        } catch (\Exception $error) {
            $this->response_schema['success'] = false;
            $this->response_schema['message_code'] = $error->getMessage();
        }
    }

    /**
     * Create new list item
     *
     * @return void
     */
    public function create()
    {
        try {
            if (!isset($this->request_body->name) || !isset($this->request_body->price)) {
                $this->http_code = 422;
                throw new \Exception("name&price_not_found");
            }


            if (!$this->db->submit_query("INSERT INTO cars_info (name,price,modal,description) VALUES ('{$this->request_body->name}','{$this->request_body->price}','{$this->request_body->modal}','{$this->request_body->description}')")) {
                $this->http_code = 500;
                throw new \Exception('server_error');
            }

            $this->response_schema['message_code'] = "cars_created"; //1
            // $this->response_schema['body'][] = $this->get_item_by_id($this->db->connection->insert_id);
        } catch (\Exception $error) {
            $this->response_schema['success'] = false;
            $this->response_schema['message_code'] = $error->getMessage();
        }
    }

    /**
     * Update List item
     *
     * @return void
     */
    public function update()
    {
    }

    /**
     * delete list item
     *
     * @return void
     */
    public function delete()
    {
    }
}
