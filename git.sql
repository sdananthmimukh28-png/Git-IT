-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2026 at 07:37 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `git`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `icon`, `created_at`) VALUES
(1, 'ลิปสติก', 'ลิปสติกและลิปแก้มทุกชนิด', '💄', '2026-01-20 06:33:02'),
(2, 'รองพื้น', 'รองพื้นและคอนซีลเลอร์', '🧴', '2026-01-20 06:33:02'),
(3, 'อายแชโดว์', 'อายแชโดว์และพาเลท', '🎨', '2026-01-20 06:33:02'),
(4, 'มาสคาร่า', 'มาสคาร่าและอายไลเนอร์', '✨', '2026-01-20 06:33:02'),
(5, 'บลัชออน', 'บลัชออนและไฮไลท์', '🌸', '2026-01-20 06:33:02'),
(6, 'ผลิตภัณฑ์บำรุง', 'ครีมบำรุงและเซรั่ม', '🧪', '2026-01-20 06:33:02');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `username`, `password`, `email`, `full_name`, `phone`, `address`, `created_at`) VALUES
(1, 'customer1', '482c811da5d5b4bc6d497ffa98491e38', 'customer1@email.com', 'สมใจ รักสวย', '081-234-5678', '123 ถ.สุขุมวิท แขวงคลองเตย เขตคลองเตย กรุงเทพฯ 10110', '2026-01-20 06:33:02'),
(2, 'customer2', '482c811da5d5b4bc6d497ffa98491e38', 'customer2@email.com', 'สวยใส มีสุข', '082-345-6789', '456 ถ.พระราม 4 แขวงปทุมวัน เขตปทุมวัน กรุงเทพฯ 10330', '2026-01-20 06:33:02'),
(3, 'customer3', '482c811da5d5b4bc6d497ffa98491e38', 'customer3@email.com', 'งามเนตร สวยงาม', '083-456-7890', '789 ถ.ศรีนครินทร์ แขวงหนองบอน เขตประเวศ กรุงเทพฯ 10250', '2026-01-20 06:33:02');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) DEFAULT NULL,
  `customer_phone` varchar(20) DEFAULT NULL,
  `customer_address` text DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT 0.00,
  `order_date` datetime NOT NULL,
  `status` varchar(50) DEFAULT 'pending' COMMENT 'pending, confirmed, shipped, delivered, cancelled',
  `payment_method` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `customer_name`, `customer_email`, `customer_phone`, `customer_address`, `total_amount`, `order_date`, `status`, `payment_method`, `created_at`) VALUES
(1, 1, 'สมใจ รักสวย', 'customer1@email.com', '081-234-5678', '123 ถ.สุขุมวิท แขวงคลองเตย เขตคลองเตย กรุงเทพฯ 10110', 1340.00, '2026-01-15 14:30:00', 'delivered', 'credit_card', '2026-01-20 06:33:02'),
(2, 2, 'สวยใส มีสุข', 'customer2@email.com', '082-345-6789', '456 ถ.พระราม 4 แขวงปทุมวัน เขตปทุมวัน กรุงเทพฯ 10330', 2280.00, '2026-01-18 10:15:00', 'shipped', 'bank_transfer', '2026-01-20 06:33:02'),
(3, 3, 'งามเนตร สวยงาม', 'customer3@email.com', '083-456-7890', '789 ถ.ศรีนครินทร์ แขวงหนองบอน เขตประเวศ กรุงเทพฯ 10250', 1750.00, '2026-01-20 16:45:00', 'pending', 'cod', '2026-01-20 06:33:02');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `product_name`, `quantity`, `price`, `subtotal`) VALUES
(1, 1, 1, 'ลิปสติกเนื้อแมท สี Rose Pink', 2, 450.00, 900.00),
(2, 1, 7, 'คอนซีลเลอร์ปกปิด High Coverage', 1, 550.00, 550.00),
(3, 2, 5, 'รองพื้นกันน้ำ SPF50+', 1, 890.00, 890.00),
(4, 2, 9, 'อายแชโดว์พาเลท 12 สี Nude Collection', 1, 1200.00, 1200.00),
(5, 3, 13, 'มาสคาร่าเส้นยาว Waterproof', 1, 650.00, 650.00),
(6, 3, 17, 'บลัชออนเนื้อครีม สี Peach', 2, 550.00, 1100.00);

-- --------------------------------------------------------

--
-- Stand-in structure for view `order_summary`
-- (See below for the actual view)
--
CREATE TABLE `order_summary` (
`order_id` int(11)
,`customer_name` varchar(255)
,`customer_email` varchar(255)
,`customer_phone` varchar(20)
,`order_date` datetime
,`status` varchar(50)
,`payment_method` varchar(50)
,`total_amount` decimal(10,2)
,`total_items` bigint(21)
,`products` mediumtext
);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `stock` int(11) DEFAULT 0,
  `status` tinyint(4) DEFAULT 1 COMMENT '1=เปิดขาย, 0=ปิดขาย',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `category`, `image`, `stock`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ลิปสติกเนื้อแมท สี Rose Pink', 'ลิปสติกเนื้อแมทติดทนนาน สีชมพูกุหลาบ เนื้อละเอียด ไม่แห้งตึง', 450.00, 'lipstick', '💄', 50, 1, '2026-01-20 06:33:02', '2026-01-20 06:33:02'),
(2, 'ลิปสติกเนื้อครีม สี Coral Red', 'ลิปสติกเนื้อครีมชุ่มชื้น สีแดงอมส้ม เพิ่มความอิ่มเอิบให้ริมฝีปาก', 480.00, 'lipstick', '💄', 45, 1, '2026-01-20 06:33:02', '2026-01-20 06:33:02'),
(3, 'ลิปทินท์ สี Berry Wine', 'ลิปทินท์สีสวย ติดทนนาน กันน้ำ สีไวน์เบอร์รี่', 390.00, 'lipstick', '💄', 60, 1, '2026-01-20 06:33:02', '2026-01-20 06:33:02'),
(4, 'ลิปแก้ม สี Nude Brown', 'ลิปแก้มสีนู้ดน้ำตาล เนื้อซอฟท์แมท ให้ลุคสาวเกาหลี', 420.00, 'lipstick', '💄', 40, 1, '2026-01-20 06:33:02', '2026-01-20 06:33:02'),
(5, 'รองพื้นกันน้ำ SPF50+', 'รองพื้นเนื้อบางเบา กันน้ำ กันเหงื่อ กันแดด SPF50+ PA+++', 890.00, 'foundation', '🧴', 30, 1, '2026-01-20 06:33:02', '2026-01-20 06:33:02'),
(6, 'รองพื้นคุชชั่น สูตรเกาหลี', 'คุชชั่นเนื้อเบา ให้ผิวเนียนเรียบ เกลี่ยง่าย ไม่อุดตัน', 750.00, 'foundation', '🧴', 35, 1, '2026-01-20 06:33:02', '2026-01-20 06:33:02'),
(7, 'คอนซีลเลอร์ปกปิด High Coverage', 'คอนซีลเลอร์ปกปิดสูง ปิดจุดด่างดำ รอยสิว รอยคล้ำ', 550.00, 'foundation', '🧴', 55, 1, '2026-01-20 06:33:02', '2026-01-20 06:33:02'),
(8, 'รองพื้นน้ำ Dewy Finish', 'รองพื้นสูตรน้ำ เนื้อบางเบา ให้ลุคผิวฉ่ำวาว Dewy', 820.00, 'foundation', '🧴', 28, 1, '2026-01-20 06:33:02', '2026-01-20 06:33:02'),
(9, 'อายแชโดว์พาเลท 12 สี Nude Collection', 'พาเลทสีอายแชโดว์ 12 สี โทนนู้ด เนื้อละเอียด เกลี่ยง่าย', 1200.00, 'eyeshadow', '🎨', 20, 1, '2026-01-20 06:33:02', '2026-01-20 06:33:02'),
(10, 'อายแชโดว์พาเลท 9 สี Smokey Eyes', 'พาเลท 9 สี โทนสโมคกี้ เหมาะสำหรับแต่งหน้าสุดเซ็กซี่', 980.00, 'eyeshadow', '🎨', 25, 1, '2026-01-20 06:33:02', '2026-01-20 06:33:02'),
(11, 'อายแชโดว์เดี่ยว Shimmer Gold', 'อายแชโดว์เดี่ยวสีทองประกาย เนื้อชิมเมอร์สวยเด่น', 350.00, 'eyeshadow', '🎨', 40, 1, '2026-01-20 06:33:02', '2026-01-20 06:33:02'),
(12, 'อายแชโดว์พาเลท Rainbow Edition', 'พาเลทสีสันสดใส 16 สี เหมาะสำหรับลุคสร้างสรรค์', 1450.00, 'eyeshadow', '🎨', 15, 1, '2026-01-20 06:33:02', '2026-01-20 06:33:02'),
(13, 'มาสคาร่าเส้นยาว Waterproof', 'มาสคาร่าช่วยยืดเส้นขนตา กันน้ำ กันเหงื่อ ไม่เลอะ', 650.00, 'mascara', '✨', 40, 1, '2026-01-20 06:33:02', '2026-01-20 06:33:02'),
(14, 'มาสคาร่าหนาสวย Volume Max', 'มาสคาร่าเพิ่มวอลลุ่มให้ขนตา หนาสวย ไม่จับเป็นก้อน', 720.00, 'mascara', '✨', 35, 1, '2026-01-20 06:33:02', '2026-01-20 06:33:02'),
(15, 'อายไลเนอร์แบบปากกา Super Black', 'อายไลเนอร์เนื้อกันน้ำ สีดำสนิท เขียนง่าย ไม่เลอะ', 480.00, 'mascara', '✨', 50, 1, '2026-01-20 06:33:02', '2026-01-20 06:33:02'),
(16, 'เจลอายไลเนอร์ Long Lasting', 'เจลอายไลเนอร์เนื้อครีม เขียนง่าย ติดทนนาน 24 ชั่วโมง', 590.00, 'mascara', '✨', 30, 1, '2026-01-20 06:33:02', '2026-01-20 06:33:02'),
(17, 'บลัชออนเนื้อครีม สี Peach', 'บลัชออนเนื้อครีม สีพีช ผสานได้ง่าย เนื้อสัมผัสนุ่มลื่น', 550.00, 'blush', '🌸', 35, 1, '2026-01-20 06:33:02', '2026-01-20 06:33:02'),
(18, 'บลัชออนเนื้อฝุ่น สี Rose', 'บลัชออนเนื้อฝุ่นละเอียด สีโรส เกลี่ยง่าย ติดทนนาน', 480.00, 'blush', '🌸', 42, 1, '2026-01-20 06:33:02', '2026-01-20 06:33:02'),
(19, 'ไฮไลท์เตอร์ Champagne Glow', 'ไฮไลท์เนื้อละเอียด ให้ประกายสวยแบบ Champagne Glow', 750.00, 'highlighter', '✨', 25, 1, '2026-01-20 06:33:02', '2026-01-20 06:33:02'),
(20, 'คอนทัวร์ Sculpting Powder', 'คอนทัวร์เนื้อฝุ่น เพิ่มมิติให้ใบหน้า แต่งหน้าเฉดสวย', 680.00, 'blush', '🌸', 28, 1, '2026-01-20 06:33:02', '2026-01-20 06:33:02'),
(21, 'เซรั่มบำรุงผิว Vitamin C', 'เซรั่มวิตามินซี ช่วยปรับสีผิวให้กระจ่างใส ลดรอยดำ', 1200.00, 'skincare', '🧪', 30, 1, '2026-01-20 06:33:02', '2026-01-20 06:33:02'),
(22, 'ครีมบำรุงหน้า Hyaluronic Acid', 'ครีมบำรุงผิวหน้า เติมความชุ่มชื้น ด้วย Hyaluronic Acid', 950.00, 'skincare', '🧪', 38, 1, '2026-01-20 06:33:02', '2026-01-20 06:33:02'),
(23, 'มาส์กหน้า Sheet Mask (10 ชิ้น)', 'มาส์กหน้ากระดาษ บำรุงผิว เพิ่มความชุ่มชื้น 10 แผ่น', 450.00, 'skincare', '🧪', 60, 1, '2026-01-20 06:33:02', '2026-01-20 06:33:02'),
(24, 'ครีมกันแดด SPF50+ PA+++', 'ครีมกันแดด ป้องกัน UVA/UVB เนื้อบางเบา ไม่เหนียวเหนอะหนะ', 580.00, 'skincare', '🧪', 45, 1, '2026-01-20 06:33:02', '2026-01-20 06:33:02');

-- --------------------------------------------------------

--
-- Structure for view `order_summary`
--
DROP TABLE IF EXISTS `order_summary`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `order_summary`  AS SELECT `o`.`id` AS `order_id`, `o`.`customer_name` AS `customer_name`, `o`.`customer_email` AS `customer_email`, `o`.`customer_phone` AS `customer_phone`, `o`.`order_date` AS `order_date`, `o`.`status` AS `status`, `o`.`payment_method` AS `payment_method`, `o`.`total_amount` AS `total_amount`, count(`oi`.`id`) AS `total_items`, group_concat(`oi`.`product_name` separator ', ') AS `products` FROM (`orders` `o` left join `order_items` `oi` on(`o`.`id` = `oi`.`order_id`)) GROUP BY `o`.`id` ORDER BY `o`.`order_date` DESC ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_orders_status` (`status`),
  ADD KEY `idx_orders_customer_id` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `idx_order_items_order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_products_category` (`category`),
  ADD KEY `idx_products_status` (`status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
