# Bussijaama haldussüsteem

**Kirjeldus:**  
Lihtne veebirakendus, mis kuvab bussiliinide infot (alguspunkt, sihtkoht, väljumisaeg, hind, kestus) tabelis, kasutades **XML**, **XSLT**, **PHP** ja **CSS**.

---

## Kasutamine

1. **Kopeeri projekt kausta**:  
   `C:/xampp/htdocs/bus_routes`
2. **Käivita XAMPP** ja veendu, et Apache töötab.
3. **Ava brauseris**:  
   - Tabeli vaatamiseks: [http://localhost/bus_routes/index.php](http://localhost/bus_routes/index.php)  
   - JSON-faili genereerimiseks: [http://localhost/bus_routes/generate_json.php](http://localhost/bus_routes/generate_json.php)

---

## Failid

- **`routes.xml`** – Marsruutide andmed XML-vormingus.  
- **`transform.xsl`** – Teisendab XML-andmed HTML-tabeliks.  
- **`style.css`** – Lisab kujunduse veebilehele ja tabelile.  
- **`index.php`** – Töötleb XML-i ja XSLT-d tabeli kuvamiseks, lisades filtreerimise, otsingu ja sorteerimise funktsioonid.  
- **`generate_json.php`** – Teisendab XML-i JSON-vormingusse.  
- **`routes.json`** – Automaatne JSON-fail, mis salvestab marsruudid.

---

## Funktsioonid

1. **Marsruutide filtreerimine**:  
   Kasutaja saab filtreerida marsruute alguspunkti, sihtkoha ja maksimaalse hinna järgi.
2. **Otsing**:  
   Kasutaja saab otsida marsruute, sisestades märksõna (nt "Tallinn" või "2t").
3. **Sorteerimine**:  
   Kasutaja saab sorteerida marsruute hinna, väljumisaja või kestuse järgi kasvavalt või kahanevalt.

---

## Kuidas lisada uus marsruut?

1. Ava **`routes.xml`** fail.
2. Lisa uus marsruut, järgides olemasolevat struktuuri.  
3. Salvesta muudatused.  
4. Ava tabeli leht ([http://localhost/bus_routes/index.php](http://localhost/bus_routes/index.php)), et näha lisatud marsruuti.

---

