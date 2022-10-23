CREATE TABLE IF NOT EXISTS vegetable (
                                    name TEXT PRIMARY KEY,
                                    commentable BOOLEAN NOT NULL DEFAULT FALSE,
                                    comment TEXT NOT NULL DEFAULT '');

INSERT OR REPLACE INTO vegetable (name,commentable,comment) VALUES ("carotte",false,"");
INSERT OR REPLACE INTO vegetable (name,commentable,comment) VALUES ("pomme de terre",true,"");
INSERT OR REPLACE INTO vegetable (name,commentable,comment) VALUES ("chou",true,"");


