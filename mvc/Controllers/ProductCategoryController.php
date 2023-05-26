<h1>Product Category Controller</h1>
<?php
class ProductCategoryController extends BaseController
{
    public function index()
    {
        return $this->view('product_category.list_product_category');
    }
    public function create()
    {
        return $this->view('product_category.create_product_category');
    }
}


?>