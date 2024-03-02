-- - - - - - - - - - - - - -
-- - Advertisements_detail -
-- - - - - - - - - - - - - -
SELECT *, (SELECT ru_name FROM `cities` WHERE `cities`.id = `advertisements`.city_id) as ru_city, (SELECT tm_name FROM `cities` WHERE `cities`.id = `advertisements`.city_id) as tm_city, (SELECT ru_name FROM `categories` WHERE `categories`.`id` = `advertisements`.`category_id`) as ru_category, (SELECT tm_name FROM `categories` WHERE `categories`.`id` = `advertisements`.`category_id`) as tm_category, (SELECT parent FROM `categories` WHERE `categories`.`id` = `advertisements`.`category_id`) as department_id FROM `advertisements`;

-- - - - - - - - - - - - - -
-- - Departments_detail - -
-- - - - - - - - - - - - - -
SELECT *, (SELECT COUNT(*) FROM `advertisements_detail` WHERE `categories`.`id` = `advertisements_detail`.`department_id`) AS advCount FROM `categories` WHERE `status` = 1 AND `parent` = 0  ORDER BY `updated_at` DESC;

-- - - - - - - - - - - - - -
-- - Categories_detail - - -
-- - - - - - - - - - - - - -
SELECT *, (SELECT COUNT(*) FROM `advertisements_detail` WHERE `categories`.`id` = `advertisements_detail`.`category_id`) AS advCount FROM `categories` WHERE `status` = 1 AND `parent` != 0  ORDER BY `updated_at` DESC;

-- - - - - - - - - - - - - -
-- - Districts_detail - - -
-- - - - - - - - - - - - - -
SELECT `district`.* FROM `cities` INNER JOIN `district` ON `cities`.`district` = `district`.`id` GROUP BY `cities`.`district`;