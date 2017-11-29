# Övningar för Lektion 8: Laravel Controllers
Nu när ni importerat en massa data från olika endpoints så skulle man kunna tro att det var slut men det är det inte.
Det finns en sista datakälla kvar.
## Övning 1
Den sista datakällan: https://www.milletech.se/invoicing/export/products
Eller? Ta dig en titt men var uppmärksam på att den tar ganska lång tid att hämta hem.
Kanske det är dags att mellanlagra?
## Övning 2
Gör ett konsollkommando för importen precis som du gjorde tidigare.
## Övning 3
Skriv lämpliga migrationer för datan som du skall importera.
## Övning 4
Gör nya modeller för de nya tabellerna.
## Övning 5
Försök lista ut vilka relationer dina modeller skall ha och sätt upp dem i kod.
## Övning 6
Nu när du förhoppningsvis vet vad datan är för något så är det dags att importera den.
Skriv själva importkoden i ditt konsollkommando.
## Övning 7
Nu när du äntligen importerat en massa data och gjort modeller för datan så är det dags att ge modellerna controllers.
Gör en controller för varje model och gör dem till resource controllers med lämpligt Artisan-kommando.
## Övning 8
Fyll ut alla REST-endpoints med fungerande kod. Sätt även upp resource routes i routes/web.php.
Följ instruktionerna som står i själva controller-filen.
## Övning 9
Varje controller skall alltså innehålla basic CRUD. Lägg inte något fokus på design just nu.
Använd Postman för att testa update och delete om du vill.



# Övningar för Lektion 6: Laravel igen
Nya vidder öppnar sig framför oss!
Nu är det dags att börja bygga på en applikation på riktigt. Målet är att bygga grunderna i en faktureringsapplikation.
Vi kommer såklart göra det steg för steg och eftersom detta är en kurs om 3:e parts system så använder vi även fortsättningsvis extern data.
Använd samma databas som du lagrat kunderna i tidigare i ditt Laravelprojekt.
Bygg helt enkelt vidare på projektet som du påbörjade i lektion 5.
## Övning 1
Nya vidder och nya url:er. Vi har upptäckt en ny datakälla här: https://www.milletech.se/invoicing/export/
Vad verkar den innehålla? Titta på datan och försök klura ut vad detta kan vara för något.
## Övning 2
Gör ett konsollkommando för importen precis som du gjorde för kunderna.
## Övning 3
Skriv lämpliga migrationer för datan som du skall importera.
## Övning 4
Gör nya modeller för de nya tabellerna.
## Övning 5
Försök lista ut vilka relationer dina modeller skall ha och sätt upp dem i kod.
## Övning 6
Nu när du förhoppningsvis vet vad datan är för något så är det dags att importera den.
Skriv själva importkoden i ditt konsollkommando.
Du skall bara importera dem som har status="processing".