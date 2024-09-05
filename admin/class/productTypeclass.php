<?php
include "database.php";
?>

<?php
class productType
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function insert_productType($category_id, $productType_name)
    {
        $query = "INSERT INTO product_type (category_id, product_name) VALUES ('$category_id', '$productType_name')";
        $result = $this->db->insert($query);
        header("Location: productType.php");
        return $result;
    }

    public function show_category()
    {
        $query = "SELECT * FROM category ORDER BY category_id ASC";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_productType()
    {
        $query = "SELECT product_type.*, category.category_name
                FROM product_type 
                INNER JOIN category ON product_type.category_id = category.category_id
                ORDER BY product_type.product_id ASC";

        $result = $this->db->select($query);

        return $result;
    }

    public function get_productType($product_id)
    {
        $query = "SELECT * FROM product_type WHERE product_id = '$product_id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_productType($category_id, $product_name, $product_id)
    {
        $query = "UPDATE product_type SET product_name = '$product_name',category_id='$category_id' WHERE product_id = '$product_id'";
        $result = $this->db->update($query);
        header("Location: productType.php");
        return $result;
    }

    public function delete_productType($product_id)
    {
        $query = "DELETE FROM category WHERE category_id = '$product_id'";
        $result = $this->db->delete($query);
        header('Location: productType.php');
        return $result;
    }
}
