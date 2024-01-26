**#### Introduction 🇺🇸
Laravel Sail is a lightweight command-line interface for interacting with Laravel's default Docker environment. It provides an easy way to interact with the Docker environment necessary to run a Laravel application. Below is a guide on how to configure and run Laravel Sail.

#### Requirements
To use Laravel Sail, you must have Docker installed on your machine.

Before you can use Laravel Sail, you need to install the necessary dependencies. Run the following command:

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
```

#### Steps to run Laravel Sail

1. **Running Laravel Sail**
   To launch Laravel Sail, use the command `./vendor/bin/sail up`. You can also run Sail in detached mode (in the background) by adding the `-d` flag to the command: `./vendor/bin/sail up -d`.

2. **Setting up an alias for Sail**
   To make working with Sail easier, you can set up an alias in your shell configuration file (e.g., `~/.zshrc` or `~/.bashrc`) that allows you to execute Sail commands without having to type the full path. Here is an example alias: `alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'`. After setting up this alias, you can execute Sail commands by simply typing `sail`.

3. **Installing Dependencies**
   Laravel Sail allows you to run Composer, npm, and other commands directly within your Docker containers. To install Composer dependencies, use the command `./vendor/bin/sail composer install`. To install npm dependencies, use the command `./vendor/bin/sail npm install`.

4. **Compiling Assets**
   If your Laravel application uses frontend tools like Laravel Mix, you can compile your assets using the command `./vendor/bin/sail npm run dev`.

Now your Laravel Sail environment should be set up and ready to go! Remember, any changes to the `docker-compose.yml` file require the Docker containers to be restarted using the commands `./vendor/bin/sail down` and `./vendor/bin/sail up`.

