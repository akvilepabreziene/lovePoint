

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



INSERT INTO `tbl_product` (`id`, `name`, `image`, `price`) VALUES
(4, 'Test1', 'box-4-1.jpg', 25.00),
(5, 'Test2', 'box-2-1.jpg', 45.00),
(6, 'Test3', 'candles-poles-08.jpg', 55.00);


ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;


