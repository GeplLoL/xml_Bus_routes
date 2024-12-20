<?php
$xml = simplexml_load_file('routes.xml');

if ($xml === false) {
    die("XML-faili laadimine ebaõnnestus.");
}

// Получаем данные для фильтрации
$filterStart = $_GET['filterStart'] ?? '';
$filterEnd = $_GET['filterEnd'] ?? '';
$filterPrice = $_GET['filterPrice'] ?? '';
$search = $_GET['search'] ?? '';
$sortField = $_GET['sortField'] ?? '';
$sortOrder = $_GET['sortOrder'] ?? 'asc'; // asc = возрастание, desc = убывание

// Фильтруем данные
$routes = [];
foreach ($xml->route as $route) {
    $addRoute = true;

    if ($filterStart && stripos($route->start, $filterStart) === false) {
        $addRoute = false;
    }

    if ($filterEnd && stripos($route->end, $filterEnd) === false) {
        $addRoute = false;
    }

    if ($filterPrice && (float)$route->price > (float)$filterPrice) {
        $addRoute = false;
    }

    if ($search && stripos($route->start . $route->end . $route->departureTime . $route->price . $route->duration, $search) === false) {
        $addRoute = false;
    }

    if ($addRoute) {
        $routes[] = $route;
    }
}

// Сортировка
if ($sortField) {
    usort($routes, function ($a, $b) use ($sortField, $sortOrder) {
        $valueA = (string) $a->$sortField;
        $valueB = (string) $b->$sortField;

        if ($sortField == 'price' || $sortField == 'duration') {
            $valueA = floatval($valueA);
            $valueB = floatval($valueB);
        }

        if ($sortOrder == 'asc') {
            return $valueA <=> $valueB;
        } else {
            return $valueB <=> $valueA;
        }
    });
}
?>

<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bussijaama haldussüsteem</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Bussijaama haldussüsteem</h1>

    <!-- Форма фильтрации -->
    <form method="GET" action="">
        <label for="filterStart">Alguspunkt:</label>
        <input type="text" id="filterStart" name="filterStart" value="<?= htmlspecialchars($filterStart) ?>">

        <label for="filterEnd">Sihtkoht:</label>
        <input type="text" id="filterEnd" name="filterEnd" value="<?= htmlspecialchars($filterEnd) ?>">

        <label for="filterPrice">Maksimaalne hind (€):</label>
        <input type="number" step="0.01" id="filterPrice" name="filterPrice" value="<?= htmlspecialchars($filterPrice) ?>">

        <label for="search">Otsi:</label>
        <input type="text" id="search" name="search" value="<?= htmlspecialchars($search) ?>">

        <button type="submit">Filtreeri</button>
    </form>

    <!-- Форма сортировки -->
    <form method="GET" action="">
        <input type="hidden" name="filterStart" value="<?= htmlspecialchars($filterStart) ?>">
        <input type="hidden" name="filterEnd" value="<?= htmlspecialchars($filterEnd) ?>">
        <input type="hidden" name="filterPrice" value="<?= htmlspecialchars($filterPrice) ?>">
        <input type="hidden" name="search" value="<?= htmlspecialchars($search) ?>">

        <label for="sortField">Sorteeri:</label>
        <select id="sortField" name="sortField">
            <option value="departureTime" <?= $sortField == 'departureTime' ? 'selected' : '' ?>>Väljumisaeg</option>
            <option value="price" <?= $sortField == 'price' ? 'selected' : '' ?>>Hind</option>
            <option value="duration" <?= $sortField == 'duration' ? 'selected' : '' ?>>Kestus</option>
        </select>

        <label>
            <input type="radio" name="sortOrder" value="asc" <?= $sortOrder == 'asc' ? 'checked' : '' ?>> Kasvavalt
        </label>
        <label>
            <input type="radio" name="sortOrder" value="desc" <?= $sortOrder == 'desc' ? 'checked' : '' ?>> Kahanevalt
        </label>

        <button type="submit">Sorteeri</button>
    </form>

    <!-- Таблица маршрутов -->
    <table>
        <tr>
            <th>ID</th>
            <th>Alguspunkt</th>
            <th>Sihtkoht</th>
            <th>Väljumisaeg</th>
            <th>Hind (€)</th>
            <th>Kestus</th>
        </tr>
        <?php if (empty($routes)): ?>
            <tr>
                <td colspan="6">Marsruute ei leitud.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($routes as $route): ?>
                <tr>
                    <td><?= htmlspecialchars($route['id']) ?></td>
                    <td><?= htmlspecialchars($route->start) ?></td>
                    <td><?= htmlspecialchars($route->end) ?></td>
                    <td><?= htmlspecialchars($route->departureTime) ?></td>
                    <td><?= htmlspecialchars($route->price) ?></td>
                    <td><?= htmlspecialchars($route->duration) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>
</body>
</html>
