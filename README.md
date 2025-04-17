
# Monitoraggio Siti Web

Questo progetto consente di monitorare una lista di domini da un file Google Sheet pubblico, eseguendo il check su `nf-check.html` di ciascun dominio.

## File inclusi

- `index.html` – Frontend con bottone per lanciare il check.
- `check-sites.php` – Backend PHP che legge dal foglio Google Sheet e testa i domini.
- `assets/style.css` – Stile base per la pagina.

## Come usarlo

1. Carica `index.html` su GitHub Pages.
2. Ospita `check-sites.php` su un server PHP (es. `https://paissan.com/check-sites.php`).
3. Apri la pagina GitHub e clicca su "EFFETTUA TEST".

## Esempio Google Sheet

Assicurati che il tuo Google Sheet sia pubblico e pubblicato come CSV.

---
