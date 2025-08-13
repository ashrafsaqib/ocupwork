<?php
namespace Opencart\Catalog\Controller\Checkout;
/**
 * Class Confirm
 *
 * Can be loaded using $this->load->controller('catalog/confirm');
 *
 * @package Opencart\Catalog\Controller\Checkout
 */
class Confirm extends \Opencart\System\Engine\Controller {
	/**
	 * Index
	 *
	 * @return string
	 */
	public function getData(): string {
		$accessToken = "eyJ0eXAiOiJKV1QiLCJub25jZSI6IkszRXVLSGtwVFNKWWdOR1lRN3U0SkswdHFUUFZ6dEtDOUVScm5VUTZLMk0iLCJhbGciOiJSUzI1NiIsIng1dCI6IkpZaEFjVFBNWl9MWDZEQmxPV1E3SG4wTmVYRSIsImtpZCI6IkpZaEFjVFBNWl9MWDZEQmxPV1E3SG4wTmVYRSJ9.eyJhdWQiOiJodHRwczovL2dyYXBoLm1pY3Jvc29mdC5jb20iLCJpc3MiOiJodHRwczovL3N0cy53aW5kb3dzLm5ldC9mY2JhNmJhNi05Y2E2LTQ4OTItOTkyNS0zMWYyNjQ4NDY1NGIvIiwiaWF0IjoxNzU1MTE5NDUyLCJuYmYiOjE3NTUxMTk0NTIsImV4cCI6MTc1NTEyMzM1MiwiYWlvIjoiazJSZ1lIZys1UkpyMHJ5ZjB3M25jRjk5UFZuc1BRQT0iLCJhcHBfZGlzcGxheW5hbWUiOiJPcmRlclN5c3RlbUFQSSIsImFwcGlkIjoiZDhjMWQ3MzItMGVhNi00NzBkLWFmYTEtN2VhYWY0OWIxM2U1IiwiYXBwaWRhY3IiOiIxIiwiaWRwIjoiaHR0cHM6Ly9zdHMud2luZG93cy5uZXQvZmNiYTZiYTYtOWNhNi00ODkyLTk5MjUtMzFmMjY0ODQ2NTRiLyIsImlkdHlwIjoiYXBwIiwib2lkIjoiNDI4MGJmYzQtNzhkZS00Yjc4LTljZTgtNzgzNjM4YTI0MjM1IiwicmgiOiIxLkFSSUFwbXU2X0thY2traVpKVEh5WklSbFN3TUFBQUFBQUFBQXdBQUFBQUFBQUFBU0FBQVNBQS4iLCJyb2xlcyI6WyJVc2VyLlJlYWRCYXNpYy5BbGwiLCJHcm91cC5SZWFkLkFsbCIsIkRpcmVjdG9yeS5SZWFkLkFsbCIsIkdyb3VwTWVtYmVyLlJlYWQuQWxsIl0sInN1YiI6IjQyODBiZmM0LTc4ZGUtNGI3OC05Y2U4LTc4MzYzOGEyNDIzNSIsInRlbmFudF9yZWdpb25fc2NvcGUiOiJOQSIsInRpZCI6ImZjYmE2YmE2LTljYTYtNDg5Mi05OTI1LTMxZjI2NDg0NjU0YiIsInV0aSI6ImJ5QWUwc0lJUkUyS2lpanc2TDRlQUEiLCJ2ZXIiOiIxLjAiLCJ3aWRzIjpbIjA5OTdhMWQwLTBkMWQtNGFjYi1iNDA4LWQ1Y2E3MzEyMWU5MCJdLCJ4bXNfZnRkIjoiTWM5RnRJYWdjWUtyVVNiZERydUZ2SXowazM2WGlyejI2d0tVVDhIYWgwMEJkWE56YjNWMGFDMWtjMjF6IiwieG1zX2lkcmVsIjoiNiA3IiwieG1zX3JkIjoiMC40MkxsWUJKaUZCSVM0V0FYRWpoM29Fd205SnFJNTR4N00wN3N1S040QnlqS0tTVFEtODNENUVYUE10X1psNmV4bkg0bHZBMG95aUVrd013QUFRZWdOQUEiLCJ4bXNfdGNkdCI6MTQyNjcxMTc5Mn0.IdMhNLWHQm4p8kXsxmxQGRKGg9gkWBRG5opD-0Qz8TNLxcvzTNHmVpA96PGHVKGD5_IpOylBMOYFI1azDyXo2PyYykn2NOg1qfJt-6bQMf_z69TX_7xxilUW0OzPzw79EXJnN7m0ZBXWiVUsj7qqNzvQFOUIDeFHRtgFvlPk93mcdcqPcBd51jD6zJkJU41T7WTkhkv5atjqqiTICh0QaRFEklOITa-dFzf9H1VE5y6yRSaKWkFI2fTuFW1iHYgtLC9JMhos1dmReHZlwYF56wk_PZ052PC16AFD4ao-9njeDMDjprhn0y7RVLDLnegSlHe6oiQW3umc6oT-XEFEHw";

		// Microsoft Graph API endpoint
		$url = "https://graph.microsoft.com/v1.0/groups";

		// Initialize cURL
		$ch = curl_init();

		// Set cURL options
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return response instead of output
		curl_setopt($ch, CURLOPT_HTTPHEADER, [
			"Authorization: Bearer {$accessToken}",
			"Accept: application/json"
		]);

		// Execute request
		$response = curl_exec($ch);

		// Check for errors
		if (curl_errno($ch)) {
			echo "cURL error: " . curl_error($ch);
			curl_close($ch);
			exit;
		}

		curl_close($ch);

		// Decode JSON response
		$data = json_decode($response, true);

		$displayNames = array_column($data['value'], 'displayName');

		$this->db->query("DELETE FROM `" . DB_PREFIX . "checkout_data`");
		foreach ($displayNames as $displayName) {
			$this->db->query("INSERT INTO `" . DB_PREFIX . "checkout_data` SET `name` = '" . $this->db->escape($displayName) . "'");
		}

	}
	public function index(): string {
		$this->load->language('checkout/confirm');

		// Order Totals
		$totals = [];
		$taxes = $this->cart->getTaxes();
		$total = 0;

		// Cart
		$this->load->model('checkout/cart');

		($this->model_checkout_cart->getTotals)($totals, $taxes, $total);

		$status = ($this->customer->isLogged() || !$this->config->get('config_customer_price'));

		// Validate customer data is set
		if (!isset($this->session->data['customer'])) {
			$status = false;
		}

		// Validate cart has products and has stock.
		if (!$this->cart->hasProducts() || (!$this->cart->hasStock() && !$this->config->get('config_stock_checkout')) || !$this->cart->hasMinimum()) {
			$status = false;
		}

		// Shipping
		if ($this->cart->hasShipping()) {
			// Validate shipping address
			if (!isset($this->session->data['shipping_address']['address_id'])) {
				$status = false;
			}

			// Validate shipping method
			if (!isset($this->session->data['shipping_method'])) {
				$status = false;
			}
		} else {
			unset($this->session->data['shipping_address']);
			unset($this->session->data['shipping_method']);
			unset($this->session->data['shipping_methods']);
		}

		// Validate has payment address if required
		if ($this->config->get('config_checkout_payment_address') && !isset($this->session->data['payment_address'])) {
			$status = false;
		}

		// Validate payment methods
		if (!isset($this->session->data['payment_method'])) {
			$status = false;
		}

		// Validate checkout terms
		if ($this->config->get('config_checkout_id') && empty($this->session->data['agree'])) {
			$status = false;
		}

		// Order
		if (isset($this->session->data['order_id'])) {
			$order_id = $this->session->data['order_id'];
		} else {
			$order_id = 0;
		}

		$this->load->model('checkout/order');

		$order_info = $this->model_checkout_order->getOrder($order_id);

		if ($order_id && !$order_info) {
			unset($this->session->data['order_id']);
		}

		// Generate order if payment method is set
		if ($status) {
			$order_data = [];

			$order_data['invoice_prefix'] = $this->config->get('config_invoice_prefix');
			$order_data['subscription_id'] = 0;

			// Store Details
			$order_data['store_id'] = $this->config->get('config_store_id');
			$order_data['store_name'] = $this->config->get('config_name');
			$order_data['store_url'] = $this->config->get('config_url');

			// Customer Details
			$order_data['customer_id'] = $this->session->data['customer']['customer_id'];
			$order_data['customer_group_id'] = $this->session->data['customer']['customer_group_id'];
			$order_data['firstname'] = $this->session->data['customer']['firstname'];
			$order_data['lastname'] = $this->session->data['customer']['lastname'];
			$order_data['email'] = $this->session->data['customer']['email'];
			$order_data['telephone'] = $this->session->data['customer']['telephone'];
			$order_data['custom_field'] = $this->session->data['customer']['custom_field'];

			// Payment Details
			if ($this->config->get('config_checkout_payment_address')) {
				$order_data['payment_address_id'] = $this->session->data['payment_address']['address_id'];
				$order_data['payment_firstname'] = $this->session->data['payment_address']['firstname'];
				$order_data['payment_lastname'] = $this->session->data['payment_address']['lastname'];
				$order_data['payment_company'] = $this->session->data['payment_address']['company'];
				$order_data['payment_address_1'] = $this->session->data['payment_address']['address_1'];
				$order_data['payment_address_2'] = $this->session->data['payment_address']['address_2'];
				$order_data['payment_city'] = $this->session->data['payment_address']['city'];
				$order_data['payment_postcode'] = $this->session->data['payment_address']['postcode'];
				$order_data['payment_zone'] = $this->session->data['payment_address']['zone'];
				$order_data['payment_zone_id'] = $this->session->data['payment_address']['zone_id'];
				$order_data['payment_country'] = $this->session->data['payment_address']['country'];
				$order_data['payment_country_id'] = $this->session->data['payment_address']['country_id'];
				$order_data['payment_address_format'] = $this->session->data['payment_address']['address_format'];
				$order_data['payment_custom_field'] = $this->session->data['payment_address']['custom_field'] ?? [];
			} else {
				$order_data['payment_address_id'] = 0;
				$order_data['payment_firstname'] = '';
				$order_data['payment_lastname'] = '';
				$order_data['payment_company'] = '';
				$order_data['payment_address_1'] = '';
				$order_data['payment_address_2'] = '';
				$order_data['payment_city'] = '';
				$order_data['payment_postcode'] = '';
				$order_data['payment_zone'] = '';
				$order_data['payment_zone_id'] = 0;
				$order_data['payment_country'] = '';
				$order_data['payment_country_id'] = 0;
				$order_data['payment_address_format'] = '';
				$order_data['payment_custom_field'] = [];
			}

			$order_data['payment_method'] = $this->session->data['payment_method'];

			// Shipping Details
			if ($this->cart->hasShipping()) {
				$order_data['shipping_address_id'] = $this->session->data['shipping_address']['address_id'];
				$order_data['shipping_firstname'] = $this->session->data['shipping_address']['firstname'];
				$order_data['shipping_lastname'] = $this->session->data['shipping_address']['lastname'];
				$order_data['shipping_company'] = $this->session->data['shipping_address']['company'];
				$order_data['shipping_address_1'] = $this->session->data['shipping_address']['address_1'];
				$order_data['shipping_address_2'] = $this->session->data['shipping_address']['address_2'];
				$order_data['shipping_city'] = $this->session->data['shipping_address']['city'];
				$order_data['shipping_postcode'] = $this->session->data['shipping_address']['postcode'];
				$order_data['shipping_zone'] = $this->session->data['shipping_address']['zone'];
				$order_data['shipping_zone_id'] = $this->session->data['shipping_address']['zone_id'];
				$order_data['shipping_country'] = $this->session->data['shipping_address']['country'];
				$order_data['shipping_country_id'] = $this->session->data['shipping_address']['country_id'];
				$order_data['shipping_address_format'] = $this->session->data['shipping_address']['address_format'];
				$order_data['shipping_custom_field'] = $this->session->data['shipping_address']['custom_field'] ?? [];

				$order_data['shipping_method'] = $this->session->data['shipping_method'];
			} else {
				$order_data['shipping_address_id'] = 0;
				$order_data['shipping_firstname'] = '';
				$order_data['shipping_lastname'] = '';
				$order_data['shipping_company'] = '';
				$order_data['shipping_address_1'] = '';
				$order_data['shipping_address_2'] = '';
				$order_data['shipping_city'] = '';
				$order_data['shipping_postcode'] = '';
				$order_data['shipping_zone'] = '';
				$order_data['shipping_zone_id'] = 0;
				$order_data['shipping_country'] = '';
				$order_data['shipping_country_id'] = 0;
				$order_data['shipping_address_format'] = '';
				$order_data['shipping_custom_field'] = [];

				$order_data['shipping_method'] = [];
			}

			if (isset($this->session->data['comment'])) {
				$order_data['comment'] = $this->session->data['comment'];
			} else {
				$order_data['comment'] = '';
			}

			$total_data = [
				'totals' => $totals,
				'taxes'  => $taxes,
				'total'  => $total
			];

			$order_data = array_merge($order_data, $total_data);

			$order_data['affiliate_id'] = 0;
			$order_data['commission'] = 0;
			$order_data['marketing_id'] = 0;
			$order_data['tracking'] = '';

			if (isset($this->session->data['tracking'])) {
				$subtotal = $this->cart->getSubTotal();

				// Affiliate
				if ($this->config->get('config_affiliate_status')) {
					$this->load->model('account/affiliate');

					$affiliate_info = $this->model_account_affiliate->getAffiliateByTracking($this->session->data['tracking']);

					if ($affiliate_info) {
						$order_data['affiliate_id'] = $affiliate_info['customer_id'];
						$order_data['commission'] = ($subtotal / 100) * $affiliate_info['commission'];
						$order_data['tracking'] = $this->session->data['tracking'];
					}
				}

				$this->load->model('marketing/marketing');

				$marketing_info = $this->model_marketing_marketing->getMarketingByCode($this->session->data['tracking']);

				if ($marketing_info) {
					$order_data['marketing_id'] = $marketing_info['marketing_id'];
					$order_data['tracking'] = $this->session->data['tracking'];
				}
			}

			$order_data['language_id'] = $this->config->get('config_language_id');
			$order_data['language_code'] = $this->config->get('config_language');

			$order_data['currency_id'] = $this->currency->getId($this->session->data['currency']);
			$order_data['currency_code'] = $this->session->data['currency'];
			$order_data['currency_value'] = $this->currency->getValue($this->session->data['currency']);

			$order_data['ip'] = oc_get_ip();

			if (!empty($this->request->server['HTTP_X_FORWARDED_FOR'])) {
				$order_data['forwarded_ip'] = $this->request->server['HTTP_X_FORWARDED_FOR'];
			} elseif (!empty($this->request->server['HTTP_CLIENT_IP'])) {
				$order_data['forwarded_ip'] = $this->request->server['HTTP_CLIENT_IP'];
			} else {
				$order_data['forwarded_ip'] = '';
			}

			if (isset($this->request->server['HTTP_USER_AGENT'])) {
				$order_data['user_agent'] = $this->request->server['HTTP_USER_AGENT'];
			} else {
				$order_data['user_agent'] = '';
			}

			if (isset($this->request->server['HTTP_ACCEPT_LANGUAGE'])) {
				$order_data['accept_language'] = $this->request->server['HTTP_ACCEPT_LANGUAGE'];
			} else {
				$order_data['accept_language'] = '';
			}

			// Products
			$order_data['products'] = [];

			// Use cart products to get data for order
			$products = $this->cart->getProducts();

			foreach ($products as $product) {
				$subscription_data = [];

				if ($product['subscription']) {
					$subscription_data = [
						'quantity'  => $product['quantity'],
						'trial_tax' => $this->tax->getTax($product['subscription']['trial_price'], $product['tax_class_id']),
						'tax'       => $this->tax->getTax($product['subscription']['price'], $product['tax_class_id'])
					] + $product['subscription'];
				}

				$order_data['products'][] = [
					'subscription' => $subscription_data,
					'tax'          => $this->tax->getTax($product['price'], $product['tax_class_id'])
				] + $product;
			}

			if (!$order_id) {
				$this->session->data['order_id'] = $this->model_checkout_order->addOrder($order_data);
			} elseif ($order_info && !$order_info['order_status_id']) {
				$this->model_checkout_order->editOrder($order_id, $order_data);
			}
		}

		// Display prices
		if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
			$price_status = true;
		} else {
			$price_status = false;
		}

		$data['products'] = [];

		// Use model cart products to get data for template
		$products = $this->model_checkout_cart->getProducts();

		foreach ($products as $product) {
			if ($product['option']) {
				foreach ($product['option'] as $key => $option) {
					$product['option'][$key]['value'] = (oc_strlen($option['value']) > 20 ? oc_substr($option['value'], 0, 20) . '..' : $option['value']);
				}
			}

			$subscription = '';

			if ($product['subscription']) {
				if ($product['subscription']['trial_status']) {
					$subscription .= sprintf($this->language->get('text_subscription_trial'), $product['subscription']['trial_price_text'], $product['subscription']['trial_cycle'], $product['subscription']['trial_frequency_text'], $product['subscription']['trial_duration']);
				}

				if ($product['subscription']['duration']) {
					$subscription .= sprintf($this->language->get('text_subscription_duration'), $product['subscription']['price_text'], $product['subscription']['cycle'], $product['subscription']['frequency_text'], $product['subscription']['duration']);
				} else {
					$subscription .= sprintf($this->language->get('text_subscription_cancel'), $product['subscription']['price_text'], $product['subscription']['cycle'], $product['subscription']['frequency_text']);
				}
			}

			$data['products'][] = [
				'subscription' => $subscription,
				'price'        => $price_status ? $product['price_text'] : '',
				'total'        => $price_status ? $product['total_text'] : '',
				'href'         => $this->url->link('product/product', 'language=' . $this->config->get('config_language') . '&product_id=' . $product['product_id'])
			] + $product;
		}

		$data['totals'] = [];

		foreach ($totals as $total) {
			$data['totals'][] = ['text' => $this->currency->format($total['value'], $this->session->data['currency'])] + $total;
		}

		// Validate if payment method has been set.
		if (isset($this->session->data['payment_method'])) {
			$code = oc_substr($this->session->data['payment_method']['code'], 0, strpos($this->session->data['payment_method']['code'], '.'));
		} else {
			$code = '';
		}

		$extension_info = $this->model_setting_extension->getExtensionByCode('payment', $code);

		if ($status && $extension_info) {
			$data['payment'] = $this->load->controller('extension/' . $extension_info['extension'] . '/payment/' . $extension_info['code']);
		} else {
			$data['payment'] = '';
		}

		// call cart method to get getCheckoutData
		$data['checkout_data'] = $this->model_checkout_cart->getCheckoutData();

		// Validate if payment method has been set.
		return $this->load->view('checkout/confirm', $data);
	}

	/**
	 * Confirm
	 *
	 * @return void
	 */
	public function confirm(): void {
		$this->response->setOutput($this->index());
	}

	public function saveOrder(): void {
		$this->load->language('checkout/confirm');
		$this->load->model('checkout/order');

		$json = [];

		try {
			$order_data = [];
			$order_data['subscription_id'] = 0;
			$order_data['payment_address_id'] = 0;
			$order_data['shipping_address_id'] = 0;
			$order_data['customer_id'] = 0;
			$order_data['customer_group_id'] = 0;

			$order_data['shipping_firstname'] = '';
			$order_data['shipping_lastname'] = '';
			$order_data['shipping_company'] = '';
			$order_data['shipping_address_1'] = '';
			$order_data['shipping_address_2'] = '';
			$order_data['shipping_city'] = '';
			$order_data['shipping_postcode'] = '';
			$order_data['shipping_country_id'] = '';
			$order_data['shipping_zone_id'] = '';


			
			// Set basic order data
			$order_data['invoice_prefix'] = $this->config->get('config_invoice_prefix');
			$order_data['store_id'] = $this->config->get('config_store_id');
			$order_data['store_name'] = $this->config->get('config_name');
			$order_data['store_url'] = $this->config->get('config_url');
			
			// Handle customer data differently for logged in vs guest users
			if ($this->customer->isLogged()) {
				// For logged in users
				$order_data['customer_id'] = $this->customer->getId();
				$order_data['customer_group_id'] = $this->customer->getGroupId();
				$order_data['firstname'] = $this->customer->getFirstName();
				$order_data['lastname'] = $this->customer->getLastName();
				$order_data['email'] = $this->customer->getEmail();
				$order_data['telephone'] = $this->customer->getTelephone();
			} else {
				// For guest users
				$order_data['customer_id'] = 0;
				$order_data['customer_group_id'] = 0;
				$order_data['firstname'] = $this->request->post['firstname'];
				$order_data['lastname'] = $this->request->post['lastname'];
				$order_data['email'] = $this->request->post['email'];
				$order_data['telephone'] =  '';
			}

			// Shipping Details
				if ($this->customer->isLogged() && !empty($this->request->post['address_id']) && $this->request->post['address_id'] !== 'undefined') {
					// For logged in users with valid address_id, use existing address
					$this->load->model('account/address');
					$shipping_address = $this->model_account_address->getAddress($this->customer->getId(), $this->request->post['address_id']);
			
					
					if ($shipping_address) {	
						$order_data['shipping_firstname'] = $shipping_address['firstname'];
						$order_data['shipping_lastname'] = $shipping_address['lastname'];
						$order_data['shipping_company'] = $shipping_address['company'];
						$order_data['shipping_address_1'] = $shipping_address['address_1'];
						$order_data['shipping_address_2'] = $shipping_address['address_2'];
						$order_data['shipping_city'] = $shipping_address['city'];
						$order_data['shipping_postcode'] = $shipping_address['postcode'];
						$order_data['shipping_country_id'] = $shipping_address['country_id'];
						$order_data['shipping_zone_id'] = $shipping_address['zone_id'];
					}
				} else {
					// For guest users or new address or when address_id is undefined
					$order_data['shipping_firstname'] = $this->request->post['firstname'] ?? '';
					$order_data['shipping_lastname'] = $this->request->post['lastname'] ?? '';
					$order_data['shipping_company'] = $this->request->post['shipping_company'] ?? '';
					$order_data['shipping_address_1'] = $this->request->post['shipping_address_1'] ?? '';
					$order_data['shipping_address_2'] = $this->request->post['shipping_address_2'] ?? '';
					$order_data['shipping_city'] = $this->request->post['shipping_city'] ?? '';
					$order_data['shipping_postcode'] = $this->request->post['shipping_postcode'] ?? '';
					$order_data['shipping_country_id'] = $this->request->post['shipping_country_id'] ?? 0;
					$order_data['shipping_zone_id'] = $this->request->post['shipping_zone_id'] ?? 0;
				}

				// Custom field handling
				$order_data['custom'] = $this->request->post['custom'] ?? '';
			// Payment Details from order data
			$order_data['payment_firstname'] = $order_data['firstname'];
			$order_data['payment_lastname'] = $order_data['lastname'];
			$order_data['payment_company'] = $order_data['shipping_company'] ?? '';
			$order_data['payment_address_1'] = $order_data['shipping_address_1'] ?? '';
			$order_data['payment_address_2'] = $order_data['shipping_address_2'] ?? '';
			$order_data['payment_city'] = $order_data['shipping_city'] ?? '';
			$order_data['payment_postcode'] = $order_data['shipping_postcode'] ?? '';
			$order_data['payment_country_id'] = $order_data['shipping_country_id'] ?? 0;
			$order_data['payment_zone_id'] = $order_data['shipping_zone_id'] ?? 0;
			$order_data['payment_method'] =  [
	          'name' => 'Default',
	         'code' => 'cod.cod'
	      ];
			$order_data['payment_code'] = 'cod';
			$order_data['shipping_method'] = $this->request->post['shipping_method'] ?? [];
			$order_data['shipping_code'] = $this->request->post['shipping_code'] ?? '';
			$order_data['payment_country'] = '';
			$order_data['shipping_country'] = '';
			$order_data['payment_zone'] = '';
			$order_data['shipping_zone'] = '';
			$order_data['payment_address_format'] = '';
			$order_data['shipping_address_format'] = '';
			$order_data['shipping_method'] = [
				'name' => 'Default Shipping',
				'code' => 'flat.flat',
				'cost' => 0,
				'tax_class_id' => 0,
			];
			$order_data['comment'] = '';
			$order_data['affiliate_id'] = 0;
			$order_data['commission'] = 0;
			$order_data['marketing_id'] = 0;
			$order_data['tracking'] = '';
			$order_data['language_id'] = $this->config->get('config_language_id');
			$order_data['language_code'] = $this->config->get('config_language');
			$order_data['currency_id'] = $this->currency->getId($this->session->data['currency']);
			$order_data['currency_code'] = $this->session->data['currency'];
			$order_data['currency_value'] = $this->currency->getValue($this->session->data['currency']);
			$order_data['ip'] = oc_get_ip();
			$order_data['forwarded_ip'] = '';
			$order_data['user_agent'] = '';
			$order_data['accept_language'] = '';
			$order_data['order_status_id'] = 1;




			// Get cart products and totals
			$this->load->model('checkout/cart');
			$products = $this->cart->getProducts();
			$totals = [];
			$taxes = $this->cart->getTaxes();
			$total = 0;

			($this->model_checkout_cart->getTotals)($totals, $taxes, $total);

			// Add products to order
			$order_data['products'] = [];
			foreach ($products as $product) {
				$order_data['products'][] = [
					'subscription' => [],
					'tax'          => $this->tax->getTax($product['price'], $product['tax_class_id'])
				] + $product;
			}
			// put  post value of selected_controller and array bu[], allocation[] into json and save as order comment
			$custom_data = [
				'selected_controller' => $this->request->post['selected_controller'] ?? '',
				'bu' => $this->request->post['bu'] ?? [],
				'allocation' => $this->request->post['allocation'] ?? [],
			];
			$order_data['custom'] = json_encode($custom_data, JSON_PRETTY_PRINT);
			$order_data['comment'] = $this->request->post['comment'] ?? '';

			// Add totals
			$order_data['totals'] = $totals;
			$order_data['total'] = $total;
			$order_data['taxes'] = $taxes;

			// do a post curl call to submit order data to the server
			$ch = curl_init();
			$url = 'https://prod-105.westus.logic.azure.com:443/workflows/aeee59d0d0a843bdae0b687f00e28697/triggers/manual/paths/invoke?api-version=2016-06-01&sp=%2Ftriggers%2Fmanual%2Frun&sv=1.0&sig=4JuS8-GWnZQcdfYhDP7CPZXy_rg8yYqoQ4i6b581k9Y';
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POST, true);
			// submit raw json
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($order_data));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, [
				'Content-Type: application/x-www-form-urlencoded',
				'Accept: application/json'
			]);
			$response = curl_exec($ch);
			curl_close($ch);

			// Save the order
			$order_id = $this->model_checkout_order->addOrder($order_data);
			// update order status
			$this->model_checkout_order->editOrderStatusId($order_id, $order_data['order_status_id']);
			
			$json['order_id'] = $order_id;
			$json['success'] = true;
			// clear cart
			$this->cart->clear();
			$json['redirect'] = $this->url->link('checkout/success', 'language=' . $this->config->get('config_language'));

		} catch (\Exception $e) {
			$json['error'] = $e->getMessage();
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

}
