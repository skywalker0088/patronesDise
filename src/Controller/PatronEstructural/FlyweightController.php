<?php

namespace App\Controller\PatronEstructural;

use App\Services\PatronEstructural\Flyweight\ProblemOne\IconFactory;
use App\Services\PatronEstructural\Flyweight\ProblemOne\User;
use App\Services\PatronEstructural\Flyweight\ProblemTwo\EmojiFactory;
use App\Services\PatronEstructural\Flyweight\ProblemTwo\MessageEmoji;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class FlyweightController extends AbstractController
{
    #[Route('/flyweight/method ', name: 'app_flyweight_method')]
    public function index(): Response
    {
        $result = [];

        $factory = new EmojiFactory();

        $symbols = ['😂', '❤️', '👍', '🔥', '😍', '💯', '🤯', '🎉', '😢', '🙏'];
        $messageEmojis = [];

        for ($i = 0; $i < 100; $i++) {
            $emojiSymbol = $symbols[array_rand($symbols)];
            $emoji = $factory->getEmoji($emojiSymbol);

            $x = rand(0, 500);
            $y = rand(0, 300);
            $size = rand(16, 48);

            $messageEmojis[] = new MessageEmoji($emoji, $x, $y, $size);
        }

        // Mostrar algunos emojis
        $result[] = "\n🎨 Renderizando los primeros 5 emojis:\n\n";
        for ($i = 0; $i < 5; $i++) {
            $result[] = $messageEmojis[$i]->render();
        }

        $result[] = "\n✅ Emojis cargados realmente en memoria: " . $factory->count() . "\n";


        // $iconFactory = new IconFactory();

        // $types = ['admin', 'guest', 'moderator'];
        // $users = [];

        // for ($i = 0; $i < 1000; $i++) {
        //     $type = $types[array_rand($types)]; // elige tipo al azar
        //     $icon = $iconFactory->getIcon($type);

        //     $x = rand(0, 500);
        //     $y = rand(0, 500);
        //     $users[] = new User($x, $y, $icon);
        // }

        // $result[] = "\n✅ Total de íconos realmente creados: " . $iconFactory->countIcons() . "\n\n";

        // // Renderizamos 5 usuarios al azar como ejemplo:
        // for ($i = 0; $i < 5; $i++) {
        //     $result[] = $users[$i]->render();
        // }

        return $this->render('flyweight_method/index.html.twig', [
            'controller_name' => 'FlyweightController',
            'result' => implode(" ", $result)
        ]);
    }
}
