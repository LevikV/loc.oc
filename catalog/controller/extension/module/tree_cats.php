<?php
class ControllerExtensionModuleTreeCats extends Controller {
	public function index() {
		$this->load->language('extension/module/tree_cats');

		$data['my_title'] = $this->language->get('heading_title');
        return $this->load->view('extension/module/tree_cats', $data);
	}
}