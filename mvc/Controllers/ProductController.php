<h1>Product Controller</h1>
<?php
class ProductController extends BaseController
{
    private $productModel;
    public function __construct()
    {
        // require './Models/ProductModel.php' thay bằng: ;
        $this->loadModel('ProductModel.php');

        $this->productModel = new ProductModel;
    }
    public function index()
    {
        $listProductsHot = $this->productModel->getListProductHot();
        $listProductNewArrival = $this->productModel->getListProductNewArrival();

        $arrayDatas = [
            'listProductHot' => $listProductsHot,
            'listProductNewArrival' => $listProductNewArrival,
            'headingHot' => 'List Product Hot',
            'headingNewArrival' => 'List Product New Arrival',

        ];

        return $this->view('product.list_product', $arrayDatas);
    }
    public function create()
    {
        return $this->view('product.create_product');

    }
}
?>