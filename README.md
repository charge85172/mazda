# Mazda Car Management Applicatie

Een webapplicatie gebouwd met Laravel voor het beheren van auto's. De applicatie implementeert een robuust
autorisatiesysteem met twee gebruikersrollen: een normale gebruiker en een administrator.

## Belangrijkste Features

### Gebruikers

- **Persoonlijk Dashboard:** Gebruikers zien na het inloggen een overzicht van enkel hun eigen auto's.
- **CRUD-operaties:** Gebruikers kunnen hun eigen auto's aanmaken, bekijken, bewerken en verwijderen.
- **Beveiliging:** Gebruikers kunnen op geen enkele manier de gegevens van andere gebruikers inzien of manipuleren.

### Administrators

- **Admin Dashboard:** Een speciaal dashboard met een overzicht van **alle** auto's in het systeem.
- **Volledig Beheer:** Admins kunnen elke auto van elke gebruiker direct bewerken of verwijderen.
- **Gebruikersbeheer:** Een aparte pagina waar admins alle gebruikers kunnen zien en de mogelijkheid hebben om
  gebruikers te verwijderen.

## Gebruikte Technologieën

- **Backend:** PHP 8+ / Laravel 10
- **Frontend:** Blade Templates, HTML, CSS
- **Database:** MySQL (of een andere relationele database die door Laravel wordt ondersteund)
- **Development:** Laravel Sail (optioneel, voor Docker-gebaseerde lokale ontwikkeling)

---

## Installatie en Lokale Setup

Volg deze stappen om het project lokaal op te zetten.

### Vereisten

- PHP >= 8.1
- Composer
- Een database (bijv. MySQL)
- Node.js & NPM (optioneel, voor frontend assets)

### Stappen

1. **Clone het project:**
   ```bash
   git clone <repository-url>
   cd MAZDA
   ```

2. **Installeer PHP dependencies:**
   ```bash
   composer install
   ```

3. **Maak het configuratiebestand aan:**
   Kopieer het `.env.example` bestand naar een nieuw `.env` bestand.
   ```bash
   cp .env.example .env
   ```

4. **Genereer de applicatiesleutel:**
   Deze sleutel is essentieel voor de beveiliging van sessies en andere versleutelde data.
   ```bash
   php artisan key:generate
   ```

5. **Configureer de database:**
   Open het `.env` bestand en vul de juiste databasegegevens in:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=mazda_db
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. **Voer de database migraties uit:**
   Dit maakt de benodigde tabellen (`users`, `cars`, etc.) aan in je database.
   ```bash
   php artisan migrate
   ```

7. **(Optioneel) Seed de database:**
   Om de applicatie met voorbeelddata te vullen (inclusief een admin-account), kun je de seeder uitvoeren.
   ```bash
   php artisan db:seed
   ```
   *Standaard Admin Account:*
    - **E-mail:** `admin@example.com`
    - **Wachtwoord:** `password`

8. **Start de lokale server:**
   ```bash
   php artisan serve
   ```
   De applicatie is nu beschikbaar op `http://127.0.0.1:8000`.

---

## Beveiliging

De applicatie maakt gebruik van de ingebouwde beveiligingsfeatures van Laravel om te voldoen aan de OWASP Top 10
standaarden.

### A01: Broken Access Control

- **Implementatie:** Toegangscontrole wordt strikt afgehandeld door de `CarPolicy`.
- **Werking:** De `before()` methode in de policy geeft admins onbeperkte rechten. Voor normale gebruikers controleren
  de `view`, `update`, en `delete` methodes of de `user_id` van de auto overeenkomt met de ID van de ingelogde
  gebruiker. Pogingen om ongeautoriseerde data te benaderen resulteren in een **403 Forbidden** response.

### A03: Injection

- **Implementatie:** Alle database-interacties worden uitgevoerd via de **Eloquent ORM**.
- **Werking:** Eloquent gebruikt onder water *prepared statements* en *parameter binding*, wat SQL Injection-aanvallen
  effectief voorkomt. Er wordt nergens in de applicatie gebruikgemaakt van onveilige, ruwe SQL-queries.
