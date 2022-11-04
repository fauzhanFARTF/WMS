-- CREATE TABLE master_item(
--     no_item VARCHAR(10) PRIMARY KEY,
--     name_item VARCHAR(20) NOT NULL,
--     type VARCHAR(50) NOT NULL,
--     price_buy DOUBLE NOT NULL,
--     price_sell DOUBLE NOT NULL,
--     unit VARCHAR(10) NOT NULL,
--     id_user VARCHAR(10) NOT NULL,
--     timestamp DATETIME NOT NULL
-- );

-- CREATE TABLE master_stock(
--     id_loc VARCHAR(10) NOT NULL,
--     no_item VARCHAR(10) NOT NULL,
--     quantity bigint NOT NULL,
--     quantity_actual bigint NOT NULL,
--     status VARCHAR(10) NOT NULL,
--     timestamp DATETIME NOT NULL
-- );

-- CREATE TABLE master_location(
--     id_loc VARCHAR(10) PRIMARY KEY,
--     name_loc VARCHAR(20) NOT NULL,
--     description TEXT NOT NULL,
--     capacity bigint NOT NULL,
--     id_user VARCHAR(10) NOT NULL,
--     timestamp DATE NOT NULL
-- );

-- CREATE TABLE master_user(
--     id_user VARCHAR(50) PRIMARY KEY,
--     username VARCHAR(10) NOT NULL,
--     password VARCHAR(50) NOT NULL,
--     name VARCHAR(50) NOT NULL,
--     level VARCHAR(10) NOT NULL,
--     id_create VARCHAR(10) NOT NULL,
--     timestamp DATETIME NOT NULL
-- );

-- 'CREATE TABLE item_in_header(
--     id_item_in VARCHAR(5) PRIMARY KEY,
--     no_order VARCHAR(5) NOT NULL,
--     price_buy_total DOUBLE NOT NULL,
--     id_user VARCHAR(5) NOT NULL,
--     timestamp DATETIME NOT NULL
-- );'

-- CREATE TABLE item_in_detail(
--     id_item_in VARCHAR(5) NOT NULL,
--     no_order VARCHAR(5) NOT NULL,
--     no_item VARCHAR(5) NOT NULL,
--     quantity bigint,
--     id_locate VARCHAR(5) NOT NULL
-- );


-- ALTER TABLE master_location ADD CONSTRAINT fk_master_location_id_user FOREIGN KEY ( id_user ) REFERENCES master_user ( id_user ) ON DELETE CASCADE ON UPDATE CASCADE;
-- ALTER TABLE master_item ADD CONSTRAINT fk_master_item_id_user FOREIGN KEY ( id_user ) REFERENCES master_user ( id_user ) ON DELETE CASCADE ON UPDATE CASCADE;
-- ALTER TABLE master_stock ADD CONSTRAINT fk_master_stock_id_loc FOREIGN KEY ( id_loc ) REFERENCES master_location ( id_loc ) ON DELETE CASCADE ON UPDATE CASCADE;

-- ALTER TABLE item_in_detail ADD CONSTRAINT fk_item_in_detail_id_item_in FOREIGN KEY ( id_item_in ) REFERENCES item_in_header ( id_item_in ) ON DELETE CASCADE ON UPDATE CASCADE;

-- ALTER TABLE item_in_header ADD CONSTRAINT fk_item_in_header_id_user FOREIGN KEY ( id_user ) REFERENCES master_user ( id_user ) ON DELETE CASCADE ON UPDATE CASCADE;


-- CREATE TABLE log_price_item(
--     log_id INT PRIMARY KEY,
--     no_item VARCHAR(5),
--     price_buy_old DOUBLE,
--     price_buy_new DOUBLE,
--     price_sell_old DOUBLE,
--     price_sell_new DOUBLE
-- )


-- ALTER TABLE log_price_item ADD CONSTRAINT fk_log_price_item_no_item FOREIGN KEY ( no_item ) REFERENCES  ( no_item ) ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE poheader(
    no_order
    
)


ALTER TABLE item_in_header ADD CONSTRAINT fk_item_in_header_id_user FOREIGN KEY ( id_user ) REFERENCES master_user ( id_user ) ON DELETE CASCADE ON UPDATE CASCADE;
