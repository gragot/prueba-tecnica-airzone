# Prueba técnica airzone

IMPORTANTE: La descripción de la prueba técnica en el apartado
3 "Genera las siguients relaciones" presenta algunos puntos que entiendo no son correctos y la prueba se realiza aplicando ciertos cambios:

* a. Se indica "Cada Comentario pertenece a una Categoría" entiendo que el texto correcto sería "Cada Post pertenece a una Categoría"
* d. ii. Se indica "ii.	En User ‘comments’" debería de ser "ii.	En User ‘posts’"

Por otro las relaciones descritas no coinciden con la base de datos aportada:

a. Se dice que un post pertenece a una categoría pero en la base de datos la relación es n:n (cada post puede pertenecer a una o varias categorías) \
b. Se da a entender que un comentario solo puede pertenecer a un post pero la relación es n:n (cada comentario puede pertenecer a uno o varios post)

# Ficha técnica

* PHP: 7.4.1
* Laravel: 8.61.0
* MariaDB: 10.4.12
