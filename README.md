# Api-site-remote


I. Continut arhiva

- api/config.php - contine url pentru api si cheia de autorizare;
- api/ApiClass.php - face legatura intre api(Api-site-remote) si fisierul care se conecteaza la baza de date(Api-db-connect);
- index.html - afiseaza datele, contine formularele pentru inserarea,editarea si stergerea datelor;
- README - fisierul cu explicatiile aferente.



II. Functionalitate

In arhiva (Api-site-remote) se afla Api-ul propiu zis, acesta se conecteaza la arhiva/aplicatia (Api-db-connect), ce contine conectarea cu baza de date.

Pentru a accesa formularele care insereaza, editeaza, sterg datele din baza de date trebuie sa fii autentificat.

Datele se trimit prin post. Se face sincronizare si verificare cu o cheie pentru a nu trimite oricine date.


III. Tehnologii folosite

●     PHP

●     Bootstrap

●     MySQL

●     JSON

IV. Strucutra baza de date


TABLE books(
id int,
name varchar(255),
status varchar(255),
author varchar(255),
year int,
data_add date
);

TABLE users(
id int,
name varchar(255),
password varchar(32)
);

