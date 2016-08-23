# Api-site-remote


I. Continut arhiva

- api/config.php - contine url pentru api si cheia de autorizare;
- api/ApiClass.php - face legatura intre api(Api-site-remote) si fisierul care se conecteaza la baza de date(Api-db-connect);
- index.html - afiseaza datele, contine formularele pentru inserarea,editarea si stergerea datelor;
- README - fisierul cu explicatiile aferente.

II. Functionalitate

In arhiva (Api-site-remote) se afla Api-ul propiuzis, acesta se conecteaza la arhiva/aplicatia (Api-db-connect), ce contine conectarea cu baza de date.

Pentru a accesa formularele care insereaza, editeaza, sterg datele din baza de date trebuie sa fii autentificat.
Datele se trimit prin post. Se face sincronizare si verificare cu o cheie care ia informatiile de pe server sa nu poate trimite oricine date.

