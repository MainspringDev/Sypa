<?php

declare(strict_types=1);

namespace Sypa\Catalog\Controller\Product;

use OpenCart\Catalog\Model\Catalog\CategoryRepository;
use OpenCart\Catalog\Model\Catalog\ManufacturerRepository;
use OpenCart\System\Library\Cache\File;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Contracts\Translation\TranslatorInterface;
use Sypa\Exception\ResourceNotFoundException;
use Sypa\Repository\Catalog\ProductRepository;
use Sypa\Service\View\ViewInterface;

class ProductController {
    /**
     * @var ProductRepository
     */
    private ProductRepository $productRepo;
    /**
     * @var CategoryRepository
     */
    private CategoryRepository $categoryRepo;
    /**
     * @var ManufacturerRepository
     */
    private ManufacturerRepository $manufacturerRepo;
    /**
     * @var TranslatorInterface
     */
    private TranslatorInterface $translator;
    /**
     * @var UrlGenerator
     */
    private UrlGenerator $urlGenerator;
    /**
     * @var ViewInterface
     */
    private ViewInterface $view;
    /**
     * @var array
     */
    private array $error = [];

    public function __construct(
        ProductRepository $productRepo,
        CategoryRepository $categoryRepo,
        ManufacturerRepository $manufacturerRepo,
        TranslatorInterface $translator,
        UrlGenerator $urlGenerator,
        ViewInterface $view
    ) {
        $this->productRepo = $productRepo;
        $this->categoryRepo = $categoryRepo;
        $this->manufacturerRepo = $manufacturerRepo;
        $this->translator = $translator;
        $this->urlGenerator = $urlGenerator;
        $this->view = $view;
    }

    /**
     * @param Request $request
     * @return Response
     */
    /*
    public function index(Request $request): Response {
        $data['product'] = $this->productRepo->getProductBySlug($request->query->get('_slug'));

        return $this->view->render($data, 'catalog/product');
    }
    */

    /**
     * @param Request $request
     * @return Response
     * @throws ResourceNotFoundException
     */
    public function index(Request $request): Response {
        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->translator->trans('text_home'),
            'href' => $this->urlGenerator->generate('common/home', [
                'language' => $this->config->get('config_language')
            ])
        );

        if ($request->query->has('path') === true) {
            $path = '';

            $parts = explode('_', $request->query->getAlnum('path'));

            $category_id = (int)array_pop($parts);

            foreach ($parts as $path_id) {
                if (!$path) {
                    $path = $path_id;
                } else {
                    $path .= '_' . $path_id;
                }

                $category_info = $this->categoryRepo->getCategory($path_id);

                if ($category_info) {
                    $data['breadcrumbs'][] = array(
                        'text' => $category_info['name'],
                        'href' => $this->urlGenerator->generate('product/category', [
                            'language' => $this->config->get('config_language'),
                            'path'     => $path
                        ])
                    );
                }
            }

            // Set the last category breadcrumb
            $category_info = $this->categoryRepo->getCategory($category_id);

            if ($category_info) {
                $parameters = [];

                $parameters['path'] = $request->query->get('path');
                $parameters['language'] = $this->config->get('config_language');

                if (is_string($request->query->get('sort', null)) === true) {
                    $parameters['sort'] = $request->query->get('sort');
                }

                if (is_string($request->query->get('order', null)) === true) {
                    $parameters['order'] = $request->query->get('order');
                }

                if ($request->query->filter('page', null, FILTER_VALIDATE_INT, [
                    'options' => ['min_range' => 1]
                ]) !== false) {
                    $parameters['page'] = $request->query->getInt('page');
                }

                if ($request->query->filter('limit', null, FILTER_VALIDATE_INT, [
                    'options' => ['min_range' => 1]
                ]) !== false) {
                    $parameters['limit'] = $request->query->get('limit');
                }

                $data['breadcrumbs'][] = array(
                    'text' => $category_info['name'],
                    'href' => $this->urlGenerator->generate('product/category', $parameters)
                );
            }
        }

        if ($request->query->filter('manufacturer_id', false, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]) !== false) {
            $data['breadcrumbs'][] = array(
                'text' => $this->translator->trans('text_brand'),
                'href' => $this->urlGenerator->generate('product/manufacturer', [
                    'language' => $this->config->get('config_language')
                ])
            );

            $manufacturer_info = $this->manufacturerRepo->getManufacturer($request->query->getInt('manufacturer_id'));

            if ($manufacturer_info) {
                $parameters = [];

                $parameters['manufacturer_id'] = $request->query->getInt('manufacturer_id');
                $parameters['language'] = $this->config->get('config_language');

                if (is_string($request->query->get('sort', null)) === true) {
                    $parameters['sort'] = $request->query->get('sort');
                }

                if (is_string($request->query->get('order', null)) === true) {
                    $parameters['order'] = $request->query->get('order');
                }

                if ($request->query->filter('page', null, FILTER_VALIDATE_INT, [
                    'options' => ['min_range' => 1]
                ]) !== false) {
                    $parameters['page'] = $request->query->getInt('page');
                }

                if ($request->query->filter('limit', null, FILTER_VALIDATE_INT, [
                    'options' => ['min_range' => 1]
                ]) !== false) {
                    $parameters['limit'] = $request->query->getInt('limit');
                }

                $data['breadcrumbs'][] = array(
                    'text' => $manufacturer_info['name'],
                    'href' => $this->urlGenerator->generate('product/manufacturer/info', $parameters)
                );
            }
        }

        if (is_string($request->query->get('search', null)) === true || is_string($request->query->get('tag', null)) === true) {
            $parameters = [];

            $parameters['language'] = $this->config->get('config_language');

            if (is_string($request->query->get('search', null)) === true) {
                $parameters['search'] = $request->query->get('search');
            }

            if (is_string($request->query->get('tag', null)) === true) {
                $parameters['tag'] = $request->query->get('tag');
            }

            if (is_string($request->query->get('description', null)) === true) {
                $parameters['description'] = $request->query->get('description');
            }

            if ($request->query->filter('category_id', null, FILTER_VALIDATE_INT, [
                'options' => ['min_range' => 1]
            ]) !== false) {
                $parameters['category_id'] = $request->query->getInt('category_id');
            }

            if ($request->query->filter('sub_category', null, FILTER_VALIDATE_INT, [
                'options' => ['min_range' => 1]
            ]) !== false) {
                $parameters['sub_category'] = $request->query->getInt('sub_category');
            }

            if (is_string($request->query->get('sort', null)) === true) {
                $parameters['sort'] = $request->query->get('sort');
            }

            if (is_string($request->query->get('order', null)) === true) {
                $parameters['order'] = $request->query->get('order');
            }

            if ($request->query->filter('page', null, FILTER_VALIDATE_INT, [
                'options' => ['min_range' => 1]
            ]) !== false) {
                $parameters['page'] = $request->query->getInt('page');
            }

            if ($request->query->filter('limit', null, FILTER_VALIDATE_INT, [
                'options' => ['min_range' => 1]
            ]) !== false) {
                $parameters['limit'] = $request->query->getInt('limit');
            }

            $data['breadcrumbs'][] = array(
                'text' => $this->translator->trans('text_search'),
                'href' => $this->urlGenerator->generate('product/search', $parameters)
            );
        }

        if ($request->query->filter('product_id', false, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]) !== false) {
            $product_id = $request->query->getInt('product_id');
        } else {
            $product_id = 0;
        }

        $product_info = $this->productRepo->getProduct($product_id);

        $parameters = [];

        $parameters['product_id'] = $product_id;
        $parameters['language_id'] = $this->config->get('config_language');

        if (is_string($request->query->get('path', null)) === true) {
            $parameters['path'] = $request->query->get('path');
        }

        if (is_string($request->query->get('filter', null)) === true) {
            $parameters['filter'] = $request->query->get('filter');
        }

        if ($request->query->filter('manufacturer_id', null, FILTER_VALIDATE_INT, [
            'options' => ['min_range' => 1]
        ]) !== false) {
            $parameters['manufacturer_id'] = $request->query->getInt('manufacturer_id');
        }

        if (is_string($request->query->get('search', null)) === true) {
            $parameters['search'] = $request->query->get('search');
        }

        if (is_string($request->query->get('tag', null)) === true) {
            $parameters['tag'] = $request->query->get('tag');
        }

        if (is_string($request->query->get('description', null)) === true) {
            $parameters['description'] = $request->query->get('description');
        }

        if ($request->query->filter('category_id', null, FILTER_VALIDATE_INT, [
            'options' => ['min_range' => 1]
        ]) !== false) {
            $parameters['category_id'] = $request->query->getInt('category_id');
        }

        if ($request->query->filter('sub_category', null, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]) !== false) {
            $parameters['sub_category'] = $request->query->getInt('sub_category');
        }

        if (is_string($request->query->get('sort', null)) === true) {
            $parameters['sort'] = $request->query->get('sort');
        }

        if (is_string($request->query->get('order', null)) === true) {
            $parameters['order'] = $request->query->get('order');
        }

        if ($request->query->filter('page', null, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]) !== false) {
            $parameters['page'] = $request->query->getInt('page');
        }

        if ($request->query->filter('limit', null, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]) !== false) {
            $parameters['limit'] = $request->query->getInt('limit');
        }

        $data['breadcrumbs'][] = array(
            'text' => $product_info['name'],
            'href' => $this->urlGenerator->generate('product/product', $parameters)
        );

        $this->document->setTitle($product_info['meta_title']);
        $this->document->setDescription($product_info['meta_description']);
        $this->document->setKeywords($product_info['meta_keyword']);
        $this->document->addLink($this->urlGenerator->generate('product/product', [
            'product_id' => $product_id,
            'language'   => $this->config->get('config_language')
        ]), 'canonical');

        $this->document->addScript('catalog/view/javascript/jquery/magnific/jquery.magnific-popup.min.js');
        $this->document->addStyle('catalog/view/javascript/jquery/magnific/magnific-popup.css');

        $this->document->addScript('catalog/view/javascript/jquery/datetimepicker/moment/moment.min.js');
        $this->document->addScript('catalog/view/javascript/jquery/datetimepicker/moment/moment-with-locales.min.js');
        $this->document->addScript('catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.js');
        $this->document->addStyle('catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.css');

        $data['heading_title'] = $product_info['name'];

        $data['text_minimum'] = $this->translator->trans('text_minimum', [
            'minimum' => $product_info['minimum']
        ]);
        $data['text_login'] = $this->translator->trans('text_login', [
            $this->urlGenerator->generate('account/login', ['language' => $this->config->get('config_language')]),
            $this->urlGenerator->generate('account/register', ['language' => $this->config->get('config_language')])
        ]);

        $this->load->model('catalog/review');

        $data['tab_review'] = $this->translator->trans('tab_review', [
            $product_info['reviews']
        ]);

        $data['product_id'] = $product_id;
        $data['manufacturer'] = $product_info['manufacturer'];
        $data['manufacturers'] = $this->urlGenerator->generate('product/manufacturer/info', [
            'manufacturer_id' => $product_info['manufacturer_id'],
            'language'        => $this->config->get('config_language')
        ]);
        $data['model'] = $product_info['model'];
        $data['reward'] = $product_info['reward'];
        $data['points'] = $product_info['points'];
        $data['description'] = html_entity_decode($product_info['description'], ENT_QUOTES, 'UTF-8');

        if ($product_info['quantity'] <= 0) {
            $data['stock'] = $product_info['stock_status'];
        } elseif ($this->config->get('config_stock_display')) {
            $data['stock'] = $product_info['quantity'];
        } else {
            $data['stock'] = $this->translator->trans('text_instock');
        }

        $this->load->model('tool/image');

        if (is_file(DIR_IMAGE . html_entity_decode($product_info['image'], ENT_QUOTES, 'UTF-8'))) {
            $data['popup'] = $this->model_tool_image->resize(html_entity_decode($product_info['image'], ENT_QUOTES, 'UTF-8'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_popup_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_popup_height'));
        } else {
            $data['popup'] = '';
        }

        if (is_file(DIR_IMAGE . html_entity_decode($product_info['image'], ENT_QUOTES, 'UTF-8'))) {
            $data['thumb'] = $this->model_tool_image->resize(html_entity_decode($product_info['image'], ENT_QUOTES, 'UTF-8'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_thumb_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_thumb_height'));
        } else {
            $data['thumb'] = '';
        }

        $data['images'] = array();

        $results = $this->model_catalog_product->getProductImages($this->request->get['product_id']);

        foreach ($results as $result) {
            if (is_file(DIR_IMAGE . html_entity_decode($result['image'], ENT_QUOTES, 'UTF-8'))) {
                $data['images'][] = array(
                    'popup' => $this->model_tool_image->resize(html_entity_decode($result['image'], ENT_QUOTES, 'UTF-8'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_popup_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_popup_height')),
                    'thumb' => $this->model_tool_image->resize(html_entity_decode($result['image'], ENT_QUOTES, 'UTF-8'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_additional_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_additional_height'))
                );
            }
        }

        if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
            $data['price'] = $this->currency->format($this->tax->calculate($product_info['price'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
        } else {
            $data['price'] = false;
        }

        if ((float)$product_info['special']) {
            $data['special'] = $this->currency->format($this->tax->calculate($product_info['special'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
        } else {
            $data['special'] = false;
        }

        if ($this->config->get('config_tax')) {
            $data['tax'] = $this->currency->format((float)$product_info['special'] ? $product_info['special'] : $product_info['price'], $this->session->data['currency']);
        } else {
            $data['tax'] = false;
        }

        $discounts = $this->model_catalog_product->getProductDiscounts($this->request->get['product_id']);

        $data['discounts'] = array();

        foreach ($discounts as $discount) {
            $data['discounts'][] = array(
                'quantity' => $discount['quantity'],
                'price'    => $this->currency->format($this->tax->calculate($discount['price'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency'])
            );
        }

        $data['options'] = array();

        // Check if product is variant
        if ($product_info['master_id']) {
            $product_id = (int)$product_info['master_id'];
        } else {
            $product_id = (int)$this->request->get['product_id'];
        }

        $product_options = $this->model_catalog_product->getProductOptions($product_id);

        foreach ($product_options as $option) {
            if ((int)$this->request->get['product_id'] && !isset($product_info['override']['variant'][$option['product_option_id']])) {
                $product_option_value_data = array();

                foreach ($option['product_option_value'] as $option_value) {
                    if (!$option_value['subtract'] || ($option_value['quantity'] > 0)) {
                        if ((($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) && (float)$option_value['price']) {
                            $price = $this->currency->format($this->tax->calculate($option_value['price'], $product_info['tax_class_id'], $this->config->get('config_tax') ? 'P' : false), $this->session->data['currency']);
                        } else {
                            $price = false;
                        }

                        if (is_file(DIR_IMAGE . html_entity_decode($option_value['image'], ENT_QUOTES, 'UTF-8'))) {
                            $image = $this->model_tool_image->resize(html_entity_decode($option_value['image'], ENT_QUOTES, 'UTF-8'), 50, 50);
                        } else {
                            $image = '';
                        }

                        $product_option_value_data[] = array(
                            'product_option_value_id' => $option_value['product_option_value_id'],
                            'option_value_id'         => $option_value['option_value_id'],
                            'name'                    => $option_value['name'],
                            'image'                   => $image,
                            'price'                   => $price,
                            'price_prefix'            => $option_value['price_prefix']
                        );
                    }
                }

                $data['options'][] = array(
                    'product_option_id'    => $option['product_option_id'],
                    'product_option_value' => $product_option_value_data,
                    'option_id'            => $option['option_id'],
                    'name'                 => $option['name'],
                    'type'                 => $option['type'],
                    'value'                => $option['value'],
                    'required'             => $option['required']
                );
            }
        }

        if ($product_info['minimum']) {
            $data['minimum'] = $product_info['minimum'];
        } else {
            $data['minimum'] = 1;
        }

        $data['review_status'] = $this->config->get('config_review_status');

        if ($this->config->get('config_review_guest') || $this->customer->isLogged()) {
            $data['review_guest'] = true;
        } else {
            $data['review_guest'] = false;
        }

        if ($this->customer->isLogged()) {
            $data['customer_name'] = $this->customer->getFirstName() . '&nbsp;' . $this->customer->getLastName();
        } else {
            $data['customer_name'] = '';
        }

        $data['reviews'] = $this->translator->trans('text_reviews', [
            (int)$product_info['reviews']
        ]);
        $data['rating'] = (int)$product_info['rating'];

        // Captcha
        if ($this->config->get('captcha_' . $this->config->get('config_captcha') . '_status') && in_array('review', (array)$this->config->get('config_captcha_page'))) {
            $data['captcha'] = $this->load->controller('extension/captcha/' . $this->config->get('config_captcha'));
        } else {
            $data['captcha'] = '';
        }

        $data['share'] = $this->url->link('product/product', 'language=' . $this->config->get('config_language') . '&product_id=' . (int)$this->request->get['product_id']);

        $data['current_link'] = ($this->request->server['HTTPS'] ? 'https://' : 'http://') . $this->request->server['HTTP_HOST'] . $this->request->server['REQUEST_URI'];

        $data['attribute_groups'] = $this->model_catalog_product->getProductAttributes($this->request->get['product_id']);

        $data['products'] = array();

        $results = $this->productRepo->getProductRelated($product_id);

        foreach ($results as $result) {
            if (is_file(DIR_IMAGE . html_entity_decode($result['image'], ENT_QUOTES, 'UTF-8'))) {
                $image = $this->model_tool_image->resize(html_entity_decode($result['image'], ENT_QUOTES, 'UTF-8'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_related_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_related_height'));
            } else {
                $image = $this->model_tool_image->resize('placeholder.png', $this->config->get('theme_' . $this->config->get('config_theme') . '_image_related_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_related_height'));
            }

            if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
                $price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
            } else {
                $price = false;
            }

            if ((float)$result['special']) {
                $special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
            } else {
                $special = false;
            }

            if ($this->config->get('config_tax')) {
                $tax = $this->currency->format((float)$result['special'] ? $result['special'] : $result['price'], $this->session->data['currency']);
            } else {
                $tax = false;
            }

            if ($this->config->get('config_review_status')) {
                $rating = (int)$result['rating'];
            } else {
                $rating = false;
            }

            $data['products'][] = array(
                'product_id'  => $result['product_id'],
                'thumb'       => $image,
                'name'        => $result['name'],
                'description' => utf8_substr(trim(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'))), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_product_description_length')) . '..',
                'price'       => $price,
                'special'     => $special,
                'tax'         => $tax,
                'minimum'     => $result['minimum'] > 0 ? $result['minimum'] : 1,
                'rating'      => $rating,
                'href'        => $this->url->link('product/product', 'language=' . $this->config->get('config_language') . '&product_id=' . $result['product_id'])
            );
        }

        $data['tags'] = array();

        if ($product_info['tag']) {
            $tags = explode(',', $product_info['tag']);

            foreach ($tags as $tag) {
                $data['tags'][] = array(
                    'tag'  => trim($tag),
                    'href' => $this->url->link('product/search', 'language=' . $this->config->get('config_language') . '&tag=' . trim($tag))
                );
            }
        }

        $data['recurrings'] = $this->model_catalog_product->getProfiles($this->request->get['product_id']);

        $this->model_catalog_product->updateViewed($this->request->get['product_id']);

        $data['column_left'] = $this->load->controller('common/column_left');
        $data['column_right'] = $this->load->controller('common/column_right');
        $data['content_top'] = $this->load->controller('common/content_top');
        $data['content_bottom'] = $this->load->controller('common/content_bottom');
        $data['footer'] = $this->load->controller('common/footer');
        $data['header'] = $this->load->controller('common/header');

        return $this->response->setOutput($this->load->view('product/product', $data));
    }
}
