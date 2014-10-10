-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 01, 2014 at 07:39 PM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gcards`
--
CREATE DATABASE IF NOT EXISTS `gcards` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `gcards`;

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE `blocks` (
  `block_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `position` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`block_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`block_id`, `position`, `content`) VALUES
(1, '{"x":35.9999628067,"y":92.999786377,"height":75,"width":420,"angle":5.94149610372}', '<h1><span style="background-color: rgb(255, 0, 255); color: rgb(255, 255, 255);">asdfasd</span></h1>'),
(2, '{"x":823.999962807,"y":38.999786377,"height":75,"width":420,"angle":0}', '<blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><span style="font-size: 24px; font-style: italic; font-weight: bold; line-height: 34.28571701049805px; background-color: rgba(255, 255, 255, 0.701961); text-decoration: underline;">Testasdf</span></blockquote><blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><span style="font-size: 24px; font-style: italic; font-weight: bold; line-height: 34.28571701049805px; background-color: rgba(255, 255, 255, 0.701961); text-decoration: underline;">asd</span></blockquote><blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><span style="font-size: 24px; font-style: italic; font-weight: bold; line-height: 34.28571701049805px; background-color: rgba(255, 255, 255, 0.701961); text-decoration: underline;">f</span></blockquote><blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><span style="font-size: 24px; font-style: italic; font-weight: bold; line-height: 34.28571701049805px; background-color: rgba(255, 255, 255, 0.701961); text-decoration: underline;">asd</span></blockquote><blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><span style="font-size: 24px; font-style: italic; font-weight: bold; line-height: 34.28571701049805px; background-color: rgba(255, 255, 255, 0.701961); text-decoration: underline;">f</span></blockquote><blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><span style="font-size: 24px; font-style: italic; font-weight: bold; line-height: 34.28571701049805px; background-color: rgba(255, 255, 255, 0.701961); text-decoration: underline;">asdf</span></blockquote><blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><span style="font-size: 24px; font-style: italic; font-weight: bold; line-height: 34.28571701049805px; background-color: rgba(255, 255, 255, 0.701961); text-decoration: underline;">asdf</span></blockquote>'),
(3, '{"x":0,"y":645,"height":75,"width":420,"angle":0}', '<span style="font-size: 24px; font-style: italic; font-weight: bold; line-height: 34.28571701049805px; background-color: rgba(255, 255, 255, 0.701961); text-decoration: underline;">Test</span>'),
(4, '{"x":860,"y":260.999786377,"height":75,"width":420,"angle":0}', 'Test'),
(5, '{"x":859.999962807,"y":645,"height":75,"width":420,"angle":0}', '<span style="font-size: 24px; font-style: italic; font-weight: bold; line-height: 34.28571701049805px; background-color: rgba(255, 255, 255, 0.701961); text-decoration: underline;">Test</span>'),
(6, '{"x":390.999962807,"y":373.999786377,"height":75,"width":420,"angle":2.93843964454}', '<span style="font-size: 24px; font-style: italic; font-weight: bold; line-height: 34.28571701049805px; background-color: rgba(255, 255, 255, 0.701961); text-decoration: underline;">Test</span>'),
(7, '{"x":0,"y":500.999786377,"height":75,"width":420,"angle":0}', '<span style="font-size: 24px; font-style: italic; font-weight: bold; line-height: 34.28571701049805px; background-color: rgba(255, 255, 255, 0.701961); text-decoration: underline;">Test</span>'),
(8, '{"x":359,"y":236,"height":89,"width":442,"angle":0}', '<div style="text-align: center; line-height: 3;"><a href="http://gcards.com" style="font-size: 24px; font-style: italic; font-weight: bold; line-height: 34.28571701049805px;">Test</a><span style="font-size: 24px; font-style: italic; font-weight: bold; line-height: 34.28571701049805px; text-decoration: underline;">&nbsp;sdfasdf sadfasdf</span></div><div style="text-align: center; line-height: 3;"><span style="font-size: 24px; font-style: italic; font-weight: bold; line-height: 34.28571701049805px; text-decoration: underline;">afsasf</span></div>'),
(9, '{"x":763.999962807,"y":521.999786377,"height":75,"width":420,"angle":0}', '<span style="font-size: 24px; font-style: italic; font-weight: bold; line-height: 34.28571701049805px; background-color: rgba(255, 255, 255, 0.701961); text-decoration: underline;">Test</span>'),
(10, '{"x":0,"y":222.984130859,"height":75,"width":420,"angle":5.8245045395}', '<span style="font-size: 24px; font-style: italic; font-weight: bold; line-height: 34.28571701049805px; background-color: rgba(255, 255, 255, 0.701961); text-decoration: underline;">Test</span>'),
(11, '{"x":412.999962807,"y":230.999786377,"height":75,"width":420,"angle":0}', '<div style="text-align: center;"><span style="font-size: 24px; font-weight: bold; text-decoration: underline; line-height: 1.428571429; color: rgb(255, 255, 255);">Test</span></div>'),
(12, '{"x":382.999962807,"y":157.999786377,"height":75,"width":420,"angle":0}', 'dsfasf'),
(13, '{"x":342.999962807,"y":273.999786377,"height":75,"width":420,"angle":0}', 'gdsfgsd'),
(14, '{"x":853.984344482,"y":26.984161377,"height":75,"width":420,"angle":0}', '<h1><span style="font-size: 14px; font-weight: bold; line-height: 1.428571429; background-color: yellow;">Hallo!!!</span></h1>'),
(15, '{"x":400.999962807,"y":15.999786377,"height":75,"width":420,"angle":0}', '<div style="text-align: center;"><span style="line-height: 1.428571429; font-size: 36px; color: inherit; background-color: rgb(255, 239, 198);">Hello world!!!</span></div>');

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `card_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cover_id` int(10) unsigned NOT NULL,
  `blocks` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `hash_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`card_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`card_id`, `cover_id`, `blocks`, `hash_code`) VALUES
(1, 3, '1,2,3,4,5,6,7,8,9,10', 'ea511e7dcaa3bbd9ac1861d3ca3d8732'),
(2, 1, '11', 'b95a5c3e9e770a250277f5f3f8dddf69'),
(3, 2, '12', '5444cfa4ab9597a62eaa46ae3ee514fb'),
(4, 1, '13', '69e69b771f9cc10d53ca795cb19b73aa'),
(5, 2, '14', '6a182c799a7c2a63f56f82886a41fa23'),
(6, 40, '15', 'da24c3bff39a6467768691fd9c055cbb');

-- --------------------------------------------------------

--
-- Table structure for table `covers`
--

CREATE TABLE `covers` (
  `cover_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `path_original` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `path_mini` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `visible_to_all` tinyint(1) NOT NULL DEFAULT '0',
  `partition_id` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`cover_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=123 ;

--
-- Dumping data for table `covers`
--

INSERT INTO `covers` (`cover_id`, `path_original`, `path_mini`, `visible_to_all`, `partition_id`) VALUES
(1, 'img/covers/original/f16ec9920bf904e4c6a228e2ef8d0581.jpg', 'img/covers/mini/6d63fccb906dd1a608b3d43b8d2d3910.jpg', 1, 1),
(2, 'img/covers/original/c71d5615d42df790cba9610a483767d0.jpg', 'img/covers/mini/80f154b0a3782540eab3458abe5c8a15.jpg', 1, 1),
(3, 'img/covers/original/ebbead6b303c787537e073583681c0b5.jpg', 'img/covers/mini/3e76f3cdba2ba84d9403ad63fa6c8350.jpg', 1, 1),
(4, 'img/covers/original/225cffb7ed82aabb851fba9ed70744ae.jpg', 'img/covers/mini/3c064ba86b7f13af59c33c1be971af2a.jpg', 1, 1),
(5, 'img/covers/original/f4cc247c0c2e35027124b8ef135d39ef.jpg', 'img/covers/mini/78a5c0ac857bcf9e24199f639f479296.jpg', 1, 1),
(6, 'img/covers/original/00c39d63d4eee2b063a2ffdbabb38696.jpg', 'img/covers/mini/715c9e376a648b9f1c92a386724194dc.jpg', 1, 1),
(7, 'img/covers/original/163d4bf10352221bb40c3800a25b84db.jpg', 'img/covers/mini/8151f8c95e4857c059ed2bc1388897b8.jpg', 1, 1),
(8, 'img/covers/original/339d0f664a16448fc8527d800f9e00f5.jpg', 'img/covers/mini/43ccc0021b29bda166f2288499ab3a07.jpg', 1, 1),
(9, 'img/covers/original/10e0674fd2538f0b596f046d1cc4573e.jpg', 'img/covers/mini/abeef869bbc8eace5aa775b20b34c7e7.jpg', 1, 1),
(10, 'img/covers/original/356a7aa4a00f202939ceaf6fccd20863.jpg', 'img/covers/mini/fca24b306466955721253dea6ec1d004.jpg', 1, 1),
(11, 'img/covers/original/6b72a990dc8a67febda938c0739b2ecf.jpg', 'img/covers/mini/3c5cbf8fe296f062a8cdfbe7973e9d3b.jpg', 1, 1),
(12, 'img/covers/original/1966e22ff47a538333bb0d45e84690a7.jpg', 'img/covers/mini/12e675e2e82f1a260bebf6b78fb8b6d4.jpg', 1, 1),
(13, 'img/covers/original/8425372a27c7f09d388cc20db52b1c6e.jpg', 'img/covers/mini/4b5dbdf5d925b0084030c60828aad1ae.jpg', 1, 1),
(14, 'img/covers/original/17d5d7c63e14c8f8f9c7a2422bd26358.jpg', 'img/covers/mini/5faf7a31f49dcff483b9ddcdeb0e4e97.jpg', 1, 1),
(15, 'img/covers/original/a091d30b43818968a6ae67728ded1b9f.jpg', 'img/covers/mini/b4cae61078df231f17844228cc29142a.jpg', 1, 1),
(16, 'img/covers/original/38503819df20c2595c56c27cf164cf2d.jpg', 'img/covers/mini/b54ebf08bd29ac85184c88755435091d.jpg', 1, 1),
(26, 'img/covers/original/d15526dd60c1af96636773bba4c6e74a.jpg', 'img/covers/mini/a82ae3d2790d97aca306c136aa2b894c.jpg', 1, 2),
(27, 'img/covers/original/2b411055e71982d2de15aad8d26ccf3a.jpg', 'img/covers/mini/10c477dc78ceb9d235788299b8427f46.jpg', 1, 2),
(28, 'img/covers/original/0a2a17811fcd90e681668acd50b55cc7.jpg', 'img/covers/mini/bece437963e6ce7287205435fedef91a.jpg', 1, 2),
(29, 'img/covers/original/eee065693543fc54a8cbaf8d011221b2.jpg', 'img/covers/mini/f8577483c90db7e448bd614d7013ffb1.jpg', 1, 2),
(30, 'img/covers/original/49d39419a881e5211d76092e2174334b.jpg', 'img/covers/mini/62e5ed46c8985a187a21e8874b075e56.jpg', 1, 2),
(31, 'img/covers/original/e0f3574f9946e3cec1f7e3e9e3b64e1f.jpg', 'img/covers/mini/758940caa982efe527e1fc81d1e89ff7.jpg', 1, 2),
(32, 'img/covers/original/7d79b45b302e3ded6de055485d07cee2.jpg', 'img/covers/mini/51147b41e6816ae662b248f61c408891.jpg', 1, 2),
(33, 'img/covers/original/7c87ce6dced85c5a64d9253c859cf4e4.jpg', 'img/covers/mini/f671b92c14fa6f0da325229aba4671cc.jpg', 1, 2),
(34, 'img/covers/original/29dbf20fdac1c57158f597acae151d25.jpg', 'img/covers/mini/c34904a7297afcb50fea41022fd4c35d.jpg', 1, 2),
(35, 'img/covers/original/15123198a15b08180a603c69c0766d4a.jpg', 'img/covers/mini/129db4157b1764c58cf352f01832ccbb.jpg', 1, 2),
(36, 'img/covers/original/d1f1e43d3d23fb38ea6d70024fccadf8.jpg', 'img/covers/mini/8ffd16d4bba7e2624e7a54d95b993b54.jpg', 1, 2),
(37, 'img/covers/original/7074c483270ffe7d8fc46f2dd77e618a.jpg', 'img/covers/mini/b0f49259b1692c86f42f647321e9df51.jpg', 1, 2),
(38, 'img/covers/original/820c8ff85cb0c18ce65ba0d4b14db227.jpg', 'img/covers/mini/40aab07d2152b76ac04f868725e41abc.jpg', 1, 2),
(39, 'img/covers/original/2fe73ad3e0f7b7b916ba33b9f18412f6.jpg', 'img/covers/mini/f86db51a02a256c643f99d4ac5d82aaf.jpg', 1, 3),
(40, 'img/covers/original/f0fdd07c717ef203c3817544214e7aa8.jpg', 'img/covers/mini/fe392588ea95f63482bd35ba99baf7ed.jpg', 1, 3),
(41, 'img/covers/original/bc9eaaa6630d87431670d7a2c7abeca7.jpg', 'img/covers/mini/4f4399a2c06387c902ca19395950a3ab.jpg', 1, 3),
(42, 'img/covers/original/bd586887b16281bfc667450090d6b348.jpg', 'img/covers/mini/59e7a9009dec936bf9fc8b86b27d9a31.jpg', 1, 3),
(43, 'img/covers/original/b5df8a9e2640db5d99670692a17fd940.jpg', 'img/covers/mini/8c08f0a1c53c9ba3cc14f23d10d261e4.jpg', 1, 3),
(44, 'img/covers/original/e3b4e279fc85b5eeba352a0e862f7715.jpg', 'img/covers/mini/adf59931276fd57dc958bd4c0d059709.jpg', 1, 3),
(45, 'img/covers/original/060543288fa12bd86fab3c36e1c4169f.jpg', 'img/covers/mini/42519fa4d92436d9ae1698cfd46d63e8.jpg', 1, 3),
(46, 'img/covers/original/fd7fc8cdd951318eb243aac0e4770972.jpg', 'img/covers/mini/672ed8e8c456c729c4b8afebf4f0d962.jpg', 1, 3),
(47, 'img/covers/original/87dfb7d0d3d8acbde29a505f62ed10b0.jpg', 'img/covers/mini/3aa94365f793fe4a3aa5bddb6bb000bc.jpg', 1, 3),
(48, 'img/covers/original/4abb8a5ad270a496f9a85990bd87c71b.jpg', 'img/covers/mini/5fb76c946a3c2334bc766aaaa445d511.jpg', 1, 3),
(49, 'img/covers/original/2643bff3e6af7fdf095443b38f74c87c.jpg', 'img/covers/mini/d7a39071f5b2bf102316c27395470699.jpg', 1, 4),
(50, 'img/covers/original/cd859248c4368f2fe134da9b7af5078a.jpg', 'img/covers/mini/b9187a74af0ad9da05b2584985b606b8.jpg', 1, 4),
(51, 'img/covers/original/2964290a74c5b9ecab3e2df0099cb5d3.jpg', 'img/covers/mini/3fe54aa5f8980791d58d51ad11ebee57.jpg', 1, 4),
(52, 'img/covers/original/cc26e64fcefc9de9992afb0504bf7ebc.jpg', 'img/covers/mini/f23242bab9d6d316ea479f3c5616505f.jpg', 1, 4),
(53, 'img/covers/original/978b96944dd924dc3ccb384860707796.jpg', 'img/covers/mini/6c5ebc433be063bc4fcd097ac264a77d.jpg', 1, 4),
(54, 'img/covers/original/ec4c2b5b0693bfa2bb3ae7b60e75a5d1.jpg', 'img/covers/mini/4dec96cb9b266a485f545a1a7d7e71ab.jpg', 1, 4),
(55, 'img/covers/original/b609e53c4c50e0f1fcbd518d70159fae.jpg', 'img/covers/mini/3331c87aa2ff0120aa9680ac2e9429a2.jpg', 1, 4),
(56, 'img/covers/original/54befa9d5b45a29ce6b6c5a7783449a5.jpg', 'img/covers/mini/864c786ad14402b4b6d0ccd232771b18.jpg', 1, 4),
(57, 'img/covers/original/efced1da5ea7ba06b98c95549c7ad9ef.jpg', 'img/covers/mini/e9417fe51a0fde6e5aeddf23f37adb9d.jpg', 1, 4),
(58, 'img/covers/original/2bf201fd00c610adcff8a29c9b71ed13.jpg', 'img/covers/mini/300c3e0825dd99e33e49003b36065efd.jpg', 1, 4),
(59, 'img/covers/original/9f895881746f58211d24f946fb78b48c.jpg', 'img/covers/mini/516ab71bece076269329ff580ebde718.jpg', 1, 4),
(60, 'img/covers/original/f08bf4e0a6496781e02e5f60c8bd9d1f.jpg', 'img/covers/mini/87cbf042e3a111b76df4010d8e756283.jpg', 1, 4),
(61, 'img/covers/original/9f35687194da75586d7645df71d6613d.jpg', 'img/covers/mini/3855c73019adb387b87d0fcdafafba5d.jpg', 1, 4),
(62, 'img/covers/original/2095fc1e95e354476c79abe0e90dfdf2.jpg', 'img/covers/mini/872746f11e117acab33ff7b19a3db204.jpg', 1, 4),
(63, 'img/covers/original/d8883eabdba8abe46b80d2fc1593705a.jpg', 'img/covers/mini/a37e483765c2418c419146bf04d83cbf.jpg', 1, 4),
(64, 'img/covers/original/536ad186defab8cac89b3735a222aad0.jpg', 'img/covers/mini/69d72a7dc2f7c83de5341fef9bddd39c.jpg', 1, 4),
(65, 'img/covers/original/068fb6f31b5ce561f1345ac56c010ebf.jpg', 'img/covers/mini/e64d22362b04ce05c5118f6a399fe056.jpg', 1, 4),
(66, 'img/covers/original/99fc9fac5fd6e58bd64baab1d33b24bb.jpg', 'img/covers/mini/9e40aa92b35fd99ffc0075206361ddba.jpg', 1, 4),
(67, 'img/covers/original/e3837b401131ea22c2efbb0b99cc60eb.jpg', 'img/covers/mini/326aa7cc4d7778e9430d90b27f8f917b.jpg', 1, 4),
(68, 'img/covers/original/6ef495187a27f48a89ff16e507945b6f.jpg', 'img/covers/mini/ccec29a43b87bd78d2360434dda05b90.jpg', 1, 4),
(69, 'img/covers/original/e3f284209139c778a635b2448418af0c.jpg', 'img/covers/mini/6127595dfdc956d7bf0aeb58faf88fec.jpg', 1, 4),
(70, 'img/covers/original/49b1da4e846181fb0b77c23ad4788feb.jpg', 'img/covers/mini/ccf66ec3b5954136269ea6890a92c1cf.jpg', 1, 4),
(71, 'img/covers/original/56a768e8f79d54f2418b0063430668da.jpg', 'img/covers/mini/0e19538e24a34057ca473e76830414ad.jpg', 1, 4),
(72, 'img/covers/original/aabf778e39f090ab40b4d2a56ad957ad.jpg', 'img/covers/mini/2882b7839e6b7f7b9c3cbdb976aeb3fb.jpg', 1, 4),
(73, 'img/covers/original/8251ba4427610e93f9f662c4089041b6.jpg', 'img/covers/mini/a70934dd2bb217fb1102a787f031ad06.jpg', 1, 4),
(74, 'img/covers/original/ba607bb5dc56d2d06207accc20e70e4d.jpg', 'img/covers/mini/31836b708edc2f9ac244101bb4c93df2.jpg', 1, 4),
(75, 'img/covers/original/96b3dc208087588249b4afba76e2274d.jpg', 'img/covers/mini/eda76823ad8e9c9d24693a77f99051db.jpg', 1, 4),
(76, 'img/covers/original/5a4a3acb4f8a5d70ac34cea6643761a8.jpg', 'img/covers/mini/5e76b5bbf10154de006e54527b97ebdb.jpg', 1, 4),
(77, 'img/covers/original/5beaba89845474ff44aeb67b6756526e.jpg', 'img/covers/mini/0fdd2ec588397a9b0346f86cc7d2f47d.jpg', 1, 4),
(78, 'img/covers/original/7b23dff9ff61d487f061337d95976be9.jpg', 'img/covers/mini/f91072b5e7eaef7c57843ba92ca5a0b2.jpg', 1, 4),
(79, 'img/covers/original/0d4fa08d39fcbbccb47858a9cb1d99c2.jpg', 'img/covers/mini/7e995635da2af402483509692c4b82b1.jpg', 1, 4),
(80, 'img/covers/original/3288549554cf67cfef2b8f39f927b505.jpg', 'img/covers/mini/1f3f6d06f038c736672e0138485e7b30.jpg', 1, 4),
(81, 'img/covers/original/fea9634d4ff9007d14b762f47b4215af.jpg', 'img/covers/mini/cae0c62f35d141f010de76da162f4e82.jpg', 1, 4),
(82, 'img/covers/original/cfc8ac4285edd5882fab52da3c2e7d7b.jpg', 'img/covers/mini/a7328f790059f4ceee69d541b73d7d36.jpg', 1, 4),
(83, 'img/covers/original/dd9e2f88cc4ba85debace18c1c0668ab.jpg', 'img/covers/mini/a39cae79b409da6f1ca34aa60efab907.jpg', 1, 4),
(84, 'img/covers/original/38d8052556c825ece5c6acbcca4dfaff.jpg', 'img/covers/mini/2957cf2a45626e83d4aaf257e50abc23.jpg', 1, 4),
(85, 'img/covers/original/294d1c9574222e757cd580afce2e2ca3.jpg', 'img/covers/mini/a95ff4924c5ce8ab0df8e5a8126a74e3.jpg', 1, 4),
(86, 'img/covers/original/7ed7012465479f1708c212f57dac2da0.jpg', 'img/covers/mini/f30236d54833fa9a5277f39cdf87367b.jpg', 1, 4),
(87, 'img/covers/original/a1ecef0fae75e1488bed39ba59b5964b.jpg', 'img/covers/mini/17c6669ae0da01f19899a5f2efa49d58.jpg', 1, 4),
(88, 'img/covers/original/20ddc7c7e64f220dbb8e1045c8defc1d.jpg', 'img/covers/mini/586b7c96d0873323e3cf8d4a4ccbf28f.jpg', 1, 4),
(89, 'img/covers/original/0b3b13dbbefb0ab23d4ce856a3c89f97.jpg', 'img/covers/mini/9bb843cf2b0db6eb5b048135299a1366.jpg', 1, 4),
(90, 'img/covers/original/21ef450201d0a8fa53358912e5d8e941.jpg', 'img/covers/mini/a892e4d5a8ed1dc2ebe48bb8e1efa415.jpg', 1, 4),
(91, 'img/covers/original/ae3538a734f89eca86e0b3d5143b5c76.jpg', 'img/covers/mini/e7e6ad862790bce14be1e74a4b18500f.jpg', 1, 4),
(92, 'img/covers/original/260f894a51b712d1e652ba313b4d2f26.jpg', 'img/covers/mini/6ff60fcae44e5a85abe4eae8ea9693ec.jpg', 1, 5),
(93, 'img/covers/original/6f8959069589943e6d9104035de43e6e.jpg', 'img/covers/mini/f16e9c8b954744781d3e99c75b794940.jpg', 1, 5),
(94, 'img/covers/original/a09aa97a0bc6094f1a57bd75e92f2afa.jpg', 'img/covers/mini/73b18e112012cd1359ff6667023baee2.jpg', 1, 5),
(95, 'img/covers/original/c12d92c84f95fc82b2f5045bb7201c9c.jpg', 'img/covers/mini/8e4ee5e64af0ccf925512dd06b1573ce.jpg', 1, 5),
(96, 'img/covers/original/c14ad3a5d402915152455648fbb09c76.jpg', 'img/covers/mini/c82adf0650d7c60967d32a9b06d1aa34.jpg', 1, 5),
(97, 'img/covers/original/b221eb34800aa93e439700bccbecd42e.jpg', 'img/covers/mini/ee0c4fc9cdc5791079b4b093d1eb8e58.jpg', 1, 5),
(98, 'img/covers/original/4cc015b30ecf3a87f2fedf28be6f76a7.jpg', 'img/covers/mini/e77363c55cff266bab94ee80b4803121.jpg', 1, 5),
(99, 'img/covers/original/749ed2b20afcb18e487f3c69b7ebc9cd.jpg', 'img/covers/mini/72f15877489c938b0ff99b8e56bda0a2.jpg', 1, 5),
(100, 'img/covers/original/186fe63c9d8baa823c51c83fae02782a.jpg', 'img/covers/mini/70c8e88b1968f1cc9089ed4cae23a65c.jpg', 1, 5),
(101, 'img/covers/original/80c902350df2fe3721c200a9abc702f2.jpg', 'img/covers/mini/6e77c7b5664fcceb8eb1d67b23762f00.jpg', 1, 5),
(102, 'img/covers/original/22771b7d4a23ee93865b75503d68bfab.jpg', 'img/covers/mini/ea11160fdfbbe67725dc61d697636f58.jpg', 1, 5),
(103, 'img/covers/original/33c006466cd754e8f5bfb4e724d4a225.jpg', 'img/covers/mini/8788ec788df54f199d187a3d819df68d.jpg', 1, 5),
(104, 'img/covers/original/732f9fe34fc8ffe4655f0de9d4293223.jpg', 'img/covers/mini/90bbd31d8054de3bd47d395edc9ec047.jpg', 1, 5),
(105, 'img/covers/original/ab7bf6cc2f23e5a2cab68cdf272774b2.jpg', 'img/covers/mini/9d93ab9331d4dce6fa5a27e1bbd3a61c.jpg', 1, 5),
(106, 'img/covers/original/43122f806d0df7a189b759574f4e7d3f.jpg', 'img/covers/mini/0c0b13b0a3d57811b8d8f6967ec65527.jpg', 1, 5),
(107, 'img/covers/original/a8181305454d15817bc36389e2534dff.jpg', 'img/covers/mini/c29b6ee21508781ec36ca6f0c5e10370.jpg', 1, 5),
(108, 'img/covers/original/84439fd3bbb79a612d68f206bf886aff.jpg', 'img/covers/mini/b4fb271132c6fa068a92eff41a9834e0.jpg', 1, 5),
(109, 'img/covers/original/4b2ad1f344100ed1b12b2c40f36f0dfe.jpg', 'img/covers/mini/0ff78a47a432e03c2216104a47ea55fc.jpg', 1, 5),
(110, 'img/covers/original/22e2167c2066bd5a1766411ecf7dc469.jpg', 'img/covers/mini/386b132434225cc95f5186376e2542b3.jpg', 1, 5),
(111, 'img/covers/original/32cf5529b7c06eaa84984898a29e1f3a.jpg', 'img/covers/mini/a6ebd5d31524af3b54532270f9e6581c.jpg', 1, 5),
(112, 'img/covers/original/d2d5ec1959f9ba7c4531813d28f08b40.jpg', 'img/covers/mini/b5970f1320825a993f3e0bcfe157622d.jpg', 1, 5),
(113, 'img/covers/original/bc94d3342de1a24492839b48fce76049.jpg', 'img/covers/mini/0486e551e028ba1b4d1871091d61cbb6.jpg', 1, 5),
(114, 'img/covers/original/a13fc9f7fa7b2ce03b60d0e746852414.jpg', 'img/covers/mini/0bfd659e98ccd81a3345275b72f5759c.jpg', 1, 5),
(115, 'img/covers/original/7edce55ebd47fbffcfb24ad0a618d8f0.jpg', 'img/covers/mini/ab35d52a046efdc2277442d61b107c43.jpg', 1, 5),
(116, 'img/covers/original/fc10fddda984af919f99993b42ed9658.jpg', 'img/covers/mini/4346369008e97097cecdd3710ca75c11.jpg', 1, 5),
(117, 'img/covers/original/cd90dbd420b0e17b89e535f0467c71c2.jpg', 'img/covers/mini/7cd3694801bcb8ff808e3266042f454b.jpg', 1, 5),
(118, 'img/covers/original/02d12ac33e399df6821c0ef9f5e9f586.jpg', 'img/covers/mini/1af5c139a9ffcb414df273ee8ed8dac3.jpg', 1, 5),
(119, 'img/covers/original/73cd430222c928fc148499e9bef90d7a.jpg', 'img/covers/mini/5f057c65691b8e2ee4114d05bea02d15.jpg', 1, 5),
(120, 'img/covers/original/6bf9784cf7f1398893aed881f1adf36e.jpg', 'img/covers/mini/8c8bd334d27c37397b777839aa68f88d.jpg', 1, 5),
(121, 'img/covers/original/549ecec26ab73eb6c1f74843887167f2.jpg', 'img/covers/mini/59837c84868cbcedf5e4d1afe2d6ba84.jpg', 1, 5),
(122, 'img/covers/original/80e89708f237e97f11b05b82bdd8ea8f.jpg', 'img/covers/mini/67408e509db7c5242740d517beb5ec37.jpg', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `browser` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `visits` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
