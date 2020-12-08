ALTER TABLE `memberships`
	ADD COLUMN `stripe_product_id` VARCHAR(50) NULL DEFAULT NULL AFTER `paypal_plan_id`,
	ADD COLUMN `stripe_price_id` VARCHAR(50) NULL DEFAULT NULL AFTER `stripe_product_id`;

    UPDATE `memberships` SET `stripe_product_id`='prod_IVfbJse2NxTf0A' WHERE  `id`=1;
    UPDATE `memberships` SET `stripe_price_id`='price_1HueFxAsgKxZZ0EMYIbHTWxl' WHERE  `id`=1;


    UPDATE `memberships` SET `stripe_product_id`='prod_IVfcnV3NBYvuTH' WHERE  `id`=2;
    UPDATE `memberships` SET `stripe_price_id`='price_1HueH4AsgKxZZ0EMVgc2nXhB' WHERE  `id`=2;

    UPDATE `memberships` SET `stripe_product_id`='prod_IVffMqCXSzVZnk' WHERE  `id`=3;
    UPDATE `memberships` SET `stripe_price_id`='price_1HueK0AsgKxZZ0EM7l8B9bgM' WHERE  `id`=3;

    UPDATE `memberships` SET `stripe_product_id`='prod_IVfgMwd1F4unb8' WHERE  `id`=4;

    UPDATE `memberships` SET `stripe_price_id`='price_1HueKxAsgKxZZ0EMup4VtTg0' WHERE  `id`=4;
    