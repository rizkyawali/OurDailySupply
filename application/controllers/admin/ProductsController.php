<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductsController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('products');
    }

    public function index()
    {
        $data['products'] = $this->products->show_products();

        $this->load->view('backend/products/indexproducts.php', $data);
    }

    public function create()
    {
        $this->load->view('backend/products/create_product.php');
    }

    public function update($id)
    {
        $this->load->view('backend/products/update_product.php');
    }

    public function delete($id)
    {
        $this->products->delete($id);
        redirect('admin/productcontroller');
    }

}
