# # Card

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Card Name |
**idList** | **string** | The ID of the list the card should be created in |
**desc** | **string** | Card Description | [optional]
**pos** | **string** |  | [optional]
**due** | **\DateTime** | full-date notation as defined by RFC 3339, section 5.6. Default Timezone is UTC | [optional]
**urlSource** | **string** |  | [optional]
**idMembers** | **string[]** | Array of memebr ids as strings | [optional]
**contactId** | **int** | The ID of the Mautic contact (Lead). | [optional]
**keepFromSource** | **string** | If using idCardSource you can specify which properties to copy over. | [optional]
**id** | **string** |  |
**dateLastActivity** | **\DateTime** | full-date notation as defined by RFC 3339, section 5.6. Default Timezone is UTC | [optional]
**labels** | **object[]** |  | [optional]
**url** | **string** | full url to the Trello card | [optional]
**shortUrl** | **string** | short url to the Trello card | [optional]
**idChecklists** | **string[]** | Array of checklist ids as strings | [optional]
**attachments** | **object[]** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
