#### Wprowadzenie
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