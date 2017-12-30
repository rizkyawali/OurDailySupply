 <?php defined('BASEPATH') OR exit('No direct script access allowed');

 class Products extends CI_Model
 {
     public function show_products()
     {
         $show = $this->db->get('products');

         if ($show->num_rows() > 0)
         {
             return $show->result();
         }
         else
         {
             return array();
         }
     }

     public function find($id)
     {
         $show = $this->db->where('product_id', $id)
                          ->limit(1)
                          ->get('products');

         if ($show->num_rows(0) > 0)
         {
             return $show->row();
         }
         else
         {
             return array();
         }
     }

     public function create($data_products)
     {
        $this->db->insert('products', $data_products);
     }

     public function update($id, $data_products)
     {
        $this->db->where('product_id', $id )
                 ->update('products', $data_products);
     }

     public function delete($id)
     {
        $this->db->where('product_id', $id)
                 ->delete('products');
     }

 }