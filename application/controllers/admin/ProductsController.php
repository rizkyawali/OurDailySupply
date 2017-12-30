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
        /*Form Validation*/
        $this->form_validation->set_rules('product_name', 'Product Name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required|integer');
        $this->form_validation->set_rules('stock', 'Available Stock', 'required|integer');

        /*Execute Add New Data*/
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('backend/products/create_product.php');
        }
        else
        {
            $data_products = array('product_name' => set_value('product_name'),
                                   'description' => set_value('description'),
                                   'price' => set_value('price'),
                                   'stock' => set_value('stock')
                                  );

            $this->products->create($data_products);
            redirect('admin/ProductsController');
        }
    }

    public function update($id)
    {
        /*Form Validation*/
        $this->form_validation->set_rules('product_name', 'Product Name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required|integer');
        $this->form_validation->set_rules('stock', 'Available Stock', 'required|integer');

        if ($this->form_validation->run() == FALSE )
        {
            $data['product'] = $this->products->find($id);
            $this->load->view('backend/products/update_product.php', $data);
        }
        else
        {
            $data_products = array('product_name' => set_value('product_name'),
                'description' => set_value('description'),
                'price' => set_value('price'),
                'stock' => set_value('stock')
            );

            $this->products->update($id, $data_products);
            redirect('admin/ProductsController');
        }

    }

    public function delete($id)
    {
        $this->products->delete($id);
        redirect('admin/ProductsController');
    }

}
