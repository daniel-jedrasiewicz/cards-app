## Laravel Cards-app

Laravel Cards-App is a project created based on the Laravel framework, enabling actions within a cards.

### Built With

* [![Vue][Vue.js]][Vue-url]
* [![Laravel][Laravel.com]][Laravel-url]
* [![Tailwind][tailwindcss.com]][tailwind-url]

## Prerequisites

Before starting, you need to install the following tools:

- PHP (recommended version 8.1+)
- Composer
- Node.js
  
## Installation

Clone the project to your local environment:

- https://github.com/daniel-jedrasiewicz/cards-app

Install PHP dependencies using Composer:

- composer update

Install JavaScript dependencies:

- npm install

Configure the environment:
- Copy the .env.example file and rename it to .env. Then, adjust the environment variables.
- Set your database credentials in the .env file:
(
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=
DB_PASSWORD=
)

Generate the application key:

- php artisan key:generate

Run the development server:

 - php artisan serve

Run migration:

 - php artisan migrate --seed
 - npm run dev

### Usage

The application allows actions related to a cards through a simple user interface. In the admin panel, you can:

- Add new card
- Edit existing card
- Show details about card
- Delete card

## Development and Customization

The project is open for development and customization according to your needs. You can add new features anytime.

## Autor

Created by: Daniel Jędrasiewicz

## License

This project is available under the MIT License.

[Vue.js]: https://img.shields.io/badge/Vue.js-35495E?style=for-the-badge&logo=vuedotjs&logoColor=4FC08D
[Vue-url]: https://vuejs.org/
[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com
[tailwindcss.com]: https://img.shields.io/badge/tailwindcss-0F172A?style=for-the-badge&logo=tailwindcss
[tailwind-url]: https://tailwindcss.com
