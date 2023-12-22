<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

![image](https://github.com/juanlti/SpeaksMarter/assets/47389717/5786844a-2097-4077-8b43-e3d4eeedc5b3)

![image](https://github.com/juanlti/SpeaksMarter/assets/47389717/d69b20e4-df24-4a9d-bed8-90b381dd7d7e)



	Practica N1:    Laravel con Vue


Visión general del sistema: 
la empresa Speak Smarter, desea desarrollar un sistema para los diferentes tipos de usuarios, accedan al material de ingles, este material puede ser, videos, pdfs, clases y demás. Cada cliente, puede elegir el plan de estudio
Membresía gratuita (no es necesario tener una suscripción): ver contenido de prueba.
Membresía pagada (parcial): todo el contenido menos los ejercicios interactivos
Membresía pagada (total): todo el contenido.

Ecosistema: Laravel (backEnd), Vue (frontEnd)
Paquetes: jetstream (sesiones para usuarios), Spatie  (permisos y roles) 


Las clases, se componen de un archivo en pdf  (teoría), y otro formato interactivo (propio del sistema), para los ejercicios.


Requerimientos funcionales:

1_ Registro de un nuevo usuario:

A la hora de registrarse en el sitio, cada usuario debe ingresar lo siguientes datos:

nombre
apellido
correo electrónico
clave


2_ Pagar una membresía

A la hora de realizar un pago por parte de un usuario, este deberá elegir que tipo de membresía desea obtener. Debe ingresar los siguientes datos:

selecionar tipo de membresia
 ingresar los datos de tarjeta
cantidad de cuotas

3_ Sistema de roles

Al momento de ingresar los datos de logueo, el sistema determinara que rol cumple en el sistema, y en base a ello, el usuario  obtendrá la configuración pertinente 

correo electrónico
clave

4_ Buscador  de clases

El sistema tiene un buscador de clases con multifiltrado, para que los usuarios realicen la búsqueda de manera especifica.

Usuario debe selecionar el ámbito de la clase a buscar, ejemplo: “Clases de programación”
Usuario selecciona el nivel de las clases, seleccionado: B1,B2, y demas
5_ Registro de usuarios administrativos

Los usuarios administrador, debe ingresar los siguientes datos:

dni
credencial (es un id otorgado por la empresa)
nombre
apellido
correo
clave

6_ Usuarios Administradores creación de clases y actualizaciones

subir contenido
clases interactivas con Adobe captivate
actualizar contenido



Requerimientos no funcionales:

Seguridad a la hora de realizar transacciones de dinero.
 Organización-> Operacionales (toda operación debe ser atómica)

Asegurar la protección y privacidad de los datos del cliente
 Externos->Legales->Protección/Seguridad.

Interfaz facil de usar, para todo tipo de usuarios, con o sin experiencia en el uso de la plataformas web.

Beneficio del sistema
	Los beneficios que se obtienen con el sistema de Speak Smarter, son los siguientes
Eficiencia y autogestión para los interesados en adquirir este servicio.



