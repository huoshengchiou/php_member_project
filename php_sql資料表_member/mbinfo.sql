-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 
-- 伺服器版本： 10.4.11-MariaDB
-- PHP 版本： 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `member`
--

-- --------------------------------------------------------

--
-- 資料表結構 `mbinfo`
--

CREATE TABLE `mbinfo` (
  `serial` int(11) NOT NULL COMMENT '流水編',
  `mbID` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mbAccount` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mbPassword` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mbName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mbNick` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '不知名的冒險者',
  `mbCountry` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mbEmail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mbPh` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mbInvoice` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mbGender` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mbBd` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mbDes` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `mbinfo`
--

INSERT INTO `mbinfo` (`serial`, `mbID`, `mbAccount`, `mbPassword`, `mbName`, `mbNick`, `mbCountry`, `mbEmail`, `mbPh`, `mbInvoice`, `mbGender`, `mbBd`, `mbDes`) VALUES
(1, 'M001', 'Gina      ', 'Gina      ', '謝怡伶', '千姿百態的藍牙弟控    ', 'Taiwan', 'BanditLipsx @gmail.com  ', '0938202580', '0ZCI0GN', 'Female', '1987/0719', '天才只意味著終身不懈地努力。                                    '),
(2, 'M002', 'Lester    ', 'Lester    ', '蔡芸名', '帥到掉渣的萬聖節老闆  ', 'Taiwan', 'Bizarreta @gmail.com    ', '0923993845', '1E6RS4T', 'Female', '1977/4/11 ', '凡是決心取得勝利的人是從來不說不可能的。 '),
(3, 'M003', 'Arianna   ', 'Arianna   ', '蔡明輝', '抓魚的銀牌拳頭', 'Taiwan', 'BizarreWeare @gmail.com ', '0987319221', '355GW1V', 'Male  ', '1955/2/24', '沒有偉大的意志力，便沒有雄才大略。                                 '),
(4, 'M004', 'Jessica   ', 'Jessica   ', '庾美玉', '善變的甜甜探險家      ', 'Taiwan', 'Breezentso @gmail.com   ', '0932374184', '4EKHJ2S', 'Female', '1962/12/13', '生命不止，奮鬥不息。                                        '),
(5, 'M005', 'Pattie    ', 'Pattie    ', '李俊毅', '忌妒的霹靂旅人        ', 'Taiwan', 'ChiriMew @gmail.com     ', '0928558888', '57P7CY5', 'Male  ', '1987/6/18', '強者能同命運的風暴抗爭。                                      '),
(6, 'M006', 'Betty     ', 'Betty     ', '張湘枝', '深海的弒神小飛俠      ', 'Taiwan', 'Cordbled @gmail.com     ', '0928274678', '6SGFZNL', 'Female', '1932/1/10', '生活沒有目標，猶如航海沒有羅盤。                                  '),
(7, 'M007', 'Janna     ', 'Janna     ', '王惠如', '還能接受的功夫莫逆之交', 'Taiwan', 'Datachin @gmail.com     ', '0956770677', '7KCKDZN', 'Female', '1963/5/6 ', '過一種高尚而誠實的生活。當你年老時回想起過去，你就能再一次享受人生。                '),
(8, 'M008', 'Mark      ', 'Mark      ', '郭百民', '新奇的破爛惡魔        ', 'Taiwan', 'Dramanswa @gmail.com    ', '0936456073', '8ZUAS4Y', 'Male  ', '1927/8/17', '接受過去和現在的模樣，才會有能量去追尋自己的未來。                         '),
(9, 'M009', 'Richard   ', 'Richard   ', '劉軒豪', '帥到掉渣的雷美夢成真  ', 'Taiwan', 'Exassurr @gmail.com     ', '0960331794', 'ARH741I', 'Male  ', '1966/11/9', '每個成功者的後面都有很多不成功的歲月。                               '),
(10, 'M010', 'Kenny     ', 'Kenny     ', '吳俊賢', '人生失敗的美味寵物    ', 'Taiwan', 'Felineil @gmail.com     ', '0915214359', 'BQ6FD29', 'Male  ', '1937/09/30', '充實今朝，昨日已成過去，明天充滿神奇。                               '),
(11, 'M011', 'Tim       ', 'Tim       ', '李綠水', '過期的大縫紉家        ', 'Taiwan', 'Hempus @gmail.com       ', '0927025435', 'CKSMQ4F', 'Male  ', '1942/10/25', '成功的秘密在於始終如一地忠於目標。                                 '),
(12, 'M012', 'Kyle      ', 'Kyle      ', '游菁夫', '是個黑心廠商          ', 'Taiwan', 'Herbitymp @gmail.com    ', '0971763911', 'DWQI3UL', 'Male  ', '1925/07/21 ', '人必須有自信，這是成功的秘密。                                   '),
(13, 'M013', 'Samuel    ', 'Samuel    ', '張淑真', '不被需要的狂熱羅剎    ', 'Taiwan', 'Icegate @gmail.com      ', '0963198664', 'EXD3LZ7', 'Female', '1940/03/29 ', '成功來自於克服困難的鬥爭。                                     '),
(14, 'M014', 'Jeremiah  ', 'Jeremiah  ', '吳欣源', '愛冒險的雷劍士        ', 'Taiwan', 'IffyCetic @gmail.com    ', '0960871403', 'GC7ID6G', 'Male  ', '1958/04/20', '只有在字典中，成功才會出現在工作之前。                               '),
(15, 'M015', 'Trevor    ', 'Trevor    ', '賴慧珊', '不被需要的出包天國    ', 'Taiwan', 'InterviewSan @gmail.com ', '0926729100', 'HQR3Y48', 'Female', '1956/02/04', '到任何值得去的地方都沒有捷徑。                                   '),
(16, 'M016', 'Tristan   ', 'Tristan   ', '黃美玉', '驕傲的星際王者        ', 'Taiwan', 'JidePlenty @gmail.com   ', '0924894375', 'ILI9HN0', 'Female', '1970/12/16', '你舉世無雙，無人可以替代。                                     '),
(17, 'M017', 'Molly     ', 'Molly     ', '蔡麗雯', '人人喊打的小心羅剎    ', 'Taiwan', 'NewscastLucky @gmail.com', '0935028732', 'JY4ADA9', 'Female', '1953/06/01', '除非你能和真實的自己和平相處，否則你永遠不會對已擁有的東西感到滿足。                '),
(18, 'M018', 'Xavier    ', 'Xavier    ', '吳永謙', '花心的低等村民        ', 'Taiwan', 'PhiaExotic @gmail.com   ', '0938067958', 'K7ZV0R1', 'Male  ', '1944/01/02 ', '如果你想走到高處，就要使用自己的兩條腿！不要讓別人把你抬到高處；不要坐在別人的背上和頭上。'),
(19, 'M019', 'Alexia    ', 'Alexia    ', '翁芳如', '無縛的一片大伯        ', 'Taiwan', 'Smarder @gmail.com      ', '0918713299', 'M33KW1Q', 'Female', '1939/05/26', '對任何技能的掌握都需要一生的刻苦操練。                               '),
(20, 'M020', 'Maggie    ', 'Maggie    ', '方旻妃', '忘記吃早餐的可悲大野狼', 'Taiwan', 'Snowboardia @gmail.com  ', '0963246509', 'NZ7CI9S', 'Female', '1949/08/28', '沒有了目的，生活便鬱悶無光。                                    '),
(21, 'M021', 'Teddy     ', 'Teddy     ', '王阿谷', '天下第一的陽光燭火    ', 'Taiwan', 'SoftHero @gmail.com     ', '0922305495', 'O8SAYIH', 'Male  ', '1943/11/19 ', '二十歲時起支配作用的是意志,三十歲時是機智,四十歲時是判斷。                    '),
(22, 'M022', 'Andrea    ', 'Andrea    ', '黃美慧', '憤怒的地球奶爸        ', 'Taiwan', 'Spignio @gmail.com      ', '0921708631', 'PU40MPH', 'Female', '1959/09/05 ', '膚淺的人相信運氣，而成功的第一秘訣是自信。                             '),
(23, 'M023', 'Jason     ', 'Jason     ', '陳家彬', '時間到的鱸釣羅剎      ', 'Taiwan', 'Spotel @gmail.com       ', '0911514919', 'QGASMLW', 'Male  ', '1920/10/07', '我能奉獻的沒有其它，只有熱血、辛勞、眼淚與汗水。                          '),
(24, 'M024', 'Omid      ', 'Omid      ', '錢韻法', '度量小的紫色佛跳牆    ', 'Taiwan', 'SraRead @gmail.com      ', '0916431745', 'SFEX3FB', 'Male  ', '1948/07/12', '知足是人生在世最大的幸事。                                     '),
(25, 'M025', 'Willy     ', 'Willy     ', '林立杰', '愛吐槽的一隻清潔工    ', 'Taiwan', 'SupremeMoto @gmail.com  ', '0989575135', 'TZDXSJJ', 'Male  ', '1985/03/23 ', '當你停止嘗試的時候，你就完全失敗了。                                '),
(26, 'M026', 'Susan     ', 'Susan     ', '潘舒婷', '超越時空的出包綠巨人  ', 'Taiwan', 'Talelo @gmail.com       ', '0970737079', 'UCKLQHP', 'Female', '1985/03/23 ', '冬天來了，春天還會遠嗎？                                      '),
(27, 'M027', 'Nerissa   ', 'Nerissa   ', '劉筱婷', '傳說中的兔耳傻瓜      ', 'Thai', 'TopicsLil @gmail.com    ', '0963515840', 'V3JCRBT', 'Female', '1945/04/03', '意志、工作和等待是成功的金字塔的基石。                               '),
(28, 'M028', 'Jacqueline', 'Jacqueline', '顏麗萍', '百發百中的隔空總統    ', 'Taiwan', 'Toughts @gmail.com      ', '0939247701', 'X2EYE1R', 'Female', '1975/02/15', '心懷偉大的理想，你將會變得偉大。                                  '),
(29, 'M029', 'Emma      ', 'Emma      ', '賴至均', '人人喊打的耍憨穴居怪  ', 'Taiwan', 'Uniqueth @gmail.com     ', '0938430452', 'YSG0C5L', 'Male  ', '1979/12/08 ', '只有有耐心圓滿完成簡單工作的人，才能夠輕而易舉的完成困難的事。                   '),
(30, 'M030', 'Bailey    ', 'Bailey    ', '楊淑慧', '急速成長的大洋山頂洞人', 'Taiwan', 'Vitalco @gmail.com      ', '0954237980', 'ZAPZ2PX', 'Female', '1978/01/22 ', '人生的奮鬥目標決定你將成為怎樣的人。                                '),
(91, 'M031', 'OK', '5150d2104c8cd974b27f', '小啾啾', 'kotake', '', 'kkk', 'kkk', '', 'Male', '1872/52/34', ''),
(92, 'M032', 'ashi', '425ffc1422dc4f32528b', '小啾啾', '', '', 'fasdsd', 'sdasdsdasd', '', 'Male', 'asdasdasdasd', ''),
(93, 'M033', 'lllll', '99ebdbd711b0e1854a6c', '小啾啾', '', '', 'fasdsd', 'sdasdsdasd', '', 'Male', 'asdasdasdasd', ''),
(95, 'M034', 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'test', 'kotake', 'Thai', 'test', 'test', '', 'Female', '', ''),
(98, 'M036', 'kkk', '5150d2104c8cd974b27fad3f25ec4e8098bb7bbe', 'kkk', '英雄', 'taiwan', 'kkk', 'kkk', '', 'Female', '', '');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `mbinfo`
--
ALTER TABLE `mbinfo`
  ADD PRIMARY KEY (`serial`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `mbinfo`
--
ALTER TABLE `mbinfo`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水編', AUTO_INCREMENT=100;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
