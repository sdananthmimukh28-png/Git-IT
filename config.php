<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'beauty_shop');


try {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
   
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
    
 
    $conn->set_charset("utf8mb4");
    
} catch (Exception $e) {
   
    die("Database connection error: " . $e->getMessage());
}


function sanitize_input($data) {
    global $conn;
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $conn->real_escape_string($data);
}


function getAllProducts() {
    global $conn;
    $sql = "SELECT * FROM products WHERE status = 1 ORDER BY id DESC";
    $result = $conn->query($sql);
    
    $products = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }
    return $products;
}


function getProductById($id) {
    global $conn;
    $id = (int)$id;
    $sql = "SELECT * FROM products WHERE id = $id AND status = 1";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    }
    return null;
}


function saveOrder($customer_data, $cart_items) {
    global $conn;
    
   
    $conn->begin_transaction();
    
    try {
        
        $name = sanitize_input($customer_data['name']);
        $email = sanitize_input($customer_data['email']);
        $phone = sanitize_input($customer_data['phone']);
        $address = sanitize_input($customer_data['address']);
        
        $sql = "INSERT INTO orders (customer_name, customer_email, customer_phone, customer_address, order_date, status) 
                VALUES ('$name', '$email', '$phone', '$address', NOW(), 'pending')";
        
        if (!$conn->query($sql)) {
            throw new Exception("Error saving order");
        }
        
        $order_id = $conn->insert_id;
        
        
        foreach ($cart_items as $item) {
            $product_id = (int)$item['id'];
            $quantity = (int)$item['quantity'];
            $price = (float)$item['price'];
            
            $sql = "INSERT INTO order_items (order_id, product_id, quantity, price) 
                    VALUES ($order_id, $product_id, $quantity, $price)";
            
            if (!$conn->query($sql)) {
                throw new Exception("Error saving order items");
            }
        }
        
      
        $conn->commit();
        return $order_id;
        
    } catch (Exception $e) {
        
        $conn->rollback();
        return false;
    }
}


function getOrderById($order_id) {
    global $conn;
    $order_id = (int)$order_id;
    
    $sql = "SELECT o.*, 
            SUM(oi.quantity * oi.price) as total_amount
            FROM orders o
            LEFT JOIN order_items oi ON o.id = oi.order_id
            WHERE o.id = $order_id
            GROUP BY o.id";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    }
    return null;
}
?>