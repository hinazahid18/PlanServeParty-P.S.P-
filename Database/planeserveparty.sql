-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2022 at 05:08 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `planeserveparty`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `role`) VALUES
(3, 'mohsan', 'mohsan@gmail.com', '123456', 0),
(6, 'hamza', 'hamza@gmail.com', '123456', 1),
(8, 'ali', 'ali@gmail.com', '123456', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `categories_id` int(255) NOT NULL,
  `sub_category` int(255) NOT NULL,
  `image` mediumtext NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `long_description` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `categories_id`, `sub_category`, `image`, `name`, `date`, `description`, `long_description`) VALUES
(3, 10, 11, '1647859365.jpg', 'BRIDAL FASHION', '2022-03-21', 'Choose Honey Gold For Your Pre-Wedding Functions!', '<div><div>Yellow is a colour that stands for many important things in a wedding ceremony but most of all, it screams- Hello&nbsp;Sunshine! It\'s a happy and fun colour, that can fit into your wedding in many forms. And while we love the bright tones of yellow, there\'s something beautiful about another hue of yellow that\'s caught our eye.&nbsp;</div><div>Yes, we\'re talking about the trendy honey-gold colour!</div><div>Seen on various brides over the past month, this sublime shade is tough to overlook. So, if you\'re looking to include this colour into your wedding ensemble, then here are some ideas on how you can slay in them!</div></div><div><br></div><div><div style=\"text-align:center;\"><img src=\"//images.shaadisaga.com/shaadisaga_production/photos/pictures/003/432/472/new_medium/indianfootprints.jpg?1647241797\"></div><br></div><div><span style=\"color: rgb(0, 0, 0); font-family: -apple-system, BlinkMacSystemFont, &quot;segoe ui&quot;, Roboto, Helvetica, Arial, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;;\">The lehenga that actually inspired this entire blog was Fashion Stylist&nbsp;Shirali Shah Patel\'s beautiful honey gold ensemble for her&nbsp;Mehendi function. Her Raw Mango lehenga paired with a stunning neckpiece from Tamraa Bespoke Jewellery stole our hearts in just one glance.</span><br></div><div><span style=\"color: rgb(0, 0, 0); font-family: -apple-system, BlinkMacSystemFont, &quot;segoe ui&quot;, Roboto, Helvetica, Arial, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;;\"><div style=\"text-align:center;\"><img src=\"//images.shaadisaga.com/shaadisaga_production/photos/pictures/003/435/545/new_medium/130904360_1196733347387122_4464825526972566019_n.jpg?1647282068\"></div><br></span></div>');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `booking_name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `guest` varchar(255) DEFAULT NULL,
  `event_date` date NOT NULL,
  `function_time` varchar(255) NOT NULL,
  `booking_status` enum('pending','confirm','complete') NOT NULL DEFAULT 'pending',
  `booking_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `booking_name`, `price`, `city`, `user_name`, `phone`, `email`, `guest`, `event_date`, `function_time`, `booking_status`, `booking_date`) VALUES
(1, 'Dream Valley', '1200', 'multan', 'mohsan ali', '7528988312', 'mohsanchaudhary11@gmail.com', '506', '2022-03-28', 'day', 'confirm', '2022-03-20'),
(3, 'Focus Wedding Photographers', '12000', 'multan', 'mohsan', '1234567', 'admin@gmail.com', NULL, '2022-03-21', 'night', 'confirm', '2022-03-21'),
(5, 'Dream Valley', '1200', 'multan', 'mohsan', '1234567', 'mohsanchaudhary11@gmail.com', '50', '2022-04-26', 'day', 'pending', '2022-04-22'),
(6, 'Focus Wedding Photographers', '12000', 'multan', 'mohsan', '1234567', 'mohsanchaudhary11@gmail.com', NULL, '2022-04-30', 'day', 'pending', '2022-04-22'),
(7, 'Birthday hall', '1200', 'Islamabad', 'mohsan', '7528988312', 'admin@gmail.com', '678', '2022-05-02', 'day', 'pending', '2022-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(255) NOT NULL,
  `categories_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_name`) VALUES
(1, 'Venues'),
(2, 'vandors'),
(3, 'Events'),
(6, 'shop'),
(8, 'photos'),
(10, 'blog'),
(11, 'E-Invites');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `categories_id` int(255) NOT NULL,
  `sub_category` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `long_description` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `categories_id`, `sub_category`, `image`, `name`, `city`, `price`, `description`, `long_description`) VALUES
(1, 3, 3, '1647795917.jpg', 'Birthday hall', 'lahore', '1500', 'A premiere contemporary lifestyle destination', '<div><h2 class=\"bold-24\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-weight: 700; line-height: 1.5em; font-size: 24px; padding: 0px; color: rgb(53, 59, 80); font-family: -apple-system, BlinkMacSystemFont, &quot;segoe ui&quot;, Roboto, Helvetica, Arial, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;;\">About</h2><div class=\"padt-32\" style=\"padding-top: 32px; color: rgb(53, 59, 80); font-family: -apple-system, BlinkMacSystemFont, &quot;segoe ui&quot;, Roboto, Helvetica, Arial, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;; font-size: 16px;\"><div>INTRODUCTION</div><div>A premiere contemporary lifestyle destination, Grand Hyatt Mumbai offers the ideas setting in the island city of Mumbai for weddings that are conducted with unparalleled style, elegance and attention to detail. Experience the grand life in Mumbai with 547 contemporary guestrooms &amp; suites and 110 service apartments. With over 30,000 square feet of sophisticated, indoor banquet space on offer, in...&nbsp;<a class=\"brand hover-underline read-more-vendor-about\" data-about=\"A premiere contemporary lifestyle destination, Grand Hyatt Mumbai offers the ideas setting in the island city of Mumbai for weddings that are conducted with unparalleled style, elegance and attention to detail. Experience the grand life in Mumbai with 547 contemporary guestrooms &amp; suites and 110 service apartments. With over 30,000 square feet of sophisticated, indoor banquet space on offer, including one of the largest ballrooms; additional smaller venues, a spacious pre-function area and a dedicated events team, we create memorable experiences at the most luxurious event venue in Mumbai. Revel in the luxury of personalized themes, delectable menu options, customized seating within a backdrop of dramatic architecture and innovative design. From large scale weddings to intimate functions, we help unlock the extraordinary in every moment by creating experiences beyond expectation. \" href=\"https://www.shaadisaga.com/wedding-venues/mumbai/grand-hyatt-mumbai\" style=\"color: var(--brand)  !important;\">Read more</a></div></div><div class=\"padt-32\" style=\"padding-top: 32px; color: rgb(53, 59, 80); font-family: -apple-system, BlinkMacSystemFont, &quot;segoe ui&quot;, Roboto, Helvetica, Arial, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;; font-size: 16px;\"><div>PROPERTY TYPE</div><div>5 Star Hotel</div></div><div class=\"padt-32\" style=\"padding-top: 32px; color: rgb(53, 59, 80); font-family: -apple-system, BlinkMacSystemFont, &quot;segoe ui&quot;, Roboto, Helvetica, Arial, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;; font-size: 16px;\"><div>MAXIMUM CAPACITY</div><div>2000 guests (Outdoor)</div></div><div class=\"padt-32\" style=\"padding-top: 32px; color: rgb(53, 59, 80); font-family: -apple-system, BlinkMacSystemFont, &quot;segoe ui&quot;, Roboto, Helvetica, Arial, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;; font-size: 16px;\"><div>EVENT AREAS</div><ul style=\"margin-top: 0px; margin-bottom: 1rem;\"><li class=\"normal-14 padt-8\" style=\"padding-top: 8px; font-size: 14px; line-height: 1.4;\">Grand ballroom</li><ul class=\"disc-style\" style=\"margin-top: 0px; margin-bottom: 0px;\"><li class=\"normal-14 padt-8\" style=\"padding-top: 8px; font-size: 14px; line-height: 1.4;\">800 - Fixed capacity</li><li class=\"normal-14 padt-8\" style=\"padding-top: 8px; font-size: 14px; line-height: 1.4;\">1200 - Floating capacity</li></ul><li class=\"normal-14 padt-8\" style=\"padding-top: 8px; font-size: 14px; line-height: 1.4;\">Grand Salon</li><ul class=\"disc-style\" style=\"margin-top: 0px; margin-bottom: 0px;\"><li class=\"normal-14 padt-8\" style=\"padding-top: 8px; font-size: 14px; line-height: 1.4;\">120 - Fixed capacity</li><li class=\"normal-14 padt-8\" style=\"padding-top: 8px; font-size: 14px; line-height: 1.4;\">200 - Floating capacity</li></ul><li class=\"normal-14 padt-8\" style=\"padding-top: 8px; font-size: 14px; line-height: 1.4;\">Grand Hyatt lawn</li><ul class=\"disc-style\" style=\"margin-top: 0px; margin-bottom: 0px;\"><li class=\"normal-14 padt-8\" style=\"padding-top: 8px; font-size: 14px; line-height: 1.4;\">1500 - Fixed capacity</li><li class=\"normal-14 padt-8\" style=\"padding-top: 8px; font-size: 14px; line-height: 1.4;\">2000 - Floating capacity</li></ul></ul></div><div class=\"padt-32\" style=\"padding-top: 32px; color: rgb(53, 59, 80); font-family: -apple-system, BlinkMacSystemFont, &quot;segoe ui&quot;, Roboto, Helvetica, Arial, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;; font-size: 16px;\"><div>OTHER FACILITIES</div><div>Bridal Room</div></div><div class=\"padt-32\" style=\"padding-top: 32px; color: rgb(53, 59, 80); font-family: -apple-system, BlinkMacSystemFont, &quot;segoe ui&quo'),
(2, 3, 3, '1647796138.jpg', 'Birthday hall', 'Islamabad', '1200', ' It is the first and only air-conditioned venue for weddings and massive parties', '<div><h2 class=\"title-bar padding-h-20 h-50 v-center h4\" style=\"color: rgb(74, 74, 74); -webkit-tap-highlight-color: rgba(0, 0, 0, 0); outline: none; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; display: flex; align-items: center; height: 50px; font-size: 22px; padding-left: 20px; padding-right: 20px; font-family: proxima-nova, sans-serif;\">About&nbsp;Panjim Community Center&nbsp;-&nbsp;Wedding Venues,&nbsp;Goa</h2><div class=\"about-body border-t\" style=\"color: rgb(74, 74, 74); -webkit-tap-highlight-color: rgba(0, 0, 0, 0); outline: none; border-top: 1px solid rgb(215, 215, 215); font-family: proxima-nova, sans-serif; font-size: 14px;\"><div class=\"info padding-h-20 padding-v-20\" style=\"color: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); outline: none; padding: 20px;\"><div>Panjim Community is a Goa based hotel which is a great venue for all ocasions. It is the first and only air-conditioned venue for weddings and massive parties in Panjim. whether it is engagement to grand wedding reception in Goa. This community centre bring that special touch to your special day.If you are looking out for a wedding venue thats located in the heart of the city, has the most luxurious interiors and the best acoustics, to give your wedding the grandeur it desires, you have to look no further. From engagements to grand wedding receptions in Goa, let Panjim Community Centre bring that special touch to your special day</div><br style=\"color: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); outline: none;\"><div>Ideally located at Mala, Panjim community can accomodate upto 1000 chairs in theatre style and 400 chairs round the table. Also the dining area is air-conditioned venue which is an ideal party venue in Goa for birthday, anniversaries and get togethar. It can accomodate 75 guests in the round table seating format. You can choose menu from the range of inhouse caterers available whereas Panjim community will be also helping you with the decoraters as they will customize the decoration as per your need and choice</div></div></div></div>');

-- --------------------------------------------------------

--
-- Table structure for table `e_invites`
--

CREATE TABLE `e_invites` (
  `invites_id` int(11) NOT NULL,
  `categories_id` int(255) NOT NULL,
  `sub_category` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `long_description` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `e_invites`
--

INSERT INTO `e_invites` (`invites_id`, `categories_id`, `sub_category`, `image`, `name`, `price`, `description`, `long_description`) VALUES
(1, 11, 12, '1650473178.jpg', 'Wedding Invitationqswdef', '400', 'Wedding Invitation Card', '<div><h2 class=\"bold-24\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-weight: bold; line-height: 1.5em; font-size: 24px; padding: 0px; color: rgb(53, 59, 80); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" helvetica,=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" \"segoe=\"\" ui=\"\" symbol\";\"=\"\">About</h2><div class=\"padt-32\" style=\"padding-top: 32px; color: rgb(53, 59, 80); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" helvetica,=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" \"segoe=\"\" ui=\"\" symbol\";=\"\" font-size:=\"\" 16px;\"=\"\"><div>INTRODUCTION</div><div>Iktaara is based in Bangalore and has grown into an internationally known Design House for its creative work, which is original, organic and unique to each client that walks through its doors. #SCN1&nbsp;<a class=\"brand hover-underline read-more-vendor-about\" data-about=\"Iktaara is based in Bangalore and has grown into an internationally    known Design House for its creative work, which is original, organic and    unique to each client that walks through its doors.\r\n\r\n#SCN1\" href=\"https://www.weddingbazaar.com/wedding-invitation-cards/bangalore/iktaara\" style=\"color: var(--brand)  !important;\">Read more</a></div></div><div class=\"padt-32\" style=\"padding-top: 32px; color: rgb(53, 59, 80); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" helvetica,=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" \"segoe=\"\" ui=\"\" symbol\";=\"\" font-size:=\"\" 16px;\"=\"\"><div>WORKING SINCE</div><div>2010</div></div><div class=\"padt-32\" style=\"padding-top: 32px; color: rgb(53, 59, 80); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" helvetica,=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" \"segoe=\"\" ui=\"\" symbol\";=\"\" font-size:=\"\" 16px;\"=\"\"><div>OUR SPECIALITY</div><div>Traditional Invitations, Funky &amp; Offbeat Invitations, Modern Invites, Boxed Invitations, Wedding Stationery</div></div><div class=\"padt-32\" style=\"padding-top: 32px; color: rgb(53, 59, 80); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" helvetica,=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" \"segoe=\"\" ui=\"\" symbol\";=\"\" font-size:=\"\" 16px;\"=\"\"><div>SHIPPING POLICY</div><div>International &amp; Domestic Shipping</div></div></div>'),
(2, 11, 12, '1650647641.jpg', 'Jimit Card', '300', 'Jimit Card have carved out a niche ', '<div><h2 class=\"bold-24\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-weight: bold; line-height: 1.5em; font-size: 24px; padding: 0px; color: rgb(53, 59, 80); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Helvetica, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">About</h2><div class=\"padt-32\" style=\"padding-top: 32px; color: rgb(53, 59, 80); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Helvetica, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 16px;\"><div>INTRODUCTION</div><div>We at Jimit Card have carved out a niche for ourselves as one of the leading Manufacturers and Exporters of Indian Wedding Invitations with coordinated wedding stationery. It was founded in Mumbai in 2008. The basic concept being to market Wedding Invitations and stationeries locally. After being well established in the Indian market, the company\'s corporate vision was to spread its business across the globe and become the market leader in Indian Wedding Invitations. Subsequently, through exclusive and innovative designs, exquisite quality and a wide range, the products gained acceptance quickly to capture a worldwide audience. Our success in all parts of the world is mainly due to the high standards of creativity and innovation that we introduce to all our products.</div></div><div class=\"padt-32\" style=\"padding-top: 32px; color: rgb(53, 59, 80); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Helvetica, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 16px;\"><div>WORKING SINCE</div><div>2009</div></div><div class=\"padt-32\" style=\"padding-top: 32px; color: rgb(53, 59, 80); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Helvetica, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 16px;\"><div>OUR SPECIALITY</div><div>Traditional Invitations, Handmade Cards, Modern Invites, Boxed Invitations, Wedding Stationery</div></div><div class=\"padt-32\" style=\"padding-top: 32px; color: rgb(53, 59, 80); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Helvetica, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 16px;\"><div>SHIPPING POLICY</div><div>International &amp; Domestic Shipping</div></div></div>');

-- --------------------------------------------------------

--
-- Table structure for table `e_invites_order`
--

CREATE TABLE `e_invites_order` (
  `invite_id` int(11) NOT NULL,
  `invite_name` varchar(255) NOT NULL,
  `invite_img` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `total_card` varchar(255) DEFAULT NULL,
  `event_date` date NOT NULL,
  `invite_status` enum('pending','confirm','complete') NOT NULL DEFAULT 'pending',
  `invite_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `e_invites_order`
--

INSERT INTO `e_invites_order` (`invite_id`, `invite_name`, `invite_img`, `price`, `user_name`, `phone`, `email`, `total_card`, `event_date`, `invite_status`, `invite_date`) VALUES
(7, 'Jimit Card', '1650647641.jpg', '300', 'mohsan ', '1234567', 'mohsanchaudhary11@gmail.com', '50', '2022-04-29', 'pending', '2022-04-23');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `img_id` int(11) NOT NULL,
  `add_id` int(11) NOT NULL,
  `img` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `photo_id` int(11) NOT NULL,
  `categories_id` int(255) NOT NULL,
  `sub_category` int(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`photo_id`, `categories_id`, `sub_category`, `photo`, `description`) VALUES
(6, 8, 9, '1647858622.jpg', 'Stunning pink bridal lehenga'),
(7, 8, 9, '1647858635.jpg', 'bride in a modern red lehenga by seema gujral'),
(8, 8, 9, '1648038268.jpg', 'Light bridal lehenga');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `shop_id` int(11) NOT NULL,
  `categories_id` int(255) NOT NULL,
  `sub_category` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `long_description` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`shop_id`, `categories_id`, `sub_category`, `image`, `name`, `city`, `price`, `description`, `long_description`) VALUES
(1, 6, 6, '1647797608.jpg', 'Zoya Lehenga', 'Karachi', '20000', 'The essence of the clothing is very stylish, glamorous and classy.', '<div><h2 class=\"bold-24\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-weight: 700; line-height: 1.5em; font-size: 24px; padding: 0px; color: rgb(53, 59, 80); font-family: -apple-system, BlinkMacSystemFont, &quot;segoe ui&quot;, Roboto, Helvetica, Arial, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;;\">About</h2><div class=\"padt-32\" style=\"padding-top: 32px; color: rgb(53, 59, 80); font-family: -apple-system, BlinkMacSystemFont, &quot;segoe ui&quot;, Roboto, Helvetica, Arial, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;; font-size: 16px;\"><div>INTRODUCTION</div><div>\'Prathiksha Design House\' is the brain child of Bangalore based designer Prathiksha Hegde, who specializes in women\'s wear giving utmost importance to design detailing and fit. The essence of the clothing is very stylish, glamorous and classy. Having a fine eye for detailing and embroidery, this creativity fueled fashion designer, graduated from Fashion Institute Of Design and Merchandising, ...&nbsp;<a class=\"brand hover-underline read-more-vendor-about\" data-about=\"\'Prathiksha Design House\' is the brain child of Bangalore based designer Prathiksha Hegde, who specializes in women\'s wear giving utmost importance to design detailing and fit.   The essence of the clothing is very stylish, glamorous and classy. Having a fine eye for detailing and embroidery, this creativity fueled fashion designer, graduated from Fashion Institute Of Design and Merchandising, Los Angeles 2010. Prathiksha believes that great fashion should be available to the masses. Her clothes targets a wide selection of the audience, and her personal touch in the clothes cannot be missed. Prathiksha has showcased her collections at Bangalore Fashion week ‘Summer Showers’ 2013 and various other Fashion Shows and Events. Prathiksha has dressed a lot of kannada movie stars like Aindrita Ray, Ramya Barna, Ragini Dwivedi, Shweta Srivatsava for various occasions and movie costumes.   \" href=\"https://www.shaadisaga.com/bridal-designers/bangalore/prathiksha-design-house\" style=\"color: var(--brand)  !important;\">Read more</a></div></div><div class=\"padt-32\" style=\"padding-top: 32px; color: rgb(53, 59, 80); font-family: -apple-system, BlinkMacSystemFont, &quot;segoe ui&quot;, Roboto, Helvetica, Arial, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;; font-size: 16px;\"><div>WORKING SINCE</div><div>2011</div></div><div class=\"padt-32\" style=\"padding-top: 32px; color: rgb(53, 59, 80); font-family: -apple-system, BlinkMacSystemFont, &quot;segoe ui&quot;, Roboto, Helvetica, Arial, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;; font-size: 16px;\"><div>STORE TYPE</div><div>Couture Brand</div></div><div class=\"padt-32\" style=\"padding-top: 32px; color: rgb(53, 59, 80); font-family: -apple-system, BlinkMacSystemFont, &quot;segoe ui&quot;, Roboto, Helvetica, Arial, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;; font-size: 16px;\"><div>CORE SPECIALITY</div><div>Custom designed outfits from scratch, Ready to purchase outfits, Sample pieces on which orders can be placed</div></div></div>'),
(2, 6, 6, '1647797740.jpg', 'Red Raw Silk Bridal Lehenga Choli', 'multan', '12000', '\'Bubber\' by Aanchal & Sanjana is an Indian couture fashion label for men & women.', '<div><h2 class=\"bold-24\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-weight: 700; line-height: 1.5em; font-size: 24px; padding: 0px; color: rgb(53, 59, 80); font-family: -apple-system, BlinkMacSystemFont, &quot;segoe ui&quot;, Roboto, Helvetica, Arial, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;;\">About</h2><div class=\"padt-32\" style=\"padding-top: 32px; color: rgb(53, 59, 80); font-family: -apple-system, BlinkMacSystemFont, &quot;segoe ui&quot;, Roboto, Helvetica, Arial, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;; font-size: 16px;\"><div>INTRODUCTION</div><div>\'Bubber\' by Aanchal &amp; Sanjana is an Indian couture fashion label for men &amp; women. Known for their customized garments, unique aesthetic &amp; exquisite workmanship.</div></div><div class=\"padt-32\" style=\"padding-top: 32px; color: rgb(53, 59, 80); font-family: -apple-system, BlinkMacSystemFont, &quot;segoe ui&quot;, Roboto, Helvetica, Arial, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;; font-size: 16px;\"><div>WORKING SINCE</div><div>2011</div></div><div class=\"padt-32\" style=\"padding-top: 32px; color: rgb(53, 59, 80); font-family: -apple-system, BlinkMacSystemFont, &quot;segoe ui&quot;, Roboto, Helvetica, Arial, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;; font-size: 16px;\"><div>STORE TYPE</div><div>Couture Brand</div></div><div class=\"padt-32\" style=\"padding-top: 32px; color: rgb(53, 59, 80); font-family: -apple-system, BlinkMacSystemFont, &quot;segoe ui&quot;, Roboto, Helvetica, Arial, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;; font-size: 16px;\"><div>CORE SPECIALITY</div><div>Ready to purchase outfits, Sample pieces on which orders can be placed, Custom designed outfits from scratch</div></div></div>');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `sub_id` int(255) NOT NULL,
  `categories_id` int(255) NOT NULL,
  `sub_categories` varchar(255) NOT NULL,
  `subcat_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`sub_id`, `categories_id`, `sub_categories`, `subcat_image`) VALUES
(1, 1, 'Banquet Halls', '1647792624.jpg'),
(2, 2, 'photographers', '1647794804.jpg'),
(3, 3, 'birthday', '1647795813.jpg'),
(6, 6, 'lehenga', '1647797472.jpg'),
(9, 8, 'Bridal Lehenga', '1647858576.jpg'),
(11, 10, 'Bridal Fashion', '1647858880.jpg'),
(12, 11, 'Wedding Cards', '1650472673.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendor_id` int(11) NOT NULL,
  `categories_id` int(255) NOT NULL,
  `sub_category` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `long_description` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_id`, `categories_id`, `sub_category`, `image`, `name`, `city`, `price`, `description`, `long_description`) VALUES
(2, 2, 2, '1647795699.jpg', 'Focus Wedding Photographers', 'multan', '12000', 'Focus Wedding Photographers', '<div><h2 class=\"bold-24\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-weight: 700; line-height: 1.5em; font-size: 24px; padding: 0px; color: rgb(53, 59, 80); font-family: -apple-system, BlinkMacSystemFont, &quot;segoe ui&quot;, Roboto, Helvetica, Arial, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;;\">About</h2><div class=\"padt-32\" style=\"padding-top: 32px; color: rgb(53, 59, 80); font-family: -apple-system, BlinkMacSystemFont, &quot;segoe ui&quot;, Roboto, Helvetica, Arial, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;; font-size: 16px;\"><div>INTRODUCTION</div><div>I am Amar Laddi, the owner of Focus Wedding Photographers, based in Punjab. My team and I started working in 2009 &amp; have covered more than 1000 weddings. We expertise in wedding photography and related events. We are a team of professional photographers who are waiting to shoot your beautiful and special events. We keep ourselves updated with the latest tools and techniques and use the perfect ...&nbsp;<a class=\"brand hover-underline read-more-vendor-about\" data-about=\"I am Amar Laddi, the owner of Focus Wedding Photographers, based in Punjab. My team and I started working in 2009 &amp; have covered more than 1000 weddings. We expertise in wedding photography and related events. We are a team of professional photographers who are waiting to shoot your beautiful and special events. We keep ourselves updated with the latest tools and techniques and use the perfect lighting to capture the best pictures.\" href=\"https://www.shaadisaga.com/wedding-photographers/ludhiana/focus-wedding-photographers-0fc582d2-b7f3-43a8-82da-600cfe1c721c\" style=\"color: var(--brand)  !important;\">Read more</a></div></div><div class=\"padt-32\" style=\"padding-top: 32px; color: rgb(53, 59, 80); font-family: -apple-system, BlinkMacSystemFont, &quot;segoe ui&quot;, Roboto, Helvetica, Arial, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;; font-size: 16px;\"><div>WORKING SINCE</div><div>2000</div></div><div class=\"padt-32\" style=\"padding-top: 32px; color: rgb(53, 59, 80); font-family: -apple-system, BlinkMacSystemFont, &quot;segoe ui&quot;, Roboto, Helvetica, Arial, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;; font-size: 16px;\"><div>TRAVEL POLICY</div><div>Travel &amp; Stay paid by client</div></div></div>');

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `venue_id` int(11) NOT NULL,
  `categories_id` int(255) NOT NULL,
  `sub_category` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `long_description` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`venue_id`, `categories_id`, `sub_category`, `image`, `name`, `city`, `price`, `description`, `long_description`) VALUES
(1, 1, 1, '1647792773.jpg', 'Wedding Venues,  Velachery', 'lahore', '1500', 'Located in Velachery, the heart of the city of lahore, The Westin is an epitome of luxury and excellence', '<div><h2 class=\"title-bar padding-h-20 h-50 v-center h4\" style=\"color: rgb(74, 74, 74); -webkit-tap-highlight-color: rgba(0, 0, 0, 0); outline: none; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; display: flex; align-items: center; height: 50px; font-size: 22px; padding-left: 20px; padding-right: 20px; font-family: proxima-nova, sans-serif;\">About&nbsp;The Westin Chennai&nbsp;-&nbsp;Wedding Venues,<span style=\"color: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); outline: none;\">&nbsp;Velachery,&nbsp;</span>Lahore</h2><div class=\"about-body border-t\" style=\"color: rgb(74, 74, 74); -webkit-tap-highlight-color: rgba(0, 0, 0, 0); outline: none; border-top: 1px solid rgb(215, 215, 215); font-family: proxima-nova, sans-serif; font-size: 14px;\"><div class=\"info padding-h-20 padding-v-20\" style=\"color: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); outline: none; padding: 20px;\"><div>Located in Velachery, the heart of the city of lahore, The Westin is an epitome of luxury and excellence. A part of the prestigious Westin Hotels, the hotel provides spacious and elegant venue space which is suitable for all types of pre-wedding and post-wedding functions. Their splendid services make your stay larger than life and unforgettable for sure. Their excellently talented and dedicated staff takes care of all your needs and strive to achieve complete customer satisfaction. With a crisp modern décor and heavenly ambience, the place will surely make you fall in love with it. Taking care of the minutest detil of your wedding, their personal planners will make your wedding a special and memorable affair.</div><br style=\"color: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); outline: none;\"><div>Having 215 luxurious rooms with state of the art amenities and a soothing décor, the place provides ultimate leisure and tranquility. With the rich interiors and exclusive facilities, the banquet hall is perfect for small as well as large gatherings. The elegantly appointed room can accommodate upto 600 people. Their talented team of master chefs prepare a customised menu of finger licking good dishes to serve your taste buds. They provide a variety of delectable cuisines ranging from Indian and Italian to Chinese , Continental and Thai. The in-house bar and lounge is a perfect place to relax with some soothing music and exotic cocktails and spirits. When it comes to décor, their team of creative professionals provide you a stunning and personalized décor that fits your budget. The management team helps you to execute each and every event with utmost perfection.</div></div></div></div>'),
(2, 1, 1, '1647793009.jpg', 'Dream Valley', 'multan', '1200', 'Dream Valley Resorts is a beatiful destination, located in multan. ', '<div><div>Dream Valley Resorts is a beatiful destination, located in multan. Accomodating over 2000 guests, its an ideal wedding destination. With close proximity to the airport, it provides total privacy for your functions, world class hospitality standards, good family entertainment and a place for fun and frolic, world class hospitality standards, good family entertainment and a place for fun and frolic, making it your one stop destination for your special days.</div><div>They aim to provide quality service at affordable rates. In the words of the Founder Promoter Mr. K Santosh Reddy, “Our success is attributed to a combination of multiple things, including hard work and perseverance, positive thinking, sincere approach and a desire to serve and social responsibility.” They provide inhouse catering service that specialize in delicious food and cuisines all over the world, making it a great choice for your wedding functions.</div></div>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `e_invites`
--
ALTER TABLE `e_invites`
  ADD PRIMARY KEY (`invites_id`);

--
-- Indexes for table `e_invites_order`
--
ALTER TABLE `e_invites_order`
  ADD PRIMARY KEY (`invite_id`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`photo_id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`shop_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`venue_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `e_invites`
--
ALTER TABLE `e_invites`
  MODIFY `invites_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `e_invites_order`
--
ALTER TABLE `e_invites_order`
  MODIFY `invite_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `sub_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `venue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
