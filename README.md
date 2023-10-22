# M07-login
PRÀCTICA 5 - LOGIN AMB PHP I MYSQL

Un fitxer html pel login. 
Serà un formulari amb el mail i el password. 
Ha de tenir un checkbox “Remember me”

![Imagen login](https://github.com/Karenl9/M07-login/blob/marcosoliz_P5/5.png)

El formulari haurà de fer servir el mètode POST.
La pàgina tindrà un enllaç per poder crear un usuari (pàgina de la pràctica anterior)
Totes les pàgines de la pràctica anterior hauran de tenir un enllaç per anar a login.html

![Imagen login](https://github.com/Karenl9/M07-login/blob/marcosoliz_P5/3.png)

Un fitxer php per validar l’usuari i contrasenya a les bases de dades. 
Consultarà la informació introduïda en la pàgina de login per comprovar si l’usuari i el password coincideixen amb un registre de les BBDD:

![Imagen consulta estudiant](https://github.com/Karenl9/M07-login/blob/marcosoliz_P5/4.png)

El tractament serà:
Si la consulta retorna un resultat:
Si el rol és estudiant; mostrarà per pantalla: el nom, cognom, email

![Imagen consulta estudiant](https://github.com/Karenl9/M07-login/blob/marcosoliz_P5/7.png)

Si el rol és professor, mostrarà el nom i cognom del professor i mostrarà la informació de tots els usuaris de les BBDD.

![Imagen consulta estudiant](https://github.com/Karenl9/M07-login/blob/marcosoliz_P5/8.png)

En el cas de que no sigui correcte:
Tornarà a la pàgina de login i apareixerà un error de “Login incorrecte”.

![Imagen consulta estudiant](https://github.com/Karenl9/M07-login/blob/marcosoliz_P5/6.png)

Haureu de crear i fer servir una funció per fer la consulta de tots els usuaris quan el rol és professor.

![Imagen consulta estudiant](https://github.com/Karenl9/M07-login/blob/marcosoliz_P5/10.png)
