drop table Test2;
drop table test1;

create table Test1 (
    e number(5) PRIMARY KEY,
    c number check(c > 0)
);
create table Test2 (
    a char(3) PRIMARY KEY,
    b number(5) NOT NULL,
    c varchar2(10) unique,
    CONSTRAINT FK_test1 foreign key (b) references Test1(e)
);
commit;