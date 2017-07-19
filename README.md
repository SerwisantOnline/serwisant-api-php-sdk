Serwisant Online PHP SDK
=========

Narzędzia umożliwiające integracje aplikacji [https://serwisant-online.pl](https://serwisant-online.pl) z własna stroną opartą o PHP.

Dokumentację API znajdziesz na stronie: [https://github.com/SerwisantOnline/serwisant-api](https://github.com/SerwisantOnline/serwisant-api)

Instalację biblioteki [serwisant/serwisant-api](https://packagist.org/packages/serwisant/serwisant-api) należy przeprowadzić z użyciem [Composera](https://getcomposer.org/):
 
```
composer require serwisant/serwisant-api
```

Przykładowy composer.json

```json
{
  "require": {
    "serwisant/serwisant-api": "2.*"
  }
}
```

## Sprawdzanie stanu naprawy

Sprawdzanie statusu naprawy z użyciem kodu, który klient otrzymuje podczas przyjmowania naprawy (eg. na wydruku) możliwe jest
 bez dodatkowych kont API w aplikacji serwisant.

Zwracane są wyłącznie podstawowe informacje - nie zawierające danych osobowych.

```php
include 'vendor/autoload.php';

use Serwisant\SerwisantApi;

$consumer = new SerwisantApi\ConsumerAnonymous();
$order = $consumer->getOrder('7yttt9');
var_dump($order->get('display_name'));
```

## Rozszerzone API

Dostęp do rozszerzonego API mają klienci z subskrypcją 'all-in-one'

Dostęp autoryzowany jest za pomocą OAuth, wymagane jest abyś otrzymał lub wygenerował samodzielnie Key i Secret.

Key i Secret możesz utworzyć na tej stronie: [https://serwisant-online.pl/oauth_credentials](https://serwisant-online.pl/oauth_credentials).

Rozszerzone API zwraca dane osobowe - wyniki zwrócone przez API powinny być zabezpieczone przed publicznym dostępem.

Dostęp do dowolnego udokumentowanego endpointu metodą GET - zwracana jest surowa tablica asocjacyjna utworzona z danych JSON:

```php
include 'vendor/autoload.php';

use Serwisant\SerwisantApi;

$consumer = new SerwisantApi\ConsumerOauth('<key>', '<secret>');
var_dump($consumer->get('/api/v1/orders/1425'));
var_dump($consumer->get('/api/v1/orders', ['page' => 1, 'filter' => 'open']));
```

Informacja o adresie klienta dla konkretnej naprawy:

```php
include 'vendor/autoload.php';

use Serwisant\SerwisantApi;

$consumer = new SerwisantApi\ConsumerOauth('<key>', '<secret>');
$order = $consumer->getOrder(123));
var_dump($order->get('customer.main_address.display_name'));
```
