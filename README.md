# laravel-boilerplate
A laravel boilerplate. Current laravel version: 5.5

**Features:**
1. User CRUD
2. User roles and permissions
3. Basic user authorization/policy
4. User-related migrations and seeders

**Installation:**
1. Clone the repo: `git clone https://github.com/arnold-unified/laravel-boilerplate.git`
2. Copy ".env.example" and rename it to ".env"
3. Set application key: `php artisan key:generate`
4. Create a database and configure db credentials in `.env` file
5. Clean table: `php artisan db:clean` or `php artisan db:clean --tables="users,profiles,etc"`
6. Migrate tables: `php artisan migrate`
