ALTER TABLE `Accounts`
ADD COLUMN isActive TINYINT(1)
DEFAULT 1
COMMENT "A boolean value for for active accounts";