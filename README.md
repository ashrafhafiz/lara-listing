<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

### About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects.

Laravel is accessible, powerful, and provides tools required for large, robust applications.

### Store array in database column

#### Use Eloquent's available workaround by using attribute casting. In your migration create the column as `json` like so:

```php
public function up()
{
    Schema::create('pickups', function (Blueprint $table) {
        $table->increment('id');
        $table->boolean('default');
        $table->json('shifts');
        $table->integer('status_id');
        $table->timestamps();
    });
}
```

Then you can setup your `Pickup` model (if you haven't done so already) and use the `$casts` property:

```php
class Pickup extends Model
{
    protected $casts = [
        'shifts' => 'array'
    ];
}
```

---

#### There is another more complicated approach, but it allows to create truly native arrays using the schema builder.

**Example for PostgreSQL.**

1.  Register new `int_array` type which will resolve into `int[]` by extending the existing DB Schema Grammar:

```php
\DB::connection()->setSchemaGrammar(new class extends PostgresGrammar {
    protected function typeInt_array(\Illuminate\Support\Fluent $column)
    {
        return 'int[]';
    }
});

```

You can put this code right inside the migration if you need it just once or into `AppServiceProvider` to make it available in whole project.

2.  Now you can use this type in your migrations:

```php
Schema::table('users', function (Blueprint $table) {
    $table->addColumn('int_array', 'group_ids')->nullable();
});
```

---

Casts only work when you use Eloquent Models to execute the queries. When you use the Query Builder directly, your casts are not executed, so you are trying to bind an array to a MySQL query.

Either manually `json_encode` the value:

```php
DB::table('cart_product')->insert([
    ['specification' => \json_encode($request->specification)]
]);

```

Or use the eloquent model:

```php
CartProduct::create([
    'specification' => $request->specification,
]);
```

---

#### Construct name attribute using first and last names

#### 1. Define a new accessor in your model.

This will define a new attribute in your model, just like `first_name` or `last_name`. When the new attribute is defined, you can just do `$user->name` to get the attribute.

As the [documentation](https://laravel.com/docs/5.6/eloquent-mutators#defining-an-accessor) says, to define an accessor you need to add a method in your model:

```php
public  function  getNameAttribute()
{
	return  ucfirst($this->first_name) .  ' '  .  ucfirst($this->last_name);
}
```

#### 2. Append the attribute to the model

This will make the attribute to be considered just like any other attribute, so whenever a record of the table is called, this attribute will be added to the record.

To accomplish this you'll need to add this new value in the protected `$appends` configuration property of the model, as you can see in the [documentation](https://laravel.com/docs/5.6/eloquent-serialization#appending-values-to-json):

```php
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['name'];
}
```
