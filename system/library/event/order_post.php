<?php
class EventOrderPost {
    public function addHistory(&$route, &$args, &$output) {
        // $args[0] is usually the order_id
        if (!isset($args[0])) return;
        $order_id = $args[0];
        
        // Load order info
        $registry = Registry::getInstance();
        $loader = $registry->get('load');
        $loader->model('sale/order');
        $order_info = $registry->get('model_sale_order')->getOrder($order_id);
        if (!$order_info) return;

        // Prepare data to send
        $json_data = json_encode($order_info);

        // cURL POST
        $ch = curl_init('https://xyz.com/api/post');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
        $response = curl_exec($ch);
        curl_close($ch);
    }
}
