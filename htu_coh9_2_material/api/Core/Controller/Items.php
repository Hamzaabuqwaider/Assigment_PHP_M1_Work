<?php

namespace Core\Controller;

use Core\Database\DB;

/**
 * Manage the todo list items
 */
class Items
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


    public function index(): void
    {
        $items = array();
        try {
            $result = $this->db->submit_query("SELECT * FROM items");

            if (!$result) {
                $this->http_code = 500;
                throw new \Exception("server_error");
            }

            if ($result->num_rows == 0) {
                $this->http_code = 404;
                throw new \Exception("items_not_found");
            }

            while ($row = $result->fetch_object()) {
                $items[] = $row;
            }
            $this->response_schema['body'] = $items;
            $this->response_schema['message_code'] = "items_collected";
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
            if (!isset($this->request_body->name)) {
                $this->http_code = 422;
                throw new \Exception('name_param_not_found');
            }

            if (!$this->db->submit_query("INSERT INTO items (name) VALUES ('{$this->request_body->name}')")) {
                $this->http_code = 500;
                throw new \Exception('server_error');
            }

            $this->response_schema['message_code'] = "item_created";
            $this->response_schema['body'][] = $this->get_item_by_id($this->db->connection->insert_id);
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
        try {
            if (!isset($this->request_body->id)) {
                $this->http_code = 422;
                throw new \Exception('id_param_not_found');
            }

            $item = $this->get_item_by_id($this->request_body->id);

            if (empty($item)) {
                $this->http_code = 404;
                throw new \Exception('no_item_was_found');
            }

            $completed = !(bool) $item->completed;
            $completed = $completed ? "1" : "0";

            if (!$this->db->submit_query("UPDATE items SET completed=$completed WHERE id={$this->request_body->id}")) {
                $this->http_code = 500;
                throw new \Exception('server_error');
            }

            $this->response_schema['message_code'] = "item_updated";
        } catch (\Exception $error) {
            $this->response_schema['success'] = false;
            $this->response_schema['message_code'] = $error->getMessage();
        }
    }

    public function single()
    {
        try {
            if (!isset($this->request_body->id)) {
                $this->http_code = 422;
                throw new \Exception('id_param_not_found');
            }

            $item = $this->get_item_by_id($this->request_body->id);

            if (empty($item->id)) {
                $this->http_code = 404;
                throw new \Exception('no_item_from_id');
            }

            if (!$this->db->submit_query("SELECT * FROM items WHERE id={$this->request_body->id}")) {
                $this->http_code = 500;
                throw new \Exception('server_error');
            }
            $this->response_schema['body'] = $item;
            $this->response_schema['message_code'] = "item_retreved";
        } catch (\Exception $error) {
            $this->response_schema['success'] = false;
            $this->response_schema['message_code'] = $error->getMessage();
        }
    }
    /**
     * delete list item
     *
     * @return void
     */
    public function delete()
    {
        try {
            if (!isset($this->request_body->id)) {
                $this->http_code = 422;
                throw new \Exception('id_param_not_found');
            }
            $item = $this->get_item_by_id($this->request_body->id);

            if (!$this->db->submit_query("DELETE FROM items WHERE id={$this->request_body->id}")) {
                $this->http_code = 500;
                throw new \Exception('server_error');
            }
            $this->response_schema['message_code'] = "item_deleted";
        } catch (\Exception $error) {
            $this->response_schema['success'] = false;
            $this->response_schema['message_code'] = $error->getMessage();
        }
    }


    protected function get_item_by_id($id)
    {
        $result = $this->db->submit_query("SELECT * FROM items WHERE id=$id");
        return $result->fetch_object();
    }
}
