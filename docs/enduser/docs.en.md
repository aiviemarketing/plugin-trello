---
title: Trello
media_order: ''
body_classes: ''
order_by: ''
order_manual: ''
taxonomy:
    category:
        - Docs
---

## Mautic Trello plugin

The plugin creates Trello cards from Mautic contact records. It can be used for sales follow-ups, task handovers, and workflows that are managed in Trello.

## Requirements

* PHP 8.1 or newer.
* Mautic 6 or 7.
* A Trello account with access to the board used by the integration.

## Installation

Run these commands from the root directory of your Mautic project:

```bash
composer require aiviemarketing/mautic-trello:^7.0
php bin/console mautic:plugins:reload
php bin/console cache:clear
```

## Authorize the plugin

> [!IMPORTANT]
> Consider using a dedicated Trello account. Mautic users who can access the integration may be able to see the names of every board and list available to the connected Trello account and create cards in them.

1. Open **Settings > Plugins** and select the Trello plugin.
   <img src="media/trello-plugin-settings-en.png" alt="Trello plugin settings" width="400"/>
2. Open the [Trello developer page][trello app key] in a separate window.
   <img src="media/trello-app-key-en.png" alt="Trello API key and token" width="400"/>
3. Copy the API key into the plugin settings.
4. Select **Generate a Token** on the Trello developer page.
5. Complete the Trello authorization process.
6. Copy the generated token into the plugin settings.
7. Set **Published** to **Yes** and save the plugin.

## Configure the board

Open **Settings > Configuration > Trello** and select the Trello board used by the integration. The plugin currently connects to one board at a time. You can select any list on that board when creating a card.

## Create a Trello card

1. Open **Contacts** in Mautic.
2. Open the contact you want to add to Trello.
3. Open the contact actions.
   <img src="media/trello-plugin-add-card.png" alt="Contact actions in Mautic" width="400"/>
4. Select **Create Trello Card**.
5. Enter the card details.
6. Select a Trello list and optionally set a due date.
7. Select **Save**.
   <img src="media/trello-plugin-add-card-info-en.png" alt="Create a Trello card from a Mautic contact" width="400"/>

The configured board can be changed at any time under **Settings > Configuration > Trello**.

[trello app key]: <https://trello.com/app-key>
