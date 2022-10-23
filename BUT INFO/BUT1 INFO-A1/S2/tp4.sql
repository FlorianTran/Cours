drop table communeVE cascade constraints;
drop table distributionVE cascade constraints;
drop table operateurVE cascade constraints;

create table communeLA as select * from basetd.commune where nomdep = 'Loire-Atlantique';
alter table communeLA add constraint pk_co primary key(code_insee);

create table operateurLA as select * from basetd.operateur where (generation ='5G' or generation ='4G');
alter table operateurLA add constraint pk_op primary key(numfo);

create table distributionLA as select * from basetd.distribution where code_insee in 
    (select code_insee from communeLA) and numfo in(select numfo from operateurLA);


alter table distributionLA add constraint pk_di primary key(id);
alter table distributionLA add constraint fk_di1 foreign key(numfo) references operateurLA;
alter table distributionLA add constraint fk_di2 foreign key(code_insee) references communeLA;


insert into i1d02a.distributionVE (ID,numfo) values ('345871','5');

grant select on communeLA to i1d02a;
grant select on operateurLA to i1d02a;
grant select on distributionLA to i1d02a;
commit;