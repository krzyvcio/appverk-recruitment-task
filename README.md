#### Introduction 🇺🇸
Laravel Sail is a lightweight command-line interface for interacting with Laravel's default Docker environment. It provides an easy way to interact with the Docker environment necessary to run a Laravel application. Below is a guide on how to configure and run Laravel Sail.

#### Requirements
To use Laravel Sail, you must have Docker installed on your machine.

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


#### Wprowadzenie 🇵🇱
Laravel Sail to lekkie narzędzie do zarządzania środowiskiem Docker dla aplikacji Laravel. Umożliwia łatwe uruchamianie i zarządzanie kontenerami Docker, które są potrzebne do uruchomienia aplikacji Laravel. Poniżej znajduje się przewodnik, który pomoże Ci skonfigurować i uruchomić Laravel Sail.

#### Wymagania
Aby korzystać z Laravel Sail, musisz mieć zainstalowany Docker na swoim komputerze.

#### Kroki do uruchomienia Laravel Sail

1. **Uruchomienie Laravel Sail**
   Aby uruchomić Laravel Sail, użyj komendy `./vendor/bin/sail up`. Możesz również uruchomić Sail w trybie odłączonym (w tle), dodając do komendy flagę `-d`: `./vendor/bin/sail up -d`.

2. **Konfiguracja aliasu dla Sail**
   Aby ułatwić sobie pracę z Sail, możesz skonfigurować alias w swoim pliku konfiguracyjnym powłoki (np. `~/.zshrc` lub `~/.bashrc`), który pozwoli Ci na wykonywanie komend Sail bez konieczności wpisywania pełnej ścieżki. Oto przykładowy alias: `alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'`. Po skonfigurowaniu tego aliasu, możesz uruchamiać komendy Sail, po prostu wpisując `sail`.

3. **Instalacja zależności**
   Laravel Sail pozwala na uruchamianie komend Composer, npm i innych narzędzi bezpośrednio w kontenerach Docker. Aby zainstalować zależności Composer, użyj komendy `./vendor/bin/sail composer install`. Aby zainstalować zależności npm, użyj komendy `./vendor/bin/sail npm install`.

4. **Kompilacja zasobów**
   Jeśli Twoja aplikacja Laravel korzysta z narzędzi frontendowych, takich jak Laravel Mix, możesz skompilować swoje zasoby za pomocą komendy `./vendor/bin/sail npm run dev`.

Teraz Twoje środowisko Laravel Sail powinno być skonfigurowane i gotowe do pracy! Pamiętaj, że każda zmiana w pliku `docker-compose.yml` wymaga zrestartowania kontenerów Docker za pomocą komendy `./vendor/bin/sail down` i `./vendor/bin/sail up`.