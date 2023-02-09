/*
 Navicat Premium Data Transfer

 Source Server         : postgres
 Source Server Type    : PostgreSQL
 Source Server Version : 150001 (150001)
 Source Host           : localhost:5432
 Source Catalog        : dbname
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 150001 (150001)
 File Encoding         : 65001

 Date: 09/02/2023 20:52:39
*/


-- ----------------------------
-- Sequence structure for ingredients_ingredient_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."ingredients_ingredient_id_seq";
CREATE SEQUENCE "public"."ingredients_ingredient_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for measures_measure_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."measures_measure_id_seq";
CREATE SEQUENCE "public"."measures_measure_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for recipe_ingredients_id_recipe_ingredient_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."recipe_ingredients_id_recipe_ingredient_id_seq";
CREATE SEQUENCE "public"."recipe_ingredients_id_recipe_ingredient_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for table_name_recipe_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."table_name_recipe_id_seq";
CREATE SEQUENCE "public"."table_name_recipe_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for tags_tag_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."tags_tag_id_seq";
CREATE SEQUENCE "public"."tags_tag_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for user_recipes_user_recipe_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."user_recipes_user_recipe_id_seq";
CREATE SEQUENCE "public"."user_recipes_user_recipe_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for users_user_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."users_user_id_seq";
CREATE SEQUENCE "public"."users_user_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Table structure for ingredients
-- ----------------------------
DROP TABLE IF EXISTS "public"."ingredients";
CREATE TABLE "public"."ingredients" (
  "ingredient_id" int4 NOT NULL DEFAULT nextval('ingredients_ingredient_id_seq'::regclass),
  "name" varchar COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of ingredients
-- ----------------------------
INSERT INTO "public"."ingredients" VALUES (1, 'banana');
INSERT INTO "public"."ingredients" VALUES (2, 'cukinia');
INSERT INTO "public"."ingredients" VALUES (3, 'Bulion warzywny Knorr');
INSERT INTO "public"."ingredients" VALUES (4, 'ryż biały ugotowany');
INSERT INTO "public"."ingredients" VALUES (5, 'pomidory suszone');
INSERT INTO "public"."ingredients" VALUES (6, 'oliwki czarne');
INSERT INTO "public"."ingredients" VALUES (7, 'cebula (posiekana)');
INSERT INTO "public"."ingredients" VALUES (8, 'czosnek posiekany');
INSERT INTO "public"."ingredients" VALUES (9, 'mleko');
INSERT INTO "public"."ingredients" VALUES (10, 'mąka');
INSERT INTO "public"."ingredients" VALUES (11, 'margaryna');
INSERT INTO "public"."ingredients" VALUES (12, 'ser mozzarella kulka');
INSERT INTO "public"."ingredients" VALUES (13, 'olej z suszonych pomidorów');
INSERT INTO "public"."ingredients" VALUES (14, 'czerwona papryka');
INSERT INTO "public"."ingredients" VALUES (15, 'Bulionetka drobiowa Knorr');
INSERT INTO "public"."ingredients" VALUES (16, 'kasza kuskus');
INSERT INTO "public"."ingredients" VALUES (17, 'pomidory cherry');
INSERT INTO "public"."ingredients" VALUES (18, 'oliwa z oliwek');
INSERT INTO "public"."ingredients" VALUES (19, 'szczypiorek');
INSERT INTO "public"."ingredients" VALUES (20, 'natka pietruszki');
INSERT INTO "public"."ingredients" VALUES (21, 'woda');
INSERT INTO "public"."ingredients" VALUES (30, 'banana');
INSERT INTO "public"."ingredients" VALUES (31, 'banana');
INSERT INTO "public"."ingredients" VALUES (32, 'banana');
INSERT INTO "public"."ingredients" VALUES (33, 'banana');
INSERT INTO "public"."ingredients" VALUES (34, 'banana');
INSERT INTO "public"."ingredients" VALUES (35, 'banana');
INSERT INTO "public"."ingredients" VALUES (36, 'banana');
INSERT INTO "public"."ingredients" VALUES (37, 'banana');

-- ----------------------------
-- Table structure for measures
-- ----------------------------
DROP TABLE IF EXISTS "public"."measures";
CREATE TABLE "public"."measures" (
  "measure_id" int4 NOT NULL DEFAULT nextval('measures_measure_id_seq'::regclass),
  "name" varchar COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of measures
-- ----------------------------
INSERT INTO "public"."measures" VALUES (1, 'cup');
INSERT INTO "public"."measures" VALUES (2, 'cups');
INSERT INTO "public"."measures" VALUES (3, 'ml');
INSERT INTO "public"."measures" VALUES (4, 'l');
INSERT INTO "public"."measures" VALUES (5, 'g');
INSERT INTO "public"."measures" VALUES (6, 'kg');
INSERT INTO "public"."measures" VALUES (7, 'piece');
INSERT INTO "public"."measures" VALUES (8, 'pieces');
INSERT INTO "public"."measures" VALUES (9, 'oz');
INSERT INTO "public"."measures" VALUES (10, 'tablespoon');
INSERT INTO "public"."measures" VALUES (11, 'tablespoons');

-- ----------------------------
-- Table structure for recipe_ingredients
-- ----------------------------
DROP TABLE IF EXISTS "public"."recipe_ingredients";
CREATE TABLE "public"."recipe_ingredients" (
  "recipe_ingredient_id" int4 NOT NULL DEFAULT nextval('recipe_ingredients_id_recipe_ingredient_id_seq'::regclass),
  "ingredient_id" int4 NOT NULL,
  "recipe_id" int4 NOT NULL,
  "quantity" int4 NOT NULL,
  "measure" varchar COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of recipe_ingredients
-- ----------------------------
INSERT INTO "public"."recipe_ingredients" VALUES (1, 2, 1, 2, 'pieces');
INSERT INTO "public"."recipe_ingredients" VALUES (2, 3, 1, 1, 'piece');
INSERT INTO "public"."recipe_ingredients" VALUES (3, 4, 1, 200, 'g');
INSERT INTO "public"."recipe_ingredients" VALUES (4, 5, 1, 5, 'pieces');
INSERT INTO "public"."recipe_ingredients" VALUES (5, 6, 1, 3, 'tablespoons');
INSERT INTO "public"."recipe_ingredients" VALUES (6, 7, 1, 1, 'piece');
INSERT INTO "public"."recipe_ingredients" VALUES (7, 8, 1, 1, 'piece');
INSERT INTO "public"."recipe_ingredients" VALUES (8, 9, 1, 500, 'ml');
INSERT INTO "public"."recipe_ingredients" VALUES (9, 10, 1, 2, 'tablespoons');
INSERT INTO "public"."recipe_ingredients" VALUES (10, 12, 1, 1, 'piece');
INSERT INTO "public"."recipe_ingredients" VALUES (11, 13, 1, 3, 'tablespoons');
INSERT INTO "public"."recipe_ingredients" VALUES (12, 11, 1, 2, 'tablepsoons');
INSERT INTO "public"."recipe_ingredients" VALUES (13, 14, 2, 2, 'pieces');
INSERT INTO "public"."recipe_ingredients" VALUES (14, 15, 2, 1, 'piece');
INSERT INTO "public"."recipe_ingredients" VALUES (15, 16, 2, 100, 'g');
INSERT INTO "public"."recipe_ingredients" VALUES (16, 17, 2, 6, 'pieces');
INSERT INTO "public"."recipe_ingredients" VALUES (17, 18, 2, 4, 'tablespoons');
INSERT INTO "public"."recipe_ingredients" VALUES (18, 19, 2, 1, 'piece');
INSERT INTO "public"."recipe_ingredients" VALUES (19, 20, 2, 1, 'cup');
INSERT INTO "public"."recipe_ingredients" VALUES (42, 1, 26, 2, 'cup');
INSERT INTO "public"."recipe_ingredients" VALUES (43, 1, 27, 2, 'pieces');
INSERT INTO "public"."recipe_ingredients" VALUES (44, 1, 28, 2, 'pieces');
INSERT INTO "public"."recipe_ingredients" VALUES (45, 1, 29, 2, 'pieces');
INSERT INTO "public"."recipe_ingredients" VALUES (46, 1, 30, 2, 'pieces');
INSERT INTO "public"."recipe_ingredients" VALUES (47, 1, 31, 2, 'pieces');
INSERT INTO "public"."recipe_ingredients" VALUES (48, 1, 32, 2, 'pieces');
INSERT INTO "public"."recipe_ingredients" VALUES (49, 1, 34, 2, 'pieces');

-- ----------------------------
-- Table structure for recipes
-- ----------------------------
DROP TABLE IF EXISTS "public"."recipes";
CREATE TABLE "public"."recipes" (
  "recipe_id" int4 NOT NULL DEFAULT nextval('table_name_recipe_id_seq'::regclass),
  "title" varchar COLLATE "pg_catalog"."default" NOT NULL,
  "description" varchar COLLATE "pg_catalog"."default" NOT NULL,
  "time" time(6) NOT NULL,
  "portions" int4 NOT NULL,
  "created_by" int4 NOT NULL,
  "created_at" timestamp(6)
)
;

-- ----------------------------
-- Records of recipes
-- ----------------------------
INSERT INTO "public"."recipes" VALUES (1, 'Cukinia faszerowana ryżem', 'Krok 1
W rondlu rozgrzej margarynę i przesmaż
czosnek oraz cebulę. Dodaj mąkę,
wymieszaj. Wlej mleko, dopraw kostką
rosołową i zagotuj. Zmniejsz ogień i gotuj sos
do momentu, gdy zgęstnieje.
Krok 2
Cukinie umyj, osusz i przekrój wzdłuż na
połówki. Wydrąż środki i ułóż w naczyniu
żaroodpornym. Miąższ pokrój w kostkę.
Krok 3
Na oleju przesmaż pokrojony miąższ z
cukinii, pomidory oraz oliwki. Dodaj ryż i
dopraw do smaku.
Krok 4
Farszem napełnij cukinie, polej beszamelem i
posyp startym serem. Naczynie wstaw do
nagrzanego do 220 st. C piekarnika i zapiekaj
20 minut. Gotowe cukinie podawaj na ciepło z
pomidorowym sosem udekorowane listkami
bazylii.', '00:45:00', 4, 1, '2023-01-09 17:36:36');
INSERT INTO "public"."recipes" VALUES (2, 'Kasza kuskus pieczona w papryce', 'Krok 1
Papryki umyj, przekrój na pół, oczyść z
nasion, połóż na blachę do pieczenia, polej
oliwą z oliwek, oprósz solą i piecz w
piekarniku przez 15 minut w temperaturze
190 °C.
Krok 2
Bulionetkę Knorr rozpuść w szklance
wrzątku, zalej kaszę kuskus i pozostaw pod
przykryciem, aż w kaszę wsiąknie cały
bulion.
Krok 3
Dodaj do kaszy pomidorki cherry przekrojone
na pół, posiekany szczypiorek z natką
pietruszki i dokładnie wymieszaj.
Krok 4
Teraz nadziewaj papryki farszem z
kuskusem. Każdą przykryj i wstaw ponownie
do piekarnika na 5-10 minut. Do farszu
możesz również dodać odrobinę przyprawy
curry.', '00:30:00', 2, 1, '2023-01-12 18:54:19');
INSERT INTO "public"."recipes" VALUES (26, 'eqwdefe', 'rgertgWERQERQ ERQW', '22:22:00', 45, 1, '2023-01-14 13:53:29.173668');
INSERT INTO "public"."recipes" VALUES (27, 'tytuł', 'eweqweqweqweqweqweqweqweqwppp', '00:01:00', 2, 1, '2023-01-14 13:54:38.683281');
INSERT INTO "public"."recipes" VALUES (28, 'tytuł', 'eweqweqweqweqweqweqweqweqwppp', '00:01:00', 2, 1, '2023-01-14 13:56:50.988022');
INSERT INTO "public"."recipes" VALUES (29, 'tytuł', 'eweqweqweqweqweqweqweqweqwppp', '00:01:00', 2, 1, '2023-01-14 15:46:44.716481');
INSERT INTO "public"."recipes" VALUES (30, 'tytuł', 'eweqweqweqweqweqweqweqweqwppp', '00:01:00', 2, 1, '2023-01-14 15:48:12.774277');
INSERT INTO "public"."recipes" VALUES (31, 'przepis', 'eweqwejkgukiuophio', '00:01:00', 2, 1, '2023-01-14 17:56:31.495566');
INSERT INTO "public"."recipes" VALUES (32, 'przepis', 'eweqwejkgukiuophio', '00:01:00', 2, 1, '2023-01-14 17:57:16.293175');
INSERT INTO "public"."recipes" VALUES (34, 'Tytuł', 'qwdeqdjiajoid fhdfouh fuiaegd iwdhauidaib', '00:25:00', 3, 1, '2023-01-26 21:11:16.522882');

-- ----------------------------
-- Table structure for tags
-- ----------------------------
DROP TABLE IF EXISTS "public"."tags";
CREATE TABLE "public"."tags" (
  "tag_id" int4 NOT NULL DEFAULT nextval('tags_tag_id_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of tags
-- ----------------------------
INSERT INTO "public"."tags" VALUES (1, 'quick');

-- ----------------------------
-- Table structure for user_recipes
-- ----------------------------
DROP TABLE IF EXISTS "public"."user_recipes";
CREATE TABLE "public"."user_recipes" (
  "user_recipe_id" int4 NOT NULL DEFAULT nextval('user_recipes_user_recipe_id_seq'::regclass),
  "user_id" int4 NOT NULL,
  "recipe_id" int4 NOT NULL
)
;

-- ----------------------------
-- Records of user_recipes
-- ----------------------------
INSERT INTO "public"."user_recipes" VALUES (1, 1, 1);
INSERT INTO "public"."user_recipes" VALUES (2, 1, 2);
INSERT INTO "public"."user_recipes" VALUES (5, 1, 28);
INSERT INTO "public"."user_recipes" VALUES (6, 1, 29);
INSERT INTO "public"."user_recipes" VALUES (7, 1, 30);
INSERT INTO "public"."user_recipes" VALUES (8, 1, 31);
INSERT INTO "public"."user_recipes" VALUES (9, 1, 32);
INSERT INTO "public"."user_recipes" VALUES (10, 1, 34);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS "public"."users";
CREATE TABLE "public"."users" (
  "user_id" int4 NOT NULL DEFAULT nextval('users_user_id_seq'::regclass),
  "name" varchar COLLATE "pg_catalog"."default" NOT NULL,
  "email" varchar COLLATE "pg_catalog"."default" NOT NULL,
  "password" varchar COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO "public"."users" VALUES (2, 'Adam', 'adam.nowak@wp.pl', '12345');
INSERT INTO "public"."users" VALUES (1, 'Hubert', 'admin@gmail.com', 'c84258e9c39059a89ab77d846ddab909');

-- ----------------------------
-- Function structure for uuid_generate_v1
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."uuid_generate_v1"();
CREATE OR REPLACE FUNCTION "public"."uuid_generate_v1"()
  RETURNS "pg_catalog"."uuid" AS '$libdir/uuid-ossp', 'uuid_generate_v1'
  LANGUAGE c VOLATILE STRICT
  COST 1;

-- ----------------------------
-- Function structure for uuid_generate_v1mc
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."uuid_generate_v1mc"();
CREATE OR REPLACE FUNCTION "public"."uuid_generate_v1mc"()
  RETURNS "pg_catalog"."uuid" AS '$libdir/uuid-ossp', 'uuid_generate_v1mc'
  LANGUAGE c VOLATILE STRICT
  COST 1;

-- ----------------------------
-- Function structure for uuid_generate_v3
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."uuid_generate_v3"("namespace" uuid, "name" text);
CREATE OR REPLACE FUNCTION "public"."uuid_generate_v3"("namespace" uuid, "name" text)
  RETURNS "pg_catalog"."uuid" AS '$libdir/uuid-ossp', 'uuid_generate_v3'
  LANGUAGE c IMMUTABLE STRICT
  COST 1;

-- ----------------------------
-- Function structure for uuid_generate_v4
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."uuid_generate_v4"();
CREATE OR REPLACE FUNCTION "public"."uuid_generate_v4"()
  RETURNS "pg_catalog"."uuid" AS '$libdir/uuid-ossp', 'uuid_generate_v4'
  LANGUAGE c VOLATILE STRICT
  COST 1;

-- ----------------------------
-- Function structure for uuid_generate_v5
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."uuid_generate_v5"("namespace" uuid, "name" text);
CREATE OR REPLACE FUNCTION "public"."uuid_generate_v5"("namespace" uuid, "name" text)
  RETURNS "pg_catalog"."uuid" AS '$libdir/uuid-ossp', 'uuid_generate_v5'
  LANGUAGE c IMMUTABLE STRICT
  COST 1;

-- ----------------------------
-- Function structure for uuid_nil
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."uuid_nil"();
CREATE OR REPLACE FUNCTION "public"."uuid_nil"()
  RETURNS "pg_catalog"."uuid" AS '$libdir/uuid-ossp', 'uuid_nil'
  LANGUAGE c IMMUTABLE STRICT
  COST 1;

-- ----------------------------
-- Function structure for uuid_ns_dns
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."uuid_ns_dns"();
CREATE OR REPLACE FUNCTION "public"."uuid_ns_dns"()
  RETURNS "pg_catalog"."uuid" AS '$libdir/uuid-ossp', 'uuid_ns_dns'
  LANGUAGE c IMMUTABLE STRICT
  COST 1;

-- ----------------------------
-- Function structure for uuid_ns_oid
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."uuid_ns_oid"();
CREATE OR REPLACE FUNCTION "public"."uuid_ns_oid"()
  RETURNS "pg_catalog"."uuid" AS '$libdir/uuid-ossp', 'uuid_ns_oid'
  LANGUAGE c IMMUTABLE STRICT
  COST 1;

-- ----------------------------
-- Function structure for uuid_ns_url
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."uuid_ns_url"();
CREATE OR REPLACE FUNCTION "public"."uuid_ns_url"()
  RETURNS "pg_catalog"."uuid" AS '$libdir/uuid-ossp', 'uuid_ns_url'
  LANGUAGE c IMMUTABLE STRICT
  COST 1;

-- ----------------------------
-- Function structure for uuid_ns_x500
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."uuid_ns_x500"();
CREATE OR REPLACE FUNCTION "public"."uuid_ns_x500"()
  RETURNS "pg_catalog"."uuid" AS '$libdir/uuid-ossp', 'uuid_ns_x500'
  LANGUAGE c IMMUTABLE STRICT
  COST 1;

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."ingredients_ingredient_id_seq"
OWNED BY "public"."ingredients"."ingredient_id";
SELECT setval('"public"."ingredients_ingredient_id_seq"', 37, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."measures_measure_id_seq"
OWNED BY "public"."measures"."measure_id";
SELECT setval('"public"."measures_measure_id_seq"', 12, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."recipe_ingredients_id_recipe_ingredient_id_seq"
OWNED BY "public"."recipe_ingredients"."recipe_ingredient_id";
SELECT setval('"public"."recipe_ingredients_id_recipe_ingredient_id_seq"', 49, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."table_name_recipe_id_seq"
OWNED BY "public"."recipes"."recipe_id";
SELECT setval('"public"."table_name_recipe_id_seq"', 34, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."tags_tag_id_seq"
OWNED BY "public"."tags"."tag_id";
SELECT setval('"public"."tags_tag_id_seq"', 1, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."user_recipes_user_recipe_id_seq"
OWNED BY "public"."user_recipes"."user_recipe_id";
SELECT setval('"public"."user_recipes_user_recipe_id_seq"', 10, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."users_user_id_seq"
OWNED BY "public"."users"."user_id";
SELECT setval('"public"."users_user_id_seq"', 8, true);

-- ----------------------------
-- Uniques structure for table ingredients
-- ----------------------------
ALTER TABLE "public"."ingredients" ADD CONSTRAINT "ingredients_ingredient_id_key" UNIQUE ("ingredient_id");

-- ----------------------------
-- Primary Key structure for table ingredients
-- ----------------------------
ALTER TABLE "public"."ingredients" ADD CONSTRAINT "ingredients_pkey" PRIMARY KEY ("ingredient_id");

-- ----------------------------
-- Primary Key structure for table measures
-- ----------------------------
ALTER TABLE "public"."measures" ADD CONSTRAINT "measures_pkey" PRIMARY KEY ("measure_id");

-- ----------------------------
-- Primary Key structure for table recipe_ingredients
-- ----------------------------
ALTER TABLE "public"."recipe_ingredients" ADD CONSTRAINT "recipe_ingredients_id_pkey" PRIMARY KEY ("recipe_ingredient_id");

-- ----------------------------
-- Primary Key structure for table recipes
-- ----------------------------
ALTER TABLE "public"."recipes" ADD CONSTRAINT "table_name_pkey" PRIMARY KEY ("recipe_id");

-- ----------------------------
-- Uniques structure for table tags
-- ----------------------------
ALTER TABLE "public"."tags" ADD CONSTRAINT "tags_tag_id_key" UNIQUE ("tag_id");

-- ----------------------------
-- Primary Key structure for table tags
-- ----------------------------
ALTER TABLE "public"."tags" ADD CONSTRAINT "tags_pkey" PRIMARY KEY ("tag_id");

-- ----------------------------
-- Primary Key structure for table user_recipes
-- ----------------------------
ALTER TABLE "public"."user_recipes" ADD CONSTRAINT "user_recipes_pkey" PRIMARY KEY ("user_recipe_id");

-- ----------------------------
-- Uniques structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_user_id_key" UNIQUE ("user_id");

-- ----------------------------
-- Primary Key structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_pk" PRIMARY KEY ("user_id");

-- ----------------------------
-- Foreign Keys structure for table recipe_ingredients
-- ----------------------------
ALTER TABLE "public"."recipe_ingredients" ADD CONSTRAINT "recipe_ingredients_id_ingredients_ingredient_id_fk" FOREIGN KEY ("ingredient_id") REFERENCES "public"."ingredients" ("ingredient_id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."recipe_ingredients" ADD CONSTRAINT "recipe_ingredients_id_recipes_recipe_id_fk" FOREIGN KEY ("recipe_id") REFERENCES "public"."recipes" ("recipe_id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table user_recipes
-- ----------------------------
ALTER TABLE "public"."user_recipes" ADD CONSTRAINT "user_recipes_recipes_recipe_id_fk" FOREIGN KEY ("recipe_id") REFERENCES "public"."recipes" ("recipe_id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."user_recipes" ADD CONSTRAINT "user_recipes_users_user_id_fk" FOREIGN KEY ("user_id") REFERENCES "public"."users" ("user_id") ON DELETE NO ACTION ON UPDATE NO ACTION;
