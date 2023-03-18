### Laravel User Credits Package

This package allows you to easily apply a credit based system to your Laravel Application.

If you aim to develop a website where users need credits to buy products or carry out various tasks, this package simplifies the process for you.

To get started follow these steps: 

*Install the package using composer*

`composer require johnmerrick/laravel-user-credits`
 
Then you will need to publish the migration files

`php artisan vendor:publish --tag=laravel-user-credits-migrations `


Now you must run the migrations....

`php artisan migrate` 

Now go to your User's Model and add the following line at the top:

`use JohnMerrick\UserCredits\Traits\UsesCredits;`


then add the following line inside your class : 

`use UsesCredits;`


Your Model should now look something like this : 

```
<?php
  
  namespace App;
  
  use Illuminate\Notifications\Notifiable;
  use Illuminate\Foundation\Auth\User as Authenticatable;
  use namespace JohnMerrick\UserCredits\Traits\UsesCredits;
  
  class User extends Authenticatable
  {
      use Notifiable, UsesCredits;
  
      /**
       * The attributes that are mass assignable.
       *
       * @var array
       */
      protected $fillable = [
          'name', 'email', 'password',
      ];
  
      /**
       * The attributes that should be hidden for arrays.
       *
       * @var array
       */
      protected $hidden = [
          'password', 'remember_token',
      ];
  }
```


#### Now you are all setup and ready to go!

##### Some examples Below :


*The following snippet will return the user object with the user's credits.*

```
$user = App\User::where('id', '=', 1)->with('credit')->first();

//These are the user's credits....
$credits = $user->credit->amount;

```

*Here is an example of how to update the user's credits.*

```
$user = App\User::where('id', '=', 1)->first();

$user->updateCredits(500);

```


