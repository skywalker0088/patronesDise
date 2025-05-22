<?php

namespace App\Services\PatronEstructural\Flyweight\ProblemTwo;

class EmojiFactory
{
   private array $emojiArray = [];

    public function getEmoji(string $symbol): Emoji {
        $key = $symbol;
        if (!isset($this->emojiArray[$key])) {
            $this->emojiArray[$key] = new Emoji($symbol, "img/{$symbol}.png");
        }
        return $this->emojiArray[$key];
    }

    public function count(): int {
        return count($this->emojiArray);
    }
}
