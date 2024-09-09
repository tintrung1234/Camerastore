<?php
include "database.php";
?>

<?php
class products
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function insert_products($data, $files)
    {
        $errors = [];

        $title = $this->db->link->real_escape_string($data['productName']);
        $category_id = $this->db->link->real_escape_string($data['category']);
        $type_id = $this->db->link->real_escape_string($data['productType']);
        $price = $this->db->link->real_escape_string($data['price']);
        $quantity = $this->db->link->real_escape_string($data['quantity']);
        $description = $this->db->link->real_escape_string($data['description']);
        $discount = $this->db->link->real_escape_string($data['discount']);

        // Lấy tên loại sản phẩm dựa trên type_id
        $query_type = "SELECT product_type_name FROM product_type WHERE product_type_id = '$type_id'";
        $result_type = $this->db->select($query_type);
        if ($result_type) {
            $row = $result_type->fetch_assoc();
            $type_name = $row['product_type_name'];
        } else {
            $errors['typeError'] = "Loại sản phẩm không hợp lệ!";
            return ['errors' => $errors];
        }

        // Xử lý hình ảnh chính của sản phẩm
        $image = $files['images']['name'];
        if ($image) {
            $image_tmp = $files['images']['tmp_name'];
            $image_ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
            $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];

            if (in_array($image_ext, $allowed_ext)) {
                $image_new_name = uniqid('', true) . '.' . $image_ext;
                $image_destination = '../uploads/' . $image_new_name;
                if (!move_uploaded_file($image_tmp, $image_destination)) {
                    $errors['imageError'] = "Không thể tải lên hình ảnh!";
                }
            } else {
                $errors['imageError'] = "File ảnh không hợp lệ!";
            }
        } else {
            $errors['imageError'] = "Vui lòng chọn một hình ảnh!";
        }

        if (!empty($errors)) {
            return ['errors' => $errors];
        }

        // Thêm sản phẩm vào bảng products với tên loại sản phẩm
        $query = "INSERT INTO products (title, category_id, type, price, quantity, description, discount, images)
                  VALUES ('$title', '$category_id', '$type_name', '$price', '$quantity', '$description', '$discount', '$image_new_name')";

        $inserted_id = $this->db->insert($query);
        if (!$inserted_id) {
            return ['errors' => ['formError' => "Thêm sản phẩm thất bại!"]];
        }

        // Xử lý ảnh mô tả sản phẩm và thêm vào bảng images_des
        foreach ($files['images_des']['name'] as $key => $image_des) {
            $image_des_tmp = $files['images_des']['tmp_name'][$key];
            $image_des_ext = strtolower(pathinfo($image_des, PATHINFO_EXTENSION));
            if (in_array($image_des_ext, $allowed_ext)) {
                $image_des_new_name = uniqid('', true) . '.' . $image_des_ext;
                $image_des_destination = '../uploads/' . $image_des_new_name;
                if (!move_uploaded_file($image_des_tmp, $image_des_destination)) {
                    $errors['imageDesError'] = "Không thể tải lên ảnh mô tả!";
                } else {
                    $query_des = "INSERT INTO images_des (products_id, images_description) VALUES ('$inserted_id', '$image_des_new_name')";
                    $this->db->insert($query_des);
                }
            } else {
                $errors['imageDesError'] = "File ảnh mô tả không hợp lệ!";
            }
        }

        if (!empty($errors)) {
            return ['errors' => $errors];
        }
    }

    public function show_category()
    {
        $query = "SELECT * FROM category ORDER BY category_id DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_productType($category_id)
    {
        $query = "SELECT * FROM product_type WHERE category_id = '$category_id'";

        $result = $this->db->select($query);

        return $result;
    }

    public function show_products()
    {
        $query = "SELECT * FROM products WHERE category_id != 3 ORDER BY products_id DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_phuKien()
    {
        $query = "SELECT * FROM products WHERE type NOT IN ('Canon', 'Sony', 'Nikon')";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_products($products_id)
    {
        $query = "SELECT * FROM products WHERE products_id = '$products_id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_product_types_by_category($category_id)
    {
        $query = "SELECT * FROM product_type WHERE category_id = '$category_id'";
        return $this->db->select($query);
    }

    public function get_category($category_id)
    {
        $query = "SELECT * FROM category WHERE category_id = '$category_id'";
        return $this->db->select($query);
    }

    public function get_images_des($products_id)
    {
        $query = "SELECT * FROM images_des WHERE products_id = '$products_id'";
        return $this->db->select($query);
    }

    public function update_product($data, $files)
    {
        $productId = $data['products_id'];
        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $categoryId = mysqli_real_escape_string($this->db->link, $data['category']);
        $productType = mysqli_real_escape_string($this->db->link, $data['productType']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $quantity = mysqli_real_escape_string($this->db->link, $data['quantity']);
        $description = mysqli_real_escape_string($this->db->link, $data['description']);
        $discount = mysqli_real_escape_string($this->db->link, $data['discount']);

        // Kiểm tra và xử lý hình ảnh sản phẩm
        $image = $files['images']['name'];
        $imageTmp = $files['images']['tmp_name'];
        $imageSize = $files['images']['size'];

        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $fileExt = strtolower(pathinfo($image, PATHINFO_EXTENSION));
        $uniqueImage = substr(md5(time()), 0, 10) . '.' . $fileExt;
        $uploadedImage = "../uploads/" . $uniqueImage;

        if ($imageSize > 0) {
            if ($imageSize > 2097152) { // 2MB
                return "<span class='error'>Kích thước ảnh quá lớn. Chọn ảnh có kích thước nhỏ hơn 2MB.</span>";
            }
            if (in_array($fileExt, $permited) === false) {
                return "<span class='error'>Chỉ chấp nhận các tệp: " . implode(', ', $permited) . "</span>";
            }
            // Xóa ảnh cũ (nếu có) và cập nhật ảnh mới
            move_uploaded_file($imageTmp, $uploadedImage);
            $query = "UPDATE products 
                      SET 
                          title = '$productName', 
                          category_id = '$categoryId', 
                          type = '$productType', 
                          price = '$price', 
                          quantity = '$quantity', 
                          description = '$description', 
                          discount = '$discount',
                          images = '$uniqueImage'
                      WHERE products_id = '$productId'";
        } else {
            // Nếu không có hình ảnh mới, chỉ cập nhật các trường khác
            $query = "UPDATE products 
                      SET 
                          title = '$productName', 
                          category_id = '$categoryId', 
                          type = '$productType', 
                          price = '$price', 
                          quantity = '$quantity', 
                          description = '$description', 
                          discount = '$discount'
                      WHERE products_id = '$productId'";
        }

        $updated_row = $this->db->update($query);

        if ($updated_row) {
            return "<span class='success'>Cập nhật sản phẩm thành công.</span>";
        } else {
            return "<span class='error'>Cập nhật sản phẩm thất bại.</span>";
        }
    }

    public function delete_product($productId)
    {
        // Sanitize the product ID
        $productId = $this->db->link->real_escape_string($productId);

        // Get the images associated with the product
        $query = "SELECT images FROM products WHERE products_id = '$productId'";
        $result = $this->db->select($query);
        if ($result->num_rows > 0) {
            $product = $result->fetch_assoc();
            $image = $product['images'];

            // Delete the main image file
            if ($image && file_exists("../uploads/" . $image)) {
                unlink("uploads/" . $image);
            }

            // Delete associated description images from the images_des table
            $queryDesImages = "SELECT images_description FROM images_des WHERE products_id = '$productId'";
            $resultDesImages = $this->db->select($queryDesImages);
            if ($resultDesImages->num_rows > 0) {
                while ($imageDes = $resultDesImages->fetch_assoc()) {
                    $imageDesPath = "../uploads/" . $imageDes['images_description'];
                    if (file_exists($imageDesPath)) {
                        unlink($imageDesPath);
                    }
                }
            }

            // Delete the images from the images_des table
            $queryDeleteDesImages = "DELETE FROM images_des WHERE products_id = '$productId'";
            $this->db->select($queryDeleteDesImages);

            // Delete the product from the products table
            $queryDeleteProduct = "DELETE FROM products WHERE products_id = '$productId'";
            header("Location: productAdmin.php");

            if ($this->db->select($queryDeleteProduct)) {
                return "Sản phẩm đã được xóa thành công.";
            } else {
                return "Đã xảy ra lỗi khi xóa sản phẩm: " . $this->db->error;
            }
        } else {
            return "Không tìm thấy sản phẩm.";
        }
    }
}
