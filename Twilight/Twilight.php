<?php
// Start the session at the very beginning.
session_start();

// This POS system uses a simple, hardcoded login.
// For a production system, consider a database-backed login.
define('USERNAME', 'Sample');
define('PASSWORD', 'PI1724');

// Variable to hold login error messages.
$login_error = '';

// 1. Handle Logout Request
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// 2. Handle Login Form Submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if credentials are correct.
    if ($username === USERNAME && $password === PASSWORD) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['owner_logged_in'] = true;
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    } else {
        $login_error = 'Invalid username or password. Please try again.';
    }
}

// 3. Check if the user is logged in.
$is_logged_in = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;

// 4. DEFINE THE FULL MENU IN PHP WITH STOCK STATUS
// 'stock' can be 'available' or 'unavailable'
$menu = [
    // Lassi & Flavored Milk
    ['id' => 1, 'name' => 'Mango Lassi', 'category' => 'Lassi', 'price' => 35, 'icon' => 'fa-glass-whiskey', 'stock' => 'available'],
    ['id' => 2, 'name' => 'Pineapple Lassi', 'category' => 'Lassi', 'price' => 35, 'icon' => 'fa-glass-whiskey', 'stock' => 'available'],
    ['id' => 3, 'name' => 'Strawberry Lassi', 'category' => 'Lassi', 'price' => 35, 'icon' => 'fa-glass-whiskey', 'stock' => 'available'],
    ['id' => 4, 'name' => 'Gulab Lassi', 'category' => 'Lassi', 'price' => 35, 'icon' => 'fa-glass-whiskey', 'stock' => 'available'],
    ['id' => 5, 'name' => 'Variyali Lassi', 'category' => 'Lassi', 'price' => 35, 'icon' => 'fa-glass-whiskey', 'stock' => 'available'],
    ['id' => 6, 'name' => 'Cadbury Lassi', 'category' => 'Lassi', 'price' => 35, 'icon' => 'fa-glass-whiskey', 'stock' => 'available'],
    ['id' => 7, 'name' => 'Butterscotch Lassi', 'category' => 'Lassi', 'price' => 35, 'icon' => 'fa-glass-whiskey', 'stock' => 'available'],
    ['id' => 8, 'name' => 'Black Current Lassi', 'category' => 'Lassi', 'price' => 35, 'icon' => 'fa-glass-whiskey', 'stock' => 'available'],
    ['id' => 9, 'name' => 'Rajbhog Lassi', 'category' => 'Lassi', 'price' => 35, 'icon' => 'fa-glass-whiskey', 'stock' => 'available'],
    ['id' => 10, 'name' => 'Kesar Pista Lassi', 'category' => 'Lassi', 'price' => 35, 'icon' => 'fa-glass-whiskey', 'stock' => 'available'],
    ['id' => 11, 'name' => 'Mango Milk', 'category' => 'Flavored Milk', 'price' => 40, 'icon' => 'fa-mug-hot', 'stock' => 'available'],
    ['id' => 12, 'name' => 'Pineapple Milk', 'category' => 'Flavored Milk', 'price' => 40, 'icon' => 'fa-mug-hot', 'stock' => 'available'],
    ['id' => 13, 'name' => 'Strawberry Milk', 'category' => 'Flavored Milk', 'price' => 40, 'icon' => 'fa-mug-hot', 'stock' => 'available'],
    ['id' => 14, 'name' => 'Gulab Milk', 'category' => 'Flavored Milk', 'price' => 40, 'icon' => 'fa-mug-hot', 'stock' => 'available'],
    ['id' => 15, 'name' => 'Variyali Milk', 'category' => 'Flavored Milk', 'price' => 40, 'icon' => 'fa-mug-hot', 'stock' => 'available'],
    ['id' => 16, 'name' => 'Cadbury Milk', 'category' => 'Flavored Milk', 'price' => 40, 'icon' => 'fa-mug-hot', 'stock' => 'available'],
    ['id' => 17, 'name' => 'Butterscotch Milk', 'category' => 'Flavored Milk', 'price' => 40, 'icon' => 'fa-mug-hot', 'stock' => 'available'],
    ['id' => 18, 'name' => 'Black Current Milk', 'category' => 'Flavored Milk', 'price' => 40, 'icon' => 'fa-mug-hot', 'stock' => 'available'],
    ['id' => 19, 'name' => 'Rajbhog Milk', 'category' => 'Flavored Milk', 'price' => 40, 'icon' => 'fa-mug-hot', 'stock' => 'available'],
    ['id' => 20, 'name' => 'Kesar Pista Milk', 'category' => 'Flavored Milk', 'price' => 40, 'icon' => 'fa-mug-hot', 'stock' => 'available'],
    // Mocktail
    ['id' => 21, 'name' => 'Blue Punch', 'category' => 'Mocktail', 'price' => 30, 'icon' => 'fa-martini-glass-citrus', 'stock' => 'available'],
    ['id' => 22, 'name' => 'Sunset Mocktails', 'category' => 'Mocktail', 'price' => 30, 'icon' => 'fa-martini-glass-citrus', 'stock' => 'available'],
    ['id' => 23, 'name' => 'Minion Mocktail', 'category' => 'Mocktail', 'price' => 40, 'icon' => 'fa-martini-glass-citrus', 'stock' => 'available'],
    ['id' => 24, 'name' => 'Tangy Strawberry', 'category' => 'Mocktail', 'price' => 40, 'icon' => 'fa-martini-glass-citrus', 'stock' => 'available'],
    ['id' => 25, 'name' => 'Tangy Kiwi', 'category' => 'Mocktail', 'price' => 40, 'icon' => 'fa-martini-glass-citrus', 'stock' => 'available'],
    ['id' => 26, 'name' => 'Green Mango Pulse', 'category' => 'Mocktail', 'price' => 40, 'icon' => 'fa-martini-glass-citrus', 'stock' => 'available'],
    ['id' => 27, 'name' => 'Orange Sky', 'category' => 'Mocktail', 'price' => 40, 'icon' => 'fa-martini-glass-citrus', 'stock' => 'available'],
    ['id' => 28, 'name' => 'War Shot', 'category' => 'Mocktail', 'price' => 100, 'icon' => 'fa-martini-glass-citrus', 'stock' => 'available'],
    ['id' => 29, 'name' => 'Devil\'s Passion', 'category' => 'Mocktail', 'price' => 80, 'icon' => 'fa-martini-glass-citrus', 'stock' => 'available'],
    ['id' => 30, 'name' => 'Kiwi Delight', 'category' => 'Mocktail', 'price' => 70, 'icon' => 'fa-martini-glass-citrus', 'stock' => 'available'],
    ['id' => 31, 'name' => 'Crandandi', 'category' => 'Mocktail', 'price' => 80, 'icon' => 'fa-martini-glass-citrus', 'stock' => 'available'],
    ['id' => 32, 'name' => 'Strawberry Delight', 'category' => 'Mocktail', 'price' => 80, 'icon' => 'fa-martini-glass-citrus', 'stock' => 'available'],
    ['id' => 33, 'name' => 'Pineapple Margarita', 'category' => 'Mocktail', 'price' => 60, 'icon' => 'fa-martini-glass-citrus', 'stock' => 'available'],
    ['id' => 34, 'name' => 'Black Mamba', 'category' => 'Mocktail', 'price' => 70, 'icon' => 'fa-martini-glass-citrus', 'stock' => 'available'],
    ['id' => 35, 'name' => 'Missisipi Blue', 'category' => 'Mocktail', 'price' => 70, 'icon' => 'fa-martini-glass-citrus', 'stock' => 'available'],
    ['id' => 36, 'name' => 'Girl Friend Boy Friend', 'category' => 'Mocktail', 'price' => 80, 'icon' => 'fa-martini-glass-citrus', 'stock' => 'available'],
    ['id' => 37, 'name' => 'Hell Berry', 'category' => 'Mocktail', 'price' => 140, 'icon' => 'fa-martini-glass-citrus', 'stock' => 'available'],
    ['id' => 38, 'name' => 'Lichi Lagoon', 'category' => 'Mocktail', 'price' => 60, 'icon' => 'fa-martini-glass-citrus', 'stock' => 'available'],
    ['id' => 39, 'name' => 'Bluebull', 'category' => 'Mocktail', 'price' => 180, 'icon' => 'fa-martini-glass-citrus', 'stock' => 'available'],
    // Mojito
    ['id' => 40, 'name' => 'Virgin Mojito', 'category' => 'Mojito', 'price' => 50, 'icon' => 'fa-leaf', 'stock' => 'available'],
    ['id' => 41, 'name' => 'Strawberry Mojito', 'category' => 'Mojito', 'price' => 70, 'icon' => 'fa-leaf', 'stock' => 'available'],
    ['id' => 42, 'name' => 'Black Mojito (Cola)', 'category' => 'Mojito', 'price' => 70, 'icon' => 'fa-leaf', 'stock' => 'available'],
    ['id' => 43, 'name' => 'Black Current Mojito', 'category' => 'Mojito', 'price' => 70, 'icon' => 'fa-leaf', 'stock' => 'available'],
    ['id' => 44, 'name' => 'Orange Mojito', 'category' => 'Mojito', 'price' => 70, 'icon' => 'fa-leaf', 'stock' => 'available'],
    ['id' => 45, 'name' => 'Pineapple Mojito', 'category' => 'Mojito', 'price' => 70, 'icon' => 'fa-leaf', 'stock' => 'available'],
    ['id' => 46, 'name' => 'Knight Rider Mojito', 'category' => 'Mojito', 'price' => 70, 'icon' => 'fa-leaf', 'stock' => 'available'],
    ['id' => 47, 'name' => 'Green Apple Mojito', 'category' => 'Mojito', 'price' => 80, 'icon' => 'fa-leaf', 'stock' => 'available'],
    ['id' => 48, 'name' => 'Water Melon Mojito', 'category' => 'Mojito', 'price' => 80, 'icon' => 'fa-leaf', 'stock' => 'available'],
    ['id' => 49, 'name' => 'Blue Berry Mojito', 'category' => 'Mojito', 'price' => 70, 'icon' => 'fa-leaf', 'stock' => 'available'],
    ['id' => 50, 'name' => 'Kiwi Mojito', 'category' => 'Mojito', 'price' => 90, 'icon' => 'fa-leaf', 'stock' => 'available'],
    // Special Lassi
    ['id' => 51, 'name' => 'Gulab-Gulkand Lassi', 'category' => 'Special Lassi', 'price' => 50, 'icon' => 'fa-star', 'stock' => 'available'],
    ['id' => 52, 'name' => 'Strawberry Crush Lassi', 'category' => 'Special Lassi', 'price' => 50, 'icon' => 'fa-star', 'stock' => 'available'],
    ['id' => 53, 'name' => 'Pineapple Crush Lassi', 'category' => 'Special Lassi', 'price' => 50, 'icon' => 'fa-star', 'stock' => 'available'],
    ['id' => 54, 'name' => 'Butterscotch Crush Lassi', 'category' => 'Special Lassi', 'price' => 50, 'icon' => 'fa-star', 'stock' => 'available'],
    ['id' => 55, 'name' => 'Black Current Crush Lassi', 'category' => 'Special Lassi', 'price' => 50, 'icon' => 'fa-star', 'stock' => 'available'],
    // Softdrinks
    ['id' => 56, 'name' => 'Jeera Masala', 'category' => 'Softdrinks', 'price' => 10, 'icon' => 'fa-bottle-water', 'stock' => 'available'],
    ['id' => 57, 'name' => 'Orange', 'category' => 'Softdrinks', 'price' => 10, 'icon' => 'fa-bottle-water', 'stock' => 'available'],
    ['id' => 58, 'name' => 'Cola', 'category' => 'Softdrinks', 'price' => 10, 'icon' => 'fa-bottle-water', 'stock' => 'available'],
    ['id' => 59, 'name' => 'Pepiyo', 'category' => 'Softdrinks', 'price' => 10, 'icon' => 'fa-bottle-water', 'stock' => 'available'],
    ['id' => 60, 'name' => 'Lime', 'category' => 'Softdrinks', 'price' => 10, 'icon' => 'fa-beer-mug-empty', 'stock' => 'available'],
    ['id' => 61, 'name' => 'Fruit Beer', 'category' => 'Softdrinks', 'price' => 10, 'icon' => 'fa-beer-mug-empty', 'stock' => 'available'],
    ['id' => 62, 'name' => 'Blue Berry', 'category' => 'Softdrinks', 'price' => 10, 'icon' => 'fa-bottle-water', 'stock' => 'available'],
    ['id' => 63, 'name' => 'Apple', 'category' => 'Softdrinks', 'price' => 10, 'icon' => 'fa-apple-whole', 'stock' => 'available'],
    ['id' => 64, 'name' => 'Kala Khatta', 'category' => 'Softdrinks', 'price' => 10, 'icon' => 'fa-bottle-water', 'stock' => 'available'],
    ['id' => 65, 'name' => 'Jamfal', 'category' => 'Softdrinks', 'price' => 10, 'icon' => 'fa-bottle-water', 'stock' => 'available'],
    ['id' => 66, 'name' => 'Pineapple', 'category' => 'Softdrinks', 'price' => 10, 'icon' => 'fa-bottle-water', 'stock' => 'available'],
    ['id' => 67, 'name' => 'Strawberry', 'category' => 'Softdrinks', 'price' => 10, 'icon' => 'fa-bottle-water', 'stock' => 'available'],
    ['id' => 68, 'name' => 'Black Current', 'category' => 'Softdrinks', 'price' => 10, 'icon' => 'fa-bottle-water', 'stock' => 'available'],
    // Matki Soda
    ['id' => 69, 'name' => 'Sadi Matki Soda', 'category' => 'Matki Soda', 'price' => 30, 'icon' => 'fa-jar', 'stock' => 'available'],
    ['id' => 70, 'name' => 'Matki Limbu Soda', 'category' => 'Matki Soda', 'price' => 50, 'icon' => 'fa-jar', 'stock' => 'available'],
    ['id' => 71, 'name' => 'Matki Limbu Sarbat', 'category' => 'Matki Soda', 'price' => 50, 'icon' => 'fa-jar', 'stock' => 'available'],
    ['id' => 72, 'name' => 'Matki Adu Limbu Phudino Soda', 'category' => 'Matki Soda', 'price' => 60, 'icon' => 'fa-jar', 'stock' => 'available'],
    ['id' => 73, 'name' => 'Matki Crash Soda', 'category' => 'Matki Soda', 'price' => 50, 'icon' => 'fa-jar', 'stock' => 'available'],
    ['id' => 74, 'name' => 'Flavor Matki Soda', 'category' => 'Matki Soda', 'price' => 35, 'icon' => 'fa-jar', 'stock' => 'available'],
    ['id' => 75, 'name' => 'Fruit Crush Soda', 'category' => 'Matki Soda', 'price' => 60, 'icon' => 'fa-jar', 'stock' => 'available'],
    ['id' => 76, 'name' => 'Virgin Mojito Soda', 'category' => 'Matki Soda', 'price' => 70, 'icon' => 'fa-jar', 'stock' => 'available'],
    ['id' => 77, 'name' => 'Flavour Mojito Soda', 'category' => 'Matki Soda', 'price' => 90, 'icon' => 'fa-jar', 'stock' => 'available'],
    // Milk Shake
    ['id' => 78, 'name' => 'Strawberry Shake', 'category' => 'Milk Shake', 'price' => 60, 'icon' => 'fa-ice-cream', 'stock' => 'available'],
    ['id' => 79, 'name' => 'Gulab Shake', 'category' => 'Milk Shake', 'price' => 60, 'icon' => 'fa-ice-cream', 'stock' => 'available'],
    ['id' => 80, 'name' => 'Butterscotch Shake', 'category' => 'Milk Shake', 'price' => 70, 'icon' => 'fa-ice-cream', 'stock' => 'available'],
    ['id' => 81, 'name' => 'Pineapple Shake', 'category' => 'Milk Shake', 'price' => 60, 'icon' => 'fa-ice-cream', 'stock' => 'available'],
    ['id' => 82, 'name' => 'Black Current Shake', 'category' => 'Milk Shake', 'price' => 70, 'icon' => 'fa-ice-cream', 'stock' => 'available'],
    ['id' => 83, 'name' => 'Chocolate Shake', 'category' => 'Milk Shake', 'price' => 70, 'icon' => 'fa-ice-cream', 'stock' => 'available'],
    ['id' => 84, 'name' => 'Rajbhog Shake', 'category' => 'Milk Shake', 'price' => 80, 'icon' => 'fa-ice-cream', 'stock' => 'available'],
    ['id' => 85, 'name' => 'Oreo Shake', 'category' => 'Milk Shake', 'price' => 80, 'icon' => 'fa-ice-cream', 'stock' => 'available'],
    ['id' => 86, 'name' => 'Mango Shake', 'category' => 'Milk Shake', 'price' => 70, 'icon' => 'fa-ice-cream', 'stock' => 'available'],
    ['id' => 87, 'name' => 'Sweet-16 Shake', 'category' => 'Milk Shake', 'price' => 70, 'icon' => 'fa-ice-cream', 'stock' => 'available'],
    ['id' => 88, 'name' => 'Caramel Shake', 'category' => 'Milk Shake', 'price' => 70, 'icon' => 'fa-ice-cream', 'stock' => 'available'],
    // Shing Chaska
    ['id' => 89, 'name' => 'Pepiyo Chaska', 'category' => 'Shing Chaska', 'price' => 25, 'icon' => 'fa-pepper-hot', 'stock' => 'available'],
    ['id' => 90, 'name' => 'Blue Berry Chaska', 'category' => 'Shing Chaska', 'price' => 25, 'icon' => 'fa-pepper-hot', 'stock' => 'available'],
    ['id' => 91, 'name' => 'Kala Khatta Chaska', 'category' => 'Shing Chaska', 'price' => 25, 'icon' => 'fa-pepper-hot', 'stock' => 'available'],
    ['id' => 92, 'name' => 'Jeera Masala Chaska', 'category' => 'Shing Chaska', 'price' => 25, 'icon' => 'fa-pepper-hot', 'stock' => 'available'],
    ['id' => 93, 'name' => 'Jamfal Chaska', 'category' => 'Shing Chaska', 'price' => 25, 'icon' => 'fa-pepper-hot', 'stock' => 'available'],
    ['id' => 94, 'name' => 'Kalakhatta-Orange Mix Chaska', 'category' => 'Shing Chaska', 'price' => 25, 'icon' => 'fa-pepper-hot', 'stock' => 'available'],
    // Mava - Sing - Sarbat
    ['id' => 95, 'name' => 'Gulab Mava-Sing Sarbat', 'category' => 'Mava-Sing-Sarbat', 'price' => 35, 'icon' => 'fa-blender', 'stock' => 'available'],
    ['id' => 96, 'name' => 'Pineapple Mava-Sing Sarbat', 'category' => 'Mava-Sing-Sarbat', 'price' => 35, 'icon' => 'fa-blender', 'stock' => 'available'],
    ['id' => 97, 'name' => 'Chocolate Mava-Sing Sarbat', 'category' => 'Mava-Sing-Sarbat', 'price' => 35, 'icon' => 'fa-blender', 'stock' => 'available'],
    ['id' => 98, 'name' => 'Mango Mava-Sing Sarbat', 'category' => 'Mava-Sing-Sarbat', 'price' => 35, 'icon' => 'fa-blender', 'stock' => 'available'],
    // Fruit Crush
    ['id' => 99, 'name' => 'Strawberry Crush', 'category' => 'Fruit Crush', 'price' => 30, 'icon' => 'fa-apple-whole', 'stock' => 'available'],
    ['id' => 100, 'name' => 'Black Currant Crush', 'category' => 'Fruit Crush', 'price' => 30, 'icon' => 'fa-apple-whole', 'stock' => 'available'],
    ['id' => 101, 'name' => 'Blue Berry Crush', 'category' => 'Fruit Crush', 'price' => 30, 'icon' => 'fa-apple-whole', 'stock' => 'available'],
    ['id' => 102, 'name' => 'Pineapple Crush', 'category' => 'Fruit Crush', 'price' => 30, 'icon' => 'fa-apple-whole', 'stock' => 'available'],
    ['id' => 103, 'name' => 'Orange Crush', 'category' => 'Fruit Crush', 'price' => 30, 'icon' => 'fa-apple-whole', 'stock' => 'available'],
    ['id' => 104, 'name' => 'Kiwi Crush', 'category' => 'Fruit Crush', 'price' => 30, 'icon' => 'fa-apple-whole', 'stock' => 'available'],
    ['id' => 105, 'name' => 'Lichi Crush', 'category' => 'Fruit Crush', 'price' => 30, 'icon' => 'fa-apple-whole', 'stock' => 'available'],
    ['id' => 106, 'name' => 'Green Apple Crush', 'category' => 'Fruit Crush', 'price' => 30, 'icon' => 'fa-apple-whole', 'stock' => 'available'],
    ['id' => 107, 'name' => 'Jamfal Crush', 'category' => 'Fruit Crush', 'price' => 30, 'icon' => 'fa-apple-whole', 'stock' => 'available'],
    ['id' => 108, 'name' => 'Variyari Crush', 'category' => 'Fruit Crush', 'price' => 30, 'icon' => 'fa-apple-whole', 'stock' => 'available'],
    // Sarbat
    ['id' => 109, 'name' => 'Mango Sarbat', 'category' => 'Sarbat', 'price' => 10, 'icon' => 'fa-glass-water', 'stock' => 'available'],
    ['id' => 110, 'name' => 'Gulab Sarbat', 'category' => 'Sarbat', 'price' => 10, 'icon' => 'fa-glass-water', 'stock' => 'available'],
    ['id' => 111, 'name' => 'Variyari Sarbat', 'category' => 'Sarbat', 'price' => 10, 'icon' => 'fa-glass-water', 'stock' => 'available'],
    ['id' => 112, 'name' => 'Pineapple Sarbat', 'category' => 'Sarbat', 'price' => 10, 'icon' => 'fa-glass-water', 'stock' => 'available'],
    ['id' => 113, 'name' => 'Lichi Sarbat', 'category' => 'Sarbat', 'price' => 10, 'icon' => 'fa-glass-water', 'stock' => 'available'],
    ['id' => 114, 'name' => 'Black Currant Sarbat', 'category' => 'Sarbat', 'price' => 10, 'icon' => 'fa-glass-water', 'stock' => 'available'],
    // Cold Coffee
    ['id' => 115, 'name' => 'Classic Coffee', 'category' => 'Cold Coffee', 'price' => 50, 'icon' => 'fa-coffee', 'stock' => 'available'],
    ['id' => 116, 'name' => 'Chocolate Coffee', 'category' => 'Cold Coffee', 'price' => 80, 'icon' => 'fa-coffee', 'stock' => 'available'],
    ['id' => 117, 'name' => 'Oreo Coffee', 'category' => 'Cold Coffee', 'price' => 90, 'icon' => 'fa-coffee', 'stock' => 'available'],
    ['id' => 118, 'name' => 'Caramel Coffee', 'category' => 'Cold Coffee', 'price' => 90, 'icon' => 'fa-coffee', 'stock' => 'available'],
    // Squba Diving Shots
    ['id' => 119, 'name' => 'Regular Shot', 'category' => 'Shots', 'price' => 40, 'icon' => 'fa-shot-glass', 'stock' => 'available'],
    ['id' => 120, 'name' => 'Black Currant Shot', 'category' => 'Shots', 'price' => 50, 'icon' => 'fa-shot-glass', 'stock' => 'available'],
    ['id' => 121, 'name' => 'Jamfal Shot', 'category' => 'Shots', 'price' => 50, 'icon' => 'fa-shot-glass', 'stock' => 'available'],
    ['id' => 122, 'name' => 'Strawberry Shot', 'category' => 'Shots', 'price' => 50, 'icon' => 'fa-shot-glass', 'stock' => 'available'],
];

$categories = array_unique(array_column($menu, 'category'));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twilight Fizz-o-Phile | POS System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f0f4f8;
        }
        /* Custom scrollbar for better aesthetics */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #00a0e3; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #007bb5; }
        .card-hover-effect {
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }
        .card-hover-effect:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        .category-btn.active {
            background-color: #00a0e3; color: white;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        
        /* --- STOCK MANAGEMENT STYLES --- */
        .out-of-stock {
            opacity: 0.5;
            cursor: not-allowed;
            position: relative;
        }
        .out-of-stock::after {
            content: 'Out of Stock';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 6px 12px;
            border-radius: 8px;
            font-weight: bold;
            text-align: center;
            z-index: 10;
        }

        /* Toggle Switch for Stock Modal */
        .toggle-switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 28px;
        }
        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ef4444; /* red-500 */
            transition: .4s;
            border-radius: 28px;
        }
        .slider:before {
            position: absolute;
            content: "";
            height: 20px;
            width: 20px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }
        input:checked + .slider {
            background-color: #22c55e; /* green-500 */
        }
        input:checked + .slider:before {
            transform: translateX(22px);
        }
        
        /* --- TOAST NOTIFICATION STYLES --- */
        #toast-notification {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 1rem 1.5rem;
            border-radius: 0.75rem;
            color: white;
            font-weight: 600;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            transform: translateX(calc(100% + 20px));
            transition: transform 0.3s ease-in-out;
            z-index: 10000;
        }
        #toast-notification.show {
            transform: translateX(0);
        }
        #toast-notification.bg-success { background-color: #10b981; } /* Emerald-500 */
        #toast-notification.bg-error { background-color: #ef4444; } /* Red-500 */

        /* --- CHATBOT STYLING --- */
        #chatbot-container {
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.3s ease;
            transform-origin: bottom right;
        }
        #chatbot-container.open {
            transform: scale(1);
            opacity: 1;
        }
        #chatbot-container.closed {
            transform: scale(0.9);
            opacity: 0;
            pointer-events: none;
        }
        #chat-messages::-webkit-scrollbar { width: 8px; }
        #chat-messages::-webkit-scrollbar-track { background: #e2e8f0; }
        #chat-messages::-webkit-scrollbar-thumb { background: #94a3b8; border-radius: 4px; }
        #chat-messages::-webkit-scrollbar-thumb:hover { background: #64748b; }
        .chat-bubble {
            padding: 0.75rem 1rem;
            border-radius: 1.25rem;
            max-width: 85%;
            margin-bottom: 0.75rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.07);
            word-wrap: break-word;
            line-height: 1.6;
        }
        .chat-bubble.bot {
            background-color: #f1f5f9;
            color: #1f2937;
            align-self: flex-start;
            border-bottom-left-radius: 0.25rem;
        }
        .chat-bubble.user {
            background-color: #00a0e3;
            color: white;
            align-self: flex-end;
            border-bottom-right-radius: 0.25rem;
        }
        .typing-indicator {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
        }
        .typing-indicator span {
            height: 8px;
            width: 8px;
            margin: 0 2px;
            background-color: #94a3b8;
            border-radius: 50%;
            display: inline-block;
            animation: bounce 1.4s infinite ease-in-out both;
        }
        .typing-indicator span:nth-of-type(2) { animation-delay: -0.32s; }
        .typing-indicator span:nth-of-type(3) { animation-delay: -0.16s; }

        @keyframes bounce {
            0%, 80%, 100% { transform: scale(0); }
            40% { transform: scale(1.0); }
        }
        
        /* --- MARGIN CALCULATOR STYLES --- */
        .calculator-card {
            background-color: white;
            border-radius: 1.5rem;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .result-card {
            border-radius: 1rem;
            padding: 1.5rem;
            text-align: center;
            color: white;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .result-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Styles for the new sale type filter buttons */
        .sale-type-btn {
            background-color: #e5e7eb; /* gray-200 */
            color: #374151; /* gray-700 */
            border: 1px solid #d1d5db; /* gray-300 */
        }
        .sale-type-btn.active {
            background-color: #00a0e3;
            color: white;
            border-color: #00a0e3;
        }
        .sale-type-btn:not(.active):hover {
            background-color: #f3f4f6; /* gray-100 */
        }

    </style>
</head>
<body class="antialiased">
    <div id="app" class="min-h-screen">
        <?php if ($is_logged_in): ?>
        <header class="bg-white shadow-md sticky top-0 z-20">
             <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-20">
                    <div class="flex items-center space-x-4">
                        <img src="https://storage.googleapis.com/gemini-prod-us-west1-d85c53148a27/uploaded:twilight-soft-drinks-mocktails-rajkot-0v3bomjpfd.avif-aabc1b9e-d627-4a54-8802-ab7e2556db9b" alt="Twilight Logo" class="h-16 w-auto" onerror="this.style.display='none'">
                        <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 tracking-tight">
                            Twilight <span class="text-[#00a0e3]">Fizz-o-Phile</span>
                        </h1>
                    </div>
                    <div class="flex items-center gap-2 sm:gap-4 flex-wrap justify-end">
                        <a href="/owner/index.php" class="hidden md:flex items-center space-x-2 bg-emerald-600 text-white px-3 sm:px-4 py-2 rounded-lg font-semibold shadow-md hover:bg-emerald-700 transition-colors duration-200">
                            <i class="fas fa-gauge"></i>
                            <span class="hidden sm:inline">Owner Dashboard</span>
                        </a>
                        <button id="show-margin-calculator-btn" class="hidden md:flex items-center space-x-2 bg-orange-500 text-white px-3 sm:px-4 py-2 rounded-lg font-semibold shadow-md hover:bg-orange-600 transition-colors duration-200">
                           <i class="fas fa-percent"></i>
                           <span class="hidden sm:inline">Margin Calculator</span>
                        </button>
                        <button id="show-online-sales-btn" class="flex items-center space-x-2 bg-sky-500 text-white px-3 sm:px-4 py-2 rounded-lg font-semibold shadow-md hover:bg-sky-600 transition-colors duration-200">
                           <i class="fas fa-globe-americas"></i>
                           <span class="hidden sm:inline">Online Sales</span>
                        </button>
                        <button id="show-stock-btn" class="flex items-center space-x-2 bg-purple-500 text-white px-3 sm:px-4 py-2 rounded-lg font-semibold shadow-md hover:bg-purple-600 transition-colors duration-200">
                            <i class="fas fa-boxes-stacked"></i>
                            <span class="hidden sm:inline">Manage Stock</span>
                        </button>
                        <button id="show-sales-btn" class="flex items-center space-x-2 bg-[#00a0e3] text-white px-3 sm:px-4 py-2 rounded-lg font-semibold shadow-md hover:bg-[#007bb5] transition-colors duration-200">
                            <i class="fas fa-chart-line"></i>
                            <span class="hidden sm:inline">All Sales</span>
                        </button>
                        <a href="/owner/index.php" class="md:hidden flex items-center space-x-2 bg-emerald-600 text-white px-3 sm:px-4 py-2 rounded-lg font-semibold shadow-md hover:bg-emerald-700 transition-colors duration-200">
                            <i class="fas fa-gauge"></i>
                            <span>Dashboard</span>
                        </a>
                        <a href="?logout=true" class="flex items-center space-x-2 bg-red-500 text-white px-3 sm:px-4 py-2 rounded-lg font-semibold shadow-md hover:bg-red-600 transition-colors duration-200">
                            <i class="fas fa-sign-out-alt"></i>
                            <span class="hidden sm:inline">Logout</span>
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <main class="container mx-auto p-4 sm:p-6 lg:p-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2">
                    <div class="bg-white p-6 rounded-xl shadow-lg">
                        <h2 class="text-2xl font-bold text-gray-700 mb-4">Menu</h2>
                        <div class="relative mb-4">
                            <input type="text" id="search-bar" placeholder="Search for a drink..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#00a0e3] focus:border-transparent transition">
                            <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        </div>
                        <div id="category-filters" class="flex flex-wrap gap-3 mb-6">
                            <button class="category-btn active px-4 py-2 rounded-lg font-semibold" data-category="All">All</button>
                            <?php foreach ($categories as $category): ?>
                                <button class="category-btn bg-gray-100 text-gray-700 hover:bg-gray-200 px-4 py-2 rounded-lg font-semibold" data-category="<?php echo htmlspecialchars($category); ?>">
                                    <?php echo htmlspecialchars($category); ?>
                                </button>
                            <?php endforeach; ?>
                        </div>
                        <div id="menu-items" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 max-h-[60vh] overflow-y-auto pr-2">
                            <?php foreach ($menu as $item): ?>
                                <div class="menu-card bg-gray-50 border rounded-lg p-3 flex flex-col items-center text-center cursor-pointer card-hover-effect <?php echo ($item['stock'] === 'unavailable') ? 'out-of-stock' : ''; ?>"
                                     data-id="<?php echo $item['id']; ?>"
                                     data-name="<?php echo htmlspecialchars($item['name']); ?>"
                                     data-category="<?php echo htmlspecialchars($item['category']); ?>"
                                     data-price="<?php echo $item['price']; ?>"
                                     data-stock="<?php echo $item['stock']; ?>">
                                    
                                    <div class="w-full h-32 flex items-center justify-center">
                                        <i class="fas <?php echo isset($item['icon']) ? $item['icon'] : 'fa-glass-martini'; ?> text-4xl text-[#00a0e3]"></i>
                                    </div>

                                    <h3 class="font-semibold text-gray-800 mt-2 flex-grow"><?php echo htmlspecialchars($item['name']); ?></h3>
                                    <p class="text-gray-500">₹<?php echo number_format($item['price'], 2); ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-1">
                    <div class="bg-white p-6 rounded-xl shadow-lg sticky top-28">
                        <h2 class="text-2xl font-bold text-gray-700 mb-4 border-b pb-3">Current Order</h2>
                        <div id="order-items" class="max-h-[45vh] overflow-y-auto pr-2 space-y-3">
                            <p id="empty-order-msg" class="text-center text-gray-500 py-8">Your order is empty. Select items from the menu to get started!</p>
                        </div>
                        <div class="mt-6 border-t pt-4 space-y-2">
                            <div class="flex justify-between items-center text-2xl font-bold text-gray-800">
                                <span>Total</span>
                                <span id="grand-total">₹0.00</span>
                            </div>
                        </div>
                        <div class="mt-6 grid grid-cols-2 gap-3">
                            <button id="clear-order-btn" class="w-full bg-red-500 text-white font-bold py-3 rounded-lg hover:bg-red-600 transition disabled:bg-gray-300 disabled:cursor-not-allowed">
                                <i class="fas fa-trash-alt mr-2"></i>Clear
                            </button>
                             <button id="checkout-btn" class="w-full bg-green-500 text-white font-bold py-3 rounded-lg hover:bg-green-600 transition disabled:bg-gray-300 disabled:cursor-not-allowed">
                                <i class="fas fa-cash-register mr-2"></i>Checkout
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        
        <!-- Toast Notification -->
        <div id="toast-notification">
            <span id="toast-message"></span>
        </div>

        <div id="margin-calculator-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden items-center justify-center p-4">
            <div class="bg-white rounded-xl shadow-2xl w-full max-w-3xl max-h-[90vh] flex flex-col">
                <div class="flex justify-between items-center p-5 border-b">
                    <h3 class="text-2xl font-bold text-gray-800">Profit Margin Calculator</h3>
                    <button id="close-margin-calculator-btn" class="text-gray-500 hover:text-red-500 transition-colors text-2xl">&times;</button>
                </div>
                <div class="p-6 overflow-y-auto bg-slate-50">
                    <div class="calculator-card w-full max-w-2xl p-8 md:p-12 mx-auto">
                        <div class="text-center mb-8">
                            <h1 class="text-3xl md:text-4xl font-bold text-slate-800 tracking-tight">
                                Margin Analysis
                            </h1>
                            <p class="text-slate-500 mt-2">Instantly see the profitability of your products.</p>
                        </div>
                        <div class="space-y-6">
                            <div>
                                <label for="category-select" class="block text-sm font-bold text-slate-600 mb-2">1. Select Product Category</label>
                                <select id="category-select" class="w-full p-3 border border-slate-300 rounded-lg text-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent transition">
                                    <option value="">-- Choose a category --</option>
                                </select>
                            </div>
                            <div>
                                <label for="selling-price" class="block text-sm font-bold text-slate-600 mb-2">2. Adjust Selling Price (₹)</label>
                                <input type="number" id="selling-price" placeholder="e.g., 35" class="w-full p-3 border border-slate-300 rounded-lg text-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent transition">
                            </div>
                        </div>
                        <div id="results-container" class="mt-10 hidden">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 fade-in">
                                <div class="result-card bg-blue-500">
                                    <h3 class="text-lg font-semibold opacity-80">Estimated Cost</h3>
                                    <p id="estimated-cost" class="text-4xl font-bold mt-1">₹0</p>
                                </div>
                                <div class="result-card bg-green-500">
                                    <h3 class="text-lg font-semibold opacity-80">Profit per Item</h3>
                                    <p id="profit-margin" class="text-4xl font-bold mt-1">₹0</p>
                                </div>
                                <div class="result-card bg-purple-500">
                                    <h3 class="text-lg font-semibold opacity-80">Margin %</h3>
                                    <p id="margin-percent" class="text-4xl font-bold mt-1">0%</p>
                                </div>
                            </div>
                            <div id="notes-container" class="mt-6 bg-slate-100 p-4 rounded-lg text-center text-slate-700 fade-in">
                                <p class="font-bold mb-1"><i class="fas fa-lightbulb mr-2 text-yellow-500"></i>Expert Note:</p>
                                <p id="notes-text"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="checkout-type-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden items-center justify-center p-4">
            <div class="bg-white rounded-xl shadow-2xl w-full max-w-sm p-8 text-center">
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Select Sale Type</h3>
                <div class="grid grid-cols-1 gap-4">
                    <button id="in-store-sale-btn" class="w-full bg-blue-500 text-white font-bold py-3 rounded-lg hover:bg-blue-600 transition">
                        <i class="fas fa-store mr-2"></i>In-Store Sale
                    </button>
                    <button id="online-order-btn" class="w-full bg-green-500 text-white font-bold py-3 rounded-lg hover:bg-green-600 transition">
                        <i class="fas fa-globe mr-2"></i>Online Sale
                    </button>
                </div>
                <button id="close-checkout-type-btn" class="mt-6 text-gray-500 hover:text-gray-700">Cancel</button>
            </div>
        </div>

        <div id="sales-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden items-center justify-center p-4">
            <div class="bg-white rounded-xl shadow-2xl w-full max-w-4xl max-h-[90vh] flex flex-col">
                <div class="flex justify-between items-center p-5 border-b">
                    <h3 id="sales-modal-title" class="text-2xl font-bold text-gray-800">Sales Report</h3>
                    <button id="close-modal-btn" class="text-gray-500 hover:text-red-500 transition-colors text-2xl">&times;</button>
                </div>
                <div class="p-4 bg-gray-50 border-b flex flex-wrap items-center gap-4">
                    <div>
                        <label for="sales-date-filter" class="text-sm font-medium text-gray-700">Filter by Date:</label>
                        <input type="date" id="sales-date-filter" class="mt-1 block border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-[#00a0e3] focus:border-[#00a0e3]">
                    </div>
                    <div>
                        <label for="sales-month-filter" class="text-sm font-medium text-gray-700">Filter by Month:</label>
                        <input type="month" id="sales-month-filter" class="mt-1 block border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-[#00a0e3] focus:border-[#00a0e3]">
                    </div>
                     <div>
                        <label class="text-sm font-medium text-gray-700">Filter by Type:</label>
                        <div id="sales-type-filter-group" class="mt-1 flex rounded-md shadow-sm">
                            <button data-type="all" class="sale-type-btn active px-4 py-2 rounded-l-lg font-semibold text-sm">All</button>
                            <button data-type="in-store" class="sale-type-btn px-4 py-2 font-semibold text-sm border-t border-b">In-Store</button>
                            <button data-type="online" class="sale-type-btn px-4 py-2 rounded-r-lg font-semibold text-sm">Online</button>
                        </div>
                    </div>
                    <button id="reset-sales-filter-btn" class="self-end bg-gray-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-gray-600 transition">Reset</button>
                </div>
                <div class="p-6 overflow-y-auto">
                    <div id="sales-report-content"></div>
                </div>
                <div class="p-5 border-t bg-gray-50 rounded-b-xl flex justify-end items-center font-bold text-xl">
                    <span id="total-sales-label" class="text-gray-600 mr-4">Total Revenue:</span>
                    <span id="total-daily-sales" class="text-green-600">₹0.00</span>
                </div>
            </div>
        </div>

        <!-- REFACTORED STOCK MODAL -->
        <div id="stock-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden items-center justify-center p-4">
            <div class="bg-white rounded-xl shadow-2xl w-full max-w-4xl max-h-[90vh] flex flex-col">
                <div class="flex justify-between items-center p-5 border-b">
                    <h3 class="text-2xl font-bold text-gray-800">Menu Item Availability</h3>
                    <button id="close-stock-modal-btn" class="text-gray-500 hover:text-red-500 transition-colors text-2xl">&times;</button>
                </div>
                <div class="p-4 bg-gray-50 border-b flex items-center justify-between">
                    <p class="text-sm text-gray-600">Toggle items on/off the menu. Changes are saved automatically.</p>
                    <div class="flex gap-2">
                        <button id="stock-all-available-btn" class="bg-green-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-green-600 transition">
                           <i class="fas fa-check-circle mr-2"></i> Mark All In Stock
                        </button>
                        <button id="stock-all-unavailable-btn" class="bg-red-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-red-600 transition">
                            <i class="fas fa-times-circle mr-2"></i> Mark All Out of Stock
                        </button>
                    </div>
                </div>
                <div id="stock-report-content" class="p-6 overflow-y-auto">
                    <!-- Stock items will be rendered here by JavaScript -->
                </div>
            </div>
        </div>
        
        <button id="chatbot-toggle" class="bg-[#00a0e3] text-white w-16 h-16 rounded-full shadow-lg flex items-center justify-center fixed bottom-5 right-5 z-[1000] hover:bg-[#007bb5] transition-transform hover:scale-110">
            <i id="chat-icon-open" class="fas fa-comment-dots text-2xl"></i>
            <i id="chat-icon-close" class="fas fa-times text-2xl hidden"></i>
        </button>
        
        <div id="chatbot-container" class="closed hidden fixed bottom-24 right-5 w-[90%] max-w-sm h-[70%] max-h-[500px] bg-white rounded-2xl shadow-2xl flex flex-col z-[1000] overflow-hidden">
            <div class="bg-[#00a0e3] text-white p-4 rounded-t-2xl flex items-center shadow-md flex-shrink-0">
                <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center mr-3">
                    <i class="fas fa-robot text-[#00a0e3] text-xl"></i>
                </div>
                <div>
                    <h1 class="text-lg font-bold">FizzBot</h1>
                    <p class="text-xs opacity-90">Your Friendly Drink Expert</p>
                </div>
            </div>
        
            <div id="chat-messages" class="flex-1 p-4 overflow-y-auto flex flex-col">
            </div>
        
            <div class="p-3 bg-white border-t border-gray-200 flex-shrink-0">
                <form id="chat-form" class="flex items-center space-x-2">
                    <input type="text" id="user-input" placeholder="Ask for a drink..." class="flex-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#00a0e3]" autocomplete="off">
                    <button type="submit" class="bg-[#00a0e3] text-white px-4 h-10 rounded-lg font-semibold hover:bg-[#007bb5] transition-colors">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
            </div>
        </div>

        <script>
        document.addEventListener('DOMContentLoaded', () => {
            
            // --- DATA ---
            let currentOrder = [];
            let dailySales = JSON.parse(localStorage.getItem('dailySales')) || [];
            let menuData = [];
            let currentCategory = 'All';

            // --- DOM ELEMENTS ---
            const menuItemsContainer = document.getElementById('menu-items');
            const allMenuCards = Array.from(document.querySelectorAll('.menu-card'));
            const orderItemsContainer = document.getElementById('order-items');
            const emptyOrderMsg = document.getElementById('empty-order-msg');
            const grandTotalEl = document.getElementById('grand-total');
            const checkoutBtn = document.getElementById('checkout-btn');
            const clearOrderBtn = document.getElementById('clear-order-btn');
            const searchBar = document.getElementById('search-bar');
            const categoryFiltersContainer = document.getElementById('category-filters');
            const toastEl = document.getElementById('toast-notification');
            const toastMessageEl = document.getElementById('toast-message');

            // Sales Modal elements
            const salesModal = document.getElementById('sales-modal');
            const showSalesBtn = document.getElementById('show-sales-btn');
            const showOnlineSalesBtn = document.getElementById('show-online-sales-btn');
            const closeModalBtn = document.getElementById('close-modal-btn');
            const salesReportContent = document.getElementById('sales-report-content');
            const totalDailySalesEl = document.getElementById('total-daily-sales');
            const salesModalTitle = document.getElementById('sales-modal-title');
            const totalSalesLabel = document.getElementById('total-sales-label');
            const salesDateFilter = document.getElementById('sales-date-filter');
            const salesMonthFilter = document.getElementById('sales-month-filter');
            const resetSalesFilterBtn = document.getElementById('reset-sales-filter-btn');
            const salesTypeFilterGroup = document.getElementById('sales-type-filter-group');

            // Checkout Type Modal elements
            const checkoutTypeModal = document.getElementById('checkout-type-modal');
            const inStoreSaleBtn = document.getElementById('in-store-sale-btn');
            const onlineOrderBtn = document.getElementById('online-order-btn');
            const closeCheckoutTypeBtn = document.getElementById('close-checkout-type-btn');
            
            // Stock Modal elements
            const stockModal = document.getElementById('stock-modal');
            const showStockBtn = document.getElementById('show-stock-btn');
            const closeStockModalBtn = document.getElementById('close-stock-modal-btn');
            const stockReportContent = document.getElementById('stock-report-content');
            const stockAllAvailableBtn = document.getElementById('stock-all-available-btn');
            const stockAllUnavailableBtn = document.getElementById('stock-all-unavailable-btn');

            // Margin Calculator Modal elements
            const marginCalculatorModal = document.getElementById('margin-calculator-modal');
            const showMarginCalculatorBtn = document.getElementById('show-margin-calculator-btn');
            const closeMarginCalculatorBtn = document.getElementById('close-margin-calculator-btn');

            // --- INITIALIZATION ---
            const initializeData = () => {
                // 1. Build menuData array from the DOM elements
                allMenuCards.forEach(card => {
                    menuData.push({
                        id: parseInt(card.dataset.id),
                        name: card.dataset.name,
                        category: card.dataset.category,
                        price: parseFloat(card.dataset.price),
                        stock: card.dataset.stock, // 'available' or 'unavailable'
                    });
                });

                // 2. Load saved stock status from localStorage and update menuData
                const savedStockStatus = JSON.parse(localStorage.getItem('menuStockStatus')) || {};
                menuData.forEach(item => {
                    if (savedStockStatus[item.id]) {
                        item.stock = savedStockStatus[item.id];
                    }
                });

                // 3. Update the visual display of the menu based on the final stock status
                renderMenuAvailability();
                updateOrder();
            };

            // --- UTILITY FUNCTIONS ---
            const showToast = (message, isError = false) => {
                toastMessageEl.textContent = message;
                toastEl.classList.add('show', isError ? 'bg-error' : 'bg-success');
                setTimeout(() => {
                    toastEl.classList.remove('show');
                }, 3000);
            };

            // --- NEW STOCK MANAGEMENT LOGIC ---

            // Saves the current stock status of all menu items to localStorage
            const saveStockStatus = () => {
                const stockStatusToSave = {};
                menuData.forEach(item => {
                    stockStatusToSave[item.id] = item.stock;
                });
                localStorage.setItem('menuStockStatus', JSON.stringify(stockStatusToSave));
            };

            // Updates the visual state of all menu items based on the menuData array
            const renderMenuAvailability = () => {
                menuData.forEach(item => {
                    const card = document.querySelector(`.menu-card[data-id='${item.id}']`);
                    if (card) {
                        if (item.stock === 'available') {
                            card.classList.remove('out-of-stock');
                        } else {
                            card.classList.add('out-of-stock');
                        }
                    }
                });
            };
            
            // Renders the list of items in the stock management modal
            const renderStockManagementList = () => {
                stockReportContent.innerHTML = '';
                const table = document.createElement('table');
                table.className = 'w-full text-left table-auto';
                table.innerHTML = `<thead class="bg-gray-100"><tr><th class="p-3 font-semibold text-sm">Item Name</th><th class="p-3 font-semibold text-sm">Category</th><th class="p-3 font-semibold text-sm text-center">Status</th></tr></thead><tbody></tbody>`;
                const tbody = table.querySelector('tbody');

                menuData.forEach(item => {
                    const row = document.createElement('tr');
                    row.className = 'border-b';
                    row.innerHTML = `
                        <td class="p-3 font-medium">${item.name}</td>
                        <td class="p-3 text-gray-600">${item.category}</td>
                        <td class="p-3 text-center">
                            <label class="toggle-switch">
                                <input type="checkbox" class="stock-toggle" data-id="${item.id}" ${item.stock === 'available' ? 'checked' : ''}>
                                <span class="slider"></span>
                            </label>
                        </td>
                    `;
                    tbody.appendChild(row);
                });
                stockReportContent.appendChild(table);
            };

            // Handles changes on individual stock toggle switches
            stockReportContent.addEventListener('change', (e) => {
                if (e.target.classList.contains('stock-toggle')) {
                    const itemId = parseInt(e.target.dataset.id);
                    const isAvailable = e.target.checked;
                    const menuItem = menuData.find(item => item.id === itemId);

                    if (menuItem) {
                        menuItem.stock = isAvailable ? 'available' : 'unavailable';
                        saveStockStatus();
                        renderMenuAvailability();
                    }
                }
            });

            // --- ORDERING LOGIC ---
            const filterItems = () => {
                const searchTerm = searchBar.value.toLowerCase();
                allMenuCards.forEach(card => {
                    const name = card.dataset.name.toLowerCase();
                    const category = card.dataset.category;
                    
                    const categoryMatch = currentCategory === 'All' || category === currentCategory;
                    const searchMatch = name.includes(searchTerm);

                    if(categoryMatch && searchMatch) {
                        card.style.display = 'flex';
                    } else {
                        card.style.display = 'none';
                    }
                });
            };

            const addToOrder = (itemId) => {
                const menuItem = menuData.find(item => item.id === itemId);
                
                // Prevent adding out-of-stock items
                if (menuItem.stock === 'unavailable') {
                    showToast("This item is currently out of stock.", true);
                    return;
                }

                const existingItem = currentOrder.find(item => item.id === itemId);
                if (existingItem) {
                    existingItem.quantity++;
                } else {
                    currentOrder.push({ ...menuItem, quantity: 1 });
                }
                updateOrder();
            };
            
            const updateQuantity = (itemId, change) => {
                const orderItem = currentOrder.find(item => item.id === itemId);
                if (orderItem) {
                    orderItem.quantity += change;
                    if (orderItem.quantity <= 0) {
                        currentOrder = currentOrder.filter(item => item.id !== itemId);
                    }
                    updateOrder();
                }
            };

            const updateOrder = () => {
                orderItemsContainer.innerHTML = '';
                if (currentOrder.length === 0) {
                    orderItemsContainer.appendChild(emptyOrderMsg);
                    emptyOrderMsg.style.display = 'block';
                } else {
                    emptyOrderMsg.style.display = 'none';
                    currentOrder.forEach(item => {
                        const itemEl = document.createElement('div');
                        itemEl.className = 'flex items-center justify-between';
                        itemEl.innerHTML = `<div><p class="font-semibold">${item.name}</p><p class="text-sm text-gray-500">₹${item.price.toFixed(2)}</p></div><div class="flex items-center space-x-3"><button class="quantity-change bg-gray-200 rounded-full w-6 h-6 text-lg font-bold flex items-center justify-center hover:bg-gray-300" data-id="${item.id}" data-change="-1">-</button><span>${item.quantity}</span><button class="quantity-change bg-gray-200 rounded-full w-6 h-6 text-lg font-bold flex items-center justify-center hover:bg-gray-300" data-id="${item.id}" data-change="1">+</button></div><p class="font-semibold w-16 text-right">₹${(item.price * item.quantity).toFixed(2)}</p>`;
                        orderItemsContainer.appendChild(itemEl);
                    });
                }
                calculateTotals();
                updateButtons();
            };

            const calculateTotals = () => {
                const subtotal = currentOrder.reduce((sum, item) => sum + (item.price * item.quantity), 0);
                grandTotalEl.textContent = `₹${subtotal.toFixed(2)}`;
            };
            
            const updateButtons = () => {
                const hasItems = currentOrder.length > 0;
                checkoutBtn.disabled = !hasItems;
                clearOrderBtn.disabled = !hasItems;
            };

            const handleCheckout = (saleType) => {
                if (currentOrder.length === 0) return;

                const subtotal = currentOrder.reduce((sum, item) => sum + (item.price * item.quantity), 0);
                const bill = { 
                    id: `B${Date.now()}`, 
                    items: [...currentOrder], 
                    subtotal: subtotal, 
                    tax: 0, 
                    total: subtotal, 
                    date: new Date().toISOString(),
                    type: saleType
                };
                
                dailySales.push(bill);
                localStorage.setItem('dailySales', JSON.stringify(dailySales));

                if (saleType === 'in-store') {
                    printBill(bill);
                } else {
                    showToast('Online sale recorded!');
                }

                currentOrder = [];
                updateOrder();
                showToast('Checkout successful!');
            };

            const printBill = (bill) => {
                const billHTML = `
                    <div style="width: 280px; font-family: 'Courier New', Courier, monospace; color: #000; padding: 10px; font-size: 14px;">
                        <div style="text-align: center;">
                            <h2 style="font-size: 18px; margin: 0;">Twilight Fizz-o-Phile</h2>
                            <p style="margin: 2px 0;">Your Daily Dose of Fizz!</p>
                            <p style="margin: 2px 0;">Bill ID: ${bill.id}</p>
                            <p style="margin: 2px 0;">${new Date(bill.date).toLocaleString()}</p>
                        </div>
                        <hr style="border-top: 1px dashed #000; margin: 10px 0;">
                        <table style="width: 100%; border-collapse: collapse;">
                            <thead>
                                <tr>
                                    <th style="text-align: left;">Item</th>
                                    <th style="text-align: center;">Qty</th>
                                    <th style="text-align: right;">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                ${bill.items.map(item => `
                                    <tr>
                                        <td>${item.name}</td>
                                        <td style="text-align: center;">${item.quantity}</td>
                                        <td style="text-align: right;">${(item.price * item.quantity).toFixed(2)}</td>
                                    </tr>
                                `).join('')}
                            </tbody>
                        </table>
                        <hr style="border-top: 1px dashed #000; margin: 10px 0;">
                        <div style="display: flex; justify-content: space-between; font-weight: bold; font-size: 16px;">
                            <span>TOTAL:</span>
                            <span>₹${bill.total.toFixed(2)}</span>
                        </div>
                        <hr style="border-top: 1px solid #000; margin: 5px 0;">
                        <p style="text-align: center; margin-top: 15px;">Thank you for visiting!</p>
                    </div>`;

                const printWindow = window.open('', 'PRINT', 'height=600,width=400');
                printWindow.document.write('<html><head><title>Bill</title></head><body>');
                printWindow.document.write(billHTML);
                printWindow.document.write('</body></html>');
                printWindow.document.close();
                printWindow.focus();
                printWindow.print();
                printWindow.close();
            };
            
            const renderSalesReport = (filter = {}) => {
                let filteredSales = [...dailySales];
                let reportTitle = "All Sales Report";
                totalSalesLabel.textContent = "Total Revenue:";

                if (filter.date) {
                    filteredSales = filteredSales.filter(sale => sale.date.startsWith(filter.date));
                    const displayDate = new Date(filter.date + 'T00:00:00Z');
                    reportTitle = `Sales for ${displayDate.toLocaleDateString()}`;
                } else if (filter.month) {
                    filteredSales = filteredSales.filter(sale => sale.date.startsWith(filter.month));
                    const [year, month] = filter.month.split('-');
                    const displayDate = new Date(year, month - 1);
                    reportTitle = `Sales for ${displayDate.toLocaleString('default', { month: 'long', year: 'numeric' })}`;
                }

                if (filter.type && filter.type !== 'all') {
                    filteredSales = filteredSales.filter(sale => sale.type === filter.type);
                    if (reportTitle === "All Sales Report") {
                       reportTitle = `${filter.type.charAt(0).toUpperCase() + filter.type.slice(1)} Sales`;
                    } else {
                       reportTitle += ` (${filter.type.charAt(0).toUpperCase() + filter.type.slice(1)})`;
                    }
                }
                
                salesModalTitle.textContent = reportTitle;
                salesReportContent.innerHTML = '';

                if (filteredSales.length === 0) {
                    salesReportContent.innerHTML = `<p class="text-center text-gray-500 py-10">No sales recorded for this period.</p>`;
                    totalDailySalesEl.textContent = `₹0.00`;
                    return;
                }

                const table = document.createElement('table');
                table.className = 'w-full text-left table-auto';
                table.innerHTML = `<thead class="bg-gray-100"><tr><th class="p-3 font-semibold text-sm">Bill ID</th><th class="p-3 font-semibold text-sm">Time</th><th class="p-3 font-semibold text-sm">Type</th><th class="p-3 font-semibold text-sm">Items</th><th class="p-3 font-semibold text-sm text-right">Total</th></tr></thead><tbody></tbody>`;
                const tbody = table.querySelector('tbody');
                filteredSales.slice().reverse().forEach(sale => {
                    const row = document.createElement('tr');
                    row.className = 'border-b hover:bg-gray-50';
                    const itemsSummary = sale.items.map(i => `${i.name} (x${i.quantity})`).join(', ');
                    const saleTypeBadge = sale.type === 'online' 
                        ? `<span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full">Online</span>`
                        : `<span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full">In-Store</span>`;

                    row.innerHTML = `<td class="p-3">${sale.id}</td><td class="p-3">${new Date(sale.date).toLocaleTimeString()}</td><td class="p-3">${saleTypeBadge}</td><td class="p-3 text-sm text-gray-600">${itemsSummary}</td><td class="p-3 font-semibold text-right">₹${sale.total.toFixed(2)}</td>`;
                    tbody.appendChild(row);
                });
                
                salesReportContent.appendChild(table);
                const totalRevenue = filteredSales.reduce((sum, sale) => sum + sale.total, 0);
                totalDailySalesEl.textContent = `₹${totalRevenue.toFixed(2)}`;
            };

            // Event Listeners
            searchBar.addEventListener('input', filterItems);
            clearOrderBtn.addEventListener('click', () => { currentOrder = []; updateOrder(); });
             checkoutBtn.addEventListener('click', () => {
                if (currentOrder.length > 0) {
                    checkoutTypeModal.classList.remove('hidden');
                    checkoutTypeModal.classList.add('flex');
                }
            });
            orderItemsContainer.addEventListener('click', (e) => {
                if (e.target.classList.contains('quantity-change')) {
                    const id = parseInt(e.target.dataset.id);
                    const change = parseInt(e.target.dataset.change);
                    updateQuantity(id, change);
                }
            });
            menuItemsContainer.addEventListener('click', (e) => {
                const card = e.target.closest('.menu-card');
                if (card) {
                    addToOrder(parseInt(card.dataset.id));
                }
            });
            categoryFiltersContainer.addEventListener('click', (e) => {
                if(e.target.classList.contains('category-btn')) {
                    currentCategory = e.target.dataset.category;
                    document.querySelectorAll('.category-btn').forEach(btn => btn.classList.remove('active', 'bg-gray-100', 'text-gray-700', 'hover:bg-gray-200'));
                    e.target.classList.add('active');
                    document.querySelectorAll('.category-btn:not(.active)').forEach(btn => btn.classList.add('bg-gray-100', 'text-gray-700', 'hover:bg-gray-200'));
                    filterItems();
                }
            });

            // Checkout Type Modal Listeners
            closeCheckoutTypeBtn.addEventListener('click', () => {
                checkoutTypeModal.classList.add('hidden');
                checkoutTypeModal.classList.remove('flex');
            });
             inStoreSaleBtn.addEventListener('click', () => {
                handleCheckout('in-store');
                checkoutTypeModal.classList.add('hidden');
                checkoutTypeModal.classList.remove('flex');
            });
            onlineOrderBtn.addEventListener('click', () => {
                handleCheckout('online');
                checkoutTypeModal.classList.add('hidden');
                checkoutTypeModal.classList.remove('flex');
            });

            // Sales Modal Listeners
            showSalesBtn.addEventListener('click', () => {
                const todayStr = new Date().toISOString().slice(0, 10);
                salesDateFilter.value = todayStr;
                salesMonthFilter.value = '';
                salesTypeFilterGroup.querySelector('[data-type="all"]').click();
                renderSalesReport({ date: todayStr, type: 'all' });
                salesModal.classList.remove('hidden'); salesModal.classList.add('flex'); 
            });

            showOnlineSalesBtn.addEventListener('click', () => {
                const todayStr = new Date().toISOString().slice(0, 10);
                salesDateFilter.value = todayStr;
                salesMonthFilter.value = '';
                salesTypeFilterGroup.querySelector('[data-type="online"]').click();
                renderSalesReport({ date: todayStr, type: 'online' });
                salesModal.classList.remove('hidden'); salesModal.classList.add('flex'); 
            });

            closeModalBtn.addEventListener('click', () => { salesModal.classList.add('hidden'); salesModal.classList.remove('flex'); });
            salesModal.addEventListener('click', (e) => { if(e.target === salesModal) { salesModal.classList.add('hidden'); salesModal.classList.remove('flex'); } });
            
            salesDateFilter.addEventListener('change', () => {
                salesMonthFilter.value = ''; // Clear other filter
                const activeType = salesTypeFilterGroup.querySelector('.active').dataset.type;
                renderSalesReport({ date: salesDateFilter.value, type: activeType });
            });
            salesMonthFilter.addEventListener('change', () => {
                salesDateFilter.value = ''; // Clear other filter
                const activeType = salesTypeFilterGroup.querySelector('.active').dataset.type;
                renderSalesReport({ month: salesMonthFilter.value, type: activeType });
            });
             salesTypeFilterGroup.addEventListener('click', (e) => {
                if (e.target.classList.contains('sale-type-btn')) {
                    const type = e.target.dataset.type;
                    salesTypeFilterGroup.querySelectorAll('.sale-type-btn').forEach(btn => btn.classList.remove('active'));
                    e.target.classList.add('active');

                    const currentFilter = {
                        date: salesDateFilter.value,
                        month: salesMonthFilter.value,
                        type: type
                    };
                     if (currentFilter.date) currentFilter.month = '';
                    else if (currentFilter.month) currentFilter.date = '';

                    renderSalesReport(currentFilter);
                }
            });

            resetSalesFilterBtn.addEventListener('click', () => {
                salesDateFilter.value = '';
                salesMonthFilter.value = '';
                salesTypeFilterGroup.querySelectorAll('.sale-type-btn').forEach(btn => btn.classList.remove('active'));
                salesTypeFilterGroup.querySelector('[data-type="all"]').classList.add('active');
                renderSalesReport();
            });

            // Stock Modal Listeners
            showStockBtn.addEventListener('click', () => { 
                renderStockManagementList(); 
                stockModal.classList.remove('hidden'); 
                stockModal.classList.add('flex'); 
            });
            closeStockModalBtn.addEventListener('click', () => { stockModal.classList.add('hidden'); stockModal.classList.remove('flex'); });
            stockModal.addEventListener('click', (e) => { if(e.target === stockModal) { stockModal.classList.add('hidden'); stockModal.classList.remove('flex'); } });
            
            stockAllAvailableBtn.addEventListener('click', () => {
                menuData.forEach(item => item.stock = 'available');
                saveStockStatus();
                renderMenuAvailability();
                renderStockManagementList(); // Re-render the modal list to show changes
                showToast('All items marked as In Stock.');
            });

            stockAllUnavailableBtn.addEventListener('click', () => {
                menuData.forEach(item => item.stock = 'unavailable');
                saveStockStatus();
                renderMenuAvailability();
                renderStockManagementList(); // Re-render the modal list to show changes
                showToast('All items marked as Out of Stock.');
            });


            // Margin Calculator Logic & Listeners
            const marginData = {
                "Lassi": { estimatedCost: 18, defaultSellingPrice: 35, notes: "Good margin; may reach 55% if bulk yogurt is bought." },
                "Flavored Milk": { estimatedCost: 20, defaultSellingPrice: 40, notes: "Maintain with local dairy supply." },
                "Mocktail": { estimatedCost: 40, defaultSellingPrice: 70, notes: "Average cost. Premium mocktails (₹120–150) give the highest margins." },
                "Mojito": { estimatedCost: 32, defaultSellingPrice: 70, notes: "Ideal; add crushed ice & garnish to enhance look/value." },
                "Special Lassi": { estimatedCost: 22, defaultSellingPrice: 50, notes: "Excellent; can cross 60% with toppings priced separately." },
                "Softdrinks": { estimatedCost: 7, defaultSellingPrice: 10, notes: "Low margin — standard retail markup only." },
                "Matki Soda": { estimatedCost: 30, defaultSellingPrice: 50, notes: "Very good; flavored sodas yield better profit." },
                "Milk Shake": { estimatedCost: 35, defaultSellingPrice: 50, notes: "Add-on cream or dry fruits can push to 60%." },
                "Shing Chaska": { estimatedCost: 12, defaultSellingPrice: 25, notes: "Simple recipe, stable returns." },
                "Mava-Sing-Sarbat": { estimatedCost: 18, defaultSellingPrice: 35, notes: "Slightly lower; improve with in-house syrup." },
                "Fruit Crush": { estimatedCost: 15, defaultSellingPrice: 30, notes: "Good — consistent with fast-moving items." },
                "Sarbat": { estimatedCost: 5, defaultSellingPrice: 10, notes: "Common margin; low-ticket but high volume." },
                "Cold Coffee": { estimatedCost: 30, defaultSellingPrice: 50, notes: "If served chilled or whipped, margin easily reaches 60%." },
                "Shots": { estimatedCost: 25, defaultSellingPrice: 40, notes: "Margin grows with premium flavors or combos." }
            };

            const categorySelect = document.getElementById('category-select');
            const sellingPriceInput = document.getElementById('selling-price');
            const resultsContainer = document.getElementById('results-container');
            const estimatedCostEl = document.getElementById('estimated-cost');
            const profitMarginEl = document.getElementById('profit-margin');
            const marginPercentEl = document.getElementById('margin-percent');
            const notesTextEl = document.getElementById('notes-text');

            for (const category in marginData) {
                const option = document.createElement('option');
                option.value = category;
                option.textContent = category;
                categorySelect.appendChild(option);
            }

            const calculateMargin = () => {
                const selectedCategory = categorySelect.value;
                const sellingPrice = parseFloat(sellingPriceInput.value);

                if (!selectedCategory || isNaN(sellingPrice) || sellingPrice <= 0) {
                    resultsContainer.classList.add('hidden');
                    return;
                }

                const data = marginData[selectedCategory];
                if (!data) return;

                const estimatedCost = data.estimatedCost;
                const profit = sellingPrice - estimatedCost;
                const marginPercentage = sellingPrice > 0 ? (profit / sellingPrice) * 100 : 0;
                
                estimatedCostEl.textContent = `₹${estimatedCost.toFixed(2)}`;
                profitMarginEl.textContent = `₹${profit.toFixed(2)}`;
                marginPercentEl.textContent = `${marginPercentage.toFixed(1)}%`;
                notesTextEl.textContent = data.notes;
                
                resultsContainer.classList.remove('hidden');
            };

            showMarginCalculatorBtn.addEventListener('click', () => {
                marginCalculatorModal.classList.remove('hidden');
                marginCalculatorModal.classList.add('flex');
            });
             closeMarginCalculatorBtn.addEventListener('click', () => {
                marginCalculatorModal.classList.add('hidden');
                marginCalculatorModal.classList.remove('flex');
            });
            marginCalculatorModal.addEventListener('click', (e) => {
                if(e.target === marginCalculatorModal) {
                    marginCalculatorModal.classList.add('hidden');
                    marginCalculatorModal.classList.remove('flex');
                }
            });

            categorySelect.addEventListener('change', () => {
                const selectedCategory = categorySelect.value;
                if (selectedCategory && marginData[selectedCategory]) {
                    sellingPriceInput.value = marginData[selectedCategory].defaultSellingPrice;
                } else {
                    sellingPriceInput.value = '';
                }
                calculateMargin();
            });
            sellingPriceInput.addEventListener('input', calculateMargin);

            // --- KNOWLEDGE BASE: Menu and Recipes ---
            const menu_chatbot = [
                // Lassi & Flavored Milk
                { name: 'Mango Lassi', category: 'Lassi & Flavored Milk', tasteProfile: ['creamy', 'sweet', 'fruity', 'tropical', 'rich'], recipe: 'It\'s made by blending ripe mango pulp, sugar, and creamy curd or milk together until smooth. We add ice cubes and a pinch of cardamom, then serve it chilled, garnished with fresh mango slices.' },
                { name: 'Pineapple Lassi', category: 'Lassi & Flavored Milk', tasteProfile: ['fruity', 'sweet', 'creamy', 'tropical'], recipe: 'It\'s made by blending pineapple pulp and sugar with creamy curd or milk until smooth. A dash of lemon juice can be added for extra tang. We serve it over ice, garnished with a pineapple wedge.' },
                { name: 'Strawberry Lassi', category: 'Lassi & Flavored Milk', tasteProfile: ['sweet', 'fruity', 'creamy', 'classic'], recipe: 'A timeless classic! We blend sweet strawberry crush or fresh strawberries with sugar until smooth, then add milk or curd and ice and blend again. It\'s topped with whipped cream and a syrup drizzle.' },
                { name: 'Gulab Lassi', category: 'Lassi & Flavored Milk', tasteProfile: ['sweet', 'floral', 'aromatic', 'creamy'], recipe: 'A beautifully aromatic drink made by blending rich rose syrup with chilled milk or curd and ice. It\'s often garnished with real rose petals or gulkand.' },
                { name: 'Variyali Lassi', category: 'Lassi & Flavored Milk', tasteProfile: ['unique', 'aromatic', 'sweet', 'refreshing'], recipe: 'A traditional drink with a unique flavor. Fennel seeds (saunf) are soaked and ground into a paste, then blended with milk or curd and sugar.' },
                { name: 'Cadbury Lassi', category: 'Lassi & Flavored Milk', tasteProfile: ['chocolatey', 'rich', 'sweet', 'creamy', 'indulgent'], recipe: 'A delicious treat made by blending rich chocolate syrup or melted Cadbury chocolate with milk and a touch of sugar until creamy and smooth. Topped with chocolate shavings!' },
                { name: 'Butterscotch Lassi', category: 'Lassi & Flavored Milk', tasteProfile: ['sweet', 'creamy', 'caramel', 'rich'], recipe: 'A sweet and creamy delight! We blend milk, caramel syrup, and a few drops of butterscotch essence with sugar and ice. It\'s garnished with crunchy toffee bits.' },
                { name: 'Black Currant Lassi', category: 'Lassi & Flavored Milk', tasteProfile: ['fruity', 'tangy', 'sweet', 'creamy'], recipe: 'A vibrant and fruity drink made by simply blending black currant syrup, sugar, and milk or curd until well combined.' },
                { name: 'Rajbhog Lassi', category: 'Lassi & Flavored Milk', tasteProfile: ['rich', 'aromatic', 'creamy', 'nutty', 'sweet'], recipe: 'A royal treat! Milk is infused with precious saffron, a pinch of cardamom, and sugar, then blended and served with chopped almonds and pistachios.' },
                { name: 'Kesar Pista Lassi', category: 'Lassi & Flavored Milk', tasteProfile: ['aromatic', 'nutty', 'creamy', 'sweet', 'rich'], recipe: 'A classic combination of flavors. Saffron is soaked in warm milk, then blended with a rich pistachio paste, sugar, and chilled milk.' },

                // Milk Shakes
                { name: 'Strawberry Milkshake', category: 'Milk Shakes', tasteProfile: ['sweet', 'fruity', 'refreshing', 'creamy'], recipe: 'A perfect summer favorite! We blend fresh strawberries or strawberry crush with our base milkshake mixture of milk and ice cream until thick. It\'s served in a glass with a strawberry syrup drizzle and topped with whipped cream.' },
                { name: 'Gulab Milkshake', category: 'Milk Shakes', tasteProfile: ['floral', 'fragrant', 'cooling', 'traditional'], recipe: 'A cooling drink with a traditional Indian touch. We blend rich rose syrup and milk with vanilla ice cream. For extra aroma, we top it with gulkand (rose petal preserve) and rose petals.' },
                { name: 'Butterscotch Milkshake', category: 'Milk Shakes', tasteProfile: ['sweet', 'buttery', 'crunchy', 'caramel'], recipe: 'A sweet and buttery shake with a delightful crunch. We blend butterscotch syrup with two scoops of butterscotch ice cream until smooth, then garnish it with a caramel drizzle and crushed praline bits.' },
                { name: 'Pineapple Milkshake', category: 'Milk Shakes', tasteProfile: ['tangy', 'tropical', 'fresh', 'creamy'], recipe: 'A tangy and tropical delight. We blend pineapple crush with milk and vanilla ice cream until creamy and smooth. It\'s decorated with a fresh pineapple slice.' },
                { name: 'Black Currant Milkshake', category: 'Milk Shakes', tasteProfile: ['tart', 'sweet', 'richly fruity', 'creamy'], recipe: 'A richly fruity shake with a great balance of tart and sweet. We blend black currant crush with vanilla or black currant ice cream and serve it topped with whipped cream and a syrup drizzle.' },
                { name: 'Chocolate Milkshake', category: 'Milk Shakes', tasteProfile: ['rich', 'creamy', 'indulgent', 'chocolatey'], recipe: 'The all-time classic! We blend cocoa powder, rich chocolate syrup, and two scoops of chocolate ice cream until it\'s thick and creamy. It\'s garnished with chocolate chips and a syrup swirl.' },
                { name: 'Rajbhog Milkshake', category: 'Milk Shakes', tasteProfile: ['royal', 'nutty', 'kesar', 'cardamom'], recipe: 'A royal and nutty shake. We blend rich Rajbhog ice cream and milk with a few drops of saffron essence. It\'s served topped with chopped almonds, pistachios, and kesar strands.' },
                { name: 'Oreo Milkshake', category: 'Milk Shakes', tasteProfile: ['crunchy', 'creamy', 'chocolaty', 'cookie'], recipe: 'A cookie delight! We blend crushed Oreo biscuits with vanilla ice cream and a touch of chocolate syrup. It\'s poured into a glass and topped with more crushed Oreos and whipped cream.' },
                { name: 'Mango Milkshake', category: 'Milk Shakes', tasteProfile: ['thick', 'fruity', 'tropical', 'creamy'], recipe: 'A perfectly tropical and fruity shake. We blend fresh mango pulp with your choice of vanilla or mango ice cream and chilled milk until it\'s perfectly smooth. It\'s garnished with fresh mango pieces.' },
                { name: 'Sweet-16 Milkshake', category: 'Milk Shakes', tasteProfile: ['chocolate', 'strawberry', 'sweet', 'creamy'], recipe: 'A romantic mix of two favorite flavors! We create a beautiful dual-flavor shake by layering strawberry and chocolate mixtures. It\'s garnished with both syrups.' },
                { name: 'Caramel Milkshake', category: 'Milk Shakes', tasteProfile: ['buttery', 'toffee-sweet', 'smooth', 'luxury'], recipe: 'A luxury café-style shake. We blend caramel syrup with vanilla ice cream until it\'s silky and smooth. It\'s topped with whipped cream, more caramel sauce, and an optional sprinkle of sea salt.' },

                // Special Lassi
                { name: 'Gulab-Gulkand Lassi', category: 'Special Lassi', tasteProfile: ['floral', 'sweet', 'aromatic', 'royal'], recipe: 'It\'s a royal treat! We combine thick curd, gulkand (rose petal jam), rose syrup, and a splash of milk in a blender until smooth and frothy. It\'s served over crushed ice and garnished with a swirl of rose syrup and delicate rose petals.' },
                { name: 'Strawberry Crush Lassi', category: 'Special Lassi', tasteProfile: ['fruity', 'tangy-sweet', 'creamy', 'pink delight'], recipe: 'A creamy pink delight! We blend thick curd with a generous amount of strawberry crush, a touch of sugar, and chilled milk until perfectly creamy. It\'s served over ice and garnished with a fresh strawberry slice.' },
                { name: 'Pineapple Crush Lassi', category: 'Special Lassi', tasteProfile: ['tropical', 'refreshing', 'creamy', 'smooth'], recipe: 'A tropical and refreshing lassi. We blend thick curd with pineapple crush, milk, and sugar until smooth. It\'s served over ice and can be topped with small pineapple chunks for an extra burst of flavor.' },
                { name: 'Butterscotch Crush Lassi', category: 'Special Lassi', tasteProfile: ['creamy', 'nutty', 'caramel', 'rich', 'dessert-like'], recipe: 'A rich, dessert-like lassi. Thick curd is blended with butterscotch crush, milk, and sugar until smooth. We pour it into a glass, drizzle with caramel syrup, and sprinkle crunchy toffee or praline bits on top.' },
                { name: 'Black Current Crush Lassi', category: 'Special Lassi', tasteProfile: ['sweet-tart', 'berry', 'creamy', 'yogurt blend'], recipe: 'A beautiful sweet-tart lassi. We blend thick curd with black currant crush, milk, and sugar until frothy. It\'s served over ice with a drizzle of black currant syrup swirled on top.' },

                // Shing Chaska
                { name: 'Pepiyo Shing Chaska', category: 'Shing Chaska', tasteProfile: ['tangy', 'fizzy', 'nutty', 'masala punch'], recipe: 'It\'s a unique mix! We shake lemon juice, Pepiyo syrup (a cola-masala flavor), chaat masala, and black salt. Then we add roasted peanuts and ice, pour in soda water, and stir gently. It\'s served immediately with extra peanuts on top.' },
                { name: 'Blue Berry Shing Chaska', category: 'Shing Chaska', tasteProfile: ['sweet', 'tangy', 'nutty', 'fruity'], recipe: 'A fruity and nutty treat. We mix blueberry crush, lemon juice, sugar syrup, and a pinch of black salt. Then we add ice cubes and roasted peanuts, top it with soda, and stir well.' },
                { name: 'Kala Khatta Shing Chaska', category: 'Shing Chaska', tasteProfile: ['sweet-sour', 'jamun flavor', 'tangy', 'spicy'], recipe: 'A classic Indian flavor with a twist! We mix Kala Khatta syrup, lemon juice, and black salt. For a kick, we can add a pinch of chili powder. Then we add peanuts and ice, pour in soda, and stir quickly to create lots of fizz.' },
                { name: 'Jeera Masala Shing Chaska', category: 'Shing Chaska', tasteProfile: ['refreshing', 'spiced', 'savory', 'cumin twist'], recipe: 'A refreshingly savory drink. We shake roasted cumin (jeera) powder, black salt, lemon juice, and sugar syrup. Then we add roasted peanuts and ice, pour in soda water, and mix gently. It\'s served with a sprinkle of cumin on top.' },
                { name: 'Jamfal Shing Chaska', category: 'Shing Chaska', tasteProfile: ['sweet', 'tangy', 'spiced', 'guava flavor', 'crunchy'], recipe: 'A sweet and spiced guava flavor with a crunchy twist. We mix guava syrup, lemon juice, chaat masala, and black salt. Then we add peanuts and ice, pour in soda, and give it one stir.' },
                { name: 'Kalakhatta-Orange Mix Shing Chaska', category: 'Shing Chaska', tasteProfile: ['sweet', 'tangy', 'fruity mix', 'classic'], recipe: 'A delightful mix of two classic flavors. We combine Kala Khatta syrup, orange syrup, lemon juice, and black salt. Then we add roasted peanuts and ice, and top it all off with soda.' },

                // Fruit Crush
                { name: 'Strawberry Crush', category: 'Fruit Crush', tasteProfile: ['sweet', 'fruity', 'mildly tangy'], recipe: 'It\'s made by adding strawberry crush and optional sugar syrup to a glass. We mix in lemon juice for tanginess and add ice cubes, then pour in chilled soda or water and stir gently.' },
                { name: 'Black Currant Crush', category: 'Fruit Crush', tasteProfile: ['sweet-tart', 'deep berry', 'rich'], recipe: 'We mix black currant crush and lemon juice in a glass, add ice cubes, and then pour in soda or sparkling water. It\'s stirred lightly and served chilled.' },
                { name: 'Blue Berry Crush', category: 'Fruit Crush', tasteProfile: ['sweet', 'slightly tangy', 'smooth berry'], recipe: 'A simple and delicious drink! We combine blueberry crush with a little sugar syrup, add ice cubes, and top it up with soda. It has a beautiful vivid blue color.' },
                { name: 'Pineapple Crush', category: 'Fruit Crush', tasteProfile: ['tropical', 'juicy', 'refreshing', 'sweet and sour'], recipe: 'For a tropical taste, we add pineapple crush to a chilled glass, squeeze in some fresh lemon juice, and add ice. Then we pour in soda and stir gently.' },
                { name: 'Orange Crush', category: 'Fruit Crush', tasteProfile: ['citrusy', 'tangy', 'vibrant', 'orange'], recipe: 'Like sunshine in a glass! We pour orange crush into a glass, add lemon juice and ice, and then fill it with soda or chilled water and mix gently.' },
                { name: 'Kiwi Crush', category: 'Fruit Crush', tasteProfile: ['sweet-tart', 'exotic kiwi', 'crisp green'], recipe: 'This has a wonderful exotic flavor. We mix kiwi crush and sugar syrup in a glass, add ice, and top it with soda for a crisp green finish.' },
                { name: 'Lichi Crush', category: 'Fruit Crush', tasteProfile: ['sweet', 'floral', 'aromatic', 'cooling'], recipe: 'A perfect cooling summer drink! We add lichi (lychee) crush and a bit of lemon juice to a glass with ice cubes, then pour in chilled water or soda.' },
                { name: 'Green Apple Crush', category: 'Fruit Crush', tasteProfile: ['crisp', 'tangy', 'fruity', 'sour-sweet apple'], recipe: 'This has a great crisp and tangy flavor. We mix green apple crush with optional sugar syrup, add ice cubes, and then top it with soda.' },
                { name: 'Jamfal Crush', category: 'Fruit Crush', tasteProfile: ['spicy-tangy-sweet', 'classic indian', 'jamfal masala punch'], recipe: 'A classic Indian "masala" flavor! We add guava crush, lemon juice, chaat masala, and black salt to a glass. After mixing well, we add ice and pour in soda.' },
                { name: 'Variyari Crush', category: 'Fruit Crush', tasteProfile: ['sweet', 'cooling', 'aromatic', 'refreshing'], recipe: 'A wonderfully refreshing after-meal drink. We shake fennel (Variyari) crush, sugar syrup, and lemon juice together, pour it into a glass with ice, and then add soda.' },

                // Mava – Sing – Sarbat
                { name: 'Gulab Mava-Sing Sarbat', category: 'Mava – Sing – Sarbat', tasteProfile: ['sweet', 'creamy', 'floral', 'nutty crunch'], recipe: 'It\'s a sweet, creamy, and floral drink with a lovely nutty crunch. We blend chilled milk, rose syrup, and crumbled mava (khoya) until smooth. Then, we gently mix in crushed roasted peanuts. It\'s served over ice and garnished with chopped dry fruits and rose petals.' },
                { name: 'Pineapple Mava-Sing Sarbat', category: 'Mava – Sing – Sarbat', tasteProfile: ['sweet-tangy', 'creamy richness', 'nutty balance'], recipe: 'This one is sweet and tangy with a creamy richness. We blend chilled milk, pineapple syrup, and grated mava until smooth. Crushed roasted peanuts are added for texture. It\'s served over ice and garnished with chopped pistachios.' },
                { name: 'Chocolate Mava-Sing Sarbat', category: 'Mava – Sing – Sarbat', tasteProfile: ['creamy', 'chocolatey', 'nutty', 'dessert shake'], recipe: 'It\'s like a cold dessert shake! Chilled milk, grated mava, and rich chocolate syrup are blended until smooth. We stir in roasted peanuts for a delightful crunch and serve it cold, topped with grated chocolate.' },
                { name: 'Mango Mava-Sing Sarbat', category: 'Mava – Sing – Sarbat', tasteProfile: ['sweet', 'creamy', 'mango', 'nutty'], recipe: 'A creamy mango treat. We blend chilled milk, sweet mango syrup or pulp, and grated mava until smooth. Crushed peanuts are added for that traditional texture. It\'s served over ice with a swirl of mango syrup.' },
                
                // Sarbat
                { name: 'Mango Sarbat', category: 'Sarbat', tasteProfile: ['sweet', 'tropical', 'refreshing'], recipe: 'A simple and refreshing classic. Sweet mango syrup is mixed with cold water, stirred well, and served over ice cubes with a garnish of mint leaves.' },
                { name: 'Gulab Sarbat', category: 'Sarbat', tasteProfile: ['sweet', 'aromatic', 'floral', 'cooling', 'soothing'], recipe: 'A wonderfully cooling and soothing drink. Aromatic rose syrup is combined with cold water and ice, then stirred well. We garnish it with a few rose petals.' },
                { name: 'Variyari (Fennel) Sarbat', category: 'Sarbat', tasteProfile: ['herbal', 'mildly sweet', 'digestive', 'refreshing'], recipe: 'Perfect after meals, this sarbat is herbal and mildly sweet. We mix fennel syrup with chilled water, add a few drops of lemon juice for brightness, and serve it over ice.' },
                { name: 'Pineapple Sarbat', category: 'Sarbat', tasteProfile: ['sweet-tangy', 'tropical', 'refreshment'], recipe: 'A sweet and tangy tropical refreshment. Pineapple syrup is mixed with chilled water or soda, stirred, and served cold over ice with mint leaves.' },
                { name: 'Lichi Sarbat', category: 'Sarbat', tasteProfile: ['fruity', 'floral', 'cooling', 'soft sweetness'], recipe: 'This drink has a lovely fruity and floral sweetness. Litchi syrup is combined with cold water and ice, with an optional splash of lemon juice to enhance the flavor.' },
                { name: 'Black Currant Sarbat', category: 'Sarbat', tasteProfile: ['sweet', 'tangy', 'bold', 'berry'], recipe: 'A bold and tangy drink with a deep purple color. We mix black currant syrup with chilled soda or water and pour it over crushed ice.' },

                // Softdrinks
                { name: 'Jeera Masala', category: 'Softdrinks', tasteProfile: ['tangy', 'spicy', 'digestive', 'indian flavor'], recipe: 'A traditional Indian flavor. We mix jeera masala syrup and a few drops of lemon juice in a glass, then add chilled soda and ice cubes and stir well.' },
                { name: 'Orange', category: 'Softdrinks', tasteProfile: ['sweet', 'citrusy', 'fresh orange'], recipe: 'A sweet and citrusy classic. We add orange syrup to a glass, top it with chilled soda or Sprite, and mix.' },
                { name: 'Cola', category: 'Softdrinks', tasteProfile: ['classic cola', 'fizzy', 'refreshing'], recipe: 'The classic cola flavor. We simply mix cola syrup and soda together and serve it cold over crushed ice.' },
                { name: 'Pepiyo', category: 'Softdrinks', tasteProfile: ['cooling', 'minty', 'rejuvenating'], recipe: 'A cooling and rejuvenating drink. We mix peppermint (Pepiyo) syrup and soda, then stir gently.' },
                { name: 'Lime', category: 'Softdrinks', tasteProfile: ['tangy', 'fizzy', 'slightly salty'], recipe: 'A tangy and fizzy refresher. We add fresh lime juice and sugar syrup to a glass, pour in soda, and mix gently with a pinch of salt.' },
                { name: 'Fruit Beer', category: 'Softdrinks', tasteProfile: ['malty', 'fruity', 'non-alcoholic'], recipe: 'This has a unique malty and fruity taste, like beer but non-alcoholic. We mix fruit beer essence with soda and serve chilled.' },
                { name: 'Blue Berry', category: 'Softdrinks', tasteProfile: ['sweet', 'tangy', 'fruity'], recipe: 'A sweet and tangy fruit drink. We mix blueberry syrup and soda, and add a few drops of lemon juice.' },
                { name: 'Apple', category: 'Softdrinks', tasteProfile: ['sweet apple', 'fizzy'], recipe: 'A sweet apple punch with a fizzy texture. We simply mix apple syrup and soda and serve it cold.' },
                { name: 'Kala Khatta', category: 'Softdrinks', tasteProfile: ['tangy-salty-sweet', 'nostalgic', 'street flavor'], recipe: 'A nostalgic street flavor! We mix Kala Khatta syrup, lemon juice, and a pinch of black salt with soda over ice.' },
                { name: 'Jamfal (Guava)', category: 'Softdrinks', tasteProfile: ['tangy', 'spicy', 'fruity'], recipe: 'A tangy, spicy, and fruity drink. We blend guava syrup with soda and seasonings like chaat masala and serve over ice.' },
                { name: 'Pineapple', category: 'Softdrinks', tasteProfile: ['sweet-tropical', 'fizzy', 'fresh'], recipe: 'A sweet-tropical flavor with fizzy freshness. We just mix pineapple syrup and soda and stir gently.' },
                { name: 'Strawberry', category: 'Softdrinks', tasteProfile: ['sweet berry', 'fizzy'], recipe: 'A sweet berry flavor with a fizzy finish. We mix strawberry syrup with soda and stir well.' },
                { name: 'Black Currant', category: 'Softdrinks', tasteProfile: ['deep berry', 'rich', 'tangy'], recipe: 'A rich and tangy deep berry flavor. We mix black currant syrup and soda and serve it chilled.' },

                // Matki Soda
                { name: 'Sadi Matki Soda', category: 'Matki Soda', tasteProfile: ['pure', 'fizzy', 'refreshment'], recipe: 'Pure, fizzy refreshment served in a traditional clay pot (matki). We pour plain soda over ice, adding a splash of lemon juice if desired.' },
                { name: 'Matki Limbu Soda', category: 'Matki Soda', tasteProfile: ['tangy', 'fizzy', 'sweet and salt'], recipe: 'A tangy and fizzy classic. We mix fresh lemon juice, sugar syrup, and black salt in a matki, then pour in soda, stir, and serve over ice.' },
                { name: 'Matki Limbu Sarbat', category: 'Matki Soda', tasteProfile: ['sweet-sour', 'traditional', 'nimbu paani'], recipe: 'A traditional nimbu paani style drink, but served in a matki. It\'s a non-fizzy mix of lemon juice, sugar syrup, and cold water with salt.' },
                { name: 'Matki Adu Limbu Phudino Soda', category: 'Matki Soda', tasteProfile: ['tangy', 'spicy', 'minty', 'cooling'], recipe: 'A wonderfully tangy, spicy, and minty soda. We mix a paste of grated ginger (adu) and mint with lemon juice and sugar, then add soda and ice to serve it frothy.' },
                { name: 'Matki Crash Soda', category: 'Matki Soda', tasteProfile: ['fizzy', 'fruity', 'icy texture'], recipe: 'A fizzy and fruity drink with a great icy texture. We add your choice of syrup (cola, orange, or pineapple) and lemon to a matki full of crushed ice, then pour soda on top.' },
                { name: 'Flavor Matki Soda', category: 'Matki Soda', tasteProfile: ['flavorful', 'refreshing', 'fizzy'], recipe: 'A simple and refreshing choice. We mix any of our flavored syrups (like jeera, kala khatta, etc.) with soda directly in the matki.' },
                { name: 'Fruit Crush Soda', category: 'Matki Soda', tasteProfile: ['fruity', 'tangy', 'bubbly'], recipe: 'A bubbly and fruity option. We mix a fruit crush (like mango or strawberry) with lemon juice in a matki, then pour in soda and stir lightly.' },
                { name: 'Virgin Mojito (Matki Style)', category: 'Matki Soda', tasteProfile: ['refreshing', 'mint-lime', 'fizz'], recipe: 'Our classic Virgin Mojito, served in a traditional matki! We muddle lemon and mint, add ice, and then pour in soda and mix well.' },
                { name: 'Flavour Mojito', category: 'Matki Soda', tasteProfile: ['fruity', 'minty', 'energizing'], recipe: 'An energizing and fruity mojito. We muddle mint and lemon, add your choice of fruit syrup (like blueberry or strawberry), add ice, and pour in soda.' },

                // Cold Coffee
                { name: 'Classic Cold Coffee', category: 'Cold Coffee', tasteProfile: ['smooth', 'mildly bitter', 'sweet', 'coffee aroma'], recipe: "We make it by blending instant coffee, sugar, and cold water until frothy. Then we add chilled milk and ice, blend again, and pour it into a tall glass. For extra richness, we can top it with a scoop of vanilla ice cream." },
                { name: 'Chocolate Cold Coffee', category: 'Cold Coffee', tasteProfile: ['creamy', 'chocolaty', 'mild coffee bitterness', 'dessert'], recipe: "It's a dessert in a glass! We blend chilled milk, instant coffee, rich chocolate syrup, and ice until frothy and smooth. It's served in a glass drizzled with more chocolate syrup and topped with whipped cream." },
                { name: 'Oreo Cold Coffee', category: 'Cold Coffee', tasteProfile: ['thick', 'rich', 'indulgent', 'crunchy', 'creamy coffee'], recipe: "This one is super indulgent! We blend chilled milk, coffee, sugar, Oreo biscuits, chocolate syrup, and ice until it's smooth and creamy. It's then topped with whipped cream and crushed Oreo pieces." },
                { name: 'Caramel Cold Coffee', category: 'Cold Coffee', tasteProfile: ['sweet', 'buttery', 'rich', 'roasted coffee'], recipe: "A true café-style luxury drink. We blend coffee, caramel sauce, milk, and ice until smooth. It's poured into a glass swirled with more caramel sauce and topped with whipped cream and a final caramel drizzle." },

                // Squba Diving Shots
                { name: 'Regular Squba Diving Shot', category: 'Squba Diving Shots', tasteProfile: ['tangy', 'zesty', 'sparkling', 'citrus burst'], recipe: 'It\'s a clean citrus burst! We shake fresh lemon juice, simple syrup, a few crushed mint leaves, and a pinch of black salt with crushed ice. It\'s then poured into a shot glass and topped with chilled soda to be served immediately while it\'s fizzy.' },
                { name: 'Black Currant Squba Diving Shot', category: 'Squba Diving Shots', tasteProfile: ['sweet', 'slightly tart', 'deep berry', 'citrus fizz'], recipe: 'This one is sweet and tart. Black currant syrup and lemon juice are stirred with ice, strained into a glass, and then topped up with soda just before serving to create a fizzy look.' },
                { name: 'Jamfal (Guava) Squba Diving Shot', category: 'Squba Diving Shots', tasteProfile: ['tangy-sweet', 'spicy guava kick', 'street-style'], recipe: 'A street-style flavor explosion! We shake guava crush, lemon juice, a pinch of red chili powder, and chaat masala with ice. It\'s then poured into a shot cup and topped with chilled soda or lemonade.' },
                { name: 'Strawberry Squba Diving Shot', category: 'Squba Diving Shots', tasteProfile: ['refreshing', 'fruity', 'fizzy', 'sweet and tangy'], recipe: 'A refreshing and fruity shot. We combine strawberry crush and lemon juice in a shaker with crushed ice, shake it lightly, and then pour it into small glasses. It\'s topped with Sprite or soda for that perfect fizz.' },

                // Mocktails
                { name: 'Blue Punch', category: 'Mocktails', tasteProfile: ['sweet', 'tangy', 'citrusy', 'tropical'], recipe: 'A vibrant and refreshing mocktail. We mix Blue Curacao syrup and lemon juice, then top it with chilled soda or Sprite over crushed ice. It\'s garnished with a fresh lemon slice and a mint leaf.' },
                { name: 'Sunset Mocktail', category: 'Mocktails', tasteProfile: ['fruity', 'tropical', 'sweet', 'layered'], recipe: 'This one is as beautiful as it is delicious! We pour orange juice over ice and then slowly add grenadine syrup to create a stunning "sunset" layered effect. It\'s topped with soda and garnished with an orange slice or a cherry.' },
                { name: 'Minion Mocktail', category: 'Mocktails', tasteProfile: ['sweet', 'tropical', 'banana', 'pineapple'], recipe: 'A fun and fruity blend! We mix banana syrup with pineapple juice, pour it over ice, and top it with soda. It\'s garnished with a banana slice.' },
                { name: 'Tangy Strawberry', category: 'Mocktails', tasteProfile: ['sweet', 'tangy', 'fruity', 'refreshing'], recipe: 'A classic fruity fizz. We combine strawberry syrup, a good squeeze of lemon juice, and mint leaves, then top it all with soda over ice.' },
                { name: 'Tangy Kiwi', category: 'Mocktails', tasteProfile: ['tangy', 'sweet', 'fruity', 'vibrant'], recipe: 'A zesty and vibrant green mocktail. It\'s a simple mix of kiwi syrup or crush, lemon juice, and soda, garnished with a fresh kiwi slice.' },
                { name: 'Green Mango Pulse', category: 'Mocktails', tasteProfile: ['sour', 'tangy', 'spicy', 'bold', 'savory'], recipe: 'For the adventurous! This mocktail has a bold, tangy flavor from raw mango pulp, spiced with black salt, cumin, and mint, then topped with soda.' },
                { name: 'Orange Sky', category: 'Mocktails', tasteProfile: ['citrusy', 'fizzy', 'refreshing', 'orange'], recipe: 'A bright and citrus-rich fizz. We mix orange syrup with a splash of lemon juice and top it with soda, garnished with an orange peel twist.' },
                { name: 'War Shot', category: 'Mocktails', tasteProfile: ['sweet', 'tangy', 'energizing', 'punchy'], recipe: 'This one packs a punch! It\'s a mix of an energy drink like Red Bull, Blue Curacao syrup, and lemon juice, served as a shot with a chili-salt rim for a kick.' },
                { name: 'Devil\'s Passion', category: 'Mocktails', tasteProfile: ['spicy', 'exotic', 'bold', 'fruity'], recipe: 'A bold and exotic choice. We mix passion fruit syrup and lemon juice with a pinch of chili powder for heat, then top it with soda.' },
                { name: 'Kiwi Delight', category: 'Mocktails', tasteProfile: ['smooth', 'fruity', 'sweet', 'green'], recipe: 'A smooth and delightful green fusion. It\'s a lovely mix of kiwi syrup and apple juice, topped with soda and ice.' },
                { name: 'Crandandi', category: 'Mocktails', tasteProfile: ['sweet', 'sour', 'refreshing', 'cranberry'], recipe: 'A sweet and sour refresher. We shake cranberry juice, lemon juice, and sugar syrup together, then pour over ice and top with soda.' },
                { name: 'Strawberry Delight', category: 'Mocktails', tasteProfile: ['creamy', 'fruity', 'dessert', 'sweet'], recipe: 'A creamy, dessert-style mocktail. We blend rich strawberry crush with a bit of milk or cream, then lightly mix in soda and ice.' },
                { name: 'Pineapple Margarita', category: 'Mocktails', tasteProfile: ['tropical', 'citrusy', 'tangy', 'sweet'], recipe: 'All the flavor of a margarita, without the alcohol! It\'s a tropical shake of pineapple juice, lemon juice, and a touch of syrup, served in a glass with a salted rim.' },
                { name: 'Black Mamba', category: 'Mocktails', tasteProfile: ['fizzy', 'spicy', 'cola', 'savory'], recipe: 'A fizzy cola-based mocktail with a spicy twist. We mix cola with lemon juice, a pinch of black salt, and fresh mint leaves.' },
                { name: 'Mississippi Blue', category: 'Mocktails', tasteProfile: ['vibrant', 'citrusy', 'sweet', 'fizzy'], recipe: 'A simple yet stunning vibrant blue fizz. It\'s made with Blue Curacao syrup, lemon juice, and topped with soda.' },
                { name: 'Girl Friend Boy Friend', category: 'Mocktails', tasteProfile: ['sweet', 'tangy', 'layered', 'colorful'], recipe: 'A romantic combo! We create a beautiful dual-color effect by carefully layering strawberry and Blue Curacao syrups before topping with soda.' },
                { name: 'Hell Berry', category: 'Mocktails', tasteProfile: ['sweet', 'spicy', 'berry', 'explosion'], recipe: 'A berry explosion with a spicy kick! We mix a blend of berry syrups with lemon juice and a pinch of chili powder, then top with soda or tonic water.' },
                { name: 'Lichi Lagoon', category: 'Mocktails', tasteProfile: ['sweet', 'tropical', 'fruity', 'litchi'], recipe: 'A sweet and tropical mocktail with a lagoon-blue hue. It\'s a simple mix of litchi juice, a touch of Blue Curacao, and soda.' },
                { name: 'Bluebull', category: 'Mocktails', tasteProfile: ['electric', 'fizzy', 'energizing', 'sweet'], recipe: 'An electric blue, fizzy, and energizing mocktail. We mix an energy drink with Blue Curacao syrup and a splash of lemon juice.' },
                
                { name: 'Virgin Mojito', category: 'Mojitos', tasteProfile: ['cool', 'tangy', 'refreshing', 'classic', 'minty'], recipe: 'The ultimate refresher! We muddle fresh mint leaves and lemon wedges in a glass, add sugar syrup and crushed ice, then pour in chilled soda and stir gently. It\'s garnished with a mint sprig and a fresh lemon slice.' },
                { name: 'Strawberry Mojito', category: 'Mojitos', tasteProfile: ['sweet', 'tart', 'fruity', 'minty', 'refreshing'], recipe: 'A fruity twist on the classic. We muddle mint, lemon, and sugar syrup, then add a sweet strawberry crush and ice. It\'s topped with soda, stirred well, and garnished with sliced strawberries.' },
                { name: 'Black Mojito (Cola)', category: 'Mojitos', tasteProfile: ['fizzy', 'cola', 'minty', 'punchy'], recipe: 'A unique fizzy twist! Fresh mint and lemon are muddled with sugar syrup and ice, then we pour in chilled cola and stir gently for a minty punch.' },
                { name: 'Black Currant Mojito', category: 'Mojitos', tasteProfile: ['sweet', 'rich', 'berry', 'tangy'], recipe: 'A rich, berry-flavored mojito. We muddle mint and lemon, then add a sweet black currant syrup and ice before topping it off with soda.' },
                { name: 'Orange Mojito', category: 'Mojitos', tasteProfile: ['citrusy', 'energizing', 'refreshing', 'orange'], recipe: 'A very citrusy and energizing mojito. Fresh orange juice is combined with muddled mint, lemon, and sugar syrup. It\'s then topped with soda and served over ice.' },
                { name: 'Pineapple Mojito', category: 'Mojitos', tasteProfile: ['sweet', 'tropical', 'minty', 'zesty'], recipe: 'A taste of the tropics! We muddle fresh mint and lemon, then add sweet pineapple juice and sugar syrup. It\'s filled with ice and topped with soda for a zesty finish.' },
                { name: 'Knight Rider Mojito', category: 'Mojitos', tasteProfile: ['unique', 'fusion', 'cola', 'citrus'], recipe: 'Our unique shop special! It\'s a fusion where muddled mint and lemon are mixed with a cool blue curacao syrup, cola, and ice, then topped with soda for a citrus twist.' },
                { name: 'Green Apple Mojito', category: 'Mojitos', tasteProfile: ['sweet', 'tangy', 'apple', 'minty', 'refreshing'], recipe: 'A crisp and tangy mojito. We mix muddled mint and lemon with a sweet-tangy green apple syrup, add crushed ice, and pour in soda. It\'s garnished with a green apple slice.' },
                { name: 'Watermelon Mojito', category: 'Mojitos', tasteProfile: ['juicy', 'cooling', 'sweet', 'refreshing'], recipe: 'The perfect summer drink! Fresh watermelon juice is added to a base of muddled mint and lemon with a touch of sugar syrup. It\'s filled with ice and topped with soda for a juicy, cooling finish.' },
                { name: 'Blueberry Mojito', category: 'Mojitos', tasteProfile: ['sweet', 'tart', 'berry', 'fizzy'], recipe: 'A sweet-tart berry mojito. We muddle fresh mint and lemon directly with a blueberry syrup or crush, then add ice and pour in soda. It\'s garnished with a syrup drizzle.' },
                { name: 'Kiwi Mojito', category: 'Mojitos', tasteProfile: ['tangy', 'fruity', 'sweet', 'kiwi'], recipe: 'A tangy and fruity mojito. Crushed kiwi or kiwi syrup is muddled with mint and lemon, then we add ice and top it all off with soda.' },

                // Sodas & Simple Drinks
                { name: 'Matki Limbu Soda', category: 'Sodas & Simple Drinks', tasteProfile: ['bubbly', 'salty', 'tangy', 'very refreshing', 'savory'], recipe: 'A traditional thirst-quencher served in an earthen pot. It\'s a simple but powerful mix of soda, fresh lemon, and a special salt mix.' },
                { name: 'Jeera Masala Soda', category: 'Sodas & Simple Drinks', tasteProfile: ['savory', 'spiced', 'bubbly', 'tangy', 'unique'], recipe: 'A unique and savory soda, flavored with roasted cumin (jeera) and a blend of Indian spices.' },
                { name: 'Kala Khatta', category: 'Sodas & Simple Drinks', tasteProfile: ['sweet', 'very tangy', 'tart', 'classic indian flavor'], recipe: 'A nostalgic Indian flavor! It\'s a sweet and tangy syrup made from jamun fruit, mixed with soda.' }
            ];


            // --- DOM Element References ---
            const chatbotContainer = document.getElementById('chatbot-container');
            const chatbotToggle = document.getElementById('chatbot-toggle');
            const chatIconOpen = document.getElementById('chat-icon-open');
            const chatIconClose = document.getElementById('chat-icon-close');
            const chatMessages = document.getElementById('chat-messages');
            const chatForm = document.getElementById('chat-form');
            const userInput = document.getElementById('user-input');

            let isChatOpen = false;
            let lastSuggestedDrink = null;

            // --- Event Listeners ---
            chatbotToggle.addEventListener('click', () => {
                isChatOpen = !isChatOpen;
                if (isChatOpen) {
                    chatbotContainer.classList.remove('hidden');
                    setTimeout(() => {
                        chatbotContainer.classList.remove('closed');
                        chatbotContainer.classList.add('open');
                        userInput.focus();
                    }, 10);
                } else {
                    chatbotContainer.classList.remove('open');
                    chatbotContainer.classList.add('closed');
                    setTimeout(() => chatbotContainer.classList.add('hidden'), 300);
                }
                chatIconOpen.classList.toggle('hidden');
                chatIconClose.classList.toggle('hidden');
            });

            chatForm.addEventListener('submit', (e) => {
                e.preventDefault();
                const message = userInput.value.trim();
                if (message === '') return;
                addChatMessage(message, 'user');
                userInput.value = '';
                showTypingIndicator();
                setTimeout(() => getBotResponse(message), 1200);
            });

            // --- Chat Functions ---
            function addChatMessage(message, sender) {
                removeTypingIndicator();
                const bubble = document.createElement('div');
                bubble.classList.add('chat-bubble', sender);
                bubble.innerHTML = message.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
                chatMessages.appendChild(bubble);
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }
            
            function showTypingIndicator() {
                const typingEl = document.createElement('div');
                typingEl.id = 'typing-indicator';
                typingEl.classList.add('typing-indicator');
                typingEl.innerHTML = `<span></span><span></span><span></span>`;
                chatMessages.appendChild(typingEl);
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }

            function removeTypingIndicator() {
                const typingEl = document.getElementById('typing-indicator');
                if (typingEl) {
                    typingEl.remove();
                }
            }

            // --- Core Chatbot Logic ---
            function getBotResponse(input) {
                const lowerInput = input.toLowerCase().trim();
                const categories = [...new Set(menu_chatbot.map(drink => drink.category))];

                // Rule 0: Handle request for the full menu
                if (lowerInput.includes('menu') || lowerInput.includes('all drinks') || lowerInput.includes("what do you have")) {
                    let fullMenuResponse = "Of course! Here is our full menu, organized by category: <br><br>";
                    const menuByCategory = menu_chatbot.reduce((acc, drink) => {
                        if (!acc[drink.category]) {
                            acc[drink.category] = [];
                        }
                        acc[drink.category].push(drink.name);
                        return acc;
                    }, {});

                    for (const category in menuByCategory) {
                        fullMenuResponse += `<strong>${category}:</strong><br>`;
                        fullMenuResponse += menuByCategory[category].map(name => `- ${name}`).join('<br>');
                        fullMenuResponse += '<br><br>';
                    }
                    fullMenuResponse += "Which one looks interesting to you?";
                    addChatMessage(fullMenuResponse, 'bot');
                    return; // Stop further processing
                }

                // Rule 1: Handle Greetings
                if (['hello', 'hi', 'hey'].some(greeting => lowerInput.startsWith(greeting))) {
                    addChatMessage("Hello there! Welcome to Twilight Soda Shop. I'm FizzBot! 🥤 Are you looking for something sweet, tangy, or refreshing?", 'bot');
                    return;
                }

                // Rule 2: Handle Recipe Requests (Follow-up)
                if (lastSuggestedDrink && (lowerInput.includes('how') && lowerInput.includes('made') || lowerInput.includes('recipe') || lowerInput.includes('what is in it'))) {
                    const drink = lastSuggestedDrink;
                    lastSuggestedDrink = null; // Clear state after answering
                    addChatMessage(`Of course! The **${drink.name}** is one of our favorites. ${drink.recipe}`, 'bot');
                    return;
                }
                
                // Rule 3: Find Best Drink Match using an improved scoring and selection system
                const potentialMatches = [];

                menu_chatbot.forEach(drink => {
                    let score = 0;
                    const inputWords = new Set(lowerInput.split(' '));

                    // High score for matching taste profile keywords
                    drink.tasteProfile.forEach(taste => {
                        if (lowerInput.includes(taste)) {
                            score += 10;
                        }
                    });

                    // Medium score for matching words in the name
                    inputWords.forEach(word => {
                        if (word.length > 2 && drink.name.toLowerCase().includes(word)) {
                            score += 5;
                        }
                    });
                    
                    // Low score for matching category
                    if (lowerInput.includes(drink.category.toLowerCase().split(' ')[0].replace('&', ''))) {
                        score += 2;
                    }

                    if (score > 0) {
                        potentialMatches.push({ drink: drink, score: score });
                    }
                });

                let bestMatch = null;
                let highestScore = 0;

                if (potentialMatches.length > 0) {
                    highestScore = Math.max(...potentialMatches.map(m => m.score));
                    const topMatches = potentialMatches.filter(m => m.score === highestScore);
                    
                    if (topMatches.length > 0) {
                        const randomIndex = Math.floor(Math.random() * topMatches.length);
                        bestMatch = topMatches[randomIndex].drink;
                    }
                }

                // Rule 4: Formulate the Suggestion
                if (bestMatch && highestScore > 5) {
                    lastSuggestedDrink = bestMatch;
                    let response = `Based on what you said, I have the perfect suggestion! You should try our **${bestMatch.name}**. It's known for being **${bestMatch.tasteProfile[0]}** and **${bestMatch.tasteProfile[1]}**.`;
                    response += `<br><br>Would you like to know how it's made?`;
                    addChatMessage(response, 'bot');
                    return; // Stop processing after a direct match
                } 
                
                // Rule 5 (REFINED): Handle all suggestions and category queries
                const isSuggestionRequest = lowerInput.includes('suggest') || lowerInput.includes('recommend') || lowerInput.includes('best');
                const mentionedCategory = categories.find(category => lowerInput.replace(/special |shing |squba diving |mava – sing – |matki /g, "").includes(category.toLowerCase().split(' ')[0].replace('&', '')));


                if (mentionedCategory) {
                    // A category was mentioned. List all drinks in it.
                    const drinksInCategory = menu_chatbot.filter(drink => drink.category === mentionedCategory);
                    let response;
                    if (isSuggestionRequest) {
                         // Phrasing for a suggestion: "Suggest a mocktail"
                        response = `Of course! Here are all the drinks from our **${mentionedCategory}** menu:<br><br>`;
                        response += drinksInCategory.map(drink => `- ${drink.name}`).join('<br>');
                        response += "<br><br>Which one catches your eye?";
                    } else {
                        // Phrasing for a direct query: "What mocktails do you have?"
                        const drinkList = drinksInCategory.map(d => `**${d.name}**`).join(', ');
                        response = `Excellent choice! In the **${mentionedCategory}** category, we offer: ${drinkList}. Which one would you like to know more about?`;
                    }
                    addChatMessage(response, 'bot');
                    return; 
                }
                
                if (isSuggestionRequest) {
                    // This code now only runs for TRULY VAGUE suggestions like "suggest something".
                    let popularMenuResponse = "We have so many popular choices! Here are our Mocktails and Lassis to get you started:<br><br>";

                    const mocktails = menu_chatbot.filter(drink => drink.category === 'Mocktails');
                    if (mocktails.length > 0) {
                        popularMenuResponse += `<strong>Mocktails:</strong><br>`;
                        popularMenuResponse += mocktails.map(drink => `- ${drink.name}`).join('<br>');
                        popularMenuResponse += '<br><br>';
                    }

                    const lassis = menu_chatbot.filter(drink => drink.category === 'Lassi & Flavored Milk');
                    if (lassis.length > 0) {
                        popularMenuResponse += `<strong>Lassi & Flavored Milk:</strong><br>`;
                        popularMenuResponse += lassis.map(drink => `- ${drink.name}`).join('<br>');
                        popularMenuResponse += '<br><br>';
                    }
                    popularMenuResponse += "Let me know which one you'd like to know more about!";
                    addChatMessage(popularMenuResponse, 'bot');
                    return;
                }

                // Rule 6: Handle Off-Menu Requests
                else if (lowerInput.includes('hot') || lowerInput.includes('tea') || lowerInput.includes('cappuccino')) {
                       addChatMessage("We don't serve hot drinks, but if you love coffee flavor, you should definitely try our **Classic Cold Coffee**! It's creamy, bold, and very energizing. ✨", 'bot');
                }
                // Rule 7: Fallback Response
                else {
                    lastSuggestedDrink = null;
                    const categoryList = categories.map(c => `**${c}**`).join(', ');
                    let fallbackMessage = `I'm not sure which drink that is. We have several great categories to choose from: ${categoryList}. Which one sounds good to you?`;
                    addChatMessage(fallbackMessage, 'bot');
                }
            }

            // --- Initial Welcome Message ---
            setTimeout(() => {
                addChatMessage("Hi! I'm FizzBot, your personal drink assistant. Tell me what kind of taste you're in the mood for! 🤔", 'bot');
            }, 1000);
            
            // --- INITIAL RENDER ON PAGE LOAD ---
            initializeData();
        });
        </script>
        <?php else: ?>
        <div class="flex items-center justify-center min-h-screen bg-gray-100">
            <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-2xl shadow-xl">
                <div class="flex flex-col items-center">
                    <img src="https://storage.googleapis.com/gemini-prod-us-west1-d85c53148a27/uploaded:twilight-soft-drinks-mocktails-rajkot-0v3bomjpfd.avif-aabc1b9e-d627-4a54-8802-ab7e2556db9b" alt="Twilight Logo" class="h-24 w-auto mb-4" onerror="this.style.display='none'">
                    <h1 class="text-3xl font-bold text-gray-800 tracking-tight">
                        Twilight <span class="text-[#00a0e3]">Fizz-o-Phile</span>
                    </h1>
                    <p class="text-gray-600 mt-2">POS System Login</p>
                </div>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="space-y-6">
                    <div>
                        <label for="username" class="text-sm font-semibold text-gray-600">Username</label>
                        <input type="text" id="username" name="username" required class="w-full px-4 py-2 mt-2 text-gray-700 bg-gray-100 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#00a0e3] focus:outline-none focus:border-transparent transition">
                    </div>
                    <div>
                        <label for="password" class="text-sm font-semibold text-gray-600">Password</label>
                        <input type="password" id="password" name="password" required class="w-full px-4 py-2 mt-2 text-gray-700 bg-gray-100 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#00a0e3] focus:outline-none focus:border-transparent transition">
                    </div>
                    <?php if ($login_error): ?>
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg text-center" role="alert">
                            <span class="block sm:inline"><?php echo $login_error; ?></span>
                        </div>
                    <?php endif; ?>
                    <div>
                        <button type="submit" class="w-full py-3 font-bold text-white bg-[#00a0e3] rounded-lg hover:bg-[#007bb5] focus:outline-none focus:ring-4 focus:ring-blue-300 transition-all duration-300 shadow-md">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>
