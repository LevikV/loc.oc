<?php
class ControllerExtensionModuleTreeCats extends Controller {

    protected function debug($data) {
        echo '<pre>' . print_r($data, 1) . '</pre>';
    }

    public function index() {
		$this->load->language('extension/module/tree_cats');

		$data['my_title'] = $this->language->get('heading_title');
        //Получаем ID категории
        if (isset($this->request->get['path'])) {
            $parts = explode('_', (string)$this->request->get['path']);
        } else {
            $parts = array();
        }
        //Получаем ID активной категории
        if (!empty($parts)) {
            $data['active'] = end($parts);
        } else {
            $data['active'] = 0;
        }
        //Подключаем модель
        $this->load->model('catalog/tree_cats');

        $data['categories'] = array();

        $categories = $this->model_catalog_tree_cats->getTreeCats();


        $this->debug($categories);


        return $this->load->view('extension/module/tree_cats', $data);
	}
}