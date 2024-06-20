* php artisan storage:link
* php artisan vendor:publish --tag=laravel-pagination

app/Http/Controllers/LoginController.php   |  63 +++++++++++
 app/Http/Controllers/ProductController.php | 113 ++++++++++++++++++--
 app/Http/Controllers/UploadController.php  |   4 +-
 app/Http/Middleware/Authenticate.php       |  19 +++-
 app/Http/Requests/RegisterRequest.php      |   4 +-
 app/Models/users.php                       |  23 +++++
 config/auth.php                            |   2 +-
 resources/views/login/login.blade.php      |  73 +++++++++++++
 resources/views/product/admin.blade.php    | 161 +++++++++++++++++++----------
 resources/views/product/index.blade.php    |   3 +
 resources/views/upload/index.blade.php     |   5 +-
 routes/web.php                             |  21 ++--
