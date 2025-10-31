<?php

declare(strict_types=1);

namespace MauticPlugin\MauticTrelloBundle\Tests\Mock;

use MauticPlugin\MauticTrelloBundle\Openapi\lib\Api\DefaultApi;
use MauticPlugin\MauticTrelloBundle\Openapi\lib\Model\Card;
use MauticPlugin\MauticTrelloBundle\Openapi\lib\Model\NewCard;
use MauticPlugin\MauticTrelloBundle\Openapi\lib\Model\TrelloBoard;
use MauticPlugin\MauticTrelloBundle\Openapi\lib\Model\TrelloList;

/**
 * Return static mock data for the Trello API.
 */
class DefaultApiMock extends DefaultApi
{
    /**
     * Get an array of TrelloBoards.
     *
     * @param null $fields
     * @param null $filter
     */
    public function getBoards($fields = null, $filter = null, string $contentType = self::contentTypes['getBoards'][0]): array
    {
        $boards = [];
        $json   = $this->getMockData('boards.json');

        foreach ($json as $board) {
            $boards[] = new TrelloBoard($board);
        }

        return $boards;
    }

    /**
     * Get a static array of TrelloLists.
     *
     * @param null $cards
     * @param null $filter
     * @param null $fields
     */
    public function getLists($boardId, $cards = null, $filter = null, $fields = null, string $contentType = self::contentTypes['getLists'][0]): array
    {
        $lists = [];
        $json  = $this->getMockData('lists.json');
        foreach ($json as $list) {
            $lists[] = new TrelloList($list);
        }

        return $lists;
    }

    /**
     * Simulate the response for adding a new card to Trello.
     *
     * @param NewCard $newCard
     */
    public function addCard($newCard, string $contentType = self::contentTypes['addCard'][0]): Card
    {
        $newCard = new NewCard($newCard);
        if (!$newCard->valid()) {
            echo 'WARNING: no valid new card data';

            return new Card();
        }
        $json = $this->getMockData('card-200.json');
        $card = new Card($json);

        return $card;
    }

    /**
     * Load the static data from a json file in the ./Tests/Data/ folder.
     */
    protected function getMockData(string $filename): array
    {
        $file = \sprintf('%s/Data/%s', dirname(__DIR__), $filename);
        if (!file_exists($file)) {
            printf('%s WARNING: %s not found', PHP_EOL, $filename);

            return [];
        }

        $data = file_get_contents($file, true);
        $json = json_decode($data, true);

        if (empty($json) || !\is_array($json)) {
            printf('%s WARNING: %s is empty', PHP_EOL, $filename);
        }

        return $json;
    }
}
