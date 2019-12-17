<?php

namespace OpenCart\Install\Controller\Common;

use OpenCart\System\Engine\Controller;

class ControllerCommonHeader extends Controller {
	public function index() {
		$this->load->language('common/header');

		$data['title'] = $this->document->getTitle();
		$data['description'] = $this->document->getDescription();
		$data['links'] = $this->document->getLinks();
		$data['styles'] = $this->document->getStyles();
		$data['scripts'] = $this->document->getScripts();

		$data['base'] = HTTP_SERVER;

		return $this->load->view('common/header', $data);
	}
}
