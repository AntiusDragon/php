<?php
namespace App\DB;
use App\DB\DataBase;

class FileBase implements DataBase {
    private $file, $data;

    public function __construct($name) {
        $this->file = ROOT . 'data/' . $name . 'json';

        if (!file_exists($this->file)) {
            file_put_contents($this->file, json_encode([]));
        }
        $this->data = json_decode(file_get_contents($this->file), 1);
    }

    public function __destruct() {
        file_put_contents($this->file, json_encode($this->data));
    }

    function create(array $userData) : void {
        $data = $this->read();
        $data[] = $userData;
        $this->write($data);
    }

    function update(int $userId, array $userData) : void {
        $data = $this->read();
        $data[$userId] = $userData;
        $this->write($data);
    }

    function delete(int $userId) : void {
        $data = $this->read();
        unset($data[$userId]);
        $this->write($data);
    }
    
    function show(int $userId) : arrray {
        $data = $this->read();
        return $data[$userId];
    }

    function showAll() : array {
        return $this->read();
    }

    private function read() : array {
        if (!file_exists($this->file)) {
            file_put_contents($this->file, json_encode([]));
        }
        $data = file_get_contents($this->file);
        return json_decode($data, 1);
    }
    private function write(array $data) : void {
        file_put_contents($this->file, json_encode($data));
    }
}