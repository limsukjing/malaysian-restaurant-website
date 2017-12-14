<?php
    require_once __DIR__ . '/../vendor/autoload.php';

    use Itb\MenuRepository;
    use Itb\UserRepository;

    $menuRepository = new MenuRepository();

    $menuRepository->dropTable();
    $menuRepository->createTable();

    $menuRepository->insert('Satay', 4.50, 'Chunks of tender pork on skewers (5) grilled over charcoal fire, served with our homemade satay sauce.');
    $menuRepository->insert('Popiah', 5.50, 'Deep-fried spring rolls (3) filled with beansprouts, fine strips of bamboo shoot, shredded carrots and dried shrimps, served with our homemade sweet and sour sauce.');
    $menuRepository->insert('Nasi Lemak', 10.50, 'Malay fragrant rice cooked in pandan leaf and coconut milk, served with hard-boiled eggs, spicy anchovies, toasted peanuts, cucumber, and our famous rendang (beef stewed slowly in coconut curry).');
    $menuRepository->insert('Assam Laksa', 9.50, 'Rice noodles served in spicy seafood soup based on tamarind. Please let us know your spice level!');
    $menuRepository->insert('Ice Kacang (ABC)', 3.50, 'Shaved ice served with palm seed, red beans, sweet corn and grass jelly. Served with evaporated milk and multi-colored syrup.');

    $userRepository = new UserRepository();

    $userRepository->dropTable();
    $userRepository->createTable();

