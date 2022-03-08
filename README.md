# tecnol-task
 

## Descripció
És una aplicació senzilla que permet crear categories, productes i reviews.
També, estan configurades dos apis. 
Una et retorna els productes i les seves reviews associades donat el id d'una categoria i l'altre et retorna el nom de l'usuari d'una review donat el id de la review.

## Dependències
- Composer
- Versió mínima PHP 8.0
- Base de dades

## Instal·lació del projecte

- Descarregar el zip del projecte
- https://github.com/Marc-Cozar-Rins/tecnol-task.git
- Descomprimir el projecte
- Obrir un terminal i fer cd fins arribar a la carpeta on l'has descomprimit
- Executar les comandes
```
composer install
copy .env.example .env
```
- Obrir l'arxiu .env i modificar els camps: **DB_DATABASE** - **DB_USERNAME** - **DB_PASSWORD**
- Executar les comandes
```
php artisan key:generate
php artisan migrate
php artisan db:seed
```

## Autors
Marc Cozar Rins

cozar.rins.marc@gmail.com


## Historial de versions
- 1.0 Versió inicial

## Rutes
**FRONTOFFICE**
```
    /products -> retorna els productes que estan actius
    /login -> Formulari d'inici de sessió
    /register -> Formulari de registre
    /password/reset -> Formulari per restablir la contrasenya
 ```

**BACKOFFICE**
 ```
    /back/products -> Panell de gestió productes (editar - eliminar - afegir)
    /back/categories -> Panell de gestió categories (editar - eliminar - afegir)
    /back/reviews -> Panell de gestió reviews (eliminar i visualitzar)
```
