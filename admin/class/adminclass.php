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
        $query = "SELECT p.title, p.images, SUM(c.quantity) as total_quantity, SUM(c.quantity * p.price) as total_value
                FROM orders o
                JOIN products p ON o.product_id = p.products_id
                JOIN cart c ON o.cart_id = c.cart_id
                GROUP BY p.products_id
                ORDER BY total_quantity DESC
                LIMIT 5";
        $result = $this->db->select($query);
        return $result;
    }
}
