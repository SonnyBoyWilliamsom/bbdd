## Koersen en user input

### Inleiding

In dit document vindt je een beschrijving van de PHP Test die je mag uitvoeren. De
test beschrijft een use case waar een oplossing voor moet komen. Je bent vrij om
zelf invulling te geven aan hoe je dit oplost. Uiteraard zijn er wel voorwaarden
waaraan voldaan moet worden. Deze vindt je verderop in het document.
Allereerst zul je in dit document een beschrijving van de use case kunnen lezen,
waarna de voorwaarden zullen worden vermeld.

### 1. Use Case

Het fictieve bedrijf Upolski wil hun financiële afdeling ontlasten. Op dit moment is die
afdeling veelal handmatig data aan het verzamelen over de koers van meerdere
concurrenten. Men is er achter gekomen dat dit niet handmatig hoeft en dat de
mogelijkheid bestaat om deze data geautomatiseerd op te halen en realtime op hun
scherm up te daten. Elke medewerker wil zijn eigen volgorde van bedrijven kunnen bepalen.

### 2. Opdracht

Maak een PHP applicatie die de koersen van de bedrijven ophaalt uit de
database en deze “real time” update.

Naast het updaten van de koersen zul je rekening moeten houden met de gewenste
volgorde van een medewerker. Elke medewerker moet zijn eigen volgorde kunnen
aangeven. Een medewerker identificeert zich d.m.v. zijn naam.

#### 2.1 Aangeleverd

Je krijgt van ons:
 - Een MySQL database tabel met koersdata
 - Een PHP functie die de koersen verandert

#### 2.2 Voorwaarden

 - Maak gebruik van PHP
 - De koersen moeten geupdatet kunnen worden
	(De resultaten moeten opnieuw ingeladen kunnen worden, via een knop of realtime via Ajax.
 - Meerdere personen moeten met de applicatie kunnen werken
	(Dit mag simpel, bijvoorbeeld een input veld waar iemand zijn naam in kan vullen.
	Dit zou je vervolgens in een sessie moeten kunnen plaatsen. Er hoeft geen login script
	geschreven te worden.)
 - Een persoon moet zijn eigen volgorde kunnen aangeven.
 - De update functie die aangeleverd wordt moet gebruikt worden.
 - Duidelijk moet worden voor de gebruiker of, en hoe de koersen veranderd zijn.
	(Denk hierbij aan verschil of procentuele verandering.)
 - Code moet voorzien zijn van voldoende commentaar.