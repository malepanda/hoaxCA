-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2015 at 03:55 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cdcol`
--

-- --------------------------------------------------------

--
-- Table structure for table `cds`
--

CREATE TABLE IF NOT EXISTS `cds` (
  `titel` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `interpret` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `jahr` int(11) DEFAULT NULL,
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `cds`
--

INSERT INTO `cds` (`titel`, `interpret`, `jahr`, `id`) VALUES
('Beauty', 'Ryuichi Sakamoto', 1990, 1),
('Goodbye Country (Hello Nightclub)', 'Groove Armada', 2001, 4),
('Glee', 'Bran Van 3000', 1997, 5);
--
-- Database: `hoaxca`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `AcceptRequest`()
BEGIN
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Login`(p_username VARCHAR (50), p_password VARCHAR (50))
BEGIN
	SET @login_sukses = (SELECT 1 FROM userTable 
			WHERE username=p_username AND userpassword = password(p_password));
			
		IF (@login_sukses) THEN
			SELECT 0 as statuscode, "Login sukses !" as statusmsg;
			
		ELSE
			SELECT -1 as statuscode, "login GAGAL! Username dan password salah! " as statusmsg;
		END IF;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Register`(p_user_name VARCHAR(50), p_password VARCHAR(50), p_nama VARCHAR(100), 
						       p_alamat VARCHAR (100), p_email VARCHAR (100), p_nomorkontak VARCHAR(20))
BEGIN
	SET @same_user_name=(
	SELECT COUNT(1) 
	FROM userTable
	WHERE username=p_user_name
	GROUP BY username);
	
	
	IF (@same_user_name!=0) THEN
	SELECT -1 AS statuscode, "Gagal mendaftar akun baru! Username tidak unik!" as statusmsg;
		
	ELSE 
		INSERT INTO userTable VALUES (p_user_name, PASSWORD(p_password), p_nama, p_alamat, p_email, p_nomorkontak);
		select 0 as statuscode, "Sukses" as statumsg;
	
	END IF;
	
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RequestCertificate`(p_username varchar (50), p_namaOrganisasi varchar (50), 
						      p_unitOrganisasi varchar (50), p_kota varchar (50), p_prov varchar(50), 
						      p_validTime int)
BEGIN
	SET @same_user_name=(
	SELECT COUNT(1) 
	FROM userTable
	WHERE username=p_username
	GROUP BY username);
	
	
	IF (@same_user_name!=0) THEN
		insert into signingreq values (null, p_username, p_namaOrganisasi, p_UnitOrganisasi, p_kota, p_prov, 
					       p_validTime);
		SELECT 0 AS statuscode, "Sukses" AS statusmsg;
		
	ELSE 
		SELECT -1 AS statuscode, concat("Error: username ", p_username,"tidak ditemukan") AS statusmsg;
	
	END IF;
	
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `viewAllRequest`(p_username varchar (50))
BEGIN
	IF (p_username="admin") THEN
		SELECT 0 AS statuscode, ID, namaOrganisasi, unitOrganisasi, kota, prov, validTime FROM signingreq;
		
	ELSE 
		SELECT -1 AS statuscode, CONCAT("Error: username ", p_username,"tidak ditemukan") AS statusmsg;
	
	END IF;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `viewMyRequest`(p_username varchar (50))
BEGIN
	
	SET @same_user_name=(
	SELECT COUNT(1) 
	FROM userTable
	WHERE username=p_username
	GROUP BY username);
	
	
	IF (@same_user_name!=0) THEN
		select 0 as statuscode, ID, namaOrganisasi, unitOrganisasi, kota, prov, validTime from signingreq
		where username=p_username;
		
	ELSE 
		SELECT -1 AS statuscode, CONCAT("Error: username ", p_username,"tidak ditemukan") AS statusmsg;
	
	END IF;
    END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE IF NOT EXISTS `certificate` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `berlakuSejak` date DEFAULT NULL,
  `berlakuSampai` date DEFAULT NULL,
  `filepath` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_certificate` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `signingreq`
--

CREATE TABLE IF NOT EXISTS `signingreq` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `namaOrganisasi` varchar(50) DEFAULT NULL,
  `unitOrganisasi` varchar(50) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `prov` varchar(50) DEFAULT NULL,
  `validTime` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_signingreq` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `signingreq`
--

INSERT INTO `signingreq` (`ID`, `username`, `namaOrganisasi`, `unitOrganisasi`, `kota`, `prov`, `validTime`) VALUES
(1, 'androISP', 'Bank Terus Maju Tbk.', 'Divisi IT, Bank Terus Maju Tbk.', 'Surabaya', 'Jatim', 2),
(2, 'androISP', 'HMTC', 'Departemen Medfo HMTC', 'Surabaya', 'Jawa Timur', 1),
(5, 'testuser', 'Dummy Test', 'Dummy Test', 'Dummy', 'Dummy', 2);

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE IF NOT EXISTS `usertable` (
  `username` varchar(50) NOT NULL,
  `userpassword` varchar(42) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nomorKontak` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`username`, `userpassword`, `nama`, `alamat`, `email`, `nomorKontak`) VALUES
('admin', '*4ACFE3202A5FF5CF467898FC58AAB1D615029441', 'Administrator', 'Beyond the bit', 'admin@hoaxca.com', '082153008846'),
('androISP', '*FC26E83083CF8AFCDCB70AA7CBBC52B604313B2B', 'Android Jaya Internet Service Provider', 'Jl Kali Malang No.21', 'kontak@androisp.com', '031-34512'),
('testuser', '*94BDCEBE19083CE2A1F959FD02F964C7AF4CFC29', 'Test User', 'Test User', 'Test User', 'Test User');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `certificate`
--
ALTER TABLE `certificate`
  ADD CONSTRAINT `FK_certificate` FOREIGN KEY (`username`) REFERENCES `usertable` (`username`) ON UPDATE CASCADE;

--
-- Constraints for table `signingreq`
--
ALTER TABLE `signingreq`
  ADD CONSTRAINT `FK_signingreq` FOREIGN KEY (`username`) REFERENCES `usertable` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Database: `mbd_begalwar`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Login`()
BEGIN
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Register`(p_user_name VARCHAR(50), p_password VARCHAR(50), p_nama VARCHAR(50), p_email VARCHAR(50), p_ATK int, 
						       p_DEF int, p_ELEMENT int)
BEGIN
	set @same_user_name=(
	SELECT COUNT(1) 
	FROM begal
	WHERE user_name=p_user_name
	GROUP BY user_name);
	
	
	if (@same_user_name!=0) THEN
	SELECT -1, "Gagal mendaftar akun baru! Username tidak unik!";
		
	else 
		IF (p_ATK+p_DEF > 15) THEN
			SELECT -2 "Gagal mendaftar akun baru! Attack dan Deffense melebihi ketentuan!";
		
		ELSE
			INSERT INTO begal VALUES (p_user_name, PASSWORD(p_password), p_nama, p_email, (SELECT MAX_HP FROM _setting), 
						  (SELECT MAX_AP FROM _setting), p_ATK, p_DEF, 0, p_ELEMENT, 1, 500);
			
		END IF;
	
	end if;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Ubah_password`(p_user_name VARCHAR(50), p_oldpassword VARCHAR(50), p_newpassword VARCHAR(50))
BEGIN
	SET @same_user_name=(
	SELECT COUNT(1) 
	FROM begal
	WHERE user_name=p_user_name
	GROUP BY user_name);
	
	set @current_password=(
	Select pass_word from begal where user_name=p_user_name
	);
	
	
	IF (@same_user_name!=0) THEN
		if (@current_password = password(p_oldpassword)) then
			UPDATE begal SET pass_word = Password(p_newpassword)
			WHERE user_name = p_user_name;
			SELECT 0, "Password berhasil dirubah!";
		else 
			SELECT -2, "Password salah!";
		end if;
	
	else
	SELECT -1, "Username tidak ditemukan!";
		
	end if;
    END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `_setting`
--

CREATE TABLE IF NOT EXISTS `_setting` (
  `MAX_HP` int(11) DEFAULT NULL,
  `MAX_AP` int(11) DEFAULT NULL,
  `MAX_MONEY` int(11) DEFAULT NULL,
  `MAX_EXP` int(11) DEFAULT NULL,
  `MAX_FAIL_LOGIN_ATTEMP` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_setting`
--

INSERT INTO `_setting` (`MAX_HP`, `MAX_AP`, `MAX_MONEY`, `MAX_EXP`, `MAX_FAIL_LOGIN_ATTEMP`) VALUES
(100, 15, 2000, 100, 3);

-- --------------------------------------------------------

--
-- Table structure for table `begal`
--

CREATE TABLE IF NOT EXISTS `begal` (
  `user_name` varchar(50) NOT NULL,
  `pass_word` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `HP` int(11) DEFAULT NULL,
  `AP` int(11) DEFAULT NULL,
  `ATK` int(11) DEFAULT NULL,
  `DEF` int(11) DEFAULT NULL,
  `EXP` int(11) DEFAULT NULL,
  `ELEMENT` int(11) DEFAULT NULL,
  `LEVEL` int(11) DEFAULT NULL,
  `MONEY` int(11) DEFAULT NULL,
  `failed_login_attempt` int(11) DEFAULT NULL,
  `last_failed_login_attempt` datetime DEFAULT NULL,
  PRIMARY KEY (`user_name`),
  KEY `FK_begal` (`EXP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `begal`
--

INSERT INTO `begal` (`user_name`, `pass_word`, `nama`, `email`, `HP`, `AP`, `ATK`, `DEF`, `EXP`, `ELEMENT`, `LEVEL`, `MONEY`, `failed_login_attempt`, `last_failed_login_attempt`) VALUES
('gebangsquad', '*A9A21191B5B2378D08C215F44892EB3BC7B3CD30', 'Gebang Jaya Rahayu', 'gebang@merdeka.com', 100, 15, 15, 0, 0, 4, 1, 500, NULL, NULL),
('keputihsquad', '*5F6D81D5C4782C980DACCE8EB8C256F8A2AA90A7', 'Keputih Jaya Rahayu', 'keputih@sangar.com', 100, 15, 13, 2, 0, 3, 1, 500, NULL, NULL),
('manyarsquad', '*96B812257D7B2BB7C945537543A6A37BCC8B0E1A', 'Manyar Jaya Rahayu', 'manyar@tangguh.com', 100, 15, 1, 14, 0, 2, 1, 500, NULL, NULL),
('mulyossquad', '*C862D633D4EE9FDBD8527C4B894A62AF24115260', 'Mulyosari Jaya Rahayu', 'mulyos@keren.com', 100, 15, 8, 7, 0, 1, 1, 500, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `element`
--

CREATE TABLE IF NOT EXISTS `element` (
  `element_id` int(11) NOT NULL,
  `element_nama` varchar(50) DEFAULT NULL,
  `super` int(11) DEFAULT NULL,
  `weak` int(11) DEFAULT NULL,
  PRIMARY KEY (`element_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `element`
--

INSERT INTO `element` (`element_id`, `element_nama`, `super`, `weak`) VALUES
(1, 'air', 2, 3),
(2, 'api', 4, 1),
(3, 'tanah', 1, 4),
(4, 'angin', 3, 2);
--
-- Database: `mbd_kuliah`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_login_v3`(p_userid VARCHAR(32), p_password VARCHAR(32))
label_proc: BEGIN
	SET @jml_cobalogin = (SELECT mhs_jmllogingagal 
		FROM mahasiswa WHERE mhs_nrp=p_userid);
	SET @selisih_waktu_login_gagal_terakhir_in_secs = (
		SELECT TIME_TO_SEC(TIMEDIFF( NOW(), mhs_lastlogingagal)) FROM mahasiswa
		WHERE mhs_nrp=p_userid
	);
	IF (@jml_cobalogin >= 3) 
		AND (@selisih_waktu_login_gagal_terakhir_in_secs <= 300) 
	THEN
		SELECT -2, CONCAT("MAAF, anda harus menunggu ", 
			300-@selisih_waktu_login_gagal_terakhir_in_secs, " detik");
		LEAVE label_proc;   #keluar dari store procedure
	ELSE
		SET @login_sukses = (SELECT 1 FROM mahasiswa 
			WHERE mhs_nrp=p_userid AND mhs_password = MD5(p_password));
		IF (@login_sukses) THEN
			SELECT 0, "Login sukses !", CONCAT("Login terakhir anda: ", mhs_lastlogin) 
			FROM mahasiswa WHERE mhs_nrp=p_userid;
			UPDATE mahasiswa SET 
				mhs_lastlogin = NOW()
				,  mhs_jmllogingagal =0 
			WHERE mhs_nrp=p_userid;
		ELSE
			UPDATE mahasiswa
				SET mhs_jmllogingagal = mhs_jmllogingagal +1
					, mhs_lastlogingagal = NOW()
			WHERE mhs_nrp = p_userid;
			SELECT -1, CONCAT("login GAGAL ", mhs_jmllogingagal, "x")
				FROM mahasiswa WHERE mhs_nrp=p_userid;
		END IF;
	END IF;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_setpassword`(
	p_userid VARCHAR(32), p_password VARCHAR(32))
BEGIN
	UPDATE mahasiswa SET mhs_password = MD5(p_password)
	WHERE mhs_nrp = p_userid;    
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_transfer_uang`(
p_nrp_pengirim varchar(32), 
	p_nrp_penerima varchar(32), p_nominal INT)
BEGIN
DECLARE EXIT HANDLER for sqlexception, sqlwarning, NOT FOUND
BEGIN
	ROLLBACK;
	select -99, "pokoke gagal";
END;
	START TRANSACTION;
	UPDATE mahasiswa set mhs_uang=mhs_uang - p_nominal where mhs_nrp = p_nrp_pengirim;
	UPDATE mahasiswa SET mhs_uang=mhs_uang + p_nominal WHERE mhs_nrp = p_nrp_penerima;
	COMMIT;
	select 0, "transfer sukses";
    END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `dos_nip` char(16) NOT NULL,
  `dos_nama` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`dos_nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`dos_nip`, `dos_nama`) VALUES
('111', 'Dani'),
('222', 'Deni'),
('333', 'Dini'),
('444', 'Dina'),
('555', 'Dona'),
('666', 'Dono');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `mhs_nrp` char(10) NOT NULL,
  `mhs_nama` varchar(32) DEFAULT NULL,
  `mhs_nipwali` char(16) DEFAULT NULL,
  `mhs_password` char(32) DEFAULT NULL,
  `mhs_lastlogin` datetime DEFAULT NULL,
  `counter` int(11) DEFAULT NULL,
  `mhs_waktulogin` datetime DEFAULT NULL,
  `mhs_jmllogingagal` int(11) DEFAULT NULL,
  `mhs_lastlogingagal` timestamp NULL DEFAULT NULL,
  `mhs_uang` int(11) DEFAULT '1000000000',
  PRIMARY KEY (`mhs_nrp`),
  KEY `FK_mahasiswa` (`mhs_nipwali`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`mhs_nrp`, `mhs_nama`, `mhs_nipwali`, `mhs_password`, `mhs_lastlogin`, `counter`, `mhs_waktulogin`, `mhs_jmllogingagal`, `mhs_lastlogingagal`, `mhs_uang`) VALUES
('5113100138', 'ANDARU KHARISMANDA\r\n', '111', '202cb962ac59075b964b07152d234b70', '2015-03-19 15:10:55', NULL, NULL, 0, '2015-03-19 08:04:29', 1000000000),
('5113100139', 'RIGOLD IMAN KEBARO NAINGGOLAN\r\n', '444', 'mautauaja', '2015-03-12 15:25:48', NULL, NULL, 0, '2015-03-19 07:19:04', 1000000000),
('5113100141', 'LAURENSIUS ADI\r\n', '222', 'bismillah', '2015-03-12 15:25:48', NULL, NULL, 0, '2015-03-19 07:19:04', 1000000000),
('5113100142', 'RONAULI SILVA NATALENSIS SIDABUK', '222', '2e3817293fc275dbee74bd71ce6eb056', '2015-03-12 15:25:48', NULL, NULL, 0, '2015-03-19 07:19:04', 1000000000),
('5113100171', 'NUGROHO WICAKSONO\r\n', '333', '202cb962ac59075b964b07152d234b70', '2015-03-12 15:25:48', NULL, NULL, 0, '2015-03-19 07:19:04', 1000000000),
('5113100179', 'ARFIAN FIDIANTORO', '111', NULL, '2015-03-12 15:25:48', NULL, NULL, 0, '2015-03-19 07:19:04', 1000000000),
('5113100184', 'HANIF SUDIRA', '222', NULL, '2015-03-12 15:25:48', NULL, NULL, 0, '2015-03-19 07:19:04', 1000000000),
('5113100185', 'IRSYAD ISWANDA PUTRA', '111', '698d51a19d8a121ce581499d7b701668', '2015-03-12 15:25:48', NULL, NULL, 0, '2015-03-19 07:19:04', 1000000000);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa_nohp`
--

CREATE TABLE IF NOT EXISTS `mahasiswa_nohp` (
  `mhs_nrp` char(10) DEFAULT NULL,
  `no_hp` varchar(16) DEFAULT NULL,
  KEY `FK_mahasiswa_nohp` (`mhs_nrp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa_nohp`
--

INSERT INTO `mahasiswa_nohp` (`mhs_nrp`, `no_hp`) VALUES
('5113100184', '081234'),
('5113100179', '083534254'),
('5113100142', '0812413235'),
('5113100171', '08612453443'),
('5113100171', '0876273423'),
('5113100171', '08239482364'),
('5113100141', '08234897234'),
('5113100141', '03472346623');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `FK_mahasiswa` FOREIGN KEY (`mhs_nipwali`) REFERENCES `dosen` (`dos_nip`) ON UPDATE CASCADE;

--
-- Constraints for table `mahasiswa_nohp`
--
ALTER TABLE `mahasiswa_nohp`
  ADD CONSTRAINT `FK_mahasiswa_nohp` FOREIGN KEY (`mhs_nrp`) REFERENCES `mahasiswa` (`mhs_nrp`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Database: `phpmyadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `pma_bookmark`
--

CREATE TABLE IF NOT EXISTS `pma_bookmark` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pma_column_info`
--

CREATE TABLE IF NOT EXISTS `pma_column_info` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pma_designer_coords`
--

CREATE TABLE IF NOT EXISTS `pma_designer_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `x` int(11) DEFAULT NULL,
  `y` int(11) DEFAULT NULL,
  `v` tinyint(4) DEFAULT NULL,
  `h` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`db_name`,`table_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma_history`
--

CREATE TABLE IF NOT EXISTS `pma_history` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`,`db`,`table`,`timevalue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pma_pdf_pages`
--

CREATE TABLE IF NOT EXISTS `pma_pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '',
  PRIMARY KEY (`page_nr`),
  KEY `db_name` (`db_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pma_recent`
--

CREATE TABLE IF NOT EXISTS `pma_recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma_recent`
--

INSERT INTO `pma_recent` (`username`, `tables`) VALUES
('root', '[{"db":"phpmyadmin","table":"pma_column_info"},{"db":"phpmyadmin","table":"pma_designer_coords"},{"db":"phpmyadmin","table":"pma_history"},{"db":"phpmyadmin","table":"pma_pdf_pages"},{"db":"phpmyadmin","table":"pma_recent"},{"db":"phpmyadmin","table":"pma_relation"},{"db":"cdcol","table":"cds"},{"db":"mysql","table":"user"},{"db":"mysql","table":"help_relation"},{"db":"mysql","table":"db"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma_relation`
--

CREATE TABLE IF NOT EXISTS `pma_relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  KEY `foreign_field` (`foreign_db`,`foreign_table`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma_table_coords`
--

CREATE TABLE IF NOT EXISTS `pma_table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float unsigned NOT NULL DEFAULT '0',
  `y` float unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma_table_info`
--

CREATE TABLE IF NOT EXISTS `pma_table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`db_name`,`table_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma_table_uiprefs`
--

CREATE TABLE IF NOT EXISTS `pma_table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`username`,`db_name`,`table_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma_tracking`
--

CREATE TABLE IF NOT EXISTS `pma_tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) unsigned NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`db_name`,`table_name`,`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma_userconfig`
--

CREATE TABLE IF NOT EXISTS `pma_userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma_userconfig`
--

INSERT INTO `pma_userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2015-05-05 13:36:15', '{"collation_connection":null}');
--
-- Database: `test`
--
--
-- Database: `webauth`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_pwd`
--

CREATE TABLE IF NOT EXISTS `user_pwd` (
  `name` char(30) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `pass` char(32) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `user_pwd`
--

INSERT INTO `user_pwd` (`name`, `pass`) VALUES
('xampp', 'wampp');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
