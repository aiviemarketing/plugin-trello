# Aivie Trello Integration

[![Latest Stable Version](https://img.shields.io/packagist/v/aiviemarketing/mautic-trello.svg)](https://packagist.org/packages/aiviemarketing/mautic-trello)
[![License](https://img.shields.io/packagist/l/aiviemarketing/mautic-trello.svg)](LICENSE)

A Mautic plugin for creating Trello cards from contact records. Use it to hand qualified contacts over to sales, schedule follow-ups, or add marketing tasks to an existing Trello workflow.

## Features

* Create a Trello card from a Mautic contact.
* Select a list from the configured Trello board.
* Set a due date for the card.
* Match a Mautic stage to a Trello list when their names are identical.
* Assign the card to a Trello member by email when the Trello API permits it.

![Create a Trello card from a Mautic contact](docs/enduser/media/trello-plugin-add-card-info-en.png)

## Requirements

* PHP 8.1 or newer.
* Mautic 6 or 7.
* A Trello account with access to the board used by the integration.

## Installation

Install the plugin from the root directory of your Mautic project:

```bash
composer require aiviemarketing/mautic-trello:^7.0
php bin/console mautic:plugins:reload
php bin/console cache:clear
```

The Composer package is currently published under its historical package name, `aiviemarketing/mautic-trello`.

## Configuration

1. Open **Settings > Plugins** in Mautic.
2. Open the **Trello** plugin.
3. Add the Trello API key and token.
4. Enable and save the plugin.
5. Open **Settings > Configuration > Trello** and select the Trello board used by the integration.

Create the API key and token on the [Trello developer page](https://trello.com/app-key).

> [!IMPORTANT]
> Consider using a dedicated Trello account. Mautic users who can access the integration may be able to see the names of every board and list available to the connected Trello account and create cards in them.

## Usage

Open a contact in Mautic and select **Create Trello Card** from the contact actions. Choose the destination list, enter the card details and optionally set a due date.

Detailed instructions are available in [English](docs/enduser/docs.en.md) and [German](docs/enduser/docs.de.md).

## Companion Trello Power-Up

The optional [Aivie Trello Power-Up](https://aivie.ch/mautic-mit-trello-verbinden/) displays selected Mautic contact information inside Trello.

## Contributing

Install the plugin in a Mautic development project and run the test suite from the plugin directory:

```bash
composer test
```

The Trello API client is generated from the [OpenAPI specification](docs/api/i2-trello.oas3.yml). Install the generator dependencies with:

```bash
npm ci
```

See [Openapi/README.md](Openapi/README.md) for the generated client documentation.

Bug reports and feature requests are welcome in [GitHub Issues](https://github.com/aiviemarketing/plugin-trello/issues).

## License

Licensed under the [GNU General Public License v3.0 or later](LICENSE).
