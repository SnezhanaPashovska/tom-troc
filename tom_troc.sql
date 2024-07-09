-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 02, 2024 at 03:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tom_troc`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `author` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(258) NOT NULL,
  `is_available` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `user_id`, `title`, `author`, `description`, `image`, `is_available`) VALUES
(1, 9, 'The Lord of The rings', 'J.R.R Tolkien', 'The middle earth The rusty swing set creaked in the twilight breeze, whispering secrets to the dandelion wishes floating on the wind.\r\nAcross the cobblestone street, a stray ginger cat stalked a plump pigeon, its emerald eyes glinting with predatory hunger.\r\nInside the bakery window, a golden croissant awaited, its flaky layers promising a buttery explosion of flavor.', 'https://m.media-amazon.com/images/I/8150KG7y2EL._SL1500_.jpg', 0),
(2, 1, 'The Kinkfolk Table', 'Nathan Williams', 'J\'ai récemment plongé dans les pages de \'The Kinfolk Table\' et j\'ai été enchanté par cette œuvre captivante. Ce livre va bien au-delà d\'une simple collection de recettes ; il célèbre l\'art de partager des moments authentiques autour de la table. Les photographies magnifiques et le ton chaleureux captivent dès le départ, transportant le lecteur dans un voyage à travers des recettes et des histoires qui mettent en avant la beauté de la simplicité et de la convivialité. Chaque page est une invitation à ralentir, à savourer et à créer des souvenirs durables avec les êtres chers. \'The Kinfolk Table\' incarne parfaitement l\'esprit de la cuisine et de la camaraderie, et il est certain que ce livre trouvera une place spéciale dans le cœur de tout amoureux de la cuisine et des rencontres inspirantes.', 'https://images.squarespace-cdn.com/content/v1/54fb5e8de4b07795ac9ff693/1613756395611-PHGS5MB7A8211YIGVFHN/book%2Bcover%2Billustration.jpg?format=1500w', 1),
(3, 1, 'Echoes of Eternity', 'Seraphina Sinclair', 'In a world where memories are commodities and the past is a closely guarded secret, young historian Elara Ravenswood uncovers a forgotten manuscript that promises to unravel the fabric of time itself. As she delves deeper into its cryptic pages, Elara is thrust into a dangerous game of intrigue and betrayal, where the lines between reality and illusion blur. With the fate of her world hanging in the balance, Elara must navigate ancient prophecies, enigmatic allies, and shadowy adversaries to unlock the truth before it\'s lost forever.', 'https://64.media.tumblr.com/837d21ff002466223ea387275e41e08a/tumblr_inline_pk0z60O8i01qjd1r9_500.jpg', 1),
(4, 1, 'Echoes of Eternity', 'Seraphina Sinclair', 'In a world where memories are commodities and the past is a closely guarded secret, young historian Elara Ravenswood uncovers a forgotten manuscript that promises to unravel the fabric of time itself. As she delves deeper into its cryptic pages, Elara is thrust into a dangerous game of intrigue and betrayal, where the lines between reality and illusion blur. With the fate of her world hanging in the balance, Elara must navigate ancient prophecies, enigmatic allies, and shadowy adversaries to unlock the truth before it\'s lost forever.', 'https://64.media.tumblr.com/837d21ff002466223ea387275e41e08a/tumblr_inline_pk0z60O8i01qjd1r9_500.jpg', 1),
(5, 9, 'The Lord of The rings', 'J.R.R Tolkien', 'The middle earth The rusty swing set creaked in the twilight breeze, whispering secrets to the dandelion wishes floating on the wind.\r\nAcross the cobblestone street, a stray ginger cat stalked a plump pigeon, its emerald eyes glinting with predatory hunger.\r\nInside the bakery window, a golden croissant awaited, its flaky layers promising a buttery explosion of flavor.', 'https://m.media-amazon.com/images/I/8150KG7y2EL._SL1500_.jpg', 1),
(6, 9, 'The Kinkfolk Table', 'Nathan Williams', 'J\'ai récemment plongé dans les pages de \'The Kinfolk Table\' et j\'ai été enchanté par cette œuvre captivante. Ce livre va bien au-delà d\'une simple collection de recettes ; il célèbre l\'art de partager des moments authentiques autour de la table. Les photographies magnifiques et le ton chaleureux captivent dès le départ, transportant le lecteur dans un voyage à travers des recettes et des histoires qui mettent en avant la beauté de la simplicité et de la convivialité. Chaque page est une invitation à ralentir, à savourer et à créer des souvenirs durables avec les êtres chers. \'The Kinfolk Table\' incarne parfaitement l\'esprit de la cuisine et de la camaraderie, et il est certain que ce livre trouvera une place spéciale dans le cœur de tout amoureux de la cuisine et des rencontres inspirantes.', 'https://images.squarespace-cdn.com/content/v1/54fb5e8de4b07795ac9ff693/1613756395611-PHGS5MB7A8211YIGVFHN/book%2Bcover%2Billustration.jpg?format=1500w', 1),
(7, 3, 'LOTR', 'JRRT', 'Book', 'https://cdn.hmv.com/r/w-1280/p-webp/hmv/files/0c/0cde555b-14b2-43a5-9b8f-7d533cd0e0fe.jpg', 1),
(10, 64, 'Choppertown: The Sinners', 'Vitoria Bidwell', 'potenti nullam porttitor lacus at turpis donec posuere metus vitae ipsum aliquam non mauris morbi non lectus aliquam sit amet', 'http://dummyimage.com/126x100.png/ff4444/ffffff', 1),
(12, 9, 'Eat Drink Man Woman', 'Skip Crowche', 'sapien urna pretium nisl ut volutpat sapien arcu sed augue aliquam erat volutpat in congue etiam justo etiam pretium', 'http://dummyimage.com/150x100.png/ff4444/ffffff', 1),
(13, 64, 'Side Effects from Hello', 'Borg Bownas', 'sed ante vivamus tortor duis mattis egestas metus aenean fermentum donec ut mauris eget massa tempor convallis nulla neque libero', 'http://dummyimage.com/147x100.png/5fa2dd/ffffff', 0),
(14, 64, 'Drunken Angel (Yoidore tenshi)', 'Bryant Lighton', 'aliquet maecenas leo odio condimentum id luctus nec molestie sed justo pellentesque viverra pede ac diam cras', 'http://dummyimage.com/119x100.png/cc0000/ffffff', 1),
(15, 64, 'Never Make It Home', 'Chloette Sor', 'vestibulum quam sapien varius ut blandit non interdum in ante', 'http://dummyimage.com/142x100.png/dddddd/000000', 1),
(16, 64, 'Buck Bundy', 'Sonnie Craigs', 'ut at dolor quis odio consequat varius integer ac leo', 'http://dummyimage.com/110x100.png/ff4444/ffffff', 1);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(800) NOT NULL,
  `image` varchar(500) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_Admin` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `image`, `creation_date`, `is_Admin`) VALUES
(1, ' StarrySky2024', 'starrysky2024@example.com', 'L$#9xWd8QpBv', 'https://images.pexels.com/photos/220429/pexels-photo-220429.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', '2024-06-13 12:08:45', 0),
(2, 'SparkleNinja83', 'glitterdreams87@example.com', 'Rainbow$123!', 'https://wallpapers.com/images/featured/cute-profile-picture-s52z1uggme5sj92d.jpg', '2024-06-13 12:06:53', 0),
(3, 'EchoCipher99', 'moonlight342@example.com', 'RandomPwd!567', 'https://www.creativefabrica.com/wp-content/uploads/2022/03/09/Woman-Icon-Teen-Profile-Graphics-26722130-1-1-580x387.jpg', '2024-06-13 12:06:53', 0),
(4, '', '', '', '', '2024-06-14 20:44:10', 0),
(5, 'kjgh', 'kjh@yahoo.com', '$2y$10$JX8sJ57vAK/t54./B3Rqfe5emLsQFFv6xy76ZT1cXDFKBTywIh1oa', '', '2024-06-14 20:54:42', 0),
(6, 'jhj', 'jhjh@yajoo.com', '$2y$10$QMGyG4wI4H.gISBr6kahvu3sIalchqU1eLHmTzwXtSgBxJ5UliXL.', '', '2024-06-14 21:06:59', 0),
(7, 'Snezhana', 'snezhana.pashovska@hotmail.com', '$2y$10$q/yMloq4ATTyeeD/Eg79Au6q3vzVFp8hH7dB9omAWOkH62R5/7uPC', '', '2024-06-14 21:13:01', 0),
(8, 'Frodo', 'f@yahoo.com', '$2y$10$2DnF18nd5BPcdv8Ow/fS6ewPSYcaO27t8gckPD.lEKjpzmRH3vkgm', '', '2024-06-14 21:14:46', 0),
(9, 'Admin', 'admin@tomtroc.com', '$2y$10$sYAkBRqoIAbo/W8C9W1ZnOOgsHC8gXUOng1FKNiVFA1.J.fJz5EQW', 'https://thumbs.dreamstime.com/z/admin-office-binder-wooden-desk-table-colored-pencil-pencils-pen-notebook-paper-79046621.jpg', '2024-06-17 21:39:20', 1),
(11, 'Steffie', 'smarland0@jigsy.com', '$2a$04$2CXaB6MpraClxhz0snHHieC94SLD6FTlAeCThJsZrwjZInec79WV6', 'http://dummyimage.com/131x100.png/5fa2dd/ffffff', '0000-00-00 00:00:00', 0),
(12, 'Ive', 'ibarford1@over-blog.com', '$2a$04$HqV1Yj9H37vPvKASpFKT3.H5xWGJpx4faCFnvVU8jexAgaDaT02O6', 'http://dummyimage.com/175x100.png/5fa2dd/ffffff', '0000-00-00 00:00:00', 0),
(13, 'Dierdre', 'dbottoms2@posterous.com', '$2a$04$ErckTIracO9I9c11278PNuBFmyhtZXucc1XPsQ.ykvqty2TlPQioq', 'http://dummyimage.com/222x100.png/dddddd/000000', '0000-00-00 00:00:00', 0),
(14, 'Powell', 'priddick3@yellowpages.com', '$2a$04$Xclzps/ZWjXox0muLBSWIuQXUkBDl437lhZVgmQBFFEHJ6c6N73g2', 'http://dummyimage.com/160x100.png/ff4444/ffffff', '0000-00-00 00:00:00', 0),
(15, 'Jonathon', 'jbolsteridge4@jalbum.net', '$2a$04$D5p1JT4pdymkuR3ubKePIeWmCML9ejuD5alLeYKVbbLOKpYgEmXiW', 'http://dummyimage.com/189x100.png/ff4444/ffffff', '0000-00-00 00:00:00', 0),
(16, 'Claudina', 'chaps5@sbwire.com', '$2a$04$/UkZ7kgCRBBRUwbw.N4wl.GiM5zSevZcjmo04sDew7nj8BZKZgEW.', 'http://dummyimage.com/189x100.png/5fa2dd/ffffff', '0000-00-00 00:00:00', 0),
(17, 'Sheelah', 'sbarukh6@google.ru', '$2a$04$U12O1lARfNIURyvPRlAObeqlTbu.1qn57rY1xTdS7YylVCZ78JIQ.', 'http://dummyimage.com/154x100.png/ff4444/ffffff', '0000-00-00 00:00:00', 0),
(18, 'Gilly', 'gbarbe7@last.fm', '$2a$04$FpOGRx1Pp9lBHwQHFh/cZuSEA5Uo2E.RQKpCYbb6NNtOzy.vVPq4y', 'http://dummyimage.com/196x100.png/cc0000/ffffff', '0000-00-00 00:00:00', 0),
(19, 'Adan', 'acherry8@redcross.org', '$2a$04$WVb/lwVSJAwXpPylAe19zOO76SAxebQluP767YUO8lFaCNtYYDfiG', 'http://dummyimage.com/166x100.png/dddddd/000000', '0000-00-00 00:00:00', 0),
(20, 'Lucias', 'lwhines9@techcrunch.com', '$2a$04$GakGr8Qy0bCq9mcGryvx2OIn/QLS8nl3qLpc98pPg7blijUJEIHLe', 'http://dummyimage.com/239x100.png/5fa2dd/ffffff', '0000-00-00 00:00:00', 0),
(21, 'Thorndike', 'toldroyda@shinystat.com', '$2a$04$ihOEN3PUv8sjN24JGzN5NuW9wjikPCJP/0s9WBWCQk2MHcumyCMGS', 'http://dummyimage.com/202x100.png/dddddd/000000', '0000-00-00 00:00:00', 0),
(22, 'Sloane', 'sdowseb@blinklist.com', '$2a$04$lJBUnpL7V0osj7t9FR1aPeo9m5RIg20CspE3B/lXw/HpYkjN5dbRG', 'http://dummyimage.com/119x100.png/cc0000/ffffff', '0000-00-00 00:00:00', 0),
(23, 'Fabiano', 'fpeasec@blogtalkradio.com', '$2a$04$esKlMpb/5h9d5Lt7FEPYaeCA442X8IBHe5Q.ti96AgcaxM6kuKp0W', 'http://dummyimage.com/151x100.png/5fa2dd/ffffff', '0000-00-00 00:00:00', 0),
(24, 'Wylie', 'wcowwelld@furl.net', '$2a$04$pVUkZzAcjYVEt.zKDY4GouJw/xajuG5jDlPcF9yARaBkakzIhwMu.', 'http://dummyimage.com/100x100.png/dddddd/000000', '0000-00-00 00:00:00', 0),
(25, 'Britt', 'bcostelle@eventbrite.com', '$2a$04$x5JC/DmLaIQtAAZNR9mMlOXEC80EDDTc5pqjLEdJIOFEvRIhRP2pe', 'http://dummyimage.com/115x100.png/ff4444/ffffff', '0000-00-00 00:00:00', 0),
(26, 'Jerrilyn', 'jwodhamf@icq.com', '$2a$04$00FYSBkZAOQ.kM4SGTyLO.U/g/sTa4YHsn22kT5qIK2Tj8z3/lfbG', 'http://dummyimage.com/214x100.png/cc0000/ffffff', '0000-00-00 00:00:00', 0),
(27, 'Doug', 'dplaydong@delicious.com', '$2a$04$0REpacbQ6KsZNxzaEqIGWuOljnnttjrndBCqvfrMm8dq02o88Zo0C', 'http://dummyimage.com/182x100.png/dddddd/000000', '0000-00-00 00:00:00', 0),
(28, 'Antoinette', 'amaystoneh@washington.edu', '$2a$04$Yi0YQTHyywlnn6qChb4WyelB/oMBb9gs5xy6UCbWs6DR3z4CNn6tO', 'http://dummyimage.com/154x100.png/5fa2dd/ffffff', '0000-00-00 00:00:00', 0),
(29, 'Leesa', 'ldanati@blogtalkradio.com', '$2a$04$t9t//jkpx.T8FaN4InZlQ.U.28Wr7MN1kEZX10otX3659hg2IpXQq', 'http://dummyimage.com/119x100.png/ff4444/ffffff', '0000-00-00 00:00:00', 0),
(30, 'Papagena', 'pduffetj@archive.org', '$2a$04$/WkNVcLijXRJ.JhRv4wNIeYS2b3wHQ/iMC2qxdX/u94k671Z1oZw2', 'http://dummyimage.com/199x100.png/cc0000/ffffff', '0000-00-00 00:00:00', 0),
(31, 'Barbra', 'bsawartk@ft.com', '$2a$04$HJT3NgsWLCZMpQkc6lWRRepeYBdCp3sshb50kFOYwfYfSI1Sjj3JO', 'http://dummyimage.com/137x100.png/ff4444/ffffff', '0000-00-00 00:00:00', 0),
(32, 'Jerry', 'jsydesl@hibu.com', '$2a$04$FyDwsrIgcvk6GAiQCIXgKOYqwa05Jm9KNY0G0oNcrBwl7lz.NO/om', 'http://dummyimage.com/171x100.png/dddddd/000000', '2024-03-10 15:37:36', 0),
(33, 'Philip', 'proullierm@harvard.edu', '$2a$04$Zv.g/4IXmXXJHDZ7g4pmFundh4kMurQwdjDxofBWRcv.YKQN3DXkO', 'http://dummyimage.com/206x100.png/5fa2dd/ffffff', '0000-00-00 00:00:00', 0),
(34, 'Gian', 'gblaymiresn@canalblog.com', '$2a$04$TpGKqnMAugtIdDqNMreKr.wgRnqer2nnDQdAO5fPnWh3eqSXZZz6q', 'http://dummyimage.com/223x100.png/ff4444/ffffff', '0000-00-00 00:00:00', 0),
(35, 'Leone', 'lbernardezo@artisteer.com', '$2a$04$21exuOrJhQQs1ZWIW9Uene94.bHz8/jcyKsTV.kLHhfzSdpu9BNFy', 'http://dummyimage.com/160x100.png/dddddd/000000', '0000-00-00 00:00:00', 0),
(36, 'Pamella', 'pashleyp@wordpress.org', '$2a$04$cFECbIg9Zo/MQHoAeafrpe8d5uaSB4FR/gJsRrgQKLqiJHuz5OEPS', 'http://dummyimage.com/193x100.png/dddddd/000000', '0000-00-00 00:00:00', 0),
(37, 'Galvin', 'gbellayq@diigo.com', '$2a$04$G01tfsg/RdOz5wAvAOh9R.PRSoLtgSM3ev/WlHiy5z1sjMIm8WvgG', 'http://dummyimage.com/221x100.png/cc0000/ffffff', '0000-00-00 00:00:00', 0),
(38, 'Garrard', 'grannellsr@cam.ac.uk', '$2a$04$.vvGcmZCuN19mxxHj4to0e2Bf.Fnh/jb2.GHwOGNb3xbQmMujCHiO', 'http://dummyimage.com/208x100.png/5fa2dd/ffffff', '0000-00-00 00:00:00', 0),
(39, 'Norbert', 'ncarahers@bloomberg.com', '$2a$04$2/6Fqdr2csMoUUi/HOvhHO6JBmfPTaatGXRnMJ54U5qwuGENogvv2', 'http://dummyimage.com/247x100.png/cc0000/ffffff', '0000-00-00 00:00:00', 0),
(40, 'Skye', 'shaskeyt@businesswire.com', '$2a$04$kruJ6sjnHPRXPeGqQBigkuXjhoCNCTcFK6djy5ciYwwH6BGWReuZS', 'http://dummyimage.com/165x100.png/ff4444/ffffff', '0000-00-00 00:00:00', 0),
(41, 'Enrika', 'ehowellu@nifty.com', '$2a$04$v4vg0ZH1huwE.GnpCFLi6uLOoOLwAYj3Kd4zT9MKh9ZOkIxA6AKIe', 'http://dummyimage.com/234x100.png/ff4444/ffffff', '0000-00-00 00:00:00', 0),
(42, 'Waylin', 'wdivesv@usgs.gov', '$2a$04$KZb/Lyv2U4447rv.SBe1.Od1irKIIuDFQ1z49aEtjM.BYgU8ab2/i', 'http://dummyimage.com/201x100.png/5fa2dd/ffffff', '0000-00-00 00:00:00', 0),
(43, 'Corabelle', 'cbatropw@blogspot.com', '$2a$04$9ELAVKmS0cO5YeuCAw5/NOO1d342S7utsTYz6iMj50OoabEdeeSee', 'http://dummyimage.com/188x100.png/dddddd/000000', '0000-00-00 00:00:00', 0),
(44, 'Lamont', 'lraimbauldx@prnewswire.com', '$2a$04$1oZvIrA71k8d8laLAta37eaMq2WBjqyYHMgfRPKuB44J2HC1TxJwy', 'http://dummyimage.com/198x100.png/5fa2dd/ffffff', '0000-00-00 00:00:00', 0),
(45, 'Giulio', 'gbarnevilley@phoca.cz', '$2a$04$q41csLyVXv/b9W3gECuH4O1UB7CF9YJrJ8WynhKlb4qPjfijZdg1a', 'http://dummyimage.com/138x100.png/5fa2dd/ffffff', '0000-00-00 00:00:00', 0),
(46, 'Estrellita', 'esporesz@angelfire.com', '$2a$04$W8wzm2F2XdQZfYQU1OlOWuXgKTcQRXRjR.fR7yJAiI1UmPWHyD95K', 'http://dummyimage.com/225x100.png/ff4444/ffffff', '0000-00-00 00:00:00', 0),
(47, 'Ximenez', 'xcheesman10@prnewswire.com', '$2a$04$avRih./pJ58MDiynAuQHlOGkUZLtdsKzhgb9YmEFHcHPWcrioODpu', 'http://dummyimage.com/160x100.png/ff4444/ffffff', '0000-00-00 00:00:00', 0),
(48, 'Tally', 'tdrydale11@123-reg.co.uk', '$2a$04$GgveNmS51e69iZORbdG3nevFgPvBAF8QSTrPKzvvyeBFk24.Tm0b6', 'http://dummyimage.com/127x100.png/cc0000/ffffff', '0000-00-00 00:00:00', 0),
(49, 'Cloris', 'cspatoni12@ifeng.com', '$2a$04$Ydea3MoBVPz2ka9q6Bhb8OpBZNTEkaksY6Tq0.n9xOCZ9saYp1BUe', 'http://dummyimage.com/192x100.png/dddddd/000000', '0000-00-00 00:00:00', 0),
(50, 'Wernher', 'wsumpter13@is.gd', '$2a$04$JV4osF1HjDBHaJyvs/GKAOHg8GYU0NdcCHnqxV3QsNRKW3ZYi4j/i', 'http://dummyimage.com/181x100.png/cc0000/ffffff', '0000-00-00 00:00:00', 0),
(51, 'Ibby', 'icocher14@va.gov', '$2a$04$k9STZuAxuZgKzGLWbtKrIey4O0hphGE1DD6y6AYoYflSabwOhIjIq', 'http://dummyimage.com/147x100.png/5fa2dd/ffffff', '0000-00-00 00:00:00', 0),
(52, 'Elyssa', 'emacquist15@salon.com', '$2a$04$to3pT9LiOdPcc/2KSo54kuwa0dju/4S8BUOWgJUV0dpsAcbUPZM/m', 'http://dummyimage.com/155x100.png/dddddd/000000', '0000-00-00 00:00:00', 0),
(53, 'Lind', 'lbrabbs16@tumblr.com', '$2a$04$NSzvWM.QTu7t0TDHyftkVuJiZycvyUqEqWtoUtw.QVoJqlw2EyEpa', 'http://dummyimage.com/143x100.png/cc0000/ffffff', '0000-00-00 00:00:00', 0),
(54, 'Eadith', 'eyuille17@google.cn', '$2a$04$rvPIOKwUjoI7nPazK2WDlOWVmtK4DQIzgybt5EMSJsqc6NrcnBjOu', 'http://dummyimage.com/125x100.png/ff4444/ffffff', '0000-00-00 00:00:00', 0),
(55, 'Gypsy', 'gtaggerty18@go.com', '$2a$04$xI69d5NCQISUaSpYxZ//MegWjQFtNYluwylIsjZnz.bDe9FNYUWy6', 'http://dummyimage.com/245x100.png/dddddd/000000', '0000-00-00 00:00:00', 0),
(56, 'Patti', 'purquhart19@skyrock.com', '$2a$04$3dVdbNJCWE3kwvDo/bXJIeFmWszesMYWZ3qfy.kbpJov47gUryOfW', 'http://dummyimage.com/131x100.png/ff4444/ffffff', '0000-00-00 00:00:00', 0),
(57, 'Fionna', 'fdearnaley1a@state.tx.us', '$2a$04$Q7aBdku5YZHdtBN6i6f4seLrB2rx8Zrv4PkjmIWpBOFqpijEIeUQS', 'http://dummyimage.com/248x100.png/cc0000/ffffff', '0000-00-00 00:00:00', 0),
(58, 'Donall', 'dcomoletti1b@unicef.org', '$2a$04$5RPe4d/9bjp45zkyrY.NI./hpT/TjZVuQngsI6R3PHV63eU2gXNh2', 'http://dummyimage.com/147x100.png/cc0000/ffffff', '0000-00-00 00:00:00', 0),
(59, 'Georges', 'gfindlater1c@altervista.org', '$2a$04$lTx1Jh09kUR0uU1.woThj.SXNhzb3OBCKUS1QUhg2VQeWKjPifmMe', 'http://dummyimage.com/118x100.png/5fa2dd/ffffff', '0000-00-00 00:00:00', 0),
(60, 'Niel', 'nhallihan1d@nationalgeographic.com', '$2a$04$Z2Bzy.r/5N9QbFmQ4c2bruPZ.OSHRa8h8yAASqBqAV6YuQMQoInm.', 'http://dummyimage.com/184x100.png/cc0000/ffffff', '0000-00-00 00:00:00', 0),
(61, 'AuroraSky', 'aurora.sky@example.com', '$2y$10$gHIC9mn9PPK4yItMbR2sKe56XDhR7W2rNPJEXTVmzKL9PGdDqTY/e', 'http://dummyimage.com/160x100.png/dddddd/000000', '2022-10-15 14:39:30', 0),
(62, 'ThunderBolt', 'thunder.bolt@example.com', '$2y$10$gQGTKb5lB1noGyc2ISUb9uv84OeZ28HmO/CUDyFAFx4VdLhqiY02G', 'http://dummyimage.com/160x100.png/dddddd/000000', '2020-11-26 20:51:47', 0),
(63, 'NewUser', 'newuser@yahoo.com', '$2y$10$1nonRlAsUoPxO3094R.0EubmgV15aKlvesZNq4drJK1npArTbSauu', '', '2024-06-21 12:52:29', 0),
(64, 'ocean_breeze@example.com', 'ocean_breeze@example.com', '$2y$10$Qng3sktuKNQwBlbBP1iqXuZdavgUqogvWya/5Gmvwaiy8HrQhpS1K', '', '2024-07-02 13:11:18', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_book` (`user_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_message` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `user_id_book` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `user_id_message` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
