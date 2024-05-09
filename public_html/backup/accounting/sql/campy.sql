-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.9-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.5107
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for campy
CREATE DATABASE IF NOT EXISTS `campy` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `campy`;

-- Dumping structure for table campy.acc_ledgernames
CREATE TABLE IF NOT EXISTS `acc_ledgernames` (
  `TypeId` bigint(100) NOT NULL AUTO_INCREMENT,
  `LedgerTypeId` bigint(100) NOT NULL,
  `LedgerName` varchar(100) NOT NULL,
  `LedgerNameBn` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`TypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table campy.acc_payments
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table campy.acc_transactions_validator
CREATE TABLE IF NOT EXISTS `acc_transactions_validator` (
  `RowId` bigint(100) NOT NULL AUTO_INCREMENT,
  `Amount` bigint(100) NOT NULL,
  `SenderNumber` bigint(100) NOT NULL,
  `PaymentMethod` bigint(100) NOT NULL,
  `TransactionId` varchar(50) NOT NULL,
  `TransactionDate` bigint(100) NOT NULL,
  `InsertedDate` bigint(100) NOT NULL,
  `isActive` bigint(100) NOT NULL,
  PRIMARY KEY (`RowId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table campy.appointments
CREATE TABLE IF NOT EXISTS `appointments` (
  `AppointmentId` int(11) NOT NULL AUTO_INCREMENT,
  `AskedBy` int(11) NOT NULL,
  `AskedTo` int(11) NOT NULL,
  `Reason` varchar(255) NOT NULL,
  `AppointmentDate` date NOT NULL,
  `AskedTime` time NOT NULL,
  `AddedDate` int(11) NOT NULL,
  `IsApproved` int(11) NOT NULL,
  PRIMARY KEY (`AppointmentId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Data exporting was unselected.
-- Dumping structure for table campy.attendance
CREATE TABLE IF NOT EXISTS `attendance` (
  `AttendanceId` bigint(100) NOT NULL AUTO_INCREMENT,
  `UserId` bigint(100) NOT NULL,
  `SubjectId` int(11) DEFAULT NULL,
  `isAbsent` int(11) NOT NULL,
  `Message` varchar(100) DEFAULT NULL,
  `AttDate` date NOT NULL,
  `InTime` time NOT NULL,
  `OutTime` time DEFAULT NULL,
  `AddedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`AttendanceId`)
) ENGINE=InnoDB AUTO_INCREMENT=595 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table campy.blocks
CREATE TABLE IF NOT EXISTS `blocks` (
  `BlockId` bigint(100) NOT NULL AUTO_INCREMENT,
  `BlockUniqueId` varchar(255) NOT NULL,
  `BlockTitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `TitleClasses` varchar(255) NOT NULL,
  `WidgetPosition` varchar(255) NOT NULL,
  `BlockContent` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `isActive` bigint(100) NOT NULL DEFAULT '1',
  PRIMARY KEY (`BlockId`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table campy.callhistory
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Data exporting was unselected.
-- Dumping structure for table campy.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `CategoryId` bigint(100) NOT NULL AUTO_INCREMENT,
  `ModuleId` bigint(100) NOT NULL,
  `CategoryName` varchar(50) NOT NULL,
  `CategoryDetails` text NOT NULL,
  PRIMARY KEY (`CategoryId`),
  KEY `categories_moduleid` (`ModuleId`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Data exporting was unselected.
-- Dumping structure for table campy.ci_sessions
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` bigint(100) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.
-- Dumping structure for table campy.country
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
  `LocalName` char(45) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `GovernmentForm` char(45) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `HeadOfState` char(60) CHARACTER SET latin1 DEFAULT NULL,
  `Capital` bigint(100) DEFAULT NULL,
  `Code2` char(2) CHARACTER SET latin1 NOT NULL DEFAULT '',
  PRIMARY KEY (`CountryId`),
  KEY `Code` (`Code`)
) ENGINE=InnoDB AUTO_INCREMENT=241 DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

-- Data exporting was unselected.
-- Dumping structure for table campy.districts
CREATE TABLE IF NOT EXISTS `districts` (
  `id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `division_id` int(2) unsigned NOT NULL,
  `name` varchar(30) NOT NULL,
  `bn_name` varchar(50) NOT NULL,
  `lat` double NOT NULL,
  `lon` double NOT NULL,
  `website` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `division_id` (`division_id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table campy.divisions
CREATE TABLE IF NOT EXISTS `divisions` (
  `id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `bn_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table campy.groups
CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Data exporting was unselected.
-- Dumping structure for table campy.initial_settings_categories
CREATE TABLE IF NOT EXISTS `initial_settings_categories` (
  `CategoriesId` bigint(100) NOT NULL AUTO_INCREMENT,
  `CategoriesName` varchar(100) NOT NULL,
  PRIMARY KEY (`CategoriesId`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table campy.initial_settings_info
CREATE TABLE IF NOT EXISTS `initial_settings_info` (
  `SettingsId` bigint(100) NOT NULL AUTO_INCREMENT,
  `SettingsCategory` int(11) NOT NULL,
  `SettingsName` varchar(300) NOT NULL,
  `SettingsDescription` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `From` bigint(100) DEFAULT NULL,
  `To` bigint(100) DEFAULT NULL,
  `FullMarks` bigint(100) DEFAULT NULL,
  `PassMarks` bigint(100) DEFAULT NULL,
  `isActive` tinyint(4) NOT NULL,
  PRIMARY KEY (`SettingsId`)
) ENGINE=InnoDB AUTO_INCREMENT=236 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table campy.messages
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` bigint(100) NOT NULL,
  `to` bigint(100) NOT NULL,
  `message` text NOT NULL,
  `is_read` enum('0','1') NOT NULL DEFAULT '0',
  `time` bigint(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Data exporting was unselected.
-- Dumping structure for table campy.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `PostId` bigint(100) NOT NULL AUTO_INCREMENT,
  `AddedBy` bigint(100) DEFAULT NULL,
  `Category` bigint(100) DEFAULT NULL,
  `Title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `PostRoute` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `PostContent` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `MediaFileName` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `MediaName` varchar(255) DEFAULT NULL,
  `MediaTempName` varchar(255) NOT NULL,
  `MediaSize` varchar(255) DEFAULT NULL,
  `MediaWidth` varchar(255) DEFAULT NULL,
  `MediaHeight` varchar(255) DEFAULT NULL,
  `AddedDate` bigint(100) NOT NULL,
  `isActive` bigint(100) NOT NULL,
  PRIMARY KEY (`PostId`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table campy.results
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
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Data exporting was unselected.
-- Dumping structure for table campy.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `SettingsId` bigint(100) NOT NULL AUTO_INCREMENT,
  `InstituteName` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `InstituteSlogan` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `InstituteEstablished` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `InstituteEIIN` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `InstituteIsMPO` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `InstituteLogo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `InstituteHeader` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `InstitutePhone` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `InstituteEmail` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `InstituteAddress` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `InstituteWebsite` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `InstituteKeywords` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `InstituteTime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `InstituteGoogleMaps` text COLLATE utf8_unicode_ci NOT NULL,
  `ShortInformation` text COLLATE utf8_unicode_ci NOT NULL,
  `AdminName` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `AdminPhone` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `AdminEmail` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `AdminPhoto` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `AdminSign` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `AdminMessage` text COLLATE utf8_unicode_ci NOT NULL,
  `AdminMessagePhoto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SelectedTheme` char(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`SettingsId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.
-- Dumping structure for table campy.student_promotion
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.
-- Dumping structure for table campy.upazilas
CREATE TABLE IF NOT EXISTS `upazilas` (
  `id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `district_id` int(2) unsigned NOT NULL,
  `name` varchar(30) NOT NULL,
  `bn_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `district_id` (`district_id`)
) ENGINE=InnoDB AUTO_INCREMENT=493 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table campy.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `randomcode` bigint(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=16100101806 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Data exporting was unselected.
-- Dumping structure for table campy.users_groups
CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` bigint(100) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(100) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=248 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Data exporting was unselected.
-- Dumping structure for table campy.users_relation
CREATE TABLE IF NOT EXISTS `users_relation` (
  `RelationId` bigint(100) NOT NULL AUTO_INCREMENT,
  `GuardianId` bigint(100) NOT NULL,
  `StudentId` bigint(100) NOT NULL,
  PRIMARY KEY (`RelationId`)
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table campy.u_basicinfocriteria
CREATE TABLE IF NOT EXISTS `u_basicinfocriteria` (
  `CriteriaId` bigint(100) NOT NULL AUTO_INCREMENT,
  `CriteriaName` varchar(50) NOT NULL,
  `CriteriaDescription` varchar(50) NOT NULL,
  `Sorting` varchar(50) NOT NULL,
  PRIMARY KEY (`CriteriaId`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Data exporting was unselected.
-- Dumping structure for table campy.u_basicinfos
CREATE TABLE IF NOT EXISTS `u_basicinfos` (
  `InfosId` bigint(100) NOT NULL AUTO_INCREMENT,
  `UserId` bigint(100) NOT NULL,
  `UniqueNumber` bigint(100) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Data exporting was unselected.
-- Dumping structure for table campy.u_businesses
CREATE TABLE IF NOT EXISTS `u_businesses` (
  `BusinessId` bigint(100) NOT NULL AUTO_INCREMENT,
  `UserId` bigint(100) NOT NULL DEFAULT '0',
  `CateogryId` bigint(100) NOT NULL,
  `OrganizationName` varchar(150) NOT NULL,
  `OrganizationURL` varchar(150) NOT NULL,
  `OrganizationCity` varchar(150) NOT NULL,
  `StartDate` bigint(20) NOT NULL,
  `Services` varchar(150) NOT NULL,
  `Notes` varchar(150) NOT NULL,
  PRIMARY KEY (`BusinessId`),
  KEY `UserId` (`UserId`),
  KEY `CateogryId` (`CateogryId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Data exporting was unselected.
-- Dumping structure for table campy.u_educationhistory
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

-- Data exporting was unselected.
-- Dumping structure for table campy.u_images
CREATE TABLE IF NOT EXISTS `u_images` (
  `ImageId` bigint(100) NOT NULL AUTO_INCREMENT,
  `UserId` bigint(100) NOT NULL,
  `ImageName` varchar(100) NOT NULL,
  PRIMARY KEY (`ImageId`),
  KEY `UserId` (`UserId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table campy.u_std_information
CREATE TABLE IF NOT EXISTS `u_std_information` (
  `StudentInfoId` bigint(100) NOT NULL AUTO_INCREMENT,
  `UserId` bigint(100) NOT NULL,
  `Class` bigint(100) NOT NULL,
  `ClassRoll` bigint(100) NOT NULL,
  `Section` bigint(100) NOT NULL,
  `GroupId` bigint(100) NOT NULL,
  `Department` bigint(100) NOT NULL,
  `isActive` int(11) NOT NULL,
  PRIMARY KEY (`StudentInfoId`),
  UNIQUE KEY `UserId` (`UserId`)
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.
-- Dumping structure for table campy.u_tchstaff_information
CREATE TABLE IF NOT EXISTS `u_tchstaff_information` (
  `TchStaffId` bigint(100) NOT NULL AUTO_INCREMENT,
  `UserId` bigint(100) NOT NULL,
  `Designation` varchar(255) NOT NULL,
  `SalaryScale` varchar(255) NOT NULL,
  `IndexNumber` varchar(255) DEFAULT NULL,
  `BankAccountNumber` varchar(255) DEFAULT NULL,
  `BankName` varchar(255) DEFAULT NULL,
  `BankBranchName` varchar(255) DEFAULT NULL,
  `DateAttended` varchar(255) DEFAULT NULL,
  `isActive` int(11) NOT NULL,
  PRIMARY KEY (`TchStaffId`),
  UNIQUE KEY `UserId` (`UserId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table campy.u_workhistory
CREATE TABLE IF NOT EXISTS `u_workhistory` (
  `WorkId` bigint(100) NOT NULL AUTO_INCREMENT,
  `UserId` bigint(100) NOT NULL,
  `Organization` varchar(150) NOT NULL,
  `Position` varchar(100) NOT NULL,
  `StartDate` bigint(20) NOT NULL,
  `EndDate` bigint(20) NOT NULL,
  `Responsibilities` text NOT NULL,
  PRIMARY KEY (`WorkId`),
  KEY `UserId` (`UserId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Data exporting was unselected.
-- Dumping structure for table campy.webpages
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
  `isInMenu` int(11) NOT NULL,
  `isActive` int(11) DEFAULT NULL,
  PRIMARY KEY (`PageId`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
