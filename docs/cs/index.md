# Nette - GeoIP

##### Základní informace
Vytvořil jsem jednoduchou knihovnu, která používá [free API server Geo IP](https://freegeoip.net/)

Jelikož nejsem toto je jeden z mých prvních opravdových extension tak bych byl rád, kdyby jste napsali, jakoukoliv chybu nebo cokoliv co najdete a bylo by fajn vylepšit.

Debug panel je "ukradený" z repository [Kdyby/Facebook](https://github.com/Kdyby/Facebook), jelikož jsem ho dělal poprvé tak jsem se hodně inspiroval a počítám s tím, že ho budu upravovat takže i tak DÍKY!
#### Requirements
* nette 2.4
* guzzle/guzzle
##### Tracy panel
![Tracy panel](http://i.prntscr.com/F6Jek-M1RMu6XlvcaFgw2w.png)
#### Instalace
```php
    composer install relisoft/geoip
```
config.neon
```php
    extensions:
        geoip: Relisoft\Geoip\DI\GeoipExtension
        
```
Konfigurace žádná není.
#### Použití
```php
    class TestPresenter extends BasePresenter
    {
        /**
         * @inject
         * @var Geoip
         */
        public $geoip;
    
        public function actionDefault(){
            $response = $this->geoip->request("relisoft.cz");
            $response2 = $this->geoip->request("88.102.243.246");
        }
    }
```
