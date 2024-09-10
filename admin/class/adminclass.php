<?php
include "database.php";
?>

<?php
class admin
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    function getTotalOrderValue()
    {
        $query = "SELECT SUM(cart.total_price * orders.order_quantity) as total_value FROM orders
        INNER JOIN cart ON cart.cart_id = orders.cart_id";
        $result = $this->db->select($query);
        $row = $result->fetch_assoc();
        return $row['total_value'];
    }

    function getTotalOrders()
    {
        $query = "SELECT COUNT(*) as total_orders FROM orders";
        $result = $this->db->select($query);
        $row = $result->fetch_assoc();
        return $row['total_orders'];
    }

    function getTotalCustomers()
    {
        $query = "SELECT COUNT(DISTINCT customer_id) as total_customers FROM orders";
        $result = $this->db->select($query);
        $row = $result->fetch_assoc();
        return $row['total_customers'];
    }

    function getTopSellingProducts()
    {
        $query = "SELECT  orders.*, customer.*, products.*
            FROM orders 
            INNER JOIN customer ON orders.customer_id = customer.customer_id 
            INNER JOIN products ON products.products_id = orders.product_id
        
                LIMIT 5";
        $result = $this->db->select($query);
        return $result;
    }
}
