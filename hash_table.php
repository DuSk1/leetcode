<?php

class Node
{
    public function __construct(
        public mixed $key,
        public mixed $value,
        public ?Node $next = null
    )
    {
    }
}

class HashTable
{
    private array $table;
    private int $size;

    public function __construct(int $size = 10)
    {
        $this->size = $size;
        $this->table = array_fill(0, $size, null);
    }

    // Простая хэш-функция
    private function hash(mixed $key): int
    {
        // Для строк используем crc32, иначе сериализуем
        $keyStr = is_string($key) ? $key : serialize($key);
        return crc32($keyStr) % $this->size;
    }

    // Добавление элемента
    public function put(mixed $key, mixed $value): void
    {
        $index = $this->hash($key);
        if ($this->table[$index] === null) {
            // Первый узел
            $this->table[$index] = new Node($key, $value);
        } else {
            // Ищем существующий ключ или добавляем в конец
            $current = $this->table[$index];

            while (true) {
                if ($current->key === $key) {
                    // Обновляем значение при совпадении ключа
                    $current->value = $value;
                    return;
                }

                if ($current->next === null) {
                    break;
                }

                $current = $current->next;
            }

            $current->next = new Node($key, $value);
        }
    }

    // Получение значения по ключу
    public function get(mixed $key): mixed
    {
        $index = $this->hash($key);
        $current = $this->table[$index];

        while ($current !== null) {
            if ($current->key === $key) {
                return $current->value;
            }
            $current = $current->next;
        }

        return null; // Не найдено
    }

    // Удаление элемента
    public function remove(mixed $key): bool
    {
        $index = $this->hash($key);
        $current = $this->table[$index];
        $prev = null;

        while ($current !== null) {
            if ($current->key === $key) {
                if ($prev === null) {
                    // Удаляем первый элемент
                    $this->table[$index] = $current->next;
                } else {
                    // Перепривязываем указатель
                    $prev->next = $current->next;
                }
                return true;
            }
            $prev = $current;
            $current = $current->next;
        }

        return false; // Ключ не найден
    }

    // Проверка наличия ключа
    public function containsKey(mixed $key): bool
    {
        return $this->get($key) !== null;
    }

    // Вывод всей таблицы (для отладки)
    public function debug(): void
    {
        foreach ($this->table as $i => $node) {
            echo "Index $i: ";
            $values = [];
            while ($node !== null) {
                $values[] = "[{$node->key} => {$node->value}]";
                $node = $node->next;
            }
            echo implode(" -> ", $values) . PHP_EOL;
        }
    }
}


$ht = new HashTable(5);

$ht->put("apple", 10);
$ht->put("banana", 20);
$ht->put("orange", 30);
$ht->put("grape", 40);
$ht->put("apple", 99); // Обновление

echo "Get apple: " . $ht->get("apple") . PHP_EOL; // 99
echo "Contains banana? " . ($ht->containsKey("banana") ? "Yes" : "No") . PHP_EOL;

$ht->remove("banana");

$ht->debug();