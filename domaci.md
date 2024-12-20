Dodana je funkcionalnost za dohvaćanje trenutne vremenske prognoze za grad koji korisnik unese putem terminala. Koristi se WeatherAPI za preuzimanje podataka o temperaturi i vremenskim uslovima.

### Šta je urađeno:
Poziv za API:

Napravljen je HTTP zahtjev prema WeatherAPI-u koristeći ime grada koji korisnik unese.
API odgovara sa trenutnom temperaturom i vremenskim uslovima.
Prevođenje vremenskih uslova:

### Vremenski uslovi su prevedeni na bosanski jezik za lakše razumijevanje:
- "Heavy snow" → "snijeg"
- "Clear" → "čisto"
- "Patchy rain nearby" → "prolazna kiša"
- "Overcast" → "oblačno"

### Prikaz rezultata:


### Korisniku se prikazuje:
- Naziv grada.
- Trenutna temperatura u stepenima Celzijusa.
- Opis vremenskih uslova na bosanskom jeziku.

### Unos kroz terminal:
Omogućeno je korisniku da unese ime grada direktno u terminal i odmah dobije rezultat.
Kako izgleda rezultat:
Ako unesete grad "Sarajevo", prikazat će se nešto ovako:

Trenutna temperatura za Sarajevo je 12 °C, vani je oblačno
