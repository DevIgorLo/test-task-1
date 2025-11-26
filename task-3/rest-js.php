<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Поиск контакта</title>
    <script src="//api.bitrix24.com/api/v1/"></script>
</head>
<body>
    <h1>Поиск контакта по ID</h1>

    <input type="text" id="contactId" placeholder="ID контакта">
    <button id="searchBtn">Найти</button>

    <div id="result"></div>

    <script>
        BX24.init(function() {});

        document.getElementById('searchBtn').addEventListener('click', function() {
            const contactId = document.getElementById('contactId').value;

            BX24.callMethod(
                'crm.contact.get',
                { id: contactId },
                function(result) {
                    if (result.error()) {
                        document.getElementById('result').innerHTML = 'Ошибка: ' + result.error();
                    } else {
                        const contact = result.data();
                        if (contact) {
                            document.getElementById('result').innerHTML =
                                'Имя: ' + (contact.NAME || '') + '<br>' +
                                'Фамилия: ' + (contact.LAST_NAME || '');
                        } else {
                            document.getElementById('result').innerHTML = 'Контакт не найден';
                        }
                    }
                }
            );
        });
    </script>
</body>
</html>