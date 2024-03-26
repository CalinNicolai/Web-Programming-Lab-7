Отчет по Шестой лабораторной работе
===================================

1\. Инструкции по запуску проекта
---------------------------------

1. Клонируйте репозиторий:

   ```bash 
   git clone https://github.com/Web
   ```

2. Откройте проект в вашей среде разработки (например, PhpStorm).
3. Запустите сервер командой
   ```bash
   php -S localhost:8000
   ```

2\. Описание проекта
--------------------

В данной лабораторной работе был изучен механизм сессий в PHP и их использование для хранения переменных среды. Целью
работы было создание функционала логина на сайт, при успешной авторизации перенаправление пользователя на страницу
view_data.php, а при попытке доступа без авторизации - перенаправление на страницу логина.

3\. Код для создания функционала логина
---------------------------------------

```php
session_start();
require 'config.php';
if($_SESSION['user']){
    header('Location: http://'.$_SERVER['SERVER_NAME'].$path.'/view_data.php');
}
if (isset($_REQUEST['ok'])) {
    if ((isset($_POST["login"])) and (!empty($_POST['login'])) and (isset($_POST["pass"])) and (!empty($_POST['pass']))) {
        $password = $_POST["pass"];
        $login = $_POST["login"];
        $log = fopen("data/accounts.txt", "r") or die("Nu a fost gasit fisierul!");
        $exist = false;
        while (!feof($log)) {
            $extras = trim(fgets($log));
            $date_cont = explode(" ", $extras);
            if (($date_cont[0] == $login) and ($date_cont[1] == md5($password))) {
                $exist = true;
            }
        }
        fclose($log);
        if ($exist == true) {
        /** Сохранение пользователя внутри переменной SESSION */
            $_SESSION['user'] = $login;
            header('Location: http://' . $_SERVER['SERVER_NAME'] . $path . '/view_data.php');
        } else {
            header('Location: http://' . $_SERVER['SERVER_NAME'] . $path . '/');
        }
    }
}
```

4\. Реализация проверки логина
---------------------------------

### Страница `admin/view_data.php`

```php
require 'config.php';
session_start(); 
/** Проверка если пользователь не авторизован, то перенаправить его на admin/index.php */
if(!$_SESSION['user']) { 
header('Location: http://'.$_SERVER['SERVER_NAME'].$path.'/');
}   else {
echo "Hi ". $_SESSION['user'];
}
```

5\. Вывод
---------

В результате выполнения лабораторной работы был успешно создан функционал логина на сайт с использованием механизма
сессий в PHP.
