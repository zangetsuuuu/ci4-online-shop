<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ForeignKey extends Migration
{
    public function up()
    {
        // Add foreign keys for carts table
        $this->db->query('ALTER TABLE carts ADD CONSTRAINT carts_ibfk_1 FOREIGN KEY (customer_id) REFERENCES customers(id)');
        $this->db->query('ALTER TABLE carts ADD CONSTRAINT carts_ibfk_2 FOREIGN KEY (product_id) REFERENCES products(id)');

        // Add foreign keys for orders table
        $this->db->query('ALTER TABLE orders ADD CONSTRAINT fk_orders_customer_id FOREIGN KEY (customer_id) REFERENCES customers(id) ON UPDATE CASCADE');
        $this->db->query('ALTER TABLE orders ADD CONSTRAINT fk_transaction_id FOREIGN KEY (transaction_id) REFERENCES transactions(id)');

        // Add foreign keys for order_items table
        $this->db->query('ALTER TABLE order_items ADD CONSTRAINT order_items_ibfk_1 FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE');
        $this->db->query('ALTER TABLE order_items ADD CONSTRAINT order_items_ibfk_2 FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE');
    }

    public function down()
    {
        // Drop foreign keys for carts table
        $this->db->query('ALTER TABLE carts DROP FOREIGN KEY carts_ibfk_1');
        $this->db->query('ALTER TABLE carts DROP FOREIGN KEY carts_ibfk_2');

        // Drop foreign keys for orders table
        $this->db->query('ALTER TABLE orders DROP FOREIGN KEY fk_orders_customer_id');
        $this->db->query('ALTER TABLE orders DROP FOREIGN KEY fk_transaction_id');

        // Drop foreign keys for order_items table
        $this->db->query('ALTER TABLE order_items DROP FOREIGN KEY order_items_ibfk_1');
        $this->db->query('ALTER TABLE order_items DROP FOREIGN KEY order_items_ibfk_2');
    }
}
