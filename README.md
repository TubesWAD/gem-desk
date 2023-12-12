# Gem Desk

## Contributing
Please refer to each project's style and contribution guidelines for submitting patches and additions. In general, we follow the "clone-and-pull" Git workflow.
1. **Clone** the project to your own machine
2. **Commit** changes to your own branch
3. **Push** your work back up to your branch
4. Submit a **Merge Request** so that anyone can review your changes

NOTE: Be sure to merge the latest from "upstream" before making a merge request!

## Getting started

### Requirements
- php version >= 8.1

## Usage

### Config

Clone config file `env.example`, put it on the same directory and rename it to `.env`


### Running Laravel
running laravel using
```
php artisan serve
```

### Make Migration
make migration using
```
php artisan make:migration table_name
```

### Running Migration
make migration using
```
php artisan migrate
```

### Make Model
make model using
```
php artisan make:model ModelName
```

### Make Model w/ Migration
running laravel using
```
php artisan make:model ModelName --migration
```

### Make Controller
make controller using
```
php artisan make:controller ControllerName 
```




