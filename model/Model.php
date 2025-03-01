<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class Model
{
    protected $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getShop()
    {
        $query = "SELECT * FROM shops";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getShopById($id)
    {
        $query = "SELECT * FROM shops WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($name, $address, $open_time, $vehical_type, $phone)
    {
        $query = "INSERT INTO shops (name, address, open_time, vehical_type, phone) VALUES (:name, :address, :open_time, :vehical_type, :phone)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':open_time', $open_time);
        $stmt->bindParam(':vehical_type', $vehical_type);
        $stmt->bindParam(':phone', $phone);
        $stmt->execute();
    }

    public function update($id, $name, $address, $open_time, $vehical_type, $phone)
    {
        $query = "UPDATE shops SET name = :name, address = :address, open_time = :open_time, vehical_type = :vehical_type, phone = :phone WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':open_time', $open_time);
        $stmt->bindParam(':vehical_type', $vehical_type);
        $stmt->bindParam(':phone', $phone);
        $stmt->execute();
    }

    public function delete($id)
    {
        $query = "DELETE FROM shops WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function getFilteredShops($search = '', $area = '', $sort = 'id')
    {
        $query = "SELECT * FROM shops WHERE 1=1";

        if (!empty($search)) {
            $query .= " AND (name LIKE :search OR address LIKE :search)";
        }

        if (!empty($area)) {
            $query .= " AND address LIKE :area";
        }

        $query .= " ORDER BY " . $sort;

        $stmt = $this->conn->prepare($query);

        if (!empty($search)) {
            $searchTerm = "%$search%";
            $stmt->bindParam(':search', $searchTerm);
        }

        if (!empty($area)) {
            $areaTerm = "%$area%";
            $stmt->bindParam(':area', $areaTerm);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
