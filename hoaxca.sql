-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2015 at 03:06 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hoaxca`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getCert`(p_id int, p_username varchar (50))
BEGIN
	SET @same_user_name=(
	SELECT COUNT(1) 
	FROM certificate
	WHERE username=p_username
	GROUP BY username);
	
	IF (@same_user_name!=0 or p_username="admin") THEN
		select 0 as statuscode, certFilePath from certificate where ID=p_id;
		
	ELSE 
		SELECT -1 AS statuscode, CONCAT("Error: username ", p_username,"tidak ditemukan") AS statusmsg;
	
	END IF;
	
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `RequestCertificate`(p_username varchar (50), p_domain VARCHAR (50), 
						      p_namaOrganisasi varchar (50), p_unitOrganisasi varchar (50), 
						      p_kota varchar (50), p_prov varchar(50), p_script varchar (200))
BEGIN
	SET @same_user_name=(
	SELECT COUNT(1) 
	FROM userTable
	WHERE username=p_username
	GROUP BY username);
	
	
	IF (@same_user_name!=0) THEN
		insert into signingreq values (null, p_username, p_domain, p_namaOrganisasi, p_UnitOrganisasi, p_kota, p_prov, 
					       p_script, false, null);
		SELECT 0 AS statuscode, "Sukses" AS statusmsg;
		
	ELSE 
		SELECT -1 AS statuscode, concat("Error: username ", p_username,"tidak ditemukan") AS statusmsg;
	
	END IF;
	
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `signCert`(p_id INT, p_username VARCHAR (50), p_path VARCHAR (100))
BEGIN
	DECLARE exit handler for sqlexception
	  BEGIN
	    -- ERROR
	  ROLLBACK;
	END;
	DECLARE exit handler for sqlwarning
	 BEGIN
	    -- WARNING
	 ROLLBACK;
	END;
	
	
	
	IF (p_username="admin") THEN
		START TRANSACTION;
		iNSERT INTO certificate VALUES (NULL, (select username from signingreq where ID=p_id), (SELECT domain FROM signingreq WHERE ID=p_id),
						p_path);
		delete from signingreq where ID=p_id;
		COMMIT;
		SELECT 0 AS statuscode, "Sukses" AS statusmsg; 
		
	ELSE 
		SELECT -1 AS statuscode, CONCAT("HAHA... You're not admin... Aren't you? :/") AS statusmsg;
	
	END IF;
	
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `uploadCSR`(p_id int, p_username varchar (50), p_path varchar (100))
BEGIN
	SET @same_user_name=(
	SELECT COUNT(1) 
	FROM signingreq
	WHERE username=p_username and ID=p_id
	GROUP BY username);
	
	
	IF (@same_user_name!=0) THEN
		UPDATE signingreq SET csrpath=p_path, availableforsigning=true
		WHERE ID = p_id;  
		
	ELSE 
		SELECT -1 AS statuscode, CONCAT("Error: username ", p_username,"tidak ditemukan") AS statusmsg;
	
	END IF;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `viewAllCert`(p_username varchar (50))
BEGIN
	IF (p_username="admin") THEN
		SELECT 0 AS statuscode, ID, domain, domain, certFilePath FROM certificate;
		
	ELSE 
		SELECT -1 AS statuscode, CONCAT("Error: username ", p_username,"tidak ditemukan") AS statusmsg;
	
	END IF;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `viewAllRequest`(p_username varchar (50))
BEGIN
	IF (p_username="admin") THEN
		SELECT 0 AS statuscode, ID, domain, namaOrganisasi, unitOrganisasi, kota, prov, script, availableforsigning FROM signingreq;
		
	ELSE 
		SELECT -1 AS statuscode, CONCAT("Error: username ", p_username,"tidak ditemukan") AS statusmsg;
	
	END IF;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `viewMyCert`(p_username VARCHAR (50))
BEGIN
	SET @same_user_name=(
	SELECT COUNT(1) 
	FROM userTable
	WHERE username=p_username
	GROUP BY username);
	
	
	IF (@same_user_name!=0) THEN
		SELECT 0 AS statuscode, ID, domain,certFilePath FROM certificate
		WHERE username=p_username;
		
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
		select 0 as statuscode, ID, domain, namaOrganisasi, unitOrganisasi, kota, prov, script, availableforsigning from signingreq
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
  `domain` varchar(50) DEFAULT NULL,
  `certFilePath` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_certificate` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `certificate`
--

INSERT INTO `certificate` (`ID`, `username`, `domain`, `certFilePath`) VALUES
(5, 'hmtc', 'hmtc.if..its.ac.id', './cert/23.crt');

-- --------------------------------------------------------

--
-- Table structure for table `signingreq`
--

CREATE TABLE IF NOT EXISTS `signingreq` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `domain` varchar(50) DEFAULT NULL,
  `namaOrganisasi` varchar(50) DEFAULT NULL,
  `unitOrganisasi` varchar(50) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `prov` varchar(50) DEFAULT NULL,
  `script` varchar(200) DEFAULT NULL,
  `availableforsigning` tinyint(1) DEFAULT NULL,
  `csrpath` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_signingreq` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `signingreq`
--

INSERT INTO `signingreq` (`ID`, `username`, `domain`, `namaOrganisasi`, `unitOrganisasi`, `kota`, `prov`, `script`, `availableforsigning`, `csrpath`) VALUES
(16, 'testuser', 'test.dummy.com', 'dummy', 'dummy', 'dummy', 'dummy', 'openssl req -new -newkey rsa:2048 -nodes -out test_dummy_com.csr -keyout test_dummy_com.key -subj "/C=ID/ST=dummy/L=dummy/O=dummy/OU=dummy/CN=test.dummy.com', 0, NULL),
(19, 'androISP', 'androisp.com', 'Android Internet Service Provider', 'Departemen Web', 'Surabaya', 'Jawa Timur', 'openssl req -new -newkey rsa:2048 -nodes -out androisp_com.csr -keyout androisp_com.key -subj "/C=ID/ST=Jawa Timur/L=Surabaya/O=Android Internet Service Provider/OU=Departemen Web/CN=androisp.com', 0, './uploads/19');

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
('hmtc', '*4111FDD7D5FEB1DCCA819E3E2C5DB1CADAC2189E', 'Himpunan Mahasiswa Teknik Computer-Informatika ITS', 'Jl Teknik Kimia', 'medfohmtc@gmail.com', '082153008846'),
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
