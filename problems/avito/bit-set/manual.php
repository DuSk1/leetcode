<?php



class BitSet
{
    private int $bits;

    public function __construct()
    {
        $this->bits = 0; // Инициализируем пустое множество
    }

    // Добавляет элемент в множество
    public function add(int $elementId): void
    {
        if ($elementId < 0 || $elementId > 32) {
            throw new InvalidArgumentException("elementId должен быть от 0 до 31");
        }

        $this->bits |= (1 << $elementId);
    }

    // Удаляет элемент из множества
    public function remove(int $elementId): void
    {
        if ($elementId < 0 || $elementId > 32) {
            throw new InvalidArgumentException("elementId должен быть от 0 до 31");
        }
        $this->bits &= ~(1 << $elementId);
    }

    // Проверяет, содержится ли элемент во множестве
    public function contains(int $elementId): bool
    {
        if ($elementId < 0 || $elementId > 32) {
            throw new InvalidArgumentException("elementId должен быть от 0 до 31");
        }
        return ($this->bits >> $elementId) & 1; // Операция & 1 оставляет только младший бит (остальные обнуляются).
    }

    // Возвращает количество элементов в множестве
    public function size(): int
    {
        return substr_count(decbin($this->bits), '1');
    }

    // Возвращает массив всех элементов множества
    public function getAll(): array
    {
        $elements = [];
        for ($i = 0; $i < 32; $i++) {
            if ($this->contains($i)) {
                $elements[] = $i;
            }
        }
        return $elements;
    }

    // Получить текущее значение битовой маски
    public function getBits(): int
    {
        return $this->bits;
    }
}


// Пример использования:
$bs = new BitSet();
$bs->add(3);
$bs->add(5);

var_dump($bs->contains(3)); // bool(true)
var_dump($bs->contains(4)); // bool(false)

$bs->remove(3);
var_dump($bs->contains(3)); // bool(false)

print_r($bs->getAll());      // Array ( [0] => 5 )
echo "Bits: " . decbin($bs->getBits()) . "\n"; // Например: Bits: 100000
echo "Size: " . $bs->size() . "\n";            // Size: 1
