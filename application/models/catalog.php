<?php
class Catalog extends CI_Model {
    // START - Geoff Customization and Catalog Core Logic
    public function getProducts($data = array()){
        $sql = "SELECT p.* FROM product p ";
        
        if($data['category'] != null){
            $sql .= " WHERE category_no = '".$data['category']."'";
        }
        
        $query = $this->db->query($sql);
        
        return $query->result_array();
    }
    public function getProductDesign($product_no ){
        $sql = "SELECT pd.*,p.`category_no` FROM product_design pd JOIN product p ON p.`product_no`=pd.`product_no` WHERE pd.product_no = '".$product_no."' ORDER BY design_price ASC";
        $query = $this->db->query($sql);
        return array_chunk($query->result_array(), 4);
    }
    public function getTotalPrice($product_info=array(),$features = array() ){
        $totalPrice = 0;
        foreach($product_info AS $product){
            $totalPrice += $product['price'];
        }
        foreach($features AS $feature){
            $totalPrice += $feature[0]['feature_price'];
        }
        return number_format($totalPrice, 2);
    }
    public function getProduct($product_no = null){
        $sql = "SELECT * FROM product WHERE product_no = '".$product_no."'";
        
        $query = $this->db->query($sql);
        
        return $query->result_array();
    }
    public function getFeatures($data = array()){
        $results = array(); $count = 0;
        foreach($data AS $feature){
            $sql = "SELECT * from product_custom_feature WHERE feature_no = '".$feature."'";
            $query = $this->db->query($sql);
            $result_query = $query->result_array();
            $results[$count] = $result_query;
            $count++;
        }
        return $results;
    }
    
    public function getProductCategories(){
        $sql = "SELECT * FROM category";
        
        $query = $this->db->query($sql);
        
        return $query->result_array();
    }
    public function getAvailableProductColors($product_no){
        $sql = "SELECT * FROM product_colors WHERE product_no = '".$product_no."' ORDER BY product_colors.color";
        $query = $this->db->query($sql);
        return array_chunk($query->result_array(),1);
    }
    public function getProductCustomFeatures($product_no){
        $sql = "SELECT pcf.*, pp.* FROM product_custom_feature pcf JOIN product_part pp ON pp.`part` = pcf.`part` WHERE pcf.product_no = '".$product_no."'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function saveOrder($input_datas = array(), $session_data = array()){

        $this->db->query("INSERT INTO customer_orders values(null,
            '".$input_datas['id']."',
                '".$input_datas['total_price']."',now(),0,
                    '".$input_datas['file_data']['file_name']."')");
        
        $select_last_record = $this->db->query("SELECT order_id 
            FROM customer_orders 
            ORDER BY order_id DESC LIMIT 1");

        $select_last_record_obj = $select_last_record->row();
        
        $last_order_id = $select_last_record_obj->order_id;
        
        $this->db->query("INSERT INTO customer_information values('".$input_datas['id']."',
            '".$input_datas['firstname']."','".$input_datas['lastname']."','".$input_datas['phone']."',
                '".$input_datas['email']."','".$session_data['customer_ip']."',
                    '".$last_order_id."')");
        
        foreach($input_datas['features'] AS $feature){
            if($feature != null){
                $this->db->query("INSERT INTO order_features values('".$last_order_id."','".$feature."')");
            }
        }
        $this->db->query("INSERT INTO order_product values('".$last_order_id."','".$session_data['product_no']."')");
    }
    // END - Geoff Customization and Catalog Core Logic
    
}

