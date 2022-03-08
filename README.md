# Tecnol-Task
 

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
php artisan storage:link
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
    /products/{id} -> retorna la fitxa del producte i mostra les reviews (si no tens el login, no pots fer una review)
    /api/category/{category} -> api que retorna els productes i les seves reviews associades donat el id d'una categoria
    /user/review/{review} -> api que retorna el nom de l'usuari d'una review donat el id de la review.
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

## Vistes app
**Back products**
![image](https://user-images.githubusercontent.com/100949638/157167518-d3fd141c-98cc-4bcf-81e8-39f173398a33.png)

Back edit products
![image](https://user-images.githubusercontent.com/100949638/157167715-69a3f6df-fc7a-4e0a-9e76-ae3f62d2054a.png)

Back Categories
![image](https://user-images.githubusercontent.com/100949638/157167725-cb98cb7e-63e4-4dd1-8baf-efaa0216c764.png)

Back edit categories
![image](https://user-images.githubusercontent.com/100949638/157167737-827abc50-860a-473d-a536-fa0df5658213.png)


Front list Products
![image](https://user-images.githubusercontent.com/100949638/157167773-f8d20d3e-7b3f-4d84-9359-200aad75ceba.png)

Front products
![image](https://user-images.githubusercontent.com/100949638/157167904-b8eaabdd-2aab-484c-af1b-6e86c96471f4.png)


Form login / register / password reset
![image](https://user-images.githubusercontent.com/100949638/157167933-046e5eb3-d7a4-45f3-94eb-3e8ea84a45f0.png)
![image](https://user-images.githubusercontent.com/100949638/157167950-26cbf434-1356-4128-81f5-eaa6aded94b4.png)
![image](https://user-images.githubusercontent.com/100949638/157167964-aca25133-6f71-4619-9f18-96b4c436f7ec.png)


