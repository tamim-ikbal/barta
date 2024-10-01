# Welcome to Barta

### To install Barta on your local machine, you must have docker or required services. 

### Clone the project from GitHub
``` git clone https://github.com/tamim-ikbal/barta.git ```

### Install Composer to have Laravel Sail
``` composer install ```

### Copy .env.example
``` cp .env.example .env```

### Generate Key
``` php artisan key:generate```

### Run the application
``` ./vendor/bin/sail up -d ``` <br>
or make a alias<br>
```alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)'```<br>
now run with<br>
```sail up -d```

**_NOTE:_** when you run the application it will take some to get the docker images, and -d keeps the server alive if you close the terminal.

### Run Migrate
```sail artisan migrate:fresh --seed```

### File Storage Link
```sail artisan storage:link```

### Install Npm Packages
```sail yarn install```

### Run Asset Builder
```sail yarn dev```<br>
```sail yarn build```


