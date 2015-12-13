# Shipping

Para mais informações sobre este metodo veja a documentação da API em https://fastshipping.ciawn.com.br/api-webservice-correios

```
<?php
use FastShipping\Lib\Shipping;

$products = [
    [
        "weight" => 0.34,
        "height" => 0.100,
        "length" => 10,
        "width" => 11.5,
        "unit_price" => 11.25,
        "quantity" => 2,
        "sku" => "MLBAFFJJ24342",
        "id" => "34343lkjdlksjfaskldf43bf"
    ]
];

$shipping = new Shipping(
	$destinationPostalCode,
	$destinationCountry,
	$destinationCity,
	$originPostalCode,
	$originCountry,
	$originState,
	$originCity,
	$products
);

$response = $shipping->getPricesShipping();
?>
```