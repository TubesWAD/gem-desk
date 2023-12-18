# Gem Desk

## Contributing
Please refer to each project's style and contribution guidelines for submitting patches and additions. In general, we follow the "clone-and-pull" Git workflow.
1. **Clone** the project to your own machine
```
git clone git@github.com:TubesWAD/gem-desk.git
```
2. **Commit** changes to your own branch
```
git add . 
git commit -m"your commit message"
```
3. **Push** your work back up to your branch
```
git push origin your-branch
```
4. Submit a **Merge Request** so that anyone can review your changes

NOTE: Be sure to merge the latest from "upstream" before making a merge request!

## Getting started

### Requirements
- php version >= 8.1

## Usage

### Config

Clone config file `env.example`, put it on the same directory and rename it to `.env`

## Step by Step Contributing
### Make Migrations
Create migration using
```
php artisan make:migrations your_table_name
```
example migration file
```
public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }
    
public function down(): void
    {
        Schema::dropIfExists('users');
    }
```
after that migrate it using
```
php artisan migrate
```

### Make Controller 
Create Controller while create resource and model using
```
php artisan make:controller YourControllerName --resource --model:ModelName
```
if you're running with this command, there will be several function in controller 
1. index
```

```
2. create
```

```
3. store
```

```
4. show
```

```
5. edit
```

```
6. update
```

```
7. destroy
```

```

### Make View
Create view using, if your are make a master data there must be 4 file
1. create
2. edit
3. index
4. show
```
php artisan make:view yourfolder.namefile
```
so we will be implementing the extends and section ways, we have layouts.app for the base view
we should extends from that by using ``` @extends('layouts.app') ``` and then ``` @section('content')``` for where we build our features.

this file should be like this

```
@extends('layouts.app')

@section('content')
~~~~
~~~
~~

@endsection
```

### Running Laravel
running laravel using
```
php artisan serve
```




