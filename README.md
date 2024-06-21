* php artisan storage:link
* php artisan vendor:publish --tag=laravel-pagination

	修改：      public/images/style.css
#	修改：      resources/views/home/index.blade.php
#	修改：      resources/views/product/admin.blade.php

ALTER TABLE `zhubao_products`
ADD COLUMN `remark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL;
ALTER TABLE `zhubao_products`
ADD COLUMN `cate_id` int(11)   DEFAULT 0;

ALTER TABLE `zhubao_cate`
ADD COLUMN `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE `zhubao_cate`
ADD COLUMN `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP;
