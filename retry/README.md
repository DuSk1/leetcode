## <- список задачек, удаляем когда решили (RETRY LIST)

---

Это список задач, для которых вы не смогли придумать решение вообще в течении 30 минут. Туда кладем задачки сразу как не смогли решить (советую в READ.me группировать их по темам). Следует вернуться к этим задачкам через 1-2 дня и желательно еще раз через неделю-две, потом задачу из списка можно удалить если решение больше не вызывает никаких проблем

---
### Reverse linked list

```php
/* reverseLinkedList
 * 
 * null -> (1) -> (2) -> (3) -> (4) -> (5)
 
            t
 * null <- (1)  (2) -> (3) -> (4) -> (5)
               p | c
 * 
 */

class Node
{
    public ?int $val;
    
    public ?Node $next;
}

class Solution
{
    
    public function reverseLinkedList($head): Node // <- RETURN
    {
        $prev = null;
        $curr = $head;
        
        while ($curr) {
            $tmp = $curr;
            $curr = $curr.next; // <- POINT ?
            $tmp.next = $prev;
            $prev = $tmp.next;
        }
    }
}
```
---
