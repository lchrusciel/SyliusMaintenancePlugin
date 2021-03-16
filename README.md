<p align="center">
    <a href="https://sylius.com" target="_blank">
        <img src="https://demo.sylius.com/assets/shop/img/logo.png" />
    </a>
</p>

<h1 align="center">Sylius Maintenance Plugin</h1>


## Features

### When your website is under maintenance, and you want to :

* Do not allow access to your website and display the message "the website is under maintenance" on the frontpage.
* Allow access to your website to some Ips addresses
* Activate and deactivate theses behaviors by commands
* Activate and deactivate behaviors in your Sylius Back-office
* Custom your message in your Sylius Back-office

## Requirements

| | Version |
| :--- | :--- |
| PHP  | 7.3+ |
| Sylius | 1.8+ |


## Installation

1. Add the bundle and dependencies in your composer.json :

    ```shell
    composer require synolia/sylius-maintenance-plugin
    ```

2. Enable the plugin in your `config/bundles.php` file by add

    ```php
    Synolia\SyliusMaintenancePlugin\SynoliaSyliusMaintenancePlugin::class => ['all' => true],
    ```

3. Import required config in your `config/packages/_sylius.yaml` file:

    ```yaml
    imports:
        - { resource: "@SynoliaSyliusMaintenancePlugin/Resources/config/config.yaml" }
    ```

4. Import routing in your `config/routes.yaml` file:

    ```yaml
    synolia_synolia_maintenance:
        resource: "@SynoliaSyliusMaintenancePlugin/Resources/config/admin_routing.yaml"
        prefix: /admin
    ```


5. Clear cache

    ```shell
    bin/console cache:clear
    ```

## Usage

- To turn your website under maintenance, please create a file **maintenance.yaml** at the root of your project.   
- If you want to create a custom template, please create and name your template in : **templates/maintenance.html.twig**.    

## Development

See [How to contribute](CONTRIBUTING.md).

## License

This library is under the [EUPL-1.2 license](LICENSE).

## Credits

Developed by [Synolia](https://synolia.com/).
