DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
    `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `firstname` varchar(100) NOT NULL,
    `lastname` varchar(255) NOT NULL,
    `telephone` varchar(20) NOT NULL,
    `address` varchar(255) NOT NULL,
    `houseNumber` int(11) NOT NULL,
    `zipcode` varchar(20) NOT NULL,
    `city` varchar(100) NOT NULL,
    `accountOwner` varchar(150) NOT NULL,
    `iban` varchar(32) NOT NULL,
    `paymentDataId` varchar(100) NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB;
