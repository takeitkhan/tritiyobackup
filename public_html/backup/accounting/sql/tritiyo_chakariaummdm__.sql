-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Oct 21, 2016 at 05:54 AM
-- Server version: 5.6.33
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tritiyo_chakariaummdm`
--

-- --------------------------------------------------------

--
-- Table structure for table `acc_ledgernames`
--

CREATE TABLE IF NOT EXISTS `acc_ledgernames` (
  `TypeId` bigint(100) NOT NULL AUTO_INCREMENT,
  `LedgerTypeId` bigint(100) DEFAULT NULL,
  `LedgerName` varchar(100) DEFAULT NULL,
  `LedgerNameBn` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`TypeId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `acc_ledgernames`
--

INSERT INTO `acc_ledgernames` (`TypeId`, `LedgerTypeId`, `LedgerName`, `LedgerNameBn`) VALUES
(1, 2, 'Admission Fee/ Late Admission Fee', 'ভর্তি ফি/ বিলম্ব ভর্তি ফি'),
(2, 2, 'Tuition Fee', ''),
(3, 2, 'Admission Management Fee', 'ভর্তি ব্যবস্থাপনা ফি'),
(4, 2, 'Section/ Subject Changing Fee', 'শাখা/ বিষয় পরিবর্তন  ফি'),
(5, 2, 'Board Exam Fee', 'বোর্ড পরীক্ষার ফি'),
(6, 2, 'Registration Fee', 'নিবন্ধন ফি'),
(7, 2, 'Building Fund', 'বিল্ডিং তহবিল'),
(8, 2, 'Science / Science Grants Fund', 'বিজ্ঞানাগার/ বিজ্ঞান মঞ্জুরি তহবিল'),
(9, 2, 'Communication Fund', 'যোগাযোগ তহবিল'),
(10, 2, 'Future Fund', 'ভবিষ্যত তহবিল'),
(11, 2, 'Sports and Cultural Fund', 'ক্রীড়া ও সাংস্কৃতিক  তহবিল'),
(12, 2, 'Poor Fund', 'দরিদ্র তহবিল'),
(13, 2, 'Library Fund', 'পাঠাগার তহবিল'),
(14, 2, 'Boys Scout/ Girl In Scout/ Rover Scout', 'বয়েজ স্কাউট/ গার্ল ইন স্কাউট/ রোভার স্কাউট'),
(15, 2, 'Common Room', 'কমনরুম'),
(16, 2, 'Electricity', 'বিদ্যুত'),
(17, 2, 'Milad', 'মিলাদ'),
(18, 2, 'Felicitation', 'আপ্যায়ন'),
(19, 2, 'Printing', 'প্রিন্টিং'),
(20, 2, 'Mosque', 'মসজিদ'),
(21, 2, 'Stationary', 'ষ্টেশনারী'),
(22, 2, 'Monthly Tution Fee', 'মাসিক বেতন'),
(23, 2, 'Due Fees', 'বকেয়া'),
(24, 2, 'Fees In Advance', 'অগ্রিম'),
(25, 2, 'Forefeit/Fine', 'জরিমানা'),
(26, 2, 'Transfer Certificate Fee', 'ছাড়পত্র'),
(27, 2, 'Internal Test Fees', 'আভ্যন্তরীণ পরীক্ষা ফি'),
(28, 2, 'Prasansapatra / certificate fee', 'প্রসংসাপত্র/ সনদপত্র ফি'),
(29, 2, 'Academic Transcript/ Progress Report Fee', 'নম্বর পত্র ফি/ প্রগ্রেস রিপোর্ট'),
(30, 2, 'Identity Card', 'পরিচয় পত্র'),
(31, 2, 'Admission Forms', 'ভর্তি ফরম '),
(32, 2, 'Development fees', 'উন্নয়ন ফি '),
(33, 2, 'Others', 'বিবিধ  '),
(34, 1, 'Development Account', 'উন্নয়ন বাবদ'),
(35, 1, 'Science / Science Grants Account', 'বিজ্ঞানাগার/ বিজ্ঞান মঞ্জুরি বাবদ'),
(36, 1, 'Communication Account', 'যোগাযোগ বাবদ'),
(37, 1, 'Future Fund Account', 'ভবিষ্যত তহবিল বাবদ'),
(38, 1, 'Sports and Cultural Fund Account', 'ক্রীড়া ও সাংস্কৃতিক  তহবিল বাবদ'),
(39, 1, 'Poor Fund Account', 'দরিদ্র তহবিল বাবদ'),
(40, 1, 'Library Fund Account', 'পাঠাগার তহবিল বাবদ'),
(41, 1, 'Boys Scout/ Girl In Scout/ Rover Scout Account', 'বয়েজ স্কাউট/ গার্ল ইন স্কাউট/ রোভার স্কাউট বাবদ'),
(42, 1, 'Common Room Account', 'কমনরুম বাবদ'),
(43, 1, 'Electricity Account', 'বিদ্যুত বাবদ'),
(44, 1, 'Milad Account', 'মিলাদ বাবদ'),
(45, 1, 'Felicitation Account', 'আপ্যায়ন বাবদ'),
(46, 1, 'Printing Account', 'প্রিন্টিং বাবদ'),
(47, 1, 'Mosque Account', 'মসজিদ বাবদ'),
(48, 1, 'Stationary Account', 'ষ্টেশনারী বাবদ'),
(49, 1, 'Private Pay (Salary) Account', 'বেসরকারী বেতন ভাতা'),
(50, 1, 'Admission Management Account', 'ভর্তি ব্যবস্থাপনা বাবদ'),
(51, 1, 'Government Grants', 'সরকারী অনুদান'),
(52, 1, 'Board  Account', 'বোর্ড বাবদ'),
(53, 1, 'Examination Account', 'পরীক্ষা বাবদ'),
(54, 1, 'Registration Fee Account', 'রেজিস্ট্রেশন ফি বাবদ'),
(55, 1, 'Others', 'বিবিধ  ');

-- --------------------------------------------------------

--
-- Table structure for table `acc_payments`
--

CREATE TABLE IF NOT EXISTS `acc_payments` (
  `PaymentId` bigint(100) NOT NULL AUTO_INCREMENT,
  `LedgerNameId` bigint(100) DEFAULT NULL,
  `Amount` bigint(100) DEFAULT NULL,
  `UserId` bigint(100) DEFAULT NULL,
  `TransactionWith` bigint(100) DEFAULT NULL,
  `PaymentDate` bigint(100) DEFAULT NULL,
  `AdditionalNote` varchar(255) DEFAULT NULL,
  `PaymentMethod` bigint(100) DEFAULT NULL,
  `TransactionMobileNumber` varchar(100) DEFAULT NULL,
  `TransactionId` varchar(200) DEFAULT NULL,
  `AccountTo` varchar(200) DEFAULT NULL,
  `InsertedTime` bigint(100) DEFAULT NULL,
  `PaymentStatus` bigint(100) DEFAULT NULL,
  PRIMARY KEY (`PaymentId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `acc_transactions_validator`
--

CREATE TABLE IF NOT EXISTS `acc_transactions_validator` (
  `RowId` bigint(100) NOT NULL AUTO_INCREMENT,
  `Amount` bigint(100) DEFAULT NULL,
  `SenderNumber` bigint(100) DEFAULT NULL,
  `PaymentMethod` bigint(100) DEFAULT NULL,
  `TransactionId` varchar(50) DEFAULT NULL,
  `TransactionDate` bigint(100) DEFAULT NULL,
  `InsertedDate` bigint(100) DEFAULT NULL,
  `isActive` bigint(100) DEFAULT NULL,
  PRIMARY KEY (`RowId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE IF NOT EXISTS `appointments` (
  `AppointmentId` int(11) NOT NULL AUTO_INCREMENT,
  `AskedBy` int(11) DEFAULT NULL,
  `AskedTo` int(11) DEFAULT NULL,
  `Reason` varchar(255) DEFAULT NULL,
  `AppointmentDate` date DEFAULT NULL,
  `AskedTime` time DEFAULT NULL,
  `AddedDate` int(11) DEFAULT NULL,
  `IsApproved` int(11) DEFAULT NULL,
  PRIMARY KEY (`AppointmentId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `AttendanceId` bigint(100) NOT NULL AUTO_INCREMENT,
  `UserId` bigint(100) DEFAULT NULL,
  `SubjectId` int(11) DEFAULT NULL,
  `isAbsent` int(11) DEFAULT NULL,
  `Message` varchar(100) DEFAULT NULL,
  `AttDate` date DEFAULT NULL,
  `InTime` time DEFAULT NULL,
  `OutTime` time DEFAULT NULL,
  `AddedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`AttendanceId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE IF NOT EXISTS `blocks` (
  `BlockId` bigint(100) NOT NULL AUTO_INCREMENT,
  `BlockUniqueId` varchar(255) DEFAULT NULL,
  `BlockTitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `TitleClasses` varchar(255) DEFAULT NULL,
  `WidgetPosition` varchar(255) DEFAULT NULL,
  `BlockContent` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `isActive` bigint(100) DEFAULT '1',
  PRIMARY KEY (`BlockId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`BlockId`, `BlockUniqueId`, `BlockTitle`, `TitleClasses`, `WidgetPosition`, `BlockContent`, `isActive`) VALUES
(15, '8', 'প্রয়োজনীয় লিঙ্কস', 'important_links', '2', '<ul>\r\n <li><i class="fa fa fa-angle-right"></i> <a target="_blank" href="http://www.dshe.gov.bd">মাধ্যমিক ও উচ্চ শিক্ষা অধিদপ্তর</a></li>\r\n<li><i class="fa fa fa-angle-right"></i> <a target="_blank" href="http://www.dhakaeducationboard.gov.bd">ঢাকা শিক্ষা বোর্ড</a></li>\r\n<li><i class="fa fa fa-angle-right"></i> <a target="_blank" href="http://www.dhakaeducationboard.gov.bd">শিক্ষা বোর্ড</a></li>\r\n<li><i class="fa fa fa-angle-right"></i> <a target="_blank" href="http://www.nctb.gov.bd">এনসিটিবি</a></li>\r\n<li><i class="fa fa fa-angle-right"></i> <a target="_blank" href="http://www.bcs.org.bd">বাংলাদেশ কম্পিউটার সমিতি</a></li>\r\n<li><i class="fa fa fa-angle-right"></i> <a target="_blank" href="http://a2i.pmo.gov.bd">এ২আই</a></li>\r\n<li><i class="fa fa fa-angle-right"></i> <a target="_blank" href="http://www.npo.gov.bd">জাতীয় তথ্য বাতায়ন</a></li>\r\n<li><i class="fa fa fa-angle-right"></i> <a target="_blank" href="http://www.naem.gov.bd">নায়েম</a></li>\r\n<li><i class="fa fa fa-angle-right"></i> <a target="_blank" href="https://www.teachers.gov.bd">শিক্ষক বাতায়ন</a></li>\r\n<li><i class="fa fa fa-angle-right"></i> <a target="_blank" href="http://banbeis.gov.bd">ব্যানবেইস</a></li>\r\n</ul>', 1),
(16, '9', 'Map', 'map', '3', '<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d3629.5725033535746!2d89.9839227!3d24.5348707!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1437993374527" allowfullscreen></iframe>', 1),
(18, '11', 'ফাইন্ড ইউর ওয়ায়ে', '', '5', '<ul>\n                        <li><a href="#">হোম</a></li>\n                        <li><a href="#">সাইট মাপ</a></li>\n                        <li><a href="#">আন্তর্জাতিক ছাত্র</a></li>\n                        <li><a href="#">আমাদের সম্পর্কে </a></li>\n                        <li><a href="#">বর্তমান ছাত্র-ছাত্রী </a></li>\n                        <li><a href="#">স্টাফ</a></li>\n                    </ul>', 1),
(19, '12', 'সুযোগ-সুবিধা', '', '6', '<ul>\n                        <li><a href="#">একাডেমিক ক্যালেন্ডার</a></li>\n                        <li><a href="#">লাইব্রেরি</a></li>\n                        <li><a href="#">কলেজ ও বিদ্যালয়</a></li>\n                        <li><a href="#">কোর্স</a></li>\n                        <li><a href="#">পেশাদার প্রোগ্রামার</a></li>\n                        <li><a href="#">আমাদের সহায়তা ডেস্ক</a></li>\n                    </ul>', 1),
(20, '13', 'গুরুত্বপূর্ণ লিঙ্ক', '', '7', '<ul>\r\n                        <li><a href="#">ডিরেক্টরি</a></li>\r\n                        <li><a href="#">সাইট মাপ</a></li>\r\n                        <li><a href="#">মেইল</a></li>\r\n                        <li><a href="#">ক্যাম্পাস নোটিশ</a></li>\r\n                        <li><a href="#">জরুরী তথ্য</a></li>\r\n                        <li><a href="#">স্টাফ</a></li>\r\n                    </ul>', 0),
(21, '14', 'ভর্তি', 'er', '8', '<ul>\r\n                        <li><a href="#">আর্থিক সাহায্য</a></li>\r\n                        <li><a href="#">ব্যবসায়</a></li>\r\n                        <li><a href="#">গ্রাজুয়েট</a></li>\r\n                        <li><a href="#">আইন</a></li>\r\n                        <li><a href="#">অস্নাতক</a></li>\r\n                        <li><a href="#">স্কুল</a></li>\r\n                    </ul>', 1),
(22, '15', 'কন্টাক্ট আস', '', '9', '<ul>\r\n                        <li class="telephone_no">+ ৪৪ (১২) ১২৩ ৪৫৬৭ ৮৯১</li>\r\n                        <li class="mailing_address">\r\n                            অ্যাডমিন সরবরাহকারী অপটিক adipis বসতে.\r\n                        </li>\r\n                        <li class="email_address"><a href="#">ইনফো@কলেজ.কম</a></li>\r\n                        <li class="googlemaps"><a href="#">গুগল মানচিত্র</a></li>\r\n                    </ul>', 0),
(25, '', 'প্রয়োজনীয় লিঙ্কস', '', '1', '<ul>\r\n	<li><i class="fa fa fa-angle-right"></i> <a target="_blank" href="https://www.omicronlab.com/avro-keyboard.html">অভ্র কিবোর্ড ডাউনলোড</a></li>\r\n	<li><i class="fa fa fa-angle-right"></i> <a target="_blank" href="http://www.univdhaka.edu/home">ঢাকা বিশ্ববিদ্যালয়</a></li>\r\n	<li><i class="fa fa fa-angle-right"></i> <a target="_blank" href="http://www.dip.gov.bd/site/page/f2d015a9-1132-4426-8eef-147f1c4bac8a">অনলাইনে পাসপোর্টের আবেদন</a></li>\r\n	<li><i class="fa fa fa-angle-right"></i> <a target="_blank" href="http://bris.lgd.gov.bd/pub/?pg=application_form">জন্ম ও মৃত্যু নিবন্ধন</a></li>\r\n	<li><i class="fa fa fa-angle-right"></i> <a target="_blank" href="http://www.moedu.gov.bd/">শিক্ষা মন্ত্রণালয়</a></li>\r\n	<li><i class="fa fa fa-angle-right"></i> <a target="_blank" href="http://www.dshe.gov.bd/">PMIS for All cadre</a></li>\r\n	<li><i class="fa fa fa-angle-right"></i> <a target="_blank" href="http://emis.gov.bd/main/App_Pages/Client/userLoginReport.aspx?val=1">PDS For Govt. College Teachers</a></li>\r\n	<li><i class="fa fa fa-angle-right"></i> <a target="_blank" href="https://services.nidw.gov.bd/">জাতীয় পরিচয়পত্রের তথ্য হালনাগাদকরণ</a></li>\r\n	<li><i class="fa fa fa-angle-right"></i> <a target="_blank" href="http://www.bpsc.gov.bd/">সরকারি কর্ম-কমিশনে আবেদন</a></li>\r\n	<li><i class="fa fa fa-angle-right"></i> <a target="_blank" href="http://www.dip.gov.bd/site/page/f2d015a9-1132-4426-8eef-147f1c4bac8a">অনলাইনে পাসপোর্টের আবেদন</a></li>\r\n</ul>', 0),
(26, '', 'ফেসবুক', '', '10', '<div class="fb-page" data-href="https://www.facebook.com/%E0%A6%9A%E0%A6%95%E0%A6%B0%E0%A6%BF%E0%A7%9F%E0%A6%BE-%E0%A6%89%E0%A6%AE%E0%A7%8D%E0%A6%AE%E0%A6%BE%E0%A6%B9%E0%A6%BE%E0%A6%A4%E0%A7%81%E0%A6%B2-%E0%A6%AE%E0%A7%8B%E0%A6%AE%E0%A7%87%E0%A6%A8%E0%A7%80%E0%A6%A8-%E0%A6%AE%E0%A6%B9%E0%A6%BF%E0%A6%B2%E0%A6%BE-%E0%A6%A6%E0%A6%BE%E0%A6%96%E0%A6%BF%E0%A6%B2-%E0%A6%AE%E0%A6%BE%E0%A6%A6%E0%A6%B0%E0%A6%BE%E0%A6%B8%E0%A6%BE-308113802886562/" data-width="260" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false">\r\n                <div class="fb-xfbml-parse-ignore">\r\n                    <blockquote cite="https://www.facebook.com/%E0%A6%9A%E0%A6%95%E0%A6%B0%E0%A6%BF%E0%A7%9F%E0%A6%BE-%E0%A6%89%E0%A6%AE%E0%A7%8D%E0%A6%AE%E0%A6%BE%E0%A6%B9%E0%A6%BE%E0%A6%A4%E0%A7%81%E0%A6%B2-%E0%A6%AE%E0%A7%8B%E0%A6%AE%E0%A7%87%E0%A6%A8%E0%A7%80%E0%A6%A8-%E0%A6%AE%E0%A6%B9%E0%A6%BF%E0%A6%B2%E0%A6%BE-%E0%A6%A6%E0%A6%BE%E0%A6%96%E0%A6%BF%E0%A6%B2-%E0%A6%AE%E0%A6%BE%E0%A6%A6%E0%A6%B0%E0%A6%BE%E0%A6%B8%E0%A6%BE-308113802886562/">\r\n                        <a href="https://www.facebook.com/%E0%A6%9A%E0%A6%95%E0%A6%B0%E0%A6%BF%E0%A7%9F%E0%A6%BE-%E0%A6%89%E0%A6%AE%E0%A7%8D%E0%A6%AE%E0%A6%BE%E0%A6%B9%E0%A6%BE%E0%A6%A4%E0%A7%81%E0%A6%B2-%E0%A6%AE%E0%A7%8B%E0%A6%AE%E0%A7%87%E0%A6%A8%E0%A7%80%E0%A6%A8-%E0%A6%AE%E0%A6%B9%E0%A6%BF%E0%A6%B2%E0%A6%BE-%E0%A6%A6%E0%A6%BE%E0%A6%96%E0%A6%BF%E0%A6%B2-%E0%A6%AE%E0%A6%BE%E0%A6%A6%E0%A6%B0%E0%A6%BE%E0%A6%B8%E0%A6%BE-308113802886562/">চকরিয়া উম্মাহাতুল মো''মেনীন মহিলা দাখিল মাদরাসা</a>\r\n                    </blockquote>\r\n                </div>\r\n            </div>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `callhistory`
--

CREATE TABLE IF NOT EXISTS `callhistory` (
  `DispositionId` int(11) NOT NULL AUTO_INCREMENT,
  `CalledBy` int(11) NOT NULL,
  `AddressBookId` int(11) NOT NULL,
  `NextCallDate` int(11) NOT NULL,
  `Interests` varchar(255) NOT NULL,
  `OtherNotes` text NOT NULL,
  `CallTime` int(11) NOT NULL,
  `AddedDate` int(11) NOT NULL,
  PRIMARY KEY (`DispositionId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `CategoryId` bigint(100) NOT NULL AUTO_INCREMENT,
  `ModuleId` bigint(100) DEFAULT NULL,
  `CategoryName` varchar(50) DEFAULT NULL,
  `CategoryDetails` text,
  PRIMARY KEY (`CategoryId`),
  KEY `categories_moduleid` (`ModuleId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=116 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryId`, `ModuleId`, `CategoryName`, `CategoryDetails`) VALUES
(1, 1, 'Agro based Industry', 'Agro based Industry'),
(3, 1, 'Architecture/Engineering/Construction', 'Architecture/Engineering/Construction'),
(4, 1, 'Automobile/Industrial Machine', 'Automobile/Industrial Machine'),
(5, 1, 'Bank/Non-Bank Fin. Institution', 'Bank/Non-Bank Fin. Institution'),
(6, 1, 'Education', 'Education'),
(7, 1, 'Electronics/Consumer Durables', 'Electronics/Consumer Durables'),
(8, 1, 'Energy/Power/Fuel', 'Energy/Power/Fuel'),
(9, 1, 'Garments/Textile', 'Garments/Textile'),
(10, 1, 'Pharmaceuticals ', 'Pharmaceuticals '),
(11, 1, 'Hospital/ Diagnostic Center', 'Hospital/ Diagnostic Center'),
(12, 1, 'Airline/ Travel/ Tourism', 'Airline/ Travel/ Tourism'),
(13, 1, 'Manufacturing (Light Industry)', 'Manufacturing (Light Industry)'),
(14, 1, 'Manufacturing (Heavy Industry)', 'Manufacturing (Heavy Industry)'),
(15, 1, 'Hotel/Restaurant', 'Hotel/Restaurant'),
(16, 1, 'Information Technology', 'Information Technology'),
(17, 1, 'Logistics/ Transportation', 'Logistics/ Transportation'),
(18, 1, 'Entertainment/ Recreation', 'Entertainment/ Recreation'),
(19, 1, 'Media / Advertising/ Event Mgt.', 'Media / Advertising/ Event Mgt.'),
(20, 1, 'NGO/Development', 'NGO/Development'),
(21, 1, 'Real Estate/Development', 'Real Estate/Development'),
(22, 1, 'Wholesale/ Retail/ Export-Import', 'Wholesale/ Retail/ Export-Import'),
(23, 1, 'Telecommunication ', 'Telecommunication '),
(24, 1, 'Food & Beverage Industry', 'Food & Beverage Industry'),
(25, 1, 'Security Service', 'Security Service'),
(26, 1, 'Fire, Safety & Protection', 'Fire, Safety & Protection'),
(27, 1, 'Others ', 'Others '),
(28, 5, 'PR/Marketing Campaigns\r\n', 'PR/Marketing Campaigns\r\n'),
(29, 5, 'Free Trademark Searches\r\n', 'Free Trademark Searches\r\n'),
(30, 5, 'Low Cost Patent Searches\r\n', 'Low Cost Patent Searches\r\n'),
(31, 5, 'Free Legal Patent Opinions\r\n', 'Free Legal Patent Opinions\r\n'),
(32, 5, 'Licensing Contracts Review\r\n', 'Licensing Contracts Review\r\n'),
(33, 5, 'Event/Trade Show Representation\r\n', 'Event/Trade Show Representation\r\n'),
(34, 5, 'High Value Inventor/Investor Workshops\r\n', 'High Value Inventor/Investor Workshops\r\n'),
(35, 3, 'Live', 'Live'),
(36, 5, 'Crowdfunding', 'Crowdfunding'),
(37, 2, 'Antiquities', 'Antiquities'),
(38, 2, 'Architectural & Garden', 'Architectural & Garden'),
(39, 2, 'Asian Antiques', 'Asian Antiques'),
(40, 2, 'Books & Manuscripts', 'Books & Manuscripts'),
(41, 2, 'Decorative Arts', 'Decorative Arts'),
(42, 2, 'Ethnographic', 'Ethnographic'),
(43, 2, 'Furniture', 'Furniture'),
(44, 2, 'Home & Hearth', 'Home & Hearth'),
(45, 2, 'Linens & Textiles (Pre-1930)', 'Linens & Textiles (Pre-1930)'),
(46, 2, 'Maps, Atlases & Globes', 'Maps, Atlases & Globes'),
(47, 2, 'Maritime', 'Maritime'),
(48, 2, 'Mercantile, Trades & Factories', 'Mercantile, Trades & Factories'),
(49, 2, 'Musical Instruments (Pre-1930)', 'Musical Instruments (Pre-1930)'),
(50, 2, 'Periods & Styles', 'Periods & Styles'),
(51, 2, 'Primitives', 'Primitives'),
(52, 2, 'Restoration & Care', 'Restoration & Care'),
(53, 2, 'Rugs & Carpets', 'Rugs & Carpets'),
(54, 2, 'Science & Medicine (Pre-1930)', 'Science & Medicine (Pre-1930)'),
(55, 2, 'Sewing (Pre-1930)', 'Sewing (Pre-1930)'),
(56, 2, 'Silver', 'Silver'),
(57, 2, 'Reproduction Antiques', 'Reproduction Antiques'),
(58, 2, 'Other Antiques', 'Other Antiques'),
(59, 8, 'Agriculture (Organizations)', 'Agriculture (Organizations)'),
(60, 8, 'Automotive & Transport\r\n', 'Automotive & Transport\r\n'),
(61, 8, 'Banking & Finance\r\n', 'Banking & Finance\r\n'),
(62, 8, 'Beauty, Health & Medical\r\n', 'Beauty, Health & Medical\r\n'),
(63, 8, 'Business & Professional Services\r\n', 'Business & Professional Services\r\n'),
(64, 8, 'Entertainment, Leisure & Hobbies\r\n', 'Entertainment, Leisure & Hobbies\r\n'),
(65, 8, 'Fashion & Textile\r\n', 'Fashion & Textile\r\n'),
(66, 8, 'Food & Beverages\r\n', 'Food & Beverages\r\n'),
(67, 8, 'Gifts & Collectibles\r\n', 'Gifts & Collectibles\r\n'),
(68, 8, 'Government & Community\r\n', 'Government & Community\r\n'),
(69, 8, 'Home & Office\r\n', 'Home & Office\r\n'),
(70, 8, 'Industrial & Engineering\r\n', 'Industrial & Engineering\r\n'),
(71, 8, 'IT, Electronics & Telecoms\r\n', 'IT, Electronics & Telecoms\r\n'),
(72, 8, 'Marine, Oil & Gas\r\n', 'Marine, Oil & Gas\r\n'),
(73, 8, 'Media, Advertising & Printing\r\n', 'Media, Advertising & Printing\r\n'),
(74, 8, 'Packing & Logistics\r\n', 'Packing & Logistics\r\n'),
(75, 8, 'Real Estate & Construction\r\n', 'Real Estate & Construction\r\n'),
(76, 8, 'Safety & Security\r\n', 'Safety & Security\r\n'),
(77, 8, 'Science, Research & Technology\r\n', 'Science, Research & Technology\r\n'),
(78, 8, 'Sports & Fitness\r\n', 'Sports & Fitness\r\n'),
(79, 8, 'Tourism & Travel\r\n', 'Tourism & Travel\r\n'),
(80, 8, 'Training & Education\r\n', 'Training & Education\r\n'),
(81, 8, 'Others\r\n', 'Others\r\n'),
(82, 3, 'Radio Shows', 'Radio Shows'),
(83, 3, 'Road Shows', 'Road Shows'),
(84, 8, 'Agriculture (Governments)', 'Agriculture (Governments)'),
(85, 8, 'Energy', 'Energy'),
(86, 8, 'Health and Human Services ', 'Health and Human Services '),
(87, 8, 'Bartering & Exchange Programs', 'Bartering & Exchange Programs'),
(88, 8, 'Business (Cooperative Businesses)', 'Business (Cooperative Businesses)'),
(89, 8, 'Children', 'Children'),
(90, 8, 'Clean Energy', 'Clean Energy'),
(91, 8, 'CrowdFunding', 'CrowdFunding'),
(92, 8, 'Empowerment', 'Empowerment'),
(93, 8, 'Farming', 'Farming'),
(94, 8, 'Films & Documentaries', 'Films & Documentaries'),
(95, 8, 'Funding Programs', 'Funding Programs'),
(96, 8, 'Gray Water Systems', 'Gray Water Systems'),
(97, 8, 'Health', 'Health'),
(98, 8, 'Homes, Housing, Communities, Land, Land Parcels', 'Homes, Housing, Communities, Land, Land Parcels'),
(99, 8, 'Humanitarian Organizations', 'Humanitarian Organizations'),
(100, 8, 'Investments', 'Investments'),
(101, 8, 'Jobs', 'Jobs'),
(102, 8, 'Legal', 'Legal'),
(103, 8, 'Marketing Sustainability', 'Marketing Sustainability'),
(104, 8, 'Musicians (green – eco – loving – sustainability m', 'Musicians (green – eco – loving – sustainability minded)'),
(105, 8, 'Natural Pools', 'Natural Pools'),
(106, 8, 'Off Grid', 'Off Grid'),
(107, 8, 'Profit Sharing (Community Profits & Profit Sharing', 'Profit Sharing (Community Profits & Profit Sharing)'),
(108, 8, 'Sewage as Fertilizer', 'Sewage as Fertilizer'),
(109, 8, 'Social Media', 'Social Media'),
(110, 8, 'Space & Much More (Must see! Bringing GREEN to The', 'Space & Much More (Must see! Bringing GREEN to The Space Program)'),
(111, 8, 'Survival', 'Survival'),
(112, 8, 'Technology', 'Technology'),
(113, 8, 'Air Purifiers', 'Air Purifiers'),
(114, 5, 'Search Engine Marketing', 'Search Engine Marketing'),
(115, 5, 'Business Coaching', 'Business Coaching');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` bigint(100) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('01da8eb05cf099b7c618f40bc94a48cf0d1efd28', '66.249.64.49', 1472378501, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323337383530303b),
('033d971650ea21598744f4ec2b8803b5dbb85c06', '119.30.35.242', 1472532657, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323533323635363b),
('060874473eb147479fabfe5d48547d5237ba77da', '66.249.64.51', 1472489198, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323438393139383b),
('0ff854992de0fb14eac33ff124bbc4aa3dcbe6c4', '66.249.64.71', 1472208266, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323230383236363b),
('127127027dd27793bb7a443839e11a62d7f0810c', '66.249.64.49', 1472302227, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323330323232373b),
('16acc0de5c99b3c7f0aa6f8654a3f05e5f240d93', '103.60.175.110', 1472294130, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323239333939313b6964656e746974797c733a343a2231333537223b69647c733a343a2231333537223b656d61696c7c733a31393a22736b79646f74696e7440676d61696c2e636f6d223b757365725f69647c733a343a2231333537223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343639303739393537223b),
('16f1ff4fba0788ec539a5079a2e0f753532f110e', '103.60.175.110', 1472300553, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323330303535333b),
('174f052d9dc9aa7f16a60b99011c33271399a775', '66.249.64.47', 1472308681, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323330383638313b),
('19f801f848deef748032744955c60645aa05e2aa', '66.249.79.81', 1472403049, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323430333034393b),
('1cd62c4b6d8e2a2b59fa365789d28abc54c6b9c5', '66.249.64.51', 1472378547, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323337383534373b),
('1f089afe50ac9613de4fdd0bb01e95de838c6fa9', '66.249.79.76', 1472415737, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323431353733373b),
('21bbe7537d2369de7c8a8224bfe13749f118ec63', '66.249.64.76', 1472179144, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323137393134343b),
('2315a34087aeb358c524a42f4727cf3c10d2f5b4', '66.249.64.51', 1472378344, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323337383334343b),
('2d42c1e8ca69f448b99e771aefed3d8cb69201da', '66.249.64.71', 1472216246, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323231363234363b),
('30e2965c60eae0a19227973e3333aa4489644bbe', '66.249.64.49', 1472308681, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323330383638313b),
('32ac231d0e74ea6508e0239ffeae63bf5a9a5d48', '66.249.64.49', 1472302139, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323330323133393b),
('386647137d803a04326fc12e33157f1797e8042d', '66.249.79.76', 1472415397, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323431353339373b),
('414f8afd2a3b01fc3d8be1a1550ec3e430f6545d', '66.249.79.76', 1472459705, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323435393730353b),
('458080435d919f9acea5656f6d521aa86b1cb695', '66.249.64.51', 1472378344, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323337383334343b),
('4bcd2237ae64f8b76a78d455d10e1e4eb3b25605', '66.249.79.71', 1472415916, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323431353931363b),
('51f27df897d6f3114d2e2ab5daaa2b4f5bafbcc2', '66.249.64.76', 1472209407, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323230393430373b),
('54add9cd98da3852d45234c2dd4fa18d68375760', '66.249.79.81', 1472450703, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323435303730333b),
('5a53a21206bb05e63179e00ed3c2e78cd806012f', '66.249.64.71', 1472228444, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323232383434343b),
('5e24f1546c8e068d61a615913a6daefa95b5365f', '64.246.165.210', 1472432172, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323433323137323b),
('5f1bff423dce9441387bd17ea9fb952b395351f5', '66.249.64.49', 1472252991, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323235323939313b),
('62627e0c8f36828950d2ee56b634fe2c63058d10', '66.249.64.47', 1472378344, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323337383334343b),
('67310143345e8dcc7a0c12a3945719701e829fd4', '66.249.79.81', 1472450704, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323435303730343b),
('689b8e53aaa3486f8fe64681bbebef32c52eecea', '66.249.64.51', 1472489198, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323438393139383b),
('6a3660902b9ef4281eee58336d0e8639149cdce7', '66.249.79.76', 1472460067, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323436303036373b),
('6f9d620e22401396e3432614e349cd92b7aac3da', '66.249.64.47', 1472302139, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323330323133393b),
('7b18908f5b664abf68c6e1ba77180a689750d1e4', '66.249.64.47', 1472340231, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323334303233313b),
('7c37a4ac2f186121ef83cdddb23dd3d581871002', '66.249.79.76', 1472403049, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323430333034393b),
('8183ab9786b69803a6fb5af13744c98ecc015d77', '66.249.64.71', 1472181255, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323138313235353b),
('838257ce3edde577e414dc0f7b26c63239252e4b', '66.249.79.76', 1472459705, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323435393730353b),
('8a44a98d571ae925791fe5093f67c5cd840aa077', '119.30.38.165', 1472269882, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323236393838323b),
('9167b816c79dad45875cc2e207403a157ab702fc', '66.249.79.76', 1472461296, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323436313239363b),
('9855991f06a98549165b3476ffb5e3aa7d3ee502', '66.249.79.81', 1472415622, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323431353632323b),
('99bb185cb6b1ebe806fb8b95bd31c74840282907', '66.249.64.47', 1472252990, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323235323939303b),
('9b2f83507be10368b9cfffe4cdccb0a4ae9d287a', '66.249.64.51', 1472303303, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323330333330333b),
('a2a40b6b9284da308c1233a98aef6c3f903d895f', '66.249.64.81', 1472154010, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323135343031303b),
('a87ed61f1cbd3c604ea804a92af86d7b017e1dcb', '66.249.64.76', 1472179144, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323137393134343b),
('acc270708b1a3ea868c592bd2e3b388fd3946781', '119.30.38.165', 1472270078, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323237303037373b),
('af1a32adc707a1a8c7f0fc842ad8a496e3019971', '66.249.64.81', 1472179408, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323137393430373b),
('b445ad26377fb8222d34a2968ba5abde62312e08', '66.249.64.47', 1472340230, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323334303233303b),
('b9fcae97761e92f2eebdad43376eb4c93648da21', '119.30.39.113', 1472226014, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323232353637353b6964656e746974797c733a363a22313134313239223b69647c733a363a22313134313239223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a363a22313134313239223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343732313037353235223b),
('bb575daed8b015750ff69f42f861fda2eedd78b0', '119.30.35.131', 1472210140, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323231303133383b),
('cb0824f8b6432e241fd82d1f3547f4ee4c3e7a1c', '119.30.38.165', 1472269947, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323236393838323b),
('ced5a949ff4b66b27ee46466a63585e9723798ca', '66.249.64.47', 1472266457, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323236363435363b),
('d3dae4483b0083761b0f4e89cccd344532e88529', '119.30.39.113', 1472226153, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323232363033343b),
('d6bddaca6ccc4b5457b8c477cc2ccf925f007d4d', '66.249.64.81', 1472154010, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323135343031303b),
('d74d0589886e5108609b7533aeb5325439bb78dd', '66.249.79.81', 1472415622, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323431353632323b),
('e545774c55c50b848cfe1ebf4e2511be813ad236', '66.249.64.81', 1472228444, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323232383434343b),
('e62596e16c20f2cd9cc78ecf1a2e16920db29e18', '66.249.79.76', 1472415397, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323431353339373b),
('f63564f4a5b11311d0f06b31af30006e2389ec06', '119.30.38.131', 1472449032, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323434393033323b),
('f657fc3ff45b540adecc0f22af564f6b743322ae', '119.30.38.165', 1472269859, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323236393536343b6964656e746974797c733a363a22313134313239223b69647c733a363a22313134313239223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a363a22313134313239223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343732323235363939223b),
('fc4cd3fa812655e8610da87a290d5d233b49d4d4', '103.60.175.110', 1472297251, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323239373032333b6964656e746974797c733a343a2231333537223b69647c733a343a2231333537223b656d61696c7c733a31393a22736b79646f74696e7440676d61696c2e636f6d223b757365725f69647c733a343a2231333537223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343639303739393537223b),
('fcba9dd009f4fc12cc897c1c58e4bac89929a88e', '66.249.64.47', 1472266457, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323236363435373b),
('fddb3333c27357eaf36494ef727b5411de4ae178', '64.246.165.210', 1472432172, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323433323137323b),
('ff71f9f1932086ec0383138537fc7e089e37fdd4', '66.220.156.115', 1472355788, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437323335353738383b);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `CountryId` bigint(100) NOT NULL AUTO_INCREMENT,
  `Code` char(3) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `Name` char(52) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `Continent` enum('Asia','Europe','North America','Africa','Oceania','Antarctica','South America') CHARACTER SET latin1 NOT NULL DEFAULT 'Asia',
  `Region` char(26) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `SurfaceArea` float(10,2) NOT NULL DEFAULT '0.00',
  `IndepYear` smallint(6) DEFAULT NULL,
  `Population` bigint(100) NOT NULL DEFAULT '0',
  `LifeExpectancy` float(3,1) DEFAULT NULL,
  `GNP` float(10,2) DEFAULT NULL,
  `GNPOld` float(10,2) DEFAULT NULL,
  `LocalName` char(45) CHARACTER SET latin1 DEFAULT '',
  `GovernmentForm` char(45) CHARACTER SET latin1 DEFAULT '',
  `HeadOfState` char(60) CHARACTER SET latin1 DEFAULT NULL,
  `Capital` bigint(100) DEFAULT NULL,
  `Code2` char(2) CHARACTER SET latin1 DEFAULT '',
  PRIMARY KEY (`CountryId`),
  KEY `Code` (`Code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT AUTO_INCREMENT=241 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`CountryId`, `Code`, `Name`, `Continent`, `Region`, `SurfaceArea`, `IndepYear`, `Population`, `LifeExpectancy`, `GNP`, `GNPOld`, `LocalName`, `GovernmentForm`, `HeadOfState`, `Capital`, `Code2`) VALUES
(1, 'ABW', 'Aruba', 'North America', 'Caribbean', 193.00, NULL, 103000, 78.4, 828.00, 793.00, 'Aruba', 'Nonmetropolitan Territory of The Netherlands', 'Beatrix', 129, 'AW'),
(2, 'AFG', 'Afghanistan', 'Asia', 'Southern and Central Asia', 652090.00, 1919, 22720000, 45.9, 5976.00, NULL, 'Afganistan/Afqanestan', 'Islamic Emirate', 'Mohammad Omar', 1, 'AF'),
(3, 'AGO', 'Angola', 'Africa', 'Central Africa', 1246700.00, 1975, 12878000, 38.3, 6648.00, 7984.00, 'Angola', 'Republic', 'JosÃ© Eduardo dos Santos', 56, 'AO'),
(4, 'AIA', 'Anguilla', 'North America', 'Caribbean', 96.00, NULL, 8000, 76.1, 63.20, NULL, 'Anguilla', 'Dependent Territory of the UK', 'Elisabeth II', 62, 'AI'),
(5, 'ALB', 'Albania', 'Europe', 'Southern Europe', 28748.00, 1912, 3401200, 71.6, 3205.00, 2500.00, 'ShqipÃ«ria', 'Republic', 'Rexhep Mejdani', 34, 'AL'),
(6, 'AND', 'Andorra', 'Europe', 'Southern Europe', 468.00, 1278, 78000, 83.5, 1630.00, NULL, 'Andorra', 'Parliamentary Coprincipality', '', 55, 'AD'),
(7, 'ANT', 'Netherlands Antilles', 'North America', 'Caribbean', 800.00, NULL, 217000, 74.7, 1941.00, NULL, 'Nederlandse Antillen', 'Nonmetropolitan Territory of The Netherlands', 'Beatrix', 33, 'AN'),
(8, 'ARE', 'United Arab Emirates', 'Asia', 'Middle East', 83600.00, 1971, 2441000, 74.1, 37966.00, 36846.00, 'Al-Imarat al-Â´Arabiya al-Muttahida', 'Emirate Federation', 'Zayid bin Sultan al-Nahayan', 65, 'AE'),
(9, 'ARG', 'Argentina', 'South America', 'South America', 2780400.00, 1816, 37032000, 75.1, 340238.00, 323310.00, 'Argentina', 'Federal Republic', 'Fernando de la RÃºa', 69, 'AR'),
(10, 'ARM', 'Armenia', 'Asia', 'Middle East', 29800.00, 1991, 3520000, 66.4, 1813.00, 1627.00, 'Hajastan', 'Republic', 'Robert KotÅ¡arjan', 126, 'AM'),
(11, 'ASM', 'American Samoa', 'Oceania', 'Polynesia', 199.00, NULL, 68000, 75.1, 334.00, NULL, 'Amerika Samoa', 'US Territory', 'George W. Bush', 54, 'AS'),
(12, 'ATA', 'Antarctica', 'Antarctica', 'Antarctica', 13120000.00, NULL, 0, NULL, 0.00, NULL, 'â€“', 'Co-administrated', '', NULL, 'AQ'),
(13, 'ATF', 'French Southern territories', 'Antarctica', 'Antarctica', 7780.00, NULL, 0, NULL, 0.00, NULL, 'Terres australes franÃ§aises', 'Nonmetropolitan Territory of France', 'Jacques Chirac', NULL, 'TF'),
(14, 'ATG', 'Antigua and Barbuda', 'North America', 'Caribbean', 442.00, 1981, 68000, 70.5, 612.00, 584.00, 'Antigua and Barbuda', 'Constitutional Monarchy', 'Elisabeth II', 63, 'AG'),
(15, 'AUS', 'Australia', 'Oceania', 'Australia and New Zealand', 7741220.00, 1901, 18886000, 79.8, 351182.00, 392911.00, 'Australia', 'Constitutional Monarchy, Federation', 'Elisabeth II', 135, 'AU'),
(16, 'AUT', 'Austria', 'Europe', 'Western Europe', 83859.00, 1918, 8091800, 77.7, 211860.00, 206025.00, 'Ã–sterreich', 'Federal Republic', 'Thomas Klestil', 1523, 'AT'),
(17, 'AZE', 'Azerbaijan', 'Asia', 'Middle East', 86600.00, 1991, 7734000, 62.9, 4127.00, 4100.00, 'AzÃ¤rbaycan', 'Federal Republic', 'HeydÃ¤r Ã„liyev', 144, 'AZ'),
(18, 'BDI', 'Burundi', 'Africa', 'Eastern Africa', 27834.00, 1962, 6695000, 46.2, 903.00, 982.00, 'Burundi/Uburundi', 'Republic', 'Pierre Buyoya', 552, 'BI'),
(19, 'BEL', 'Belgium', 'Europe', 'Western Europe', 30518.00, 1830, 10239000, 77.8, 249704.00, 243948.00, 'BelgiÃ«/Belgique', 'Constitutional Monarchy, Federation', 'Albert II', 179, 'BE'),
(20, 'BEN', 'Benin', 'Africa', 'Western Africa', 112622.00, 1960, 6097000, 50.2, 2357.00, 2141.00, 'BÃ©nin', 'Republic', 'Mathieu KÃ©rÃ©kou', 187, 'BJ'),
(21, 'BFA', 'Burkina Faso', 'Africa', 'Western Africa', 274000.00, 1960, 11937000, 46.7, 2425.00, 2201.00, 'Burkina Faso', 'Republic', 'Blaise CompaorÃ©', 549, 'BF'),
(22, 'BGD', 'Bangladesh', 'Asia', 'Southern and Central Asia', 143998.00, 1971, 129155000, 60.2, 32852.00, 31966.00, 'Bangladesh', 'Republic', 'Shahabuddin Ahmad', 150, 'BD'),
(23, 'BGR', 'Bulgaria', 'Europe', 'Eastern Europe', 110994.00, 1908, 8190900, 70.9, 12178.00, 10169.00, 'Balgarija', 'Republic', 'Petar Stojanov', 539, 'BG'),
(24, 'BHR', 'Bahrain', 'Asia', 'Middle East', 694.00, 1971, 617000, 73.0, 6366.00, 6097.00, 'Al-Bahrayn', 'Monarchy (Emirate)', 'Hamad ibn Isa al-Khalifa', 149, 'BH'),
(25, 'BHS', 'Bahamas', 'North America', 'Caribbean', 13878.00, 1973, 307000, 71.1, 3527.00, 3347.00, 'The Bahamas', 'Constitutional Monarchy', 'Elisabeth II', 148, 'BS'),
(26, 'BIH', 'Bosnia and Herzegovina', 'Europe', 'Southern Europe', 51197.00, 1992, 3972000, 71.5, 2841.00, NULL, 'Bosna i Hercegovina', 'Federal Republic', 'Ante Jelavic', 201, 'BA'),
(27, 'BLR', 'Belarus', 'Europe', 'Eastern Europe', 207600.00, 1991, 10236000, 68.0, 13714.00, NULL, 'Belarus', 'Republic', 'Aljaksandr LukaÅ¡enka', 3520, 'BY'),
(28, 'BLZ', 'Belize', 'North America', 'Central America', 22696.00, 1981, 241000, 70.9, 630.00, 616.00, 'Belize', 'Constitutional Monarchy', 'Elisabeth II', 185, 'BZ'),
(29, 'BMU', 'Bermuda', 'North America', 'North America', 53.00, NULL, 65000, 76.9, 2328.00, 2190.00, 'Bermuda', 'Dependent Territory of the UK', 'Elisabeth II', 191, 'BM'),
(30, 'BOL', 'Bolivia', 'South America', 'South America', 1098581.00, 1825, 8329000, 63.7, 8571.00, 7967.00, 'Bolivia', 'Republic', 'Hugo BÃ¡nzer SuÃ¡rez', 194, 'BO'),
(31, 'BRA', 'Brazil', 'South America', 'South America', 8547403.00, 1822, 170115000, 62.9, 776739.00, 804108.00, 'Brasil', 'Federal Republic', 'Fernando Henrique Cardoso', 211, 'BR'),
(32, 'BRB', 'Barbados', 'North America', 'Caribbean', 430.00, 1966, 270000, 73.0, 2223.00, 2186.00, 'Barbados', 'Constitutional Monarchy', 'Elisabeth II', 174, 'BB'),
(33, 'BRN', 'Brunei', 'Asia', 'Southeast Asia', 5765.00, 1984, 328000, 73.6, 11705.00, 12460.00, 'Brunei Darussalam', 'Monarchy (Sultanate)', 'Haji Hassan al-Bolkiah', 538, 'BN'),
(34, 'BTN', 'Bhutan', 'Asia', 'Southern and Central Asia', 47000.00, 1910, 2124000, 52.4, 372.00, 383.00, 'Druk-Yul', 'Monarchy', 'Jigme Singye Wangchuk', 192, 'BT'),
(35, 'BVT', 'Bouvet Island', 'Antarctica', 'Antarctica', 59.00, NULL, 0, NULL, 0.00, NULL, 'BouvetÃ¸ya', 'Dependent Territory of Norway', 'Harald V', NULL, 'BV'),
(36, 'BWA', 'Botswana', 'Africa', 'Southern Africa', 581730.00, 1966, 1622000, 39.3, 4834.00, 4935.00, 'Botswana', 'Republic', 'Festus G. Mogae', 204, 'BW'),
(37, 'CAF', 'Central African Republic', 'Africa', 'Central Africa', 622984.00, 1960, 3615000, 44.0, 1054.00, 993.00, 'Centrafrique/BÃª-AfrÃ®ka', 'Republic', 'Ange-FÃ©lix PatassÃ©', 1889, 'CF'),
(38, 'CAN', 'Canada', 'North America', 'North America', 9970610.00, 1867, 31147000, 79.4, 598862.00, 625626.00, 'Canada', 'Constitutional Monarchy, Federation', 'Elisabeth II', 1822, 'CA'),
(39, 'CCK', 'Cocos (Keeling) Islands', 'Oceania', 'Australia and New Zealand', 14.00, NULL, 600, NULL, 0.00, NULL, 'Cocos (Keeling) Islands', 'Territory of Australia', 'Elisabeth II', 2317, 'CC'),
(40, 'CHE', 'Switzerland', 'Europe', 'Western Europe', 41284.00, 1499, 7160400, 79.6, 264478.00, 256092.00, 'Schweiz/Suisse/Svizzera/Svizra', 'Federation', 'Adolf Ogi', 3248, 'CH'),
(41, 'CHL', 'Chile', 'South America', 'South America', 756626.00, 1810, 15211000, 75.7, 72949.00, 75780.00, 'Chile', 'Republic', 'Ricardo Lagos Escobar', 554, 'CL'),
(42, 'CHN', 'China', 'Asia', 'Eastern Asia', 9572900.00, -1523, 1277558000, 71.4, 982268.00, 917719.00, 'Zhongquo', 'People''sRepublic', 'Jiang Zemin', 1891, 'CN'),
(43, 'CIV', 'CÃ´te dâ€™Ivoire', 'Africa', 'Western Africa', 322463.00, 1960, 14786000, 45.2, 11345.00, 10285.00, 'CÃ´te dâ€™Ivoire', 'Republic', 'Laurent Gbagbo', 2814, 'CI'),
(44, 'CMR', 'Cameroon', 'Africa', 'Central Africa', 475442.00, 1960, 15085000, 54.8, 9174.00, 8596.00, 'Cameroun/Cameroon', 'Republic', 'Paul Biya', 1804, 'CM'),
(45, 'COD', 'Congo, The Democratic Republic of the', 'Africa', 'Central Africa', 2344858.00, 1960, 51654000, 48.8, 6964.00, 2474.00, 'RÃ©publique DÃ©mocratique du Congo', 'Republic', 'Joseph Kabila', 2298, 'CD'),
(46, 'COG', 'Congo', 'Africa', 'Central Africa', 342000.00, 1960, 2943000, 47.4, 2108.00, 2287.00, 'Congo', 'Republic', 'Denis Sassou-Nguesso', 2296, 'CG'),
(47, 'COK', 'Cook Islands', 'Oceania', 'Polynesia', 236.00, NULL, 20000, 71.1, 100.00, NULL, 'The Cook Islands', 'Nonmetropolitan Territory of New Zealand', 'Elisabeth II', 583, 'CK'),
(48, 'COL', 'Colombia', 'South America', 'South America', 1138914.00, 1810, 42321000, 70.3, 102896.00, 105116.00, 'Colombia', 'Republic', 'AndrÃ©s Pastrana Arango', 2257, 'CO'),
(49, 'COM', 'Comoros', 'Africa', 'Eastern Africa', 1862.00, 1975, 578000, 60.0, 4401.00, 4361.00, 'Komori/Comores', 'Republic', 'Azali Assoumani', 2295, 'KM'),
(50, 'CPV', 'Cape Verde', 'Africa', 'Western Africa', 4033.00, 1975, 428000, 68.9, 435.00, 420.00, 'Cabo Verde', 'Republic', 'AntÃ³nio Mascarenhas Monteiro', 1859, 'CV'),
(51, 'CRI', 'Costa Rica', 'North America', 'Central America', 51100.00, 1821, 4023000, 75.8, 10226.00, 9757.00, 'Costa Rica', 'Republic', 'Miguel Ãngel RodrÃ­guez EcheverrÃ­a', 584, 'CR'),
(52, 'CUB', 'Cuba', 'North America', 'Caribbean', 110861.00, 1902, 11201000, 76.2, 17843.00, 18862.00, 'Cuba', 'Socialistic Republic', 'Fidel Castro Ruz', 2413, 'CU'),
(53, 'CXR', 'Christmas Island', 'Oceania', 'Australia and New Zealand', 135.00, NULL, 2500, NULL, 0.00, NULL, 'Christmas Island', 'Territory of Australia', 'Elisabeth II', 1791, 'CX'),
(54, 'CYM', 'Cayman Islands', 'North America', 'Caribbean', 264.00, NULL, 38000, 78.9, 1263.00, 1186.00, 'Cayman Islands', 'Dependent Territory of the UK', 'Elisabeth II', 553, 'KY'),
(55, 'CYP', 'Cyprus', 'Asia', 'Middle East', 9251.00, 1960, 754700, 76.7, 9333.00, 8246.00, 'KÃ½pros/Kibris', 'Republic', 'Glafkos Klerides', 2430, 'CY'),
(56, 'CZE', 'Czech Republic', 'Europe', 'Eastern Europe', 78866.00, 1993, 10278100, 74.5, 55017.00, 52037.00, 'Â¸esko', 'Republic', 'VÃ¡clav Havel', 3339, 'CZ'),
(57, 'DEU', 'Germany', 'Europe', 'Western Europe', 357022.00, 1955, 82164700, 77.4, 2133367.00, 2102826.00, 'Deutschland', 'Federal Republic', 'Johannes Rau', 3068, 'DE'),
(58, 'DJI', 'Djibouti', 'Africa', 'Eastern Africa', 23200.00, 1977, 638000, 50.8, 382.00, 373.00, 'Djibouti/Jibuti', 'Republic', 'Ismail Omar Guelleh', 585, 'DJ'),
(59, 'DMA', 'Dominica', 'North America', 'Caribbean', 751.00, 1978, 71000, 73.4, 256.00, 243.00, 'Dominica', 'Republic', 'Vernon Shaw', 586, 'DM'),
(60, 'DNK', 'Denmark', 'Europe', 'Nordic Countries', 43094.00, 800, 5330000, 76.5, 174099.00, 169264.00, 'Danmark', 'Constitutional Monarchy', 'Margrethe II', 3315, 'DK'),
(61, 'DOM', 'Dominican Republic', 'North America', 'Caribbean', 48511.00, 1844, 8495000, 73.2, 15846.00, 15076.00, 'RepÃºblica Dominicana', 'Republic', 'HipÃ³lito MejÃ­a DomÃ­nguez', 587, 'DO'),
(62, 'DZA', 'Algeria', 'Africa', 'Northern Africa', 2381741.00, 1962, 31471000, 69.7, 49982.00, 46966.00, 'Al-Jazaâ€™ir/AlgÃ©rie', 'Republic', 'Abdelaziz Bouteflika', 35, 'DZ'),
(63, 'ECU', 'Ecuador', 'South America', 'South America', 283561.00, 1822, 12646000, 71.1, 19770.00, 19769.00, 'Ecuador', 'Republic', 'Gustavo Noboa Bejarano', 594, 'EC'),
(64, 'EGY', 'Egypt', 'Africa', 'Northern Africa', 1001449.00, 1922, 68470000, 63.3, 82710.00, 75617.00, 'Misr', 'Republic', 'Hosni Mubarak', 608, 'EG'),
(65, 'ERI', 'Eritrea', 'Africa', 'Eastern Africa', 117600.00, 1993, 3850000, 55.8, 650.00, 755.00, 'Ertra', 'Republic', 'Isayas Afewerki [Isaias Afwerki]', 652, 'ER'),
(66, 'ESH', 'Western Sahara', 'Africa', 'Northern Africa', 266000.00, NULL, 293000, 49.8, 60.00, NULL, 'As-Sahrawiya', 'Occupied by Marocco', 'Mohammed Abdel Aziz', 2453, 'EH'),
(67, 'ESP', 'Spain', 'Europe', 'Southern Europe', 505992.00, 1492, 39441700, 78.8, 553233.00, 532031.00, 'EspaÃ±a', 'Constitutional Monarchy', 'Juan Carlos I', 653, 'ES'),
(68, 'EST', 'Estonia', 'Europe', 'Baltic Countries', 45227.00, 1991, 1439200, 69.5, 5328.00, 3371.00, 'Eesti', 'Republic', 'Lennart Meri', 3791, 'EE'),
(69, 'ETH', 'Ethiopia', 'Africa', 'Eastern Africa', 1104300.00, -1000, 62565000, 45.2, 6353.00, 6180.00, 'YeItyopÂ´iya', 'Republic', 'Negasso Gidada', 756, 'ET'),
(70, 'FIN', 'Finland', 'Europe', 'Nordic Countries', 338145.00, 1917, 5171300, 77.4, 121914.00, 119833.00, 'Suomi', 'Republic', 'Tarja Halonen', 3236, 'FI'),
(71, 'FJI', 'Fiji Islands', 'Oceania', 'Melanesia', 18274.00, 1970, 817000, 67.9, 1536.00, 2149.00, 'Fiji Islands', 'Republic', 'Josefa Iloilo', 764, 'FJ'),
(72, 'FLK', 'Falkland Islands', 'South America', 'South America', 12173.00, NULL, 2000, NULL, 0.00, NULL, 'Falkland Islands', 'Dependent Territory of the UK', 'Elisabeth II', 763, 'FK'),
(73, 'FRA', 'France', 'Europe', 'Western Europe', 551500.00, 843, 59225700, 78.8, 1424285.00, 1392448.00, 'France', 'Republic', 'Jacques Chirac', 2974, 'FR'),
(74, 'FRO', 'Faroe Islands', 'Europe', 'Nordic Countries', 1399.00, NULL, 43000, 78.4, 0.00, NULL, 'FÃ¸royar', 'Part of Denmark', 'Margrethe II', 901, 'FO'),
(75, 'FSM', 'Micronesia, Federated States of', 'Oceania', 'Micronesia', 702.00, 1990, 119000, 68.6, 212.00, NULL, 'Micronesia', 'Federal Republic', 'Leo A. Falcam', 2689, 'FM'),
(76, 'GAB', 'Gabon', 'Africa', 'Central Africa', 267668.00, 1960, 1226000, 50.1, 5493.00, 5279.00, 'Le Gabon', 'Republic', 'Omar Bongo', 902, 'GA'),
(77, 'GBR', 'United Kingdom', 'Europe', 'British Islands', 242900.00, 1066, 59623400, 77.7, 1378330.00, 1296830.00, 'United Kingdom', 'Constitutional Monarchy', 'Elisabeth II', 456, 'GB'),
(78, 'GEO', 'Georgia', 'Asia', 'Middle East', 69700.00, 1991, 4968000, 64.5, 6064.00, 5924.00, 'Sakartvelo', 'Republic', 'Eduard Å evardnadze', 905, 'GE'),
(79, 'GHA', 'Ghana', 'Africa', 'Western Africa', 238533.00, 1957, 20212000, 57.4, 7137.00, 6884.00, 'Ghana', 'Republic', 'John Kufuor', 910, 'GH'),
(80, 'GIB', 'Gibraltar', 'Europe', 'Southern Europe', 6.00, NULL, 25000, 79.0, 258.00, NULL, 'Gibraltar', 'Dependent Territory of the UK', 'Elisabeth II', 915, 'GI'),
(81, 'GIN', 'Guinea', 'Africa', 'Western Africa', 245857.00, 1958, 7430000, 45.6, 2352.00, 2383.00, 'GuinÃ©e', 'Republic', 'Lansana ContÃ©', 926, 'GN'),
(82, 'GLP', 'Guadeloupe', 'North America', 'Caribbean', 1705.00, NULL, 456000, 77.0, 3501.00, NULL, 'Guadeloupe', 'Overseas Department of France', 'Jacques Chirac', 919, 'GP'),
(83, 'GMB', 'Gambia', 'Africa', 'Western Africa', 11295.00, 1965, 1305000, 53.2, 320.00, 325.00, 'The Gambia', 'Republic', 'Yahya Jammeh', 904, 'GM'),
(84, 'GNB', 'Guinea-Bissau', 'Africa', 'Western Africa', 36125.00, 1974, 1213000, 49.0, 293.00, 272.00, 'GuinÃ©-Bissau', 'Republic', 'Kumba IalÃ¡', 927, 'GW'),
(85, 'GNQ', 'Equatorial Guinea', 'Africa', 'Central Africa', 28051.00, 1968, 453000, 53.6, 283.00, 542.00, 'Guinea Ecuatorial', 'Republic', 'Teodoro Obiang Nguema Mbasogo', 2972, 'GQ'),
(86, 'GRC', 'Greece', 'Europe', 'Southern Europe', 131626.00, 1830, 10545700, 78.4, 120724.00, 119946.00, 'EllÃ¡da', 'Republic', 'Kostis Stefanopoulos', 2401, 'GR'),
(87, 'GRD', 'Grenada', 'North America', 'Caribbean', 344.00, 1974, 94000, 64.5, 318.00, NULL, 'Grenada', 'Constitutional Monarchy', 'Elisabeth II', 916, 'GD'),
(88, 'GRL', 'Greenland', 'North America', 'North America', 2166090.00, NULL, 56000, 68.1, 0.00, NULL, 'Kalaallit Nunaat/GrÃ¸nland', 'Part of Denmark', 'Margrethe II', 917, 'GL'),
(89, 'GTM', 'Guatemala', 'North America', 'Central America', 108889.00, 1821, 11385000, 66.2, 19008.00, 17797.00, 'Guatemala', 'Republic', 'Alfonso Portillo Cabrera', 922, 'GT'),
(90, 'GUF', 'French Guiana', 'South America', 'South America', 90000.00, NULL, 181000, 76.1, 681.00, NULL, 'Guyane franÃ§aise', 'Overseas Department of France', 'Jacques Chirac', 3014, 'GF'),
(91, 'GUM', 'Guam', 'Oceania', 'Micronesia', 549.00, NULL, 168000, 77.8, 1197.00, 1136.00, 'Guam', 'US Territory', 'George W. Bush', 921, 'GU'),
(92, 'GUY', 'Guyana', 'South America', 'South America', 214969.00, 1966, 861000, 64.0, 722.00, 743.00, 'Guyana', 'Republic', 'Bharrat Jagdeo', 928, 'GY'),
(93, 'HKG', 'Hong Kong', 'Asia', 'Eastern Asia', 1075.00, NULL, 6782000, 79.5, 166448.00, 173610.00, 'Xianggang/Hong Kong', 'Special Administrative Region of China', 'Jiang Zemin', 937, 'HK'),
(94, 'HMD', 'Heard Island and McDonald Islands', 'Antarctica', 'Antarctica', 359.00, NULL, 0, NULL, 0.00, NULL, 'Heard and McDonald Islands', 'Territory of Australia', 'Elisabeth II', NULL, 'HM'),
(95, 'HND', 'Honduras', 'North America', 'Central America', 112088.00, 1838, 6485000, 69.9, 5333.00, 4697.00, 'Honduras', 'Republic', 'Carlos Roberto Flores FacussÃ©', 933, 'HN'),
(96, 'HRV', 'Croatia', 'Europe', 'Southern Europe', 56538.00, 1991, 4473000, 73.7, 20208.00, 19300.00, 'Hrvatska', 'Republic', 'Å tipe Mesic', 2409, 'HR'),
(97, 'HTI', 'Haiti', 'North America', 'Caribbean', 27750.00, 1804, 8222000, 49.2, 3459.00, 3107.00, 'HaÃ¯ti/Dayti', 'Republic', 'Jean-Bertrand Aristide', 929, 'HT'),
(98, 'HUN', 'Hungary', 'Europe', 'Eastern Europe', 93030.00, 1918, 10043200, 71.4, 48267.00, 45914.00, 'MagyarorszÃ¡g', 'Republic', 'Ferenc MÃ¡dl', 3483, 'HU'),
(99, 'IDN', 'Indonesia', 'Asia', 'Southeast Asia', 1904569.00, 1945, 212107000, 68.0, 84982.00, 215002.00, 'Indonesia', 'Republic', 'Abdurrahman Wahid', 939, 'ID'),
(100, 'IND', 'India', 'Asia', 'Southern and Central Asia', 3287263.00, 1947, 1013662000, 62.5, 447114.00, 430572.00, 'Bharat/India', 'Federal Republic', 'Kocheril Raman Narayanan', 1109, 'IN'),
(101, 'IOT', 'British Indian Ocean Territory', 'Africa', 'Eastern Africa', 78.00, NULL, 0, NULL, 0.00, NULL, 'British Indian Ocean Territory', 'Dependent Territory of the UK', 'Elisabeth II', NULL, 'IO'),
(102, 'IRL', 'Ireland', 'Europe', 'British Islands', 70273.00, 1921, 3775100, 76.8, 75921.00, 73132.00, 'Ireland/Ã‰ire', 'Republic', 'Mary McAleese', 1447, 'IE'),
(103, 'IRN', 'Iran', 'Asia', 'Southern and Central Asia', 1648195.00, 1906, 67702000, 69.7, 195746.00, 160151.00, 'Iran', 'Islamic Republic', 'Ali Mohammad Khatami-Ardakani', 1380, 'IR'),
(104, 'IRQ', 'Iraq', 'Asia', 'Middle East', 438317.00, 1932, 23115000, 66.5, 11500.00, NULL, 'Al-Â´Iraq', 'Republic', 'Saddam Hussein al-Takriti', 1365, 'IQ'),
(105, 'ISL', 'Iceland', 'Europe', 'Nordic Countries', 103000.00, 1944, 279000, 79.4, 8255.00, 7474.00, 'Ãsland', 'Republic', 'Ã“lafur Ragnar GrÃ­msson', 1449, 'IS'),
(106, 'ISR', 'Israel', 'Asia', 'Middle East', 21056.00, 1948, 6217000, 78.6, 97477.00, 98577.00, 'Yisraâ€™el/Israâ€™il', 'Republic', 'Moshe Katzav', 1450, 'IL'),
(107, 'ITA', 'Italy', 'Europe', 'Southern Europe', 301316.00, 1861, 57680000, 79.0, 1161755.00, 1145372.00, 'Italia', 'Republic', 'Carlo Azeglio Ciampi', 1464, 'IT'),
(108, 'JAM', 'Jamaica', 'North America', 'Caribbean', 10990.00, 1962, 2583000, 75.2, 6871.00, 6722.00, 'Jamaica', 'Constitutional Monarchy', 'Elisabeth II', 1530, 'JM'),
(109, 'JOR', 'Jordan', 'Asia', 'Middle East', 88946.00, 1946, 5083000, 77.4, 7526.00, 7051.00, 'Al-Urdunn', 'Constitutional Monarchy', 'Abdullah II', 1786, 'JO'),
(110, 'JPN', 'Japan', 'Asia', 'Eastern Asia', 377829.00, -660, 126714000, 80.7, 3787042.00, 4192638.00, 'Nihon/Nippon', 'Constitutional Monarchy', 'Akihito', 1532, 'JP'),
(111, 'KAZ', 'Kazakstan', 'Asia', 'Southern and Central Asia', 2724900.00, 1991, 16223000, 63.2, 24375.00, 23383.00, 'Qazaqstan', 'Republic', 'Nursultan Nazarbajev', 1864, 'KZ'),
(112, 'KEN', 'Kenya', 'Africa', 'Eastern Africa', 580367.00, 1963, 30080000, 48.0, 9217.00, 10241.00, 'Kenya', 'Republic', 'Daniel arap Moi', 1881, 'KE'),
(113, 'KGZ', 'Kyrgyzstan', 'Asia', 'Southern and Central Asia', 199900.00, 1991, 4699000, 63.4, 1626.00, 1767.00, 'Kyrgyzstan', 'Republic', 'Askar Akajev', 2253, 'KG'),
(114, 'KHM', 'Cambodia', 'Asia', 'Southeast Asia', 181035.00, 1953, 11168000, 56.5, 5121.00, 5670.00, 'KÃ¢mpuchÃ©a', 'Constitutional Monarchy', 'Norodom Sihanouk', 1800, 'KH'),
(115, 'KIR', 'Kiribati', 'Oceania', 'Micronesia', 726.00, 1979, 83000, 59.8, 40.70, NULL, 'Kiribati', 'Republic', 'Teburoro Tito', 2256, 'KI'),
(116, 'KNA', 'Saint Kitts and Nevis', 'North America', 'Caribbean', 261.00, 1983, 38000, 70.7, 299.00, NULL, 'Saint Kitts and Nevis', 'Constitutional Monarchy', 'Elisabeth II', 3064, 'KN'),
(117, 'KOR', 'South Korea', 'Asia', 'Eastern Asia', 99434.00, 1948, 46844000, 74.4, 320749.00, 442544.00, 'Taehan Minâ€™guk (Namhan)', 'Republic', 'Kim Dae-jung', 2331, 'KR'),
(118, 'KWT', 'Kuwait', 'Asia', 'Middle East', 17818.00, 1961, 1972000, 76.1, 27037.00, 30373.00, 'Al-Kuwayt', 'Constitutional Monarchy (Emirate)', 'Jabir al-Ahmad al-Jabir al-Sabah', 2429, 'KW'),
(119, 'LAO', 'Laos', 'Asia', 'Southeast Asia', 236800.00, 1953, 5433000, 53.1, 1292.00, 1746.00, 'Lao', 'Republic', 'Khamtay Siphandone', 2432, 'LA'),
(120, 'LBN', 'Lebanon', 'Asia', 'Middle East', 10400.00, 1941, 3282000, 71.3, 17121.00, 15129.00, 'Lubnan', 'Republic', 'Ã‰mile Lahoud', 2438, 'LB'),
(121, 'LBR', 'Liberia', 'Africa', 'Western Africa', 111369.00, 1847, 3154000, 51.0, 2012.00, NULL, 'Liberia', 'Republic', 'Charles Taylor', 2440, 'LR'),
(122, 'LBY', 'Libyan Arab Jamahiriya', 'Africa', 'Northern Africa', 1759540.00, 1951, 5605000, 75.5, 44806.00, 40562.00, 'Libiya', 'Socialistic State', 'Muammar al-Qadhafi', 2441, 'LY'),
(123, 'LCA', 'Saint Lucia', 'North America', 'Caribbean', 622.00, 1979, 154000, 72.3, 571.00, NULL, 'Saint Lucia', 'Constitutional Monarchy', 'Elisabeth II', 3065, 'LC'),
(124, 'LIE', 'Liechtenstein', 'Europe', 'Western Europe', 160.00, 1806, 32300, 78.8, 1119.00, 1084.00, 'Liechtenstein', 'Constitutional Monarchy', 'Hans-Adam II', 2446, 'LI'),
(125, 'LKA', 'Sri Lanka', 'Asia', 'Southern and Central Asia', 65610.00, 1948, 18827000, 71.8, 15706.00, 15091.00, 'Sri Lanka/Ilankai', 'Republic', 'Chandrika Kumaratunga', 3217, 'LK'),
(126, 'LSO', 'Lesotho', 'Africa', 'Southern Africa', 30355.00, 1966, 2153000, 50.8, 1061.00, 1161.00, 'Lesotho', 'Constitutional Monarchy', 'Letsie III', 2437, 'LS'),
(127, 'LTU', 'Lithuania', 'Europe', 'Baltic Countries', 65301.00, 1991, 3698500, 69.1, 10692.00, 9585.00, 'Lietuva', 'Republic', 'Valdas Adamkus', 2447, 'LT'),
(128, 'LUX', 'Luxembourg', 'Europe', 'Western Europe', 2586.00, 1867, 435700, 77.1, 16321.00, 15519.00, 'Luxembourg/LÃ«tzebuerg', 'Constitutional Monarchy', 'Henri', 2452, 'LU'),
(129, 'LVA', 'Latvia', 'Europe', 'Baltic Countries', 64589.00, 1991, 2424200, 68.4, 6398.00, 5639.00, 'Latvija', 'Republic', 'Vaira Vike-Freiberga', 2434, 'LV'),
(130, 'MAC', 'Macao', 'Asia', 'Eastern Asia', 18.00, NULL, 473000, 81.6, 5749.00, 5940.00, 'Macau/Aomen', 'Special Administrative Region of China', 'Jiang Zemin', 2454, 'MO'),
(131, 'MAR', 'Morocco', 'Africa', 'Northern Africa', 446550.00, 1956, 28351000, 69.1, 36124.00, 33514.00, 'Al-Maghrib', 'Constitutional Monarchy', 'Mohammed VI', 2486, 'MA'),
(132, 'MCO', 'Monaco', 'Europe', 'Western Europe', 1.50, 1861, 34000, 78.8, 776.00, NULL, 'Monaco', 'Constitutional Monarchy', 'Rainier III', 2695, 'MC'),
(133, 'MDA', 'Moldova', 'Europe', 'Eastern Europe', 33851.00, 1991, 4380000, 64.5, 1579.00, 1872.00, 'Moldova', 'Republic', 'Vladimir Voronin', 2690, 'MD'),
(134, 'MDG', 'Madagascar', 'Africa', 'Eastern Africa', 587041.00, 1960, 15942000, 55.0, 3750.00, 3545.00, 'Madagasikara/Madagascar', 'Federal Republic', 'Didier Ratsiraka', 2455, 'MG'),
(135, 'MDV', 'Maldives', 'Asia', 'Southern and Central Asia', 298.00, 1965, 286000, 62.2, 199.00, NULL, 'Dhivehi Raajje/Maldives', 'Republic', 'Maumoon Abdul Gayoom', 2463, 'MV'),
(136, 'MEX', 'Mexico', 'North America', 'Central America', 1958201.00, 1810, 98881000, 71.5, 414972.00, 401461.00, 'MÃ©xico', 'Federal Republic', 'Vicente Fox Quesada', 2515, 'MX'),
(137, 'MHL', 'Marshall Islands', 'Oceania', 'Micronesia', 181.00, 1990, 64000, 65.5, 97.00, NULL, 'Marshall Islands/Majol', 'Republic', 'Kessai Note', 2507, 'MH'),
(138, 'MKD', 'Macedonia', 'Europe', 'Southern Europe', 25713.00, 1991, 2024000, 73.8, 1694.00, 1915.00, 'Makedonija', 'Republic', 'Boris Trajkovski', 2460, 'MK'),
(139, 'MLI', 'Mali', 'Africa', 'Western Africa', 1240192.00, 1960, 11234000, 46.7, 2642.00, 2453.00, 'Mali', 'Republic', 'Alpha Oumar KonarÃ©', 2482, 'ML'),
(140, 'MLT', 'Malta', 'Europe', 'Southern Europe', 316.00, 1964, 380200, 77.9, 3512.00, 3338.00, 'Malta', 'Republic', 'Guido de Marco', 2484, 'MT'),
(141, 'MMR', 'Myanmar', 'Asia', 'Southeast Asia', 676578.00, 1948, 45611000, 54.9, 180375.00, 171028.00, 'Myanma Pye', 'Republic', 'kenraali Than Shwe', 2710, 'MM'),
(142, 'MNG', 'Mongolia', 'Asia', 'Eastern Asia', 1566500.00, 1921, 2662000, 67.3, 1043.00, 933.00, 'Mongol Uls', 'Republic', 'Natsagiin Bagabandi', 2696, 'MN'),
(143, 'MNP', 'Northern Mariana Islands', 'Oceania', 'Micronesia', 464.00, NULL, 78000, 75.5, 0.00, NULL, 'Northern Mariana Islands', 'Commonwealth of the US', 'George W. Bush', 2913, 'MP'),
(144, 'MOZ', 'Mozambique', 'Africa', 'Eastern Africa', 801590.00, 1975, 19680000, 37.5, 2891.00, 2711.00, 'MoÃ§ambique', 'Republic', 'JoaquÃ­m A. Chissano', 2698, 'MZ'),
(145, 'MRT', 'Mauritania', 'Africa', 'Western Africa', 1025520.00, 1960, 2670000, 50.8, 998.00, 1081.00, 'Muritaniya/Mauritanie', 'Republic', 'Maaouiya Ould SidÂ´Ahmad Taya', 2509, 'MR'),
(146, 'MSR', 'Montserrat', 'North America', 'Caribbean', 102.00, NULL, 11000, 78.0, 109.00, NULL, 'Montserrat', 'Dependent Territory of the UK', 'Elisabeth II', 2697, 'MS'),
(147, 'MTQ', 'Martinique', 'North America', 'Caribbean', 1102.00, NULL, 395000, 78.3, 2731.00, 2559.00, 'Martinique', 'Overseas Department of France', 'Jacques Chirac', 2508, 'MQ'),
(148, 'MUS', 'Mauritius', 'Africa', 'Eastern Africa', 2040.00, 1968, 1158000, 71.0, 4251.00, 4186.00, 'Mauritius', 'Republic', 'Cassam Uteem', 2511, 'MU'),
(149, 'MWI', 'Malawi', 'Africa', 'Eastern Africa', 118484.00, 1964, 10925000, 37.6, 1687.00, 2527.00, 'Malawi', 'Republic', 'Bakili Muluzi', 2462, 'MW'),
(150, 'MYS', 'Malaysia', 'Asia', 'Southeast Asia', 329758.00, 1957, 22244000, 70.8, 69213.00, 97884.00, 'Malaysia', 'Constitutional Monarchy, Federation', 'Salahuddin Abdul Aziz Shah Alhaj', 2464, 'MY'),
(151, 'MYT', 'Mayotte', 'Africa', 'Eastern Africa', 373.00, NULL, 149000, 59.5, 0.00, NULL, 'Mayotte', 'Territorial Collectivity of France', 'Jacques Chirac', 2514, 'YT'),
(152, 'NAM', 'Namibia', 'Africa', 'Southern Africa', 824292.00, 1990, 1726000, 42.5, 3101.00, 3384.00, 'Namibia', 'Republic', 'Sam Nujoma', 2726, 'NA'),
(153, 'NCL', 'New Caledonia', 'Oceania', 'Melanesia', 18575.00, NULL, 214000, 72.8, 3563.00, NULL, 'Nouvelle-CalÃ©donie', 'Nonmetropolitan Territory of France', 'Jacques Chirac', 3493, 'NC'),
(154, 'NER', 'Niger', 'Africa', 'Western Africa', 1267000.00, 1960, 10730000, 41.3, 1706.00, 1580.00, 'Niger', 'Republic', 'Mamadou Tandja', 2738, 'NE'),
(155, 'NFK', 'Norfolk Island', 'Oceania', 'Australia and New Zealand', 36.00, NULL, 2000, NULL, 0.00, NULL, 'Norfolk Island', 'Territory of Australia', 'Elisabeth II', 2806, 'NF'),
(156, 'NGA', 'Nigeria', 'Africa', 'Western Africa', 923768.00, 1960, 111506000, 51.6, 65707.00, 58623.00, 'Nigeria', 'Federal Republic', 'Olusegun Obasanjo', 2754, 'NG'),
(157, 'NIC', 'Nicaragua', 'North America', 'Central America', 130000.00, 1838, 5074000, 68.7, 1988.00, 2023.00, 'Nicaragua', 'Republic', 'Arnoldo AlemÃ¡n Lacayo', 2734, 'NI'),
(158, 'NIU', 'Niue', 'Oceania', 'Polynesia', 260.00, NULL, 2000, NULL, 0.00, NULL, 'Niue', 'Nonmetropolitan Territory of New Zealand', 'Elisabeth II', 2805, 'NU'),
(159, 'NLD', 'Netherlands', 'Europe', 'Western Europe', 41526.00, 1581, 15864000, 78.3, 371362.00, 360478.00, 'Nederland', 'Constitutional Monarchy', 'Beatrix', 5, 'NL'),
(160, 'NOR', 'Norway', 'Europe', 'Nordic Countries', 323877.00, 1905, 4478500, 78.7, 145895.00, 153370.00, 'Norge', 'Constitutional Monarchy', 'Harald V', 2807, 'NO'),
(161, 'NPL', 'Nepal', 'Asia', 'Southern and Central Asia', 147181.00, 1769, 23930000, 57.8, 4768.00, 4837.00, 'Nepal', 'Constitutional Monarchy', 'Gyanendra Bir Bikram', 2729, 'NP'),
(162, 'NRU', 'Nauru', 'Oceania', 'Micronesia', 21.00, 1968, 12000, 60.8, 197.00, NULL, 'Naoero/Nauru', 'Republic', 'Bernard Dowiyogo', 2728, 'NR'),
(163, 'NZL', 'New Zealand', 'Oceania', 'Australia and New Zealand', 270534.00, 1907, 3862000, 77.8, 54669.00, 64960.00, 'New Zealand/Aotearoa', 'Constitutional Monarchy', 'Elisabeth II', 3499, 'NZ'),
(164, 'OMN', 'Oman', 'Asia', 'Middle East', 309500.00, 1951, 2542000, 71.8, 16904.00, 16153.00, 'Â´Uman', 'Monarchy (Sultanate)', 'Qabus ibn SaÂ´id', 2821, 'OM'),
(165, 'PAK', 'Pakistan', 'Asia', 'Southern and Central Asia', 796095.00, 1947, 156483000, 61.1, 61289.00, 58549.00, 'Pakistan', 'Republic', 'Mohammad Rafiq Tarar', 2831, 'PK'),
(166, 'PAN', 'Panama', 'North America', 'Central America', 75517.00, 1903, 2856000, 75.5, 9131.00, 8700.00, 'PanamÃ¡', 'Republic', 'Mireya Elisa Moscoso RodrÃ­guez', 2882, 'PA'),
(167, 'PCN', 'Pitcairn', 'Oceania', 'Polynesia', 49.00, NULL, 50, NULL, 0.00, NULL, 'Pitcairn', 'Dependent Territory of the UK', 'Elisabeth II', 2912, 'PN'),
(168, 'PER', 'Peru', 'South America', 'South America', 1285216.00, 1821, 25662000, 70.0, 64140.00, 65186.00, 'PerÃº/Piruw', 'Republic', 'Valentin Paniagua Corazao', 2890, 'PE'),
(169, 'PHL', 'Philippines', 'Asia', 'Southeast Asia', 300000.00, 1946, 75967000, 67.5, 65107.00, 82239.00, 'Pilipinas', 'Republic', 'Gloria Macapagal-Arroyo', 766, 'PH'),
(170, 'PLW', 'Palau', 'Oceania', 'Micronesia', 459.00, 1994, 19000, 68.6, 105.00, NULL, 'Belau/Palau', 'Republic', 'Kuniwo Nakamura', 2881, 'PW'),
(171, 'PNG', 'Papua New Guinea', 'Oceania', 'Melanesia', 462840.00, 1975, 4807000, 63.1, 4988.00, 6328.00, 'Papua New Guinea/Papua Niugini', 'Constitutional Monarchy', 'Elisabeth II', 2884, 'PG'),
(172, 'POL', 'Poland', 'Europe', 'Eastern Europe', 323250.00, 1918, 38653600, 73.2, 151697.00, 135636.00, 'Polska', 'Republic', 'Aleksander Kwasniewski', 2928, 'PL'),
(173, 'PRI', 'Puerto Rico', 'North America', 'Caribbean', 8875.00, NULL, 3869000, 75.6, 34100.00, 32100.00, 'Puerto Rico', 'Commonwealth of the US', 'George W. Bush', 2919, 'PR'),
(174, 'PRK', 'North Korea', 'Asia', 'Eastern Asia', 120538.00, 1948, 24039000, 70.7, 5332.00, NULL, 'Choson Minjujuui InÂ´min Konghwaguk (Bukhan)', 'Socialistic Republic', 'Kim Jong-il', 2318, 'KP'),
(175, 'PRT', 'Portugal', 'Europe', 'Southern Europe', 91982.00, 1143, 9997600, 75.8, 105954.00, 102133.00, 'Portugal', 'Republic', 'Jorge SampÃ£io', 2914, 'PT'),
(176, 'PRY', 'Paraguay', 'South America', 'South America', 406752.00, 1811, 5496000, 73.7, 8444.00, 9555.00, 'Paraguay', 'Republic', 'Luis Ãngel GonzÃ¡lez Macchi', 2885, 'PY'),
(177, 'PSE', 'Palestine', 'Asia', 'Middle East', 6257.00, NULL, 3101000, 71.4, 4173.00, NULL, 'Filastin', 'Autonomous Area', 'Yasser (Yasir) Arafat', 4074, 'PS'),
(178, 'PYF', 'French Polynesia', 'Oceania', 'Polynesia', 4000.00, NULL, 235000, 74.8, 818.00, 781.00, 'PolynÃ©sie franÃ§aise', 'Nonmetropolitan Territory of France', 'Jacques Chirac', 3016, 'PF'),
(179, 'QAT', 'Qatar', 'Asia', 'Middle East', 11000.00, 1971, 599000, 72.4, 9472.00, 8920.00, 'Qatar', 'Monarchy', 'Hamad ibn Khalifa al-Thani', 2973, 'QA'),
(180, 'REU', 'RÃ©union', 'Africa', 'Eastern Africa', 2510.00, NULL, 699000, 72.7, 8287.00, 7988.00, 'RÃ©union', 'Overseas Department of France', 'Jacques Chirac', 3017, 'RE'),
(181, 'ROM', 'Romania', 'Europe', 'Eastern Europe', 238391.00, 1878, 22455500, 69.9, 38158.00, 34843.00, 'RomÃ¢nia', 'Republic', 'Ion Iliescu', 3018, 'RO'),
(182, 'RUS', 'Russian Federation', 'Europe', 'Eastern Europe', 17075400.00, 1991, 146934000, 67.2, 276608.00, 442989.00, 'Rossija', 'Federal Republic', 'Vladimir Putin', 3580, 'RU'),
(183, 'RWA', 'Rwanda', 'Africa', 'Eastern Africa', 26338.00, 1962, 7733000, 39.3, 2036.00, 1863.00, 'Rwanda/Urwanda', 'Republic', 'Paul Kagame', 3047, 'RW'),
(184, 'SAU', 'Saudi Arabia', 'Asia', 'Middle East', 2149690.00, 1932, 21607000, 67.8, 137635.00, 146171.00, 'Al-Â´Arabiya as-SaÂ´udiya', 'Monarchy', 'Fahd ibn Abdul-Aziz al-SaÂ´ud', 3173, 'SA'),
(185, 'SDN', 'Sudan', 'Africa', 'Northern Africa', 2505813.00, 1956, 29490000, 56.6, 10162.00, NULL, 'As-Sudan', 'Islamic Republic', 'Omar Hassan Ahmad al-Bashir', 3225, 'SD'),
(186, 'SEN', 'Senegal', 'Africa', 'Western Africa', 196722.00, 1960, 9481000, 62.2, 4787.00, 4542.00, 'SÃ©nÃ©gal/Sounougal', 'Republic', 'Abdoulaye Wade', 3198, 'SN'),
(187, 'SGP', 'Singapore', 'Asia', 'Southeast Asia', 618.00, 1965, 3567000, 80.1, 86503.00, 96318.00, 'Singapore/Singapura/Xinjiapo/Singapur', 'Republic', 'Sellapan Rama Nathan', 3208, 'SG'),
(188, 'SGS', 'South Georgia and the South Sandwich Islands', 'Antarctica', 'Antarctica', 3903.00, NULL, 0, NULL, 0.00, NULL, 'South Georgia and the South Sandwich Islands', 'Dependent Territory of the UK', 'Elisabeth II', NULL, 'GS'),
(189, 'SHN', 'Saint Helena', 'Africa', 'Western Africa', 314.00, NULL, 6000, 76.8, 0.00, NULL, 'Saint Helena', 'Dependent Territory of the UK', 'Elisabeth II', 3063, 'SH'),
(190, 'SJM', 'Svalbard and Jan Mayen', 'Europe', 'Nordic Countries', 62422.00, NULL, 3200, NULL, 0.00, NULL, 'Svalbard og Jan Mayen', 'Dependent Territory of Norway', 'Harald V', 938, 'SJ'),
(191, 'SLB', 'Solomon Islands', 'Oceania', 'Melanesia', 28896.00, 1978, 444000, 71.3, 182.00, 220.00, 'Solomon Islands', 'Constitutional Monarchy', 'Elisabeth II', 3161, 'SB'),
(192, 'SLE', 'Sierra Leone', 'Africa', 'Western Africa', 71740.00, 1961, 4854000, 45.3, 746.00, 858.00, 'Sierra Leone', 'Republic', 'Ahmed Tejan Kabbah', 3207, 'SL'),
(193, 'SLV', 'El Salvador', 'North America', 'Central America', 21041.00, 1841, 6276000, 69.7, 11863.00, 11203.00, 'El Salvador', 'Republic', 'Francisco Guillermo Flores PÃ©rez', 645, 'SV'),
(194, 'SMR', 'San Marino', 'Europe', 'Southern Europe', 61.00, 885, 27000, 81.1, 510.00, NULL, 'San Marino', 'Republic', NULL, 3171, 'SM'),
(195, 'SOM', 'Somalia', 'Africa', 'Eastern Africa', 637657.00, 1960, 10097000, 46.2, 935.00, NULL, 'Soomaaliya', 'Republic', 'Abdiqassim Salad Hassan', 3214, 'SO'),
(196, 'SPM', 'Saint Pierre and Miquelon', 'North America', 'North America', 242.00, NULL, 7000, 77.6, 0.00, NULL, 'Saint-Pierre-et-Miquelon', 'Territorial Collectivity of France', 'Jacques Chirac', 3067, 'PM'),
(197, 'STP', 'Sao Tome and Principe', 'Africa', 'Central Africa', 964.00, 1975, 147000, 65.3, 6.00, NULL, 'SÃ£o TomÃ© e PrÃ­ncipe', 'Republic', 'Miguel Trovoada', 3172, 'ST'),
(198, 'SUR', 'Suriname', 'South America', 'South America', 163265.00, 1975, 417000, 71.4, 870.00, 706.00, 'Suriname', 'Republic', 'Ronald Venetiaan', 3243, 'SR'),
(199, 'SVK', 'Slovakia', 'Europe', 'Eastern Europe', 49012.00, 1993, 5398700, 73.7, 20594.00, 19452.00, 'Slovensko', 'Republic', 'Rudolf Schuster', 3209, 'SK'),
(200, 'SVN', 'Slovenia', 'Europe', 'Southern Europe', 20256.00, 1991, 1987800, 74.9, 19756.00, 18202.00, 'Slovenija', 'Republic', 'Milan Kucan', 3212, 'SI'),
(201, 'SWE', 'Sweden', 'Europe', 'Nordic Countries', 449964.00, 836, 8861400, 79.6, 226492.00, 227757.00, 'Sverige', 'Constitutional Monarchy', 'Carl XVI Gustaf', 3048, 'SE'),
(202, 'SWZ', 'Swaziland', 'Africa', 'Southern Africa', 17364.00, 1968, 1008000, 40.4, 1206.00, 1312.00, 'kaNgwane', 'Monarchy', 'Mswati III', 3244, 'SZ'),
(203, 'SYC', 'Seychelles', 'Africa', 'Eastern Africa', 455.00, 1976, 77000, 70.4, 536.00, 539.00, 'Sesel/Seychelles', 'Republic', 'France-Albert RenÃ©', 3206, 'SC'),
(204, 'SYR', 'Syria', 'Asia', 'Middle East', 185180.00, 1941, 16125000, 68.5, 65984.00, 64926.00, 'Suriya', 'Republic', 'Bashar al-Assad', 3250, 'SY'),
(205, 'TCA', 'Turks and Caicos Islands', 'North America', 'Caribbean', 430.00, NULL, 17000, 73.3, 96.00, NULL, 'The Turks and Caicos Islands', 'Dependent Territory of the UK', 'Elisabeth II', 3423, 'TC'),
(206, 'TCD', 'Chad', 'Africa', 'Central Africa', 1284000.00, 1960, 7651000, 50.5, 1208.00, 1102.00, 'Tchad/Tshad', 'Republic', 'Idriss DÃ©by', 3337, 'TD'),
(207, 'TGO', 'Togo', 'Africa', 'Western Africa', 56785.00, 1960, 4629000, 54.7, 1449.00, 1400.00, 'Togo', 'Republic', 'GnassingbÃ© EyadÃ©ma', 3332, 'TG'),
(208, 'THA', 'Thailand', 'Asia', 'Southeast Asia', 513115.00, 1350, 61399000, 68.6, 116416.00, 153907.00, 'Prathet Thai', 'Constitutional Monarchy', 'Bhumibol Adulyadej', 3320, 'TH'),
(209, 'TJK', 'Tajikistan', 'Asia', 'Southern and Central Asia', 143100.00, 1991, 6188000, 64.1, 1990.00, 1056.00, 'ToÃ§ikiston', 'Republic', 'Emomali Rahmonov', 3261, 'TJ'),
(210, 'TKL', 'Tokelau', 'Oceania', 'Polynesia', 12.00, NULL, 2000, NULL, 0.00, NULL, 'Tokelau', 'Nonmetropolitan Territory of New Zealand', 'Elisabeth II', 3333, 'TK'),
(211, 'TKM', 'Turkmenistan', 'Asia', 'Southern and Central Asia', 488100.00, 1991, 4459000, 60.9, 4397.00, 2000.00, 'TÃ¼rkmenostan', 'Republic', 'Saparmurad Nijazov', 3419, 'TM'),
(212, 'TMP', 'East Timor', 'Asia', 'Southeast Asia', 14874.00, NULL, 885000, 46.0, 0.00, NULL, 'Timor Timur', 'Administrated by the UN', 'JosÃ© Alexandre GusmÃ£o', 1522, 'TP'),
(213, 'TON', 'Tonga', 'Oceania', 'Polynesia', 650.00, 1970, 99000, 67.9, 146.00, 170.00, 'Tonga', 'Monarchy', 'Taufa''ahau Tupou IV', 3334, 'TO'),
(214, 'TTO', 'Trinidad and Tobago', 'North America', 'Caribbean', 5130.00, 1962, 1295000, 68.0, 6232.00, 5867.00, 'Trinidad and Tobago', 'Republic', 'Arthur N. R. Robinson', 3336, 'TT'),
(215, 'TUN', 'Tunisia', 'Africa', 'Northern Africa', 163610.00, 1956, 9586000, 73.7, 20026.00, 18898.00, 'Tunis/Tunisie', 'Republic', 'Zine al-Abidine Ben Ali', 3349, 'TN'),
(216, 'TUR', 'Turkey', 'Asia', 'Middle East', 774815.00, 1923, 66591000, 71.0, 210721.00, 189122.00, 'TÃ¼rkiye', 'Republic', 'Ahmet Necdet Sezer', 3358, 'TR'),
(217, 'TUV', 'Tuvalu', 'Oceania', 'Polynesia', 26.00, 1978, 12000, 66.3, 6.00, NULL, 'Tuvalu', 'Constitutional Monarchy', 'Elisabeth II', 3424, 'TV'),
(218, 'TWN', 'Taiwan', 'Asia', 'Eastern Asia', 36188.00, 1945, 22256000, 76.4, 256254.00, 263451.00, 'Tâ€™ai-wan', 'Republic', 'Chen Shui-bian', 3263, 'TW'),
(219, 'TZA', 'Tanzania', 'Africa', 'Eastern Africa', 883749.00, 1961, 33517000, 52.3, 8005.00, 7388.00, 'Tanzania', 'Republic', 'Benjamin William Mkapa', 3306, 'TZ'),
(220, 'UGA', 'Uganda', 'Africa', 'Eastern Africa', 241038.00, 1962, 21778000, 42.9, 6313.00, 6887.00, 'Uganda', 'Republic', 'Yoweri Museveni', 3425, 'UG'),
(221, 'UKR', 'Ukraine', 'Europe', 'Eastern Europe', 603700.00, 1991, 50456000, 66.0, 42168.00, 49677.00, 'Ukrajina', 'Republic', 'Leonid KutÅ¡ma', 3426, 'UA'),
(222, 'UMI', 'United States Minor Outlying Islands', 'Oceania', 'Micronesia/Caribbean', 16.00, NULL, 0, NULL, 0.00, NULL, 'United States Minor Outlying Islands', 'Dependent Territory of the US', 'George W. Bush', NULL, 'UM'),
(223, 'URY', 'Uruguay', 'South America', 'South America', 175016.00, 1828, 3337000, 75.2, 20831.00, 19967.00, 'Uruguay', 'Republic', 'Jorge Batlle IbÃ¡Ã±ez', 3492, 'UY'),
(224, 'USA', 'United States', 'North America', 'North America', 9363520.00, 1776, 278357000, 77.1, 8510700.00, 8110900.00, 'United States', 'Federal Republic', 'George W. Bush', 3813, 'US'),
(225, 'UZB', 'Uzbekistan', 'Asia', 'Southern and Central Asia', 447400.00, 1991, 24318000, 63.7, 14194.00, 21300.00, 'Uzbekiston', 'Republic', 'Islam Karimov', 3503, 'UZ'),
(226, 'VAT', 'Holy See (Vatican City State)', 'Europe', 'Southern Europe', 0.40, 1929, 1000, NULL, 9.00, NULL, 'Santa Sede/CittÃ  del Vaticano', 'Independent Church State', 'Johannes Paavali II', 3538, 'VA'),
(227, 'VCT', 'Saint Vincent and the Grenadines', 'North America', 'Caribbean', 388.00, 1979, 114000, 72.3, 285.00, NULL, 'Saint Vincent and the Grenadines', 'Constitutional Monarchy', 'Elisabeth II', 3066, 'VC'),
(228, 'VEN', 'Venezuela', 'South America', 'South America', 912050.00, 1811, 24170000, 73.1, 95023.00, 88434.00, 'Venezuela', 'Federal Republic', 'Hugo ChÃ¡vez FrÃ­as', 3539, 'VE'),
(229, 'VGB', 'Virgin Islands, British', 'North America', 'Caribbean', 151.00, NULL, 21000, 75.4, 612.00, 573.00, 'British Virgin Islands', 'Dependent Territory of the UK', 'Elisabeth II', 537, 'VG'),
(230, 'VIR', 'Virgin Islands, U.S.', 'North America', 'Caribbean', 347.00, NULL, 93000, 78.1, 0.00, NULL, 'Virgin Islands of the United States', 'US Territory', 'George W. Bush', 4067, 'VI'),
(231, 'VNM', 'Vietnam', 'Asia', 'Southeast Asia', 331689.00, 1945, 79832000, 69.3, 21929.00, 22834.00, 'ViÃªt Nam', 'Socialistic Republic', 'TrÃ¢n Duc Luong', 3770, 'VN'),
(232, 'VUT', 'Vanuatu', 'Oceania', 'Melanesia', 12189.00, 1980, 190000, 60.6, 261.00, 246.00, 'Vanuatu', 'Republic', 'John Bani', 3537, 'VU'),
(233, 'WLF', 'Wallis and Futuna', 'Oceania', 'Polynesia', 200.00, NULL, 15000, NULL, 0.00, NULL, 'Wallis-et-Futuna', 'Nonmetropolitan Territory of France', 'Jacques Chirac', 3536, 'WF'),
(234, 'WSM', 'Samoa', 'Oceania', 'Polynesia', 2831.00, 1962, 180000, 69.2, 141.00, 157.00, 'Samoa', 'Parlementary Monarchy', 'Malietoa Tanumafili II', 3169, 'WS'),
(235, 'YEM', 'Yemen', 'Asia', 'Middle East', 527968.00, 1918, 18112000, 59.8, 6041.00, 5729.00, 'Al-Yaman', 'Republic', 'Ali Abdallah Salih', 1780, 'YE'),
(236, 'YUG', 'Yugoslavia', 'Europe', 'Southern Europe', 102173.00, 1918, 10640000, 72.4, 17000.00, NULL, 'Jugoslavija', 'Federal Republic', 'Vojislav KoÅ¡tunica', 1792, 'YU'),
(237, 'ZAF', 'South Africa', 'Africa', 'Southern Africa', 1221037.00, 1910, 40377000, 51.1, 116729.00, 129092.00, 'South Africa', 'Republic', 'Thabo Mbeki', 716, 'ZA'),
(238, 'ZMB', 'Zambia', 'Africa', 'Eastern Africa', 752618.00, 1964, 9169000, 37.2, 3377.00, 3922.00, 'Zambia', 'Republic', 'Frederick Chiluba', 3162, 'ZM'),
(239, 'ZWE', 'Zimbabwe', 'Africa', 'Eastern Africa', 390757.00, 1980, 11669000, 37.8, 5951.00, 8670.00, 'Zimbabwe', 'Republic', 'Robert G. Mugabe', 4068, 'ZW'),
(240, 'NON', 'None Selected', 'South America', 'None', 0.00, 1980, 11669000, 37.8, 5951.00, 8670.00, 'Zimbabwe', 'Republic', 'Robert G. Mugabe', 4068, 'ZW');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE IF NOT EXISTS `districts` (
  `id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `division_id` int(2) unsigned DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `bn_name` varchar(50) DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lon` double DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `division_id` (`division_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `name`, `bn_name`, `lat`, `lon`, `website`) VALUES
(1, 3, 'Dhaka', 'ঢাকা', 23.7115253, 90.4111451, 'www.dhaka.gov.bd'),
(2, 3, 'Faridpur', 'ফরিদপুর', 23.6070822, 89.8429406, 'www.faridpur.gov.bd'),
(3, 3, 'Gazipur', 'গাজীপুর', 24.0022858, 90.4264283, 'www.gazipur.gov.bd'),
(4, 3, 'Gopalganj', 'গোপালগঞ্জ', 23.0050857, 89.8266059, 'www.gopalganj.gov.bd'),
(5, 3, 'Jamalpur', 'জামালপুর', 24.937533, 89.937775, 'www.jamalpur.gov.bd'),
(6, 3, 'Kishoreganj', 'কিশোরগঞ্জ', 24.444937, 90.776575, 'www.kishoreganj.gov.bd'),
(7, 3, 'Madaripur', 'মাদারীপুর', 23.164102, 90.1896805, 'www.madaripur.gov.bd'),
(8, 3, 'Manikganj', 'মানিকগঞ্জ', 0, 0, 'www.manikganj.gov.bd'),
(9, 3, 'Munshiganj', 'মুন্সিগঞ্জ', 0, 0, 'www.munshiganj.gov.bd'),
(10, 3, 'Mymensingh', 'ময়মনসিং', 0, 0, 'www.mymensingh.gov.bd'),
(11, 3, 'Narayanganj', 'নারায়াণগঞ্জ', 23.63366, 90.496482, 'www.narayanganj.gov.bd'),
(12, 3, 'Narsingdi', 'নরসিংদী', 23.932233, 90.71541, 'www.narsingdi.gov.bd'),
(13, 3, 'Netrokona', 'নেত্রকোনা', 24.870955, 90.727887, 'www.netrokona.gov.bd'),
(14, 3, 'Rajbari', 'রাজবাড়ি', 23.7574305, 89.6444665, 'www.rajbari.gov.bd'),
(15, 3, 'Shariatpur', 'শরীয়তপুর', 0, 0, 'www.shariatpur.gov.bd'),
(16, 3, 'Sherpur', 'শেরপুর', 25.0204933, 90.0152966, 'www.sherpur.gov.bd'),
(17, 3, 'Tangail', 'টাঙ্গাইল', 0, 0, 'www.tangail.gov.bd'),
(18, 5, 'Bogra', 'বগুড়া', 24.8465228, 89.377755, 'www.bogra.gov.bd'),
(19, 5, 'Joypurhat', 'জয়পুরহাট', 0, 0, 'www.joypurhat.gov.bd'),
(20, 5, 'Naogaon', 'নওগাঁ', 0, 0, 'www.naogaon.gov.bd'),
(21, 5, 'Natore', 'নাটোর', 24.420556, 89.000282, 'www.natore.gov.bd'),
(22, 5, 'Nawabganj', 'নবাবগঞ্জ', 24.5965034, 88.2775122, 'www.chapainawabganj.gov.bd'),
(23, 5, 'Pabna', 'পাবনা', 23.998524, 89.233645, 'www.pabna.gov.bd'),
(24, 5, 'Rajshahi', 'রাজশাহী', 0, 0, 'www.rajshahi.gov.bd'),
(25, 5, 'Sirajgonj', 'সিরাজগঞ্জ', 24.4533978, 89.7006815, 'www.sirajganj.gov.bd'),
(26, 6, 'Dinajpur', 'দিনাজপুর', 25.6217061, 88.6354504, 'www.dinajpur.gov.bd'),
(27, 6, 'Gaibandha', 'গাইবান্ধা', 25.328751, 89.528088, 'www.gaibandha.gov.bd'),
(28, 6, 'Kurigram', 'কুড়িগ্রাম', 25.805445, 89.636174, 'www.kurigram.gov.bd'),
(29, 6, 'Lalmonirhat', 'লালমনিরহাট', 0, 0, 'www.lalmonirhat.gov.bd'),
(30, 6, 'Nilphamari', 'নীলফামারী', 25.931794, 88.856006, 'www.nilphamari.gov.bd'),
(31, 6, 'Panchagarh', 'পঞ্চগড়', 26.3411, 88.5541606, 'www.panchagarh.gov.bd'),
(32, 6, 'Rangpur', 'রংপুর', 25.7558096, 89.244462, 'www.rangpur.gov.bd'),
(33, 6, 'Thakurgaon', 'ঠাকুরগাঁও', 26.0336945, 88.4616834, 'www.thakurgaon.gov.bd'),
(34, 1, 'Barguna', 'বরগুনা', 0, 0, 'www.barguna.gov.bd'),
(35, 1, 'Barisal', 'বরিশাল', 0, 0, 'www.barisal.gov.bd'),
(36, 1, 'Bhola', 'ভোলা', 22.685923, 90.648179, 'www.bhola.gov.bd'),
(37, 1, 'Jhalokati', 'ঝালকাঠি', 0, 0, 'www.jhalakathi.gov.bd'),
(38, 1, 'Patuakhali', 'পটুয়াখালী', 22.3596316, 90.3298712, 'www.patuakhali.gov.bd'),
(39, 1, 'Pirojpur', 'পিরোজপুর', 0, 0, 'www.pirojpur.gov.bd'),
(40, 2, 'Bandarban', 'বান্দরবান', 22.1953275, 92.2183773, 'www.bandarban.gov.bd'),
(41, 2, 'Brahmanbaria', 'ব্রাহ্মণবাড়িয়া', 23.9570904, 91.1119286, 'www.brahmanbaria.gov.bd'),
(42, 2, 'Chandpur', 'চাঁদপুর', 23.2332585, 90.6712912, 'www.chandpur.gov.bd'),
(43, 2, 'Chittagong', 'চট্টগ্রাম', 22.335109, 91.834073, 'www.chittagong.gov.bd'),
(44, 2, 'Comilla', 'কুমিল্লা', 23.4682747, 91.1788135, 'www.comilla.gov.bd'),
(45, 2, 'Coxs Bazar', 'কক্স বাজার', 0, 0, 'www.coxsbazar.gov.bd'),
(46, 2, 'Feni', 'ফেনী', 23.023231, 91.3840844, 'www.feni.gov.bd'),
(47, 2, 'Khagrachari', 'খাগড়াছড়ি', 23.119285, 91.984663, 'www.khagrachhari.gov.bd'),
(48, 2, 'Lakshmipur', 'লক্ষ্মীপুর', 22.942477, 90.841184, 'www.lakshmipur.gov.bd'),
(49, 2, 'Noakhali', 'নোয়াখালী', 22.869563, 91.099398, 'www.noakhali.gov.bd'),
(50, 2, 'Rangamati', 'রাঙ্গামাটি', 0, 0, 'www.rangamati.gov.bd'),
(51, 7, 'Habiganj', 'হবিগঞ্জ', 24.374945, 91.41553, 'www.habiganj.gov.bd'),
(52, 7, 'Maulvibazar', 'মৌলভীবাজার', 24.482934, 91.777417, 'www.moulvibazar.gov.bd'),
(53, 7, 'Sunamganj', 'সুনামগঞ্জ', 25.0658042, 91.3950115, 'www.sunamganj.gov.bd'),
(54, 7, 'Sylhet', 'সিলেট', 24.8897956, 91.8697894, 'www.sylhet.gov.bd'),
(55, 4, 'Bagerhat', 'বাগেরহাট', 22.651568, 89.785938, 'www.bagerhat.gov.bd'),
(56, 4, 'Chuadanga', 'চুয়াডাঙ্গা', 23.6401961, 88.841841, 'www.chuadanga.gov.bd'),
(57, 4, 'Jessore', 'যশোর', 23.16643, 89.2081126, 'www.jessore.gov.bd'),
(58, 4, 'Jhenaidah', 'ঝিনাইদহ', 23.5448176, 89.1539213, 'www.jhenaidah.gov.bd'),
(59, 4, 'Khulna', 'খুলনা', 22.815774, 89.568679, 'www.khulna.gov.bd'),
(60, 4, 'Kushtia', 'কুষ্টিয়া', 23.901258, 89.120482, 'www.kushtia.gov.bd'),
(61, 4, 'Magura', 'মাগুরা', 23.487337, 89.419956, 'www.magura.gov.bd'),
(62, 4, 'Meherpur', 'মেহেরপুর', 23.762213, 88.631821, 'www.meherpur.gov.bd'),
(63, 4, 'Narail', 'নড়াইল', 23.172534, 89.512672, 'www.narail.gov.bd'),
(64, 4, 'Satkhira', 'সাতক্ষীরা', 0, 0, 'www.satkhira.gov.bd');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE IF NOT EXISTS `divisions` (
  `id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `bn_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `bn_name`) VALUES
(1, 'Barisal', 'বরিশাল'),
(2, 'Chittagong', 'চট্টগ্রাম'),
(3, 'Dhaka', 'ঢাকা'),
(4, 'Khulna', 'খুলনা'),
(5, 'Rajshahi', 'রাজশাহী'),
(6, 'Rangpur', 'রংপুর'),
(7, 'Sylhet', 'সিলেট');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=13 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'Admin', 'Administrator'),
(2, 'Members', 'Members'),
(3, 'Teachers', 'Teachers'),
(4, 'Students', 'Students'),
(5, 'Guardians', 'Guardians'),
(6, 'Staffs', 'Staffs'),
(7, 'Accounts Manager', 'Accounts Manager'),
(8, 'Operator', 'Operator'),
(9, 'Results Manager', 'Results Manager'),
(10, 'Secretary', 'Secretary'),
(11, 'Thana Project Officer', 'Thana Project Officer'),
(12, 'District Education Officer', 'District Education Officer');

-- --------------------------------------------------------

--
-- Table structure for table `initial_settings_categories`
--

CREATE TABLE IF NOT EXISTS `initial_settings_categories` (
  `CategoriesId` bigint(100) NOT NULL AUTO_INCREMENT,
  `CategoriesName` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`CategoriesId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `initial_settings_categories`
--

INSERT INTO `initial_settings_categories` (`CategoriesId`, `CategoriesName`) VALUES
(1, 'Class'),
(2, 'Section'),
(3, 'Department'),
(4, 'Subject'),
(5, 'Exam'),
(6, 'Study Group'),
(7, 'Gender'),
(8, 'Shift'),
(9, 'Posts '),
(10, 'Enrollment'),
(11, 'Adult Gender'),
(12, 'Religion'),
(13, 'Blood Group'),
(14, 'Designations');

-- --------------------------------------------------------

--
-- Table structure for table `initial_settings_info`
--

CREATE TABLE IF NOT EXISTS `initial_settings_info` (
  `SettingsId` bigint(100) NOT NULL AUTO_INCREMENT,
  `SettingsCategory` int(11) DEFAULT NULL,
  `SettingsName` varchar(300) DEFAULT NULL,
  `SettingsDescription` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `From` bigint(100) DEFAULT NULL,
  `To` bigint(100) DEFAULT NULL,
  `FullMarks` bigint(100) DEFAULT NULL,
  `PassMarks` bigint(100) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`SettingsId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=237 ;

--
-- Dumping data for table `initial_settings_info`
--

INSERT INTO `initial_settings_info` (`SettingsId`, `SettingsCategory`, `SettingsName`, `SettingsDescription`, `From`, `To`, `FullMarks`, `PassMarks`, `isActive`) VALUES
(1, 1, 'One', 'প্রথম', NULL, NULL, NULL, NULL, 1),
(2, 1, 'Two', 'দ্বিতীয়', NULL, NULL, NULL, NULL, 1),
(3, 1, 'Three', 'তৃতীয়', NULL, NULL, NULL, NULL, 1),
(4, 1, 'Four', 'চতুর্থ', NULL, NULL, NULL, NULL, 1),
(5, 1, 'Five', 'পঞ্চম', NULL, NULL, NULL, NULL, 1),
(6, 1, 'Six', 'ষষ্ঠ', NULL, NULL, NULL, NULL, 1),
(7, 1, 'Seven', 'সপ্তম', NULL, NULL, NULL, NULL, 1),
(8, 1, 'Eight', 'অষ্টম', NULL, NULL, NULL, NULL, 1),
(9, 1, 'Nine', 'নবম', NULL, NULL, NULL, NULL, 1),
(10, 1, 'Ten', 'দশম', NULL, NULL, NULL, NULL, 1),
(11, 1, 'Eleven', 'একাদশ', NULL, NULL, NULL, NULL, 1),
(12, 1, 'Twelve', 'দ্বাদশ', NULL, NULL, NULL, NULL, 1),
(13, 2, 'A', 'ক', NULL, NULL, NULL, NULL, 1),
(14, 2, 'B', 'খ', NULL, NULL, NULL, NULL, 1),
(15, 2, 'C', 'গ', NULL, NULL, NULL, NULL, 1),
(16, 2, 'D', 'ঘ', NULL, NULL, NULL, NULL, 1),
(17, 2, 'E', 'ঙ', NULL, NULL, NULL, NULL, 1),
(18, 6, 'Science', 'বিজ্ঞান', NULL, NULL, NULL, NULL, 1),
(19, 6, 'Humanities', 'মানবিক', NULL, NULL, NULL, NULL, 1),
(20, 6, 'Business Study', 'ব্যবসায় শিক্ষা', NULL, NULL, NULL, NULL, 1),
(21, 7, 'Boy', 'ছাত্র', NULL, NULL, NULL, NULL, 1),
(22, 7, 'Girl', 'ছাত্রী', NULL, NULL, NULL, NULL, 1),
(23, 3, 'Faculty of Arts', 'কলা অনুষদ', NULL, NULL, NULL, NULL, 1),
(32, 3, 'Faculty of Business Studies', 'ব্যবসায় শিক্ষা অনুষদ', NULL, NULL, NULL, NULL, 1),
(33, 3, 'Faculty of Biological Science', 'বায়োলজি অনুষদ', NULL, NULL, NULL, NULL, 1),
(34, 3, 'Faculty of Engineering and Technology', 'Faculty of Engineering and Technology', NULL, NULL, NULL, NULL, 1),
(35, 3, 'Faculty of Education', 'Faculty of Education', NULL, NULL, NULL, NULL, 1),
(36, 3, 'Faculty of Fine Arts', 'Faculty of Fine Arts', NULL, NULL, NULL, NULL, 1),
(37, 3, 'Faculty of Law', 'Faculty of Law', NULL, NULL, NULL, NULL, 1),
(38, 3, 'Faculty of Medicine', 'Faculty of Medicine', NULL, NULL, NULL, NULL, 1),
(39, 3, 'Faculty of Postgraduates Medical Sciences & Research', 'Faculty of Postgraduates Medical Sciences & Research', NULL, NULL, NULL, NULL, 1),
(40, 3, 'Faculty of Pharmacy', 'Faculty of Pharmacy', NULL, NULL, NULL, NULL, 1),
(41, 3, 'Faculty of Science', 'Faculty of Science', NULL, NULL, NULL, NULL, 1),
(42, 3, 'Faculty of Social Sciences', 'Faculty of Social Sciences', NULL, NULL, NULL, NULL, 1),
(43, 3, 'Faculty of Earth and Environmental Sciences', 'Faculty of Earth and Environmental Sciences', NULL, NULL, NULL, NULL, 1),
(44, 8, 'Day', 'সকাল', NULL, NULL, NULL, NULL, 1),
(45, 8, 'Evening', 'বিকাল', NULL, NULL, NULL, NULL, 1),
(46, 9, 'Slideshow', 'স্লাইডশো ', NULL, NULL, NULL, NULL, 1),
(47, 9, 'Others Photo', 'অন্যান্য ফটো', NULL, NULL, NULL, NULL, 1),
(48, 9, 'Photo Gallery', 'ফটো গ্যালারি ', NULL, NULL, NULL, NULL, 1),
(49, 10, 'Current', 'Current', NULL, NULL, NULL, NULL, 1),
(50, 10, 'Alumni', 'Alumni', NULL, NULL, NULL, NULL, 1),
(51, 4, 'Bangla 1st Paper', 'Bangla 1st Paper', 6, 12, 100, 33, 1),
(52, 4, 'Bangla 2nd Paper', 'Bangla 2nd Paper', 6, 8, 50, 17, 1),
(53, 4, 'English 1st Paper', 'English 1st Paper', 6, 12, 100, 33, 1),
(54, 4, 'English 2nd Paper', 'English 2nd Paper', 6, 8, 50, 17, 1),
(55, 4, 'General Mathematics', 'General Mathematics', 6, 10, 100, 33, 1),
(56, 4, 'Higher Mathematics 1st Paper', 'Higher Mathematics 1st Paper', 11, 12, 100, 33, 1),
(57, 4, 'General Science', 'General Science', 6, 10, 100, 33, 1),
(58, 4, 'Introduction to Bangladesh and World', 'Introduction to Bangladesh and World', 6, 10, 100, 33, 1),
(59, 4, 'History of Bangladesh and World Civilization', 'History of Bangladesh and World Civilization', 6, 10, 100, 33, 1),
(60, 4, 'Civics and Citizenship', 'Civics and Citizenship', 6, 10, 100, 33, 1),
(61, 4, 'Civics 1st Paper', 'Civics 1st Paper', 11, 12, 100, 33, 1),
(62, 4, 'Civics 2nd Paper', 'Civics 2nd Paper', 11, 12, 100, 33, 1),
(63, 4, 'Islam and ethics study', 'Islam and ethics study', 6, 10, 100, 33, 1),
(64, 4, 'Economics 1st Paper', 'Economics 1st Paper', 11, 12, 100, 33, 1),
(65, 4, 'Economics 2nd Paper', 'Economics 2nd Paper', 11, 12, 100, 33, 1),
(66, 4, 'Geography and Environment (General)', 'Geography and Environment (General)', 6, 10, 100, 33, 1),
(67, 4, 'Geography and Environment 1st Paper', 'Geography and Environment 1st Paper', 11, 12, 100, 33, 1),
(68, 4, 'Geography and Environment 2nd Paper', 'Geography and Environment 2nd Paper', 11, 12, 100, 33, 1),
(69, 4, 'Business Entreneurship 1st Paper', 'Business Entreneurship 1st Paper', 9, 10, 100, 33, 1),
(70, 4, 'Business Entreneurship 2nd Paper', 'Business Entreneurship 2nd Paper', NULL, NULL, NULL, NULL, 1),
(71, 4, 'Islam 1st Paper', 'Islam 1st Paper', 11, 12, 100, 33, 1),
(72, 4, 'Islam 2nd Paper', 'Islam 2nd Paper', 11, 12, 100, 33, 1),
(73, 4, 'Buddists and ethics study', 'Buddists and ethics study', 6, 10, 100, 33, 1),
(74, 4, 'Christian and ethics study', 'Christian and ethics study', 6, 10, 100, 33, 1),
(75, 4, 'Accounting 1st Paper', 'Accounting 1st Paper', 11, 12, 100, 33, 1),
(76, 4, 'Accounting 2nd Paper', 'Accounting 2nd Paper', 11, 12, 100, 33, 1),
(77, 4, 'Finance and Banking', 'Finance and Banking', 6, 10, 100, 33, 1),
(78, 4, 'Physics', 'Physics', 9, 10, 100, 33, 1),
(79, 4, 'Chemestry', 'Chemestry', 9, 10, 100, 33, 1),
(80, 4, 'Biology', 'Biology', 9, 10, 100, 33, 1),
(81, 4, 'Agriculture', 'Agriculture', 6, 10, 100, 33, 1),
(82, 4, 'Home Science', 'Home Science', 6, 10, 100, 33, 1),
(83, 4, 'Higher Mathematics 2nd Paper', 'Higher Mathematics 2nd Paper', 11, 12, 100, 33, 1),
(84, 4, 'Higher Mathematics (General)', 'Higher Mathematics (General)', 9, 10, 100, 33, 1),
(85, 4, ' 	Physical Education', ' 	Physical Education', 6, 10, 100, 33, 1),
(86, 4, 'Health Science and Sports', 'Health Science and Sports', 6, 10, 100, 33, 1),
(87, 4, 'Arts & Crafts', 'Arts & Crafts', 6, 10, 100, 33, 1),
(88, 4, 'Computer Study', 'Computer Study', 6, 10, 100, 33, 1),
(89, 4, 'Arabic', 'Arabic', 6, 10, 100, 33, 1),
(90, 4, 'Pali', 'Pali', 6, 10, 100, 33, 1),
(91, 4, 'Music', 'Music', 6, 10, 100, 33, 1),
(92, 4, 'Basic Trade', 'Basic Trade', 6, 10, 100, 33, 1),
(93, 4, 'ICT & Career', 'ICT & Career', 6, 8, 50, 17, 1),
(94, 4, 'Physical Study and health', 'Physical Study and health', 6, 8, 50, 17, 1),
(95, 4, 'Kormo oo jibonmukhi shiksha', 'Kormo oo jibonmukhi shiksha', 6, 8, 50, 17, 1),
(96, 4, 'Accounting (General)', 'Accounting (General)', 9, 10, 100, 33, 1),
(97, 4, 'Agriculture 1st Paper', 'Agriculture 1st Paper', 11, 12, 100, 33, 1),
(98, 4, 'Agriculture 2nd Paper', 'Agriculture 2nd Paper', 11, 12, 100, 33, 1),
(99, 4, 'Biology 1st Paper', 'Biology 1st Paper', 11, 12, 100, 33, 1),
(100, 4, 'Biology 2nd Paper', 'Biology 2nd Paper', 11, 12, 100, 33, 1),
(101, 4, 'Business Organization and Management 1st Paper', 'Business Organization and Management 1st Paper', 11, 12, 100, 33, 1),
(102, 4, 'Chemestry 1st Paper', 'Chemestry 1st Paper', 11, 12, 100, 33, 1),
(103, 4, 'Child Development 1st Paper', 'Child Development 1st Paper', 11, 12, 100, 33, 1),
(104, 4, 'Child Development 2nd Paper', 'Child Development 2nd Paper', 11, 12, 100, 33, 1),
(105, 4, 'Civics 1st Paper', 'Civics 1st Paper', 11, 12, 100, 33, 1),
(106, 4, 'Civics 2nd Paper', 'Civics 2nd Paper', 11, 12, 100, 33, 1),
(107, 4, 'Classical Music 1st Paper', 'Classical Music 1st Paper', 11, 12, 100, 33, 1),
(108, 4, 'Classical Music 2nd Paper', 'Classical Music 2nd Paper', 11, 12, 100, 33, 1),
(109, 4, 'Economics', 'Economics', 6, 10, 100, 33, 1),
(110, 4, 'Finance Banking and Insurance 1st Paper', 'Finance Banking and Insurance 1st Paper', 11, 12, 100, 33, 1),
(111, 4, 'Finance Banking and Insurance 2nd Paper', 'Finance Banking and Insurance 2nd Paper', 11, 12, 100, 33, 1),
(112, 4, 'History 1st Paper', 'History 1st Paper', 11, 12, 100, 33, 1),
(113, 4, 'History 2nd Paper', 'History 2nd Paper', 11, 12, 100, 33, 1),
(114, 4, 'Home Management and family living 1st Paper', 'Home Management and family living 1st Paper', 11, 12, 100, 33, 1),
(115, 4, 'Home Management and family living 2nd Paper', 'Home Management and family living 2nd Paper', 11, 12, 100, 33, 1),
(116, 4, 'Home Science 1st Paper', 'Home Science 1st Paper', 11, 12, 100, 33, 1),
(117, 4, 'Home Science 2nd Paper', 'Home Science 2nd Paper', 11, 12, 100, 33, 1),
(118, 4, 'ICT 1st Paper', 'ICT 1st Paper', 11, 12, 100, 33, 1),
(119, 4, 'ICT 2nd Paper', 'ICT 2nd Paper', 11, 12, 100, 33, 1),
(120, 4, 'Islamic History 1st Paper', 'Islamic History 1st Paper', 11, 12, 100, 33, 1),
(121, 4, 'Islamic History 2nd Paper', 'Islamic History 2nd Paper', 11, 12, 100, 33, 1),
(122, 4, 'Light Music 1st Paper', 'Light Music 1st Paper', 11, 12, 100, 33, 1),
(123, 4, 'Light Music 2nd Paper', 'Light Music 2nd Paper', 11, 12, 100, 33, 1),
(124, 4, 'Logic 1st Paper', 'Logic 1st Paper', 11, 12, 100, 33, 1),
(125, 4, 'Logic 2nd Paper', 'Logic 2nd Paper', 11, 12, 100, 33, 1),
(126, 4, 'Physics 1st Paper', 'Physics 1st Paper', 11, 12, 100, 33, 1),
(127, 4, 'Physics 2nd Paper', 'Physics 2nd Paper', 11, 12, 100, 33, 1),
(128, 4, 'Practical Arts 1st Paper', 'Practical Arts 1st Paper', 11, 12, 100, 33, 1),
(129, 4, 'Practical Arts 2nd Paper', 'Practical Arts 2nd Paper', 11, 12, 100, 33, 1),
(130, 4, 'Producation Management 1st Paper', 'Producation Management 1st Paper', 11, 12, 100, 33, 1),
(131, 4, 'Producation Management 2nd Paper', 'Producation Management 2nd Paper', 11, 12, 100, 33, 1),
(132, 4, 'Psychology 1st Paper', 'Psychology 1st Paper', 11, 12, 100, 33, 1),
(133, 4, 'Psychology 2nd Paper', 'Psychology 2nd Paper', 11, 12, 100, 33, 1),
(134, 4, 'Social Work 1st Paper', 'Social Work 1st Paper', 11, 12, 100, 33, 1),
(135, 4, 'Social Work 2nd Paper', 'Social Work 2nd Paper', 11, 12, 100, 33, 1),
(136, 4, 'Socialogy 1st Paper', 'Socialogy 1st Paper', 11, 12, 100, 33, 1),
(137, 4, 'Socialogy 2nd Paper', 'Socialogy 2nd Paper', 11, 12, 100, 33, 1),
(138, 4, 'Soil Science 1st Paper', 'Soil Science 1st Paper', 11, 12, 100, 33, 1),
(139, 4, 'Staticstics 1st Paper', 'Staticstics 1st Paper', 11, 12, 100, 33, 1),
(140, 4, 'Staticstics 2nd Paper', 'Staticstics 2nd Paper', 11, 12, 100, 33, 1),
(141, 4, 'Secreterial Science 1st Paper', 'Secreterial Science 1st Paper', 11, 12, 100, 33, 1),
(142, 4, 'Secreterial Science 2nd Paper (Office Management)', 'Secreterial Science 2nd Paper (Office Management)', 11, 12, 100, 33, 1),
(143, 4, 'Tourism and Hospitality 1st Paper', 'Tourism and Hospitality 1st Paper', 11, 12, 100, 33, 1),
(144, 4, 'Tourism and Hospitality 2nd Paper', 'Tourism and Hospitality 2nd Paper', 11, 12, 100, 33, 1),
(145, 4, 'ICT & Career', ' 	ICT & Career', 9, 10, 100, 33, 1),
(146, 4, 'Quran Majid and Tajbid', 'Quran Majid and Tajbid', 9, 10, 100, 33, 1),
(147, 4, 'Bangla 2nd Paper', 'Bangla 2nd Paper', 9, 12, 100, 33, 1),
(148, 4, 'English 2nd Paper', 'English 2nd Paper', 9, 12, 100, 33, 1),
(149, 4, 'Hinduism and ethics study', 'Hinduism and ethics study', 6, 10, 100, 33, 1),
(150, 4, 'Physical Study and health', 'Physical Study and health', 9, 10, 100, 33, 1),
(151, 4, 'Business Organization and Management 2nd Paper', 'Business Organization and Management 2nd Paper', 11, 12, 100, 33, 1),
(152, 4, 'Chemestry 2nd Paper', 'Chemestry 2nd Paper', 11, 12, 100, 33, 1),
(153, 4, 'Hadith Sarif', 'Hadith Sarif', 9, 10, 100, 33, 1),
(154, 4, 'Akaid and Fiqah', 'Akaid and Fiqah', 9, 10, 100, 33, 1),
(155, 4, 'Arabic 1st Paper', 'Arabic 1st Paper', 9, 10, 100, 33, 1),
(156, 4, 'Arabic 2nd Paper', 'Arabic 2nd Paper', 9, 10, 100, 33, 1),
(157, 4, 'Islamic History', 'Islamic History', 9, 10, 100, 33, 1),
(158, 4, 'Tajbid Nosor and Nojom', 'Tajbid Nosor and Nojom', 9, 10, 100, 33, 1),
(159, 4, 'Kirayate Tartil and Hador', 'Kirayate Tartil and Hador', 9, 10, 100, 33, 1),
(160, 4, 'Tajbid (Verbal)', 'Tajbid (Verbal)', 9, 10, 100, 33, 1),
(161, 4, 'Hifjul Quran Daor', 'Hifjul Quran Daor', 9, 10, 100, 33, 1),
(162, 5, '1st Semester', '1st Semester', NULL, NULL, NULL, NULL, 1),
(163, 5, '2nd Semester', '2nd Semester', NULL, NULL, NULL, NULL, 1),
(164, 5, '3rd Semester', '3rd Semester', NULL, NULL, NULL, NULL, 1),
(165, 5, '4th Semester', '4th Semester', NULL, NULL, NULL, NULL, 1),
(166, 5, '5th Semester', '5th Semester', NULL, NULL, NULL, NULL, 1),
(167, 5, '6th Semester', '6th Semester', NULL, NULL, NULL, NULL, 1),
(168, 5, '7th Semester', '7th Semester', NULL, NULL, NULL, NULL, 1),
(169, 5, '8th Semester', '8th Semester', NULL, NULL, NULL, NULL, 1),
(170, 5, '9th Semester', '9th Semester', NULL, NULL, NULL, NULL, 1),
(171, 5, '10th Semester', '10th Semester', NULL, NULL, NULL, NULL, 1),
(172, 5, '11th Semester', '11th Semester', NULL, NULL, NULL, NULL, 1),
(173, 5, '12th Semester', '12th Semester', NULL, NULL, NULL, NULL, 1),
(174, 11, 'Male', 'Male', NULL, NULL, NULL, NULL, 1),
(175, 11, 'Female', 'Female', NULL, NULL, NULL, NULL, 1),
(176, 9, 'Latest News', 'সর্বশেষ সংবাদ ', NULL, NULL, NULL, NULL, 1),
(177, 9, 'Notice', 'নোটিশ ', NULL, NULL, NULL, NULL, 1),
(178, 9, 'Download', 'ডাউনলোড ', NULL, NULL, NULL, NULL, 1),
(179, 9, 'Syllabus', 'সিলেবাস ', NULL, NULL, NULL, NULL, 1),
(180, 9, 'Blog Posts', 'ব্লগ পোস্ট ', NULL, NULL, NULL, NULL, 1),
(181, 9, 'Video Gallery', 'ভিডিও গ্যালারি ', NULL, NULL, NULL, NULL, 1),
(182, 12, 'Islam', 'ইসলাম', NULL, NULL, NULL, NULL, 1),
(183, 12, 'Buddhists', 'বুদ্ধ', NULL, NULL, NULL, NULL, 1),
(184, 12, 'Christians', 'খ্রিষ্টান', NULL, NULL, NULL, NULL, 1),
(185, 12, 'Hinduism', 'হিন্দু (সনাতন)', NULL, NULL, NULL, NULL, 1),
(190, 10, 'Admission Stage', 'Admission Stage', NULL, NULL, NULL, NULL, 1),
(191, 0, 'One', 'প্রথম', NULL, NULL, NULL, NULL, 1),
(192, 14, 'Head Master', 'Head Master', NULL, NULL, NULL, NULL, 1),
(193, 14, 'Principal', 'Principal', NULL, NULL, NULL, NULL, 1),
(194, 14, 'Assistant Head Master', 'Assistant Head Master', NULL, NULL, NULL, NULL, 1),
(195, 14, 'Assistant Teacher (Biology)', 'Assistant Teacher (Biology)', NULL, NULL, NULL, NULL, 1),
(196, 14, 'Assistant Teacher (Bangla)', 'Assistant Teacher (Bangla)', NULL, NULL, NULL, NULL, 1),
(197, 14, 'Assistant Teacher (English)', 'Assistant Teacher (English)', NULL, NULL, NULL, NULL, 1),
(198, 14, 'Assistant Teacher (Math & Science)', 'Assistant Teacher (Math & Science)', NULL, NULL, NULL, NULL, 1),
(199, 14, 'Assistant Teacher (Science)', 'Assistant Teacher (Science)', NULL, NULL, NULL, NULL, 1),
(200, 14, 'Assistant Teacher (Business)', 'Assistant Teacher (Business)', NULL, NULL, NULL, NULL, 1),
(201, 14, 'Assistant Teacher (Computer)', 'Assistant Teacher (Computer)', NULL, NULL, NULL, NULL, 1),
(202, 14, 'Assistant Teacher (Athletics)', 'Assistant Teacher (Athletics)', NULL, NULL, NULL, NULL, 1),
(203, 14, 'Religion Teacher (Senior)', 'Religion Teacher (Senior)', NULL, NULL, NULL, NULL, 1),
(204, 14, 'Religion Teacher (Junior)', 'Religion Teacher (Junior)', NULL, NULL, NULL, NULL, 1),
(205, 14, 'Junior Teacher', 'Junior Teacher', NULL, NULL, NULL, NULL, 1),
(206, 14, 'Junior Teacher (Arts and crafts)', 'Junior Teacher (Arts and crafts)', NULL, NULL, NULL, NULL, 1),
(207, 14, 'Office Assistant (Computer Typist)', 'Office Assistant (Computer Typist)', NULL, NULL, NULL, NULL, 1),
(208, 14, 'Cleanness Worker', 'Cleanness Worker', NULL, NULL, NULL, NULL, 1),
(209, 14, 'Guard', 'Guard', NULL, NULL, NULL, NULL, 1),
(210, 14, 'Office Assistant', 'Office Assistant', NULL, NULL, NULL, NULL, 1),
(211, 14, 'Gardener', 'Gardener', NULL, NULL, NULL, NULL, 1),
(212, 14, 'Women Aya', 'Women Aya', NULL, NULL, NULL, NULL, 1),
(213, 13, 'O+', 'ও পজেটিভ', NULL, NULL, NULL, NULL, 1),
(214, 13, 'O–', 'ও নেগেটিভ', NULL, NULL, NULL, NULL, 1),
(215, 13, 'A+', 'এ পজেটিভ', NULL, NULL, NULL, NULL, 1),
(216, 13, 'A-', 'এ নেগেটিভ', NULL, NULL, NULL, NULL, 1),
(217, 13, 'B+', 'বি পজেটিভ', NULL, NULL, NULL, NULL, 1),
(218, 13, 'B-', 'বি নেগেটিভ', NULL, NULL, NULL, NULL, 1),
(219, 13, 'AB+', 'এবি পজেটিভ', NULL, NULL, NULL, NULL, 1),
(220, 13, 'AB-', 'এবি নেগেটিভ', NULL, NULL, NULL, NULL, 1),
(221, 14, 'Vice Principal', 'Vice Principal', NULL, NULL, NULL, NULL, 1),
(222, 14, 'Vice Principal', 'Vice Principal', NULL, NULL, NULL, NULL, 1),
(223, 14, 'Acting Principal', 'Acting Principal', NULL, NULL, NULL, NULL, 1),
(224, 14, 'Librarian', 'Librarian', NULL, NULL, NULL, NULL, 1),
(225, 14, 'Assistant Librarian', 'Assistant Librarian', NULL, NULL, NULL, NULL, 1),
(226, 14, 'Assistant Mouluvi', 'Assistant Mouluvi', NULL, NULL, NULL, NULL, 1),
(227, 14, 'Arabic Lecturer', 'Arabic Lecturer', NULL, NULL, NULL, NULL, 1),
(228, 14, 'Ebtedayee Head', 'Ebtedayee Head', NULL, NULL, NULL, NULL, 1),
(229, 14, 'Ebtedayee Assistant Teacher', 'Ebtedayee Assistant Teacher', NULL, NULL, NULL, NULL, 1),
(230, 14, 'Ebtedayee Kari Teacher', 'Ebtedayee Kari Teacher', NULL, NULL, NULL, NULL, 1),
(231, 5, 'Half Yearly', 'Half Yearly', NULL, NULL, NULL, NULL, 1),
(232, 5, 'Pre-test', 'Pre-test', NULL, NULL, NULL, NULL, 1),
(233, 5, 'Test', 'Test', NULL, NULL, NULL, NULL, 1),
(234, 5, 'Annual', 'Annual', NULL, NULL, NULL, NULL, 1),
(235, 2, 'Vocational (Dress)', 'Vocational (Dress)', NULL, NULL, NULL, NULL, 1),
(236, 2, 'Vocational (Food)', 'Vocational (Food)', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` bigint(100) DEFAULT NULL,
  `to` bigint(100) DEFAULT NULL,
  `message` text,
  `is_read` enum('0','1') DEFAULT '0',
  `time` bigint(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `PostId` bigint(100) NOT NULL AUTO_INCREMENT,
  `AddedBy` bigint(100) DEFAULT NULL,
  `Category` bigint(100) DEFAULT NULL,
  `Title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `PostRoute` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `PostContent` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `MediaFileName` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `MediaName` varchar(255) DEFAULT NULL,
  `MediaTempName` varchar(255) DEFAULT NULL,
  `MediaSize` varchar(255) DEFAULT NULL,
  `MediaWidth` varchar(255) DEFAULT NULL,
  `MediaHeight` varchar(255) DEFAULT NULL,
  `AddedDate` bigint(100) DEFAULT NULL,
  `isActive` bigint(100) DEFAULT NULL,
  PRIMARY KEY (`PostId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`PostId`, `AddedBy`, `Category`, `Title`, `PostRoute`, `PostContent`, `MediaFileName`, `MediaName`, `MediaTempName`, `MediaSize`, `MediaWidth`, `MediaHeight`, `AddedDate`, `isActive`) VALUES
(38, 114354, 48, 'Gallery 1', 'gallery1', '', 'gallery1.jpg', NULL, '', '', '', '', 1451197310, 1),
(39, 114354, 48, 'Gallery 2', 'gallery2', '', 'gallery2.jpg', NULL, '', '', '', '', 1451197326, 1),
(41, 114354, 48, 'Gallery 4', 'gallery4', '', 'gallery4.jpg', NULL, '', '', '', '', 1451197359, 1),
(42, 114354, 48, 'Gallery 5', 'gallery5', '', 'gallery5.jpg', NULL, '', '', '', '', 1451197377, 1),
(58, 1357, 46, 'super', 'yes', '', 'IMG_1515.png', NULL, '', '', '', '', 1473055237, 1),
(60, 1357, 46, 'pic1', 'pic1', '<span class="Apple-tab-span" style="white-space:pre">			</span>', 'IMG_1347.png', NULL, '', '', '', '', 1473055891, 1),
(61, 1357, 46, 'pic2', 'pic2', '', 'IMG_1348.png', NULL, '', '', '', '', 1473055911, 1),
(63, 1357, 46, 'pic3', 'pic3', '', 'IMG_1349.png', NULL, '', '', '', '', 1473055974, 1),
(64, 1357, 46, 'slide image', 'slide image', '', 'Untitled-1.jpg', NULL, '', '', '', '', 1473060641, 1),
(65, 1357, 46, 'slide image1', 'slide image1', '', 'Untitled-2.jpg', NULL, '', '', '', '', 1473060711, 1),
(67, 1357, 46, 'slide image2', 'slide image2', '', 'Untitled-11.jpg', NULL, '', '', '', '', 1473060767, 1);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE IF NOT EXISTS `results` (
  `ResultId` bigint(100) NOT NULL AUTO_INCREMENT,
  `Exams` bigint(100) DEFAULT NULL,
  `Classes` bigint(100) DEFAULT NULL,
  `Sections` bigint(100) DEFAULT NULL,
  `StudyGroups` bigint(100) DEFAULT NULL,
  `Subjects` bigint(100) DEFAULT NULL,
  `StudentId` bigint(100) DEFAULT NULL,
  `IsAbsent` bigint(100) DEFAULT NULL,
  `Written` bigint(100) DEFAULT NULL,
  `MCQ` bigint(100) DEFAULT NULL,
  `Practical` bigint(100) DEFAULT NULL,
  `Listening` bigint(100) DEFAULT NULL,
  `Writting` bigint(100) DEFAULT NULL,
  `Speaking` bigint(100) DEFAULT NULL,
  `Reading` bigint(100) DEFAULT NULL,
  `FullMarks` bigint(100) DEFAULT NULL,
  `AddedDate` timestamp NULL DEFAULT NULL,
  `AddedYear` year(4) DEFAULT NULL,
  `isActive` bigint(100) DEFAULT NULL,
  PRIMARY KEY (`ResultId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `SettingsId` bigint(100) NOT NULL AUTO_INCREMENT,
  `InstituteName` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `InstituteSlogan` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `InstituteEstablished` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `InstituteEIIN` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `InstituteIsMPO` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `InstituteLogo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `InstituteHeader` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `InstitutePhone` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `InstituteEmail` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `InstituteAddress` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `InstituteWebsite` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `InstituteKeywords` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `InstituteTime` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `InstituteGoogleMaps` text COLLATE utf8_unicode_ci,
  `ShortInformation` text COLLATE utf8_unicode_ci,
  `AdminName` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AdminPhone` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AdminEmail` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AdminPhoto` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AdminSign` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AdminMessage` text COLLATE utf8_unicode_ci,
  `AdminMessagePhoto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SelectedTheme` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`SettingsId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT AUTO_INCREMENT=2 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`SettingsId`, `InstituteName`, `InstituteSlogan`, `InstituteEstablished`, `InstituteEIIN`, `InstituteIsMPO`, `InstituteLogo`, `InstituteHeader`, `InstitutePhone`, `InstituteEmail`, `InstituteAddress`, `InstituteWebsite`, `InstituteKeywords`, `InstituteTime`, `InstituteGoogleMaps`, `ShortInformation`, `AdminName`, `AdminPhone`, `AdminEmail`, `AdminPhoto`, `AdminSign`, `AdminMessage`, `AdminMessagePhoto`, `SelectedTheme`) VALUES
(1, 'চকরিয়া উম্মাহাতুল মো''মেনীন মহিলা দাখিল মাদ্‌রাসা', 'শিক্ষাই জাতির মেরুদন্ড', '০১/০১/১৯৮৯ইং', '১০৬২২৩', '', 'chakarialogo.png', '', '০১৭১৪৬৪৫৮৩১', 'chakaria@gmail.com', 'ডাকঘরঃ চিরিংগা সি.সি, চকরিয়া পৌরসভা, উপজেলাঃ চকরিয়া, জেলাঃ কক্সবাজার ।', 'www.chakariaummdm.edu.bd', 'চকরিয়া উম্মাহাতুল মো''মেনীন মহিলা দাখিল মাদ্‌রাসা', 'সকাল ৯:০০ থেকে বিকাল ৫:০০', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2203.247731330936!2d92.07248431031283!3d21.76453315136624!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x77d1ea5fe6f20ecd!2sChakaria+Government+High+School!5e0!3m2!1sen!2sbd!4v1473061687888" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>', 'প্রতিষ্ঠানটি কক্সবাজার জেলার চকরিয়া থানায় চকরিয়া উপজেলা কার্যালয়ের পাশে অবস্থিত ।  ১৯৮৯ ইং সালে প্রতিষ্ঠিত হয়ে অদ্যাবদি ছড়িয়ে যাচ্ছে বিদ্যার আলো । বর্তমান যুগ আধুনিক সভ্যতার যুগ , তথা কম্পিউটার যুগ । আধুনিক সভ্যতার সাথে তাল মিলিয়ে কম্পিউটারে ের ব্যবহার চলছে এ মাদ্‌রাসাতেও । অতীত ঐতিহ্যকে ধারন করে , নুতুন সভ্যতার অংশ ছড়িয়ে ডিজিটাল বাংলাদেশ ‘ তথা স্বপ্নের বাংলাদেশ গড়তে সহায়তায় সফলকাম হবে মাদ্‌রাসাটি', 'মোঃ আবুল হোছাইন আনসারী', '০১৭১৬৭৭৫৩৩৩', 'gourangi.ekashi.o.high.school@gmail.com', 'IMG_1347.jpg', 'IMG_1347.jpg', 'কক্সবাজার জেলার চকরিয়া  উপজেলার অন্তর্গত চকরিয়া উম্মাহাতুল মো''মেনীন মহিলা দাখিল মাদ্‌রাসাটি চকরিয়া উপজেলার পাশেই অবস্থিত একটি ঐতিহ্যবাহী শিক্ষা প্রতিষ্ঠান । তদানীন্তন শিক্ষা বিবর্জিত এলাকায় শিক্ষা বিস্তারের প্রয়োজনে এলাকায় কতিপয় সচেতন মানুষের চেষ্টায় ফসল এই মাদ্‌রাসা । ১৯৮৯ ইং সালে প্রতিষ্ঠিত হয়ে অদ্যাবদি ছড়িয়ে যাচ্ছে বিদ্যার আলো । বর্তমান যুগ আধুনিক সভ্যতার যুগ , তথা কম্পিউটার যুগ । আধুনিক সভ্যতার  সাথে তাল মিলিয়ে কম্পিউটারের ব্যবহার চলছে এ মাদ্‌রাসাতেও । অতীত ঐতিহ্যকে ধারন করে , নুতুন সভ্যতার অংশ ছড়িয়ে ডিজিটাল বাংলাদেশ ‘ তথা স্বপ্নের বাংলাদেশ গড়তে সহায়তায় সফলকাম হবে মাদ্‌রাসাটি । আল্লাহ আমাদের তৌফিক দিন আমীন।', 'blankavatar.jpg', 'lightgreentheme');

-- --------------------------------------------------------

--
-- Table structure for table `student_promotion`
--

CREATE TABLE IF NOT EXISTS `student_promotion` (
  `PromotionId` bigint(100) NOT NULL AUTO_INCREMENT,
  `UserId` bigint(20) NOT NULL,
  `StudyYear` int(11) NOT NULL,
  `Class` int(11) NOT NULL,
  `ClassRoll` int(11) NOT NULL,
  `Section` int(11) NOT NULL,
  `GroupId` int(11) NOT NULL,
  `Department` int(11) NOT NULL,
  PRIMARY KEY (`PromotionId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `upazilas`
--

CREATE TABLE IF NOT EXISTS `upazilas` (
  `id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `district_id` int(2) unsigned DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `bn_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `district_id` (`district_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=493 ;

--
-- Dumping data for table `upazilas`
--

INSERT INTO `upazilas` (`id`, `district_id`, `name`, `bn_name`) VALUES
(1, 34, 'Amtali Upazila', 'আমতলী'),
(2, 34, 'Bamna Upazila', 'বামনা'),
(3, 34, 'Barguna Sadar Upazila', 'বরগুনা সদর'),
(4, 34, 'Betagi Upazila', 'বেতাগি'),
(5, 34, 'Patharghata Upazila', 'পাথরঘাটা'),
(6, 34, 'Taltali Upazila', 'তালতলী'),
(7, 35, 'Muladi Upazila', 'মুলাদি'),
(8, 35, 'Babuganj Upazila', 'বাবুগঞ্জ'),
(9, 35, 'Agailjhara Upazila', 'আগাইলঝরা'),
(10, 35, 'Barisal Sadar Upazila', 'বরিশাল সদর'),
(11, 35, 'Bakerganj Upazila', 'বাকেরগঞ্জ'),
(12, 35, 'Banaripara Upazila', 'বানাড়িপারা'),
(13, 35, 'Gaurnadi Upazila', 'গৌরনদী'),
(14, 35, 'Hizla Upazila', 'হিজলা'),
(15, 35, 'Mehendiganj Upazila', 'মেহেদিগঞ্জ '),
(16, 35, 'Wazirpur Upazila', 'ওয়াজিরপুর'),
(17, 36, 'Bhola Sadar Upazila', 'ভোলা সদর'),
(18, 36, 'Burhanuddin Upazila', 'বুরহানউদ্দিন'),
(19, 36, 'Char Fasson Upazila', 'চর ফ্যাশন'),
(20, 36, 'Daulatkhan Upazila', 'দৌলতখান'),
(21, 36, 'Lalmohan Upazila', 'লালমোহন'),
(22, 36, 'Manpura Upazila', 'মনপুরা'),
(23, 36, 'Tazumuddin Upazila', 'তাজুমুদ্দিন'),
(24, 37, 'Jhalokati Sadar Upazila', 'ঝালকাঠি সদর'),
(25, 37, 'Kathalia Upazila', 'কাঁঠালিয়া'),
(26, 37, 'Nalchity Upazila', 'নালচিতি'),
(27, 37, 'Rajapur Upazila', 'রাজাপুর'),
(28, 38, 'Bauphal Upazila', 'বাউফল'),
(29, 38, 'Dashmina Upazila', 'দশমিনা'),
(30, 38, 'Galachipa Upazila', 'গলাচিপা'),
(31, 38, 'Kalapara Upazila', 'কালাপারা'),
(32, 38, 'Mirzaganj Upazila', 'মির্জাগঞ্জ '),
(33, 38, 'Patuakhali Sadar Upazila', 'পটুয়াখালী সদর'),
(34, 38, 'Dumki Upazila', 'ডুমকি'),
(35, 38, 'Rangabali Upazila', 'রাঙ্গাবালি'),
(36, 39, 'Bhandaria', 'ভ্যান্ডারিয়া'),
(37, 39, 'Kaukhali', 'কাউখালি'),
(38, 39, 'Mathbaria', 'মাঠবাড়িয়া'),
(39, 39, 'Nazirpur', 'নাজিরপুর'),
(40, 39, 'Nesarabad', 'নেসারাবাদ'),
(41, 39, 'Pirojpur Sadar', 'পিরোজপুর সদর'),
(42, 39, 'Zianagar', 'জিয়ানগর'),
(43, 40, 'Bandarban Sadar', 'বান্দরবন সদর'),
(44, 40, 'Thanchi', 'থানচি'),
(45, 40, 'Lama', 'লামা'),
(46, 40, 'Naikhongchhari', 'নাইখংছড়ি '),
(47, 40, 'Ali kadam', 'আলী কদম'),
(48, 40, 'Rowangchhari', 'রউয়াংছড়ি '),
(49, 40, 'Ruma', 'রুমা'),
(50, 41, 'Brahmanbaria Sadar Upazila', 'ব্রাহ্মণবাড়িয়া সদর'),
(51, 41, 'Ashuganj Upazila', 'আশুগঞ্জ'),
(52, 41, 'Nasirnagar Upazila', 'নাসির নগর'),
(53, 41, 'Nabinagar Upazila', 'নবীনগর'),
(54, 41, 'Sarail Upazila', 'সরাইল'),
(55, 41, 'Shahbazpur Town', 'শাহবাজপুর টাউন'),
(56, 41, 'Kasba Upazila', 'কসবা'),
(57, 41, 'Akhaura Upazila', 'আখাউরা'),
(58, 41, 'Bancharampur Upazila', 'বাঞ্ছারামপুর'),
(59, 41, 'Bijoynagar Upazila', 'বিজয় নগর'),
(60, 42, 'Chandpur Sadar', 'চাঁদপুর সদর'),
(61, 42, 'Faridganj', 'ফরিদগঞ্জ'),
(62, 42, 'Haimchar', 'হাইমচর'),
(63, 42, 'Haziganj', 'হাজীগঞ্জ'),
(64, 42, 'Kachua', 'কচুয়া'),
(65, 42, 'Matlab Uttar', 'মতলব উত্তর'),
(66, 42, 'Matlab Dakkhin', 'মতলব দক্ষিণ'),
(67, 42, 'Shahrasti', 'শাহরাস্তি'),
(68, 43, 'Anwara Upazila', 'আনোয়ারা'),
(69, 43, 'Banshkhali Upazila', 'বাশখালি'),
(70, 43, 'Boalkhali Upazila', 'বোয়ালখালি'),
(71, 43, 'Chandanaish Upazila', 'চন্দনাইশ'),
(72, 43, 'Fatikchhari Upazila', 'ফটিকছড়ি'),
(73, 43, 'Hathazari Upazila', 'হাঠহাজারী'),
(74, 43, 'Lohagara Upazila', 'লোহাগারা'),
(75, 43, 'Mirsharai Upazila', 'মিরসরাই'),
(76, 43, 'Patiya Upazila', 'পটিয়া'),
(77, 43, 'Rangunia Upazila', 'রাঙ্গুনিয়া'),
(78, 43, 'Raozan Upazila', 'রাউজান'),
(79, 43, 'Sandwip Upazila', 'সন্দ্বীপ'),
(80, 43, 'Satkania Upazila', 'সাতকানিয়া'),
(81, 43, 'Sitakunda Upazila', 'সীতাকুণ্ড'),
(82, 44, 'Barura Upazila', 'বড়ুরা'),
(83, 44, 'Brahmanpara Upazila', 'ব্রাহ্মণপাড়া'),
(84, 44, 'Burichong Upazila', 'বুড়িচং'),
(85, 44, 'Chandina Upazila', 'চান্দিনা'),
(86, 44, 'Chauddagram Upazila', 'চৌদ্দগ্রাম'),
(87, 44, 'Daudkandi Upazila', 'দাউদকান্দি'),
(88, 44, 'Debidwar Upazila', 'দেবীদ্বার'),
(89, 44, 'Homna Upazila', 'হোমনা'),
(90, 44, 'Comilla Sadar Upazila', 'কুমিল্লা সদর'),
(91, 44, 'Laksam Upazila', 'লাকসাম'),
(92, 44, 'Monohorgonj Upazila', 'মনোহরগঞ্জ'),
(93, 44, 'Meghna Upazila', 'মেঘনা'),
(94, 44, 'Muradnagar Upazila', 'মুরাদনগর'),
(95, 44, 'Nangalkot Upazila', 'নাঙ্গালকোট'),
(96, 44, 'Comilla Sadar South Upazila', 'কুমিল্লা সদর দক্ষিণ'),
(97, 44, 'Titas Upazila', 'তিতাস'),
(98, 45, 'Chakaria Upazila', 'চকরিয়া'),
(99, 45, 'Chakaria Upazila', 'চকরিয়া'),
(100, 45, 'Coxs Bazar Sadar Upazila', 'কক্স বাজার সদর'),
(101, 45, 'Kutubdia Upazila', 'কুতুবদিয়া'),
(102, 45, 'Maheshkhali Upazila', 'মহেশখালী'),
(103, 45, 'Ramu Upazila', 'রামু'),
(104, 45, 'Teknaf Upazila', 'টেকনাফ'),
(105, 45, 'Ukhia Upazila', 'উখিয়া'),
(106, 45, 'Pekua Upazila', 'পেকুয়া'),
(107, 46, 'Feni Sadar', 'ফেনী সদর'),
(108, 46, 'Chagalnaiya', 'ছাগল নাইয়া'),
(109, 46, 'Daganbhyan', 'দাগানভিয়া'),
(110, 46, 'Parshuram', 'পরশুরাম'),
(111, 46, 'Fhulgazi', 'ফুলগাজি'),
(112, 46, 'Sonagazi', 'সোনাগাজি'),
(113, 47, 'Dighinala Upazila', 'দিঘিনালা '),
(114, 47, 'Khagrachhari Upazila', 'খাগড়াছড়ি'),
(115, 47, 'Lakshmichhari Upazila', 'লক্ষ্মীছড়ি'),
(116, 47, 'Mahalchhari Upazila', 'মহলছড়ি'),
(117, 47, 'Manikchhari Upazila', 'মানিকছড়ি'),
(118, 47, 'Matiranga Upazila', 'মাটিরাঙ্গা'),
(119, 47, 'Panchhari Upazila', 'পানছড়ি'),
(120, 47, 'Ramgarh Upazila', 'রামগড়'),
(121, 48, 'Lakshmipur Sadar Upazila', 'লক্ষ্মীপুর সদর'),
(122, 48, 'Raipur Upazila', 'রায়পুর'),
(123, 48, 'Ramganj Upazila', 'রামগঞ্জ'),
(124, 48, 'Ramgati Upazila', 'রামগতি'),
(125, 48, 'Komol Nagar Upazila', 'কমল নগর'),
(126, 49, 'Noakhali Sadar Upazila', 'নোয়াখালী সদর'),
(127, 49, 'Begumganj Upazila', 'বেগমগঞ্জ'),
(128, 49, 'Chatkhil Upazila', 'চাটখিল'),
(129, 49, 'Companyganj Upazila', 'কোম্পানীগঞ্জ'),
(130, 49, 'Shenbag Upazila', 'শেনবাগ'),
(131, 49, 'Hatia Upazila', 'হাতিয়া'),
(132, 49, 'Kobirhat Upazila', 'কবিরহাট '),
(133, 49, 'Sonaimuri Upazila', 'সোনাইমুরি'),
(134, 49, 'Suborno Char Upazila', 'সুবর্ণ চর '),
(135, 50, 'Rangamati Sadar Upazila', 'রাঙ্গামাটি সদর'),
(136, 50, 'Belaichhari Upazila', 'বেলাইছড়ি'),
(137, 50, 'Bagaichhari Upazila', 'বাঘাইছড়ি'),
(138, 50, 'Barkal Upazila', 'বরকল'),
(139, 50, 'Juraichhari Upazila', 'জুরাইছড়ি'),
(140, 50, 'Rajasthali Upazila', 'রাজাস্থলি'),
(141, 50, 'Kaptai Upazila', 'কাপ্তাই'),
(142, 50, 'Langadu Upazila', 'লাঙ্গাডু'),
(143, 50, 'Nannerchar Upazila', 'নান্নেরচর '),
(144, 50, 'Kaukhali Upazila', 'কাউখালি'),
(145, 1, 'Dhamrai Upazila', 'ধামরাই'),
(146, 1, 'Dohar Upazila', 'দোহার'),
(147, 1, 'Keraniganj Upazila', 'কেরানীগঞ্জ'),
(148, 1, 'Nawabganj Upazila', 'নবাবগঞ্জ'),
(149, 1, 'Savar Upazila', 'সাভার'),
(150, 2, 'Faridpur Sadar Upazila', 'ফরিদপুর সদর'),
(151, 2, 'Boalmari Upazila', 'বোয়ালমারী'),
(152, 2, 'Alfadanga Upazila', 'আলফাডাঙ্গা'),
(153, 2, 'Madhukhali Upazila', 'মধুখালি'),
(154, 2, 'Bhanga Upazila', 'ভাঙ্গা'),
(155, 2, 'Nagarkanda Upazila', 'নগরকান্ড'),
(156, 2, 'Charbhadrasan Upazila', 'চরভদ্রাসন '),
(157, 2, 'Sadarpur Upazila', 'সদরপুর'),
(158, 2, 'Shaltha Upazila', 'শালথা'),
(159, 3, 'Gazipur Sadar-Joydebpur', 'গাজীপুর সদর'),
(160, 3, 'Kaliakior', 'কালিয়াকৈর'),
(161, 3, 'Kapasia', 'কাপাসিয়া'),
(162, 3, 'Sripur', 'শ্রীপুর'),
(163, 3, 'Kaliganj', 'কালীগঞ্জ'),
(164, 3, 'Tongi', 'টঙ্গি'),
(165, 4, 'Gopalganj Sadar Upazila', 'গোপালগঞ্জ সদর'),
(166, 4, 'Kashiani Upazila', 'কাশিয়ানি'),
(167, 4, 'Kotalipara Upazila', 'কোটালিপাড়া'),
(168, 4, 'Muksudpur Upazila', 'মুকসুদপুর'),
(169, 4, 'Tungipara Upazila', 'টুঙ্গিপাড়া'),
(170, 5, 'Dewanganj Upazila', 'দেওয়ানগঞ্জ'),
(171, 5, 'Baksiganj Upazila', 'বকসিগঞ্জ'),
(172, 5, 'Islampur Upazila', 'ইসলামপুর'),
(173, 5, 'Jamalpur Sadar Upazila', 'জামালপুর সদর'),
(174, 5, 'Madarganj Upazila', 'মাদারগঞ্জ'),
(175, 5, 'Melandaha Upazila', 'মেলানদাহা'),
(176, 5, 'Sarishabari Upazila', 'সরিষাবাড়ি '),
(177, 5, 'Narundi Police I.C', 'নারুন্দি'),
(178, 6, 'Astagram Upazila', 'অষ্টগ্রাম'),
(179, 6, 'Bajitpur Upazila', 'বাজিতপুর'),
(180, 6, 'Bhairab Upazila', 'ভৈরব'),
(181, 6, 'Hossainpur Upazila', 'হোসেনপুর '),
(182, 6, 'Itna Upazila', 'ইটনা'),
(183, 6, 'Karimganj Upazila', 'করিমগঞ্জ'),
(184, 6, 'Katiadi Upazila', 'কতিয়াদি'),
(185, 6, 'Kishoreganj Sadar Upazila', 'কিশোরগঞ্জ সদর'),
(186, 6, 'Kuliarchar Upazila', 'কুলিয়ারচর'),
(187, 6, 'Mithamain Upazila', 'মিঠামাইন'),
(188, 6, 'Nikli Upazila', 'নিকলি'),
(189, 6, 'Pakundia Upazila', 'পাকুন্ডা'),
(190, 6, 'Tarail Upazila', 'তাড়াইল'),
(191, 7, 'Madaripur Sadar', 'মাদারীপুর সদর'),
(192, 7, 'Kalkini', 'কালকিনি'),
(193, 7, 'Rajoir', 'রাজইর'),
(194, 7, 'Shibchar', 'শিবচর'),
(195, 8, 'Manikganj Sadar Upazila', 'মানিকগঞ্জ সদর'),
(196, 8, 'Singair Upazila', 'সিঙ্গাইর'),
(197, 8, 'Shibalaya Upazila', 'শিবালয়'),
(198, 8, 'Saturia Upazila', 'সাঠুরিয়া'),
(199, 8, 'Harirampur Upazila', 'হরিরামপুর'),
(200, 8, 'Ghior Upazila', 'ঘিওর'),
(201, 8, 'Daulatpur Upazila', 'দৌলতপুর'),
(202, 9, 'Lohajang Upazila', 'লোহাজং'),
(203, 9, 'Sreenagar Upazila', 'শ্রীনগর'),
(204, 9, 'Munshiganj Sadar Upazila', 'মুন্সিগঞ্জ সদর'),
(205, 9, 'Sirajdikhan Upazila', 'সিরাজদিখান'),
(206, 9, 'Tongibari Upazila', 'টঙ্গিবাড়ি'),
(207, 9, 'Gazaria Upazila', 'গজারিয়া'),
(208, 10, 'Bhaluka', 'ভালুকা'),
(209, 10, 'Trishal', 'ত্রিশাল'),
(210, 10, 'Haluaghat', 'হালুয়াঘাট'),
(211, 10, 'Muktagachha', 'মুক্তাগাছা'),
(212, 10, 'Dhobaura', 'ধবারুয়া'),
(213, 10, 'Fulbaria', 'ফুলবাড়িয়া'),
(214, 10, 'Gaffargaon', 'গফরগাঁও'),
(215, 10, 'Gauripur', 'গৌরিপুর'),
(216, 10, 'Ishwarganj', 'ঈশ্বরগঞ্জ'),
(217, 10, 'Mymensingh Sadar', 'ময়মনসিং সদর'),
(218, 10, 'Nandail', 'নন্দাইল'),
(219, 10, 'Phulpur', 'ফুলপুর'),
(220, 11, 'Araihazar Upazila', 'আড়াইহাজার'),
(221, 11, 'Sonargaon Upazila', 'সোনারগাঁও'),
(222, 11, 'Bandar', 'বান্দার'),
(223, 11, 'Naryanganj Sadar Upazila', 'নারায়ানগঞ্জ সদর'),
(224, 11, 'Rupganj Upazila', 'রূপগঞ্জ'),
(225, 11, 'Siddirgonj Upazila', 'সিদ্ধিরগঞ্জ'),
(226, 12, 'Belabo Upazila', 'বেলাবো'),
(227, 12, 'Monohardi Upazila', 'মনোহরদি'),
(228, 12, 'Narsingdi Sadar Upazila', 'নরসিংদী সদর'),
(229, 12, 'Palash Upazila', 'পলাশ'),
(230, 12, 'Raipura Upazila, Narsingdi', 'রায়পুর'),
(231, 12, 'Shibpur Upazila', 'শিবপুর'),
(232, 13, 'Kendua Upazilla', 'কেন্দুয়া'),
(233, 13, 'Atpara Upazilla', 'আটপাড়া'),
(234, 13, 'Barhatta Upazilla', 'বরহাট্টা'),
(235, 13, 'Durgapur Upazilla', 'দুর্গাপুর'),
(236, 13, 'Kalmakanda Upazilla', 'কলমাকান্দা'),
(237, 13, 'Madan Upazilla', 'মদন'),
(238, 13, 'Mohanganj Upazilla', 'মোহনগঞ্জ'),
(239, 13, 'Netrakona-S Upazilla', 'নেত্রকোনা সদর'),
(240, 13, 'Purbadhala Upazilla', 'পূর্বধলা'),
(241, 13, 'Khaliajuri Upazilla', 'খালিয়াজুরি'),
(242, 14, 'Baliakandi Upazila', 'বালিয়াকান্দি'),
(243, 14, 'Goalandaghat Upazila', 'গোয়ালন্দ ঘাট'),
(244, 14, 'Pangsha Upazila', 'পাংশা'),
(245, 14, 'Kalukhali Upazila', 'কালুখালি'),
(246, 14, 'Rajbari Sadar Upazila', 'রাজবাড়ি সদর'),
(247, 15, 'Shariatpur Sadar -Palong', 'শরীয়তপুর সদর '),
(248, 15, 'Damudya Upazila', 'দামুদিয়া'),
(249, 15, 'Naria Upazila', 'নড়িয়া'),
(250, 15, 'Jajira Upazila', 'জাজিরা'),
(251, 15, 'Bhedarganj Upazila', 'ভেদারগঞ্জ'),
(252, 15, 'Gosairhat Upazila', 'গোসাইর হাট '),
(253, 16, 'Jhenaigati Upazila', 'ঝিনাইগাতি'),
(254, 16, 'Nakla Upazila', 'নাকলা'),
(255, 16, 'Nalitabari Upazila', 'নালিতাবাড়ি'),
(256, 16, 'Sherpur Sadar Upazila', 'শেরপুর সদর'),
(257, 16, 'Sreebardi Upazila', 'শ্রীবরদি'),
(258, 17, 'Tangail Sadar Upazila', 'টাঙ্গাইল সদর'),
(259, 17, 'Sakhipur Upazila', 'সখিপুর'),
(260, 17, 'Basail Upazila', 'বসাইল'),
(261, 17, 'Madhupur Upazila', 'মধুপুর'),
(262, 17, 'Ghatail Upazila', 'ঘাটাইল'),
(263, 17, 'Kalihati Upazila', 'কালিহাতি'),
(264, 17, 'Nagarpur Upazila', 'নগরপুর'),
(265, 17, 'Mirzapur Upazila', 'মির্জাপুর'),
(266, 17, 'Gopalpur Upazila', 'গোপালপুর'),
(267, 17, 'Delduar Upazila', 'দেলদুয়ার'),
(268, 17, 'Bhuapur Upazila', 'ভুয়াপুর'),
(269, 17, 'Dhanbari Upazila', 'ধানবাড়ি'),
(270, 55, 'Bagerhat Sadar Upazila', 'বাগেরহাট সদর'),
(271, 55, 'Chitalmari Upazila', 'চিতলমাড়ি'),
(272, 55, 'Fakirhat Upazila', 'ফকিরহাট'),
(273, 55, 'Kachua Upazila', 'কচুয়া'),
(274, 55, 'Mollahat Upazila', 'মোল্লাহাট '),
(275, 55, 'Mongla Upazila', 'মংলা'),
(276, 55, 'Morrelganj Upazila', 'মরেলগঞ্জ'),
(277, 55, 'Rampal Upazila', 'রামপাল'),
(278, 55, 'Sarankhola Upazila', 'স্মরণখোলা'),
(279, 56, 'Damurhuda Upazila', 'দামুরহুদা'),
(280, 56, 'Chuadanga-S Upazila', 'চুয়াডাঙ্গা সদর'),
(281, 56, 'Jibannagar Upazila', 'জীবন নগর '),
(282, 56, 'Alamdanga Upazila', 'আলমডাঙ্গা'),
(283, 57, 'Abhaynagar Upazila', 'অভয়নগর'),
(284, 57, 'Keshabpur Upazila', 'কেশবপুর'),
(285, 57, 'Bagherpara Upazila', 'বাঘের পাড়া '),
(286, 57, 'Jessore Sadar Upazila', 'যশোর সদর'),
(287, 57, 'Chaugachha Upazila', 'চৌগাছা'),
(288, 57, 'Manirampur Upazila', 'মনিরামপুর '),
(289, 57, 'Jhikargachha Upazila', 'ঝিকরগাছা'),
(290, 57, 'Sharsha Upazila', 'সারশা'),
(291, 58, 'Jhenaidah Sadar Upazila', 'ঝিনাইদহ সদর'),
(292, 58, 'Maheshpur Upazila', 'মহেশপুর'),
(293, 58, 'Kaliganj Upazila', 'কালীগঞ্জ'),
(294, 58, 'Kotchandpur Upazila', 'কোট চাঁদপুর '),
(295, 58, 'Shailkupa Upazila', 'শৈলকুপা'),
(296, 58, 'Harinakunda Upazila', 'হাড়িনাকুন্দা'),
(297, 59, 'Terokhada Upazila', 'তেরোখাদা'),
(298, 59, 'Batiaghata Upazila', 'বাটিয়াঘাটা '),
(299, 59, 'Dacope Upazila', 'ডাকপে'),
(300, 59, 'Dumuria Upazila', 'ডুমুরিয়া'),
(301, 59, 'Dighalia Upazila', 'দিঘলিয়া'),
(302, 59, 'Koyra Upazila', 'কয়ড়া'),
(303, 59, 'Paikgachha Upazila', 'পাইকগাছা'),
(304, 59, 'Phultala Upazila', 'ফুলতলা'),
(305, 59, 'Rupsa Upazila', 'রূপসা'),
(306, 60, 'Kushtia Sadar', 'কুষ্টিয়া সদর'),
(307, 60, 'Kumarkhali', 'কুমারখালি'),
(308, 60, 'Daulatpur', 'দৌলতপুর'),
(309, 60, 'Mirpur', 'মিরপুর'),
(310, 60, 'Bheramara', 'ভেরামারা'),
(311, 60, 'Khoksa', 'খোকসা'),
(312, 61, 'Magura Sadar Upazila', 'মাগুরা সদর'),
(313, 61, 'Mohammadpur Upazila', 'মোহাম্মাদপুর'),
(314, 61, 'Shalikha Upazila', 'শালিখা'),
(315, 61, 'Sreepur Upazila', 'শ্রীপুর'),
(316, 62, 'angni Upazila', 'আংনি'),
(317, 62, 'Mujib Nagar Upazila', 'মুজিব নগর'),
(318, 62, 'Meherpur-S Upazila', 'মেহেরপুর সদর'),
(319, 63, 'Narail-S Upazilla', 'নড়াইল সদর'),
(320, 63, 'Lohagara Upazilla', 'লোহাগাড়া'),
(321, 63, 'Kalia Upazilla', 'কালিয়া'),
(322, 64, 'Satkhira Sadar Upazila', 'সাতক্ষীরা সদর'),
(323, 64, 'Assasuni Upazila', 'আসসাশুনি '),
(324, 64, 'Debhata Upazila', 'দেভাটা'),
(325, 64, 'Tala Upazila', 'তালা'),
(326, 64, 'Kalaroa Upazila', 'কলরোয়া'),
(327, 64, 'Kaliganj Upazila', 'কালীগঞ্জ'),
(328, 64, 'Shyamnagar Upazila', 'শ্যামনগর'),
(329, 18, 'Adamdighi', 'আদমদিঘী'),
(330, 18, 'Bogra Sadar', 'বগুড়া সদর'),
(331, 18, 'Sherpur', 'শেরপুর'),
(332, 18, 'Dhunat', 'ধুনট'),
(333, 18, 'Dhupchanchia', 'দুপচাচিয়া'),
(334, 18, 'Gabtali', 'গাবতলি'),
(335, 18, 'Kahaloo', 'কাহালু'),
(336, 18, 'Nandigram', 'নন্দিগ্রাম'),
(337, 18, 'Sahajanpur', 'শাহজাহানপুর'),
(338, 18, 'Sariakandi', 'সারিয়াকান্দি'),
(339, 18, 'Shibganj', 'শিবগঞ্জ'),
(340, 18, 'Sonatala', 'সোনাতলা'),
(341, 19, 'Joypurhat S', 'জয়পুরহাট সদর'),
(342, 19, 'Akkelpur', 'আক্কেলপুর'),
(343, 19, 'Kalai', 'কালাই'),
(344, 19, 'Khetlal', 'খেতলাল'),
(345, 19, 'Panchbibi', 'পাঁচবিবি'),
(346, 20, 'Naogaon Sadar Upazila', 'নওগাঁ সদর'),
(347, 20, 'Mohadevpur Upazila', 'মহাদেবপুর'),
(348, 20, 'Manda Upazila', 'মান্দা'),
(349, 20, 'Niamatpur Upazila', 'নিয়ামতপুর'),
(350, 20, 'Atrai Upazila', 'আত্রাই'),
(351, 20, 'Raninagar Upazila', 'রাণীনগর'),
(352, 20, 'Patnitala Upazila', 'পত্নীতলা'),
(353, 20, 'Dhamoirhat Upazila', 'ধামইরহাট '),
(354, 20, 'Sapahar Upazila', 'সাপাহার'),
(355, 20, 'Porsha Upazila', 'পোরশা'),
(356, 20, 'Badalgachhi Upazila', 'বদলগাছি'),
(357, 21, 'Natore Sadar Upazila', 'নাটোর সদর'),
(358, 21, 'Baraigram Upazila', 'বড়াইগ্রাম'),
(359, 21, 'Bagatipara Upazila', 'বাগাতিপাড়া'),
(360, 21, 'Lalpur Upazila', 'লালপুর'),
(361, 21, 'Natore Sadar Upazila', 'নাটোর সদর'),
(362, 21, 'Baraigram Upazila', 'বড়াই গ্রাম'),
(363, 22, 'Bholahat Upazila', 'ভোলাহাট'),
(364, 22, 'Gomastapur Upazila', 'গোমস্তাপুর'),
(365, 22, 'Nachole Upazila', 'নাচোল'),
(366, 22, 'Nawabganj Sadar Upazila', 'নবাবগঞ্জ সদর'),
(367, 22, 'Shibganj Upazila', 'শিবগঞ্জ'),
(368, 23, 'Atgharia Upazila', 'আটঘরিয়া'),
(369, 23, 'Bera Upazila', 'বেড়া'),
(370, 23, 'Bhangura Upazila', 'ভাঙ্গুরা'),
(371, 23, 'Chatmohar Upazila', 'চাটমোহর'),
(372, 23, 'Faridpur Upazila', 'ফরিদপুর'),
(373, 23, 'Ishwardi Upazila', 'ঈশ্বরদী'),
(374, 23, 'Pabna Sadar Upazila', 'পাবনা সদর'),
(375, 23, 'Santhia Upazila', 'সাথিয়া'),
(376, 23, 'Sujanagar Upazila', 'সুজানগর'),
(377, 24, 'Bagha', 'বাঘা'),
(378, 24, 'Bagmara', 'বাগমারা'),
(379, 24, 'Charghat', 'চারঘাট'),
(380, 24, 'Durgapur', 'দুর্গাপুর'),
(381, 24, 'Godagari', 'গোদাগারি'),
(382, 24, 'Mohanpur', 'মোহনপুর'),
(383, 24, 'Paba', 'পবা'),
(384, 24, 'Puthia', 'পুঠিয়া'),
(385, 24, 'Tanore', 'তানোর'),
(386, 25, 'Sirajganj Sadar Upazila', 'সিরাজগঞ্জ সদর'),
(387, 25, 'Belkuchi Upazila', 'বেলকুচি'),
(388, 25, 'Chauhali Upazila', 'চৌহালি'),
(389, 25, 'Kamarkhanda Upazila', 'কামারখান্দা'),
(390, 25, 'Kazipur Upazila', 'কাজীপুর'),
(391, 25, 'Raiganj Upazila', 'রায়গঞ্জ'),
(392, 25, 'Shahjadpur Upazila', 'শাহজাদপুর'),
(393, 25, 'Tarash Upazila', 'তারাশ'),
(394, 25, 'Ullahpara Upazila', 'উল্লাপাড়া'),
(395, 26, 'Birampur Upazila', 'বিরামপুর'),
(396, 26, 'Birganj', 'বীরগঞ্জ'),
(397, 26, 'Biral Upazila', 'বিড়াল'),
(398, 26, 'Bochaganj Upazila', 'বোচাগঞ্জ'),
(399, 26, 'Chirirbandar Upazila', 'চিরিরবন্দর'),
(400, 26, 'Phulbari Upazila', 'ফুলবাড়ি'),
(401, 26, 'Ghoraghat Upazila', 'ঘোড়াঘাট'),
(402, 26, 'Hakimpur Upazila', 'হাকিমপুর'),
(403, 26, 'Kaharole Upazila', 'কাহারোল'),
(404, 26, 'Khansama Upazila', 'খানসামা'),
(405, 26, 'Dinajpur Sadar Upazila', 'দিনাজপুর সদর'),
(406, 26, 'Nawabganj', 'নবাবগঞ্জ'),
(407, 26, 'Parbatipur Upazila', 'পার্বতীপুর'),
(408, 27, 'Fulchhari', 'ফুলছড়ি'),
(409, 27, 'Gaibandha sadar', 'গাইবান্ধা সদর'),
(410, 27, 'Gobindaganj', 'গোবিন্দগঞ্জ'),
(411, 27, 'Palashbari', 'পলাশবাড়ী'),
(412, 27, 'Sadullapur', 'সাদুল্যাপুর'),
(413, 27, 'Saghata', 'সাঘাটা'),
(414, 27, 'Sundarganj', 'সুন্দরগঞ্জ'),
(415, 28, 'Kurigram Sadar', 'কুড়িগ্রাম সদর'),
(416, 28, 'Nageshwari', 'নাগেশ্বরী'),
(417, 28, 'Bhurungamari', 'ভুরুঙ্গামারি'),
(418, 28, 'Phulbari', 'ফুলবাড়ি'),
(419, 28, 'Rajarhat', 'রাজারহাট'),
(420, 28, 'Ulipur', 'উলিপুর'),
(421, 28, 'Chilmari', 'চিলমারি'),
(422, 28, 'Rowmari', 'রউমারি'),
(423, 28, 'Char Rajibpur', 'চর রাজিবপুর'),
(424, 29, 'Lalmanirhat Sadar', 'লালমনিরহাট সদর'),
(425, 29, 'Aditmari', 'আদিতমারি'),
(426, 29, 'Kaliganj', 'কালীগঞ্জ'),
(427, 29, 'Hatibandha', 'হাতিবান্ধা'),
(428, 29, 'Patgram', 'পাটগ্রাম'),
(429, 30, 'Nilphamari Sadar', 'নীলফামারী সদর'),
(430, 30, 'Saidpur', 'সৈয়দপুর'),
(431, 30, 'Jaldhaka', 'জলঢাকা'),
(432, 30, 'Kishoreganj', 'কিশোরগঞ্জ'),
(433, 30, 'Domar', 'ডোমার'),
(434, 30, 'Dimla', 'ডিমলা'),
(435, 31, 'Panchagarh Sadar', 'পঞ্চগড় সদর'),
(436, 31, 'Debiganj', 'দেবীগঞ্জ'),
(437, 31, 'Boda', 'বোদা'),
(438, 31, 'Atwari', 'আটোয়ারি'),
(439, 31, 'Tetulia', 'তেতুলিয়া'),
(440, 32, 'Badarganj', 'বদরগঞ্জ'),
(441, 32, 'Mithapukur', 'মিঠাপুকুর'),
(442, 32, 'Gangachara', 'গঙ্গাচরা'),
(443, 32, 'Kaunia', 'কাউনিয়া'),
(444, 32, 'Rangpur Sadar', 'রংপুর সদর'),
(445, 32, 'Pirgachha', 'পীরগাছা'),
(446, 32, 'Pirganj', 'পীরগঞ্জ'),
(447, 32, 'Taraganj', 'তারাগঞ্জ'),
(448, 33, 'Thakurgaon Sadar Upazila', 'ঠাকুরগাঁও সদর'),
(449, 33, 'Pirganj Upazila', 'পীরগঞ্জ'),
(450, 33, 'Baliadangi Upazila', 'বালিয়াডাঙ্গি'),
(451, 33, 'Haripur Upazila', 'হরিপুর'),
(452, 33, 'Ranisankail Upazila', 'রাণীসংকইল'),
(453, 51, 'Ajmiriganj', 'আজমিরিগঞ্জ'),
(454, 51, 'Baniachang', 'বানিয়াচং'),
(455, 51, 'Bahubal', 'বাহুবল'),
(456, 51, 'Chunarughat', 'চুনারুঘাট'),
(457, 51, 'Habiganj Sadar', 'হবিগঞ্জ সদর'),
(458, 51, 'Lakhai', 'লাক্ষাই'),
(459, 51, 'Madhabpur', 'মাধবপুর'),
(460, 51, 'Nabiganj', 'নবীগঞ্জ'),
(461, 51, 'Shaistagonj Upazila', 'শায়েস্তাগঞ্জ'),
(462, 52, 'Moulvibazar Sadar', 'মৌলভীবাজার'),
(463, 52, 'Barlekha', 'বড়লেখা'),
(464, 52, 'Juri', 'জুড়ি'),
(465, 52, 'Kamalganj', 'কামালগঞ্জ'),
(466, 52, 'Kulaura', 'কুলাউরা'),
(467, 52, 'Rajnagar', 'রাজনগর'),
(468, 52, 'Sreemangal', 'শ্রীমঙ্গল'),
(469, 53, 'Bishwamvarpur', 'বিসশম্ভারপুর'),
(470, 53, 'Chhatak', 'ছাতক'),
(471, 53, 'Derai', 'দেড়াই'),
(472, 53, 'Dharampasha', 'ধরমপাশা'),
(473, 53, 'Dowarabazar', 'দোয়ারাবাজার'),
(474, 53, 'Jagannathpur', 'জগন্নাথপুর'),
(475, 53, 'Jamalganj', 'জামালগঞ্জ'),
(476, 53, 'Sulla', 'সুল্লা'),
(477, 53, 'Sunamganj Sadar', 'সুনামগঞ্জ সদর'),
(478, 53, 'Shanthiganj', 'শান্তিগঞ্জ'),
(479, 53, 'Tahirpur', 'তাহিরপুর'),
(480, 54, 'Sylhet Sadar', 'সিলেট সদর'),
(481, 54, 'Beanibazar', 'বেয়ানিবাজার'),
(482, 54, 'Bishwanath', 'বিশ্বনাথ'),
(483, 54, 'Dakshin Surma Upazila', 'দক্ষিণ সুরমা'),
(484, 54, 'Balaganj', 'বালাগঞ্জ'),
(485, 54, 'Companiganj', 'কোম্পানিগঞ্জ'),
(486, 54, 'Fenchuganj', 'ফেঞ্চুগঞ্জ'),
(487, 54, 'Golapganj', 'গোলাপগঞ্জ'),
(488, 54, 'Gowainghat', 'গোয়াইনঘাট'),
(489, 54, 'Jaintiapur', 'জয়ন্তপুর'),
(490, 54, 'Kanaighat', 'কানাইঘাট'),
(491, 54, 'Zakiganj', 'জাকিগঞ্জ'),
(492, 54, 'Nobigonj', 'নবীগঞ্জ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `randomcode` bigint(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` bigint(100) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` bigint(100) unsigned DEFAULT NULL,
  `last_login` bigint(100) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `full_name_bn` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `full_name_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `father_name_bn` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `father_name_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother_name_bn` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother_name_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=106224 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `randomcode`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `full_name_bn`, `full_name_en`, `father_name_bn`, `father_name_en`, `mother_name_bn`, `mother_name_en`, `company`, `phone`) VALUES
(1357, '', '', 0, '$2y$08$t9eZY2D9on7Qa44eDk6MYOdP823b0diJ/ZiXHdf0OU26UIdRhuRZm', NULL, 'skydotint@gmail.com', NULL, NULL, NULL, 'hKN2ytzPvIRI60ESN9imMe', 1268889823, 1474360019, 1, 'Tritiyo', 'Limited', 'Tritiyo Limited', 'Tritiyo Limited', 'Badruzzaman Khan', 'Badruzzaman Khan', 'Shahinazzaman Khan', 'Shahinazzaman Khan', 'Tritiyo Limited', '01821660066'),
(106223, '192.168.1.242', 'administrator', 0, '$2y$08$ZWAKZ0EXWqUEDNO34Pzwl.D07V4EQCUFRmAdTyX8Sl/pir0nsCaMa', '', 'admin@admin.com', '', NULL, NULL, 'hKN2ytzPvIRI60ESN9imMe', 1268889823, 1472982724, 1, 'Samrat', 'Altab', 'Samrat Khan', 'Samrat Khan', 'Samrat Khan', 'Samrat Khan', 'Samrat Khan', 'Samrat Khan', 'Idea Tweaker Ltd.', '1680139540');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` bigint(100) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(100) unsigned DEFAULT NULL,
  `group_id` mediumint(8) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(2, 1357, 1),
(1, 106223, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_relation`
--

CREATE TABLE IF NOT EXISTS `users_relation` (
  `RelationId` bigint(100) NOT NULL AUTO_INCREMENT,
  `GuardianId` bigint(100) DEFAULT NULL,
  `StudentId` bigint(100) DEFAULT NULL,
  PRIMARY KEY (`RelationId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users_relation`
--

INSERT INTO `users_relation` (`RelationId`, `GuardianId`, `StudentId`) VALUES
(1, 12345, 161013180);

-- --------------------------------------------------------

--
-- Table structure for table `u_basicinfocriteria`
--

CREATE TABLE IF NOT EXISTS `u_basicinfocriteria` (
  `CriteriaId` bigint(100) NOT NULL AUTO_INCREMENT,
  `CriteriaName` varchar(50) DEFAULT NULL,
  `CriteriaDescription` varchar(50) DEFAULT NULL,
  `Sorting` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`CriteriaId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=20 ;

--
-- Dumping data for table `u_basicinfocriteria`
--

INSERT INTO `u_basicinfocriteria` (`CriteriaId`, `CriteriaName`, `CriteriaDescription`, `Sorting`) VALUES
(1, 'Home Phone', '', ''),
(2, 'Twitter', '', ''),
(3, 'Facebook', '', ''),
(4, 'Linked In', '', ''),
(5, 'Orkut', '', ''),
(6, 'Google Plus', '', ''),
(7, 'Git Hub', '', ''),
(8, 'JS Fiddle', '', ''),
(9, 'Stack Overflow', '', ''),
(10, 'Cell Phone', '', ''),
(11, 'Youtube', '', ''),
(12, 'Meet up', '', ''),
(13, 'Flickr', '', ''),
(14, 'Tumblr', '', ''),
(15, 'Myspace', '', ''),
(16, 'Website', '', ''),
(17, 'Blog', '', ''),
(18, 'Instagram', '', ''),
(19, 'Pinterest', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `u_basicinfos`
--

CREATE TABLE IF NOT EXISTS `u_basicinfos` (
  `InfosId` bigint(100) NOT NULL AUTO_INCREMENT,
  `UserId` bigint(100) NOT NULL,
  `UniqueNumber` bigint(100) DEFAULT NULL,
  `Gender` int(1) DEFAULT NULL,
  `Religion` varchar(50) DEFAULT NULL,
  `Address` varchar(60) DEFAULT NULL,
  `Upazila` varchar(60) DEFAULT NULL,
  `District` varchar(100) DEFAULT NULL,
  `DateOfBirth` bigint(100) DEFAULT NULL,
  `JoinDate` bigint(100) DEFAULT NULL,
  `BloodGroup` varchar(50) DEFAULT NULL,
  `CountryId` bigint(100) DEFAULT NULL,
  `Biography` text,
  `NewsFeedKeywords` text,
  `UserPhoto` text,
  `UserVideo` text,
  `MaritalStatus` bigint(100) DEFAULT NULL,
  `YearlyIncome` bigint(100) DEFAULT NULL,
  `NewportalURL` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `EnrollmentStatus` bigint(100) DEFAULT NULL,
  PRIMARY KEY (`InfosId`),
  UNIQUE KEY `UserId` (`UserId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `u_businesses`
--

CREATE TABLE IF NOT EXISTS `u_businesses` (
  `BusinessId` bigint(100) NOT NULL AUTO_INCREMENT,
  `UserId` bigint(100) DEFAULT '0',
  `CateogryId` bigint(100) DEFAULT NULL,
  `OrganizationName` varchar(150) DEFAULT NULL,
  `OrganizationURL` varchar(150) DEFAULT NULL,
  `OrganizationCity` varchar(150) DEFAULT NULL,
  `StartDate` bigint(20) DEFAULT NULL,
  `Services` varchar(150) DEFAULT NULL,
  `Notes` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`BusinessId`),
  KEY `UserId` (`UserId`),
  KEY `CateogryId` (`CateogryId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `u_educationhistory`
--

CREATE TABLE IF NOT EXISTS `u_educationhistory` (
  `EducationID` bigint(100) NOT NULL AUTO_INCREMENT,
  `UserId` bigint(100) DEFAULT NULL,
  `InstituteName` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `Degree` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `Concentrations` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `StartDate` bigint(100) DEFAULT NULL,
  `EndDate` bigint(100) DEFAULT NULL,
  `GPA` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `PSession` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `PassingYear` int(11) DEFAULT NULL,
  `Board` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `IsGraduated` bigint(1) DEFAULT NULL,
  PRIMARY KEY (`EducationID`),
  KEY `education_userid` (`UserId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `u_images`
--

CREATE TABLE IF NOT EXISTS `u_images` (
  `ImageId` bigint(100) NOT NULL AUTO_INCREMENT,
  `UserId` bigint(100) NOT NULL,
  `ImageName` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ImageId`),
  KEY `UserId` (`UserId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `u_std_information`
--

CREATE TABLE IF NOT EXISTS `u_std_information` (
  `StudentInfoId` bigint(100) NOT NULL AUTO_INCREMENT,
  `UserId` bigint(100) DEFAULT NULL,
  `Class` bigint(100) DEFAULT NULL,
  `ClassRoll` bigint(100) DEFAULT NULL,
  `Section` bigint(100) DEFAULT NULL,
  `GroupId` bigint(100) DEFAULT NULL,
  `Department` bigint(100) DEFAULT NULL,
  `isActive` int(11) DEFAULT NULL,
  PRIMARY KEY (`StudentInfoId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `u_tchstaff_information`
--

CREATE TABLE IF NOT EXISTS `u_tchstaff_information` (
  `TchStaffId` bigint(100) NOT NULL AUTO_INCREMENT,
  `UserId` bigint(100) DEFAULT NULL,
  `Designation` varchar(255) DEFAULT NULL,
  `SalaryScale` varchar(255) DEFAULT NULL,
  `IndexNumber` varchar(255) DEFAULT NULL,
  `BankAccountNumber` varchar(255) DEFAULT NULL,
  `BankName` varchar(255) DEFAULT NULL,
  `BankBranchName` varchar(255) DEFAULT NULL,
  `DateAttended` varchar(255) DEFAULT NULL,
  `isActive` int(11) DEFAULT NULL,
  PRIMARY KEY (`TchStaffId`),
  UNIQUE KEY `UserId` (`UserId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `u_tchstaff_information`
--

INSERT INTO `u_tchstaff_information` (`TchStaffId`, `UserId`, `Designation`, `SalaryScale`, `IndexNumber`, `BankAccountNumber`, `BankName`, `BankBranchName`, `DateAttended`, `isActive`) VALUES
(1, 201634424, '192', '29000/=', '279579', '0200002246917', 'Agrani Bank Ltd.', 'Ghatail', '1993-01-24', 1),
(2, 201638633, '194', '23000/=', '512547', '2578', 'Agrani Bank Ltd.', 'Ghatail', '2012-01-01', 1),
(3, 201638142, '199', '22000/=', '145421', '0200002244332', 'Agrani Bank Ltd.', 'Ghatail', '1981-12-01', 1),
(4, 201630590, '198', '22000/=', '166403', '0200002244336', 'Agrani Bank Ltd.', 'Ghatail', '1985-07-20', 1),
(5, 201630456, '204', '22000/=', '272127', '4724', 'Agrani Bank Ltd.', 'Ghatail', '1990-08-01', 1),
(6, 201632786, '195', '22000/=', '470396', '0200002244409', 'Agrani Bank Ltd.', 'Ghatail', '1996-08-08', 1),
(7, 201632433, '202', '22000/=', '480236', '7031', 'Agrani Bank Ltd.', 'Ghatail', '2000-04-17', 1),
(8, 201639588, '196', '13250/=', '1118335', '02000013296', 'Agrani Bank Ltd.', 'Ghatail', '2015-01-01', 1),
(9, 201630898, '197', '16000/=', '284733', '0200002244405', 'Agrani Bank Ltd.', 'Ghatail', '1995-07-08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `u_workhistory`
--

CREATE TABLE IF NOT EXISTS `u_workhistory` (
  `WorkId` bigint(100) NOT NULL AUTO_INCREMENT,
  `UserId` bigint(100) DEFAULT NULL,
  `Organization` varchar(150) DEFAULT NULL,
  `Position` varchar(100) DEFAULT NULL,
  `StartDate` bigint(20) DEFAULT NULL,
  `EndDate` bigint(20) DEFAULT NULL,
  `Responsibilities` text,
  PRIMARY KEY (`WorkId`),
  KEY `UserId` (`UserId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=5 ;

--
-- Dumping data for table `u_workhistory`
--

INSERT INTO `u_workhistory` (`WorkId`, `UserId`, `Organization`, `Position`, `StartDate`, `EndDate`, `Responsibilities`) VALUES
(1, 201630590, 'Aushnara High School', 'Asstt.Teacher', 427525200, 490597200, 'Teaching'),
(2, 201634424, 'Maizbari Bagundali Gono High School', 'Asstt.Teacher', 559026000, 710226000, 'Teaching'),
(3, 201634424, 'Ghatail S.E. Girl''s High School', 'Senior Asstt.Teacher', 727855200, 1183179600, 'Teaching'),
(4, 201634424, 'Bhabon Datta Gono High School', 'Asstt. Headmaster', 1183266000, 1325311200, 'Assist the Headmaster');

-- --------------------------------------------------------

--
-- Table structure for table `webpages`
--

CREATE TABLE IF NOT EXISTS `webpages` (
  `PageId` bigint(100) NOT NULL AUTO_INCREMENT,
  `PageTitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PageRoute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SpecificRoutes` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `ParentId` int(11) DEFAULT NULL,
  `PageOrder` int(11) NOT NULL,
  `Description` text COLLATE utf8_unicode_ci,
  `PublishDate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isSpecial` int(11) DEFAULT NULL,
  `isInMenu` int(11) DEFAULT NULL,
  `isActive` int(11) DEFAULT NULL,
  PRIMARY KEY (`PageId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT AUTO_INCREMENT=89 ;

--
-- Dumping data for table `webpages`
--

INSERT INTO `webpages` (`PageId`, `PageTitle`, `PageRoute`, `SpecificRoutes`, `ParentId`, `PageOrder`, `Description`, `PublishDate`, `isSpecial`, `isInMenu`, `isActive`) VALUES
(1, 'আমাদের কথা', 'about-us', NULL, 0, 57, '<!--[if gte mso 9]><xml>\r\n <w:WordDocument>\r\n  <w:View>Normal</w:View>\r\n  <w:Zoom>0</w:Zoom>\r\n  <w:TrackMoves></w:TrackMoves>\r\n  <w:TrackFormatting></w:TrackFormatting>\r\n  <w:PunctuationKerning></w:PunctuationKerning>\r\n  <w:ValidateAgainstSchemas></w:ValidateAgainstSchemas>\r\n  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>\r\n  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>\r\n  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>\r\n  <w:DoNotPromoteQF></w:DoNotPromoteQF>\r\n  <w:LidThemeOther>EN-US</w:LidThemeOther>\r\n  <w:LidThemeAsian>X-NONE</w:LidThemeAsian>\r\n  <w:LidThemeComplexScript>BN</w:LidThemeComplexScript>\r\n  <w:Compatibility>\r\n   <w:BreakWrappedTables></w:BreakWrappedTables>\r\n   <w:SnapToGridInCell></w:SnapToGridInCell>\r\n   <w:WrapTextWithPunct></w:WrapTextWithPunct>\r\n   <w:UseAsianBreakRules></w:UseAsianBreakRules>\r\n   <w:DontGrowAutofit></w:DontGrowAutofit>\r\n   <w:SplitPgBreakAndParaMark></w:SplitPgBreakAndParaMark>\r\n   <w:DontVertAlignCellWithSp></w:DontVertAlignCellWithSp>\r\n   <w:DontBreakConstrainedForcedTables></w:DontBreakConstrainedForcedTables>\r\n   <w:DontVertAlignInTxbx></w:DontVertAlignInTxbx>\r\n   <w:Word11KerningPairs></w:Word11KerningPairs>\r\n   <w:CachedColBalance></w:CachedColBalance>\r\n  </w:Compatibility>\r\n  <w:BrowserLevel>MicrosoftInternetExplorer4</w:BrowserLevel>\r\n  <m:mathPr>\r\n   <m:mathFont m:val="Cambria Math"></m:mathFont>\r\n   <m:brkBin m:val="before"></m:brkBin>\r\n   <m:brkBinSub m:val="--"></m:brkBinSub>\r\n   <m:smallFrac m:val="off"></m:smallFrac>\r\n   <m:dispDef></m:dispDef>\r\n   <m:lMargin m:val="0"></m:lMargin>\r\n   <m:rMargin m:val="0"></m:rMargin>\r\n   <m:defJc m:val="centerGroup"></m:defJc>\r\n   <m:wrapIndent m:val="1440"></m:wrapIndent>\r\n   <m:intLim m:val="subSup"></m:intLim>\r\n   <m:naryLim m:val="undOvr"></m:naryLim>\r\n  </m:mathPr></w:WordDocument>\r\n</xml><![endif]-->\r\n\r\n<p class="MsoNormal"><span style="font-size:16.0pt;line-height:115%;\r\nfont-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;mso-ascii-font-family:Calibri;mso-ascii-theme-font:\r\nminor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin" lang="AR-SA">শিক্ষা\r\nএমন এক প্রজ্জ্বলিত আলো যার পরশে জীবন ঐশ্বর্যমন্ডিত হয় এবং যার</span><span style="font-size:16.0pt;line-height:115%" lang="AR-SA"> </span><span style="font-size:16.0pt;line-height:115%;font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;\r\nmso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:\r\nCalibri;mso-hansi-theme-font:minor-latin" lang="AR-SA">বদৌলতে মানুষ সমাজ জীবনে শ্রদ্ধা ও\r\nসম্মানের পাত্র হিসাবে আদৃত হয়। জীবন</span><span style="font-size:\r\n16.0pt;line-height:115%" lang="AR-SA"> </span><span style="font-size:16.0pt;\r\nline-height:115%;font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;mso-ascii-font-family:Calibri;\r\nmso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:\r\nminor-latin" lang="AR-SA">সন্ধানী পথিককে নিজের গন্তব্যে পৌছানোর একমাত্র অবলম্বন শিক্ষা</span><span style="font-size:16.0pt;line-height:115%">, </span><span style="font-size:16.0pt;line-height:115%;font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;\r\nmso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:\r\nCalibri;mso-hansi-theme-font:minor-latin" lang="AR-SA">শিক্ষা এবং</span><span style="font-size:16.0pt;line-height:115%" lang="AR-SA"> </span><span style="font-size:16.0pt;line-height:115%;font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;\r\nmso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:\r\nCalibri;mso-hansi-theme-font:minor-latin" lang="AR-SA">শিক্ষা। শিক্ষা মানুষের অন্তর আত্মাকে\r\nশুদ্ধ এবং দৃষ্টিশক্তিকে প্রসার করে</span><span style="font-size:\r\n16.0pt;line-height:115%" lang="AR-SA"> </span><span style="font-size:16.0pt;\r\nline-height:115%;font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;mso-ascii-font-family:Calibri;\r\nmso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:\r\nminor-latin" lang="AR-SA">তার ত্রিলোচনকে জাগ্রত করে। শিক্ষা সত্যের অনুসন্ধান করে। বিদ্যা\r\nবিনয় দান</span><span style="font-size:16.0pt;line-height:115%" lang="AR-SA"> </span><span style="font-size:16.0pt;line-height:115%;font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;\r\nmso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:\r\nCalibri;mso-hansi-theme-font:minor-latin" lang="AR-SA">করে। বিদ্যা মানব জীবনের অজ্ঞানতা</span><span style="font-size:16.0pt;line-height:115%">, </span><span style="font-size:16.0pt;line-height:115%;font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;\r\nmso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:\r\nCalibri;mso-hansi-theme-font:minor-latin" lang="AR-SA">কুসংস্কার ও অন্ধকার দূর করে জীবনকে</span><span style="font-size:16.0pt;line-height:115%" lang="AR-SA"> </span><span style="font-size:16.0pt;line-height:115%;font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;\r\nmso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:\r\nCalibri;mso-hansi-theme-font:minor-latin" lang="AR-SA">করে তোলে মহীয়ান ও সুষমামন্ডিত।\r\nবিদ্যার সাহচর্যেই মানবজীবন হয় মোহমুক্ত</span><span style="font-size:16.0pt;\r\nline-height:115%">, </span><span style="font-size:16.0pt;line-height:\r\n115%;font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;mso-ascii-font-family:Calibri;\r\nmso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:\r\nminor-latin" lang="AR-SA">সতেজ ও আনন্দপূর্ণ। মানবজীবনকে সুন্দর সতেজ ও সাবলীল করে গড়ে তুলতে\r\nহলে</span><span style="font-size:16.0pt;line-height:115%" lang="AR-SA"> </span><span style="font-size:16.0pt;line-height:115%;font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;\r\nmso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:\r\nCalibri;mso-hansi-theme-font:minor-latin" lang="AR-SA">শিক্ষাকে অবশ্যই জীবনধর্মী হতে হবে।</span></p><p class="MsoNormal"><span style="font-size:16.0pt;line-height:115%;font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;\r\nmso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:\r\nCalibri;mso-hansi-theme-font:minor-latin" lang="AR-SA">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; প্রধান শিক্ষক।</span><br><span style="font-size:16.0pt;line-height:115%;font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;\r\nmso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:\r\nCalibri;mso-hansi-theme-font:minor-latin" lang="AR-SA"></span><span style="font-size:16.0pt;line-height:115%;font-family:SutonnyMJ"></span></p>\r\n\r\n<!--[if gte mso 9]><xml>\r\n <w:LatentStyles DefLockedState="false" DefUnhideWhenUsed="true"\r\n  DefSemiHidden="true" DefQFormat="false" DefPriority="99"\r\n  LatentStyleCount="267">\r\n  <w:LsdException Locked="false" Priority="0" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Normal"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="heading 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 7"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 8"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 9"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 7"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 8"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 9"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="35" QFormat="true" Name="caption"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="10" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Title"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="1" Name="Default Paragraph Font"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="11" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Subtitle"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="22" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Strong"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="20" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Emphasis"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="59" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Table Grid"></w:LsdException>\r\n  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Placeholder Text"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="1" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="No Spacing"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Revision"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="34" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="List Paragraph"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="29" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Quote"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="30" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Intense Quote"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="19" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Subtle Emphasis"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="21" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Intense Emphasis"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="31" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Subtle Reference"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="32" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Intense Reference"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="33" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Book Title"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="37" Name="Bibliography"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" QFormat="true" Name="TOC Heading"></w:LsdException>\r\n </w:LatentStyles>\r\n</xml><![endif]--><!--[if gte mso 10]>\r\n<style>\r\n /* Style Definitions */\r\n table.MsoNormalTable\r\n	{mso-style-name:"Table Normal";\r\n	mso-tstyle-rowband-size:0;\r\n	mso-tstyle-colband-size:0;\r\n	mso-style-noshow:yes;\r\n	mso-style-priority:99;\r\n	mso-style-qformat:yes;\r\n	mso-style-parent:"";\r\n	mso-padding-alt:0in 5.4pt 0in 5.4pt;\r\n	mso-para-margin-top:0in;\r\n	mso-para-margin-right:0in;\r\n	mso-para-margin-bottom:10.0pt;\r\n	mso-para-margin-left:0in;\r\n	line-height:115%;\r\n	mso-pagination:widow-orphan;\r\n	font-size:11.0pt;\r\n	mso-bidi-font-size:14.0pt;\r\n	font-family:"Calibri","sans-serif";\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-fareast-font-family:"Times New Roman";\r\n	mso-fareast-theme-font:minor-fareast;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:Vrinda;\r\n	mso-bidi-theme-font:minor-bidi;}\r\n</style>\r\n<![endif]-->', '2015-06-09', 0, 1, 1);
INSERT INTO `webpages` (`PageId`, `PageTitle`, `PageRoute`, `SpecificRoutes`, `ParentId`, `PageOrder`, `Description`, `PublishDate`, `isSpecial`, `isInMenu`, `isActive`) VALUES
(2, 'প্রশাসন', 'Administration', NULL, 0, 57, '<p><!--[if gte mso 9]><xml>\r\n <w:WordDocument>\r\n  <w:View>Normal</w:View>\r\n  <w:Zoom>0</w:Zoom>\r\n  <w:TrackMoves></w:TrackMoves>\r\n  <w:TrackFormatting></w:TrackFormatting>\r\n  <w:PunctuationKerning></w:PunctuationKerning>\r\n  <w:ValidateAgainstSchemas></w:ValidateAgainstSchemas>\r\n  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>\r\n  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>\r\n  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>\r\n  <w:DoNotPromoteQF></w:DoNotPromoteQF>\r\n  <w:LidThemeOther>EN-US</w:LidThemeOther>\r\n  <w:LidThemeAsian>X-NONE</w:LidThemeAsian>\r\n  <w:LidThemeComplexScript>BN</w:LidThemeComplexScript>\r\n  <w:Compatibility>\r\n   <w:BreakWrappedTables></w:BreakWrappedTables>\r\n   <w:SnapToGridInCell></w:SnapToGridInCell>\r\n   <w:WrapTextWithPunct></w:WrapTextWithPunct>\r\n   <w:UseAsianBreakRules></w:UseAsianBreakRules>\r\n   <w:DontGrowAutofit></w:DontGrowAutofit>\r\n   <w:SplitPgBreakAndParaMark></w:SplitPgBreakAndParaMark>\r\n   <w:DontVertAlignCellWithSp></w:DontVertAlignCellWithSp>\r\n   <w:DontBreakConstrainedForcedTables></w:DontBreakConstrainedForcedTables>\r\n   <w:DontVertAlignInTxbx></w:DontVertAlignInTxbx>\r\n   <w:Word11KerningPairs></w:Word11KerningPairs>\r\n   <w:CachedColBalance></w:CachedColBalance>\r\n  </w:Compatibility>\r\n  <w:BrowserLevel>MicrosoftInternetExplorer4</w:BrowserLevel>\r\n  <m:mathPr>\r\n   <m:mathFont m:val="Cambria Math"></m:mathFont>\r\n   <m:brkBin m:val="before"></m:brkBin>\r\n   <m:brkBinSub m:val="--"></m:brkBinSub>\r\n   <m:smallFrac m:val="off"></m:smallFrac>\r\n   <m:dispDef></m:dispDef>\r\n   <m:lMargin m:val="0"></m:lMargin>\r\n   <m:rMargin m:val="0"></m:rMargin>\r\n   <m:defJc m:val="centerGroup"></m:defJc>\r\n   <m:wrapIndent m:val="1440"></m:wrapIndent>\r\n   <m:intLim m:val="subSup"></m:intLim>\r\n   <m:naryLim m:val="undOvr"></m:naryLim>\r\n  </m:mathPr></w:WordDocument>\r\n</xml><![endif]--></p><p><!--[if gte mso 9]><xml>\r\n <w:LatentStyles DefLockedState="false" DefUnhideWhenUsed="true"\r\n  DefSemiHidden="true" DefQFormat="false" DefPriority="99"\r\n  LatentStyleCount="267">\r\n  <w:LsdException Locked="false" Priority="0" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Normal"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="heading 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 7"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 8"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 9"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 7"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 8"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 9"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="35" QFormat="true" Name="caption"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="10" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Title"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="1" Name="Default Paragraph Font"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="11" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Subtitle"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="22" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Strong"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="20" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Emphasis"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="59" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Table Grid"></w:LsdException>\r\n  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Placeholder Text"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="1" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="No Spacing"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Revision"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="34" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="List Paragraph"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="29" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Quote"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="30" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Intense Quote"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="19" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Subtle Emphasis"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="21" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Intense Emphasis"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="31" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Subtle Reference"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="32" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Intense Reference"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="33" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Book Title"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="37" Name="Bibliography"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" QFormat="true" Name="TOC Heading"></w:LsdException>\r\n </w:LatentStyles>\r\n</xml><![endif]--><!--[if gte mso 10]>\r\n<style>\r\n /* Style Definitions */\r\n table.MsoNormalTable\r\n	{mso-style-name:"Table Normal";\r\n	mso-tstyle-rowband-size:0;\r\n	mso-tstyle-colband-size:0;\r\n	mso-style-noshow:yes;\r\n	mso-style-priority:99;\r\n	mso-style-qformat:yes;\r\n	mso-style-parent:"";\r\n	mso-padding-alt:0in 5.4pt 0in 5.4pt;\r\n	mso-para-margin-top:0in;\r\n	mso-para-margin-right:0in;\r\n	mso-para-margin-bottom:10.0pt;\r\n	mso-para-margin-left:0in;\r\n	line-height:115%;\r\n	mso-pagination:widow-orphan;\r\n	font-size:11.0pt;\r\n	mso-bidi-font-size:14.0pt;\r\n	font-family:"Calibri","sans-serif";\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-fareast-font-family:"Times New Roman";\r\n	mso-fareast-theme-font:minor-fareast;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:Vrinda;\r\n	mso-bidi-theme-font:minor-bidi;}\r\n</style>\r\n<![endif]-->\r\n\r\n</p><p class="MsoNormal"><span style="font-size:16.0pt;line-height:115%;font-family:\r\nSutonnyMJ"><br></span></p>\r\n\r\n<p></p>\r\n\r\n<p><br></p>\r\n', '2015-02-09', 0, 1, 1),
(3, 'নোটিশ বোর্ড', 'notice-board', NULL, 0, 0, '', '2015-02-09', 0, 1, 1),
(4, 'প্রতিষ্ঠানের নিয়ম শৃঙ্খলা', 'rules', NULL, 1, 0, '', '2015-06-09', 0, 1, 1),
(5, 'মাস্টারপ্ল্যান', 'masterplan', NULL, 2, 0, '<br>', '2015-28-07', 0, 1, 1),
(6, 'একাডেমিক  ক্যালেন্ডার', 'academiccalendar', NULL, 88, 0, '<p><center>২০১৬ শিক্ষাবর্ষের একাডেমিক ক্যালেন্ডার</center></p>\r\n<table class="dataTable table table-bordered table-striped">\r\n <tbody>\r\n  <tr>\r\n   <td>পরীক্ষার নাম</td>\r\n   <td>তারিখ ও দিন </td>\r\n   <td>দিন সংখ্যা</td>\r\n   <td>ফলাফল প্রকাশ</td>\r\n  </tr>\r\n  <tr>\r\n   <td>বার্ষিক পরীক্ষা ও প্রাক-নির্বাচনী</td>\r\n   <td>১১ জুলাই, সোমবার থেকে ২৫ জুলাই, সোমবার পর্যন্ত</td>\r\n   <td>১৩ দিন</td>\r\n   <td>০৬ আগষ্ট শনিবার</td>\r\n  </tr>\r\n  <tr>\r\n   <td>নির্বাচনী পরীক্ষা</td>\r\n   <td>১৬ অক্টোবর, রবিবার থেকে ৩১ অক্টোবর, সোমবার পর্যন্ত</td>\r\n   <td>১৩ দিন</td>\r\n   <td>০৫ নভেম্বর শনিবার</td>\r\n  </tr>\r\n  <tr>\r\n   <td>বার্ষিক পরীক্ষা</td>\r\n   <td>২৮ নভেম্বর, সোমবার থেকে ১৪ ডিসেম্বর, বুধবার পর্যন্ত </td>\r\n   <td>১৩ দিন</td>\r\n   <td>২৯ ডিসেম্বর বৃহস্পতিবার </td>\r\n  </tr>\r\n  \r\n \r\n  \r\n </tbody>\r\n</table>\r\n', '2015-28-07', 0, 1, 1),
(7, 'কর্মরত জনবল', 'workingmanpower', NULL, 57, 7, '<table class="table table-striped table-bordered dataTable" border="1" cellpadding="0" cellspacing="0" height="460" width="861">\r\n <tbody>\r\n  <tr>\r\n   <td>পদবী</td>\r\n   <td>কর্মরত মোট</td>\r\n   <td>কর্মরত মহিলা</td>\r\n   <td>কর্মরত পুরুষ</td>\r\n   <td>MPO ভূক্ত মোট</td>\r\n   <td>MPO ভূক্ত মহিলা</td>\r\n   <td>MPO ভূক্ত পুরুষ</td>\r\n  </tr>\r\n  <tr>\r\n   <td>প্রধান শিক্ষক</td>\r\n   <td>০১<br></td>\r\n   <td>০০<br></td>\r\n   <td>০১<br></td>\r\n   <td>০১<br></td>\r\n   <td>০০<br></td>\r\n   <td>০১<br></td>\r\n  </tr>\r\n  <tr>\r\n   <td>সহকারি প্রধান শিক্ষক</td>\r\n   <td>০১<br></td>\r\n   <td>০০<br></td>\r\n   <td>০১<br></td>\r\n   <td>০১<br></td>\r\n   <td>০০<br></td>\r\n   <td>০১<br></td>\r\n  </tr>\r\n  <tr>\r\n   <td>সহকারী শিক্ষক</td>\r\n   <td>১০<br></td>\r\n   <td>০৩<br></td>\r\n   <td>০৭<br></td>\r\n   <td>০৮<br></td>\r\n   <td>০১<br></td>\r\n   <td>০৭<br></td>\r\n  </tr>\r\n  <tr>\r\n   <td>জুনিয়র শিক্ষক</td>\r\n   <td>০০<br></td>\r\n   <td>০০<br></td>\r\n   <td>০০<br></td>\r\n   <td>০০<br></td>\r\n   <td>০০<br></td>\r\n   <td>০০<br></td>\r\n  </tr>\r\n  <tr>\r\n   <td>কম্পিউটার শিক্ষক</td>\r\n   <td>০১<br></td>\r\n   <td>০১<br></td>\r\n   <td>০০<br></td>\r\n   <td>০১<br></td>\r\n   <td>০১<br></td>\r\n   <td>০০<br></td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n', '2015-28-07', 0, 1, 1),
(8, 'খেলার মাঠ', 'playground', NULL, 58, 0, '', '2015-30-07', 0, 1, 1),
(10, 'শিক্ষক ও কর্মচারীদের সৃষ্টপদ ', 'teachers-and-staff-vacancy', NULL, 2, 0, '', '2015-28-07', 0, 1, 1),
(11, 'সহ শিক্ষা কার্যক্রম', 'extra-curricular-activities', NULL, 88, 11, '<p>সহশিক্ষা কার্যক্রম চালু আছে</p>\r\n<p>সহশিক্ষা কার্যক্রম ঃ ক্রীড়া অনুষ্ঠান, বিতর্ক প্রতিযোগীতা, কুইজ প্রতিযোগীতা, বার্ষিক ম্যাগাজিন ইত্যাদি</p>', '2015-08-08', 0, 1, 1),
(12, 'প্রতিষ্ঠান প্রধানদের কার্যকাল', 'previous-headmaster-workingtime', NULL, 1, 0, '<font face="Arial, Verdana"><span style="font-size: 13.3333px;">প্রতিষ্ঠান প্রধানদের কার্যকাল</span></font>', '2015-02-09', 0, 1, 1),
(13, 'পঠিত বিষয়সমূহ', 'reading-subjects', NULL, 88, 0, '<table class="dataTable table table-bordered table-striped">\r\n<tbody>\r\n<tr>\r\n<td>\r\n<p><strong>ক্রমিক নং</strong></p>\r\n</td>\r\n<td>\r\n<p><strong>বিষয়ের নাম</strong></p>\r\n</td>\r\n<td>\r\n<p><strong>বিষয় কোড</strong></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p>১</p>\r\n</td>\r\n<td>বাংলা</td>\r\n<td>\r\n<p>১০১-১০২</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p>২</p>\r\n</td>\r\n<td>ইংরেজি</td>\r\n<td>\r\n<p>১০৭-১০৮</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p>৩</p>\r\n</td>\r\n<td>সাধারণ গণিত</td>\r\n<td>\r\n<p>১০৯</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p>৪</p>\r\n</td>\r\n<td>ভূগোল</td>\r\n<td>\r\n<p>১১০</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p>৫</p>\r\n</td>\r\n<td>ইসলাম শিক্ষা</td>\r\n<td>\r\n<p>১১১</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p>৬</p>\r\n</td>\r\n<td>হিন্দু ধর্ম শিক্ষা</td>\r\n<td>\r\n<p>১১২</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p>৭</p>\r\n</td>\r\n<td>বৌদ্ধ ধর্ম শিক্ষা</td>\r\n<td>\r\n<p>১১৩</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p>৮</p>\r\n</td>\r\n<td>খ্রিস্টান ধর্ম শিক্ষা</td>\r\n<td>\r\n<p>১১৪</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p>৯</p>\r\n</td>\r\n<td>উচ্চতর গণিত</td>\r\n<td>\r\n<p>১২৬</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p>১০</p>\r\n</td>\r\n<td>সাধারণ বিজ্ঞান</td>\r\n<td>\r\n<p>১২৭</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p>১১</p>\r\n</td>\r\n<td>কম্পিউটার শিক্ষা</td>\r\n<td>\r\n<p>১৩১</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p>১২</p>\r\n</td>\r\n<td>কৃষি শিক্ষা</td>\r\n<td>\r\n<p>১৩৪</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p>১৩</p>\r\n</td>\r\n<td>পদার্থ বিজ্ঞান</td>\r\n<td>\r\n<p>১৩৬</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p>১৪</p>\r\n</td>\r\n<td>রসায়ন</td>\r\n<td>\r\n<p>১৩৭</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p>১৫</p>\r\n</td>\r\n<td>জীব বিজ্ঞান</td>\r\n<td>\r\n<p>১৩৮</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p>১৬</p>\r\n</td>\r\n<td>ইতিহাস</td>\r\n<td>\r\n<p>১৩৯</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p>১৭</p>\r\n</td>\r\n<td>পৌরনীতি</td>\r\n<td>\r\n<p>১৪০</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p>১৮</p>\r\n</td>\r\n<td>অর্থনীতি</td>\r\n<td>\r\n<p>১৪১</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p>১৯</p>\r\n</td>\r\n<td>ব্যবসায় পরিচিতি</td>\r\n<td>\r\n<p>১৪২</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p>২০</p>\r\n</td>\r\n<td>ব্যবসায় উদ্যোগ</td>\r\n<td>\r\n<p>১৪৩</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p>২১</p>\r\n</td>\r\n<td>বাণিজ্যিক ভূগোল</td>\r\n<td>\r\n<p>১৪৪</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p>২২</p>\r\n</td>\r\n<td>সামাজিক বিজ্ঞান</td>\r\n<td>\r\n<p>১৪৫</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p>২৩</p>\r\n</td>\r\n<td>হিসাববিজ্ঞান</td>\r\n<td>\r\n<p>১৪৬</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', '2015-09-08', 0, 1, 1),
(14, 'পরিষ্কার-পরিচ্ছন্নতা', 'cleanliness', NULL, 58, 0, '<p [removed]="text-align:justify"> </p>\r\n\r\n<p dir="LTR" [removed]="text-align:justify"> </p>\r\n\r\n<p dir="LTR" [removed]="text-align:justify"> </p>\r\n\r\n<p dir="LTR" [removed]="text-align:justify">বন্ধুরা, তোমরা যদি পবিত্র কুরআনের শিক্ষার দিকে দৃষ্টি দাও তাহলে দেখতে পাবে যে, ইসলামী সংস্কৃতিতে বাহ্যিক পরিষ্কার পরিচ্ছন্নতা ও পরিপাটি অবস্থা বা বাহ্যিক সৌন্দর্যের ওপর গুরুত্ব দেয়ার পাশাপাশি আত্মিক পরিচ্ছন্নতা এবং আত্মিক শুভ্রতা ও সৌন্দর্যের ওপরও ব্যাপক গুরুত্ব দেয়া হয়েছে। পবিত্র কুর আন ও ইসলামকে সমুন্নত রাখার প্রতি গুরুত্ত দিয়ে বিদ্যালয় প্রাঙ্গন, গৃহ, আসবাবপত্র,শ্রেনীকক্ষ এমনকি শারিরিকভাবে প্রত্যেকে পরিষ্কার-পরিচ্ছন্ন থাকার চর্চা এখানে করা হয় এবং এর উপর মাসিক পুরষ্কার প্রদানের ব্যাবস্থা আছে।<br>\r\n</p>', '2015-10-08', 0, 1, 1),
(15, 'শরীরচর্চা', 'athletics', NULL, 58, 0, '<p>নিয়োগপ্রাপ্ত শরীর চর্চা শিক্ষক আছেন। প্রতিদিন সকাল ৯.৩০ হতে ১০.০০ টা পর্যন্ত শরীর চর্চা ক্লাশ অনুষ্ঠিত হয়। এছাড়াও ছুটির পর বিভিন্ন খেলাধুলার ব্যবস্থা রয়েছে। </p>\r\n\r\n<p> </p>\r\n', '2015-01-09', NULL, 1, 1);
INSERT INTO `webpages` (`PageId`, `PageTitle`, `PageRoute`, `SpecificRoutes`, `ParentId`, `PageOrder`, `Description`, `PublishDate`, `isSpecial`, `isInMenu`, `isActive`) VALUES
(16, 'স্যানিটেশন সংক্রান্ত তথ্য', 'sanitation-information', NULL, 58, 0, '<p>&nbsp;<!--[if gte mso 9]><xml>\r\n <o:OfficeDocumentSettings>\r\n  <o:RelyOnVML/>\r\n  <o:AllowPNG/>\r\n </o:OfficeDocumentSettings>\r\n</xml><![endif]--></p><p><!--[if gte mso 9]><xml>\r\n <w:WordDocument>\r\n  <w:View>Normal</w:View>\r\n  <w:Zoom>0</w:Zoom>\r\n  <w:TrackMoves/>\r\n  <w:TrackFormatting/>\r\n  <w:PunctuationKerning/>\r\n  <w:ValidateAgainstSchemas/>\r\n  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>\r\n  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>\r\n  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>\r\n  <w:DoNotPromoteQF/>\r\n  <w:LidThemeOther>EN-US</w:LidThemeOther>\r\n  <w:LidThemeAsian>X-NONE</w:LidThemeAsian>\r\n  <w:LidThemeComplexScript>BN</w:LidThemeComplexScript>\r\n  <w:Compatibility>\r\n   <w:BreakWrappedTables/>\r\n   <w:SnapToGridInCell/>\r\n   <w:WrapTextWithPunct/>\r\n   <w:UseAsianBreakRules/>\r\n   <w:DontGrowAutofit/>\r\n   <w:SplitPgBreakAndParaMark/>\r\n   <w:DontVertAlignCellWithSp/>\r\n   <w:DontBreakConstrainedForcedTables/>\r\n   <w:DontVertAlignInTxbx/>\r\n   <w:Word11KerningPairs/>\r\n   <w:CachedColBalance/>\r\n  </w:Compatibility>\r\n  <m:mathPr>\r\n   <m:mathFont m:val="Cambria Math"/>\r\n   <m:brkBin m:val="before"/>\r\n   <m:brkBinSub m:val="--"/>\r\n   <m:smallFrac m:val="off"/>\r\n   <m:dispDef/>\r\n   <m:lMargin m:val="0"/>\r\n   <m:rMargin m:val="0"/>\r\n   <m:defJc m:val="centerGroup"/>\r\n   <m:wrapIndent m:val="1440"/>\r\n   <m:intLim m:val="subSup"/>\r\n   <m:naryLim m:val="undOvr"/>\r\n  </m:mathPr></w:WordDocument>\r\n</xml><![endif]--><!--[if gte mso 9]><xml>\r\n <w:LatentStyles DefLockedState="false" DefUnhideWhenUsed="true"\r\n  DefSemiHidden="true" DefQFormat="false" DefPriority="99"\r\n  LatentStyleCount="267">\r\n  <w:LsdException Locked="false" Priority="0" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Normal"/>\r\n  <w:LsdException Locked="false" Priority="9" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="heading 1"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 2"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 3"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 4"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 5"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 6"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 7"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 8"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 9"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 1"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 2"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 3"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 4"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 5"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 6"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 7"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 8"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 9"/>\r\n  <w:LsdException Locked="false" Priority="35" QFormat="true" Name="caption"/>\r\n  <w:LsdException Locked="false" Priority="10" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Title"/>\r\n  <w:LsdException Locked="false" Priority="1" Name="Default Paragraph Font"/>\r\n  <w:LsdException Locked="false" Priority="11" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Subtitle"/>\r\n  <w:LsdException Locked="false" Priority="22" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Strong"/>\r\n  <w:LsdException Locked="false" Priority="20" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Emphasis"/>\r\n  <w:LsdException Locked="false" Priority="59" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Table Grid"/>\r\n  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Placeholder Text"/>\r\n  <w:LsdException Locked="false" Priority="1" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="No Spacing"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 1"/>\r\n  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Revision"/>\r\n  <w:LsdException Locked="false" Priority="34" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="List Paragraph"/>\r\n  <w:LsdException Locked="false" Priority="29" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Quote"/>\r\n  <w:LsdException Locked="false" Priority="30" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Intense Quote"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="19" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Subtle Emphasis"/>\r\n  <w:LsdException Locked="false" Priority="21" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Intense Emphasis"/>\r\n  <w:LsdException Locked="false" Priority="31" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Subtle Reference"/>\r\n  <w:LsdException Locked="false" Priority="32" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Intense Reference"/>\r\n  <w:LsdException Locked="false" Priority="33" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Book Title"/>\r\n  <w:LsdException Locked="false" Priority="37" Name="Bibliography"/>\r\n  <w:LsdException Locked="false" Priority="39" QFormat="true" Name="TOC Heading"/>\r\n </w:LatentStyles>\r\n</xml><![endif]--><!--[if gte mso 10]>\r\n<style>\r\n /* Style Definitions */\r\n table.MsoNormalTable\r\n	{mso-style-name:"Table Normal";\r\n	mso-tstyle-rowband-size:0;\r\n	mso-tstyle-colband-size:0;\r\n	mso-style-noshow:yes;\r\n	mso-style-priority:99;\r\n	mso-style-qformat:yes;\r\n	mso-style-parent:"";\r\n	mso-padding-alt:0in 5.4pt 0in 5.4pt;\r\n	mso-para-margin-top:0in;\r\n	mso-para-margin-right:.5in;\r\n	mso-para-margin-bottom:0in;\r\n	mso-para-margin-left:1.0in;\r\n	mso-para-margin-bottom:.0001pt;\r\n	text-align:center;\r\n	mso-pagination:widow-orphan;\r\n	font-size:11.0pt;\r\n	mso-bidi-font-size:14.0pt;\r\n	font-family:"Calibri","sans-serif";\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-fareast-font-family:"Times New Roman";\r\n	mso-fareast-theme-font:minor-fareast;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:Vrinda;\r\n	mso-bidi-theme-font:minor-bidi;}\r\ntable.MsoTableGrid\r\n	{mso-style-name:"Table Grid";\r\n	mso-tstyle-rowband-size:0;\r\n	mso-tstyle-colband-size:0;\r\n	mso-style-priority:59;\r\n	mso-style-unhide:no;\r\n	border:solid black 1.0pt;\r\n	mso-border-themecolor:text1;\r\n	mso-border-alt:solid black .5pt;\r\n	mso-border-themecolor:text1;\r\n	mso-padding-alt:0in 5.4pt 0in 5.4pt;\r\n	mso-border-insideh:.5pt solid black;\r\n	mso-border-insideh-themecolor:text1;\r\n	mso-border-insidev:.5pt solid black;\r\n	mso-border-insidev-themecolor:text1;\r\n	mso-para-margin-top:0in;\r\n	mso-para-margin-right:.5in;\r\n	mso-para-margin-bottom:0in;\r\n	mso-para-margin-left:1.0in;\r\n	mso-para-margin-bottom:.0001pt;\r\n	text-align:center;\r\n	mso-pagination:widow-orphan;\r\n	font-size:11.0pt;\r\n	font-family:"Calibri","sans-serif";\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:Vrinda;\r\n	mso-bidi-theme-font:minor-bidi;\r\n	mso-bidi-language:AR-SA;}\r\n</style>\r\n<![endif]-->\r\n\r\n<p class="MsoNormal" style="margin-left:0in;text-align:left;\r\ntab-stops:118.35pt center 261.65pt" align="left"><span style="font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;\r\nmso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:\r\nCalibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:Vrinda;\r\nmso-bidi-theme-font:minor-bidi;mso-bidi-language:BN" lang="BN">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; বিদ্যালয়ের স্যানিটেশন\r\nসুবিধাঃ</span></p>\r\n\r\n<p class="MsoNormal" style="margin-left:0in;text-align:left;\r\ntab-stops:118.35pt center 261.65pt" align="left"><span style="mso-bidi-language:BN">&nbsp;</span></p>\r\n\r\n<p class="MsoNormal" style="margin-left:0in;tab-stops:118.35pt center 261.65pt"><span style="font-size:9.0pt;mso-bidi-language:BN">&nbsp;</span></p>\r\n\r\n<div align="center">\r\n\r\n<table class="MsoTableGrid" style="width:412.95pt;border-collapse:collapse;border:none;mso-border-alt:\r\n solid black .5pt;mso-border-themecolor:text1;mso-yfti-tbllook:1184;mso-padding-alt:\r\n 0in 5.4pt 0in 5.4pt" border="1" cellpadding="0" cellspacing="0" width="551">\r\n <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes">\r\n  <td style="width:91.3pt;border:solid black 1.0pt;\r\n  mso-border-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="122">\r\n  <p class="MsoNormal" style="margin-left:0in;tab-stops:118.35pt center 261.65pt"><span style="font-size:9.0pt;font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;mso-ascii-font-family:\r\n  Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;\r\n  mso-hansi-theme-font:minor-latin;mso-bidi-font-family:Vrinda;mso-bidi-theme-font:\r\n  minor-bidi;mso-bidi-language:BN" lang="BN">বিষয়</span><span style="font-size:9.0pt;\r\n  mso-bidi-language:BN"></span></p>\r\n  </td>\r\n  <td style="width:71.6pt;border:solid black 1.0pt;\r\n  mso-border-themecolor:text1;border-left:none;mso-border-left-alt:solid black .5pt;\r\n  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="95">\r\n  <p class="MsoNormal" style="margin-left:0in;tab-stops:118.35pt center 261.65pt"><span style="font-size:9.0pt;font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;mso-ascii-font-family:\r\n  Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;\r\n  mso-hansi-theme-font:minor-latin;mso-bidi-font-family:Vrinda;mso-bidi-theme-font:\r\n  minor-bidi;mso-bidi-language:BN" lang="BN">ছাত্রদের জন্য</span><span style="font-size:\r\n  9.0pt;mso-bidi-language:BN"></span></p>\r\n  </td>\r\n  <td style="width:60.9pt;border:solid black 1.0pt;\r\n  mso-border-themecolor:text1;border-left:none;mso-border-left-alt:solid black .5pt;\r\n  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="81">\r\n  <p class="MsoNormal" style="margin-left:0in;tab-stops:118.35pt center 261.65pt"><span style="font-size:9.0pt;font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;mso-ascii-font-family:\r\n  Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;\r\n  mso-hansi-theme-font:minor-latin;mso-bidi-font-family:Vrinda;mso-bidi-theme-font:\r\n  minor-bidi;mso-bidi-language:BN" lang="BN">ছাত্রীদের জন্য</span><span style="font-size:\r\n  9.0pt;mso-bidi-language:BN"></span></p>\r\n  </td>\r\n  <td style="width:113.5pt;border-top:solid black 1.0pt;\r\n  mso-border-top-themecolor:text1;border-left:none;border-bottom:solid black 1.0pt;\r\n  mso-border-bottom-themecolor:text1;border-right:solid windowtext 1.0pt;\r\n  mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;\r\n  mso-border-alt:solid black .5pt;mso-border-themecolor:text1;mso-border-right-alt:\r\n  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt" valign="top" width="151">\r\n  <p class="MsoNormal" style="margin-left:0in;tab-stops:118.35pt center 261.65pt"><span style="font-size:9.0pt;font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;mso-ascii-font-family:\r\n  Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;\r\n  mso-hansi-theme-font:minor-latin;mso-bidi-font-family:Vrinda;mso-bidi-theme-font:\r\n  minor-bidi;mso-bidi-language:BN" lang="BN">শিক্ষক-কর্মচারীদের জন্য</span></p>\r\n  </td>\r\n  <td style="width:75.65pt;border:solid black 1.0pt;\r\n  mso-border-themecolor:text1;border-left:none;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid black .5pt;mso-border-themecolor:text1;mso-border-left-alt:\r\n  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt" valign="top" width="101">\r\n  <p class="MsoNormal" style="margin-left:0in;tab-stops:118.35pt center 261.65pt"><span style="font-size:9.0pt;font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;mso-ascii-font-family:\r\n  Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;\r\n  mso-hansi-theme-font:minor-latin;mso-bidi-font-family:Vrinda;mso-bidi-theme-font:\r\n  minor-bidi;mso-bidi-language:BN" lang="BN">মোট</span></p>\r\n  </td>\r\n </tr>\r\n <tr style="mso-yfti-irow:1">\r\n  <td style="width:91.3pt;border:solid black 1.0pt;\r\n  mso-border-themecolor:text1;border-top:none;mso-border-top-alt:solid black .5pt;\r\n  mso-border-top-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="122">\r\n  <p class="MsoNormal" style="margin-left:0in;tab-stops:118.35pt center 261.65pt"><span style="font-size:9.0pt;font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;mso-ascii-font-family:\r\n  Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;\r\n  mso-hansi-theme-font:minor-latin;mso-bidi-font-family:Vrinda;mso-bidi-theme-font:\r\n  minor-bidi;mso-bidi-language:BN" lang="BN">টিউব অয়েল</span><span style="font-size:9.0pt;\r\n  mso-bidi-language:BN"></span></p>\r\n  </td>\r\n  <td style="width:71.6pt;border-top:none;border-left:none;\r\n  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:\r\n  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;\r\n  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="95">\r\n  <p class="MsoNormal" style="margin-left:0in;tab-stops:118.35pt center 261.65pt"><span style="font-size:9.0pt;font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;mso-ascii-font-family:\r\n  Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;\r\n  mso-hansi-theme-font:minor-latin;mso-bidi-font-family:Vrinda;mso-bidi-theme-font:\r\n  minor-bidi;mso-bidi-language:BN" lang="BN">-</span><span style="font-size:9.0pt;\r\n  mso-bidi-language:BN"></span></p>\r\n  </td>\r\n  <td style="width:60.9pt;border-top:none;border-left:none;\r\n  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:\r\n  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;\r\n  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="81">\r\n  <p class="MsoNormal" style="margin-left:0in;tab-stops:118.35pt center 261.65pt"><span style="font-size:9.0pt;font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;mso-ascii-font-family:\r\n  Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;\r\n  mso-hansi-theme-font:minor-latin;mso-bidi-font-family:Vrinda;mso-bidi-theme-font:\r\n  minor-bidi;mso-bidi-language:BN" lang="BN">-</span><span style="font-size:9.0pt;\r\n  mso-bidi-language:BN"></span></p>\r\n  </td>\r\n  <td style="width:113.5pt;border-top:none;border-left:\r\n  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n  border-right:solid windowtext 1.0pt;mso-border-top-alt:solid black .5pt;\r\n  mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;\r\n  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;mso-border-right-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt" valign="top" width="151">\r\n  <p class="MsoNormal" style="margin-left:0in;tab-stops:118.35pt center 261.65pt"><span style="font-size:9.0pt;font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;mso-ascii-font-family:\r\n  Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;\r\n  mso-hansi-theme-font:minor-latin;mso-bidi-font-family:Vrinda;mso-bidi-theme-font:\r\n  minor-bidi;mso-bidi-language:BN" lang="BN">-</span><span style="font-size:9.0pt;\r\n  mso-bidi-language:BN"></span></p>\r\n  </td>\r\n  <td style="width:75.65pt;border-top:none;border-left:\r\n  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:\r\n  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid black .5pt;mso-border-themecolor:text1;mso-border-left-alt:\r\n  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt" valign="top" width="101">\r\n  <p class="MsoNormal" style="margin-left:0in;tab-stops:118.35pt center 261.65pt"><span style="font-size:9.0pt;font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;mso-ascii-font-family:\r\n  Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;\r\n  mso-hansi-theme-font:minor-latin;mso-bidi-font-family:Vrinda;mso-bidi-theme-font:\r\n  minor-bidi;mso-bidi-language:BN" lang="BN">০৩ টি</span><span style="font-size:9.0pt;\r\n  mso-bidi-language:BN"></span></p>\r\n  </td>\r\n </tr>\r\n <tr style="mso-yfti-irow:2">\r\n  <td style="width:91.3pt;border:solid black 1.0pt;\r\n  mso-border-themecolor:text1;border-top:none;mso-border-top-alt:solid black .5pt;\r\n  mso-border-top-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="122">\r\n  <p class="MsoNormal" style="margin-left:0in;tab-stops:118.35pt center 261.65pt"><span style="font-size:9.0pt;font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;mso-ascii-font-family:\r\n  Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;\r\n  mso-hansi-theme-font:minor-latin;mso-bidi-font-family:Vrinda;mso-bidi-theme-font:\r\n  minor-bidi;mso-bidi-language:BN" lang="BN">সাপ্লাই</span><span style="font-size:9.0pt;\r\n  mso-bidi-language:BN"></span></p>\r\n  </td>\r\n  <td style="width:71.6pt;border-top:none;border-left:none;\r\n  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:\r\n  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;\r\n  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="95">\r\n  <p class="MsoNormal" style="margin-left:0in;tab-stops:118.35pt center 261.65pt"><span style="font-size:9.0pt;font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;mso-ascii-font-family:\r\n  Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;\r\n  mso-hansi-theme-font:minor-latin;mso-bidi-font-family:Vrinda;mso-bidi-theme-font:\r\n  minor-bidi;mso-bidi-language:BN" lang="BN">-</span><span style="font-size:9.0pt;\r\n  mso-bidi-language:BN"></span></p>\r\n  </td>\r\n  <td style="width:60.9pt;border-top:none;border-left:none;\r\n  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:\r\n  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;\r\n  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="81">\r\n  <p class="MsoNormal" style="margin-left:0in;tab-stops:118.35pt center 261.65pt"><span style="font-size:9.0pt;font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;mso-ascii-font-family:\r\n  Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;\r\n  mso-hansi-theme-font:minor-latin;mso-bidi-font-family:Vrinda;mso-bidi-theme-font:\r\n  minor-bidi;mso-bidi-language:BN" lang="BN">-</span><span style="font-size:9.0pt;\r\n  mso-bidi-language:BN"></span></p>\r\n  </td>\r\n  <td style="width:113.5pt;border-top:none;border-left:\r\n  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n  border-right:solid windowtext 1.0pt;mso-border-top-alt:solid black .5pt;\r\n  mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;\r\n  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;mso-border-right-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt" valign="top" width="151">\r\n  <p class="MsoNormal" style="margin-left:0in;tab-stops:118.35pt center 261.65pt"><span style="font-size:9.0pt;font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;mso-ascii-font-family:\r\n  Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;\r\n  mso-hansi-theme-font:minor-latin;mso-bidi-font-family:Vrinda;mso-bidi-theme-font:\r\n  minor-bidi;mso-bidi-language:BN" lang="BN">-</span><span style="font-size:9.0pt;\r\n  mso-bidi-language:BN"></span></p>\r\n  </td>\r\n  <td style="width:75.65pt;border-top:none;border-left:\r\n  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:\r\n  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid black .5pt;mso-border-themecolor:text1;mso-border-left-alt:\r\n  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt" valign="top" width="101">\r\n  <p class="MsoNormal" style="margin-left:0in;tab-stops:118.35pt center 261.65pt"><span style="font-size:9.0pt;font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;mso-ascii-font-family:\r\n  Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;\r\n  mso-hansi-theme-font:minor-latin;mso-bidi-font-family:Vrinda;mso-bidi-theme-font:\r\n  minor-bidi;mso-bidi-language:BN" lang="BN">০১ টি</span><span style="font-size:9.0pt;\r\n  mso-bidi-language:BN"></span></p>\r\n  </td>\r\n </tr>\r\n <tr style="mso-yfti-irow:3;mso-yfti-lastrow:yes">\r\n  <td style="width:91.3pt;border:solid black 1.0pt;\r\n  mso-border-themecolor:text1;border-top:none;mso-border-top-alt:solid black .5pt;\r\n  mso-border-top-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="122">\r\n  <p class="MsoNormal" style="margin-left:0in;tab-stops:118.35pt center 261.65pt"><span style="font-size:9.0pt;font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;mso-ascii-font-family:\r\n  Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;\r\n  mso-hansi-theme-font:minor-latin;mso-bidi-font-family:Vrinda;mso-bidi-theme-font:\r\n  minor-bidi;mso-bidi-language:BN" lang="BN">টয়লেট</span><span style="font-size:9.0pt;\r\n  mso-bidi-language:BN"></span></p>\r\n  </td>\r\n  <td style="width:71.6pt;border-top:none;border-left:none;\r\n  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:\r\n  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;\r\n  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="95">\r\n  <p class="MsoNormal" style="margin-left:0in;tab-stops:118.35pt center 261.65pt"><span style="font-size:9.0pt;font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;mso-ascii-font-family:\r\n  Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;\r\n  mso-hansi-theme-font:minor-latin;mso-bidi-font-family:Vrinda;mso-bidi-theme-font:\r\n  minor-bidi;mso-bidi-language:BN" lang="BN">০৪</span><span style="font-size:9.0pt;\r\n  mso-bidi-language:BN"></span></p>\r\n  </td>\r\n  <td style="width:60.9pt;border-top:none;border-left:none;\r\n  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:\r\n  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;\r\n  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="81">\r\n  <p class="MsoNormal" style="margin-left:0in;tab-stops:118.35pt center 261.65pt"><span style="font-size:9.0pt;font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;mso-ascii-font-family:\r\n  Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;\r\n  mso-hansi-theme-font:minor-latin;mso-bidi-font-family:Vrinda;mso-bidi-theme-font:\r\n  minor-bidi;mso-bidi-language:BN" lang="BN">০৩</span><span style="font-size:9.0pt;\r\n  mso-bidi-language:BN"></span></p>\r\n  </td>\r\n  <td style="width:113.5pt;border-top:none;border-left:\r\n  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n  border-right:solid windowtext 1.0pt;mso-border-top-alt:solid black .5pt;\r\n  mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;\r\n  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;mso-border-right-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt" valign="top" width="151">\r\n  <p class="MsoNormal" style="margin-left:0in;tab-stops:118.35pt center 261.65pt"><span style="font-size:9.0pt;font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;mso-ascii-font-family:\r\n  Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;\r\n  mso-hansi-theme-font:minor-latin;mso-bidi-font-family:Vrinda;mso-bidi-theme-font:\r\n  minor-bidi;mso-bidi-language:BN" lang="BN">০২</span><span style="font-size:9.0pt;\r\n  mso-bidi-language:BN"></span></p>\r\n  </td>\r\n  <td style="width:75.65pt;border-top:none;border-left:\r\n  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:\r\n  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid windowtext .5pt;\r\n  mso-border-alt:solid black .5pt;mso-border-themecolor:text1;mso-border-left-alt:\r\n  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt" valign="top" width="101">\r\n  <p class="MsoNormal" style="margin-left:0in;tab-stops:118.35pt center 261.65pt"><span style="font-size:9.0pt;font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;mso-ascii-font-family:\r\n  Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;\r\n  mso-hansi-theme-font:minor-latin;mso-bidi-font-family:Vrinda;mso-bidi-theme-font:\r\n  minor-bidi;mso-bidi-language:BN" lang="BN">০৯টি</span><span style="font-size:9.0pt;\r\n  mso-bidi-language:BN"></span></p>\r\n  </td>\r\n </tr>\r\n</tbody></table>\r\n\r\n</div>\r\n\r\n<p class="MsoNormal" style="margin-left:0in;tab-stops:118.35pt center 261.65pt"><span style="mso-bidi-language:BN">&nbsp;</span></p>\r\n\r\n</p>\r\n', '2015-10-08', 0, 1, 1),
(17, 'যানবাহন', 'transport', NULL, 17, 17, '<p><!--[if gte mso 9]><xml>\r\n <w:WordDocument>\r\n  <w:View>Normal</w:View>\r\n  <w:Zoom>0</w:Zoom>\r\n  <w:PunctuationKerning/>\r\n  <w:ValidateAgainstSchemas/>\r\n  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>\r\n  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>\r\n  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>\r\n  <w:Compatibility>\r\n   <w:BreakWrappedTables/>\r\n   <w:SnapToGridInCell/>\r\n   <w:WrapTextWithPunct/>\r\n   <w:UseAsianBreakRules/>\r\n   <w:DontGrowAutofit/>\r\n  </w:Compatibility>\r\n  <w:BrowserLevel>MicrosoftInternetExplorer4</w:BrowserLevel>\r\n </w:WordDocument>\r\n</xml><![endif]--></p><p><!--[if gte mso 9]><xml>\r\n <w:LatentStyles DefLockedState="false" LatentStyleCount="156">\r\n </w:LatentStyles>\r\n</xml><![endif]--><!--[if gte mso 10]>\r\n<style>\r\n /* Style Definitions */\r\n table.MsoNormalTable\r\n	{mso-style-name:"Table Normal";\r\n	mso-tstyle-rowband-size:0;\r\n	mso-tstyle-colband-size:0;\r\n	mso-style-noshow:yes;\r\n	mso-style-parent:"";\r\n	mso-padding-alt:0in 5.4pt 0in 5.4pt;\r\n	mso-para-margin:0in;\r\n	mso-para-margin-bottom:.0001pt;\r\n	mso-pagination:widow-orphan;\r\n	font-size:10.0pt;\r\n	font-family:"Times New Roman";\r\n	mso-ansi-language:#0400;\r\n	mso-fareast-language:#0400;\r\n	mso-bidi-language:#0400;}\r\n</style>\r\n<![endif]-->\r\n\r\n<p class="MsoNormal"><span style="font-family:SutonnyMJ">cÖwZôv‡bi wbR¯^ †Kvb\r\nhvbevnb †bB|</span></p>\r\n\r\n</p>\r\n', '2015-10-08', 0, 1, 1),
(18, 'বিভিন্ন পরীক্ষার পরিসংখ্যান', 'exam-statistics', NULL, 22, 0, '<table class="dataTable table table-bordered table-striped">\r\n <tbody>\r\n  <tr>\r\n   <td><p>সন</p></td>\r\n   <td><p>মোট পরীক্ষার্থী</p></td>\r\n   <td><p>মোট উত্তীর্ণ</p></td>\r\n   <td><p>পাশের হার</p></td>\r\n   <td><p>A+</p></td>\r\n   <td><p>A</p></td>\r\n   <td><p>A-</p></td>\r\n  </tr>\r\n  <tr>\r\n   <td><p>২০১৫</p></td>\r\n   <td>২১৫</td>\r\n   <td>২১৫</td>\r\n   <td><p>৯৩%</p></td>\r\n   <td>১৫</td>\r\n   <td>২৫</td>\r\n   <td>২৫</td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n', '2015-09-08', NULL, 1, 1),
(19, 'লক্ষ ও উদ্দেশ্য', 'our-goal', NULL, 1, 0, 'শিক্ষায় পিছিয়ে পরা এলাকায় শিক্ষার হার বৃদ্ধি করা এবং এলাকার ছেলে-মেয়েদের সু-শিক্ষিত করে ও স্বাবলম্বী করে এলাকার উন্নয়ন ও কম্পিউটার শিক্ষায় পারদর্শী করে ডিজিটাল বাংলাদেশ গড়ায় সহায়তাদানই আমাদের লক্ষ্য ও উদ্যেশ্য।', '2015-10-08', 0, 1, 1),
(20, 'পরিচালনা পর্ষদ', 'governing-body', NULL, 2, 0, '\r\n', '2015-06-09', 1, 1, 1),
(22, 'ফলাফল', 'results', NULL, 0, 3, '', '2015-10-08', NULL, 1, 1),
(55, 'ইতিহাস', 'history', NULL, 1, 4, '', '1450401420', 0, 1, 1);
INSERT INTO `webpages` (`PageId`, `PageTitle`, `PageRoute`, `SpecificRoutes`, `ParentId`, `PageOrder`, `Description`, `PublishDate`, `isSpecial`, `isInMenu`, `isActive`) VALUES
(56, 'ছুটির তালিকা', 'leave', NULL, 88, 0, '<p><font size="5">সরকারী/ বেসরকারি মাধ্যমিক ও নিম্নমাধ্যমিক বিদ্যালয় সমুহে ২০১৬ শিক্ষাবর্ষের ছুটির তালিকা\r\n                           ( শুক্রবার ব্যাতিত)</font></p>\r\n<table class="dataTable table table-bordered table-striped">\r\n <tbody>\r\n  <tr>\r\n   <td>ক্রমিক নং</td>\r\n   <td>পর্বের নাম </td>\r\n   <td>তারিখ ও দিন </td>\r\n   <td>দিন সংখ্যা</td>\r\n  </tr>\r\n  <tr>\r\n   <td>০১</td>\r\n   <td>ফাতেহা ই-ইয়াজ দাহাম</td>\r\n   <td>২২ জানুয়ারি,শুক্রবার,২০১৬</td>\r\n   <td>০০ দিন<br></td>\r\n  </tr>\r\n  <tr>\r\n   <td>০2</td>\r\n   <td>শ্রী শ্রী সরস্বতী পূজা<br></td>\r\n   <td>&nbsp;১৩ ফেব্রুয়ারি শনিবার ,২০১৬</td>\r\n   <td>০১ দিন<br></td>\r\n  </tr>\r\n  <tr>\r\n   <td>০3</td>\r\n   <td>শহিদ দিবস ও আন্তর্জাতিক মাতৃ ভাষা দিবস<br></td>\r\n   <td>&nbsp;২১ ফেব্রুয়ারি রবিবার,২০১৬</td>\r\n   <td>০১ দিন<br></td>\r\n  </tr>\r\n  <tr>\r\n   <td>০4</td>\r\n   <td>&nbsp;মাঘী পূর্ণিমা<br></td>\r\n   <td>২২ ফেব্রুয়ারি,সোমবার,২০১৬</td>\r\n   <td>০১ দিন<br></td>\r\n  </tr>\r\n  <tr>\r\n   <td>০5</td>\r\n   <td>&nbsp;শ্রী শ্রী শিবরাত্রী ব্রত<br></td>\r\n   <td>০৭ মার্চ সোমবার,২০১৬</td>\r\n   <td>০১ দিন<br></td>\r\n  </tr>\r\n  <tr>\r\n   <td>০6</td>\r\n   <td>&nbsp;জাতির পিতা বঙ্গবন্ধু শেখ মজিবুর রহমান- এর জন্ম দিবস<br></td>\r\n   <td>&nbsp;১৭ মার্চ বৃহস্পতিবার,২০১৬ ,</td>\r\n   <td>০১ দিন<br></td>\r\n  </tr>\r\n  <tr>\r\n   <td>০7</td>\r\n   <td>&nbsp;শুভ দোলযাত্রা<br></td>\r\n   <td>&nbsp;২৩ মার্চ বুধবার,২০১৬</td>\r\n   <td>০১দিন<br></td>\r\n  </tr>\r\n  <tr>\r\n   <td>০8</td>\r\n   <td>স্বাধীনতা ও জাতীয় দিবস<br></td>\r\n   <td>২৬ মার্চ ,শনিবার,২০১৬</td>\r\n   <td>০১ দিন<br></td>\r\n  </tr>\r\n  <tr>\r\n   <td>০9</td>\r\n   <td>&nbsp;ইস্টার সানডে<br></td>\r\n   <td>২৭ মার্চ, রবিবার,২০১৬</td>\r\n   <td>০১ দিন<br></td>\r\n  </tr>\r\n  <tr>\r\n   <td>১0</td>\r\n   <td>বৈসাবি<br></td>\r\n   <td>১২ এপ্রিল মঙ্গলবার,২০১৬</td>\r\n   <td>০১ দিন<br></td>\r\n  </tr>\r\n  <tr>\r\n   <td>11</td>\r\n   <td>&nbsp;বাংলা নববর্ষ<br></td>\r\n   <td>১৪ এপ্রিল বৃহস্পতিবার,২০১৬</td>\r\n   <td>০১ দিন<br></td>\r\n  </tr>\r\n  <tr>\r\n   <td>12</td>\r\n   <td>&nbsp;মে দিবস<br></td>\r\n   <td>০১ মে রবিবার,২০১৬</td>\r\n   <td>০১ দিন<br></td>\r\n  </tr>\r\n  <tr>\r\n   <td>13</td>\r\n   <td>&nbsp;* শব-ই-মিরাজ<br></td>\r\n   <td>&nbsp;০৫ মে রবিবার,২০১৬</td>\r\n   <td>০১ দিন<br></td>\r\n  </tr>\r\n  <tr>\r\n   <td>14</td>\r\n   <td>গ্রীষ্মকালীন অবকাশ*বুদ্ধ পূর্ণিমা(বৈশাখি ২১ মে),* শব-ই-বরাত( ২৩ মে)<br></td>\r\n   <td>&nbsp;১৪ মে সনিবার,থেকে ২৬ মে বৃহস্পতিবার২০১৬</td>\r\n   <td>১২ দিন<br></td>\r\n  </tr>\r\n  <tr>\r\n   <td>15</td>\r\n   <td>&nbsp;পবিত্র রমজান,জুমাতুল-বিদা (০১ জুলাই) * শব-ই-ক্বদর(০৩ জুলাই),* ঈদ-উল-ফিতর(০৬ জুলাই)<br></td>\r\n   <td>&nbsp;০৭ জুন মঙ্গলবার, থেকে ০৯ জুলাই শনিবার২০১৬</td>\r\n   <td>২৮ দিন<br></td>\r\n  </tr>\r\n  <tr>\r\n   <td>16</td>\r\n   <td>&nbsp;জাতীয় শোক দিবস <br></td>\r\n   <td>১৫&nbsp; আগস্ট&nbsp; সোমবার,২০১৬</td>\r\n   <td>০১ দিন<br></td>\r\n  </tr>\r\n  <tr>\r\n   <td><br></td>\r\n   <td><br></td>\r\n   <td>&nbsp;বার,২০১৬</td>\r\n   <td>০০</td>\r\n  </tr>\r\n  <tr>\r\n   <td>17</td>\r\n   <td>&nbsp;শুভ জন্মাষ্টামী<br></td>\r\n   <td>২৫ আগস্ট,বৃহস্পতিবার,২০১৬</td>\r\n   <td>০১ দিন<br></td>\r\n  </tr>\r\n  <tr>\r\n   <td>18</td>\r\n   <td>পবিত্র-ঈদ-উল আযাহা(১১,১২,১৩ সেপ্টম্বর)<br></td>\r\n   <td>০৮ সেপ্টেম্বর বৃহস্পতিবারথেকে ১৭ সেপ্টেম্বর শনিবার,২০১৬</td>\r\n   <td>০৮ দিন<br></td>\r\n  </tr>\r\n  <tr>\r\n   <td>19</td>\r\n   <td>&nbsp;হিজরী নববর্ষ<br></td>\r\n   <td>০৩ অক্টোবর&nbsp; সোমবার,২০১৬</td>\r\n   <td>০১ দিন<br></td>\r\n  </tr>\r\n  <tr>\r\n   <td>20</td>\r\n   <td>&nbsp;দূর্গাপূজা ( বিজয়া দশমী ) (১১ অল্টোবর),*আশুরা(১২ অক্টোবর),শ্রী শ্রী লক্ষী পূজা(১৫ অক্টোবর),প্রবারনা পূর্ণিমা(১৫ অক্টোবর)<br></td>\r\n   <td>০৮ অক্টোবর শনিবার থেকে ১৫ অক্টোবর শনিবার,২০১৬</td>\r\n   <td>০৭ দিন<br></td>\r\n  </tr>\r\n  <tr>\r\n   <td>21</td>\r\n   <td>&nbsp;শ্রী শ্রী শ্যামা পূজা<br></td>\r\n   <td>২৯ অক্টোবর,শনিবার,২০১৬</td>\r\n   <td>০১ দিন<br></td>\r\n  </tr>\r\n  <tr>\r\n   <td>22</td>\r\n   <td>* আখেরী চাহার সোম্বা<br></td>\r\n   <td>৩০&nbsp; নভেম্বর বুধবার,২০১৬</td>\r\n   <td>০১ দিন<br></td>\r\n  </tr>\r\n  <tr>\r\n   <td>23</td>\r\n   <td>* ঈদ-ই মিলাদুন্নবী(সাঃ)<br></td>\r\n   <td>১২ ডিসেম্বর সোমবার,২০১৬</td>\r\n   <td>০১ দিন<br></td>\r\n  </tr>\r\n  <tr>\r\n   <td>24</td>\r\n   <td>বিজয় দিবস<br></td>\r\n   <td>১৬&nbsp; ডিসেম্বর শুক্রবার,২০১৬</td>\r\n   <td>০০ দিন<br></td>\r\n  </tr>\r\n  <tr>\r\n   <td>25</td>\r\n   <td>শীতকালীন অবকাশ, যিশু খ্রিস্টের জন্ম দিন<br></td>\r\n   <td>১৭ ডিসেম্বর শনিবার থেকে ২৬ ডিসেম্বর সোমবার,২০১৬</td>\r\n   <td>০৯ দিন<br></td>\r\n  </tr>\r\n  <tr>\r\n   <td>26</td>\r\n   <td>&nbsp;প্রধান শিক্ষকের সংরক্ষিত ছুটি<br></td>\r\n   <td><br></td>\r\n   <td>০৩ দিন<br></td>\r\n  </tr>\r\n  <tr>\r\n   <td>27</td>\r\n   <td><br></td>\r\n   <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; মোট<br></td>\r\n   <td>৮৫ দিন<br></td>\r\n  </tr>\r\n  <tr>\r\n   <td>28</td>\r\n   <td><br></td>\r\n   <td><br></td>\r\n   <td><br></td>\r\n  </tr>\r\n  <tr>\r\n   <td>29</td>\r\n   <td><br></td>\r\n   <td><br></td>\r\n   <td><br></td>\r\n  </tr>\r\n  <tr>\r\n   <td>৩০</td>\r\n   <td><br></td>\r\n   <td><br></td>\r\n   <td><br></td>\r\n  </tr>\r\n  \r\n  \r\n </tbody>\r\n</table>\r\n', '1450838269', 0, 1, 1),
(57, 'ভৌত কাঠামো', 'Infrastructure', NULL, 0, 22, '', '1450936183', 0, 1, 1),
(58, 'সুযোগ-সুবিধা', 'Amenities', NULL, 0, 0, '', '1450934149', NULL, 1, 1),
(59, 'প্রতিষ্ঠাতার ইতিহাস', 'founder-history', NULL, 1, 0, '', '1450934753', 0, 1, 1);
INSERT INTO `webpages` (`PageId`, `PageTitle`, `PageRoute`, `SpecificRoutes`, `ParentId`, `PageOrder`, `Description`, `PublishDate`, `isSpecial`, `isInMenu`, `isActive`) VALUES
(60, ' প্রধান শিক্ষকের তালিকা', 'headteacher', NULL, 60, 60, '<!--[if gte mso 9]><xml>\r\n <w:WordDocument>\r\n  <w:View>Normal</w:View>\r\n  <w:Zoom>0</w:Zoom>\r\n  <w:TrackMoves></w:TrackMoves>\r\n  <w:TrackFormatting></w:TrackFormatting>\r\n  <w:PunctuationKerning></w:PunctuationKerning>\r\n  <w:ValidateAgainstSchemas></w:ValidateAgainstSchemas>\r\n  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>\r\n  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>\r\n  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>\r\n  <w:DoNotPromoteQF></w:DoNotPromoteQF>\r\n  <w:LidThemeOther>EN-US</w:LidThemeOther>\r\n  <w:LidThemeAsian>X-NONE</w:LidThemeAsian>\r\n  <w:LidThemeComplexScript>BN</w:LidThemeComplexScript>\r\n  <w:Compatibility>\r\n   <w:BreakWrappedTables></w:BreakWrappedTables>\r\n   <w:SnapToGridInCell></w:SnapToGridInCell>\r\n   <w:WrapTextWithPunct></w:WrapTextWithPunct>\r\n   <w:UseAsianBreakRules></w:UseAsianBreakRules>\r\n   <w:DontGrowAutofit></w:DontGrowAutofit>\r\n   <w:SplitPgBreakAndParaMark></w:SplitPgBreakAndParaMark>\r\n   <w:DontVertAlignCellWithSp></w:DontVertAlignCellWithSp>\r\n   <w:DontBreakConstrainedForcedTables></w:DontBreakConstrainedForcedTables>\r\n   <w:DontVertAlignInTxbx></w:DontVertAlignInTxbx>\r\n   <w:Word11KerningPairs></w:Word11KerningPairs>\r\n   <w:CachedColBalance></w:CachedColBalance>\r\n  </w:Compatibility>\r\n  <w:BrowserLevel>MicrosoftInternetExplorer4</w:BrowserLevel>\r\n  <m:mathPr>\r\n   <m:mathFont m:val="Cambria Math"></m:mathFont>\r\n   <m:brkBin m:val="before"></m:brkBin>\r\n   <m:brkBinSub m:val="--"></m:brkBinSub>\r\n   <m:smallFrac m:val="off"></m:smallFrac>\r\n   <m:dispDef></m:dispDef>\r\n   <m:lMargin m:val="0"></m:lMargin>\r\n   <m:rMargin m:val="0"></m:rMargin>\r\n   <m:defJc m:val="centerGroup"></m:defJc>\r\n   <m:wrapIndent m:val="1440"></m:wrapIndent>\r\n   <m:intLim m:val="subSup"></m:intLim>\r\n   <m:naryLim m:val="undOvr"></m:naryLim>\r\n  </m:mathPr></w:WordDocument>\r\n</xml><![endif]-->\r\n\r\n<p class="MsoNormal" style="text-align:center" align="center"><span style="font-size:16.0pt;line-height:115%;font-family:SutonnyMJ">-t&nbsp; cÖavb\r\nwkÿKM‡bi ZvwjKv t-</span></p>\r\n\r\n<table class="MsoTableGrid" style="border-collapse:collapse;border:none;mso-border-alt:solid black .5pt;\r\n mso-border-themecolor:text1;mso-yfti-tbllook:1184;mso-padding-alt:0in 5.4pt 0in 5.4pt" border="1" cellpadding="0" cellspacing="0">\r\n <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes">\r\n  <td style="width:59.4pt;border:solid black 1.0pt;\r\n  mso-border-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="79">\r\n  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;\r\n  text-align:center;line-height:normal" align="center"><span style="font-size:16.0pt;\r\n  font-family:SutonnyMJ">µwgK bs</span></p>\r\n  </td>\r\n  <td style="width:3.25in;border:solid black 1.0pt;\r\n  mso-border-themecolor:text1;border-left:none;mso-border-left-alt:solid black .5pt;\r\n  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="312">\r\n  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;\r\n  text-align:center;line-height:normal" align="center"><span style="font-size:16.0pt;\r\n  font-family:SutonnyMJ">bvg</span></p>\r\n  </td>\r\n  <td style="width:99.0pt;border:solid black 1.0pt;\r\n  mso-border-themecolor:text1;border-left:none;mso-border-left-alt:solid black .5pt;\r\n  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="132">\r\n  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;\r\n  text-align:center;line-height:normal" align="center"><span style="font-size:16.0pt;\r\n  font-family:SutonnyMJ">nB‡Z</span></p>\r\n  </td>\r\n  <td style="width:1.2in;border:solid black 1.0pt;\r\n  mso-border-themecolor:text1;border-left:none;mso-border-left-alt:solid black .5pt;\r\n  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="115">\r\n  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;\r\n  text-align:center;line-height:normal" align="center"><span style="font-size:16.0pt;\r\n  font-family:SutonnyMJ">ch©šÍ</span></p>\r\n  </td>\r\n </tr>\r\n <tr style="mso-yfti-irow:1">\r\n  <td style="width:59.4pt;border:solid black 1.0pt;\r\n  mso-border-themecolor:text1;border-top:none;mso-border-top-alt:solid black .5pt;\r\n  mso-border-top-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="79">\r\n  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;\r\n  text-align:center;line-height:normal" align="center"><span style="font-size:16.0pt;\r\n  font-family:SutonnyMJ">01</span></p>\r\n  </td>\r\n  <td style="width:3.25in;border-top:none;border-left:\r\n  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:\r\n  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;\r\n  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="312">\r\n  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal"><span style="font-size:16.0pt;font-family:SutonnyMJ">Rbve †gvt\r\n  ev‡qwR` †nv‡mb wmwÏKx</span></p>\r\n  </td>\r\n  <td style="width:99.0pt;border-top:none;border-left:\r\n  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:\r\n  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;\r\n  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="132">\r\n  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;\r\n  text-align:center;line-height:normal" align="center"><span style="font-size:16.0pt;\r\n  font-family:SutonnyMJ">05/01/1968</span></p>\r\n  </td>\r\n  <td style="width:1.2in;border-top:none;border-left:none;\r\n  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:\r\n  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;\r\n  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="115">\r\n  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;\r\n  text-align:center;line-height:normal" align="center"><span style="font-size:16.0pt;\r\n  font-family:SutonnyMJ">09/01/1969</span></p>\r\n  </td>\r\n </tr>\r\n <tr style="mso-yfti-irow:2">\r\n  <td style="width:59.4pt;border:solid black 1.0pt;\r\n  mso-border-themecolor:text1;border-top:none;mso-border-top-alt:solid black .5pt;\r\n  mso-border-top-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="79">\r\n  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;\r\n  text-align:center;line-height:normal" align="center"><span style="font-size:16.0pt;\r\n  font-family:SutonnyMJ">02</span></p>\r\n  </td>\r\n  <td style="width:3.25in;border-top:none;border-left:\r\n  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:\r\n  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;\r\n  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="312">\r\n  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal"><span style="font-size:16.0pt;font-family:SutonnyMJ">Rbve †gvt Aveyj\r\n  nv‡kg Avn‡g`(fvtcÖtwkt)</span></p>\r\n  </td>\r\n  <td style="width:99.0pt;border-top:none;border-left:\r\n  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:\r\n  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;\r\n  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="132">\r\n  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;\r\n  text-align:center;line-height:normal" align="center"><span style="font-size:16.0pt;\r\n  font-family:SutonnyMJ">10/08/1969</span></p>\r\n  </td>\r\n  <td style="width:1.2in;border-top:none;border-left:none;\r\n  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:\r\n  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;\r\n  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="115">\r\n  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;\r\n  text-align:center;line-height:normal" align="center"><span style="font-size:16.0pt;\r\n  font-family:SutonnyMJ">18/01/1970</span></p>\r\n  </td>\r\n </tr>\r\n <tr style="mso-yfti-irow:3">\r\n  <td style="width:59.4pt;border:solid black 1.0pt;\r\n  mso-border-themecolor:text1;border-top:none;mso-border-top-alt:solid black .5pt;\r\n  mso-border-top-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="79">\r\n  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;\r\n  text-align:center;line-height:normal" align="center"><span style="font-size:16.0pt;\r\n  font-family:SutonnyMJ">03</span></p>\r\n  </td>\r\n  <td style="width:3.25in;border-top:none;border-left:\r\n  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:\r\n  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;\r\n  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="312">\r\n  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal"><span style="font-size:16.0pt;font-family:SutonnyMJ">Rbve †gvt nvmvb\r\n  Avjx wgqv</span></p>\r\n  </td>\r\n  <td style="width:99.0pt;border-top:none;border-left:\r\n  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:\r\n  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;\r\n  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="132">\r\n  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;\r\n  text-align:center;line-height:normal" align="center"><span style="font-size:16.0pt;\r\n  font-family:SutonnyMJ">19/01/1970</span></p>\r\n  </td>\r\n  <td style="width:1.2in;border-top:none;border-left:none;\r\n  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:\r\n  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;\r\n  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="115">\r\n  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;\r\n  text-align:center;line-height:normal" align="center"><span style="font-size:16.0pt;\r\n  font-family:SutonnyMJ">25/11/1972</span></p>\r\n  </td>\r\n </tr>\r\n <tr style="mso-yfti-irow:4">\r\n  <td style="width:59.4pt;border:solid black 1.0pt;\r\n  mso-border-themecolor:text1;border-top:none;mso-border-top-alt:solid black .5pt;\r\n  mso-border-top-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="79">\r\n  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;\r\n  text-align:center;line-height:normal" align="center"><span style="font-size:16.0pt;\r\n  font-family:SutonnyMJ">04</span></p>\r\n  </td>\r\n  <td style="width:3.25in;border-top:none;border-left:\r\n  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:\r\n  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;\r\n  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="312">\r\n  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal"><span style="font-size:16.0pt;font-family:SutonnyMJ">Rbve †gvt Aveyj\r\n  nv‡kg Avn‡g`</span></p>\r\n  </td>\r\n  <td style="width:99.0pt;border-top:none;border-left:\r\n  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:\r\n  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;\r\n  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="132">\r\n  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;\r\n  text-align:center;line-height:normal" align="center"><span style="font-size:16.0pt;\r\n  font-family:SutonnyMJ">26/11/1972</span></p>\r\n  </td>\r\n  <td style="width:1.2in;border-top:none;border-left:none;\r\n  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:\r\n  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;\r\n  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="115">\r\n  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;\r\n  text-align:center;line-height:normal" align="center"><span style="font-size:16.0pt;\r\n  font-family:SutonnyMJ">12/08/2006</span></p>\r\n  </td>\r\n </tr>\r\n <tr style="mso-yfti-irow:5">\r\n  <td style="width:59.4pt;border:solid black 1.0pt;\r\n  mso-border-themecolor:text1;border-top:none;mso-border-top-alt:solid black .5pt;\r\n  mso-border-top-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="79">\r\n  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;\r\n  text-align:center;line-height:normal" align="center"><span style="font-size:16.0pt;\r\n  font-family:SutonnyMJ">05</span></p>\r\n  </td>\r\n  <td style="width:3.25in;border-top:none;border-left:\r\n  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:\r\n  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;\r\n  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="312">\r\n  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal"><span style="font-size:16.0pt;font-family:SutonnyMJ">Rbve †gvt Aveyj\r\n  Kv‡kg Zvs (fvtcÖtwkt)</span></p>\r\n  </td>\r\n  <td style="width:99.0pt;border-top:none;border-left:\r\n  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:\r\n  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;\r\n  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="132">\r\n  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;\r\n  text-align:center;line-height:normal" align="center"><span style="font-size:16.0pt;\r\n  font-family:SutonnyMJ">13/08/2006</span></p>\r\n  </td>\r\n  <td style="width:1.2in;border-top:none;border-left:none;\r\n  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:\r\n  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;\r\n  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="115">\r\n  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;\r\n  text-align:center;line-height:normal" align="center"><span style="font-size:16.0pt;\r\n  font-family:SutonnyMJ">12/09/2006</span></p>\r\n  </td>\r\n </tr>\r\n <tr style="mso-yfti-irow:6">\r\n  <td style="width:59.4pt;border:solid black 1.0pt;\r\n  mso-border-themecolor:text1;border-top:none;mso-border-top-alt:solid black .5pt;\r\n  mso-border-top-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="79">\r\n  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;\r\n  text-align:center;line-height:normal" align="center"><span style="font-size:16.0pt;\r\n  font-family:SutonnyMJ">06</span></p>\r\n  </td>\r\n  <td style="width:3.25in;border-top:none;border-left:\r\n  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:\r\n  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;\r\n  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="312">\r\n  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal"><span style="font-size:16.0pt;font-family:SutonnyMJ">Rbve †gvt\r\n  nvweeyi ingvb (fvtcÖtwkt)</span></p>\r\n  </td>\r\n  <td style="width:99.0pt;border-top:none;border-left:\r\n  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:\r\n  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;\r\n  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="132">\r\n  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;\r\n  text-align:center;line-height:normal" align="center"><span style="font-size:16.0pt;\r\n  font-family:SutonnyMJ">13/09/2006</span></p>\r\n  </td>\r\n  <td style="width:1.2in;border-top:none;border-left:none;\r\n  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:\r\n  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;\r\n  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="115">\r\n  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;\r\n  text-align:center;line-height:normal" align="center"><span style="font-size:16.0pt;\r\n  font-family:SutonnyMJ">30/12/2007</span></p>\r\n  </td>\r\n </tr>\r\n <tr style="mso-yfti-irow:7">\r\n  <td style="width:59.4pt;border:solid black 1.0pt;\r\n  mso-border-themecolor:text1;border-top:none;mso-border-top-alt:solid black .5pt;\r\n  mso-border-top-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="79">\r\n  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;\r\n  text-align:center;line-height:normal" align="center"><span style="font-size:16.0pt;\r\n  font-family:SutonnyMJ">07</span></p>\r\n  </td>\r\n  <td style="width:3.25in;border-top:none;border-left:\r\n  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:\r\n  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;\r\n  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="312">\r\n  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal"><span style="font-size:16.0pt;font-family:SutonnyMJ">Rbve †gvt Avey\r\n  †nv‡mb miKvi (fvtcÖtwkt)</span></p>\r\n  </td>\r\n  <td style="width:99.0pt;border-top:none;border-left:\r\n  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:\r\n  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;\r\n  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="132">\r\n  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;\r\n  text-align:center;line-height:normal" align="center"><span style="font-size:16.0pt;\r\n  font-family:SutonnyMJ">31/12/2007</span></p>\r\n  </td>\r\n  <td style="width:1.2in;border-top:none;border-left:none;\r\n  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:\r\n  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;\r\n  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="115">\r\n  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;\r\n  text-align:center;line-height:normal" align="center"><span style="font-size:16.0pt;\r\n  font-family:SutonnyMJ">19/10/2011</span></p>\r\n  </td>\r\n </tr>\r\n <tr style="mso-yfti-irow:8">\r\n  <td style="width:59.4pt;border:solid black 1.0pt;\r\n  mso-border-themecolor:text1;border-top:none;mso-border-top-alt:solid black .5pt;\r\n  mso-border-top-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="79">\r\n  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;\r\n  text-align:center;line-height:normal" align="center"><span style="font-size:16.0pt;\r\n  font-family:SutonnyMJ">08</span></p>\r\n  </td>\r\n  <td style="width:3.25in;border-top:none;border-left:\r\n  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:\r\n  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;\r\n  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="312">\r\n  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal"><span style="font-size:16.0pt;font-family:SutonnyMJ">Rbve †gvt Aveyj\r\n  Kv‡kg Zvs (fvtcÖtwkt)</span></p>\r\n  </td>\r\n  <td style="width:99.0pt;border-top:none;border-left:\r\n  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:\r\n  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;\r\n  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="132">\r\n  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;\r\n  text-align:center;line-height:normal" align="center"><span style="font-size:16.0pt;\r\n  font-family:SutonnyMJ">20/10/2011</span></p>\r\n  </td>\r\n  <td style="width:1.2in;border-top:none;border-left:none;\r\n  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:\r\n  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;\r\n  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="115">\r\n  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;\r\n  text-align:center;line-height:normal" align="center"><span style="font-size:16.0pt;\r\n  font-family:SutonnyMJ">31/12/2011</span></p>\r\n  </td>\r\n </tr>\r\n <tr style="mso-yfti-irow:9;mso-yfti-lastrow:yes">\r\n  <td style="width:59.4pt;border:solid black 1.0pt;\r\n  mso-border-themecolor:text1;border-top:none;mso-border-top-alt:solid black .5pt;\r\n  mso-border-top-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="79">\r\n  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;\r\n  text-align:center;line-height:normal" align="center"><span style="font-size:16.0pt;\r\n  font-family:SutonnyMJ">09</span></p>\r\n  </td>\r\n  <td style="width:3.25in;border-top:none;border-left:\r\n  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:\r\n  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;\r\n  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="312">\r\n  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:\r\n  normal"><span style="font-size:16.0pt;font-family:SutonnyMJ">Rbve LvRv\r\n  †di‡`Šm Avjg</span></p>\r\n  </td>\r\n  <td style="width:99.0pt;border-top:none;border-left:\r\n  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:\r\n  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;\r\n  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="132">\r\n  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;\r\n  text-align:center;line-height:normal" align="center"><span style="font-size:16.0pt;\r\n  font-family:SutonnyMJ">01/01/2012</span></p>\r\n  </td>\r\n  <td style="width:1.2in;border-top:none;border-left:none;\r\n  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;\r\n  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:\r\n  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;\r\n  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:\r\n  text1;padding:0in 5.4pt 0in 5.4pt" valign="top" width="115">\r\n  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;\r\n  text-align:center;line-height:normal" align="center"><span style="font-size:16.0pt;\r\n  font-family:SutonnyMJ">Pjgvb</span></p>\r\n  </td>\r\n </tr>\r\n</tbody></table>\r\n\r\n<p class="MsoNormal"><span style="font-size:16.0pt;line-height:115%;font-family:\r\nSutonnyMJ">&nbsp;</span></p>\r\n\r\n<!--[if gte mso 9]><xml>\r\n <w:LatentStyles DefLockedState="false" DefUnhideWhenUsed="true"\r\n  DefSemiHidden="true" DefQFormat="false" DefPriority="99"\r\n  LatentStyleCount="267">\r\n  <w:LsdException Locked="false" Priority="0" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Normal"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="heading 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 7"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 8"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 9"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 7"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 8"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 9"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="35" QFormat="true" Name="caption"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="10" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Title"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="1" Name="Default Paragraph Font"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="11" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Subtitle"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="22" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Strong"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="20" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Emphasis"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="59" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Table Grid"></w:LsdException>\r\n  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Placeholder Text"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="1" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="No Spacing"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Revision"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="34" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="List Paragraph"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="29" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Quote"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="30" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Intense Quote"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="19" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Subtle Emphasis"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="21" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Intense Emphasis"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="31" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Subtle Reference"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="32" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Intense Reference"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="33" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Book Title"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="37" Name="Bibliography"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" QFormat="true" Name="TOC Heading"></w:LsdException>\r\n </w:LatentStyles>\r\n</xml><![endif]--><!--[if gte mso 10]>\r\n<style>\r\n /* Style Definitions */\r\n table.MsoNormalTable\r\n	{mso-style-name:"Table Normal";\r\n	mso-tstyle-rowband-size:0;\r\n	mso-tstyle-colband-size:0;\r\n	mso-style-noshow:yes;\r\n	mso-style-priority:99;\r\n	mso-style-qformat:yes;\r\n	mso-style-parent:"";\r\n	mso-padding-alt:0in 5.4pt 0in 5.4pt;\r\n	mso-para-margin-top:0in;\r\n	mso-para-margin-right:0in;\r\n	mso-para-margin-bottom:10.0pt;\r\n	mso-para-margin-left:0in;\r\n	line-height:115%;\r\n	mso-pagination:widow-orphan;\r\n	font-size:11.0pt;\r\n	mso-bidi-font-size:14.0pt;\r\n	font-family:"Calibri","sans-serif";\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-fareast-font-family:"Times New Roman";\r\n	mso-fareast-theme-font:minor-fareast;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:Vrinda;\r\n	mso-bidi-theme-font:minor-bidi;}\r\ntable.MsoTableGrid\r\n	{mso-style-name:"Table Grid";\r\n	mso-tstyle-rowband-size:0;\r\n	mso-tstyle-colband-size:0;\r\n	mso-style-priority:59;\r\n	mso-style-unhide:no;\r\n	border:solid black 1.0pt;\r\n	mso-border-themecolor:text1;\r\n	mso-border-alt:solid black .5pt;\r\n	mso-border-themecolor:text1;\r\n	mso-padding-alt:0in 5.4pt 0in 5.4pt;\r\n	mso-border-insideh:.5pt solid black;\r\n	mso-border-insideh-themecolor:text1;\r\n	mso-border-insidev:.5pt solid black;\r\n	mso-border-insidev-themecolor:text1;\r\n	mso-para-margin:0in;\r\n	mso-para-margin-bottom:.0001pt;\r\n	mso-pagination:widow-orphan;\r\n	font-size:11.0pt;\r\n	font-family:"Calibri","sans-serif";\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:Vrinda;\r\n	mso-bidi-theme-font:minor-bidi;\r\n	mso-bidi-language:AR-SA;}\r\n</style>\r\n<![endif]-->', '1450934458', 0, 1, 1);
INSERT INTO `webpages` (`PageId`, `PageTitle`, `PageRoute`, `SpecificRoutes`, `ParentId`, `PageOrder`, `Description`, `PublishDate`, `isSpecial`, `isInMenu`, `isActive`) VALUES
(61, 'প্রতিষ্ঠান প্রধানের বার্তা', 'messageofheadteacher', NULL, 88, 88, '&nbsp;বিসমিল্লাহির রাহমানির রাহিম।<br>&nbsp;টাঙ্গাইল জেলার ঘাটাইল উপজেলার অন্তর্গত গৌরাঙ্গী একাশী ওছমানীয়া উচ্চ বিদ্যালয়টি নিরেট অজপাড়াগাঁয়ে অবস্থিত একটি ঐতিহ্যবাহী বিদ্যালয়।তদানীন্তন শিক্ষা বিবর্জিত এলাকায় শিক্ষা বিস্তারের প্রয়োজনে এলাকার কতিপয় সচেতন মানুষের চেষ্টার ফসল এই বিদ্যালয় । ১৯৬৮ সালে প্রতিষ্ঠিত হয়ে অদ্যাবধি ছড়িয়ে যাচ্ছে বিদ্যার আলো। বর্তমান যুগ আধুনিক সভ্যতার যুগ , তথা কম্পিউটার যুগ। আধুনিক সভ্যতার সাথে তাল মিলিয়ে কম্পিউটারের ব্যবহার চলছে এ বিদ্যালয়েও। অতীত ঐতিহ্যকে ধারন করে , নতুন সভ্যতার আলো ছড়িয়ে ডিজিটাল বাংলাদেশ তথা স্বপ্নের বাংলাদেশ গড়তে সহায়তা্য সফলকাম হবে এ বিদ্যালয়টি। আল্লাহ আমাদের তৌফিক দিন। আমীন। <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; খাজা ফেরদৌস আলম,<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; প্রধান শিক্ষক,<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; গৌরাঙ্গী একাশী ওছমানীয়া উচ্চ বিদ্যালয়।<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>', '1450938847', 0, 1, 1),
(62, 'প্রাক্তন শিক্ষকদের তালিকা', 'xteacher', NULL, 2, 0, '', '1450940075', 0, 1, 1),
(63, 'কর্মচারীদের  তালিকা ', 'staffs', NULL, 2, 0, '', '1450940199', 0, 1, 1),
(64, 'শুন্যপদের তথ্য', 'vacancy', NULL, 57, 0, '<p>শুন্য পদের তথ্য</p>\r\n<table class="table table-bordered">\r\n<tbody>\r\n<tr>\r\n<td>পদের নাম &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br><br></td>\r\n<td>ন্যূনতম যোগ্যতা</td>\r\n<td>আসন সংখ্যা</td>\r\n</tr>\r\n<tr>\r\n<td>সহকারি গ্রন্থাগারিক &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</td>\r\n<td>সরকার অনুমোদিত বিশ্ববিদ্যালয় হইতে<br>\r\nগ্রন্থাগারিক এ ডিপ্লোমা সার্টিফিকেটধারী। &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</td>\r\n<td>০১</td>\r\n</tr>\r\n</tbody>\r\n</table> ', '1450937563', 0, 1, 1),
(65, 'ইউনিফরম ও বেতন কাঠামো', 'Uniformsstructure', NULL, 57, 0, '<h3></h3>\r\n<table class="table table-bordered">\r\n\r\n<tbody>\r\n<tr>\r\n <td>শ্রেণি</td>\r\n <td>ভর্তি ফি</td>\r\n <td>সেশন চার্চ</td>\r\n <td>মাসিক বেতন</td>\r\n</tr>\r\n<tr>\r\n	<td>৬ষ্ঠ</td>\r\n	<td>১০০</td>\r\n	<td>৫০০</td>\r\n	<td>১০০</td>\r\n</tr>\r\n<tr>\r\n	<td>৭ম</td>\r\n	<td>১১০</td>\r\n	<td>৫০০</td>\r\n	<td>১০০</td>\r\n</tr>\r\n<tr>\r\n	<td>৮ম</td>\r\n	<td>১৫০</td>\r\n	<td>৫০০</td>\r\n	<td>১০০</td>\r\n</tr>\r\n<tr>\r\n	<td>৯ম</td>\r\n	<td>১৫০</td>\r\n	<td>৫০০</td>\r\n	<td>১০০</td>\r\n</tr>\r\n<tr>\r\n	<td>১০ম</td>\r\n	<td>১০০</td>\r\n	<td>৫০০</td>\r\n	<td>১০০</td>\r\n</tr>\r\n\r\n</tbody>\r\n</table>', '1450939545', 0, 1, 1),
(66, 'ভৌত অবকাঠামো', 'Infrastructure', NULL, 57, 0, '', '1450938527', 0, 1, 1),
(67, 'সংবাদ', 'latestnews', NULL, 0, 3, '<br>', '1450937928', 0, 1, 1),
(68, 'গ্যালারী', 'gallery', NULL, 0, 0, '[tritiyo:Photogallery cols=3]', '1450937389', 1, 1, 1),
(69, 'শিক্ষার্থী', 'students', NULL, 0, 22, '', '1450936910', NULL, 1, 1),
(70, 'যোগাযোগ', 'Contact', NULL, 0, 0, '', '1450936911', NULL, 1, 1),
(71, 'অনলাইন ভর্তি', 'Onlineadmission', NULL, 69, 0, '<script type = "text/javascript" language = "javascript">\r\nwindow.location = baseurl +"admission";\r\n</script>', '1450937453', 0, 1, 1),
(72, 'ছাত্র ছাত্রীদের তালিকা ', 'StudentsList', NULL, 69, 0, '<h3>ছাত্র/ছাত্রীর সংখ্যা ২০১৬খ্রিঃ</h3>\r\n<table class="table table-bordered">\r\n\r\n<tbody>\r\n<tr>\r\n <th>শ্রেনী</th>\r\n <th>ছাত্র</th>\r\n <th>ছাত্রী</th>\r\n <th>মোট</th>\r\n</tr>\r\n<tr>\r\n	<td>১০ম</td>\r\n	<td>৪৪</td>\r\n	<td>৫৬</td>\r\n	<td>১০০</td>\r\n</tr>\r\n<tr>\r\n	<td>৯ম</td>\r\n	<td>৪০</td>\r\n	<td>৫০</td>\r\n	<td>৯০</td>\r\n</tr>\r\n<tr>\r\n	<td>৮ম</td>\r\n	<td>৬০</td>\r\n	<td>৫০</td>\r\n	<td>১১০</td>\r\n</tr>\r\n<tr>\r\n	<td>৭ম</td>\r\n	<td>৬০</td>\r\n	<td>৫৫</td>\r\n	<td>১১৫</td>\r\n</tr>\r\n<tr>\r\n	<td>৬ষ্ট</td>\r\n	<td>৪০</td>\r\n	<td>৫৫</td>\r\n	<td>৯৫</td>\r\n</tr>\r\n</tbody>\r\n</table>', '1450940333', 1, 1, 1),
(73, 'প্রাক্তন  ছাত্র ছাত্রীদের তালিকা ', 'xstudentlist', NULL, 69, 0, '', '1450939554', NULL, 1, 1),
(74, 'প্রশংসা পত্র', 'Certificate', NULL, 69, 76, '', '1450939976', 0, 1, 1),
(75, 'ছাড়পত্র', 'Protection', NULL, 69, 69, '<!--[if gte mso 9]><xml>\r\n <o:OfficeDocumentSettings>\r\n  <o:RelyOnVML></o:RelyOnVML>\r\n  <o:AllowPNG></o:AllowPNG>\r\n </o:OfficeDocumentSettings>\r\n</xml><![endif]-->\r\n\r\n<p class="MsoNormal" style="margin:0in;margin-bottom:.0001pt;text-align:justify;\r\ntab-stops:0in 225.0pt 3.5in"><span style="font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;\r\nmso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:\r\nCalibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:Vrinda;\r\nmso-bidi-theme-font:minor-bidi;mso-bidi-language:BN" lang="BN">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ক্রমিক নং-<span style="mso-spacerun:yes">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><span style="mso-spacerun:yes">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="mso-spacerun:yes">&nbsp;</span><span style="mso-tab-count:1"> </span><span style="mso-spacerun:yes">&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="mso-spacerun:yes">&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="mso-spacerun:yes"> </span>তারিখ-</span></p>\r\n\r\n<p class="MsoNormal" style="margin:0in;margin-bottom:.0001pt;text-align:justify;\r\ntab-stops:0in 225.0pt 3.5in"><span style="font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;\r\nmso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:\r\nCalibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:Vrinda;\r\nmso-bidi-theme-font:minor-bidi;mso-bidi-language:BN" lang="BN">&nbsp;</span></p>\r\n\r\n<p class="MsoNormal" style="margin:0in;margin-bottom:.0001pt;tab-stops:0in 225.0pt 3.5in"><span style="font-size:20.0pt;font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;mso-ascii-font-family:\r\nCalibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;\r\nmso-hansi-theme-font:minor-latin;mso-bidi-font-family:Vrinda;mso-bidi-theme-font:\r\nminor-bidi;mso-bidi-language:BN;mso-ansi-font-weight:bold" lang="BN">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; গৌরাঙ্গী একাশী\r\nওছমানীয়া উচ্চ বিদ্যালয়</span></p>\r\n\r\n<p class="MsoNormal" style="margin:0in;margin-bottom:.0001pt;tab-stops:0in 314.3pt"><span style="font-size:14.0pt;font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;mso-ascii-font-family:\r\nCalibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;\r\nmso-hansi-theme-font:minor-latin;mso-bidi-font-family:Vrinda;mso-bidi-theme-font:\r\nminor-bidi;mso-bidi-language:BN" lang="BN">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; স্থাপিত- ১৯৬৮ খ্রিঃ।</span></p>\r\n\r\n<p class="MsoNormal" style="margin:0in;margin-bottom:.0001pt;tab-stops:0in 225.0pt 3.5in"><span style="font-size:24.0pt;font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;mso-ascii-font-family:\r\nCalibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;\r\nmso-hansi-theme-font:minor-latin;mso-bidi-font-family:Vrinda;mso-bidi-theme-font:\r\nminor-bidi;mso-bidi-language:BN" lang="BN">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; বিদ্যালয় পরিত্যাগ পত্র</span></p>\r\n\r\n<p class="MsoNormal" style="margin-left:0in;text-align:left;\r\ntab-stops:118.35pt center 261.65pt" align="left"><span style="font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;\r\nmso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:\r\nCalibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:Vrinda;\r\nmso-bidi-theme-font:minor-bidi;mso-bidi-language:BN" lang="BN">&nbsp;<span style="mso-tab-count:1">&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; </span>এই মর্মে\r\nপ্রত্যয়ন করা যাইতেছে যে,.............................................পিতা..................................... <br></span></p><p class="MsoNormal" style="margin-left:0in;text-align:left;\r\ntab-stops:118.35pt center 261.65pt" align="left"><span style="font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;\r\nmso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:\r\nCalibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:Vrinda;\r\nmso-bidi-theme-font:minor-bidi;mso-bidi-language:BN" lang="BN">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; মাতা................................. গ্রাম..............................ডাকঘর..........................................উপজেলা........................ জেলা...........................অত্র\r\nবিদ্যালয় ..............................তারিখে পরিত্যাগ করিল। সে ........... শ্রেনীতে\r\nপড়িতেছিল এবং বিদ্যালয়ের যাবতীয় পাওনা ........................পর্যন্ত পরিশোধ\r\nকরিয়াছে।ভর্তি বহি অনুসারে তাহার জন্ম তারিখ........................। রেজিঃ\r\nনং-.....................সন..................।</span></p>\r\n\r\n<p class="MsoNormal" style="margin-left:0in;text-align:left;\r\ntab-stops:118.35pt center 261.65pt" align="left"><span style="font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;\r\nmso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:\r\nCalibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:Vrinda;\r\nmso-bidi-theme-font:minor-bidi;mso-bidi-language:BN" lang="BN"><span style="mso-spacerun:yes">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><span style="mso-spacerun:yes">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>যতদুর আমি জানি , তাহার স্বভাব-চরিত্র\r\nভাল। আমি তাহার মঙ্গল কামনা করি।</span><span style="font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;\r\nmso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:\r\nCalibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:Vrinda;\r\nmso-bidi-theme-font:minor-bidi;mso-bidi-language:BN" lang="BN"><br></span></p><p class="MsoNormal" style="margin-left:0in;text-align:left;\r\ntab-stops:118.35pt center 261.65pt" align="left"><span style="font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;\r\nmso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:\r\nCalibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:Vrinda;\r\nmso-bidi-theme-font:minor-bidi;mso-bidi-language:BN" lang="BN">&nbsp;&nbsp; ১। বিদ্যালয় পরিত্যাগের\r\nকারনঃ</span>\r\n\r\n</p><p class="MsoNormal" style="margin-left:0in;text-align:left;\r\ntab-stops:118.35pt center 261.65pt" align="left"><span style="font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;\r\nmso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:\r\nCalibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:Vrinda;\r\nmso-bidi-theme-font:minor-bidi;mso-bidi-language:BN" lang="BN">&nbsp;&nbsp; ২।চরিত্র ও আচরনঃ</span></p>\r\n\r\n<p class="MsoNormal" style="margin-left:0in;text-align:left;\r\ntab-stops:118.35pt center 261.65pt" align="left"><span style="font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;\r\nmso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:\r\nCalibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:Vrinda;\r\nmso-bidi-theme-font:minor-bidi;mso-bidi-language:BN" lang="BN">&nbsp;&nbsp; ৩। বিদ্যালয়ে উপস্থিতিঃ</span></p>\r\n\r\n<p class="MsoNormal" style="margin-left:0in;text-align:left;\r\ntab-stops:118.35pt center 261.65pt" align="left"><span style="font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;\r\nmso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:\r\nCalibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:Vrinda;\r\nmso-bidi-theme-font:minor-bidi;mso-bidi-language:BN" lang="BN">&nbsp;&nbsp; ৪। পাঠোন্নতিঃ <br></span></p>\r\n\r\n<p class="MsoNormal" style="margin-left:0in;text-align:left;\r\ntab-stops:118.35pt center 261.65pt" align="left"><span style="font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;\r\nmso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:\r\nCalibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:Vrinda;\r\nmso-bidi-theme-font:minor-bidi;mso-bidi-language:BN" lang="BN">&nbsp;</span></p><p class="MsoNormal" style="margin-left:0in;text-align:left;\r\ntab-stops:118.35pt center 261.65pt" align="left"><span style="font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;\r\nmso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:\r\nCalibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:Vrinda;\r\nmso-bidi-theme-font:minor-bidi;mso-bidi-language:BN" lang="BN">&nbsp;&nbsp;<span style="mso-spacerun:yes">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; </span>অফিস সহকারী<span style="mso-spacerun:yes">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><span style="mso-spacerun:yes">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="mso-spacerun:yes">&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; </span><span style="mso-spacerun:yes">&nbsp; &nbsp;&nbsp; &nbsp; </span>প্রধান শিক্ষক,</span><span style="font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;\r\nmso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:\r\nCalibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:Vrinda;\r\nmso-bidi-theme-font:minor-bidi;mso-bidi-language:BN" lang="BN"><br></span></p><p class="MsoNormal" style="margin-left:0in;text-align:left;\r\ntab-stops:118.35pt center 261.65pt" align="left"><span style="font-family:&quot;Vrinda&quot;,&quot;sans-serif&quot;;\r\nmso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:\r\nCalibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:Vrinda;\r\nmso-bidi-theme-font:minor-bidi;mso-bidi-language:BN" lang="BN">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; গৌরাঙ্গী একাশী ওছমানীয়া\r\nউচ্চ বিদ্যালয়।<span style="mso-spacerun:yes">&nbsp;&nbsp;&nbsp; </span><span style="mso-spacerun:yes">&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span><span style="mso-tab-count:1"> </span>গৌরাঙ্গী\r\nএকাশী ওছমানীয়া উচ্চ বিদ্যালয়।</span><span style="mso-bidi-language:BN"></span>\r\n\r\n</p>', '1450938417', 0, 1, 1),
(76, 'প্রত্যয়নপত্র', 'certificate', NULL, 69, 0, '', '1450937158', 0, 1, 1),
(77, 'শিক্ষক/ শিক্ষিকা', 'teacherlist', NULL, 2, 0, '<!--[if gte mso 9]><xml>\r\n <w:WordDocument>\r\n  <w:View>Normal</w:View>\r\n  <w:Zoom>0</w:Zoom>\r\n  <w:TrackMoves></w:TrackMoves>\r\n  <w:TrackFormatting></w:TrackFormatting>\r\n  <w:PunctuationKerning></w:PunctuationKerning>\r\n  <w:ValidateAgainstSchemas></w:ValidateAgainstSchemas>\r\n  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>\r\n  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>\r\n  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>\r\n  <w:DoNotPromoteQF></w:DoNotPromoteQF>\r\n  <w:LidThemeOther>EN-US</w:LidThemeOther>\r\n  <w:LidThemeAsian>X-NONE</w:LidThemeAsian>\r\n  <w:LidThemeComplexScript>BN</w:LidThemeComplexScript>\r\n  <w:Compatibility>\r\n   <w:BreakWrappedTables></w:BreakWrappedTables>\r\n   <w:SnapToGridInCell></w:SnapToGridInCell>\r\n   <w:WrapTextWithPunct></w:WrapTextWithPunct>\r\n   <w:UseAsianBreakRules></w:UseAsianBreakRules>\r\n   <w:DontGrowAutofit></w:DontGrowAutofit>\r\n   <w:SplitPgBreakAndParaMark></w:SplitPgBreakAndParaMark>\r\n   <w:DontVertAlignCellWithSp></w:DontVertAlignCellWithSp>\r\n   <w:DontBreakConstrainedForcedTables></w:DontBreakConstrainedForcedTables>\r\n   <w:DontVertAlignInTxbx></w:DontVertAlignInTxbx>\r\n   <w:Word11KerningPairs></w:Word11KerningPairs>\r\n   <w:CachedColBalance></w:CachedColBalance>\r\n  </w:Compatibility>\r\n  <w:BrowserLevel>MicrosoftInternetExplorer4</w:BrowserLevel>\r\n  <m:mathPr>\r\n   <m:mathFont m:val="Cambria Math"></m:mathFont>\r\n   <m:brkBin m:val="before"></m:brkBin>\r\n   <m:brkBinSub m:val="--"></m:brkBinSub>\r\n   <m:smallFrac m:val="off"></m:smallFrac>\r\n   <m:dispDef></m:dispDef>\r\n   <m:lMargin m:val="0"></m:lMargin>\r\n   <m:rMargin m:val="0"></m:rMargin>\r\n   <m:defJc m:val="centerGroup"></m:defJc>\r\n   <m:wrapIndent m:val="1440"></m:wrapIndent>\r\n   <m:intLim m:val="subSup"></m:intLim>\r\n   <m:naryLim m:val="undOvr"></m:naryLim>\r\n  </m:mathPr></w:WordDocument>\r\n</xml><![endif]--><!--[if gte mso 9]><xml>\r\n <w:LatentStyles DefLockedState="false" DefUnhideWhenUsed="true"\r\n  DefSemiHidden="true" DefQFormat="false" DefPriority="99"\r\n  LatentStyleCount="267">\r\n  <w:LsdException Locked="false" Priority="0" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Normal"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="heading 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 7"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 8"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 9"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 7"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 8"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 9"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="35" QFormat="true" Name="caption"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="10" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Title"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="1" Name="Default Paragraph Font"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="11" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Subtitle"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="22" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Strong"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="20" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Emphasis"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="59" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Table Grid"></w:LsdException>\r\n  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Placeholder Text"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="1" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="No Spacing"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Revision"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="34" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="List Paragraph"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="29" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Quote"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="30" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Intense Quote"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="19" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Subtle Emphasis"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="21" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Intense Emphasis"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="31" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Subtle Reference"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="32" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Intense Reference"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="33" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Book Title"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="37" Name="Bibliography"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" QFormat="true" Name="TOC Heading"></w:LsdException>\r\n </w:LatentStyles>\r\n</xml><![endif]--><!--[if gte mso 10]>\r\n<style>\r\n /* Style Definitions */\r\n table.MsoNormalTable\r\n	{mso-style-name:"Table Normal";\r\n	mso-tstyle-rowband-size:0;\r\n	mso-tstyle-colband-size:0;\r\n	mso-style-noshow:yes;\r\n	mso-style-priority:99;\r\n	mso-style-qformat:yes;\r\n	mso-style-parent:"";\r\n	mso-padding-alt:0in 5.4pt 0in 5.4pt;\r\n	mso-para-margin:0in;\r\n	mso-para-margin-bottom:.0001pt;\r\n	mso-pagination:widow-orphan;\r\n	font-size:11.0pt;\r\n	mso-bidi-font-size:14.0pt;\r\n	font-family:"Calibri","sans-serif";\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-fareast-font-family:"Times New Roman";\r\n	mso-fareast-theme-font:minor-fareast;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:Vrinda;\r\n	mso-bidi-theme-font:minor-bidi;}\r\n</style>\r\n<![endif]--><!--[if gte mso 9]><xml>\r\n <o:shapedefaults v:ext="edit" spidmax="1026"></o:shapedefaults>\r\n</xml><![endif]--><!--[if gte mso 9]><xml>\r\n <o:shapelayout v:ext="edit">\r\n  <o:idmap v:ext="edit" data="1"></o:idmap>\r\n </o:shapelayout></xml><![endif]-->[tritiyo:Teacherlist]', '1450942982', 1, 1, 1);
INSERT INTO `webpages` (`PageId`, `PageTitle`, `PageRoute`, `SpecificRoutes`, `ParentId`, `PageOrder`, `Description`, `PublishDate`, `isSpecial`, `isInMenu`, `isActive`) VALUES
(78, 'ক্লাস রুটিন', 'ClassRoutine', NULL, 88, 88, '<h3><center>ক্লাস রুটিন/২০১৬ </center></h3>\r\n<table class="table table-bordered">\r\n<tbody>\r\n<tr>\r\n	<td>ক্রমিক নং</td>\r\n	<td>শিক্ষকগনের নাম</td>\r\n	<td> <br></td>\r\n	<td>১ম ঘন্টা &nbsp;&nbsp; </td>\r\n	<td>২য় ঘন্টা&nbsp; <br></td>\r\n	<td>৩য় ঘন্টা</td>\r\n	<td>&nbsp; বিরতি</td>\r\n	<td>৪র্থ ঘন্টা</td>\r\n	<td>৫ম ঘন্টা</td>\r\n	<td>৬ষ্ঠ ঘন্টা</td>\r\n</tr>\r\n<tr>\r\n<td>০১</td>					\r\n<td>প্রধান শিক্ষক</td>\r\n<td><br></td><td>নাই<br></td>\r\n<td>ইংরেজী ১মও২য়/৯ম</td><td>&nbsp; &nbsp; নাই<br></td>\r\n<td><br></td>\r\n<td>ইংরেজী ২য়/৮ম গোলাপ<br></td>\r\n<td>&nbsp; নাই&nbsp;</td><td>&nbsp;নাই<br></td>\r\n\r\n\r\n</tr>\r\n<tr>\r\n<td>০২ &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</td><td>&nbsp;সহঃ প্রঃ শিক্ষক</td><td><br></td>\r\n<td>গনিত/৪দিন ১০ম</td>\r\n<td>গনিত /৪দিন &nbsp;৮ম গোলাপ</td>\r\n<td>পদার্থ/রসায়ন ১০ম</td>\r\n<td>demo</td>\r\n<td>পদার্থ/রসায়ন ৯ম</td>\r\n<td>উঃগঃ/৩দিন ৯ম</td>\r\n<td>উঃগঃ/৩দিন, ১০ম</td>\r\n</tr>\r\n<tr>\r\n<td>০৩</td>					\r\n<td>আবু হোঃসরকার</td>\r\n<td><br></td>\r\n<td>নাই</td>\r\n<td>গনিত/৪দিন ৭মগোলাপ</td>\r\n<td>নাই</td>\r\n<td>demo</td>\r\n<td>সাঃবিজ্ঞান/৩দিন ১০ম</td>\r\n<td>সাঃবিঃ,কৃষি/৬ষ্ট জবা</td>\r\n<td>সাঃবিঃ/কৃষি, &nbsp; &nbsp; &nbsp; &nbsp;৬ষ্ট গোলাপ</td>\r\n</tr>\r\n<tr>\r\n<td>০৪</td>								\r\n<td>রঃ আযম</td>\r\n<td><br></td>\r\n<td>গনিত/কর্ম ও জীবন ৬ষ্ঠ</td>\r\n<td>নাই</td>\r\n<td>বিজ্ঞান,কর্ম/৭ম জবা</td>\r\n<td>demo</td>\r\n<td>বিজ্ঞান,কৃষি/৭ম গোলাপ</td>\r\n<td>জীব/৯ম-৩দিন</td>\r\n<td>জীব/১০ম-৩দিন</td>\r\n</tr>\r\n<tr>\r\n<td>০৫</td>									\r\n<td>আঃ মালেক</td>\r\n<td><br></td>\r\n<td>ইস,ধর্ম/২+২&nbsp;<br>১০ম ও ৯ম</td><td>নাই</td>\r\n<td>নাই</td>\r\n<td>demo</td>\r\n<td>ধর্ম/-৮ম জবা<br>ইং-১ম/৬ষ্ঠ<br><br></td>\r\n<td>ধর্ম/সো,ম/ ৮ম গোলাপ</td>\r\n<td>ধর্ম/৭ম গোলাপ, &nbsp; &nbsp; &nbsp;১ম ৩দিন</td>\r\n</tr>	\r\n<tr>\r\n<td>০৬</td>									\r\n<td>জাঃরহমান খান&nbsp;</td><td><br></td>\r\n<td>নাই</td>\r\n<td>ইং-১ম ও ২য়/<br>১০ম</td>\r\n<td>ইং-১মও২য়/<br>৮ম গোলাপ</td>\r\n<td>demo</td>\r\n<td>&nbsp; &nbsp;নাই</td>\r\n<td>ইংরেজী২য়/৩দিন &nbsp;৭ম গোলাপ</td>\r\n<td>demo</td>\r\n</tr>\r\n<tr>\r\n<td>০৭</td>									\r\n<td>কাজী আবু আলম</td>\r\n<td><br></td>\r\n<td>গনিত / ৯ম <br>&nbsp; &nbsp;৪ দিন</td>\r\n<td>নাই</td>\r\n<td>গনিত/৮ম জবা-৪দিন</td>\r\n<td>demo</td>\r\n<td>সাঃবিঃ/কৃষি ৮ম জবা</td>\r\n<td>সাঃবিঃ/ &nbsp;৮ম জবা কৃষি /৯ম</td>\r\n<td>সাঃবিঃ/ &nbsp;৯ম <br>কৃষি /১০ম</td>\r\n</tr>\r\n<tr>\r\n<td>০৮</td>									\r\n<td>রু,আমিন তাং</td>\r\n<td><br></td>\r\n<td>নাই</td>\r\n<td>বাংলাদেশওবিশ্ব<br>শাঃশিঃ৮ম জবা</td>\r\n<td>বাংলা - ২য় &nbsp;৬ষ্ঠ</td>\r\n<td>demo</td>\r\n<td>বাংলাদেশওবিশ্ব &nbsp; &nbsp;১০ম-৩দিন</td>\r\n<td>&nbsp;শাঃশিঃ/১০ম<br>ব্যঃউঃ/৯ম</td>\r\n<td>&nbsp;শাঃশিঃ/৯ম<br style="font-size: 13.3333px;">ব্যঃউঃ/১০ম</span></td>\r\n</tr>\r\n<tr>\r\n<td>০৯</td>									\r\n<td>নাজিয়া সুলতানা</td>\r\n<td><br></td>\r\n<td>বাং-২য়,তথ্য ও যোগাযোগ,চারু-৭মগোঃ</td>\r\n<td>বাংলা-১মও২য়<br>&nbsp; ৭ম জবা<br><br></td>\r\n<td>বাংলা - ১ম ৬ষ্ঠ/৩দিন</td>\r\n<td>demo</td>\r\n<td>তথ্য/ক্যারিয়ার-<br>৯ম ২ /১দিন</td>\r\n<td>তথ্য/ ২ দিন<br>৮ম গোলাপ</td>\r\n<td>তথ্য,চারু-,কর্ম/ &nbsp; &nbsp; ৮ম জবা</td>\r\n</tr>\r\n\r\n<tr>\r\n<td>১১</td>									\r\n<td>&nbsp;মোন্নাফ তাং<br></td>\r\n<td><br></td>\r\n<td>বাং-১ম/কর্ম ও জীবন<br>৮ম গোলাপ<br></td>\r\n<td>হিসাব / ফিন্যান্স<br>১০ম<br></td>\r\n<td>&nbsp;নাই<br></td>\r\n<td>demo</td>\r\n<td>হিসাব / ফিন্যান্স<br>৯ম</td>\r\n<td>নাই<br></td>\r\n<td>বাংলাদেশ ও বিশ্ব<br>৯ম / ২ দিন<br></td>\r\n</tr>\r\n<tr>\r\n<td>১২</td>									\r\n<td>&nbsp;মেরিনা সুলতানা<br></td>\r\n<td><br></td>\r\n<td>ইংরেজী ১ম/২য়<br>৭ম জবা<br></td>\r\n<td>বাংলা ২য়/২ দিন<br>৮ম গোলাপ<br></td>\r\n<td>গবাংলা ১ম/২য়<br>৯ম/৮ম-৩+২<br></td>\r\n<td>demo</td>\r\n<td>্বাংলা১ম/৩দিন<br>৮ম জবা<br></td>\r\n<td>বাংলা২য়/চারু-কারু<br>১০ম/৮ম গো/২+২<br></td>\r\n<td>বাংলা২য়/২দিন<br>৯ম<br></td>\r\n</tr>\r\n<tr>\r\n<td>১৩</td>									\r\n<td>নাছরিন সুলতানা<br></td>\r\n<td><br></td>\r\n<td>নাই<br></td>\r\n<td>বাংলাদেশওবিশ্ব<br>ধর্ম-৬ষ্ঠ<br></td>\r\n<td>বাং-১ম/কর্মও জীবন৮ম গোঃ <br></td>\r\n<td>demo</td>\r\n<td>নাই<br></td>\r\n<td>বাংলাদেশওবিশ্ব/ধর্ম<br>৭ম জবা<br></td>\r\n<td>বাংলাদেশও বিশ্ব<br>৮ম জবা-৩দিন<br></td>\r\n</tr>\r\n<tr>\r\n<td>১৪</td>									\r\n<td>রুমা<br></td>\r\n<td><br></td>\r\n<td>ইংরেজী১ম/৩দিন<br>৮ম জবা<br></td>\r\n<td>ইংরেজী১ম/৩দিন<br>৮ম জবা</td>\r\n<td>নাই<br></td>\r\n<td>demo</td>\r\n<td>ইংরেজী২য়/৩দিন<br>&nbsp;&nbsp;&nbsp; ৬ষ্ঠ<br></td>\r\n<td>ইংরেজী১ম/২য়<br>৭ম গোলাপ<br></td><td>শাঃশিঃ/বাংলাদেশওবিশ্ব<br>৮ম গোঃ-২+৪<br></td>\r\n</tr>\r\n<tr>\r\n<td>১৫</td>									\r\n<td>বুলবুল<br></td>\r\n<td><br></td>\r\n<td>নাই<br></td>\r\n<td>শাঃশিঃ/২ দিন<br>&nbsp;&nbsp; ৭ম গোলাপ<br></td>\r\n<td>&nbsp; নাই<br></td>\r\n<td>demo</td>\r\n<td>শাঃশিঃ/চারু/তথ্য<br>৭ম জবা<br></td>\r\n<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; নাই<br></td>\r\n<td>শাঃশিঃ/চারু/তথ্য<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ৬ষ্ঠ<br></td>\r\n</tr>\r\n</tbody></table>', '1450941304', 0, 1, 0),
(79, 'পাঠ্যক্রম', 'Curriculum', NULL, 88, 0, 'পাঠ্যক্রম ঃ (এন সি টি বি) কর্তৃক প্রণিত জাতীয় পাঠ্যক্রম অনুসরন করন।', '1450943165', 0, 1, 1),
(80, 'স্কুল (আভ্যন্তরীন) ফলাফল', 'SchoolinternalResults', NULL, 22, 0, '', '1450941067', 0, 1, 1),
(81, 'জে.এস.সি ফলাফল', 'BetweenJSCResults', NULL, 22, 0, '', '1450941548', NULL, 1, 1),
(82, 'এস.এস.সি ফলাফল', 'SSCresults', NULL, 22, 0, '<img src="http://">BOARD OF INTERMEDIATE &amp; SECONDARY EDUCATION, DHAKA<br>RESULT OF S.S.C. EXAMINATION, 2016<br>EIIN: 114129<br>Institute: GOWRANGI AKASHI OSMANIA HIGH SCHOOL<br>Thana/Upazilla: GHATAIL<br>District: TANGAIL<br>No. of Students Appeared: 53<br>No. of Students Passed: 52<br>Percentage of Pass: 98.110000<br>---------------------------------------------------- : BUSINESS STUDIES : ----------------------------------------------------<br>577916[3.83], 577917[3.89], 577918[3.39], 577919[3.61], 577920[3.72], 577921[3.83], 577922[3.44], 577923[3.44], 577924[3.11],<br>577927[4.22], 577928[3.94], 577929[4.28], 577930[3.67], 577931[3.56], 577932[3.83], 577925[3.33], 577933[3.61], 577934[3.39],<br>577935[3.44], 577936[3.22], 577937[3.56], 577939[3.67], 577940[3.67], 577941[3.44], 577942[3.72], 577943[4.11], 577944[3.72],<br>577945[3.83], 577946[3.33], 577947[3.83], 577948[3.83], 577949[3.83], 577950[3.83], 577951[3.78], 577926[3.89] =35<br>577938[F1 ] =1<br>-------------------------------------------------------- : SCIENCE : --------------------------------------------------------<br>149436[4.78], 149437[4.83], 149438[4.78], 149439[4.50], 149440[4.44], 149441[4.33], 149442[4.17], 149443[4.17], 149444[4.39],<br>149445[4.67], 149446[4.72], 149447[4.39], 149448[4.61], 149449[4.17], 149450[4.33], 149451[4.00], 149452[4.06] =17<br>----------------------------------------------------- : END OF RESULT : -----------------------------------------------------<br>Page 1 of 1<br>Page 1 of 1', '1450943348', 0, 1, 1),
(83, 'বিভিন্ন পাবলিক পরীক্ষার ফলাফল', 'Results of public examination', NULL, 22, 0, '', '1450942749', NULL, 1, 1),
(84, 'মাল্টিমিডিয়া ক্লাসরুম', 'multimedia-classroom', NULL, 58, 0, 'গৌরাঙ্গী একাশী ওছমানীয়া উচ্চ বিদ্যালয় সেই থেকে পথচলা। বিদ্যালয়টি এই এলাকার মানুষের মাঝে বিদ্যার আলো ছড়িয়ে যাচ্ছে।\r\nবিদ্যালয়ে ছাত্র/ছাত্রীদের উন্নত ও আধুনিক ডিজিটাল শিক্ষা দানের জন্য মাল্টিমিডিয়া ক্লাসরুম চালু করা হয়েছে এবং প্রশিক্ষণ প্রাপ্ত শিক্ষক্মণ্ডলী স্লাইড তৈরী করে সকল শ্রেণীতে শিক্ষার্থীদের নিয়মিত আকর্ষনীয় পাঠদান করে থাকেন।<br>', '1450942510', 0, 1, 1),
(85, 'আইসিটি ল্যাব', 'ICT-Lab', NULL, 58, 0, '', '1450942571', 0, 1, 1),
(86, 'কম্পিউটার ব্যবহার সংক্রান্ত তথ্য', 'information-of-computers-useing', NULL, 58, 0, '', '1450941612', 0, 1, 1),
(87, 'মসজিদ', 'mosque', NULL, 58, 0, 'বিদ্যালয়ের শিক্ষক-শিক্ষার্থী-কর্মচারী সহ এলাকাবাসীর নিয়মিত নামাজ আদায়ের জন্য বিদ্যালয় সংলগ্ন একটি পাকা মসজিদ তৈরী করা হয়েছে যেখানে নিয়মিত জামাতের সাথে প্রতিদিন পাঁচ ওয়াক্ত&nbsp; নামাজ আদায় হয়।<br>', '1450942573', 0, 1, 1),
(88, 'একাডেমিক', 'academic', NULL, 0, 57, '', '1466910848', 0, 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
