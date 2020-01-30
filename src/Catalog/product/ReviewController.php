<?php

declare(strict_types=1);

namespace Sypa\Catalog\product;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ReviewController {
    /*
    public function index(Request $request): Response {}

    public function write(Request $request): Response {}
    */

    public function review(Request $request): Response {
        $this->load->language('product/product');

        $this->load->model('catalog/review');

        if (isset($this->request->get['page'])) {
            $page = (int)$this->request->get['page'];
        } else {
            $page = 1;
        }

        $data['reviews'] = array();

        $review_total = $this->model_catalog_review->getTotalReviewsByProductId($this->request->get['product_id']);

        $results = $this->model_catalog_review->getReviewsByProductId($this->request->get['product_id'], ($page - 1) * 5, 5);

        foreach ($results as $result) {
            $data['reviews'][] = array(
                'author'     => $result['author'],
                'text'       => nl2br($result['text']),
                'rating'     => (int)$result['rating'],
                'date_added' => date($this->language->get('date_format_short'), strtotime($result['date_added']))
            );
        }

        $data['pagination'] = $this->load->controller('common/pagination', array(
            'total' => $review_total,
            'page'  => $page,
            'limit' => 5,
            'url'   => $this->url->link('product/product/review', 'language=' . $this->config->get('config_language') . '&product_id=' . $this->request->get['product_id'] . '&page={page}')
        ));

        $data['results'] = sprintf($this->language->get('text_pagination'), ($review_total) ? (($page - 1) * 5) + 1 : 0, ((($page - 1) * 5) > ($review_total - 5)) ? $review_total : ((($page - 1) * 5) + 5), $review_total, ceil($review_total / 5));

        $this->response->setOutput($this->load->view('product/review', $data));
    }

    public function write(Request $request): Response {
        $this->load->language('product/product');

        $json = array();

        if ($this->request->server['REQUEST_METHOD'] == 'POST') {
            if ((utf8_strlen($this->request->post['name']) < 3) || (utf8_strlen($this->request->post['name']) > 25)) {
                $json['error'] = $this->language->get('error_name');
            }

            if ((utf8_strlen($this->request->post['text']) < 25) || (utf8_strlen($this->request->post['text']) > 1000)) {
                $json['error'] = $this->language->get('error_text');
            }

            if (empty($this->request->post['rating']) || $this->request->post['rating'] < 0 || $this->request->post['rating'] > 5) {
                $json['error'] = $this->language->get('error_rating');
            }

            // Captcha
            if ($this->config->get('captcha_' . $this->config->get('config_captcha') . '_status') && in_array('review', (array)$this->config->get('config_captcha_page'))) {
                $captcha = $this->load->controller('extension/captcha/' . $this->config->get('config_captcha') . '/validate');

                if ($captcha) {
                    $json['error'] = $captcha;
                }
            }

            if (!isset($json['error'])) {
                $this->load->model('catalog/review');

                $this->model_catalog_review->addReview($this->request->get['product_id'], $this->request->post);

                $json['success'] = $this->language->get('text_success');
            }
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }
}
