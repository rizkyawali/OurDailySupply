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
        // $this->form_validation->set_rules('userfile', 'Image', 'required');

        /*Execute Add New Data*/
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('backend/products/create_product.php');
        }
        else
        {
            /*Image Upload Library*/
            $config['upload_path'] = './assets/images/upload/products/';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = '5'; /*MB*/
            $config['max_width'] = '1024';
            $config['max_height'] = '768';

            $this->load->library('upload', $config);

            if (! $this->upload->do_upload())
            {
                $this->load->view('backend/products/create_product.php');
            }
            else
            {
                /*Execute Image Upload*/

                /*Insert Data To Database*/
                $img = $this->upload->data();
                $data_products = array('product_name' => set_value('product_name'),
                    'description' => set_value('description'),
                    'price' => set_value('price'),
                    'stock' => set_value('stock'),
                    'image' => $img['file_name']
                );

                $this->products->create($data_products);
                redirect('admin/ProductsController');
            }


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
            /*Updating Data With Image*/
            if ($_FILES['userfile']['name'] != '') {
                /*Image Upload Library*/
                $config['upload_path'] = './assets/images/upload/products/';
                $config['allowed_types'] = 'jpg|png';
                $config['max_size'] = '5'; /*MB*/
                $config['max_width'] = '1024';
                $config['max_height'] = '768';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload()) {
                    $data['product'] = $this->products->find($id);
                    $this->load->view('backend/products/update_product.php', $data);
                } else {

                    $img = $this->upload->data();
                    $data_products = array('product_name' => set_value('product_name'),
                        'description' => set_value('description'),
                        'price' => set_value('price'),
                        'stock' => set_value('stock'),
                        'image' => $img['file_name']
                    );

                    $this->products->update($id, $data_products);
                    redirect('admin/ProductsController');
                }
            }
            else
            {
                /*Updating Data Without Uploading Image*/

                $img = $this->upload->data();
                $data_products = array('product_name' => set_value('product_name'),
                    'description' => set_value('description'),
                    'price' => set_value('price'),
                    'stock' => set_value('stock')
                );

                $this->products->update($id, $data_products);
                redirect('admin/ProductsController');
            }
        }

    }

    public function delete($id)
    {
        $this->products->delete($id);
        redirect('admin/ProductsController');
    }

}
