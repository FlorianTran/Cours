/*drop table employe;
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
/*alter table travail add constraint FK_nuempl foreign key(nuempl) references employe(nuempl);*/
/*alter table travail add constraint FK_nuproj foreign key(nuproj) references projet(nuproj);*/
/*
alter table travail drop constraint FK_nuempl;
alter table travail add constraint FK_nuempl foreign key(nuempl) references employe(nuempl) initially deferred;

alter table concerne add constraint FK_nuserv foreign key(nuserv) references service(nuserv);
alter table concerne add constraint FK_nuproj_con foreign key(nuproj) references projet(nuproj);


alter table concerne drop constraint FK_nuproj_con;
alter table concerne add constraint FK_nuproj_con foreign key(nuproj) references projet(nuproj) initially deferred;

alter table travail drop constraint FK_nuproj;
alter table travail add constraint FK_nuproj foreign key(nuproj) references projet(nuproj) initially deferred;


/* REMARQUE:
    Une clÃ© Ã©trangÃ¨re est dirigÃ©e toujours vers une clÃ© primaire
    (nuempl,affect) UNIQUE
    Service(chef,nomserv) FK.ID -> Employe(nuempl,affect)

alter table employe add constraint U_empl UNIQUE(nuempl,affect);

alter table service add constraint FK_chef foreign key(chef,nuserv) references employe(nuempl,affect) initially deferred;

alter table projet add constraint FK_respond  foreign key(resp,nuproj) references travail(nuempl,nuproj) initially deferred;

/* TEST */
/*insert into employe values(20,'toto',35,1,2000);

select * from service;
select * from employe;

insert into service values(6,'marketing',99);
insert into employe values(99,'michel',35,6,2000);
rollback;

insert into service values(7,'marketing',88);
insert into employe values(88,'michel',35,3,2000);
commit;

/*MAJ donnÃ©es
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

/*select * from employe e where e.salaire < (select * from employe t);*/

/*TD 2*/
/*EXO 1*/
/*A*/

/*create or replace TRIGGER modif_salaire after update of salaire on employe for each row BEGIN
if :new.salaire<:old.salaire then
raise_application_error
(-20001,'viol de la règle :un salaire ne peut etre diminué');
end if;
END;

update employe set salaire = 1500 where employe.nuempl = 20;



/*B*/

/*create or replace TRIGGER modif_heure_hebdo after update of hebdo on employe for each row begin
if :new.hebdo>:old.hebdo then raise_application_error
(-20002,'viol de la règle: la durée hebdo dun employé ne peut pas augmenter');
end if;
end;

update employe set hebdo = 40 where employe.nuempl =20;

/*EXO2*/
/*A
create or replace trigger supprimer_employe before 
delete on employe 
begin
delete from travail where nuempl not in (select nuempl from employe);
end;

delete employe where nuempl = 39;

select * from travail where nuempl = 42;
/*B

create or replace trigger supprimer_proj before 
delete on projet 
begin 
delete from concerne where nuproj not in(select nuproj from employe);
delete from Travail where nuproj not in (SELECT nuproj from Travail);
end;

delete projet where nuproj = 103;
/*EXO3*/
/*A

create or replace trigger maj_hebdo after insert or update on travail
declare
E_REC employe%ROWTYPE;
begin
select * INTO E_REC from employe e
where (select sum(duree) from travail t where e.nuempl=t.nuempl)> e.hebdo;
RAISE_APPLICATION_ERROR (-20003,'Il y a un employé ou la somme du temps dépasse les 35h');
EXCEPTION
WHEN NO_DATA_FOUND THEN NULL;
WHEN TOO_MANY_ROWS THEN
RAISE_APPLICATION_ERROR (-20004,'Il y a plusieurs employés ou la somme du temps dépasse les 35h');
END;

select * from employe e
where (select sum(duree) from travail t where e.nuempl=t.nuempl)> hebdo;
update travail set duree = 20 where nuempl = 20 and nuproj = 175;


/*B*/
/*
create or replace trigger maj_resp_proj after insert or update on projet
declare
T1_REC employe%ROWTYPE;
begin
Select * into T1_REC from employe e where (select count(*) from projet p where e.nuempl = p.resp )> 3;
RAISE_APPLICATION_ERROR (-20005, 'Un employé ne peut pas être responsable de plus de 3 projets en même temps');
EXCEPTION
WHEN NO_DATA_FOUND THEN NULL;
WHEN TOO_MANY_ROWS THEN
RAISE_APPLICATION_ERROR (-20007, 'Too many rows');
END;

insert into projet values (2,'test2',57);
update projet set resp = 57 where nuproj = 160;
rollback;
/*C

create or replace trigger maj_concerne after insert or update on concerne
declare
T2_REC service%ROWTYPE;
begin
select * into T2_REC from service s where (select count (*) from concerne c where c.nuserv=s.nuserv)>3;
raise_application_error(-20008, 'Une service ne peut être concerné par plus de 3 projets');
exception
when no_data_found then null;
when too_many_rows then
raise_application_error(-20009,'Il y a plusieurs services qui sont concernés par plus de 3 projets');
end;

insert into concerne values (1,237);

/*D*/

/*############################################################################
A PARTIR DE LA PAS SUR
############################################################################*/
/*
select * from employe e1 where e1.nuempl In (Select chef from service) 
and e1.salaire<(select max(salaire) from employe e2 where e1.affect=e2.affect);



create or replace trigger maj_salaire_employevschef after insert or update on employe
declare
T3_REC employe%ROWTYPE;
begin
select * into T3_REC from employe e1
where e1.nuempl In (Select chef from service) 
and e1.salaire<(select max(e2.salaire) from employe e2 where e1.affect=e2.affect);
raise_application_error(-200010, 'Un employé ne peut pas avoir un plus grand salaire que son chef');
exception
when no_data_found then null;
when too_many_rows then
raise_application_error(-200011,'Il y a des employé qui ont un plus grand saliare que leurs chef');
end;

update employe set salaire = 5000 where nuempl = 30;


CREATE OR REPLACE TRIGGER maj_salaire_chef_resp AFTER UPDATE OR INSERT ON EMPLOYE
declare
ligne_empl EMPLOYE%rowtype;
BEGIN
select * into ligne_empl from EMPLOYE e
where e.NUEMPL in (select CHEF from SERVICE)
and e.SALAIRE < (select max(:NEW.salaire) 
from EMPLOYE e1  where e1.NUEMPL in (select RESP from PROJET));
RAISE_APPLICATION_ERROR(-200012,'Le chef de service doit gagné plus que les responsable de projet');
EXCEPTION
WHEN NO_DATA_FOUND
THEN NULL;
WHEN TOO_MANY_ROWS
THEN RAISE_APPLICATION_ERROR(-20013,'Plusieurs chefs de service gagne moins que les responsable');
end;

update EMPLOYE set SALAIRE = 8000 where NUEMPL=30;



CREATE OR REPLACE TRIGGER maj_salaire_chef_resp AFTER UPDATE OR INSERT ON EMPLOYE
declare
ligne_empl EMPLOYE%rowtype;
BEGIN
select * into ligne_empl from EMPLOYE e
where e.NUEMPL in (select CHEF from SERVICE)
and e.SALAIRE < (select max(e1.salaire) from EMPLOYE e1  
where e1.NUEMPL in 
(select RESP from PROJET) 
or e1.AFFECT = e.AFFECT);
RAISE_APPLICATION_ERROR(-200014,'Viol de la règle : le chef de service doit gagné plus que les responsable de projet ou que les employé de son service');
EXCEPTION
WHEN NO_DATA_FOUND
THEN NULL;
WHEN TOO_MANY_ROWS
THEN
RAISE_APPLICATION_ERROR(-20015,'Plusieurs chefs de service gagne moins que les responsable ou les employé de leur service');
end;

update employe set salaire = 3500 where nuempl = 30;


CREATE OR REPLACE TRIGGER emp_alerte AFTER UPDATE OR INSERT ON EMPLOYE 
for each row when (NEW.SALAIRE > 5000)
BEGIN
INSERT INTO EMPLOYE_ALERTE VALUES (:NEW.NUEMPL,:NEW.NOMEMPL,:NEW.HEBDO,:NEW.AFFECT,:NEW.SALAIRE);
end;
*/


/*================TD3====================*/


/*create or replace package MAJ is 
PROCEDURE CREER_EMPLOYE (LE_NUEMPL IN NUMBER, LE_NOMEMPL IN VARCHAR2, LE_HEBDO IN NUMBER, LE_AFFECT IN NUMBER,LE_SALAIRE IN NUMBER);
END;

--------------------------------------------------------------------------------------------------------------


create or replace package  BODY MAJ is 
PROCEDURE CREER_EMPLOYE (LE_NUEMPL IN NUMBER, LE_NOMEMPL IN VARCHAR2, LE_HEBDO IN NUMBER, LE_AFFECT IN NUMBER,LE_SALAIRE IN NUMBER) is
BEGIN
SET TRANSACTION READ WRITE;
INSERT INTO employe VALUES(LE_NUEMPL, LE_NOMEMPL, LE_HEBDO, LE_AFFECT,LE_SALAIRE);
COMMIT;
EXCEPTION WHEN OTHERS THEN ROLLBACK;
IF SQLCODE=-00001 THEN ROLLBACK;
      RAISE_APPLICATION_ERROR (-20401, 'Un employe avec le meme numero existe deja');
ELSIF SQLCODE=-2291 THEN ROLLBACK;
    RAISE_APPLICATION_ERROR (-20402,'Le service auquel il est affecté n’existe pas');
ELSIF SQLCODE=-02290 THEN ROLLBACK;
    RAISE_APPLICATION_ERROR (-20403,'la durée hebdomadaire d’un employé doit être inférieure ou égale à 35h');
ELSIF SQLCODE=-1438 THEN ROLLBACK;
    RAISE_APPLICATION_ERROR (-20404,'Une valeur (nombre) dépasse le nombre de caractères autorisés');
ELSIF SQLCODE=-12899 THEN ROLLBACK;
    RAISE_APPLICATION_ERROR (-20405,'Une valeur (chaine de caractère) dépasse le nombre de caractères autorisés');
ELSE
    RAISE_APPLICATION_ERROR (-20999,'Erreur inconnue'||SQLcode);
END IF; 
END;
END;
*/

execute MAJ.creer_employe(20,'test',35,3,2000);
execute MAJ.creer_employe(87,'test',35,8,2000);
execute maj.creer_employe(87,'test',42,2,3000);

execute maj.modifier_hebdo(81,21);

/*
Create or replace package lecture is
type cur_empl is REF CURSOR ;
procedure liste_employes( liste out cur_empl) ;
end ; 

Create or replace package BODY lecture is
procedure liste_employes(liste out cur_empl) is
begin
open liste for select * from employe ;
 end ;
end ;*/

variable li REFCURSOR ;
execute lecture.liste_employes(:li);
print :li;

