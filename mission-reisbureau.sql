-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2016 at 09:41 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mission-reisbureau`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `email` varchar(256) NOT NULL,
  `password` varchar(128) NOT NULL,
  `is_subscribed_to_newsletter` tinyint(1) DEFAULT NULL,
  `travel_points` int(100) DEFAULT NULL,
  `customer_id` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` varchar(32) NOT NULL,
  `city` varchar(100) NOT NULL,
  `date_of_arrival` varchar(100) NOT NULL,
  `date_of_departure` varchar(100) NOT NULL,
  `customer_id` varchar(32) NOT NULL,
  `room_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `city`, `date_of_arrival`, `date_of_departure`, `customer_id`, `room_id`) VALUES
('04bb9e2b21111708b40c62d50ee55a65', 'cadiz', '2016/11/08', '2016/11/28', '2619f1eb20754638db0fc9f9219db90d', 50),
('10fe729f79a1fd36dca5afbb8228ac94', 'cadiz', '2016/11/08', '2016/11/28', '77c28d657ef2cb845d960c53f808c4ef', 53),
('15985015e464f5505427bb945e282762', 'athens', '2016/11/08', '2016/11/28', '1aaa6996043aa2ade9bb704730b3e747', 20),
('209e8fd394beec909d3f00f7478a4115', 'cadiz', '2016/11/08', '2016/11/28', '826a7ef4bfeec41b1aca3b355bea6d19', 50),
('2a227f685e058d78f8711d895da140f1', 'athens', '2016/11/08', '2016/11/28', '156ea8a77a0b1e3580febe2774ac6989', 18),
('2bc27ade9381a78c60c80fece9f53ed6', 'athens', '2016/11/08', '2016/11/28', '617f41a50da2b53d6e79bf34728f4940', 18),
('2bf83e0f61a3a259b5712a695636787e', 'athens', '2016/11/08', '2016/11/28', '45cadbefe8468414d45ed66f15a7dadd', 20),
('2fa5e3efc202724b297e53544ea07191', 'chalcis', '2016/11/08', '2016/11/28', 'c35d42faf9eca51b0eb85dd5f876b529', 67),
('3720b264f8c908a6f45152e2d9fd13e1', 'cadiz', '2016/11/08', '2016/11/28', 'cacbf06f1c930cb2c26b195ad6faf129', 50),
('3c585cd151207a778d9870a9a3847d33', 'cadiz', '2016/11/08', '2016/11/28', '1a7c5106d102062dbd21bd4e24533fe3', 50),
('45dbed810d860fd704bae600baf3ba6e', 'argos', '2016/11/08', '2016/11/28', 'ad707453077479612a279423cd673e7f', 25),
('47285debddf2c71a945d89978c17f4d1', 'athens', '2016/11/08', '2016/11/28', '94ec88e53a527f8aebebdbf3ce9a6972', 18),
('4f4258b432b68099cebb32bdcb198324', 'larnaca', '2016/11/08', '2016/11/28', 'ef74b42a5c42d950583105f1aa298242', 75),
('509427c1e45e4cd855392a8992cb2c13', 'argos', '2016/11/08', '2016/11/28', '4bcc203a6870639a1456707892c51b87', 25),
('5237ae4dc746c043659282cf42c38b87', 'cadiz', '2016/11/08', '2016/11/28', '897f42506afd8455ee34d922910544c4', 50),
('5256c85f6d16021f375b4a7327f49c39', 'cadiz', '2016/11/08', '2016/11/28', 'a4d772e35e30a1538329ab7a4dab56c3', 50),
('59c83dabc43c365384b16d154da35599', 'athens', '2016/11/08', '2016/11/28', 'e8d0d1a77332a59f7b69bec6b4c40950', 18),
('5cdf2e9da20a1bc2842640615ac7a05a', 'napels', '2016/11/08', '2016/11/28', '211eb2ba2a58dbf8077855c711a400f9', 10),
('5f325524192eeb1dd8e6bc388d2b7ff7', 'athens', '2016/11/08', '2016/11/28', '70654e0186ea4d09a5f98acdefe40cd0', 16),
('6414e6c65f5a13fe5604e296d90ab44f', 'chalcis', '2016/11/08', '2016/11/28', '4dcbce417be2b2d0c39e4dac8b025dc9', 67),
('66fbaa0ccc86086a9ba2d63201074410', 'cadiz', '2016/11/08', '2016/11/28', 'af7d2b5c1e0fea28a86b846e7e646eed', 50),
('6818af5cddca3c16727471b9bc4c977b', 'argos', '2016/11/08', '2016/11/28', 'be8c3ac1e41c8741ffbc49dddde23892', 25),
('69fb7c1c1e9dff30c808c158c5743bc0', 'cadiz', '2016/11/08', '2016/11/28', '114027dbd5ff6f716a607c12fa6bbede', 50),
('6ee99e6e2a4f26be9f30d3eb1c472d08', 'athens', '2016/11/08', '2016/11/28', 'e85919bcfe63c056f19a1c1cae6c0848', 18),
('747fd69512badd149107ce9e93927ac5', 'athens', '2016/11/08', '2016/11/28', 'b943819734f3e7ac89ef07beb3b51734', 18),
('7e1a92bbf9cbd91c19e601f499c82be4', 'athens', '2016/11/08', '2016/11/28', '740a1b35695a59623b686c94cf8cb2cd', 17),
('80101dc1f550312775ae3ae6951d3445', 'cadiz', '2016/11/08', '2016/11/28', '451ece3790083fefc43fb501d9881c08', 50),
('806b07bb21c5f9e66aeca0dfb484868d', 'cadiz', '2016/11/08', '2016/11/28', '4726023451cb2f1fa293e67065f6438b', 53),
('828f55e943805ded446b4b9563b56554', 'larnaca', '2016/11/08', '2016/11/28', 'd9523cb6d7583dcf956519a630517b2f', 70),
('845bc06f5a81ccc8ab9d67ad6c3e6293', 'kutaisi', '2016/11/08', '2016/11/28', '264646b909236a41645e96dcd821661e', 80),
('8d3f583ba5f0c4205dacfd953ebdbf10', 'athens', '2016/11/08', '2016/11/28', 'af2cf4bda944e97a2dd8fb1897237cba', 18),
('8f7da7ce80519b9e07019b68c03480bc', 'athens', '2016/11/08', '2016/11/28', 'a9dcd3b1978668b86b13b6afc2927a43', 16),
('93e4d0288518042c16bbec5e7f627888', 'cadiz', '2016/11/08', '2016/11/28', '05fe2c4e54f64076954150fe408a86fb', 50),
('994fa538a800d0cd10094fcb940422ff', 'cadiz', '2016/11/08', '2016/11/28', 'c9b16a35214f12cdd3a06ba23a76fa75', 50),
('9b163ba3a19c3862b433e70e1e718637', 'athens', '2016/11/08', '2016/11/28', '31ffa0ef5a06218e7577dfbe0ffda5d8', 17),
('9fd9ecade2e1b4f3fa9e1abb19f8363d', 'athens', '2016/11/08', '2016/11/28', 'e51ec19200fa7e1b25814a88dfbd9166', 16),
('a0436cf4e8e058d0729ca9b27c2a41b6', 'chalcis', '2016/11/08', '2016/11/28', 'c63d9523175e6e1ad0f3eedf0c2fa48b', 67),
('a3513621f9c48137e33968800b1b29ab', 'cadiz', '2016/11/08', '2016/11/28', 'cb20d94976707e8aee57761f0c777be7', 50),
('a5f5b340462220c1295fabfee41b5d74', 'argos', '2016/11/08', '2016/11/28', 'be75018df86b60450294105ccf8c74b9', 25),
('a73ba5f9ce5f7ed64d0c3dfc26ad5406', 'cadiz', '2016/11/08', '2016/11/28', 'd5e2f4fcc5f04819a778e7b53cacd6de', 50),
('a99131681350a8e510d218283e7f9413', 'argos', '2016/11/08', '2016/11/28', '33090f6068fdcd2e07a5abe8267489cc', 25),
('acbb9a7497a0d03c064e98933ad5c2a2', 'athens', '2016/11/08', '2016/11/28', '623f0239812aa2e563b66410102464b9', 18),
('af6177a2ca7bb6dde59d3717bab0cf35', 'cadiz', '2016/11/08', '2016/11/28', '06d33cc7853967583b6ec160bad9adb3', 50),
('b27dc923cb7a38b993f1f14f05b61cb4', 'cadiz', '2016/11/08', '2016/11/28', '7a374cbc42fae91332b05bacef398f33', 50),
('b3da69704a0cd221a19f3174b2406243', 'athens', '2016/11/08', '2016/11/28', '3b9f05c65cbe8c4a2a6ed786f5b0a7bc', 18),
('bb340cb31536abd4493f0d331f26cbea', 'kutaisi', '2016/11/08', '2016/11/28', '21eae75f484fb61e8204e3fa3e007121', 76),
('c101254f441335ab30469f15c6942d6e', 'argos', '2016/11/08', '2016/11/28', 'e9573bd3f63676b1c6567492f1b9d9e8', 25),
('c49425045b72fae385e6b3c4a2819000', 'argos', '2016/11/08', '2016/11/28', '934922a85a87ffec77740a09b8859582', 25),
('cd9bf791f2bf242d70371a4826234fbd', 'napels', '2016/11/08', '2016/11/28', 'c9a6d1d5ce07b76aae2de159a7491fa1', 10),
('e5704c3a4cc589b36a8bd3b8ced37f7a', 'cadiz', '2016/11/08', '2016/11/28', 'f4e0e42ae29e2b56c26b173be7d34bea', 50),
('e7ebe461e0a67db988f0790bb3b424c5', 'athens', '2016/11/08', '2016/11/28', '144d3b7ad0178e75dcf95c12c9b97f6a', 18),
('ea0275b8cf050c9a8d99a3fcaf4b0a7a', 'athens', '2016/11/08', '2016/11/28', 'cf37e3f6a9b5ef35ba6b00ebedf59b9a', 18),
('ed7aab7a995f3daf293861461025f151', 'cadiz', '2016/11/08', '2016/11/28', 'fa5948c39b5a1569a150d2f56cda2b91', 50),
('ee6394f121150a164b7d1e0aa243b76a', 'cadiz', '2016/11/08', '2016/11/28', 'ba0b4157b775bfc9c0fd5553810a2b17', 50),
('f57f9f810cc68d108c25dcf112be84fa', 'athens', '2016/11/08', '2016/11/28', '6dfe16c7ae275ae7c995393cee0bfd74', 18),
('f7196a15af09e78d00065a6596f10888', 'athens', '2016/11/08', '2016/11/28', 'da69fc500885772bad544f658bbb7eb2', 18),
('fdb2a63cb45db61063e864df6d084e3e', 'athens', '2016/11/08', '2016/11/28', 'ac11539a411aef50046d21142b01952c', 18),
('feab974b6b775458715b15be84f2bcaf', 'athens', '2016/11/08', '2016/11/28', 'a01068c4eff81209c32dafb944702a71', 18),
('feb1a3390da48131e0420cb905995949', 'thebes', '2016/11/08', '2016/11/28', '6bc2ca4759156965ccf6ea044c8f596b', 34),
('fefff0bf537a87d9e7ad45d57d06b801', 'athens', '2016/11/08', '2016/11/28', '2710ab9cd7065d1302e85b3baa95377b', 18);

-- --------------------------------------------------------

--
-- Table structure for table `bus_reservation`
--

CREATE TABLE `bus_reservation` (
  `bus_reservation_id` varchar(32) NOT NULL,
  `boarding_point` varchar(50) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `boarding_point_return` varchar(50) NOT NULL,
  `booking_id` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus_reservation`
--

INSERT INTO `bus_reservation` (`bus_reservation_id`, `boarding_point`, `price`, `boarding_point_return`, `booking_id`) VALUES
('1e7ad5621eee19a85fdd86870778e323', 'Amsterdam', '50', 'larnaca', '4f4258b432b68099cebb32bdcb198324'),
('45f838c29b3c0e62bf4125c1493f5bf9', 'Groningen', '50', 'argos', '509427c1e45e4cd855392a8992cb2c13'),
('ebff594706813a6bc5a7bce30f3ad2a1', 'Groningen', '50', 'argos', 'c49425045b72fae385e6b3c4a2819000');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` varchar(32) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `zipcode` varchar(20) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `phonenumber` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `first_name`, `last_name`, `address`, `zipcode`, `city`, `country`, `phonenumber`) VALUES
('05fe2c4e54f64076954150fe408a86fb', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('06d33cc7853967583b6ec160bad9adb3', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('114027dbd5ff6f716a607c12fa6bbede', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('144d3b7ad0178e75dcf95c12c9b97f6a', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('156ea8a77a0b1e3580febe2774ac6989', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('1a7c5106d102062dbd21bd4e24533fe3', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('1aaa6996043aa2ade9bb704730b3e747', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('211eb2ba2a58dbf8077855c711a400f9', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('21eae75f484fb61e8204e3fa3e007121', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('2619f1eb20754638db0fc9f9219db90d', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('264646b909236a41645e96dcd821661e', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('2710ab9cd7065d1302e85b3baa95377b', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('31ffa0ef5a06218e7577dfbe0ffda5d8', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('33090f6068fdcd2e07a5abe8267489cc', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('3b9f05c65cbe8c4a2a6ed786f5b0a7bc', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('451ece3790083fefc43fb501d9881c08', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('45cadbefe8468414d45ed66f15a7dadd', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('4726023451cb2f1fa293e67065f6438b', 'tobias', 'schiphorst', 'naalland 171717', '1794aa', 'Texel city', 'Nederland', '645569465'),
('4bcc203a6870639a1456707892c51b87', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('4dcbce417be2b2d0c39e4dac8b025dc9', 'Ricardo', 'van der Heide', 'hanzeplein 11', '9742gv', 'groningen', 'Nederland', '546461'),
('617f41a50da2b53d6e79bf34728f4940', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('623f0239812aa2e563b66410102464b9', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('6bc2ca4759156965ccf6ea044c8f596b', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('6dfe16c7ae275ae7c995393cee0bfd74', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('70654e0186ea4d09a5f98acdefe40cd0', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('740a1b35695a59623b686c94cf8cb2cd', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('77c28d657ef2cb845d960c53f808c4ef', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('7a374cbc42fae91332b05bacef398f33', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('826a7ef4bfeec41b1aca3b355bea6d19', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('897f42506afd8455ee34d922910544c4', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('934922a85a87ffec77740a09b8859582', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('94ec88e53a527f8aebebdbf3ce9a6972', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('a01068c4eff81209c32dafb944702a71', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('a4d772e35e30a1538329ab7a4dab56c3', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('a9dcd3b1978668b86b13b6afc2927a43', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('ac11539a411aef50046d21142b01952c', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('ad707453077479612a279423cd673e7f', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('af2cf4bda944e97a2dd8fb1897237cba', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('af7d2b5c1e0fea28a86b846e7e646eed', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('b943819734f3e7ac89ef07beb3b51734', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('ba0b4157b775bfc9c0fd5553810a2b17', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('be75018df86b60450294105ccf8c74b9', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('be8c3ac1e41c8741ffbc49dddde23892', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('c35d42faf9eca51b0eb85dd5f876b529', 'Ricardo', 'van der Heide', 'hanzeplein 11', '9742gv', 'groningen', 'Nederland', '546461'),
('c63d9523175e6e1ad0f3eedf0c2fa48b', 'Ricardo', 'van der Heide', 'hanzeplein 11', '9742gv', 'groningen', 'Nederland', '546461'),
('c9a6d1d5ce07b76aae2de159a7491fa1', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('c9b16a35214f12cdd3a06ba23a76fa75', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('cacbf06f1c930cb2c26b195ad6faf129', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('cb20d94976707e8aee57761f0c777be7', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('cf37e3f6a9b5ef35ba6b00ebedf59b9a', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('d5e2f4fcc5f04819a778e7b53cacd6de', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('d9523cb6d7583dcf956519a630517b2f', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('da69fc500885772bad544f658bbb7eb2', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('e51ec19200fa7e1b25814a88dfbd9166', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('e85919bcfe63c056f19a1c1cae6c0848', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('e8d0d1a77332a59f7b69bec6b4c40950', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('e9573bd3f63676b1c6567492f1b9d9e8', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('ef74b42a5c42d950583105f1aa298242', 'tobias', 'schiphorst', 'naalland 171717', '1794aa', 'Texel city', 'Nederland', '645569465'),
('f4e0e42ae29e2b56c26b173be7d34bea', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100'),
('fa5948c39b5a1569a150d2f56cda2b91', 'rudolf', 'klijnhout', 'plutolaan 148', '9742gv', 'groningen', 'Nederland', '641235100');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `hotel_id` int(10) NOT NULL,
  `wifi` tinyint(1) NOT NULL,
  `breakfast` tinyint(1) NOT NULL,
  `swimmingpool` tinyint(1) NOT NULL,
  `private_parking` tinyint(1) NOT NULL,
  `television` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`hotel_id`, `wifi`, `breakfast`, `swimmingpool`, `private_parking`, `television`) VALUES
(1, 1, 1, 0, 0, 1),
(2, 0, 1, 0, 1, 1),
(3, 1, 1, 1, 0, 1),
(4, 0, 0, 1, 1, 1),
(5, 1, 1, 1, 1, 1),
(6, 0, 1, 0, 0, 0),
(7, 1, 0, 1, 0, 1),
(8, 0, 1, 1, 0, 1),
(9, 1, 1, 0, 1, 1),
(10, 1, 1, 0, 0, 1),
(11, 1, 0, 0, 1, 0),
(12, 1, 0, 0, 1, 1),
(13, 1, 0, 1, 1, 0),
(14, 1, 0, 1, 1, 0),
(15, 1, 1, 1, 1, 0),
(16, 0, 1, 0, 1, 1),
(17, 0, 1, 1, 0, 1),
(18, 1, 1, 0, 0, 0),
(19, 1, 1, 0, 1, 1),
(20, 0, 1, 1, 1, 1),
(21, 1, 0, 1, 1, 0),
(22, 1, 1, 0, 0, 1),
(23, 1, 0, 0, 0, 1),
(24, 1, 1, 1, 1, 1),
(25, 0, 1, 1, 0, 0),
(26, 0, 1, 0, 0, 1),
(27, 1, 0, 0, 1, 1),
(28, 1, 1, 1, 0, 1),
(29, 1, 0, 0, 0, 0),
(30, 1, 1, 0, 0, 0),
(31, 0, 0, 1, 0, 0),
(32, 1, 0, 1, 1, 1),
(33, 0, 1, 1, 1, 0),
(34, 1, 1, 1, 1, 0),
(35, 1, 0, 1, 1, 0),
(36, 1, 1, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `flight_id` varchar(10) NOT NULL,
  `departure_airport_code` varchar(5) NOT NULL,
  `destination_airport_code` varchar(5) NOT NULL,
  `departure_date` date NOT NULL,
  `departure_time` time NOT NULL,
  `arrival_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `flight_reservation`
--

CREATE TABLE `flight_reservation` (
  `flight_reservation_id` varchar(32) NOT NULL,
  `seat` varchar(4) NOT NULL,
  `price` decimal(6,0) NOT NULL,
  `booking_id` varchar(32) NOT NULL,
  `flight_id` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flight_reservation`
--

INSERT INTO `flight_reservation` (`flight_reservation_id`, `seat`, `price`, `booking_id`, `flight_id`) VALUES
('516d818567c7f2296e30002d6c715c28', '321', '9999', '2fa5e3efc202724b297e53544ea07191', '21235436'),
('create_uniqid()', '321', '9999', '747fd69512badd149107ce9e93927ac5', '21235436'),
('d9f7523ef158da683fa50e3d6d202d99', '321', '9999', 'a0436cf4e8e058d0729ca9b27c2a41b6', '21235436');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotel_id` int(10) NOT NULL,
  `hotel_name` varchar(50) NOT NULL,
  `stars` int(1) DEFAULT NULL,
  `rating` int(3) NOT NULL,
  `adress` varchar(100) NOT NULL,
  `zipcode` varchar(20) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `phonenumber` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotel_id`, `hotel_name`, `stars`, `rating`, `adress`, `zipcode`, `city`, `country`, `contact_person`, `phonenumber`) VALUES
(1, 'Moonlight hotel', 4, 58, 'Hallostraat 2', '2838AH', 'Rome', 'Italy', 'Mr Pizza', 612385726),
(2, 'Big bad wolf', 3, 29, 'Oligopolistraat 29', '2938 UM', 'Rome', 'Italy', 'Mr Tobby', 627361828),
(3, 'Hotel het kleintje', 3, 95, 'Ujlalaan 59', '7481UW', 'Rome', 'Italy', 'Mr tjopp', 638128592),
(4, 'De drijvende koe', 4, 85, 'Naplestraat 58', '9285UH', 'Napels', 'Italy', 'Ms Sandra', 672638182),
(5, 'The golden nugget', 2, 55, 'Utrechtstraat 92', '9284UU', 'Napels', 'Italy', 'Booy', 627187722),
(6, 'Grand amsterdam', 5, 85, 'Treintjesstraat 28', '2052QQ', 'Napels', 'Italy', 'Mr Bonjouno', 627365577),
(7, 'Het biertje', 4, 85, 'Doeistraat 59', '2837UH', 'Athens', 'Italy', 'Mr Uaos', 627385817),
(8, 'Royal palace', 2, 59, 'Palaclaan 22', '9283UU', 'Athens', 'Italy', 'Yoep', 627175928),
(9, 'Henk jan hotel', 5, 99, 'HJlaan 598', '8285QW', 'Athens', 'Italy', 'Mr Henk jan', 628375822),
(10, 'De zinkende koe', 2, 58, 'Bollestraat 228', '8661KM', 'Argos', 'Greece', 'Ulther', 628375927),
(11, 'Flying dog hotel', 4, 78, 'Doggylane 28', '7165QA', 'Argos', 'Greece', 'Ms Yulla', 628485920),
(12, 'Tobias hotel', 5, 95, 'Tobiasstraat 29', '5928UH', 'Argos', 'Greece', 'Tobias', 627656231),
(13, 'De bossche bol', 3, 85, 'Lollastraat 212', '9284UU', 'Thebes', 'Greece', 'Mr Miyagi', 623859293),
(14, 'The overcompensation', 2, 22, 'Kleinedinglaan 1', '2985QO', 'Thebes', 'Greece', 'Mr dooda', 628375929),
(15, 'Hotel klein zwitserland', 4, 59, 'Ulalalaan 782', '9841UT', 'Thebes', 'Greece', 'Mr Toot', 638371828),
(16, 'Sander hotel', 5, 94, 'Sanderstraat 29', '9485JJ', 'Lisbon', 'Portugal', 'Mr Sander', 628519366),
(17, 'Collegehotel', 3, 59, 'Yugolkaan 123', '9581', 'Lisbon', 'Portugal', 'Mr Jizol', 628385888),
(18, 'De lachende pul', 2, 62, 'Jizollaan 59', '8572WE', 'Lisbon', 'Portugal', 'Yummerz', 623591922),
(19, 'Lenovo', 5, 82, 'Lenovostraat 2851', '9280SS', 'Cadiz', 'Spain', 'Mr Spain', 623759277),
(20, 'Sinas perfekt hotel', 2, 95, 'Sinaslaan 225', '9582UU', 'Cadiz', 'Spain', 'Jaap', 628375828),
(21, 'Sanderonium', 4, 56, 'Straat 92', '1122IU', 'Cadiz', 'Spain', 'Azzer', 628375722),
(22, 'Hilton', 2, 81, 'Rensumaheerd 29', '9736HE', 'Groningen', 'Netherlands', 'Joop ', 617284927),
(23, 'Kust hotel', 4, 91, 'Rensumaheerd 42b', '9736AB', 'Groningen', 'Netherlands', 'Ricardo', 657947410),
(24, 'Het hotel', 2, 30, 'Bajesstraat 29', '8478YG', 'Groningen', 'The Netherlands', 'Jop', 627375522),
(25, 'Van der valk', 3, 57, 'Jeholastraat 1238', '9851UH', 'Chalcis', 'Greece', 'Mr Bobo', 627371122),
(26, 'Hampshire hotel', 2, 51, 'Raggestraat 228', '5618UM', 'Chalcis', 'Greece', 'Yoep', 628371828),
(27, 'Rudolf hotel', 5, 95, 'Rudulfstraat 124', '5710QN', 'Chalcis', 'Greece', 'Rudolf', 617824912),
(28, 'Ricardo hotel', 5, 92, 'Ricardostraat 238', '6877QT', 'Larnaca', 'Cyprus', 'Ricardo', 628375811),
(29, 'World wide web', 2, 59, 'Totterstraat 20', '9252EM', 'Larnaca', 'Cyprus', 'Tjabbie', 628381275),
(30, 'Biertent', 4, 98, 'bierhierstraat 291', '1831QA', 'Larnaca', 'Cyprus', 'Mr Arie', 612395224),
(31, 'Critical hotel', 3, 61, 'Hololensstraat 21', '9190SS', 'Kutaisi', 'Georgia', 'Mr George', 618284411),
(32, 'Hotel de fietsbel', 1, 11, 'Luilakstraat 298', '1199II', 'Kutaisi', 'Georgia', 'Ms George', 672592110),
(33, 'Standard', 4, 85, 'Straatjestraat 124', '8122TT', 'Kutaisi', 'Georgia', 'Sneep', 671825722),
(34, 'Hanza', 4, 51, 'Zernikeplein 51', '2985UH', 'Amsterdam', 'Netherlands', 'Piet', 618235911),
(35, 'The red lobster', 1, 100, 'Waterstraat 83', '9511UA', 'Amsterdam', 'Netherlands', 'Kees', 618372286),
(36, 'Het zoentje', 5, 51, 'Slippendewegstraat 281', '9411YY', 'Amsterdam', 'Netherlands', 'Boer jans', 618275511);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(10) NOT NULL,
  `beds` int(10) NOT NULL,
  `type` varchar(30) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `hotel_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `beds`, `type`, `price`, `hotel_id`) VALUES
(1, 1, 'standard', '123', 1),
(2, 2, 'wedding', '259', 1),
(3, 1, 'swek', '12', 1),
(4, 1, 'comfort', '124', 2),
(5, 2, 'wedding', '1255', 2),
(6, 2, 'luxe', '551', 3),
(7, 1, 'standard', '1253', 3),
(8, 2, 'swek', '728', 3),
(9, 2, 'luxe', '1239', 4),
(10, 1, 'wedding', '999', 4),
(11, 1, 'swek', '512', 5),
(12, 2, 'wedding', '6234', 5),
(13, 1, 'luxe', '518', 5),
(14, 2, 'standard', '127', 6),
(15, 1, 'comfort', '216', 6),
(16, 2, 'wedding', '1512', 7),
(17, 2, 'swek', '171', 7),
(18, 1, 'luxe', '1412', 7),
(19, 2, 'swek', '152', 8),
(20, 1, 'standard', '11', 8),
(21, 1, 'wedding', '195', 9),
(22, 1, 'comfort', '184', 9),
(23, 2, 'standard', '121', 9),
(24, 1, 'luxe', '111', 10),
(25, 2, 'comfort', '24', 10),
(26, 2, 'wedding', '1838', 11),
(27, 2, 'swek', '551', 11),
(28, 1, 'luxe', '928', 11),
(29, 2, 'swek', '110', 12),
(30, 2, 'comfort', '109', 12),
(31, 2, 'standard', '150', 13),
(32, 1, 'luxe', '195', 13),
(33, 2, 'wedding', '1929', 13),
(34, 1, 'comfort', '111', 14),
(35, 2, 'luxe', '551', 14),
(36, 2, 'standard', '513', 15),
(37, 1, 'swek', '612', 15),
(38, 2, 'swek', '211', 15),
(39, 1, 'swek', '1239', 16),
(40, 1, 'wedding', '2581', 16),
(41, 2, 'standard', '150', 17),
(42, 2, 'comfort', '221', 17),
(43, 1, 'wedding', '511', 17),
(44, 2, 'standard', '300', 18),
(45, 1, 'wedding', '5151', 18),
(46, 2, 'standard', '511', 19),
(47, 2, 'swek', '610', 19),
(48, 1, 'wedding', '811', 19),
(49, 1, 'standard', '215', 20),
(50, 2, 'comfort', '315', 20),
(51, 2, 'standard', '123', 21),
(52, 2, 'luxe', '245', 21),
(53, 1, 'wedding', '512', 21),
(54, 1, 'standard', '231', 22),
(55, 2, 'comfort', '412', 22),
(56, 1, 'wedding', '5112', 23),
(57, 2, 'standard', '123', 23),
(58, 2, 'comfort', '2151', 23),
(59, 1, 'standard', '512', 24),
(60, 2, 'swek', '612', 24),
(61, 2, 'standard', '123', 25),
(62, 2, 'comfort', '234', 25),
(63, 2, 'luxe', '345', 25),
(64, 1, 'standard', '678', 26),
(65, 1, 'wedding', '1245', 26),
(66, 2, 'luxe', '235', 27),
(67, 2, 'swek', '351', 27),
(68, 1, 'wedding', '1591', 27),
(69, 1, 'standard', '245', 28),
(70, 2, 'comfort', '541', 28),
(71, 2, 'standard', '216', 29),
(72, 2, 'swek', '311', 29),
(73, 1, 'wedding', '512', 29),
(74, 2, 'standard', '451', 30),
(75, 2, 'comfort', '612', 30),
(76, 2, 'comfort', '1522', 31),
(77, 2, 'swek', '1721', 31),
(78, 1, 'wedding', '4512', 31),
(79, 2, 'comfort', '124', 32),
(80, 2, 'luxe', '215', 32),
(81, 2, 'standard', '123', 33),
(82, 2, 'luxe', '512', 33),
(83, 1, 'wedding', '911', 33),
(84, 1, 'standard', '123', 34),
(85, 2, 'comfort', '214', 34),
(86, 2, 'luxe', '1231', 35),
(87, 2, 'swek', '1402', 35),
(88, 1, 'wedding', '2131', 35),
(89, 2, 'comfort', '512', 36),
(90, 1, 'wedding', '925', 36);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `e-mail` (`email`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `customer_id_2` (`customer_id`);

--
-- Indexes for table `bus_reservation`
--
ALTER TABLE `bus_reservation`
  ADD PRIMARY KEY (`bus_reservation_id`),
  ADD KEY `customer_id` (`booking_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `customer_id` (`customer_id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`flight_id`,`departure_date`,`departure_time`);

--
-- Indexes for table `flight_reservation`
--
ALTER TABLE `flight_reservation`
  ADD PRIMARY KEY (`flight_reservation_id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `hotel_id` (`hotel_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `customer_account` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bus_reservation`
--
ALTER TABLE `bus_reservation`
  ADD CONSTRAINT `bus_reservation_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`booking_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `facilities`
--
ALTER TABLE `facilities`
  ADD CONSTRAINT `facilities_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`hotel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `flight_reservation`
--
ALTER TABLE `flight_reservation`
  ADD CONSTRAINT `flight_reservation_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`booking_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`hotel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
