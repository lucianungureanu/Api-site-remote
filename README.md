# Site

I. Continut arhiva

- api/config.php - contine url pentru api si cheia de autorizare;
- api/ApiClass.php - face legatura intre api(Site) si fisierul care se conecteaza la baza de date(Api);
- index.html - afiseaza datele, contine formularele pentru inserarea,editarea si stergerea datelor;
- README - fisierul cu explicatiile aferente.

II. Functionalitate

Conectarea cu baza de date se face prin (config.php).

In fisierul (ApiClass.php) se gaseste clasa cu metodele:

- functia de insert;
- functia de delete;
- functia de update;
- functia de afisare;
- functia de autentificare.

In fisierul (index.php) se afla metoda de autentificare cu cheie si apelarea functiilor.
