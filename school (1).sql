-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2023 年 2 月 02 日 16:23
-- サーバのバージョン： 10.4.21-MariaDB
-- PHP のバージョン: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `kadai`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `school`
--

CREATE TABLE `school` (
  `id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `e_school` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `j_school` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `h_school` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `school`
--

INSERT INTO `school` (`id`, `name`, `e_school`, `j_school`, `h_school`, `date`) VALUES
(1, '山田太郎', 'おおもり小学校', 'とくもり中学校', '糖質オフ高校', '2023-02-02 15:41:43'),
(2, '小樽太郎', '花園小学校', '菁園中学校', '桜陽高校', '2023-01-13 04:24:02'),
(3, 'ジーズ太郎', 'ジーズ小学校', 'ジーズ中学校', 'ジーズ高校', '2023-01-13 04:24:52'),
(4, 'ジーズ花子', 'ジーズ小学校', 'ジーズ中学校', '私立ジーズ女学院', '2023-01-13 04:25:25'),
(8, '堀　斗真', 'おおもり小学校', 'とくもり中学校', '糖質オフ高校', '2023-02-02 23:48:26'),
(10, 'ミミッキュ', 'ジーズ', 'ジーズ中学校', '桜陽高校', '2023-02-02 23:57:11'),
(12, 'a', 'a', 'a', 'a', '2023-02-03 00:10:10');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `school`
--
ALTER TABLE `school`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
