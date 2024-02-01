
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `roll` int(11) NOT NULL DEFAULT '0',
  `token` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)
CREATE TABLE IF NOT EXISTS `users`(
    `id_user` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL UNIQUE,
  `phone` varchar(15) NOT NULL UNIQUE,
  `amount` int(11) NOT NULL,
  `id_admin` int(11),
  FOREIGN KEY('id_admin') REFERENCES 'admin'('id_admin'),
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)

CREATE TABLE IF NOT EXISTS `credit` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `amount` varchar(15) NOT NULL,
   `id_admin` int(11),
  FOREIGN KEY('id_admin') REFERENCES 'admin'('id_admin'),
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)
-- Table structure for table `debit`
--

CREATE TABLE IF NOT EXISTS `debit` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `username` varchar(100) NOT NULL,
  `amount` varchar(15) NOT NULL,
  `id_admin` int(11),
  FOREIGN KEY ('id_admin') REFERENCES 'admin'('id_admin'),
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) 
-- Table structure for table `rules`
--

CREATE TABLE IF NOT EXISTS `rules` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `list` varchar(200) NOT NULL,
  `id_admin` int(11),
  FOREIGN KEY (`id_admin`) REFERENCES 'admin'('id_admin'),
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) 
 
 







CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `roll` int(11) NOT NULL DEFAULT '0',
  `token` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL UNIQUE,
  `phone` varchar(15) NOT NULL UNIQUE,
  `amount` int(11) NOT NULL,
  `id_admin` int(11),
  FOREIGN KEY (`id_admin`) REFERENCES `admin`(`id_admin`),
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS `credit` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `amount` varchar(15) NOT NULL,
  `id_admin` int(11),
  FOREIGN KEY (`id_admin`) REFERENCES `admin`(`id_admin`),
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS `debit` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `username` varchar(100) NOT NULL,
  `amount` varchar(15) NOT NULL,
  `id_admin` int(11),
  FOREIGN KEY (`id_admin`) REFERENCES `admin`(`id_admin`),
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS `rules` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `list` varchar(200) NOT NULL,
  `id_admin` int(11),
  FOREIGN KEY (`id_admin`) REFERENCES `admin`(`id_admin`),
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
