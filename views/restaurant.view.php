<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $restaurant['name']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

<div class="container py-4">
    <a href="index.php" class="btn btn-outline-secondary mb-3">← На главную</a>

    <div class="card mb-4">
        <div class="card-body">
            <h2><?php echo $restaurant['name']; ?></h2>
            <p>🗺 <?php echo $restaurant['address']; ?></p>
            <p>👨‍🍳 <strong><?php echo $restaurant['cuisine_type']; ?></strong></p>
            
            <?php if (isset($_SESSION['user_id'])): ?>
                <?php if ($inFavourites): ?>
                    <a href="favourites/remove.php?id=<?php echo $id; ?>" class="btn btn-sm btn-danger">Удалить из избранного</a>
                <?php else: ?>
                    <a href="favourites/add.php?id=<?php echo $id; ?>" class="btn btn-outline-warning">➕ В избранное</a>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header bg-info text-white">🥄 Меню ресторана</div>
        <div class="card-body">
            <?php if (count($dishes) > 0): ?>
                <?php foreach ($dishes as $dish): ?>
                    <div class="border-bottom pb-2 mb-2">
                        <strong><?php echo $dish['name']; ?></strong> — <?php echo $dish['price']; ?> ₽
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-muted">Пока нет блюд в меню...</p>
            <?php endif; ?>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-success text-white">Отзывы</div>
        <div class="card-body">
            
            <?php if (isset($_SESSION['user_id'])): ?>
                <form action="reviews/add.php" method="post" class="mb-4 p-3 bg-light rounded">
                    <input type="hidden" name="place_id" value="<?php echo $id; ?>">
                    <input type="date" name="visit_date" class="form-control mb-2" required>
                    <textarea name="comment" class="form-control mb-2" rows="3" placeholder="Ваш отзыв" required></textarea>
                    <button type="submit" class="btn btn-success">Отправить</button>
                </form>
            <?php else: ?>
                <div class="alert alert-info mb-4">Чтобы оставить отзыв, <a href="login.php">войдите в систему</a></div>
            <?php endif; ?>

            <?php foreach ($reviews as $review): ?>
                <div class="border-bottom pb-2 mb-2">
                    <div class="d-flex justify-content-between">
                        <strong><?php echo $review['name']; ?></strong>
                        <small><?php echo $review['visit_date']; ?></small>
                    </div>
                    <p class="mt-2"><?php echo $review['comment']; ?></p>
                    
                    <?php if (isset($_SESSION['user_id']) && ($review['user_id'] == $_SESSION['user_id'] || $_SESSION['is_admin'] == 1)): ?>
                        <a href="reviews/delete.php?id=<?php echo $review['id']; ?>&place_id=<?php echo $id; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Удалить отзыв?')">Удалить</a>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

</body>
</html>