INSERT INTO pictures VALUES
    (NULL, '10001.jpg', 1),
    (NULL, '10002.jpg', 2),
    (NULL, '10003.jpg', 3),
    (NULL, '10004.jpg', 4),
    (NULL, '10005.jpg', 5),
    (NULL, '10006.jpg', 6),
    (NULL, '10007.jpg', 7),
    (NULL, '10008.jpg', 8);

INSERT INTO categories VALUES
    (NULL, 'Lankeliai'),
    (NULL, 'Gumytės'),
    (NULL, 'Pirštinės');

INSERT INTO `orders` (`id`, `customer_id`, `order_code`, `order_time`, `status_id`) VALUES
    (1, 1, '001', '2020-01-3 00:00:00', 2),
    (2, 2, '002', '2020-01-5 00:00:00', 1),
    (3, 3, '003', '2020-01-6 00:00:00', 1),
    (4, 4, '004', '2020-01-9 00:00:00', 3),
    (5, 5, '005', '2020-01-10 00:00:00', 3);

INSERT INTO `customers` (`id`, `name`, `lastname`, `email`, `adress`, `phone`) VALUES 
    (NULL, 'Tyson', 'Satterfield', 'doritlt@connectme.name', 'Kulnarb g. 50', '3678687678678'),
    (NULL, 'Raymundo', 'Bogan', 'mesolit@connectme.name', 'Greyfriars g. 50', '5648745631231'),
    (NULL, 'Zelda', 'Stanton', 'lokolit@connectme.name', 'Gleiu g. 12', '45645645345'),
    (NULL, 'Mariano', 'Denesik', 'chocot@connectme.name', 'Sunsity g. 60', '4654645646'),
    (NULL, 'Frederik', 'Willms', 'lakahjk@connectme.name', 'Blastrein g. 2', '45456456456');

INSERT INTO `orders_status` (`id`, `status`) VALUES
    (NULL, 'Ruošiamas'),
    (NULL, 'Paruoštas'),
    (NULL, 'Išsiųstas');



