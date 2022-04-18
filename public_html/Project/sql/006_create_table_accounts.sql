CREATE TABLE IF NOT EXISTS `Accounts`(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `account_number` VARCHAR(12) UNIQUE,
    `user_id` INT,
    `balance` INT DEFAULT 0,
    `account_type` VARCHAR(15) NOT NULL,
    `created` TIMESTAMP  DEFAULT CURRENT_TIMESTAMP,
    `modified` TIMESTAMP  DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY(`user_id`) REFERENCES Users(`id`),
    CHECK (`balance` >= 0 AND LENGTH(`account_number`) = 12)
)