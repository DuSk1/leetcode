Тут все решения, которые были зафейлены (ДНЕВНИК ОШИБОК)

---
### remove-nth-from-end | Linked list
```php

class Node
{
    public ?int $val = null;
    
    public ?Node $next = null;
}

class Solution
{
    
    public function removeNthNode(Node $head, int $n): Node
    {
        $dummy = new Node();
        $dummy->next = $head;
        $first = $head;
        $second = $head;
        
        for ($i = 1; $i <= $n + 1; $i++) {

            $first = $first->next;
            
        }
        
        while ($first !== null) {
            $first = $first->next;
            $second = $second->next;
        }
        
        $second->next = $second->next->next;
        
        return $dummy->next;
    }
    
}

```

---
### remove-nth-from-end | Linked list
```php
class Node
{
    public ?int $val = null;

    public ?Node $next = null;
}
// __contruct($val = 0, $next = null) // забыл конструктор. Лучше property promotion !
```