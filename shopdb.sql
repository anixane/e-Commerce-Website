-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2017 at 11:39 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopdb`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `updatelog` (IN `uid` TEXT)  MODIFIES SQL DATA
BEGIN
INSERT INTO log (user) VALUES(uid);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin`) VALUES
('sohaibalam67');

-- --------------------------------------------------------

--
-- Table structure for table `bag`
--

CREATE TABLE `bag` (
  `prod_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `size` text NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`time`, `user`) VALUES
('2017-11-25 06:46:15', 'sohaibalam67'),
('2017-11-25 06:48:35', 'alam'),
('2017-11-25 07:04:33', 'sohaibalam67'),
('2017-11-26 14:10:07', 'sohaibalam67'),
('2017-11-26 19:53:17', 'sohaibalam67'),
('2017-11-29 08:34:08', 'sohaibalam67'),
('2017-11-29 09:42:49', 'sohaibalam67'),
('2017-11-29 10:12:53', 'alam'),
('2017-11-29 10:14:57', 'sohaibalam67'),
('2017-11-29 10:26:22', 'sohaibalam67'),
('2017-11-29 10:32:16', 'alam'),
('2017-11-29 10:32:23', 'sohaibalam67');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` text NOT NULL,
  `username` text NOT NULL,
  `prod_id` int(11) NOT NULL,
  `size` text NOT NULL,
  `qty` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `username`, `prod_id`, `size`, `qty`, `status`) VALUES
('578e068e', 'sohaibalam67', 2050192, 'M', 1, 1),
('57610681', 'sohaibalam67', 1845173, 'M', 1, 1),
('1f15039f', 'alam', 1945591, 'L', 1, 1),
('1f15039f', 'alam', 822672, '32', 1, 0),
('1f15039f', 'alam', 875753, 'L', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ord_addr`
--

CREATE TABLE `ord_addr` (
  `order_id` text NOT NULL,
  `pincode` int(11) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `town` text NOT NULL,
  `dist` text NOT NULL,
  `state` text NOT NULL,
  `name` text NOT NULL,
  `addr` text NOT NULL,
  `amt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ord_addr`
--

INSERT INTO `ord_addr` (`order_id`, `pincode`, `phone`, `town`, `dist`, `state`, `name`, `addr`, `amt`) VALUES
('578e068e', 560060, 7090157625, 'Kengeri', 'Bangalore', 'Karnataka', 'Sohaib Alam', 'Room no 215, Block 1, Sjbit boys hostel, sjbit, bgs health and education city , Kengeri , Bangalore , Karnataka', 3603),
('57610681', 823001, 7090157625, 'Gaya', 'Gaya', 'Bihar', 'Sarwar Alam', 'New Karimganj, Road no. 2, Near Gaya High School , Gaya , Gaya , Bihar', 2448),
('1f15039f', 560060, 8867981670, 'Kengeri', 'Bangalore', 'Bangalore', 'Ravi Raman', 'Room no. 215, Block 1, sjbit boys hostel, sjbit , Kengeri , Bangalore , Bangalore', 9530);

--
-- Triggers `ord_addr`
--
DELIMITER $$
CREATE TRIGGER `merge_add` BEFORE INSERT ON `ord_addr` FOR EACH ROW SET NEW.addr = CONCAT(NEW.addr,' , ',NEW.town,' , ', NEW.dist,' , ', NEW.state)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `brand` text NOT NULL,
  `image` text NOT NULL,
  `detail` text NOT NULL,
  `gen` text NOT NULL,
  `category` text NOT NULL,
  `color` int(11) NOT NULL,
  `size_type` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `brand`, `image`, `detail`, `gen`, `category`, `color`, `size_type`, `price`) VALUES
(1, 'Jack & Jones Men White Printed Round Neck T-shirt', 'Jack & Jones', '374d86bfc05c5256c67d2b0758adf3f7.jpg', 'White printed T-shirt, has a round neck, short sleeves', 'men', 'tshirt', 1, 1, 600),
(2, 'Tommy Hilfiger Men Navy Solid Polo Collar T-shirt', 'Tommy Hilfiger', '1ea603ccee0f6ee2934205339dc38581.jpg', 'Navy solid T-shirt, has a polo collar, short sleeves', 'men', 'tshirt', 3, 1, 800),
(3, 'Tommy Hilfiger Men Pink & Orange Striped Polo Collar T-shirt', 'Tommy Hilfiger', '95ff78c886b6b5e367661c498f281bd8.jpg', 'Pink and orange striped polo T-shirt, has a polo collar with a short button placket, short sleeves', 'men', 'tshirt', 9, 1, 900),
(822672, 'Premium by Jack & Jones Navy Slim Fit Stretchable Jeans', 'Jack & Jones', 'cda8d2287b275660c7c40953cd5f6299.jpg', 'A pair of navy blue 5-pocket low-rise stretchable jeans, a button fly and closure, a waistband with belt loops, upturned hems', 'men', 'jeans', 3, 2, 3497),
(875753, 'Jack & Jones White Formal Shirt', 'Jack & Jones', 'c4505a3c6d2c98ce240786057ca17abb.jpg', 'White formal shirt, has a slim collar, long sleeves, a full button placket, and a curved hemline', 'men', 'formal_shirt', 1, 1, 2495),
(928891, 'SOJANYA Men Gold-Toned & Red Solid Kurta with Churidar', 'SOJANYA', '5aaf096247e75a4965834de02ee8ab92.jpg', 'Gold-toned and red solid kurta with pyjama Gold-toned straight above knee kurta, has a mandarin collar with short button closure, long sleeves, straight hem, side slits Red pyjama, drawstring closure', 'men', 'kurta', 5, 1, 1129),
(999027, 'Shaftesbury London Black Nehru Jacket', 'Shaftesbury', '3199c193be29df6e205008c0599fc902.jpg', 'Black Nehru jacket, has a stand collar, sleeveless, a full button placket, three welt pockets, vented hem', 'men', 'nehru_jacket', 2, 1, 1599),
(999042, 'Shaftesbury London Maroon Silk Nehru Jacket', 'Shaftesbury', '1a7740d333f43a3bdfe83a02e9d3b353.jpg', 'Maroon woven Nehru jacket, has a stand collar, sleeveless, a full button placket, three welt pockets, vented hem', 'men', 'nehru_jacket', 5, 1, 999),
(1069383, 'Jack & Jones Green Hooded Jacket with Print Detail', 'Jack & Jones', '27532894676f37037e64f9fed8eedef8.jpg', 'Green woven jacket with print detail, has an attached hood with an adjustable drawstring and toggle detail, a full zip closure, long sleeves, two insert pockets, and has an attached mesh lining with a pocket', 'men', 'jacket', 4, 1, 1747),
(1100407, 'Adidas Black ESS MID WV Training Shorts', 'Adidas', 'ef8b3e8522dabc1873444055f54a2779.jpg', 'A pair of black woven mid-rise training shorts engineered with climalite technology, has two pockets, an elasticated waistband with a drawstring fastening, and has an attached mesh lining Warranty: 3 months from the date of purchase against manufacturing defects', 'men', 'shorts', 2, 2, 1039),
(1142880, 'Numero Uno Blue Washed Roger Fit Jeans', 'Numero Uno', 'bee3fb80f286250218a67b09f2ae62fc.jpg', 'A pair of blue 5-pocket mid-rise jeans, lightly washed, has whiskers, a zip fly with a button closure, and a waistband with belt loops', 'men', 'jeans', 3, 2, 1214),
(1415872, 'Adidas White TF BASE Compression T-shirt', 'Adidas', 'd7e7e3b8bfc91f155e3a5d2320b55e64.jpg', 'White training T-shirt engineered with TechFit, Compression and climalite technologies, has a round neck and long sleeves Warranty: 3 months from the date of purchase against manufacturing defects', 'men', 'active_tshirt', 1, 1, 1319),
(1421977, 'WROGN Grey Melange & Navy Henley Slim Fit T-shirt', 'WROGN', 'e47e3f486634b4182d63bbb47629c06e.jpg', 'Grey melange and navy blue Henley T-shirt with speckled detail, has a Henley neck, a short button placket, long raglan sleeves', 'men', 'tshirt', 9, 1, 839),
(1428019, 'WROGN Men Coffee Brown Solid Polo Collar T-Shirt', 'WROGN', '37467d6ebed108aad1987147f41f61a1.jpg', 'Coffee Brown solid waist length T-shirt, has a polo collar, short sleeves', 'men', 'tshirt', 7, 1, 779),
(1507004, 'Jack & Jones Men Blue Printed Chino Shorts', 'Jack & Jones', '2694eb1dc660ad415a344bae901e60bc.jpg', 'Blue printed and knee length length mid-rise chino shorts, has four pockets, a zip fly with button closure, a waistband with belt loops', 'men', 'shorts', 3, 2, 999),
(1585655, 'Adidas Green Winter Off Textured Training Track Pants', 'Adidas', '7d8f042edde55e7d9f21788761c034f4.jpg', 'A pair of green knitted panelled textured training track pants, has an elasticated waistband with an inner drawstring fastening, and two zip pockets Warranty: 3 months from the date of purchase against manufacturing defect', 'men', 'track_pant', 4, 2, 1624),
(1657367, 'John Players Men Off-White Solid Formal Shirt', 'John Players', '9f2525d81f0d0c7ae304ddc6d2a8fad0.jpg', 'Off-white solid formal shirt, has a spread collar, button placket, short sleeves, patch pocket, curved hem', 'men', 'formal_shirt', 1, 1, 814),
(1659428, 'Tommy Hilfiger Men Olive Green Straight Fit Chino Trousers', 'Tommy Hilfiger', '14fcacf6c6ace4c53c88dd2b28910a56.jpg', 'A pair of olive green patterned weave mid-rise chino trousers, has five pockets, a waistband with belt loops, a zip fly with a button closure', 'men', 'casual_trouser', 2, 2, 4199),
(1718290, 'Mufti Men Navy Blue Jogger Stretchable Jeans', 'Mufti', 'e0ea498505907d748971f43c3c1442d8.jpg', 'Navy blue medium wash 5-pocket mid-rise Jeans, clean look with heavy fade, has a slip-on closure, elasticated waistband', 'men', 'jeans', 3, 2, 1399),
(1718307, 'Mufti Men Black Super Slim Fit Stretchable Jeans', 'Mufti', 'dfe6fd9f5302de43449b93159828e316.jpg', 'Black 5-pocket mid-rise Jeans, clean look with light fade, has whiskers, a button and zip closure, waistband with belt loops', 'men', 'jeans', 3, 2, 1439),
(1752517, 'John Players Maroon Trim Skinny Fit Formal Shirt', 'John Players', '788baa0d1b5ad444dd8102fc8c6654c4.jpg', 'Maroon formal shirt, has a spread collar, a full button placket, long sleeves, a chest pocket, curved hem', 'men', 'formal_shirt', 5, 1, 719),
(1752555, 'Jack & Jones Men Blue Ben Skinny Fit Low-Rise Mildly Distressed Stretchable Jeans', 'Jack & Jones', '1b37f8422bad11aa5e5b6fd170122c2f.jpg', 'Blue medium wash 5-pocket low-rise jeans, mildly distressed with light fade, has a button and zip closure, waistband with belt loops', 'men', 'jeans', 3, 2, 3249),
(1790890, 'Tommy Hilfiger Men Green Solid Formal Shirt', 'Tommy Hilfiger', '0cd8d8dc70b2b8a9c285f80582c9ae35.jpg', 'Green solid formal shirt, has a button-down collar, button placket, long sleeves, curved hem', 'men', 'formal_shirt', 4, 1, 2799),
(1801300, 'Duke Men Blue Solid Polo Collar T-Shirt', 'Duke', '8d7f43c315414c5e1f85c3cedd7a39a2.jpg', 'Blue solid waist length T-shirt, has a polo collar, short sleeves', 'men', 'tshirt', 3, 1, 451),
(1837877, 'Tommy Hilfiger Men Blue Tailored Fit Self-Design Formal Shirt', 'Tommy Hilfiger', 'e405f08eb3016a91dec7ec610a9a07a2.jpg', 'Blue and white self-design formal shirt, has a spread collar, button placket, long sleeves, curved hem', 'men', 'formal_shirt', 3, 1, 2799),
(1845173, 'Roadster Men Khaki Solid Bomber', 'Roadster', 'e8b10cca9e845d2a3e40723d08995819.jpg', 'Khaki solid bomber, has a mandarin collar, 4 pockets, zip closure, long sleeves, straight hem, polyester lining', 'men', 'jacket', 1, 1, 2309),
(1854486, 'Duke Men Coffee Brown Slim Fit Chino Trousers', 'Duke', '4bfe6b0412274cccd6858b73aed28eac.jpg', 'Coffee brown casual mid-rise chino trousers, has five pockets, a zip fly with button closure, a waistband with belt loops.', 'men', 'casual_trouser', 7, 2, 1005),
(1894551, 'Roadster Men Black Solid Padded Jacket', 'Roadster', 'a50ee0bba13bc9e7e3867a0b6ff71813.jpg', 'Black solid padded jacket, has a mock collar, 3 pockets, zip closure, long sleeves, straight hem, polyester lining', 'men', 'jacket', 2, 1, 1979),
(1923628, 'Roadster Men Blue Regular Fit Solid Joggers', 'Roadster', '0e6dbe3af8230062068b925bf000fff3.jpg', 'Blue solid mid-rise joggers, has a slip-on closure, 5 pockets', 'men', 'casual_trouser', 3, 2, 1329),
(1923632, 'Roadster Men Khaki Regular Fit Solid Joggers', 'Roadster', '82bce3c99048c6bb7009853599a46f1e.jpg', 'Khaki solid mid-rise joggers, has a slip-on closure, 4 pockets', 'men', 'casual_trouser', 4, 2, 1139),
(1945591, 'Jack & Jones Blue Single-Breasted Casual Blazer', 'Jack & Jones', '1e85f1e501a5555f4662c3f3a6aa193a.jpg', 'Blue single-breasted casual blazer, has a notched lapel, dual button closures, long sleeves, three pockets', 'men', 'blazer', 3, 1, 2999),
(1945598, 'Jack & Jones Navy Self-Checked Single-Breasted Blazer', 'Jack & Jones', 'e30821b2adc760f1aca1a1021b9b5b6b.jpg', 'Navy blue self-checked single-breasted blazer, has a notched lapel, dual button closures, long sleeves, three pockets', 'men', 'blazer', 3, 1, 2999),
(1963428, 'Numero Uno Men Blue Skinny Fit Low-Rise Clean Look Jeans', 'Numero Uno', 'be23f77a40ed51695cd491b2f21a8860.jpg', 'Blue medium wash 5-pocket low-rise jeans, clean look with light fade, has a button and zip closure, waistband with belt loops', 'men', 'jeans', 3, 2, 1099),
(1972407, 'Roadster Men Navy Regular Fit Solid Casual Shirt', 'Roadster', '92fcfdb37f3aefef4d1f253dfd614018.jpg', 'Navy Blue solid casual shirt, has a spread collar, button placket, 1 pocket, long sleeves with roll-up tab features, curved hem', 'men', 'casual_shirt', 3, 1, 499),
(1997249, 'Roadster  T-shirts', 'Roadster', '34418eadb3930848333c1bd032ca4b24.jpg', 'T-shirts in black has a V-neck, long sleeves', 'men', 'tshirt', 2, 1, 549),
(1997255, 'Roadster Men White Solid V-Neck T-Shirt', 'Roadster', 'e7521b44d5f377cc385c8a67b470cb3a.jpg', 'White solid T-shirt, has a V-neck, short sleeves', 'men', 'tshirt', 1, 1, 199),
(2004861, 'Adidas Men Yellow London Printed T-shirt', 'Adidas', 'd5870afc880bba35a35308fb70e07560.jpg', 'Yellow printed T-shirt, has a stand collar with a short button placket, short sleeves Engineered with Climacool and UPF 50+ technologies Warranty: 3 months from the date of purchase against manufacturing defects', 'men', 'tshirt', 6, 1, 2199),
(2008914, 'Jack & Jones Men Black Slim Fit Striped Casual Shirt', 'Jack & Jones', '8e8b9a7bb715d369cc97b2734b6a4ec4.jpg', 'Black and off-white striped casual shirt, has a semi-cutaway collar, button placket, long sleeves, curved hem', 'men', 'casual_shirt', 2, 1, 1319),
(2016267, 'John Players Men Blue Skinny Fit Low-Rise Clean Look Stretchable Jeans', 'John Players', 'fcbcd2eb13f3cc8b4f8d80f825ebe5fe.jpg', 'Blue medium wash 5-pocket low-rise jeans, clean look with light fade, has a button and zip closure, waistband with belt loops', 'men', 'jeans', 3, 2, 1349),
(2016450, 'John Players Men Red Printed Polo Collar T-shirt', 'John Players', 'af799c3c654a86194a3fa15bfafb4f34.jpg', 'Red printed T-shirt, has a polo collar, short sleeves', 'men', 'tshirt', 5, 1, 584),
(2021075, 'Flying Machine Men Blue Michael Slim Fit Mid-Rise Mildly Distressed Stretchable Jeans', 'Flying Machine', 'ba7e7955bcd882791dd26721b99bda5a.jpg', 'Blue medium wash 5-pocket mid-rise jeans, mildly distressed with light fade, has a button and zip closure, waistband with belt loops', 'men', 'jeans', 3, 2, 2299),
(2022755, 'Duke Men Navy Blue Relaxed Slim Fit Solid Chinos', 'Duke', '906d8dba4c00ce788a6b27dfbfdeaced.jpg', 'Navy Blue solid mid-rise chinos, has a button closure, 2 pockets', 'men', 'casual_trouser', 2, 2, 2599),
(2022801, 'Adidas NEO Men Red & White AOP Printed Round Neck T-shirt', 'Adidas', 'ac4291491ff2e02161c53c30a3b8dd47.jpg', 'Red and white printed T-shirt, has a round neck, short sleeves Warranty: 3 months from the date of purchase against manufacturing defects', 'men', 'active_tshirt', 5, 1, 1609),
(2022840, 'Adidas Men Blue D2M 3S Solid Polo Collar T-shirt', 'Adidas', 'bd3d8acacd406a7c1fd57a10c8116f4d.jpg', 'Blue solid T-shirt, has a polo collar, short sleeves Engineered with climalite technology Warranty: 3 months from the date of purchase against manufacturing defects', 'men', 'tshirt', 3, 1, 1449),
(2032668, 'WROGN Men Red Slim Fit Checked Casual Shirt', 'WROGN', '5cc2773465669b4ad807fae64fb0d326.jpg', 'Red checked casual shirt, has a spread collar, button placket, long sleeves, curved hem', 'men', 'casual_shirt', 5, 1, 1539),
(2050192, 'Tommy Hilfiger Men Blue Newyork Regular Fit Printed Casual Shirt', 'Tommy Hilfiger', '6158165faa9426d432d46f334019c95d.jpg', 'Blue printed casual shirt, has a button-down collar, button placket, long sleeves, curved hem', 'men', 'casual_shirt', 3, 1, 3399),
(2057709, 'John Players Men Black Solid V-Neck T-shirt', 'John Players', '6f39a4c39832d2c871955ddaca4998ae.jpg', 'Black solid T-shirt, has a V-neck, short sleeves', 'men', 'tshirt', 2, 1, 399),
(2057766, 'John Players Men Black Slim Fit Solid Formal Trousers', 'John Players', '4d928f9cff46cae0bb3ea5e59025a182.jpg', 'Black solid mid-rise formal trousers, has a button closure, 4 pockets Our stylist has paired these trousers with a belt These trousers will not come with a belt', 'men', 'formal_trouser', 2, 2, 719),
(2057771, 'John Players Men Beige Slim Fit Self-Design Formal Trousers', 'John Players', '5821c594fb917499822d0c95ba4a4da1.jpg', 'Beige self-design mid-rise formal trousers, has a button closure, 4 pockets Our stylist has paired these trousers with a belt These trousers will not come with a belt', 'men', 'formal_trouser', 1, 2, 719),
(2057853, 'John Players Men Blue Slim Fit Low-Rise Low Distress Stretchable Jeans', 'John Players', '954c217ce208eec1711f9edff9596d39.jpg', 'Blue medium wash 5-pocket low-rise jeans, low distress with light fade, has a button and zip closure, and a waistband with belt loops', 'men', 'jeans', 3, 2, 1349),
(2068185, 'Pepe Jeans Men Navy Mid-Rise Clean Look Stretchable Jeans', 'Pepe Jeans', 'e8f10f7fd27b2d312a76ce3de05a47e5.jpg', 'Navy dark wash 5-pocket mid-rise jeans, clean look with no fade, has whiskers, a button and zip closure, and a waistband with belt loops', 'men', 'jeans', 3, 2, 3329),
(2069656, 'Duke Men White & Navy Blue Regular Fit Printed Casual Shirt', 'Duke', 'c9718092727b5da6389dab1db424016e.jpg', 'White and navy blue printed casual shirt, has a slim collar, button placket, 1 pocket, long sleeves, curved hem', 'men', 'casual_shirt', 1, 1, 1295),
(2069670, 'Duke Men Yellow Printed Casual Shirt', 'Duke', 'fa4fe5bd5116448ee1a629ab75be6676.jpg', 'Light yellow printed casual shirt, has a cutaway collar, button placket, 1 pocket, long sleeves, curved hem', 'men', 'casual_shirt', 1, 1, 1525),
(2072172, 'WROGN Men Charcoal Grey Slim Fit Joggers', 'WROGN', 'c633e2f2129920b0c5dfc31d7cefd88e.jpg', 'Charcoal grey knitted mid-rise joggers, has an elasticated waistband with drawstring fastening, three pockets', 'men', 'track_pant', 2, 2, 1329),
(2075542, 'Tommy Hilfiger Men Black Solid Puffer Jacket', 'Tommy Hilfiger', 'cd32ff6aa26d95b334fa0a58df335462.jpg', 'Black solid puffer jacket, has a mandarin collar, 3 pockets, zip closure, long sleeves, straight hem, nylon lining', 'men', 'jacket', 2, 1, 5499),
(2076931, 'Jack & Jones Men Blue Slim Fit Self-Design Formal Shirt', 'Jack & Jones', 'f719c231ad3ef2def2ff11002a305b9a.jpg', 'Blue self-design formal shirt, has a slim collar, button placket, long sleeves, curved hem', 'men', 'formal_shirt', 1, 1, 1499),
(2076934, 'Jack & Jones Men Red & Black Slim Fit Checked Casual Shirt', 'Jack & Jones', 'a3a365cc4198ad72abcacb706ae90c2b.jpg', 'Red and black checked casual shirt, has a spread collar, button placket, 2 pockets, long sleeves, curved hem', 'men', 'casual_shirt', 5, 1, 1799),
(2078339, 'Duke Men Black Solid Polo Collar T-shirt', 'Duke', '237c939730272bc2517fed249791283a.jpg', 'Black solid T-shirt, has a polo collar, short sleeves, 1 pocket', 'men', 'tshirt', 2, 1, 521),
(2085971, 'Tommy Hilfiger Men White Original Solid Casual Shirt', 'Tommy Hilfiger', 'd26dbee6ef264dd15708bdeb929b3f0c.jpg', 'White solid casual shirt, has a spread collar, button placket, 1 pocket, long sleeves, curved hem', 'men', 'casual_shirt', 1, 1, 2699),
(2086163, 'Tommy Hilfiger Men Blue Straight Fit Solid Chinos', 'Tommy Hilfiger', 'f73a6deeffdf7b3cea13c25dd5e512c5.jpg', 'lue solid mid-rise chinos, has a zip closure, 4 pockets', 'men', 'casual_trouser', 1, 2, 4249),
(2099750, 'Manyavar Grey & Off-White Silk Sherwani', 'Manyavar', 'fd8c32689ec27838fef0efd8596544d0.jpg', 'Grey and off-white sherwani Grey sherwani has a mandarin collar, long sleeves, lightly padded shoulders, has a button placket closures, one pocket, side slits Off-white woven pleated pyjama', 'men', 'shervani', 1, 1, 11999),
(2114986, 'Manish Creations Green & Navy Solid Sherwani', 'Manish', 'f2702ce0afc324492539e863c1d8e6fa.jpg', 'Green and navy blue sherwani Green sherwani, has a stand collar, long sleeves, lightly padded shoulders, a concealed full button placket, two insert pockets, side slits, has an attached lining with a built-in welt pocket Navy blue woven Jodhpuri pants, has a zip fly with a hook-and-bar closure, two insert pockets', 'men', 'shervani', 4, 1, 6999),
(2118045, 'WROGN Men Blue & Black Slim Fit Checked Casual Shirt', 'WROGN', 'be43e42b5bcb3ada9d87b84bc552cc34.jpg', 'Blue and black checked casual shirt, has a spread collar, button placket, long sleeves, curved hem', 'men', 'casual_shirt', 3, 1, 1574),
(2121970, 'Flying Machine Men Blue Micheal Slim Fit Mid-Rise Mildly Distressed Stretchable Jeans', 'Flying Machine', '20839654b67ee6e8f8d007a2c3204270.jpg', 'Blue medium wash 5-pocket mid-rise jeans, mildly distressed with light fade, has a button and zip closure, waistband with belt loops', 'men', 'jeans', 3, 2, 2799),
(2127851, 'Moda Rapido Men Blue Tapered Fit Mid-Rise Clean Look Jeans', 'Moda Rapido', 'f9bbcf95ebcf7e7be59d1e4f09a7aac8.jpg', 'Blue medium wash 5-pocket mid-rise jeans, clean look with light fade, has a button and zip closure, waistband with belt loops', 'men', 'jeans', 3, 2, 1519),
(2129883, 'Roadster Men Grey Skinny Fit Clean Look Stretchable Jeans', 'Roadster', '59a8a247cd4c3589bf41985a72bf1557.jpg', 'Grey light wash 5-pocket mid-rise jeans, clean look with light fade, has a button and zip closure, waistband with belt loops', 'men', 'jeans', 9, 2, 1399),
(2135148, 'Roadster Men Black Slim Fit Mid-Rise Clean Look Jeans', 'Roadster', '7be146d39536ab27baa907765b4efb62.jpg', 'Black dark wash 5-pocket mid-rise jeans, clean look with no fade, has a button and zip closure, waistband with belt loops', 'men', 'jeans', 2, 2, 769),
(2142673, 'Jack & Jones Men Black Solid Biker Jacket', 'Jack & Jones', '082fbff6fcb977eb614774af72f07842.jpg', 'Black solid biker jacket, has a mock collar, three pockets, a full zip closure, long sleeves, a straight hem, and has an attached lining', 'men', 'jacket', 2, 1, 5999),
(2150855, 'Moda Rapido Men Blue Slim Fit Mid-Rise Clean Look Stretchable Jeans', 'Moda Rapido', 'f9bbcf95ebcf7e7be59d1e4f09a7aac8.jpg', 'Blue medium wash 5-pocket mid-rise jeans, clean look with light fade, has a button and zip closure, waistband with belt loops', 'men', 'jeans', 3, 2, 1139),
(2164408, 'Roadster Men Black & Maroon Slim Fit Checked Casual Shirt', 'Roadster', '23e3dd4f57b26e57ec1c55ec11f83fae.jpg', 'Black and maroon checked casual shirt, has a spread collar, button placket, long sleeves, curved hem', 'men', 'casual_shirt', 7, 1, 779),
(2193129, 'SOJANYA See Designs Men Sea Green Solid Straight Kurta', 'SOJANYA', '6b3b76b7dbb076c3eac5206aa51b9c2e.jpg', 'Sea green solid straight kurta, has a mandarin collar, long sleeves, curved hem, side slits', 'men', 'kurta', 3, 1, 1100);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `picture` text NOT NULL,
  `gender` text NOT NULL,
  `phone` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `username`, `password`, `picture`, `gender`, `phone`) VALUES
('Sohaib Alam', 'sohaibalam67', 'sohaib123', '56b715a784cae9774699840ff243dad7.jpg', 'Male', 7090157625),
('Sohaib', 'alam', 'alam', 'c9faf3b2c602ffe0c89bf139e7e93a0c.jpg', 'Male', 8867981670);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
