# Bussijaama haldussüsteem

**Kirjeldus:**  
Lihtne veebirakendus, mis kuvab bussiliinide infot (alguspunkt, sihtkoht, väljumisaeg, hind, kestus) tabelis, kasutades **XML**, **XSLT**, **PHP** ja **CSS**.

---

## Kasutamine

1. **Kopeeri projekt kausta**:  
   `C:/xampp/htdocs/bussijaam`
2. **Käivita XAMPP** ja veendu, et Apache töötab.
3. **Ava brauseris**:  
   - Tabeli vaatamiseks: [http://localhost/bussijaam/index.php](http://localhost/bussijaam/index.php)  
   - JSON-faili genereerimiseks: [http://localhost/bussijaam/generate_json.php](http://localhost/bussijaam/generate_json.php)

---

## Failid

- **`routes.xml`** – Marsruutide andmed XML-vormingus.  
- **`transform.xsl`** – XML-andmete teisendamine HTML-tabeliks.  
- **`style.css`** – Kujundus fail HTML-lehele ja tabelile.  
- **`generate_json.php`** – Teisendab XML-i JSON-andmeteks.  
- **`routes.json`** – Automaatne JSON-fail (luuakse `generate_json.php` abil).

---

## Kuidas lisada uus marsruut?

1. Ava **`routes.xml`** fail.
2. Lisa uus `<route>` sektsioon järgmisel kujul:
   ```xml
   <route id="2">
       <start>Tartu</start>
       <end>Viljandi</end>
       <departureTime>2024-12-21T12:00</departureTime>
       <price>12.00</price>
       <duration>2t</duration>
   </route>
