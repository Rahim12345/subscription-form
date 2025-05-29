<p align="center"><a href="https://rs-code.az" target="_blank"><img src="https://rs-code.az/img/rs-code.png" width="400" alt="RS-CODE"></a></p>
# rs-code/subscription-form

Sadə və yüngül abunəlik forması paketi Laravel üçün.

---

## Təsvir

`rs-code/subscription-form` Laravel 12 və PHP 8.2 üçün hazırlanmış abunəlik forması paketidir.  
Paket, abunəliklərin idarəsi üçün model, controller, migration, view və dil fayllarını təmin edir.

---

## Tələblər

- PHP >= 8.2
- Laravel 12.x

---

## Quraşdırma

Composer vasitəsilə paketi əlavə edin:

```bash
composer require rs-code/subscription-form
```
---

## Paket fayllarının yayımlanması
Aşağıdakı artisan komandası ilə paket fayllarını layihənizə yayımlayın:

```
php artisan subscription:install
```

---

## Yayımlanacaq fayllar:

- Migration: `database/migrations/0001_01_01_000000_create_subscriptions_table.php`

- View: `resources/views/vendor/subscription-form/form.blade.php`

- Controller: `app/Http/Controllers/RSCODE/SubscriptionController.php`

- Model: `app/Models/Subscription.php`

- Dil faylı: `langs/az/rs.php`

## Migration icrası
Yayımlanan migration faylını tətbiq edin:

```
php artisan migrate
```

## Route əlavə etmə
`routes/web.php` faylınıza aşağıdakı sətri əlavə edin (əgər yayımlanmamışsa):

```
use App\Http\Controllers\RSCODE\SubscriptionController;
use Illuminate\Support\Facades\Route;

Route::resource('/subscribe', SubscriptionController::class);
```
