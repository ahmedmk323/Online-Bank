ALTER TABLE `Users`
ADD COLUMN visibility TINYINT(1)
DEFAULT 0
COMMENT "A boolean value for for profile visibility (public or private)";