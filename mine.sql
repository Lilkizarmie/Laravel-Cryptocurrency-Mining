-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2022 at 09:41 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mine`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_site`
--

CREATE TABLE `about_site` (
  `id` int(1) NOT NULL,
  `about` text DEFAULT NULL,
  `terms` text DEFAULT NULL,
  `privacy_policy` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_site`
--

INSERT INTO `about_site` (`id`, `about`, `terms`, `privacy_policy`, `created_at`, `updated_at`) VALUES
(1, '<p style=\"text-align: justify;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p style=\"text-align: justify;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humours.</p>', '<p style=\"text-align: justify;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p style=\"text-align: justify;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humours.</p>', '<p style=\"text-align: justify;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p style=\"text-align: justify;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humours.</p>', '2020-02-09 08:42:14', '2020-02-09 07:42:14');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Codekage', '$2y$10$LEdx7w1obfM0xXtjdQq7Bu2JYX7JYj8EEgNa83vHZYONlSp/J10C6', '', '2022-01-28 20:11:26', '2022-01-29 01:11:26');

-- --------------------------------------------------------

--
-- Table structure for table `coinpayment_transactions`
--

CREATE TABLE `coinpayment_transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `txn_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buyer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buyer_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_expires` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_total_fiat` decimal(10,2) DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amountf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirms_needed` int(11) DEFAULT NULL,
  `payment_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qrcode_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receivedf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recv_confirms` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timeout` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `checkout_url` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect_url` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancel_url` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coinpayment_transactions`
--

INSERT INTO `coinpayment_transactions` (`id`, `uuid`, `txn_id`, `order_id`, `buyer_name`, `buyer_email`, `currency_code`, `time_expires`, `address`, `amount_total_fiat`, `amount`, `amountf`, `coin`, `confirms_needed`, `payment_address`, `qrcode_url`, `received`, `receivedf`, `recv_confirms`, `status`, `status_text`, `status_url`, `timeout`, `checkout_url`, `redirect_url`, `cancel_url`, `type`, `payload`, `created_at`, `updated_at`) VALUES
(4, '244d32ea-d969-426a-b206-d9fedde7f4f8', 'CPGB3M5DX42PHKLLBKVOQE1FJV', 'uHWbiHbTgYqRMOyB', 'Raphael Abayomi', 'raphyabak@gmail.com', 'USD', '1644727823', '3BHNBvXvH9YAwhVGmSQ8buubU4x6TP9yJp', '101.05', '237000', '0.00237000', 'BTC', 2, '3BHNBvXvH9YAwhVGmSQ8buubU4x6TP9yJp', 'https://www.coinpayments.net/qrgen.php?id=CPGB3M5DX42PHKLLBKVOQE1FJV&key=ca53a79efad1dcac3e6e62b8ac87abff', '0', '0.00000000', '0', '0', 'Waiting for buyer funds...', 'https://www.coinpayments.net/index.php?cmd=status&id=CPGB3M5DX42PHKLLBKVOQE1FJV&key=ca53a79efad1dcac3e6e62b8ac87abff', '30600', 'http://localhost:8000/coinpayment/make/eyJpdiI6ImxjdkFieUNWNi9QQkdLRlRpOEtBMlE9PSIsInZhbHVlIjoiMHlZdDI2UlkvVGMzcU5xTVRXTmYvckZrTktoV0QxczdYMlUzNXhmSE4rQUF6RmRESVVMbHVwN3ZKM0JSZWcwc3BYK2tLR0M5MUpTbit1SlNKVWxPNWNGb2ZpckFXN2tUaXlOWFRFYkJBN08yeFJ1OU5PYlV0Z2ZvVFcxeS9iQTJmZWY1Zkx6cXZVT1kvaXV6NWNibngvRVhtRStyR25HbllvQXpXemx1KzF4bXBWUENuaFR1L3hBS2dINUFkOXZDWVVaUkVWa1g1TG80bzRlTktUVVk0NGs0VHFoemxnSDZsVzJoOU84ZHNNSWpEcUY5MTA0UjZIb2EyVVBWOVZXR2FyVHZtWHV2dXlMd01pVW16TDdCOVU3UHFlVEJseko4UERyZUpaL1hRM0JiNHd1aUl4RW5PS1M0MVl1SkxHMHBjSHlBYkJxelk0dEdSWVBvcUcyRGpSNFVzNG5LWUJZSjZoNmNKYVlIeTFULzZQZzVLVDVHdWtPdDVOUTBMTVBXakVnS1R3L2UyVlhKNUY4dzhNQm5TRXlFMmlMdTV1UXpBQXZCYjVLaXJnM2h1SGE3Rm5DckpNU0JrWlN0czBCZWU1dnQreUhkL1NrRHk3cUhLT0o2TEdUb3lOakxrOWVMYm9La2FTYmFCNmMvUW1Lb3ZySGRjTnZmMlJWQ1UzVFdibnlRMlJRSkZMZUpVa045NUptemxha09Jb3dldEc5UzJmbVpxRFlNTDU5Z0YwUlZ6UDRON0tNU0lCc2pBS0R2NWp5c2N0R2NqUUphR2xUY2hGSXNUTE1sdnQ0bGY1MDQ5ZHpRSGt5N1l0MW82dXJucEQzUGZWMWE4NklmNXlTQzhkYVpyTkdYSlpjUldZbUIrdy9yWE1UUG9hNFRWS0I5VmVTYkM1M2M4TDFpcE1IenlHRG9Qd0M3QVY3Rm1LRzMiLCJtYWMiOiI5ZjJhNTA4NTgwYzE3MTc1ZjU0NDM0ZjU5YWJkMTMyZTgxMjU2ZjllMWU1ZTYxZGQ0ZDBjN2ZjMGE3NGI5NDUxIn0=', 'http://localhost:8000/user/preview', 'http://localhost:8000/user/preview', 'coins', '{\"foo\":{\"bar\":\"baz\"}}', '2022-02-12 19:20:27', '2022-02-12 19:20:27'),
(5, '224f9de1-1f84-44ec-b080-d5ba8808f543', 'CPGB21MTHUCDL9OIBWIPFR38U8', 'mWLsGFvpUEFY4pTf', 'Raphael Abayomi', 'raphyabak@gmail.com', 'USD', '1644704591', 'n2zrHj3Vcon9Hxwwtbke6kq2RFqFsA61Tc', '101.05', '79263000', '0.79263000', 'LTCT', 0, 'n2zrHj3Vcon9Hxwwtbke6kq2RFqFsA61Tc', 'https://www.coinpayments.net/qrgen.php?id=CPGB21MTHUCDL9OIBWIPFR38U8&key=060e4e055a516a8e5360e34b230f7f0d', '0', '0.00000000', '0', '0', 'Waiting for buyer funds...', 'https://www.coinpayments.net/index.php?cmd=status&id=CPGB21MTHUCDL9OIBWIPFR38U8&key=060e4e055a516a8e5360e34b230f7f0d', '3600', 'http://localhost:8000/coinpayment/make/eyJpdiI6IkNSMkN3RjUyVkJvZnEyRVdMOWFyWWc9PSIsInZhbHVlIjoiM2ZLMldydmhEYkw3K01WMGkzcFpHQXByQVFrZCtrYnRYQ29TMkpWbjBKOXZxZStzUGFnV2NmWUJNNE9kTVBEeEhzVXFFbWIrWVJ3bkxTQjVjb0k2VUR2ODVkUEdmdEhBY0lvMU1Ndk55L2JIdkNQdVc1dXBTa3podDlCMzNDK1hMbEhjdVRmcmlRVW94aHNYNnBzVkJrNnJ4anp5aDBsZU82bEJwMGppN3F4aVdPRE9mUXQyYzRHYWRsQ1lPMm1DTldJVU5ZaUZaNmNpMnJTeVVWUkdoZGk3bzM5SytXMkRLbk8wWDVvRVpLTEtVVzQyL3BYamFDYmdBV04zUWNiKzVQNCs0Q0NsdU1ObGZKamRBNnpRQjFRaVc2Z0w2cFVITUcyU0dQMmNoT2M2UDk4VWRwT0xieXE0emRKRXNmSVM0MkovWGVoQzlLSUgwYXBCcWdiR3d4R3RXMzQ4U0VPek1wTmRQdzQyZ2xlYVBkQ2tVQ1JwR1cweGlUNXgvVlVpSlppYnM0a3N6THdvU1JjSTNMTzRNeWRuUlR3MERiRzJKbHZRc3BzWFFOVWVzZHd0UG1RaE5jOW5Rc1dVY08zTVBjSkFHT1Jmb01pWXRoK0Y2ZVF4bUxnM3FEQllxVXV3OTNVeExIQVJkWVJvcXZOSnpXTTJweTNKWjZlbzRkMnNXckdjWGVXZW81NDNHcUI0ajJVQklxVEhlUTdwU3JTY3JBZjV2eXhTVG1zVzdCdWR0WVpjNDAyWmJWb28rY2JsaGRNNGpEa2RwalFFRnRzNUlSc3FFVVQxWnVpVjZNRDlzei9JalF3YmxJeEJVWm0xYnZUR2RuM0NxWlYrUHZNUDBnMEJRTkNTd1JBeTFlekhvM3hSdnMxcStXckF5ekJFeDZRSk43S3dPVXVnYjdvdWtOamdvbmpudFJTK0dURXQiLCJtYWMiOiIyMWQ0NmFlMzA1MTk2NmExOGMzYjRjNTUyNzMzODQ5ZGQ2MzVmYTdmMWEzZDk0ODM2YzZkZjI2MzhkN2I5ZWI5In0=', 'http://localhost:8000/user/preview', 'http://localhost:8000/user/preview', 'coins', '{\"foo\":{\"bar\":\"baz\"}}', '2022-02-12 20:23:15', '2022-02-12 20:23:15');

-- --------------------------------------------------------

--
-- Table structure for table `coinpayment_transaction_items`
--

CREATE TABLE `coinpayment_transaction_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `coinpayment_transaction_id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `currency_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coinpayment_transaction_items`
--

INSERT INTO `coinpayment_transaction_items` (`id`, `coinpayment_transaction_id`, `description`, `price`, `qty`, `subtotal`, `currency_code`, `type`, `state`, `created_at`, `updated_at`) VALUES
(1, 4, 'Plan Deposit', '101.05', '1.00', '101.05', 'USD', NULL, NULL, '2022-02-12 19:20:27', '2022-02-12 19:20:27'),
(2, 5, 'Plan Deposit', '101.05', '1.00', '101.05', 'USD', NULL, NULL, '2022-02-12 20:23:15', '2022-02-12 20:23:15');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `seen` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `full_name`, `mobile`, `email`, `message`, `seen`, `created_at`, `updated_at`) VALUES
(7, 'Kevin Johnson', '86323579493', 'tbformleads@gmail.com', 'Hello \r\n \r\nMy main objective here, is to help increase revenue for you by producing an animated video that will generate leads and sales for your business 24/7, for just $97. \r\n \r\nBut this offer is only good this week, so get your video before the deadline. \r\n \r\nWatch Our Video Now!   https://bit.ly/Xpress97offer \r\n \r\nFor less than you spend on coffee each month you get an American Owned Video company that can write your script, create your story board, lay-in a good soundtrack and produce an awesome video that brings home the bacon. \r\n \r\nAgain, this $97 promotion is for this week only. Don’t miss out!!! \r\n \r\nI’m in, show me what you got.   https://bit.ly/Xpress97offer \r\n \r\nBest, \r\n \r\nKevin Johnson \r\nBusiness Development Manager', 0, '2022-02-01 00:24:29', '2022-02-01 00:24:29'),
(8, 'Marty Tierney', '85142174227', 'livestaffinghub@gmail.com', 'Hello \r\n \r\nMy Name is Marty with Live Staff Hub.  My main objective here, is to help you increase revenue for your business by providing Social Media Marketing & Management for only $499 per month! \r\n \r\nTo learn more: WATCH MY VIDEO  https://bit.ly/499SocialMediaOffer \r\n \r\nOur specialists in Facebook, Instagram, LinkedIn and Twitter have a singular purpose and that is to drive more sales for your business. \r\n \r\nThis $499 promotion is for this week only. So, if you want to get this deal before the deadline, click the link below. \r\n \r\nTo learn more: WATCH MY VIDEO https://bit.ly/499SocialMediaOffer \r\n \r\nBest, \r\n \r\nMarty Tierney', 0, '2022-02-04 05:49:10', '2022-02-04 05:49:10'),
(9, 'Mike Page', '84623929912', 'no-replyDizarty@gmail.com', 'Howdy \r\n \r\nI have just checked  cryptmine.cloud for  the current search visibility and saw that your website could use an upgrade. \r\n \r\nWe will enhance your SEO metrics and ranks organically and safely, using only whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nPlease check our pricelist here, we offer SEO at cheap rates. \r\nhttps://www.hilkom-digital.de/cheap-seo-packages/ \r\n \r\nStart enhancing your sales and leads with us, today! \r\n \r\n \r\nregards \r\nMike Page\r\n \r\nHilkom Digital Team \r\nsupport@hilkom-digital.de', 0, '2022-02-05 15:19:01', '2022-02-05 15:19:01'),
(10, 'Diane Angelori', '83825917121', 'g.a.76.5.2.719@gmail.com', 'Hello \r\n \r\nI\'m Diane Angelori, online trading expert. I want you to know that Online trading (Crypto, Forex and Binary option) is a good thing if you have a good trading strategy, I use to loose a lot of funds in online trading before I got to where I am today. If you need assistance on how to trade and recover back all the money you have lost to your broker and want to be a successful online trader like me, write to me via email below to get an amazing strategy. \r\n \r\nIf you are having problems withdrawing your profit from your Crypt, Forex or Binary option trading account even when you were given a bonus, just contact me, I have worked with some Trade, Regulatory Agencies for 9years, and I have helped a lot of people get back their lost funds from their stubborn brokers successfully and I won\'t stop until I have helped as many as possible. For more info you can contact me via my email address: angeloridiane@protonmail.com', 0, '2022-02-09 07:07:29', '2022-02-09 07:07:29'),
(11, 'Mike Holiday', '87311919518', 'no-replyDizarty@gmail.com', 'Hello \r\n \r\nWe all know the importance that dofollow link have on any website`s ranks. \r\nHaving most of your linkbase filled with nofollow ones is of no good for your ranks and SEO metrics. \r\n \r\nBuy quality dofollow links from us, that will impact your ranks in a positive way \r\nhttps://www.digital-x-press.com/product/150-dofollow-backlinks/ \r\n \r\nBest regards \r\nMike Holiday\r\n \r\nsupport@digital-x-press.com', 0, '2022-02-09 19:24:42', '2022-02-09 19:24:42');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `country` varchar(100) DEFAULT NULL,
  `currency` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `symbol` varchar(100) DEFAULT NULL,
  `rate` float DEFAULT NULL,
  `status` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `country`, `currency`, `name`, `symbol`, `rate`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Albania', 'Leke', 'ALL', 'Lek', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(2, 'America', 'Dollars', 'USD', '$', 1, 1, '2020-04-23 14:05:15', '2020-04-23 13:05:15'),
(3, 'Afghanistan', 'Afghanis', 'AFN', '؋', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(4, 'Argentina', 'Pesos', 'ARS', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(5, 'Aruba', 'Guilders', 'AWG', 'ƒ', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(6, 'Australia', 'Dollars', 'AUD', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(7, 'Azerbaijan', 'New Manats', 'AZN', 'ман', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(8, 'Bahamas', 'Dollars', 'BSD', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(9, 'Barbados', 'Dollars', 'BBD', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(10, 'Belarus', 'Rubles', 'BYR', 'p.', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(11, 'Belgium', 'Euro', 'EUR', '€', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(12, 'Beliz', 'Dollars', 'BZD', 'BZ$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(13, 'Bermuda', 'Dollars', 'BMD', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(14, 'Bolivia', 'Bolivianos', 'BOB', '$b', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(15, 'Bosnia and Herzegovina', 'Convertible Marka', 'BAM', 'KM', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(16, 'Botswana', 'Pula', 'BWP', 'P', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(17, 'Bulgaria', 'Leva', 'BGN', 'лв', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(18, 'Brazil', 'Reais', 'BRL', 'R$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(19, 'Britain (United Kingdom)', 'Pounds', 'GBP', '£', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(20, 'Brunei Darussalam', 'Dollars', 'BND', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(21, 'Cambodia', 'Riels', 'KHR', '៛', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(22, 'Canada', 'Dollars', 'CAD', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(23, 'Cayman Islands', 'Dollars', 'KYD', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(24, 'Chile', 'Pesos', 'CLP', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(25, 'China', 'Yuan Renminbi', 'CNY', '¥', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(26, 'Colombia', 'Pesos', 'COP', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(27, 'Costa Rica', 'Colón', 'CRC', '₡', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(28, 'Croatia', 'Kuna', 'HRK', 'kn', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(29, 'Cuba', 'Pesos', 'CUP', '₱', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(30, 'Cyprus', 'Euro', 'EUR', '€', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(31, 'Czech Republic', 'Koruny', 'CZK', 'Kč', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(32, 'Denmark', 'Kroner', 'DKK', 'kr', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(33, 'Dominican Republic', 'Pesos', 'DOP ', 'RD$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(34, 'East Caribbean', 'Dollars', 'XCD', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(35, 'Egypt', 'Pounds', 'EGP', '£', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(36, 'El Salvador', 'Colones', 'SVC', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(37, 'England (United Kingdom)', 'Pounds', 'GBP', '£', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(38, 'Euro', 'Euro', 'EUR', '€', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(39, 'Falkland Islands', 'Pounds', 'FKP', '£', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(40, 'Fiji', 'Dollars', 'FJD', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(41, 'France', 'Euro', 'EUR', '€', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(42, 'Ghana', 'Cedis', 'GHC', '¢', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(43, 'Gibraltar', 'Pounds', 'GIP', '£', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(44, 'Greece', 'Euro', 'EUR', '€', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(45, 'Guatemala', 'Quetzales', 'GTQ', 'Q', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(46, 'Guernsey', 'Pounds', 'GGP', '£', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(47, 'Guyana', 'Dollars', 'GYD', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(48, 'Holland (Netherlands)', 'Euro', 'EUR', '€', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(49, 'Honduras', 'Lempiras', 'HNL', 'L', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(50, 'Hong Kong', 'Dollars', 'HKD', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(51, 'Hungary', 'Forint', 'HUF', 'Ft', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(52, 'Iceland', 'Kronur', 'ISK', 'kr', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(53, 'India', 'Rupees', 'INR', 'Rp', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(54, 'Indonesia', 'Rupiahs', 'IDR', 'Rp', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(55, 'Iran', 'Rials', 'IRR', '﷼', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(56, 'Ireland', 'Euro', 'EUR', '€', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(57, 'Isle of Man', 'Pounds', 'IMP', '£', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(58, 'Israel', 'New Shekels', 'ILS', '₪', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(59, 'Italy', 'Euro', 'EUR', '€', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(60, 'Jamaica', 'Dollars', 'JMD', 'J$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(61, 'Japan', 'Yen', 'JPY', '¥', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(62, 'Jersey', 'Pounds', 'JEP', '£', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(63, 'Kazakhstan', 'Tenge', 'KZT', 'лв', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(64, 'Korea (North)', 'Won', 'KPW', '₩', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(65, 'Korea (South)', 'Won', 'KRW', '₩', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(66, 'Kyrgyzstan', 'Soms', 'KGS', 'лв', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(67, 'Laos', 'Kips', 'LAK', '₭', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(68, 'Latvia', 'Lati', 'LVL', 'Ls', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(69, 'Lebanon', 'Pounds', 'LBP', '£', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(70, 'Liberia', 'Dollars', 'LRD', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(71, 'Liechtenstein', 'Switzerland Francs', 'CHF', 'CHF', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(72, 'Lithuania', 'Litai', 'LTL', 'Lt', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(73, 'Luxembourg', 'Euro', 'EUR', '€', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(74, 'Macedonia', 'Denars', 'MKD', 'ден', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(75, 'Malaysia', 'Ringgits', 'MYR', 'RM', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(76, 'Malta', 'Euro', 'EUR', '€', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(77, 'Mauritius', 'Rupees', 'MUR', '₨', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(78, 'Mexico', 'Pesos', 'MXN', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(79, 'Mongolia', 'Tugriks', 'MNT', '₮', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(80, 'Mozambique', 'Meticais', 'MZN', 'MT', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(81, 'Namibia', 'Dollars', 'NAD', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(82, 'Nepal', 'Rupees', 'NPR', '₨', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(83, 'Netherlands Antilles', 'Guilders', 'ANG', 'ƒ', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(84, 'Netherlands', 'Euro', 'EUR', '€', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(85, 'New Zealand', 'Dollars', 'NZD', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(86, 'Nicaragua', 'Cordobas', 'NIO', 'C$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(87, 'Nigeria', 'Nairas', 'NGN', '₦', 390, 0, '2020-04-23 14:05:15', '2020-04-23 13:05:15'),
(88, 'North Korea', 'Won', 'KPW', '₩', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(89, 'Norway', 'Krone', 'NOK', 'kr', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(90, 'Oman', 'Rials', 'OMR', '﷼', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(91, 'Pakistan', 'Rupees', 'PKR', '₨', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(92, 'Panama', 'Balboa', 'PAB', 'B/.', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(93, 'Paraguay', 'Guarani', 'PYG', 'Gs', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(94, 'Peru', 'Nuevos Soles', 'PEN', 'S/.', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(95, 'Philippines', 'Pesos', 'PHP', 'Php', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(96, 'Poland', 'Zlotych', 'PLN', 'zł', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(97, 'Qatar', 'Rials', 'QAR', '﷼', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(98, 'Romania', 'New Lei', 'RON', 'lei', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(99, 'Russia', 'Rubles', 'RUB', 'руб', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(100, 'Saint Helena', 'Pounds', 'SHP', '£', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(101, 'Saudi Arabia', 'Riyals', 'SAR', '﷼', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(102, 'Serbia', 'Dinars', 'RSD', 'Дин.', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(103, 'Seychelles', 'Rupees', 'SCR', '₨', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(104, 'Singapore', 'Dollars', 'SGD', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(105, 'Slovenia', 'Euro', 'EUR', '€', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(106, 'Solomon Islands', 'Dollars', 'SBD', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(107, 'Somalia', 'Shillings', 'SOS', 'S', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(108, 'South Africa', 'Rand', 'ZAR', 'R', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(109, 'South Korea', 'Won', 'KRW', '₩', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(110, 'Spain', 'Euro', 'EUR', '€', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(111, 'Sri Lanka', 'Rupees', 'LKR', '₨', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(112, 'Sweden', 'Kronor', 'SEK', 'kr', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(113, 'Switzerland', 'Francs', 'CHF', 'CHF', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(114, 'Suriname', 'Dollars', 'SRD', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(115, 'Syria', 'Pounds', 'SYP', '£', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(116, 'Taiwan', 'New Dollars', 'TWD', 'NT$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(117, 'Thailand', 'Baht', 'THB', '฿', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(118, 'Trinidad and Tobago', 'Dollars', 'TTD', 'TT$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(119, 'Turkey', 'Lira', 'TRY', 'TL', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(120, 'Turkey', 'Liras', 'TRL', '£', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(121, 'Tuvalu', 'Dollars', 'TVD', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(122, 'Ukraine', 'Hryvnia', 'UAH', '₴', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(123, 'United Kingdom', 'Pounds', 'GBP', '£', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(124, 'United States of America', 'Dollars', 'USD', '$', NULL, 0, '2020-04-23 14:02:54', '2020-04-23 13:02:54'),
(125, 'Uruguay', 'Pesos', 'UYU', '$U', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(126, 'Uzbekistan', 'Sums', 'UZS', 'лв', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(127, 'Vatican City', 'Euro', 'EUR', '€', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(128, 'Venezuela', 'Bolivares Fuertes', 'VEF', 'Bs', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(129, 'Vietnam', 'Dong', 'VND', '₫', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(130, 'Yemen', 'Rials', 'YER', '﷼', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(131, 'Zimbabwe', 'Zimbabwe Dollars', 'ZWD', 'Z$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(132, 'India', 'Rupees', 'INR', '₹', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `gateway_id` int(11) DEFAULT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usd` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btc_amo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btc_wallet` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secret` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `try` int(11) NOT NULL DEFAULT 0,
  `txn_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deposits`
--

INSERT INTO `deposits` (`id`, `user_id`, `gateway_id`, `amount`, `charge`, `usd`, `btc_amo`, `btc_wallet`, `trx`, `secret`, `status`, `try`, `txn_id`, `status_url`, `created_at`, `updated_at`) VALUES
(167, 47, 501, '302.5', '2.5', '3.78', '0', '', 'fkQOhW6DYkjG5Kfn', 'SRQPHYy8', 0, 0, NULL, NULL, '2022-01-30 12:08:35', '2022-01-30 12:08:35'),
(168, 47, 501, '302.5', '2.5', '3.78', '0', '', '2fEzFQnPePcrFFRP', 'RrDQUqY8', 0, 0, NULL, NULL, '2022-01-30 12:08:36', '2022-01-30 12:08:36'),
(169, 47, 501, '302.5', '2.5', '3.78', '0', '', 'aCBxi3R1LLu0FqJi', '4A9TzzWQ', 0, 0, NULL, NULL, '2022-01-30 12:08:37', '2022-01-30 12:08:37'),
(170, 33, 102, '102', '2', '102', '0.00261797', '', 'cmi1B7x4tKcvQlRE', 'V0L0px34', 1, 0, NULL, NULL, '2022-02-01 19:11:49', '2022-02-01 19:13:20'),
(171, 33, 505, '103.03', '3.0300000000000002', '1.29', '0', '', '2kv7s9Y3n3B0Hp1X', 'xJmGIQ2w', 0, 0, NULL, NULL, '2022-02-01 19:23:55', '2022-02-01 19:23:55'),
(172, 33, 501, '101.5', '1.5', '1.27', '0', '', 'mps9iw0an9jnlL83', 'ESigoZF7', 0, 0, NULL, NULL, '2022-02-01 19:24:21', '2022-02-01 19:24:21'),
(173, 33, 108, '106', '6', '1.33', '0.00272247', '', 'bVjioAF3YPf67RcW', 'GmcdIBsG', 0, 0, NULL, NULL, '2022-02-01 19:24:32', '2022-02-01 19:24:35'),
(174, 33, 108, '106', '6', '1.33', '0.00271853', '', 'KthDgxvyzr2MUimN', 'bMEqMZnm', 0, 0, NULL, NULL, '2022-02-01 19:25:42', '2022-02-01 19:25:45'),
(175, 33, 101, '101.2', '1.2', '101.2', '0', '', 'SR72eiEBsg2qnu3U', 'rOOzPyau', 0, 0, NULL, NULL, '2022-02-01 19:35:06', '2022-02-01 19:35:06'),
(176, 33, 505, '103.03', '3.0300000000000002', '1.29', '0.00268356', '', 'f7j8od3GUMfuRx35', 'sPfwVXCy', 1, 0, NULL, NULL, '2022-02-02 16:33:05', '2022-02-02 19:13:37'),
(177, 33, 505, '202.045', '2.045', '2.53', '0.00526255', '', '7JQukSMeNhTanLaa', 'MaFkq4Ub', 1, 0, NULL, NULL, '2022-02-02 19:12:45', '2022-02-02 19:13:28'),
(178, 33, 505, '101.045', '1.045', '1.26', '0', '', 'HhycRPdMhFfNqYoi', '66btEzIS', 0, 0, NULL, NULL, '2022-02-02 20:30:08', '2022-02-02 20:30:08'),
(179, 33, 501, '101.5', '1.5', '1.27', '0', '', 'AolaejZp4gCdl2sp', 'yMa4Lhxh', 0, 0, NULL, NULL, '2022-02-02 21:49:03', '2022-02-02 21:49:03'),
(180, 33, 108, '106', '6', '1.33', '0.00282778', '', 'mMjgWqxWHfxpkx64', 'URJRiDsB', 0, 0, NULL, NULL, '2022-02-02 21:49:18', '2022-02-02 22:18:37'),
(181, 33, 101, '101.2', '1.2', '101.2', '0', '', 'hU5lgyRLZ3KfXIdQ', 'iXPLZ0Gg', 0, 0, NULL, NULL, '2022-02-02 22:18:51', '2022-02-02 22:18:51'),
(182, 33, 505, '101.045', '1.045', '1.26', '0', '', 'yWZJ97O0bEKg2CmE', 'jy15WoYX', 0, 0, NULL, NULL, '2022-02-03 02:23:15', '2022-02-03 02:23:15'),
(183, 33, 505, '101.045', '1.045', '1.26', '0', '', 'Q8mkiNerPTIMgj3m', 'zLLrCVxG', 0, 0, NULL, NULL, '2022-02-03 02:26:16', '2022-02-03 02:26:16'),
(184, 33, 501, '101.5', '1.5', '1.27', '0', '', 'n94IAQNUalB8H0uL', 'BojMSy43', 0, 0, NULL, NULL, '2022-02-03 02:51:51', '2022-02-03 02:51:51'),
(185, 33, 101, '101.2', '1.2', '101.2', '0', '', 'Val1GoA21krZ1u6y', 'zlrus60N', 0, 0, NULL, NULL, '2022-02-03 03:03:23', '2022-02-03 03:03:23'),
(186, 33, 103, '103', '3', '103', '0.00282368', '', 'qJmtGFrhZaNoeb1D', '6ssBA43g', 0, 0, NULL, NULL, '2022-02-03 17:47:02', '2022-02-03 17:47:06'),
(187, 56, 501, '11.05', '1.05', '0.14', '0', '', 'eBqVRuXmuYj3SdHk', 'v5kq6dO9', 0, 0, NULL, NULL, '2022-02-03 18:28:39', '2022-02-03 18:28:39'),
(188, 56, 103, '22.2', '2.2', '22.2', '0.0006047', '', 'DIPmkega3iIw4MEu', 'M3scSXG7', 0, 0, NULL, NULL, '2022-02-03 18:29:12', '2022-02-03 18:29:15'),
(189, 33, 505, '101.045', '1.045', '101.05', '0', '', 'Rp7mHsw2EDluAEf1', 'CgHOtAa4', 0, 0, NULL, NULL, '2022-02-04 10:13:14', '2022-02-04 10:13:14'),
(190, 33, 505, '101.045', '1.045', '101.05', '0', '', 'CeZ7FbQgvX90xyLd', 'PXAMppQa', 0, 0, NULL, NULL, '2022-02-04 10:36:17', '2022-02-04 10:36:17'),
(191, 33, 505, '101.045', '1.045', '101.05', '0', '', 'BcruGFZklIFtimJJ', 'FTXDPLZr', 0, 0, NULL, NULL, '2022-02-04 10:52:58', '2022-02-04 10:52:58'),
(192, 33, 505, '101.045', '1.045', '101.05', '0', '', 'YK2AKFjKCcvCrmoH', 'MhHxEJmt', 0, 0, NULL, NULL, '2022-02-04 11:54:35', '2022-02-04 11:54:35'),
(193, 33, 505, '101.045', '1.045', '101.05', '0', '', 'neSRv5HeGSGdAO9f', '6oMpNRhR', 0, 0, NULL, NULL, '2022-02-04 11:56:34', '2022-02-04 11:56:34'),
(194, 33, 103, '103', '3', '103', '0.00271198', '', 'a4OMnikzclymYuLt', 'QMWVV1ld', 0, 0, NULL, NULL, '2022-02-04 11:57:58', '2022-02-04 11:58:02'),
(195, 33, 104, '106', '6', '1.33', '0.00278602', '', 'CUMVzTQZ3jznS7P7', 'q53boW0E', 0, 0, NULL, NULL, '2022-02-04 12:07:33', '2022-02-04 12:08:51'),
(196, 33, 102, '102', '2', '102', '0.00268971', '', 'cNyrcGjysA4jRzGb', 'PGC77o9D', 0, 0, NULL, NULL, '2022-02-04 12:21:10', '2022-02-04 12:21:13'),
(197, 33, 505, '101.045', '1.045', '101.05', '0', '', 'AWfPLAYHzeGem5aB', 'IHrjTbNv', 0, 0, NULL, NULL, '2022-02-05 07:28:54', '2022-02-05 07:28:54'),
(198, 58, 501, '101.5', '1.5', '1.27', '0', '', 'XxAEvrMcTW7TsUpi', 'sinbbpcU', 0, 0, NULL, NULL, '2022-02-05 14:08:41', '2022-02-05 14:08:41'),
(199, 58, 505, '101.045', '1.045', '101.05', '0', '', 'War7e5aDmWpAbBEV', '6g70qylZ', 0, 0, NULL, NULL, '2022-02-05 14:08:59', '2022-02-05 14:08:59'),
(200, 33, 505, '101.045', '1.045', '101.05', '0', '', 'h8JcK0bb8AzydpFF', 'zLN5N5mh', 0, 0, NULL, NULL, '2022-02-05 14:35:21', '2022-02-05 14:35:21'),
(201, 33, 101, '101.2', '1.2', '101.2', '0', '', 'Eqe33jZoWm7rkklq', '3e2WDBdt', 0, 0, NULL, NULL, '2022-02-05 14:36:35', '2022-02-05 14:36:35'),
(202, 33, 505, '101.045', '1.045', '101.05', '0', '', 'Q4MqsWNOsggqIQhH', 'pxPHEVu0', 0, 0, NULL, NULL, '2022-02-05 15:53:08', '2022-02-05 15:53:08'),
(203, 33, 101, '101.2', '1.2', '101.2', '0', '', '5FhHdqPQkAxGQQby', 'BRdHPxS2', 0, 0, NULL, NULL, '2022-02-05 15:54:43', '2022-02-05 15:54:43'),
(204, 33, 101, '505.2', '5.2', '505.2', '0', '', '0aV0u1AB8I6E1bQV', 'AJQsRa5L', 0, 0, NULL, NULL, '2022-02-06 20:56:31', '2022-02-06 20:56:31'),
(205, 58, 505, '1010.045', '10.045', '1010.05', '0', '', 'Lj1Lhy0xT7dLPfhq', 'W6UtmQFP', 0, 0, NULL, NULL, '2022-02-08 01:45:30', '2022-02-08 01:45:30'),
(206, 59, 505, '3030.045', '30.045', '3030.05', '0', '', 'Ve5yfeD0OcvAk7Gv', 'NSElV7Cn', 0, 0, NULL, NULL, '2022-02-08 17:00:37', '2022-02-08 17:00:37'),
(207, 58, 505, '202.045', '2.045', '202.05', '0', '', 'HMgamPOD7Ia3Qv5Q', 'Lc1PiHKA', 0, 0, NULL, NULL, '2022-02-12 06:04:01', '2022-02-12 06:04:01'),
(208, 58, 505, '202.045', '2.045', '202.05', '0', '', 'jAqbWNSqG2B0wK5d', '86W7fXIg', 0, 0, NULL, NULL, '2022-02-12 18:22:32', '2022-02-12 18:22:32'),
(209, 58, 505, '101.045', '1.045', '101.05', '0', '', 'uHWbiHbTgYqRMOyB', 'rSK3kZ9R', 0, 0, NULL, NULL, '2022-02-12 18:39:39', '2022-02-12 18:39:39'),
(210, 58, 505, '101.045', '1.045', '101.05', '0', '', 'mWLsGFvpUEFY4pTf', '8qITlMog', 0, 0, NULL, NULL, '2022-02-12 20:22:47', '2022-02-12 20:22:47');

-- --------------------------------------------------------

--
-- Table structure for table `etemplates`
--

CREATE TABLE `etemplates` (
  `id` int(10) UNSIGNED NOT NULL,
  `esender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emessage` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `smsapi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `etemplates`
--

INSERT INTO `etemplates` (`id`, `esender`, `mobile`, `emessage`, `smsapi`, `created_at`, `updated_at`) VALUES
(1, 'support@cryptmine.cloud', '+1234567890', '<p>&nbsp;</p>\r\n<div class=\"wrapper\" style=\"background-color: #f2f2f2;\">\r\n<table id=\"emb-email-header-container\" class=\"header\" style=\"border-collapse: collapse; table-layout: fixed; margin-left: auto; margin-right: auto;\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td style=\"padding: 0; width: 600px;\"><br />\r\n<div class=\"header__logo emb-logo-margin-box\" style=\"font-size: 26px; line-height: 32px; color: #c3ced9; font-family: Roboto,Tahoma,sans-serif; margin: 6px 20px 20px 20px;\"><img src=\"https://premium151.web-hosting.com:2083/cpsess3764400389/frontend/paper_lantern/filemanager/showfile.html?file=Cryptmine+cloud.jpg&amp;fileop=&amp;dir=%2Fhome%2Ffundgrgy%2Fcryptmine.cloud%2Fasset%2Fimages&amp;dirop=&amp;charset=&amp;file_charset=&amp;baseurl=&amp;basedir=\" alt=\"\" /></div>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<br />\r\n<table class=\"layout layout--no-gutter\" style=\"border-collapse: collapse; table-layout: fixed; margin-left: auto; margin-right: auto; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #ffffff;\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td class=\"column\" style=\"padding: 0; text-align: left; vertical-align: top; color: #60666d; font-size: 14px; line-height: 21px; font-family: sans-serif; width: 600px;\"><br />\r\n<div style=\"margin-left: 20px; margin-right: 20px;\"><span style=\"font-size: large;\">Hi {{name}},<br /></span>\r\n<p><strong>{{message}}</strong></p>\r\n</div>\r\n<div style=\"margin-left: 20px; margin-right: 20px; margin-bottom: 24px;\"><br />\r\n<p class=\"size-14\" style=\"margin-top: 0; margin-bottom: 0; font-size: 14px; line-height: 21px;\">Thanks,<br /><strong>CRYPTMINE</strong></p>\r\n</div>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>', 'https://api.infobip.com/api/v3/sendsms/plain?user=****&password=****&sender=LetsMine&SMSText={{message}}&GSM={{number}}&type=longSMS', '2018-01-09 23:45:09', '2022-02-05 03:50:34');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(32) NOT NULL,
  `question` text NOT NULL,
  `answer` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(43, 'What is Cryptmine?', '<p>Cryptmine is a registered digital asset investment firm based in the UK. The platform, which includes advanced basic and technical analysis at the source of high return performance, offers high &amp; fixed interest return. Aiming for success with its international investor network, experienced team, privileged information from business and technology world; Bynamic stands out from its competitors with its proven quality and ease of use. The company, which is managed under the leadership of people who think and foresee the future, is committed to achieving high returns from well-diversified portfolios and prioritizing clients.</p>', '2022-01-29 20:54:07', '2022-01-30 01:54:07'),
(44, 'Guaranteed interest returns, but how?', '<p>Digital assets are a class of assets considered dangerous and inconvenient. Many reasons such as liquidity, money laundering accusation, uncertainty of regulation, access restriction, volatile markets, functionality inquiries reduce trust in these assets. We believe that the risk factor should be eliminated for all people who believe that finance will rise on distributed systems. That\'s why we offer high interest returns to platform investors. With careful and detailed examination of market conditions, daily trading volume, expectations; we change our portfolio distribution and adjust our investment strategy. With this active fund management, you enjoy the fixed interest rate return on the user side.</p>', '2020-02-18 22:41:05', '2020-02-18 21:41:05'),
(45, 'What are company principles?', '<p>Successful investment management companies base their business on a core investment philosophy, and Bynamic is no different. Although we offer innovative and specific strategies through digital asset funds, an overarching theme runs through the investment guidance we provide to clients&mdash; focus on those things within your control. There are basically four principles that we attach great importance to: <br /><br /><strong>1) Create clear, appropriate investment goals:</strong> An appropriate investment goal should be measureable and attainable. Success should not depend on outsize investment returns or impractical saving or spending requirements. <br /><br /><strong>2) Develop a suitable asset allocation using broadly diversified funds: </strong>A sound investment strategy starts with an asset allocation befitting the portfolio\'s objective. The allocation should be built upon reasonable expectations for risk and returns and use diversified investments to avoid exposure to unnecessary risks. <br /><br /><strong>3) Minimize cost: </strong>Markets are unpredictable. Costs are forever. The lower your costs, the greater your share of an investment\'s return. And research suggests that lower-cost investments have tended to outperform higher-cost alternatives. To hold onto even more of your return, manage for efficiency. You can\'t control the markets, but you can control the bite of costs and efficiency. <br /><br /><strong>4) Maintain perspective and long-term discipline: </strong>Investing can provoke strong emotions. In the face of market turmoil, some investors may find themselves making impulsive decisions or, conversely, becoming paralyzed, unable to implement an investment strategy or rebalance a portfolio as needed. Discipline and perspective can help them remain committed to a long-term investment program through periods of market uncertainty.</p>', '2020-02-18 22:41:41', '2020-02-18 21:41:41'),
(46, 'What are digital assets and how are they valued?', '<p>Digital assets distributed ledger based electronic means of exchanges. Transactions involving them are secured by cryptography, and they have dedicated servers for verification of transactions and the creation of extra units. The most popular of them are Bitcoin, Ethereum, Litecoin, etc. All digital assets are valued by price action, and as a result, almost total control is in the hand of the investing public.</p>', '2020-02-18 22:43:17', '2020-02-18 21:43:17'),
(50, 'How can i ask for support?', '<p>We are here to help you with any problems and questions you may encounter while using the platform and during your investment experience. You can always contact or turn the situation into an opportunity</p>', '2020-02-18 21:44:52', '2020-02-18 21:44:52');

-- --------------------------------------------------------

--
-- Table structure for table `gateways`
--

CREATE TABLE `gateways` (
  `id` int(10) UNSIGNED NOT NULL,
  `main_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gateimg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `minamo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maxamo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fixed_charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percent_charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gateways`
--

INSERT INTO `gateways` (`id`, `main_name`, `name`, `gateimg`, `minamo`, `maxamo`, `fixed_charge`, `percent_charge`, `rate`, `val1`, `val2`, `status`, `created_at`, `updated_at`) VALUES
(101, 'PayPal', 'PayPal', 'paypal.png', '50', '1000', '0.2', '1', '1', 'jedwards4107@gmail.com', NULL, 1, NULL, '2022-02-01 19:26:51'),
(102, 'PerfectMoney', 'Direct Transfer', 'perfectmoney.png', '20', '20000', '1', '1', '1', 'Crytpmine', 'G079qn4Q7XATZBqyoCkBteGRg', 0, NULL, '2022-02-04 12:23:23'),
(103, 'Stripe', 'Stripe', 'stripe.png', '20', '5000', '2', '1', '1', 'sk_test_4eC39HqLyjWDarjtT1zdp7dc', 'G079qn4Q7XATZBqyoCkBteGRg', 0, NULL, '2022-02-04 12:04:52'),
(104, 'Skrill', 'Skrill', 'skrill.png', '10', '50000', '3', '3', '80', 'demoqco@sun-fish.com', 'skrill', 1, NULL, '2022-02-04 12:07:15'),
(108, 'Flutterwave', 'Flutterwave', 'flutterwave.png', '10', '50000', '3', '3', '80', 'FLWPUBK-9d9b4497a12c8226930c91c8cb23b81b-X', 'FLWSECK-9e6d77c844c0533ca612bef7539c2727-X', 0, NULL, '2022-02-03 17:48:05'),
(501, 'Blockchain.info', 'Blockchain', 'blockchain.png', '1', '20000', '1', '0.5', '80', 'a5f1cf3b6b418fc6304ff7e186041b73c19c2d3e16dedac6c1cafa64704d1e2e', 'xpub6CjfQJqY6Ctz1ccjTpVR7NAqKAKgJ5XDbpbxM2MTRUhznBXoE7Lo8NW749FNZheLfC9EcqAh2RRRtjbQ2ztxXJmiwVnQZNWJxgfeFSphpQM', 1, NULL, '2020-02-09 21:33:48'),
(505, 'CoinPayment - BTC', 'CoinPayment', 'coinpayment.png', '100', '5000', '0.045', '1', '1', 'f3400d93d1d98ea5aabd2de95f076ca2235ac78e2819249357308a5b6f2bb140', '2bda9D51611edB035595aF6fE39d695ddAD40889adef4890036c38Bf44E1e162', 1, NULL, '2022-02-05 07:27:14');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` int(32) NOT NULL,
  `image_link` varchar(128) NOT NULL,
  `image_link2` varchar(32) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `image_link`, `image_link2`, `created_at`, `updated_at`) VALUES
(1, 'images/logo_1588143489.png', 'images/favicon_1582498359.jpg', '2020-04-29 06:58:09', '2020-04-29 05:58:09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_01_26_221915_create_coinpayment_transactions_table', 1),
(2, '2020_11_30_030150_create_coinpayment_transaction_items_table', 2),
(3, '2022_02_12_200740_coinpayment', 3),
(4, '2022_02_12_201101_coinpayment_transactions_items', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(32) NOT NULL,
  `title` varchar(128) NOT NULL,
  `content` text NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `created_at` varchar(32) NOT NULL,
  `updated_at` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `content`, `status`, `created_at`, `updated_at`) VALUES
(4, 'AML Policy', '<p>Cryptmine</p>', 1, '2019-07-31 11:43:14', '2022-01-28 20:32:41'),
(6, 'Diversity', '<header>\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<div>&nbsp;</div>\r\n</div>\r\n<div>\r\n<div>\r\n<div>\r\n<h1>Diversity</h1>\r\n<p>Individuals. Ideas. Inspiration. Yes, we\'re open</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</header>\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<div data-nn-conditional=\"\">\r\n<div>\r\n<p>Diversity and inclusion matter in our business. An inclusive and diverse workforce makes us better leaders and contributes to a more innovative, dynamic and, ultimately, more successful company. And, variety helps us meet the needs of our diverse client base.</p>\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<div data-nn-conditional=\"\">\r\n<h2 id=\"col1textimage\">Inclusiveness</h2>\r\n<div>\r\n<p>We promote inclusion and encourage open dialogue to draw out everyone\'s opinions and perspectives. We recognize a diverse range of contributions to keep our people energetic, engaged and inspired. And we are a signatory to the UN Standards of Conduct for Business regarding tackling LGBTI discrimination around the world.</p>\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div>\r\n<div>\r\n<div data-nn-conditional=\"\">\r\n<h2 id=\"col2textimage\">Flexibility</h2>\r\n<div>\r\n<p>We offer a modern, flexible working environment. We work where and how it\'s most appropriate according to individual, role and team requirements.</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div>\r\n<div>&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 1, '2020-02-15 23:02:32', '2020-02-16 20:47:41'),
(7, 'Sponsoring', '<div class=\"pageheadline pageheadline__base\">\r\n<h2 class=\"pageheadline__title\"><span class=\"pageheadline__hl pageheadline__hl--xsmall\">The big picture</span></h2>\r\n</div>\r\n<div class=\"leadtext leadtext__base\">\r\n<div class=\"leadtext__rte\">\r\n<p>We&rsquo;re passionate about supporting the places where we live and work. Through our long-standing sponsorships of motor sports and contemporary art, we connect with communities in new and exciting ways every day. It&rsquo;s our way of understanding how the world works, one pit stop and brush stroke at a time.</p>\r\n</div>\r\n</div>', 1, '2020-02-15 23:06:08', '2020-02-15 23:06:08');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `id` int(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `percent` varchar(32) NOT NULL,
  `duration` varchar(128) NOT NULL,
  `period` varchar(32) NOT NULL,
  `min_deposit` varchar(128) NOT NULL,
  `amount` varchar(128) NOT NULL,
  `status` int(2) NOT NULL,
  `ref_percent` varchar(32) NOT NULL,
  `hashrate` varchar(64) NOT NULL,
  `image` varchar(32) DEFAULT NULL,
  `upgrade` varchar(32) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`id`, `name`, `percent`, `duration`, `period`, `min_deposit`, `amount`, `status`, `ref_percent`, `hashrate`, `image`, `upgrade`, `created_at`, `updated_at`) VALUES
(6, 'Starter pack $100', '4.7', '1', 'month', '0.0026', '0.0035', 1, '15', '5Ph/s', 'plan_1588144283.png', '2', '2022-02-02 14:37:02', '2022-02-02 19:37:02'),
(7, 'Premium pack $500', '5.0', '1', 'month', '0.013', '0.02', 1, '25', '10Ph/s', 'plan_1588144404.png', '10', '2022-02-01 13:58:33', '2022-02-01 18:58:33'),
(10, 'Gold pack $1000', '5.0', '1', 'month', '0.026', '0.032', 1, '30', '15Ph/s', 'plan_1588144414.png', '15', '2022-02-01 13:59:16', '2022-02-01 18:59:16');

-- --------------------------------------------------------

--
-- Table structure for table `profits`
--

CREATE TABLE `profits` (
  `id` int(32) NOT NULL,
  `user_id` int(32) NOT NULL,
  `plan_id` int(32) NOT NULL,
  `amount` float NOT NULL,
  `profit` float NOT NULL,
  `status` int(2) NOT NULL,
  `trx` varchar(16) NOT NULL,
  `end_date` varchar(32) NOT NULL,
  `date` varchar(32) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profits`
--

INSERT INTO `profits` (`id`, `user_id`, `plan_id`, `amount`, `profit`, `status`, `trx`, `end_date`, `date`, `created_at`, `updated_at`) VALUES
(102, 33, 6, 0.0026, 0.000611, 1, 'DBfzSaP7TFzoPy6w', '2022-03-02 14:18:20', '2022-02-02 14:18:20', '2022-02-08 06:21:53', '2022-02-08 11:21:53');

-- --------------------------------------------------------

--
-- Table structure for table `referral`
--

CREATE TABLE `referral` (
  `id` int(32) NOT NULL,
  `user_id` int(32) NOT NULL,
  `ref_id` int(32) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referral`
--

INSERT INTO `referral` (`id`, `user_id`, `ref_id`, `created_at`, `updated_at`) VALUES
(2, 54, 53, '2022-02-02 17:43:49', '2022-02-02 17:43:49');

-- --------------------------------------------------------

--
-- Table structure for table `ref_earning`
--

CREATE TABLE `ref_earning` (
  `id` int(32) NOT NULL,
  `user_id` int(32) NOT NULL,
  `referral` int(32) NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reply_support`
--

CREATE TABLE `reply_support` (
  `id` int(32) NOT NULL,
  `ticket_id` int(32) NOT NULL,
  `reply` text NOT NULL,
  `status` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(32) NOT NULL,
  `name` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `image_link` varchar(32) DEFAULT NULL,
  `review` text NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `name`, `occupation`, `image_link`, `review`, `status`, `created_at`, `updated_at`) VALUES
(12, 'Mary morgan', 'Teacher', 'update_1581806843.jpg', 'Invested few months back and it has been results ever since , was skeptical at first,glad i invested the penny and it was worth it', 1, '2022-01-29 21:01:20', '2022-01-30 02:01:20'),
(13, 'Jessica Pete', 'Data analyst', 'update_1581806792.jpg', 'I was introduced to Cryptmine June 2021, and its been wonderful, profits come in early and i am so Grateful to the platform', 1, '2022-01-29 21:05:33', '2022-01-30 02:05:33'),
(14, 'Jessie Park', 'Student', 'update_1581806914.jpg', 'Was looking for a way to make profit and invest into the crypto world, until i bumped into cryptmine online, happy with the customer support so far they get things done!!!!', 1, '2022-01-29 21:08:50', '2022-01-30 02:08:50');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(32) NOT NULL,
  `title` text NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `details` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `icon`, `details`, `created_at`, `updated_at`) VALUES
(1, 'Industry best practices', 'certificate', 'Cryptmine supports a variety of the most popular digital currencies.', '2022-01-28 20:31:12', '2022-01-29 01:31:12'),
(3, 'Secure storage', 'lock', 'We store the vast majority of the digital assets in secure offline storage.', '2020-02-23 23:36:32', '2020-02-23 22:36:32'),
(4, 'Account privacy', 'child', 'We will never share your private data without your permission', '2020-02-23 23:37:59', '2020-02-23 22:37:59');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(32) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `site_name` varchar(200) DEFAULT NULL,
  `site_desc` text DEFAULT NULL,
  `tawk_id` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `mobile` varchar(128) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `balance_reg` double DEFAULT NULL,
  `email_notify` int(2) DEFAULT NULL,
  `sms_notify` int(2) DEFAULT NULL,
  `kyc` int(2) DEFAULT NULL,
  `email_verification` int(2) DEFAULT NULL,
  `sms_verification` int(2) DEFAULT NULL,
  `registration` int(2) DEFAULT NULL,
  `withdraw_charge` varchar(191) DEFAULT NULL,
  `referral` int(2) NOT NULL DEFAULT 0,
  `upgrade_status` int(2) DEFAULT 0,
  `upgrade_fee` varchar(32) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `site_name`, `site_desc`, `tawk_id`, `email`, `mobile`, `address`, `balance_reg`, `email_notify`, `sms_notify`, `kyc`, `email_verification`, `sms_verification`, `registration`, `withdraw_charge`, `referral`, `upgrade_status`, `upgrade_fee`, `created_at`, `updated_at`) VALUES
(1, 'The easiest place to invest bitcoin.', 'Cryptmine', 'Cryptmine platform is at your service with its user-friendly features, secure infrastructure and applications that make a difference.', NULL, 'support@cryptmine.cloud', NULL, 'Somewhere in Califonia', 0.00022, 1, 0, 1, 1, 0, 1, '3', 1, 1, '0.5', '2022-01-28 21:12:41', '2022-01-29 02:12:41');

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` int(2) NOT NULL,
  `type` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`id`, `type`, `value`, `created_at`, `updated_at`) VALUES
(1, 'facebook', 'https://facebook.com/', '2020-02-09 08:09:22', '2020-02-09 07:09:22'),
(2, 'instagram', 'https://instagram.com/', '2020-01-24 22:09:58', '0000-00-00 00:00:00'),
(3, 'twitter', 'https://twitter.com/', '2020-01-24 22:09:58', '0000-00-00 00:00:00'),
(4, 'skype', NULL, '2020-02-15 22:59:58', '2020-02-15 21:59:58'),
(5, 'pinterest', NULL, '2020-02-15 23:00:20', '2020-02-15 22:00:20'),
(7, 'linkedin', NULL, '2020-02-15 23:00:07', '2020-02-15 22:00:07'),
(8, 'youtube', NULL, '2020-02-15 22:59:48', '2020-02-15 21:59:48'),
(9, 'whatsapp', 'https://whatsapp.com/', '2020-02-09 08:09:38', '2020-02-09 07:09:38');

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE `subscriber` (
  `id` int(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `id` int(32) NOT NULL,
  `subject` text NOT NULL,
  `priority` varchar(8) NOT NULL,
  `message` text NOT NULL,
  `status` int(2) NOT NULL,
  `user_id` int(32) NOT NULL,
  `ticket_id` int(8) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`id`, `subject`, `priority`, `message`, `status`, `user_id`, `ticket_id`, `created_at`, `updated_at`) VALUES
(8, 'Asking', 'High', 'How long does the withdraw take to confirm.?', 0, 49, 1643552255, '2022-01-30 19:17:35', '2022-01-30 19:17:35');

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `id` int(32) NOT NULL,
  `ref_id` varchar(32) NOT NULL,
  `amount` varchar(32) NOT NULL,
  `sender_id` int(32) NOT NULL,
  `receiver_id` int(32) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trending`
--

CREATE TABLE `trending` (
  `id` int(8) NOT NULL,
  `title` text NOT NULL,
  `details` text NOT NULL,
  `image` varchar(64) NOT NULL,
  `cat_id` int(32) NOT NULL,
  `views` int(32) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trending`
--

INSERT INTO `trending` (`id`, `title`, `details`, `image`, `cat_id`, `views`, `status`, `created_at`, `updated_at`) VALUES
(9, 'Budget for Your Winter Trip to Cancun', '<p>It may be cold at home, but winter months are the peak season for Caribbean beaches, and for good reason: With beautiful scenery, tropical weather, and a dazzling array of adventure opportunities, a trip to sunny Mexico can be the perfect cure for the winter blues.</p>', 'post_1581767808.jpg', 2, 10, 1, '2022-02-03 03:32:59', '2022-02-03 08:32:59'),
(10, 'We are still choosing to help you grow your money and your confidence', '<p>We don&rsquo;t have a crystal ball, and can&rsquo;t predict when rates will change again, but we wanted to clearly communicate what&rsquo;s happening today. We believe that maintaining our high Protected Goals Account rates&mdash;and rewarding the choice to save&mdash;will help our customers continue to feel confident with their money.</p>', 'post_1581231667.jpg', 2, 7, 1, '2022-02-09 11:28:44', '2022-02-09 16:28:44'),
(11, 'Prioritize your savings goals based on what you really want.', '<p>You know you should be saving, but what should you save for first? Prioritizing your savings goals can be confusing. Here&rsquo;s how to sift through it all.</p>', 'post_1581231686.jpg', 2, 19, 1, '2022-02-09 11:28:42', '2022-02-09 16:28:42'),
(12, 'Foresight is 20/20: Bring Your Financial Future Into Focus', '<p>Forget hindsight&mdash;this decade, foresight is 20/20. It&rsquo;s a new year, and time for a new financial focus. Read on to see how Simple&rsquo;s built-in budgeting tools can help you plan a financial future so bright, you gotta wear shades.</p>', 'post_1581245829.jpg', 3, 4, 1, '2022-02-03 03:33:03', '2022-02-03 08:33:03');

-- --------------------------------------------------------

--
-- Table structure for table `trending_cat`
--

CREATE TABLE `trending_cat` (
  `id` int(8) NOT NULL,
  `categories` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trending_cat`
--

INSERT INTO `trending_cat` (`id`, `categories`, `created_at`, `updated_at`) VALUES
(2, 'Inspiration', '2020-01-24 22:13:56', '0000-00-00 00:00:00'),
(3, 'Company', '2020-01-24 22:13:56', '0000-00-00 00:00:00'),
(4, 'Engineering', '2020-01-24 22:13:56', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ui_design`
--

CREATE TABLE `ui_design` (
  `id` int(11) NOT NULL,
  `s6_title` text DEFAULT NULL,
  `s7_title` text DEFAULT NULL,
  `s8_title` text DEFAULT NULL,
  `s8_body` text DEFAULT NULL,
  `s7_body` text DEFAULT NULL,
  `s7_image` varchar(32) DEFAULT NULL,
  `s6_body` text DEFAULT NULL,
  `s5_title` text DEFAULT NULL,
  `s5_body` text DEFAULT NULL,
  `s4_title` text DEFAULT NULL,
  `s4_body` text DEFAULT NULL,
  `s4_image` varchar(32) DEFAULT NULL,
  `s3_title` text DEFAULT NULL,
  `s3_body` text DEFAULT NULL,
  `s3_image` varchar(32) DEFAULT NULL,
  `s2_image` varchar(32) DEFAULT NULL,
  `s2_title` text DEFAULT NULL,
  `s2_body` text DEFAULT NULL,
  `s1_title` text DEFAULT NULL,
  `header_title` text DEFAULT NULL,
  `header_body` text DEFAULT NULL,
  `nav_type` int(2) NOT NULL,
  `total_assets` varchar(32) DEFAULT NULL,
  `experience` varchar(32) DEFAULT NULL,
  `traders` varchar(32) DEFAULT NULL,
  `countries` varchar(32) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `item1_title` text DEFAULT NULL,
  `item1_body` text DEFAULT NULL,
  `item2_title` text DEFAULT NULL,
  `item2_body` text DEFAULT NULL,
  `item3_title` text DEFAULT NULL,
  `item3_body` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ui_design`
--

INSERT INTO `ui_design` (`id`, `s6_title`, `s7_title`, `s8_title`, `s8_body`, `s7_body`, `s7_image`, `s6_body`, `s5_title`, `s5_body`, `s4_title`, `s4_body`, `s4_image`, `s3_title`, `s3_body`, `s3_image`, `s2_image`, `s2_title`, `s2_body`, `s1_title`, `header_title`, `header_body`, `nav_type`, `total_assets`, `experience`, `traders`, `countries`, `created_at`, `updated_at`, `item1_title`, `item1_body`, `item2_title`, `item2_body`, `item3_title`, `item3_body`) VALUES
(1, 'Focused, Active Management of  High-Growth Digital Assets.', 'What our client say about us', 'Diversify your investment porfolio', 'Cryptmine is fully legit and officially registered company whose activities are regulated by the financial control authorities under the jurisdiction of the United Kingdom. Accepting our terms of coorperation, you can be absolutely sure of getting a guaranteed profit and full return on your investment.', 'Pulvinar neque laoreet suspendisse interdum consectetur libero id faucibus. Ac felis donec et odio pellentesque diam volutpat commodo. Tristique magna sit amet purus gravida quis blandit.', 'section4_1582451115.png', 'Cryptmine Global Ltd is a registered investment platform providing digital asset investment management services to individuals. We provide a dynamic investment solution to clients in need of a self-operating portfolio, as well as a smart fund with flexible time and investment amount.', 'Build your savings without even trying.', 'Turn on Round-up Rules and start saving up effortlessly. Whenever you make a purchase, Goals make it easy to save for the things you want or want to do. There’s no need for spreadsheets or extra apps to budget and track your money.', 'Make plans for what to do, not what’s due.', 'Set up your recurring expenses (think power bill, cable, internet) in our app, and we\'ll do the work of saving for them each month. When you know your bills are covered, you can focus on the fun parts of having money—like saving for a trip to Japan and buying that new bike.', 'section3_1582269122.png', 'What are your goals?', 'Whatever stage of life you’re at, we can guide you through the opportunities and challenges you face. Your investment goals may be different, but here are some examples of the sort of questions our wealth planners can help you answer.', 'section2_1582269114.png', 'section1_1582448589.png', 'Investment Made Easy & Secure.', 'Bitclub, the first and safest crypto asset investment firm, was established to provide intelligent portfolios with its expert investors, customer-priority approach, safe and high-tech investment tools. Eliminating the risk factor to earn from digital assets, the platform is created to offer exclusive interest return.\r\nInvestigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per laoreet sit amet cursus seacula qui mutationem consuetudium claritas est etiam processus dynamicus', 'Market leaders use app to reach their brand & business.', 'Bitcoin investment  company', 'Start investing today', 1, '1.5M+', '2+', '244+', '53', '2020-02-21 07:12:02', '2022-02-01 19:06:30', 'Register', 'Only 1 minute and you\'re in. Enter the information you need to become a platform trader and start right away.', 'Invest', 'Invest and sit back. You can follow your investment status at any time and invest in limited time special offers.', 'Cashout anytime', 'Your investment is eligible to withdraw anytime after the first 24 hours.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` text NOT NULL,
  `image` varchar(32) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `name` text NOT NULL,
  `balance` varchar(64) NOT NULL,
  `profit` varchar(64) NOT NULL DEFAULT '0',
  `ref_bonus` varchar(64) NOT NULL DEFAULT '0',
  `password` varchar(100) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `country` varchar(191) DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT 0,
  `ip_address` varchar(32) NOT NULL,
  `last_login` varchar(32) DEFAULT NULL,
  `kyc_link` varchar(32) DEFAULT NULL,
  `kyc_status` int(2) NOT NULL DEFAULT 0,
  `pin` varchar(32) NOT NULL DEFAULT '0000',
  `remember_token` varchar(100) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `verification_code` varchar(191) NOT NULL,
  `sms_code` varchar(191) NOT NULL,
  `phone_verify` tinyint(4) NOT NULL,
  `email_verify` tinyint(4) NOT NULL,
  `email_time` datetime NOT NULL,
  `phone_time` datetime NOT NULL,
  `upgrade` int(1) DEFAULT 0,
  `googlefa_secret` varchar(32) DEFAULT NULL,
  `fa_status` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `image`, `email`, `name`, `balance`, `profit`, `ref_bonus`, `password`, `phone`, `country`, `status`, `ip_address`, `last_login`, `kyc_link`, `kyc_status`, `pin`, `remember_token`, `zip_code`, `address`, `city`, `created_at`, `updated_at`, `verification_code`, `sms_code`, `phone_verify`, `email_verify`, `email_time`, `phone_time`, `upgrade`, `googlefa_secret`, `fa_status`) VALUES
(33, 'lilkizarmie', NULL, 'jefferyadolor18@gmail.com', 'jeffery adolor', '0.008183610000000001', '0', '0', '$2y$10$Yq0vI6lr9mQNUBpuyeklXebESe1yvn6VEWmIbzdhZ6.3kF/m.gaaq', '08026691861', NULL, 0, '197.210.28.185', '2022-02-08 06:21:52', NULL, 0, '0000', NULL, NULL, NULL, NULL, '2022-01-29 01:46:32', '2022-02-08 11:21:52', 'SVDQTU', 'SSVYZJ', 1, 1, '2022-01-28 20:51:32', '2022-01-28 20:51:32', 0, 'VRA2CIDSNYYDMI6K', 1),
(34, 'Shitshit', NULL, 'smithS@yopmail.com', 'Dennis Smith', '0.00022', '0', '0', '$2y$10$tEebfchUiBkUFp8fSGeqYOANwsXY7WNjRzmxb5UAOXgS0rg4PHw5i', '9082456718', NULL, 0, '105.112.60.174', NULL, NULL, 0, '0000', NULL, NULL, NULL, NULL, '2022-01-29 02:01:46', '2022-01-29 02:05:59', 'OKVNCR', 'SNBC2P', 1, 1, '2022-01-28 21:06:46', '2022-01-28 21:06:46', 0, NULL, 0),
(35, 'TITUS710', NULL, 'sandramill229@gmail.com', 'CHERYL TITUS', '0.00022', '0', '0', '$2y$10$/TZfk7tN4dTfh3VwgCNRbe3LyfYXhnWXGBV0FZT7HXRI1nVFy4e56', '4028820246', NULL, 0, '105.112.181.213', NULL, NULL, 0, '0000', NULL, NULL, NULL, NULL, '2022-01-29 04:23:21', '2022-01-29 04:25:01', 'DVKTVU', '2A3SWF', 1, 1, '2022-01-28 23:28:21', '2022-01-28 23:28:21', 0, NULL, 0),
(36, 'Muzab', NULL, 'mmashood696@gmail.com', 'Muhammed Mashood Okunola', '0.00022', '0', '0', '$2y$10$QfQydT6K1me0QE2wp5xOVe1m/wuVxsMgpFa.Sv8weEeRKYE20AUW2', '08036843403', NULL, 0, '197.210.226.231', '2022-01-29 18:17:00', NULL, 0, '0000', NULL, NULL, NULL, NULL, '2022-01-29 23:14:42', '2022-01-29 23:17:00', 'MLIEQT', 'VRKPHK', 1, 1, '2022-01-29 18:19:41', '2022-01-29 18:19:41', 0, NULL, 0),
(37, 'Rashalhossn23', '1643481895_Rashalhossn23.jpg', 'rashalhossen116@gmail.com', 'Rashal Hossen', '0.000005969499999999998', '0', '0', '$2y$10$thGom8xylp9y6NLxS7wfJuQjC99zlCvU9GzUkalGJ00vyA576u0uq', '01309071380', 'Bangladesh', 0, '37.111.222.99', NULL, '1643481822_Rashalhossn23.jpg', 0, '0000', NULL, '7800', 'Faridpur sadar, Faridpur, Bangladesh', 'Faridpur', '2022-01-29 23:30:38', '2022-01-29 23:55:03', '7XQD7Z', 'VTI5R1', 1, 1, '2022-01-29 18:37:58', '2022-01-29 18:35:38', 0, NULL, 0),
(38, 'Coinbg3', NULL, 'shoshev.bg980@gmail.com', 'Ivan Ivanov Shoshev', '0.00022', '0', '0', '$2y$10$NUeM8sh95k33uaYzCQA9UugWagIDS0qVuxU/j7u6QzXj1/KFSPL8a', '+359886168556', NULL, 0, '37.63.6.10', '2022-01-31 19:00:49', NULL, 0, '0000', NULL, NULL, NULL, NULL, '2022-01-29 23:35:34', '2022-02-01 00:00:49', 'L2YJJB', 'F4Q86C', 1, 1, '2022-01-29 18:40:34', '2022-01-29 18:40:34', 0, NULL, 0),
(39, 'Ashq7', NULL, 'mhamadomerr79@gmail.com', 'Muhamad Omar Shakir', '0.000006599999999999998', '0', '0', '$2y$10$/7VbCsQnZZt5gtSKJ0wJ9e68u7Wa0FQvuLQpXkXOkYRpK5D7i0flm', '07703571566', NULL, 0, '62.201.241.227', NULL, NULL, 0, '0000', NULL, NULL, NULL, NULL, '2022-01-30 01:40:19', '2022-01-30 01:44:07', 'VKNOMV', '6WRTF5', 1, 1, '2022-01-29 20:45:19', '2022-01-29 20:45:19', 0, NULL, 0),
(40, 'Philly93', NULL, 'dyondzomasinge02@gmail.com', 'Philly nkuna', '0.00022', '0', '0', '$2y$10$Dr5K3AfjDI.E0G/0/zPj1uQ3AwX6uU9WNn0yd0WEVhCWhCByWUWBK', '0722246750', NULL, 0, '102.221.95.250', NULL, NULL, 0, '0000', NULL, NULL, NULL, NULL, '2022-01-30 02:05:05', '2022-01-30 02:06:21', 'LEZSH4', 'TCNKLS', 1, 1, '2022-01-29 21:10:05', '2022-01-29 21:10:05', 0, NULL, 0),
(41, 'Sweetdemon', NULL, 'otanielindustries@gmail.com', 'Daniel Otaniel', '0.00022', '0', '0', '$2y$10$wbB3lfisysu9/fvEQSvwRO9.Gjzl/ZJU..ZsZM4gNuT66JUoBEoCq', '09129965523', NULL, 0, '105.112.34.4', NULL, NULL, 0, '0000', NULL, NULL, NULL, NULL, '2022-01-30 02:46:56', '2022-01-30 02:46:56', 'NKSK8N', 'R0M8RZ', 1, 0, '2022-01-29 21:51:56', '2022-01-29 21:51:56', 0, NULL, 0),
(42, 'Sholapatrick', NULL, 'sholapatrick55@gmail.com', 'Shola balogun', '0.000006599999999999998', '0', '0', '$2y$10$oVJxpJKAIpaQX8S5kLoJdOzF7XA8JXJu2ms0CIUR0QJsQ0bkLXIpm', '09056176491', NULL, 0, '105.112.121.62', '2022-02-02 02:30:05', NULL, 0, '0000', NULL, NULL, NULL, NULL, '2022-01-30 03:14:25', '2022-02-02 07:30:05', 'CMU1EY', 'YLAQPD', 1, 1, '2022-01-29 22:19:25', '2022-01-29 22:19:25', 0, NULL, 0),
(43, 'Javi83', NULL, 'jamecr1983@gmail.com', 'Javier M Cruz', '0.00022', '0', '0', '$2y$10$U6nxIOzRfX8mh0oGPbJCCOBAjn8Jyruv1X33PlBBl88U434UK7Qfi', '+522284942600', NULL, 0, '187.184.26.252', NULL, NULL, 0, '0000', NULL, NULL, NULL, NULL, '2022-01-30 05:08:52', '2022-01-30 05:10:20', 'XO93LH', 'UHVFYJ', 1, 1, '2022-01-30 00:13:51', '2022-01-30 00:13:51', 0, NULL, 0),
(44, 'Sojib12', NULL, 'sojibshossain9090@gmail.com', 'Sojib Hossain', '0.000006599999999999998', '0', '0', '$2y$10$DcKZWhQ/AKKrgzZo.9jSxeHou07NEvsv3yJzUZ06tF2/snzmdzrCi', '01762638447', NULL, 0, '103.97.162.38', '2022-01-31 03:19:59', NULL, 0, '0000', NULL, NULL, NULL, NULL, '2022-01-30 09:08:23', '2022-01-31 08:19:59', 'HEZEEX', '7SDTUD', 1, 1, '2022-01-30 04:21:37', '2022-01-30 04:13:23', 0, NULL, 0),
(45, 'are132', NULL, 'are132@gmail.com', 'Arkadiusz Pietrzyk', '0.00022', '0', '0', '$2y$10$2v4/tKZjW2WzMAJ2Pc89tuGjSoingbCG4AjRIV8htkQB8qtl9mB56', '+31613915086', NULL, 0, '163.158.254.162', '2022-02-06 08:52:17', NULL, 0, '0000', NULL, NULL, NULL, NULL, '2022-01-30 11:03:39', '2022-02-06 13:52:17', 'HQFYQE', '7YB1GJ', 1, 1, '2022-01-30 06:08:38', '2022-01-30 06:08:38', 0, NULL, 0),
(46, 'Bowwy555', NULL, 'bowwytky@gmail.com', 'Lalita Sritabut', '0.00022', '0', '0', '$2y$10$gLY1i/N1fMRP4zAKr9tBpO2LAAdac7bq/hVg0wkiIMW5xKX3hLzD.', '0838655148', NULL, 0, '49.228.48.220', NULL, NULL, 0, '0000', NULL, NULL, NULL, NULL, '2022-01-30 11:06:03', '2022-01-30 11:07:03', 'CUZ2AH', '1UEOPL', 1, 1, '2022-01-30 06:11:03', '2022-01-30 06:11:03', 0, NULL, 0),
(47, 'Lamarr', NULL, 'Ridwanazeez3@gmail.com', 'Azeez', '0.00022', '0', '0', '$2y$10$92DbZYmPELKb1QTx1lLj7eIpS4ctasCGQkKaUlDuDsQIIaIluhjCi', '08114142118', NULL, 0, '102.67.7.250', NULL, NULL, 0, '0000', NULL, NULL, NULL, NULL, '2022-01-30 12:06:15', '2022-01-30 12:06:45', 'N1HLPC', 'E1CMJM', 1, 1, '2022-01-30 07:11:15', '2022-01-30 07:11:15', 0, NULL, 0),
(48, 'Shokat78', NULL, 'shokat70280@gmail.com', 'Shoukat khan', '0.00022', '0', '0', '$2y$10$TqW0Rwv17HBzZlbXoC1QcOSm6U8hgKoo6awFroiYQtSDk6YXhxYGa', '9887821112', NULL, 0, '223.188.49.177', '2022-01-30 08:16:54', NULL, 0, '0000', NULL, NULL, NULL, NULL, '2022-01-30 13:12:15', '2022-01-30 13:16:54', 'U7LVBW', 'IAA3XQ', 1, 1, '2022-01-30 08:17:15', '2022-01-30 08:17:15', 0, NULL, 0),
(49, 'Bikramjit2001', '1643551735_Bikramjit2001.jpg', 'bikramjitmeiteim@gmail.com', 'Moirangthem Bikramjit Meitei', '0.000006599999999999998', '0', '0', '$2y$10$KZnaiR/B3HcyAGyEGdX2EuWrjn65pwUr5lZbZJE4MfxXdFepa1HS6', '+919366326769', 'India', 0, '47.29.2.252', '2022-02-02 10:48:56', '1643551683_Bikramjit2001.jpg', 0, '0000', NULL, '795149', 'Yairipok Top Chingtha Mathak Leikai', 'Yairipok', '2022-01-30 19:04:42', '2022-02-02 15:48:56', 'SROICC', 'HDM2XL', 1, 1, '2022-01-30 14:09:42', '2022-01-30 14:09:42', 0, NULL, 0),
(50, 'Miguel', NULL, 'mescheriakovmiguel@gmail.com', 'Distromes', '0.00022', '0', '0', '$2y$10$HibbHjXfI6dS7KNhFDeqre0u.0AmdK2daP2xFuF.ffOS20jBIbIXe', '+34684113000', 'Spain', 0, '92.189.74.66', NULL, NULL, 0, '0000', NULL, 'PYOMAL', 'Valdemorillo # 11', 'Valdemorillo', '2022-01-30 20:45:05', '2022-01-30 20:55:26', 'PYOMAL', 'J1A2AW', 1, 1, '2022-01-30 15:50:05', '2022-01-30 15:50:05', 0, NULL, 0),
(51, 'Thomaslog', NULL, 'thomaslogann6@gmail.com', 'Thomas logan', '0.00022', '0', '0', '$2y$10$JKjIwiSFQuOJkSXYiN/t5u01LIVWo13.aphlniENIB9JxbpVVD8eG', '3154977896', NULL, 0, '107.181.178.69', NULL, NULL, 0, '0000', NULL, NULL, NULL, NULL, '2022-01-31 01:34:06', '2022-01-31 01:35:55', 'E22ZOH', 'JDGHLW', 1, 1, '2022-01-30 20:39:06', '2022-01-30 20:39:06', 0, NULL, 0),
(52, 'Hafees', '1643622055_Hafees.jpg', 'Hafeesrahman610@gmail.com', 'Hafeesrahman', '0.00022', '0', '0', '$2y$10$NWLoA.EynGAJ6/Okd6PRmOScjJf82KWtoFOddt7GOQPODlOuDDTnG', '9526656038', 'India', 0, '103.147.208.59', NULL, '1643622017_Hafees.jpg', 0, '0000', NULL, '671315', NULL, 'Kanhangad', '2022-01-31 14:37:23', '2022-01-31 14:40:55', 'RRJNM0', '8WPHOX', 1, 1, '2022-01-31 09:42:23', '2022-01-31 09:42:23', 0, NULL, 0),
(53, 'AnantoPratikno', '1643793649_AnantoPratikno.jpg', 'anantopratikno180@gmail.com', 'Ananto Pratikno', '0.00022', '0', '0', '$2y$10$.yK5BLxYSS2qxZvd1rSwheIsipg3ftiUfvKZN52wy3bkZWKUoHpyK', '083176686130', 'Indonesia', 0, '140.213.69.34', '2022-02-03 03:37:04', '1643793329_AnantoPratikno.jpg', 0, '0000', NULL, '34173', 'Bangunrejo Dusun 1 RT/001 RW/001 Bangunrejo Lampung Tengah Prov.Lampung', 'Bangunrejo, Lampung Tengah', '2022-02-02 14:04:06', '2022-02-03 08:37:04', 'RSUMEP', 'R8K163', 1, 1, '2022-02-02 09:09:06', '2022-02-02 09:09:06', 0, NULL, 0),
(54, 'Supriyon0', NULL, 'sy6500944@gmail.com', 'SUPRIYONO', '0.00022', '0', '0', '$2y$10$BEbiyC19NrnT28ivcRIlluxzqCa0b1DbyzYmF4yYLA9mRDE/YqIh.', '087781978083', NULL, 0, '140.213.232.166', NULL, NULL, 0, '0000', NULL, NULL, NULL, NULL, '2022-02-02 17:43:49', '2022-02-02 17:44:19', 'VDT7Z4', 'QWJQRF', 1, 1, '2022-02-02 12:48:49', '2022-02-02 12:48:49', 0, NULL, 0),
(55, 'au9aus2022', NULL, 'austinfitness5090@gmail.com', 'Austin Welsh', '0.000000294999999999998', '0', '0', '$2y$10$EFn0o.G.umrR7fk4IoBvvu5edZZnJwboKPucggubLM0UPFhwwlu3.', '2896896945', NULL, 0, '76.64.167.208', NULL, NULL, 0, '0000', NULL, NULL, NULL, NULL, '2022-02-03 17:26:21', '2022-02-03 17:36:34', 'X5LFRW', 'GWLXWD', 1, 1, '2022-02-03 12:31:21', '2022-02-03 12:31:21', 0, NULL, 0),
(56, 'jessica708', NULL, 'jessicapantoja@yopmail.com', 'Jessica Pantoja', '0.00022', '0', '0', '$2y$10$wceDmexSWMErxk12SHwrOeeY3tTdTwaQaLb/FotQQoec/7jDosy6m', '7088247491', NULL, 0, '71.167.46.181', NULL, NULL, 0, '0000', NULL, NULL, NULL, NULL, '2022-02-03 18:25:46', '2022-02-03 18:26:25', 'ME9NE7', 'KWUTIH', 1, 1, '2022-02-03 13:30:46', '2022-02-03 13:30:46', 0, NULL, 0),
(57, 'pachristo', NULL, 'pachristong@gmail.com', 'chris umanah', '0.00022', '0', '0', '$2y$10$Aa8YelJL.dWZQJiJvR0xNeOL0G3WRC3cjPv6Y2XIarmtYLXtSiorO', '07088800874', NULL, 0, '51.15.111.134', NULL, NULL, 0, '0000', NULL, NULL, NULL, NULL, '2022-02-05 11:44:43', '2022-02-05 11:46:04', 'EWA3C7', 'L83QQ3', 1, 1, '2022-02-05 06:49:43', '2022-02-05 06:49:43', 0, NULL, 0),
(58, 'raphyabak', NULL, 'raphyabak@gmail.com', 'Raphael Abayomi', '0.00022', '0', '0', '$2y$10$mYNBgZLZB6FpRA1fFKgAZuS8RssNzGbAh9ZHi4uQR5rHtn4K1molS', '08068325446', NULL, 0, '127.0.0.1', '2022-02-12 19:00:10', NULL, 0, '0000', NULL, NULL, NULL, NULL, '2022-02-05 14:02:30', '2022-02-12 18:00:10', 'RZPKM7', 'CMQRYQ', 1, 1, '2022-02-05 09:07:29', '2022-02-05 09:07:29', 0, NULL, 0),
(59, 'Papilo719', NULL, 'enoch.ayomiposi@gmail.com', 'Eweola Enoch', '0.00022', '0', '0', '$2y$10$XlqKiXq.O3tMwG/PdkyjbehG.pDntLQEuGYTj0k8ka9/d4hld7c0q', '09063274529', NULL, 0, '129.205.124.96', NULL, NULL, 0, '0000', NULL, NULL, NULL, NULL, '2022-02-08 16:57:35', '2022-02-08 16:59:27', '3ZUY4S', '1PLC5M', 1, 1, '2022-02-08 12:02:35', '2022-02-08 12:02:35', 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `w_history`
--

CREATE TABLE `w_history` (
  `id` int(32) NOT NULL,
  `user_id` int(32) NOT NULL,
  `amount` float NOT NULL,
  `status` int(2) NOT NULL,
  `details` text NOT NULL,
  `type` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `w_history`
--

INSERT INTO `w_history` (`id`, `user_id`, `amount`, `status`, `details`, `type`, `created_at`, `updated_at`) VALUES
(72, 37, 0.0002134, 0, 'bc1qdupcnu9hvmu0dnef4k0ru8plu8q949ltflw3tl', 2, '2022-01-29 23:49:59', '2022-01-29 23:49:59'),
(73, 37, 0.0000006305, 0, '37Zi9VMQnb1Sv8oUrTb2UadjxiArxMfw1j', 2, '2022-01-29 23:55:03', '2022-01-29 23:55:03'),
(74, 39, 0.0002134, 0, '1dLZBDcWzBaVQFTunksdH8fBA4LZmPQV4', 2, '2022-01-30 01:44:07', '2022-01-30 01:44:07'),
(75, 42, 0.0002134, 0, 'bc1qa8vakyg4gxz8nl4spx25576z0qmzapdenxwxl9', 2, '2022-01-30 03:17:33', '2022-01-30 03:17:33'),
(76, 44, 0.0002134, 0, '1FUNK2uSi8q7SBEsFnLudBoLZWF4fkak81', 2, '2022-01-30 10:16:21', '2022-01-30 10:16:21'),
(77, 49, 0.0002134, 0, '34xYTaqXz46hL41LHC1m3NGv2ru93z8j4X', 2, '2022-01-30 19:09:57', '2022-01-30 19:09:57'),
(78, 33, 0.00194, 2, '18TF8LvYgtVrzEN72xLWdDWjVSYncwmW9n', 2, '2022-02-02 14:12:16', '2022-02-02 19:12:16'),
(79, 55, 0.0002134, 0, 'XcwiVHL5gXWP8vTottf6wUsQ2F8ZkwJiAy', 2, '2022-02-03 17:32:04', '2022-02-03 17:32:04'),
(80, 55, 0.000006305, 0, 'XcwiVHL5gXWP8vTottf6wUsQ2F8ZkwJiAy', 2, '2022-02-03 17:36:34', '2022-02-03 17:36:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_site`
--
ALTER TABLE `about_site`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coinpayment_transactions`
--
ALTER TABLE `coinpayment_transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coinpayment_transactions_uuid_unique` (`uuid`),
  ADD UNIQUE KEY `coinpayment_transactions_txn_id_unique` (`txn_id`),
  ADD UNIQUE KEY `coinpayment_transactions_order_id_unique` (`order_id`);

--
-- Indexes for table `coinpayment_transaction_items`
--
ALTER TABLE `coinpayment_transaction_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `etemplates`
--
ALTER TABLE `etemplates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gateways`
--
ALTER TABLE `gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profits`
--
ALTER TABLE `profits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referral`
--
ALTER TABLE `referral`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_earning`
--
ALTER TABLE `ref_earning`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply_support`
--
ALTER TABLE `reply_support`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trending`
--
ALTER TABLE `trending`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trending_cat`
--
ALTER TABLE `trending_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ui_design`
--
ALTER TABLE `ui_design`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `w_history`
--
ALTER TABLE `w_history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coinpayment_transactions`
--
ALTER TABLE `coinpayment_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `coinpayment_transaction_items`
--
ALTER TABLE `coinpayment_transaction_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `etemplates`
--
ALTER TABLE `etemplates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `gateways`
--
ALTER TABLE `gateways`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=513;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `profits`
--
ALTER TABLE `profits`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `referral`
--
ALTER TABLE `referral`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ref_earning`
--
ALTER TABLE `ref_earning`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reply_support`
--
ALTER TABLE `reply_support`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `trending`
--
ALTER TABLE `trending`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `trending_cat`
--
ALTER TABLE `trending_cat`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ui_design`
--
ALTER TABLE `ui_design`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `w_history`
--
ALTER TABLE `w_history`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
