<?php

'SELECT orders.id, customers.name
FROM orders
INNER JOIN orders ON orders.customer_id = customers.id;'