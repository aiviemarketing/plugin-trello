## Mautic Trello Plugin

Das Plugin erstellt Trello Karten aus Mautic Kontakten. Es eignet sich für Verkaufsaufgaben, Follow-ups und die Übergabe von Aufgaben an bestehende Trello Workflows.

## Anforderungen

* PHP 8.1 oder neuer.
* Mautic 6 oder 7.
* Ein Trello Konto mit Zugriff auf das Board der Integration.

## Installation

Die folgenden Befehle im Hauptverzeichnis der Mautic Installation ausführen:

```bash
composer require aiviemarketing/mautic-trello:^7.0
php bin/console mautic:plugins:reload
php bin/console cache:clear
```

## Plugin autorisieren

> [!IMPORTANT]
> Verwende nach Möglichkeit ein separates Trello Konto. Mautic Benutzer mit Zugriff auf die Integration können möglicherweise die Namen aller Boards und Listen sehen, auf die das verbundene Trello Konto Zugriff hat, und darin Karten erstellen.

1. **Einstellungen > Plugins** öffnen und das Trello Plugin auswählen.
   <img src="media/trello-plugin-settings-en.png" alt="Einstellungen des Trello Plugins" width="400"/>
2. Die [Trello Entwicklerseite][trello app key] in einem separaten Fenster öffnen.
   <img src="media/trello-app-key-en.png" alt="Trello API Key und Token" width="400"/>
3. Den API Key in die Plugin Einstellungen kopieren.
4. Auf der Trello Entwicklerseite **Generate a Token** auswählen.
5. Den Autorisierungsprozess bei Trello abschliessen.
6. Das generierte Token in die Plugin Einstellungen kopieren.
7. **Veröffentlicht** auf **Ja** setzen und das Plugin speichern.

## Board konfigurieren

Unter **Einstellungen > Konfiguration > Trello** das Board für die Integration auswählen. Das Plugin verbindet sich derzeit jeweils mit einem Board. Beim Erstellen einer Karte kann jede Liste dieses Boards gewählt werden.

## Trello Karte erstellen

1. **Kontakte** in Mautic öffnen.
2. Den gewünschten Kontakt öffnen.
3. Die Kontaktaktionen aufklappen.
   <img src="media/trello-plugin-add-card.png" alt="Kontaktaktionen in Mautic" width="400"/>
4. **Trello Karte erstellen** auswählen.
5. Die Kartendetails eingeben.
6. Eine Trello Liste auswählen und optional ein Fälligkeitsdatum festlegen.
7. **Speichern** auswählen.
   <img src="media/trello-plugin-add-card-info-en.png" alt="Trello Karte aus einem Mautic Kontakt erstellen" width="400"/>

Das konfigurierte Board kann jederzeit unter **Einstellungen > Konfiguration > Trello** geändert werden.

[trello app key]: <https://trello.com/app-key>
