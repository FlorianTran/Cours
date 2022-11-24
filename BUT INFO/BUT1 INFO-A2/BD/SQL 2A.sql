drop table employe;
drop table SERVICE;
drop table projet;
drop table travail;
drop table concerne;

create table EMPLOYE as select * from basetd.employe;
create table SERVICE as select * from basetd.service;
create table projet as select * from basetd.projet;
create table travail as select * from basetd.travail;
create table concerne as select * from basetd.concerne;

alter table employe add constraint PK_employe primary key(nuempl);
alter table SERVICE add constraint PK_service primary key(nuserv);
alter table projet add constraint PK_projet primary key(nuproj);
alter table travail add constraint PK_travail primary key(nuempl,nuproj);
alter table concerne add constraint PK_concerne primary key(nuserv,nuproj);

alter table employe add constraint FK_affect foreign key(affect) references service(nuserv);
alter table projet add constraint FK_resp foreign key(resp) references employe(nuempl);
alter table travail add constraint FK_nuempl foreign key(nuempl) references employe(nuempl);
alter table travail add constraint FK_nuproj foreign key(nuproj) references projet(nuproj);
alter table concerne add constraint FK_nuserv foreign key(nuserv) references service(nuserv);
alter table concerne add constraint FK_nuproj_con foreign key(nuproj) references projet(nuproj);

/* REMARQUE:
    Une clé étrangère est dirigée toujours vers une clé primaire
    (nuempl,affect) UNIQUE
    Service(chef,nomserv) FK.ID -> Employe(nuempl,affect)
*/
alter table employe add constraint U_empl UNIQUE(nuempl,affect);

alter table service add constraint FK_chef foreign key(chef,nuserv) references employe(nuempl,affect) initially deferred;

alter table projet add constraint FK_respond  foreign key(resp,nuproj) references travail(nuempl,nuproj) initially deferred;

/* TEST */
insert into employe values(20,'toto',35,1,2000);

select * from service;
select * from employe;

insert into service values(6,'marketing',99);
insert into employe values(99,'michel',35,6,2000);
rollback;

insert into service values(7,'marketing',88);
insert into employe values(88,'michel',35,3,2000);
commit;

/*MAJ données*/
select * from projet;
select * from travail;

update employe
set employe.salaire = 2500
where employe.salaire < 2500 and (employe.nuempl in (select resp from projet));

update employe
set employe.salaire = 3500
where employe.nuempl in (select chef from service);

select * from employe e where hebdo < (select sum(duree) from travail t where e.nuempl = t.nuempl);

select * from employe e where (select count(*) from projet p where p.resp = e.nuempl) > 3;

/*select * from employe e where e.salaire < (select * from employe t);




