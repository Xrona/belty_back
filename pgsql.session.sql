INSERT INTO products (
    id,
    name,
    price,
    article,
    category_id,
    material_id,
    country_id,
    status,
    created_at,
    updated_at
  )
VALUES (
    'id:bigint',
    'name:character varying',
    'price:character varying',
    'article:character varying',
    category_id:integer,
    material_id:integer,
    country_id:integer,
    status:integer,
    'created_at:timestamp without time zone',
    'updated_at:timestamp without time zone'
  );