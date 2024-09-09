<?php
include "database.php";
?>

<?php
class checkBill
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function insert_bill($postData)
    {
        $customer_name = $this->db->link->real_escape_string($postData['customerName']);
        $products_id = $this->db->link->real_escape_string($postData['productList']);
        $order_quantity = (int)$postData['order_quantity'];
        $quantity = (int)$postData['quantity'];
        $address = $this->db->link->real_escape_string($postData['address']);
        $phone = $this->db->link->real_escape_string($postData['phone']);
        $status = (int)$postData['orderState'];
        $orderDate = $this->db->link->real_escape_string($postData['orderDate']);

        // Check if customer exists
        $customerQuery = "SELECT customer_id FROM customer WHERE customer_name = '$customer_name' AND phone = '$phone'";
        $customerResult = $this->db->select($customerQuery);

        if ($customerResult && $customerResult->num_rows > 0) {
            $customerRow = $customerResult->fetch_assoc();
            $customer_id = $customerRow['customer_id'];
        } else {
            // Insert new customer
            $insertCustomerQuery = "INSERT INTO customer (customer_name, address, city, phone) 
                                    VALUES ('$customer_name', '$address', '', '$phone')";
            $this->db->insert($insertCustomerQuery);
            $customer_id = $this->db->link->insert_id;
        }

        // Get product price
        $productQuery = "SELECT price FROM products WHERE products_id = '$products_id'";
        $productResult = $this->db->select($productQuery);

        if ($productResult && $productResult->num_rows > 0) {
            $productRow = $productResult->fetch_assoc();
            $price = $productRow['price'];
            $total_price = $quantity * $price;
        } else {
            return false;
        }

        // Check if the cart already exists
        $cartQuery = "SELECT cart_id FROM cart WHERE customer_id = '$customer_id' AND product_id = '$products_id'";
        $cartResult = $this->db->select($cartQuery);

        if ($cartResult && $cartResult->num_rows > 0) {
            $cartRow = $cartResult->fetch_assoc();
            $cart_id = $cartRow['cart_id'];

            // Update existing cart with new quantity and total price
            $new_quantity = $cartRow['quantity'] + $quantity;
            $new_total_price = $new_quantity * $price;
            $updateCartQuery = "UPDATE cart SET quantity = '$new_quantity', total_price = '$new_total_price', day_buy = '$orderDate' 
                                WHERE cart_id = '$cart_id'";
            $this->db->update($updateCartQuery);
        } else {
            // Insert new cart
            $insertCartQuery = "INSERT INTO cart (customer_id, product_id, quantity, day_buy, total_price) 
                                VALUES ('$customer_id', '$products_id', '$quantity', '$orderDate', '$total_price')";
            $this->db->insert($insertCartQuery);
            $cart_id = $this->db->link->insert_id;
        }

        // Check if the order already exists
        $orderQuery = "SELECT order_id FROM orders WHERE cart_id = '$cart_id' AND customer_id = '$customer_id' AND product_id = '$products_id'";
        $orderResult = $this->db->select($orderQuery);

        if ($orderResult && $orderResult->num_rows > 0) {
            // If order exists, update order quantity
            $orderRow = $orderResult->fetch_assoc();
            $order_id = $orderRow['order_id'];
            $updateOrderQuery = "UPDATE orders SET order_quantity = '$order_quantity', order_date = '$orderDate', status = '$status' 
                                 WHERE order_id = '$order_id'";
            $this->db->update($updateOrderQuery);
        } else {
            // Insert new order
            $insertOrderQuery = "INSERT INTO orders (cart_id, customer_id, product_id, order_quantity, order_date, status) 
                                 VALUES ('$cart_id', '$customer_id', '$products_id', '$order_quantity', '$orderDate', '$status')";
            $this->db->insert($insertOrderQuery);
        }

        header("Location: checkBillAdmin.php");
        return true;
    }

    public function show_bill()
    {
        $query = "SELECT orders.*, customer.*, products.*, cart.quantity, cart.total_price*orders.order_quantity as total_value
            FROM orders 
            INNER JOIN customer ON orders.customer_id = customer.customer_id 
            INNER JOIN products ON products.products_id = orders.product_id
            INNER JOIN cart ON cart.cart_id = orders.cart_id
            ORDER BY orders.order_date DESC";

        $result = $this->db->select($query);
        return $result;
    }

    public function get_bill($order_id)
    {
        $query = "SELECT * FROM orders 
                INNER JOIN customer ON orders.customer_id = customer.customer_id 
                INNER JOIN products ON products.products_id = orders.product_id
                INNER JOIN cart ON cart.cart_id = orders.cart_id
                WHERE order_id = '$order_id'";
        return $this->db->select($query);
    }

    public function update_bill($postData)
    {
        $order_id = (int)$postData['order_id'];
        $customer_id = (int)$postData['customer_id'];
        $cart_id = (int)$postData['cart_id'];
        $customer_name = $this->db->link->real_escape_string($postData['editCustomerName']);
        $product_id = (int)$postData['editProductList'];
        $quantity = (int)$postData['editQuantity'];
        $order_quantity = (int)$postData['editOrderQuantity'];
        $phone = (int)$postData['editPhone'];
        $address = $this->db->link->real_escape_string($postData['editAddress']);
        $status = (int)$postData['editOrderState'];
        $order_date = $this->db->link->real_escape_string($postData['editOrderDate']);

        // Update customer details
        $updateCustomerQuery = "UPDATE customer 
                                SET customer_name = '$customer_name', 
                                    address = '$address', 
                                    phone = '$phone' 
                                WHERE customer_id = '$customer_id'";
        $this->db->update($updateCustomerQuery);

        $queryCart = "UPDATE cart 
                    SET quantity = '$quantity',
                    product_id = '$product_id'
                    WHERE cart_id = '$cart_id'";

        $this->db->update($queryCart);

        // Update order details
        $updateOrderQuery = "UPDATE orders 
                            SET product_id = '$product_id', 
                                order_quantity = '$order_quantity',
                                order_date = '$order_date',
                                status = '$status' 
                            WHERE order_id = '$order_id'";
        $result = $this->db->update($updateOrderQuery);

        return $result;
    }

    public function delete_bill($order_id)
    {
        $order_id = (int)$order_id;
        $query = "DELETE FROM orders WHERE order_id = '$order_id'";

        if ($this->db->delete($query) === TRUE) {
            return ['success' => true];
        } else {
            return ['errors' => "Error: " . $this->db->error];
        }
    }

    public function show_products()
    {
        $query = "SELECT * FROM products";
        $result = $this->db->select($query);
        return $result;
    }
}
