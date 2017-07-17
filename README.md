Serwisant Online PHP SDK
=========

Narzędzia umożliwiające integracje aplikacji [http://serwisant-online.pl](http://serwisant-online.pl) z własna stroną opartą o PHP.

## Sprawdzanie statusu zlecenia

Sprawdzanie statusu zlecenia z użyciem kodu, który klient otrzymuje podczas przyjmowania zlecenia (eg. na wydruku) możliwe jest
 bez dodatkowych kont API w aplikacji serwisant.

```php
include 'vendor/autoload.php';

use Serwisant\SerwisantApi;

$consumer = new SerwisantApi\ConsumerAnonymous();
var_dump($consumer->getOrder('7yttt9'));

```

Dostęp do dowolnego udokumentowanego endpointu metodą GET:

Dostęp autoryzowany jest za pomocą OAuth, wymagane jest abyś otrzymał lub wygenerował samodzielnie Key i Secret.

Dostęp do rozszerzonego API mają klienci z subskrypcją 'all-in-one'

Key i Secret możesz utworzyć na tej stronie: [https://serwisant-online.pl/oauth_credentials](https://serwisant-online.pl/oauth_credentials).

```php
include 'vendor/autoload.php';

use Serwisant\SerwisantApi;

$consumer = new SerwisantApi\ConsumerOauth('<key>', '<secret>');
var_dump($consumer->get('/orders'));
var_dump($consumer->get('/orders/123'));
```

Informacja o adresie klienta dla konkretnej naprawy:

```php
include 'vendor/autoload.php';

use Serwisant\SerwisantApi;

$consumer = new SerwisantApi\ConsumerOauth('<key>', '<secret>');
$order = $consumer->getOrder(123));

var_dump($order->get('customer.main_address.display_name'));
```
