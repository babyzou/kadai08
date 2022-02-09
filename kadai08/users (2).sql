-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2022 年 2 月 09 日 19:12
-- サーバのバージョン： 5.7.34
-- PHP のバージョン: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `users`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `content`) VALUES
(5, 'hoge2', 'hoge3@hoge.com', '$2y$10$Jd7AkK1Xi1/OWHYtkKs/V.Igd.fc4GQxYEA.JhE0H4A.sjqjVZm1e', NULL),
(6, 'asaken', 'asa@asa', '$2y$10$TwVNkc2MqPKyF3SfF7bopOwNORwM98ZVzn1FPZZwghNCoeQqPX6zW', 'メモ：hoge---'),
(7, 'hoge', 'hoge2@hoge.com', '$2y$10$vmS7Te0Z//bghKObCGeD6OhijYLUdHh3rtmWbrq/CwXFOGuCsBw..', 'こんにちは'),
(9, 'hoge', 'hoge@hogehoge', 'hoge', '$2y$10$bnWnF0nU2qnX2tj0n9AN7uBb0r5MRp0xe7xw7THPh9GtJzudhCBDC'),
(11, 'ho', 'hoge@hoge2', '', '$2y$10$E0IC6dSDmLQ3IPVA8CBdkeFwksjD1G1mK0SXvmaELbcRJ0qv/JrQe'),
(12, 'asaken', 'asaken@com', '$2y$10$OVKc1wxr3kkSqq8xYHFOvu8f7xw5ozWk.eZw6lrkeBJcwNtfOeuXW', ''),
(14, 'bon', 'bon@bon', '$2y$10$fAMaOoxGIUJBJj5e4LUb7uZfC5MX8rxTiVC6pVdaNWp2XsGDz6Ay2', '');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
