DROP TABLE IF EXISTS `customer_group`;
CREATE TABLE `customer_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `fixed_discount` tinyint(3) unsigned DEFAULT NULL,
  `variable_discount` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_group_parent_id_IDX` (`parent_id`) USING BTREE,
  CONSTRAINT `customer_group_FK` FOREIGN KEY (`parent_id`) REFERENCES `customer_group` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `group_id` int(11) NOT NULL,
  `fixed_discount` tinyint(3) unsigned DEFAULT NULL,
  `variable_discount` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `customer_FK` FOREIGN KEY (`id`) REFERENCES `customer_group` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


INSERT INTO product (id, `name`, price, category) VALUES (1, 'mouse pad', 5418, 'electronics');
INSERT INTO product (id, `name`, price, category) VALUES (2, 'nail file', 1829,'personal care');
INSERT INTO product (id, `name`, price, category) VALUES (3, 'tooth picks', 2505,'personal care');
INSERT INTO product (id, `name`, price, category) VALUES (4, 'lamp shade', 7501,'household');
INSERT INTO product (id, `name`, price, category) VALUES (5, 'glass', 8896, 'household');
INSERT INTO product (id, `name`, price, category) VALUES (6, 'mirror', 1112, 'household');
INSERT INTO product (id, `name`, price, category) VALUES (7, 'face wash', 2874, 'personal care');
INSERT INTO product (id, `name`, price, category) VALUES (8, 'clothes', 1999,'clothing');
INSERT INTO product (id, `name`, price, category) VALUES (9, 'pen', 1595, 'office');
INSERT INTO product (id, `name`, price, category) VALUES (10, 'drill press', 9289, 'tools');
INSERT INTO product (id, `name`, price, category) VALUES (11, 'chapter book', 7589, 'office');
INSERT INTO product (id, `name`, price, category) VALUES (12, 'sandal', 3573,'shoes');
INSERT INTO product (id, `name`, price, category) VALUES (13, 'rubber duck', 2533,'accessoires');
INSERT INTO product (id, `name`, price, category) VALUES (14, 'thermostat', 6623, 'household');
INSERT INTO product (id, `name`, price, category) VALUES (15, 'controller', 3722, 'electronics');
INSERT INTO product (id, `name`, price, category) VALUES (16, 'charger', 313, 'electronics');
INSERT INTO product (id, `name`, price, category) VALUES (17, 'watch', 8360, 'accessoires');
INSERT INTO product (id, `name`, price, category) VALUES (18, 'button', 9777, 'accessoires');
INSERT INTO product (id, `name`, price, category) VALUES (19, 'cookie jar', 4632, 'grocery');
INSERT INTO product (id, `name`, price, category) VALUES (20, 'nail clippers', 2931, 'personal care');
INSERT INTO product (id, `name`, price, category) VALUES (21, 'headphones', 9738, 'electronics');
INSERT INTO product (id, `name`, price, category) VALUES (22, 'chocolate', 1581, 'grocery');
INSERT INTO product (id, `name`, price, category) VALUES (23, 'thermometer', 5954, 'personal care');
INSERT INTO product (id, `name`, price, category) VALUES (24, 'grid paper', 8859, 'office');
INSERT INTO product (id, `name`, price, category) VALUES (25, 'candy wrapper', 366, 'grocery');
INSERT INTO product (id, `name`, price, category) VALUES (26, 'purse', 540, 'clothing');
INSERT INTO product (id, `name`, price, category) VALUES (27, 'sketch pad', 148,'electronics');
INSERT INTO product (id, `name`, price, category) VALUES (28, 'soda can', 5905, 'grocery');
INSERT INTO product (id, `name`, price, category) VALUES (29, 'doll', 2187, 'accessoires');
INSERT INTO product (id, `name`, price, category) VALUES (30, 'socks', 1412, 'clothing');
INSERT INTO product (id, `name`, price, category) VALUES (31, 'clock', 4633, 'household');
INSERT INTO product (id, `name`, price, category) VALUES (32, 'photo album', 6012, 'household');
INSERT INTO product (id, `name`, price, category) VALUES (33, 'glow stick', 4220, 'accessoires');
INSERT INTO product (id, `name`, price, category) VALUES (34, 'water bottle', 938, 'grocery');
INSERT INTO product (id, `name`, price, category) VALUES (35, 'slipper', 1404, 'shoes');
INSERT INTO product (id, `name`, price, category) VALUES (36, 'lamp', 7415, 'lighting');
INSERT INTO product (id, `name`, price, category) VALUES (37, 'lip gloss', 2791,'personal care');
INSERT INTO product (id, `name`, price, category) VALUES (38, 'paint brush', 7439, 'DIY');
INSERT INTO product (id, `name`, price, category) VALUES (39, 'eraser', 1773, 'office');
INSERT INTO product (id, `name`, price, category) VALUES (40, 'speakers', 2185, 'electronics');
INSERT INTO product (id, `name`, price, category) VALUES (41, 'washing machine', 1196, 'household');
INSERT INTO product (id, `name`, price, category) VALUES (42, 'keys', 3399, 'tools');
INSERT INTO product (id, `name`, price, category) VALUES (43, 'magnet', 8398, 'office');
INSERT INTO product (id, `name`, price, category) VALUES (44, 'tissue box', 265, 'personal care');
INSERT INTO product (id, `name`, price, category) VALUES (45, 'rug', 174, 'household');
INSERT INTO product (id, `name`, price, category) VALUES (46, 'hair brush', 6782, 'personal care');
INSERT INTO product (id, `name`, price, category) VALUES (47, 'blouse', 9363, 'clothing');
INSERT INTO product (id, `name`, price, category) VALUES (48, 'truck', 6429, 'transport');
INSERT INTO product (id, `name`, price, category) VALUES (49, 'beef', 9959, 'grocery');
INSERT INTO product (id, `name`, price, category) VALUES (50, 'outlet', 7764,'sale');
INSERT INTO product (id, `name`, price, category) VALUES (51, 'house', 5378,'rental');
INSERT INTO product (id, `name`, price, category) VALUES (52, 'blanket', 7243,'household');
INSERT INTO product (id, `name`, price, category) VALUES (53, 'thread', 3661,'DIY' );
INSERT INTO product (id, `name`, price, category) VALUES (54, 'knife', 2830, 'household');
INSERT INTO product (id, `name`, price, category) VALUES (55, 'rubber band', 6507, 'office');
INSERT INTO product (id, `name`, price, category) VALUES (56, 'lotion', 9168, 'personal care');
INSERT INTO product (id, `name`, price, category) VALUES (57, 'greeting card', 2416,'DIY');
INSERT INTO product (id, `name`, price, category) VALUES (58, 'bookmark', 838, 'DIY');
INSERT INTO product (id, `name`, price, category) VALUES (59, 'helmet', 6306, 'transport');
INSERT INTO product (id, `name`, price, category) VALUES (60, 'flag', 1952, 'DIY');
INSERT INTO product (id, `name`, price, category) VALUES (61, 'towel', 1844, 'personal care');
INSERT INTO product (id, `name`, price, category) VALUES (62, 'wagon', 2997, 'transport');
INSERT INTO product (id, `name`, price, category) VALUES (63, 'cat', 6365, 'pets');
INSERT INTO product (id, `name`, price, category) VALUES (64, 'clay pot', 788, 'DIY');
INSERT INTO product (id, `name`, price, category) VALUES (65, 'seat belt', 4211, 'transport');
INSERT INTO product (id, `name`, price, category) VALUES (66, 'boom box', 9661, 'electronics');
INSERT INTO product (id, `name`, price, category) VALUES (67, 'pool stick', 1187, 'games');
INSERT INTO product (id, `name`, price, category) VALUES (68, 'sun glasses', 5121, 'accessoires');
INSERT INTO product (id, `name`, price, category) VALUES (69, 'stop sign', 5685, 'transport');
INSERT INTO product (id, `name`, price, category) VALUES (70, 'hair tie', 4459, 'accessoires');
INSERT INTO product (id, `name`, price, category) VALUES (71, 'shampoo', 5128, 'personal care');
INSERT INTO product (id, `name`, price, category) VALUES (72, 'chalk', 8555, 'DIY');
INSERT INTO product (id, `name`, price, category) VALUES (73, 'computer', 3305, 'electronics');
INSERT INTO product (id, `name`, price, category) VALUES (74, 'couch', 3629, 'household');
INSERT INTO product (id, `name`, price, category) VALUES (75, 'toilet', 3329,'household');
INSERT INTO product (id, `name`, price, category) VALUES (76, 'picture frame', 2721, 'DIY');
INSERT INTO product (id, `name`, price, category) VALUES (77, 'video games', 3289, 'games');
INSERT INTO product (id, `name`, price, category) VALUES (78, 'fake flowers', 8601, 'DIY');
INSERT INTO product (id, `name`, price, category) VALUES (79, 'street lights', 9204, 'lighting');
INSERT INTO product (id, `name`, price, category) VALUES (80, 'balloon', 8676, 'DIY');
INSERT INTO product (id, `name`, price, category) VALUES (81, 'car', 1997, 'transport');
INSERT INTO product (id, `name`, price, category) VALUES (82, 'candle', 9293, 'household');
INSERT INTO product (id, `name`, price, category) VALUES (83, 'cinder block', 8265, 'building material');
INSERT INTO product (id, `name`, price, category) VALUES (84, 'table', 8641, 'household');
INSERT INTO product (id, `name`, price, category) VALUES (85, 'mp3 player', 4823, 'electronics');
INSERT INTO product (id, `name`, price, category) VALUES (86, 'soy sauce packet', 3696, 'grocery');
INSERT INTO product (id, `name`, price, category) VALUES (87, 'pants', 9035, 'clothing');
INSERT INTO product (id, `name`, price, category) VALUES (88, 'tree', 8811, 'garden');
INSERT INTO product (id, `name`, price, category) VALUES (89, 'lace', 2336, 'DIY');
INSERT INTO product (id, `name`, price, category) VALUES (90, 'spoon', 3025, 'household');
INSERT INTO product (id, `name`, price, category) VALUES (91, 'apple', 8941, 'grocery');
INSERT INTO product (id, `name`, price, category) VALUES (92, 'buckel', 365, 'clothing');
INSERT INTO product (id, `name`, price, category) VALUES (93, 'zipper', 2489, 'DIY');
INSERT INTO product (id, `name`, price, category) VALUES (94, 'glasses', 7454, 'household');
INSERT INTO product (id, `name`, price, category) VALUES (95, 'playing card', 8934,'games');
INSERT INTO product (id, `name`, price, category) VALUES (96, 'book', 496, 'office');
INSERT INTO product (id, `name`, price, category) VALUES (97, 'air freshener', 1422, 'grocery');
INSERT INTO product (id, `name`, price, category) VALUES (98, 'drawer', 5119, 'office');
INSERT INTO product (id, `name`, price, category) VALUES (99, 'soap', 5723, 'grocery');


INSERT INTO customer_group (id, name, fixed_discount, variable_discount) VALUES (1, 'Becode', 12, null);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount) VALUES (4, 'Telenet', null, 58);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount) VALUES (21, 'Belgacom', 3, null);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount) VALUES (26, 'IBM', null, 54);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount) VALUES (31, 'Coca-cola', null, 30);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount) VALUES (39, 'NMBS', 9, null);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount) VALUES (54, 'De lijn', null, 13);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (2, 'marketing', null, 13, 1);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (3, 'quality assurance - internal', null, 9, 2);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (5, 'communication', null, 13, 4);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (6, 'communication - internal', 6, null, 5);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (7, 'sales - internal', null, 3, 5);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (8, 'development - internal', null, 46, 5);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (9, 'marketing', 19, null, 4);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (10, 'marketing - internal', 12, null, 9);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (11, 'sales - internal', 21, null, 9);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (12, 'it department - internal', null, 45, 9);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (13, 'hr', null, 10, 4);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (14, 'hr - internal', 2, null, 13);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (15, 'sales', 7, null, 4);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (16, 'marketing - internal', 18, null, 15);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (17, 'customer support', null, 5, 4);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (18, 'communication - internal', 3, null, 17);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (19, 'marketing - internal', 1, null, 17);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (20, 'customer support - internal', null, 55, 17);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (22, 'marketing', 15, null, 21);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (23, 'marketing - internal', null, 39, 22);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (24, 'sales', 9, null, 21);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (25, 'quality assurance - internal', null, 9, 24);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (27, 'hr', null, 59, 26);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (28, 'hr - internal', 10, null, 27);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (29, 'development - internal', 23, null, 27);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (30, 'customer support - internal', null, 5, 27);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (32, 'communication', null, 28, 31);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (33, 'marketing - internal', 12, null, 32);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (34, 'hr - internal', null, 18, 32);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (35, 'quality assurance', 12, null, 31);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (36, 'hr - internal', null, 31, 35);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (37, 'it department - internal', null, 9, 35);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (38, 'customer support - internal', null, 7, 35);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (40, 'hr', 16, null, 39);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (41, 'communication - internal', 8, null, 40);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (42, 'development - internal', null, 58, 40);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (43, 'sales', null, 31, 39);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (44, 'customer support - internal', 19, null, 43);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (45, 'it department', null, 59, 39);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (46, 'quality assurance - internal', 15, null, 45);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (47, 'customer support - internal', null, 27, 45);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (48, 'development', null, 32, 39);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (49, 'marketing - internal', 8, null, 48);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (50, 'customer support - internal', 25, null, 48);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (51, 'customer support', null, 7, 39);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (52, 'marketing - internal', null, 13, 51);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (53, 'it department - internal', 8, null, 51);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (55, 'communication', null, 35, 54);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (56, 'communication - internal', 4, null, 55);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (57, 'marketing - internal', 23, null, 55);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (58, 'sales', 22, null, 54);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (59, 'communication - internal', 24, null, 58);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (60, 'sales - internal', null, 38, 58);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (61, 'customer support - internal', null, 44, 58);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (62, 'development', 25, null, 54);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (63, 'marketing - internal', 17, null, 62);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (64, 'quality assurance - internal', null, 38, 62);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (65, 'customer support', 12, null, 54);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (66, 'communication - internal', 7, null, 65);
INSERT INTO customer_group (id, name, fixed_discount, variable_discount, parent_id) VALUES (67, 'quality assurance - internal', null, 56, 65);


INSERT INTO customer (id, firstname, lastname, fixed_discount, variable_discount, group_id) VALUES (1, 'Alline', 'Baillargeon', null, 21, 2);
INSERT INTO customer (id, firstname, lastname, fixed_discount, variable_discount, group_id) VALUES (2, 'Buddy', 'Sharrock', null, 4, 3);
INSERT INTO customer (id, firstname, lastname, fixed_discount, variable_discount, group_id) VALUES (3, 'Anitra', 'Genna', 10, null, 5);
INSERT INTO customer (id, firstname, lastname, fixed_discount, variable_discount, group_id) VALUES (4, 'Ivelisse', 'Cowles', 2, null, 6);
INSERT INTO customer (id, firstname, lastname, fixed_discount, variable_discount, group_id) VALUES (5, 'Adeline', 'Bohl', 9, null, 7);
INSERT INTO customer (id, firstname, lastname, fixed_discount, variable_discount, group_id) VALUES (6, 'Lurline', 'Boll', 9, null, 8);
INSERT INTO customer (id, firstname, lastname, fixed_discount, variable_discount, group_id) VALUES (7, 'Oscar', 'Martindale', 5, null, 9);
INSERT INTO customer (id, firstname, lastname, fixed_discount, variable_discount, group_id) VALUES (8, 'Brittny', 'Raisor', 5, null, 10);
INSERT INTO customer (id, firstname, lastname, fixed_discount, variable_discount, group_id) VALUES (9, 'Charleen', 'Delpriore', null, 49, 11);
INSERT INTO customer (id, firstname, lastname, fixed_discount, variable_discount, group_id) VALUES (10, 'Loree', 'Roquemore', null, 43, 12);
INSERT INTO customer (id, firstname, lastname, fixed_discount, variable_discount, group_id) VALUES (11, 'Winfred', 'Gwaltney', 9, null, 13);
INSERT INTO customer (id, firstname, lastname, fixed_discount, variable_discount, group_id) VALUES (12, 'Darren', 'Hurt', 4, null, 14);
INSERT INTO customer (id, firstname, lastname, fixed_discount, variable_discount, group_id) VALUES (13, 'Jackie', 'Wink', null, 39, 15);
INSERT INTO customer (id, firstname, lastname, fixed_discount, variable_discount, group_id) VALUES (14, 'Shakia', 'Sassman', 2, null, 16);
INSERT INTO customer (id, firstname, lastname, fixed_discount, variable_discount, group_id) VALUES (15, 'Hae', 'Releford', 2, null, 17);
INSERT INTO customer (id, firstname, lastname, fixed_discount, variable_discount, group_id) VALUES (16, 'Isaias', 'Kaminsky', 6, null, 18);
INSERT INTO customer (id, firstname, lastname, fixed_discount, variable_discount, group_id) VALUES (17, 'Peg', 'Kendig', 1, null, 19);
INSERT INTO customer (id, firstname, lastname, fixed_discount, variable_discount, group_id) VALUES (18, 'Sonja', 'Monti', 2, null, 20);
INSERT INTO customer (id, firstname, lastname, fixed_discount, variable_discount, group_id) VALUES (19, 'Felisa', 'Epstein', 7, null, 22);
INSERT INTO customer (id, firstname, lastname, fixed_discount, variable_discount, group_id) VALUES (20, 'Vince', 'Waxman', 7, null, 23);
INSERT INTO customer (id, firstname, lastname, fixed_discount, variable_discount, group_id) VALUES (21, 'Francoise', 'Gaiter', 2, null, 24);
INSERT INTO customer (id, firstname, lastname, fixed_discount, variable_discount, group_id) VALUES (22, 'Bruna', 'Levering', 3, null, 25);
INSERT INTO customer (id, firstname, lastname, fixed_discount, variable_discount, group_id) VALUES (23, 'Bobbie', 'Aparicio', null, 8, 27);
INSERT INTO customer (id, firstname, lastname, fixed_discount, variable_discount, group_id) VALUES (24, 'Shantae', 'Engberg', null, 27, 28);
INSERT INTO customer (id, firstname, lastname, fixed_discount, variable_discount, group_id) VALUES (25, 'Dorethea', 'Mackowiak', 8, null, 29);
INSERT INTO customer (id, firstname, lastname, fixed_discount, variable_discount, group_id) VALUES (26, 'Dorthea', 'Siggers', null, 3, 30);
INSERT INTO customer (id, firstname, lastname, fixed_discount, variable_discount, group_id) VALUES (27, 'Reiko', 'Mickle', null, 40, 32);
INSERT INTO customer (id, firstname, lastname, fixed_discount, variable_discount, group_id) VALUES (28, 'Cory', 'Holz', 5, null, 33);
INSERT INTO customer (id, firstname, lastname, fixed_discount, variable_discount, group_id) VALUES (29, 'Floyd', 'Marx', 9, null, 34);
INSERT INTO customer (id, firstname, lastname, fixed_discount, variable_discount, group_id) VALUES (30, 'Leonila', 'Becerril', 1, null, 35);
