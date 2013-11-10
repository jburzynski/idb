BEGIN;

CREATE TABLE user_type
(
  id INT8 PRIMARY KEY,
  name VARCHAR(32) NOT NULL,
  UNIQUE (name)
);
ALTER TABLE user_type OWNER TO storeuser;
CREATE SEQUENCE user_type_seq START WITH 1 INCREMENT BY 1 NO MAXVALUE NO MINVALUE CACHE 1;
ALTER TABLE user_type_seq OWNER TO storeuser;

CREATE INDEX user_type_name_idx ON user_type USING btree (name);

CREATE TABLE "user" (
  id INT8 PRIMARY KEY,
  sid VARCHAR(32) NOT NULL,
  "state" VARCHAR(16) NOT NULL,
  login VARCHAR(32) NOT NULL,
  first_name VARCHAR(32) NOT NULL,
  last_name VARCHAR(32) NOT NULL,
  email VARCHAR(32),  
  user_type_id INT8 NOT NULL,
  CONSTRAINT user_type_fk FOREIGN KEY (user_type_id)
  REFERENCES user_type (id) ON UPDATE NO ACTION ON DELETE NO ACTION,
  UNIQUE (sid),
  UNIQUE (login),  
  UNIQUE (email)
);
ALTER TABLE "user" OWNER TO storeuser;
CREATE SEQUENCE user_seq START WITH 1 INCREMENT BY 1 NO MAXVALUE NO MINVALUE CACHE 1;
ALTER TABLE user_seq OWNER TO storeuser;

CREATE INDEX user_sid_idx ON "user" USING btree (sid);
CREATE INDEX user_state_idx ON "user" USING btree ("state");
CREATE INDEX user_login_idx ON "user" USING btree (login);
CREATE INDEX user_user_type_idx ON "user" USING btree (user_type_id);

CREATE TABLE address
(
  id INT8 PRIMARY KEY,
  sid VARCHAR(32) NOT NULL,
  "state" VARCHAR(16) NOT NULL,
  street VARCHAR(32) NOT NULL,
  street_number INT NOT NULL,
  city VARCHAR(32) NOT NULL,
  postal_code VARCHAR(8) NOT NULL,
  user_id INT8 NOT NULL,
  CONSTRAINT user_fk FOREIGN KEY (user_id)
  REFERENCES "user" (id) ON UPDATE NO ACTION ON DELETE NO ACTION,
  UNIQUE (sid)
);
ALTER TABLE address OWNER TO storeuser;
CREATE SEQUENCE address_seq START WITH 1 INCREMENT BY 1 NO MAXVALUE NO MINVALUE CACHE 1;
ALTER TABLE address_seq OWNER TO storeuser;

CREATE INDEX address_sid_idx ON address USING btree (sid);
CREATE INDEX address_state_idx ON address USING btree ("state");
CREATE INDEX address_street_idx ON address USING btree (street);
CREATE INDEX address_city_idx ON address USING btree (city);
CREATE INDEX address_user_idx ON address USING btree (user_id);

CREATE TABLE category
(
  id INT8 PRIMARY KEY,
  sid VARCHAR(32) NOT NULL,
  "state" VARCHAR(16) NOT NULL,
  name VARCHAR(32) NOT NULL,
  parent_id INT8,
  CONSTRAINT parent_fk FOREIGN KEY (parent_id)
  REFERENCES category (id) ON UPDATE NO ACTION ON DELETE NO ACTION,
  UNIQUE (sid),
  UNIQUE (name)
);
ALTER TABLE category OWNER TO storeuser;
CREATE SEQUENCE category_seq START WITH 1 INCREMENT BY 1 NO MAXVALUE NO MINVALUE CACHE 1;
ALTER TABLE category_seq OWNER TO storeuser;

CREATE INDEX category_sid_idx ON category USING btree (sid);
CREATE INDEX category_state_idx ON category USING btree ("state");
CREATE INDEX category_name_idx ON category USING btree (name);
CREATE INDEX category_parent_idx ON category USING btree (parent_id);



COMMIT;