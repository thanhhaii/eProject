-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2020 at 09:04 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `username_id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `roles` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `username_id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`) VALUES
(1, 'Cookware'),
(2, 'Refrigeration'),
(3, 'Appliances'),
(4, 'Food Storage'),
(5, 'Knives'),
(6, 'Tools'),
(7, 'Laundry'),
(8, 'Orther accessories');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `id_product`, `image`) VALUES
(1, 1, 'cookware/blackpan1.jpg'),
(2, 1, 'cookware/blackpan2.jpg'),
(3, 1, 'cookware/blackpan3.jpg'),
(4, 2, 'cookware/campingcookingpan1.jpg'),
(5, 2, 'cookware/campingcookingpan2.jpg'),
(6, 2, 'cookware/campingcookingpan3.jpg'),
(7, 2, 'cookware/campingcookingpan4.jpg'),
(8, 3, 'cookware/cookingpots1.jpg'),
(9, 3, 'cookware/cookingpots2.jpg'),
(10, 3, 'cookware/cookingpots3.jpg'),
(11, 4, 'cookware/cookwaresets1.jpg'),
(12, 4, 'cookware/cookwaresets2.jpg'),
(13, 4, 'cookware/cookwaresets3.jpg'),
(14, 5, 'cookware/eggsteamer1.png'),
(15, 5, 'cookware/eggsteamer2.png'),
(16, 5, 'cookware/eggsteamer3.png'),
(17, 5, 'cookware/eggsteamer4.png'),
(18, 6, 'cookware/fryingpan1.jpg'),
(19, 6, 'cookware/fryingpan2.jpg'),
(20, 6, 'cookware/fryingpan3.jpg'),
(21, 6, 'cookware/fryingpan4.jpg'),
(22, 7, 'cookware/grillpan1.jpg'),
(23, 7, 'cookware/grillpan2.jpg'),
(24, 7, 'cookware/grillpan3.jpg'),
(25, 7, 'cookware/grillpan4.jpg'),
(26, 8, 'cookware/karahi1.jpg'),
(27, 8, 'cookware/karahi2.jpg'),
(28, 8, 'cookware/karahi3.jpg'),
(29, 9, 'cookware/marblepan1.jpg'),
(30, 9, 'cookware/marblepan2.jpg'),
(31, 9, 'cookware/marblepan3.jpg'),
(32, 9, 'cookware/marblepan4.jpg'),
(33, 10, 'cookware/stonefryingpan1.jpg'),
(34, 10, 'cookware/stonefryingpan2.jpg'),
(35, 10, 'cookware/stonefryingpan3.jpg'),
(36, 10, 'cookware/stonefryingpan4.jpg'),
(37, 11, 'cookware/tawas1.jpg'),
(38, 11, 'cookware/tawas2.jpg'),
(39, 11, 'cookware/tawas3.jpg'),
(63, 12, 'refrigeration/product12-1.jpg'),
(64, 12, 'refrigeration/product12-2.jpg'),
(65, 12, 'refrigeration/product12-3.jpg'),
(66, 12, 'refrigeration/product12-4.jpg'),
(67, 13, 'refrigeration/product13-1.jpg'),
(68, 13, 'refrigeration/product13-2.jpg'),
(69, 13, 'refrigeration/product13-3.jpg'),
(70, 13, 'refrigeration/product13-4.jpg'),
(71, 14, 'refrigeration/product14-1.jpg'),
(72, 14, 'refrigeration/product14-2.jpg'),
(73, 14, 'refrigeration/product14-3.jpg'),
(74, 15, 'refrigeration/product15-1.jpg'),
(75, 15, 'refrigeration/product15-2.jpg'),
(76, 15, 'refrigeration/product15-3.jpg'),
(77, 15, 'refrigeration/product15-4.jpg'),
(78, 16, 'refrigeration/product16-1.jpg'),
(79, 16, 'refrigeration/product16-2.jpg'),
(80, 16, 'refrigeration/product16-3.jpg'),
(81, 16, 'refrigeration/product16-4.jpg'),
(82, 17, 'refrigeration/product17-1.jpg'),
(83, 17, 'refrigeration/product17-2.jpg'),
(84, 17, 'refrigeration/product17-3.jpg'),
(85, 17, 'refrigeration/product17-4.jpg'),
(86, 18, 'appliances/blender1.jpg'),
(87, 18, 'appliances/blender2.jpg'),
(88, 18, 'appliances/blender3.jpg'),
(89, 19, 'appliances/breadmakers1.jpg'),
(90, 19, 'appliances/breadmakers2.jpg'),
(91, 19, 'appliances/breadmakers3.jpg'),
(92, 20, 'appliances/coffeemaker1.jpg'),
(93, 20, 'appliances/coffeemaker2.jpg'),
(94, 20, 'appliances/coffeemaker3.jpg'),
(95, 20, 'appliances/coffeemaker4.jpg'),
(96, 21, 'appliances/electrickettles1.jpg'),
(97, 21, 'appliances/electrickettles2.jpg'),
(98, 21, 'appliances/electrickettles3.jpg'),
(99, 21, 'appliances/electrickettles4.jpg'),
(100, 22, 'appliances/foodchopper1.jpg'),
(101, 22, 'appliances/foodchopper2.jpg'),
(102, 22, 'appliances/foodchopper3.jpg'),
(103, 23, 'appliances/ice-cream1.jpg'),
(104, 23, 'appliances/ice-cream2.jpg'),
(105, 23, 'appliances/ice-cream3.jpg'),
(106, 24, 'appliances/toaster1.jpg'),
(107, 24, 'appliances/toaster2.jpg'),
(108, 24, 'appliances/toaster3.jpg'),
(109, 25, 'foodstorage/flask1.jpg'),
(110, 25, 'foodstorage/flask2.jpg'),
(111, 25, 'foodstorage/flask3.jpg'),
(112, 25, 'foodstorage/flask4.jpg'),
(113, 26, 'foodstorage/lunchbox1.jpg'),
(114, 26, 'foodstorage/lunchbox2.jpg'),
(115, 26, 'foodstorage/lunchbox3.jpg'),
(116, 26, 'foodstorage/lunchbox4.jpg'),
(117, 27, 'foodstorage/rollbag1.jpg'),
(118, 27, 'foodstorage/rollbag2.jpg'),
(119, 27, 'foodstorage/rollbag3.jpg'),
(120, 27, 'foodstorage/rollbag4.jpg'),
(121, 28, 'foodstorage/spicecontainer1.jpg'),
(122, 28, 'foodstorage/spicecontainer2.jpg'),
(123, 28, 'foodstorage/spicecontainer3.jpg'),
(124, 29, 'foodstorage/spicejar1.jpg'),
(125, 29, 'foodstorage/spicejar2.jpg'),
(126, 29, 'foodstorage/spicejar3.jpg'),
(127, 29, 'foodstorage/spicejar4.jpg'),
(128, 30, 'foodstorage/storagebag1.jpg'),
(129, 30, 'foodstorage/storagebag2.jpg'),
(130, 30, 'foodstorage/storagebag3.jpg'),
(131, 30, 'foodstorage/storagebag4.jpg'),
(132, 31, 'knife/6instock1.jpg'),
(133, 31, 'knife/6instock2.jpg'),
(134, 31, 'knife/6instock3.jpg'),
(135, 31, 'knife/6instock4.jpg'),
(136, 32, 'knife/8sets1.jpg'),
(137, 32, 'knife/8sets2.jpg'),
(138, 32, 'knife/8sets3.png'),
(139, 32, 'knife/8sets4.jpg'),
(140, 33, 'knife/fruitknife1.jpg'),
(141, 33, 'knife/fruitknife2.jpg'),
(142, 33, 'knife/fruitknife3.png'),
(143, 33, 'knife/fruitknife4.jpg'),
(144, 34, 'knife/kitchenknife1.jpg'),
(145, 34, 'knife/kitchenknife2.jpg'),
(146, 34, 'knife/kitchenknife3.jpg'),
(147, 35, 'tool/cv828-1.jpg'),
(148, 35, 'tool/cv828-2.jpg'),
(149, 35, 'tool/cv828-3.jpg'),
(150, 36, 'tool/cv838-1.jpg'),
(151, 36, 'tool/cv838-2.jpg'),
(152, 36, 'tool/cv838-3.jpg'),
(153, 36, 'tool/cv838-4.jpg'),
(154, 37, 'tool/windo1.jpg'),
(155, 37, 'tool/windo2.jpg'),
(156, 37, 'tool/windo3.jpg'),
(157, 38, 'laundry/brush1.jpg'),
(158, 38, 'laundry/brush2.jpg'),
(159, 38, 'laundry/brush3.jpg'),
(160, 38, 'laundry/brush4.jpg'),
(161, 39, 'laundry/dustin1.jpg'),
(162, 39, 'laundry/dustin2.jpg'),
(163, 39, 'laundry/dustin3.jpg'),
(164, 39, 'laundry/dustin4.jpg'),
(165, 40, 'laundry/towel1.jpg'),
(166, 40, 'laundry/towel2.jpg'),
(167, 40, 'laundry/towel3.jpg'),
(168, 40, 'laundry/towel4.jpg'),
(169, 41, 'more/rack1.jpg'),
(170, 41, 'more/rack2.jpg'),
(171, 41, 'more/rack3.jpg'),
(172, 42, 'more/brush1.jpg'),
(173, 42, 'more/brush2.jpg'),
(174, 42, 'more/brush3.jpg'),
(175, 42, 'more/brush4.jpg'),
(176, 43, 'more/tool1.jpg'),
(177, 43, 'more/tool2.jpg'),
(178, 43, 'more/tool3.jpg'),
(179, 44, 'more/mortal1.jpg'),
(180, 44, 'more/mortal2.jpg'),
(181, 44, 'more/mortal3.jpg'),
(182, 44, 'more/mortal4.jpg'),
(184, 45, 'more/ts1.jpg'),
(185, 45, 'more/ts2.jpg'),
(186, 45, 'more/ts3.jpg'),
(187, 45, 'more/ts4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `username_id` int(11) DEFAULT NULL,
  `order_date` date NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `payment` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders_details`
--

CREATE TABLE `orders_details` (
  `order_id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `name_pro` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `category_id` int(11) NOT NULL,
  `avatar` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `name_pro`, `price`, `quantity`, `content`, `status`, `category_id`, `avatar`) VALUES
(1, 'Black Pan', 30, 300, 'Non-stick black pan', 1, 1, 'cookware/blackpan1.jpg'),
(2, 'Camping Cooking Pan', 15, 500, 'Pans used to go camping', 1, 1, 'cookware/campingcookingpan1.jpg'),
(3, 'Cooking Pot', 25, 250, 'Cooking pots for baby', 1, 1, 'cookware/cookingpots1.jpg'),
(4, 'Cookware Sets', 27, 200, 'Non-stick cast iron', 1, 1, 'cookware/cookwaresets1.jpg'),
(5, 'Egg Steamer', 35, 220, '4-chamber egg steamer', 1, 1, 'cookware/eggsteamer1.png'),
(6, 'Frying Pan', 40, 400, 'Non-stick aluminum frying pan', 1, 1, 'cookware/fryingpan1.jpg'),
(7, 'Grill Pans', 30, 150, 'Non-stick baking pan', 1, 1, 'cookware/grillpan1.jpg'),
(8, 'Karahi Pot', 40, 100, 'Stainless steel karahi pot', 1, 1, 'cookware/karahi1.jpg'),
(9, 'Marble Pan', 50, 600, 'Non-stick pan, marble material', 1, 1, 'cookware/marblepan1.jpg'),
(10, 'Stone Frying Pan', 60, 80, 'Stone frying pan 30cm radius', 1, 1, 'cookware/stonefryingpan1.jpg'),
(11, 'Flat Pan', 45, 70, 'Flat pan with lid', 1, 1, 'cookware/tawas1.jpg'),
(12, 'Freezer compartment', 1000, 50, 'Freezer with 1 compartment Sumikura SKF-220S (150L)', 1, 2, 'refrigeration/product12-1.jpg'),
(13, 'Freezer BD-400', 1500, 40, 'Freezer Alaska BD-400 (400L)', 1, 2, 'refrigeration/product13-1.jpg'),
(14, 'Freezer SD-500Y', 1800, 50, 'Freezer Alaska SD-500Y (500L)', 1, 2, 'refrigeration/product14-1.jpg'),
(15, 'Fridge Hitachi', 2000, 100, 'Fridge Inverter Hitachi R-FW650PGV8-GBK (509L)', 1, 2, 'refrigeration/product15-1.jpg'),
(16, 'Fridge RT19M300BGSSV', 1700, 120, 'Fridge Inverter Samsung RT19M300BGSSV (208L)', 1, 2, 'refrigeration/product16-1.jpg'),
(17, 'Fridge LG GR-X247JS', 2500, 30, 'Fridge Instaview door in door LG GR-X247JS (602L)', 1, 2, 'refrigeration/product17-1.jpg'),
(18, 'Blender SHD5112', 200, 120, 'Blender Sunhouse SHD5112', 1, 3, 'appliances/blender1.jpg'),
(19, 'Cake Mold', 130, 100, 'Grilled fish cake mold Taiyaki Japan non-stick', 1, 3, 'appliances/breadmakers1.jpg'),
(20, 'Coffee Maker', 200, 57, 'Coffe maker KFD101', 1, 3, 'appliances/coffeemaker1.jpg'),
(21, 'Water Boiler', 120, 100, 'Smart super speed kettle Xiaomi ZHF4012GL', 1, 3, 'appliances/electrickettles1.jpg'),
(22, 'Food Chopper', 150, 70, 'Aggregate Crusher Korea Electronics A65 (350W)', 1, 3, 'appliances/foodchopper1.jpg'),
(23, 'Ice Cream Machines', 300, 30, 'Ice Cream Maker Steba IC30 (1.5L) Random Color - Genuine Product', 1, 3, 'appliances/ice-cream1.jpg'),
(24, 'Toaster', 170, 50, 'Bread & Lock Toaster Lock EJB221BLU (730 - 870 W)', 1, 3, 'appliances/toaster1.jpg'),
(25, 'Flask Inox', 40, 200, 'Premium 1000ML Stainless Steel Bottle with A Tight Zipper Carrying Bag', 1, 4, 'foodstorage/flask1.jpg'),
(26, 'Lunch Box', 30, 120, 'Set of 3 clean, dry, and fresh food containers made of high quality PP plastic 500mL', 1, 4, 'foodstorage/lunchbox1.jpg'),
(27, 'Roll Bag', 10, 300, 'Roll bags of safe food', 1, 4, 'foodstorage/rollbag1.jpg'),
(28, 'Spice Container', 25, 200, 'Set of high quality oil and spice jars', 1, 4, 'foodstorage/spicecontainer1.jpg'),
(29, 'Spice Jar', 30, 80, 'Set of 8 high class spice jars with shelves', 1, 4, 'foodstorage/spicejar1.jpg'),
(30, 'Store Bag', 5, 600, 'Korean Style Lunch Box, Food Cooler (20 x 19 x 13 cm)', 1, 4, 'foodstorage/storagebag1.jpg'),
(31, '6-Piece Knife Set', 100, 70, 'Stainless Steel Set 6 In Stock', 1, 5, 'knife/6instock1.jpg'),
(32, 'Knife Goodlife MK88', 200, 50, 'High-grade stainless steel 8-piece Mishio knife set - Model Goodlife MK88', 1, 5, 'knife/8sets1.jpg'),
(33, 'Fruit Knife', 40, 400, 'High-class fruit knife kitchen convenience, travel phượt', 1, 5, 'knife/fruitknife1.jpg'),
(34, 'Kitchen Knife', 30, 600, 'Santoku Kitchen Knife Lock & Lock Ckk312 (300mm)', 1, 5, 'knife/kitchenknife1.jpg'),
(35, 'Gas Stove CV828', 70, 800, 'Civina CV-828 Induction hob - Genuine product', 1, 6, 'tool/cv828-1.jpg'),
(36, 'Gas Stove CV838', 50, 900, 'Civina CV-838 Induction hob - Genuine', 1, 6, 'tool/cv838-1.jpg'),
(37, 'Gas Stove Windo', 70, 200, 'Windo gas stove with glass surface', 1, 6, 'tool/windo1.jpg'),
(38, 'Brush', 5, 300, 'Kitchen Cleaning Brush, Convenient Bathroom', 1, 7, 'laundry/brush1.jpg'),
(39, 'Folding Trash', 12, 300, 'Creative folding dustbin in the Toilet Car, kitchen door', 1, 7, 'laundry/dustin1.jpg'),
(40, 'kitchen Towels', 5, 400, 'Multipurpose Kitchen Sanitary Towel', 1, 7, 'laundry/towel1.jpg'),
(41, 'Rack', 8, 200, 'Rack For Kitchen Tools', 1, 8, 'more/rack1.jpg'),
(42, 'Scouring Brush', 20, 150, 'Scouring Brush Kitchen tools Included Shelving', 1, 8, 'more/brush1.jpg'),
(43, 'Tools To Make Meatballs', 17, 500, 'Tools to make meatballs, fish balls', 1, 8, 'more/tool1.jpg'),
(44, 'The Mortar', 40, 200, 'Wooden Mortar Tools For Cutting Wood', 1, 8, 'more/mortal1.jpg'),
(45, 'Kitchen Cabinet TS-3623', 70, 100, 'Tashuan TS-3623 Smart Kitchen Shelf (52 x 25 cm)', 1, 8, 'more/ts1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`username_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`username_id`,`id_product`),
  ADD KEY `FK_cart_product` (`id_product`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_image_product` (`id_product`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `FK_orders_account` (`username_id`);

--
-- Indexes for table `orders_details`
--
ALTER TABLE `orders_details`
  ADD PRIMARY KEY (`order_id`,`id_product`),
  ADD KEY `FK_orders_details_product` (`id_product`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `FK_product_category` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK_cart_account` FOREIGN KEY (`username_id`) REFERENCES `account` (`username_id`),
  ADD CONSTRAINT `FK_cart_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `FK_image_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_orders_account` FOREIGN KEY (`username_id`) REFERENCES `account` (`username_id`);

--
-- Constraints for table `orders_details`
--
ALTER TABLE `orders_details`
  ADD CONSTRAINT `FK_orders_details_orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `FK_orders_details_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_product_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
