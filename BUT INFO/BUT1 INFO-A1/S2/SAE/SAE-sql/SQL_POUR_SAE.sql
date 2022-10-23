--ADAPTER LES NOM A VOTRE DEP--

drop table commune_sarthe;
drop table manifestation_sarthe;
--TABLE 1--
/*
Il faut d'abord supprimer les doublons dans le fichier csv
pour cela il faut utiliser le select en desous
si une manif est compter plusieurs fois il faut SUPPRIMER la ligne dans
le fichier excel il peut y en avoir bcp genre c chiant mais trql
apres avoir supprimer tous les doublons(dans excel selectionner la colonne des noms et faite un 
ctrl f avec le nom des manifestation et laisser une seul ligne avec le fameux nom)
vous allez reimporte vos données comme dab
et normalement vous pourrer créer la première table "manifestation_departement"
*/

select  NOM_FETE_OU_MANIFESTATION,commune, longitude,latitude, count (*)
from FETES_MANIFESTATIONS_SARTHE
group by (NOM_FETE_OU_MANIFESTATION,commune,longitude,latitude)
order by 5 desc;
--table manifestation et primary key--
create table manifestation_sarthe
as select nom_fete_ou_manifestation,categorie,adresse1,adresse1suite,adresse2,adresse3,commune,bureau_distributeur,cedex,code_insee,latitude,longitude,point_acces_distance,n_fixe,n_mobile,n_fax,email,url_web,type_url,url_video,public_concerne_offre,widget_tripadvisor,code_embed,periodicite_manifestation,precision_periodicite,label_tourisme_handicap,duree_visite_individuels,visites_libres_individuels_permanence,visites_guidees_individuels_sur_demande,visites_guidees_individuels_permanence,visites_guidees_groupes_sur_demande,visites_guidees_groupes_permanence,visites_guidees_groupes_permanence_2,duree_visite_groupes,visites_pedagogiques_groupes_permanence,langues,langues_audio,horaires_ouvertures,tarifs_annee_proposes,tarif_gratuit,moyens_reservation_directe,centrale_reservation_en_ligne,moyens_reservation_en_ligne,modes_paiement,localisation
from FETES_MANIFESTATIONS_SARTHE;

alter table manifestation_sarthe add constraint PK_manifestations_sarthe primary key(NOM_FETE_OU_MANIFESTATION,latitude,longitude);

/*Si votre table marche et la primary key aussi il faut faire la table
commune, pour ça il ya le meme principe que avant un select qui compte les doublon
il faut supprimer les doublons aussi pour ca vous allez ouvrir les données dela table et vous copier coller dans un 
excel les données et vous faites les ctrl f pour trouver le numero de ligne
apres vous avez le num de ligne vous retourne dans les sql dev et vous
supprimer les lignes (je vous ferais un screen shot
Pour voir si vous avez tout fait il faut que les 2 clefs marches
*/

--Trouver les doublons dans la table commune--
select commune,code_insee,count(*)
from commune_sarthe
group by (commune,code_insee)
order by 3 desc;

--table commune et contraintes--
create table commune_sarthe
as select distinct code_insee,commune,code_postal,departement
from FETES_MANIFESTATIONS_SARTHE;

alter table commune_sarthe add constraint PKcommune_sarthe primary key(commune,code_insee);
alter table manifestation_sarthe add constraints FK_manifestation_sarthe foreign key (commune,code_insee) references commune_sarthe(commune,code_insee);


--grant pour tom après avoir finis les tables--
grant select on manifestation_sarthe to i2d02a;
grant select on commune_sarthe to i2d02a;

--les 2 requetes testez--
--Premiere requete--
create view NOMBRES_FETES_MANIF_SARTHE
as select categorie, count(nom_fete_ou_manifestation)"Nombre de fetes ou manif"
from manifestation_sarthe
group by (categorie)
order by 2 desc;

--Deuxieme requete--
create view DIX_MEILLEURS_VILLES_MANIF_SARTHE
as select commune, count(commune)
from manifestation_sarthe
group by (commune) order by 2 desc,
1 fetch next 10 rows only;


--TABLE 2 FAIRE LA MEME--

select  NOM_OFFRE_TOURISTIQUE, longitude,latitude, count (*)
from TOURISTIQUE_DEGUSTATION_SARTHE
group by (NOM_OFFRE_TOURISTIQUE,longitude,latitude)
order by 4 desc;


--Table Offre Touristique--
create table touristique_sarthe
as select nom_offre_touristique,type_offre,adresse1,adresse1suite,adresse2,adresse3,bureau_distributeur,commune,cedex,code_insee,latitude,longitude,situation_offre,n_mobile,n_fixe,n_fax,email,url_web,url_video,code_embed,type_url,widget_tripadvisor,secteur_activite,labels,label_tourisme_handicap,animal_accepte,information_animal,groupe_accepte,nombre_personnes_max,nombre_personnes_min,langues_acceuil,appellation_vins,degustations_gratuites,salle_equipee,vente_propriete,duree_visite_individuels,duree_visite_groupes,visites_guidees_groupes_permanence,visites_guidees_groupes_sur_demande,visites_libres_groupes_permanence,visites_pedagogiques_groupes_permanence,visites_guidees_individuels_permanence,visites_guidees_individuels_sur_demande,langue_parlee_visites,visites_libres_individuels_permanence,offres_proposees,ouvert_toute_annee,horaires_ouvertures,moyen_reservation_directe,moyen_reservation_en_ligne,centrale_reservation_en_ligne,tarif_gratuit,tarif,modes_paiement,localisation
from TOURISTIQUE_DEGUSTATION_SARTHE;

create table commune_touristique_sarthe
as select distinct commune,code_insee,code_postal,departement
from TOURISTIQUE_DEGUSTATION_SARTHE;

--trouver les doublons dans offres touristiques mayenne--
select  NOM_OFFRE_TOURISTIQUE,commune, longitude,latitude, count (*)
from TOURISTIQUE_DEGUSTATION_SARTHE
group by (NOM_OFFRE_TOURISTIQUE,commune,longitude,latitude)
order by 5 desc;

--trouver les doublons dans commune touristique mayenne--
select commune,code_insee,count(*)
from commune_touristique_sarthe
group by (commune,code_insee)
order by 3 desc;

--clefs pour offre touristique--
alter table touristique_sarthe add constraint PK_touristique_sarthe primary key (nom_offre_touristique,latitude,longitude);
alter table commune_touristique_sarthe add constraint FK_commune_sarthe primary key (commune,code_insee);
alter table touristique_sarthe add constraints FK_touristique_sarthe foreign key (commune,code_insee) references commune_touristique_sarthe(commune,code_insee);

--grant pour tom-- 
grant select on touristique_sarthe to i2d02a;
grant select on commune_touristique_sarthe to i2d02a;

--troisieme requete--
create view NOMBRE_OFFRES_SARTHE
as select TYPE_OFFRE, count(NOM_OFFRE_TOURISTIQUE)"Nombres_d'offres"
from TOURISTIQUE_DEGUSTATION_SARTHE
group by (TYPE_OFFRE) order by 2 desc;

--quatrieme requete--
create view DIX_MEILLEURS_VILLES_DEGUSTATION_SARTHE
as select COMMUNE, count(NOM_OFFRE_TOURISTIQUE)"Nombre de lieux"
from TOURISTIQUE_DEGUSTATION_SARTHE
group by (COMMUNE) order by 2 desc,
1 fetch next 10 rows only;

--grant des views--
grant select on NOMBRES_FETES_MANIF_SARTHE to i2d02a,i2d01a,i2d13a,i2d14a;
grant select  on DIX_MEILLEURS_VILLES_MANIF_SARTHE to i2d02a,i2d01a,i2d13a,i2d14a;
grant select  on NOMBRE_OFFRES_SARTHE to i2d02a,i2d01a,i2d13a,i2d14a;
grant select on DIX_MEILLEURS_VILLES_DEGUSTATION_SARTHE to i2d02a,i2d01a,i2d13a,i2d14a;