<?php

class ProductsModel
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO(getenv("DB_DNS").';',
        getenv("DB_USER"), getenv("DB_PASS"));

        $this->db = null;
    }
    
    public function getAllProductsAdmin()
    {
        $query = $this->db->prepare("SELECT * FROM products");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);        
    }

    public function getAllProducts($search = null, $special = null)
    {
        //we set the variables we need to make the pagination
        $limit = 3; //how many product we want to see for each page
        $pag = isset($_GET['pag']) ? (int) $_GET['pag'] : 1; // to not brake the first page
        if ($pag < 1) {
            $pag = 1;
        }
        $offset = ($pag > 1) ? (($pag * $limit) - $limit) : 0;  //were we start to see products
        
        $queryString = "SELECT SQL_CALC_FOUND_ROWS products.id, products.name_product, products.img_product, categories.category_name, products.price, products.details
        FROM products LEFT JOIN categories ON products.id_category = categories.id";
        
        $filterQuery = "SELECT SQL_CALC_FOUND_ROWS products.id, products.name_product, products.img_product, categories.category_name, products.price, products.details FROM products,categories WHERE id_category = categories.id
        AND categories.category_name = :search";

        $pagination = " LIMIT :offset, :howMany";

        $specialSearch = "SELECT SQL_CALC_FOUND_ROWS products.id, products.name_product, products.img_product, categories.category_name, products.price, products.details
        FROM products LEFT JOIN categories ON products.id_category = categories.id WHERE img_product LIKE '%$special%' OR name_product LIKE '%$special%'
        OR price LIKE '%$special%' OR details LIKE '%$special%'";

        //we make the query and add filter if required
        if ((isset($search) && $search != null )) {
            $finalQuery = $filterQuery . $pagination;
        } elseif ((isset($special) && $special != null )){
            $finalQuery =  $specialSearch . $pagination;
        } else{
            $finalQuery = $queryString . $pagination;
        }

        $query = $this->db->prepare($finalQuery);

        $query->bindParam(':offset', $offset, PDO::PARAM_INT);
        $query->bindParam(':howMany', $limit, PDO::PARAM_INT);
        if (isset($search) && $search != null) {
            $query->bindParam(':search', $search, PDO::PARAM_STR);
        }

        //we get all products
        $query->execute();

        //we get total
        $totalRows = $this->db->query("SELECT FOUND_ROWS() as total");
        $totalRows=$totalRows->fetch()['total'];

        //we calculate number of pages
        $pages = ceil($totalRows / $limit); //Round fractions up

        //we prepare data to return
        $dataToReturn = array("special" => $special, "search"=>$search, "products"=>$query->fetchAll(PDO::FETCH_OBJ), "page"=>$pag, "pages"=>$pages);
     
        return $dataToReturn;         
    }

    public function getProductsByCategories($search, $special)
    {
        return $this->getAllProducts($search, $special);        
    }

    public function getAllCategories()
    {
        $query = $this->db->prepare("SELECT * FROM categories ORDER by id ASC");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);        
    }

    public function addProduct($id_category, $productName, $price, $details = null, $imagen = null)
    {
        $pathImg ="";
        if ($imagen)
            $pathImg = $this->uploadImage($imagen);

        $query = $this->db->prepare("INSERT INTO products (id_category, img_product, name_product, price, details)
                                    VALUES (?,?,?,?,?)");
        $query->execute(
            array($id_category,$pathImg,$productName,$price, $details)
        );        
    }
    private function uploadImage($image){
        $target = "../images/";
        $targetPiece =  uniqid() . "." . strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));  
        move_uploaded_file($image['tmp_name'], $target . $targetPiece);
        return $targetPiece;
    }

    public function deleteProduct($id_product)
        {        
        $query = $this->db->prepare("DELETE from products where id = ?");
        $query->execute(
            array($id_product)
        );       
    }

    public function modifyProduct($product_id, $id_category, $productName, $price, $details, $imagen = null)
    {
        $pathImg = "";
        if ($imagen)
            $pathImg = $this->uploadImage($imagen); 

        $data = [
            'category_id' => $id_category,
            'imgName' => $pathImg,
            'nameProd' => $productName,
            'price' => $price,
            'ide' =>  $product_id,
            'details' => $details
        ];
        $query = $this->db->prepare("UPDATE products SET price=:price, 
        id_category=:category_id, img_product=:imgName, name_product=:nameProd, details=:details WHERE id=:ide");
        $query->execute($data);       
    }
}
