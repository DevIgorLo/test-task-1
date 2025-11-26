<?php
define('WEBHOOK_URL', 'https://your-domain.bitrix24.ru/rest/1/your_webhook_code/');

$result = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['contact_id'])) {
    $contactId = intval($_POST['contact_id']);

    // Вызов REST API
    $url = WEBHOOK_URL . 'crm.contact.get.json?id=' . $contactId;

    $response = file_get_contents($url);
    $data = json_decode($response, true);

    if (!empty($data['result'])) {
        $contact = $data['result'];
        $name = $contact['NAME'] ?? '';
        $lastName = $contact['LAST_NAME'] ?? '';
        $result = "Имя: $name<br>Фамилия: $lastName";
    } else {
        $error = 'Контакт не найден';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Поиск контакта</title>
</head>
<body>
    <h1>Поиск контакта по ID</h1>

    <form method="POST">
        <input type="text" name="contact_id" placeholder="ID контакта" required>
        <button type="submit">Найти</button>
    </form>

    <?php if ($result): ?>
        <div><?php echo $result; ?></div>
    <?php endif; ?>

    <?php if ($error): ?>
        <div><?php echo $error; ?></div>
    <?php endif; ?>
</body>
</html>