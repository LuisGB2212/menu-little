En el mercado actual, al menos en la región, no existe una plataforma web en donde en donde el usuario final pueda elegir sus alimentos, solicitarlos al restaurant y pagarlos inmediatamente por medio de transferencias electrónicas. La plataforma web puede funcionar en el mismo restaurante escaneando un código QR dependiendo la mesa donde se encuentre o fuera del mismo solicitando un envió a domicilio y permitiendo pagar al momento de realizar el pedido por medio de transferencia electrónica.
<br>
<br>

Pasos para clonar repositorio:
<br>
<br>
Dentro del directorio wampserver / xampp
<br>
<br>

git clone https://github.com/LuisGB2212/menu-little
<br>
ingresar a la carpeta creada: <strong>cd menu-little</strong>
<br>
descargar los complementos y plugins necesarios <strong>composer install</strong>
<br>
realizar copia del archivo para configuración del sistema: <strong>cp .env.example .env </strong>
<br>
Crear base de datos <strong>"menu_little"</strong> en el localhost/phpmyadmin
<br>
en el archivo .env del proyecto colocar el nombre de la base de datos, usuario y contraseña 
<br>
crear el key para la aplicaión laravel: <strong>php artisan key:generate</strong>
<br>
realializar la migración de la base de datos y datos iniciales para el funcionamiento de la página: <strong>php artisan migrate:fresh --seed</strong>
<br>
por ultimo levantar el servidor con:<strong> php artisan serve</strong>
<br>
Para el uso del sistema se ingresa directo al menu.

<strong>Usuario de admin: admin@admin.com <br> Pass: 123456789</strong>

<p align="center">Qr para mesa 1 <img width="250px" src="https://netsolutionweb.tech/images/qrtable1.PNG"></p>
<p align="center">Qr para mesa 2 <img width="250px" src="https://netsolutionweb.tech/images/qrtable2.PNG"></p>
<p align="center">Qr para mesa 3 <img width="250px" src="https://netsolutionweb.tech/images/qrtable3.PNG"></p>



<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[British Software Development](https://www.britishsoftware.co)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- [UserInsights](https://userinsights.com)
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)
- [Invoice Ninja](https://www.invoiceninja.com)
- [iMi digital](https://www.imi-digital.de/)
- [Earthlink](https://www.earthlink.ro/)
- [Steadfast Collective](https://steadfastcollective.com/)
- [We Are The Robots Inc.](https://watr.mx/)
- [Understand.io](https://www.understand.io/)
- [Abdel Elrafa](https://abdelelrafa.com)
- [Hyper Host](https://hyper.host)
- [Appoly](https://www.appoly.co.uk)
- [OP.GG](https://op.gg)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
