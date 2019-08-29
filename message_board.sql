-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 
-- 伺服器版本： 10.4.6-MariaDB
-- PHP 版本： 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `message_board`
--

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `memberID` int(11) UNSIGNED NOT NULL,
  `mail` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `PWD` varchar(36) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`memberID`, `mail`, `PWD`) VALUES
(1, 'hugo@gmail.com', 'b59c67bf196a4758191e42f76670ceba'),
(2, 'aaa@gmail.com', '47bce5c74f589f4867dbd57e9ca9f808'),
(3, 'hugo@gmail.comdd', '4124bc0a9335c27f086f24ba207a4912'),
(6, 'aaqa@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(9, 'hugog@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(12, 'bbbb@gmei.com', '0cc175b9c0f1b6a831c399e269772661'),
(13, 'hugog3@gmail.com', '518ed29525738cebdac49c49e60ea9d3'),
(16, 'dddf@gmai.comn', 'c4ca4238a0b923820dcc509a6f75849b'),
(19, '122@cio.oo', 'f3abb86bd34cf4d52698f14c0da1dc60'),
(22, 'dfdfd@gfgfgf.fgfg', 'd926d7bb9ccf46fc04a61bd65d87b9b3'),
(23, '1234@mail.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- 資料表結構 `message`
--

CREATE TABLE `message` (
  `ID` int(11) UNSIGNED NOT NULL,
  `memberID` int(10) UNSIGNED NOT NULL,
  `topic` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `message`
--

INSERT INTO `message` (`ID`, `memberID`, `topic`, `content`, `datetime`) VALUES
(2, 2, '108學年度第1學期「日間部」學生減免學雜費申請須知', '發佈單位: 學生事務處生活輔導組d\r\n108學年度第1學期「日間部」學生減免學雜費須知。', '2019-08-29 16:35:11'),
(30, 3, 'sssssssssssssssssssssdfsef', 'ssssssssssssssssseeeeeeww////', '2019-08-29 16:37:09'),
(31, 3, 'aaaaaaaaaaaaaaefefsf', 'aaaaaaaaaaaaaaaaa', '2019-08-27 15:25:25'),
(32, 3, 'eeeeeeeeeeeee', 'eeeeeeeeeeeeeeeeeeggggfdsfe', '2019-08-27 15:25:25'),
(41, 2, '11111dfeefd', 'sssssssssssssssssssddddswww1', '2019-08-29 17:31:49'),
(43, 3, 'p\'; -- commend', '## --', '2019-08-27 15:25:25'),
(45, 2, '&lt;script&gt; alert(\'此帳號已被註冊\');&lt;/script&gt;', '&lt;script&gt; alert(\'此帳號已被註冊\');&lt;/script&gt;sssssyyyy', '2019-08-29 16:16:27'),
(47, 3, '--{{}}', '--', '2019-08-29 16:37:20'),
(50, 1, '我是hugo', 'RRRRRRRRRRRRRrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrfff', '2019-08-27 16:27:17'),
(51, 2, '&lt;script&gt; alert(\'此帳號已被註冊\');&lt;/script&gt;', 'fbfxxfbdddd', '2019-08-29 16:35:01'),
(54, 1, '1221', '1212', '2019-08-29 15:43:30'),
(55, 1, '542452111111111111uuuoooo', '452452hhhhhhhh', '2019-08-29 18:16:57'),
(57, 23, 'uyiu', 'uiuyi', '2019-08-29 18:17:20'),
(59, 1, 'ffdddss', 'sssss', '2019-08-29 18:21:30');

-- --------------------------------------------------------

--
-- 資料表結構 `reply`
--

CREATE TABLE `reply` (
  `ID` int(11) UNSIGNED NOT NULL,
  `messageID` int(11) UNSIGNED NOT NULL,
  `memberID` int(11) UNSIGNED NOT NULL,
  `reply` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `reply`
--

INSERT INTO `reply` (`ID`, `messageID`, `memberID`, `reply`, `datetime`) VALUES
(1, 1, 6, 'dddddddd', '2019-08-28 12:29:53'),
(2, 1, 6, 'dsfsdfdsf', '2019-08-28 12:29:55'),
(3, 1, 6, 'sdfdsfsdfds', '2019-08-28 12:29:57'),
(4, 42, 6, 'aaaaaaaaaaaaaaaaaaaaaaaaa', '2019-08-28 13:39:07'),
(5, 45, 1, 'dsfsdfeff', '2019-08-28 13:47:48'),
(6, 1, 1, '3333', '2019-08-29 17:46:18'),
(7, 1, 1, 'ssssssss', '2019-08-29 18:07:45'),
(8, 1, 1, 'fffff', '2019-08-29 18:08:46'),
(9, 55, 1, '546454\r\n', '2019-08-29 18:19:59'),
(10, 55, 1, '656565656', '2019-08-29 18:20:04'),
(11, 55, 1, '6556656', '2019-08-29 18:20:08'),
(12, 55, 1, '565656', '2019-08-29 18:20:12'),
(13, 55, 1, '        ', '2019-08-29 18:20:43'),
(14, 55, 1, '  c c cx cx', '2019-08-29 18:20:49'),
(15, 55, 1, 'fgfgfd', '2019-08-29 18:20:59'),
(16, 55, 1, 'fgfdg', '2019-08-29 18:21:01'),
(17, 55, 1, 'fdgfd', '2019-08-29 18:21:02');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`memberID`),
  ADD UNIQUE KEY `mail` (`mail`) USING BTREE;

--
-- 資料表索引 `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`ID`);

--
-- 資料表索引 `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`ID`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `memberID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `message`
--
ALTER TABLE `message`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `reply`
--
ALTER TABLE `reply`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
