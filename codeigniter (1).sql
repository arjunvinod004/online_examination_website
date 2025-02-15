-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 10, 2025 at 10:34 AM
-- Server version: 8.2.0
-- PHP Version: 8.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeigniter`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `category_code` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_id` int NOT NULL,
  `category_name_ma` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name_en` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name_hi` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name_ar` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_desc_ma` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_desc_en` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_desc_hi` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_desc_ar` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_img` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_index` int NOT NULL,
  `is_active` int NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_code`, `store_id`, `category_name_ma`, `category_name_en`, `category_name_hi`, `category_name_ar`, `category_desc_ma`, `category_desc_en`, `category_desc_hi`, `category_desc_ar`, `category_img`, `order_index`, `is_active`) VALUES
(2, '123', 0, 'സൂപ്പ്', 'Soup', 'शोरबा', 'حساء', 'സൂപ്പ് desc', 'Soup desc', 'शोरबा desc', 'حساء  desc', 'soup.png', 5, 1),
(5, '003', 0, 'സ്റ്റാർട്ടർ', 'Starter', 'स्टार्टर', 'بداية', 'സ്റ്റാർട്ടർ desc', 'Starter desc', 'स्टार्टर desc', 'بداية desc', 'starter.png', 9, 1),
(4, 'Breakfast', 0, 'പ്രഭാതഭക്ഷണം', 'Breakfast', 'नाश्ता ', 'الفطور', 'പ്രഭാതഭക്ഷണം', 'Breakfast', 'नाश्ता ', 'الفطور', 'breakfast.png', 1, 1),
(6, '004', 0, ' ഉച്ചഭക്ഷണം', 'Lunch', 'दिन का खाना', 'غداء', 'ഉച്ചഭക്ഷണം desc', 'Lunch desc', ' दिन का खाना desc', 'غداء desc', 'lunch2.png', 8, 1),
(7, '008', 0, ' ഫ്രെഷ് ജ്യൂസ് ', 'Fresh Juice', 'ताज़ा जूस', 'عصير طازج', ' ഫ്രെഷ് ജ്യൂസ് ', 'Fresh Juice', 'ताज़ा जूस', 'عصير طازج', '6a859c6ce2a703e505386e55a5c4ea1d.png', 4, 1),
(8, 'mandhi', 0, ' മന്ദി', 'Mandhi', ' मंधी', 'المندي', ' മന്ദി എന്നത് യമൻ സ്വദേശിയായ പരമ്പരാഗത വിഭവമാണ്, സുഗന്ധമുള്ള ചോറും മൃദുവായ മാംസവും ഉപയോഗിച്ച് സാദ്ധ്യമാക്കുന്നത്. നിസ്സാരമായ തീയിൽ വേവിച്ചതിനാൽ മസാലകളുടെ രുചിയും സുഗന്ധവുമുള്ള മനോഹരമായ വിഭവമാണ് ഇത്', ' Mandi is a traditional Yemeni dish that combines fragrant rice with tender, slow-cooked meat. Infused with aromatic spices and cooked over low heat, this dish is known for its unique flavors and rich heritage', 'मंधी एक पारंपरिक यमनी व्यंजन है जिसमें खुशबूदार चावल और मसालेदार मांस का अनूठा मेल होता है। धीमी आंच पर पकाए गए मांस और चावल के साथ मसालों का स्वाद इसे विशेष बनाता है।', 'المندي هو طبق تقليدي يمني يجمع بين الأرز المتبل واللحم الطري المطهو ببطء. يتميز بنكهات التوابل العطرية وطريقة الطهي الفريدة على حرارة منخفضة.\r\n\r\n', '360_F_671041431_Wt34PRSFS1hxaVsnmsOXQigtoF55TpJC.png', 1, 1),
(9, 'madfoon', 0, 'മദ്‌ഫൂൺ', 'Madfoon', ' मदफून', 'المدفون', 'മദ്‌ഫൂൺ', 'Madfoon', ' मदफून', 'المدفون', 'meat-madfoon.png', 2, 1),
(10, 'mazabi', 0, ' മസ്ബി', 'Mazabi', 'मझबी ', 'للحم', 'മസ്ബി', 'Mazabi', 'मझबी ', 'للحم', '360_F_611704389_3h6UA692iFCCdWm6LxPtrRhqpEugnSF1.png', 3, 1),
(11, 'Mugalgal', 0, 'മുഗൽഗൽ', 'Mugalgal', ' मुघलगल', 'مغلغل', 'മുഗൽഗൽ', 'Mugalgal', ' मुघलगल', 'مغلغل', 'mughlai-chicken-recipe-1957398-hero-01-56a0bcdb847f40aab1d7d48e78f5042d.png', 4, 1),
(12, 'Fish', 0, 'മത്സ്യം', 'Fish', ' मछली', 'سمك', 'മത്സ്യം', 'Fish', ' मछली', 'سمك', 'Fish_fry_original_1_edit_400.png', 5, 1),
(13, 'kebab', 0, ' കെബാബ്', 'Kebab', 'कबाब', ' كباب ', ' കെബാബ്', 'kebab', 'कबाब', ' كباب ', 'lamb-shish-kebab-20-480x270.png', 6, 1),
(14, 'salad', 0, ' സാലഡ്', 'Salad', 'सलाद', 'سلطة ', ' സാലഡ്', 'Salad', 'सलाद', 'سلطة ', 'pexels-chanwalrus-1059905.png', 7, 1),
(15, 'Chicken', 0, 'കോഴി', 'Chicken', 'मुर्गा', 'فرخة', 'കോഴി', 'Chicken', 'मुर्गा', 'فرخة', 'Simple-Chicken-Fry.png', 10, 1),
(16, 'vegetarian', 0, 'വെജിറ്റേറിയൻ', 'Vegetarian', 'शाकाहारी', 'دجاج بالفلفل الأسود', 'വെജിറ്റേറിയൻ', 'Vegetarian', 'शाकाहारी', 'دجاج بالفلفل الأسود', 'vegetables__TTW___CR1,0,2278,1282___SR1500,844___QL100_.png', 11, 1),
(17, 'seafood', 0, 'സീഫുഡ്', 'Seafood', 'समुद्री भोजन', 'المأكولات البحرية', 'സീഫുഡ്', 'Seafood', 'समुद्री भोजन', 'المأكولات البحرية', 'Fish-Seafood-Analysis-Tentamus-2799x2099.png', 12, 1),
(18, 'beef and mutton', 0, ' ബീഫ് &  മട്ടൻ', 'Beef and Mutton', 'बीफ & मटन', 'المحمص & المحمص', ' ബീഫ് &  മട്ടൻ', 'Beef and Mutton', 'बीफ & मटन', 'المحمص & المحمص', 'l-intro-1697055279.png', 13, 1),
(19, 'Noodles', 0, 'അരിയും നൂഡിൽസും', 'Rice and Noodles', ' चावल और नूडल्स', 'الأرز والنودلز', 'അരിയും നൂഡിൽസും', 'Rice and Noodles', '\r\nचावल और नूडल्स', 'الأرز والنودلز', 'images_(8).png', 14, 1),
(20, 'Addons', 0, ' ആഡോണുകൾ', 'Addons', 'ऐड-ऑन', 'إضافات', 'ആഡോണുകൾ', 'Addons', 'ऐड-ऑन', 'إضافات', 'images_(9).png', 15, 1),
(21, 'Shakes and Smoothies', 0, 'ഷേക്കുകളും സ്മൂത്തികളും', 'Shakes and Smoothies', ' शेक और स्मूथीज़', 'المخفوقات والعصائر', 'ഷേക്കുകളും സ്മൂത്തികളും', 'Shakes and Smoothies', '\r\nशेक और स्मूथीज़', 'المخفوقات والعصائر', 'popcorn-smoothie-1800-1000_1610560619.png', 16, 1),
(22, 'biriyani', 0, 'ബിരിയാണി', 'Biriyani', 'बिरयानी', 'برياني', 'ബിരിയാണി', 'Biriyani', 'बिरयानी', 'برياني', 'chicken_mandhi.png', 17, 1),
(23, 'Combo', 0, 'കോംബോ', 'Combo', 'कॉम्बो', 'كومبو', 'കോംബോ', 'Combo', 'कॉम्बो', 'كومبو', '360_F_964591993_HJVzcw5JSb8YsoAzgqfptps5dU5QraIW.png', 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` int NOT NULL AUTO_INCREMENT,
  `state_id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `state_id` (`state_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `state_id`, `name`) VALUES
(1, 1, 'Thiruvananthapuram'),
(2, 1, 'Kollam'),
(3, 2, 'Salem'),
(4, 2, 'Thirunelveli');

-- --------------------------------------------------------

--
-- Table structure for table `combo_items`
--

DROP TABLE IF EXISTS `combo_items`;
CREATE TABLE IF NOT EXISTS `combo_items` (
  `combo_item_id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL COMMENT 'combo productid',
  `item_id` int NOT NULL COMMENT 'each combo itemid',
  `quantity` int NOT NULL,
  `store_id` int NOT NULL,
  PRIMARY KEY (`combo_item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `combo_items`
--

INSERT INTO `combo_items` (`combo_item_id`, `product_id`, `item_id`, `quantity`, `store_id`) VALUES
(2, 2, 11, 2, 41),
(7, 1, 12, 1, 41),
(6, 1, 3, 2, 41),
(5, 2, 10, 1, 41);

-- --------------------------------------------------------

--
-- Table structure for table `cookings`
--

DROP TABLE IF EXISTS `cookings`;
CREATE TABLE IF NOT EXISTS `cookings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `store_id` int DEFAULT NULL,
  `name_ma` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_hi` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cookings`
--

INSERT INTO `cookings` (`id`, `store_id`, `name_ma`, `name_en`, `name_hi`, `name_ar`, `is_active`) VALUES
(1, NULL, 'മസാലയില്ല', 'Non Spicy', 'बिना मसाले', 'غير حار', 1),
(2, NULL, 'കുറച്ച് മസാല', 'Less Spicy', 'कम मसालेदार', 'أقل حرارة', 1),
(4, NULL, 'നേരിയ മസാലകൾ', 'Mild spicy', 'हल्का मसालेदार', 'حار معتدل', 1),
(5, NULL, ' അധിക മസാല', 'Extra Masala', 'अतिरिक्त मसाला', 'ماسالا اضافية', 1),
(6, 41, 'test', 'test', 'test', 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `country_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `support_no` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `support_email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `name`, `currency`, `support_no`, `support_email`, `is_active`) VALUES
(1, 'India', '₹', '7012713311', 'support1@gmail.com', 1),
(2, 'Qatar', '﷼', NULL, NULL, 1),
(3, 'Dubai', 'د.إ', NULL, NULL, 1),
(9, 'Oman', 'ر.ع', NULL, NULL, 1),
(12, 'Sharjah', 'د.إ', NULL, NULL, 1),
(15, 'Saudi', 'ر.س', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int NOT NULL,
  `username` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `phone`, `gender`, `age`, `username`, `password`, `address`, `is_active`) VALUES
(4, 'Catt berri', 'cattberri@gmail.com', '9845678908', '', 0, '', '', 'catt berri address', 1),
(5, 'Gcc ompp', 'gcc@gmail.com', '7012713312', '', 0, '', '', 'address', 1),
(6, 'vinu', 'vinu@gmail.com', '9847421081', '', 0, '', '', 'ddsd', 0),
(7, 'Petrojet', 'petrojet@gmail.com', '7012713312', '', 0, '', '', 'petrojet address', 1),
(8, 'Saipem', 'client@gmail.com', '9867465432', '', 0, '', '', 'dgfgdfgd', 1),
(9, 'Bpcl', 'gfdgfdg@gmail.com', '98674567453', '', 0, '', '', 'dfgdfgdfg', 1),
(10, 'NSH', 'nsh@gmail.com', '7012713312', '', 0, '', '', 'eweqweqwe', 1),
(11, 'GALAXY -1', 'galaxy1@gpda.com', '966573750807', '', 0, '', '', 'KHOBHAR, DAMMAM, SAUDI ARABIA', 1),
(19, 'Alan', 'alan@gmail.com', '7012713312', 'male', 25, 'alan', 'alan', 'alan address', 0),
(23, 'Rajesh', 'rajesh@gmail.com', '', '', 0, 'rajesh', '$2y$10$CnV1csrqxSHN9GJocEkuc.yAaGf9xLf4itqEbypbRZ.NXTWNwqYVG', '', 1),
(24, 'sivasankar', 'siva@gmail.com', '', '', 0, 'siva', '$2y$10$c8YdsqGVUx6VdtvvmR.z9.p3TbwhgxRuoGtdwH3kgslnAGNjJNqFS', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

DROP TABLE IF EXISTS `holidays`;
CREATE TABLE IF NOT EXISTS `holidays` (
  `id` int NOT NULL AUTO_INCREMENT,
  `store_id` int NOT NULL,
  `holiday_date` date NOT NULL,
  `holiday_name` varchar(255) NOT NULL,
  `holiday_description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`id`, `store_id`, `holiday_date`, `holiday_name`, `holiday_description`) VALUES
(17, 41, '2024-12-25', 'Christmas', 'holiday');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

DROP TABLE IF EXISTS `module`;
CREATE TABLE IF NOT EXISTS `module` (
  `moduleid` int NOT NULL AUTO_INCREMENT,
  `modulename` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `modulecode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'controller name started with small letter',
  `ordernumber` int NOT NULL COMMENT 'Display main menus with this order',
  `parent_id` int NOT NULL DEFAULT '0',
  `moduletype` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int NOT NULL DEFAULT '1',
  `enable_add` int NOT NULL,
  `enable_edit` int NOT NULL,
  `enable_delete` int NOT NULL,
  `enable_view` int NOT NULL,
  `enable_approve` int NOT NULL,
  PRIMARY KEY (`moduleid`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`moduleid`, `modulename`, `modulecode`, `ordernumber`, `parent_id`, `moduletype`, `icon`, `is_active`, `enable_add`, `enable_edit`, `enable_delete`, `enable_view`, `enable_approve`) VALUES
(1, 'Dashboard', 'admin/dashboard', 1, 0, 'Leftmenu', 'home', 1, 0, 0, 0, 1, 0),
(3, 'Role', 'admin/role', 2, 0, 'Leftmenu', 'check', 1, 1, 1, 1, 1, 0),
(4, 'Modules', 'module', 0, 0, 'Leftmenu', 'book', 0, 0, 0, 0, 0, 0),
(37, 'Client', 'admin/client', 4, 0, 'Leftmenu', 'user', 1, 1, 1, 1, 1, 0),
(40, 'Projects', 'project', 0, 0, 'Leftmenu', 'clipboard', 0, 1, 1, 1, 1, 0),
(41, 'ewww', 'eqweqweww', 0, 0, 'Leftmenu', 'qweqweww', 0, 0, 0, 0, 0, 0),
(42, 'Job types', 'jobs', 0, 58, 'Leftmenu', 'book', 1, 1, 1, 1, 1, 0),
(43, 'Projector', 'projector', 0, 58, 'Leftmenu', 'window-maximize', 1, 1, 1, 0, 1, 0),
(44, 'Staff', 'staff', 3, 0, 'Leftmenu', 'users', 1, 1, 1, 1, 1, 0),
(45, 'Plant', 'plant', 0, 46, 'Leftmenu', 'book', 1, 1, 1, 1, 1, 0),
(46, 'Vehicles', 'vehicle', 6, 0, 'Leftmenu', 'truck', 1, 0, 0, 0, 1, 0),
(47, 'Technicians', 'cordinator/technicians', 7, 0, 'Leftmenu', 'book', 1, 0, 0, 0, 1, 0),
(48, 'Punch', 'punch', 0, 0, 'Leftmenu', 'book', 1, 1, 0, 0, 0, 0),
(49, 'Vehicletype', 'vehicletype', 0, 46, '', '', 1, 1, 1, 1, 1, 0),
(50, 'Vehicle', 'vehicle', 0, 46, '', '', 1, 1, 1, 1, 1, 0),
(51, 'Drivers', 'cordinator/drivers', 8, 0, '', 'book', 1, 0, 0, 0, 1, 0),
(52, 'Task', 'cordinator/tasks', 5, 0, '', 'tasks', 1, 1, 1, 1, 1, 1),
(53, 'Consumables', '', 7, 0, '', 'book', 1, 0, 0, 0, 1, 0),
(54, 'Consumable', 'consumables', 0, 53, '', '', 1, 1, 1, 1, 1, 0),
(55, 'Stock', 'stock', 0, 53, '', 'book', 1, 1, 1, 1, 1, 0),
(56, 'Diameter', 'diameter', 0, 58, '', 'book', 1, 1, 1, 1, 1, 0),
(57, 'Wall thickness', 'wall_thickness', 0, 58, '', 'book', 1, 1, 1, 1, 1, 0),
(58, 'settings', '', 16, 0, '', 'cogs', 1, 0, 0, 0, 1, 0),
(59, 'Projector locations', 'projector/locations', 0, 58, '0', 'book', 1, 1, 1, 1, 1, 0),
(60, 'Requested Consumables', 'Consumables/requested', 0, 53, '', 'book', 1, 0, 0, 0, 1, 0),
(61, 'Reports', 'Reports', 17, 0, 'rr', 'book', 1, 0, 0, 0, 1, 0),
(62, 'Other Approvals', 'cordinator/approve', 18, 0, '', 'book', 1, 0, 0, 0, 1, 0),
(64, 'Timesheet Management', '', 0, 0, '', 'book', 1, 1, 1, 1, 1, 1),
(65, 'Upload Job Request', '', 0, 0, '', '', 1, 1, 0, 1, 1, 1),
(66, 'Upload Job Reports', '', 0, 0, '', '', 1, 1, 0, 1, 1, 1),
(67, 'Vehicle logs', 'Vehicle/logs', 0, 46, '', 'book', 1, 0, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender` int NOT NULL,
  `reciever` int NOT NULL,
  `created_date` date NOT NULL,
  `status` int NOT NULL COMMENT 'unread = 0 read=1',
  `task_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `title`, `message`, `sender`, `reciever`, `created_date`, `status`, `task_id`) VALUES
(3, 'work started', 'work message', 96, 81, '2023-05-06', 0, 9),
(4, 'Task Id- 3 started by 96', 'work message', 96, 0, '2023-05-22', 0, 3),
(5, 'Task Id- 3 started by Anoop', 'work message', 96, 81, '2023-05-22', 1, 3),
(6, 'Task Id- 3 ended by Anoop', 'work message', 96, 81, '2023-05-22', 1, 3),
(23, 'Task Id- 13 started by Kripa', 'work message', 103, 50, '2023-05-29', 0, 13),
(24, 'Task Id- 9 started by Kripa', 'work message', 103, 50, '2023-05-29', 0, 9),
(25, 'Task Id- 13 started by Kripa', 'work message', 103, 50, '2023-05-29', 0, 13),
(26, 'Task Id- 13 ended by Kripa', 'work message', 103, 50, '2023-05-29', 0, 13),
(27, 'Task Id- 13 ended by Kripa', 'work message', 103, 50, '2023-05-29', 0, 13),
(28, 'Task Id- 9 started by Kripa', 'work message', 103, 50, '2023-05-29', 0, 9),
(29, 'Task Id- 9 ended by Kripa', 'work message', 103, 50, '2023-05-29', 0, 9),
(30, 'Task Id- 13 ended by Kripa', 'work message', 103, 50, '2023-05-29', 0, 13),
(31, 'Task Id- 12 started by Kripa', 'work message', 103, 50, '2023-05-29', 0, 12),
(32, 'Task Id- 12 ended by Kripa', 'work message', 103, 50, '2023-05-29', 0, 12),
(33, 'Task Id- 14 started by Kripa', 'work message', 103, 50, '2023-05-29', 0, 14),
(34, 'Task Id- 11 started by Kripa', 'work message', 103, 50, '2023-05-29', 0, 11),
(35, 'Task Id- 11 started by Kripa', 'work message', 103, 50, '2023-05-29', 0, 11),
(36, 'Task Id- 11 started by Kripa', 'work message', 103, 50, '2023-05-29', 0, 11),
(37, 'Task Id- 11 ended by Kripa', 'work message', 103, 50, '2023-05-29', 0, 11),
(38, 'Task Id- 15 started by niza', 'work message', 105, 50, '2023-05-29', 0, 15),
(39, 'Task Id- 15 ended by niza', 'work message', 105, 50, '2023-05-29', 0, 15),
(40, 'Task Id- 15 started by niza', 'work message', 105, 50, '2023-05-29', 0, 15),
(41, 'Task Id- 15 ended by niza', 'work message', 105, 50, '2023-05-29', 0, 15),
(42, 'Task Id- 15 started by niza', 'work message', 105, 50, '2023-05-29', 0, 15),
(43, 'Task Id- 15 ended by niza', 'work message', 105, 50, '2023-05-29', 0, 15),
(44, 'Task Id- 17 started by vishnu', 'work message', 106, 50, '2023-06-19', 0, 17),
(45, 'Task Id- 18 started by Alvin', 'work message', 107, 50, '2023-06-19', 0, 18),
(46, 'Task Id- 22 started by Alvin', 'work message', 107, 50, '2023-06-26', 0, 22),
(47, 'Task Id- 22 ended by Alvin', 'work message', 107, 50, '2023-06-26', 0, 22),
(48, 'Task Id- 22 started by Alvin', 'work message', 107, 50, '2023-06-26', 0, 22),
(49, 'Task Id- 22 ended by Alvin', 'work message', 107, 50, '2023-06-26', 0, 22),
(50, 'Task Id- 27 started by vishnu k v', 'work message', 108, 50, '2023-06-28', 0, 27),
(51, 'Task Id- 28 started by vishnu', 'work message', 109, 50, '2023-07-03', 0, 28),
(52, 'Task Id- 28 started by niza', 'work message', 110, 50, '2023-07-03', 0, 28),
(53, 'Task Id- 53 started by vishnu', 'work message', 109, 50, '2023-07-11', 0, 53),
(54, 'Task Id- 53 ended by vishnu', 'work message', 109, 50, '2023-07-11', 0, 53),
(55, 'Task Id- 54 started by Manu', 'work message', 112, 50, '2023-07-11', 0, 54),
(56, 'Task Id- 56 started by Alvin', 'work message', 107, 50, '2023-07-12', 1, 56),
(57, 'Task Id- 56 ended by Alvin', 'work message', 107, 50, '2023-07-12', 0, 56),
(58, 'Task Id- 66 started by vishnu', 'work message', 109, 50, '2023-07-15', 0, 66),
(59, 'Task Id- 70 started by Alvin', 'work message', 107, 107, '2023-07-24', 0, 70),
(60, 'Task Id- 70 ended by Alvin', 'work message', 107, 107, '2023-07-24', 0, 70);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id` int NOT NULL AUTO_INCREMENT,
  `orderno` int NOT NULL,
  `date` date NOT NULL,
  `store_id` int NOT NULL,
  `amount` double DEFAULT '0',
  `tax` double NOT NULL DEFAULT '0',
  `tax_amount` double NOT NULL DEFAULT '0',
  `total_amount` double NOT NULL DEFAULT '0',
  `is_paid` int NOT NULL COMMENT '1 = paid 0= unpaid',
  `is_approve` int NOT NULL DEFAULT '0',
  `table_id` int NOT NULL,
  `order_type` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` int NOT NULL DEFAULT '0' COMMENT '0 = pending \r\n1 = cooking  \r\n2 = ready \r\n3 = Out for delivery\r\n4 = delivered',
  `delivery_boy` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `out_for_delivery_time` time DEFAULT NULL,
  `delivered_time` time DEFAULT NULL,
  `location` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_mode` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_by` int NOT NULL DEFAULT '0',
  `modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `orderno`, `date`, `store_id`, `amount`, `tax`, `tax_amount`, `total_amount`, `is_paid`, `is_approve`, `table_id`, `order_type`, `order_status`, `delivery_boy`, `customer_name`, `contact_number`, `time`, `out_for_delivery_time`, `delivered_time`, `location`, `payment_mode`, `modified_by`, `modified_date`) VALUES
(1, 914100125, '2025-01-10', 41, 70, 10, 23, 253, 0, 0, 85, 'D', 1, NULL, '', '', '0', NULL, NULL, '', NULL, 0, '2025-01-10 15:28:01');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `orderno` int NOT NULL,
  `date` date NOT NULL,
  `store_id` int NOT NULL DEFAULT '0',
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `vat_id` int NOT NULL,
  `rate` double NOT NULL DEFAULT '0',
  `amount` double NOT NULL DEFAULT '0',
  `tax` double NOT NULL DEFAULT '0',
  `tax_amount` double NOT NULL DEFAULT '0',
  `total_amount` double NOT NULL DEFAULT '0',
  `item_remarks` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `variant_id` int DEFAULT '0',
  `category_id` int NOT NULL,
  `is_addon` int NOT NULL,
  `is_customisable` int NOT NULL,
  `table_id` int NOT NULL,
  `order_type` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_paid` int NOT NULL,
  `is_reorder` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `orderno`, `date`, `store_id`, `product_id`, `quantity`, `vat_id`, `rate`, `amount`, `tax`, `tax_amount`, `total_amount`, `item_remarks`, `variant_id`, `category_id`, `is_addon`, `is_customisable`, `table_id`, `order_type`, `is_paid`, `is_reorder`) VALUES
(1, 914100125, '2025-01-10', 41, 3, 8, 2, 10, 20, 10, 8, 88, NULL, NULL, 4, 0, 0, 85, 'D', 0, 0),
(2, 914100125, '2025-01-10', 41, 1, 2, 2, 50, 50, 10, 10, 110, NULL, NULL, 23, 0, 0, 85, 'D', 0, 0),
(3, 914100125, '2025-01-10', 41, 4, 2, 2, 10, 0, 10, 2, 22, NULL, NULL, 4, 0, 0, 85, 'D', 0, 1),
(4, 914100125, '2025-01-10', 41, 3, 3, 2, 10, 0, 10, 3, 33, NULL, NULL, 4, 0, 0, 85, 'D', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
CREATE TABLE IF NOT EXISTS `packages` (
  `package_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_quantity` int NOT NULL,
  `remarks` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int NOT NULL,
  PRIMARY KEY (`package_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`package_id`, `name`, `no_of_quantity`, `remarks`, `is_active`) VALUES
(1, '5 Tables', 5, '5 tables here', 1),
(2, '10 Tables', 10, '10 Tables here', 1),
(3, '2 Tables', 2, '2 tables', 1),
(4, '11 Tables', 11, '11 Tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `privilege`
--

DROP TABLE IF EXISTS `privilege`;
CREATE TABLE IF NOT EXISTS `privilege` (
  `privilegeid` int NOT NULL AUTO_INCREMENT,
  `roleid` int NOT NULL,
  `moduleid` int NOT NULL,
  `can_add` int NOT NULL,
  `can_edit` int NOT NULL,
  `can_delete` int NOT NULL,
  `can_view` int NOT NULL,
  `can_approve` int NOT NULL,
  PRIMARY KEY (`privilegeid`)
) ENGINE=InnoDB AUTO_INCREMENT=201 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `privilege`
--

INSERT INTO `privilege` (`privilegeid`, `roleid`, `moduleid`, `can_add`, `can_edit`, `can_delete`, `can_view`, `can_approve`) VALUES
(1, 1, 44, 1, 1, 1, 1, 0),
(2, 1, 43, 1, 1, 0, 1, 0),
(3, 1, 42, 1, 1, 1, 1, 0),
(4, 1, 39, 1, 1, 1, 1, 0),
(5, 1, 37, 1, 1, 1, 1, 0),
(6, 1, 4, 1, 1, 1, 1, 0),
(7, 1, 3, 1, 1, 1, 1, 0),
(8, 1, 1, 0, 0, 0, 1, 0),
(9, 42, 44, 0, 0, 0, 0, 0),
(10, 42, 43, 0, 0, 0, 0, 0),
(11, 42, 42, 0, 0, 0, 0, 0),
(12, 42, 39, 0, 0, 0, 0, 0),
(13, 42, 37, 0, 0, 0, 0, 0),
(14, 42, 4, 0, 0, 0, 0, 0),
(15, 42, 3, 0, 0, 0, 0, 0),
(16, 42, 1, 0, 0, 0, 1, 0),
(17, 1, 45, 1, 1, 1, 1, 0),
(18, 39, 46, 0, 0, 0, 1, 0),
(19, 39, 45, 0, 0, 0, 0, 0),
(20, 39, 44, 1, 0, 0, 0, 0),
(21, 39, 43, 0, 0, 0, 0, 0),
(22, 39, 42, 0, 1, 0, 0, 0),
(23, 39, 39, 0, 0, 0, 0, 0),
(24, 39, 37, 0, 0, 1, 0, 0),
(25, 39, 4, 0, 0, 0, 1, 0),
(26, 39, 3, 1, 0, 0, 0, 0),
(27, 39, 1, 1, 0, 0, 1, 0),
(28, 1, 46, 0, 0, 0, 1, 0),
(29, 42, 46, 0, 0, 0, 0, 0),
(30, 42, 45, 0, 0, 0, 0, 0),
(31, 43, 48, 1, 0, 0, 0, 0),
(32, 43, 47, 0, 0, 0, 0, 0),
(33, 43, 46, 0, 0, 0, 1, 0),
(34, 43, 45, 0, 0, 0, 0, 0),
(35, 43, 44, 1, 1, 1, 0, 0),
(36, 43, 43, 0, 0, 0, 0, 0),
(37, 43, 42, 0, 0, 0, 1, 0),
(38, 43, 37, 1, 0, 0, 0, 0),
(39, 43, 4, 0, 0, 0, 0, 0),
(40, 43, 3, 0, 1, 0, 1, 0),
(41, 43, 1, 0, 0, 0, 1, 0),
(42, 1, 48, 1, 0, 0, 0, 0),
(43, 1, 47, 0, 0, 0, 0, 0),
(44, 35, 48, 1, 0, 0, 0, 0),
(45, 35, 47, 0, 0, 0, 0, 0),
(46, 35, 46, 0, 0, 0, 0, 0),
(47, 35, 45, 0, 0, 0, 0, 0),
(48, 35, 44, 0, 0, 0, 1, 0),
(49, 35, 43, 0, 0, 0, 0, 0),
(50, 35, 42, 0, 0, 0, 0, 0),
(51, 35, 37, 0, 0, 0, 0, 0),
(52, 35, 3, 0, 0, 0, 0, 0),
(53, 35, 1, 0, 0, 0, 1, 0),
(54, 5, 48, 1, 0, 0, 0, 0),
(55, 5, 47, 0, 0, 0, 1, 0),
(56, 5, 46, 0, 0, 0, 0, 0),
(57, 5, 45, 0, 0, 0, 0, 0),
(58, 5, 44, 0, 0, 0, 0, 0),
(59, 5, 43, 0, 0, 0, 0, 0),
(60, 5, 42, 0, 0, 0, 0, 0),
(61, 5, 37, 0, 0, 0, 0, 0),
(62, 5, 3, 0, 0, 0, 0, 0),
(63, 5, 1, 0, 0, 0, 1, 0),
(64, 1, 50, 1, 1, 1, 1, 0),
(65, 1, 49, 1, 1, 1, 1, 0),
(66, 1, 51, 0, 0, 0, 0, 0),
(67, 5, 51, 0, 0, 0, 1, 0),
(68, 5, 50, 0, 0, 0, 0, 0),
(69, 5, 49, 0, 0, 0, 0, 0),
(70, 30, 51, 0, 0, 0, 0, 0),
(71, 30, 50, 0, 0, 0, 0, 0),
(72, 30, 49, 0, 0, 0, 0, 0),
(73, 30, 48, 0, 0, 0, 0, 0),
(74, 30, 47, 0, 0, 0, 0, 0),
(75, 30, 46, 0, 0, 0, 0, 0),
(76, 30, 45, 0, 0, 0, 0, 0),
(77, 30, 44, 0, 0, 0, 0, 0),
(78, 30, 43, 0, 0, 0, 0, 0),
(79, 30, 42, 0, 0, 0, 0, 0),
(80, 30, 37, 1, 1, 1, 1, 0),
(81, 30, 3, 0, 0, 0, 0, 0),
(82, 30, 1, 0, 0, 0, 0, 0),
(83, 37, 51, 0, 0, 0, 0, 0),
(84, 37, 50, 1, 1, 1, 1, 0),
(85, 37, 49, 1, 1, 1, 1, 0),
(86, 37, 48, 0, 0, 0, 0, 0),
(87, 37, 47, 0, 0, 0, 0, 0),
(88, 37, 46, 1, 1, 1, 1, 0),
(89, 37, 45, 0, 0, 0, 0, 0),
(90, 37, 44, 0, 0, 0, 0, 0),
(91, 37, 43, 0, 0, 0, 0, 0),
(92, 37, 42, 0, 0, 0, 0, 0),
(93, 37, 37, 0, 0, 0, 0, 0),
(94, 37, 3, 0, 0, 0, 0, 0),
(95, 37, 1, 0, 0, 0, 0, 0),
(96, 5, 52, 1, 0, 0, 1, 0),
(97, 1, 52, 1, 1, 1, 1, 1),
(98, 38, 53, 0, 0, 0, 1, 0),
(99, 38, 52, 0, 0, 0, 0, 0),
(100, 38, 51, 0, 0, 0, 0, 0),
(101, 38, 50, 0, 0, 0, 0, 0),
(102, 38, 49, 0, 0, 0, 0, 0),
(103, 38, 48, 1, 0, 0, 0, 0),
(104, 38, 47, 0, 0, 0, 0, 0),
(105, 38, 46, 0, 0, 0, 0, 0),
(106, 38, 45, 0, 0, 0, 0, 0),
(107, 38, 44, 0, 0, 0, 0, 0),
(108, 38, 43, 0, 0, 0, 0, 0),
(109, 38, 42, 0, 0, 0, 0, 0),
(110, 38, 37, 0, 0, 0, 0, 0),
(111, 38, 3, 0, 0, 0, 0, 0),
(112, 38, 1, 0, 0, 0, 1, 0),
(113, 1, 57, 1, 1, 1, 1, 0),
(114, 1, 56, 1, 1, 1, 1, 0),
(115, 1, 55, 1, 1, 1, 1, 0),
(116, 1, 54, 1, 1, 1, 1, 0),
(117, 1, 53, 0, 0, 0, 1, 0),
(118, 42, 57, 1, 1, 1, 1, 0),
(119, 42, 56, 1, 1, 1, 1, 0),
(120, 42, 55, 0, 0, 0, 1, 0),
(121, 42, 54, 0, 0, 0, 1, 0),
(122, 42, 53, 0, 0, 0, 1, 0),
(123, 42, 52, 0, 0, 0, 0, 0),
(124, 42, 51, 0, 0, 0, 0, 0),
(125, 42, 50, 0, 0, 0, 0, 0),
(126, 42, 49, 0, 0, 0, 0, 0),
(127, 42, 48, 0, 0, 0, 0, 0),
(128, 42, 47, 0, 0, 0, 0, 0),
(129, 1, 58, 0, 0, 0, 1, 0),
(130, 42, 58, 0, 0, 0, 1, 0),
(131, 1, 59, 1, 1, 1, 1, 0),
(132, 38, 60, 0, 0, 0, 1, 0),
(133, 38, 59, 0, 0, 0, 0, 0),
(134, 38, 58, 0, 0, 0, 0, 0),
(135, 38, 57, 0, 0, 0, 0, 0),
(136, 38, 56, 0, 0, 0, 0, 0),
(137, 38, 55, 0, 0, 0, 0, 0),
(138, 38, 54, 0, 0, 0, 0, 0),
(139, 1, 61, 0, 0, 0, 1, 0),
(140, 1, 60, 0, 0, 0, 1, 0),
(141, 1, 62, 0, 0, 0, 1, 0),
(142, 34, 64, 0, 0, 0, 1, 0),
(143, 34, 63, 0, 0, 0, 1, 0),
(144, 34, 62, 0, 0, 0, 0, 0),
(145, 34, 61, 0, 0, 0, 1, 0),
(146, 34, 60, 0, 0, 0, 1, 0),
(147, 34, 59, 1, 1, 1, 1, 0),
(148, 34, 58, 0, 0, 0, 1, 0),
(149, 34, 57, 1, 1, 1, 1, 0),
(150, 34, 56, 1, 1, 1, 1, 0),
(151, 34, 55, 1, 1, 1, 1, 0),
(152, 34, 54, 1, 1, 1, 1, 0),
(153, 34, 53, 0, 0, 0, 1, 0),
(154, 34, 52, 1, 1, 1, 1, 0),
(155, 34, 51, 0, 0, 0, 1, 0),
(156, 34, 50, 1, 1, 1, 1, 0),
(157, 34, 49, 1, 1, 1, 1, 0),
(158, 34, 48, 1, 0, 0, 0, 0),
(159, 34, 47, 0, 0, 0, 1, 0),
(160, 34, 46, 0, 0, 0, 1, 0),
(161, 34, 45, 1, 1, 1, 1, 0),
(162, 34, 44, 1, 1, 1, 1, 0),
(163, 34, 43, 1, 1, 0, 1, 0),
(164, 34, 42, 1, 1, 1, 1, 0),
(165, 34, 37, 1, 1, 1, 1, 0),
(166, 34, 3, 1, 1, 1, 1, 0),
(167, 34, 1, 0, 0, 0, 1, 0),
(168, 1, 64, 0, 1, 0, 1, 1),
(169, 1, 63, 0, 0, 0, 1, 0),
(170, 1, 66, 1, 0, 1, 1, 1),
(171, 1, 65, 1, 0, 1, 1, 1),
(172, 1, 67, 0, 0, 0, 1, 0),
(173, 2, 67, 0, 0, 0, 0, 0),
(174, 2, 66, 1, 0, 1, 1, 1),
(175, 2, 65, 1, 0, 1, 1, 0),
(176, 2, 64, 0, 0, 0, 1, 0),
(177, 2, 62, 0, 0, 0, 0, 0),
(178, 2, 61, 0, 0, 0, 1, 0),
(179, 2, 60, 0, 0, 0, 0, 0),
(180, 2, 59, 0, 0, 0, 0, 0),
(181, 2, 58, 0, 0, 0, 0, 0),
(182, 2, 57, 0, 0, 0, 0, 0),
(183, 2, 56, 0, 0, 0, 0, 0),
(184, 2, 55, 0, 0, 0, 0, 0),
(185, 2, 54, 0, 0, 0, 0, 0),
(186, 2, 53, 0, 0, 0, 0, 0),
(187, 2, 52, 0, 0, 0, 1, 0),
(188, 2, 51, 0, 0, 0, 0, 0),
(189, 2, 50, 0, 0, 0, 0, 0),
(190, 2, 49, 0, 0, 0, 0, 0),
(191, 2, 48, 0, 0, 0, 0, 0),
(192, 2, 47, 0, 0, 0, 0, 0),
(193, 2, 46, 0, 0, 0, 0, 0),
(194, 2, 45, 0, 0, 0, 0, 0),
(195, 2, 44, 0, 0, 0, 0, 0),
(196, 2, 43, 0, 0, 0, 0, 0),
(197, 2, 42, 0, 0, 0, 0, 0),
(198, 2, 37, 0, 0, 0, 0, 0),
(199, 2, 3, 0, 0, 0, 0, 0),
(200, 2, 1, 0, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `subcategory_id` int NOT NULL,
  `store_id` int NOT NULL COMMENT 'If added by the admin store id will be 0 otherwise logged store id',
  `price` int NOT NULL,
  `image` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image4` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_customizable` int NOT NULL COMMENT 'If 1=customizable 0=Non customisable',
  `is_addon` int NOT NULL COMMENT 'if value is 1 this product is addon otherwise not addon',
  `product_veg_nonveg` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name_ma` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name_en` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name_hi` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name_ar` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_desc_ma` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_desc_en` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_desc_hi` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_desc_ar` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=115 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `subcategory_id`, `store_id`, `price`, `image`, `image1`, `image2`, `image3`, `image4`, `is_customizable`, `is_addon`, `product_veg_nonveg`, `product_name_ma`, `product_name_en`, `product_name_hi`, `product_name_ar`, `product_desc_ma`, `product_desc_en`, `product_desc_hi`, `product_desc_ar`, `is_active`) VALUES
(1, 2, 0, 0, 0, 'kozhi_kurumulak_(2).jpg', '', '', '', '', 0, 0, 'non-veg', 'കോഴി കുറുംലക്ക്', 'Kozhi Kurumulak', 'कोझी कुरुमलाक', 'كوزي كوروملاك', 'ക്ലാസിക് ചിക്കൻ സൂപ്പിൽ വ്യക്തമായ ചിക്കൻ ചാറു അടങ്ങിയിരിക്കുന്നു, പലപ്പോഴും ചിക്കൻ അല്ലെങ്കിൽ പച്ചക്കറി കഷണങ്ങൾ; പാസ്ത, നൂഡിൽസ്, പറഞ്ഞല്ലോ, അല്ലെങ്കിൽ കാരറ്റ്, അരി, ബാർലി തുടങ്ങിയ ധാന്യങ്ങൾ എന്നിവയാണ് പൊതുവായ കൂട്ടിച്ചേർക്കലുകൾ', 'The classic chicken soup consists of a clear chicken broth, often with pieces of chicken or vegetables; common additions are pasta, noodles, dumplings, or carrots, and grains such as rice and barley', 'क्लासिक चिकन सूप में स्पष्ट चिकन शोरबा होता है, अक्सर चिकन या सब्जियों के टुकड़ों के साथ; सामान्य अतिरिक्त हैं पास्ता, नूडल्स, पकौड़ी, या गाजर, और चावल और जौ जैसे अनाज', ' من مرق الدجاج الصافي، وغالبًا ما يكون مع قطع من الدجاج أو الخضار؛ الإضافات الشائعة هي المعكرونة أو المعكرونة أو الزلابية أو الجزر والحبوب مثل الأرز والشعير', 1),
(2, 2, 0, 0, 0, 'soup.jpg', '', '', '', '', 0, 0, 'veg', 'സ്വീറ്റ് കോൺ വെജ് സൂപ്പ്', 'Sweet Corn Veg Soup', 'स्वीट कॉर्न वेज सूप', 'شوربة الخضار بالذرة الحلوة', 'കോൺ സൂപ്പിലെ പ്രധാന ചേരുവ സ്വീറ്റ് കോൺ ആണ്. കോൺ സൂപ്പ് തയ്യാറാക്കാൻ നിരവധി മാർഗങ്ങളുണ്ട്. ചില പാചകക്കുറിപ്പുകളിൽ പുതിയ ധാന്യം ഉൾപ്പെടുന്നു, മറ്റുള്ളവർ ടിൻ ചെയ്ത ധാന്യം ഉപയോഗിക്കുന്നു. ഈ പാചകത്തിൽ ഫ്രഷ് സ്വീറ്റ് കോൺ കേർണലുകൾ, വെള്ളം, കുരുമുളക്, കോൺഫ്‌ളോർ, സ്കാലിയൻസ്, സെലറി, ഓയിൽ, ഉപ്പ് എന്നിവ ഉൾപ്പെടുന്നു', 'The main ingredient in corn soup is sweet corn. There are many different ways to prepare corn soup. Some recipes include fresh corn while others use tinned corn. This recipe includes fresh sweet corn kernels, water, pepper, cornflour, scallions, celery, oil and salt', 'मक्के के सूप में मुख्य सामग्री स्वीट कॉर्न है। मक्के का सूप बनाने के कई अलग-अलग तरीके हैं। कुछ व्यंजनों में ताजा मक्का शामिल होता है जबकि अन्य में डिब्बाबंद मक्का का उपयोग किया जाता है। इस रेसिपी में ताज़ा स्वीट कॉर्न के दाने, पानी, काली मिर्च, कॉर्नफ्लोर, हरा प्याज, अजवाइन, तेल और नमक शामिल हैं', 'الذرة هو الذرة الحلوة. هناك العديد من الطرق المختلفة لتحضير حساء الذرة. تتضمن بعض الوصفات الذرة الطازجة بينما يستخدم البعض الآخر الذرة المعلبة. تشمل هذه الوصفة حبات الذرة الحلوة الطازجة والماء والفلفل ودقيق الذرة والبصل الأخضر والكرفس والزيت والملح', 1),
(3, 5, 0, 0, 0, 'crispyfriedveg.jpg', '', '', '', '', 0, 0, 'veg', ' ക്രിസ്പി വറുത്ത പച്ചക്കറി', 'Crispy Fried Veg', 'कुरकुरी तली हुई सब्जी', 'خضار مقلي مقرمش', 'കോൺഫ്ലോർ, ശുദ്ധീകരിച്ച മൈദ, ഇഞ്ചി-വെളുത്തുള്ളി പേസ്റ്റ്, എംഎസ്ജി, നാരങ്ങ നീര്, ഉപ്പ്, കുരുമുളക് പൊടി എന്നിവ ഒരു പാത്രത്തിൽ ആവശ്യത്തിന് വെള്ളം ചേർത്ത് കട്ടിയുള്ള ബാറ്റർ ഉണ്ടാക്കുക. പച്ചക്കറികൾ ചേർത്ത് ഇളക്കുക, അങ്ങനെ എല്ലാ പച്ചക്കറികളും നന്നായി പൊതിയുക', 'Mix cornflour, refined flour, ginger-garlic paste, MSG, lemon juice, salt and black pepper powder in a bowl with enough water to make a thick batter. Add the vegetables and mix so that all the vegetables are well coated', 'एक कटोरे में कॉर्नफ्लोर, मैदा, अदरक-लहसुन का पेस्ट, एमएसजी, नींबू का रस, नमक और काली मिर्च पाउडर को पर्याप्त पानी के साथ मिलाकर गाढ़ा घोल बना लें। सब्जियाँ डालें और मिलाएँ ताकि सभी सब्जियाँ अच्छी तरह से कवर हो जाएँ', ' المكرر ومعجون الزنجبيل والثوم والغلوتامات أحادية الصوديوم وعصير الليمون والملح ومسحوق الفلفل الأسود في وعاء مع كمية كافية من الماء لصنع عجينة سميكة. أضيفي الخضار واخلطي حتى تتغطى جميع الخضار جيدًا', 1),
(10, 5, 0, 0, 0, 'honeyglazedchicken.jpg', '', '', '', '', 0, 0, 'non-veg', 'തേൻ ഗ്ലേസ്ഡ് ചിക്കൻ', 'Honey Glazed Chicken', ' शहद चमकीला चिकन', 'دجاج بالعسل', 'കോഴിയിറച്ചിയുടെ രുചിയും ഘടനയും രൂപവും വർദ്ധിപ്പിക്കാൻ ഉദ്ദേശിച്ചുള്ള ഒരു പാചക സാങ്കേതികതയാണ് ഗ്ലേസിംഗ് ചിക്കൻ. നിങ്ങൾ ഒരു പ്രത്യേക അത്താഴം നടത്തുകയാണോ അതോ നിങ്ങളുടെ ആഴ്‌ച രാത്രിയിലെ ഭക്ഷണത്തിന് രുചി കൂട്ടാൻ നോക്കുകയാണോ', 'Glazing chicken is a culinary technique intended to enhance the flavor, texture and appearance of chicken. Whether you\'re hosting a special dinner or simply looking to add a burst of flavor to your weeknight meal', 'ग्लेज़िंग चिकन एक पाक तकनीक है जिसका उद्देश्य चिकन के स्वाद, बनावट और उपस्थिति को बढ़ाना है। चाहे आप एक विशेष रात्रिभोज की मेजबानी कर रहे हों या बस अपने सप्ताहांत के भोजन में स्वाद का तड़का लगाना चाह रहे हों', ' طهي يهدف إلى تعزيز نكهة الدجاج وملمسه ومظهره. سواء كنت تستضيف عشاءً خاصًا أو تتطلع ببساطة إلى إضافة لمسة من النكهة إلى وجبتك خلال عطلة نهاية الأسبوع', 1),
(9, 5, 0, 0, 0, 'chickenlollipop.jpg', '', '', '', '', 1, 0, 'non-veg', 'ചിക്കൻ ലോലിപോപ്പ്', 'Chicken Lollipop', 'चिकन लॉलीपॉप', 'مصاصة الدجاج', 'ചിക്കൻ ലോലിപോപ്പ് ഒരു ജനപ്രിയ ഇൻഡോ-ചൈനീസ് വിശപ്പാണ്, അവിടെ ഫ്രെഞ്ച് ചെയ്ത ചിക്കൻ ഡ്രൂമെറ്റ് മാരിനേറ്റ് ചെയ്ത ശേഷം ബാറ്റർ വറുത്തതോ മൊരിഞ്ഞതു വരെ ചുട്ടതോ ആണ്.', 'Chicken lollipop is a popular Indo-Chinese appetizer where a frenched chicken drumette is marinated and then batter fried or baked until crisp', 'चिकन लॉलीपॉप एक लोकप्रिय इंडो-चाइनीज ऐपेटाइज़र है जहां फ्रेंच चिकन ड्रमेट को मैरीनेट किया जाता है और फिर बैटर को कुरकुरा होने तक तला या बेक किया जाता है।', 'مصاصة الدجاج هي مقبلات هندية صينية شهيرة حيث يتم تتبيل طبلة الدجاج الفرنسية ثم قليها أو خبزها حتى تصبح ', 1),
(11, 4, 0, 0, 0, 'idliset.jpg', '', '', '', '', 0, 0, 'veg', ' ഇഡ്ഡലി', 'Idli', 'इडली', 'إدلي', 'പുളിപ്പിച്ച തൊണ്ട് നീക്കം ചെയ്ത കറുത്ത പയർ, അരി എന്നിവയിൽ നിന്നാണ് ഇഡ്‌ലി ഉണ്ടാക്കുന്നത്', 'Idli is made from a batter of fermented de-husked black lentils and rice', 'इडली किण्वित भूसी रहित काली दाल और चावल के घोल से बनाई जाती है', 'العدس الأسود المخمر والأرز', 1),
(12, 4, 0, 0, 0, 'appam_with_egg.jpg', '', '', '', '', 0, 0, 'non-veg', 'മുട്ട റോസ്റ്റിനൊപ്പം അപ്പം', 'Appam With Egg Roast', 'अप्पम विथ एग रोस्ट', 'أبام مع البيض المشوي', 'ഘട്ടം ഘട്ടമായുള്ള ചിത്രങ്ങളുള്ള മുട്ട റോസ്റ്റ് പാചകക്കുറിപ്പ്. ഉള്ളി, വെളിച്ചെണ്ണ, മസാലകൾ എന്നിവ ഉപയോഗിച്ച് ഉണ്ടാക്കുന്ന നാടൻ മുട്ട റോസ്റ്റ് പാചകക്കുറിപ്പ്, അപ്പം, പരോട്ട, ഇടിയപ്പം എന്നിവയ്‌ക്കൊപ്പം അതിശയകരമായ രുചി.', 'Egg Roast Recipe with Step by Step Pictures. Nadan Mutta Roast recipe made with onions, coconut oil and spices taste amazing with appam, parotta, idiyappam', 'अंडा रोस्ट रेसिपी चरण दर चरण चित्रों के साथ। प्याज, नारियल तेल और मसालों से बनी नादान मुट्टा रोस्ट रेसिपी का स्वाद अप्पम, परोटा, इडियप्पम के साथ लाजवाब होता है', 'الصور خطوة بخطوة. وصفة نادان موتا المشوي المصنوعة من البصل وزيت جوز الهند والبهارات ذات المذاق الرائع مع الأبام والباروتا والإيديابام', 1),
(13, 4, 0, 0, 0, 'masala_dosa.jpg', '', '', '', '', 0, 0, 'veg', 'മസാല ദോശ ', 'Masala Dosa', 'मसाला डोसा', 'مشكلة الخطيئة', 'റെസ്റ്റോറൻ്റുകളിലും ടിഫിൻ സെൻ്ററുകളിലും വിളമ്പുന്ന ഏറ്റവും പ്രശസ്തമായ ദക്ഷിണേന്ത്യൻ പ്രാതൽ വിഭവങ്ങളിൽ ഒന്നാണ് മസാല ദോശ. പുളിപ്പിച്ച അരിയും പയറുമാവും ഉപയോഗിച്ച് ഉണ്ടാക്കുന്ന ഒരു ക്രേപ്പാണ് ദോശ. മസാല ദോശ, ചടുലവും, സുഗന്ധവും, സ്വാദും ഉള്ളതും അതിൽ ഒരു ഉരുളക്കിഴങ്ങ് മസാല അല്ലെങ്കിൽ മസാലകൾ ചേർത്ത ഉരുളക്കിഴങ്ങുകൾ നിറച്ചതുമാണ്', 'Masala Dosa is one of the most popular South Indian breakfast dishes served in restaurants and tiffin centres. Dosa is a crepe made using fermented rice and lentil batter. Masala Dosa is one that is crisp, aromatic, flavourful and has a potato masala or spiced seasoned potatoes stuffed in it', 'मसाला डोसा रेस्तरां और टिफिन सेंटरों में परोसा जाने वाला सबसे लोकप्रिय दक्षिण भारतीय नाश्ता व्यंजनों में से एक है। डोसा एक क्रेप है जो किण्वित चावल और दाल के घोल का उपयोग करके बनाया जाता है। मसाला डोसा वह है जो कुरकुरा, सुगंधित, स्वादिष्ट होता है और इसमें आलू मसाला या मसालेदार आलू भरा होता है।', 'ماسالا دوسا هي واحدة من أطباق الإفطار الأكثر شعبية في جنوب الهند والتي يتم تقديمها في المطاعم ومراكز تناول الطعام. دوسة عبارة عن كريب مصنوع باستخدام الأرز المخمر وخليط العدس. ماسالا دوسا هي هشة وعطرية ولذيذة وتحتوي على ماسالا البطاطس أو البطاطس المتبلة المحشوة ', 1),
(14, 2, 0, 0, 0, 'aadukurumulak.jpg', '', '', '', '', 0, 0, 'non-veg', 'അടു കുറുമുളക്', 'Adu Kurumulak ', 'अदु कुरुमुलक', 'أدو كرمولك', 'ആടു കുറുമുളക് സൂപ്പ്, തണുത്ത കാലാവസ്ഥയ്‌ക്കോ നിങ്ങൾക്ക് ബൂസ്റ്റ് ആവശ്യമുള്ളപ്പോഴോ അനുയോജ്യമായ സ്വാദിൻ്റെയും സുഖദായകമായ ഊഷ്മളതയുടെയും ആഴത്തിന് പേരുകേട്ട ആശ്വാസദായകവും എരിവുള്ളതുമായ ദക്ഷിണേന്ത്യൻ സൂപ്പാണ്. കേരളത്തിൽ ഉത്ഭവിച്ച, സൂപ്പിൻ്റെ പേര് \"ആട് കുരുമുളക് സൂപ്പ്\" എന്ന് വിവർത്തനം ചെയ്യുന്നു, കാരണം ഇത് പരമ്പരാഗതമായി ഇളം ആട്ടിൻ മാംസം (ആട്ടിറച്ചി), \"കുറുമുളക്\" എന്നിവ ഉപയോഗിച്ച് ഉണ്ടാക്കുന്നു', 'Adu Kurumulak Soup is a comforting, spicy South Indian soup known for its depth of flavor and soothing warmth, ideal for cool weather or whenever you\'re in need of a boost. Originating in Kerala, the soup\'s name translates to \"goat pepper soup,\" as it’s traditionally made with tender goat meat (mutton) and \"kurumulak,\" meaning black pepper', 'अडू कुरुमुलक सूप एक आरामदायक, मसालेदार दक्षिण भारतीय सूप है जो अपने स्वाद की गहराई और सुखदायक गर्मी के लिए जाना जाता है, जो ठंडे मौसम के लिए आदर्श है या जब भी आपको बढ़ावा देने की आवश्यकता हो। केरल में उत्पन्न, सूप का नाम \"बकरी काली मिर्च सूप\" है, क्योंकि यह पारंपरिक रूप से बकरी के कोमल मांस (मटन) और \"कुरुमुलक\" के साथ बनाया जाता है, जिसका अर्थ है काली मिर्च', 'حساء مريح وحار من جنوب الهند معروف بعمق نكهته ودفئه المهدئ، وهو مثالي للطقس البارد أو عندما تحتاج إلى دفعة. نشأ هذا الحساء في ولاية كيرالا، ويترجم اسمه إلى \"حساء فلفل الماعز\"، لأنه يُصنع تقليديًا من لحم الماعز الطري (لحم الضأن) و\"كورومولاك\" وتعني الفلفل الأسود.', 1),
(15, 6, 5, 0, 0, 'imresizer-1733764785070.jpg', 'imresizer-17337647850701.jpg', 'imresizer-17337647850702.jpg', 'imresizer-17337647850703.jpg', 'imresizer-17337647850704.jpg', 0, 0, 'non-veg', 'മീൻ കറി ഭക്ഷണം', 'Fish Curry Meals', 'मछली करी भोजन', 'وجبات السمك بالكاري', 'മാംസം, ടോഫു അല്ലെങ്കിൽ പച്ചക്കറികൾ എന്നിവയ്‌ക്കൊപ്പം ഉപയോഗിക്കുന്ന ഒരു ഇന്ത്യൻ ഗ്രേവി അല്ലെങ്കിൽ സോസ് ആണ് മീൻ കറി. ഇത് വിളമ്പുന്നത് അരി, ഏറ്റവും പ്രശസ്തമായ ബസ്മതി അരി, കൂടാതെ പലതരം സുഗന്ധവ്യഞ്ജനങ്ങൾ അടങ്ങിയിരിക്കുന്നു', ' fish curry is an Indian gravy or sauce that is used in tandem with meat, tofu, or vegetables. It\'s served rice, most popularly Basmati rice, and contains many different kinds of spices', 'करी एक भारतीय ग्रेवी या सॉस है जिसका उपयोग मांस, टोफू या सब्जियों के साथ किया जाता है। इसमें चावल परोसा जाता है, सबसे लोकप्रिय बासमती चावल, और इसमें कई अलग-अलग प्रकार के मसाले होते हैं', 'هندية تستخدم جنبًا إلى جنب مع اللحوم أو التوفو أو الخضار. يقدم الأرز، وأشهرها الأرز البسمتي، ويحتوي على العديد من أنواع البهارات المختلفة', 0),
(16, 6, 4, 0, 0, 'imresizer-1733764565086.jpg', 'imresizer-17337645650861.jpg', 'imresizer-17337645650862.jpg', 'imresizer-17337645650863.jpg', 'imresizer-17337645650864.jpg', 0, 0, 'non-veg', 'ചിക്കൻ ദം ബിരിയാണി', ' Naruneyi Chicken Dum Biriyani', 'चिकन दम बिरयानी', 'برياني دوم دجاج', 'ദം ബിരിയാണി സാവധാനത്തിൽ പാകം ചെയ്ത, പാളികളുള്ള അരി വിഭവമാണ്, സാധാരണ ബിരിയാണി ഒരു കാച്ചി ബിരിയാണി അല്ലെങ്കിൽ പക്കി ബിരിയാണിയാണ്. സാധാരണ ബിരിയാണിയിൽ മാംസവും ചോറും യോജിപ്പിക്കുന്നതിന് മുമ്പ് വെവ്വേറെ പാകം ചെയ്യും. രുചിയുടെ കാര്യത്തിൽ, ദം ബിരിയാണി മന്ദഗതിയിലുള്ള പാചക പ്രക്രിയ കാരണം കൂടുതൽ സ്വാദുള്ളതും സുഗന്ധമുള്ളതുമായി കണക്കാക്കപ്പെടുന്നു.', 'Dum biryani is a slow cooked, layered rice dish and normal biryani is a kacchi biryani or pakki biryani. In normal biryani, the meat and rice are cooked separately before being combined. In terms of taste, dum biryani is often considered more flavorful and aromatic due to the slow cooking process', 'दम बिरयानी धीमी गति से पकाया जाने वाला, परतदार चावल का व्यंजन है और सामान्य बिरयानी कच्ची बिरयानी या पक्की बिरयानी है। सामान्य बिरयानी में, मांस और चावल को मिलाने से पहले अलग-अलग पकाया जाता है। स्वाद के मामले में, धीमी खाना पकाने की प्रक्रिया के कारण दम बिरयानी को अक्सर अधिक स्वादिष्ट और सुगंधित माना जाता है', 'متعدد الطبقات مطبوخ ببطء والبرياني العادي هو برياني كاتشي أو برياني باكي. في البرياني العادي، يتم طهي اللحم والأرز بشكل منفصل قبل دمجهما. من حيث المذاق، غالبًا ما يُعتبر برياني الدوم أكثر نكهة وعطرية بسبب عملية الطهي البطيئة', 0),
(17, 6, 0, 0, 0, 'chattychor.jpg', '', '', '', '', 0, 0, 'non-veg', 'ചട്ടി ചോർ', 'Chatty Chor', ' चट्टी चोर', 'تشتي تشور', 'പലതരം സൈഡ് വിഭവങ്ങൾ, കറികൾ, ചട്ണികൾ എന്നിവയ്‌ക്കൊപ്പം ഒരു മൺപാത്രത്തിൽ വിളമ്പുന്ന വേവിച്ച ചോറിൻ്റെ ഒരു പരമ്പരാഗത കേരള വിഭവമാണ് ചട്ടി ചോറു.', 'Chatti Choru is a traditional Kerala dish of boiled rice served in a clay pot, along with a variety of side dishes, curries, and chutneys', 'चट्टी चोरू उबले हुए चावल का एक पारंपरिक केरल व्यंजन है जिसे मिट्टी के बर्तन में विभिन्न प्रकार के साइड डिश, करी और चटनी के साथ परोसा जाता है।', ' من ولاية كيرالا يتكون من الأرز المسلوق ويقدم في وعاء من الفخار، إلى جانب مجموعة متنوعة من الأطباق الجانبية والكاري والصلصات', 1),
(18, 20, 0, 0, 0, 'avacadojuice.jpg', 'imresizer-1733749895103.jpg', 'imresizer-17337498951031.jpg', 'imresizer-17337498951032.jpg', 'imresizer-17337498951033.jpg', 0, 1, 'veg', 'അവക്കാഡോ', 'Avacado', 'एवोकाडो', ' أفوكادو', 'അവക്കാഡോ', 'Avacado', 'एवोकाडो', ' أفوكادو', 0),
(19, 20, 0, 0, 0, 'limejuices.jpg', 'imresizer-1733566499866.jpg', 'imresizer-17335664998661.jpg', 'imresizer-17335664998662.jpg', 'imresizer-17335664998663.jpg', 0, 1, 'veg', 'ചെറുനാരങ്ങ ജ്യൂസ്', 'Fresh Lime', 'नींबू का जूस', 'عصير الليمون', 'ചെറുനാരങ്ങ ജ്യൂസ്', 'Fresh Lime', 'नींबू का जूस', 'عصير الليمون', 0),
(22, 4, 0, 0, 0, 'idiyappam_veg_curry.jpg', '', '', '', '', 0, 0, 'veg', 'ഇടിയപ്പം കൂടെ പച്ചക്കറി കുരുമ', 'Idiyappam With Veg Kurma', 'इडियप्पम के साथ सब्ज़ी क़ोरमा', 'إدييابام مع كُرما الخضروات', 'ഇടിയപ്പം കൂടെ പച്ചക്കറി കുരുമ', 'idiyappam with veg kurma', 'इडियप्पम के साथ सब्ज़ी क़ोरमा', 'إدييابام مع كُرما الخضروات', 1),
(28, 4, 0, 0, 0, 'poratta.jpg', 'crispyfriedveg1.jpg', 'images_(4).jpg', 'poratta4.png', 'soup1.jpg', 0, 0, 'veg', 'പൊറോട്ടയും പച്ചക്കറി കറിയും', 'Poratta With Veg Curry', 'परोटा और सब्जी की करी', 'بروتا مع كاري الخضار', 'പൊറോട്ടയും പച്ചക്കറി കറിയും', 'poratta with veg curry', 'परोटा और सब्जी की करी', 'بروتا مع كاري الخضار', 1),
(29, 4, 0, 0, 0, 'ghee_roast_main.jpg', '', '', '', '', 0, 0, 'veg', 'നെയ്യ് റോസ്റ്റ്', 'Ghee Roast', 'घी रोस्ट', 'جي روست', 'സ്വാദിഷ്ടമായ നെയ്യിൽ വഴറ്റിയുള്ള തിളങ്ങുന്ന വിഭവം, മണവും രുചിയും നിറഞ്ഞത്', 'A deliciously golden roast cooked with rich, aromatic ghee for a melt-in-the-mouth experience', ' सुगंधित घी में पकाया गया सुनहरा और स्वादिष्ट व्यंजन।', 'جي روست', 1),
(38, 7, 0, 0, 0, 'imresizer-17321818040602.png', 'imresizer-17321812415301.jpg', 'imresizer-17321812415305.jpg', 'imresizer-17321812415303.jpg', 'imresizer-17321812415304.jpg', 0, 0, 'veg', 'test', 'Papaya Juice', 'test', 'test', 'test', ' Papaya juice prepared with this recipe is a heavenly experience for palate and provides healthy dose of nutrients and minerals like calcium, chlorine, iron, phosphorus, potassium, etc. Papaya juice prepared with this recipe is a heavenly experience for palate and provides healthy dose of nutrients and minerals like calcium, chlorine, iron, phosphorus, potassium, etc.', 'test', 'test', 1),
(39, 4, 4, 0, 0, 'imresizer-1733307262735.jpg', 'imresizer-17333072627351.jpg', 'imresizer-17333072627352.jpg', 'imresizer-17333072627353.jpg', 'imresizer-17333072627354.jpg', 0, 0, 'non-veg', 'ചിക്കൻ പുട്ട്', 'Chicken Puttu', ' चिकन पुट्टू', ' بوتو بالدجاج', 'കേരളത്തിന്റെ പരമ്പരാഗത പുട്ട് വിഭവത്തിൽ ചിക്കൻ മസാല ചേർത്തു നിർമിച്ചൊരു രുചികരമായ പുതിയ അനുഭവം. അരിപൊടിയും മോടിപിടിപ്പിച്ച ചിക്കനും ചേർത്ത് പുകവാസനയോടെ പാചകം ചെയ്തത്', 'A unique twist on the traditional Kerala puttu, made with layers of steamed rice flour and spicy chicken masala. This flavorful dish combines the softness of puttu with the rich, aromatic taste of chicken curry, making it a delightful fusion of textures and flavors', ' पारंपरिक केरल पुट्टू में चिकन मसाला मिलाकर बनाया गया एक स्वादिष्ट और अनोखा व्यंजन। चावल के आटे और मसालेदार चिकन के परतों के साथ भाप में पकाया गया।', 'طبق بوتو التقليدي من ولاية كيرالا، ممزوج بمزيج من الدجاج المتبل بشكل لذيذ. يُطهى على البخار مع طبقات من دقيق الأرز والدجاج المتبل للحصول على نكهة فريدة ومميزة', 0),
(40, 6, 4, 0, 0, 'imresizer-1733308518416.jpg', 'imresizer-17333085184161.jpg', 'imresizer-17333085184162.jpg', 'imresizer-17333085184163.jpg', 'imresizer-17333085184164.jpg', 0, 0, 'non-veg', 'ചിക്കൻ കബാബ് ', 'Chicken Kabab', ' चिकन कबाब', 'كباب الدجاج', ' സുഗന്ധമുള്ള മസാലകളിൽ മാരിനേറ്റ് ചെയ്ത, മൃദുവായ ചിക്കൻ കഷണങ്ങൾ വറുത്തോ ഗ്രിൽ ചെയ്തോ തയ്യാറാക്കുന്നത്. ഇത് ഒരു കേരളീയ മെല്ലിഞ്ഞ വിഭവമാണ്, മിന്റ് ചട്ണിയോ ഇഷ്ടമുള്ള ഡിപ്പുകളോ കൂടി വിളമ്പാം', 'Succulent and juicy chicken pieces marinated with aromatic spices and grilled or fried to perfection. This flavorful dish is a classic appetizer, served with mint chutney or your favorite dip.', 'सुगंधित मसालों में मरीनेट किए गए चिकन के रसीले और कोमल टुकड़े, जो ग्रिल या तले हुए होते हैं। यह स्वादिष्ट व्यंजन एक क्लासिक ऐपेटाइज़र है जिसे पुदीना चटनी या अपनी पसंद के डिप के साथ परोसा जाता है।', 'قطع دجاج طرية وعصرية متبلة بالتوابل العطرية ومشوية أو مقلية حتى الكمال. هذا الطبق اللذيذ يُعتبر مقبلات كلاسيكية، يُقدم مع صلصة النعناع أو الغموس المفضل لديك.\r\n\r\n', 0),
(41, 8, 4, 0, 0, 'chicken_mandhi.jpg', 'chicken_mandhi5.jpg', 'chicken_mandhi6.jpg', 'chicken_mandhi7.jpg', 'chicken_mandhi8.jpg', 1, 0, 'non-veg', ' ചിക്കൻ മന്ദി', 'Chicken Mandhi', ' चिकन मंधी', ' مندي الدجاج', ' മൃദുവായ ചിക്കനും സുഗന്ധമുള്ള ചോറും ചേർത്ത യമനി ഉത്ഭവമുള്ള ഒരു പരമ്പരാഗത വിഭവം. ചിക്കൻ മന്ദി അൽപതാപത്തിൽ ചേരുവകൾ ഉറ്റു വേവിച്ചതിനാൽ അതിന്റെ സമ്പന്നമായ രുചിയും സുഗന്ധവുമാണ് പ്രത്യേകത.\r\n\r\n', 'A traditional yemeni mandi, consisting of juicy tender chicken steamed to perfection, added in with aromated basmati rice and a special blend of magical spices that take your breath away. A delicious plate full of a meal that is best shared with your friends and family, but also makes for a kingly solo meal.', 'चिकन मंधी एक पारंपरिक यमनी व्यंजन है, जिसमें सुगंधित चावल और नरम, धीमी आंच पर पका हुआ चिकन शामिल है। यह अपने समृद्ध स्वाद और अनोखे मसालों के लिए प्रसिद्ध है।', 'مندي الدجاج هو طبق تقليدي يمني يتكون من الأرز المتبل والدجاج الطري المطهو ببطء. يتميز بنكهاته العطرية وطريقة طهيه الفريدة على نار هادئة.\r\n\r\n', 0),
(42, 8, 9, 0, 0, 'button_mandhi.jpg', 'button_mandhi1.jpg', 'button_mandhi2.jpg', 'button_mandhi3.jpg', 'button_mandhi4.jpg', 1, 0, 'non-veg', 'മട്ടൺ മന്ദി ', 'Mutton Mandhi', ' मटन मंधी', 'مندي اللحم', 'മാടിന്റെ മൃദുവായ മാംസവും സുഗന്ധമുള്ള ചോറും ചേർന്ന് തയ്യാറാക്കുന്ന യമനി ഉത്ഭവമുള്ള ഒരു പാരമ്പര്യ വിഭവം. അൽപതാപത്തിൽ വേവിച്ച് മസാലകളുടെ സമ്പുഷ്ടമായ രുചിയും സുഗന്ധവുമുള്ള ഈ വിഭവം അവിസ്മരണീയമായ രുചിയാണ് നൽകുന്നത്', 'Prepared by using tender lamb that is further roasted to enhance its taste. Served with moist and delicate rice that compliments the tender cut of lamb very well. A meal you can\'t miss out on. No mayannoise will be served', ' मटन मंधी एक पारंपरिक यमनी व्यंजन है जिसमें नर्म और धीमी आंच पर पका हुआ मटन और सुगंधित चावल का मेल होता है। यह पकवान अपने अनोखे मसालों और समृद्ध स्वाद के लिए खास है।\r\n\r\n', ' مندي اللحم هو طبق يمني تقليدي يتكون من لحم الضأن الطري المطبوخ ببطء والأرز المتبل. يتميز بنكهات غنية وطريقة تحضيره الفريدة على نار هادئة.\r\n\r\n', 0),
(43, 8, 5, 0, 0, 'fish_mandhi.jpg', 'fish_mandhi1.jpg', 'fish_mandhi2.jpg', 'fish_mandhi3.jpg', 'fish_mandhi4.jpg', 0, 0, 'non-veg', 'ഖനാത്', 'Khan\'ath', 'ख़न\'अथ', 'خناث', ' ഒരു പാരമ്പര്യ പേര്/വിഭാവമായ ഖനാത്, അതിന്റെ ദൃഢതയും ആത്മീയതയുമായ സംയോജനത്തിൽ നിന്നുള്ള ഒരു അനുഭവമാണ്. ഇത് കാലാതീതമായ ഒരു സമ്പദ് സമാഹാരം പ്രതിനിധാനം ചെയ്യുന്നു', 'A fresh king fish fried to perfection with spices and herbs. A handy helping of sticky and flavored rice served alongside to complete whopper delicious sea food detour', ' ख़न\'अथ एक पारंपरिक नाम/वस्तु है जो इसके गहरे अर्थ और ऐतिहासिक महत्व को दर्शाता है। यह समृद्ध सांस्कृतिक धरोहर का प्रतीक है।', 'خناث: خناث تعبر عن إرث تقليدي مليء بالدلالات العميقة والمعاني الروحية. إنه رمز للتاريخ والتراث الثقافي الغني.', 0),
(44, 9, 9, 0, 0, 'mutton_madafoon.jpg', 'mutton_madafoon1.jpg', 'mutton_madafoon2.jpg', 'mutton_madafoon3.jpg', 'mutton_madafoon4.jpg', 1, 0, 'non-veg', ' മട്ടൺ മദ്‌ഫൂൺ', 'Mutton Madfoon', ' मटन मदफून', 'المدفون باللحم', 'മസ്‌തമായ മസാലകളാൽ മൃദുവായ മട്ടൺ മാംസവും സുഗന്ധമുള്ള ചോറും ചേർന്ന്, മണ്ണിടിച്ചിട്ടതുപോലുള്ള പാചക രീതിയിൽ പാകം ചെയ്ത ഒരു പരമ്പരാഗത അറബി വിഭവമാണ്. തനതായ രുചിയും സുഗന്ധവുമാണ് ഈ വിഭവത്തിന്റെ പ്രത്യേകത', 'Tender mutton wrapped up in foil and steamed to perfection, served with the winning combination of potatoes and pepper. Complete with a serving of flavour-filled rice', 'मटन मदफून एक पारंपरिक अरबी व्यंजन है, जिसमें मसालेदार मटन और सुगंधित चावल को धीमी आंच पर खास पद्धति में पकाया जाता है। इसका अनोखा स्वाद और खुशबू इसे विशेष बनाते हैं।', 'المدفون باللحم هو طبق عربي تقليدي يتميز بتتبيل لحم الضأن الطري والأرز العطري، ويُطهى بطريقة مدفونة على نار هادئة، مما يمنحه نكهة غنية وشهية.', 0),
(45, 9, 4, 0, 0, 'imresizer-1733721911412.jpg', 'imresizer-17337219114121.jpg', 'imresizer-17337219114122.jpg', 'imresizer-17337219114123.jpg', 'imresizer-17337219114124.jpg', 1, 0, 'non-veg', ' ചിക്കൻ മദ്‌ഫൂൺ', 'Chicken madfoon', ' चिकन मदफून', 'المدفون بالدجاج', 'ചിക്കൻ മദ്‌ഫൂൺ ഒരു പരമ്പരാഗത അറബി വിഭവമാണ്, മൃദുവായ ചിക്കനും സുഗന്ധമുള്ള ചോറും ചേർത്ത് മണ്ണിടിച്ചിട്ടതുപോലുള്ള പാചക രീതിയിൽ പാകം ചെയ്യുന്നത്. സമ്പുഷ്ടമായ മസാലകളും തനതായ രുചിയും ഇതിന്റെ പ്രത്യേകതയാണ്', 'Foil wrapped chicken, steamed and slow cooked to tender perfection, topped off with pepper, while a winning combination of potatoes and flavored rice is added to the mixed. A truly delicious meeting of exquisite tastes to light up your taste buds.', 'चिकन मदफून एक पारंपरिक अरबी व्यंजन है जिसमें नरम चिकन और सुगंधित चावल को धीमी आंच पर खास तरीके से पकाया जाता है। इसमें मसालों का गहरा स्वाद होता है, जो इसे खास बनाता है।', ' المدفون بالدجاج هو طبق عربي تقليدي يتميز بتتبيل الدجاج الطري والأرز المتبل وطهيه ببطء باستخدام طريقة مدفونة، مما يمنحه نكهة غنية ولذيذ', 0),
(46, 10, 9, 0, 0, 'imresizer-1733547567340.jpg', 'imresizer-17335475673401.jpg', 'imresizer-17335475673402.jpg', 'imresizer-17335475673403.jpg', 'imresizer-17335475673404.jpg', 1, 0, 'non-veg', ' മട്ടൺ മസ്ബി', 'Mutton Mazbi', 'मटन मझबी', ' مذبى اللحم ', 'മട്ടൺ മസ്ബി ഒരു പരമ്പരാഗത അറബി വിഭവമാണ്, മൃദുവായ മട്ടൺ മാംസത്തെ സുഗന്ധമുള്ള മസാലകളിൽ മാരിനേറ്റ് ചെയ്ത്, തീയിൽ കുലുക്കി അല്ലെങ്കിൽ ഗ്രിൽ ചെയ്ത് പാകം ചെയ്യുന്നു. സമ്പുഷ്ടമായ രുചിയും പുകവാസനയും ഉള്ള ഒരു രുചികരമായ വിഭവം', 'Mutton Mazbi is a traditional Arabic dish where tender mutton is marinated with a blend of aromatic spices and cooked over an open flame or grilled to perfection. The result is a juicy, flavorful dish with a smoky aroma, often served with rice or flatbread', ' मटन मझबी एक पारंपरिक अरबी व्यंजन है जिसमें मटन को खुशबूदार मसालों में मरीनेट कर धीमी आंच पर जलाया या ग्रिल किया जाता है। यह व्यंजन अपनी smoky खुशबू और स्वाद के लिए प्रसिद्ध है, और इसे चावल या रोटी के साथ परोसा जाता है।', ' مذبى اللحم ', 0),
(47, 11, 4, 0, 0, 'imresizer-1733722150017.jpg', 'imresizer-17337221500171.jpg', 'imresizer-17337221500172.jpg', 'imresizer-17337221500173.jpg', 'imresizer-17337221500174.jpg', 0, 0, 'non-veg', ' മുഗൽഗൽ ചിക്കൻ', 'Mugalgal Chicken', 'मुघलगल चिकन', 'دجاج مغلغل', 'മുഗൽഗൽ ചിക്കൻ ഒരു സമ്പന്നവും രുചികരവുമായ Mughlai പാചകവിഭവമാണ്. മൃദുവായ ചിക്കൻ, തയാറാക്കാൻ ഉപയോഗിക്കുന്ന പാൽ, ദ്രാവകം, മസാലകൾ, മട്ടൺ, കശുക്കായ് തുടങ്ങിയ വേരിയേഷൻസുകൾ ചേർന്ന് പാകം ചെയ്യപ്പെടുന്നു. ഈ വിഭവം സാധാരണയായി നാൻ അല്ലെങ്കിൽ ചോറിനൊപ്പം സർവുചെയ്യപ്പെടുന്നു', 'A traditional spice coated chicken with an essence of Arabia. The soft inside and crisp coating defines it\'s perfection', ' मुघलगल चिकन एक समृद्ध और स्वादिष्ट मुग़लई व्यंजन है। इस व्यंजन में मुलायम चिकन को दही, मसालों और मेवे के साथ पकाया जाता है। यह व्यंजन प्याज़, किशमिश और धनिया से सजाया जाता है और नान या चावल के साथ परोसा जाता है।', 'دجاج مغلغل هو طبق غني ولذيذ مستوحى من المطبخ المغولي. يتم طهي الدجاج الطري في صلصة كريمية وعطرية تحتوي على الزبادي والتوابل المطحونة والمكسرات. غالبًا ما يتم تزيينه بالبصل المقلي والزبيب والكزبرة، ويُقدّم مع الخبز أو الأرز.\r\n\r\n', 0),
(48, 12, 0, 0, 0, 'imresizer-1733722339182.jpg', 'imresizer-17337223391821.jpg', 'imresizer-17337223391822.jpg', 'imresizer-17337223391823.jpg', 'imresizer-17337223391824.jpg', 0, 0, 'non-veg', ' പ്രൗൺസ് മഷ്വി', 'Prawns Mashwi', ' प्रॉन्स माश्वी', 'روبيان مشوي', ' പ്രൗൺസ് മഷ്വി ഒരു അറബി ഗ്രിൽ ചെയ്ത വിഭവമാണ്, പുഷ്പമാർന്ന മസാലകൾ, സസ്യങ്ങൾ, ഒലിവ് എണ്ണ എന്നിവ ചേർത്ത് പ്രൗൺസ് മാരിനേറ്റ് ചെയ്ത്, ഗ്രിൽ ചെയ്തു പാകം ചെയ്യുന്നത്. പുകവാസനയോടെ, മൃദുവായ, രുചികരമായ ഈ സമുദ്രവസ്തു ചോറോ റോട്ടിയോ അനുയോജ്യമാണ്', 'Prawns Mashwi is a delicious Arabic grilled dish where prawns are marinated in a blend of spices, herbs, and olive oil, then grilled to perfection. The result is a smoky, tender, and flavorful seafood dish that pairs wonderfully with rice or flatbread.', 'प्रॉन्स माश्वी एक स्वादिष्ट अरबी व्यंजन है, जिसमें झींगे को मसालों, जड़ी-बूटियों और जैतून के तेल में मरीनेट करके ग्रिल किया जाता है। यह व्यंजन एक धुएंदार, नर्म और स्वादिष्ट समुद्री भोजन है, जिसे चावल या रोटी के साथ परोसा जाता है।', 'الروبيان المشوي هو طبق عربي شهي حيث يتم تتبيل الروبيان بمجموعة من التوابل والأعشاب وزيت الزيتون، ثم يُشوى حتى يصبح طريًا ولذيذًا. يتميز هذا الطبق بنكهته المدخنة ويمكن تناوله مع الأرز أو الخبز.\r\n\r\n', 0),
(49, 12, 0, 0, 0, 'prawns_saloona.jpg', 'prawns_saloona1.jpg', 'prawns_saloona2.jpg', 'prawns_saloona3.jpg', 'prawns_saloona4.jpg', 0, 0, 'non-veg', ' പ്രൗൺസ് സലൂന', 'Prawns Saloona', ' प्रॉन्स सालूना', 'روبيان سالونا ', ': പ്രൗൺസ് സലൂന ഒരു സമൃദ്ധമായ, സുഗന്ധവനിതമായ കറി വിഭവമാണ്. മുളക്, മഞ്ഞൾ, സതവാര, ഇഞ്ചി എന്നിവ ചേർന്ന് പ്രൗൺസ് തൈര്, ചിരട്ടകഥിരി എന്നിവയിൽ പാകം ചെയ്ത് തയ്യാറാക്കുന്നു. ചോറോ റോട്ടിയുമായി സർവുചെയ്യാം.\r\n\r\n', 'A classic Arabian stew with prawns as the dominant ingredient. This versatile saloona combines generously seasoned broth with sauteed veggies and prawns.', 'प्रॉन्स सालूना एक स्वादिष्ट और खुशबूदार करी है, जिसमें झींगे को मसालेदार टमाटर की ग्रेवी में पकाया जाता है। यह व्यंजन अपनी विशेष स्वाद और मसालों के लिए जाना जाता है और चावल या रोटी के साथ परोसा जाता है।', 'روبيان سالونا هو طبق كاري لذيذ وعطري يتم طهي الروبيان في صلصة غنية ومعتمدة على الطماطم مع مزيج من الأعشاب والتوابل. يتميز هذا الطبق بطعمه الفريد وغالبًا ما يُقدّم مع الأرز أو الخبز.\r\n\r\n', 0),
(50, 13, 4, 0, 0, 'jojo_kabab_(2).jpg', 'jojo_kabab_(2)1.jpg', 'jojo_kabab_(2)2.jpg', 'jojo_kabab_(2)3.jpg', 'jojo_kabab_(2)4.jpg', 0, 0, 'non-veg', ' ജോജോ കെബാബ്', 'Jojo Kebab', ' जोजो कबाब', 'كباب جوجو', 'ജോജോ കെബാബ് തനതു രുചിയുള്ള കെബാബ് വകഭേദമാണ്, സാധാരണയായി കോഴി അല്ലെങ്കിൽ മട്ടൺ മാംസത്തിൽ മസാലകളും സസ്യങ്ങളും ചേർത്ത് പകറ്റുന്നു. ഈ മിശ്രിതം സ്ക്യൂവറിൽ എടുക്കുകയും, ഗ്രിൽ ചെയ്ത് ദൃഢവും മൃദുവായ ഒരു വിഭവമായി ഒരുക്കുന്നു. ഇത് സാധാരണയായി ചോറോ റോട്ടിയുമായി ഉപയോഗിക്കുന്നു', 'A yummilicious plate of chicken marinated in a blend of zesty spices and fresh ingredients which could take you on a journey of delight.', 'जोजो कबाब पारंपरिक कबाब का एक स्वादिष्ट रूप है, जिसमें कटी हुई मांस (आमतौर पर चिकन या मटन) को मसालों और जड़ी-बूटियों के साथ मिलाकर स्क्यूअर पर पकाया जाता है। यह कबाब ग्रिल करके सुनहरा और मुलायम बनाया जाता है, और इसे चावल, नान या सलाद के साथ परोसा जाता है।\r\n\r\n', ' كباب جوجو هو نوع لذيذ من الكباب التقليدي، يتم تحضيره من اللحم المفروم (عادة الدجاج أو لحم الضأن) مع مزيج من التوابل والأعشاب. يتم تشكيل الخليط على أسياخ ثم يُشوى حتى يصبح ذهبي اللون وطريًا. يُقدّم عادة مع الأرز أو الخبز أو السلطة الطازجة.', 0),
(63, 15, 0, 0, 0, 'imresizer-1733725715115.jpg', 'imresizer-17337257151151.jpg', 'imresizer-17337257151152.jpg', 'imresizer-17337257151153.jpg', 'imresizer-17337257151154.jpg', 1, 0, 'non-veg', ' ചിക്കൻ വരട്ടിയത്', 'Chicken Varattiyathu', 'चिकन वरटियथु', 'دجاج فاراتياتو', 'ചിക്കൻ വരട്ടിയത് കേരളത്തിന്റെ സവിശേഷമായ ഒരു വരട്ടിച്ച വിഭവമാണ്, ഇത് സമൃദ്ധമായ രുചിയും സുഗന്ധമുള്ള മസാലകളുമായി പ്രസിദ്ധമാണ്. ചിക്കന്റെ കഷണങ്ങൾ നല്ലതുപോലെ വേവിച്ചു, ഉള്ളി, തക്കാളി, ഇഞ്ചി, വെളുത്തുള്ളി എന്നിവയും കരിവേപ്പില, മുളകുപൊടി, മഞ്ഞൾപൊടി എന്നിവ ചേർത്തുമാണ് ഈ വിഭവം തയ്യാറാക്കുന്നത്. ഇതിന്റെ ദൃഢമായ ടെക്സ്ചർ പാറോട്ട, ചപ്പാത്തി, അല്ലെങ്കിൽ അരി എന്നിവയുമായി കഴിക്കാൻ അനുയോജ്യമാണ്', '| Serve 1 | Medium spicy | A mouthwatering dish prepared with chicken fried to golden brown and stir fried with assorted vegetables and spicy sauces with gravy', ' चिकन वरटियथु केरल का एक पारंपरिक सूखा चिकन व्यंजन है, जो अपनी समृद्ध मसालों और गहरी स्वादिष्टता के लिए जाना जाता है। चिकन के टुकड़ों को धीमी आंच पर प्याज, टमाटर, अदरक, लहसुन और मसालों जैसे काली मिर्च, दालचीनी, और लौंग के साथ पकाया जाता है, जिससे इसका स्वाद गहरा और अनोखा बनता है। इसका गाढ़ा, अर्ध-सूखा टेक्सचर इसे पराठा, चपाती या चावल के साथ खाने के लिए परफेक्ट बनाता है। यह डिश अपने प्रामाणिक दक्षिण भारतीय स्वाद के लिए बेहद लोकप्रिय है।', 'دجاج فاراتياتو هو طبق كيرالي تقليدي يتميز بنكهات غنية وتوابل عطرية. تُطهى قطع الدجاج الطرية على نار هادئة مع البصل المحمص والطماطم والزنجبيل والثوم ومزيج من التوابل مثل الفلفل الأسود والقرفة والقرنفل لإعداد طبق ذو نكهة عميقة. يتميز بقوامه السميك وشبه الجاف، مما يجعله مثاليًا لتقديمه مع الباراتا أو الشباتي أو الأرز. يُعتبر هذا الطبق مفضلاً بفضل طعمه الجريء ولمسته الهندية الجنوبية الأصيلة.\r\n\r\n', 0),
(51, 13, 4, 0, 0, 'imresizer-1733723110113.jpg', 'imresizer-17337231101131.jpg', 'imresizer-17337231101132.jpg', 'imresizer-17337231101133.jpg', 'imresizer-17337231101134.jpg', 0, 0, 'non-veg', 'ഷിഷ് താവൂക്ക്', 'Shish Tawook', 'शिश तावूक', 'شيش طاووق', 'ഷിഷ് താവൂക്ക് ഒരു പ്രമാണമായ മിഡിൽ ഈസ്റ്റർൻ വിഭവമാണ്, പച്ചമുളക്, വെളുത്തുള്ളി, നാരങ്ങാനീർ, യൂഗർട്ട് എന്നിവ ചേർന്ന് മസാലകളിൽ മാരിനേറ്റ് ചെയ്ത ചിക്കൻ ക്യൂബുകൾ ഉപയോഗിച്ച് തയ്യാറാക്കുന്നു. ഈ ചിക്കൻ സ്ക്യൂവറിൽ എടുക്കുകയും, ഗ്രിൽ ചെയ്ത് മൃദുവായ, രുചികരമായ ചിക്കൻ പീസുകൾ ആയി ഉണ്ടാക്കുന്നു. ഇത് സാധാരണയായി ചോറോ പിതാ ബ്രെഡ് അല്ലെങ്കിൽ ഒരു പുതുതായി തയ്യാറാക്കിയ സാലഡോടു കൂടി സമർപ്പിക്കുന്നു.', 'The very popular skewered chicken in the Middle East. The flavour is all about its marinade. The marination of earthy spices , yoghurt, lemon juice and garlic makes up the perfection.', ': शिश तावूक एक लोकप्रिय मध्य-पूर्वी व्यंजन है, जिसमें चिकन के टुकड़ों को मसालों, लहसुन, नींबू और दही में मरीनेट किया जाता है। फिर इस चिकन को स्क्यूअर पर लगाकर ग्रिल किया जाता है, जिससे यह नर्म और रसदार बन जाता है, और एक smoky स्वाद प्राप्त होता है। इसे चावल, पिटा ब्रेड या ताजे सलाद के साथ परोसा जाता है।', 'شيش طاووق هو طبق مشهور في المطبخ الشرق أوسطي يتم تحضير قطع الدجاج المقطعة والمتبلة بمزيج من التوابل والثوم والليمون والزبادي. يتم وضع الدجاج على أسياخ ويشوى حتى يصبح طريًا ولذيذًا، مع نكهة مدخنة. يُقدّم عادة مع الأرز أو خبز البيتا أو سلطة طازجة.\r\n\r\n', 0),
(52, 13, 0, 0, 0, 'kabab_platter.jpg', 'kabab_platter1.jpg', 'kabab_platter2.jpg', 'kabab_platter3.jpg', 'kabab_platter4.jpg', 0, 0, 'non-veg', ' കെബാബ് പ്ലാറ്റർ', 'Kebab Platter', 'कबाब प्लेटर', ' طبق كباب', 'കെബാബ് പ്ലാറ്റർ പലവിധ കെബാബുകൾ ഉൾപ്പെട്ട ഒരു രുചികരമായ വിഭവമാണ്. ഇതിൽ സാധാരണയായി കോഴി, മട്ടൺ അല്ലെങ്കിൽ ബീഫ് എടുക്കുകയും, ഗ്രിൽ ചെയ്യുകയും ചെയ്യുന്നു. ഈ പ്ലാറ്ററിൽ സാധാരണയായി പിതാ ബ്രെഡ്, ചോരം, പുതിയ സാലഡ് എന്നിവയും ചേർക്കപ്പെടുന്നു. വിവിധ രുചികൾ ചേർന്നുള്ള ഒരു പൂർണ്ണമായ ഭക്ഷണമായാണ് ഇത് അനുയോജ്യമായത്.', 'Pieces of kebab seasoned and grilled to refined perfection. The smokiness and juiciness incorporated gifts a filling food experience', ' कबाब प्लेटर विभिन्न प्रकार के कबाबों का एक स्वादिष्ट संग्रह होता है, जिसमें आमतौर पर चिकन, मटन, या गोमांस के मांस को मसालों में मेरिनेट करके ग्रिल किया जाता है। इस प्लेटर में नान, चावल, और ताजे सलाद के साथ परोसा जाता है। यह एक समृद्ध और स्वादिष्ट भोजन है, जो साझा करने या विभिन्न कबाबों का आनंद लेने के लिए आदर्श है।', 'طبق الكباب هو مجموعة لذيذة من أنواع مختلفة من الكباب، والتي تشمل عادة اللحوم المشوية مثل الدجاج، لحم الضأن أو اللحم البقري. يتم تقديم هذا الطبق عادة مع خبز البيتا، الأرز، أو الخضروات الطازجة. إنه وجبة غنية ولذيذة، مثالية للمشاركة أو للاستمتاع بتنوع النكهات.', 0),
(53, 14, 0, 0, 0, 'imresizer-1733723511962.jpg', 'imresizer-17337235119621.jpg', 'imresizer-17337235119622.jpg', 'imresizer-17337235119623.jpg', 'imresizer-17337235119624.jpg', 0, 0, 'veg', 'അറബി സാലഡ്', 'Arabic Salad', ' अरबी सलाद', 'سلطة عربية ', 'അറബി സാലഡ് വിവിധ പച്ചക്കറികൾ (തക്കാളി, വളർത്തുകന്നി, ഉള്ളി, പാക്കച്ചീനി) ചെറുതായി ചതച്ചാണ് തയ്യാറാക്കുന്നത്. ഇത് ഓലിവ് എണ്ണ, നാരങ്ങാനീർ, ഉപ്പു എന്നിവ ചേർത്ത് ഡ്രസ്സിംഗ് ആയി ചെയ്യുന്നു. ഈ സാലഡ് പകൃതി രുചിയിലും സമ്പുഷ്ടമായ ഭക്ഷണമായും അറിയപ്പെടുന്നു. ഇത് സാധാരണയായി ഗ്രിൽ ചെയ്ത മാംസം, ചോറ്, അല്ലെങ്കിൽ റോട്ടിയുമായി സൈഡ് ഡിഷ് ആയി ഉപയോഗിക്കുന്നു', ' Arabic Salad is a fresh, light dish made with finely chopped vegetables like tomatoes, cucumbers, onions, and parsley. It\'s typically dressed with olive oil, lemon juice, and a pinch of salt. This salad is known for its refreshing taste and is often served as a side dish with grilled meats, rice, or flatbreads.', ' अरबी सलाद एक ताजगी से भरपूर, हल्का व्यंजन है, जिसमें टमाटर, खीरा, प्याज और हरे धनिये जैसी सब्जियों को बारीक काट कर डाला जाता है। इसे आमतौर पर जैतून का तेल, नींबू का रस और थोड़ा सा नमक से सजाया जाता है। यह सलाद अपने ताजे स्वाद के लिए जाना जाता है और ग्रिल किए गए मांस, चावल, या रोटियों के साथ साइड डिश के रूप में परोसा जाता है।', 'ة العربية هي طبق طازج وخفيف يتكون من خضروات مفرومة بشكل دقيق مثل الطماطم، الخيار، البصل، والبقدونس. عادةً ما يتم تتبيله بزيت الزيتون، عصير الليمون، ورشة من الملح. تشتهر هذه السلطة بطعمها المنعش وتُقدّم غالبًا كطبق جانبي مع اللحوم المشوية أو الأرز أو الخبز', 0),
(54, 14, 0, 0, 0, 'imresizer-1733723725496.jpg', 'imresizer-17337237254961.jpg', 'imresizer-17337237254962.jpg', 'imresizer-17337237254963.jpg', 'imresizer-17337237254964.jpg', 0, 0, 'veg', ' ഫത്തൂഷ് സാലഡ്', 'Fattoush Salad', 'फत्तूश सलाद', ' فتوش', ' ഫത്തൂഷ് സാലഡ് മിഡിൽ ഈസ്റ്റർണിലെ പ്രചാരമുള്ള ഒരു സാലഡാണ്, തക്കാളി, വളർത്തുകന്നി, വെച്ചിലക്ക, സാലട്ട് എന്നിവ പോലുള്ള പച്ചക്കറികളെയും, കറുപ്പായ അല്ലെങ്കിൽ തംഗിയുള്ള പിതാ ബ്രെഡ് കഷണങ്ങളെയും ചേർത്ത് തയ്യാറാക്കുന്നു. ഓലിവ് എണ്ണ, നാരങ്ങാനീർ, പുതിനയും മസാലയും ചേർത്ത് ഇതിന്റെ താർക്കിഷ്, ചോറും പുതിയ രുചിയുമായി ഉപയോഗിക്കുന്നു. ഗ്രിൽ ചെയ്ത മാംസം അല്ലെങ്കിൽ ഫലാഫലുമായി ഇത് ഒരു സാധാരണ സൈഡ് ഡിഷ് ആയി ഉപയോഗിക്കുന്നു.\r\n\r\n', 'Essentially a bread salad with in-season vegetables and herbs, dressed in a zesty lime vinaigrette. The very fresh, out of the oven pita bread makes this simply awesome.', 'फत्तूश सलाद एक पारंपरिक मध्य-पूर्वी व्यंजन है, जिसमें ताजे सब्जियों जैसे टमाटर, खीरा, मूली, और सलाद पत्तियां डाली जाती हैं, साथ ही तली हुई या भुनी हुई पिटा ब्रेड के कुरकुरे टुकड़े भी होते हैं। इस सलाद को जैतून का तेल, नींबू का रस, अनार के सिरके, और मसालेदार जड़ी-बूटियों से सजाया जाता है, जिससे इसे एक तीव्र और ताजगी से भरपूर स्वाद मिलता है। यह व्यंजन सामान्यत: ग्रिल किए गए मांस या फलाफेल के साथ परोसा जाता है।', ' فتوش هو طبق سلطة تقليدي من المطبخ الشرق أوسطي يتكون من مجموعة من الخضروات الطازجة مثل الطماطم والخيار والفجل والخس، بالإضافة إلى قطع الخبز العربي المحمص أو المقلي المقرمشة. يتم تتبيله بزيت الزيتون وعصير الليمون ودبس الرمان ومزيج من الأعشاب والتوابل، مما يعطيه طعمًا لاذعًا ومنعشًا. عادةً ما يتم تقديمه كطبق جانبي مع اللحوم المشوية أو الفلافل.\r\n\r\n', 0),
(55, 20, 0, 0, 0, 'imresizer-1733552512083.jpg', 'imresizer-17335525120831.jpg', 'imresizer-17335525120832.jpg', 'imresizer-17335525120833.jpg', 'imresizer-17335525120834.jpg', 0, 1, 'veg', ' മിന്‍റ് ലൈം', 'Mint Lime', ' पुदीना नींबू ', 'نعناع ليمون ', 'മിന്‍റ് ലൈം ഒരു താസ്സും പുതുമുള്ള ദ്രാവകമാണ്, പുതിയ മിൻറ് ഇലകൾ, നാരങ്ങാനീർ, ഒരു ചെറിയ മധുരം എന്നിവ ചേർത്ത് തയ്യാറാക്കുന്നു. മിൻറ് ഇലകൾ തണുത്തും സുഗന്ധവുമുള്ള രുചി നൽകുന്നു, അതേ സമയം നാരങ്ങാനീർ ഇതിന് കഷ്ണമായയും വൃദ്ധനായി ചൂടോടെ രുചിയുണ്ട്. ഇത് എത്രയാണെങ്കിൽ തണുപ്പിക്കാൻ, ഐസുമായി ചേർത്ത് കുടിക്കാൻ ഒരു മികച്ച തിരഞ്ഞെടുപ്പാണ്.', 'A refreshing and healthy drink with freshly squeezed juice of mint and lemon. The delicate and tender texture of mint with its flavour adding purposes makes the dish.', 'पुदीना नींबू एक ताजगी से भरपूर और खट्टा-मीठा पेय है, जो ताजे पुदीने के पत्तों, नींबू के रस, और थोड़े से मीठे तत्वों से तैयार किया जाता है। पुदीना पत्तियां इसे ठंडा और खुशबूदार स्वाद देती हैं, जबकि नींबू का रस इसे तीव्र और खट्टा बनाता है। यह गर्मियों में ताजगी देने वाला पेय है और बर्फ के साथ ठंडा परोसा जाता है।', 'نعناع ليمون هو مشروب منعش وحامض يتكون من أوراق النعناع الطازجة وعصير الليمون ولمسة من التحلية. تضيف أوراق النعناع نكهة باردة وعطرية، بينما يمنح عصير الليمون طعماً حامضاً ولاذعاً. إنه المشروب المثالي للتغلب على حرارة الصيف، وعادةً ما يُقدّم بارداً مع مكعبات الثلج ليكون منعشاً ومرويّاً.\r\n\r\n', 0),
(56, 4, 0, 0, 0, 'imresizer-1733724002253.jpg', 'imresizer-17337240022531.jpg', 'imresizer-17337240022532.jpg', 'imresizer-17337240022533.jpg', 'imresizer-17337240022534.jpg', 0, 0, 'veg', 'അപ്പം', 'Appam', 'ऐपम', ' أبام', 'അപ്പം ഒരു പരമ്പരാഗത ദക്ഷിണേന്ത്യൻ വിഭവമാണ്, ഊരിപ്പെട്ട അരിമില്ലായിരുന്ന ബാറ്ററിൽ നിന്നുള്ളതാണ്. ഇത് മൃദുവായ കൊമ്പുകളും, ചുറ്റും തിയ്ക്കും കറുപ്പും ഉള്ള ഒരു ഇഡ്ലി പോലുള്ള പാൻക്കേക്ക് ആണ്. സാധാരണയായി വെജിറ്റബിൾ സ്റ്റൂ, ചിക്കൻ കറി, അല്ലെങ്കിൽ തേങ്ങാനീർ എന്നിവയുമായി ചേർത്ത് കഴിക്കുന്നു. കേരളത്തിലെ പ്രത്യേക രുചിയുള്ള ഒരു പ്രിയപ്പെട്ട ഭക്ഷണമാണ് അപ്പം.', ' Appam is a traditional South Indian dish made from fermented rice batter. It is a type of pancake with soft, fluffy edges and a thin, crispy center. Often served with curries such as vegetable stew, chicken curry, or coconut milk, Appam is a popular breakfast or dinner dish. Its unique texture and taste make it a beloved part of Kerala’s cuisine', 'ऐपम एक पारंपरिक दक्षिण भारतीय व्यंजन है, जो खमीर लगे चावल के घोल से बनाया जाता है। यह एक प्रकार का पैनकेक होता है, जिसके किनारे मुलायम और फूलदार होते हैं और बीच में क्रिस्पी होता है। ऐपम को आमतौर पर वेजिटेबल स्टू, चिकन करी या नारियल के दूध के साथ परोसा जाता है। यह केरल के लोकप्रिय नाश्ते या रात के खाने का हिस्सा है।', ' أبام هو طبق تقليدي من جنوب الهند مصنوع من عجينة الأرز المخمرة. إنه نوع من الفطائر ذات الحواف الطرية والهشة من الأطراف والوسط المقرمش. غالباً ما يُقدّم أبام مع الكاري مثل خضار ستو، دجاج كاري، أو حليب جوز الهند. يُعد أبام جزءاً محبوباً من المأكولات الهندية في ولاية كيرالا ويُتناول كوجبة إفطار أو عشاء.\r\n\r\n', 0),
(57, 4, 0, 0, 0, 'imresizer-1733724133869.jpg', 'imresizer-17337241338691.jpg', 'imresizer-17337241338692.jpg', 'imresizer-17337241338693.jpg', 'imresizer-17337241338694.jpg', 0, 0, 'veg', ' പത്തിരി', 'Pathiri', 'पठिरी', ' باثيري ', 'പത്തിരി കേരളത്തിലെ തീരപ്രദേശങ്ങളിൽ പ്രചാരമുള്ള ഒരു അരിചോറ് ആധാരിതമായ ചട്ടം ആക്കിയ കറി കറി ആഹാരം ആണ്. എങ്കിൽ ഈ പത്തിരി നല്ലതായി മല്ലിപ്പുറത്ത് നനച്ച് തയ്യാറാക്കുന്ന ചുരുണ്ട ചതുപ്പിന്റെ രൂപത്തിൽ വഴിയിൽ ഉണ്ടാക്കുന്നു. സാധാരണയായി പത്തിരി മട്ടൺ, കോഴി അല്ലെങ്കിൽ മത്സ്യക്കറിയുമായി ചേർത്തു സന്നദ്ധങ്ങളിൽ കഴിക്കാറാണ്', 'Pathiri is a traditional rice-based flatbread from the coastal regions of Kerala. Made from finely ground rice flour and water, the dough is rolled into thin circles and cooked on a hot griddle or pan until soft and slightly puffed. Pathiri is typically served with curries like chicken, mutton, or fish, and is a popular dish in Muslim households, especially during festive occasions and special meals.', ' पठिरी केरल के तटीय क्षेत्रों का एक पारंपरिक चावल से बना फ्लैटब्रेड है। यह बारीक पिसे हुए चावल के आटे और पानी से बनाया जाता है। आटे को पतले गोल आकार में बेलकर गर्म तवे पर पकाया जाता है, जिससे यह नरम और थोड़ा फूला हुआ बनता है। पठिरी को आमतौर पर मटन, चिकन या मछली के करी के साथ परोसा जाता है, और यह मुस्लिम घरों में विशेष रूप से त्योहारों और खास अवसरों पर लोकप्रिय होता है।', 'باثيري هو خبز مسطح تقليدي يعتمد على الأرز من مناطق السواحل في كيرالا. يُصنع من دقيق الأرز المطحون جيدًا والماء، ثم يُعجن العجين ويتم تشكيله إلى دوائر رقيقة ويُطهى على صينية ساخنة أو مقلاة حتى يصبح طريًا وقليلًا منتفخًا. يُقدّم باثيري عادة مع الكاري مثل الدجاج أو اللحم أو السمك، وهو طبق شائع في المنازل المسلمة، خاصةً في المناسبات والوجبات الخاصة.\r\n\r\n', 0),
(58, 4, 0, 0, 0, 'imresizer-1733724279233.jpg', 'imresizer-17337242792331.jpg', 'imresizer-17337242792332.jpg', 'imresizer-17337242792333.jpg', 'imresizer-17337242792334.jpg', 0, 0, 'veg', 'ഗോതമ്പ്  പറോട്ട', 'Wheat Poratta', ' गेहूं पोरट्टा', 'خبز القمح بوراتا', 'ഗോതമ്പ് പോരട്ട ഒരു പരമ്പരാഗത പരട്ടയുടെ ഒരു പ്രചോദനമാണ്, ഇത് മുഴുവൻ ഗോതമ്പ് മാവ് ഉപയോഗിച്ച് തയ്യാറാക്കുന്നു. സാധാരണ പരട്ടകളിൽ നിന്നെ വ്യത്യസ്തമായാണ്, പോരട്ട വളരെ തിതുക്കായി ചതച്ച് പറ്റിയിട്ട് ചൂടായ പാനിൽ വെച്ച് ഗോതമ്പിന്റെ പൊരിയുന്ന, മൃദുവായ തോത്തുണ്ണുന്ന സ്വാദിഷ്ടമായ ഭക്ഷണമാണ്. ഇത് സാധാരണയായി കറി, സ്റ്റൂ, അല്ലെങ്കിൽ ദായീ എന്നിവയുമായി ഉപയോഗിക്കുന്നു. ഗോതമ്പ് പോരട്ട കേരളത്തിലെ പ്രത്യേകമായ പ്രിയപ്പെട്ട ഭക്ഷണമാണ്.', ' Wheat Poratta is a variation of the traditional paratha, made with whole wheat flour. Unlike regular parathas, porattas are rolled out into thin layers and then stacked and folded before being cooked. This gives the poratta a flaky and soft texture. It is usually served with curries, stews, or even yogurt. Wheat Poratta is a popular choice for breakfast, lunch, or dinner, especially in Kerala and South Indian cuisine', ' गेहूं पोरट्टा पारंपरिक पराठे का एक प्रकार है, जो साबुत गेहूं के आटे से बनाया जाता है। सामान्य पराठों से अलग, पोरट्टा को पतली परतों में बेलकर, फिर उन परतों को मोड़कर और फिर तवे पर पकाया जाता है, जिससे यह कुरकुरा और नरम होता है। इसे आमतौर पर करी, स्टू या दही के साथ परोसा जाता है। गेहूं पोरट्टा खासकर केरल और दक्षिण भारतीय व्यंजनों में लोकप्रिय है।', 'خبز القمح بوراتا هو نوع من الخبز المسطح المصنوع من دقيق القمح الكامل. يختلف عن الخبز المسطح التقليدي حيث يتم فرده إلى طبقات رقيقة ثم يتم طي هذه الطبقات وطبخها على صاج ساخن، مما يجعل البوراتا هشة وطريّة. يُقدّم عادة مع الكاري أو اليخنة أو الزبادي. خبز القمح بوراتا هو خيار شائع للإفطار أو الغداء أو العشاء في المأكولات الهندية الجنوبية، خاصة في كيرالا.', 0),
(59, 4, 0, 0, 0, 'imresizer-1733766782118.jpg', 'imresizer-17337667821181.jpg', 'imresizer-17337667821182.jpg', 'imresizer-17337667821183.jpg', 'imresizer-17337667821184.jpg', 0, 0, 'non-veg', 'പൊറാട്ട', 'Poratta', 'परोटा', 'الباراتا', 'പൊറാട്ട ഒരു പരമ്പരാഗത മധുരമുളള, ചുരണ്ടൽ തൊട്ടുകളിയുള്ള Indian റൊട്ടിയാണ്, മൃദുവായ മാവിൽ നിന്നാണ് ഇത് തയ്യാറാക്കുന്നത്. പൊറാട്ടയുടെ മൃദുവായ അടിസ്ഥാനം, അല്പം മുറുകിയ പുറത്തുള്ള ലെയറുകളും മികച്ച അന്നഭംഗി നൽകുന്നു. മസാലാ കറികൾക്കും സമൃദ്ധമായ ഗ്രേവികൾക്കും ഏറ്റവും അനുയോജ്യമായ സൈഡ് വിഭവമാണ് പൊറാട്ട.', 'Poratta is a flaky, layered flatbread made from finely kneaded dough and cooked to golden perfection. Soft on the inside and slightly crisp on the outside, it is a popular accompaniment to a variety of curries, especially spicy and rich gravies. Known for its buttery flavor and melt-in-your-mouth texture, Poratta is a beloved dish in South Indian cuisine.\r\n\r\n', ' परोटा एक परतदार और कुरकुरी भारतीय रोटी है, जिसे मुलायम गूंथे हुए आटे से तैयार किया जाता है और सुनहरा भूरा होने तक पकाया जाता है। अंदर से नरम और बाहर से हल्की खस्ता, परोटा विभिन्न प्रकार की मसालेदार और गाढ़ी ग्रेवी के साथ परोसा जाता है। इसका मक्खन जैसा स्वाद और परतदार बनावट इसे दक्षिण भारतीय व्यंजनों में ', 'يخنة الدجاج هي طبق لذيذ ودافئ يتم تحضيره عنالباراتا هو خبز هندي مسطح ومُكوّن من طبقات رقيقة، يتم تحضيره بعجن العجين جيدًا وطهيه حتى يصبح ذهبيًا ومقرمشًا قليلاً من الخارج وناعمًا من الداخل. يُعتبر طبقًا مثاليًا لتقديمه مع أنواع الكاري المتنوعة، وخاصة الصلصات الغنية والحارة. يتميز الباراتا بنكهته الغنية وقوامه الذي يذوب في الفم، مما يجعله من الأطباق الشهيرة في المطبخ الجنوب هندي.\r\n\r\n', 0),
(60, 4, 4, 0, 0, 'imresizer-1733724487373.jpg', 'imresizer-17337244873731.jpg', 'imresizer-17337244873732.jpg', 'imresizer-17337244873733.jpg', 'imresizer-17337244873734.jpg', 1, 0, 'non-veg', ' ചിക്കൻ  മലബാർ', 'Chicken Malabari', 'चिकन मलाबारी ', 'دجاج ملاباري', 'ചിക്കൻ  മലബാർ കേരളത്തിലെ മലപ്പുറം പ്രദേശത്തെ ഒരു സമ്പന്നമായ വിഭവമാണ്. മൃദുവായ ചിക്കൻ കഷണങ്ങൾ ദാരിച്ചൈ, ലവംഗം, ഏലക്കായ പോലുള്ള സുഗന്ധമുള്ള മസാലകൾ ചേർത്ത് തയ്യാറാക്കിയ സമൃദ്ധമായ കറിയിൽ പാകംചെയ്യപ്പെടുന്നു. ഈ വിഭവം ഇഷ്ടപ്പെട്ട മിതമായ മുളകുളമാർന്ന രുചിയിലും തേങ്ങാനീർ അല്ലെങ്കിൽ പച്ചക്കറി ചേർന്നുള്ള മൃദുവായ ഗന്ധത്തോടെ പ്രസിദ്ധമാണ്. സാധാരണയായി പാറട്ട, അപ്പം അല്ലെങ്കിൽ അരി എന്നിവയോടു ചേർത്താണ്', ' Chicken Malabari is a traditional and aromatic dish from the Malabar region of Kerala. Tender pieces of chicken are cooked in a rich, flavorful gravy made with a blend of aromatic spices, including cinnamon, cloves, and cardamom. The dish is known for its mild spiciness and creamy texture, often enriched with coconut milk or yogurt. It is typically served with paratha, appam, or rice, making it a popular choice for lunch or dinner.', 'चिकन मलाबारी केरल के मलाबार क्षेत्र का एक पारंपरिक और खुशबूदार व्यंजन है। इसमें चिकन के नरम टुकड़ों को मसालों का मिश्रण जैसे दारचीनी, लौंग और इलायची के साथ पकाया जाता है। इस व्यंजन को हल्की मसालेदार और क्रीमी बनावट के लिए नारियल के दूध या दही के साथ तैयार किया जाता है। चिकन मलाबारी को आमतौर पर पराठे, ऐपम या चावल के साथ परोसा जाता है, जो इसे लंच या डिनर के लिए एक लोकप्रिय विकल्प बनाता है।', ' دجاج ملاباري هو طبق تقليدي وعطري من منطقة مالابار في كيرالا. يتم طهي قطع الدجاج الطرية في مرق غني ونكهته مميزة، مع مزيج من التوابل العطرية مثل القرفة والقرنفل والهيل. يشتهر هذا الطبق بنكهته اللذيذة والمتوازنة التي تتسم بالحارة المعتدلة والقوام الكريمي، وغالبًا ما يُضاف إليه حليب جوز الهند أو الزبادي. يُقدّم دجاج ملاباري عادةً مع الباراتا أو الأپام أو الأرز، مما يجعله خيارًا شائعًا للغداء أو العشاء.\r\n\r\n', 0),
(61, 4, 0, 0, 0, 'imresizer-1733767383140.jpg', 'imresizer-17337673831401.jpg', 'imresizer-17337673831402.jpg', 'imresizer-17337673831403.jpg', 'imresizer-17337673831404.jpg', 0, 0, 'veg', 'നാൻ ', 'Naan', ' नान', 'نان', 'നാൻ ഒരു മൃദുവായ, നുരഞ്ഞുപോലെയുള്ള ഇന്ത്യൻ പാചകവ്യഞ്ജനമാണ്, പാരമ്പര്യമായ മൺതുണ്ടൂരിൽ പാചകം ചെയ്യുന്നതാണ്. മാവ്, തൈര്, ഈസ്റ്റ് എന്നിവ ചേർത്ത് തയ്യാറാക്കുന്ന ഈ റൊട്ടി, നേരിയ നെയ്യോ മക്നിയോ കൊണ്ടു മുകളിലൂടെ തേച്ച് കൂടുതൽ രുചിയേകുന്നു. നാൻ കറികൾ, കബാബുകൾ, ഗ്രില്ല് ഡിഷുകൾ എന്നിവയ്ക്കൊപ്പം മികച്ച അനുയോജ്യമാണ്.', 'Naan is a soft and fluffy Indian flatbread traditionally cooked in a clay tandoor oven. Made from a simple dough of flour, yogurt, and yeast, it is brushed with butter or ghee for a rich flavor. Naan pairs perfectly with curries, kebabs, and grilled dishes, making it a staple in Indian cuisine.', ' नान एक नरम और फूली हुई भारतीय रोटी है, जिसे पारंपरिक रूप से मिट्टी के तंदूर में पकाया जाता है। इसे आटा, दही, और यीस्ट से तैयार किया जाता है और मक्खन या घी से ब्रश किया जाता है, जो इसे समृद्ध स्वाद प्रदान करता है। नान को करी, कबाब और ग्रिल्ड व्यंजनों के साथ परोसने के लिए आदर्श माना जाता है।', 'النان هو خبز مسطح هندي ناعم وهش يتم تقليديًا طهيه في فرن تندور طيني. يتم تحضيره من عجينة بسيطة من الطحين والزبادي والخميرة، ويُدهن بالزبدة أو السمن لإضافة نكهة غنية. يتناسب النان بشكل مثالي مع أطباق الكاري والكباب والمشاوي، مما يجعله عنصرًا أساسيًا في المطبخ الهندي.\r\n\r\n', 0),
(62, 20, 0, 0, 0, 'imresizer-1733724928007.jpg', 'imresizer-17337249280071.jpg', 'imresizer-17337249280072.jpg', 'imresizer-17337249280073.jpg', 'imresizer-17337249280074.jpg', 0, 1, 'veg', 'ഹുമസ്', 'Hummus', ' हुमस', ' حمص', 'ഹുമസ് ഒരു മധ്യപൂർവദേശീയ വിഭവമാണ്, ഇത് കടല, തഹിനി (എള്ള് പസ്റ്റ്), വെളുത്തുള്ളി, നാരങ്ങ നീര്, ഒലിവ് ഓയിൽ എന്നിവ ചേർത്ത് തയ്യാറാക്കുന്ന ക്രീമിയോടും രുചിയോടും കൂടിയ ഡിപാണ്. ഇതിന്റെ സമൃദ്ധമായ സ്വാദും സുഖപ്രദമായ ടെക്സ്ചറും ബ്രെഡ്, പിറ്റ, അല്ലെങ്കിൽ പച്ചക്കറികൾക്കൊപ്പം ചേർത്തു കഴിക്കാൻ അനുയോജ്യമാണ്. പ്രോട്ടീനുകളും പോഷകങ്ങളുമായി സമ്പന്നമായ ഹുമസ് ഒരു ആരോഗ്യകരമായ വിഭവവും ലോകമെമ്പാടും ജനപ്രിയവുമാണ്.', 'Hummus is a creamy and flavorful Middle Eastern dip made from blended chickpeas, tahini (sesame seed paste), garlic, lemon juice, and olive oil. Its rich texture and tangy taste make it a perfect accompaniment to bread, pita, or fresh vegetables. Hummus is not only delicious but also packed with protein and nutrients, making it a healthy and popular appetizer or snack worldwide.', 'हुमस एक स्वादिष्ट और क्रीमी मध्य-पूर्वी डिप है, जिसे चने, ताहिनी (तिल का पेस्ट), लहसुन, नींबू का रस और जैतून के तेल से बनाया जाता है। इसका समृद्ध स्वाद और मुलायम बनावट इसे ब्रेड, पिटा, या ताज़ी सब्जियों के साथ परोसने के लिए आदर्श बनाता है। प्रोटीन और पोषक तत्वों से भरपूर, हुमस एक स्वादिष्ट और स्वास्थ्यवर्धक स्नैक या ऐपेटाइज़र है जो दुनियाभर में लोकप्रिय है।', ' الحمص هو طبق غموس كريمي ولذيذ من الشرق الأوسط مصنوع من الحمص المهروس، الطحينة (معجون السمسم)، الثوم، عصير الليمون وزيت الزيتون. يتميز بقوامه الغني ونكهته الحامضة، ويُعتبر مكملاً مثالياً للخبز أو الخضروات الطازجة. الحمص ليس فقط لذيذًا ولكنه غني بالبروتين والعناصر الغذائية، مما يجعله مقبلات صحية وشائعة في جميع أنحاء العالم.', 0),
(64, 15, 4, 0, 0, 'imresizer-1733726072140.jpg', 'imresizer-17337260721401.jpg', 'imresizer-17337260721402.jpg', 'imresizer-17337260721403.jpg', 'imresizer-17337260721404.jpg', 0, 0, 'non-veg', ' ബട്ടർ ചിക്കൻ', 'Butter Chicken', 'बटर चिकन', ' دجاج بالزبدة ', 'ബട്ടർ ചിക്കൻ, മറ്റൊരു പേരിൽ മുര്ഗ് മഖനി, ലോകപ്രശസ്തമായ ഒരു വടക്കേ ഇന്ത്യൻ കറിയാണ്, സമൃദ്ധമായ ക്രീമിയുടേയും മൃദുവായ മസാല രുചിയുടേയും പേരിലാണ് ഇത് അറിയപ്പെടുന്നത്. ചിക്കൻ കഷണങ്ങൾ തൈരും മസാലകളും ഉപയോഗിച്ച് മറിയേറ്റുചെയ്ത് ഗ്രിൽ ചെയ്തോ ഫ്രൈ ചെയ്തോ, അതിനു ശേഷം വെണ്ണയും ക്രീമും ചേർന്ന തക്കാളി സോസിൽ പാകം ചെയ്യുന്നു.', 'Butter Chicken, also known as Murgh Makhani, is a world-famous North Indian curry known for its rich, creamy, and mildly spiced flavor. Tender pieces of chicken are marinated in yogurt and spices, grilled or pan-fried, and then simmered in a velvety tomato-based gravy enriched with butter and cream. This indulgent dish is perfectly paired with naan, roti, or steamed rice, making it a favorite for all occasions.', ': बटर चिकन, जिसे मुर्ग़ मखनी के नाम से भी जाना जाता है, एक विश्वप्रसिद्ध उत्तर भारतीय करी है जो अपनी क्रीमी और हल्के मसालेदार स्वाद के लिए जानी जाती है। चिकन के नरम टुकड़ों को दही और मसालों में मैरीनेट कर ग्रिल या फ्राई किया जाता है, फिर मक्खन और क्रीम से भरपूर टमाटर की ग्रेवी में पकाया जाता है। यह लजीज व्यंजन नान, रोटी या चावल के साथ परोसा जाता है और हर अवसर के लिए पसंदीदा है।', 'دجاج بالزبدة، المعروف أيضًا باسم مرغ مقني، هو طبق كاري هندي شمالي شهير عالميًا يتميز بنكهته الغنية والقشدية والمعتدلة التوابل. يتم تتبيل قطع الدجاج الطرية باللبن الزبادي والتوابل، ثم تُشوى أو تُقلى وتُطهى في صلصة الطماطم المخملية الغنية بالزبدة والكريمة. هذا الطبق الفاخر يتناسب تمامًا مع النان أو الخبز أو الأرز المطهو على البخار، مما يجعله خيارًا مفضلًا لجميع المناسبات.\r\n\r\n', 0);
INSERT INTO `product` (`product_id`, `category_id`, `subcategory_id`, `store_id`, `price`, `image`, `image1`, `image2`, `image3`, `image4`, `is_customizable`, `is_addon`, `product_veg_nonveg`, `product_name_ma`, `product_name_en`, `product_name_hi`, `product_name_ar`, `product_desc_ma`, `product_desc_en`, `product_desc_hi`, `product_desc_ar`, `is_active`) VALUES
(65, 15, 0, 0, 0, 'imresizer-1733726589481.jpg', 'imresizer-17337265894811.jpg', 'imresizer-17337265894812.jpg', 'imresizer-17337265894813.jpg', 'imresizer-17337265894814.jpg', 1, 0, 'non-veg', 'കടായി ചിക്കൻ', 'Kadai Chicken', 'कड़ाही चिकन', ' دجاج كاداي', 'കടായി ചിക്കൻ ഒരു വടക്കേ ഇന്ത്യൻ വിഭവമാണ്, ഇത് ഒരു പ്രത്യേക പാത്രത്തിൽ (കടായി) പാകം ചെയ്യുന്നതാണ്. സോസിൽ മുറിച്ചുള്ള ചിക്കൻ കഷണങ്ങൾ പഴുതാര, തക്കാളി, ഉള്ളി, ക്യാപ്‌സിക്കം എന്നിവയും പുതിയ മസാലകളും ചേർത്ത് ഒരു ദൃഢമായ, കുറുകിയ കറിയായി തയ്യാറാക്കുന്നു. അതിന്റെ തീവ്രമായ സുഗന്ധങ്ങളും രുചിയും ഈ വിഭവത്തെ നാൻ, ചപ്പാത്തി അല്ലെങ്കിൽ അരിയുമായി മികച്ചതാക്കുന്നു.', ' Kadai Chicken is a flavorful North Indian curry cooked in a traditional wok-like pan called a \"kadai.\" Succulent chicken pieces are stir-fried with a mix of freshly ground spices, onions, tomatoes, and bell peppers, creating a rich, semi-dry gravy. Known for its robust and aromatic flavors, this dish is best enjoyed with naan, roti, or steamed rice, making it a favorite in Indian households and restaurants alike.', 'कड़ाही चिकन एक स्वादिष्ट उत्तर भारतीय करी है, जिसे पारंपरिक कड़ाही में पकाया जाता है। चिकन के रसीले टुकड़ों को ताजे पिसे मसालों, प्याज, टमाटर और शिमला मिर्च के साथ भूना जाता है, जिससे यह एक गाढ़ी और अर्ध-सूखी ग्रेवी में बदल जाता है। अपने गहरे और सुगंधित स्वाद के लिए प्रसिद्ध यह व्यंजन नान, रोटी या चावल के साथ बेहतरीन लगता है।', ': دجاج كاداي هو طبق كاري هندي شمالي لذيذ يُطهى في مقلاة تقليدية تُسمى \"كاداي.\" يتم قلي قطع الدجاج الطرية مع مزيج من التوابل الطازجة المطحونة، البصل، الطماطم، والفلفل الرومي، مما ينتج صلصة غنية وشبه جافة. يتميز هذا الطبق بنكهاته العميقة والعطرية، وهو الأفضل تقديمه مع خبز النان أو الروتي أو الأرز المطهو على البخار.\r\n\r\n', 0),
(66, 15, 4, 0, 0, 'imresizer-1733727412921.jpg', 'imresizer-17337274129211.jpg', 'imresizer-17337274129212.jpg', 'imresizer-17337274129213.jpg', 'imresizer-17337274129214.jpg', 1, 0, 'non-veg', 'ചില്ലി ചിക്കൻ', 'Chilli Chicken', ' चिली चिकन ', ' دجاج شيلي ', 'ചില്ലി ചിക്കൻ ഒരു ജനപ്രിയ ഇന്തോ-ചൈനീസ് വിഭവമാണ്, ഇത് നനുത്ത ചിക്കൻ കഷണങ്ങളും തിളച്ച മസാല രുചിയും ഏകോപിപ്പിക്കുന്നതാണ്. മുറിച്ച ചിക്കൻ സ്വാദുപിടിപ്പിക്കുന്ന പോലെ ഫ്രൈ ചെയ്ത ശേഷം സോയ സോസ്, ചില്ലി, വെളുത്തുള്ളി, ക്യാപ്‌സിക്കം എന്നിവ ചേർത്ത് തിളപ്പിച്ച സോസിൽ മിക്സുചെയ്യുന്നു. ഇത് ഒരു സ്റ്റാർട്ടറായോ പ്രധാന വിഭവമായോ ഉപയോഗിക്കാം, ചോറിനോ നൂഡിലിനോ കൂടെ മികച്ചത്.', ' Chilli Chicken is a popular Indo-Chinese dish that combines tender chicken pieces with bold, spicy flavors. Marinated chicken is fried to perfection and tossed in a tangy, savory sauce made with soy sauce, chili, garlic, and bell peppers. This dish is perfect as an appetizer or a main course and pairs wonderfully with fried rice or noodles, making it a favorite for lovers of spicy and flavorful cuisine.', ': चिली चिकन एक लोकप्रिय इंडो-चाइनीज व्यंजन है, जिसमें नरम चिकन के टुकड़ों को तीखे और मसालेदार फ्लेवर के साथ जोड़ा जाता है। मैरीनेट किए गए चिकन को कुरकुरा तला जाता है और सोया सॉस, मिर्च, लहसुन और शिमला मिर्च से बने खट्टे और मसालेदार ग्रेवी में टॉस किया जाता है। यह डिश ऐपेटाइज़र या मुख्य व्यंजन के रूप में परफेक्ट है और फ्राइड राइस या नूडल्स के साथ शानदार लगती है।\r\n\r\n', ' دجاج شيلي هو طبق شهير يجمع بين النكهات الهندية والصينية. تُتبَّل قطع الدجاج الطرية ثم تُقلى حتى تصبح مقرمشة، وتُقلب في صلصة حارة ولذيذة مصنوعة من صلصة الصويا، الفلفل الحار، الثوم، والفلفل الرومي. يُمكن تقديمه كمقبلات أو كطبق رئيسي، وهو يتناسب بشكل رائع مع الأرز المقلي أو النودلز، مما يجعله مفضلًا لعشاق الأطعمة الغنية بالتوابل والنكهات.', 0),
(72, 16, 0, 0, 0, 'imresizer-1733736680874.jpg', 'imresizer-17337366808741.jpg', 'imresizer-17337366808742.jpg', 'imresizer-17337366808743.jpg', 'imresizer-17337366808744.jpg', 0, 0, 'veg', ' പനീർ ബട്ടർ മസാല', 'Paneer Butter Masala', 'पनीर बटर मसाला', 'بانير بتر ماسالا ', 'പനീർ ബട്ടർ മസാല ഒരു പ്രമുഖ ഉത്തരേന്ത്യൻ വിഭവമാണ്, അതിന്റെ സമൃദ്ധമായതും ക്രീമിയായതുമായ സവിശേഷത കൊണ്ട് പ്രശസ്തമാണ്. മൃദുവായ പനീർ കഷണങ്ങൾ, മക്കൻ, ക്രീം, സുഗന്ധമുള്ള മസാലകൾ എന്നിവ ചേർന്ന സമ്പന്നമായ തക്കാളി ചാറിൽ പാചകം ചെയ്യുന്നു. ഇത് ചെറുതായി മധുരമുള്ളതും മിതമായ മസാലകൾ കൊണ്ടും നാൻ, ചപ്പാത്തി, അല്ലെങ്കിൽ അരിയോടൊപ്പം കഴിക്കാൻ അനുയോജ്യമാണ്.', ' Paneer Butter Masala is a classic North Indian dish, loved for its rich and creamy texture. Soft cubes of paneer are simmered in a luxurious tomato-based gravy made with butter, cream, and aromatic spices. The sweet and mildly spiced curry pairs perfectly with naan, roti, or steamed rice, making it a favorite among vegetarians and lovers of Indian cuisine.\r\n\r\n', ' पनीर बटर मसाला एक लोकप्रिय उत्तर भारतीय व्यंजन है, जो अपने समृद्ध और क्रीमी बनावट के लिए प्रसिद्ध है। मुलायम पनीर के टुकड़ों को मक्खन, क्रीम और सुगंधित मसालों से बनी टमाटर-आधारित ग्रेवी में पकाया जाता है। यह हल्का मीठा और माइल्ड मसालेदार करी नान, रोटी, या उबले चावल के साथ पूरी तरह मेल खाता है, और यह शाकाहारियों और भारतीय व्यंजनों के प्रेमियों की पसंदीदा डिश है।', 'بانير بتر ماسالا هو طبق كلاسيكي من شمال الهند يشتهر بقوامه الغني والكريمي. يتم طهي مكعبات البانير الطرية في صلصة غنية مصنوعة من الطماطم والزبدة والقشطة والتوابل العطرية. تتميز هذه الكاري بمذاقها الحلو قليلاً وتوابلها المعتدلة، مما يجعلها مثالية للتقديم مع خبز النان أو الروتي أو الأرز المطهو على البخار، وهي محبوبة بين عشاق المأكولات النباتية والهندية.\r\n\r\n', 0),
(100, 4, 10, 0, 0, 'download.png', 'mjf8uFTgAKWrMb5Ncropped-image.jpg', '7KlDv9X30yAMZ2Oqcropped-image.jpg', 'BNcOoz0M7LIWD9xicropped-image.jpg', 'h7XxZ1G0lwb5mFDKcropped-image.jpg', 0, 0, 'veg', 'testing food', 'testing foods', 'testing food', 'testing food', 'testing food', 'testing food', 'testing food', 'testing food', 0),
(67, 15, 0, 0, 0, 'imresizer-1733730703912.jpg', 'imresizer-17337307039121.jpg', 'imresizer-17337307039122.jpg', 'imresizer-17337307039123.jpg', 'imresizer-17337307039124.jpg', 1, 0, 'non-veg', 'അലപ്പുഴ ചിക്കൻ കറി', 'Allepy Chicken Curry', 'अलेप्पी चिकन करी ', 'كاري دجاج ألبي', ' അലപ്പുഴ ചിക്കൻ കറി കേരളത്തിന്റെ സവിശേഷമായ ഒരു വിഭവമാണ്, ഇത് തീരപ്രദേശത്തിന്റെ സവിശേഷമായ രുചികൾ സമ്മാനിക്കുന്നു. ഈ കറി ചിക്കന്റെ മൃദുവായ കഷണങ്ങൾ, തേങ്ങാപാൽ, പച്ചമാങ്ങ, സുഗന്ധമസ്‌തക മസാലകൾ എന്നിവ ചേർന്ന് പാകം ചെയ്യുന്നതാണ്. പച്ചമാങ്ങയുടെ അൽപ്പം പുളിയാണ് ഈ കറിയിൽ മസാലകളുടെ തീവ്രമായ രുചിയുമായി തികച്ചും പൊരുത്തപ്പെടുന്നത്. ഈ വിഭവം അപ്പം, അരി, അല്ലെങ്കിൽ കേരള പാറോട്ടയ്ക്കൊപ്പം കഴിക്കുമ്പോൾ അതിന്റെ സ്വാദിന്റെ തീവ്രത സദാ പ്രിയപ്പെട്ടതാകും.', ' Alleppey Chicken Curry is a signature Kerala-style dish that captures the essence of coastal flavors. This tangy and creamy curry combines tender chicken with the richness of coconut milk, raw mango, and a medley of aromatic spices. The addition of raw mango brings a unique sourness that perfectly balances the spicy and savory notes of the dish. It pairs wonderfully with steamed rice, appam, or Kerala parotta, making it a favorite for those seeking authentic and vibrant South Indian cuisine', 'अलेप्पी चिकन करी एक प्रसिद्ध केरल शैली की डिश है जो तटीय स्वादों को पूरी तरह दर्शाती है। यह खट्टी और क्रीमी करी नरम चिकन के टुकड़ों को नारियल के दूध, कच्चे आम और सुगंधित मसालों के साथ पकाकर बनाई जाती है। कच्चे आम का खट्टापन इस डिश के मसालेदार और लजीज स्वाद को बेहतरीन ढंग से संतुलित करता है। इसे चावल, अप्पम, या केरल पराठे के साथ परोसने पर इसका स्वाद और भी बढ़ जाता है।', 'كاري دجاج ألبي هو طبق مميز على طريقة ولاية كيرالا يعكس نكهات الساحل الغنية. تجمع هذه الكاري الكريمية والحامضة بين قطع الدجاج الطرية وحليب جوز الهند والمانجو الأخضر الطازج ومجموعة متنوعة من التوابل العطرية. يضيف المانجو الأخضر حموضة فريدة توازن بشكل مثالي النكهات الحارة والمالحة. يقدم هذا الطبق بشكل رائع مع الأرز المطهو على البخار أو خبز أبّم أو براتا كيرالا، مما يجعله خيارًا شائعًا لعشاق المأكولات الهندية الجنوبية الأصيلة.', 0),
(68, 15, 4, 0, 0, 'imresizer-1733730911169.jpg', 'imresizer-17337309111691.jpg', 'imresizer-17337309111692.jpg', 'imresizer-17337309111693.jpg', 'imresizer-17337309111694.jpg', 1, 0, 'non-veg', 'പെപ്പർ ചിക്കൻ', 'Pepper Chicken', 'पेपर चिकन', ' دجاج بالفلفل الأسود', ' പെപ്പർ ചിക്കൻ ഒരു തിളക്കമുള്ള, രുചിയേറിയ വിഭവമാണ്, അതിന്റെ തീവ്രമായ കുരുമുളക് മസാല രുചിയും സുഗന്ധവുമാണ് പ്രത്യേകത. ചിക്കൻ കഷണങ്ങൾ പൊടിച്ച കുരുമുളകും ഉള്ളിയും കേരളത്തിന്റെ പരമ്പരാഗത മസാലകളും ചേർത്ത് വരണ്ടതോ പാകം ചെയ്ത ചെറിയ കറിയോ ആയി ഒരുക്കുന്നു. ഇത് അരി, ചപ്പാത്തി, അല്ലെങ്കിൽ പാറോട്ടയ്ക്കൊപ്പം മികച്ചതാണ്.', 'Pepper Chicken is a bold and flavorful dish, famous for its spicy kick and aromatic spices. Succulent pieces of chicken are stir-fried with freshly ground black pepper, onions, and a blend of Indian spices, creating a dry or semi-gravy preparation that bursts with flavor. This dish is a perfect balance of heat and aroma, making it an excellent choice with steamed rice, roti, or parotta.\r\n\r\n', ' पेपर चिकन एक मसालेदार और स्वादिष्ट व्यंजन है, जो अपनी तीखी और सुगंधित मसालों के लिए जाना जाता है। ताजे पिसे हुए काली मिर्च, प्याज और भारतीय मसालों के साथ चिकन के टुकड़ों को पकाया जाता है, जिससे यह एक ड्राई या हल्की ग्रेवी वाली डिश बनती है। इसका तीखापन और खुशबू इसे चावल, रोटी या पराठे के साथ परफेक्ट बनाते हैं।', 'دجاج بالفلفل الأسود هو طبق جريء ولذيذ يشتهر بنكهته الحارة والتوابل العطرية. يتم تقليب قطع الدجاج الطرية مع الفلفل الأسود الطازج المطحون والبصل ومزيج من التوابل الهندية، مما ينتج طبقاً جافاً أو بصلصة خفيفة مليئاً بالنكهات. يعد هذا الطبق خياراً مثالياً مع الأرز المطهو على البخار أو الخبز أو البراتا.\r\n\r\n', 0),
(69, 16, 3, 0, 0, 'imresizer-1733732549359.jpg', 'imresizer-17337325493591.jpg', 'imresizer-17337325493592.jpg', 'imresizer-17337325493593.jpg', 'imresizer-17337325493594.jpg', 0, 0, 'veg', 'തക്കാളി ഫ്രൈ', 'Tomato Fry', 'टमाटर फ्राई', 'طماطم مقلية', ' തക്കാളി ഫ്രൈ വളരെ എളുപ്പത്തിൽ തയ്യാറാക്കാവുന്ന, രുചികരമായ വിഭവമാണ്,熟 ripe തക്കാളിയും ഉള്ളിയും വെളുത്തുള്ളിയും വിവിധ സുഗന്ധ മസാലകളും ചേർത്താണ് ഇത് പാകം ചെയ്യുന്നത്.酸 രുചിയേറിയ ഈ വിഭവം അരി, ചപ്പാത്തി അല്ലെങ്കിൽ ദോശ എന്നിവയ്ക്ക് അനുയോജ്യമായ സൈഡ് ഡിഷായി ഉപയോഗിക്കാം. അതിന്റെ തിളങ്ങുന്ന നിറവും ഉന്മേഷമുള്ള രുചിയും ഈ വിഭവത്തെ ആഗ്രഹം നിറക്കുന്നതാക്കുന്നു', 'Tomato Fry is a simple yet flavorful dish made with ripe tomatoes sautéed with onions, garlic, and a blend of aromatic spices. This quick and easy recipe delivers a tangy and savory flavor that pairs perfectly as a side dish with rice, roti, or dosa. Its vibrant color and zesty taste make it a favorite in both everyday meals and special occasions.\r\n\r\n', 'टमाटर फ्राई एक आसान और स्वादिष्ट व्यंजन है जो पके हुए टमाटरों, प्याज, लहसुन, और सुगंधित मसालों के साथ तैयार किया जाता है। यह झटपट बनने वाला व्यंजन खट्टा और लजीज स्वाद प्रदान करता है, जो चावल, रोटी, या डोसा के साथ साइड डिश के रूप में परफेक्ट है। इसका चमकीला रंग और मसालेदार स्वाद इसे रोजमर्रा और खास मौकों पर पसंदीदा बनाता है।\r\n\r\n', 'الطماطم المقلية هي طبق بسيط ولذيذ يُعد باستخدام الطماطم الناضجة المقلية مع البصل والثوم ومزيج من التوابل العطرية. تُحضّر هذه الوصفة بسرعة وسهولة وتتميز بنكهتها الحامضة والمالحة التي تجعلها طبقاً جانبياً مثالياً مع الأرز أو الخبز أو الدوسة. لونها الزاهي ومذاقها اللاذع يجعلها خياراً مفضلاً في الوجبات اليومية والمناسبات الخاصة.\r\n\r\n', 0),
(70, 16, 0, 0, 0, 'imresizer-1733732886870.jpg', 'imresizer-17337328868701.jpg', 'imresizer-17337328868702.jpg', 'imresizer-17337328868703.jpg', 'imresizer-17337328868704.jpg', 0, 0, 'veg', 'വെജിറ്റബിൾ സ്റ്റ്യൂ', 'Vegetable Stew', ' वेजिटेबल स्टू ', 'يخنة الخضار', ' വെജിറ്റബിൾ സ്റ്റ്യൂ ഒരു കേരളത്തിൽ നിന്നുള്ള മൃദുവായയും സുഗന്ധവുമുള്ള വിഭവമാണ്, ഇത് പച്ചക്കറികളുടെ മിശ്രിതം തേങ്ങാ പാൽ ആസ്പദമാക്കി പാകം ചെയ്യുന്നു. കിഴങ്ങുകൾ, വാഴപ്പഴം, കപ്പ, കുരുമുളക്, ഗ്രാമ്പൂ, ഏലക്കായ, ഇഞ്ചി എന്നിവ ചേർന്ന് പാകം ചെയ്ത മസാലകളുമായി ഈ വിഭവം ഒരുപാട് രുചിയുള്ളതും ദൈവസഹായമായതുമാണ്. സാധാരണയായി അപ്പം, ഇഡിയപ്പം അല്ലെങ്കിൽ steamed rice എന്നിവയുമായി കഴിക്കാറുണ്ട്.', 'Vegetable Stew is a mild and aromatic dish from Kerala, made with a variety of fresh vegetables cooked in a rich coconut milk base. The vegetables are simmered with a blend of spices like cinnamon, cloves, and cardamom, along with curry leaves and ginger, creating a delicate and soothing flavor profile. This dish is often served with appam, idiyappam, or steamed rice, making it a perfect combination for a light, flavorful meal.\r\n\r\n', ' वेजिटेबल स्टू एक माइल्ड और खुशबूदार व्यंजन है जो केरल का पारंपरिक भोजन है, जिसमें ताजे पत्तेदार सब्जियों को नारियल के दूध में पकाया जाता है। सब्जियाँ दारचीनी, लौंग, इलायची, करी पत्ते और अदरक जैसी मसालों के साथ पकाई जाती हैं, जिससे यह स्वाद में हल्का और ताजगी से भरपूर बनता है। यह डिश अप्पम, इडियप्पम या उबले चावल के साथ बेहतरीन लगती है।', 'يخنة الخضار هي طبق خفيف وعطري من ولاية كيرالا، يتم تحضيره باستخدام مجموعة متنوعة من الخضروات الطازجة المطهوة في حليب جوز الهند. يتم طهي الخضروات مع مزيج من التوابل مثل القرفة، القرنفل، الهيل، أوراق الكاري، والزنجبيل، مما يخلق نكهة لطيفة ومهدئة. يُقدَّم هذا الطبق عادةً مع خبز الأبهام أو الإيديامبم أو الأرز المطهو على البخار، مما يجعله مزيجًا مثاليًا لوجبة خفيفة ولذيذة.\r\n\r\n', 0),
(71, 16, 0, 0, 0, 'imresizer-1733733995595.jpg', 'imresizer-17337339955951.jpg', 'imresizer-17337339955952.jpg', 'imresizer-17337339955953.jpg', 'imresizer-17337339955954.jpg', 0, 0, 'veg', ' മഷ്‌റൂം മലബാറി', 'Mushroom Malabari', ' मशरूम मलाबारी', 'فطر مالاباري', 'മഷ്രൂം മലബാറി കേരളത്തിലെ സമൃദ്ധമായ സസ്യാഹാര വിഭവമാണ്, ഇത് മൃദുവായ മഷ്രൂമുകൾ പാകം ചെയ്ത് മലപ്പുറം സ്റ്റൈലിൽ തയ്യാറാക്കിയ കറിയിലാണ്. ചതച്ച ഉള്ളി, ഇഞ്ചി, വെളുത്തുള്ളി, മസാലകൾ എന്നിവ ചേർന്ന് മഷ്രൂമുകൾ വറുത്ത ശേഷം, തേങ്ങാ പാൽ ചേർത്ത് സുഖകരമായ രുചി ലഭ്യമാക്കുന്നു. ഇത് അപ്പം, ഇഡിയപ്പം അല്ലെങ്കിൽ സ്റ്റീമഡ് റൈസുമായ് കഴിക്കാൻ ഏറ്റവും അനുയോജ്യമാണ്.', 'Mushroom Malabari is a flavorful vegetarian dish from Kerala, showcasing tender mushrooms cooked in a rich and aromatic Malabari-style curry. The mushrooms are sautéed with onions, ginger, garlic, and a blend of traditional spices, then simmered in a creamy coconut milk base, which imparts a rich and soothing flavor. This dish is typically served with appam, idiyappam, or steamed rice, offering a perfect blend of textures and tastes.\r\n\r\n', 'मशरूम मलाबारी केरल का एक स्वादिष्ट शाकाहारी व्यंजन है, जिसमें नरम मशरूम को एक समृद्ध और खुशबूदार मलाबारी शैली की करी में पकाया जाता है। मशरूम को प्याज, अदरक, लहसुन और मसालों के साथ भूनकर फिर नारियल के दूध में पकाया जाता है, जिससे यह करी मलाईदार और स्वादिष्ट बनती है। यह डिश आमतौर पर अप्पम, इडियप्पम या उबले चावल के साथ परोसी जाती है, जो इसे एक बेहतरीन संयोजन बनाता है।\r\n\r\n', 'فطر مالاباري هو طبق نباتي لذيذ من ولاية كيرالا، حيث يتم طهي الفطر الطري في كاري غني وعطري على الطريقة المالابارية. يتم تحمير الفطر مع البصل والثوم والزنجبيل ومزيج من التوابل، ثم يُطهى في قاعدة حليب جوز الهند الكريمي، مما يضفي نكهة غنية ومريحة. يُقدَّم هذا الطبق عادةً مع خبز الأبهام أو الإيديامبم أو الأرز المطهو على البخار، ليكون مزيجًا مثاليًا من النكهات والقوام.\r\n\r\n', 0),
(73, 16, 3, 0, 0, 'imresizer-1733737269261.jpg', 'imresizer-17337372692611.jpg', 'imresizer-17337372692612.jpg', 'imresizer-17337372692613.jpg', 'imresizer-17337372692614.jpg', 0, 0, 'veg', ' ഗോബി മഞ്ചൂരിയൻ', 'Gobi Manchurian', ' गोभी मंचूरियन', 'غوبي مانتشوريان', ': ഗോബി മഞ്ചൂരിയൻ ഒരു ജനപ്രിയ ഇൻഡോ-ചൈനീസ് വിഭവമാണ്, പൊരിച്ച കോലിഫ്ലവർ കുരുകൾ, അമളി ചട്ണി, സൂയ സോസ് എന്നിവയോടെ പാചകം ചെയ്യുന്നു. ഇത് കറിവർച്ച കോലിഫ്ലവറിന്റെ കുർക്കുരുത്തും സോസ് മിശ്രിതത്തിലെ തീവ്രമായ രുചിയും സംയോജിപ്പിക്കുന്ന ഒരു രുചികരമായ ഭക്ഷണമാണ്. സാധാരണയായി ഫ്രൈഡ് റൈസിനോ നൂഡിൽസിനോ ഒപ്പം കഴിക്കാറുള്ള ഈ വിഭവം രുചികരമായ ഒരു ആഹാരാനുഭവം നൽകുന്നു.', ' Gobi Manchurian is a popular Indo-Chinese dish made with crispy fried cauliflower florets tossed in a tangy and spicy sauce. The dish combines the crunchiness of golden-fried cauliflower with the rich flavors of soy sauce, garlic, and chili, making it a perfect appetizer or side dish. It is loved for its bold and zesty taste, often paired with fried rice or noodles.\r\n\r\n', ' गोभी मंचूरियन एक लोकप्रिय इंडो-चाइनीज व्यंजन है, जिसमें तले हुए गोभी के फूलों को खट्टे और मसालेदार सॉस में मिलाया जाता है। यह व्यंजन तली हुई गोभी की कुरकुराहट को सोया सॉस, लहसुन, और मिर्च की तीखी और स्वादिष्ट चटनी के साथ मिलाता है। इसे अक्सर फ्राइड राइस या नूडल्स के साथ परोसा जाता है और इसके ज़ायकेदार स्वाद के लिए पसंद किया जाता है।', ' غوبي مانتشوريان هو طبق شهير من المطبخ الهندي الصيني، يتم تحضيره باستخدام زهيرات القرنبيط المقلية المقرمشة والممزوجة بصلصة حامضة وحارة. يجمع الطبق بين قرمشة القرنبيط الذهبي المقلي ونكهات غنية من صلصة الصويا والثوم والفلفل الحار، مما يجعله مقبلات مثالية أو طبق جانبي. يُقدَّم عادةً مع الأرز المقلي أو النودلز.\r\n\r\n', 0),
(74, 16, 3, 0, 0, 'imresizer-1733737672088.jpg', 'imresizer-17337376720881.jpg', 'imresizer-17337376720882.jpg', 'imresizer-17337376720883.jpg', 'imresizer-17337376720884.jpg', 0, 0, 'veg', 'ചില്ലി ഗോബി', 'Chilli Gobi', ' चिली गोभी ', ' تشيلي غوبي', 'ചില്ലി ഗോബി ഒരു കുരുമുളക് ചൂടുള്ള, ഉഗ്രമായ ഇൻഡോ-ചൈനീസ് വിഭവമാണ്, കുരുമുളക് സോസിൽ മുക്കിയ പൊരിച്ച കോലിഫ്ലവർ കുരുകൾ ആണ് ഇതിന്റെ പ്രത്യേകത. സ്വർണ്ണ നിറത്തിൽ പൊരിച്ച കോലിഫ്ലവർ, വെളുത്തുള്ളി, ഉള്ളി, കാപ്‌സിക്കം, സോയ സോസ്, ചില്ലി പേസ്റ്റ് എന്നിവയിൽ വറുത്ത് പാകം ചെയ്യുന്നു. ഫ്രൈഡ് റൈസിനോ നൂഡിൽസിനോ ഒപ്പം കഴിക്കാവുന്ന മികച്ച പാചകം കൂടിയാണ് ഇത്.', ' Chilli Gobi is a spicy and tangy Indo-Chinese dish featuring crispy cauliflower florets coated in a flavorful chili sauce. The dish is prepared by frying cauliflower until golden and tossing it with garlic, onions, bell peppers, soy sauce, and chili paste for a burst of bold flavors. Perfect as an appetizer or side dish, it pairs well with fried rice or noodles.\r\n\r\n', ' चिली गोभी एक तीखा और चटपटा इंडो-चाइनीज व्यंजन है जिसमें कुरकुरे गोभी के टुकड़ों को मसालेदार चिली सॉस में लपेटा जाता है। इसे सुनहरे भूरे रंग तक तला जाता है और लहसुन, प्याज, शिमला मिर्च, सोया सॉस, और चिली पेस्ट के साथ मिलाया जाता है। यह फ्राइड राइस या नूडल्स के साथ परफेक्ट लगता है।\r\n\r\n', ' تشيلي غوبي هو طبق هندي صيني حار ولاذع يتميز بزهيرات القرنبيط المقرمشة المغطاة بصلصة الفلفل الحارة. يتم تحضير الطبق بقلي القرنبيط حتى يصبح ذهبي اللون ومزجه بالثوم والبصل والفلفل الحلو وصلصة الصويا ومعجون الفلفل لإبراز نكهات جريئة. إنه مثالي كمقبلات أو طبق جانبي ويُقدَّم عادةً مع الأرز المقلي أو النودلز.', 0),
(75, 17, 5, 0, 0, 'imresizer-1733738782409.jpg', 'imresizer-17337387824091.jpg', 'imresizer-17337387824092.jpg', 'imresizer-17337387824093.jpg', 'imresizer-17337387824094.jpg', 0, 0, 'non-veg', 'നെയ്മീൻ മാങ്ങ കറി', 'Neymeen (Kingfish) Mango Curry', ' नयमीन (किंगफिश)', 'كاري سمك الملك مع المانجو', 'നെയ്മീൻ മാങ്ങ കറി ഒരു രുചികരമായ കേരള സ്റ്റൈൽ മീൻ കറിയാണ്, പുതുമാങ്ങയും തേങ്ങാപ്പാൽ ആധാരമാക്കി പാകം ചെയ്ത സമൃദ്ധമായ ചാറും സുഗന്ധമുള്ള മസാലകളും ചേർന്ന് തയ്യാറാക്കുന്നു. മാങ്ങയുടെ പുളിമനയും തേങ്ങാപ്പാലിന്റെ സമൃദ്ധിയും മസാലകളുടെ ഉഗ്രമായ രുചിയും ഇഴചേർന്ന വ്യത്യസ്തമായ രുചി നൽകുന്ന വിഭവമാണിത്. ചോറോ അപ്പമോ കൂടെ കഴിക്കുമ്പോൾ ഏറ്റവും അനുയോജ്യമാണ്.', ' Neymeen Mango Curry is a delectable Kerala-style fish curry where succulent kingfish pieces are cooked with raw mangoes in a tangy and flavorful coconut-based gravy. The tartness of the mangoes perfectly balances the richness of the coconut milk and spices, creating a unique and memorable dish. Best enjoyed with steamed rice or appam, this curry showcases the vibrant flavors of coastal Kerala.', ' नयमीन आम करी एक स्वादिष्ट केरल शैली की मछली करी है, जिसमें किंगफिश के कोमल टुकड़े कच्चे आम और नारियल के दूध से बनी खट्टी और स्वादिष्ट ग्रेवी में पकाए जाते हैं। आम की खटास नारियल के दूध और मसालों की समृद्धि को पूरी तरह से संतुलित करती है, जिससे यह व्यंजन अनोखा और यादगार बन जाता है। इसे उबले चावल या अप्पम के साथ सबसे अच्छा परोसा जाता है।', 'كاري سمك الملك مع المانجو هو طبق لذيذ على الطريقة الكيرالية يتم فيه طهي قطع سمك الملك الطرية مع المانجو النيء في صلصة غنية تعتمد على حليب جوز الهند. يمتاز الطبق بمذاقه الحامض من المانجو الذي يتوازن تمامًا مع غنى حليب جوز الهند والتوابل، مما يجعله طبقًا فريدًا ولا يُنسى. يُقدَّم عادةً مع الأرز المطهو على البخار أو خبز الأبهام.\r\n\r\n', 0),
(76, 17, 5, 0, 0, 'imresizer-1733739263522.jpg', 'imresizer-17337392635221.jpg', 'imresizer-17337392635222.jpg', 'imresizer-17337392635223.jpg', 'imresizer-17337392635224.jpg', 0, 0, 'non-veg', '  നെയ്മീൻ കുട്ടനാട്‌', 'Neymeen (Kingfish) Kuttanadan', ' नयमीन (किंगफिश) कुट्टनादन करी ', 'كاري سمك الملك كوتانادان', ' നെയ്മീൻ   നെയ്മീൻ കുട്ടനാട്‌ നാടൻ കറി കേരളത്തിന്റെ കുത്തനാട് മേഖലയിൽ നിന്നുള്ള പരമ്പരാഗത രുചിയുള്ള മീൻ കറിയാണ്. പച്ചമസാലകളും തേങ്ങാപ്പുലിയും പുളിയും ഉപയോഗിച്ച് തയ്യാറാക്കിയ കിടിലൻ ചാറിൽ നെയ്മീന്റെ രുചിയുള്ള കഷണങ്ങൾ പാചകം ചെയ്യുന്നു. കറിവേപ്പിലയും ഉലുവയും ചേർന്ന സ്വാദിഷ്ടമായ ഈ വിഭവം കേരളത്തിന്റെ കായൽപ്രദേശങ്ങളുടെ സവിശേഷതകളിൽ ഒന്നാണ്. ചോരോ കപ്പയോ (മരച്ചീനി) കൂടെ കഴിക്കാൻ ഇത് ഏറ്റവും അനുയോജ്യമാണ്.', ' Neymeen Kuttanadan Curry is a traditional Kerala-style fish curry inspired by the flavors of the Kuttanad region. Juicy pieces of kingfish are simmered in a spicy and tangy gravy made with freshly ground spices, coconut paste, and tamarind. The dish is enriched with the aroma of curry leaves and fenugreek, making it a true delicacy of Kerala’s backwaters. It pairs perfectly with steamed rice or kappa (tapioca).', 'नयमीन कुट्टनादन करी केरल के कुट्टनाड क्षेत्र से प्रेरित एक पारंपरिक मछली करी है। किंगफिश के रसदार टुकड़ों को ताज़ा पिसे मसालों, नारियल के पेस्ट, और इमली से बनी तीखी और मसालेदार ग्रेवी में पकाया जाता है। करी पत्ते और मेथी के स्वाद से समृद्ध यह डिश केरल के बैकवाटर की एक अनूठी विशेषता है। इसे उबले चावल या कप्पा (टैपिओका) के साथ परोसा जाता है।', ' كاري سمك الملك كوتانادان هو طبق تقليدي مستوحى من نكهات منطقة كوتاناد في ولاية كيرالا. تُطهى قطع سمك الملك الطرية في صلصة حارة وحامضة محضرة من التوابل الطازجة، معجون جوز الهند، والتاماريند. يتم تعزيز الطعم بنكهة أوراق الكاري والحلبة، مما يجعله من ألذ الأطباق في مياه كيرالا الخلفية. يُقدَّم مع الأرز المطهو على البخار أو الكابا (الكسافا).\r\n\r\n', 0),
(77, 17, 5, 0, 0, 'imresizer-1733739382037.jpg', 'imresizer-17337393820371.jpg', 'imresizer-17337393820372.jpg', 'imresizer-17337393820373.jpg', 'imresizer-17337393820374.jpg', 0, 0, 'non-veg', 'ചെമ്മീൻ  വരട്ടിയത്ത്', 'Chemmeen Varattiyathu', 'चेम्मीन वरत्तियथु ', 'جمبري محمص', 'ചെമ്മീൻ  വരട്ടിയത്ത്\r\n   കേരളത്തിന്റെ സവിശേഷമായ ഒരു പരമ്പരാഗത തീറ്റയാണ്, പുതുമസാലകൾ, ഉള്ളി, തേങ്ങയുടെ കഷണങ്ങൾ എന്നിവയോടെ ചെമ്മീൻ കുരു വറുത്ത് തയ്യാറാക്കുന്നതാണ്. കറിവേപ്പിലയും വറുത്ത തേങ്ങയുടെ സുഗന്ധവും ചേർന്ന മസാലയിൽ മൂടി ചെമ്മീൻ കുരുവറത്ത് പാചകം ചെയ്യുന്നു. ചോറോ അപ്പമോ പറോട്ടയോ കൂടെ കഴിക്കാൻ ഇത് ഏറ്റവും അനുയോജ്യമാണ്.\r\n\r\n', 'Chemmeen Varattiyathu is a traditional Kerala-style prawn roast made by sautéing fresh prawns with a medley of aromatic spices, onions, and coconut slices. The prawns are cooked until coated in a rich, spicy, and slightly tangy masala, enhanced with the flavor of curry leaves and roasted coconut. Best enjoyed with steamed rice, appam, or parotta, this dish is a favorite among seafood lovers.', 'चेम्मीन वरत्तियथु एक पारंपरिक केरल शैली की झींगा भुजिया है, जिसे ताज़ा झींगों को सुगंधित मसालों, प्याज, और नारियल के टुकड़ों के साथ भूनकर तैयार किया जाता है। झींगों को मसालेदार, हल्के खट्टे मसाले में पकाया जाता है, जिसमें करी पत्तों और भूने नारियल का स्वाद होता है। इसे उबले चावल, अप्पम या परोटा के साथ परोसा जाता है। ', 'جمبري محمص على الطريقة الكيرالية التقليدية يُحضَّر عن طريق قلي الجمبري الطازج مع مزيج من التوابل العطرية والبصل وشرائح جوز الهند. يُطهى الجمبري حتى يُغطى بمسالا غنية وحارة مع لمسة من الطعم الحامض، وتعزز النكهة بأوراق الكاري وجوز الهند المحمص. يُقدَّم عادةً مع الأرز المطهو على البخار أو خبز الأبهام أو البراتا.', 0),
(78, 17, 5, 0, 0, 'imresizer-1733739770077.jpg', 'imresizer-17337397700771.jpg', 'imresizer-17337397700772.jpg', 'imresizer-17337397700773.jpg', 'imresizer-17337397700774.jpg', 0, 0, 'non-veg', 'ചെമ്മീൻ മാങ്ങ കറി', 'chemmeen mango curry', ' चेम्मीन आम करी ', 'كاري الجمبري مع المانجو', 'ചെമ്മീൻ മാങ്ങ കറി കേരളത്തിന്റെ ശൈലിയിൽ തയ്യാറാക്കുന്ന ഒരു രുചികരമായ മീൻ കറിയാണ്, പുളി മാങ്ങയും തേങ്ങാപ്പാൽ ആധാരമാക്കി പാകം ചെയ്ത കഷായത്തിലേയ്ക്ക് ചെമ്മീൻ ചേർത്ത് തയ്യാറാക്കുന്നതാണ്. ചെമ്മീന്റെ മധുരവും മാങ്ങയുടെ പുളിയും ചേർന്നുണ്ടാകുന്ന ഈ വിഭവം കേരളത്തിന്റെ തീരപ്രദേശീയ പാചകശൈലിയുടെ സ്വാദിഷ്ടമായ ഉദാഹരണമാണ്. ചോരോ അപ്പമോ കൂടെ കഴിക്കാം.\r\n\r\nHindi', 'Chemmeen Mango Curry is a luscious Kerala-style dish where prawns are cooked in a tangy and flavorful coconut-based gravy with raw mangoes. The combination of the prawns\' sweetness and the mangoes\' tartness, enhanced by aromatic spices and curry leaves, creates a dish that\'s both rich and refreshing. Best enjoyed with steamed rice or appam, this curry captures the essence of Kerala\'s coastal cuisine', 'चेम्मीन आम करी एक स्वादिष्ट केरल शैली की डिश है जिसमें झींगों को कच्चे आम और नारियल के दूध से बनी खट्टी और स्वादिष्ट ग्रेवी में पकाया जाता है। झींगों की मिठास और आम की खटास, सुगंधित मसालों और करी पत्तों के साथ मिलकर इस व्यंजन को समृद्ध और ताज़गीपूर्ण बनाती है। इसे उबले चावल या अप्पम के साथ सबसे अच्छा परोसा जाता है।', ' كاري الجمبري مع المانجو هو طبق لذيذ على الطريقة الكيرالية حيث يُطهى الجمبري في صلصة غنية تعتمد على حليب جوز الهند مع المانجو النيء. يجمع الطبق بين حلاوة الجمبري وحموضة المانجو، معززة بالتوابل العطرية وأوراق الكاري، مما يجعله طبقًا غنيًا ومنعشًا. يُقدَّم عادةً مع الأرز المطهو على البخار أو خبز الأبهام.\r\n\r\n', 0),
(79, 17, 5, 0, 0, 'imresizer-1733740380797.jpg', 'imresizer-17337403807971.jpg', 'imresizer-17337403807972.jpg', 'imresizer-17337403807973.jpg', 'imresizer-17337403807974.jpg', 0, 0, 'non-veg', 'കണവ വരട്ടിയത്ത്', ' Squid Varattiyathu ', ' स्क्विड वरत्तियथु', 'الحبار المحمص', 'കണവ \r\n   വരട്ടിയത്ത്         കേരളത്തിന്റെ സവിശേഷമായ ഒരു മസാല വിഭവമാണ്, കണവ റിംഗുകൾ പുതുമസാലകൾ, ഉള്ളി, തേങ്ങയുടെ കഷണങ്ങൾ, കറിവേപ്പില എന്നിവയുമായി വറുത്ത് പാകം ചെയ്യുന്നതാണ്. കണവയുടെ സ്വാഭാവിക രുചി മസാലയുടെ ഉഗ്രതയുമായി ഇഴചേർന്ന ഈ വിഭവം ചോരോ പരോട്ടയോ കൂടെ കഴിക്കാനുളള ഒരു മികച്ച വാൻഭോജനമാണിത്.', 'Squid Varattiyathu is a Kerala-style delicacy where tender squid rings are roasted with a blend of fiery spices, onions, coconut slices, and curry leaves. Cooked to perfection, this dish features a bold and aromatic masala that complements the natural flavors of the squid. Perfect as a side dish or appetizer, it pairs wonderfully with steamed rice or parotta.', ' स्क्विड वरत्तियथु एक पारंपरिक केरल शैली की डिश है, जिसमें कोमल स्क्विड रिंग्स को मसालेदार मसालों, प्याज, नारियल के टुकड़ों और करी पत्तों के साथ भूनकर तैयार किया जाता है। मसाले और स्क्विड के प्राकृतिक स्वाद के अद्भुत मेल से यह डिश तैयार होती है। इसे उबले चावल या परोटा के साथ सबसे अच्छा परोसा जाता है।\r\n\r\n', ' الحبار المحمص هو طبق شهي على الطريقة الكيرالية حيث تُطهى حلقات الحبار الطرية مع مزيج من التوابل الحارة، البصل، شرائح جوز الهند، وأوراق الكاري. يتميز الطبق بنكهات جريئة وعطرية تُبرز الطعم الطبيعي للحبار. يُقدَّم عادةً كطبق جانبي أو كمقبلات مع الأرز المطهو على البخار أو خبز البراتا.\r\n\r\n', 0),
(80, 18, 0, 0, 0, 'imresizer-1733740975591.jpg', 'imresizer-17337409755911.jpg', 'imresizer-17337409755912.jpg', 'imresizer-17337409755913.jpg', 'imresizer-17337409755914.jpg', 0, 0, 'non-veg', 'ബീഫ് ചില്ലി', 'Beef Chilli', ' बीफ चिली', 'لحم البقر تشيلي', ' ബീഫ് ചില്ലി ഒരു ഉഗ്രമായ, രുചികരമായ വിഭവമാണ്, മൃദുവായ ബീഫ് കഷണങ്ങൾ ക്യാപ്‌സിക്കം, ഉള്ളി, മസാല എന്നിവയോടെ പാകം ചെയ്ത് ഒരുക്കുന്നത്. ഈ ചില്ലി വിഭവം ഉഗ്രമായ കട്ടിയുള്ള മസാല സോസിൽ ആക്കിയിരിക്കുന്നു, ഇത് രുചിയുടെ അടയാളമാണ്. ചോരു അല്ലെങ്കിൽ പരോട്ടയുമായി ഇത് ഒരു മികച്ച കോമ്പിനേഷൻ ആണ്.', 'Beef Chilli is a spicy, flavorful dish where tender beef pieces are cooked with vibrant bell peppers, onions, and a variety of bold spices. This stir-fried dish is coated in a tangy, spicy sauce that packs a punch, making it a favorite for those who love bold flavors. It pairs perfectly with steamed rice or parotta.', ' बीफ चिली एक मसालेदार और स्वादिष्ट व्यंजन है, जिसमें नरम बीफ के टुकड़ों को शिमला मिर्च, प्याज और मसालों के साथ पकाया जाता है। यह पकवान तीव्र स्वाद और मसालेदार सॉस से कोट किया जाता है, जो इसे तीव्र स्वाद पसंद करने वालों के लिए आदर्श बनाता है। इसे चावल या पराठे के साथ सबसे अच्छा परोसा जाता है।\r\n\r\n', 'لحم البقر تشيلي هو طبق حار ولذيذ يتم تحضير فيه قطع لحم البقر الطرية مع الفلفل الملون والبصل والتوابل المختلفة. يُغطى الطبق بصلصة حارة ولذيذة تعزز من النكهات، مما يجعله طبقًا مثاليًا لمحبي النكهات القوية. يُقدم عادةً مع الأرز أو خبز البراتا.', 0),
(81, 18, 8, 0, 0, 'imresizer-1733741442393.jpg', 'imresizer-17337414423931.jpg', 'imresizer-17337414423932.jpg', 'imresizer-17337414423933.jpg', 'imresizer-17337414423934.jpg', 0, 0, 'non-veg', 'ബീഫ് റോസ്റ്റ്', 'Beef Roast', ' बीफ रोस्ट', 'لحم البقر المحمر', 'ബീഫ് റോസ്റ്റ് കേരളത്തിന്റെ പരമ്പരാഗത വിഭവമാണ്, മൃദുവായ ബീഫ് കഷണങ്ങളെ പുത്തൻ മസാലകൾ, വെളുത്തുള്ളി, ഇഞ്ചി, കറിവേപ്പില എന്നിവയുമായി നന്നായി വേവിച്ച് സ്വാദിഷ്ടമായ വൃത്തിയുള്ള ഒരു റോസ്റ്റ് ഉണ്ടാക്കുന്നതാണ്. ഈ വിഭവം സ്വാദുളള, രുചികരമായ മസാലയിൽ പാടിയിരിക്കുന്നു, ചോറോ അപ്പം അല്ലെങ്കിൽ പരോട്ടയുമായി കഴിക്കുന്നത് അനുയോജ്യമാണ്.', ' Beef Roast is a classic Kerala-style dish made by slow-cooking tender beef with a rich blend of spices, garlic, ginger, and curry leaves. The beef is roasted until it reaches a perfect caramelized, golden-brown crust, with deep flavors infused throughout. This dish is aromatic, flavorful, and spicy, best enjoyed with steamed rice, appam, or parotta.\r\n\r\n', 'बीफ रोस्ट एक पारंपरिक केरल व्यंजन है जिसमें नरम बीफ के टुकड़ों को मसालों, लहसुन, अदरक, और करी पत्तों के साथ पकाया जाता है। इसे धीमी आंच पर भूनकर सुनहरा और कुरकुरा किया जाता है, जिससे इसके भीतर स्वाद और मसाले भर जाते हैं। इसे चावल, पराठा, या अप्पम के साथ परोसा जाता है।', 'لحم البقر المحمر هو طبق تقليدي على الطريقة الكيرالية يتم فيه طهي قطع لحم البقر الطرية مع مزيج غني من التوابل، الثوم، الزنجبيل، وأوراق الكاري. يتم تحميص اللحم حتى يصبح ذو قشرة ذهبية بنكهة غنية وعميقة. يُقدّم عادةً مع الأرز أو خبز البراتا أو الأبهام.\r\n\r\n', 0),
(82, 18, 8, 0, 0, 'imresizer-1733741683863.jpg', 'imresizer-17337416838631.jpg', 'imresizer-17337416838632.jpg', 'imresizer-17337416838633.jpg', 'imresizer-17337416838634.jpg', 0, 0, 'non-veg', ' ബീഫ് തേങ്ങാ ഫ്രൈ', 'Beef Coconut Fry', ' बीफ नारियल फ्राई', ' لحم البقر المقلي بجوز الهند ', 'ബീഫ് തേങ്ങാ ഫ്രൈ കേരളത്തിന്റെ സവിശേഷമായ ഒരു വിഭവമാണ്, മൃദുവായ ബീഫ് കഷണങ്ങൾ നന്നായി തേങ്ങ, ഉള്ളി, പച്ചമുളക്, മസാലകൾ എന്നിവയുമായി വഴറ്റി പാകം ചെയ്യുന്നതാണ്. തേങ്ങയുടെ കഷണങ്ങൾ ചേർത്തുള്ള ഈ വിഭവം രുചികരവും മസാലയും നിറഞ്ഞതാണ്, ചോറോ അപ്പം അല്ലെങ്കിൽ പരോട്ടയുമായി മികച്ച രീതിയിൽ കഴിക്കാം.', 'Beef Coconut Fry is a flavorful Kerala-style dish where tender beef pieces are stir-fried with fresh coconut, onions, green chilies, and a blend of aromatic spices. The addition of grated coconut gives the dish a rich texture and enhances the natural flavors of the beef. This spicy, aromatic dish pairs perfectly with steamed rice, parotta, or appam.', 'बीफ नारियल फ्राई एक केरल शैली का स्वादिष्ट व्यंजन है जिसमें नरम बीफ के टुकड़ों को ताजे नारियल, प्याज, हरी मिर्च और मसालों के साथ तला जाता है। नारियल के घिसे हुए टुकड़े इस व्यंजन को एक समृद्ध बनावट और बेहतरीन स्वाद प्रदान करते हैं। यह मसालेदार और खुशबूदार डिश चावल, पराठा, या अप्पम के साथ बेहतरीन होती है।\r\n\r\n', ' لحم البقر المقلي بجوز الهند هو طبق كيرالي شهي يتم فيه قلي قطع اللحم الطرية مع جوز الهند الطازج، والبصل، والفلفل الأخضر، ومزيج من التوابل العطرية. يضيف جوز الهند المبشور للطبق قوامًا غنيًا ويعزز النكهات الطبيعية للحم. يُقدّم عادةً مع الأرز المطهو على البخار أو خبز البراتا أو الأبهام.\r\n\r\n', 0),
(83, 18, 8, 0, 0, 'imresizer-1733741863084.jpg', 'imresizer-17337418630841.jpg', 'imresizer-17337418630842.jpg', 'imresizer-17337418630843.jpg', 'imresizer-17337418630844.jpg', 0, 0, 'non-veg', ' ബീഫ് വരട്ടിയത്ത് ', 'Beef Varattiyathu', 'बीफ वरत्तियथु', 'لحم البقر المحمص', ' ബീഫ്  വരട്ടിയത്ത്  കേരളത്തിന്റെ പരമ്പരാഗതമായ ഒരു വിഭവമാണ്, മൃദുവായ ബീഫ് കഷണങ്ങളെ മസാലകളിൽ മുക്കി, നീട്ടി പാകം ചെയ്ത ശേഷം, ഉള്ളി, കറിവേപ്പില, തേങ്ങ കഷണങ്ങൾ എന്നിവയുമായി വറുത്തു നല്ലൊരു രുചിയുള്ള വിഭവമാണ്. ഇത് ചോര, അപ്പം അല്ലെങ്കിൽ പരോട്ടയുമായി കഴിക്കാൻ അനുയോജ്യമാണ്.', 'Beef Varattiyathu is a Kerala-style dish where tender beef pieces are marinated in a blend of spices and then slow-cooked to perfection. The beef is roasted with onions, curry leaves, and coconut slices, absorbing the bold, spicy flavors of the masala. It’s a rich, aromatic, and flavorful dish that pairs wonderfully with rice, parotta, or appam.', 'बीफ वरत्तियथु एक केरल शैली का स्वादिष्ट और मसालेदार व्यंजन है जिसमें बीफ के नरम टुकड़ों को मसालों में मैरीनेट किया जाता है और फिर धीमी आंच पर पकाया जाता है। इसे प्याज, करी पत्ते, और नारियल के टुकड़ों के साथ भूनकर तैयार किया जाता है, जिससे यह व्यंजन मसालेदार और खुशबूदार बन जाता है। इसे चावल, पराठा, या अप्पम के साथ सबसे अच्छा परोसा जाता है।', 'لحم البقر المحمص هو طبق كيرالي تقليدي يتم فيه تتبيل قطع اللحم الطرية بالتوابل ثم طهيها ببطء. يتم تحميص اللحم مع البصل وأوراق الكاري وشرائح جوز الهند ليأخذ نكهة قوية وعطرية. يُقدم هذا الطبق مع الأرز المطهو على البخار أو خبز البراتا أو الأبهام.\r\n\r\n', 0),
(84, 18, 0, 0, 0, 'imresizer-1733744484125.jpg', 'imresizer-17337444841251.jpg', 'imresizer-17337444841252.jpg', 'imresizer-17337444841253.jpg', 'imresizer-17337444841254.jpg', 0, 0, 'non-veg', ' മട്ടൻ  വരട്ടിയത്ത് ', 'Mutton Varattiyathu', 'मटन वरत्तियथु', ' لحم الضأن المحمص', 'മട്ടൻ വരട്ടിയത്ത് കേരളത്തിന്റെ പരമ്പരാഗത മസാല വിഭവമാണ്, മൃദുവായ മട്ടൻ കഷണങ്ങളെ മസാല, വെളുത്തുള്ളി, ഇഞ്ചി, കറിവേപ്പില എന്നിവയുമായി പാകം ചെയ്ത്, വെള്ളിയിട്ട് വറുത്ത് തയ്യാറാക്കുന്നു. ഇതിന്റെ ഉഗ്രമായ മസാല രുചി നന്നായി പാചകം ചെയ്ത മട്ടനിൽ ഇരുട്ടും വാസനയും കൂട്ടി ചേർക്കുന്നു. ചോര, അപ്പം അല്ലെങ്കിൽ പരോട്ടയുമായി ഇത് മികച്ച ഭക്ഷണത്തിനായാണ്.\r\n\r\n', 'Mutton Varattiyathu is a traditional Kerala dish made by slow-cooking tender mutton pieces with a rich blend of spices, garlic, ginger, and curry leaves. The mutton is roasted until golden brown, allowing the spices to infuse deeply into the meat. The result is a flavorful, aromatic, and spicy dish that pairs perfectly with steamed rice, parotta, or appam.', ': मटन वरत्तियथु एक पारंपरिक केरल व्यंजन है जिसमें मटन के नरम टुकड़ों को मसालों, लहसुन, अदरक, और करी पत्तों के साथ पकाया जाता है। इसे धीमी आंच पर भूनकर सुनहरा और कुरकुरा किया जाता है, जिससे इसमें मसालों का गहरा स्वाद समा जाता है। यह मसालेदार और खुशबूदार डिश चावल, पराठा या अप्पम के साथ बहुत अच्छा लगता है।', ' لحم الضأن المحمص هو طبق كيرالي تقليدي يتم فيه طهي قطع لحم الضأن الطرية مع التوابل، الثوم، الزنجبيل، وأوراق الكاري. يتم تحميص اللحم حتى يصبح ذهبيًا ومقرمشًا، مما يسمح للتوابل بالتغلغل في اللحم. الطبق مليء بالنكهات العطرية والحارة، ويُقدم مع الأرز أو خبز البراتا أو الأبهام.\r\n\r\n', 0),
(85, 18, 9, 0, 0, 'imresizer-1733744636461.jpg', 'imresizer-17337446364611.jpg', 'imresizer-17337446364612.jpg', 'imresizer-17337446364613.jpg', 'imresizer-17337446364614.jpg', 0, 0, 'non-veg', 'മട്ടൻ പെപ്പർ റോസ്റ്റ്', 'Mutton Pepper Roast', 'मटन पेपर रोस्ट', 'لحم الضأن بالفلفل الأسود ', 'മട്ടൻ പെപ്പർ റോസ്റ്റ് ഒരു ഉഗ്രമായ, രുചികരമായ വിഭവമാണ്, മൃദുവായ മട്ടൻ കഷണങ്ങൾ കട്ടിയുള്ള കുരുമുളക്, വിവിധ മസാലകൾ, കറിവേപ്പില എന്നിവയുമായി പാകം ചെയ്യുന്നു. മട്ടൻ വെറും നന്നായി വറുത്ത്, അതിന്റെ സ്വാദും വാസനയും നിറഞ്ഞ ഒരു രുചികരമായ വിഭവമാണ്. ഇത് ചോറോ അപ്പം അല്ലെങ്കിൽ പരോട്ടയുമായി മികച്ച കോമ്പിനേഷൻ ആണ്.\r\n\r\n', 'Mutton Pepper Roast is a spicy, flavorful dish where tender mutton pieces are slow-cooked with black pepper, a variety of aromatic spices, and fresh curry leaves. The mutton is roasted until it develops a deep, rich flavor and a crispy outer texture. This aromatic and spicy dish pairs perfectly with steamed rice, parotta, or appam.', ' मटन पेपर रोस्ट एक मसालेदार और स्वादिष्ट व्यंजन है जिसमें मटन के नरम टुकड़ों को काले मिर्च, मसालों और ताजे करी पत्तों के साथ पकाया जाता है। मटन को धीमी आंच पर भूनकर एक गहरे, समृद्ध स्वाद और कुरकुरी बनावट दी जाती है। यह मसालेदार और खुशबूदार डिश चावल, पराठा या अप्पम के साथ बेहतरीन होती है।\r\n\r\n', 'لحم الضأن بالفلفل الأسود هو طبق حار ولذيذ يتم فيه طهي قطع لحم الضأن الطرية مع الفلفل الأسود، مجموعة من التوابل العطرية، وأوراق الكاري الطازجة. يتم تحميص اللحم حتى يصبح ذا نكهة غنية وقشرة خارجية مقرمشة. يُقدم عادةً مع الأرز أو خبز البراتا أو الأبهام.', 0),
(92, 21, 0, 0, 0, 'imresizer-1733752069122.jpg', 'imresizer-17337520691221.jpg', 'imresizer-17337520691222.jpg', 'imresizer-17337520691223.jpg', 'imresizer-17337520691224.jpg', 0, 0, 'veg', 'ബട്ടർസ്കാച്ച് മിൽക്‌ഷേക്ക്', ' Butterscotch Milkshake', ' बटरस्कॉच मिल्कशेक', 'ميلك شيك بالباتر سكوتش', 'ബട്ടർസ്കാച്ച് മിൽക്‌ഷേക്ക് ഒരു ക്രീമിയമായ, രുചികരമായ പാനീയം ആണ്, എന്നാൽ സമൃദ്ധമായ ബട്ടർസ്കാച്ച് സിറപ്പ്, വെനിലാ ഐസ്‌ക്രീം, തണുത്ത പാൽ എന്നിവ ചേർത്ത് തയ്യാറാക്കുന്നു. സമമായ, രസകരമായ തകരാറിനൊപ്പം ബട്ടർസ്കാച്ചിന്റെ മധുരവും ബട്ടർ ഫ്ലേവറും ഈ പാനീയത്തെ വിശേഷിപ്പിക്കുന്നു. ക്രീം നൽകി, കറാമൽ അല്ലെങ്കിൽ ബട്ടർസ്കാച്ച് ചങ്കുകൾ ഉപയോഗിച്ച് ഗാർണിഷ് ചെയ്തുള്ളത് ഒരു മികച്ച അനുഭവമാണ്.', 'Butterscotch Milkshake is a creamy and indulgent drink made with rich butterscotch syrup, vanilla ice cream, and chilled milk. The smooth and velvety texture, combined with the sweet and buttery flavor of butterscotch, makes it a refreshing and delicious treat. Topped with whipped cream and a sprinkle of caramel or butterscotch chunks, it’s a perfect drink to enjoy any time of the day.', 'बटरस्कॉच मिल्कशेक एक क्रीमी और स्वादिष्ट पेय है जो समृद्ध बटरस्कॉच सिरप, वेनिला आइसक्रीम, और ठंडे दूध से तैयार किया जाता है। इसकी मुलायम और मलाईदार बनावट, साथ ही बटरस्कॉच का मीठा और मक्खन जैसा स्वाद, इसे एक ताजगी से भरपूर और स्वादिष्ट व्यंजन बनाता है। इसे व्हिप्ड क्रीम और कैरामेल या बटरस्कॉच के टुकड़ों से सजाकर परोसा जाता है, जो इसे हर समय आनंद लेने के लिए एक आदर्श पेय बनाता है।\r\n\r\n', ' ميلك شيك بالباتر سكوتش هو مشروب كريمي ولذيذ يتم تحضيره باستخدام شراب الباتر سكوتش الغني، آيس كريم الفانيليا، والحليب البارد. يتميز بملمسه الناعم والكريمي، مع نكهة الباتر سكوتش الحلوة والزبدية التي تجعله مشروباً منعشاً ولذيذاً. يتم تزيينه بالكريمة المخفوقة ورشة من الكراميل أو قطع الباتر سكوتش، مما يجعله مشروباً مثالياً للاستمتاع به في أي وقت من اليوم.\r\n\r\n', 0),
(86, 19, 0, 0, 0, 'imresizer-1733745961094.jpg', 'imresizer-17337459610941.jpg', 'imresizer-17337459610942.jpg', 'imresizer-17337459610943.jpg', 'imresizer-17337459610944.jpg', 0, 0, 'non-veg', 'നൂഡിൽസ് പ്രൗൺസ്', 'Noodles Prawns', 'नूडल्स प्रॉन्स', ' نودلز بالروبيان', ' നൂഡിൽസ് പ്രൗൺസ് ഒരു രുചികരമായ വിഭവമാണ്, മൃദുവായ പ്രൗൺസ് നൂഡിൽസുമായി ചേര്ത്ത് പച്ചക്കറികളും, മസാലകളും ചേർത്ത് പാകം ചെയ്യുന്നു. പ്രൗൺസ് നന്നായി പാകം ചെയ്യപ്പെടുകയും, നൂഡിൽസ് പച്ചക്കറികളുമായി വഴറ്റി, ഒരു സമ്പൂർണ്ണമായ രുചിയുള്ള ഭക്ഷണമായി മാറുന്നു. സമുദ്രഭോജനം, നൂഡിൽസ് എന്നിവയുടെ മികച്ച സംയോജനം, രുചിയും കൃത്യവുമാണ്.', ' Noodles Prawns is a delicious and savory dish that combines tender prawns with stir-fried noodles, seasoned with a blend of aromatic spices and sauces. The prawns are cooked to perfection, and the noodles are stir-fried with vegetables, creating a flavorful and satisfying meal. This dish is a perfect blend of seafood and noodles, offering a rich taste and texture that will delight your taste buds.', 'नूडल्स प्रॉन्स एक स्वादिष्ट और सॉस में पकाया गया व्यंजन है, जिसमें नरम प्रॉन्स को नूडल्स के साथ तला जाता है, और विभिन्न मसालों के मिश्रण से सजाया जाता है। प्रॉन्स पूरी तरह से पकाए जाते हैं, और नूडल्स को ताजे सब्जियों के साथ हल्का सा भूनकर परोसा जाता है, जिससे यह एक स्वादिष्ट और संतोषजनक भोजन बन जाता है। यह समुद्री भोजन और नूडल्स का बेहतरीन संयोजन है।', 'نودلز بالروبيان هو طبق لذيذ ولذيذ حيث يتم دمج الروبيان الطري مع النودلز المقلي، ويُتبل بمزيج من التوابل العطرية والصلصات. يتم طهي الروبيان بشكل مثالي، ويتم قلي النودلز مع الخضار، مما يخلق وجبة لذيذة ومرضية. هذا الطبق هو مزيج مثالي من المأكولات البحرية والنودلز، ويقدم طعماً وملمساً غنياً يرضي براعم التذوق.', 0),
(87, 19, 0, 0, 0, 'imresizer-1733747445498.jpg', 'imresizer-17337474454981.jpg', 'imresizer-17337474454982.jpg', 'imresizer-17337474454983.jpg', 'imresizer-17337474454984.jpg', 0, 0, 'veg', ' വെജ് നൂഡിൽസ്', 'Veg Noodles', ' वेज नूडल्स', 'نودلز بالخضار', 'വെജ് നൂഡിൽസ് ഒരു രുചികരവും ആരോഗ്യകരവുമായ വിഭവമാണ്, പച്ചക്കറികളായ കാരറ്റ്, ബെൽ പെപ്പർ, കാബേജ്, പച്ചമുളക് എന്നിവ ചേർത്ത് നൂഡിൽസ് വഴറ്റി പാകം ചെയ്യുന്നു. ഈ നൂഡിൽസ് ചീനിക്കൂട്ടം, ഇഞ്ചി, വെളുത്തുള്ളി, മസാലകളുടെ സദ്യമായ ലഹരിയാൽ സ്വാദിഷ്ടമായ ഒരു വിഭവമാണ്. നൂഡിൽസ് ഒരു കേക്കുകൾ അല്ലെങ്കിൽ പ്രധാന കോഴ്സായി കഴിക്കാൻ അനുയോജ്യമാണ്', ' Veg Noodles is a delightful and healthy dish made by stir-frying noodles with a variety of fresh vegetables like carrots, bell peppers, cabbage, and beans. The noodles are seasoned with a combination of soy sauce, ginger, garlic, and aromatic spices, creating a flavorful, colorful, and nutritious meal. Perfect as a snack or main course, Veg Noodles offer a delicious taste with every bite.\r\n\r\n', ' वेज नूडल्स एक स्वादिष्ट और स्वास्थ्यवर्धक व्यंजन है, जिसमें ताजे सब्जियों जैसे गाजर, बेल पेपर, गोभी और बीन्स के साथ नूडल्स को हल्का सा भूनकर तैयार किया जाता है। नूडल्स को सोया सॉस, अदरक, लहसुन और मसालों के मिश्रण से सजाया जाता है, जो इसे एक स्वादिष्ट और पौष्टिक भोजन बनाता है। वेज नूडल्स एक बेहतरीन स्नैक या मुख्य व्यंजन के रूप में परोसा जाता है।\r\n\r\n', ' نودلز بالخضار هو طبق لذيذ وصحي يتم تحضيره من خلال قلي النودلز مع مجموعة متنوعة من الخضروات الطازجة مثل الجزر، الفلفل الحلو، الكرنب، والفاصوليا. يتم تتبيل النودلز بمزيج من صوص الصويا، الزنجبيل، الثوم، والتوابل العطرية، مما يخلق وجبة لذيذة وملونة ومغذية. يعد نودلز بالخضار خيارًا مثاليًا كوجبة خفيفة أو طبق رئيسي', 0),
(88, 19, 0, 0, 0, 'imresizer-1733747858530.jpg', 'imresizer-17337478585301.jpg', 'imresizer-17337478585302.jpg', 'imresizer-17337478585303.jpg', 'imresizer-17337478585304.jpg', 0, 0, 'non-veg', 'ചിക്കൻ നൂഡിൽസ്', 'Chicken Noodles', 'चिकन नूडल्स', 'نودلز بالدجاج', ' ചിക്കൻ നൂഡിൽസ് ഒരു രുചികരവും പൂരിപ്പിക്കുന്നവുമായ വിഭവമാണ്, മൃദുവായ ചിക്കൻ കഷണങ്ങൾ നൂഡിൽസിനൊപ്പം, പച്ചക്കറികൾ (കാരണ, ബെൽ പെപ്പർ, കാബേജ്) ചേർത്ത് വഴറ്റി പാകം ചെയ്യുന്നു. ചീനിക്കൂട്ടം, ഇഞ്ചി, വെളുത്തുള്ളി, മസാലകൾ എന്നിവ ചേർത്തുള്ള ഈ വിഭവം രുചികരവും സുഗന്ധപ്രദവുമാണ്. ജ്യൂസിയമായ ചിക്കനും നന്നായി പാകം ചെയ്ത നൂഡിൽസും കൂട്ടിച്ച് ഒരു സമ്പൂർണ്ണമായ അനുഭവം നൽകുന്നു.', ' Chicken Noodles is a flavorful and filling dish made by stir-frying tender pieces of chicken with noodles and a mix of fresh vegetables like carrots, bell peppers, and cabbage. It’s seasoned with soy sauce, ginger, garlic, and a variety of spices, creating a savory and aromatic meal. The combination of juicy chicken and perfectly cooked noodles offers a satisfying and delicious experience.', 'चिकन नूडल्स एक स्वादिष्ट और संतोषजनक व्यंजन है जिसमें नरम चिकन के टुकड़े नूडल्स और ताजे सब्जियों जैसे गाजर, बेल पेपर और गोभी के साथ हल्का सा भूनकर तैयार किए जाते हैं। इसे सोया सॉस, अदरक, लहसुन, और मसालों के मिश्रण से सजाया जाता है, जो इसे एक लाजवाब और खुशबूदार डिश बनाता है। चिकन और नूडल्स का संयोजन स्वाद और पोषण का बेहतरीन मिश्रण है।', 'نودلز بالدجاج هو طبق لذيذ ومشبع يتم تحضيره عن طريق قلي قطع دجاج طرية مع النودلز ومجموعة من الخضروات الطازجة مثل الجزر، الفلفل الحلو، والملفوف. يتم تتبيله بصوص الصويا، الزنجبيل، الثوم، ومجموعة من التوابل العطرية، مما يخلق وجبة شهية وعطرية. يجمع هذا الطبق بين الدجاج العصير والنودلز المطهوة بشكل مثالي ليقدم تجربة لذيذة وممتعة.\r\n\r\n', 0),
(89, 19, 0, 0, 0, 'imresizer-1733748252337.jpg', 'imresizer-17337482523371.jpg', 'imresizer-17337482523372.jpg', 'imresizer-17337482523373.jpg', 'imresizer-17337482523374.jpg', 0, 0, 'non-veg', 'സ്കെജ്‌വാൻ റൈസ് മിക്സ്', 'Schezwan Rice Mixed', 'स्केज़वान राइस मिक्स', 'أرز سيتشوان مختلط ', 'സ്കെജ്‌വാൻ റൈസ് മിക്സ് ഒരു ഉഗ്രമായ, രുചികരമായ വിഭവമാണ്, സ്കെജ്‌വാൻ സോസ്, പച്ചക്കറികൾ, മസാലകൾ എന്നിവ ചേർത്ത് കുരുക്കി പാകം ചെയ്ത അരിയോടുകൂടി. സ്കെജ്‌വാൻ സോസിന്റെ ആഴമുള്ള, മസാല നിറഞ്ഞ രുചികൾ അരിയിലേക്ക് ഉരുകുകയും ഒരു തൊട്ടിന്റെ പുണ്യമായ വിഭവമായി മാറുന്നു. ഇത് സ്പ്രിംഗ് ഒണ്യൺസിന്റെ ഇളവുമായി ഗാർണിഷ് ചെയ്യുകയും ഏഷ്യൻ വിഭവങ്ങളോടൊപ്പം അല്ലെങ്കിൽ സ്വതന്ത്രമായി ഒരു റുചികരമായ ഭക്ഷണമായി കഴിക്കാൻ അനുയോജ്യമാണ്', 'Schezwan Rice Mixed is a vibrant and spicy dish made by stir-frying rice with a blend of Schezwan sauce, vegetables, and aromatic spices. The rice absorbs the tangy, spicy flavors of the Schezwan sauce, creating a deliciously bold and flavorful meal. It is typically garnished with spring onions and served as a perfect accompaniment to any Asian-inspired meal or enjoyed on its own for a satisfying treat.', ' स्केज़वान राइस मिक्स एक मसालेदार और स्वादिष्ट व्यंजन है जिसमें चावल को स्केज़वान सॉस, सब्जियों और मसालों के मिश्रण के साथ हल्का भूनकर तैयार किया जाता है। चावल स्केज़वान सॉस के तीव्र और मसालेदार स्वाद को सोखकर एक बेहतरीन, स्वादिष्ट डिश बन जाता है। इसे अक्सर स्प्रिंग ऑनियन्स से सजा कर एशियाई भोजन के साथ या अकेले एक संतोषजनक स्नैक के रूप में परोसा जाता है।', 'أرز سيتشوان المختلط هو طبق حار ولذيذ يتم تحضيره عن طريق قلي الأرز مع صوص سيتشوان، الخضروات، والتوابل العطرية. يمتص الأرز النكهات الحامضية والتوابل الحارة لصوص سيتشوان، مما يجعله وجبة شهية مليئة بالنكهات القوية. يتم تزيينه عادة بالبصل الأخضر ويُقدم مع الأطباق الآسيوية أو كوجبة خفيفة لذيذة.\r\n\r\n', 0),
(90, 19, 0, 0, 0, 'imresizer-1733748682537.jpg', 'imresizer-17337486825371.jpg', 'imresizer-17337486825372.jpg', 'imresizer-17337486825373.jpg', 'imresizer-17337486825374.jpg', 0, 0, 'veg', ' വെജ് പുലാവോ', 'Veg Pulao', ' वेज पुलाव', 'بيج بيلاو', 'വെജ് പുലാവോ ഒരു സുഗന്ധവും രുചികരവുമായ അരിസമ്മിശ്രിതം, കാരറ്റ്, പീസുകൾ, വഴുതന, ആലൂ എന്നിവ പോലുള്ള പച്ചക്കറികളുമായി അരി പാകം ചെയ്യുന്നു. ഉത്തമമായ മസാലകൾ (ചിറ, ഗ്രാമ്പൂ, ഏലക്ക) ഉപയോഗിച്ച് ഇത് ഇഴചേർന്നുണ്ടാക്കിയ ഒരു സ്വാദിഷ്ടമായ വിഭവമാണ്. പച്ചക്കറികളും അരിയും ചേർന്ന് ഉത്തമമായ പുടിഞ്ഞൊരു വിഭവമാക്കുന്നു, ഇത് കറി, റൈത, അല്ലെങ്കിൽ സ്വതന്ത്രമായി ആസ്വദിക്കാൻ അനുയോജ്യമാണ്.', 'Veg Pulao is a fragrant and flavorful rice dish made by cooking rice with a mix of fresh vegetables such as carrots, peas, beans, and potatoes. Seasoned with aromatic spices like cinnamon, cloves, and cardamom, this dish is lightly spiced and aromatic. The vegetables blend beautifully with the rice, making it a perfect dish to pair with curries, raita, or enjoy on its own.', ': वेज पुलाव एक सुगंधित और स्वादिष्ट चावल का व्यंजन है जिसमें ताजे सब्जियों जैसे गाजर, मटर, बीन्स, और आलू के साथ चावल पकाए जाते हैं। यह दारचीनी, लौंग, इलायची जैसी सुगंधित मसालों से सजा हुआ होता है और हल्का मसालेदार होता है। सब्जियाँ चावलों के साथ बखूबी मिल जाती हैं, जिससे यह करी, रायता के साथ या अकेले भी आनंद लेने के लिए एक बेहतरीन व्यंजन बनता है।', 'بيج بيلاو هو طبق من الأرز العطري واللذيذ يتم تحضيره عن طريق طهي الأرز مع مزيج من الخضروات الطازجة مثل الجزر، البازلاء، الفاصوليا، والبطاطا. يتم تتبيله بتوابل عطرية مثل القرفة، القرنفل، والحبهان، مما يجعله طبقًا خفيفًا ومليئًا بالنكهات. تمزج الخضروات بشكل رائع مع الأرز، مما يجعله طبقًا مثاليًا يتم تقديمه مع الكاري، الرايتا، أو يتم الاستمتاع به بمفرده.\r\n\r\n', 0),
(91, 19, 4, 0, 0, 'imresizer-1733749067777.jpg', 'imresizer-17337490677771.jpg', 'imresizer-17337490677772.jpg', 'imresizer-17337490677773.jpg', 'imresizer-17337490677774.jpg', 0, 0, 'non-veg', 'സ്കെജ്‌വാൻ നൂഡിൽസ് ചിക്കൻ', 'Schezwan Noodles Chicken', 'स्केज़वान नूडल्स चिकन', 'نودلز سيتشوان بالدجاج', 'സ്കെജ്‌വാൻ നൂഡിൽസ് ചിക്കൻ ഒരു ഉഗ്രമായ, രുചികരമായ വിഭവമാണ്, മൃദുവായ ചിക്കൻ കഷണങ്ങൾ നൂഡിൽസിനൊപ്പം, പച്ചക്കറികൾ ചേർത്ത്, സ്വാദിഷ്ടമായ സ്കെജ്‌വാൻ സോസുമായി വഴറ്റി പാകം ചെയ്യുന്നു. സോസിന്റെ മസാല നിറഞ്ഞ, തിളപ്പിക്കുന്ന, ഒപ്പം കട്ടിയുള്ള രുചികൾ നൂഡിൽസിന് ഒരു പ്രത്യേക അന്നഭംഗി നൽകുന്നു. സ്പ്രിംഗ് ഒണ്യൺസ് ഉപയോഗിച്ച് ഗാർണിഷ് ചെയ്യുന്നു, ഇത് ഒരു ഉഗ്രമായ നൂഡിൽസ് ആന്റ് ചിക്കൻ സംയോജനം ആണ്.', 'Schezwan Noodles Chicken is a spicy and flavorful dish made by stir-frying tender pieces of chicken with noodles, fresh vegetables, and a generous amount of Schezwan sauce. The combination of savory, spicy, and tangy flavors from the sauce adds a bold and aromatic kick to the noodles. The dish is garnished with spring onions, making it a perfect fusion of spicy noodles and tender chicken.', 'स्केज़वान नूडल्स चिकन एक मसालेदार और स्वादिष्ट व्यंजन है जिसमें नरम चिकन के टुकड़े नूडल्स, ताजे सब्जियों और स्केज़वान सॉस के साथ भूनकर तैयार किए जाते हैं। सॉस के तीव्र, मसालेदार, और खट्टे स्वादों से नूडल्स को एक बेहतरीन खुशबू और स्वाद मिलता है। इसे स्प्रिंग अनियन्स से सजा कर परोसा जाता है, जो चिकन और नूडल्स का मसालेदार संयोजन बनाता है।', 'نودلز سيتشوان بالدجاج هو طبق حار ولذيذ يتم تحضيره عن طريق قلي قطع الدجاج الطرية مع النودلز والخضروات الطازجة، ويُضاف إليها كمية سخية من صوص سيتشوان. مزيج النكهات المالحة، الحارة، والحامضة من الصوص يضيف طعمًا قويًا وعطريًا للنودلز. يتم تزيين الطبق بالبصل الأخضر ليكون مزيجًا مثاليًا من النودلز الحارة والدجاج الطري.\r\n\r\n', 0),
(93, 21, 0, 0, 0, 'imresizer-1733752322819.jpg', 'imresizer-17337523228191.jpg', 'imresizer-17337523228192.jpg', 'imresizer-17337523228193.jpg', 'imresizer-17337523228194.jpg', 0, 0, 'veg', 'ചോക്ലേറ്റ് മിൽക്‌ഷേക്ക്', 'Chocolate Milkshake', 'चॉकलेट मिल्कशेक ', 'ميلك شيك بالشوكولاتة', ' ചോക്ലേറ്റ് മിൽക്‌ഷേക്ക് ഒരു സമൃദ്ധമായ, ക്രീമിയുള്ള പാനീയം ആണ്, ദൃഢമായ ചോക്ലേറ്റ് സിറപ്പ്, തണുത്ത പാൽ, വെനിലാ ഐസ്‌ക്രീം എന്നിവ ചേർത്ത് തയ്യാറാക്കുന്നു. മധുരമായ ചോക്ലേറ്റ് രുചിയും ക്രീമിയുള്ള പാൽ നനച്ചുമറിയുന്ന കുസുപ്പും ചേർന്ന് ഇത് ഒരു വിശേഷമായ, രുചികരമായ അനുഭവം നൽകുന്നു. ക്രീം നൽകിയുള്ള topping ഉം ചോക്ലേറ്റ് സ്പ്രിങ്കിളുകൾ അല്ലെങ്കിൽ ചോക്ലേറ്റ് ചങ്കുകൾ ഉപയോഗിച്ച് ഗാർണിഷ് ചെയ്യുന്നത്, ഈ പാനീയം കൂടുതൽ ആസ്വാദ്യമായുമാക്കുന്നു.', ' Chocolate Milkshake is a rich and creamy beverage made with smooth chocolate syrup, chilled milk, and vanilla ice cream. The perfect blend of sweet chocolate and creamy milk creates a deliciously indulgent treat. Topped with whipped cream and chocolate sprinkles or chunks, it’s a decadent drink that satisfies your chocolate cravings and refreshes you at the same time.', ': चॉकलेट मिल्कशेक एक समृद्ध और क्रीमी पेय है, जिसे चिकनी चॉकलेट सिरप, ठंडे दूध और वेनिला आइसक्रीम से तैयार किया जाता है। मीठी चॉकलेटी और क्रीमी दूध की परफेक्ट मिलावट इसे एक स्वादिष्ट और लाजवाब अनुभव बनाती है। व्हिप्ड क्रीम और चॉकलेट स्प्रिंकल्स या चॉकलेट के टुकड़ों से सजाया गया यह पेय चॉकलेट के शौकिनों के लिए एक आदर्श और ताजगी भरा आनंद है।', 'ميلك شيك بالشوكولاتة هو مشروب كريمي وغني يتم تحضيره باستخدام شراب الشوكولاتة السلس، الحليب البارد، وآيس كريم الفانيليا. يمزج طعم الشوكولاتة الحلو مع الحليب الكريمي ليخلق تجربة لذيذة وغنية. يتم تزيينه بالكريمة المخفوقة ورشات من الشوكولاتة أو قطع الشوكولاتة، مما يجعله مشروبًا مثاليًا لمحبي الشوكولاتة.\r\n\r\n', 0);
INSERT INTO `product` (`product_id`, `category_id`, `subcategory_id`, `store_id`, `price`, `image`, `image1`, `image2`, `image3`, `image4`, `is_customizable`, `is_addon`, `product_veg_nonveg`, `product_name_ma`, `product_name_en`, `product_name_hi`, `product_name_ar`, `product_desc_ma`, `product_desc_en`, `product_desc_hi`, `product_desc_ar`, `is_active`) VALUES
(94, 21, 0, 0, 0, 'imresizer-1733763997082.jpg', 'imresizer-17337639970821.jpg', 'imresizer-17337639970822.jpg', 'imresizer-17337639970823.jpg', 'imresizer-17337639970824.jpg', 0, 0, 'veg', 'വാനിലമിൽക്‌ഷേക്ക് (', 'Vanilla Milkshake', 'वनीला मिल्कशेक', ' ميلك شيك بالفانيليا', 'വാനില മിൽക്‌ഷേക്ക് ഒരു പരമ്പരാഗതവും ക്രീമിയുമായ പാനീയം ആണ്, സമൃദ്ധമായ വെനില ഐസ്‌ക്രീം, തണുത്ത പാൽ, വെനില എസൻസിന്റെ ഗന്ധം എന്നിവ ചേർത്താണ് ഇത് തയ്യാറാക്കുന്നത്. സSmooth ആയും മധുരമുള്ള ചേരുവകൾ ചേർന്ന ഇത് ആരും ആസ്വദിക്കാവുന്ന ഒരു കുളിർപാനീയമാണ്. Whipped ക്രീം ഉപയോഗിച്ചും cherry അല്ലെങ്കിൽ sprinkles ഉപയോഗിച്ചും ഗാർണിഷ് ചെയ്യുന്നത്, ഇത് കൂടുതൽ ആകർഷകമാക്കുന്നു.', 'Vanilla Milkshake is a classic and creamy beverage made with rich vanilla ice cream, chilled milk, and a hint of vanilla essence. Its smooth and velvety texture, combined with the delicate sweetness of vanilla, makes it a timeless treat. Perfectly refreshing, it’s often topped with whipped cream and garnished with a cherry or sprinkles for an extra touch of indulgence.\r\n\r\n', 'वनीला मिल्कशेक एक पारंपरिक और क्रीमी पेय है, जिसे समृद्ध वनीला आइसक्रीम, ठंडे दूध और हल्की वनीला एसेंस के साथ तैयार किया जाता है। इसका मुलायम और मलाईदार बनावट वनीला की मीठी सुगंध के साथ मिलकर इसे एक क्लासिक पेय बनाता है। इसे अक्सर व्हिप्ड क्रीम, चेरी, या स्प्रिंकल्स से सजाया जाता है, जो इसे और भी विशेष बनाता है।', 'ميلك شيك بالفانيليا هو مشروب كلاسيكي وكريمي يتم تحضيره باستخدام آيس كريم الفانيليا الغني، الحليب البارد، وقليل من خلاصة الفانيليا. يتميز بملمسه الناعم ونكهته الحلوة التي تجعله مشروبًا منعشًا لا يُنسى. غالبًا ما يُزين بالكريمة المخفوقة والكرز أو الرشات لإضافة لمسة من الفخامة.\r\n\r\n', 0),
(95, 21, 0, 0, 0, 'imresizer-1734268723588.jpg', 'JIElmAdzasTcxbRXcropped-image.jpg', '1tLigf5Yv8Gjz7y6cropped-image.jpg', 'fCSP7v9XqWI5nMmicropped-image.jpg', 'rbvX7wSZ8n0TBOEkcropped-image.jpg', 0, 0, 'veg', 'പിസ്ത മിൽക്‌ഷേക്ക്', 'Pista Milkshake', 'पिस्ता मिल्कशेक', 'ميلك شيك بالفستق', 'പിസ്ത മിൽക്‌ഷേക്ക് ഒരു കുളിർപ്രദവും ക്രീമിയുമായ പാനീയം ആണ്, സമൃദ്ധമായ പിസ്ത ഐസ്‌ക്രീം, തണുത്ത പാൽ, പിസ്ത എസൻസിന്റെ കുറച്ചുപേർ ചേർത്ത് തയ്യാറാക്കുന്നതാണ്. കൃത്യമായ അളവിൽ ചേര്ത്തും പൊരുത്തമാക്കിയും ഇത് ആലവോളമെത്തുന്ന ഒരു രുചികരമായ പാനീയമാണ്. മുകളിലായി ചിരകിയ പിസ്തയും സിറപ്പും ചേർത്ത് അലങ്കരിച്ച ഈ മിൽക്‌ഷേക്ക്, പിസ്ത ആരാധകർക്ക് അനുയോജ്യമായൊരു പ്രത്യേക കുളിർപാനീയമാണ്.', 'Pista Milkshake is a refreshing and creamy beverage made with rich pistachio ice cream, chilled milk, and a touch of pistachio essence. Blended to perfection, this milkshake offers a nutty and subtly sweet flavor with a velvety texture. Garnished with chopped pistachios and a drizzle of syrup, it’s a delightful drink for pistachio lovers and a perfect treat for any time of the day.', 'पिस्ता मिल्कशेक एक ताज़ा और क्रीमी पेय है, जिसे समृद्ध पिस्ता आइसक्रीम, ठंडे दूध, और पिस्ता एसेंस की हल्की मात्रा से तैयार किया जाता है। इस मिल्कशेक में पिस्ते का हल्का मीठा और नटी स्वाद होता है, जो इसे खास बनाता है। कटे हुए पिस्ता और सिरप के साथ सजाया गया यह पेय पिस्ता प्रेमियों के लिए एक परफेक्ट ट्रीट है।\r\n\r\n', 'ميلك شيك بالفستق هو مشروب منعش وكريمي يتم تحضيره باستخدام آيس كريم الفستق الغني، الحليب البارد، وقليل من خلاصة الفستق. يتميز بنكهة الفستق الغنية والحلاوة الخفيفة مع قوام مخملي. يُزين بشرائح الفستق المفروم ورذاذ من الشراب، مما يجعله خيارًا رائعًا لعشاق الفستق ومتعة مثالية في أي وقت.\r\n\r\n', 0),
(101, 22, 4, 0, 0, 'imresizer-1733748682537.jpg', 'imresizer-1733721117783.jpg', NULL, NULL, NULL, 0, 0, 'non-veg', 'അമ്പൂർ ബിരിയാണി', ' Ambur Biryani', 'अंबूर बिरयानी', 'برياني أمبور', 'അമ്പൂർ ബിരിയാണി തമിഴ്‌നാട്ടിലെ അമ്പൂർ നഗരത്തിൽ നിന്നുള്ള ഒരു സുപ്രസിദ്ധമായ ദക്ഷിണേന്ത്യൻ വിഭവമാണ്. സുഗന്ധമുള്ള സീരഗ സംഭ അരിയും, മൃദുവായ മാംസവും, പ്രത്യേകമായ മസാലകളുടെയും ചേരുവകളുടെയും സങ്കലനം ചേർത്ത് ഇത് തയ്യാറാക്കുന്നു. പരമ്പരാഗതമായി മട്ട് ചൂളയിൽ വേവിച്ച ഈ ബിരിയാണിക്ക് മറ്റ് ബിരിയാണികളിൽ നിന്നും വ്യത്യസ്തമായ സവിശേഷ രുചിയുണ്ട്', ' Ambur Biryani is a flavorful and aromatic South Indian delicacy originating from the town of Ambur in Tamil Nadu. Made with fragrant Seeraga Samba rice, succulent pieces of meat, and a unique blend of spices, it has a distinctive taste that sets it apart from other biryanis. Traditionally cooked over a wood fire, this biryani is light yet rich in flavor, making it a beloved dish for food lovers.', 'अंबूर बिरयानी दक्षिण भारत का एक प्रसिद्ध व्यंजन है, जो तमिलनाडु के अंबूर शहर से उत्पन्न हुआ है। इसे सुगंधित सीरागा सांबा चावल, नरम मांस के टुकड़े, और खास मसालों के मिश्रण से बनाया जाता है। लकड़ी की आग पर पारंपरिक रूप से पकाई जाने वाली यह बिरयानी हल्की होने के बावजूद स्वाद में भरपूर होती है, और बिरयानी प्रेमियों के बीच बेहद लोकप्रिय है।', ' برياني أمبور هو طبق شهي وعطري من جنوب الهند يعود أصله إلى مدينة أمبور في تاميل نادو. يتم تحضيره باستخدام أرز سيراجا سامبا المعطر، قطع لحم طرية، ومزيج فريد من التوابل. يتم طهيه تقليديًا على نار الحطب، مما يمنحه طعمًا مميزًا يختلف عن باقي أنواع البرياني. يتميز هذا الطبق بخفته وغناه بالنكهات، مما يجعله محبوبًا لعشاق الطعام.\r\n\r\n', 0),
(102, 23, 4, 0, 0, 'imresizer-1734525717399.jpg', 'imresizer-1734525717399.jpg', 'imresizer-1734525717399.jpg', 'imresizer-1734411622831.jpg', 'imresizer-1733745961094.jpg', 0, 0, 'non-veg', 'ചപ്പാത്തിയും ചിക്കൻ കറിയും', 'Chapathi with Butter Chicken', ' चपाती और चिकन करी', 'شباتي مع كاري الدجاج', 'ചപ്പാത്തിയും ചിക്കൻ കറിയും രുചികരമായ ഒരു ഇന്ത്യൻ ക്ലാസിക് ഭക്ഷണ യോജിപ്പാണ്. മൃദുവായ ഗോതമ്പ് ചപ്പാത്തി, രുചിയേറിയ മസാലകൾ ചേർത്തും ചാറുള്ള ഗ്രേവിയിലുണ്ടാക്കിയ മൃദുവായ കോഴി കറിയും ചേർന്നതാണ് ഈ കിടിലൻ കൂട്ടുകെട്ട്. ദൈനംദിന ഭക്ഷണത്തിൽ കൂടുതൽ രുചികരമായും നിറവുള്ളതുമായ അനുഭവമാണ് ഇത് നൽകുന്നത്.\r\n\r\n', 'Chapati with Chicken Curry is a classic combination of soft, whole wheat flatbread served with a flavorful and spicy chicken curry. The chapati\'s light and soft texture perfectly complements the rich and aromatic curry made with tender chicken pieces, a blend of spices, and a luscious gravy. This wholesome pairing is a staple in Indian cuisine, enjoyed for its hearty and satisfying taste.', ' चपाती और चिकन करी भारतीय भोजन का एक क्लासिक संयोजन है। नरम और हल्की गेहूं की चपाती, मसालों के मिश्रण से बनी स्वादिष्ट और सुगंधित चिकन करी के साथ परोसी जाती है। कोमल चिकन के टुकड़े और समृद्ध ग्रेवी इस व्यंजन को भरपूर और संतोषजनक बनाते हैं, जो रोज़मर्रा के खाने के लिए एक आदर्श विकल्प है।\r\n\r\n', 'شباتي مع كاري الدجاج هو مزيج كلاسيكي من المطبخ الهندي. يتم تقديم خبز الشباتي الطري المصنوع من دقيق القمح الكامل مع كاري الدجاج اللذيذ والمليء بالتوابل العطرية. يتميز الطبق بقطع دجاج طرية وصلصة غنية تجعله وجبة مشبعة ولذيذة للغاية.\r\n\r\n', 0),
(103, 23, 8, 41, 0, 'imresizer-1734581173336.jpg', 'imresizer-1734581142655.jpg', 'imresizer-1734581003284.jpg', 'imresizer-1734580989845.jpg', 'imresizer-1734580744264.jpg', 0, 0, 'non-veg', 'പൊറോട്ടയും ബീഫും', 'Poratta  and Beef', 'परोटा और बीफ़', 'باراتا مع اللحم البقري', 'പൊറോട്ടയും ബീഫും ഒരു രുചികരമായ ദക്ഷിണേന്ത്യൻ വിഭവമാണ്. ചുരണ്ടിയ പരതകളുള്ള പൊറോട്ടയും, മസാലകളുടെ സമൃദ്ധിയിൽ സുന്ദരമായി വേവിച്ച ബീഫും ചേർന്ന ഈ വിഭവം, സമൃദ്ധവും രുചികരവുമായ ഒരു ഭക്ഷണ അനുഭവം നൽകുന്നു. മൃദുവായ പൊറോട്ടയും ചാറുള്ള ബീഫ് കറിയും മികച്ച അനുയോജ്യമാണ്.', 'Poratta with Beef is a delectable combination of flaky, layered flatbread served alongside tender, flavorful beef cooked in a spicy and aromatic gravy. The soft texture of the Poratta perfectly complements the rich, slow-cooked beef curry, making it a hearty and satisfying meal loved across South India.', 'परोटा और बीफ़ एक स्वादिष्ट दक्षिण भारतीय व्यंजन है। परतदार और मुलायम परोटा को मसालेदार और सुगंधित ग्रेवी में पके नरम बीफ़ के साथ परोसा जाता है। यह व्यंजन अपने समृद्ध स्वाद और संतोषजनक अनुभव के लिए पसंद किया जाता है।', ' باراتا مع اللحم البقري هو طبق شهي من جنوب الهند. يتم تقديم خبز الباراتا المكون من طبقات رقيقة مع لحم البقر الطري المطهو بصلصة غنية ومليئة بالتوابل العطرية. هذا المزيج يوفر وجبة مشبعة ولذيذة يحبها الكثيرون.', 0),
(104, 23, 4, 0, 0, 'imresizer-1734581173336.jpg', 'imresizer-1734581142655.jpg', 'imresizer-1734581003284.jpg', 'imresizer-1734580989845.jpg', 'imresizer-1734580965012.jpg', 0, 0, 'non-veg', 'പൊറോട്ടയും ബീഫും', 'Poratta  and Beef', 'परोटा और बीफ़', 'باراتا مع اللحم البقري', 'പൊറോട്ടയും ബീഫും', 'Poratta  and Beef', 'परोटा और बीफ़', 'باراتا مع اللحم البقري', 0),
(109, 16, 3, 0, 0, 'R8DB3QUvJO7Ykyo9cropped-image.jpg', NULL, NULL, NULL, NULL, 0, 0, 'veg', 'ചപ്പാത്തി', 'Chapathi', 'चपाती', 'تشاباتي', 'ചപ്പാത്തി', 'Chapathi', 'चपाती', 'تشاباتي', 0),
(110, 22, 4, 41, 30, '1tLigf5Yv8Gjz7y6cropped-image.jpg', '6ZstyfURzW49CcIEcropped-image.jpg', '57da47b04ffc597a91d81d3a29ba362b.jpg', '86nRhZKgM2pBA7rvcropped-image.jpg', 'BNcOoz0M7LIWD9xicropped-image.jpg', 0, 0, 'veg', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 1),
(111, 22, 4, 41, 400, 'aadukurumulak.jpg', 'chicken_mandhi3.jpg', 'button_mandhi4.jpg', 'button_mandhi2.jpg', 'egg_roast1.png', 1, 0, 'non-veg', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 1),
(112, 15, 4, 41, 400, '9509fd1b389c7d15eb1c9523d85861e8.jpg', 'a5bc9db4215f91a6e7e75a1c166384b4.jpg', 'aadukurumulak1.jpg', 'breakfast-2408818_12801.jpg', 'BNcOoz0M7LIWD9xicropped-image.jpg', 1, 0, 'veg', 'rfwerew', 'rewr', 'erwer', 'e', 'wer', 'er', 'rewr', 'erewr', 1),
(113, 22, 4, 41, 0, '0ffb84419e290939c1217d6eb70d265e.jpg', '1tLigf5Yv8Gjz7y6cropped-image.jpg', '3a08f3e02d6121b8cf1f011dda16a2ff.jpg', '6ZstyfURzW49CcIEcropped-image.jpg', '6ZstyfURzW49CcIEcropped-image.jpg', 1, 0, 'veg', 'wqe', 'arrrrrrrrrr', 'eqwe', 'wqewe', 'wqewqe', 'wqe', 'qwe', 'qwe', 1),
(114, 22, 3, 41, 0, '0ffb84419e290939c1217d6eb70d265e.jpg', '1af72aa0cf54b6f1da506d3bdc60d0cb.jpg', '2f9a38e7a4c4ae44ffb99af01714e82c.jpg', '7859b3873ffaf1a285c22325f58f420d.jpg', '09163f999ed7055caa977c8e5bfc8a67.jpg', 1, 0, 'veg', 'erwe', 'wwwwwwwww', 'weqwewq', 'weqw', 'eqweqwe', 'qweqwe', 'eqw', 'e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products_addons`
--

DROP TABLE IF EXISTS `products_addons`;
CREATE TABLE IF NOT EXISTS `products_addons` (
  `addon_id` int NOT NULL AUTO_INCREMENT,
  `store_id` int NOT NULL,
  `store_product_id` int NOT NULL,
  `addon_item_id` int NOT NULL,
  `price` double NOT NULL DEFAULT '0',
  `tax_id` double NOT NULL DEFAULT '0',
  `tax_amount` double NOT NULL DEFAULT '0',
  `total_amount` double NOT NULL DEFAULT '0',
  `is_active` int NOT NULL,
  `date_created` datetime NOT NULL,
  `created_by` int NOT NULL,
  `date_modified` datetime NOT NULL,
  `modified_by` int NOT NULL,
  PRIMARY KEY (`addon_id`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_addons`
--

INSERT INTO `products_addons` (`addon_id`, `store_id`, `store_product_id`, `addon_item_id`, `price`, `tax_id`, `tax_amount`, `total_amount`, `is_active`, `date_created`, `created_by`, `date_modified`, `modified_by`) VALUES
(9, 28, 20, 17, 20, 5, 1, 21, 1, '2024-11-30 06:47:54', 0, '2024-11-30 06:47:54', 0),
(8, 28, 20, 18, 40, 5, 2, 42, 1, '2024-11-30 06:47:51', 0, '2024-11-30 06:47:51', 0),
(7, 29, 22, 21, 20, 9, 1.8, 21.8, 1, '2024-11-26 06:39:29', 0, '2024-11-26 06:39:29', 0),
(5, 28, 8, 5, 20, 6, 1.2, 21.2, 1, '2024-11-26 04:26:12', 0, '2024-11-26 04:26:12', 0),
(6, 28, 8, 6, 50, 6, 3, 53, 1, '2024-11-26 04:26:16', 0, '2024-11-26 04:26:16', 0),
(10, 41, 46, 32, 70, 0, 0, 70, 1, '2024-12-07 10:38:11', 0, '2024-12-07 10:38:11', 0),
(11, 41, 46, 54, 50, 0, 0, 0, 1, '2024-12-09 03:44:22', 0, '2024-12-09 03:44:22', 0),
(12, 41, 46, 55, 300, 0, 0, 0, 1, '2024-12-09 03:44:27', 0, '2024-12-09 03:44:27', 0),
(13, 41, 45, 32, 70, 0, 0, 70, 1, '2024-12-09 07:04:35', 0, '2024-12-09 07:04:35', 0),
(14, 41, 45, 54, 50, 0, 0, 50, 1, '2024-12-09 07:04:41', 0, '2024-12-09 07:04:41', 0),
(15, 41, 45, 55, 200, 0, 0, 200, 1, '2024-12-09 07:04:46', 0, '2024-12-09 07:04:46', 0),
(16, 41, 44, 54, 50, 0, 0, 50, 1, '2024-12-09 07:06:42', 0, '2024-12-09 07:06:42', 0),
(17, 41, 44, 32, 70, 0, 0, 70, 1, '2024-12-09 07:06:47', 0, '2024-12-09 07:06:47', 0),
(18, 41, 44, 55, 200, 0, 0, 200, 1, '2024-12-09 07:06:52', 0, '2024-12-09 07:06:52', 0),
(19, 41, 43, 32, 70, 0, 0, 70, 1, '2024-12-09 07:15:12', 0, '2024-12-09 07:15:12', 0),
(20, 41, 43, 54, 50, 0, 0, 50, 1, '2024-12-09 07:15:16', 0, '2024-12-09 07:15:16', 0),
(21, 41, 43, 55, 200, 0, 0, 200, 1, '2024-12-09 07:15:21', 0, '2024-12-09 07:15:21', 0),
(22, 41, 41, 32, 70, 0, 0, 70, 1, '2024-12-09 07:19:07', 0, '2024-12-09 07:19:07', 0),
(23, 41, 41, 54, 50, 0, 0, 70, 1, '2024-12-09 07:19:14', 0, '2024-12-09 07:19:14', 0),
(24, 41, 41, 55, 300, 0, 0, 300, 1, '2024-12-09 07:19:23', 0, '2024-12-09 07:19:23', 0),
(25, 41, 40, 32, 70, 0, 0, 70, 1, '2024-12-09 07:20:03', 0, '2024-12-09 07:20:03', 0),
(26, 41, 40, 54, 70, 0, 0, 70, 1, '2024-12-09 07:20:07', 0, '2024-12-09 07:20:07', 0),
(27, 41, 40, 55, 300, 0, 0, 300, 1, '2024-12-09 07:20:13', 0, '2024-12-09 07:20:13', 0),
(28, 41, 39, 32, 70, 0, 0, 70, 1, '2024-12-09 07:21:06', 0, '2024-12-09 07:21:06', 0),
(29, 41, 39, 54, 70, 0, 0, 70, 1, '2024-12-09 07:21:12', 0, '2024-12-09 07:21:12', 0),
(30, 41, 39, 55, 300, 0, 0, 300, 1, '2024-12-09 07:21:17', 0, '2024-12-09 07:21:17', 0),
(31, 41, 38, 32, 70, 0, 0, 70, 1, '2024-12-09 07:22:02', 0, '2024-12-09 07:22:02', 0),
(32, 41, 38, 54, 70, 0, 0, 70, 1, '2024-12-09 07:22:06', 0, '2024-12-09 07:22:06', 0),
(33, 41, 38, 55, 300, 0, 0, 300, 1, '2024-12-09 07:22:13', 0, '2024-12-09 07:22:13', 0),
(34, 41, 37, 32, 70, 0, 0, 70, 1, '2024-12-09 07:22:46', 0, '2024-12-09 07:22:46', 0),
(35, 41, 37, 54, 70, 0, 0, 70, 1, '2024-12-09 07:22:51', 0, '2024-12-09 07:22:51', 0),
(36, 41, 37, 55, 300, 0, 0, 300, 1, '2024-12-09 07:22:56', 0, '2024-12-09 07:22:56', 0),
(37, 41, 36, 32, 70, 0, 0, 70, 1, '2024-12-09 07:23:31', 0, '2024-12-09 07:23:31', 0),
(38, 41, 36, 54, 70, 0, 0, 70, 1, '2024-12-09 07:23:35', 0, '2024-12-09 07:23:35', 0),
(39, 41, 36, 55, 300, 0, 0, 300, 1, '2024-12-09 07:23:41', 0, '2024-12-09 07:23:41', 0),
(40, 41, 35, 32, 70, 0, 0, 70, 1, '2024-12-09 07:24:18', 0, '2024-12-09 07:24:18', 0),
(41, 41, 35, 54, 70, 0, 0, 70, 1, '2024-12-09 07:24:23', 0, '2024-12-09 07:24:23', 0),
(42, 41, 35, 55, 300, 0, 0, 300, 1, '2024-12-09 07:24:28', 0, '2024-12-09 07:24:28', 0),
(43, 41, 34, 32, 70, 0, 0, 70, 1, '2024-12-09 07:25:11', 0, '2024-12-09 07:25:11', 0),
(44, 41, 34, 54, 70, 0, 0, 70, 1, '2024-12-09 07:25:16', 0, '2024-12-09 07:25:16', 0),
(45, 41, 34, 55, 300, 0, 0, 300, 1, '2024-12-09 07:25:22', 0, '2024-12-09 07:25:22', 0),
(46, 41, 33, 32, 70, 0, 0, 70, 1, '2024-12-09 07:25:32', 0, '2024-12-09 07:25:32', 0),
(47, 41, 33, 54, 70, 0, 0, 70, 1, '2024-12-09 07:25:37', 0, '2024-12-09 07:25:37', 0),
(48, 41, 33, 55, 300, 0, 0, 300, 1, '2024-12-09 07:25:43', 0, '2024-12-09 07:25:43', 0),
(49, 41, 42, 55, 300, 0, 0, 300, 1, '2024-12-09 08:44:16', 0, '2024-12-09 08:44:16', 0),
(50, 41, 42, 54, 70, 0, 0, 70, 1, '2024-12-09 08:44:25', 0, '2024-12-09 08:44:25', 0),
(51, 46, 142, 135, 90, 0, 0, 90, 1, '2024-12-15 14:02:52', 0, '2024-12-15 14:02:52', 0),
(52, 46, 143, 135, 90, 0, 0, 90, 1, '2024-12-15 14:03:43', 0, '2024-12-15 14:03:43', 0),
(53, 46, 144, 135, 90, 0, 0, 90, 1, '2024-12-15 14:04:36', 0, '2024-12-15 14:04:36', 0),
(54, 41, 32, 32, 91, 10, 9, 99, 1, '2024-12-24 09:22:03', 0, '2024-12-24 09:22:03', 0),
(55, 41, 6, 15, 25, 0, 0, 0, 1, '2025-01-04 12:04:42', 0, '2025-01-04 12:04:42', 0),
(56, 41, 6, 16, 30, 0, 0, 0, 1, '2025-01-04 12:04:46', 0, '2025-01-04 12:04:46', 0),
(57, 41, 14, 15, 25, 0, 0, 0, 1, '2025-01-04 13:49:12', 0, '2025-01-04 13:49:12', 0),
(58, 41, 3, 1, 15, 0, 0, 0, 1, '2025-01-07 10:15:54', 0, '2025-01-07 10:15:54', 0),
(59, 41, 23, 28, 0, 10, 0, 0, 1, '2025-01-09 14:54:02', 0, '2025-01-09 14:54:02', 0),
(60, 41, 23, 29, 0, 10, 0, 0, 1, '2025-01-09 14:54:11', 0, '2025-01-09 14:54:11', 0),
(61, 41, 32, 18, 0, 10, 0, 0, 1, '2025-01-10 10:37:02', 0, '2025-01-10 10:37:02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_translations`
--

DROP TABLE IF EXISTS `product_translations`;
CREATE TABLE IF NOT EXISTS `product_translations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int DEFAULT NULL,
  `language` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_translations`
--

INSERT INTO `product_translations` (`id`, `product_id`, `language`, `title`, `description`) VALUES
(7, 3, 'ma', 'പൊറോട്ട', 'മൈദാ മാവും മുട്ട, ഡാൽഡാ (അല്ലെങ്കിൽ എണ്ണ), യീസ്റ്റ് (പുളിപ്പിക്കുന്നതിന്) എന്നിവയും ചേർത്തുണ്ടാക്കുന്ന ആഹാരമാണ് കേരള പൊറോട്ട (പറോട്ട). മാവ് അല്പം പതഞ്ഞതിനുശേഷം കുഴച്ചു പരത്തി വായുവിൽ വീശി എണ്ണ പുരട്ടിയ ഒരു മേശയിൽ അടിച്ച് രണ്ടാക്കി കീറി ...\r\n'),
(3, 2, 'ma', 'ബിരിയാണി', 'അരി കൊണ്ടുണ്ടാക്കുന്ന ഒരു ഭക്ഷണവിഭവമാണ് ബിരിയാണി. അരി, സുഗന്ധവ്യഞ്ജനങ്ങൾ, ഇറച്ചി, പച്ചക്കറികൾ, തൈര് എന്നിവയുടെ'),
(4, 2, 'en', 'Biriyani', 'The term biryani comes from the Farsi phrase birinj biriyan, “fried rice.” Rice is fried'),
(5, 2, 'hi', 'बिरयानी', 'भारतीय उपमहाद्वीप का एक लोकप्रिय व्यंजन है. यह चावल, मसाले, मांस या सब्ज़ियों से मिलकर बना होता है. बिरयानी के बारे में कुछ खास बातेंः'),
(6, 2, 'ar', 'boha', 'The Arabic name for biryani is boha. Biryani is a South Asian dish of meat, fish, eggs, or veg'),
(8, 3, 'en', 'Porotta', 'A layered flatbread from southern India, made with ghee or oil and usually maida or white flour'),
(9, 3, 'hi', 'पराठा', 'परांठा भारतीय रोटी का विशिष्ट रूप है। प्रतिदिन के उत्तरी भारतीय उपमहाद्वीपीय कलेवे में सबसे लोकप्रिय पदार्थ यदि कोई है तो वह परांठा ही ..'),
(10, 3, 'ar', 'باراثا', '-أنظروا إلى هذا ، فطائر بالبطاطا معجون الباذنجان ، حلوى'),
(11, 4, 'ma', NULL, NULL),
(12, 4, 'en', NULL, NULL),
(13, 4, 'hi', NULL, NULL),
(14, 4, 'ar', NULL, NULL),
(15, 5, 'ma', NULL, NULL),
(16, 5, 'en', NULL, NULL),
(17, 5, 'hi', NULL, NULL),
(18, 5, 'ar', NULL, NULL),
(19, 6, 'ma', NULL, NULL),
(20, 6, 'en', NULL, NULL),
(21, 6, 'hi', NULL, NULL),
(22, 6, 'ar', NULL, NULL),
(23, 7, 'ma', NULL, NULL),
(24, 7, 'en', NULL, NULL),
(25, 7, 'hi', NULL, NULL),
(26, 7, 'ar', NULL, NULL),
(27, 8, 'ma', NULL, NULL),
(28, 8, 'en', NULL, NULL),
(29, 8, 'hi', NULL, NULL),
(30, 8, 'ar', NULL, NULL),
(31, 9, 'ma', NULL, NULL),
(32, 9, 'en', NULL, NULL),
(33, 9, 'hi', NULL, NULL),
(34, 9, 'ar', NULL, NULL),
(35, 10, 'ma', NULL, NULL),
(36, 10, 'en', NULL, NULL),
(37, 10, 'hi', NULL, NULL),
(38, 10, 'ar', NULL, NULL),
(39, 11, 'ma', NULL, NULL),
(40, 11, 'en', NULL, NULL),
(41, 11, 'hi', NULL, NULL),
(42, 11, 'ar', NULL, NULL),
(43, 12, 'ma', NULL, NULL),
(44, 12, 'en', NULL, NULL),
(45, 12, 'hi', NULL, NULL),
(46, 12, 'ar', NULL, NULL),
(47, 13, 'ma', NULL, NULL),
(48, 13, 'en', NULL, NULL),
(49, 13, 'hi', NULL, NULL),
(50, 13, 'ar', NULL, NULL),
(51, 14, 'ma', NULL, NULL),
(52, 14, 'en', NULL, NULL),
(53, 14, 'hi', NULL, NULL),
(54, 14, 'ar', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `qrcode_item_assign`
--

DROP TABLE IF EXISTS `qrcode_item_assign`;
CREATE TABLE IF NOT EXISTS `qrcode_item_assign` (
  `id` int NOT NULL AUTO_INCREMENT,
  `store_id` int NOT NULL,
  `store_product_id` int NOT NULL,
  `qr_code_id` int NOT NULL,
  `remarks` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_created` datetime NOT NULL,
  `created_by` int NOT NULL,
  `date_modify` datetime NOT NULL,
  `modified_by` int NOT NULL,
  `is_active` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `roleid` int NOT NULL AUTO_INCREMENT,
  `rolename` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `roleDesc` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`roleid`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleid`, `rolename`, `roleDesc`, `is_active`) VALUES
(1, 'Managing Director', 'Managing Director', 1),
(3, 'Operations Manager', '', 1),
(4, 'Operation Supervisor', 'Operation Supervisor', 0),
(5, 'Co ordinator', 'Co ordinator', 1),
(6, 'Technician', '', 1),
(28, 'Super admin', 'Super admin have all permissions', 1),
(30, 'Operations Manager', 'Operations Manager', 0),
(31, 'Driver', 'Driver', 1),
(34, 'Admin', 'Admin', 1),
(35, 'Technical Manager', 'Technical Manager', 1),
(36, 'Finance', 'Finance', 0),
(37, 'Vehicle Co Ordinator', 'Vehicle Co Ordinator', 1),
(39, 'RSO', 'RSO', 1),
(40, 'Store Management', 'Store Management', 1),
(41, 'Office Assistant', 'Office Assistant', 0),
(42, 'IT Department', 'IT Department', 1),
(50, 'test', 'test desc', 0),
(51, 'tester', 'test descer', 0),
(52, 'test', 'fgdgd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `id` int NOT NULL AUTO_INCREMENT,
  `country_id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `country_id` (`country_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `country_id`, `name`) VALUES
(1, 1, 'Kerala'),
(2, 1, 'Tamilnadu'),
(3, 2, 'Victoria'),
(4, 2, 'Tasmania'),
(5, 3, 'Bali'),
(6, 3, 'Banten');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `id` int NOT NULL AUTO_INCREMENT,
  `consumable_id` int NOT NULL,
  `qty` int NOT NULL,
  `stock_add_date` date NOT NULL,
  `is_active` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `consumable_id`, `qty`, `stock_add_date`, `is_active`) VALUES
(2, 1, 8, '2023-05-03', 1),
(3, 2, 10, '2023-05-03', 1),
(4, 1, 10, '2023-05-03', 1),
(5, 2, 10, '2023-05-11', 1),
(9, 9, 4, '2023-05-19', 0),
(10, 8, 2, '2023-05-18', 1),
(11, 3, 4, '2023-05-10', 0),
(12, 6, 2, '2023-05-19', 1),
(13, 6, 6, '2023-05-15', 1),
(14, 15, 7, '2023-05-06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

DROP TABLE IF EXISTS `store`;
CREATE TABLE IF NOT EXISTS `store` (
  `store_id` int NOT NULL AUTO_INCREMENT,
  `store_disp_name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'display name',
  `store_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_desc` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_phone` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_address` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_opening_time` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_closing_time` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `today_opening_time` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `today_closing_time` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract_start_date` datetime NOT NULL,
  `contract_end_date` datetime NOT NULL,
  `next_followup_date` date NOT NULL,
  `followup_remarks` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_tables` int NOT NULL COMMENT 'Actually this is package id',
  `store_trade_license` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_location` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_country` int NOT NULL,
  `gst_or_tax` int NOT NULL COMMENT 'GST OR TAX',
  `bill_no` int NOT NULL,
  `store_language` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Default language',
  `store_selected_languages` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Selected languages for display website',
  `is_pickup` int NOT NULL,
  `pickup_number` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_dining` int NOT NULL,
  `dining_number` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_delivery` int NOT NULL,
  `delivery_number` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_logo_image` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int NOT NULL,
  PRIMARY KEY (`store_id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`store_id`, `store_disp_name`, `store_name`, `store_desc`, `store_email`, `store_phone`, `store_address`, `store_opening_time`, `store_closing_time`, `today_opening_time`, `today_closing_time`, `contract_start_date`, `contract_end_date`, `next_followup_date`, `followup_remarks`, `no_of_tables`, `store_trade_license`, `store_location`, `store_country`, `gst_or_tax`, `bill_no`, `store_language`, `store_selected_languages`, `is_pickup`, `pickup_number`, `is_dining`, `dining_number`, `is_delivery`, `delivery_number`, `store_logo_image`, `is_active`) VALUES
(2, 'Dhe Puttuuuuuu', 'Dhe Puttuuuuu', 'DESCRIPTION3', 'dheputtu@gmail.comuuu', '91894331234444', 'NH Bypass, Edappally, Kochiuuuu', '16:55', '20:30', NULL, NULL, '2024-11-18 00:00:00', '2025-11-18 00:00:00', '0000-00-00', NULL, 3, 'trade license 12345671245', 'https://maps.app.goo.gl/QwrTLeBASEwRcdP58', 12, 10, 0, 'ma', 'ma,en', 1, '1234567', 1, '12345657', 1, '1234567', 'Screenshot_2024-01-13_113624.png', 0),
(24, 'SuNi\'s Kitchen', 'SuNi\'s Kitchen ', 'Favourite restaurant', 'sunikitchen@gmail.com', '+918606061611', '12345678', '12:00', '12:00', NULL, NULL, '2024-12-06 00:00:00', '2025-12-06 00:00:00', '0000-00-00', NULL, 1, 'sss', 'dubai', 3, 4, 0, 'en', 'ma,en,hi,ar', 1, '9847421081', 1, '9961141975', 1, '7012713312', 'ponmudi1.jpg', 0),
(23, 'Malabar Food House', 'Malabar Food House', 'ssszss', 'MalabarFoodHouse@gmail.com', '896754328', 'Dubai', '12:00', '12:00', NULL, NULL, '2024-11-15 00:00:00', '2025-11-15 00:00:00', '0000-00-00', NULL, 3, 'vvvv', 'dubai', 3, 4, 0, 'ma', 'ma,en,hi,ar', 1, '123456', 1, '1234567', 1, '12345678', '', 0),
(28, 'Aldenaire Kitchen', 'Aldenaire Kitchen', 'Indian, South Indian, Indo-Chinese, Kerala', 'arstore@gmail.com', '8606061611', 'Indian, South Indian, Indo-Chinese, Kerala', '10:00', '00:00', NULL, NULL, '2024-11-21 00:00:00', '2025-11-21 00:00:00', '0000-00-00', NULL, 1, 'trade license', 'saudi', 15, 14, 0, 'en', 'ma,en,hi,ar', 1, '918606061611', 1, '918606061611', 1, '918606061611', 'restaurant-logo-al__1_-removebg-preview1.png', 0),
(44, 'Aroos Damascus', 'Aroos', 'UAE', 'Aroos@gmail.com', '7510949135', 'UAE', '10:00', '00:00', NULL, NULL, '2024-12-10 00:00:00', '0000-00-00 00:00:00', '2025-11-10', 'UAE', 3, 'UAE', 'UAE', 1, 1, 0, 'en', 'ma,en,hi,ar', 1, '917510949135', 1, '917012713312', 1, '918086373858', '', 1),
(45, 'Highrange', 'Highrange', 'dsfsdfdfdf', 'Highrange@gmail.com', '7012713312', 'fdsfrt', '13:23', '17:19', NULL, NULL, '2024-12-11 00:00:00', '0000-00-00 00:00:00', '2025-11-27', 'tertrytrtrt', 3, 'rerwerwer', 'werwerwerwer', 15, 0, 0, 'en', 'ma,en,hi,ar', 1, '917012713312', 1, '917012713312', 1, '917012713312', '', 1),
(42, 'Calicut Notebook', 'Calicut Notebook', 'South Indian, Kerala, Biryani, Seafood, North Indian', 'calicutnotebook@gmail.com', ' +914844862400', 'Kaloor, Kochi', '12:00', '00:00', NULL, NULL, '2024-12-07 00:00:00', '2025-12-07 00:00:00', '2025-11-07', 'kaloor', 3, 'kaloor', 'kaloor,kochi', 1, 2, 0, 'en', 'ma,en,hi,ar', 1, '919746833388', 1, '917012713312', 1, '917510949135', 'calicut-notebook.png', 1),
(41, 'Mehrab Mandhi Restuarant', 'Mehrab Mandhi Restuarant', 'Arabian, Mughlai, Mandi, Seafood, Salad, Fast Food, Beverages\r\n', 'mehrabmandhi@gmail.com', '+919746833388', 'MKS Square Palarivattom Kochi Kerala India - 682025', '12:00', '00:00', '08:00', '23:00', '2024-12-07 00:00:00', '2025-12-07 00:00:00', '2025-11-07', 'kochi', 1, 'Kochi', 'Kochi', 1, 2, 0, 'en', 'ma,en,hi,ar', 1, '918606061611', 1, '918606061611', 1, '918606061611', 'mehrabnew.png', 1),
(47, 'qweqweqwe', 'dubaiiiiiiiiiiiii', 'fdgfdsgdfgdfgdfg', 'test@gmail.com', '7012713312', 'sfsfdfsd', '13:06', '13:06', NULL, NULL, '2024-12-25 00:00:00', '2025-12-25 00:00:00', '2025-11-25', 'dsadasd', 1, 'asdasd', 'sadasd', 12, 10, 123456, 'en', 'ma,en,hi,ar', 1, '7012713312', 0, '0', 1, '7012713312', 'calicut-notebook.jpg', 1),
(48, 'kerala castle', 'kerala castle', 'Dubai', 'keralacastle@gmail.com', '7012713312', 'Dubai', '09:00', '00:00', NULL, NULL, '2024-12-17 00:00:00', '2025-12-16 00:00:00', '2025-11-17', 'Dubai', 3, 'Dubai', 'Dubai', 3, 1, 0, 'en', 'ma,en,hi,ar', 1, '911', 1, '911', 1, '911', '', 1),
(52, 'Indian Palace', 'indian palace', 'Saudi', 'indianpalace@gmail.com', '7012713312', 'Saudi', '06:00', '21:00', NULL, NULL, '2024-12-17 00:00:00', '0000-00-00 00:00:00', '0000-00-00', 'Saudi', 3, 'Saudi', 'Saudi', 15, 1, 0, 'en', 'ma,en,hi,ar', 1, '917012713312', 0, '', 1, '917510949135', '', 1),
(53, 'Calicut Cafe', 'Calicut Cafe', 'calicut', 'calicut@gmail.com', '7012713312', 'calicut , near beach', '09:00', '22:00', NULL, NULL, '2025-01-04 00:00:00', '2026-01-03 00:00:00', '2025-12-05', 'Calicut cafe', 1, 'calicuts', 'Calicut', 1, 1, 0, 'en', 'ma,en,hi,ar', 1, '917012713312', 1, '917510949135', 1, '918281637035', 'images_(2).png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `store_recipe`
--

DROP TABLE IF EXISTS `store_recipe`;
CREATE TABLE IF NOT EXISTS `store_recipe` (
  `store_recipe_id` int NOT NULL AUTO_INCREMENT,
  `store_id` int NOT NULL,
  `store_product_id` int NOT NULL,
  `recipe_id` int NOT NULL,
  `is_active` int NOT NULL,
  PRIMARY KEY (`store_recipe_id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `store_recipe`
--

INSERT INTO `store_recipe` (`store_recipe_id`, `store_id`, `store_product_id`, `recipe_id`, `is_active`) VALUES
(1, 28, 8, 2, 1),
(2, 28, 8, 1, 1),
(3, 29, 22, 2, 1),
(4, 29, 22, 1, 1),
(5, 29, 24, 2, 1),
(6, 29, 24, 1, 1),
(7, 28, 20, 2, 1),
(8, 28, 20, 1, 1),
(9, 41, 46, 2, 1),
(10, 41, 46, 1, 1),
(11, 41, 46, 5, 1),
(12, 41, 46, 4, 1),
(13, 46, 142, 5, 1),
(14, 46, 142, 4, 1),
(15, 46, 142, 2, 1),
(16, 46, 142, 1, 1),
(17, 46, 143, 2, 1),
(18, 46, 143, 1, 1),
(19, 46, 144, 4, 1),
(20, 46, 144, 1, 1),
(21, 2, 159, 5, 1),
(22, 2, 159, 4, 1),
(23, 41, 32, 4, 1),
(24, 41, 32, 2, 1),
(25, 41, 41, 2, 1),
(26, 41, 41, 1, 1),
(27, 41, 6, 2, 1),
(28, 41, 6, 1, 1),
(29, 41, 3, 4, 1),
(30, 41, 3, 2, 1),
(31, 41, 3, 1, 1),
(32, 41, 23, 4, 1),
(33, 41, 23, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `store_stock`
--

DROP TABLE IF EXISTS `store_stock`;
CREATE TABLE IF NOT EXISTS `store_stock` (
  `id` int NOT NULL AUTO_INCREMENT,
  `store_id` int NOT NULL,
  `tr_date` date NOT NULL,
  `order_id` int NOT NULL,
  `ttype` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int NOT NULL,
  `pu_qty` int NOT NULL,
  `sl_qty` int NOT NULL,
  `minqty` int NOT NULL DEFAULT '0',
  `remarks` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int NOT NULL,
  `modified_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `store_stock`
--

INSERT INTO `store_stock` (`id`, `store_id`, `tr_date`, `order_id`, `ttype`, `product_id`, `pu_qty`, `sl_qty`, `minqty`, `remarks`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(1, 41, '2025-01-10', 0, 'SK', 3, 20, 0, 2, '', 131, '2025-01-10 15:11:41', 131, '2025-01-10 15:11:41'),
(2, 41, '2025-01-10', 0, 'SK', 4, 20, 0, 2, '', 131, '2025-01-10 15:11:48', 131, '2025-01-10 15:11:48'),
(3, 41, '2025-01-10', 0, 'SK', 5, 20, 0, 2, '', 131, '2025-01-10 15:11:55', 131, '2025-01-10 15:11:55'),
(4, 41, '2025-01-10', 0, 'SK', 10, 5, 0, 2, '', 131, '2025-01-10 15:12:06', 131, '2025-01-10 15:12:06'),
(5, 41, '2025-01-10', 0, 'SK', 12, 5, 0, 2, '', 131, '2025-01-10 15:12:23', 131, '2025-01-10 15:12:23'),
(6, 41, '2025-01-10', 0, 'SK', 11, 20, 0, 2, '', 131, '2025-01-10 15:13:17', 131, '2025-01-10 15:13:17'),
(34, 41, '2025-01-10', 914100125, 'SL', 3, 0, 3, 0, '', 1, '2025-01-10 15:38:56', 1, '2025-01-10 15:38:56'),
(31, 41, '2025-01-10', 914100125, 'SL', 12, 0, 2, 0, '', 1, '2025-01-10 15:38:56', 1, '2025-01-10 15:38:56'),
(33, 41, '2025-01-10', 914100125, 'SL', 4, 0, 2, 0, '', 1, '2025-01-10 15:38:56', 1, '2025-01-10 15:38:56');

-- --------------------------------------------------------

--
-- Table structure for table `store_table`
--

DROP TABLE IF EXISTS `store_table`;
CREATE TABLE IF NOT EXISTS `store_table` (
  `table_id` int NOT NULL AUTO_INCREMENT,
  `store_id` int NOT NULL,
  `table_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `qr_code` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_table_token` int NOT NULL,
  `is_reserved` int NOT NULL DEFAULT '0' COMMENT 'is reserved =1',
  `is_active` int NOT NULL,
  PRIMARY KEY (`table_id`)
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `store_table`
--

INSERT INTO `store_table` (`table_id`, `store_id`, `table_name`, `qr_code`, `store_table_token`, `is_reserved`, `is_active`) VALUES
(1, 2, 'Table 1', 'https://qr-experts.com/uploads/qr_codes/Dhe Puttuuuuu_1.png', 202412151, 0, 1),
(2, 2, 'Table 2', 'https://qr-experts.com/uploads/qr_codes/Dhe Puttuuuuu_2.png', 202412152, 0, 1),
(3, 23, 'Table 1', 'https://qr-experts.com/codeigniter/uploads/qr_codes/Malabar Food House_3.png', 202411073, 0, 1),
(4, 23, 'Table 2', 'https://qr-experts.com/codeigniter/uploads/qr_codes/Malabar Food House_4.png', 202411074, 0, 1),
(5, 24, 'Table 1', 'https://qr-experts.com/codeigniter/uploads/qr_codes/SuNi\'s Kitchen _5.png', 202411095, 0, 1),
(6, 24, 'Table 2', 'http://localhost/codeigniter/uploads/qr_codes/SuNi\'s Kitchen _6.png', 202411136, 0, 1),
(7, 24, 'Table 3', 'https://qr-experts.com/codeigniter/uploads/qr_codes/SuNi\'s Kitchen _7.png', 202411167, 0, 1),
(8, 24, 'Table 4', 'http://localhost/codeigniter/uploads/qr_codes/SuNi\'s Kitchen _8.png', 202411178, 0, 1),
(9, 24, 'Table 5', '', 0, 0, 1),
(10, 25, 'Table 1', '', 0, 0, 1),
(11, 25, 'Table 2', '', 0, 0, 1),
(12, 26, 'Table 1', '', 0, 0, 1),
(13, 26, 'Table 2', '', 0, 0, 1),
(14, 27, 'Table 1', 'http://localhost/codeigniter/uploads/qr_codes/Saudi_14.png', 2024111814, 0, 1),
(15, 27, 'Table 2', '', 0, 0, 1),
(16, 28, 'Table 1', 'https://qr-experts.com/uploads/qr_codes/Aldenaire Kitchen_16.png', 2024120916, 0, 1),
(17, 28, 'Table 2', '', 0, 0, 1),
(18, 28, 'Table 3', '', 0, 0, 1),
(55, 43, 'Table 1', '', 0, 0, 1),
(19, 28, 'Table 4', '', 0, 0, 1),
(20, 28, 'Table 5', '', 0, 0, 1),
(21, 29, 'Table 1', '', 0, 0, 1),
(22, 29, 'Table 2', 'http://localhost/codeigniter/uploads/qr_codes/Test name_22.png', 2024112622, 0, 1),
(23, 30, 'Table 1', '', 0, 0, 1),
(24, 30, 'Table 2', '', 0, 0, 1),
(25, 31, 'Table 1', '', 0, 0, 1),
(26, 31, 'Table 2', '', 0, 0, 1),
(27, 32, 'Table 1', '', 0, 0, 1),
(28, 32, 'Table 2', '', 0, 0, 1),
(29, 33, 'Table 1', '', 0, 0, 1),
(30, 33, 'Table 2', 'http://localhost/codeigniter/uploads/qr_codes/_30.png', 2024112930, 0, 1),
(31, 34, 'Table 1', '', 0, 0, 1),
(32, 34, 'Table 2', '', 0, 0, 1),
(33, 34, 'Table 3', '', 0, 0, 1),
(34, 34, 'Table 4', '', 0, 0, 1),
(35, 34, 'Table 5', 'http://localhost/codeigniter/uploads/qr_codes/asdasdasd_35.png', 2024112935, 0, 1),
(36, 35, 'Table 1', '', 0, 0, 1),
(37, 35, 'Table 2', '', 0, 0, 1),
(38, 36, 'Table 1', '', 0, 0, 1),
(39, 36, 'Table 2', '', 0, 0, 1),
(40, 37, 'Table 1', '', 0, 0, 1),
(41, 37, 'Table 2', 'http://localhost/codeigniter/uploads/qr_codes/edeqweqwe_41.png', 2024112941, 0, 1),
(42, 38, 'Table 1', '', 0, 0, 1),
(43, 38, 'Table 2', '', 0, 0, 1),
(44, 38, 'Table 3', '', 0, 0, 1),
(45, 38, 'Table 4', '', 0, 0, 1),
(46, 38, 'Table 5', '', 0, 0, 1),
(47, 39, 'Table 1', '', 0, 0, 1),
(48, 39, 'Table 2', '', 0, 0, 1),
(49, 40, 'Table 1', '', 0, 0, 1),
(50, 40, 'Table 2', '', 0, 0, 1),
(56, 43, 'Table 2', '', 0, 0, 1),
(57, 44, 'Table 1', '', 0, 0, 1),
(58, 44, 'Table 2', '', 0, 0, 1),
(51, 41, 'Table 1', 'http://localhost/codeigniter/uploads/qr_codes/Mehrab Mandhi Restuarant_51.png', 2025010751, 0, 1),
(52, 41, 'Table 2', '', 0, 0, 1),
(53, 42, 'Table 1', '', 0, 0, 1),
(54, 42, 'Table 2', 'https://qr-experts.com/uploads/qr_codes/Calicut_54.png', 2024120954, 0, 1),
(59, 45, 'Table 1', '', 0, 0, 1),
(60, 45, 'Table 2', 'https://qr-experts.com/uploads/qr_codes/Highrange_60.png', 2024121160, 0, 1),
(61, 46, 'Table 1', 'https://qr-experts.com/uploads/qr_codes/horizon store_61.png', 2024121561, 0, 1),
(62, 46, 'Table 2', 'https://qr-experts.com/uploads/qr_codes/horizon store_62.png', 2024121562, 0, 1),
(63, 47, 'Table 1', 'https://qr-experts.com/uploads/qr_codes/dubaiiiiiiiiiiiii_63.png', 2024121663, 0, 1),
(64, 47, 'Table 2', 'https://qr-experts.com/uploads/qr_codes/dubaiiiiiiiiiiiii_64.png', 2024121664, 0, 1),
(65, 47, 'Table 3', '', 0, 0, 1),
(66, 47, 'Table 4', '', 0, 0, 1),
(67, 47, 'Table 5', '', 0, 0, 1),
(68, 48, 'Table 1', '', 0, 0, 1),
(69, 48, 'Table 2', '', 0, 0, 1),
(70, 49, 'Table 1', '', 0, 0, 1),
(71, 49, 'Table 2', '', 0, 0, 1),
(72, 50, 'Table 1', '', 0, 0, 1),
(73, 50, 'Table 2', '', 0, 0, 1),
(74, 51, 'Table 1', '', 0, 0, 1),
(75, 51, 'Table 2', '', 0, 0, 1),
(76, 52, 'Table 1', 'http://localhost/codeigniter/uploads/qr_codes/indian palace_76.png', 2024122776, 0, 1),
(77, 52, 'Table 2', 'http://localhost/codeigniter/uploads/qr_codes/indian palace_77.png', 2024122777, 0, 1),
(78, 53, 'Table 1', '', 0, 0, 1),
(79, 53, 'Table 2', '', 0, 0, 1),
(80, 53, 'Table 3', '', 0, 0, 1),
(81, 53, 'Table 4', '', 0, 0, 1),
(82, 53, 'Table 5', '', 0, 0, 1),
(83, 41, 'Table 3', 'https://qr-experts.com/emigo/uploads/qr_codes/Mehrab Mandhi Restuarant_83.png', 2025010483, 0, 1),
(84, 41, 'Table 4', 'https://qr-experts.com/emigo/uploads/qr_codes/Mehrab Mandhi Restuarant_84.png', 2025010484, 0, 1),
(85, 41, 'Table 5', 'https://qr-experts.com/emigo/uploads/qr_codes/Mehrab Mandhi Restuarant_85.png', 2025010485, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `store_variants`
--

DROP TABLE IF EXISTS `store_variants`;
CREATE TABLE IF NOT EXISTS `store_variants` (
  `store_variant_id` int NOT NULL AUTO_INCREMENT,
  `store_id` int NOT NULL,
  `store_product_id` int NOT NULL,
  `variant_id` int NOT NULL,
  `rate` double NOT NULL DEFAULT '0',
  `tax` double NOT NULL DEFAULT '0',
  `tax_amount` double NOT NULL DEFAULT '0',
  `total_amount` double NOT NULL DEFAULT '0',
  `is_default` int NOT NULL,
  `is_active` int NOT NULL,
  PRIMARY KEY (`store_variant_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `store_variants`
--

INSERT INTO `store_variants` (`store_variant_id`, `store_id`, `store_product_id`, `variant_id`, `rate`, `tax`, `tax_amount`, `total_amount`, `is_default`, `is_active`) VALUES
(1, 41, 3, 4, 100, 10, 10, 110, 0, 1),
(2, 41, 3, 3, 150, 10, 15, 165, 1, 1),
(3, 41, 3, 2, 200, 10, 20, 220, 0, 1),
(4, 41, 23, 4, 100, 10, 10, 110, 0, 1),
(5, 41, 23, 3, 200, 10, 20, 220, 1, 1),
(6, 41, 23, 2, 250, 10, 25, 275, 0, 1),
(7, 41, 32, 4, 200, 10, 20, 220, 1, 1),
(8, 41, 32, 3, 100, 10, 10, 110, 0, 1),
(9, 41, 32, 2, 150, 10, 15, 165, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `store_wise_product_assign`
--

DROP TABLE IF EXISTS `store_wise_product_assign`;
CREATE TABLE IF NOT EXISTS `store_wise_product_assign` (
  `store_product_id` int NOT NULL AUTO_INCREMENT,
  `store_id` int NOT NULL,
  `product_id` int NOT NULL,
  `subcategory_id` int NOT NULL DEFAULT '0',
  `vat_id` int NOT NULL,
  `type` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` double NOT NULL DEFAULT '0',
  `tax` double NOT NULL DEFAULT '0',
  `tax_amount` double NOT NULL DEFAULT '0',
  `total_amount` double NOT NULL DEFAULT '0',
  `category_id` int NOT NULL,
  `is_addon` int NOT NULL,
  `is_customizable` int NOT NULL,
  `image` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` int NOT NULL COMMENT 'if 1=added by admin 0=added by shop owner',
  `store_product_name_ma` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_product_name_en` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_product_name_hi` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_product_name_ar` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_product_desc_ma` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `store_product_desc_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `store_product_desc_hi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `store_product_desc_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `date_created` datetime NOT NULL,
  `created_by` int NOT NULL,
  `date_modified` datetime NOT NULL,
  `modified_by` int NOT NULL,
  `remarks` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Available soon	',
  `is_active` int NOT NULL COMMENT '0 active 1 inactive',
  PRIMARY KEY (`store_product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `store_wise_product_assign`
--

INSERT INTO `store_wise_product_assign` (`store_product_id`, `store_id`, `product_id`, `subcategory_id`, `vat_id`, `type`, `rate`, `tax`, `tax_amount`, `total_amount`, `category_id`, `is_addon`, `is_customizable`, `image`, `is_admin`, `store_product_name_ma`, `store_product_name_en`, `store_product_name_hi`, `store_product_name_ar`, `store_product_desc_ma`, `store_product_desc_en`, `store_product_desc_hi`, `store_product_desc_ar`, `date_created`, `created_by`, `date_modified`, `modified_by`, `remarks`, `is_active`) VALUES
(1, 41, 104, 4, 2, 'non-veg', 50, 10, 0, 0, 23, 0, 0, '', 1, '', '', '', '', '', '', '', '', '2025-01-09 12:22:52', 0, '2025-01-09 12:22:52', 0, 'Available soon	', 1),
(2, 41, 102, 4, 2, 'non-veg', 90, 10, 0, 0, 23, 0, 0, '', 1, '', '', '', '', '', '', '', '', '2025-01-09 12:22:52', 0, '2025-01-09 12:22:52', 0, 'Available soon	', 0),
(3, 41, 59, 0, 2, 'non-veg', 10, 10, 0, 0, 4, 0, 0, '', 1, '', '', '', '', '', '', '', '', '2025-01-09 12:23:07', 0, '2025-01-09 12:23:07', 0, 'Available soon	', 0),
(4, 41, 57, 0, 2, 'veg', 10, 10, 0, 0, 4, 0, 0, '', 1, '', '', '', '', '', '', '', '', '2025-01-09 12:23:45', 0, '2025-01-09 12:23:45', 0, 'Available soon	', 0),
(5, 41, 56, 0, 2, 'veg', 10, 10, 0, 0, 4, 0, 0, '', 1, '', '', '', '', '', '', '', '', '2025-01-09 12:23:45', 0, '2025-01-09 12:23:45', 0, 'Available soon	', 0),
(6, 41, 29, 0, 2, 'veg', 0, 10, 0, 0, 4, 0, 0, '', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-09 12:23:45', 0, '2025-01-09 12:23:45', 0, 'Available soon	', 0),
(7, 41, 13, 0, 2, 'veg', 0, 10, 0, 0, 4, 0, 0, '', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-09 12:23:45', 0, '2025-01-09 12:23:45', 0, 'Available soon	', 0),
(8, 41, 12, 0, 2, 'non-veg', 0, 10, 0, 0, 4, 0, 0, '', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-09 12:23:45', 0, '2025-01-09 12:23:45', 0, 'Available soon	', 0),
(9, 41, 11, 0, 2, 'veg', 0, 10, 0, 0, 4, 0, 0, '', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-09 12:23:45', 0, '2025-01-09 12:23:45', 0, 'Available soon	', 0),
(10, 41, 64, 4, 2, 'non-veg', 120, 10, 0, 0, 15, 0, 0, '', 1, '', '', '', '', '', '', '', '', '2025-01-09 12:24:11', 0, '2025-01-09 12:24:11', 0, 'Available soon	', 0),
(11, 41, 109, 3, 2, 'veg', 12, 10, 0, 0, 16, 0, 0, '', 1, '', '', '', '', '', '', '', '', '2025-01-09 12:24:32', 0, '2025-01-09 12:24:32', 0, 'Available soon	', 0),
(12, 41, 81, 8, 2, 'non-veg', 100, 10, 0, 0, 18, 0, 0, '', 1, '', '', '', '', '', '', '', '', '2025-01-09 12:24:32', 0, '2025-01-09 12:24:32', 0, 'Available soon	', 0),
(13, 41, 95, 0, 2, 'veg', 0, 10, 0, 0, 21, 0, 0, '', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-09 14:26:00', 0, '2025-01-09 14:26:00', 0, 'Available soon	', 0),
(14, 41, 94, 0, 2, 'veg', 0, 10, 0, 0, 21, 0, 0, '', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-09 14:26:00', 0, '2025-01-09 14:26:00', 0, 'Available soon	', 0),
(15, 41, 74, 3, 2, 'veg', 0, 10, 0, 0, 16, 0, 0, '', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-09 14:26:00', 0, '2025-01-09 14:26:00', 0, 'Available soon	', 0),
(16, 41, 73, 3, 2, 'veg', 0, 10, 0, 0, 16, 0, 0, '', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-09 14:26:00', 0, '2025-01-09 14:26:00', 0, 'Available soon	', 0),
(17, 41, 68, 4, 2, 'non-veg', 0, 10, 0, 0, 15, 0, 1, '', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-09 14:26:00', 0, '2025-01-09 14:26:00', 0, 'Available soon	', 0),
(18, 41, 62, 0, 2, 'veg', 0, 10, 0, 0, 20, 1, 0, '', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-09 14:26:00', 0, '2025-01-09 14:26:00', 0, 'Available soon	', 0),
(19, 41, 58, 0, 2, 'veg', 0, 10, 0, 0, 4, 0, 0, '', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-09 14:26:00', 0, '2025-01-09 14:26:00', 0, 'Available soon	', 0),
(20, 41, 55, 0, 2, 'veg', 0, 10, 0, 0, 20, 1, 0, '', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-09 14:26:00', 0, '2025-01-09 14:26:00', 0, 'Available soon	', 0),
(21, 41, 54, 0, 2, 'veg', 0, 10, 0, 0, 14, 0, 0, '', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-09 14:26:00', 0, '2025-01-09 14:26:00', 0, 'Available soon	', 0),
(22, 41, 53, 0, 2, 'veg', 0, 10, 0, 0, 14, 0, 0, '', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-09 14:26:00', 0, '2025-01-09 14:26:00', 0, 'Available soon	', 0),
(23, 41, 46, 9, 2, 'non-veg', 0, 10, 0, 0, 10, 0, 1, '', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-09 14:26:00', 0, '2025-01-09 14:26:00', 0, 'Available soon	', 0),
(24, 41, 41, 4, 2, 'non-veg', 0, 10, 0, 0, 8, 0, 1, '', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-09 14:26:00', 0, '2025-01-09 14:26:00', 0, 'Available soon	', 0),
(25, 41, 38, 0, 2, 'veg', 0, 10, 0, 0, 7, 0, 0, '', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-09 14:26:00', 0, '2025-01-09 14:26:00', 0, 'Available soon	', 0),
(26, 41, 28, 0, 2, 'veg', 0, 10, 0, 0, 4, 0, 0, '', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-09 14:26:00', 0, '2025-01-09 14:26:00', 0, 'Available soon	', 0),
(27, 41, 22, 0, 2, 'veg', 0, 10, 0, 0, 4, 0, 0, '', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-09 14:26:00', 0, '2025-01-09 14:26:00', 0, 'Available soon	', 0),
(28, 41, 19, 0, 2, 'veg', 0, 10, 0, 0, 20, 1, 0, '', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-09 14:26:00', 0, '2025-01-09 14:26:00', 0, 'Available soon	', 0),
(29, 41, 18, 0, 2, 'veg', 0, 10, 0, 0, 20, 1, 0, '', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-09 14:26:00', 0, '2025-01-09 14:26:00', 0, 'Available soon	', 0),
(30, 41, 17, 0, 2, 'non-veg', 0, 10, 0, 0, 6, 0, 0, '', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-09 14:26:00', 0, '2025-01-09 14:26:00', 0, 'Available soon	', 0),
(31, 41, 113, 4, 2, 'veg', 0, 10, 0, 0, 22, 0, 0, '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-10 10:20:06', 131, '2025-01-10 10:20:06', 131, 'Available soon	', 0),
(32, 41, 114, 3, 2, 'veg', 0, 10, 0, 0, 22, 0, 1, '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-10 10:28:48', 131, '2025-01-10 10:28:48', 131, 'Available soon	', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

DROP TABLE IF EXISTS `subcategories`;
CREATE TABLE IF NOT EXISTS `subcategories` (
  `subcategory_id` int NOT NULL AUTO_INCREMENT,
  `subcategory_code` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_id` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_name_ma` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_name_en` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_name_hi` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_name_ar` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_desc_ma` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_desc_en` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_desc_hi` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_desc_ar` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_index` int NOT NULL,
  `is_active` int NOT NULL,
  PRIMARY KEY (`subcategory_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`subcategory_id`, `subcategory_code`, `store_id`, `subcategory_name_ma`, `subcategory_name_en`, `subcategory_name_hi`, `subcategory_name_ar`, `subcategory_desc_ma`, `subcategory_desc_en`, `subcategory_desc_hi`, `subcategory_desc_ar`, `order_index`, `is_active`) VALUES
(5, '007', '0', 'Fish', 'Fish', 'Fish', 'Fish', 'Fish', '        Fish', 'Fish', 'Fish', 20, 1),
(4, '006', '0', 'Chicken', 'Chicken', 'Chicken', 'Chicken', 'Chicken', 'Chicken', 'Chicken', 'Chicken', 19, 1),
(3, '005', '0', 'Vegetarian', 'Vegetarian', 'Vegetarian', 'Vegetarian', 'Vegetarian', 'Vegetarian', 'Vegetarian', 'Vegetarian', 19, 1),
(10, 'madfoon', '0', 'മദ്‌ഫൂൺ', 'Madfoon', 'मदफून', 'المدفون', 'മദ്‌ഫൂൺ', '    Madfoon', 'मदफून', 'المدفون', 8, 1),
(9, 'mutton', '0', ' മട്ടൺ', 'Mutton', 'मटन', 'لحم الضأن', ' മട്ടൺ', '   Mutton ', 'मटन', 'لحم الضأن', 11, 1),
(8, '013', '0', ' ബീഫ്', 'Beeff', 'गाय का मांस', 'لحم', ' ബീഫ്', '    Beeff', 'गाय का मांस', 'لحم', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

DROP TABLE IF EXISTS `tax`;
CREATE TABLE IF NOT EXISTS `tax` (
  `tax_id` int NOT NULL AUTO_INCREMENT,
  `country_id` int NOT NULL,
  `tax_type` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_rate` int NOT NULL,
  `is_active` int NOT NULL,
  PRIMARY KEY (`tax_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`tax_id`, `country_id`, `tax_type`, `tax_rate`, `is_active`) VALUES
(1, 0, 'Gst', 0, 1),
(2, 1, 'Gst', 10, 1),
(3, 2, 'Vat', 6, 1),
(4, 3, 'Gst', 7, 1),
(9, 12, 'Vat', 6, 1),
(10, 12, 'Vat', 8, 1),
(13, 15, 'Vat', 5, 1),
(14, 15, 'Vat', 6, 1),
(16, 0, 'gst', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `token_generation`
--

DROP TABLE IF EXISTS `token_generation`;
CREATE TABLE IF NOT EXISTS `token_generation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `token_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `token_generation`
--

INSERT INTO `token_generation` (`id`, `token_id`) VALUES
(1, 916);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userid` int NOT NULL AUTO_INCREMENT,
  `userroleid` int NOT NULL COMMENT '1=Admin 2=Shop Owner 3=Employee 4=Delivery boy',
  `store_id` int NOT NULL COMMENT 'If store_id 0 admin otherwise shop owner',
  `Name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `userEmail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `userName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `userPassword` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserPhoneNumber` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `userAddress` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `profileimg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int NOT NULL COMMENT '1 active 0 inactive',
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `userroleid`, `store_id`, `Name`, `userEmail`, `userName`, `userPassword`, `UserPhoneNumber`, `userAddress`, `profileimg`, `is_active`) VALUES
(50, 1, 0, 'Deem', 'mevishnu2408@gmail.com', 'emigo', '21232f297a57a5a743894a0e4a801fc3', '4532222454', 'deem', '', 1),
(114, 2, 2, 'Dhe puttu User', 'puttu@gmail.com', 'puttu', '21232f297a57a5a743894a0e4a801fc3', '7012713312', 'qddress', '', 1),
(115, 2, 23, 'Malabar', 'MalabarFoodHouse@gmail.com', 'malabar', '21232f297a57a5a743894a0e4a801fc3', '12345678', 'dubai', '', 1),
(116, 2, 24, 'suni', 'sunikitchen@gmail.com', 'suni', '21232f297a57a5a743894a0e4a801fc3', '7012713312', 'dubai', '', 1),
(118, 2, 27, 'saudi', 'saudi@gmail.com', 'saudi', '21232f297a57a5a743894a0e4a801fc3', '7012713312', 'qddress', '', 1),
(119, 2, 28, 'Ar store', 'Arstore@gmail.com', 'arstore', '21232f297a57a5a743894a0e4a801fc3', '8086373858', 'saudi', '', 1),
(127, 2, 37, 'edeqweqwe', 'tesfgsd@gmail.com', 'test', '21232f297a57a5a743894a0e4a801fc3', '7012713312', 'qqw', '', 1),
(128, 2, 38, 'eqweqwewq', 'tesfgsd@gmail.com', 'test', '21232f297a57a5a743894a0e4a801fc3', '7012713312', 'ewqweqweqwe', '', 1),
(129, 2, 39, 'weqweqwe', 'tesfgsd@gmail.com', 'test1', '21232f297a57a5a743894a0e4a801fc3', '7012713312', 'wqeqwe', '', 1),
(130, 2, 40, 'sadasdasd', 't@gmail.com', 'qwerty', '8e12d8a78dbc949f1962c4b397f000c8', '7012713312', 'dsdsad', '', 1),
(131, 2, 41, 'Mehrab Mandhi Restuarant', 'mehrabmandhi@gmail.com', 'mehrab', '21232f297a57a5a743894a0e4a801fc3', '+919746833388', 'Edapally,kochi', '', 1),
(132, 2, 42, 'Calicut', 'calicutnotebook@gmail.com', 'calicut', '21232f297a57a5a743894a0e4a801fc3', ' +914844862400', 'Kaloor, Kochi', '', 1),
(133, 2, 43, 'test', 'test@gmail.com', 'test', '21232f297a57a5a743894a0e4a801fc3', '7510949135', 'Theruvath(h), kizhathiri p. o, ramapuram, kottayam(dist)', '', 1),
(134, 2, 44, 'Aroos', 'Aroos@gmail.com', 'Aroos', '21232f297a57a5a743894a0e4a801fc3', '7510949135', 'UAE', '', 1),
(135, 2, 45, 'Highrange', 'Highrange@gmail.com', 'highrange', '21232f297a57a5a743894a0e4a801fc3', '7012713312', 'fdsfrt', '', 1),
(136, 2, 46, 'horizon store', 'horizon@gmail.com', 'horizon', '21232f297a57a5a743894a0e4a801fc3', '7012713312', 'Qatar', '', 1),
(137, 2, 47, 'dubaiiiiiiiiiiiii', 'test@gmail.com', 'emigo', '21232f297a57a5a743894a0e4a801fc3', '7012713312', 'sfsfdfsd', '', 1),
(138, 2, 48, 'kerala castle', 'keralacastle@gmail.com', 'keralacastle', '21232f297a57a5a743894a0e4a801fc3', '7012713312', 'Dubai', '', 1),
(139, 2, 49, 'indian palace', 'indianpalace@gmail.com', 'indianpalace', '21232f297a57a5a743894a0e4a801fc3', '7012713312', 'Sharjah', '', 1),
(140, 2, 50, 'Indian Palace', 'indianpalace@gmail.com', 'indianpalace', '21232f297a57a5a743894a0e4a801fc3', '7012713312', 'Saudi', '', 1),
(141, 2, 51, 'paragon', 'paragon@gmail.com', 'Paragon', '21232f297a57a5a743894a0e4a801fc3', '7510949135', 'Kozhikode', '', 1),
(142, 2, 52, 'indian palace', 'indianpalace@gmail.com', 'indianpalace', '21232f297a57a5a743894a0e4a801fc3', '7012713312', 'Saudi', '', 1),
(144, 4, 41, 'Vishnu', 'mevishnu@gmail.com', 'vishnu', '21232f297a57a5a743894a0e4a801fc3', '7012713312', 'testaddress', NULL, 1),
(145, 4, 41, 'Arjun', 'arjun@gmail.com', 'arjun', '21232f297a57a5a743894a0e4a801fc3', '7012713312', 'address', NULL, 1),
(147, 2, 53, 'Calicut Cafe', 'calicut@gmail.com', 'Calicutcafe', '21232f297a57a5a743894a0e4a801fc3', '7012713312', 'calicut , near beach', '', 1),
(148, 3, 41, 'Alan', 'alan@gmail.com', 'alan', '21232f297a57a5a743894a0e4a801fc3', '1234567890', 'vazhithala', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_login_logout`
--

DROP TABLE IF EXISTS `user_login_logout`;
CREATE TABLE IF NOT EXISTS `user_login_logout` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `store_id` int NOT NULL,
  `date` date NOT NULL,
  `login_time` datetime NOT NULL,
  `logout_time` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_login_logout`
--

INSERT INTO `user_login_logout` (`id`, `user_id`, `store_id`, `date`, `login_time`, `logout_time`, `created_at`) VALUES
(1, 131, 41, '2025-01-04', '2025-01-04 15:43:37', '2025-01-07 11:28:19', '2025-01-04 10:13:37'),
(2, 131, 41, '2025-01-04', '2025-01-04 15:53:04', '2025-01-07 11:28:19', '2025-01-04 10:23:04'),
(3, 131, 41, '2025-01-04', '2025-01-04 18:36:02', '2025-01-07 11:28:19', '2025-01-04 13:06:02'),
(4, 131, 41, '2025-01-07', '2025-01-07 10:09:27', '2025-01-07 11:28:19', '2025-01-07 04:39:27'),
(5, 50, 0, '2025-01-07', '2025-01-07 10:12:04', '0000-00-00 00:00:00', '2025-01-07 04:42:04'),
(6, 131, 41, '2025-01-07', '2025-01-07 10:12:53', '2025-01-07 11:28:19', '2025-01-07 04:42:53'),
(7, 50, 0, '2025-01-07', '2025-01-07 10:19:07', '0000-00-00 00:00:00', '2025-01-07 04:49:07'),
(8, 131, 41, '2025-01-07', '2025-01-07 10:22:49', '2025-01-07 11:28:19', '2025-01-07 04:52:49'),
(9, 131, 41, '2025-01-07', '2025-01-07 10:47:55', '2025-01-07 11:28:19', '2025-01-07 05:17:55'),
(10, 50, 0, '2025-01-07', '2025-01-07 10:48:08', '0000-00-00 00:00:00', '2025-01-07 05:18:08'),
(11, 131, 41, '2025-01-07', '2025-01-07 11:00:32', '2025-01-07 11:28:19', '2025-01-07 05:30:32'),
(12, 131, 41, '2025-01-07', '2025-01-07 11:24:19', '2025-01-07 11:28:19', '2025-01-07 05:54:19'),
(13, 131, 41, '2025-01-07', '2025-01-07 11:27:10', '2025-01-07 11:28:19', '2025-01-07 05:57:10'),
(14, 50, 0, '2025-01-07', '2025-01-07 11:28:30', '0000-00-00 00:00:00', '2025-01-07 05:58:30'),
(15, 131, 41, '2025-01-07', '2025-01-07 11:28:56', '0000-00-00 00:00:00', '2025-01-07 05:58:56'),
(16, 50, 0, '2025-01-07', '2025-01-07 12:47:10', '0000-00-00 00:00:00', '2025-01-07 07:17:10'),
(17, 131, 41, '2025-01-07', '2025-01-07 12:47:48', '0000-00-00 00:00:00', '2025-01-07 07:17:48'),
(18, 131, 41, '2025-01-07', '2025-01-07 13:54:19', '0000-00-00 00:00:00', '2025-01-07 08:24:19'),
(19, 131, 41, '2025-01-07', '2025-01-07 17:27:43', '0000-00-00 00:00:00', '2025-01-07 11:57:43'),
(20, 50, 0, '2025-01-08', '2025-01-08 09:10:57', '0000-00-00 00:00:00', '2025-01-08 03:40:57'),
(21, 131, 41, '2025-01-08', '2025-01-08 09:11:47', '0000-00-00 00:00:00', '2025-01-08 03:41:47'),
(22, 131, 41, '2025-01-08', '2025-01-08 09:43:06', '0000-00-00 00:00:00', '2025-01-08 04:13:06'),
(23, 131, 41, '2025-01-08', '2025-01-08 10:05:30', '0000-00-00 00:00:00', '2025-01-08 04:35:30'),
(24, 50, 0, '2025-01-08', '2025-01-08 13:49:33', '0000-00-00 00:00:00', '2025-01-08 08:19:33'),
(25, 131, 41, '2025-01-08', '2025-01-08 13:51:28', '0000-00-00 00:00:00', '2025-01-08 08:21:28'),
(26, 50, 0, '2025-01-08', '2025-01-08 14:26:22', '0000-00-00 00:00:00', '2025-01-08 08:56:22'),
(27, 131, 41, '2025-01-08', '2025-01-08 14:27:14', '0000-00-00 00:00:00', '2025-01-08 08:57:14'),
(28, 131, 41, '2025-01-09', '2025-01-09 09:18:14', '0000-00-00 00:00:00', '2025-01-09 03:48:14'),
(29, 50, 0, '2025-01-09', '2025-01-09 12:22:31', '0000-00-00 00:00:00', '2025-01-09 06:52:31'),
(30, 131, 41, '2025-01-09', '2025-01-09 12:26:14', '0000-00-00 00:00:00', '2025-01-09 06:56:14'),
(31, 50, 0, '2025-01-09', '2025-01-09 14:25:10', '0000-00-00 00:00:00', '2025-01-09 08:55:10'),
(32, 131, 41, '2025-01-09', '2025-01-09 14:26:37', '0000-00-00 00:00:00', '2025-01-09 08:56:37'),
(33, 131, 41, '2025-01-09', '2025-01-09 16:21:52', '0000-00-00 00:00:00', '2025-01-09 10:51:52'),
(34, 131, 41, '2025-01-10', '2025-01-10 09:12:43', '0000-00-00 00:00:00', '2025-01-10 03:42:43');

-- --------------------------------------------------------

--
-- Table structure for table `variants`
--

DROP TABLE IF EXISTS `variants`;
CREATE TABLE IF NOT EXISTS `variants` (
  `variant_id` int NOT NULL AUTO_INCREMENT,
  `store_id` int NOT NULL,
  `variant_name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int NOT NULL,
  PRIMARY KEY (`variant_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `variants`
--

INSERT INTO `variants` (`variant_id`, `store_id`, `variant_name`, `code`, `is_active`) VALUES
(2, 0, 'Full', 'F', 1),
(3, 0, 'Half', 'H', 1),
(4, 0, 'Quarter', 'Q', 1),
(12, 41, 'test', 'test', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
