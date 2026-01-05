# Mijn Project Logboek

Hier probeer ik bij te houden wat ik allemaal aan het doen ben.
Het is mijn eerste keer met Laravel, dus het is een beetje een ontdekkingsreis.
Deze changelog heb ik zelf bijgehouden en met gemini overzichtelijk gemaakt;
de inhoud is dus van mij, de opmaak is door AI

## Versie 1.0 - 1 november 2025

### Klaar!

- **Gebruikersbeheer:** Een pagina gemaakt waar de admin alle gebruikers kan zien en weghalen. Was best lastig met de
  routes, maar het werkt!
- **Beveiliging afgemaakt:** Ik heb iets geleerd over "Policies". Een `CarPolicy` gemaakt die checkt of een gebruiker
  wel de eigenaar is. De admin krijgt via een `before` functie overal toegang. Voelt een stuk veiliger zo.
- **Knoppen op Admin Dashboard:** De "Bewerken" en "Verwijderen" knoppen werken nu ook op het admin dashboard voor alle
  auto's.

## Versie 0.3 - 29 oktober 2025

### Nieuwe dingen

- **Admin rol gemaakt:** Een `is_admin` vinkje toegevoegd aan de `users` tabel. Als die aan staat, ben je een admin.
  Simpel, maar effectief.
- **Admin Dashboard:** Een eerste versie van een dashboard voor de admin gemaakt. Hier kan de admin nu alle auto's zien.
- **Eigen Dashboard:** Het normale dashboard laat nu alleen de auto's van de ingelogde gebruiker zien.
- **Menu aangepast:** De link naar het admin dashboard is nu alleen zichtbaar als je ook echt een admin bent.

## Versie 0.2 - 27 oktober 2025

### Toegevoegd

- **Auto's beheren:** Ik kan nu auto's toevoegen, bekijken, bewerken en verwijderen. Het "CRUD" principe, geloof ik.
- **Database relatie:** De `users` en `cars` tabellen aan elkaar gekoppeld. Elke auto heeft nu een `user_id`.
- **Controller en Routes:** Een `CarController` gemaakt die alles voor de auto's regelt. De routes in `web.php`
  verwijzen hier nu naar.
- **Views voor auto's:** De formulieren en pagina's gemaakt om de auto's te kunnen beheren.

## Versie 0.1 - 25 oktober 2025

### Het begin

- **Project gestart:** Een nieuw Laravel project aangemaakt. Spannend!
- **Inloggen en registreren:** De standaard Laravel authenticatie geïnstalleerd. Dat ging gelukkig best makkelijk.
- **Database opgezet:** De "migrations" gemaakt voor de `users` en `cars` tabellen. Zo kan ik de database makkelijk
  opbouwen.
