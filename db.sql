/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.4.21-MariaDB : Database - ml
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ml` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `ml`;

/*Table structure for table `naivebayes_history` */

DROP TABLE IF EXISTS `naivebayes_history`;

CREATE TABLE `naivebayes_history` (
  `history` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `naivebayes_history` */

insert  into `naivebayes_history`(`history`) values 
('{\"uniqid\":\"629f0c4d41c77\",\"Pelayanan\":\"Sesuai\",\"Komunikasi\":\"Mudah\",\"Fasilitas\":\"Lengkap\",\"Harga\":\"Cukup\",\"Hasil\":\"Minat\"}'),
('{\"uniqid\":\"629f0c5a4b582\",\"Pelayanan\":\"Sesuai\",\"Komunikasi\":\"Mudah\",\"Fasilitas\":\"Lengkap\",\"Harga\":\"Murah\",\"Hasil\":\"Minat\"}');

/* Function  structure for function  `json_extract_c` */

/*!50003 DROP FUNCTION IF EXISTS `json_extract_c` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `json_extract_c`(details TEXT,
  required_field VARCHAR (255)
) RETURNS text CHARSET latin1
BEGIN
  /* get key from function passed required field value */
  set @JSON_key = SUBSTRING_INDEX(required_field,'$.', -1); 
  /* get everything to the right of the 'key = <required_field>' */
  set @JSON_entry = SUBSTRING_INDEX(details,CONCAT('"', @JSON_key, '"'), -1 ); 
  /* get everything to the left of the trailing comma */
  set @JSON_entry_no_trailing_comma = SUBSTRING_INDEX(@JSON_entry, ",", 1); 
  /* get everything to the right of the leading colon after trimming trailing and leading whitespace */
  set @JSON_entry_no_leading_colon = TRIM(LEADING ':' FROM TRIM(@JSON_entry_no_trailing_comma)); 
  /* trim off the leading and trailing double quotes after trimming trailing and leading whitespace*/
  set @JSON_extracted_entry = TRIM(BOTH '"' FROM TRIM(@JSON_entry_no_leading_colon));
  RETURN @JSON_extracted_entry;
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;


CREATE TABLE master (
    Janis_Kelamin VARCHAR(20),
    Program_Studi VARCHAR(50),
    Tahun_Lulus INT,
    Cara_Cari_Kerja VARCHAR(50),
    Lama_Waktu INT,
    Jmlh_Perusahaan INT,
    Jmlh_Respon_Perusahaan INT,
    Bekerja VARCHAR(20),
    Aktif_Cari_Kerja VARCHAR(20),
    Jenis_Perusahaan VARCHAR(50),
    Kemampuan_Ilmu_Disiplin VARCHAR(50),
    Kemampuan_Diluar_Ilmu_Disiplin VARCHAR(50),
    Pengetahuan_Umum VARCHAR(50),
    Keterampilan_Internet VARCHAR(50),
    Keterampilan_Komputer VARCHAR(50),
    Berpikir_Kritis VARCHAR(50),
    Keterampilan_Riset VARCHAR(50),
    Keterampilan_Belajar VARCHAR(50),
    Kemampuan_Komunikasi VARCHAR(50),
    Bekerja_Dibawah_Tekanan VARCHAR(20),
    Manajemen_Waktu VARCHAR(50),
    Bekerja_Mandiri VARCHAR(20),
    Keterampilan_Bekerjasama VARCHAR(50),
    Pemecahan_Masalah VARCHAR(50),
    Negosiasi VARCHAR(50),
    Kemampuan_Analisis VARCHAR(50),
    Toleransi VARCHAR(50),
    Kemampuan_Adaptasi VARCHAR(50),
    Loyalitas VARCHAR(50),
    Bekerja_Dengan_Orang VARCHAR(20),
    Kepemimpinan VARCHAR(50),
    Tanggung_Jawab VARCHAR(50),
    Inisiatif VARCHAR(50),
    Manajemen_Project VARCHAR(50),
    Kemampuan_Ide VARCHAR(50),
    Kemampuan_Dokumentasi VARCHAR(50),
    Kemampuan_Belajar VARCHAR(50),
    Bidang_Kerja VARCHAR(50)
);