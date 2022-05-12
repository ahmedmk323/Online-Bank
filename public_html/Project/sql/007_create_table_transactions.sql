CREATE TABLE IF NOT EXISTS `Transactions`(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `account_src` INT,
    `account_dest` INT,
    `balance_change` INT,
    `transaction_type` VARCHAR(15) NOT NULL,   
    `memo` VARCHAR(25),
    `expected_total` INT,
    `created` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `modified` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`account_src`) REFERENCES Accounts(`id`),
    FOREIGN KEY (`account_dest`) REFERENCES Accounts(`id`)
)