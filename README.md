<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
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

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## LAUNDRY CRUD

  ## CONTROLLERS

  User-defined controllers residing at ".\App\Http\Controllers".

  - **CustomersController** : it only has one function that returns all rows from **customers** table.
  - **LaundryTypeController** : it only has one function that returns all rows from **laundry_type** table.
  - **OrdersController** : it is a full fledged CRUD controller interacting with **orders** table.

  ## REQUESTS

  Classes extending from the **Request** class, providing extra functionalities to object sent by HTTP request. It resides at ".\App\Http\Requests".

  - **CreateOrder** : is a class for handling request sent through "/actions/create" route, it provides input validation and custom error message for invalid input.
  - **UpdateOrder** : is a class for handling request sent through "/actions/update" route, it provides input validation and custom error message for invalid input.

  ## MODELS

  Interfaces to communicate with the database. Each model represent a table in the database, and inside each model are rules of what can and can't be asked from the table. It resides at "app\Http\Models"

  - **Customer** : connect with **customers** table, unmodified.
  - **LaundryTypes** : connect with **laundry_types** table, unmodified.
  - **Orders** : connect with **orders** table, it allows some columns to be fillable.

  ## MIGRATIONS

  A place declaring all tables that will be used along with the details of the table's columns. Located at "database\migrations".

  - **create_orders_table** : "id", "customer_id", "laundry_type_id", "date_acc" (when is the order placed), "date_clr" (when the order will be fulfilled), "qty" (quantity), "total".
  - **create_laundry_types_table** : "id", "name", "price".
  - **create_customers_table** : "id", "name".

  ## JAVASCRIPT FUNCTIONS

  - **setTotalValue** : (no parameter) (no return) set the value of "#total" with the value of "#price" multiplied by the value of "#qty".
  - **getLaundryTypes** : (no parameter) (no return) fetch all records from **laundry_types** table to be used dynamic modification of some input elements.
  - **adjustPrice** : (no parameter) (no return) change the value of "#price" when "#types" value is changed in accordance to the price in **laundry_types** table by calling the **setTotalValue** function.

  ## VIEWS

  - **index** : needs data from 
    - **orders** table acquired from **OrdersController**
    - **customers** table acquired from **CustomersController**
    - **laundry_types** table acquired from **LaundryTypesController**
  - **update** : needs data from
    - **orders** table acquired from **OrdersController**
    - **customers** table acquired from **CustomersController**
    - **laundry_types** table acquired from **LaundryTypesController**
  - **delete** : needs data from
    - **orders** table acquired from **OrdersController**
  - **layouts.general** : optionally can display error from "$errors" that might be thrown by "validated()" function inside **OrdersController**

  ## ROUTES

  - **GET /** : call "index()" from **OrdersController**, **CustomersController**, **LaundryTypesController** and use the returned data as a parameter for **index** view.
  - **GET /update** : call "index()" from **OrdersController**, **CustomersController**, **LaundryTypesController** and use the returned data as a parameter for **update** view.
  - **GET /delete** : call "index()" from **OrdersController** and use the returned data as a parameter for **update** view.
  - **POST /actions/create** : calling the "store()" function from **OrdersController**.
  - **POST /actions/update** : calling the "update()" function from **OrdersController**.
  - **DELETE /actions/delete/{order_id}** : calling the "destroy()" function from **OrdersController**.
  - **GET /laundry-types** : returns all records from **laundry_types** table in raw json.