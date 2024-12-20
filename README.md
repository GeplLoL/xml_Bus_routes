Bussijaama haldussüsteem
Kirjeldus:
Lihtne veebirakendus, mis kuvab bussiliinide infot (alguspunkt, sihtkoht, väljumisaeg, hind, kestus) tabelis, kasutades XML, XSLT, PHP ja CSS.

Kasutamine:
Kopeeri projekt kausta C:/xampp/htdocs/bussijaam.
Käivita XAMPP ja veendu, et Apache töötab.
Ava brauseris:
Tabeli vaatamiseks:
http://localhost/bussijaam/index.php
JSON-faili genereerimiseks:
http://localhost/bussijaam/generate_json.php
Failid:
routes.xml – Andmed marsruutide kohta.
transform.xsl – Teisendus XML-ist HTML-i.
style.css – Kujundus.
generate_json.php – Teisendab XML-i JSON-iks.
routes.json – Automaatne JSON-fail.
Lisa marsruut:
Ava routes.xml.
Lisa uus <route> sektsioon.
Salvesta ja ava uuesti index.php.
